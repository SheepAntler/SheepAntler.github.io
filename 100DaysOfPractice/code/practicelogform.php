<?php
    require_once('utilities/startsession.php');

    $page_title = 'Log Your Practice';

    require_once('templates/header.php');

    require_once('utilities/appvars.php');
    require_once('utilities/connectvars.php');

    require_once('templates/navmenu.php');

    // Make sure the user is logged in 
    if (!isset($_SESSION['student_id']))
    {
        echo '<div class="info-container col-5 p-5 text-center mr-auto ml-auto">Please <a href="login.php">log in</a> to access this page.</div>';
        exit();
    }
?>

    <div class="jumbotron mt-5 bg-header">
        <h1 class="text-center page-title">Log a Session</h1>
        <p class="text-center secondary-page-title">Whoop-de-doo! Good for You!</p>
    </div>

<?php

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die("The database connection failed, but that doesn't mean YOU should give up!");

    if (isset($_POST['submit']))
    {
        // Get the student's entries from the practice_log form 
        $practice_date = date("Y-m-d");
        $practice_duration = mysqli_real_escape_string($dbc, trim($_POST['practiceDuration']));
        $practice_description = mysqli_real_escape_string($dbc, trim($_POST['practiceDescription']));

        // Get the student's most recent previous practice date from the practice_log table
        $date_query = "SELECT * FROM practice_log WHERE student_id = '" . $_SESSION['student_id'] . "' ORDER BY practice_date DESC LIMIT 1";

        $find_date = mysqli_query($dbc, $date_query)
                or die("could not find date" . mysqli_error($dbc));

        $date_row = mysqli_fetch_array($find_date);

        // if the student already has practices logged...
        if ($date_row != null)
        {
            // get their most recent practice date from the database
            $last_practice_date = $date_row['practice_date'];

            // calculate how many hours have elapsed between practice sessions
            $new_practice_session = strtotime($practice_date);
            $old_practice_session = strtotime($last_practice_date);

            $hours_elapsed = abs($new_practice_session - $old_practice_session) / (60*60);

            // if the student is trying to log two practices in one day, remind them that that doesn't count!
            if ($last_practice_date == $practice_date)
            {
                echo '<div class="info-container col-5 p-5 text-center mr-auto ml-auto">Whoops! It looks like you\'ve already logged a practice for today. Try again tomorrow!<div class="btn btn-teal m-4 col-6"><a href="practicelog.php" class="text-light">View Log</a></div></div>';
            }
            // if the student has let more than 48 hours elapse between sessions, reset their counter to zero and explain why
            else if ($hours_elapsed >= 72)
            {
                echo '<div class="info-container col-7 p-5 text-center mr-auto ml-auto">Oh, dear. It looks like you\'ve taken more than one day off. Unfortunately, this means your practice '
                        . 'log has been cleared and your practice counter has been reset to 0. If you have questions about this, please consult <a href="rules.php" class="text-info">The Rules</a> before restarting the '
                        . '100 Days of Practice Challenge. It\'s okay; life is crazy, and we all fall off the horse sometimes! The important thing is getting <a href="practicelogform.php" class="text-info">back on the train</a>.</div>';
                
                $reset_query = "UPDATE student_list SET practice_counter = 0 WHERE student_id = '" . $_SESSION['student_id'] . "'";
                mysqli_query($dbc, $reset_query)
                        or die("Your counter could not be reset.");

                $delete_progress = "DELETE FROM practice_log WHERE student_id = '" . $_SESSION['student_id'] . "'";
                mysqli_query($dbc, $delete_progress)
                    or die("Your progress could not be deleted.");

                mysqli_close($dbc);
            }
            // otherwise, all must be well! save the student's practice in the database and increment their practice counter
            else 
            {

                // insert the new practice session and increment the student's practice count
                $log_new_session_query = "INSERT INTO practice_log (student_id, practice_date, practice_duration, practice_description) "
                        . "VALUES (" . $_SESSION['student_id'] . ", '$practice_date', '$practice_duration', '$practice_description')";

                mysqli_query($dbc, $log_new_session_query) 
                        or die("We could not log your new session");

                $increment_count_query = "UPDATE student_list SET practice_counter = practice_counter + 1 WHERE student_id = '" 
                        . $_SESSION['student_id'] . "'";

                mysqli_query($dbc, $increment_count_query)
                        or die("We could not increment your counter");

                mysqli_close($dbc);

                echo '<div class="info-container col-5 p-5 text-center mr-auto ml-auto">Another one in the books! Keep on keepin\' on.<div class="btn btn-teal m-4 col-6"><a href="practicelog.php" class="text-light">View Log</a></div></div>';
            }
        }
        // if the student has no practices logged yet, save their first practice session to the database and start their counter!
        else 
        {
            // update the student's practice log
            $insert_query = "INSERT INTO practice_log (student_id, practice_date, practice_duration, practice_description) "
                    . "VALUES (" . $_SESSION['student_id'] . ", '$practice_date', '$practice_duration', '$practice_description')";

            mysqli_query($dbc, $insert_query)
                    or die("We couldn't save your practice session.");

            $start_count_query = "UPDATE student_list SET practice_counter = practice_counter + 1 WHERE student_id = '" 
                    . $_SESSION['student_id'] . "'";

            mysqli_query($dbc, $start_count_query)
                    or die("We could not start your counter");

            mysqli_close($dbc);

            echo '<div class="info-container col-5 p-5 text-center mr-auto ml-auto">Your first practice has been logged!<div class="btn btn-teal m-4 col-6"><a href="practicelog.php" class="text-light">View Log</a></div></div>';

        }

    }
?>

    <div class="container col-5 p-5 form-box">
        <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation" novalidate>
            <fieldset>
                <legend class="text-center">Today's Practice Session:</legend>

                <div class="form-group">
                    <label for="practiceDuration">Duration (minutes)</label>
                    <input class="form-control" type="practiceDuration" id="practiceDuration" name="practiceDuration" placeholder="I practiced for _____ minutes!" maxlength="10" pattern="^(0|[1-9]\d*)(\.\d+)?$"
                        value="<?php if (!empty($practice_duration)) echo $practice_duration; ?>" required />
                    <div class="valid-feedback">Good to Go!</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <div class="form-group">
                    <label for="practiceDescription">Description</label>
                    <textarea class="form-control" id="practiceDescription" name="practiceDescription" placeholder="What did you work on today?" maxlength="5000" required value="<?php if (!empty($practice_description)) echo $practice_description; ?>"></textarea>
                    <div class="valid-feedback">Good to Go!</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <div class="form-group text-center">
                    <input class="btn btn-teal m-4 col-6 text-light" id="submit" type="submit" value="Save Today's Session" name="submit" />
                </div>
                
            </fieldset>
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

<?php
    require_once('templates/footer.php');
?>
