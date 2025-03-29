<?php
include "config.php";
// $order_id = $_GET['id'];
// $order_id = 50;
$orderNumber = "#Order" . date('YmdHis') . rand(1000, 9999);
$username = $_SESSION['user'];
$sql = "SELECT * FROM tbl_order order by id desc";
// echo $sql;

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$get_results = mysqli_fetch_assoc($result);
$order_number = $get_results['order_number'];
$order_date = $get_results['order_date'];
$customer_name = $get_results['customer_name'];
$customer_gmail = $get_results['customer_gmail'];
$customer_address = $get_results['customer_address'];
$phone_number = $get_results['customer_contact'];
$total_price = $get_results['total_price'];
$total_products = $get_results['total_products'];
$payment_method = $get_results['payment_method'];
$quantity = $get_results['quantity'];
$sql_total = "SELECT SUM(total_price) AS total_price FROM cart where username='$username'";
$result_total = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_assoc($result_total);
$get_total = $row_total['total_price'];

if (isset($_POST['continue_shopping'])) {
  //   if (isset($_FILES['image']['name'])) {
//     //Auto Renaming

  //     $image_name = $_FILES['image']['name'];
//     $ext = end(explode('.', $image_name));
//     $image_name = "Payment_Screenshot" . rand(000, 999) . '.' . $ext;
//     $source_path = $_FILES['image']['tmp_name'];
//     $destination_path = "../images/payment/" . $image_name;
//     $upload = move_uploaded_file($source_path, $destination_path);

  //     if ($upload == false) {
//       // header('location:' . SITEURL . 'admin/add_category.php');
//     }
//   } else {
//     $image_name = "";
//   }
//   $sql1 = "INSERT INTO tbl_payment SET 
// order_number='$order_number',
// payment_number='$payment_number',
// customer_name='$customer_name',
// delivery_status='Pending',
// payment_image='$image_name'";
//   $res = mysqli_query($conn, $sql1);
//   if ($res == TRUE) {
  mysqli_query($conn, "DELETE FROM cart WHERE username='$username'") or die(mysqli_error($conn));
  header('location: product_list.php');
  // }
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
            <h2>confirmation</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb part end-->

  <!--================ confirmation part start =================-->
  <section class="confirmation_part section_padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="confirmation_tittle">
            <span>Thank you. Your order has been received.</span>
          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>order info</h4>
            <ul>
              <li>
                <p>order number</p><span>: <?php echo $order_number ?></span>
              </li>
              <li>
                <p>Order Date</p><span>: <?php echo $order_date ?></span>
              </li>
              <li>
                <p>Total Price</p><span>: <?php echo $total_price ?> MMK</span>
              </li>
              <li>
                <p>Total Products</p><span>: <?php echo $total_products ?> MMK</span>
              </li>
              <li>
                <p>Payment Method</p><span>: <?php echo $payment_method ?></span>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>shipping Address</h4>
            <ul>
              <li>
                <p>Customer Name</p><span>: <?php echo $customer_name ?></span>
              </li>
              <li>
                <p>Customer Gmail</p><span>: <?php echo $customer_gmail ?></span>
              </li>
              <li>
                <p>Customer Phone Number</p><span>: <?php echo $phone_number ?></span>
              </li>
              <li>
                <p>Customer Address</p><span>: <?php echo $customer_address ?></span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="order_details_iner">
            <h3>Order Details</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">Product</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result1 = mysqli_query($conn, "SELECT * FROM cart WHERE username='$username'");
                if ($result1 == TRUE) {
                  while ($rows = mysqli_fetch_assoc($result1)) {
                    $product_name = $rows['product_name'];
                    $total_quantity = $rows['quantity'];
                    // $total_price = $rows['total_price'];
                    ?>
                    <tr>

                      <th colspan="2"><span><?php echo $product_name ?></span></th>
                      <th>x <?php echo $total_quantity ?></th>
                      <th> <span><?php echo $total_price ?> MMK</span></th>
                    </tr>
                  <?php }
                }
                ?>

                <tr>
                  <th colspan="3">Subtotal</th>
                  <th> <span>
                      <?php

                      echo $total_price; ?> MMK
                    </span></th>
                </tr>
                <!-- <tr>
                  <th colspan="3">Delivery Fees</th>
                  <th><span> <strong>5000 MMK</strong></span></th>
                </tr> -->
              </tbody>
              <tfoot>
                <tr>
                  <th scope="col">Quantity</th>
                  <th scope="col">
                    <span>x<?php
                    // $result2 = mysqli_query($conn, "SELECT * FROM cart  WHERE username='$username'") or die(mysqli_error($conn));
                    // echo $count = mysqli_num_rows($result2);
                    echo $quantity ?></span>
                  </th>
                  <th scope="col">Total</th>
                  <th scope="col"><span><?php echo $total_price ?> MMK</span></th>
                </tr>
              </tfoot>
            </table>
          </div>
          <form class="row contact_form" method="post">
            <!-- <div class="mt-4 mb-5 col-md-6 form-group p_star">

              <label for="Image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Please Provide
                Your Payment Screenshot</label>
              <input type="file" name="image" id="image"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required />
            </div> -->

            <input type="submit" name="continue_shopping" class="btn_1 float-right" value="Continue Shopping" />
          </form>
        </div>
      </div>
    </div>
  </section>
  <!--================ confirmation part end =================-->

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