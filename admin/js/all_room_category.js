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
        var id = $('#category_delete').val();
         $.ajax({
        url: "php/all_room_category.php",
        type: "POST",
        dataType: "json",
        data:{ submit: 'category-delete', id: id},
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
        $('#category_delete').val(id);
        $("#exampleModal").modal('show');
});

   //contact-list Table//
   function getdata(){
    output = "";
    output_error = "";

   $.ajax({ 
        url: "php/all_room_category.php",
        type: "POST",
        dataType: "json",
        data: { submit: 'category-list' },
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
    var category = $("#Room_category").val();
    var description = $("#description").val();
    var error = false;
    if (isEmpty(category)) {
        error = true;
        $('#category_error').text("Room category should not be blank!");
    } else {
        $('#category_error').text("");
    }
    if (isEmpty(description)) {
        error = true;
        $('#description_error').text("Description should not be blank!");
    } else {
        $('#description_error').text("");
    }
    if (error) {
        return false;
    }

    // $("#btn").hide();
    // $("#contact_submit_loader").show();
    $.ajax({
        type: "POST",
        url: "php/all_room_category.php",
        data: {submit : 'category-add', category:category, description:description},
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
    var name = $("#category").val();
    var description = $("#category_description").val();
    var error = false;
    if (isEmpty(name)) {
        error = true;
        $('#first_error').text("Category should not be blank!");
    } else {
        $('#first_error').text("");
    }
    if (isEmpty(description)) {
        error = true;
        $('#category_description_error').text("Description should not be blank!");
    } else {
        $('#category_description_error').text("");
    }
    if (error) {
        return false;
    }
    e.preventDefault();
    output = "";
    var id = $('#id').val();
    var name = $('#category').val();
    var description = $("#category_description").val();

    $.ajax({
        url: "php/all_room_category.php",
        type: "POST",
        dataType: "json",
        data: { submit: 'category-update', id: id, name: name, description:description },
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
    var description = $(this).attr('data-description');

    $('#id').val(id);
    $("#UpdateModal").modal('show');
    var id = $('#id').val(id);
    var name = $('#category').val(name);
    var description = $('#category_description').val(description);
});

   function get_contact_list_html(rooms){
    previous = "";
    rooms.forEach((room, index) => {
        previous += `
        <tr>
        <td class="user_id">${index+1}</td>
        <td>${room.name}</td>
        <td>${room.description}</td>
        <td>${room.created_at}</td>
        <td>
        <button class='btn  mt-3 mx-1 mb-2 btn-outline-success update' style='color: #000;'data-bs-toggle='modal' data-name=${room.name} data-description=${room.description} data-id=${room.id} ><i class='fa-solid fa-edit'></i></button><button data-id=${room.id} class='btn  btn-outline-danger delete mt-2 mx-1' style=' color: #000;'><i class='fa-solid fa-trash'></i></button>
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



