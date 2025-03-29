<?php include "config.php";
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_order WHERE id=$id";
$get_result = mysqli_query($conn, $sql);
$results = mysqli_fetch_assoc($get_result);
$order_number = $results['order_number'];
$order_date = $results['order_date'];
$quantity = $results['quantity'];
$total_price = $results['total_price'];
$total_products = $results['total_products'];
$delivery_status = $results['delivery_status'];
$payment_method = $results['payment_method'];
$customer_name = $results['customer_name'];
$customer_gmail = $results['customer_gmail'];
$customer_phone = $results['customer_contact'];
$customer_address = $results['customer_address'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="TechInvoice - Domain Pages Tailwind CSS 3 HTML Template, It’s fully responsive and built Tailwind v3"
        name="description" />
    <meta content="Techzaa" name="author" />

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Style css -->
    <link href="assets/css/style.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="md:mx-56 bg-gray-100">

    <section class="overflow-hidden relative mx-auto">
        <div class="flex absolute 2xl:end-60 bottom-3 xl:bottom-auto">
            <a href="javascript:window.print()"
                class="flex items-center justify-end py-2 px-7 rounded-md bg-white print:hidden">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" class="pe-3">
                        <path
                            d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                    </svg>
                </span>
                Print
            </a>
            <a class="flex items-center justify-end py-2 px-7 rounded-md bg-white print:hidden"
                href="./orders.php">Back</a>
        </div>

        <div class="container">
            <div>
                <div class="bg-white rounded-t-3xl sm:p-16 p-10">
                    <div class="flex flex-wrap items-center justify-between gap-6">
                        <img src="assets/images/logo-dark.png" alt="">
                        <div>
                            <h4 class="text-5xl font-semibold uppercase tracking-widest">Invoice</h4>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center justify-between mt-10">
                        <div class="flex flex-wrap gap-3">
                            <h3 class="text-xl font-semibold">Invoice To :</h3>
                            <div>
                                <h4 class="text-xl font-semibold"><?php echo $customer_name ?></h4>
                                <p class="text-sm font-medium text-gray-500 my-1"><?php echo $customer_phone ?></p>
                                <p class="text-sm font-medium text-gray-500 my-1"><?php echo $customer_address ?></p>

                            </div>
                        </div>
                        <div class="bg-blue-600/10 p-7">
                            <p class="text-xl font-semibold">Invoice No: <span
                                    class="ps-10 text-base text-gray-500"><?php echo $order_number; ?></span></p>
                            <p class="text-xl font-semibold">Date: <span
                                    class="ps-10 text-base text-gray-500"><?php echo $order_date; ?></span></p>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="border-collapse table-auto w-full text-sm mt-14 mb-12 whitespace-pre">
                            <thead>
                                <tr>
                                    <th class="p-2 border-b tracking-widest text-lg font-medium text-start">No.</th>
                                    <th class="p-2 border-b tracking-widest text-lg font-medium ">Item Description</th>
                                    <th class="p-2 border-b tracking-widest text-lg font-medium text-start">Price</th>
                                    <th class="p-2  border-b tracking-widest text-lg font-medium text-center">Qty
                                    </th>
                                    <th class="p-2  border-b tracking-widest text-lg font-medium text-centers">FOC
                                    </th>
                                    <th class="p-2 border-b tracking-widest text-lg font-medium text-end">Total</th>

                                </tr>

                            </thead>
                            <tbody class="bg-white">
                                <?php
                                $product_name = $total_products;
                                $product_name = ltrim($product_name, ',');
                                // echo $total_products;
                                $product_items = explode(',', $product_name);
                                // var_dump($product_items);
                                $original_total_price;
                                $sn = 0;
                                foreach ($product_items as $item) {
                                    // Extract the product name, quantity, and price using regular expressions
                                    preg_match('/(.+) \((\d+) x(\d+)\)/', $item, $matches);
                                    // var_dump($matches);
                                    $product_name = $matches[1];
                                    $price = $matches[2];
                                    $quantity = $matches[3];

                                    $sn++;
                                    // echo "<p>Product: $product_name, Price: $price, Quantity: $quantity</p>";
                                    $original_total_price = $quantity * $price;


                                    ?>
                                    <tr>
                                        <?php if ($product_name != "") { ?>
                                            <td class="p-2 text-base font-medium"><?php echo $sn ?></td>
                                            <td class="p-2 text-base font-medium text-center"><?php echo $product_name ?></td>
                                            <td class="p-2 text-base font-medium"><?php echo $price ?></td>
                                            <td class="p-2 text-base font-medium text-center"><?php echo $quantity ?></td>
                                            <td class="p-2 text-base font-medium text-center"></td>
                                            <td class="p-2 text-base font-medium text-end"><?php echo $quantity * $price ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="md:p-20 p-10 bg-blue-600/10 rounded-b-3xl">
                    <div class="flex flex-wrap items-end justify-between gap-6">
                        <div>
                            <p class="w-40 text-xl font-semibold">Payment Method <br> <?php echo $payment_method ?></p>
                            <p class="text-base font-normal mt-4"><?php echo $customer_gmail ?></p>
                        </div>

                        <div>
                            <div class="flex items-center justify-end">
                                <div>

                                    <h2 class="pb-2 text-base font-medium">Discount</h2>
                                    <h2 class="pb-2 text-base font-medium">Delivery Fees</h2>
                                    <h2 class="pb-1 pt-2 text-lg font-semibold border-t border-gray-900">Grand Total
                                    </h2>
                                </div>
                                <div>

                                    <h4 class="pb-2 ps-12 text-base font-medium text-end"> <?php
                                    if ($total_price > 100000) {
                                        echo "5%";
                                    } else {
                                        echo "2%";
                                    }
                                    ?></h4>
                                    <h4 class="pb-2 ps-12 text-base font-medium text-end">5000 MMK</h4>
                                    <h4 class="pb-1 ps-12 pt-2 text-lg font-semibold text-end border-t border-gray-900">
                                        <?php echo $total_price ?> MMK
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center justify-between gap-6">
                        <div class="max-w-xs mt-12">
                            <h1 class="text-xl font-semibold">Delivery Status</h1>
                            <p class="text-base font-normal mt-3">Your Delivery is on the way.</p>
                        </div>

                        <div>
                            <hr class="border-gray-500">
                            <h4 class="text-lg font-semibold pt-1">singnature</h4>
                        </div>
                    </div>

                    <h3 class="md:text-2xl text-lg font-semibold text-center mt-10">Thank You For Your Business</h3>
                </div>
            </div>
        </div>
    </section>

</body>

</html>