<?php
require 'function.php';

if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["add_customer"])) {
            $first_name = $_POST["first_name"];
            $email = $_POST['email'];
            $last_name = $_POST["last_name"];
            $primary_phone = $_POST["primary_phone"];
            $secondary_phone = $_POST["secondary_phone"];
            $pay_card = $_POST["pay_card"];
            $pay_auth = $_POST["pay_auth"];
            $date= $_POST["date"];
            $cvv = $_POST["cvv"];

            $error = array();


            // validate data
            if (empty($first_name)) {
                $error['first_name'] = "First name should not be empty";
            } else if (preg_match("/^[0-9]+$/", $first_name)) {
                $error['first_name'] = "First name should be valid";
            }
            if (empty($pay_auth)) {
                $error['pay_auth'] = "Payment Authority should not be empty";
            } else if (preg_match("/^[0-9]+$/", $pay_auth)) {
                $error['pay_auth'] = "Payment Authority should be valid";
            }
            if (empty($cvv)) {
                $error['cvv'] = "CVV should not be empty";
            } else if (!preg_match("/^[0-9]+$/", $cvv)) {
                $error['cvv'] = "CVV should be valid";
            }
            if (empty($pay_card)) {
                $error['pay_card'] = "Card Number should not be empty";
            } else if (!preg_match("/^[0-9]+$/", $pay_card)) {
                $error['pay_card'] = "Card Number should be valid";
            }
            if (empty($email)) {
                $error['email'] = "Email should not be empty";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email should be valid";
            }

            if (empty($primary_phone)) {
                $error['primary_phone'] = "Phone number should not be empty";
            }else if (!preg_match("/^[0-9]{10}+$/", $primary_phone)) {
                $error['primary_phone'] = "Phone number should be valid";
            }

            if (sizeof($error) > 0) {
                echo json_encode(array("success" => false, "data" => $error));
                die;
            }

            // prevent sql and xss

            $first_name = sql_prevent($conn, xss_prevent($_POST['first_name']));
            $last_name = sql_prevent($conn, xss_prevent($_POST['last_name']));
            $email = sql_prevent($conn, xss_prevent($_POST['email']));
            $primary_phone = sql_prevent($conn, xss_prevent($_POST['primary_phone']));
            $secondary_phone = sql_prevent($conn, xss_prevent($_POST['secondary_phone']));
            $pay_auth = sql_prevent($conn, xss_prevent($_POST['pay_auth']));
            $date = sql_prevent($conn, xss_prevent($_POST['date']));
            $cvv = sql_prevent($conn, xss_prevent($_POST['cvv']));

            
            // run sql
            $sql = "INSERT INTO customers(first_name, last_name,email, primary_phone_number,secondary_phone_number)VALUES('$first_name','$last_name','$email','$primary_phone','$secondary_phone')";
            $sql2= "INSERT INTO payment_card(card_number,payment_authority,expiry_date,cvv)VALUES('$pay_card','$pay_auth','$date','$cvv')";
            if ($conn->query($sql) == true) {
                if($conn->query($sql2)==true){
                echo json_encode(array("success" => true, "message" => "Customer successfully added!"));
            } else {
                echo json_encode(array("success" => true, "message" => "Sorry! an error occured"));
            }
        }else{
            echo json_encode(array("success" => true, "message" => "Sorry! an error occured"));  
        }
        } else {
            echo json_encode(array("success" => false, "message" => "Method not found"));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Method not found"));
    }
}
