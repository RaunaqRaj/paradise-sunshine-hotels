<?php include 'components/head_start.php'?>
<?php include 'components/head_end.php'?>


    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include 'components/header.php'?>

        <!--**********************************
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
                            <h4>Add Staff Type</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add New staff</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add New Staff</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                <form id="register_form">
                                        <div class="form-group col-md-6">
                                            <label><strong>Username</strong></label>
                                            <input type="text" id="username" class="form-control" placeholder="username" name="username">
                                            <span id="user_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><strong>Email</strong></label>
                                            <input type="email" id="email" class="form-control" placeholder="" name="email">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><strong>Password</strong></label>
                                            <input type="password" id="password" class="form-control" name="password" value="" placeholder="Enter your desired password">
                                            <span id="password_error" class="text-danger"></span>
                                        </div>
                                        <div class="text-center mt-4 col-md-4">
                                            <button type="submit" id="register_submit" name="submit" class="btn btn-primary btn-block">Add Staff Account</button>
                                        </div>
                                    </form>
                                    <!-- <div class="new-account mt-3">
                                        <p><a class="text-white btn btn-primary" href="./new_staff.php">Next</a></p>
                                    </div> -->

                                    <!-- <form class="form-valide" id="staff_type_form">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-dark" for="val-username">Name
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Add new designation">
                                                        <span class="text-danger" id="designation_error">*</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-dark" for="val-username">User_id
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="description" name="description" placeholder="Add new description">
                                                        <span class="text-danger" id="description_error">*</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="submit" class="btn btn-primary" id="add_staff" name="add_staff">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form> -->
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
    <script src="./js/add_new_staff.js"></script>
    <script src="./js/common.js"></script>
    <script src="./js/toastr.js"></script>
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    



    <!-- Jquery Validation -->
    <script src="./vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Form validate init -->
    <script src="./js/plugins-init/jquery.validate-init.js"></script>
    <?php include 'components/script_end.php'?>
</body>

</html>