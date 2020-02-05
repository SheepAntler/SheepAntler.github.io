<?php 
    session_start();

    if (!isset($_SESSION['student_id'])) 
    {
        if (isset($_COOKIE['student_id']) && isset($_COOKIE['username']))
        {

            $_SESSION['student_id'] = $_COOKIE['student_id'];
            $_SESSION['username'] = $_COOKIE['username'];

        }
    }
?>