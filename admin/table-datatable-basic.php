<?php include 'components/head_start.php' ?>
<?php include 'components/head_end.php' ?>

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

        <?php include 'components/header.php' ?>
        <div class="modal fade" id="MessageModal" tabindex="-1" aria-labelledby="MessageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MessageModalLabel">Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-dark">Message</p>
        <p class="text-dark">A guaranteed reservation means you've paid for your reservation in advance, and the hotel must hold the room for you. A confirmed reservation means that you have not yet paid, but the hotel agrees to hold a room for you based on some condition. For example, in a typical confirmed reservation, the hotel may agree to "hold the room for you until 8 p.m." on a specific day. If you show up before 8 p.m., then the hotel must give you a room, but if you fail to meet a condition, then the hotel does not have to offer you a room.If you've prepaid for your room, it is guaranteed and the hotel must give you the room you paid for, even if you show up late. If the hotel does not have a room for you, then it has breached your contract and must provide you with a reasonable substitute. This means that they may end up having to send you to another hotel, even if it is more expensive, and pay for the transportation - even the phone call to let people know you've switched hotels.</p>
        <br>
      </div>
      <div class="modal-footer">
    <button type="button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#ReplyModal"><i class="fa fa-reply mx-2"></i>Reply</button>
      </div>
    </div>
  </div>
</div>
        <button type="button" class="btn btn-primary" >Open modal for @getbootstrap</button>

        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Contact us</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Contact us </a></li>
                        </ol>
                    </div>
                </div>

               
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Contact us</h4>
                                
                <div class="modal fade" id="ReplyModal" tabindex="-1" aria-labelledby="ReplyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ReplyModalLabel">Reply</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label text-dark">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label text-dark">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-success">Reply</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete This Message?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-dark">Are you sure you want to delete this Message?</p>
<br>
        <button type="button" class="btn btn-danger mx-2">yes</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display text-center" style="min-width: 845px; color:black;">
                                        <thead>
                                            <tr>
                                                <th>S no</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="data">
                                          
                                          
                                        </tbody>
                                    </table>
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
        <?php include 'components/footer.php' ?>

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
    <?php include 'components/script_start.php' ?>


    <?php include 'components/script_end.php' ?>


