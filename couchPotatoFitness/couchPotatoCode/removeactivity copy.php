<?php
    // get all scores and user data from the guitarwars table and display them as removable
    require_once('startsession.php');

    $page_title = 'Remove Activity';

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

    if (isset($_GET['id']) && isset($_GET['date']) && isset($_GET['exercise_type'])
            && isset($_GET['exercise_duration']) && isset($_GET['heart_rate']) && isset($_GET['calories']))
    {
        $id = $_GET['id'];
        $date = $_GET['date'];
        $exercise_type = $_GET['exercise_type'];
        $exercise_duration = $_GET['exercise_duration'];
        $heart_rate = $_GET['heart_rate'];
        $calories = $_GET['calories'];
    }
    else if (isset($_POST['id']) && isset($_POST['exercise_type']) && isset($_POST['exercise_date']) && isset($_POST['calories']))
    {
        $id = $_POST['id'];
        $date = $_POST['date'];
        $exercise_type = $_POST['exercise_type'];
        $calories = $_POST['calories'];
    }
    else
    {
        echo '<p class="error">Sorry, no activity was specified for removal.</p>';
    }
    if (isset($_POST['submit']))
    {
        if ($_POST['confirm'] == 'Yes')
        {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die("This is a mighty elusive database connection!");
            $query = "DELETE FROM exercise_log WHERE id = $id LIMIT 1";
            mysqli_query($dbc, $query)
                    or die('Rats! This query fell off the treadmill!' . mysqli_error($dbc));
            mysqli_close($dbc);

            echo '<p>Your entry: ' . $exercise_type . ' on ' . $exercise_date . ' was successfully removed!';
        }
        else
        {
            echo '<p class="error">Sorry! Your activity was not removed.</p>';
        }
    }
    // when a user is selected for removal, show a verification page
    else if (isset($id) && isset($date) && isset($exercise_type) && isset($exercise_duration)
            && isset($heart_rate) && isset($calories))
    {
        echo '<p>Are you sure you want to delete the following activity?</p>';
        echo '<p><strong>Activity: </strong>' . $exercise_type . '<br /><strong>Date: </strong>' . $date
                . '</p>';
        echo '<form method="post" action="removeactivity.php">';
        echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
        echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
        echo '<input type="submit" name="submit" value="Submit" />';
        echo '<input type="hidden" name="id" value="' . $id . '" />';
        echo '<input type="hidden" name="date" value="' . $date . '" />';
        echo '<input type="hidden" name="exercise_type" value="' . $exercise_type . '" />';
        echo '<input type="hidden" name="exercise_duration" value="' . $exercise_duration . '" />';
        echo '<input type="hidden" name="heart_rate" value="' . $heart_rate . '" />';
        echo '<input type="hidden" name="calories" value="' . $calories . '" />';

        echo '</form>';
    }
    echo '<p><a href="viewprofile.php">&lt;&lt; Tally Ho! To my profile!</a></p>';
?>

</body>
</html>
