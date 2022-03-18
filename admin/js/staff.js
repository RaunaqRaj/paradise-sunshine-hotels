$(document).ready(function (){

    $('#delete').click(function(e) {
        e.preventDefault();
        var id = $('#staff_delete').val();
        $.ajax({
            url: "php/staff.php",
            type: "POST",
            dataType: "json",
            data: { submit: 'staff-delete', id: id },
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
        $('#staff_delete').val(id);
        $("#deleteModal").modal('show');
    });


    $('#update').click(function (e) {
        var phone_number = $('#phone_number').val();
        var error = false;
        if (isEmpty(phone_number)) {
            error = true;
            $('#phone_error').text("Phone number should not be blank!");
        } else {
            $('#phone_error').text("");
        }
        if (error) {
            return false;
        }
        e.preventDefault();
        output = "";
        var id = $('#id').val();
        var phone_number = $('#phone_number').val();
        $.ajax({
            url: "php/staff.php",
            type: "POST",
            dataType: "json",
            data: { submit: 'staff-update', id: id, phone_number: phone_number},
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
        var phone_number = $(this).attr('data-phone');
        $('#id').val(id);
        $("#UpdateModal").modal('show');
        var id = $('#id').val(id);
        var phone_number = $('#phone_number').val(phone_number);  
    });

getdata();
function getdata(){
    output = "";
    output_error = "";
    
   $.ajax({
        url: "php/staff.php",
        type: "POST",
        dataType: "json",
        data: { submit: 'staff-list' },
        success: function (response) {
            if (response.success) {
          var output= get_contact_list_html(response.data);
                $("#staff_list").html(output);
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

   function get_contact_list_html(staffs){
    previous = "";
    staffs.forEach((staff, index) => {
        previous += `
        <tr>
        <td class="user_id">${index+1}</td>
        <td>${staff.username}</td>
        <td><a href='staff_single.php?staff=${staff.id}'><style>a{
            color : black;
        }
        a:hover{
            color : blue;
        }
        </style>
        ${staff.name}</td>      
        <td>${staff.email}</td>
        <td>${staff.phone_number}</td>
        <td>
        <button class='btn  mt-3 mx-1 mb-2 btn-outline-success update' style='color: #000;'data-bs-toggle='modal' data-phone=${staff.phone_number} data-id=${staff.id} ><i class='fa-solid fa-pen'></i></button><button data-id=${staff.id} class='btn  btn-outline-danger delete mt-2 mx-1' style=' color: #000;'><i class='fa-solid fa-trash'></i></button>
        </td>
    </tr>
`;
    });
    return previous;
   }
});