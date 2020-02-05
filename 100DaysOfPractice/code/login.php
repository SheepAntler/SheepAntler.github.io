<?php
    require_once('utilities/connectvars.php');

    session_start();

    $error_msg = "";

    if (!isset($_SESSION['student_id']))
    {
        if (isset($_POST['submit'])) 
        {

            // Compare the user's login information with the information in the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die("The database connection failed, but that doesn't mean YOU should give up!");

            $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
            $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

            if (!empty($user_username) && !empty($user_password))
            {

                $query = "SELECT * FROM student_list WHERE username = '$user_username'";

                $data = mysqli_query($dbc, $query)
                        or die("The student data is not available at this time.");
                
                // Verify that the user's login info checks out, and save their session.
                if (mysqli_num_rows($data) == 1)
                {

                    $row = mysqli_fetch_array($data);

                    mysqli_close($dbc);
                    
                    if (password_verify($user_password, $row['password']))
                    {
                        $_SESSION['student_id'] = $row['student_id'];
                        $_SESSION['username'] = $row['username'];
                        setcookie('student_id', $row['student_id'], time() + (60 * 60 * 24 * 30));
                        setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));
                        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
                        header('Location: ' . $home_url);
                    } 
                    else 
                    {
                        $error_msg = 'Whoops! You entered an invalid password.';
                    }

                }
                else 
                {
                    $error_msg = 'Whoops! You enterd an invalid username.';
                }
            }
            else 
            {
                $error_msg = 'No coffee yet today? Looks like You forgot to enter your username and/or password.';
            }   
        }
    }
?>

<?php
    $page_title = 'Log In';

    require_once('templates/header.php');

    // If no session is set, show an error message and the login form 
    if (empty($_SESSION['student_id'])) 
    {
        echo '<div class="container text-center error"><p>' . $error_msg . '</p></div>';
?>

    <div class="jumbotron bg-header">
        <h1 class="text-center page-title">Log In</h1>
        <p class="text-center secondary-page-title">Don't have an account yet? Join the challenge <a href="signup.php" class="text-info">here</a>!</p>
    </div>

    <div class="container col-4 p-5 form-box">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation" novalidate>
            <fieldset>
                <legend class="text-center">Student Log In</legend>

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" maxlength="40" value="<?php if (!empty($user_username)) echo $user_username; ?>" required />
                <div class="valid-feedback">Good to Go!</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" required />
                <div class="valid-feedback">Good to Go!</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            </fieldset>
            <div class="form-group text-center">
                <input class="btn btn-teal m-4 col-4 text-light" id="submit" type="submit" value="Log In" name="submit" />
            </div>
        </form>
    </div>
    
<?php
    }
    else 
    {
        // Confirm the log-in once it is successful
        echo('<div class="info-container col-5 p-5 text-center mr-auto ml-auto">You are logged in as ' . $_SESSION['username'] . '.</div>');
    }
?>

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