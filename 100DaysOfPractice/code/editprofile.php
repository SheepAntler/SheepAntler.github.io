<?php
    require_once('utilities/startsession.php');

    $page_title = "Edit Profile";

    require_once('templates/header.php');

    require_once('utilities/appvars.php');
    require_once('utilities/connectvars.php');

    require_once('templates/navmenu.php');

    // Make sure the user is logged in
    if (!isset($_SESSION['student_id'])) 
    {
        echo '<div class="info-container col-5 p-5 text-center mr-auto ml-auto">Looking for your practice log? You have to <a href="login.php"><i>LOG</i> in</a>!</div>';
        exit();
    }
?>

    <div class="jumbotron mt-5 bg-header">
        <h1 class="text-center page-title">Ch-ch-ch-ch-CHANGES</h1>
        <p class="text-center secondary-page-title">New book? New haircut? New age? No problem!</p>
    </div>

<?php

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die("The database connection failed.");

    if (isset($_POST['submit'])) 
    {

        // Get the user's entries from the edit profile form
        $first_name = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
        $last_name = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
        $age = mysqli_real_escape_string($dbc, trim($_POST['age']));
        $suzuki_book = mysqli_real_escape_string($dbc, trim($_POST['suzukiBook']));
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
                        echo '<div class="container text-center error">Your picture was not uploaded. Please try again.</div>';

                    }
                }
            }
            else 
            {

                @unlink($_FILES['new_picture']['tmp_name']);
                $error = true;
                echo '<div class="container text-center error">Your picture must be a GIF, JPEG, or PNG image file no greater than ' . (MM_MAXFILESIZE / 1024)
                        . ' KB and ' . MM_MAXIMGWIDTH . 'x' . MM_MAXIMGHEIGHT . ' pixels in size.</div>';

            }
        }

        // Update the user's profile info in the exercise_user table
        if (!$error) 
        {
            if (!empty($first_name) && !empty($last_name) && !empty($age) && !empty($suzuki_book)) 
            {
                if (!empty($new_picture)) 
                {
                    $query = "UPDATE student_list SET first_name = '$first_name', last_name = '$last_name', age = '$age', " .
                            " suzuki_book = '$suzuki_book', picture = '$new_picture' WHERE student_id = '" . $_SESSION['student_id'] . "'";
                }
                else 
                {
                    $query = "UPDATE student_list SET first_name = '$first_name', last_name = '$last_name', age = '$age', " .
                            " suzuki_book = '$suzuki_book' WHERE student_id = '" . $_SESSION['student_id'] . "'";

                }
                mysqli_query($dbc, $query)
                        or die("Rats! This query fell off the treadmill!");

                echo '<div class="info-container col-5 p-5 text-center mr-auto ml-auto">Your profile has been successfully updated. Would you like to <a href="viewprofile.php" class="text-info">view your profile</a>?</div>';

                mysqli_close($dbc);
                exit();
            }
            else 
            {
                echo '<div class="container text-center error">All profile data must be entered to continue.</div>';
            }
        }
    } 
    else 
    {
        
        $query = "SELECT first_name, last_name, age, suzuki_book, picture FROM student_list WHERE student_id = '" . $_SESSION['student_id'] . "'";
        $data = mysqli_query($dbc, $query)
                or die("Rats! This query fell off the treadmill!");
        $row = mysqli_fetch_array($data);

        if ($row != NULL) 
        {

            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $age = $row['age'];
            $suzuki_book = $row['suzuki_book'];
            $old_picture = $row['picture'];

        }
        else 
        {
            echo '<div class="container text-center error">There was a problem accessing your profile.</div>';
        }
    }

    mysqli_close($dbc);
?>

    <div class="container col-4 p-5 form-box">
        <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation" novalidate>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />
            <fieldset>
                <legend class="text-center">Student Information</legend>

                <div class="form-group">
                    <label for="firstname">First name</label>
                    <input class="form-control" type="text" id="firstname" name="firstname" pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" value="<?php if (!empty($first_name)) echo $first_name; ?>" required />
                    <div class="valid-feedback">Good to Go!</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <div class="form-group">
                    <label for="lastname">Last name</label>
                    <input class="form-control" type="text" id="lastname" name="lastname" pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" value="<?php if (!empty($last_name)) echo $last_name; ?>" required />
                    <div class="valid-feedback">Good to Go!</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input class="form-control" type="text" id="age" name="age" pattern="^(0|[1-9]\d*)(\.\d+)?$" value="<?php if (!empty($age)) echo $age; ?>" required />
                    <div class="valid-feedback">Good to Go!</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <div class="form-group">
                    <label for="suzukiBook">Suzuki Book</label>
                    <select class="form-control" id="suzukiBook" name="suzukiBook" value="<?php if (empty($suzuki_book)) echo "Select your Suzuki Book"; ?>" required />
                        <option value="" disabled selected>Select your Suzuki Book</option>
                        <option value="preTwinkle" <?php if (!empty($suzuki_book) && $suzuki_book == 'preTwinkle') echo 'selected = "selected"'; ?>>Pre-Twinkle</option>
                        <option value="1" <?php if (!empty($suzuki_book) && $suzuki_book == '1') echo 'selected = "selected"'; ?>>1</option>
                        <option value="2" <?php if (!empty($suzuki_book) && $suzuki_book == '2') echo 'selected = "selected"'; ?>>2</option>
                        <option value="3" <?php if (!empty($suzuki_book) && $suzuki_book == '3') echo 'selected = "selected"'; ?>>3</option>
                        <option value="4" <?php if (!empty($suzuki_book) && $suzuki_book == '4') echo 'selected = "selected"'; ?>>4</option>
                        <option value="5" <?php if (!empty($suzuki_book) && $suzuki_book == '5') echo 'selected = "selected"'; ?>>5</option>
                        <option value="6" <?php if (!empty($suzuki_book) && $suzuki_book == '6') echo 'selected = "selected"'; ?>>6</option>
                        <option value="7" <?php if (!empty($suzuki_book) && $suzuki_book == '7') echo 'selected = "selected"'; ?>>7</option>
                        <option value="8" <?php if (!empty($suzuki_book) && $suzuki_book == '8') echo 'selected = "selected"'; ?>>8</option>
                    </select>
                    <div class="valid-feedback">Good to Go!</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>  

                <div class="form-group">
                    <input class="form-control" type="hidden" name="old_picture" value="<?php if (!empty($old_picture)) echo $old_picture; ?>" />
                    <label for="new_picture">Picture <i>(optional)</i></label>
                    
                    <input class="form-control" type="file" id="new_picture" name="new_picture" />
                    <?php if (!empty($old_picture)) 
                    {
                        echo '<img class="mt-4" src="' . MM_UPLOADPATH . $old_picture . '" alt="Profile Picture" />';
                    } ?>
                </div>

            </fieldset>

            <div class="form-group text-center">
                <input class="btn btn-teal m-4 col-4 text-light" id="submit" type="submit" value="Save Profile" name="submit" />
            </div>
        </form>
    </div>

    <script>
        (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();
    </script>

<?php 
    require_once('templates/footer.php');
?>