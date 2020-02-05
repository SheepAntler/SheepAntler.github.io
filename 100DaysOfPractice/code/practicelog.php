<?php
    require_once('utilities/startsession.php');

    $page_title = 'View Profile';

    require_once('templates/header.php');

    require_once('utilities/appvars.php');
    require_once('utilities/connectvars.php');

    require_once('templates/navmenu.php');

    // Make sure the student is logged in
    if (!isset($_SESSION['student_id'])) 
    {
        echo '<div class="info-container col-5 p-5 text-center mr-auto ml-auto">Please <a href="login.php" class="text-info">log in</a> to access this page.</div>';
        exit();
    }

?>

    <div class="jumbotron mt-5 bg-header">
        <h1 class="text-center page-title">Practice Log</h1>
        <p class="text-center secondary-page-title">Here's what you've been up to...</p>
    </div>


<?php

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die("The database connection failed, but that doesn't mean YOU should give up!");

    // Get the student's data from the practice_log table 
    if (!isset($_GET['student_id']))
    {
        $query = "SELECT practice_date, practice_duration, practice_description FROM practice_log WHERE student_id = '" . $_SESSION['student_id'] . "' ORDER BY practice_date DESC";
    }
    else 
    {
        $query = "SELECT practice_date, practice_duration, practice_description FROM practice_log WHERE student_id = '" . $_GET['student_id'] . "' ORDER BY practice_date DESC";
    }

    $data = mysqli_query($dbc, $query)
            or die("We could not get the student's practice data");

    echo '<div class="container col-11">';
    echo '<table class="table table-striped table-dark text-center practice-table">';
    echo '<tr><th class="th">Date</th><th class="th">Practice Time</th><th class="th">You worked on:</th></tr>';

    while ($row = mysqli_fetch_array($data))
    {
        $date = $row['practice_date'];
        $duration = $row['practice_duration'];
        $description = $row['practice_description'];

        echo '<tr><td>' . $date . '</td><td>' . $duration . ' minutes</td><td>' . $description . '</td></tr>';
    }

    echo '</table>';
    echo '</div>';

    mysqli_close($dbc);
  
    require_once('templates/footer.php');

?>