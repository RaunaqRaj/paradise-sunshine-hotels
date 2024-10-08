/** @format */
// $("#contact_submit_loader").hide();
$("#register_form").on("submit", function (e) {
    e.preventDefault();
    var username = $("#username").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var error = false;
    if (isEmpty(username)) {
        error = true;
        $('#user_error').text("username should not be blank!");
    } else {
        $('#user_error').text("");
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
        url: "php/register.php",
        data: $(this).serialize() + "&submit=true",
        cache: false,
        success: function (response) {
            // $("#btn").show();
            // $("#contact_submit_loader").hide();
            response = JSON.parse(response);
            if (response.success === true) {
                swal({
                    icon: "success",
                    title: "success",
                    text: response.message
                });
                $('#register_form')[0].reset();
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
