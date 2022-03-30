$("#submit_loader").hide();
$(document).ready(function () {

    $("#add_room_image").on("submit", function (e) {
      e.preventDefault();

      var formData = new FormData(this);
        var image = $("#image").val();
        var error = false;
        if(isEmpty(image)){
            error = true;
            $('#image_error').text("please select an image");
        }else{
            $('#image_error').text("");  
        }

        if (error) {
             return false;
            }
            $("#submit").hide();
            $("#submit_loader").show();
      $.ajax({

        url: "php/add_room_image.php",
        type: "POST",
        data: formData,
        contentType: false,  //you can also use false. it will mean the same.
        processData: false,

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
            $("#add_room_image").reset();
          } else {
            Toastify({
                text: response.message,
                className: "success",
                style: {
                    background: "#fc0303",
                    },
                close : true,
                gravity : top,
                duration : 3000,
                oldestFirst : true
              }).showToast()
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

  });