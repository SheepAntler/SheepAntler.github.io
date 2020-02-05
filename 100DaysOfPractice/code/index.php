<?php
    require_once('utilities/startsession.php');

    $page_title = "Home";

    require_once('templates/header.php');

    require_once('utilities/appvars.php');
    require_once('utilities/connectvars.php');

    require_once('templates/navmenu.php');

    if (isset($_SESSION['student_id'])) 
    {
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die("The database connection failed."); 
        $query = "SELECT * FROM student_list WHERE student_id = '" . $_SESSION['student_id'] . "'";
        $data = mysqli_query($dbc, $query)
                or die("The student data is unavailable at this time.");
        $row = mysqli_fetch_array($data);
        mysqli_close($dbc);

        if ($row != NULL)
        {
            $first_name = $row['first_name'];
            $practice_count = $row['practice_counter'];
        }
        else 
        {
            echo '<p class="error">We\'re sorry! We encountered a problem and cannot access your profile.</p>';
        }

        echo '<div class="container p-5 text-center index-head index-head-logged">';
        echo '<h1 class="title">Welcome Back, ' . $first_name . '!</h1>';
        echo '<h2 class="secondary-title">Practice Count:</h2>';
        echo '<h2 class="counter">' . $practice_count . '</h2>';


        if ($practice_count == 0 || $practice_count < 25)
        {
            echo '<h3>Looks like you\'re just starting out. Good Luck!</h3>';
        }
        else if ($practice_count == 25) 
        {
            echo '<h3>You\'re a quarter of the way there! Good job!</h3>';
        }
        else if ($practice_count > 25 || $practice_count < 50)
        {
            echo '<h3>Keep up the good work--you\'ll be halfway through before you know it!</h3>';
        }
        else if ($practice_count == 50) 
        {
            echo '<h3>WAHOO! You\'re halfway there!</h3>';
        }
        else if ($practice_count > 50 || $practice_count < 75)
        {
            echo '<h3>You are doing an AWESOME job! Go, go, go!</h3>';
        }
        else if ($practice_count == 75)
        {
            echo '<h3>3/4 of the way there--Congratulations! You\'re almost finished!</h3>';
        }
        else if ($practice_count > 75 || $practice_count < 100)
        {
            echo '<h3>You\'re in the home stretch now! You can do it!</h3>';
        }
        else if ($practice_count == 100)
        {
            echo '<h3>Fantastic! What an accomplishment--I hope you\'re as proud of you as I am!</h3>';
        }


        echo '<div><div class="btn btn-black m-4 col-4"><a href="practicelogform.php" class="text-info">Log Today\'s Practice!</a></div></div>';
        echo '</div>';
    }
    else 
    {
        echo '<div class="container p-5 text-center index-head">';
        echo '<h1 class="title">100 Days of Practice</h1>';
        echo '<h2 class="mt-5 secondary-title">Are You Up for the Challenge?</h2>'; 
        echo '<div class="btn btn-black m-4 col-4"><a href="login.php" class="text-info">Log in</a></div>';
        echo '<div class="btn btn-black m-4 col-4"><a href="signup.php" class="text-info">Create an Account</a></div>';
        echo '</div>';
    }
?>

<?php
    require_once('templates/footer.php');
?>
