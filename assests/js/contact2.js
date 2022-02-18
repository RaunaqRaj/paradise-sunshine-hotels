//ajax request for data insertion

$("#myform").submit(function(e){

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

            msg = "<p>"+data+"</p>";
            $("#msg").html(msg);

            $("#myform")[0].reset();
        },

    })

})