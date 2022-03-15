/** @format */
$("#loader").hide();
$("#add_customers").on("submit", function (e) {
    e.preventDefault();
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var primary_phone = $("#primary_phone").val();
    var Secondary_phone = $("#Secondary_phone").val();
    var error = false;
    if (isEmpty(first_name)) {
        error = true;
        $('#first_name_error').text("First name should not be blank!");
    } else {
        $('#first_name_error').text("");
    }
    if (isEmpty(primary_phone)) {
        error = true;
        $('#primary_phone_error').text("Phone number should not be blank!");
    } else {
        $('#primary_phone_error').text("");
    }
    if (isEmpty(Secondary_phone)) {
        error = true;
        $('#secondary_phone_error').text("Phone number should not be blank!");
    } else {
        $('#secondary_phone_error').text("");
    }
    if (error) {
        return false;
    }

    // $("#add_customer").hide();
    // $("#loader").show();
    $.ajax({
        type: "POST",
        url: "php/add_customer.php",
        data: $(this).serialize() + "&add_customer=true",
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
                $('#add_customers')[0].reset();
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
