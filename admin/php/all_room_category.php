<?php

include 'function.php';

if (!user_check($conn)) {
    echo json_encode(array("success" => false, "message" => "User not logged in"));
    die;
}
if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_POST['submit'])) {
            echo json_encode(array("success" => false, "message" => "Method not found"));
            die;
        }
        $submit = $_POST['submit'];
        $submit = sql_prevent($conn, xss_prevent($_POST['submit']));

        switch ($submit) {
            case 'category-list':
                $query = "select id,name,description,created_at from room_categories";
                $query_execute = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_execute) > 0) {
                    $data = array();
                    while ($result = mysqli_fetch_assoc($query_execute)) {
                        $data[] = $result;
                    }
                    echo json_encode(array("success" => true, "data" => $data));
                } else {
                    echo json_encode(array("success" => false, "data" => "No information found!"));
                }

                break;

                case 'category-add':
                    $categories = $_POST['category'];
                    $description = $_POST['description'];
                   $query = "INSERT INTO room_categories(name,description)VALUES('$categories','$description')";
                   if($conn->query($query)== TRUE){
                    echo json_encode(array("success" => true, "message" => "Room Category successfully added!"));
                }else{
                    echo json_encode(array("success" => true, "message" => "Sorry! some error occured"));
                }
                    break;

            case 'category-delete':
                $id = sql_prevent($conn, xss_prevent($_POST['id']));
                $query = "DELETE FROM room_categories where id='$id'";
                $query_execute = mysqli_query($conn, $query);
                if ($query_execute) {
                    echo json_encode(array("success" => true, "message" => "Category Deleted successfully"));
                } else {
                    echo json_encode(array("success" => false, "message" => "Some error Occured"));
                }
                break;

                case 'category-update':
                    $id = sql_prevent($conn, xss_prevent($_POST['id']));
                    $hash_id = password_hash($id,PASSWORD_DEFAULT);
                    $id_decrypt = password_verify($hash_id,$id);
                    $first = sql_prevent($conn, xss_prevent($_POST['name']));
                    $description = sql_prevent($conn, xss_prevent($_POST['description']));
                    $check_id = "select id from room_categories where id = $id";
                    $error = array();
                    if (empty($first)) {
                        $error['name'] = "Category should not be empty";
                    } else if (preg_match("/^[0-9]+$/", $first)) {
                        $error['name'] = "Category should be valid";
                    }
                    if (empty($description)) {
                        $error['description'] = "Description should not be empty";
                    } else if (preg_match("/^[0-9]+$/", $description)) {
                        $error['description'] = "Description should be valid";
                    }
        
                    if (sizeof($error) > 0) {
                        echo json_encode(array("success" => false, "data" => $error));
                        die;
                    }
                    if($check_id){
                    $query = "UPDATE room_categories SET name = '$first', description='$description' WHERE id ='$id' ";
                    $query_execute = mysqli_query($conn, $query);
                    if ($query_execute) {
                        echo json_encode(array("success" => true, "message" => "category  Updated successfully"));
                        die;
                    } else {
                        echo json_encode(array("success" => false, "message" => "Some error Occured"));
                        die;
                    }
                }else{
                    echo json_encode(array("success" => false, "message" => "Id doesn't exist"));
                    die;
                }
            
                    break;

            default:
                echo json_encode(array("success" => false, "message" => "Method not found"));
                die;
                break;
        }

    } else {
        echo json_encode(array("success" => false, "message" => "Method not found"));
    }
}
