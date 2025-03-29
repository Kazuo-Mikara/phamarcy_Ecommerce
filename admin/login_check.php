<?php


function isLoggedIn()
{
    // session_start();

    // Check if user is logged in and session is valid
    if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
        // Additional checks can be added here, such as validating user role or expiration time
        
        return true;
    } else {
        return false;
    }
}

if (isLoggedIn()) {
    // User is logged in
    header('location' . SITEURL . 'admin/index.php');
} else {
    // User is not logged in
    header("Location: login.php");
    exit;
}