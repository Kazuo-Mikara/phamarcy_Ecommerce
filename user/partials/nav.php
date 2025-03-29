<?php

$currentPage = basename($_SERVER['REQUEST_URI']);
// echo $currentPage;
// include ('login_check.php')
// $_SESSION['user'];
?>

<link href="../css/index1.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/searchbox.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Pharmacy
                Store</span>
        </a>

        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <a href="./login_page.php">Get Started</a></button>

            <button data-collapse-toggle="navbar-cta" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>

            </button>

        </div>
        <form action="./medicine_search.php" method="POST">
            <div class=" flex justify-center items-center px-2 sm:px-6 lg:px-8">
                <div class="relative">

                    <input type="search" class="h-14 w-96 pr-8 pl-5 rounded z-0 focus:shadow focus:outline-none"
                        placeholder="Search anything..." name="search">

                    <div class="absolute top-4 right-3">
                        <input type="submit" name="submit" value="search" />
                    </div>

                </div>
            </div>
        </form>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="./index1.php" class=" block py-2 px-3 md:p-0  <?php if ($currentPage == 'index1.php') {
                        echo "active";
                        // echo $currentPage;
                    } ?>  text-gray-900 hover:text-blue-800  rounded md:bg-transparent ">Home</a>
                </li>
                <li>
                    <div class="relative group ">

                        <button
                            class="text-gray-900 <?php if ($currentPage == 'products.php') {
                                echo 'active';
                            } ?> hover:text-blue-800  bg-white font-medium rounded-lg  text-center inline-flex items-center ">Products<svg
                                class=" w-2.5 h-2.5 ms-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->


                        <ul class=" bg-white dropdown-menu group-hover:block hidden absolute text-gray-700 pt-1
                                    w-fit">
                            <li>
                                <a href="./products.php"
                                    class="block text-sm px-4 py-2 hover:text-blue-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">All
                                    Products</a>
                                <a href="#"
                                    class="block text-sm px-4 py-2 hover:text-blue-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Analgesics
                                    & Anti-Inflammatory</a>
                                <a href="#"
                                    class="block text-sm px-4 py-2 hover:text-blue-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Anti-infective</a>
                                <a href="#"
                                    class="block text-sm px-4 py-2 hover:text-blue-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cardiovascular
                                    System
                                </a>
                                <a href="#"
                                    class="block text-sm px-4 py-2 hover:text-blue-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Nervous
                                    System</a>
                                <a href="#"
                                    class="block text-sm px-4 py-2 hover:text-blue-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Antidiabetics</a>
                                <a href="#"
                                    class="block text-sm px-4 py-2 hover:text-blue-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Gastrointestinal
                                    System</a>
                                <a href="#"
                                    class="block text-sm px-4 py-2 hover:text-blue-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Nutraceuticals
                                    And Supplements</a>
                                <a href="#"
                                    class="block text-sm px-4 py-2 hover:text-blue-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cream
                                    & Lotions</a>
                                <a href="#"
                                    class="block text-sm px-4 py-2 hover:text-blue-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Other
                                    Ranges</a>

                            </li>

                        </ul>

                    </div>


                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li>

            </ul>

        </div>

    </div>
</nav>