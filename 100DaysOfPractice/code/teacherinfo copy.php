<?php

    require_once('utilities/authorize.php');

    $page_title = 'Studio Leaderboards';

    require_once('templates/header.php');

    require_once('utilities/appvars.php');
    require_once('utilities/connectvars.php');

    require_once('templates/navmenu.php');

?>

    <div class="jumbotron mt-5 bg-header">
        <h1 class="text-center page-title">Teacher Features</h1>
        <p class="text-center secondary-page-title">Studio Leaderboards and Practice Log Search</p>
    </div>

<?php

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die("The database connection failed, but that doesn't mean YOU should give up!");

    $query = "SELECT * FROM student_list ORDER BY practice_counter DESC";

    $data = mysqli_query($dbc, $query)
            or die("This query failed.");

    echo '<div class="container">';
    echo '<h2 class="text-center bg-dark p-3 table-banner">Studio Leaderboard</h2>';
    echo '<table class="table table-striped table-dark text-center teacher-table">';
    echo '<tr><th class="th">Student Name</th><th class="th">Practice Sessions</th></tr>';

    while ($row = mysqli_fetch_array($data))
    {
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $practice_counter = $row['practice_counter'];

        echo '<tr><td>' . $first_name . ' ' . $last_name . '</td>';
        echo '<td>' . $practice_counter . '</td></tr>';

    }
    echo '</table>';
    echo '</div>';

?>

    <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>

            <legend>Find-A-Log-O-Matic!</legend>

            <p>Whose Practice Log would you like to see?</p>

            <label for="studentFirstName">First Name: </label>         
            <input type="text" id="studentFirstName" name="studentFirstName" required="required" value="<?php if (!empty($student_first_name)) echo $student_first_name; ?>" />
            <br />

            <label for="studentLastName">Last Name: </label>         
            <input type="text" id="studentLastName" name="studentLastName" required="required" value="<?php if (!empty($student_last_name)) echo $student_last_name; ?>" />
            <br />

            <input id="submit" type="submit" value="Search" name="submit" />

        </fieldset>
    </form>

<?php

    if (isset($_POST['submit']))
    {
        // get the teacher's search names 
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
                    or die("This query failed." . mysqli_error($dbc));
 
            echo '<div class="container">';
            echo '<h2 class="text-center text-light bg-dark p-2 table-banner">Student Log</h2>';
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
    
        }
        else 
        {
            echo '<p>That student does not exist!</p>';
        }

    }
    else 
    {
        $student_first_name = "";
        $student_last_name = "";
    }

    //require_once('templates/footer.php');

?>


