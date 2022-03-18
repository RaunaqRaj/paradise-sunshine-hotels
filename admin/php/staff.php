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
            case 'staff-list':
                $query = "select staffs.id,users.username,staffs.name,staffs.email,staffs.phone_number from staffs join users on staffs.user_id = users.id";
                $query_execute = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_execute) > 0) {
                    $data = array();
                    $result = mysqli_fetch_array($query_execute , MYSQLI_ASSOC);
                    while ($result = mysqli_fetch_array($query_execute)) {
                        $data[] = $result;
                    }
                    echo json_encode(array("success" => true, "data" => $data));
                } 
            else {
                    echo json_encode(array("success" => false, "data" => "No information found!"));
                }

                break;
            case 'staff-delete':
                $id = sql_prevent($conn, xss_prevent($_POST['id']));
                $hash_id = password_hash($id,PASSWORD_DEFAULT);
                $id_decrypt = password_verify($hash_id,$id);
                $check_id = "select id from staffs where id = $id";
                if($check_id){
                $query = "DELETE FROM staffs where id='$id'";
                $query_execute = mysqli_query($conn, $query);
                if ($query_execute) {
                    echo json_encode(array("success" => true, "message" => "Staff Deleted successfully"));
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

                case 'staff-update':
                    $id = sql_prevent($conn, xss_prevent($_POST['id']));
                    $hash_id = password_hash($id,PASSWORD_DEFAULT);
                    $id_decrypt = password_verify($hash_id,$id);
                    $phone = sql_prevent($conn, xss_prevent($_POST['phone_number']));
                    $check_id = "select id from staffs where id = $id";
                    $error = array();
                    if (empty($phone)) {
                        $error['phone_number'] = "phone number should not be empty";
                    } else if (!preg_match("/^[0-9]+$/", $phone)) {
                        $error['phone_number'] = "phone number should be valid";
                    }
                    if (sizeof($error) > 0) {
                        echo json_encode(array("success" => false, "data" => $error));
                        die;
                    }
                    if($check_id){
                    $query = "UPDATE staffs SET phone_number = '$phone' WHERE id ='$id' ";
                    $query_execute = mysqli_query($conn, $query);
                    if ($query_execute) {
                        echo json_encode(array("success" => true, "message" => "Staff details Updated successfully"));
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
