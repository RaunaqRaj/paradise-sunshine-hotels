<?php
require 'function.php';

if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["save"])) {
            $first_name = $_POST["first_name"];
            $email = $_POST['email'];
            $last_name = $_POST["last_name"];
            $primary_phone = $_POST["primary_phone"];
            $secondary_phone = $_POST["secondary_phone"];
            $pay_card = $_POST["card"];
            $pay_auth = $_POST["payment_auth"];
            $date= $_POST["expiry_date"];
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
            $pay_auth = sql_prevent($conn, xss_prevent($_POST['payment_auth']));
            $pay_card = sql_prevent($conn, xss_prevent($_POST['card']));
            $date = sql_prevent($conn, xss_prevent($_POST['expiry_date']));
            $cvv = sql_prevent($conn, xss_prevent($_POST['cvv']));

            
            // run sql
            $sql = "INSERT INTO customers(first_name, last_name,email, primary_phone_number,secondary_phone_number)VALUES('$first_name','$last_name','$email','$primary_phone','$secondary_phone')";
            if($conn->query($sql)==true){
                $result = mysqli_query($conn,"select * from customers where email='$email'");
                if($result->num_rows>0){
                    $row = mysqli_fetch_array($result);
                    $customer_id = $row['id'];
                    $sql = "INSERT INTO payment_card(customer_id,card_number, payment_authority,expiry_date,cvv)VALUES('$customer_id','$pay_card','$pay_auth','$date','$cvv')";
                
                if ($conn->query($sql) == true) {
                echo json_encode(array("success" => true, "message" => "Customer Added successfully."));
            } else {
                echo json_encode(array("success" => true, "message" => "Sorry! an error occured"));
            }
                }
            }
            

        } else {
            echo json_encode(array("success" => false, "message" => "Method1 not found"));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Method2 not found"));
    }
}

    ?>

