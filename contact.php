<?php
require  'function.php';

if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["contact_submit"])) {

            $name = $_POST["name"];
            $email = $_POST["email"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];
            $error = array();


            // validate data
            if (empty($name))$error['name']="Name should not be empty";
            else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$name))$error['name']="Name should be valid";
            if (empty($email)) $error['email']="email should not be empty";
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error['email']="email should  be valid";
            if (empty($subject)) $error['subject']="subject should not be empty";
            if (empty($message)) $error['message']="Message should not be empty";
            if (sizeof($error) > 0) {
                echo json_encode(array("success" => false, "data" => $error));
                die;
            }

            // prevent sql and xss

            $name = sql_prevent($conn,xss_prevent($_POST['name']));
            $email = sql_prevent($conn,xss_prevent($_POST['email']));
            $subject =sql_prevent($conn,xss_prevent($_POST['subject']));
            $message =sql_prevent($conn,xss_prevent($_POST['message']));
            // run sql

            $sql = "INSERT INTO informations(name, email, subject,message)VALUES('$name','$email','$subject','$message')";

            if($conn->query($sql)== TRUE){
                echo json_encode(array("success" => true, "message" => "Message has been successfully recieved."));
            }else{
                echo json_encode(array("success" => true, "message" => "Message was not submitted"));
            }

        } else {
            echo json_encode(array("success" => false, "message" => "Method not found"));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Method not found"));
    }
}
?>