$(document).ready(function () {

    $('#delete').click(function (e) {
        e.preventDefault();
        var id = $('#customer_delete').val();
        $.ajax({
            url: "php/staff_types.php",
            type: "POST",
            dataType: "json",
            data: { submit: 'staff_types-delete', id: id },
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

    $('#update').click(function (e) {
        var designation = $('#designation').val();
        var description = $('#description').val();
        var error = false;
        if (isEmpty(designation)) {
            error = true;
            $('#designation_error').text("Designation should not be blank!");
        } else {
            $('#designation_error').text("");
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
        e.preventDefault();
        output = "";
        var id = $('#id').val();
        var designation = $('#designation').val();
        var description = $('#description').val();
        $.ajax({
            url: "php/staff_types.php",
            type: "POST",
            dataType: "json",
            data: { submit: 'staff_type-update', id: id, designation: designation, description : description},
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
        var designation = $(this).attr('data-designation');
        var description = $(this).attr('data-description');
        $('#id').val(id);
        $("#UpdateModal").modal('show');
        var id = $('#id').val(id);
        var designation = $('#designation').val(designation);
        var description = $('#description').val(description);
    });
   


    getdata();
    function getdata() {
        output = "";
        output_error = "";

        $.ajax({
            url: "php/staff_types.php",
            type: "POST",
            dataType: "json",
            data: { submit: 'staff_types-list' },
            success: function (response) {
                if (response.success) {
                    var output = get_staff_types_list_html(response.data);
                    $("#staff_type_list").html(output);
                } else {
                    output_error += `
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
 
    function get_staff_types_list_html(staff_types) {
        previous = "";
        staff_types.forEach((staff_types, index) => {
            previous += `
        <tr>
        <td class="user_id">${index + 1}</td>
        <td>${staff_types.designation}</td>
        <td>${staff_types.info}</td>
        <td>${staff_types.created_at}</td>
        <td>
        <button class='btn  mt-3 mx-1 mb-2 btn-outline-success update' style='color: #000;'data-bs-toggle='modal' data-designation=${staff_types.designation} data-designation=${staff_types.decription}  data-id=${staff_types.id} ><i class='fa-solid fa-pen'></i></button><button data-id=${staff_types.id} class='btn  btn-outline-danger delete mt-2 mx-1' style=' color: #000;'><i class='fa-solid fa-trash'></i></button>
        </td>
    </tr>
`;
        });
        return previous;
    }
});