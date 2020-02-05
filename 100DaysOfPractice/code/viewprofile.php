<?php
    require_once('utilities/startsession.php');

    $page_title = 'View Profile';

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
        <h1 class="text-center page-title">All About You</h1>
        <p class="text-center secondary-page-title">Your Profile</p>
    </div>

<?php

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die("The database connection failed.");

    // Get the student's personal information from the student_list
    if (!isset($_GET['student_id'])) 
    {
        $query = "SELECT username, first_name, last_name, age, suzuki_book, picture FROM student_list WHERE student_id = '" . $_SESSION['student_id'] . "'";
    }
    else 
    {
        $query = "SELECT username, first_name, last_name, age, suzuki_book, picture FROM student_list WHERE student_id = '" . $_GET['student_id'] . "'";
    }
    $data = mysqli_query($dbc, $query)
            or die("The student data is not available at this time.");

    if (mysqli_num_rows($data) == 1) 
    {
        // Display the student's personal data
        $row = mysqli_fetch_array($data);
        echo '<div class="container">';
        echo '<table class="table table-striped table-dark text-center w-75 mr-auto ml-auto profile-table">';
        if (!empty($row['username'])) 
        {
            echo '<tr><th class="th">Username:</th><td>' . $row['username'] . '</td></tr>';
        }
        if (!empty($row['first_name']) && !empty($row['last_name'])) 
        {
            echo '<tr><th class="th">Name:</th><td>' . $row['first_name'] . ' ' . $row['last_name'] . '</td></tr>';
        }
        if (!empty($row['age'])) 
        {
            echo '<tr><th class="th">Age:</th><td>' . $row['age'] . '</td></tr>';
        }
        if (!empty($row['suzuki_book'])) 
        {
            echo '<tr><th class="th">Suzuki Book:</th><td>' . $row['suzuki_book'] . '</td></tr>';
        }
        if (!empty($row['picture'])) 
        {
            echo '<tr><th class="th">Picture:</th><td><img src="' . MM_UPLOADPATH . $row['picture']
                    . '" alt="Profile Picture" /></td></tr>';
        }
        echo '</table>';
        echo '</div>';
    }
    else 
    {
        echo '<div class="container text-center error">There was a problem accessing your profile.</div>';
    }

    mysqli_close($dbc);
?>

    <div class="text-center">
        <div class="btn btn-teal m-4 col-2"><a href="practicelogform.php" class="text-light">Log a Practice</a></div><div class="btn btn-teal m-4 col-2"><a href="editprofile.php" class="text-light">Edit Profile</a></div>
    </div>

<?php 
    require_once('templates/footer.php');
?>