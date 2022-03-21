<?php
require 'function.php';

if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["save"])) {
            $iv = openssl_random_pseudo_bytes(16);
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $name = $_POST["name"];
            $e_mail = $_POST["e-mail"];
            $phone = $_POST["phone"];
            $error = array();

            $new_iv = bin2hex($iv);

            // validate data
            if (empty($username)) {
                $error['username'] = "username should not be empty";
            } else if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $username)) {
                $error['username'] = "username should be valid";
            }

            if (empty($email)) {
                $error['email'] = "email should not be empty";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "email should  be valid";
            }
            if (empty($e_mail)) {
                $error['e-mail'] = "email should not be empty";
            } else if (!filter_var($e_mail, FILTER_VALIDATE_EMAIL)) {
                $error['e-mail'] = "email should  be valid";
            }

            if (empty($password)) {
                $error['password'] = "password should not be empty";
            }

            if (sizeof($error) > 0) {
                echo json_encode(array("success" => false, "data" => $error));
                die;
            }

            // prevent sql and xss

            $username = sql_prevent($conn, xss_prevent($_POST['username']));
            $email = sql_prevent($conn, xss_prevent($_POST['email']));
            $password = sql_prevent($conn, xss_prevent($_POST['password']));
            $name = sql_prevent($conn, xss_prevent($_POST['name']));
            $e_mail = sql_prevent($conn, xss_prevent($_POST['e-mail']));
            $phone = sql_prevent($conn, xss_prevent($_POST['phone']));
            //check user email if it exists or not
            $user_search = "select * from users where email='$email'";
            $query = mysqli_query($conn, $user_search);
            $user_count = mysqli_num_rows($query);

            if ($user_count > 0) {
                echo json_encode(array("success" => false, "data" => array("email" => "E-mail already exists")));
                die;
            }
   
            //encryption of password
            $hash = encryption($password, $iv);

            // run sql
            $sql = "INSERT INTO users(username, email, password,iv)VALUES('$username','$email','$hash','$new_iv')";
            if($conn->query($sql)==true){
                $result = mysqli_query($conn,"select * from users where email='$email'");
                if($result->num_rows>0){
                    $row = mysqli_fetch_array($result);
                    $user_id = $row['id'];
                    $sql = "INSERT INTO staffs(user_id,name, email,phone_number)VALUES('$user_id','$name','$e_mail','$phone')";
                
                if ($conn->query($sql) == true) {
                echo json_encode(array("success" => true, "message" => "Staff Added successfully."));
            } else {
                echo json_encode(array("success" => true, "message" => "Sorry! an error occured"));
            }
                }
            }
            

            

            //add approve section value : boolean

            // if ($conn->query($sql) == true) {
            //     echo json_encode(array("success" => true, "message" => "Hello $username you are successfully registered and you can login now."));
            // } else {
            //     echo json_encode(array("success" => true, "message" => "Sorry! an error occured"));
            // }

        } else {
            echo json_encode(array("success" => false, "message" => "Method not found"));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Method not found"));
    }
}
