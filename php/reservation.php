<?php
require  'function.php';

if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["save"])) {
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["email"];
            $primary_phone_number = $_POST["primary_phone"];
            $secondary_phone_number = $_POST["secondary_phone"];
            $transaction_id = $_POST["transaction_id"];
            $payment_mode = $_POST["payment_mode"];
            $bank = $_POST["bank"];
            $room = $_POST["room"];
            $quantity = $_POST["quantity"];
            $checkin = $_POST["checkin"];
            $checkout = $_POST["checkout"];
            $error = array();


            // validate data
            if (empty($first_name)) {
                $error['first_name'] = "First name should not be empty";
            } else if (preg_match("/^[0-9]+$/", $first_name)) {
                $error['first_name'] = "First name should be valid";
            }
            if (empty($transaction_id)) {
                $error['transaction_id'] = "transaction_idshould not be empty";
            }
            if (empty($payment_mode)) {
                $error['payment_mode'] = "payment_mode should not be empty";
            } else if (preg_match("/^[0-9]+$/", $payment_mode)) {
                $error['payment_mode'] = "payment_mode should be valid";
            }
            if (empty($bank)) {
                $error['bank'] = "bank name should not be empty";
            } else if (preg_match("/^[0-9]+$/", $bank)) {
                $error['bank'] = "bank name should be valid";
            }
            if (empty($quantity)) {
                $error['quantity'] = "quantity should not be empty";
            } else if (preg_match("/^[0-9]+$/", $bank)) {
                $error['quantity'] = "quantity should be valid";
            }
            if (empty($email)) {
                $error['email'] = "Email should not be empty";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email should be valid";
            }
            if (empty($quantity)) {
                $error['quantity'] = "quantity should not be empty";
            }
            // if (empty($primary_phone)) {
            //     $error['primary_phone'] = "Phone number should not be empty";
            // }else if (!preg_match("/^[0-9]{10}+$/", $primary_phone)) {
            //     $error['primary_phone'] = "Phone number should be valid";
            // }

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
            $bank = sql_prevent($conn, xss_prevent($_POST['bank']));
            $transaction_id = sql_prevent($conn, xss_prevent($_POST['transaction_id']));
            $payment_mode = sql_prevent($conn, xss_prevent($_POST['payment_mode']));            
            $room =sql_prevent($conn,xss_prevent($_POST['room']));
            $quantity =sql_prevent($conn,xss_prevent($_POST['quantity']));
            $checkin =sql_prevent($conn,xss_prevent($_POST['checkin']));
            $checkout =sql_prevent($conn,xss_prevent($_POST['checkout']));
            // run sql

            $sql = "INSERT INTO customers(first_name, last_name,email, primary_phone_number,secondary_phone_number)VALUES('$first_name','$last_name','$email','$primary_phone','$secondary_phone')";
            if($conn->query($sql)==true){
                $result = mysqli_query($conn,"select * from customers where email='$email'");
                if($result->num_rows>0){
                    $row = mysqli_fetch_array($result);
                    $customer_id = $row['id'];
                    $sql = "INSERT INTO payment(customer_id,transaction_number, mode_of_payments,bank)VALUES('$customer_id','$transaction_id','$payment_mode','$bank')";
                    if($conn->query($sql)==true){
                        $sql = "INSERT INTO reservation(customer_id,room, quantity,checkin,checkout	)VALUES('$customer_id','$room','$quantity','$checkin','$checkout')";
                        if ($conn->query($sql) == true) {
                            echo json_encode(array("success" => true, "message" => "Reservation successfull."));
                        } else {
                            echo json_encode(array("success" => true, "message" => "Sorry! an error occured"));
                        }
                    }
                }
            }

        } else {
            echo json_encode(array("success" => false, "message" => "Method not found"));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Method not found"));
    }
}
?>