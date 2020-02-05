<?php

    require_once('utilities/authorize.php');

    $page_title = 'Studio Leaderboards';

    require_once('templates/header.php');

    require_once('utilities/appvars.php');
    require_once('utilities/connectvars.php');

?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-4">
        <a class="navbar-brand" href="index.php">100 Days of Practice</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarNavAltMarkup" class="collapse navbar-collapse">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="rules.php">Rulebook</a>
                <a class="nav-item nav-link" href="signup.php">Create a Student Account</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="teacherinfo.php">Refresh Page</a>
            </div>
        </div>
    </nav>


    <div class="jumbotron mt-5 bg-header">
        <h1 class="text-center page-title">Teacher Features</h1>
        <p class="text-center secondary-page-title">Studio Leaderboards and Practice Log Search</p>
    </div>

<?php

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die("The database connection failed.");

    $query = "SELECT * FROM student_list ORDER BY practice_counter DESC";

    $data = mysqli_query($dbc, $query)
            or die("This query failed.");

    echo '<div class="container mt-5 col-10">';
    echo '<h2 class="text-center bg-dark p-3 table-banner">Studio Leaderboard</h2>';
    echo '<table class="table table-striped table-dark text-center teacher-table">';
    echo '<tr><th class="th">Student Name</th><th class="th">Practice Sessions</th><th class="th">Practice Log</th><th class="th">Remove Student</th></tr>';

    while ($row = mysqli_fetch_array($data))
    {
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $practice_counter = $row['practice_counter'];
        $id = $row['student_id'];
?>

        <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php
        echo '<tr><td>' . $first_name . ' ' . $last_name . '</td>';
        echo '<td>' . $practice_counter . '</td>';
?>
                <td>
                    <input type="hidden" id="studentFirstName" name="studentFirstName" required="required" value="<?php echo $first_name; ?>"/>

                    <input type="hidden" id="studentLastName" name="studentLastName" required="required" value="<?php echo $last_name; ?>" />

                    <input id="submit" type="submit" value="View Log" name="submit" />
                </td>

<?php
                echo '<td><a href="removestudent.php?id='. $id . '">Remove</a></td>';
?>

            </tr>
        </form>

<?php
    }
    echo '</table>';
    echo '</div>';

    if (isset($_POST['submit']))
    {
        // get the name of the student from the teacher's request
        $student_first_name = mysqli_real_escape_string($dbc, trim($_POST['studentFirstName']));
        $student_last_name = mysqli_real_escape_string($dbc, trim($_POST['studentLastName']));

        // get all of the student's practice log data 
        $id_query = "SELECT student_id FROM student_list WHERE first_name = '" . $student_first_name 
                . "' AND last_name = '" . $student_last_name . "' LIMIT 1";

        $find_id = mysqli_query($dbc, $id_query)
                or die("could not find id");

        $id_row = mysqli_fetch_array($find_id);

        if ($id_row != null)
        {
            $student_id = $id_row['student_id'];

            $search_query = "SELECT * FROM practice_log WHERE student_id = '" . $student_id . "' ORDER BY practice_date DESC";

            $log_data = mysqli_query($dbc, $search_query)
                    or die("This query failed.");
 
            echo '<div class="container mt-5 col-10">';
            echo '<h2 class="text-center text-light bg-dark p-2 table-banner"> ' . $student_first_name .'\'s Log</h2>';
            echo '<table class="table table-striped table-dark text-center teacher-table">';
            echo '<tr><th class="th">Date</th><th class="th">Duration</th><th class="th">Description</th></tr>';
                
            while ($log_row = mysqli_fetch_array($log_data))
            {
                $date = $log_row['practice_date'];
                $duration = $log_row['practice_duration'];
                $description = $log_row['practice_description'];
    
                echo'<tr><td>' . $date . '</td><td>' . $duration . '</td><td>' 
                        . $description . '</td></tr>';
    
            }

            echo '</table>';
            echo '</div>';

            mysqli_close($dbc);
    
        }
        else 
        {
            echo '<div class="container text-center error">That student does not exist!</div>';
        }
    }
    else 
    {
        $student_first_name = "";
        $student_last_name = "";
    }

    require_once('templates/footer.php');

?>


