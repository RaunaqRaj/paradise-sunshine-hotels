<?php
require 'function.php';

if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["submit"])) {
            if (isset($_POST["username"])) {
                if (isset($_POST["email"])) {
                    if (isset($_POST["password"])) { 
            $iv = openssl_random_pseudo_bytes(16);
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
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

            //add approve section value : boolean

            if ($conn->query($sql) == true) {
                echo json_encode(array("success" => true, "message" => "Hello $username you are successfully registered and you can login now."));
            } else {
                echo json_encode(array("success" => true, "message" => "Sorry! an error occured"));
            }
        } else {
            echo json_encode(array("success" => false, "data" => array("password" => "Password Is Required")));
            die;
        }
    } else {
            echo json_encode(array("success" => false, "data" => array("email" => "Email Is Required")));
            die;
        }
    } else {
            echo json_encode(array("success" => false, "data" => array("username" => "Username Is Required")));
            die;
        }
        } else {
            echo json_encode(array("success" => false, "message" => "Method not found"));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Method not found"));
    }
}
