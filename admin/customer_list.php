<?php include 'components/head_start.php'?>
 <link href="./css/datatable.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> --> -->
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
                            <h4 style="color : #f48f1b;">Customers</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Customers</a></li>
                        </ol>
                    </div>
                </div>


                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete This Customer?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="customer_delete">
        <p class="text-dark">Are you sure you want to delete this Customer?</p>
<br>
        <button type="button" id="delete" class="btn btn-danger mx-2">yes</button>
        <button type="button" id="No" class="btn btn-primary" data-bs-dismiss="modal">No</button>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
</div>

 <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="ReplyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ReplyModalLabel">Update Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
              <input type="hidden" id="id">
            <label for="recipient-name" class="col-form-label text-dark">first_name</label>
            <input type="text" class="form-control" name="status" id="first" id="recipient-name">
            <span class="text-danger" id="first_name_error">*</span>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label text-dark">last_name</label>
            <input type="text" class="form-control" name="status" id="last" id="recipient-name">
            <span class="text-danger" id="">*</span>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label text-dark">primary_phone_number</label>
            <input type="text" class="form-control" name="status" id="primary" id="recipient-name">
            <span class="text-danger" id="primary_phone_error">*</span>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label text-dark">secondary_phone_number</label>
            <input type="text" class="form-control" name="status" id="secondary" id="recipient-name">
            <span class="text-danger" id="secondary_phone_error">*</span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" id="update" class="btn btn-outline-success">update</button>
      </div>
    </div>
  </div>
</div>

                            <div class="card-body" id="nodata"> 
                            <!-- <div class="spinner-grow" style="align-items: center; justify-content: center;margin-left: 500px;" id="loader" role="status">
                              <span class="visually-hidden">Loading...</span>
                            </div> -->
                                <div class="table-responsive">
                                    <table id="example" class="display text-center table-striped " style="min-width: 845px; color:black;">
                                        <thead class="table-primary">
                                            <tr>
                                                <th class="text-dark">Sno</th>
                                                <th class="text-dark">first_name</th>
                                                <th class="text-dark">last_name</th>
                                                <th class="text-dark">primary_phone</th>
                                                <th class="text-dark">secondary_phone</th>
                                                <th class="text-dark">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="customer_list">
                                       
                                               
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
    <script src="./js/customer-list.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>
    <!-- <script src="./js/datatable.js"></script> -->
    <script src="./js/font-awesome.js"></script>
    <?php include 'components/script_end.php'?>


