<?php include('config.php');
session_destroy();
?>
<!-- <script src="https://cdn.tailwindcss.com"></script> -->
<link rel="stylesheet" href="css/admin.css">
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
<?php
//Login Process

if (isset($_POST['submit'])) {
    echo $gmail = $_POST['gmail'];
    echo $password = md5($_POST['password']);


    //SQL check the username and password
    $sql = "UPDATE tbl_admin SET
    password='$password' WHERE gmail='$gmail'";

    $res = mysqli_query($conn, $sql);

    header("location:login.php");
}
?>

<body>

    <!-- Sidebar -->

    <!-- End Sidebar -->










    <div class="mx-auto my-5 w-25 col-md-8 text-center">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Password Reset</div>
                <div class="card-image"><img src="./img/Logo.jpg" width="100px"> </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <form method="POST">

                        <div class="form-group">
                            <div class="form-floating form-floating-custom mb-5">
                                <input type="text" class="form-control" id="floatingInput" placeholder="gmail"
                                    name="gmail" />
                                <label for="floatingInput">Your Gmail</label>
                            </div>
                            <div class="form-floating form-floating-custom mb-3">
                                <input type="password" class="form-control" id="floatingInput"
                                    placeholder="yourpassword" name="password" />
                                <label for="floatingInput">Your New Password</label>
                            </div>
                        </div>




                </div>
            </div>
            <div class="card-action">
                <input type="submit" class="btn btn-success" value="Submit" name="submit" />
                <a href="./login.php" class="btn btn-primary">Remembered Password?</a>

            </div>
            </form>
        </div>
    </div>




    <!-- Custom template | don't include it in your project! -->
    <!-- End Custom template -->

    <!--   Core JS Files   -->

</body>