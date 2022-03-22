/** @format */
$("#loader").hide();
$("#add_room").on("submit", function (e) {
    e.preventDefault();
    var heading = $("#heading").val();
    var areacode = $("#areacode").val();
    var description = $("#description").val();
    var location = $("#location").val();
    var price = $("#price").val();
    var error = false;
    // if (isEmpty(first_name)) {
    //     error = true;
    //     $('#first_error').text("First name should not be blank!");
    // } else {
    //     $('#first_error').text("");
    // }
    // if (isEmpty(pay_auth)) {
    //     error = true;
    //     $('#payauth_error').text("Payment Authority should not be blank!");
    // } else {
    //     $('#payauth_error').text("");
    // }
    // if (isEmpty(cvv)) {
    //     error = true;
    //     $('#cvv_error').text("CVV should not be blank!");
    // } else {
    //     $('#cvv_error').text("");
    // }
    // if (isEmpty(pay_card)) {
    //     error = true;
    //     $('#card_error').text("Card Number should not be blank!");
    // } else {
    //     $('#card_error').text("");
    // }
    // if (isEmpty(email)) {
    //     error = true;
    //     $('#email_error').text("Email should not be blank!");
    // } else {
    //     $('#email_error').text("");
    // }
    // if (isEmpty(primary_phone)) {
    //     error = true;
    //     $('#primary_error').text("Phone number should not be blank!");
    // } else {
    //     $('#primary_error').text("");
    // }

    // if (error) {
    //     return false;
    // }

    // $("#add_customer").hide();
    // $("#loader").show();
    $.ajax({
        type: "POST",
        url: "php/add_room.php",
        data: $(this).serialize() + "&submit=true",
        cache: false,
        success: function (response) {
            // $("#btn").show();
            // $("#contact_submit_loader").hide();
            response = JSON.parse(response);
            if (response.success === true) {
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
                $('#add_room')[0].reset();
            } else {
                for (const error in response.data) {
                    $('#' + error + '_error').text(response.data[error]);
                }
            }
        },
        error: function (error) {
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
            $("#add_customer").show();
            $("#loader").hide();
        },
    });
});
