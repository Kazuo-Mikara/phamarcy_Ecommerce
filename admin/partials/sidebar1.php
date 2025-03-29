<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.php" class="logo">
                <img src="img/Layer3.svg" alt="navbar brand" class="navbar-brand" height="20" />
                <!-- <h1 class="text-white">Admin</h1> -->
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
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item ">
                    <a href="./index.php">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>

                    </a>

                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Manage</h4>
                </li>
                <li class="nav-item">
                    <a href="./manage_categories.php">
                        <i class="fas fa-layer-group"></i>
                        <p>Products</p>

                    </a>

                </li>
                <li class="nav-item">
                    <a href="./manage_prices.php">
                        <i class="fas fa-layer-group"></i>
                        <p>Price Lists</p>

                    </a>

                </li>

                <li class="nav-item">
                    <a href="./manage_admin.php">
                        <span class="sub-item">

                            <i class="fas fa-user-tie"></i>
                            <p>Admins</p>
                        </span>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="./manage_users.php">
                        <i class="fas fa-user-alt"></i>
                        <p>Users</p>

                    </a>

                </li>
                <li class="nav-item">
                    <a href="./manage_orders.php">
                        <i class="fas fa-box"></i>
                        <p>Orders</p>

                    </a>

                </li>

                <li class="nav-item">
                    <a href="./manage_discounts.php">
                        <i class="fas fa-percent"></i>
                        <p>Discounts</p>

                    </a>

                </li>


                <li class="nav-item ">
                    <a data-bs-toggle="collapse" href="#setting" class="collapsed" aria-expanded="false">
                        <i class="fas fa-sliders-h"></i>
                        <p>Settings</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="setting">
                        <ul class="nav nav-collapse">
                            <li>

                                <a href="./logout.php">
                                    <span class="sub-item">

                                        <i class="fas fa-key"></i>
                                        <p>Logout</p>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>