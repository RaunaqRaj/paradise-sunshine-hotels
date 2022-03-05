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
                                    <table id="example" class="display" style="min-width: 845px; color:black;">
                                        <thead>
                                            <tr>
                                                <th>S no</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Raunaq Raj</td>
                                                <td>raunaq@gmail.com</td>
                                                <td>Regarding to booking a room</td>
                                                <td><a href="view.php?contact=1"><button class="btn btn-outline-primary mt-2" style="color: #000;"><i class="fa-solid fa-eye"></i></button></a><button class="btn mt-3 mx-2 mb-2 btn-outline-success" style="color: #000;"data-bs-toggle="modal" data-bs-target="#ReplyModal" data-bs-whatever="@getbootstrap"><i class="fa-solid fa-reply"></i></button><button class="btn btn-outline-danger mt-2 mx-2" style=" color: #000;" data-bs-toggle="modal" data-bs-target="#exampleModal"><lord-icon
                                                 src="https://cdn.lordicon.com/qsloqzpf.json"
                                                motion-type =hover-empty
                                                trigger="loop"
                                                style="width:20px;height:20px">
                                                </lord-icon></button></td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Master aadmi</td>
                                                <td>raunaq@gmail.com</td>
                                                <td>Regarding to booking a room</td>
                                                <td><button class="btn btn-outline-primary mt-2" style="color: #000;"><i class="fa-solid fa-eye"></i></button><button class="btn mt-3 mx-2 mb-2 btn-outline-success" style="color: #000;"data-bs-toggle="modal" data-bs-target="#ReplyModal" data-bs-whatever="@getbootstrap"><i class="fa-solid fa-reply"></i></button><button class="btn btn-outline-danger mt-2 mx-2" style=" color: #000;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash-can"></i></button></td>                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Fkk</td>
                                                <td>raunaq@gmail.com</td>
                                                <td>Regarding to booking a room</td>
                                                <td><button class="btn btn-outline-primary mt-2" style="color: #000;"><i class="fa-solid fa-eye"></i></button><button class="btn mt-3 mx-2 mb-2 btn-outline-success" style="color: #000;"data-bs-toggle="modal" data-bs-target="#ReplyModal" data-bs-whatever="@getbootstrap"><i class="fa-solid fa-reply"></i></button><button class="btn btn-outline-danger mt-2 mx-2" style=" color: #000;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash-can"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Skk</td>
                                                <td>raunaq@gmail.com</td>
                                                <td>Regarding to booking a room</td>
                                                <td><button class="btn btn-outline-primary mt-2" style="color: #000;"><i class="fa-solid fa-eye"></i></button><button class="btn mt-3 mx-2 mb-2 btn-outline-success" style="color: #000;"data-bs-toggle="modal" data-bs-target="#ReplyModal" data-bs-whatever="@getbootstrap"><i class="fa-solid fa-reply"></i></button><button class="btn btn-outline-danger mt-2 mx-2" style=" color: #000;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash-can"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>kaushal</td>
                                                <td>raunaq@gmail.com</td>
                                                <td>Regarding to booking a room</td>
                                                <td><button class="btn btn-outline-primary mt-2" style="color: #000;"><i class="fa-solid fa-eye"></i></button><button class="btn mt-3 mx-2 mb-2 btn-outline-success" style="color: #000;"data-bs-toggle="modal" data-bs-target="#ReplyModal" data-bs-whatever="@getbootstrap"><i class="fa-solid fa-reply"></i></button><button class="btn btn-outline-danger mt-2 mx-2" style=" color: #000;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash-can"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>lokesh </td>
                                                <td>raunaq@gmail.com</td>
                                                <td>Regarding to booking a room</td>
                                                <td><button class="btn btn-outline-primary mt-2" style="color: #000;"><i class="fa-solid fa-eye"></i></button><button class="btn mt-3 mx-2 mb-2 btn-outline-success" style="color: #000;"data-bs-toggle="modal" data-bs-target="#ReplyModal" data-bs-whatever="@getbootstrap"><i class="fa-solid fa-reply"></i></button><button class="btn btn-outline-danger mt-2 mx-2" style=" color: #000;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash-can"></i></button></td>
                                            </tr>
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


