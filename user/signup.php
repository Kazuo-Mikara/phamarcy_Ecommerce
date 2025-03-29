<?php include 'config.php';

if (isset($_POST['submit'])) {
    echo $username = $_POST['username'];
    echo $gmail = $_POST['gmail'];
    echo $password = md5($_POST['password']);


    //SQL insert the username and password
    $sql = "INSERT INTO tbl_user SET 
    username='$username',
    gmail='$gmail',
    password='$password'
    ";
    $res = mysqli_query($conn, $sql);
    header('location:login.php');

    // $res = mysqli_query($conn, $sql);

    // $count = mysqli_num_rows($res);

    // if ($count == 1) {
    //     //User Available and Login Success
    //     $_SESSION['login'] = "<div class='success'>Login Successfully</div>";
    //     $_SESSION['user'] = $username;
    //     // $_SESSION['']
    //     //redirect to admin panel
    //     header('location:' . SITEURL . 'user/index.php');
    // } else {
    //     $_SESSION['login'] = "<div class='error'>username and password is incorrect</div>";
    //     header('location:' . SITEURL . 'user/login.php');

    // }
}


?>

<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>YZL Pharmacy</title>
    <link rel="icon" href="assets/pharmacy_logo.jpg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!--::header part start::-->

    <!-- Header part end-->

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>signup</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================login_part Area =================-->
    <section class="login_part  ">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-7 col-md-12  align-items-center">
                    <div class="login_part_form">
                        <div class="login_part_form_inner">
                            <h3>Welcome ! <br>
                                Please Fill You Information</h3>
                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star my-2">
                                    <input type="text" class="form-control" id="name" name="username" value=""
                                        placeholder="Username" required>
                                </div>
                                <div class="col-md-12 form-group p_star my-2">
                                    <input type="text" class="form-control" id="gmail" name="gmail" value=""
                                        placeholder="Gmail" required>
                                </div>
                                <div class="col-md-12 form-group p_star my-4">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                        placeholder="Password" required>
                                </div>
                                <div class="col-md-12 form-group p_star my-2">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                        placeholder="Confirm Password" required>
                                </div>

                                <div class="col-md-12 form-group">

                                    <button type="submit" value="submit" name="submit" class="btn_3">
                                        Sign Up
                                    </button>
                                    <div>

                                        <a class="btn-1" href="./index.php">Continue Without Sign Up?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->


    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/mixitup.min.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>