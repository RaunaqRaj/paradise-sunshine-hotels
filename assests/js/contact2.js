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
        $('#username').text("please fill the name");
        $('#username').css("color","red");
    }else{
       $('#username').hide();
    }

    let email = $("#email").val();
    if(email.length==''){
        $('#useremail').show();
        $('#useremail').text("please fill the email");
        $('#useremail').css("color","red");
    }else{

    }
    
    let subject = $("#subject").val();
    if(subject.length==''){
        $('#subjects').show();
        $('#subjects').text("please describe the subject");
        $('#subjects').css("color","red");
    }else{

    }
    let message = $("#message").val();
    if(message.length==''){
        $('#usermessage').show();
        $('#usermessage').text("please provide a message");
        $('#usermessage').css("color","red");
    }else{

    }
   
    
  

    // console.log(name);
    // console.log(email);
    // console.log(subject);
    // console.log(message);



    $.ajax({

        url : 'contactcode.php',
        method : "POST",
        data : $('#myform').serialize(),

        success : function(data){
            $('#msg').fadeIn();
            $('#msg').html(data);
            setTimeout(function(){
                $('#msg').fadeOut(slow);
            },4000);
            $('#myform')[0].reset();
        } ,       

        error : function(data){
            $('#err').fadeIn();
            $('#err').html(data);
        }
    })

})

});