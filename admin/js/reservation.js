$("#loader").show();
$("#example").hide();
$("#previous_loader").show();
$(document).ready(function () {
    $("#loader").hide();
    $("#example").show();
    $("#previous_loader").hide();
    getdata();
    //delete modal//

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
   $('#update').click(function (e) {
    var id = $('#quantity_update').val();
    var quantity = $("#quantity").val();
    var error = false;
    // if (isEmpty(quantity)) {
    //     error = true;
    //     $('#description_error').text("Description should not be blank!");
    // } else {
    //     $('#description_error').text("");
    // }
    // if (error) {
    //     return false;
    // }
    e.preventDefault();
    output = "";
    var id = $('#quantity_update').val();
    var quantity = $('#quantity').val();
    $.ajax({
        url: "php/reservation.php",
        type: "POST",
        dataType: "json",
        data: { submit: 'reservation-update', id: id, quantity: quantity},
        success: function (response) {
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
                $('#UpdateModal').modal('hide');
                    getdata();
            } else {
                for (const error in response.data) {
                    $('#' + error + '_error').text(response.data[error]);
                }
            }
        }
    });
});

$(document).on('click', '.update', function () {
    var id = $(this).attr('data-id');
    var quantity = $(this).attr('data-quantity');

    $('#quantity_update').val(id);
    $("#UpdateModal").modal('show');
    var id = $('#id').val(id);
    var quantity = $('#quantity').val(quantity);
});

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
        <button class='btn  mt-3 mx-1 mb-2 btn-outline-success update' style='color: #000;'data-bs-toggle='modal' data-quantity=${reservation.quantity} data-id=${reservation.id} ><i class='fa-solid fa-pen'></i></button>
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



