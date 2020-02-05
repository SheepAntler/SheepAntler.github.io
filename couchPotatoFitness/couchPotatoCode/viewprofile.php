<?php
    require_once('startsession.php');

    $page_title = 'View Profile';

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

    // Get the user's personal information from the exercise_user/exercise_log tables
    if (!isset($_GET['user_id'])) 
    {
        $query1 = "SELECT username, first_name, last_name, gender, birthdate, weight, picture FROM exercise_user WHERE user_id = '" . $_SESSION['user_id'] . "'";
        $query2 = "SELECT * FROM exercise_log WHERE user_id = '" . $_SESSION['user_id'] . "' ORDER BY id DESC LIMIT 15";
    }
    else 
    {
        $query1 = "SELECT username, first_name, last_name, gender, birthdate, weight, picture FROM exercise_user WHERE user_id = '" . $_GET['user_id'] . "'";
        $query2 = "SELECT * FROM exercise_log WHERE user_id = '" . $_GET['user_id'] . "' ORDER BY id DESC LIMIT 15";
    }
    $data1 = mysqli_query($dbc, $query1)
            or die("Rats! This query fell off the treadmill!");
    $data2 = mysqli_query($dbc, $query2)
            or die("Rats! This query fell off the treadmill!");

    if (mysqli_num_rows($data1) == 1) 
    {
        // Display the user's personal data
        $row = mysqli_fetch_array($data1);
        echo '<table id="profileTable">';
        if (!empty($row['username'])) 
        {
            echo '<tr><td class="label">Username:</td><td>' . $row['username'] . '</td></tr>';
        }
        if (!empty($row['first_name'])) 
        {
            echo '<tr><td class="label">First name:</td><td>' . $row['first_name'] . '</td></tr>';
        }
        if (!empty($row['last_name'])) 
        {
            echo '<tr><td class="label">Last name:</td><td>' . $row['last_name'] . '</td></tr>';
        }
        if (!empty($row['gender'])) 
        {
            echo '<tr><td class="label">Gender:</td><td>';
            if ($row['gender'] == 'M') 
            {
                echo 'Male';
            }
            else if ($row['gender'] == 'F') {
                echo 'Female';
            }
            else 
            {
                echo '?';
            }
            echo '</td></tr>';
        }
        if (!empty($row['birthdate'])) 
        {
            if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) 
            {
                echo '<tr><td class="label">Birthdate:</td><td>' . $row['birthdate'] . '</td></tr>';
            }
            else 
            {
                list($year, $month, $day) = explode('-', $row['birthdate']);
                echo '<tr><td class="label">Year born:</td><td>' . $year . '</td></tr>';
            }
        }
        if (!empty($row['weight'])) 
        {
            echo '<tr><td class="label">Weight (lbs):</td><td>' . $row['weight'] . '</td></tr>';
        }
        if (!empty($row['picture'])) 
        {
            echo '<tr><td class="label">Picture:</td><td><img src="' . MM_UPLOADPATH . $row['picture']
                    . '" alt="Profile Picture" /></td></tr>';
        }
        echo '</table>';

        // Display the user's exercise data
        echo '<table id="exerciseTable">';
        echo '<tr><th>Date</th><th>Activity</th><th>Duration</th><th>Heart Rate</th><th>Calories Burned</th><th>Remove</th></td>';
        while ($row = mysqli_fetch_array($data2)) 
        {
            $id = $row['id'];
            $date = $row['date'];
            $exercise_type = $row['exercise_type'];
            $exercise_duration = $row['time_in_minutes'];
            $heart_rate = $row['heart_rate'];
            $calories = $row['calories'];

            echo '<tr><td>' . $date . '</td><td>' . $exercise_type . '</td><td>' . $exercise_duration . ' minutes</td><td>'
                    . $heart_rate . ' bpm</td><td>' . $calories . '</td>';
            echo '<td><a href="removeactivity.php?id=' . $id . '">&#x1F5D1;</a></td></tr>';
        }
        echo '</table>';

        if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) 
        {
            echo '<nav class="bottomNav"><p>Would you like to <a href="editprofile.php">edit your profile</a> or <a href="exerciselog.php">log your exercise</a>?</p></nav>';
        }
    }
    else 
    {
        echo '<p class="error">There was a problem accessing your profile.</p>';
    }

    mysqli_close($dbc);
?>

<?php 
    require_once('footer.php');
?>