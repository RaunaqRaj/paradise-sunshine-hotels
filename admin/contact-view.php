<?php include 'components/head_start.php'?>
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

        <?php include 'components/header.php'?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Contact Details</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile">
                            <div class="profile-head">
                                <div class="photo-content">
                                  <div class="background" style="background : #fff;">
                                    <div class="profile-photo">

                                    </div>
                                </div>
                                <div class="profile-info">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-8">
                                            <div class="row">
                                                <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                    <div class="profile-name">
                                                        <h4 class="text-primary"><i class="fa fa-user mx-2"></i>Raunaq Raj</h4>

                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                    <div class="profile-email">
                                                        <h4 class="text-muted"><a style="text-decoration: none; color: #000;" href="mailto:someone@example.com">Raunaq@gmail.com</a></h4>
                                                        <p>Email</p>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-xl-4 col-sm-4 prf-col">
                                                    <div class="profile-call">
                                                        <h4 class="text-muted">(+1) 321-837-1030</h4>
                                                        <p>Phone No.</p>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <div class="col-lg-12">
                        <div class="card" style="height: 900px">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link active show">Message</a>
                                            </li>
                                            <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">Previous Contacts</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" style="height: 600px;">
                                            <div id="my-posts" style="height: 600px;" class="tab-pane fade active show">
                                                <div class="my-post-content pt-1" style="height: 600px">
                                                    <div class="post-input" style="height: 600px">
                                                    <p class="mt-4 text-dark"> A guaranteed reservation means you've paid for your reservation in advance, and the hotel must hold the room for you. A confirmed reservation means that you have not yet paid, but the hotel agrees to hold a room for you based on some condition. For example, in a typical confirmed reservation, the hotel may agree to "hold the room for you until 8 p.m." on a specific day. If you show up before 8 p.m., then the hotel must give you a room, but if you fail to meet a condition, then the hotel does not have to offer you a room.If you've prepaid for your room, it is guaranteed and the hotel must give you the room you paid for, even if you show up late. If the hotel does not have a room for you, then it has breached your contract and must provide you with a reasonable substitute. This means that they may end up having to send you to another hotel, even if it is more expensive, and pay for the transportation - even the phone call to let people know you've switched hotels.</p>
                                                    <button class="btn mt-3 mx-2 mb-2 btn-outline-success " style="color: #000;"data-bs-toggle="modal" data-bs-target="#ReplyModal" data-bs-whatever="@getbootstrap"><i class="fa-solid fa-reply mx-1"></i>Reply</button>
                                                </div>
                                                </div>
                                                </div>

                                            <div id="about-me" class="tab-pane fade">
                                                <div class="profile-about-me">
                                                    <div class="pt-4 border-bottom-1 pb-4">
                                                        <h4 class="text-primary">All previous contacts</h4>
                                                        <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px; color:black;">
                                        <thead>
                                            <tr>
                                                <th>S no</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Created_at</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="text-dark">Raunaq Raj</td>
                                                <td>raunaq@gmail.com</td>
                                                <td>Regarding to booking a room</td>
                                                <td>26-10-2021 || 10:30pm</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td class="text-dark">Raunaq Raj</td>
                                                <td>raunaq@gmail.com</td>
                                                <td>Regarding to booking a room</td>
                                                <td>26-10-2021 || 10:30pm</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td class="text-dark">Raunaq Raj</td>
                                                <td>raunaq@gmail.com</td>
                                                <td>Regarding to booking a room</td>
                                                <td>26-10-2021 || 10:30pm</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td class="text-dark">Raunaq Raj</td>
                                                <td>raunaq@gmail.com</td>
                                                <td>Regarding to booking a room</td>
                                                <td>26-10-2021 || 10:30pm</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td class="text-dark">Raunaq Raj</td>
                                                <td>raunaq@gmail.com</td>
                                                <td>Regarding to booking a room</td>
                                                <td>26-10-2021 || 10:30pm</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td class="text-dark">Raunaq Raj</td>
                                                <td>raunaq@gmail.com</td>
                                                <td>Regarding to booking a room</td>
                                                <td>26-10-2021 || 10:30pm</td>
                                            </tr>
                                    </table>
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


    <?php include 'components/script_end.php'?>


