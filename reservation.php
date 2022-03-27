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

  <div class="card-body">
    <div class="form-validation">
    <div class="col-lg-6 col-md-6 m-auto">
<div class="form-wizard">
<form action="" method="post" role="form" id="reservation_form">
<div class="form-wizard-header">
<ul class="list-unstyled form-wizard-steps clearfix">
<li class="active"><span>1</span></li>
<li><span>2</span></li>
<li><span>3</span></li>
</ul>
</div>
<fieldset class="wizard-fieldset show">
<h5>Customer Information</h5>
<div class="form-group">
<input type="text" class="form-control wizard-required" name = "first_name" id="first_name">
<label for="fname" class="wizard-form-text-label">First Name</label>
<span class="wizard-form-error text-danger" id="first_error"></span>
</div>
<div class="form-group">
<input type="text" class="form-control wizard-required" name="last_name" id="last_name">
<label for="lname" class="wizard-form-text-label">Last Name</label>
<div class="wizard-form-error" id="last_error"></div>
</div>
<div class="form-group">
<input type="text" class="form-control wizard-required" name="email" id="email">
<label for="lname" class="wizard-form-text-label">Email</label>
<span class="wizard-form-error text-danger" id="email_error"></span>
</div>
<div class="form-group">
<input type="text" class="form-control wizard-required" name="primary_phone" id="primary_phone">
<label for="zcode" class="wizard-form-text-label">primary phone number</label>
<span class="wizard-form-error text-danger" id="primary_error"></span>
</div>
<div class="form-group">
<input type="text" class="form-control wizard-required" name="secondary_phone" id="secondary_phone">
<label for="zcode" class="wizard-form-text-label">Secondary phone number</label>
<div class="wizard-form-error" id="secondary_error"></div>
</div>
<div class="form-group clearfix">
<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
</div>
</fieldset>	

<fieldset class="wizard-fieldset">
<h5>Payment Information</h5>
<div class="form-group">
<input type="text" class="form-control wizard-required" name = "transaction_id" id="first_name">
<label for="fname" class="wizard-form-text-label">Transaction ID</label>
<span class="wizard-form-error text-danger" id="first_error"></span>
</div>
<div class="form-group">
<input type="text" class="form-control wizard-required" name="payment_mode" id="last_name">
<label for="lname" class="wizard-form-text-label">Payment Mode</label>
<div class="wizard-form-error" id="last_error"></div>
</div>
<div class="form-group">
<input type="text" class="form-control wizard-required" name="bank" id="email">
<label for="lname" class="wizard-form-text-label">Bank</label>
<span class="wizard-form-error text-danger" id="email_error"></span>
</div>
<div class="form-group clearfix">
<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
</div>
</fieldset>
	
<fieldset class="wizard-fieldset">
<h5>Reservation Information</h5>
<div class="form-group">
<select name="room" id="category" class="form-control">
<option value="">select a room</option>
                                                    <?php 
                                                    include 'php/connection.php';
                                                    $sql = "select * from rooms";
                                                    $res = mysqli_query($conn,$sql);
                                                         while($row = mysqli_fetch_assoc($res)){?>
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['heading'] ?></option>
                                                        <?php } ?>
                                                    </select>
</div>
<div class="form-group">
<input type="number" class="form-control wizard-required" name="quantity" id="payment_auth">
<label for="username" class="wizard-form-text-label">Quantity</label>
<span class="wizard-form-error text-danger" id="payauth_error"></span>
</div>
<div class="form-group">
<label for="pwd" class="">checkin</label>
<input type="date" class="form-control wizard-required" name="checkin" id="cvv">
<span class="wizard-form-error text-danger" id="cvv_error"></span>
</div>
<div class="form-group">
<label for="pwd" class="">checkout</label>
<input type="date" class="form-control wizard-required" name="checkout" id="phone">
<label for="" class="wizard-form-text-label"></label>
</div>
<div class="form-group clearfix">
<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
<button type="submit" style="margin-left: 20px; border: none; background: #fc1c03; color: #fff;" name="save"><a class="form-wizard-submit float-right">Submit</a></button>
</div>
</fieldset>	
</form>
</div>
</div>
</div>
</section>

<?php include 'components/footer.php' ?>


<?php include 'components/script_start.php'?>


</body>

</html>