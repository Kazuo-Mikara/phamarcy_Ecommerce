<?php include "config.php" ?>


<?php
//Query to get all all admin
// include 'config.php';
// include 'login_check.php';
$sql = "SELECT * FROM tbl_order";
$result = mysqli_query($conn, $sql);
$sn = 1;
//Check whether the query is executed or not

if ($result == TRUE) {
    $count = mysqli_num_rows($result);

}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tbl_order WHERE id='$id'");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Datatables - Kaiadmin Bootstrap 5 Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="../assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

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

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include 'partials/sidebar1.php' ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <?php include 'partials/main_header.php' ?>

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Manage Orders</h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="./index1.php">
                                    <i class="icon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Manage</a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Orders</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Add Row</h4>
                                        <!-- <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                            data-bs-target="#addRowModal">
                                            <i class="fa fa-plus"></i>
                                            Add Row
                                        </button> -->
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Modal -->
                                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold"> New</span>
                                                        <span class="fw-light"> Row </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">
                                                        Create a new row using this form, make sure you
                                                        fill them all
                                                    </p>
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Name</label>
                                                                    <input id="addName" type="text" class="form-control"
                                                                        placeholder="fill name" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 pe-0">
                                                                <div class="form-group form-group-default">
                                                                    <label>Position</label>
                                                                    <input id="addPosition" type="text"
                                                                        class="form-control"
                                                                        placeholder="fill position" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Office</label>
                                                                    <input id="addOffice" type="text"
                                                                        class="form-control"
                                                                        placeholder="fill office" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="button" id="addRowButton" class="btn btn-primary">
                                                        Add
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Order Number</th>
                                                    <th>Name</th>
                                                    <th>Gmail</th>
                                                    <th>Contact</th>
                                                    <th>Address</th>
                                                    <th>Order Date</th>
                                                    <th>Product Names</th>
                                                    <th>Payment Screenshot</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th>Delivery Status</th>
                                                    <th style="width: 10px">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Order Number</th>
                                                    <th>Name</th>
                                                    <th>Gmail</th>
                                                    <th>Contact</th>
                                                    <th>Address</th>
                                                    <th>Order Date</th>
                                                    <th>Product Names</th>
                                                    <th>Payment Screenshot</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th style="width:10px">Delivery Status</th>
                                                    <th style="width:10px">Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                if ($result == TRUE) {
                                                    $count = mysqli_num_rows($result);

                                                }
                                                while ($rows = mysqli_fetch_assoc($result)) {
                                                    $id = $rows['id'];
                                                    $order_number = $rows['order_number'];
                                                    $total = $rows['total_price'];
                                                    $quantity = $rows['quantity'];
                                                    $order_date = $rows['order_date'];
                                                    $total_products = $rows['total_products'];
                                                    $order_status = $rows['order_status'];
                                                    $image_name = $rows['payment_image'];
                                                    $customer_name = $rows['customer_name'];
                                                    $customer_gmail = $rows['customer_gmail'];
                                                    $customer_contact = $rows['customer_contact'];
                                                    $customer_address = $rows['customer_address'];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $order_number; ?></td>
                                                        <td><?php echo $customer_name; ?></td>
                                                        <td><?php echo $customer_gmail ?></td>
                                                        <td><?php echo $customer_contact ?></td>
                                                        <td><?php echo $customer_address ?></td>
                                                        <td style="height: 10% ;"><?php echo $order_date ?></td>
                                                        <td><?php echo $total_products ?></td>
                                                        <td style="height: 10% ;"><?php
                                                        if ($image_name != "") {
                                                            // echo $image_name;
                                                            ?>
                                                                <img src="../images/payment/<?php echo $image_name ?>" alt=""
                                                                    width="100px">

                                                                <?php
                                                        } else {
                                                            echo "cash on deli";
                                                        }
                                                        ?>
                                                        </td>
                                                        <td><?php echo $quantity ?></td>
                                                        <td><?php echo $total ?></td>
                                                        <td class="<?php if ($order_status == 'Pending') {
                                                            echo 'btn-primary';
                                                        } else if ($order_status == 'Completed') {
                                                            echo 'btn-success';
                                                        } else if ($order_status == 'Canceled') {
                                                            echo 'btn-danger';
                                                        }
                                                        ?>">
                                                            <?php echo $order_status ?>
                                                        </td>

                                                        <td>
                                                            <div class="form-button-action">
                                                                <a class="btn btn-link btn-primary"
                                                                    href="./edit_order.php?id=<?php echo $id ?>">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="<?php echo SITEURL; ?>admin/manage_orders.php?id=<?php echo $id; ?>"
                                                                    type="button" class="btn btn-link btn-danger">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "partials/footer.php" ?>
        </div>


    </div>
    <!--   Core JS Files   -->
    <script src="js/core/jquery-3.7.1.min.js"></script>
    <script src="js/core/popper.min.js"></script>
    <script src="js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="js/plugin/datatables/datatables.min.js"></script>
    <!-- Kaiadmin JS -->
    <script src="js/kaiadmin.min.js"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="js/setting-demo2.js"></script>
    <script>
        $(document).ready(function () {


            // Add Row
            $("#add-row").DataTable({
                pageLength: 5,
            });

            var action =
                '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $("#addRowButton").click(function () {
                $("#add-row")
                    .dataTable()
                    .fnAddData([
                        $("#addName").val(),
                        $("#addPosition").val(),
                        $("#addOffice").val(),
                        action,
                    ]);
                $("#addRowModal").modal("hide");
            });
        });
    </script>
</body>

</html>