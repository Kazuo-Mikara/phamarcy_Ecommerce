<?php include "config.php";

$orderNumber = "#Order" . date('YmdHis') . rand(1000, 9999);
$username = $_SESSION['user'];
$sql = "SELECT * FROM tbl_order WHERE username='$username'";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));


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
    <?php include "partials/header.php" ?>
    <!-- Header part end-->

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Orders</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!-- product list part start-->
    <section class="about_us">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="about_us_content">
                        <h5>Your Orders</h5>
                        <!-- <blockquote class="generic-blockquote">
                            <?php echo $orderNumber ?>
                            <?php echo $_SESSION['user'] ?>
                        </blockquote> -->

                    </div>
                </div>
                <div class="row align-items-md-stretch">
                    <?php if ($res == TRUE) {
                        while ($rows = mysqli_fetch_assoc($res)) {
                            $id = $rows['id'];
                            $orderNumber = $rows['order_number'];
                            $quantity = $rows['quantity'];
                            $total_price = $rows['total_price'];
                            $total_products = $rows['total_products'];
                            $orderDate = $rows['order_date'];
                            $orderStatus = $rows['delivery_status'];
                            $payment_method = $rows['payment_method'];
                            $customer_name = $rows['customer_name'];
                            $customer_phone = $rows['customer_contact'];
                            $customer_address = $rows['customer_address'];
                            ?>
                            <div class="col-md-6">
                                <div class="h-100 p-3 bg-body-tertiary border rounded-3">
                                    <p>Order Number : <strong><?php echo $orderNumber ?> </strong></p>
                                    <p>Customer Name : <?php echo $customer_name ?></p>
                                    <p>Customer Phone : <?php echo $customer_phone ?></p>
                                    <p>Customer Address : <?php echo $customer_address ?></p>
                                    <p>Payment Method : <?php echo $payment_method ?></p>
                                    <p>Order Date : <?php echo $orderDate ?></p>
                                    <p>Order Status : <?php echo $orderStatus ?></p>
                                    <p>Total Price : <?php echo $total_price ?> MMK</p>
                                    <p>Total Products: <?php echo $total_products ?> </p>
                                    <p>Total Quantity : <?php echo $quantity ?></p>
                                    <a href="view_invoice.php?id=<?php echo $id ?>" class="genric-btn success radius">View
                                        Voucher</a>
                                    <input class="genric-btn danger radius" value="Cancel Order" name="Cancel" />
                                </div>
                            </div>

                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->

    <!-- feature part here -->



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