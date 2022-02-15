<?php
      $server = 'localhost';
      $username = "root";
      $password = "";
      $con = mysqli_connect($server, $username, $password);

      $insert = false;
      if(isset($_POST['submit'])){

      if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
      }
      // echo"connection success";
      $name = $_POST['name'];
      $email = $_POST['email'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];
      $sql ="INSERT INTO `enquiry`.`informations` (`name`, `email`, `subject`,`message`) VALUES ('$name', '$email', '$subject','$message')";

      if($con->query($sql) == true){
        // echo "successfully inserted";
        $insert = true;
      }
      else{
        echo"error: $sql <br> $con->error";
      }

      $con->close();
    }
    
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
  <link rel="stylesheet" href="assests/css/enquiry.css">
  <script src="https://kit.fontawesome.com/76d2de9cd5.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <title>Paradise Sunshine Hotels</title>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js" integrity="sha512-8E3KZoPoZCD+1dgfqhPbejQBnQfBXe8FuwL4z/c8sTrgeDMFEnoyTlH3obB4/fV+6Sg0a0XF+L/6xS4Xx1fUEg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.min.js" integrity="sha512-5/OHwmQzDSBS0Ous4/hlYoWLHd06/d2r7LdKZQVBXOA6PvOqWVXtdboiLTU7lQTGyVoKVTNkwi0ol4gHGlw5ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
  <!-- navbar -->
  <header class="header">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container-fluid">
      <img src="assests/images/P-removebg-preview.png" alt="" class="logo">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-5">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="rooms.html" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Rooms And suites
            </a>
            <ul class="dropdown-menu fade-down dropdown-menu-right" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="standard-room.html">Room Categories</a></li>
              <li><a class="dropdown-item" href="rooms.html">Rooms</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Contact us
            </a>
            <ul class="dropdown-menu fade-down dropdown-menu-right" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="enquiry.html">Enquiry</a></li>
            </ul>
          </li>
        </ul>

   <!-- Button trigger modal -->
   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#LoginModal"><i class="fa-solid fa-right-to-bracket"></i>
    Login
  </button>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#RegisterModal"><i class="fa-solid fa-arrow-right-to-bracket"></i>
    Register
  </button>
        
      </div>
    </div>
  </nav>
