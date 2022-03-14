<?php
require  'function.php';

if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["contact_submit"])) {

            $room = $_POST["room"];
            $checkin = $_POST["checkin"];
            $checkout = $_POST["checkout"];
            $error = array();


            // validate data
            if (empty($room)) $error['room']="Room should not be empty";
            if (empty($checkin)) $error['checkin']="check-in should not be empty";
            if (empty($checkout)) $error['checkout']="check-out should not be empty";
            if (sizeof($error) > 0) {
                echo json_encode(array("success" => false, "data" => $error));
                die;
            }

            // prevent sql and xss

            $room =sql_prevent($conn,xss_prevent($_POST['room']));
            $checkin =sql_prevent($conn,xss_prevent($_POST['checkin']));
            $checkout =sql_prevent($conn,xss_prevent($_POST['checkout']));
            // run sql

            $sql = "INSERT INTO reservation(room,checkin,checkout)VALUES('$room','$checkin','$checkout')";

            if($conn->query($sql)== TRUE){
                echo json_encode(array("success" => true, "message" => "Hello $name your reservation request is recieved."));
            }else{
                echo json_encode(array("success" => true, "message" => "Sorry! some error occured"));
            }

        } else {
            echo json_encode(array("success" => false, "message" => "Method not found"));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Method not found"));
    }
}
?>