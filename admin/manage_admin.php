<?php include "config.php" ?>
<?php include "login_check.php" ?>
<?php
//Query to get all all admin
// include 'config.php';
// include 'login_check.php';
// $id;

if (isset($_GET['delete'])) {
    if ($_GET['delete'] = 'true')
        $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tbl_admin WHERE id='$id'");
}
if (isset($_POST['add_admin'])) {
    $username = $_POST['username'];
    $gmail = $_POST['gmail'];
    $password = md5($_POST['password']);
    $usertype = 'admin';
    $sql1 = "INSERT INTO tbl_admin SET
    username='$username',
    gmail='$gmail',
    password='$password',
    usertype='$usertype'
    ";
    $res = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
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
    <link rel="stylesheet" href="css/demo.css" />
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include ('partials/sidebar1.php') ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <?php include 'partials/main_header.php' ?>

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Manage Users</h3>
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
                                <a href="#">Users</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Manage Users</h4>
                                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                            data-bs-target="#addAdminModal">
                                            <i class="fa fa-plus"></i>
                                            Add New Admin
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--Add User Modal -->
                                    <div class="add_user_modal modal fade" id="addAdminModal" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold"> New</span>
                                                        <span class="fw-light"> Admin </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">
                                                        Create a new admin using this form, make sure you
                                                        fill them all
                                                    </p>
                                                    <form method="POST">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Name</label>
                                                                    <input id="addName" name="username" type="text"
                                                                        class="form-control" placeholder="Username" />
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Gmail</label>
                                                                    <input id="addPosition" type="text"
                                                                        class="form-control" name="gmail"
                                                                        placeholder="Gmail" />
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Password</label>
                                                                    <input id="addName" name="password" type="password"
                                                                        class="form-control" placeholder="Password" />
                                                                </div>
                                                            </div>

                                                        </div>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <input type="submit" id="addRowButton" class="btn btn-success"
                                                        name="add_admin" value="Add" />
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="table-responsive">
                                        <table class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Gmail</th>
                                                    <!-- <th>Password</th> -->
                                                    <th style="width: 10px; height: 10px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Gmail</th>

                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                $sql2 = "SELECT * FROM tbl_admin";
                                                $result2 = mysqli_query($conn, $sql2);
                                                $sn = 1;
                                                if ($result2 == TRUE) {
                                                    $count = mysqli_num_rows($result2);

                                                }
                                                while ($rows = mysqli_fetch_assoc($result2)) {
                                                    $id = $rows['id'];
                                                    $username = $rows['username'];
                                                    $gmail = $rows['gmail'];

                                                    ?>
                                                    <tr>
                                                        <td><?php echo $username; ?></td>
                                                        <td><?php echo $gmail ?></td>

                                                        <td>
                                                            <div class="form-button-action">
                                                                <a href="./edit_admin.php?id=<?php echo $id; ?>"
                                                                    class="btn btn-link btn-primary">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="./manage_admin.php?delete=true & id=<?php echo $id; ?>"
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