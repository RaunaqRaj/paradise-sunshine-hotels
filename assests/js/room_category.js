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
        <div class="col-md-4 mx-auto text-center">
        <div class="profile" style="background: #fff;">
        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="70" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
        </svg>
        <h5>${category.name}<br><span>${category.description}</span></h5>
        </div>
      </div>
`;
    });
    return previous;
}
})