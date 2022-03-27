$(document).ready(function(){
    getdata();
    function getdata() {
        output = "";
        output_error = "";
    
        $.ajax({
            url: "php/room_list.php",
            type: "POST",
            dataType: "json",
            data: { submit: 'room-list' },
            success: function (response) {
                if (response.success) {
                    var output = get_customer_list_html(response.data);
                    $("#room_list").html(output);
                } else {
                    output_error += `
            <div class="authincation h-100">
            <div class="container-fluid h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-5 mt-5">
                        <div class="form-input-content text-center">
                            <h1 class="error-text font-weight-bold">OOPS!</h1>
                            <h4 class="mt-4"><i class="fa fa-exclamation-triangle text-warning"></i> No information found in table</h4>
                            <div class="mb-5">
                        <a class="btn btn-danger" href="./home.php">Back to Home</a>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            `;
                    $("#nodata").html(output_error);
    
                }
    
            },
            error: function (error) {
    
            }
    
        });
    } 
    
    function get_customer_list_html(rooms) {
        previous = "";
        rooms.forEach((room, index) => {
            previous += `
            <div class="col-md-4 text-center">
            <div class="profile">
              <img src="admin/image/${room.image}" alt="image" class="user" style="width: 300px; height:200px">
              <h5>${room.heading}<br><span>${room.description}</span><br><span>${room.price}</span></h5>
            </div>
          </div>
    `;
        });
        return previous;
    }
    })