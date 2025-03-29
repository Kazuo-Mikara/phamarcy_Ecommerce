<?php
include ('config.php');
//Query to get all all admin
// include 'config.php';
$sql = "SELECT * FROM tbl_payment";
$result = mysqli_query($conn, $sql);
$username = $_SESSION['admin'];
$sql1 = "SELECT gmail FROM tbl_admin WHERE username='$username'";
$result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
$sn = 1;
//Check whether the query is executed or not

if (isset($_GET['delete'])) {
    if ($_GET['delete'] = 'true')
        $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tbl_user WHERE id='$id'");
}
// if (isset($_POST['manage_user'])) {
//     $username = $_POST['username'];
//     $gmail = $_POST['gmail'];
//     $order_status = $_POST['order_status'];
//     $password = md5($_POST['password']);
//     $sql1 = "INSERT INTO tbl_user SET
//     username='$username',
//     gmail='$gmail',
//     password='$password',
//     order_status='$order_status'
//     ";
//     $res = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Dashboard</title>
</head>

<body class="">
    <!-- start: Main -->
    <div class="wrapper"><!-- Sidebar -->
        <?php include "partials/sidebar1.php" ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <?php include "partials/main_header.php"; ?>

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Manage Payments</h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="./index.php">
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
                                <a href="#">Payments</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Add Row</h4>
                                        <a class="btn btn-primary btn-round ms-auto" href="./add_category.php">
                                            <i class="fa fa-plus"></i>
                                            Add Payments
                                        </a>
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
                                                    <th>Customer</th>
                                                    <th>Payment Number</th>
                                                    <th>Order Number</th>
                                                    <th>Delivery Status</th>
                                                    <th>Payment Image</th>
                                                    <th style="width:10px">Action</th>

                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Customer</th>
                                                    <th>Payment Number</th>
                                                    <th>Order Number</th>
                                                    <th>Delivery Status</th>
                                                    <th>Payment Image</th>
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
                                                    $payment_number = $rows['payment_number'];
                                                    $customer_name = $rows['customer_name'];
                                                    $status = $rows['delivery_status'];

                                                    // $image_name = $rows['image_name'];
                                                    ?>
                                                    <tr>

                                                    
                                                        <td><?php echo $order_number ?></td>
                                                        <td><?php echo $payment_number ?></td>
                                                        <td class="<?php if ($status == 'Pending') {
                                                            echo 'btn-primary';
                                                        } else if ($status == 'Completed') {
                                                            echo 'btn-success';
                                                        } else if ($status == 'Cancelled ') {
                                                            echo 'btn-danger';
                                                        }
                                                        ?>"> <?php echo $status ?></td>

                                                        <td><?php echo "IMAGE" ?></td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a href="./edit_payment.php?id=<?php echo $id; ?>"
                                                                    class="btn btn-link btn-primary ">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="./manage_payments.php?delete=true & id=<?php echo $id; ?>"
                                                                    class="btn btn-link btn-danger">
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

            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="http://www.themekita.com">
                                    ThemeKita
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Help </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Licenses </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        2024, made with <i class="fa fa-heart heart text-danger"></i> by
                        <a href="http://www.themekita.com">ThemeKita</a>
                    </div>
                    <div>
                        Distributed by
                        <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
                    </div>
                </div>
            </footer>
        </div>


    </div>
    <!-- end: Main -->

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
            $("#basic-datatables").DataTable({});
            $("#multi-filter-select").DataTable({
                pageLength: 5,
                initComplete: function () {
                    this.api()
                        .columns()
                        .every(function () {
                            var column = this;
                            var select = $(
                                '<select class="form-select"><option value=""></option></select>'
                            )
                                .appendTo($(column.footer()).empty())
                                .on("change", function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                    column
                                        .search(val ? "^" + val + "$" : "", true, false)
                                        .draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    select.append(
                                        '<option value="' + d + '">' + d + "</option>"
                                    );
                                });
                        });
                },
            });
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