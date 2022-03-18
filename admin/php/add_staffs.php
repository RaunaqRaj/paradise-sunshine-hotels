<?php
require 'function.php';

if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["add_staff"])) {
            $user_id = $_POST['user_id'];
            $name = $_POST["name"];
            $email = $_POST['email'];
            $phone = $_POST["phno"];
            $error = array();


            // validate data
            if (empty($name)) {
                $error['name'] = "Name should not be empty";
            } else if (preg_match("/^[0-9]+$/", $name)) {
                $error['name'] = "Name should be valid";
            }
            if (empty($email)) {
                $error['email'] = "Email should not be empty";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email should be valid";
            }

            if (empty($phone)) {
                $error['phno'] = "Phone number should not be empty";
            }else if (!preg_match("/^[0-9]{10}+$/", $phone)) {
                $error['phno'] = "Phone number should be valid";
            }

            if (sizeof($error) > 0) {
                echo json_encode(array("success" => false, "data" => $error));
                die;
            }

            // prevent sql and xss
            $user_id = sql_prevent($conn, xss_prevent($_POST['user_id']));
            $name = sql_prevent($conn, xss_prevent($_POST['name']));
            $email = sql_prevent($conn, xss_prevent($_POST['email']));
            $phone = sql_prevent($conn, xss_prevent($_POST['phno']));
           
            // run sql
            $sql = "INSERT INTO staffs(user_id,name,email,phone_number)VALUES('$user_id','$name','$email','$phone')";
            if ($conn->query($sql)==true) {
                echo json_encode(array("success" => true, "message" => "Staff successfully added!"));
            } else {
                echo json_encode(array("success" => true, "message" => "Sorry! an error occured"));
            }
        } else {
            echo json_encode(array("success" => false, "message" => "Method not found"));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Method not found"));
    }
}
