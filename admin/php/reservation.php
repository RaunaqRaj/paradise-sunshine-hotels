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
            case 'reservation-list':
                $query = "select reservation.id,customers.first_name,rooms.heading,reservation.checkin,reservation.checkout,reservation.quantity from reservation join customers on reservation.customer_id=customers.id join rooms on reservation.room=rooms.id";
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
            case 'reservation-delete':
                $id = sql_prevent($conn, xss_prevent($_POST['id']));
                $hash_id = password_hash($id,PASSWORD_DEFAULT);
                $id_decrypt = password_verify($hash_id,$id);
                $check_id = "select id from reservation where id = $id";
                if($check_id){
                $query = "DELETE FROM reservation where id='$id'";
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

            default:
                echo json_encode(array("success" => false, "message" => "Method not found"));
                die;
                break;
        }

    } else {
        echo json_encode(array("success" => false, "message" => "Method not found"));
    }
}
