<?php

    require_once('utilities/startsession.php');

    $page_title = 'Sign Up';

    require_once('templates/header.php');

    require_once('templates/navmenu.php');

    require_once('utilities/appvars.php');
    require_once('utilities/connectvars.php');

    session_start();

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die("The database connection failed.");

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

                $query = "SELECT * FROM student_list WHERE username = '$username'";
                $data = mysqli_query($dbc, $query)
                        or die("The student data is not available at this time.");

                if (mysqli_num_rows($data) == 0) 
                {
                    $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
                    $query = "INSERT INTO student_list (username, password) "
                            . "VALUES ('$username', '$hashed_password')";
                    mysqli_query($dbc, $query)
                            or die("We could not insert the new student");

                    // set the student's session so they're logged in

                    $_SESSION['student_id'] = mysqli_insert_id($dbc);
                    $_SESSION['username'] = $username;
                    setcookie('student_id', mysqli_insert_id($dbc), time() + (60 * 60 * 24 * 30));
                    setcookie('username', $username, time() + (60 * 60 * 24 * 30));
                    
                    echo('<div class="jumbotron mt-2 bg-header"><h1 class="text-center page-title">You\'re all set!</h1>'
                            . '<p class="text-center secondary-page-title">All you have to do now is '
                            . '<a href="editprofile.php" class="text-info">set up '
                            . 'your profile</a>!</p></div>');

                    mysqli_close($dbc);
                    exit();
                }
                else
                {
                    echo '<div class="container text-center error mt-3">Bats! An account already exists for this username. '
                            . 'Please do try again!</div>';
                    $username = "";
                }
            }
            else 
            {
                echo '<div class="container text-center error mt-3">Woah, nelly! It looks like those passwords didn\'t match. Try again!</div>';
            }
    }

    mysqli_close($dbc);
?>

    <div class="jumbotron mt-2 bg-header">
        <h1 class="text-center page-title">Welcome!</h1>
        <p class="text-center secondary-page-title">We're glad you're here.</p>
        <p class="text-center secondary-page-title">Before you sign up, you might want to take a look at <a href="rules.php" class="text-info">THE CHALLENGE RULES</a> if you haven't already...</p>
    </div>

    <div class="container col-4 p-5 form-box">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation" novalidate>
            
            <fieldset>
                <legend class="text-center">Challenge Accepted!</legend>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username" maxlength="40" value="<?php if (!empty($username)) echo $username; ?>" placeholder="preferred username" required />
                    <div class="valid-feedback">Good to Go!</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <div class="form-group">
                    <label for="password1">Password</label>
                    <input class="form-control" type="password" id="password1" name="password1" placeholder="enter password" required onkeyup='check();' />
                    <div class="valid-feedback">Good to Go!</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input class="form-control" type="password" id="password2" name="password2" placeholder="re-enter password" required onkeyup='check();' />
                    <span id='message'></span>
                    <div class="valid-feedback">Good to Go!</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div> 
            </fieldset>

            <div class="form-group text-center">
                <input class="btn btn-teal m-4 col-4 text-light" id="submit" type="submit" value="Sign Up" name="submit" />
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

    <script>
        var check = function() {
            if (document.getElementById('password1').value ==
                document.getElementById('password2').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Your passwords match!';
            } else {
                    document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Ruh-roh! These passwords don\'t match!';
            }
        }
    </script>

<?php
    require_once('templates/footer.php');
?>