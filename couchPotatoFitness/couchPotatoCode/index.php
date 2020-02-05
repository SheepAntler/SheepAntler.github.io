<?php
    require_once('startsession.php');

    $page_title = "Home";

    require_once('header.php');

    require_once('appvars.php');
    require_once('connectvars.php');

    require_once('navmenu.php');

    if (isset($_SESSION['user_id'])) 
    {
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die("The database connection failed, but that doesn't mean YOU should give up!"); 
        $query = "SELECT first_name FROM exercise_user WHERE user_id = '" . $_SESSION['user_id'] . "'";
        $data = mysqli_query($dbc, $query)
                or die("Rats! This query fell off the treadmill!");
        $row = mysqli_fetch_array($data);

        if ($row != NULL)
        {
            $first_name = $row['first_name'];
        }
        else 
        {
            echo '<p class="error">We\'re sorry! We encountered a problem accessing your profile.</p>';
        }

        echo '<h1>&#129364;Welcome Back, ' . $first_name . '!&#129364;</h1>';
        echo '<div id="logActivityButton"><a href="exerciselog.php">Log Today\'s Activity</a></div>';
    }
    else 
    {
        echo '<h1>&#129364;Couch Potato&#129364;</h1>';
        echo '<h2 id="subtitle">A Fitness App for Fitness Freaks</h2>'; 
    }
?>

<?php
    require_once('footer.php');
?>
