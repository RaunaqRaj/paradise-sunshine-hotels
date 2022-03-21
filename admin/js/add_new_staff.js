/** @format */
// $("#contact_submit_loader").hide();
$("#staff_form").on("submit", function (e) {
    e.preventDefault();

    var username = $("#username").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var name = $("#name").val();
    var e_mail = $("#e-mail").val();
    var phone = $("#phone").val();
    var error = false;
    if (isEmpty(username)) {
        error = true;
        $('#user_error').text("username should not be blank!");
    } else {
        $('#user_error').text("");
    }
    if (isEmpty(name)) {
        error = true;
        $('#name_error').text("Name should not be blank!");
    } else {
        $('#name_error').text("");
    }
    if (isEmpty(phone)) {
        error = true;
        $('#phone_error').text("Phone number should not be blank!");
    } else {
        $('#phone_error').text("");
    }
    if (isEmpty(e_mail)) {
        error = true;
        $('#address_error').text("Email should not be blank!");
    } else {
        $('#address_error').text("");
    }
    if (isEmpty(email)) {
        error = true;
        $('#email_error').text("E-mail should not be blank!");
    } else {
        $('#email_error').text("");
    }
    if (isEmpty(password)) {
        error = true;
        $('#password_error').text("password should not be blank!");
    } else {
        $('#password_error').text("");
    }
    if (error) {
        return false;
    }

    // $("#btn").hide();
    // $("#contact_submit_loader").show();
    $.ajax({
        type: "POST",
        url: "php/add_new_staff.php",
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
                $('#staff_form')[0].reset();
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
            // $("#btn").show();
            // $("#contact_submit_loader").hide();
        },
    });
});
