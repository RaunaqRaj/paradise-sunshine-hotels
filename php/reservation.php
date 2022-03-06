<?php
require  'function.php';

if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["contact_submit"])) {

            $name = $_POST["name"];
            $email = $_POST["email"];
            $room = $_POST["room"];
            $checkin = $_POST["checkin"];
            $checkout = $_POST["checkout"];
            $error = array();


            // validate data
            if (empty($name))$error['name']="Name should not be empty";
            else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$name))$error['name']="Name should be valid";
            if (empty($email)) $error['email']="email should not be empty";
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error['email']="email should  be valid";
            if (empty($room)) $error['room']="subject should not be empty";
            if (empty($checkin)) $error['checkin']="Message should not be empty";
            if (empty($checkout)) $error['checkout']="Message should not be empty";
            if (sizeof($error) > 0) {
                echo json_encode(array("success" => false, "data" => $error));
                die;
            }

            // prevent sql and xss

            $name = sql_prevent($conn,xss_prevent($_POST['name']));
            $email = sql_prevent($conn,xss_prevent($_POST['email']));
            $room =sql_prevent($conn,xss_prevent($_POST['room']));
            $checkin =sql_prevent($conn,xss_prevent($_POST['checkin']));
            $checkout =sql_prevent($conn,xss_prevent($_POST['checkout']));
            // run sql

            $sql = "INSERT INTO reservation(name, email, room,checkin,checkout)VALUES('$name','$email','$room','$checkin','$checkout')";

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