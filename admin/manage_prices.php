<?php
include('config.php');
include("login_check.php");
//Query to get all all admin
// include 'config.php';
$sql = "SELECT * FROM price_list";
$result = mysqli_query($conn, $sql);
$username = $_SESSION['admin'];
$sql1 = "SELECT gmail FROM tbl_admin WHERE username='$username'";
$result1 = mysqli_query($conn, $sql1);
$sn = 1;
//Check whether the query is executed or not



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
                        <h3 class="fw-bold mb-3">Manage Products</h3>
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
                                <a href="#">Products</a>
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
                                            Add Products
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
                                                    <th>Product Name</th>
                                                    <th>Packaging</th>
                                                    <th>Price</th>
                                                    <th>Bonus</th>
                                                    <th>Expiry Date</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Packaging</th>
                                                    <th>Price</th>
                                                    <th>Bonus</th>
                                                    <th>Expiry Date</th>
                                                    <th>Action</th>


                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                if ($result == TRUE) {
                                                    $count = mysqli_num_rows($result);

                                                }
                                                while ($rows = mysqli_fetch_assoc($result)) {
                                                    // $id = $rows['id'];
                                                    $brand_name = $rows['Brand_Name'];
                                                    $packing = $rows['Packing_Size'];
                                                    $price = $rows['Price'];
                                                    $bonus = $rows['Bonus'];
                                                    $expiry_date = $rows['Expiry_Date'];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $brand_name ?></td>

                                                        <td><?php echo $packing ?></td>
                                                        <td><?php echo $price ?></td>
                                                        <td><?php echo $bonus ?></td>
                                                        <td><?php echo $expiry_date ?></td>

                                                        <td>
                                                            <div class="form-button-action">
                                                                <a class="btn btn-link"
                                                                    href="./edit_category.php?id=<?php echo $id; ?>">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>

                                                                <a class="btn btn-link btn-danger"
                                                                    href="<?php echo SITEURL; ?>admin/delete_category.php?id=<?php echo $id; ?>"
                                                                    onclick="
                                                                    return confirm('delete this product?');">

                                                                    <i class="fa fa-times"></i>

                                                                </a>



                                                            </div>
                                                        </td>
                                                    <?php } ?>
                                                </tr>
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