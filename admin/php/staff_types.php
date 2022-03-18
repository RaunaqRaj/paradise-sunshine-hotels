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
            case 'staff_types-list':
                $query = "select id,designation,info,created_at from staff_types";
                $query_execute = mysqli_query($conn, $query);
 
                if (mysqli_num_rows($query_execute) > 0) {
                    $data = array();
                    $result = mysqli_fetch_array($query_execute , MYSQLI_ASSOC);
                    while ($result = mysqli_fetch_array($query_execute)) {
                        $data[] = $result;
                    }
                    echo json_encode(array("success" => true, "data" => $data));
                } else {
                    echo json_encode(array("success" => false, "data" => "No information found!"));
                }

                break;
                case 'staff_types-delete':
                    $id = sql_prevent($conn, xss_prevent($_POST['id']));
                    $hash_id = password_hash($id,PASSWORD_DEFAULT);
                    $id_decrypt = password_verify($hash_id,$id);
                    $check_id = "select id from staff_types where id = $id";
                    if($check_id){
                    $query = "DELETE FROM staff_types where id='$id'";
                    $query_execute = mysqli_query($conn, $query);
                    if ($query_execute) {
                        echo json_encode(array("success" => true, "message" => "Record Deleted successfully"));
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

                case 'staff_type-update':
                    $id = sql_prevent($conn, xss_prevent($_POST['id']));
                    $hash_id = password_hash($id,PASSWORD_DEFAULT);
                    $id_decrypt = password_verify($hash_id,$id);
                    $designation = sql_prevent($conn, xss_prevent($_POST['designation']));
                    $description = sql_prevent($conn, xss_prevent($_POST['description']));
                    $check_id = "select id from staff_types where id = $id";
                    $error = array();
                    if (empty($designation)) {
                        $error['designation'] = "Designation should not be empty";
                    } else if (preg_match("/^[0-9]+$/", $designation)) {
                        $error['designation'] = "Designation should be valid";
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
                    $query = "UPDATE staff_types SET designation = '$designation',info = '$description' WHERE id ='$id' ";
                    $query_execute = mysqli_query($conn, $query);
                    if ($query_execute) {
                        echo json_encode(array("success" => true, "message" => "Description Updated successfully"));
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
                echo json_encode(array("success" => false, "message" => "Method1 not found"));
                die;
                break;
        }

    } else {
        echo json_encode(array("success" => false, "message" => "Method2 not found"));
    }
}
