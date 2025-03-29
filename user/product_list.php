<?php
include 'config.php';
include 'add_to_cart.php';

if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
}

// Fetch all unique categories
$sql_categories = "SELECT DISTINCT category FROM tbl_medicine";
$result_categories = mysqli_query($conn, $sql_categories) or die(mysqli_error($conn));

?>

<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>YZL Co,ltd</title>
    <link rel="icon" href="assets/pharmacy_logo.jpg">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include "partials/header.php" ?>
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Product List</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="margin-top: 20px;" class="product_list ">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                </div>

                <div class="col-md-12">
                    <div class="product_list">
                        <div class="row">
                            <?php
                            while ($row_category = mysqli_fetch_assoc($result_categories)) {
                                $category_name = $row_category['category'];

                                // Fetch products for the current category
                                $sql_products = "SELECT * FROM tbl_medicine WHERE category='$category_name'";
                                $result_products = mysqli_query($conn, $sql_products) or die(mysqli_error($conn));
                                ?>
                                <h3><strong><?php echo $category_name; ?></strong></h3>
                                <div class="row">
                                    <?php
                                    while ($row_product = mysqli_fetch_assoc($result_products)) {
                                        $id = $row_product['id'];
                                        $product_name = $row_product['product_name'];
                                        $category = $row_product['category'];
                                        $indication = $row_product['indication'];
                                        $packaging = $row_product['packaging'];
                                        $manufacturer = $row_product['manufacturer'];
                                        $country = $row_product['country'];
                                        $quantity = $row_product['quantity'];
                                        $price = $row_product['price'];
                                        $image_name = $row_product['image_name'];
                                        $expiry_date = $row_product['expiry_date'];
                                        ?>
                                        <div class="col-lg-6 col-sm-6">
                                            <form method="post"
                                                action="./product_list.php?id=<?php echo $id ?> & image_name=<?php echo $image_name ?>">
                                                <div class="single_product_item">
                                                    <a href="./single-product.php?id=<?php echo $id; ?>">
                                                        <img src="../images/category<?php echo $image_name ?>" alt="#"
                                                            class="img-fluid">
                                                    </a>
                                                    <h3> <a href="./single-product.php?id=<?php echo $id; ?>">
                                                            <?php echo $product_name ?></a> </h3>
                                                    <p><?php echo $price ?> mmk</p>
                                                    <p><?php echo $category ?></p>
                                                    <p><?php echo $packaging ?></p>
                                                    <p><?php echo $manufacturer ?></p>
                                                    <?php if ($expiry_date != "") { ?>
                                                        <p><?php echo $expiry_date ?> (expiry_date)</p>
                                                    <?php }
                                                    ?>
                                                    <div class="card_area ">
                                                        <p>Quantity</p>
                                                        <?php if ($quantity < 1) {
                                                            echo "<p class='text-danger'>Out of Stock</p>";
                                                        } ?>
                                                    </div>
                                                    <!-- <input type="number" name="product_quantity" value="1" min="0" class="qty"> -->
                                                    <input type="hidden" name='product_id' value="<?php echo $id ?>">
                                                    <input type="hidden" name='product_name'
                                                        value="<?php echo $product_name ?>">
                                                    <input type="hidden" name='product_price' value="<?php echo $price ?>">
                                                    <!-- <input type="hidden" name='product_quantity' value="1"> -->
                                                    <!-- <input type="hidden" name='product_image' value=<?php echo $image_name ?>> -->
                                                    <?php if ($quantity >= 1) { ?>
                                                        <input type="number" name="product_quantity" value="1" min="0"
                                                            max="<?php echo $quantity ?>" class="qty">
                                                        <div style="margin-top:10px"></div>
                                                        <input type="submit" class="btn_3" name="add_to_cart" value="Add to Cart"
                                                            onclick="">
                                                    <?php } ?>
                                                </div>
                                            </form>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>

<?php include "partials/footer.php" ?>
<!--::footer_part end::-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
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