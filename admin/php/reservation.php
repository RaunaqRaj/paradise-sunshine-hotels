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
            case 'reservation-update':
                $quantity = $_POST['quantity'];
                $id = sql_prevent($conn, xss_prevent($_POST['id']));
                $query = "UPDATE reservation SET quantity = '$quantity' WHERE id ='$id' ";
                $query_execute = mysqli_query($conn, $query);
                if ($query_execute) {
                    echo json_encode(array("success" => true, "message" => "Quantity Updated successfully"));
                } else {
                    echo json_encode(array("success" => false, "message" => "Some error Occured"));
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
