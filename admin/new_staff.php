<?php include 'components/head_start.php'?>
<link rel="stylesheet" href="./css/select2.css">
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
                            <h4>Add Staff</h4>
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
                                    <form class="form-valide" id="staff_form">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-dark" for="val-username">User id <span class="text-danger" id="user_error">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                   <select name="user" id="select" class="form-control text-dark">
                                                       <optgroup label="select user" class="text-dark">
                                                        <?php
                                                        include 'php/connection.php'; 
                                                        $query = "select * from users";
                                                        $query_execute = mysqli_query($conn,$query);

                                                        if(mysqli_num_rows($query_execute)>0){
                                                            while($result = mysqli_fetch_assoc($query_execute))
                                                            {

                                                    
                                                        ?>
                                                       <option value="" selected class="text-dark"></option>
                                                       <option value="<?php echo $result['id']?>"> <?php echo $result['id']?> - <?php  echo $result['username']?></option>
                                                   <?php
                                                            }
                                                        }
                                                   ?>
                                                   </optgroup>
                                                   </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-dark" for="val-username">Name                                                        <span class="text-danger" id="name_error">*</span>

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-dark" for="val-username">Email                                                        <span class="text-danger" id="email_error">*</span>

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your E-mail">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label text-dark" for="val-username">Phone Number                                                        <span class="text-danger" id="phone_error">*</span>

                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="phno" name="phno" placeholder="(+91)-1234567890">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="submit" class="btn btn-primary" id="add_staff" name="add_staff">Submit</button>
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
    <script src="./js/jquery.js"></script>
    <script src="./js/select2.js"></script>
    <script>
    $('#select').select2({
        placeholder : "select a userid and username",
        selectOnClose: true,
    });
    </script>
    <script src="./js/add_staffs.js"></script>
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