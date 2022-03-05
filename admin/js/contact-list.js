displaydata();
function displaydata(){
$.ajax({

    url : 'php/contact-list.php',
    type : 'post',

    success : function(contactdata){
        $('#data').html(contactdata);
    }

});
}