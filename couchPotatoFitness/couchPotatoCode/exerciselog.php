<?php
    require_once('startsession.php');

    $page_title = 'Log Your Activity';

    require_once('header.php');

    require_once('appvars.php');
    require_once('connectvars.php');

    require_once('navmenu.php');

    // Make sure the user is logged in 
    if (!isset($_SESSION['user_id']))
    {
        echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
        exit();
    }

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die("The database connection failed, but that doesn't mean YOU should give up!");

    if (isset($_POST['submit']))
    {

        // Get the user's entries from the exercise_log form
        $user_id = $_SESSION['user_id'];
        $exercise_date = mysqli_real_escape_string($dbc, trim($_POST['exerciseDate']));
        $exercise_type = mysqli_real_escape_string($dbc, trim($_POST['exerciseType']));
        $exercise_duration = (int)mysqli_real_escape_string($dbc, trim($_POST['exerciseDuration']));
        $heart_rate = (int)mysqli_real_escape_string($dbc, trim($_POST['heartRate']));

        // Get the user's data from the exercise_user database 
        $query = "SELECT gender, weight, birthdate FROM exercise_user WHERE user_id = '" . $_SESSION['user_id'] . "'";
        $data = mysqli_query($dbc, $query)
                or die("Rats! This query fell off the treadmill!");
        $row = mysqli_fetch_array($data);
      
            $gender = $row['gender'];
            $weight = $row['weight'];
            $birthdate = $row['birthdate'];
            $now = date("Y-m-d");
            $birthdate = strtotime($birthdate);
            $now = strtotime($now);
            $difference = abs($now - $birthdate);
            $age = floor($difference / (365*60*60*24));

        // Use the gathered data to calculate the calories burned by the user
        if ($gender == "M") 
        {
            $calories = round((((-55.0969 + (0.6309 * $heart_rate) + (0.090174 * $weight) + (0.2017 * $age)) / 4.184) * $exercise_duration), 1);
        }
        else if ($gender == "F")
        {
            $calories = round((((-20.4022 + (0.4472 * $heart_rate) - (0.057288 * $weight) + (0.074 * $age)) / 4.184) * $exercise_duration), 1);
        }

        // Update the exercise_log table with the user's entered data
        if (!empty($exercise_date) && !empty($exercise_type) && !empty($exercise_duration) && !empty($heart_rate))
        {
            $query = "INSERT INTO exercise_log (user_id, date, exercise_type, time_in_minutes, heart_rate, calories) "
                    . "VALUES ('$user_id', '$exercise_date', '$exercise_type', '$exercise_duration', '$heart_rate', '$calories')"; 

            mysqli_query($dbc, $query)
                    or die("Rats! This query fell off the treadmill!");

            echo '<p class="info">Congrats! Your exercise has been logged successfully! Would you like to <a href="viewprofile.php">see your results</a>?</p>';
        }
        else 
        {
            echo '<p id="profileError">Hmmm...it looks like you didn\'t enter all of your exercise data.</p>';
        }
    }
?>

<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
        <legend>Add an Excercise:</legend>

        <label for="exerciseDate">Today's Date:</label>
        <input type="date" id="exerciseDate" name="exerciseDate" value="<?php if (!empty($exercise_date)) echo $exercise_date; else echo 'YYYY-MM-DD'; ?>" /><br />

        <label for="exerciseType">Exercise:</label>
        <select id="exerciseType" name="exerciseType" required="required" value="<?php if (empty($exercise_type)) echo "What were you up to?"; ?>" />
            <option value="" disabled selected>What were you up to?</option>
            <option value="walking" <?php if (!empty($exercise_type) && $exercise_type == 'walking') echo 'selected = "selected"'; ?>>Walking</option>
            <option value="jogging" <?php if (!empty($exercise_type) && $exercise_type == 'jogging') echo 'selected = "selected"'; ?>>Jogging</option>
            <option value="running" <?php if (!empty($exercise_type) && $exercise_type == 'running') echo 'selected = "selected"'; ?>>Running</option>
            <option value="cycling" <?php if (!empty($exercise_type) && $exercise_type == 'cycling') echo 'selected = "selected"'; ?>>Cycling</option>
        </select><br />

        <label for="exerciseDuration">Duration:</label>
        <input type="exerciseDuration" id="exerciseDuration" name="exerciseDuration" placeholder="Duration in Minutes" 
               required="required" pattern="^(0|[1-9]\d*)(\.\d+)?$"
               oninvalid="setCustomValidity('Whoops! Try entering numerals here.')" oninput="setCustomValidity('')"
               value="<?php if (!empty($exercise_duration)) echo $exercise_duration; ?>" /><br />

        <label for="heartRate">Heart Rate:</label>
        <input type="text" id="heartRate" name="heartRate" placeholder="Average BPM" 
               required="required" pattern="^(0|[1-9]\d*)(\.\d+)?$" 
               oninvalid="setCustomValidity('Whoops! Try entering numerals here.')" oninput="setCustomValidity('')"
               value="<?php if (!empty($heart_rate)) echo $heart_rate; ?>" /><br />
               
    </fieldset>
    <input id="submit" type="submit" value="Log Exercise" name="submit" />
</form>

<?php
    require_once('footer.php');
?>
