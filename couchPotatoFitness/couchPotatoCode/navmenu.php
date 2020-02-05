<?php
    echo '<hr />';
    
    // Show a more comprehensive link menu for users that are logged in, and a simple sign-up/login menu for users who aren't 
    if (isset($_SESSION['username']))
    {
        echo '<nav class ="topNav">';
        echo '<a class="topLink" href="index.php">Home</a> &#127939; ';
        echo '<a class="topLink" href="viewprofile.php">View Profile</a> &#127947; ';
        echo '<a class="topLink" href="editprofile.php">Edit Profile</a> &#128692; ';
        echo '<a class="topLink" href="logout.php">Log Out (' . $_SESSION['username'] . ')</a>';
        echo '</nav>';

    }
    else 
    {
        echo '<nav class="topNav">';
        echo '<a href="login.php">Log In</a> &#129364; ';
        echo '<a href="signup.php">Sign Up</a>';
        echo '</nav>';

    }

    echo '<hr />';
?>