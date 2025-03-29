<?php
// include ('config.php');
// var_dump($_POST);
// var_dump($_GET);
include "login_check.php";
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
}
$product_image;
if (isset($_GET['image_name'])) {
    $product_image = $_GET['image_name'];
}
// var_dump($_GET);
// if (isset($_POST['add_to_cart'])) {

//     $product_id = $_POST['product_id'];
//     $product_name = $_POST['product_name'];
//     $product_price = $_POST['product_price'];
// $product_image = $_POST['product_image'];

//     $get_original_quantity = mysqli_query($conn, "SELECT quantity from tbl_medicine WHERE id='$product_id'");
//     $result_original_quantity = mysqli_fetch_assoc($get_original_quantity);
//     $original_quantity = $result_original_quantity['quantity'];
// $ordered_quantity;
//     $ordered_quantity = $_POST['product_quantity'];
//     if ($ordered_quantity < $original_quantity) {

//     }
//     $remaining_quantity = $original_quantity - $ordered_quantity;
//     $update_original_quantity = mysqli_query($conn, "UPDATE tbl_medicine SET quantity='$remaining_quantity' WHERE id='$product_id'");
//     $total_price = $product_price * $ordered_quantity;
//     $check_cart_numbers = mysqli_query($conn, "SELECT COUNT(*) FROM cart WHERE product_name = '$product_name' AND username = '$username'") or die('query failed');
//     $sql = "INSERT INTO cart SET 
//         pid='$product_id',
//         username='$username',
//         product_name='$product_name',
//         price='$product_price',
//         product_image='$product_image',
//         quantity='$ordered_quantity',
//         total_price='$total_price'
//         ";

//     mysqli_query($conn, $sql) or die(mysqli_error($conn));
//     $message[] = 'product added to cart';


// }
if (isset($_POST['add_to_cart'])) {

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    // $product_image = $_POST['product_image'];
    $get_original_quantity = mysqli_query($conn, "SELECT quantity from tbl_medicine WHERE id='$product_id'");
    $result_original_quantity = mysqli_fetch_assoc($get_original_quantity);
    $original_quantity = $result_original_quantity['quantity'];
    $ordered_quantity;
    $ordered_quantity = $_POST['product_quantity'];

    if ($ordered_quantity > $original_quantity) {
        $message[] = 'Error: You have ordered more than the available quantity. Please reduce the quantity.';
        $toast_message = 'Error: You have ordered more than the available quantity. Please reduce the quantity.';
    } else {
        $remaining_quantity = $original_quantity - $ordered_quantity;
        $update_original_quantity = mysqli_query($conn, "UPDATE tbl_medicine SET quantity='$remaining_quantity' WHERE id='$product_id'");
        $total_price = $product_price * $ordered_quantity;
        $check_cart_numbers = mysqli_query($conn, "SELECT COUNT(*) FROM cart WHERE product_name = '$product_name' AND username = '$username'") or die('query failed');
        $sql = "INSERT INTO cart SET 
            pid='$product_id',
            username='$username',
            product_name='$product_name',
            price='$product_price',
            product_image='$product_image',
            quantity='$ordered_quantity',
            total_price='$total_price'
            ";

        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $message[] = 'Product added to cart';
        $toast_message = 'Product added to cart successfully!';
    }
}

?>

<!-- Add the toastr.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

<!-- Display the toast notification -->
<script>
    <?php if (isset($toast_message)) { ?>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        toastr["success"](<?php echo json_encode($toast_message); ?>);
    <?php } ?>
</script>