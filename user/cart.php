<?php
include "config.php";
include "login_check.php";
$_SESSION['message'] = 'You Need to Login to make purchase';

$username = $_SESSION['user'];

$sql = "SELECT * FROM cart where username='$username'";
$result = mysqli_query($conn, $sql);
if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
  header('location:cart.php');
}
if (isset($_GET['delete_all'])) {

  $delete_all = $_GET['delete_all'];
  if ($delete_all == 'TRUE') {
    mysqli_query($conn, "DELETE FROM cart");
  }
}
if (isset($_POST['update_quantity'])) {
  $id = $_POST['product_id'];
  $product_quantity = $_POST['product_quantity'];
  $product_price = $_POST['product_price'];
  $total_price = $product_price * $product_quantity;
  $sql1 = "UPDATE cart SET 
    quantity='$product_quantity',
    total_price='$total_price'
    WHERE id=$id";
  mysqli_query($conn, $sql1) or die(mysqli_error($conn));
  header("location:cart.php");
}


// echo $id;
// if (isset($_POST['submit'])) {
//   $id = $_GET['id'];
//   echo $_POST['price'];
//   echo $_POST['quantity'];
// }
// var_dump($_SESSION['cart']);
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
  <!-- icon CSS -->
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <!-- magnific popup CSS -->
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/nice-select.css">
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
            <h2>cart list</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb part end-->

  <!--================Cart Area =================-->
  <?php $count1 = mysqli_num_rows($result);
  if ($count1 > 0) { ?>
    <section class="cart_area ">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($result == TRUE) {
                  $count = mysqli_num_rows($result);
                  while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['id'];
                    $product_name = $rows['product_name'];
                    $product_price = $rows['price'];
                    $product_image = $rows['product_image'];
                    $product_quantity = $rows['quantity'];
                    $total_price;
                    ?>
                    <form method="POST">
                      <tr>
                        <td>
                          <div class=" media">
                            <div class="d-flex">
                              <img src="../images/category<?php echo $product_image ?>" alt="" />
                            </div>
                            <div class="media-body">
                              <p><?php echo $product_name ?></p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <h5><?php echo $product_price ?> MMK</h5>
                        </td>
                        <td>
                          <div class="product_count">

                            <input type="number" name="product_quantity" value="<?php echo $product_quantity ?>" min="0"
                              max="<?php echo $product_quantity ?>" class="qty" />

                            <div style="margin-top:10px"></div>

                        </td>
                        <td>
                          <h5 style="width: 100px;"><?php echo $product_price * $product_quantity ?> MMK</h5>
                        </td>
                        <td>
                          <input type="hidden" name="product_id" value="<?php echo $id ?>" />
                          <input type="hidden" name="product_name" value="<?php echo $product_name ?>" />
                          <input type="hidden" name="product_price"" value=" <?php echo $product_price ?>" />
                          <input class="genric-btn success" type="submit" name="update_quantity" value="Update" />
                          <a class="genric-btn danger" name="delete_item" href="cart.php?delete=<?php echo $id; ?>">Delete</a>
                    </form>
                    </td>
                    </tr>
                    <?php
                  }
                }
                ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Grand Total</h5>
                  </td>
                  <td>
                    <h5><?php
                    $sql_total = "SELECT sum(total_price) AS total_price FROM cart where username='$username'";
                    $result_total = mysqli_query($conn, $sql_total);
                    $row_total = mysqli_fetch_assoc($result_total);
                    $total_price = $row_total['total_price'];
                    echo $total_price;
                    ?> MMK</h5>
                  </td>

                  <td></td>
                </tr>

              </tbody>
            </table>
            <div class="checkout_btn_inner float-right">
              <a class="genric-btn primary default circle" href="./product_list.php">Continue Shopping</a>
              <a class="genric-btn success default circle" href="./checkout.php">Proceed to Checkout</a>
              <a class=" genric-btn danger circle" href="./cart.php?delete_all=TRUE">Delete All From Cart</a>
            </div>

          </div>
    </section>
  <?php } else { ?>
    <section class="confirmation_part">

      <div class="col-lg-12">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="confirmation_tittle">
                <span>You don't add anything in your cart.</span>
              </div>
              <div class="float-right">

                <a href="./product_list.php" class="btn_1 ">Start Shopping</a>
              </div>
            </div>
          </div>
        </div>
    </section>
  <?php } ?>
  <!--================End Cart Area =================-->
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