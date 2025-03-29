<?php
include ('config.php');
// session_start();
// include "login_check.php";
?>

<?php
//Query to get all all admin
// include 'config.php';
$sql = "SELECT * FROM tbl_medicine limit 9";
$result = mysqli_query($conn, $sql);
if (isset($_SESSION['user'])) {

    $username = $_SESSION['user'];
}

$sn = 1;
//Check whether the query is executed or not



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
    <!-- <link rel="stylesheet" href="css/all.css"> -->
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
    <?php include "partials/header.php" ?>
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1 style="margin-left: 6px">Best quality
                                Medicines</h1>
                            <p style="margin-left: 8px">Growing with you on your wellness journey. <br> Your partner in
                                health, for a lifetime of
                                value and economic growth.</p>
                            <a href="./product_list.php" class="btn_1">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner_img">
            <img src="img/banner2.png" alt="#" class="img-fluid">
            <img src="img/banner_pattern.png " alt="#" class="pattern_img img-fluid">
        </div>
    </section>
    <!-- banner part start-->

    <!-- product list start-->
    <section class="single_product_list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center">Hot Now</h2>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="img/Gisomult.jpg" class="img-fluid" alt="#">
                                    <img src="img/product_overlay.png" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="product_list.php">

                                    <div class="single_product_content">
                                        <h2> <a href="single-product.php?id=71">
                                                <strong>Gisomult</strong> <br>
                                                Nutraceuticals And Supplements </a> </h2>
                                        <a href="http://localhost/website/user/single-product.php?id=71"
                                            class="btn_3">Explore Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="img/BoniCAL.jpg" class="img-fluid" alt="#">
                                    <img src="img/product_overlay.png" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">

                                    <h2> <a href="single-product.php?id=73">
                                            <strong>BoniCAL</strong> <br>
                                            Nutraceuticals And Supplements </a> </h2>
                                    <a href="single-product.php?id=73" class="btn_3">Explore Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="img/Dermazol Plus.jpg" class="img-fluid" alt="#">
                                    <img src="img/product_overlay.png" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">

                                    <h2> <a href="single-product.php?id=72">
                                            <strong>Dermazol Plus</strong> <br>
                                            Cream & Lotions </a> </h2>
                                    <a href="single-product.php?id=72" class="btn_3">Explore Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list end-->


    <!-- trending item start-->
    <section class="trending_items">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Trending Items</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if ($result == TRUE) {
                    $count = mysqli_num_rows($result);

                }
                while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['id'];
                    $product_name = $rows['product_name'];
                    $category = $rows['category'];
                    $indication = $rows['indication'];
                    $packaging = $rows['packaging'];
                    $manufacturer = $rows['manufacturer'];
                    $country = $rows['country'];
                    $quantity = $rows['quantity'];
                    $price = $rows['price'];
                    $image_name = $rows['image_name'];
                    ?>

                    <div class="col-lg-4 col-sm-6">
                        <div class="single_product_item">
                            <a href="single-product.php?id=<?php echo $id ?>">
                                <div class="single_product_item_thumb">
                                    <img src="../images/category<?php echo $image_name ?>" alt="#" class="img-fluid">
                                </div>
                                <h3>
                                    <strong><?php echo $product_name ?></strong>
                                </h3>
                            </a>
                            <a href="./product_list.php?selected_category=<?php echo $category ?>">
                                <p><?php echo $category ?></p>
                            </a>
                        </div>
                    </div>
                <?php } ?>



            </div>
        </div>
    </section>
    <!-- trending item end-->

    <!-- client review part here -->

    <!-- client review part end -->


    <!-- feature part here -->
    <section class="feature_part ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_1.svg" alt="#">
                        <h4>Credit Card Support</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_2.svg" alt="#">
                        <h4>Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_3.svg" alt="#">
                        <h4>Free Delivery</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_4.svg" alt="#">
                        <h4>Product with Gift</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature part end -->


    <!-- subscribe part end -->

    <!--::footer_part start::-->
    <?php include "partials/footer.php" ?>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- magnific popup js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- carousel js -->
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