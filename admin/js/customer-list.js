$(document).ready(function () {

    $('#delete').click(function (e) {
        e.preventDefault();
        var id = $('#customer_delete').val();
        $.ajax({
            url: "php/customer.php",
            type: "POST",
            dataType: "json",
            data: { submit: 'customer-delete', id: id },
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

    getdata();
    function getdata() {
        output = "";
        output_error = "";

        $.ajax({
            url: "php/customer.php",
            type: "POST",
            dataType: "json",
            data: { submit: 'customer-list' },
            success: function (response) {
                if (response.success) {
                    var output = get_customer_list_html(response.data);
                    $("#customer_list").html(output);
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

    $('#update').click(function (e) {
        var first = $("#first").val();
        var last_name = $("#last").val();
        var primary = $("#primary").val();
        var error = false;
        if (isEmpty(first)) {
            error = true;
            $('#first_name_error').text("First name should not be blank!");
        } else {
            $('#first_name_error').text("");
        }
        if (isEmpty(primary)) {
            error = true;
            $('#primary_phone_error').text("Phone number should not be blank!");
        } else {
            $('#primary_phone_error').text("");
        }
        if (error) {
            return false;
        }
        e.preventDefault();
        output = "";
        var id = $('#id').val();
        var first_name = $('#first').val();
        var last_name = $('#last').val();
        var primary_phone_number = $('#primary').val();
        var secondary_phone_number = $('#secondary').val();
        $.ajax({
            url: "php/customer.php",
            type: "POST",
            dataType: "json",
            data: { submit: 'customer-update', id: id, first: first_name, last: last_name, primary: primary_phone_number, secondary: secondary_phone_number },
            success: function (response) {
                $('#UpdateModal').modal('hide');
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

    $(document).on('click', '.update', function () {
        var id = $(this).attr('data-id');
        var first_name = $(this).attr('data-name');
        var last_name = $(this).attr('data-last');
        var primary_phone_number = $(this).attr('data-primary');
        var secondary_phone_number = $(this).attr('data-secondary');

        $('#status_update').val(id);
        $("#UpdateModal").modal('show');
        var id = $('#id').val(id);
        var first_name = $('#first').val(first_name);
        var last_name = $('#last').val(last_name);
        var primary_phone_number = $('#primary').val(primary_phone_number);
        var secondary_phone_number = $('#secondary').val(secondary_phone_number);
    });

    function get_customer_list_html(customers) {
        previous = "";
        customers.forEach((customer, index) => {
            previous += `
        <tr>
        <td class="user_id">${index + 1}</td>
        <td><a href='customer_single.php?customer=${customer.id}'><style>a{
            color : black;
        }
        a:hover{
            color : blue;
        }
        </style>
        ${customer.first_name}</td>
        <td>${customer.last_name}</td>
        <td>${customer.primary_phone_number}</td>
        <td>${customer.secondary_phone_number}</td>
        <td>
        <button class='btn  mt-3 mx-1 mb-2 btn-outline-success update' style='color: #000;'data-bs-toggle='modal' data-name=${customer.first_name} data-last=${customer.last_name}  data-primary=${customer.primary_phone_number} data-secondary=${customer.secondary_phone_number} data-id=${customer.id} ><i class='fa-solid fa-pen'></i></button><button data-id=${customer.id} class='btn  btn-outline-danger delete mt-2 mx-1' style=' color: #000;'><i class='fa-solid fa-trash'></i></button>
        </td>
    </tr>
`;
        });
        return previous;
    }
});