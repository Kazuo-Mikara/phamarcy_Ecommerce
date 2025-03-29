<?php
include 'config.php';
include 'add_to_cart.php';

?>

<?php
//Query to get all all admin
// $sql = "SELECT * FROM tbl_medicine Order BY product_name";
// $result = mysqli_query($conn, $sql);
if (isset($_SESSION['user'])) {

    $username = $_SESSION['user'];
}
// echo $selected_category;
$sql_categories = "SELECT DISTINCT category FROM tbl_medicine";
$result_categories = mysqli_query($conn, $sql_categories) or die(mysqli_error($conn));
// $category_name = mysqli_fetch_assoc($result_categories);
// $sn = 1;
// //Check whether the query is executed or not
if (isset($_GET['clear'])) {
    header('location:./product_list.php');
}

if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    $sql = "SELECT * FROM tbl_medicine WHERE product_name LIKE '%$search_query%'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
} else if (isset($_GET['selected_category'])) {

    $selected_category = urldecode($_GET['selected_category']);
    $sql_selected_category = "SELECT * FROM tbl_medicine WHERE category='$selected_category'";
    $result = mysqli_query($conn, $sql_selected_category) or die(mysqli_error($conn));
} else {

    $sql_products = "SELECT * FROM tbl_medicine Order By product_name";
    $result = mysqli_query($conn, $sql_products) or die(mysqli_error($conn));
}



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
    <!-- breadcrumb part end-->

    <!-- product list part start-->
    <section style="margin-top: 20px;" class="product_list ">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="product_sidebar">
                        <div class="single_sedebar">
                            <form action="./product_list.php" method="GET">
                                <input type="text" id="searchInput" name="search" placeholder="Search Product"
                                    value=<?php if (isset($search_query)) {
                                        echo $search_query;
                                    } ?>>

                                <input style="margin-top: 5px;" type="submit" id="searchButton" value="Search" />
                                <input style="margin-top:5px;" type="submit" id="clearButton" value="Clear"
                                    name="clear">
                                <script>
                                    const searchInput = document.getElementById('searchInput');
                                    const clearButton = document.getElementById('clearButton');
                                    const searchResults = document.getElementById('searchResults');


                                    clearButton.addEventListener('click', () => {
                                        searchInput.value = '';
                                        searchResults.innerHTML = '';

                                    });
                                </script>
                            </form>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Category <i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">

                                    <p><strong>Select Category</strong></p>
                                    <?php
                                    $sql_category = "SELECT * FROM tbl_category";
                                    $result_category = mysqli_query($conn, $sql_category);
                                    while ($row_categories = mysqli_fetch_assoc($result_category)) {
                                        $category = $row_categories['CategoryName'];
                                        ?>
                                        <p><a
                                                href="product_list.php?selected_category=<?php echo $category ?>"><?php echo $category ?></a>
                                        </p>

                                    <?php }
                                    ?>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product_list">
                        <div class="row">
                            <?php if (isset($_GET['selected_category'])) { ?>
                                <h3><?php echo $selected_category ?></h3>
                            <?php } ?>
                            <?php


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

                                <div class="col-lg-6 col-sm-6">
                                    <form method="post"
                                        action="./product_list.php?id=<?php echo $id ?> & image_name=<?php echo $image_name ?>">
                                        <div class="single_product_item">

                                            <a href="./single-product.php?id=<?php echo $id; ?>">
                                                <img src="../images/category<?php echo $image_name ?>" alt="#"
                                                    class="img-fluid">
                                            </a>
                                            <h3> <a href="./single-product.php?id=<?php echo $id; ?>">
                                                    <?php echo $product_name ?>
                                                </a> </h3>
                                            <p><?php echo $price ?> mmk</p>
                                            <p><?php echo $category ?></p>
                                            <p><?php echo $packaging ?></p>
                                            <p><?php echo $manufacturer ?></p>

                                            <div class="card_area ">
                                                <p>Quantity</p>
                                                <?php if ($quantity < 1) {
                                                    echo "<p class='text-danger
                                                    '>Out of Stock</p>";
                                                } ?>



                                            </div>

                                            <!-- <input type="number" name="product_quantity" value="1" min="0" class="qty"> -->
                                            <input type="hidden" name='product_id' value="<?php echo $id ?>">
                                            <input type="hidden" name='product_name' value="<?php echo $product_name ?>">
                                            <input type="hidden" name='product_price' value="<?php echo $price ?>">
                                            <!-- <input type="hidden" name='product_quantity' value="1"> -->
                                            <!-- <input type="hidden" name='product_image' value=<?php echo $image_name ?>> -->
                                            <?php if ($quantity > 1) { ?>
                                                <input type="number" name="product_quantity" value="1" min="0" class="qty">
                                                <div style="margin-top:10px"></div>
                                                <input type="submit" class="btn_3" name="add_to_cart" value="Add to Cart">
                                            <?php } ?>

                                        </div>
                                    </form>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

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