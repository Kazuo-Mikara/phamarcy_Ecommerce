<?php include("config.php");
// include "add_to_cart.php";
//Get the ID of the Admin to be Deleted 

$product_id = $_GET['id'];
//  <!-- //Create SQL -->
$sql = "SELECT * FROM tbl_medicine WHERE id=$product_id";
$result = mysqli_query($conn, $sql);

$username;
// var_dump($_GET);
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
}
// echo $id = $_POST['product_id'];
// echo $product_image = $_POST['product_image'];
// echo $product_quantity = $_POST['product_quantity'];
// echo $product_price = $_POST['product_price'];

if (isset($_POST['add_to_cart'])) {

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
    $total_price = $product_price * $product_quantity;
    $check_cart_numbers = mysqli_query($conn, "SELECT COUNT(*) FROM cart WHERE product_name = '$product_name' AND username = '$username'") or die('query failed');
    $sql = "INSERT INTO cart SET 
        pid='$product_id',
        username='$username',
        product_name='$product_name',
        price='$product_price',
        product_image='$product_image',
        quantity='$product_quantity',
        total_price='$total_price'
        ";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $message[] = 'product added to cart';


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
    <!--::header part start::-->
    <?php include "partials/header.php" ?>
    <!-- Header part end-->

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part single_product_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
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
                        $expiry_date = $rows['expiry_date'];
                        ?>
                        <div class="product_img_slide owl-carousel">
                            <div class="single_product_img">
                                <img src="../images/category<?php echo $image_name ?>" alt="#" width="100%">
                            </div>
                            <div class="single_product_img">
                                <img src="../images/category<?php echo $image_name ?>" alt="#" class="img-fluid">
                            </div>
                            <div class="single_product_img">
                                <img src="../images/category<?php echo $image_name ?>" alt="#" class="img-fluid">
                            </div>
                            <div class="single_product_img">
                                <img src="../images/category<?php echo $image_name ?>" alt="#" class="img-fluid">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="single_product_text text-center">
                            <h3><?php echo $product_name ?></h3>

                            <p> <strong> Category <br> </strong>
                                <?php echo $category ?> </p>

                            <p> <strong> Price <br> </strong>
                                <?php echo $price ?> mmk </p>

                            <p> <strong> Packaging <br> </strong>
                                <?php echo $packaging ?> mmk </p>

                            <p> <strong> INDICATION <br> </strong>
                                <?php echo $indication ?> </p>
                            </p>
                            <p> <strong> Manufacturer <br> </strong>
                                <?php echo $manufacturer ?> </p>
                            <?php if($expiry_date != "" ) {?>
                            <p> <strong> Expiry Date <br> </strong>
                                <?php echo $expiry_date ?> </p>
<?php }?>
                            <?php if ($quantity >= 1) { ?>
                                <form method="POST">
                                    <div class="card_area">
                                        <div class="product_count_area">
                                            <p>Quantity</p>

                                            <div class="product_count d-inline-block">
                                                <!-- <span class="product_count_item inumber-decrement"> <i
                                                        class="ti-minus"></i></span> -->
                                                <input type="number" name="product_quantity" value="1" min="0"
                                                    max="<?php echo $quantity ?>" class="qty">
                                                <!-- <input class="product_count_item input-number" id="quantity" type="text"
                                                    name="product_quantity" value="1" min="0" max="<?php echo $quantity ?>"> -->
                                                <input type="hidden" name="product_id" id="product_id"
                                                    value="<?php echo $id ?>">
                                                <input type="hidden" name="product_name" id="product_name"
                                                    value="<?php echo $product_name ?>">
                                                <input type="hidden" name="product_image" id="product_image"
                                                    value="<?php echo $image_name ?>">
                                                <input type="hidden" name="product_price" id="price"
                                                    value="<?php echo $price ?>">
                                                <!-- <span class="product_count_item number-increment">
                                                    <i class="ti-plus"></i></span> -->
                                            </div>
                                            <p id="price-display">
                                                <?php echo $price; ?> mmk
                                            </p>

                                            <script>
                                                let price = <?php echo $price ?>; // initial price
                                                let quantity = 1; // initial quantity

                                                document.addEventListener("DOMContentLoaded", function () {
                                                    const decrementButton = document.querySelector('.inumber-decrement');
                                                    const incrementButton = document.querySelector('.number-increment');
                                                    const quantityInput = document.querySelector('#quantity');
                                                    const priceDisplay = document.querySelector('#price-display');

                                                    decrementButton.addEventListener('click', function () {
                                                        if (quantity > 1) {
                                                            quantity--;
                                                            quantityInput.value = quantity;
                                                            updatePrice();
                                                        }
                                                    });

                                                    incrementButton.addEventListener('click', function () {
                                                        if (quantity < 10) {
                                                            quantity++;
                                                            quantityInput.value = quantity;
                                                            updatePrice();
                                                        }
                                                    });

                                                    quantityInput.addEventListener('input', function () {
                                                        quantity = parseInt(quantityInput.value);
                                                        updatePrice();
                                                    });

                                                    function updatePrice() {
                                                        let newPrice = price * quantity;
                                                        priceDisplay.innerText = newPrice + ' mmk';
                                                        document.getElementById('price').value = newPrice;
                                                    }
                                                });
                                            </script>
                                        </div>
                                        <div class="add_to_cart">
                                            <input type="submit" class="btn_3" name="add_to_cart" value="Add to Cart">
                                        </div>
                                    </div>
                                </form>
                            <?php } else { ?>
                                <?php
                                echo "<p class='text-danger'>Out of Stock</p>";
                            } ?>
                            <a class="mt-3 genric-btn primary-border radius " href="./product_list.php">Back to product
                                page</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->
    <!-- subscribe part here -->

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