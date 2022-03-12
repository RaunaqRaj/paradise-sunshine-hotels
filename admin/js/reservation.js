$("#loader").show();
$("#example").hide();
$("#previous_loader").show();
$(document).ready(function () {
    $("#loader").hide();
    $("#example").show();
    $("#previous_loader").hide();
    getdata();
    //delete modal//
    $('#update').click(function(e){
        e.preventDefault();
        output="";
        var id = $('#status_update').val();
        var status = $('#status').val();
        // alert(reservation_status);
         $.ajax({
        url: "php/reservation.php",
        type: "POST",
        dataType: "json",
        data:{ submit: 'reservation-update', id: id,status:status},
           success: function(response){
               $('#UpdateModal').modal('hide');
               if(response.success===true){
                Toastify({
                    text: response.message,
                    className: "success",
                    style: {
                        background: "#78f76d",
                        },
                    close : true,
                    gravity : top,
                    duration : 3000,
                    oldestFirst : true
                  }).showToast();
                  page = "reservation.php";
                  if(page=="reservation.php"){
                  getdata();
                  $('#reservation-data').html();
                  }else{
                    getpreviousdata();
                  }
               }else{
                Toastify({
                    text: response.message,
                    className: "info",
                    style: {
                    background: "#ff4e21",
                    }
                  }).showToast();
               }
              
              
           }
           
        });
    });
     $(document).on( 'click', '.update', function () {
        var id =$(this).attr('data-id');
        var status =$(this).attr('data-status');
        $('#status_update').val(id);
        $("#UpdateModal").modal('show');
        var status = $('#status').val(status);
});



   //contact-list Table//
   function getdata(){
    output = "";
    output_error = "";
    
   $.ajax({
        url: "php/reservation.php",
        type: "POST",
        dataType: "json",
        data: { submit: 'reservation-list' },
        success: function (response) {
            if (response.success) {
          var output= get_contact_list_html(response.data);
                $("#reservation-data").html(output);
            } else {
                output_error +=`
                <div class="authincation h-100">
                <div class="container-fluid h-100">
                    <div class="row justify-content-center h-100 align-items-center">
                        <div class="col-md-5 mt-5">
                            <div class="form-input-content text-center">
                                <h1 class="error-text font-weight-bold">OOPS!</h1>
                                <h4 class="mt-4"><i class="fa fa-exclamation-triangle text-warning"></i> No information found in table</h4>
                                <div class="mb-5">
                            <a class="btn btn-danger" href="./home.php">Back to Home</a>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                `;
                $("#nodata").html(output_error);
                
            }
     
        },
        error: function (error) {

        }
   
    });

   }

   function get_contact_list_html(contacts){
    previous = "";
    contacts.forEach((reservation, index) => {
        previous += `
        <tr>
        <td class="user_id">${index+1}</td>
        <td><a href='reservation-view.php?reservation=${reservation.id}'><style>a{
            color : black;
        }
        a:hover{
            color : blue;
        }
        </style>
        ${reservation.name}</td>
        <td>${reservation.email}</td>
        <td>${reservation.room}</td>
        <td>${reservation.checkin}</td>
        <td>${reservation.checkout}</td>
        <td>${reservation.status}</td>
        <td>${reservation.created_at}</td>
        <td>
       <button class='btn  mt-3 mx-1 mb-2 btn-outline-success update' style='color: #000;'data-bs-toggle='modal' data-status=${reservation.status} data-id=${reservation.id} ><i class='fa-solid fa-pen'></i></button>
        </td>
    </tr>
`;
    });
    return previous;
   }
    // previous contact table//
    getpreviousdata();
    function getpreviousdata(){
    $("#previous-reservations").on("click", function () {
       
        previous_error = "";
        $.ajax({
            url: "php/reservation.php",
            type: "POST",
            dataType: "json",
            data: { submit: 'reservation-previous', email: reservation_email },
            success: function (response) {
                if (response.success) {
                 var reservation_list =  get_contact_list_html(response.data);
                
                    $("#previous_data").html(reservation_list);
                } else {
                    previous_error +=`
                    <div class="authincation h-100">
                <div class="container-fluid h-100">
                    <div class="row justify-content-center h-100 align-items-center">
                        <div class="col-md-5 mt-5">
                            <div class="form-input-content text-center">
                                <h1 class="error-text font-weight-bold">OOPS!</h1>
                                <h4 class="mt-4"><i class="fa fa-exclamation-triangle text-warning"></i> No information found in table</h4>
                                <div class="mb-5">
                            <a class="btn btn-danger" href="./home.php">Back to Home</a>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    `;
                    $("#nodata").html(previous_error);
                }
            },
            error: function (error) {
                error = "some error occured";
            }
        });
    
    });
}
$('#example').DataTable({
    search: {
        return: true
    }
});
$('#previous_reservations').DataTable({
});
});



