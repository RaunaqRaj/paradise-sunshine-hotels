/** @format */
$("#contact_submit_loader").hide();
$("#reservation_form").on("submit", function (e) {
    e.preventDefault();
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();
    var primary_phone = $("#primary_phone").val();
    var secondary_phone = $("#secondary_phone").val();
    var transaction_number = $("#transaction_number").val();
    var payment_mode = $("#payment_mode").val();
    var bank = $("#bank").val();
    var quantity = $("#quantity").val();

    var error = false;
    if (isEmpty(first_name)) {
        error = true;
        $('#first_error').text("**First Name should not be blank!");
    } else {
        $('#first_error').text("");
    }

    if (isEmpty(last_name)) {
        error = true;
        $('#last_error').text("**Last Name should not be blank!");
    } else {
        $('#last_error').text("");
    }

    if (isEmpty(email)) {
        error = true;
        $('#email_error').text("**E-Mail should not be blank!");
    } else {
        $('#email_error').text("");
    }
    if (isEmpty(primary_phone)) {
        error = true;
        $('#primary_error').text("**Phone Number should not be blank!");
    } else {
        $('#primary_error').text("");
    }
    if (isEmpty(secondary_phone)) {
        error = true;
        $('#secondary_error').text("**Phone Number should not be blank!");
    } else {
        $('#secondary_error').text("");
    }
    if (isEmpty(transaction_number)) {
        error = true;
        $('#transaction_error').text("**Transaction Number should not be blank!");
    } else {
        $('#transaction_error').text("");
    }
    if (isEmpty(payment_mode)) {
        error = true;
        $('#mode_error').text("**Payment Mode should not be blank!");
    } else {
        $('#mode_error').text("");
    }
    if (isEmpty(bank)) {
        error = true;
        $('#bank_error').text("**Bank Name should not be blank!");
    } else {
        $('#bank_error').text("");
    }
    if (isEmpty(quantity)) {
        error = true;
        $('#quantity_error').text("**Quantity should not be blank!");
    } else {
        $('#quantity_error').text("");
    }
    if (error) {
        return false;
    }

    $("#submit").hide();
    $("#loader").show();
    $.ajax({
        type: "POST",
        url: "php/reservation.php",
        data: $(this).serialize() + "&save=true",
        cache: false,
        success: function (response) {
            $("#submit").show();
            $("#loader").hide();
            response = JSON.parse(response);
            if (response.success === true) {
                 Snackbar.show({text: response.message, pos: 'top-center'});
                $('#reservation_form')[0].reset();
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
            $("#submit").show();
            $("#loader").hide();
        },
    });
});
