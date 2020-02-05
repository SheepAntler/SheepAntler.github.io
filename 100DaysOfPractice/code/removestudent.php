<?php

    require_once('utilities/authorize.php');

    $page_title = 'Remove Activity';

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
                <a class="nav-item nav-link" href="teacherinfo.php">Teacher Login</a>
            </div>
        </div>
    </nav>

    <div class="jumbotron mt-5 bg-header">
        <h1 class="text-center page-title">Goodbye, Goodbye!</h1>
        <p class="text-center secondary-page-title">Sometimes they graduate. Sometimes they quit. C'est la vie.</p>
    </div>

<?php

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
        echo '<div class="container text-center error">Hmm...it seems that no student was specified for removal.</div>';
    }

    // Verify that the teacher really DOES want to remove the selected student, and then delete that student's data
    if (isset($_POST['submit']))
    {
        if ($_POST['confirm'] == 'Yes')
        {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die("This is a mighty elusive database connection!");
            $query = "DELETE FROM student_list WHERE student_id = $id LIMIT 1";
            mysqli_query($dbc, $query)
                    or die("The student data is not available at this time.");
            mysqli_close($dbc);

            echo '<div class="container col-5 p-5 form-box text-center"><label>The student was successfully removed!</label>';
            echo '<div class="btn btn-teal m-4 col-6"><a href="teacherinfo.php" class="text-light">Back to the Leaderboards</a></div></div>';
        }
        else
        {
            echo '<div class="container text-center error">Sorry! That student could not be removed.</div>';
        }
    }

    else if (isset($id))
    {
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die("This is a mighty elusive database connection!");

        $query = "SELECT * FROM student_list WHERE student_id = $id LIMIT 1";

        $data = mysqli_query($dbc, $query)
                or die("The student data is not available at this time.");

        $row = mysqli_fetch_array($data);

        mysqli_close($dbc);

        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $id = $row['student_id'];

        echo '<div class="container col-5 p-5 form-box text-center"><label for="confirm">Are you sure you want to remove ' . $first_name . ' ' . $last_name . ' from your studio?</label>';
        echo '<form method="post" action="removestudent.php">';
        echo '<input type="radio" class="confirm form-control-inline ml-3" name="confirm" value="Yes" /> Yes ';
        echo '<input type="radio" class="confirm form-control-inline ml-3" name="confirm" value="No" checked="checked" /> No <br />';
        echo '<input class="btn btn-teal m-4 col-6 text-light" type="submit" name="submit" value="Submit" />';
        echo '<input type="hidden" name="id" value="' . $id . '" />';
        echo '</form></div>';
    }

    require_once('templates/footer.php');

?>

</body>
</html>
