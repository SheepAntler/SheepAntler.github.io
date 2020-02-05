<?php
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

    // Find the activity the user wants to remove
    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
    }
    else if (isset($_POST['id']))
    {
        $id = $_POST['id'];
    }
    else
    {
        echo '<p class="error">Sorry, no activity was specified for removal.</p>';
    }

    // Verify that the user really DOES want to remove the selected activity, and then delete it
    if (isset($_POST['submit']))
    {
        if ($_POST['confirm'] == 'Yes')
        {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die("This is a mighty elusive database connection!");
            $query = "DELETE FROM exercise_log WHERE id = $id LIMIT 1";
            mysqli_query($dbc, $query)
                    or die("Rats! This query fell off the treadmill!");
            mysqli_close($dbc);

            echo '<p class="info">Your selected activity was successfully removed!';
        }
        else
        {
            echo '<p class="error">Sorry! Your activity was not removed.</p>';
        }
    }

    else if (isset($id))
    {
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die("This is a mighty elusive database connection!");

        $query = "SELECT * FROM exercise_log WHERE id = $id LIMIT 1";

        $data = mysqli_query($dbc, $query)
                or die("Rats! This query fell off the treadmill!");

        $row = mysqli_fetch_array($data);

        $exercise_type = $row['exercise_type'];
        $date = $row['date'];
        $exercise_duration = $row['time_in_minutes'];
        $heart_rate = $row['heart_rate'];
        $calories = $row['calories'];

        echo '<p class="info">Are you sure you want to delete the following activity?</p>';
        echo '<p id="profileError"><strong>Activity: </strong>' . $exercise_type . '<br /><strong>Date: </strong>' . $date
                . '</p>';
        echo '<form method="post" action="removeactivity.php">';
        echo '<input type="radio" class="confirm" name="confirm" value="Yes" /> Yes ';
        echo '<input type="radio" class="confirm" name="confirm" value="No" checked="checked" /> No <br />';
        echo '<input type="submit" name="submit" value="Submit" />';
        echo '<input type="hidden" name="id" value="' . $id . '" />';
        echo '<input type="hidden" name="date" value="' . $date . '" />';
        echo '<input type="hidden" name="exercise_type" value="' . $exercise_type . '" />';
        echo '<input type="hidden" name="exercise_duration" value="' . $exercise_duration . '" />';
        echo '<input type="hidden" name="heart_rate" value="' . $heart_rate . '" />';
        echo '<input type="hidden" name="calories" value="' . $calories . '" />';

        echo '</form>';
    }

    echo '<p class="info"><a href="viewprofile.php">&lt;&lt; Tally Ho! To my profile!</a></p>';
?>

</body>
</html>
