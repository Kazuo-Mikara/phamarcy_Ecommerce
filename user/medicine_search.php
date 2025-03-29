<?php
include "config.php";
include "partials/nav.php";
?>

<?php
//Get the Search
$search = $_POST['search'];


//SQL Query to Get Medicine on search Keyword
$sql = "SELECT * FROM tbl_medicine WHERE product_name LIKE '%$search%' OR category LIKE '%$search%' OR manufacturer LIKE '%$search%'";

//Execute the query
$res = mysqli_query($conn, $sql);

//Count Rows
$count = mysqli_num_rows($res);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section class="bg-white dark:bg-gray-900 px-40 py-10 justify-center justify-items-center gap-y-20 gap-x-14">
        <p class="text-gray-900 text-4xl font-normal text-center mb-20">Your Search Products for
            <span class="text-blue-600"><?php echo $search ?> </span>
        </p>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 py-2">
            <?php
            //Check whether medicine is available or not
            if ($count > 0) {
                //Available
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $product_name = $row['product_name'];
                    $category = $row['category'];
                    $indication = $row['indication'];
                    $packaging = $row['packaging'];
                    $manufacturer = $row['manufacturer'];
                    $country = $row['country'];
                    $price = $row['price'];
                    $image_name = $row['image_name']; ?>

                    <div
                        class="w-72 mb-10 bg-white border-b-black border shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                        <a href="#">
                            <img class=" mx-auto bg-cover w-48" src="../images/category<?php echo $image_name ?>" alt="Product"
                                class="h-80 w-72 object-cover rounded-t-xl" />
                            <div class="px-4 py-3 w-72">
                                <span class="text-gray-400 mr-3 uppercase text-xs"><?php echo $category ?></span>
                                <p class="text-lg font-bold text-black truncate block capitalize"><?php echo $product_name ?>
                                </p>
                                <div class="flex items-center">
                                    <p class="text-lg font-semibold text-cyan-500 cursor-auto my-3"><?php echo $price ?> mmk</p>

                                    <div class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                            <path
                                                d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                        </svg></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                }
                ?>
            </div>
            <?php
            } else {
                //
                echo "<div class='text-gray-500'>Food not Found</div>";
            }

            ?>

    </section>
</body>

<footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a
                href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.</span>
    </div>
</footer>

</html>



<script src=" https://cdn.tailwindcss.com">
</script>