<?php
include "config.php";
$username = $_SESSION['user'];

$sql = "SELECT * FROM cart where username='$username'";
$result = mysqli_query($conn, $sql);


$sql_total = "SELECT sum(total_price) AS total_price FROM cart where username='$username'";
$result_total = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_price_before_discount = $row_total['total_price'];
// $total_price = $sub_total_price + 5000;
$orderNumber = "#Order" . date('YmdHis') . rand(1000, 9999);
$order_date = $orderNumber = date('YmdHis');
$get_quantity = mysqli_query($conn, "SELECT SUM(quantity) AS total_quantity FROM cart WHERE username='$username'");

$row = mysqli_fetch_assoc($get_quantity);
$get_total_quantity = $row['total_quantity'];
$extra_products = floor($get_total_quantity / 10);
$total_quantity = $get_total_quantity + $extra_products;
$order_status = "Pending";


$sql_discount = "SELECT discount_percent AS discount FROM discounts";
$result_discount = mysqli_query($conn, $sql_discount);
$row_discount = mysqli_fetch_assoc($result_discount);
$get_discount = $row_discount['discount'];
$cart_total = 0;
$cart_products[] = '';

$cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE username = '$username'") or die('query failed');
if (mysqli_num_rows($cart_query) > 0) {
  while ($cart_item = mysqli_fetch_assoc($cart_query)) {
    $cart_products[] = $cart_item['product_name'] . ' ' . ' (' . $cart_item['price'] . ' ' . 'x' . $cart_item['quantity'] . ') ';
    $sub_total = ($cart_item['price'] * $cart_item['quantity']);
    $cart_total += $sub_total;
  }
}

$total_products = implode(",", $cart_products);


$sql_discount_price_over_1lakhs = "SELECT * FROM discounts where discount_name='over_1lakhs'";
$result_discount_price_over_1lakhs = mysqli_query($conn, $sql_discount_price_over_1lakhs);
$get_discount_price_over_1lakhs = mysqli_fetch_assoc($result_discount_price_over_1lakhs);
$discount_percent_over_1lakhs = $get_discount_price_over_1lakhs['discount_percent'];

$sql_discount_price_under_1lakhs = "SELECT * FROM discounts where discount_name='under_1lakhs'";
$result_discount_price_under_1lakhs = mysqli_query($conn, $sql_discount_price_under_1lakhs);
$get_discount_price_under_1lakhs = mysqli_fetch_assoc($result_discount_price_under_1lakhs);
$discount_percent_under_1lakhs = $get_discount_price_under_1lakhs['discount_percent'];
// echo $total_price_after_discount;
$discount_price;
if ($total_price_before_discount > 100000) {
  $discount_price = $total_price_before_discount * $discount_percent_over_1lakhs / 100;
  $total_price_after_discount = $total_price_before_discount - $discount_price;
}
if ($total_price_before_discount < 100000) {
  $discount_price = $total_price_before_discount * $discount_percent_under_1lakhs / 100;
  $total_price_after_discount = $total_price_before_discount - $discount_price;
}
$delivery_fees = 5000;
$total_price_after_discount;
$final_price = $total_price_after_discount + $delivery_fees;

if (isset($_POST['proceed'])) {
  echo $customer_name = $_POST['name'];
  echo $customer_gmail = $_POST['gmail'];
  echo $phone_number = $_POST['number'];
  echo $address = $_POST['address'];
  echo $payment_method = $_POST['selector'];
  echo $message = isset($_POST['message']) ? $_POST['message'] : "NA";
  if (isset($_FILES['image']['name'])) {
    //Auto Renaming

    $image_name = $_FILES['image']['name'];
    $ext = end(explode('.', $image_name));

    //
    $image_name = "Payment Screenshot" . rand(000, 999) . '.' . $ext;
    $source_path = $_FILES['image']['tmp_name'];
    $destination_path = "../images/payment/" . $image_name;
    $upload = move_uploaded_file($source_path, $destination_path);

    if ($upload == false) {
      // header('location:' . SITEURL . 'admin/add_category.php');
    }
  } else {
    $image_name = "";
  }

  // $statement = "INSERT INTO tbl_order SET
  // order_number='$orderNumber',
  // quantity='$total_quantity',
  // total='$total_price',
  // order_status='$status',
  // order_date='$order_date',
  // payment_method='$payment_method',
  // customer_name='$customer_name',
  // customer_gmail='$customer_gmail',
  // customer_contact='$phone_number,
  // customer_address='$address',
  // order_notes='$message'";
  $statement = "INSERT INTO tbl_order (
        username,
        order_number,
        quantity,
        total_price,
        delivery_status,
        order_date,
        payment_method,
        payment_image,
        customer_name,
        customer_gmail,
        customer_contact,
        customer_address,
        order_notes,
        total_products
    ) VALUES (
        '$username',
        '$orderNumber',
        '$total_quantity',
        '$final_price',
        '$order_status',
        '$order_date',
        '$payment_method',
        '$image_name',
        '$customer_name',
        '$customer_gmail',
        '$phone_number',
        '$address',
        '$message',
        '$total_products'
    )";

  $result1 = mysqli_query($conn, $statement) or die(mysqli_error($conn));

  header('location:confirmation.php');
}


