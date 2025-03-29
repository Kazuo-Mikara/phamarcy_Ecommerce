<?php
include 'config.php';
if (isset($_GET['id'])) {

    $id = $_GET['id'];
}
echo $id;
$sql = "SELECT * FROM tbl_order WHERE id='$id'";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$rows = mysqli_fetch_assoc($res);
$total = $rows['total_price'];
$quantity = $rows['quantity'];
$order_date = $rows['order_date'];
$order_status = $rows['order_status'];
$payment_method = $rows['payment_method'];
$total_products = $rows['total_products'];
$customer_name = $rows['customer_name'];
$customer_gmail = $rows['customer_gmail'];
$customer_contact = $rows['customer_contact'];
$customer_address = $rows['customer_address'];
$order_notes = $rows['order_notes'];

//Process value from the Form and Save it in the Database
// include ('config.php');

//Check whether the submit button is clicked or not
if (isset($_POST['edit_order'])) {
    $username = $_POST['username'];
    $gmail = $_POST['gmail'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $order_status = $_POST['order_status'];
    $payment_method = $_POST['payment_method'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];
    $order_notes = $_POST['order_notes'];
    $sql1 = "UPDATE tbl_order SET
    customer_name='$username',
    customer_gmail='$gmail',
    customer_address='$address',
    customer_contact='$phone',
   order_status='$order_status',
total='$total',
quantity='$quantity'
        WHERE id='$id'";


    //Execute QUery  and Sava Data in Database

    $res1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

    if ($res1 == TRUE) {
        $_SESSION['add'] = "<div>Added Successfully.</div>";
        header('location:' . SITEURL . 'admin/manage_orders.php');
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
                                        placeholder="Username" value="<?php echo $customer_name ?>" />
                                </div>
                            </div>

                            <div class="col-md-12 ">
                                <div class="form-group form-group-default">
                                    <label>Gmail</label>
                                    <input id="addPosition" type="text" class="form-control" name="gmail"
                                        placeholder="Gmail" value="<?php echo $customer_gmail ?>" />
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group form-group-default">
                                    <label>Phone</label>
                                    <input id="addPosition" type="text" class="form-control" name="phone"
                                        placeholder="Gmail" value="<?php echo $customer_contact ?>" />
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group form-group-default">
                                    <label>Address</label>
                                    <input id="addPosition" type="text" class="form-control" name="address"
                                        placeholder="address" value="<?php echo $customer_address ?>" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label for="countries"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                        an option</label>
                                    <select id="order_status" name="order_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    block w-full p-2.5
                                    ">
                                        <option selected><?php $order_status = isset($order_status) ? $order_status : 'Select Order Status';
                                        echo $order_status; ?></option>
                                        <option value="Completed">Completed</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Cancelled">Cancelled</option>

                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12 ">
                                <div class="form-group form-group-default">
                                    <label>Payment Method</label>
                                    <input id="addPosition" type="text" class="form-control" name="payment_method"
                                        placeholder="Payment Method" value="<?php echo $payment_method ?>" />
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group form-group-default">
                                    <label>Quantity</label>
                                    <input id="addPosition" type="text" class="form-control" name="quantity"
                                        placeholder="Payment Method" value="<?php echo $quantity ?>" />
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group form-group-default">
                                    <label>Total</label>
                                    <input id="addPosition" type="text" class="form-control" name="total"
                                        placeholder="Payment Method" value="<?php echo $total ?>" />
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group form-group-default">
                                    <label>Order Notes</label>
                                    <input id="addPosition" type="text" class="form-control" name="order_notes"
                                        placeholder="Payment Method" value="<?php echo $order_notes ?>" />
                                </div>
                            </div>
                        </div>



                        <input type="submit" name="edit_order" id="displayNoti" value="Edit User"
                            class="btn btn-success">
                        <a class="btn btn-danger" href="./manage_orders.php">Cancel</a>
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