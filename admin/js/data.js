$.ajax({
    url: "php/contact-list.php",
    type: "POST",
    dataType: "json",
    data: { submit: 'contact-list' },
    success: function (response) {
        if (response.success) {
      var output= get_contact_list_html(response.data);
            $("#contact-data").html(output);
        } else {
            output_error +=`
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

})