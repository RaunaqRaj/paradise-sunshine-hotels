$("#loader").show();
$("#example").hide();
$("#previous_loader").show();
$(document).ready(function () {
    $("#loader").hide();
    $("#example").show();
    $("#previous_loader").hide();
    getdata();
    //delete modal//
    $('#delete').click(function (e) {
        e.preventDefault();
        var id = $('#customer_delete').val();
        $.ajax({
            url: "php/reservation.php",
            type: "POST",
            dataType: "json",
            data: { submit: 'reservation-delete', id: id },
            success: function (response) {
                $('#deleteModal').modal('hide');
                if (response.success === true) {
                    Toastify({
                        text: response.message,
                        className: "success",
                        style: {
                            background: "#78f76d",
                        },
                        close: true,
                        gravity: top,
                        duration: 3000,
                        oldestFirst: true
                    }).showToast();
                    getdata();
                    getpreviousdata();
                } else {
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
    $(document).on('click', '.delete', function () {
        var id = $(this).attr('data-id');
        $('#customer_delete').val(id);
        $("#deleteModal").modal('show');
    });

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
        <td>${reservation.first_name}</td>
        <td>${reservation.heading}</td>
        <td>${reservation.quantity}</td>
        <td>${reservation.checkin}</td>
        <td>${reservation.checkout}</td>
        <td>
        <button data-id=${reservation.id} class='btn  btn-outline-danger delete mt-2 mx-1' style=' color: #000;'><i class='fa-solid fa-trash'></i></button>
        </td>
    </tr>
`;
    });
    return previous;
   }
    // previous contact table//
  
$('#example').DataTable({
    search: {
        return: true
    }
});
$('#previous_reservations').DataTable({
});
});



