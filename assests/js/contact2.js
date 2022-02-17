//ajax request for data insertion

$("#btn").click(function(e){

    e.preventDefault();
    let name = $("#name").val();
    let email = $("#email").val();
    let subject = $("#subject").val();
    let message = $("#message").val();

    // console.log(name);
    // console.log(email);
    // console.log(subject);
    // console.log(message);

    mydata = {name:name, email:email, subject:subject, message:message};

    $.ajax({

        url : "contactcode.php",
        method : "POST",
        data : JSON.stringify(mydata),
        success : function(data){
            // console.log(data);

            msg = "<div  class='alert alert-warning alert-dismissible fade show' role='alert'>                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>"+data+"</div>";
            $("#msg").html(msg);

            $("#myform")[0].reset();
        },

    })

})