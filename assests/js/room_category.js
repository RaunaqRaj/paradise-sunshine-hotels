$(document).ready(function(){
getdata();
function getdata() {
    output = "";
    output_error = "";

    $.ajax({
        url: "php/room_category.php",
        type: "POST",
        dataType: "json",
        data: { submit: 'category-list' },
        success: function (response) {
            if (response.success) {
                var output = get_customer_list_html(response.data);
                $("#categories").html(output);
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

function get_customer_list_html(categories) {
    previous = "";
    categories.forEach((category, index) => {
        previous += `
        <div class="col-md-4 text-center">
        <div class="profile" style="background: #fff;">
          <h5>${category.name}<br><span>The SPA's in the paradise Hotels Provides a better enviornment to relax your body and mind freely with the expert massagers.</span></h5>
        </div>
      </div>
`;
    });
    return previous;
}
})