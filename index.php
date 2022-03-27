<?php include 'components/head_start.php' ?>
</head>

  <body>
 
  <?php include 'components/preloader.php' ?>

  <!-- navbar -->
  <div class="col-lg-12 col-md-12">
  <?php include 'components/header.php'?>
 
  <div id="carouselExampleCaptions" class="carousel slide" style="margin-left: 0; margin-right: 0;" data-bs-ride="carousel">
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
        <img src="assests/images/4420.jpg" class="d-block w-100"
          alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5  class="heading1" data-animation="fade-In-Down" style="animation-delay: 100ms;">Welcome To Paradise Hotels</h5>
          <p>
            Lavish social and business events
          </p>
          <div class="slider-btn">
          <?php include 'components/book.php'?>
          </div>
        </div>

      </div>
      <div class="carousel-item">
        <img src="assests/images/10811.jpg" class="d-block w-100"
          alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="heading1">A moment of pure prestige</h5>
          <p>
            A moment of pure prestige
          </p>
          <div class="slider-btn">
          <?php include 'components/book.php'?>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assests/images/3956344.jpg"
          class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="heading1">
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

  <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5 mx-2 hi">

    <div class="col">
      <div class="card card-cover fine hello h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
        style="background-image: url('https://media.istockphoto.com/photos/3d-rendering-beautiful-luxury-bedroom-suite-in-hotel-with-tv-picture-id1066999762?k=20&m=1066999762&s=612x612&w=0&h=BitPXyhBFZQHMfpC9ikX_DReVK6Rd28hH9pRoZW8YAs='); background-size: 500px;">
        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
          <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold all text-center">Classic Room</h2>
          <ul class="d-flex list-unstyled mt-auto">
            <li class="me-auto">
            </li>
            <li class="d-flex align-items-center me-3">

            </li>
            <li class="d-flex align-items-center">

            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card card-cover fine2 hello h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
        style="background-image: url('https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWwlMjByb29tfGVufDB8fDB8fA%3D%3D&w=1000&q=80'); background-size: 490px;">
        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
          <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold all text-center">Presidential Suite</h2>
          <ul class="d-flex list-unstyled mt-auto">
            <li class="me-auto">
            </li>
            <li class="d-flex align-items-center me-3">

            </li>
            <li class="d-flex align-items-center">

            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card card-cover fine3 hello h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg mx-2"
        style="background-image: url('https://images.indianexpress.com/2021/06/Welcomhotel-Tavleen-Chail_1200.jpg'); background-size: 500px;">
        <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
          <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold all text-center" style="font-size: 35px;top:180px;">Luxury
            appartment</h2>
          <ul class="d-flex list-unstyled mt-auto">
            <li class="me-auto">
            </li>
            <li class="d-flex align-items-center me-3">

            </li>
            <li class="d-flex align-items-center">

            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="container px-4 py-5" id="featured-3">
    <h1 class="pb-2 border-bottom">Rooms and suites</h1>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="feature col free">
        <h3>Standard Room</h3>
        <img src="https://www.princehotels.com/wp-content/uploads/2019/04/aboutslider3-1.jpg" alt="" class="h">
        <hr>
        <h5>Features</h5>
        <ul>
          <li>comfortable Bedroom</li>
          <li>Kitchen With accessories</li>
          <li>Great View Balcony</li>
          <li>Attached Washroom</li>
        </ul>
        <a href="rooms.html" class="icon-link">
          More Details
          <svg class="bi" width="1em" height="1em">
            <use xlink:href="#chevron-right"></use>
          </svg>
        </a>
      </div>
      <div class="feature col free">
        <h3>Deluxe Room</h3>
        <img
          src="https://images.pexels.com/photos/164595/pexels-photo-164595.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
          alt="" class="h">
        <hr>
        <h5>Features</h5>
        <ul>
          <li>comfortable Bedroom</li>
          <li>Kitchen With accessories</li>
          <li>Great View Balcony</li>
          <li>Attached Washroom</li>
          <li>Deluxe cuisines</li>
        </ul>
        <a href="rooms.html" class="icon-link">
          More Details
          <svg class="bi" width="1em" height="1em">
            <use xlink:href="#chevron-right"></use>
          </svg>
        </a>
      </div>
      <div class="feature col free">
        <h3>Luxury Room</h3>
        <img
          src="https://www.itchotels.com/content/dam/itchotels/in/umbrella/miscellaneous-pages/itc-hotels-boutique/images/home-page/desktop/itchotels-boutique.jpg"
          alt="" class="h">
        <hr>
        <h5>Features</h5>
        <ul>
          <li>comfortable Bedroom</li>
          <li>Kitchen With accessories</li>
          <li>Great View Balcony</li>
          <li>Attached Washroom</li>
          <li>Luxury Cuisines</li>
          <li>More space in the room</li>
        </ul>
        <a href="rooms.html" class="icon-link">
          More Details
          <svg class="bi" width="1em" height="1em">
            <use xlink:href="#chevron-right"></use>
          </svg>
        </a>
      </div>
    </div>
  </div> -->

  <section class="testimonials">
    <div class="container">
      <h1 class="heading-new">Our Services</h1>

      <div class="row">
        <div class="col-md-4 text-center">
          <div class="profile">
            <img src="assests/images/3.jpg" alt="" class="user">
            <h5>SPA<br><span>The SPA's in the paradise Hotels Provides a better enviornment to relax your body and mind
                freely with the expert massagers.</span></h5>

          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="profile">
            <img src="assests/images/4.jpg" alt="" class="user">
            <h5>Restaurant<br><span>The Resturant is the paradise Resort's iconic dining venue, serving breakfast,
                afternoon tea and an evening service complimented by the recent addition of a bar and craft cocktail
                program.</span></h5>

          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="profile">
            <img src="assests/images/1.jpg" alt="" class="user">
            <h5>GYM<br><span> A gym - physical exercises and activities performed inside, often using equipment,
                especially when done as a subject at school. Gymnasium is a large room with equipment for exercising the
                body.</span></h5>
          </div>
        </div>
      </div>
    </div>
    </section>
    </div>
  </section>
  <div class="text-center bg-light mine">
    <div class="col-md-5 p-lg-5 mx-auto my-5 new">
      <h1 class="display-4 fw-normal heading">Quality Stay</h1>
      <strong>
        <p class="lead fw-normal para">Experience the best quality stay with best cuisines and services like laundary.
        </p>
      </strong>
      <a class="btn btn-outline-secondary" href="enquiry.html">For enquiry click here</a>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>
  <?php include 'components/footer.php' ?>

</div>
<?php include 'components/script_start.php'?>

</body>

</html>