/** @format */
$("#submit_loader").hide();
$("#add_room").on("submit", function (e) {
    e.preventDefault();
    var heading = $("#heading").val();
    var areacode = $("#areacode").val();
    var description = $("#description").val();
    var location = $("#location").val();
    var price = $("#price").val();
    var error = false;
    if (isEmpty(heading)) {
        error = true;
        $('#heading_error').text("Heading should not be blank!");
    } else {
        $('#heading_error').text("");
    }
    if (isEmpty(areacode)) {
        error = true;
        $('#code_error').text("Area Code should not be blank!");
    } else {
        $('#code_error').text("");
    }
    if (isEmpty(description)) {
        error = true;
        $('#description_error').text("Description should not be blank!");
    } else {
        $('#description_error').text("");
    }
    if (isEmpty(location)) {
        error = true;
        $('#location_error').text("Location should not be blank!");
    } else {
        $('#location_error').text("");
    }
    if (isEmpty(price)) {
        error = true;
        $('#price_error').text("Price should not be blank!");
    } else {
        $('#price_error').text("");
    }
    if (error) {
        return false;
    }

    $("#submit").hide();
    $("#submit_loader").show();
    $.ajax({
        type: "POST",
        url: "php/add_room.php",
        data: $(this).serialize() + "&submit=true",
        cache: false,
        success: function (response) {
            $("#submit").show();
            $("#submit_loader").hide();
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
            $("#submit").show();
            $("#submit_loader").hide();
        },
    });
});
