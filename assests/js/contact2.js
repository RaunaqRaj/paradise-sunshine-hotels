//ajax request for data insertion
$(document).ready(function(){

    $('#username').hide();
    $('#useremail').hide();
    $('#subjects').hide();
    $('#usermessage').hide();

    var user_err = true;
    var email_err = true;
    var subject_err = true;
    var message_err = true;

$("#myform").on("submit",function(e){

    e.preventDefault();
    let name = $("#name").val();

    if(name.length==''){
        $('#username').show();
        $('#username').html("please fill the name");
        $('#username').css("color","red");
    }else{
       
    }

    let email = $("#email").val();
    if(email.length==''){
        $('#useremail').show();
        $('#useremail').html("please fill the email");
        $('#useremail').css("color","red");
    }else{

    }
    
    let subject = $("#subject").val();
    if(subject.length==''){
        $('#subjects').show();
        $('#subjects').html("please describe the subject");
        $('#subjects').css("color","red");
    }else{

    }
    let message = $("#message").val();
    if(message.length==''){
        $('#usermessage').show();
        $('#usermessage').html("please provide a message");
        $('#usermessage').css("color","red");
    }else{

    }
   

    // console.log(name);
    // console.log(email);
    // console.log(subject);
    // console.log(message);

    mydata = {name:name, email:email, subject:subject, message:message};

    $.ajax({

        url : 'contactcode.php',
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
});