<?php include 'components/head_start.php'?>
</head>

<body>
<?php include 'components/preloader.php' ?>

  <!-- navbar -->
  <?php include 'components/header.php'?>
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
          <?php include 'components/book.php'?>
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
          <?php include 'components/book.php'?>
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

 
    <section class="testimonials">
      <div class="container">
        <h1>Our Rooms</h1>
        <div class="row" id="room_list">
         
        </div>
      </div>
    </section>
  <!-- <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark mt-2 m-md-3">
    <div class="col-md-6 px-0">
      <h1 class="display-4">Experience an unrivaled five star fusion of elegance & style. Stay Paradise</h1>
      <p class="lead my-3">Experience the best quality of services like comfortable bedrooms , good view balcony , Great
        cuisines.</p>
      <button class="btn btn-outline-secondary"><a href="#" class="text-white">Book A Room</a></button>
    </div>
  </div> -->

  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light mine">
    <div class="col-md-5 p-lg-5 mx-auto my-5 new">
      <h1 class="display-4 fw-normal heading">Quality Stay</h1>
      <strong>
        <p class="lead fw-normal para">Experience the best quality stay with best cuisines and services like laundary.</p>
      </strong>
      <a class="btn btn-outline-secondary" href="enquiry.html">For enquiry click here</a>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>

<?php include 'components/footer.php' ?>
 <script src="assests/js/smooth-scrollbar.js"></script>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <?php include 'components/script_start.php'?>
  <script src="assests/js/rooms_list.js"></script>
</body>

</html>