<?php
    require_once('startsession.php');

    $page_title = "Edit Profile";

    require_once('header.php');

    require_once('appvars.php');
    require_once('connectvars.php');

    require_once('navmenu.php');

    // Make sure the user is logged in
    if (!isset($_SESSION['user_id'])) 
    {
        echo '<p class="info">Please <a href="login.php">log in</a> to access this page.</p>';
        exit();
    }

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die("The database connection failed, but that doesn't mean YOU should give up!");

    if (isset($_POST['submit'])) 
    {

        // Get the user's entries from the edit profile form
        $first_name = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
        $last_name = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
        $gender = mysqli_real_escape_string($dbc, trim($_POST['gender']));
        $birthdate = mysqli_real_escape_string($dbc, trim($_POST['birthdate']));
        $weight = (float)mysqli_real_escape_string($dbc, trim($_POST['weight']));
        $old_picture = mysqli_real_escape_string($dbc, trim($_POST['old_picture']));
        $new_picture = mysqli_real_escape_string($dbc, trim($_FILES['new_picture']['name']));
        $new_picture_type = $_FILES['new_picture']['type'];
        $new_picture_size = $_FILES['new_picture']['size']; 
        $error = false;

        // Make sure the optional profile picture is the right size/tile type
        if (!empty($new_picture)) 
        {
            list($new_picture_width, $new_picture_height) = getimagesize($_FILES['new_picture']['tmp_name']);

            if ((($new_picture_type == 'image/gif') || ($new_picture_type == 'image/jpeg') || ($new_picture_type == 'image/pjpeg') ||
                ($new_picture_type == 'image/png')) && ($new_picture_size > 0) && ($new_picture_size <= MM_MAXFILESIZE) &&
                ($new_picture_width <= MM_MAXIMGWIDTH) && ($new_picture_height <= MM_MAXIMGHEIGHT)) 
            {
                if ($_FILES['new_picture']['error'] == 0) 
                {
                    $target = MM_UPLOADPATH . basename($new_picture);
                    if (move_uploaded_file($_FILES['new_picture']['tmp_name'], $target)) 
                    {
                        if (!empty($old_picture) && ($old_picture != $new_picture)) 
                        {
                            @unlink(MM_UPLOADPATH . $old_picture);
                        }
                    }
                    else 
                    {

                        @unlink($_FILES['new_picture']['tmp_name']);
                        $error = true;
                        echo '<p class="error">Sorry, there was a problem uploading your picture.</p>';

                    }
                }
            }
            else 
            {

                @unlink($_FILES['new_picture']['tmp_name']);
                $error = true;
                echo '<p class="error">Your picture must be a GIF, JPEG, or PNG image file no greater than ' . (MM_MAXFILESIZE / 1024)
                        . ' KB and ' . MM_MAXIMGWIDTH . 'x' . MM_MAXIMGHEIGHT . ' pixels in size.</p>';

            }
        }

        // Update the user's profile info in the exercise_user table
        if (!$error) 
        {
            if (!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($birthdate) && !empty($weight)) 
            {
                if (!empty($new_picture)) 
                {
                    $query = "UPDATE exercise_user SET first_name = '$first_name', last_name = '$last_name', gender = '$gender', " .
                            " birthdate = '$birthdate', weight = '$weight', picture = '$new_picture' WHERE user_id = '" . $_SESSION['user_id'] . "'";
                }
                else 
                {
                    $query = "UPDATE exercise_user SET first_name = '$first_name', last_name = '$last_name', gender = '$gender', " .
                            " birthdate = '$birthdate', weight = '$weight' WHERE user_id = '" . $_SESSION['user_id'] . "'";
                }
                mysqli_query($dbc, $query)
                        or die("Rats! This query fell off the treadmill!");

                echo '<p class="info">Your profile has been successfully updated. Would you like to <a href="viewprofile.php">view your profile</a>?</p>';

                mysqli_close($dbc);
                exit();
            }
            else 
            {
                echo '<p id="profileError">You must enter all of the profile data (the picture is optional).</p>';
            }
        }
    } 
    else 
    {
        
        $query = "SELECT first_name, last_name, gender, birthdate, weight, picture FROM exercise_user WHERE user_id = '" . $_SESSION['user_id'] . "'";
        $data = mysqli_query($dbc, $query)
                or die("Rats! This query fell off the treadmill!");
        $row = mysqli_fetch_array($data);

        if ($row != NULL) 
        {

            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $gender = $row['gender'];
            $birthdate = $row['birthdate'];
            $weight = $row['weight'];
            $old_picture = $row['picture'];

        }
        else 
        {
            echo '<p class="error">There was a problem accessing your profile.</p>';
        }
    }

    mysqli_close($dbc);
?>

    <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />
        <fieldset>
            <legend>Personal Information</legend>

            <label for="firstname">First name:</label>
            <input type="text" id="firstname" name="firstname" value="<?php if (!empty($first_name)) echo $first_name; ?>" /><br />

            <label for="lastname">Last name:</label>
            <input type="text" id="lastname" name="lastname" value="<?php if (!empty($last_name)) echo $last_name; ?>" /><br />

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required="required">
                <option value="M" <?php if (!empty($gender) && $gender == 'M') echo 'selected = "selected"'; ?>>Male</option>
                <option value="F" <?php if (!empty($gender) && $gender == 'F') echo 'selected = "selected"'; ?>>Female</option>
            </select><br />

            <label for="birthdate">Birthdate:</label>
            <input type="date" id="birthdate" name="birthdate" required="required" value="<?php if (!empty($birthdate)) echo $birthdate; else echo 'YYYY-MM-DD'; ?>" /><br />

            <label for="city">Weight:</label>
            <input type="text" id="weight" name="weight" required="required" pattern="^(0|[1-9]\d*)(\.\d+)?$" 
                oninvalid="setCustomValidity('Whoops! Try entering numerals here.')" oninput="setCustomValidity('')" 
                value="<?php if (!empty($weight)) echo $weight; ?>" /><br />

            <input type="hidden" name="old_picture" value="<?php if (!empty($old_picture)) echo $old_picture; ?>" />
            <label for="new_picture">Picture:</label>

            <input type="file" id="new_picture" name="new_picture" />
            <?php if (!empty($old_picture)) 
            {
                echo '<img class="profile" src="' . MM_UPLOADPATH . $old_picture . '" alt="Profile Picture" />';
            } ?>
            
        </fieldset>
        <input id="submit" type="submit" value="Save Profile" name="submit" />
    </form>

<?php 
    require_once('footer.php');
?>