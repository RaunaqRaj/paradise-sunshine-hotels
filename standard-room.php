<?php include 'components/head_start.php'?>

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
      <h1>Room Category</h1>
      <p class="text-center">Every detail about the room is here
      </p>
      <div class="row" id="categories">
          
          </div> 
        </div>
      </div>
    </section>
  <?php include 'components/footer.php' ?>


  <script src="assests/js/smooth-scrollbar.js"></script>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
<?php include 'components/script_start.php'?>
<script src="assests/js/room_category.js"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>