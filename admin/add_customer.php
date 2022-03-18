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
                            <h4>Add Customer</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Customer</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Customers</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" id="add_customers">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-dark" for="val-username">First Name
                                                        
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter Your First Name">
                                                        <span class="text-danger" id="first_name_error">*</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-dark" for="val-email">Last Name 
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Your Last Name">
                                                        <span
                                                            class="text-danger" id="last_name_error">*</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-dark" for="val-email">E-Mail Address 
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email">
                                                        <span
                                                            class="text-danger" id="email_error">*</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-dark" for="val-password">Primary Phone Number
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="primary_phone" name="primary_phone" placeholder="+91">
                                                        <span class="text-danger" id="primary_phone_error">*</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-dark" for="val-confirm-password">Secondary Phone Number
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="Secondary_phone" name="secondary_phone" placeholder="+91">
                                                        <span
                                                            class="text-danger" id="secondary_phone_error">*</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-dark" for="val-confirm-password">Payment Card Number
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="pay_card" name="pay_card" placeholder="">
                                                        <span
                                                            class="text-danger" id="pay_card_error">*</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-dark" for="val-confirm-password">Payment Authority
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="pay_auth" name="pay_auth" placeholder="">
                                                        <span
                                                            class="text-danger" id="pay_auth_error">*</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-dark" for="val-confirm-password">Expiry Date
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="date" class="form-control" id="date" name="date" placeholder="">
                                                        <span
                                                            class="text-danger" id="date_error">*</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-dark" for="val-confirm-password">Card CVV
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="cvv" name="cvv" placeholder="">
                                                        <span
                                                            class="text-danger" id="cvv_error">*</span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                                <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="submit" class="btn btn-primary" id="add_customer" name="add_customer">Submit</button>
                                                    </div>
                                                    <div class="spinner-border" id="loader" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
    <script src="./js/add_customer.js"></script>
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