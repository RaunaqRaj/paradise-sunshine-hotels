/** @format */
$("#contact_submit_loader").hide();
$("#myform").on("submit", function (e) {
    e.preventDefault();
    var name = $("#name").val();
    var email = $("#email").val();
    var room = $("#room").val();
    var checkin = $("#check-in").val();
    var checkout = $("#check-out").val();

    var error = false;
    if (isEmpty(name)) {
        error = true;
        $('#name_error').text("Name should not be blank!");
    } else {
        $('#name_error').text("");
    }
    if (isEmpty(email)) {
        error = true;
        $('#email_error').text("E-mail should not be blank!");
    } else {
        $('#email_error').text("");
    }
    if (isEmpty(room)) {
        error = true;
        $('#room_error').text("please Select a room!");
    } else {
        $('#room_error').text("");
    }

    if (isEmpty(checkin)) {
        error = true;
        $('#checkin_error').text("message should not be blank!");
    } else {
        $('#checkin_error').text("");
    }

    if (isEmpty(checkout)) {
        error = true;
        $('#checkout_error').text("message should not be blank!");
    } else {
        $('#checkout_error').text("");
    }

    if (error) {
        return false;
    }

    $("#btn").hide();
    $("#contact_submit_loader").show();
    $.ajax({
        type: "POST",
        url: "php/reservation.php",
        data: $(this).serialize() + "&contact_submit=true",
        cache: false,
        success: function (response) {
            $("#btn").show();
            $("#contact_submit_loader").hide();
            response = JSON.parse(response);
            if (response.success === true) {
                swal({
                    icon: "success",
                    title: "success",
                    text: response.message
                });
                $('#myform')[0].reset();
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
            $("#btn").show();
            $("#contact_submit_loader").hide();
        },
    });
});
