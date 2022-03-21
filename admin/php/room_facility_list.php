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
            case 'facility-list':
                $query = "select id,name,price,created_at from room_facility_lists";
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

                case 'facility-add':
                    $facility = sql_prevent($conn, xss_prevent($_POST['facility']));
                    $price = sql_prevent($conn, xss_prevent($_POST['price']));
                   $query = "INSERT INTO room_facility_lists(name,price)VALUES('$facility','$price')";
                   if($conn->query($query)== TRUE){
                    echo json_encode(array("success" => true, "message" => "Room Facility successfully added!"));
                }else{
                    echo json_encode(array("success" => true, "message" => "Sorry! some error occured"));
                }
                    break;

            case 'facility-delete':
                $id = sql_prevent($conn, xss_prevent($_POST['id']));
                $query = "DELETE FROM room_facility_lists where id='$id'";
                $query_execute = mysqli_query($conn, $query);
                if ($query_execute) {
                    echo json_encode(array("success" => true, "message" => "Category Deleted successfully"));
                } else {
                    echo json_encode(array("success" => false, "message" => "Some error Occured"));
                }
                break;

                case 'facility-update':
                    $id = sql_prevent($conn, xss_prevent($_POST['id']));
                    $hash_id = password_hash($id,PASSWORD_DEFAULT);
                    $id_decrypt = password_verify($hash_id,$id);
                    $facility = sql_prevent($conn, xss_prevent($_POST['facility']));
                    $price = sql_prevent($conn, xss_prevent($_POST['price']));
                    $check_id = "select id from room_facility_lists where id = $id";
                    $error = array();
                    if (empty($facility)) {
                        $error['facility'] = "Facility should not be empty";
                    } else if (preg_match("/^[0-9]+$/", $facility)) {
                        $error['facility'] = "Facility should be valid";
                    }
                    if (empty($price)) {
                        $error['price'] = "Price should not be empty";
                    } else if (!preg_match("/^[0-9]+$/", $price)) {
                        $error['price'] = "Price should be valid";
                    }
        
                    if (sizeof($error) > 0) {
                        echo json_encode(array("success" => false, "data" => $error));
                        die;
                    }
                    if($check_id){
                    $query = "UPDATE room_facility_lists SET name = '$facility',price = '$price' WHERE id ='$id' ";
                    $query_execute = mysqli_query($conn, $query);
                    if ($query_execute) {
                        echo json_encode(array("success" => true, "message" => "facility  Updated successfully"));
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
