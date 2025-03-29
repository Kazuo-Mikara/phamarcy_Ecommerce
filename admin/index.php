<?php include "config.php";
include 'login_check.php';
?>
<?php
//Query to get all all admin
// include 'config.php';
// include 'login_check.php';
// $sql = "SELECT u.total_users, o.total_orders
// FROM (SELECT COUNT(*) AS total_users FROM tbl_user) u
// JOIN (SELECT COUNT(*) AS total_orders FROM tbl_order) o; ";
// $result = mysqli_query($conn, $sql);

$sql_sales = "SELECT sum(total_price) AS total_sales FROM tbl_order";
$result_sales = mysqli_query($conn, $sql_sales);
$row_sales = mysqli_fetch_assoc($result_sales);
$total_sales = $row_sales['total_sales'];

$sql_users = "SELECT COUNT(*) AS total_users FROM tbl_user";
$result_users = mysqli_query($conn, $sql_users);
$row_users = mysqli_fetch_assoc($result_users);
$total_users = $row_users['total_users'];

$sql_categories = "SELECT COUNT(*) AS total_categories FROM tbl_category";
$result_categories = mysqli_query($conn, $sql_categories);
$row_categories = mysqli_fetch_assoc($result_categories);
$total_categories = $row_categories['total_categories'];


$sql_admins = "SELECT COUNT(*) AS total_admins FROM tbl_admin";
$result_admins = mysqli_query($conn, $sql_admins);
$row_admins = mysqli_fetch_assoc($result_admins);
$total_admins = $row_admins['total_admins'];

$sql_medicines = "SELECT COUNT(*) AS total_medicines FROM tbl_medicine";
$result_medicines = mysqli_query($conn, $sql_medicines);
$row_medicines = mysqli_fetch_assoc($result_medicines);
$total_medicines = $row_medicines['total_medicines'];

// Query for total orders
$sql_orders = "SELECT COUNT(*) AS total_orders FROM tbl_order";
$result_orders = mysqli_query($conn, $sql_orders);
$row_orders = mysqli_fetch_assoc($result_orders);
$total_orders = $row_orders['total_orders'];



$sn = 1;
//Check whether the query is executed or not



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pharmacy Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="img/Logo.jpg" type="image/x-icon" />

    <!-- Fonts and icons -->
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

    <!-- CSS Files -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/plugins.min.css" />
    <link rel="stylesheet" href="css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!-- <link rel="stylesheet" href="assets/css/demo.css" /> -->
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include ('partials/sidebar1.php') ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <?php include "partials/main_header.php" ?>


            <div class="container">
                <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h3 class="fw-bold mb-3">Admin Dashboard</h3>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                                <i class="fas fa-layer-group"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category"><a
                                                        href="./manage_categories.php"><strong>Categories</strong></a>
                                                </p>
                                                <h4 class="card-title"><?php echo $total_categories ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                                <i class="fas fa-user-alt   "></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category"><a
                                                        href="./manage_users.php"><strong>Users</strong></a>
                                                </p>
                                                <h4 class="card-title"><?php echo $total_users ?></h4>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category"><a
                                                        href="./manage_admin.php"><strong>Admin</strong></a></p>
                                                <h4 class="card-title"><?php echo $total_admins ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                                <i class="fas fa-dolly"></i>

                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category"><a
                                                        href="./manage_admin.php"><strong>Products</strong></a></p>
                                                <h4 class="card-title"><?php echo $total_medicines ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                                <i class="fas fa-luggage-cart"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category"><a
                                                        href="./manage_orders.php"><strong>Sales</strong></a></p>
                                                <h4 class="card-title"><?php echo $total_sales ?> mmk</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                                <i class="fas fa-box"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category"><a
                                                        href="./manage_orders.php"><strong>Orders</strong></a></p>
                                                <h4 class="card-title"><?php echo $total_orders ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-round">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <div class="card-title">User Statistics</div>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                                            <span class="btn-label">
                                                <i class="fa fa-pencil"></i>
                                            </span>
                                            Export
                                        </a>
                                        <a href="#" class="btn btn-label-info btn-round btn-sm">
                                            <span class="btn-label">
                                                <i class="fa fa-print"></i>
                                            </span>
                                            Print
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="min-height: 375px">
                                    <canvas id="lineChart"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>





                </div>
            </div>

            <?php include "partials/footer.php" ?>
        </div>

    </div>



    <!-- jQuery Scrollbar -->
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

        var lineChart = document.getElementById("lineChart").getContext("2d"),
        var myLineChart = new Chart(lineChart, {
            type: "line",
            data: {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                datasets: [
                    {
                        label: "Active Users",
                        borderColor: "#1d7af3",
                        pointBorderColor: "#FFF",
                        pointBackgroundColor: "#1d7af3",
                        pointBorderWidth: 2,
                        pointHoverRadius: 4,
                        pointHoverBorderWidth: 1,
                        pointRadius: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        borderWidth: 2,
                        data: [
                            542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 900,
                        ],
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: "bottom",
                    labels: {
                        padding: 10,
                        fontColor: "#1d7af3",
                    },
                },
                tooltips: {
                    bodySpacing: 4,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10,
                },
                layout: {
                    padding: { left: 15, right: 15, top: 15, bottom: 15 },
                },
            },
        });
    </script>
</body>


</html>