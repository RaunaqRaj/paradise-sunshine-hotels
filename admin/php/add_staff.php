<?php
require 'function.php';

if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["add"])) {
            $designation = $_POST["designation"];
            $description = $_POST["description"];
            $error = array();
            // validate data
            if (empty($designation)) {
                $error['designation'] = "Designation should not be empty";
            } else if (preg_match("/^[0-9]+$/", $designation)) {
                $error['designation'] = "Designation should be valid";
            }
            if (empty($description)) {
                $error['description'] = "Description should not be empty";
            } else if (preg_match("/^[0-9]+$/", $description)) {
                $error['description'] = "Description should be valid";
            }

            if (sizeof($error) > 0) {
                echo json_encode(array("success" => false, "data" => $error));
                die;
            }

            // prevent sql and xss
            $designation = sql_prevent($conn, xss_prevent($_POST['designation']));
            $description = sql_prevent($conn, xss_prevent($_POST['description']));
            // run sql
            $sql = "INSERT INTO staff_types(designation,info)VALUES('$designation','$description')";
            // print_r($conn);
            // die;
            if ($conn->query($sql) == true) {
                echo json_encode(array("success" => true, "message" => "Staff Type successfully added!"));
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
