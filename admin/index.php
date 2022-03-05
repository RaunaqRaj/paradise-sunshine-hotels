<?php
session_start();
if(isset($_SESSION['username'])){
    header('location:home.php');
}
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Paradise Hotels </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/P-removebg-preview.png">
    <link href="./css/style.css" rel="stylesheet">

</head>

<body class="h-100">
<img src="./images/P-removebg-preview.png" style=" margin-right: 150px; margin-top: 80px; float: right; justify-content: center; align-items: center;" width="300px" height="300px" alt="">

    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form id="login_form">
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" id="email" name="email" class="form-control">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" id="password" name="password" class="form-control">
                                            <span id="password_error" class="text-danger"></span>
                                        </div>
                                       
                                        <div class="text-center">
                                            <button type="submit" id="login" name="submit" class="btn btn-primary btn-block">Sign me in</button>
                                            <span id="msg" class="text-success"></span>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="./page-register.php">Sign up</a></p>
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
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./js/jquery.js"></script>
    <script src="./js/login.js"></script>
    <script src="./js/common.js"></script>
    <script src="./js/sweetalert.min.js"></script>
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

</body>

</html>
