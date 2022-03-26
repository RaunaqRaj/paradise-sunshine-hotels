<?php

include 'function.php';
if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
$room = $_POST['room'];

if($_FILES['image']['name'] != ''){
    $file = $_FILES['image']['name'];

    $extension = pathinfo($file,PATHINFO_EXTENSION);
    $valid_extensions = array("jpg","svg","jpeg","png");
    $error = array("size" => "Your file size is too large");
    if ($_FILES['image']['size'] <= 1000000) {
    if(in_array($extension,$valid_extensions)){
        $new_name = rand().".".$extension;
        $path = 'C:/xampp1/htdocs/Nukepin-projects/paradise-hotels/admin/image/' . $new_name;
        $sql = "INSERT INTO room_image(room_id,image)VALUES('$room','$new_name')";
        if ($conn->query($sql) == true) {
        if(move_uploaded_file($_FILES['image']['tmp_name'],$path)){
            echo json_encode(array("success" => true, "message" => "File successfully uploaded"));       
         }else{
            echo json_encode(array("success" => false, "message" => "Some error Occured"));       
         }
        }
    }else{
        echo json_encode(array("success" => false, "message" => "Invalid File Type"));       
    }
}else{
    echo json_encode(array("success" => false, "message" => "File too large"));        
}
}
} else {
    echo json_encode(array("success" => false, "message" => "Method not found"));
}

?>