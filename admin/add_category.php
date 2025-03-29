<?php
include 'config.php';

?>
<?php
//Process value from the Form and Save it in the Database
// include ('config.php');

//Check whether the submit button is clicked or not
if (isset($_POST['submit'])) {

    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $indication = $_POST['indication'];
    $packaging = $_POST['packaging'];
    $manufacturer = $_POST['manufacturer'];
    $country = $_POST['country'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    var_dump($_POST);

    if (isset($_FILES['image']['name'])) {
        //Auto Renaming

        $image_name = $_FILES['image']['name'];
        $ext = end(explode('.', $image_name));

        //
        $image_name = "Medicine Category" . rand(000, 999) . '.' . $ext;
        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/category" . $image_name;
        $upload = move_uploaded_file($source_path, $destination_path);

        if ($upload == false) {
            // header('location:' . SITEURL . 'admin/add_category.php');
        }
    } else {
        $image_name = "";
    }
    $sql = "INSERT INTO tbl_medicine SET
    product_name='$product_name',
    category='$category',
    indication='$indication' ,
    packaging='$packaging',
    manufacturer='$manufacturer',
    country='$country',
    image_name='$image_name',
    price='$price',
    quantity='$quantity'
    ";


    //Execute QUery  and Sava Data in Database

    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($res == TRUE) {
        $_SESSION['add'] = "<div>Added Successfully.</div>";
        header('location:' . SITEURL . 'admin/manage_categories.php');
    }

} else {
    // echo "Error";

}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../dist/css/output.css"> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../dist/css/output.css"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/plugins.min.css" />
    <link rel="stylesheet" href="css/kaiadmin.min.css" />
    <script src="js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["css/fonts.min.css"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>
    <link rel="stylesheet" href="css/toaster.css">
    <title>Dashboard</title>
</head>



<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include "partials/sidebar1.php" ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="../index.html" class="logo">
                            <img src="../assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <?php include "partials/main_header.php" ?>
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <h3 class="fw-bold mb-3">Add Products</h3>


                    <div class="row">
                        <form class="max-w-sm mx-auto mt-8" method="POST" enctype="multipart/form-data">

                            <div class="mb-5">
                                <label for="product_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                    Name</label>
                                <input type="text" id="product_name" name="product_name"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Product Name" required />
                            </div>
                            <div class="mb-5">
                                <label for="countries"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                    an option</label>
                                <select id="countries" name="category"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Choose a Categroy</option>
                                    <option value="Analgesics And Anti-Inflammatory">Analgesics & Anti-Inflammatory
                                    </option>
                                    <option value="Anti-infective">Anti-infective</option>
                                    <option value="Cardiovascular System">Cardiovascular System</option>
                                    <option value="Nervous System">Nervous System</option>
                                    <option value="Antidiabetics">Antidiabetics</option>
                                    <option value="Gastrointestinal System">Gastrointestinal System</option>
                                    <option value="Nutraceuticals And Supplements">Nutraceuticals And Supplements
                                    </option>
                                    <option value="Cream & Lotions">Cream & Lotions</option>
                                    <option value="Other Ranges">Other Ranges</option>
                                </select>
                            </div>
                            <div class="mb-5">
                                <label for="indication"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Indication</label>
                                <textarea type="text" name="indication" id="indication"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    required></textarea>
                            </div>
                            <div class="mb-5">
                                <label for="packaging"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Packaging</label>
                                <input type="text" name="packaging" id="packaging"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    required />
                            </div>
                            <div class="mb-5">
                                <label for="manufacturer"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Manufacturer</label>
                                <input type="text" name="manufacturer" id="manufacturer"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    required />
                            </div>
                            <div class="mb-5">
                                <label for="Country"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                                <input type="text" name="country" id="country"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    required />
                            </div>
                            <div class="mb-5">
                                <label for="Price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                <input type="text" name="price" id="country"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    required />
                            </div>
                            <div class="mb-5">
                                <label for="Quantity"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                                <input type="text" name="quantity" id="country"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    required />
                            </div>
                            <div class="mb-5">
                                <label for="Image"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                <input type="file" name="image" id="image"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    required />
                            </div>



                            <input type="submit" name="submit" id="displayNoti" value="Add Product"
                                class="btn btn-success">
                            <a class="btn btn-danger" href="./manage_categories.php">Cancel</a>
                        </form>

                        <!-- <?php
                        if (isset($res)) {
                            //Data Inserted
                            //Create a Session Variable to Display Message
                            $_SESSION['add'] = "Admin Added Successfully";

                            //Redirect Page to Manage Admin
                            // header("location:" . SITEURL . 'admin/manage_admin.php');
                        

                            ?>
                            <div id="toast-success"
                                class="flex items-center float-right mt-7 w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                                role="alert">
                                <div
                                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                                <div class="ms-3 text-sm font-normal text-green-600">Admin Added successfully.</div>
                                <a href="./manage_admin.php"><i class="ri-close-line"></i></a>
                            </div>

                            <?php
                        }
                        ?> -->
                    </div>

                </div>

                <!-- Custom template | don't include it in your project! -->

                <!-- End Custom template -->
            </div>

            <!-- end: Main -->

            <script src="js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

            <!-- Chart JS -->
            <script src="js/plugin/chart.js/chart.min.js"></script>

            <!-- Chart Circle -->
            <script src="js/plugin/chart-circle/circles.min.js"></script>

            <!-- Datatables -->
            <script src="js/plugin/datatables/datatables.min.js"></script>

            <!-- Bootstrap Notify -->
            <script src="js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

            <!-- jQuery Vector Maps -->
            <script src="js/plugin/jsvectormap/jsvectormap.min.js"></script>
            <script src="js/plugin/jsvectormap/world.js"></script>

            <!-- Sweet Alert -->
            <script src="js/plugin/sweetalert/sweetalert.min.js"></script>

            <!-- Kaiadmin JS -->
            <script src="js/kaiadmin.min.js"></script>
            <script src="js/core/jquery-3.7.1.min.js"></script>
            <script src="js/core/popper.min.js"></script>
            <script src="js/core/bootstrap.min.js"></script>

            <!-- jQuery Scrollbar -->
            <script src="js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>



            <!-- Kaiadmin JS -->
            <script src="js/kaiadmin.min.js"></script>

            <!-- Kaiadmin DEMO methods, don't include it in your project! -->
            <script src="js/setting-demo2.js"></script>

            <!-- Kaiadmin DEMO methods, don't include it in your project! -->
            <script src="js/setting-demo.js"></script>
            <script src="js/demo.js"></script>
            <script>
                $("#displayNoti").on("click", function () {
                    var placementFrom = top;
                    var placementAlign = right;
                    var state = success;
                    var style = withicon;
                    var content = {};

                    content.message =
                        'Turning standard Bootstrap alerts into "notify" like notifications';
                    content.title = "Bootstrap notify";
                    if (style == "withicon") {
                        content.icon = "fa fa-bell";
                    } else {
                        content.icon = "none";
                    }
                    content.url = "manage_categories.php";
                    content.target = "_blank";

                    $.notify(content, {
                        type: state,
                        placement: {
                            from: placementFrom,
                            align: placementAlign,
                        },
                        time: 1000,
                        delay: 0,
                    });
                });
            </script>
</body>


</html>