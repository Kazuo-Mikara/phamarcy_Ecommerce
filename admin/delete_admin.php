<?php

include ("config.php");

//Get the ID of the Admin to be Deleted
$id = $_GET['id'];
echo $id;
//Create SQL query to delete Admin
$sql = "DElETE FROM tbl_admin WHERE id=$id";

//Execute the Query
$res = mysqli_query($conn, $sql);
$_SESSION['delete'] = "<div class='success'>Admin Delete Successfully </div>";
header('location:' . SITEURL . 'admin/manage_admin.php')
    ?>