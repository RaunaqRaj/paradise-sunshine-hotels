<?php include 'components/head_start.php'?>
 <link rel="stylesheet" href="assests/css/snackbar.min.css">
</head>

<body>
<?php include 'components/preloader.php' ?>

  <!-- navbar -->
<?php include 'components/header.php'?>
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://images.indianexpress.com/2021/06/Welcomhotel-Tavleen-Chail_1200.jpg" class="d-block w-100"
          alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 data-animation="fade-In-Down" style="animation-delay: 100ms;">Welcome To Paradise Hotels</h5>
          <p>
            Lavish social and business events
          </p>
          <div class="slider-btn">
          <?php include 'components/book.php'?>
          </div>
        </div>

      </div>
      <div class="carousel-item">
        <img src="https://www.princehotels.com/wp-content/uploads/2019/04/aboutslider2-1.jpg" class="d-block w-100"
          alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>A moment of pure prestige</h5>
          <p>
            A moment of pure prestige
          </p>
          <div class="slider-btn">
          <?php include 'components/book.php'?>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="http://cdn.cnn.com/cnnnext/dam/assets/160726150143-us-beautiful-hotels-17-bellagio-2.jpg"
          class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>
            The privacy and individuality of a custom
          </h5>
          <p>
            The Residences have their own dedicated private entrance as well </p>
          <div class="slider-btn">
          <?php include 'components/book.php'?>
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
      <h2 class="h1-responsive font-weight-bold text-center my-5"
        style="font-family: 'pacifico',cursive; color: #ff9800;">Contact Us</h2>
      <p class="text-center w-responsive mx-auto mb-5">You got something to ask? Contact us via our website to clear
        everything. Our team is ready to help you.</p>

      <div class="row" style="background: url(assests/images/3956344.jpg); padding: 50px; border-radius: 20px;">
        <div class="col-md-9 mb-md-0 mb-5"style="background-color: #fff; border-radius: 60px; padding: 40px; ">
          <form id="myform">
            <p id="msg"></p>
            <div class="row">
              <div class="col-md-10">
                <div class="md-form">
                  <label for="name" style="color:#ff9800; font-size: 23px; font-weight: 700;">Your name</label>
                  <input name="name" id="name" type="" class="form-control" autocomplete="off"
                    placeholder="enter your name" style="border-top: 0; border-left: 0; border-right: 0;">
                  <span id="name_error" class="text-danger font-weight-bold"></span>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <div class="md-form">
                      <label for="email" style="color:#ff9800; font-size: 23px; font-weight: 700;"
                        class="mt-3">email</label>
                      <input name="email" id="email" placeholder="enter your email" type="" class="form-control"
                        autocomplete="off" style="border-top: 0; border-left: 0; border-right: 0; outline-style: none;">
                      <span id="email_error" class="text-danger font-weight-bold">
                        <p id="msg" style="color: red; font-weight: bold;"></p>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-10">
                  <div class="md-form">
                    <label for="subject" style="color:#ff9800; font-size: 23px; font-weight: 700;" id="sub"
                      class="mt-3">subject</label>
                    <input type="text" id="subject" placeholder="Your consideration" name="subject" class="form-control"
                      autocomplete="off" style="border-top: 0; border-left: 0; border-right: 0; align-items: center;">
                    <span id="subject_error" class="text-danger font-weight-bold">
                      <p id="msg" style="color: red; font-weight: bold;"></p>
                    </span>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-10">
                    <div class="md-form">
                      <label for="message" style="color:#ff9800; font-size: 23px; font-weight: 700;"
                        class="mt-3">Message</label>
                      <textarea name="message" id="message" placeholder="message" rows="3"
                        class="form-control md-textarea" autocomplete="off"
                        style="border-top: 0; border-left: 0; border-right: 0;"></textarea>
                      <span id="message_error" class="text-danger font-weight-bold">
                        <p id="msg" style="color: red; font-weight: bold;"></p>
                      </span>
                    </div>
                  </div>
                </div>
                <div class=" text-md-left mt-2">
                  <div class="spinner-grow" id="contact_submit_loader" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <input type="submit" name="contact_submit" class="btn btn-primary" style="background-color:#ff9800;"
                    id="btn" />
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
  </div>

  </section>
  </div>
  <?php include 'components/footer.php' ?>
  <?php include 'components/script_start.php'?>
  <script src="assests/js/snackbar.min.js"></script>
  </body>

</html>