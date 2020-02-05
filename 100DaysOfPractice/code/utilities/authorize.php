<?php
    // Immutable administrative login information
    $username = 'schenkerian';
    $password = 'analysis';

    if (!isset($_SERVER['PHP_AUTH_USER'])
            || !isset($_SERVER['PHP_AUTH_PW'])
            || ($_SERVER['PHP_AUTH_USER'] != $username)
            || ($_SERVER['PHP_AUTH_PW'] != $password))
    {

        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="100 Days of Practice"');
        exit('<div class="info-container col-5 p-5 text-center mr-auto ml-auto">You must enter a valid username and password ' .
                'to view this page! Please <a href="teacherinfo.php">try again</a>.</div>');
                
    }
?>
