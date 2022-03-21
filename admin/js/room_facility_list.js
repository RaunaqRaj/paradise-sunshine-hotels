$("#loader").show();
$("#example").hide();
$("#previous_loader").show();
$(document).ready(function () {
    $("#loader").hide();
    $("#example").show();
    $("#previous_loader").hide();
    getdata();
    //delete modal//
    $('#delete').click(function(e){
        e.preventDefault();
        var id = $('#facility_delete').val();
         $.ajax({
        url: "php/room_facility_list.php",
        type: "POST",
        dataType: "json",
        data:{ submit: 'facility-delete', id: id},
           success: function(response){
               $('#exampleModal').modal('hide');
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
                    getdata();
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
     $(document).on( 'click', '.delete', function () {
        var id =$(this).attr('data-id');
        $('#facility_delete').val(id);
        $("#exampleModal").modal('show');
});


   //contact-list Table//
   function getdata(){
    output = "";
    output_error = "";

   $.ajax({ 
        url: "php/room_facility_list.php",
        type: "POST",
        dataType: "json",
        data: { submit: 'facility-list' },
        success: function (response) {
            if (response.success) {
          var output= get_contact_list_html(response.data);
                $("#contact-data").html(output);
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

   /** @format */
// $("#contact_submit_loader").hide();
$("#submit").click( function (e) {
    e.preventDefault();
    var facility = $("#room_facility").val();
    var price = $("#room_facility").val();
    var error = false;
    if (isEmpty(facility)) {
        error = true;
        $('#facility_error').text("Facility should not be blank!");
    } else {
        $('#facility_error').text("");
    }
    if (isEmpty(price)) {
        error = true;
        $('#price_error').text("price should not be blank!");
    } else {
        $('#price_error').text("");
    }
    if (error) {
        return false;
    }

    // $("#btn").hide();
    // $("#contact_submit_loader").show();
    $.ajax({
        type: "POST",
        url: "php/room_facility_list.php",
        data: {submit : 'facility-add', facility:facility, price : price},
        cache: false,
        success: function (response) {
            // $("#btn").show();
            // $("#contact_submit_loader").hide();
            response = JSON.parse(response);
            if (response.success === true) {
                $('#AddModal').modal('hide');
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
                  getdata();
                $('#add_category')[0].reset();
            } else {
                for (const error in response.data) {
                    $('#' + error + '_error').text(response.data[error]);
                }
            }
        },
        error: function (error) {
            swal({
                icon: "error",
                title: "something went wrong",
                text: response.message
            });
            // $("#btn").show();
            // $("#contact_submit_loader").hide();
        },
    });
});
$(document).on( 'click', '#add_modal', function () {
    var id =$(this).attr('data-id');
    $('#category_delete').val(id);
    $("#AddModal").modal('show');
});

//update modal
$('#update').click(function (e) {
    var facility = $("#facility").val();
    var price = $("#price").val();
    var error = false;
    if (isEmpty(facility)) {
        error = true;
        $('#facility_error').text("Category should not be blank!");
    } else {
        $('#facility_error').text("");
    }
    if (isEmpty(price)) {
        error = true;
        $('#price_error').text("Category should not be blank!");
    } else {
        $('#price_error').text("");
    }
    if (error) {
        return false;
    }
    e.preventDefault();
    output = "";
    var id = $('#id').val();
    var facility = $("#facility").val();
    var price = $("#price").val();
    $.ajax({
        url: "php/room_facility_list.php",
        type: "POST",
        dataType: "json",
        data: { submit: 'facility-update', id: id, facility: facility, price : price },
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
                getdata();
                $('#UpdateModal').modal('hide');
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
    var name = $(this).attr('data-name');
    var price = $(this).attr('data-price');

    $('#id').val(id);
    $("#UpdateModal").modal('show');
    var id = $('#id').val(id);
    var name = $('#facility').val(name);
    var price = $('#price').val(price);
});

   function get_contact_list_html(facilities){
    previous = "";
    facilities.forEach((facility, index) => {
        previous += `
        <tr>
        <td class="user_id">${index+1}</td>
        <td>${facility.name}</td>
        <td>${facility.price}</td>
        <td>${facility.created_at}</td>
        <td>
        <button class='btn  mt-3 mx-1 mb-2 btn-outline-success update' style='color: #000;'data-bs-toggle='modal' data-name=${facility.name} data-price=${facility.price}  data-id=${facility.id} ><i class='fa-solid fa-pen'></i></button><button data-id=${facility.id} class='btn  btn-outline-danger delete mt-2 mx-1' style=' color: #000;'><i class='fa-solid fa-trash'></i></button>
        </td>
    </tr>
`;
    });
    return previous;
   }

    getpreviousdata();
    function getpreviousdata(){
    $("#previous-contacts").on("click", function () {
       
        previous_error = "";
        $.ajax({
            url: "php/contact-list.php",
            type: "POST",
            dataType: "json",
            data: { submit: 'contact-previous', email: contact_email },
            success: function (response) {
                if (response.success) {
                 var contact_list =  get_contact_list_html(response.data);
                
                    $("#previous_data").html(contact_list);
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
});



