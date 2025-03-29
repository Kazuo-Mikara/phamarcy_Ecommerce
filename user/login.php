<?php include 'config.php';
// session_destroy();
if (isset($_POST['submit'])) {
    echo $username = $_POST['username'];
    echo $password = md5($_POST['password']);


    //SQL check the username and password
    $sql = "SELECT * FROM tbl_user WHERE username='$username' and password='$password'";

    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $count = mysqli_num_rows($res);
    $error_message;
    if ($count == 1) {
        //User Available and Login Success
        $_SESSION['user_login'] = "<div class='success'>Login Successfully</div>";
        $_SESSION['user'] = $username;
        // $_SESSION['']
        //redirect to admin panel
        header('location:' . SITEURL . 'user/index.php');
    } else {
        $_SESSION['user_login'] = "<div class='error'>Your username or password is incorrect</div>";
        // $error_message = "Your username or password is incorrect";
        header('location:' . SITEURL . 'user/login.php');

    }
}

// var_dump($_SESSION); 
?>

<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>YZL Co,ltd</title>
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
                        <h2>login</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================login_part Area =================-->
 
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6">

                    <div class="login_part_text text-center">

                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="./signup.php" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_inner">

                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>

                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">

                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="username" value=""
                                        placeholder="Username">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                        placeholder="Password">
                                </div>
                                <span class="mt-2" style="color:red;">
                                    <?php
                                    if (isset($_SESSION['login_error'])) {
                                        echo $_SESSION['login_error'];
                                    }
                                    ?>
                                </span>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" name="submit" class="btn_3">
                                        log in
                                    </button>
                                    <a href="./index.php">Continue Without Logging In?</a>
                                    <a class="lost_pass" href="./forget_password.php">Forget Password?</a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

    <!-- reach_us  part end-->


    <!--::footer_part start::-->
    <?php include "partials/footer.php" ?>
    <!--::footer_part end::-->

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