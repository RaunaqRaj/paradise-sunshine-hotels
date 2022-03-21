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
            case 'card-list':
                $query = "select payment_card.id,customers.first_name,payment_card.card_number,payment_card.expiry_date from payment_card join customers where payment_card.customer_id = customers.id";
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
            case 'card-delete':
                $id = sql_prevent($conn, xss_prevent($_POST['id']));
                $hash_id = password_hash($id,PASSWORD_DEFAULT);
                $id_decrypt = password_verify($hash_id,$id);
                $check_id = "select id from payment_card where id = $id";
                if($check_id){
                $query = "DELETE FROM payment_card where id='$id'";
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

                case 'card-update':
                //     $id = sql_prevent($conn, xss_prevent($_POST['id']));
                //     $hash_id = password_hash($id,PASSWORD_DEFAULT);
                //     $id_decrypt = password_verify($hash_id,$id);
                //     $first = sql_prevent($conn, xss_prevent($_POST['first']));
                //     $check_id = "select id from payment_card where id = $id";
                //     $error = array();
                //     if (empty($first)) {
                //         $error['first'] = "First name should not be empty";
                //     } else if (preg_match("/^[0-9]+$/", $first)) {
                //         $error['first'] = "First name should be valid";
                //     }
        
                //     if (sizeof($error) > 0) {
                //         echo json_encode(array("success" => false, "data" => $error));
                //         die;
                //     }
                //     if($check_id){
                //     $query = "UPDATE customers SET first_name = '$first' WHERE id ='$id' ";
                //     $query_execute = mysqli_query($conn, $query);
                //     if ($query_execute) {
                //         echo json_encode(array("success" => true, "message" => "Customer details Updated successfully"));
                //         die;
                //     } else {
                //         echo json_encode(array("success" => false, "message" => "Some error Occured"));
                //         die;
                //     }
                // }else{
                //     echo json_encode(array("success" => false, "message" => "Id doesn't exist"));
                //     die;
                // }
            
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
