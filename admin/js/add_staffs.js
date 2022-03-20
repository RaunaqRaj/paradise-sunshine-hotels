/** @format */
$("#loader").hide();
$("#staff_form").on("submit", function (e) {
    e.preventDefault();
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phno").val();
    var error = false;
    if (isEmpty(name)) {
        error = true;
        $('#name_error').text("Name should not be blank!");
    } else {
        $('#name_error').text("");
    }
    if (isEmpty(email)) {
        error = true;
        $('#email_error').text("Email should not be blank!");
    } else {
        $('#email_error').text("");
    }
    if (isEmpty(phone)) {
        error = true;
        $('#phone_error').text("Phone number should not be blank!");
    } else {
        $('#phone_error').text("");
    }

    if (error) {
        return false;
    }

    // $("#add_customer").hide();
    // $("#loader").show();
    $.ajax({
        type: "POST",
        url: "php/add_staffs.php",
        data: $(this).serialize() + "&add_staff=true",
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
                    close: true,
                    gravity: top,
                    duration: 3000,
                    oldestFirst: true
                }).showToast();
                $('#staff_form')[0].reset();
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
                close: true,
                gravity: top,
                duration: 3000,
                oldestFirst: true
            }).showToast();
            $("#add_staff").show();
            $("#loader").hide();
        },
    });
});