if (isset($_GET['delete'])) {
  mysqli_query($conn, "DELETE FROM cart ") or die(mysqli_error($conn));
  header('location:product_list.php');
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
  <section class="breadcrumb_part">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb_iner">
            <h2>checkout</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb part end-->

  <!--================Checkout Area =================-->
  <section style="margin:10px 20px;" class="checkout_area ">
    <div class="container">

      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>
            <form class="row contact_form" method="post" enctype="multipart/form-data">
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="first" name="name" placeholder="Customer Name" required />

              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="last" name="gmail" placeholder="Customer Gmail" required />
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="number" name="number" placeholder="Customer Phone Number"
                  required />
              </div>

              <div class="col-md-12 form-group p_star">
                <textarea class="form-control" name="address" id="message" rows="2" cols="80"
                  placeholder="Address"></textarea>
              </div>

              <div class="col-md-12 form-group">
                <textarea class="form-control" name="message" id="message" rows="1"
                  placeholder="Order Notes"></textarea>
              </div>
              <input type="hidden" name="total_price" value="<?php echo $total_price; ?>" />
              <input type="hidden" name="total_quantity" value="<?php echo $total_quantity; ?>" />
          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <li>
                  <a href="#">Product
                    <span>Total</span>
                  </a>
                </li>

                <li>
                  <?php
                  if ($result == TRUE) {
                    $count = mysqli_num_rows($result);
                    while ($rows = mysqli_fetch_assoc($result)) {
                      $id = $rows['id'];
                      $product_name = $rows['product_name'];
                      $product_price = $rows['price'];
                      $product_image = $rows['product_image'];
                      $product_quantity = $rows['quantity'];
                      // $sub_total = $rows['total_price'];
                      // $total_price += $product_price;
                      ?>
                      <?php echo $product_name ?>
                      <a>

                        <span class="middle">x <?php echo $product_quantity ?></span>
                        <span class="last"><?php echo $product_price * $product_quantity ?> mmk</span>
                      </a>

                      <?php
                    }
                  }
                  ?>
                </li>
              </ul>
              <ul class="list list_2">
                <?php if ($total_quantity > 10) { ?>
                  <li>
                    <a href="#">FOC:
                      <span>+<?php

                      echo $extra_products;
                      ?> </span>
                    </a>
                  </li>

                <?php } ?>
                <li>
                  <a href="#">Grand Total
                    <span><?php

                    echo $total_price_before_discount;
                    ?> MMK</span>
                  </a>
                </li>


                <?php if ($total_price_before_discount > 100000) { ?>
                  <li>
                    <a href="#">Discount <?php echo $discount_percent_over_1lakhs ?>%
                      <span> <?php echo $discount_price ?> MMK</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">Delivery Fees
                      <span> 5000 MMK</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">Total
                      <span><?php echo $final_price;
                      ?> MMK</span>
                    </a>
                  </li>

                <?php } else { ?>
                  <li>
                    <a href="#">Discount <?php echo $discount_percent_under_1lakhs ?>%
                      <span>
                        <?php echo $discount_price ?> MMK
                      </span>
                    </a>
                  </li>

                  <li>
                    <a href="#">Delivery Fees
                      <span> 5000 MMK</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">Total
                      <span><?php echo $final_price;
                      ?> MMK</span>
                    </a>
                  </li>

                <?php } ?>

              </ul>
              <div class="payment_item">
                <div class="radion_btn">
                  <input type="radio" id="f-option5" name="selector" value="wavepay" required />
                  <label for="f-option5">Wave Pay</label>
                  <!-- <img src="assets/wavepay.png" width="80px" /> -->
                  <div class="check"></div>
                  <p>Wave Account Number
                    <br>0912345678(John Doe)
                  </p>
                </div>

              </div>
              <div class="payment_item active">
                <div class="radion_btn">
                  <input type="radio" id="f-option6" name="selector" value="kbzpay" required />
                  <label for="f-option6">KBZPay</label>
                  <!-- <img src="assets/kbzpay.png" width="80px" /> -->
                  <div class="check">
                  </div>
                  <p>Kpay Phone Number
                    <br>0987654321 (John Doe)
                  </p>
                </div>
              </div>
              <div class="payment_item">
                <div class="radion_btn">
                  <input type="radio" id="f-option7" name="selector" value="cod" required />
                  <label for="f-option7">Cash on Deli</label>
                  <div class="check">
                  </div>


                </div>
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Please Upload Your Payment Screenshot</label>

                <input class="form-control" name="image" type="file" id="formFile">
              </div>
              <input type="submit" class="genric-btn success" name="proceed" value="Proceed" />
              <a class="genric-btn danger" href="./checkout.php?delete">Cancel</a>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->

  <!--::footer_part start::-->
  <?php include "partials/footer.php" ?>
  <!--::footer_part end::-->

  <!-- jquery plugins here-->
  <script src=" js/jquery-1.12.1.min.js"></script>
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