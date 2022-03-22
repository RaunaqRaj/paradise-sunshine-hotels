<?php

include 'php/function.php';
if (!user_check($conn)) {
    header('location : index.php');
}
?>
<?php include 'head_start.php'?>
<div class="nav-header">
            <a href="home.php" class="brand-logo">
                <img class="logo-abbr" src="./images/P-removebg-preview.png" style="width: 300px; height : 100px;" alt="">
                <img class="logo-compact" src="./images/logo-text2.png" style="width:300px;" alt="">
                <img class="brand-title" src="./images/logo-text2.png" style="width:300px; margin-right:40px" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right" style="color : black;">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" id="user" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>

                                <?php
echo $_SESSION['user']['user_name'];
?>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="php/logout.php" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <!-- <li><a class="has-arrow" href="javascript:void()" href="./index.html" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a> -->
                            <li><a href="./home.php" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i>Dashboard</a></li>
                            </li>

                            <li class="nav-label first">Payment Card</li>
                    <!-- <li><a class="has-arrow" href="javascript:void()" href="./index.html" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a> -->
                            <li><a href="./payment_card.php" href="javascript:void()" aria-expanded="false"><i class="fa-brands fa-cc-visa"></i>Payment Card List</a></li>
                            </li>


                    <!-- <li><a class="has-arrow" href="javascript:void()" href="./index.html" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a> -->
                                <li class="nav-label first">Staffs</li>
                    <!-- <li><a class="has-arrow" href="javascript:void()" href="./index.html" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a> -->
                                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text"></span>Staffs</a>
                        <ul aria-expanded="false">
                        <li><a href="add_staff_type.php"><i class="fa-solid fa-user-plus"></i>Add staff type</a></li>
                            <li><a href="staff_type.php"><i class="fa-solid fa-users"></i>All staff type</a></li>
                            <li><a href="add_staff.php"><i class="fa-solid fa-user-plus"></i>Add staff</a></li>
                            <li><a href="staff.php"><i class="fa-solid fa-users"></i>All staff</a></li>

                        </ul>
                    </li>
                            <li class="nav-label first">Customers</li>
                    <!-- <li><a class="has-arrow" href="javascript:void()" href="./index.html" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a> -->
                                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">Customers</span></a>
                        <ul aria-expanded="false">
                            <li><a href="add_customer.php"><i class="fa-solid fa-user-plus"></i>Add_customer</a></li>
                            <li><a href="customer_list.php"><i class="fa-solid fa-users"></i>All customers</a></li>
                        </ul>
                    </li>
                    <li class="nav-label first">Rooms</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa-solid fa-person-booth"></i><span class="nav-text"></span>Rooms</a>
                        <ul aria-expanded="false">
                            <li><a href="all_room.php"><i class="fa-solid fa-person-booth"></i>All Room Category</a></li>
                            <li><a href="room_facility_list.php"><i class="fa-solid fa-person-booth"></i>All Room facilities</a></li>
                            <li><a href="add_room.php"><i class="fa-solid fa-person-booth"></i>Add Rooms</a></li>
                            <li><a href="add_room_image.php"><i class="fa-solid fa-person-booth"></i>Add Rooms Image</a></li>
                            <li><a href="room_list.php"><i class="fa-solid fa-person-booth"></i>All Rooms</a></li>
                        </ul>
                    </li>

                            <li class="nav-label first">User Reservations</li>
                    <!-- <li><a class="has-arrow" href="javascript:void()" href="./index.html" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a> -->
                            <li><a href="./reservation.php" href="javascript:void()" aria-expanded="false"><i class="fa-solid fa-bookmark"></i>Reservations</a></li>
                            </li>
                   
                     <li class="nav-label">User contact</li>
                    <!-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">Table</span></a>
                        <ul aria-expanded="false"> -->
                            <li><a href="contact-table.php"><i class="fa-solid fa-address-card"></i>Contact Us </a></li>
                        </ul>
                    </li>


                        </ul>
                    </li>
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->