<?php
    require_once('connectvars.php');

    session_start();

    $error_msg = "";

    if (!isset($_SESSION['user_id']))
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

                $query = "SELECT * FROM exercise_user WHERE username = '$user_username'";

                $data = mysqli_query($dbc, $query)
                        or die("Rats! This query fell off the treadmill!");
                
                // Verify that the user's login info checks out, and save their session.
                if (mysqli_num_rows($data) == 1)
                {

                    $row = mysqli_fetch_array($data);
                    
                    if (password_verify($user_password, $row['password']))
                    {
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['username'] = $row['username'];
                        setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));
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

    require_once('header.php');
    
    // If no session is set, show an error message and the login form 
    if (empty($_SESSION['user_id'])) 
    {
        echo '<p class="error">' . $error_msg . '</p>';
?>

    <div id="loginForm">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <legend>Log In</legend>

            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />

            <label for="password">Password:</label>
            <input type="password" name="password" />

        </fieldset>
        <input id="submit" type="submit" value="Log In" name="submit" />
    </form>
    </div>
    
<?php
    }
    else 
    {
        // Confirm the log-in once it is successful
        echo('<p class="signUp">You are logged in as ' . $_SESSION['username'] . '.</p>');
    }
?>

<?php 
    require_once('footer.php');
?>