$("#loader").show();
$("#example").hide();
$("#previous_loader").show();
$(document).ready(function () {
    $("#loader").hide();
    $("#example").show();
    $("#previous_loader").hide();
    getdata();
    //delete modal//
    $('#delete').click(function(e){
        e.preventDefault();
        var id = $('#contact_delete').val();
        var page = "contact-table.php";
         $.ajax({
        url: "php/contact-list.php",
        type: "POST",
        dataType: "json",
        data:{ submit: 'contact-delete', id: id},
           success: function(response){
               $('#exampleModal').modal('hide');
               if(response.success===true){
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
                  if(page=="contact-table.php"){
                    getdata();
                  }else{
                getpreviousdata();
                  }
               }else{
                Toastify({
                    text: response.message,
                    className: "info",
                    style: {
                    background: "#ff4e21",
                    }
                  }).showToast();
               }
               
           }
           
        });
    });
     $(document).on( 'click', '.delete', function () {
        var id =$(this).attr('data-id');
        $('#contact_delete').val(id);
        $("#exampleModal").modal('show');
});

    //message modal//
    $('#example tbody').on( 'click', '.select', function () {

        var id =$(this).attr('data-id');

        $.ajax({
        url: "php/contact-list.php",
        type: "POST",
        dataType: "json",
        data:{ submit: 'contact-message', id: id},
           success: function(response){
               if(response.success){
                   $("#message").text(response.data[0].message);
               }
           }
        });
});


   //contact-list Table//
   function getdata(){
    output = "";
    output_error = "";

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
   
    });

   }

   function get_contact_list_html(contacts){
    previous = "";
    contacts.forEach((contact, index) => {
        previous += `
        <tr>
        <td class="user_id">${index+1}</td>
        <td><a href='contact-view.php?contact=${contact.id}'><style>a{
            color : black;
        }
        a:hover{
            color : blue;
        }
        </style>
        ${contact.name}</td>
        <td>${contact.email}</td>
        <td>${contact.subject}</td>
        <td>
        <button id='message' data-id=${contact.id} class='btn btn-outline-primary select mt-2 mx-1' name = "messagebutton" style=' color: #000;' data-bs-toggle='modal' data-bs-target='#MessageModal'><i class='fa-solid fa-envelope'></i></button><button class='btn  mt-3 mx-1 mb-2 btn-outline-success' style='color: #000;'data-bs-toggle='modal' data-bs-target='#ReplyModal' data-bs-whatever='@getbootstrap'><i class='fa-solid fa-reply'></i></button><button data-id=${contact.id} class='btn  btn-outline-danger delete mt-2 mx-1' style=' color: #000;'><i class='fa-solid fa-trash'></i></button>
        </td>
    </tr>
`;
    });
    return previous;
   }

    getpreviousdata();
    function getpreviousdata(){
    $("#previous-contacts").on("click", function () {
       
        previous_error = "";
        $.ajax({
            url: "php/contact-list.php",
            type: "POST",
            dataType: "json",
            data: { submit: 'contact-previous', email: contact_email },
            success: function (response) {
                if (response.success) {
                 var contact_list =  get_contact_list_html(response.data);
                
                    $("#previous_data").html(contact_list);
                } else {
                    previous_error +=`
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
                    $("#nodata").html(previous_error);
                }
            },
            error: function (error) {
                error = "some error occured";
            }
        });
    
    });
}
});



