/** @format */
$("#loader").hide();
$("#customer_form").on("submit", function (e) {
    e.preventDefault();
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();
    var primary_phone = $("#primary_phone").val();
    var Secondary_phone = $("#Secondary_phone").val();
    var pay_card = $("#card").val();
    var pay_auth = $("#payment_auth").val();
    var cvv = $("#cvv").val();
    var error = false;
    if (isEmpty(first_name)) {
        error = true;
        $('#first_error').text("First name should not be blank!");
    } else {
        $('#first_error').text("");
    }
    if (isEmpty(pay_auth)) {
        error = true;
        $('#payauth_error').text("Payment Authority should not be blank!");
    } else {
        $('#payauth_error').text("");
    }
    if (isEmpty(cvv)) {
        error = true;
        $('#cvv_error').text("CVV should not be blank!");
    } else {
        $('#cvv_error').text("");
    }
    if (isEmpty(pay_card)) {
        error = true;
        $('#card_error').text("Card Number should not be blank!");
    } else {
        $('#card_error').text("");
    }
    if (isEmpty(email)) {
        error = true;
        $('#email_error').text("Email should not be blank!");
    } else {
        $('#email_error').text("");
    }
    if (isEmpty(primary_phone)) {
        error = true;
        $('#primary_error').text("Phone number should not be blank!");
    } else {
        $('#primary_error').text("");
    }

    if (error) {
        return false;
    }

    // $("#add_customer").hide();
    // $("#loader").show();
    $.ajax({
        type: "POST",
        url: "php/add_customer.php",
        data: $(this).serialize() + "&save=true",
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
                $('#customer_form')[0].reset();
            } else {
                Toastify({
                    text: response.message,
                    className: "success",
                    style: {
                        background: "#ed100c",
                        },
                    close : true,
                    gravity : top,
                    duration : 3000,
                    oldestFirst : true
                  }).showToast();
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
