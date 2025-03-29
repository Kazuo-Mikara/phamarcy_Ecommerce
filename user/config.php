<?php
session_start();

//Create Constants to Store Non Repeating Values
define('SITEURL', 'http://localhost/website/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'pharmacy');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn));
$db_select = mysqli_select_db($conn, 'pharmacy') or die(mysqli_error($conn));

