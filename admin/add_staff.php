<?php include 'components/head_start.php'?>
<link rel="stylesheet" href="./css/form.css">
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
                                <section class="wizard-section">
		
			<div class="col-lg-12 col-md-12">
				<div class="form-wizard">
					<form action="" method="post" role="form" id="staff_form">
						<div class="form-wizard-header">
							<ul class="list-unstyled form-wizard-steps clearfix">
								<li class="active"><span>1</span></li>
								<li><span>2</span></li>
							</ul>
						</div>
						<fieldset class="wizard-fieldset show">
							<h5>Account Information</h5>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" name = "username" id="username">
								<label for="fname" class="wizard-form-text-label">user Name*</label>
								<div class="wizard-form-error" id="user_error"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" name="email" id="email">
								<label for="lname" class="wizard-form-text-label">Email*</label>
								<div class="wizard-form-error" id="email_error"></div>
							</div>
							<div class="form-group">
								<input type="password" class="form-control wizard-required" name="password" id="password">
								<label for="zcode" class="wizard-form-text-label">Password*</label>
								<div class="wizard-form-error" id="password_error"></div>
							</div>
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
							</div>
						</fieldset>	
						<fieldset class="wizard-fieldset">
							<h5>Staff Information</h5>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" name="name" id="name">
								<label for="email" class="wizard-form-text-label">Name</label>
								<div class="wizard-form-error" id="name_error"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" name="e-mail" id="e-mail">
								<label for="username" class="wizard-form-text-label">Email</label>
								<div class="wizard-form-error" id="address_error"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" name="phone" id="phone">
								<label for="pwd" class="wizard-form-text-label">Phone Number</label>
								<div class="wizard-form-error" id="phone_error"></div>
							</div>
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<button type="submit" style="margin-left: 420px; border: none; background: #fc1c03;" name="save"><a class="form-wizard-submit float-right">Submit</a></button>
							</div>
						</fieldset>	
					</form>
				</div>
			</div>
		</div>
	</section>
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
    <script src="./js/form.js"></script>
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