</header>

      <!-- Modal -->
      <div class="modal fade" id="LoginModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title text-center w-100 font-weight-bold" style="font-family: 'Rowdies',cursive;">Login</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
              <div class="md-form mb-5">
                <i class="fas fa-user prefix grey-text"></i>
                <label data-error="wrong" data-success=""right>Username</label>
                <input type="text" class="form-control validate" style="border-top: 0; border-left: 0; border-right: 0;">
              </div>
              <div class="md-form mb-5">
                <i class="fas fa-lock prefix grey-text"></i>
                <label data-error="wrong" data-success=""right>Password</label>
                <input type="text" class="form-control validate"style="border-top: 0; border-left: 0; border-right: 0;">
                <p class="font-small blue-text d-flex justify-content-center mt-2">Forgot<a href="#" class="blue-text ml-1"> Password?</a></p>
              </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button class="btn btn-primary">Login</button>
            </div>
          </div>
        </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="RegisterModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title text-center w-100 font-weight-bold" style="font-family: 'Rowdies',cursive;">Register</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <i class="fas fa-user prefix grey-text"></i>
            <label data-error="wrong" data-success=""right>Username</label>
            <input type="text" class="form-control validate"style="border-top: 0; border-left: 0; border-right: 0;">
          </div>
          <div class="md-form mb-5">
            <i class="fas fa-lock prefix grey-text"></i>
            <label data-error="wrong" data-success=""right>Password</label>
            <input type="text" class="form-control validate"style="border-top: 0; border-left: 0; border-right: 0;">
          </div>
          <div class="md-form mb-5">
            <i class="fas fa-lock prefix grey-text"></i>
            <label data-error="wrong" data-success=""right>Confirm Password</label>
            <input type="text" class="form-control validate"style="border-top: 0; border-left: 0; border-right: 0;">
          </div>
  
          <div class="text-center mb-3">
            <button class="btn btn-primary btn-block z-depth-la">Register</button>
          </div>
          </div>
          </div>
          </div>
          </div>
        </div>
        <!-- <div class="modal-footer d-flex justify-content-center">
          <button class="btn btn-primary">Register</button>
        </div> -->
      </div>
    </div>
  </div>
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://images.indianexpress.com/2021/06/Welcomhotel-Tavleen-Chail_1200.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 data-animation="fade-In-Down" style="animation-delay: 100ms;">Welcome To Paradise Hotels</h5>
          <p>
            Lavish social and business events
          </p>
          <div class="slider-btn">
            <button class="btn btn-1 btn-clean btn-outline-secondary">Book A Room</button>
          </div>
        </div>
        
      </div>
      <div class="carousel-item">
        <img src="https://www.princehotels.com/wp-content/uploads/2019/04/aboutslider2-1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>A moment of pure prestige</h5>
          <p>
            A moment of pure prestige
          </p>
          <div class="slider-btn">
            <button class="btn btn-1">Book A Room</button>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="http://cdn.cnn.com/cnnnext/dam/assets/160726150143-us-beautiful-hotels-17-bellagio-2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>
            The privacy and individuality of a custom
        </h5>
          <p>
            The Residences have their own dedicated private entrance as well </p>
          <div class="slider-btn">
            <button class="btn btn-1">Book A Room</button>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container">
    <section class="mb-4">
      <h2 class="h1-responsive font-weight-bold text-center my-5" style="font-family: 'pacifico',cursive; color: #ff9800;">Contact Us</h2>
      <p class="text-center w-responsive mx-auto mb-5">You got something to ask? Contact us via our website to clear everything. Our team is ready to help you.</p>

      <div class="row">
        <div class="col-md-9 mb-md-0 mb-5">
          <form action="assests/js/contact.php" onsubmit="return validation()" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="md-form">
                  <label for="name">Your name</label>
                  <input name="name" id="name" type="" class="form-control" placeholder="enter your name" style="border-top: 0; border-left: 0; border-right: 0;">
                  <span id="username" class="text-danger font-weight-bold"></span>
                </div>
                <div class="col-md-6">
                  <div class="md-form">
                    <label for="email" class="mt-3">email</label>
                    <input name="email" id="email" placeholder="enter your email" type="" class="form-control" style="border-top: 0; border-left: 0; border-right: 0;">
                    <span id="useremail" class="text-danger font-weight-bold"></span>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="md-form">
                  <label for="subject" id="sub" class="mt-3">subject</label>
                  <input type="text" id="subject" placeholder="Your consideration" name="subject" class="form-control text-center" style="border-top: 0; border-left: 0; border-right: 0; align-items: center;">
                  <span id="subjects" class="text-danger font-weight-bold"></span>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="md-form">
                    <label for="message" class="mt-3">Message</label>
                    <textarea name="message" id="message" placeholder="message" rows="3" class="form-control md-textarea" style="border-top: 0; border-left: 0; border-right: 0;"></textarea>
                    <span id="usermessage" class="text-danger font-weight-bold"></span>
                  </div>
                </div>
              </div>
              <div class=" text-md-left mt-2">
              <input type="submit" name="submit" class="btn btn-primary"/>
              </div>


            </div>
          </form>
        </div>
        </div>
      </div>

    </section>
  </div>

  <footer class="bg-dark text-white pt-5 pb-4">

    <div class="container text-center text-md-left">
  
      <div class="row text-center text-md-left">
  
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <img src="assests/images/P-removebg-preview.png" alt="" style="width: 200px; height: 200px;">
          <p style="color: white;">We Provide you the most comfortable services you will ever get.</p>
        </div>
  
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Services</h5>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">Rooms category</a>
          </p>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">Rooms</a>
          </p>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">Enquiry</a>
          </p>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">Checkout</a>
          </p>
  
  
        </div>
  
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold text-warning">
            Useful Links
          </h5>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">Home</a>
          </p>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">Contact Us</a>
          </p>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">Enquiry</a>
          </p>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">Checkout</a>
          </p>
        </div>
  
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact</h5>
          <p style="color: white;">
            <i class="fas fa-home mx-3"></i>New Delhi, delhi, India.
            <p style="color: white;">
            <i class="fas fa-envelope mx-3"></i>Paradise@gmail.com
          </p>
          <p style="color: white;">
            <i class="fas fa-phone mx-3"></i>+91-7827540501
          </p>
          </p>
        </div>
      </div>
        <hr class="mb-4">
  
          <div class="row align-items-center">
            <div class="col-md-7 col-lg-8">
              <p style="color: white;">copyright © 2022 All Rights Reserved : </p>
              <a href="#">
                <strong class="text-warning">Paradise Hotels</strong>
              </a>
            </div>
  
            <div class="col-md-5 col-lg-4">
              <div class="text-center text-md-right">
                <ul class="list-unstyled list-inlined">
                  <li class="list-unstyled-item">
                    <a href="#" class="btn-floating btn-sm text-white"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li class="list-unstyled-item">
                    <a href="#" class="btn-floating btn-sm text-white"><i class="fab fa-google-plus"></i></a>
                  </li>
                  <li class="list-unstyled-item">
                    <a href="#" class="btn-floating btn-sm text-white"><i class="fab fa-twitter"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
  
    </div>
   </footer>

 <script src="assests/js/smooth-scrollbar.js"></script>
 <script src="assests/js/contact.js"></script>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>


  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>