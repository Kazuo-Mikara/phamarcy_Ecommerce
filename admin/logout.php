<?php
include ('config.php');
//Destroy the session
session_destroy();

//Redirect to login Page
header('location:' . SITEURL . 'admin/login.php');