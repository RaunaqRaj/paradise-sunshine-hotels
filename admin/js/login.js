document.addEventListener('contextmenu', event => event.preventDefault());
/** @format */
// $("#contact_submit_loader").hide();
$("#login_form").on("submit", function (e) {
    e.preventDefault();
    var url = 'home.php';
    var email = $("#email").val();
    var password = $("#password").val();
    var error = false;
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
        url: "php/login.php",
        data: $(this).serialize() + "&submit=true",
        cache: false,
        success: function (response) {
            response=JSON.parse(response);
            // $("#btn").show();
            // $("#contact_submit_loader").hide();
            if(response.success===true){
                $(location).prop('href', url);
            
            }else {
                for (const error in response.data) {
                    $('#' + error + '_error').text(response.data[error]);
                }
            }
            },
        
    });
});
