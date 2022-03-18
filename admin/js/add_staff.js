/** @format */
// $("#loader").hide();
$("#staff_type_form").on("submit", function (e) {
    e.preventDefault();
    var designation = $("#designation").val();
    var description = $("#description").val();
    var error = false;
    if (isEmpty(designation)) {
        error = true;
        $('#designation_error').text("Designation should not be blank!");
    } else {
        $('#designation_error').text("");
    }
    if (isEmpty(description)) {
        error = true;
        $('#description_error').text("Description should not be blank!");
    } else {
        $('#description_error').text("");
    }


    if (error) {
        return false;
    }

    // $("#add_customer").hide();
    // $("#loader").show();
    $.ajax({
        type: "POST",
        url: "php/add_staff.php",
        data: $(this).serialize() + "&add=true",
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
                $('#staff_type_form')[0].reset();
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
            // $("#add_customer").show();
            // $("#loader").hide();
        },
    });
});
