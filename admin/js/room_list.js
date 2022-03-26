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
        var id = $('#room_delete').val();
         $.ajax({
        url: "php/room_list.php",
        type: "POST",
        dataType: "json",
        data:{ submit: 'room-delete', id: id},
           success: function(response){
               $('#deleteModal').modal('hide');
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
        $('#room_delete').val(id);
        $("#deleteModal").modal('show');
});
$('#update').click(function (e) {
    var id = $('#room_update').val();
    var description = $("#description").val();
    var error = false;
    if (isEmpty(description)) {
        error = true;
        $('#description_error').text("Description should not be blank!");
    } else {
        $('#description_error').text("");
    }
    if (error) {
        return false;
    }
    e.preventDefault();
    output = "";
    var description = $('#description').val();;
    $.ajax({
        url: "php/room_list.php",
        type: "POST",
        dataType: "json",
        data: { submit: 'room-update', id: id, description: description},
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
                page = "reservation.php";
                if (page == "reservation.php") {
                    getdata();
                    $('#reservation-data').html();
                } else {
                    getpreviousdata();
                }
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
    var description = $(this).attr('data-name');

    $('#room_update').val(id);
    $("#UpdateModal").modal('show');
    var id = $('#id').val(id);
    var description = $('#description').val(description);
});

   //contact-list Table//
   function getdata(){
    output = "";
    output_error = "";

   $.ajax({ 
        url: "php/room_list.php",
        type: "POST",
        dataType: "json",
        data: { submit: 'room-list' },
        success: function (response) {
            if (response.success) {
          var output= get_contact_list_html(response.data);
                $("#room_list").html(output);
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
   


   function get_contact_list_html(rooms){
    previous = "";
    rooms.forEach((room, index) => {
        previous += `
        <tr>
        <td class="user_id">${index+1}</td>
        <td>${room.name}</td>
        <td>${room.facility}</td>
        <td><a href='room-single.php?room=${room.id}'><style>a{
            color : black;
        }
        a:hover{
            color : blue;
        }
        </style>${room.heading}</td>
        <td>${room.description}</td>
        <td>
        <button class='btn  mt-3 mx-1 mb-2 btn-outline-success update' style='color: #000;'data-bs-toggle='modal' data-name=${room.description}  data-id=${room.id} ><i class='fa-solid fa-edit'></i></button><button data-id=${room.id} class='btn  btn-outline-danger delete mt-2 mx-1' style=' color: #000;'><i class='fa-solid fa-trash'></i></button>
        </td>
    </tr>
`;
    });
    return previous;
   }

});



