<?php

    $page_title = 'Sign Up';

    require_once('header.php');

    require_once('appvars.php');
    require_once('connectvars.php');

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die("The database connection failed, but that doesn't mean YOU should give up!");

    // Get the data the user entered into the sign-up form
    if (isset($_POST['submit'])) 
    {

        $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
        $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
        $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));

            // Make sure the chosen username doesn't already exist in the database
            if (!empty($username) && !empty($password1) && !empty($password2) 
                    && ($password1 == $password2))
            {

                $query = "SELECT * FROM exercise_user WHERE username = '$username'";
                $data = mysqli_query($dbc, $query)
                        or die("Rats! This query fell off the treadmill!");

                if (mysqli_num_rows($data) == 0) 
                {
                    $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
                    $query = "INSERT INTO exercise_user (username, password) "
                            . "VALUES ('$username', '$hashed_password')";
                    mysqli_query($dbc, $query)
                            or die("Rats! This query fell off the treadmill!");
                    
                    echo('<p class="signUp">Your new account has been successfully created. You\'re '
                            . 'now ready to log in and <a href="editprofile.php">Edit '
                            . 'your profile</a>!</p>');

                    mysqli_close($dbc);
                    exit();
                }
                else
                {
                    echo '<p class="error">An account already exists for this username. '
                            . 'Please choose a different address.</p>';
                    $username = "";
                }
            }
            else 
            {
                echo '<p class="error">Sorry, friend. You\'ve got to enter all of the '
                        . 'sign-up data, including your desired password twice.</p>';
            }
    }

    mysqli_close($dbc);
?>

    <div id="signUpForm">
    <h3 class="heading">Become a Couch Potato: Start Logging Today!</h3>
    <p class="info">Please enter your preferred username and password to sign up for a Couch Potato account.</p>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
        <legend>Registration Info</legend>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
        <label for="password1">Password:</label>
        <input type="password" id="password1" name="password1" /><br />
        <label for="password2">Password (retype):</label>
        <input type="password" id="password2" name="password2" /><br />
        </fieldset>
        <input id="submit" type="submit" value="Sign Up" name="submit" />
    </form>
    </div>

<?php
    require_once('footer.php');
?>