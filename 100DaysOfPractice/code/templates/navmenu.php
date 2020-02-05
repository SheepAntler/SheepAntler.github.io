<?php
    
    // Show a more comprehensive link menu for users that are logged in, and a simple sign-up/login menu for users who aren't 
    if (isset($_SESSION['username']))
    {
?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-4">
            <a class="navbar-brand" href="index.php">100 Days of Practice</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarNavAltMarkup" class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="practicelog.php">Your Log</a>
                    <a class="nav-item nav-link" href="practicelogform.php">Log a Practice</a>
                    <a class="nav-item nav-link" href="practicehacks.php">Practice Hacks</a>
                    <a class="nav-item nav-link" href="rules.php">Rulebook</a>
                    <a class="nav-item nav-link" href="viewprofile.php">Your Profile</a>
                </div>
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="editprofile.php">Edit Profile</a>
                    <a class="nav-item nav-link" href="logout.php">Logout</a>
                </div>
            </div>
        </nav>

<?php

    }
    else 
    {

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
                    <a class="nav-item nav-link" href="signup.php">Create an Account</a>
                </div>
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="login.php">Student Login</a>
                    <a class="nav-item nav-link" href="teacherinfo.php">Teacher Login</a>
                </div>
            </div>
        </nav>

<?php

    }

?>