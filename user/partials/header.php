<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.html"> <img src="assets/pharmacy_logo.jpg" alt="logo"
                            width="50px"> YZL Co,ltd</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link " href="./product_list.php">
                                    product
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">about</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link " href="./contact.php">
                                    Contact Us
                                </a>

                            </li>
                            <?php if (isset($_SESSION['user'])) { ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link " href="./orders.php">
                                        Orders
                                    </a>

                                </li>

                            <?php } ?>
                            <!-- <li class=" nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    pages
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="login.php">
                                        login

                                    </a>
                                    <a class="dropdown-item" href="checkout.php">product checkout</a>
                                    <a class="dropdown-item" href="cart.php">shopping cart</a>
                                    <a class="dropdown-item" href="confirmation.php">confirmation</a>

                                </div>
                            </li> -->


                            <?php if (empty($_SESSION['user'])) {
                                // Additional checks can be added here, such as validating user role or expiration time ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link " href="login.php">
                                        Get Started
                                    </a>

                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex align-items-center">
                        <!-- <a href="#" class="genric-btn default radius">Get Started</a> -->
                        <a href="search_products.php"><i class="ti-search"></i></a>
                        <a href="cart.php">
                            <i class="flaticon-shopping-cart-black-shape"></i>

                            <?php
                            // $check_cart_numbers = mysqli_query($conn, "SELECT COUNT(*) FROM cart WHERE username = '$username'") or die('query failed');
                            
                            if (isset($_SESSION['user'])) {
                                $username = $_SESSION['user'];
                                $sql_cart = "SELECT count(*) AS total_carts FROM cart where username='$username'";
                                $result_cart = mysqli_query($conn, $sql_cart);
                                $row_cart = mysqli_fetch_assoc($result_cart);
                                $total_cart = $row_cart['total_carts'];
                                $cartItemCount = 4;
                                if ($total_cart > 0) { ?>

                                    <span class="cart-notification"><?php echo $total_cart;

                                    ?></span>
                                <?php }
                            } ?>
                        </a>


                        <?php if (isset($_SESSION['user'])) { ?>
                            <div class="nav-item dropdown">
                                <a href="cart.php" class="nav-link dropdown-toggle" id="navbarDropdown_3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-user"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item"><?php echo $_SESSION['user'] ?></a>
                                    <!-- <a class="dropdown-item" href="checkout.php">product checkout</a>
                                <a class="dropdown-item" href="cart.php">shopping cart</a>
                                <a class="dropdown-item" href="confirmation.php">confirmation</a> -->
                                    <a class="dropdown-item" href="./logout.php"><strong>Logout</strong></a>


                                </div>
                            </div>
                        <?php } ?>

                    </div>

                </nav>
            </div>



        </div>
    </div>

</header>