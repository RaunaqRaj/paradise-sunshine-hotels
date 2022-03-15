<?php
require 'function.php';

if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["add_customer"])) {
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $primary_phone = $_POST["primary_phone"];
            $secondary_phone = $_POST["secondary_phone"];

            $error = array();


            // validate data
            if (empty($first_name)) {
                $error['first_name'] = "First name should not be empty";
            } else if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $first_name)) {
                $error['first_name'] = "First name should be valid";
            }

            if (empty($primary_phone)) {
                $error['primary_phone'] = "Phone number should not be empty";
            }else if (!preg_match("/^[0-9]{10}+$/", $primary_phone)) {
                $error['primary_phone'] = "Phone number should be valid";
            }

            if (empty($secondary_phone)) {
                $error['secondary_phone'] = "Phone number should not be empty";
            }else if (!preg_match("/^[0-9]{10}+$/", $secondary_phone)) {
                $error['secondary_phone'] = "Phone number should be valid";
            }

            if (sizeof($error) > 0) {
                echo json_encode(array("success" => false, "data" => $error));
                die;
            }

            // prevent sql and xss

            $first_name = sql_prevent($conn, xss_prevent($_POST['first_name']));
            $last_name = sql_prevent($conn, xss_prevent($_POST['last_name']));
            $primary_phone = sql_prevent($conn, xss_prevent($_POST['primary_phone']));
            $secondary_phone = sql_prevent($conn, xss_prevent($_POST['secondary_phone']));

            // run sql
            $sql = "INSERT INTO customers(first_name, last_name, primary_phone_number,secondary_phone_number)VALUES('$first_name','$last_name','$primary_phone','$secondary_phone')";

            if ($conn->query($sql) == true) {
                echo json_encode(array("success" => true, "message" => "Customer successfully added!"));
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
