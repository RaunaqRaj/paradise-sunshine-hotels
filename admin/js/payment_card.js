$(document).ready(function () {

    $('#delete').click(function (e) {
        e.preventDefault();
        var id = $('#customer_delete').val();
        $.ajax({
            url: "php/payment_card.php",
            type: "POST",
            dataType: "json",
            data: { submit: 'card-delete', id: id },
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
            url: "php/payment_card.php",
            type: "POST",
            dataType: "json",
            data: { submit: 'card-list' },
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

    // $('#update').click(function (e) {
    //     var first = $("#first").val();
    //     var error = false;
    //     if (isEmpty(first)) {
    //         error = true;
    //         $('#first_error').text("First name should not be blank!");
    //     } else {
    //         $('#first_error').text("");
    //     }
    //     if (error) {
    //         return false;
    //     }
    //     e.preventDefault();
    //     output = "";
    //     var id = $('#id').val();
    //     var first_name = $('#first').val();
    //     $.ajax({
    //         url: "php/payment_card.php",
    //         type: "POST",
    //         dataType: "json",
    //         data: { submit: 'card-update', id: id, first: first_name },
    //         success: function (response) {
    //             if (response.success === true) {
    //                 Toastify({
    //                     text: response.message,
    //                     className: "success",
    //                     style: {
    //                         background: "#78f76d",
    //                     },
    //                     close: true,
    //                     gravity: top,
    //                     duration: 3000,
    //                     oldestFirst: true
    //                 }).showToast();
    //                 page = "reservation.php";
    //                 if (page == "reservation.php") {
    //                     getdata();
    //                     $('#reservation-data').html();
    //                 } else {
    //                     getpreviousdata();
    //                 }
    //                 $('#UpdateModal').modal('hide');
    //             } else {
    //                 for (const error in response.data) {
    //                     $('#' + error + '_error').text(response.data[error]);
    //                 }
    //             }
    //         }
    //     });
    // });

    // $(document).on('click', '.update', function () {
    //     var id = $(this).attr('data-id');
    //     var first_name = $(this).attr('data-name');

    //     $('#id').val(id);
    //     $("#UpdateModal").modal('show');
    //     var id = $('#id').val(id);
    //     var first_name = $('#first').val(first_name);
    // });

    function get_customer_list_html(cards) {
        previous = "";
        cards.forEach((card, index) => {
            previous += `
        <tr>
        <td class="user_id">${index + 1}</td>
        <td>${card.first_name}</td>
        <td>${card.card_number}</td>
        <td>${card.expiry_date}</td>
        <td>
       <button data-id=${card.id} class='btn  btn-outline-danger delete mt-2 mx-1' style=' color: #000;'><i class='fa-solid fa-trash'></i></button>
        </td>
    </tr>
`;
        });
        return previous;
    }
});