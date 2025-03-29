<?php
include 'config.php';
if (isset($_GET['id'])) {

    $id = $_GET['id'];
}
echo $id;
$sql = "SELECT * FROM tbl_admin WHERE id='$id'";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($res);
$username = $row['username'];
$user_password = $row['password'];

$gmail = $row['gmail'];
//Process value from the Form and Save it in the Database
// include ('config.php');

//Check whether the submit button is clicked or not
if (isset($_POST['edit_admin'])) {
    $username = $_POST['username'];
    $gmail = $_POST['gmail'];
    $password = $_POST['password'] ? md5($_POST['password']) : $user_password;
    $sql1 = "UPDATE tbl_admin SET
    username='$username',
    password='$password',
    gmail='$gmail',
    usertype='admin'
        WHERE id='$id'";


    //Execute QUery  and Sava Data in Database

    $res1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

    if ($res1 == TRUE) {
        $_SESSION['add'] = "<div>Added Successfully.</div>";
        header('location:' . SITEURL . 'admin/manage_admin.php');
        exit;
    }
}



// } else {
//     // echo "Error";

// }
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../dist/css/output.css"> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../dist/css/output.css"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/plugins.min.css" />
    <link rel="stylesheet" href="css/kaiadmin.min.css" />
    <script src="js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["css/fonts.min.css"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>
    <link rel="stylesheet" href="css/toaster.css">
    <title>Dashboard</title>
</head>



<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include "partials/sidebar1.php" ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="../index.html" class="logo">
                            <img src="../assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <?php include "partials/main_header.php" ?>
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <h3 class="fw-bold mb-3">Edit User</h3>
                    <!-- <h3><?php echo $product_name ?></h3> -->
                    <form class="max-w-sm mx-auto mt-8" method="POST" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group form-group-default">
                                    <label>Name</label>
                                    <input id="addName" name="username" type="text" class="form-control"
                                        placeholder="Username" value="<?php echo $username ?>" />
                                </div>
                            </div>

                            <div class="col-md-12 ">
                                <div class="form-group form-group-default">
                                    <label>Password</label>
                                    <input id="addPosition" type="password" class="form-control" name="password"
                                        placeholder="Password" />
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group form-group-default">
                                    <label>Gmail</label>
                                    <input id="addPosition" type="text" class="form-control" name="gmail"
                                        placeholder="Gmail" value="<?php echo $gmail ?>" />
                                </div>
                            </div>

                        </div>



                        <input type="submit" name="edit_admin" id="displayNoti" value="Edit Admin"
                            class="btn btn-success">
                        <a class="btn btn-danger" href="./manage_admin.php">Cancel</a>
                    </form>

                    <!-- <?php


                    //Redirect Page to Manage Admin
                    // header("location:" . SITEURL . 'admin/manage_admin.php');
                    

                    ?>
                            <div id="toast-success"
                                class="flex items-center float-right mt-7 w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                                role="alert">
                                <div
                                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                                <div class="ms-3 text-sm font-normal text-green-600">Admin Added successfully.</div>
                                <a href="./manage_admin.php"><i class="ri-close-line"></i></a>
                            </div>

                            <?php

                            ?> -->
                </div>

            </div>

            <!-- Custom template | don't include it in your project! -->

            <!-- End Custom template -->
        </div>

        <!-- end: Main -->

        <script src="js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

        <!-- Chart JS -->
        <script src="js/plugin/chart.js/chart.min.js"></script>

        <!-- Chart Circle -->
        <script src="js/plugin/chart-circle/circles.min.js"></script>

        <!-- Datatables -->
        <script src="js/plugin/datatables/datatables.min.js"></script>

        <!-- Bootstrap Notify -->
        <script src="js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

        <!-- jQuery Vector Maps -->
        <script src="js/plugin/jsvectormap/jsvectormap.min.js"></script>
        <script src="js/plugin/jsvectormap/world.js"></script>

        <!-- Sweet Alert -->
        <script src="js/plugin/sweetalert/sweetalert.min.js"></script>

        <!-- Kaiadmin JS -->
        <script src="js/kaiadmin.min.js"></script>
        <script src="js/core/jquery-3.7.1.min.js"></script>
        <script src="js/core/popper.min.js"></script>
        <script src="js/core/bootstrap.min.js"></script>

        <!-- jQuery Scrollbar -->
        <script src="js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>



        <!-- Kaiadmin JS -->
        <script src="js/kaiadmin.min.js"></script>

        <!-- Kaiadmin DEMO methods, don't include it in your project! -->
        <script src="js/setting-demo2.js"></script>

        <!-- Kaiadmin DEMO methods, don't include it in your project! -->
        <script src="js/setting-demo.js"></script>
        <script src="js/demo.js"></script>
        <script>
            $("#displayNoti").on("click", function () {
                var placementFrom = top;
                var placementAlign = right;
                var state = success;
                var style = withicon;
                var content = {};

                content.message =
                    'Turning standard Bootstrap alerts into "notify" like notifications';
                content.title = "Bootstrap notify";
                if (style == "withicon") {
                    content.icon = "fa fa-bell";
                } else {
                    content.icon = "none";
                }
                content.url = "manage_categories.php";
                content.target = "_blank";

                $.notify(content, {
                    type: state,
                    placement: {
                        from: placementFrom,
                        align: placementAlign,
                    },
                    time: 1000,
                    delay: 0,
                });
            });
        </script>
</body>


</html>