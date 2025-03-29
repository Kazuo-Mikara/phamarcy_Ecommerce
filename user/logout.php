<?php
include ('config.php');
//Destroy the session
// session_start();
session_destroy();

//Redirect to login Page
header('location:' . SITEURL . 'user/index.php');