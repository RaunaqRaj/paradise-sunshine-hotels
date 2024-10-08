<?php

include 'php/function.php';

if (!user_check($conn)) {
    header('location : index.php');
}

if (!isset($_GET['reservation'])) {
    header('location : reservation.php');
} else {
    $id = $_GET['reservation'];
    $check_id = "select id from reservation where id = $id";
    $query = mysqli_query($conn, $check_id);
    $result = mysqli_num_rows($query);

    if ($result > 0) {
        $sql = "select * from reservation where id = $id";
        $result = mysqli_query($conn, $sql);
        $message = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $message = $row;
        }

    } else {
        header('location : reservation.php');
    }
}
?>
<?php ?>


<?php include 'components/head_start.php'?>
<?php include 'components/head_end.php'?>

    <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> -->
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
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
                            <li class="nav-label first">Staff</li>
                    <!-- <li><a class="has-arrow" href="javascript:void()" href="./index.html" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a> -->
                            <li><a href="./staff_list.php" href="javascript:void()" aria-expanded="false"><i class="fa-solid fa-users"></i>Staff</a></li>
                            </li>
                            <li class="nav-label first">Customers</li>
                    <!-- <li><a class="has-arrow" href="javascript:void()" href="./index.html" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a> -->
                            <li><a href="./customer_list.php" href="javascript:void()" aria-expanded="false"><i class="fa-solid fa-users"></i>Customers</a></li>
                            </li>

                            <li class="nav-label first">Rooms-List</li>
                    <!-- <li><a class="has-arrow" href="javascript:void()" href="./index.html" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a> -->
                            <li><a href="./room_list.php" href="javascript:void()" aria-expanded="false"><i class="fa-solid fa-couch"></i>Room List</a></li>
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


        </div>        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->

        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Reservations Details</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile">
                            <div class="profile-head">
                                <div class="photo-content">
                                  <div class="background" style="background : #fff;">
                                    <div class="profile-photo">

                                    </div>
                                </div>
                                <div class="profile-info">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-8">
                                            <div class="row">
                                                <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                    <div class="profile-name">
                                                        <h4 class="text-primary"><i class="fa fa-user mx-2"></i><?php echo $message['name'] ?></h4>

                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                    <div class="profile-email">
                                                        <h4 class="text-muted"><a style="text-decoration: none; color: #000;" href="mailto:someone@example.com"><?php echo $message['email'] ?></a></h4>
                                                        <p>Email</p>
                                                    </div>
                                                </div>
                                                </div>
                                                    <div class="profile-call" style="margin-left : 275px">
                                                        <h4 class="text-muted"><?php echo $message['created_at'] ?></h4>
                                                        <p>Date and Time</p>
                                                </div>
                                             </div>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="ReplyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ReplyModalLabel">Update Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
              <input type="hidden" id="status_update">
            <label for="recipient-name" class="col-form-label text-dark">Status</label>
            <input type="text" class="form-control" name="status" id="status" id="recipient-name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" id="update" class="btn btn-outline-success">save</button>
      </div>
    </div>
  </div>
</div>

                    <div class="col-lg-12">
                        <div class="card" style="height: 900px">
                            <div class="card-body" id="nodata">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link active show">Details</a>
                                            </li>
                                            <li class="nav-item" id="previous-reservations"><a href="#about-me" data-toggle="tab" class="nav-link">Previous Reservations</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" style="height: 600px;" >
                                            <div id="my-posts" style="height: 600px;" class="tab-pane fade active show">
                                                <div class="my-post-content pt-1" style="height: 600px">
                                                    <div class="post-input" style="height: 600px">
                                                    <p class="mt-4 text-dark">
                                                    <h4>Room Type :   <p> <?php echo $message['room'];?></p></h4>
                                                    <h4>Status:  <p> <?php echo $message['status'] ;?></p></h4>
                                                    <h4>Check-in:  <p> <?php  echo $message['checkin'];?></p></h4>
                                                    <h4>Check-out:  <p> <?php echo $message['checkout'];?></p></h4>
                                                    <h4>Created_at:  <p> <?php echo $message['created_at'];?></p></h4>
                                                </div>
                                                </div>
                                                </div>

                                            <div id="about-me" class="tab-pane fade">
                                            <div class="spinner-grow" style="align-items: center; justify-content: center;margin-left: 500px;" id="previous_loader" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                            </div>
                                                <div class="profile-about-me">
                                                    <div class="pt-4 border-bottom-1 pb-4">
                                                        <h4 class="text-primary">All previous Registrations</h4>
                                                        <div class="table-responsive">
                                    <table id="previous_reservations" class="display" style="min-width: 845px; color:black;">
                                        <thead>
                                             <tr>
                                             <th>S no</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Room</th>
                                                <th>check-in</th>
                                                <th>check-out</th>
                                                <th>Status</th>
                                                <th>created_at</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="previous_data">

                                    </table>
                                </div>
                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <?php include 'components/footer.php'?>

        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <?php include 'components/script_start.php'?>
    <script src="./js/reservation.js"></script>
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>
    <script>
        var reservation_email = "<?php echo $message['email'] ?>";
    </script>

    <?php include 'components/script_end.php'?>


