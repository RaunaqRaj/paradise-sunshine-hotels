    $.ajax({

        url : 'php/contact-list.php',
        type : 'post',
        dataType : 'JSON',
        success : function(data){
            for(var i=0; i<=data.length;i++){
                $("#data").append('<tr><td>'+data[i].id+'</td>'+'<td>'+data[i].name+'</td>'+'<td>'+data[i].email+'</td>'+'<td>'+data[i].subject+'</td>'+'<td>'+"<button class='btn btn-outline-success mt-2 mx-2' style=' color: #000;' data-bs-toggle='modal' data-bs-target='#MessageModal'><i class='fa-solid fa-envelope'></i></button><button class='btn mt-3 mx-2 mb-2 btn-outline-success' style='color: #000;'data-bs-toggle='modal' data-bs-target='#ReplyModal' data-bs-whatever='@getbootstrap'><i class='fa-solid fa-reply'></i></button><button class='btn btn-outline-danger mt-2 mx-2' style=' color: #000;' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa-solid fa-trash'></i></button>"
                +'</td>');
            }  
        }         
    });

