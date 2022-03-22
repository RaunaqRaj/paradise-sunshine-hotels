<?php
require 'function.php';

if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["submit"])) {
           $facility = $_POST['facility'];
           $category = $_POST['category'];
           $heading = $_POST['heading'];
           $description = $_POST['description'];
           $areacode = $_POST['areacode'];
           $location = $_POST['location'];
           $price = $_POST['price'];
            $error = array();

            // validate data
            if (empty($heading)) {
                $error['heading'] = "heading should not be empty";
            } else if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $heading)) {
                $error['heading'] = "heading should be valid";
            }

            if (empty($description)) {
                $error['description'] = "email should not be empty";
            } else if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $description)) {
                $error['description'] = "description should be valid";
            }
            if (empty($areacode)) {
                $error['areacode'] = "areacode should not be empty";
            }else if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $areacode)) {
                $error['areacode'] = "areacode should be valid";
            }

            if (empty($location)) {
                $error['location'] = "location should not be empty";
            }else if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $location)) {
                $error['location'] = "location should be valid";
            }
            if (empty($price)) {
                $error['price'] = "price should not be empty";
            }else if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $price)) {
                $error['price'] = "price should be valid";
            }
            

            if (sizeof($error) > 0) {
                echo json_encode(array("success" => false, "data" => $error));
                die;
            }

            // prevent sql and xss

            $category = sql_prevent($conn, xss_prevent($_POST['category']));
            $facility = sql_prevent($conn, xss_prevent($_POST['facility']));
            $heading = sql_prevent($conn, xss_prevent($_POST['heading']));
            $description = sql_prevent($conn, xss_prevent($_POST['description']));
            $areacode = sql_prevent($conn, xss_prevent($_POST['areacode']));
            $price = sql_prevent($conn, xss_prevent($_POST['price']));
            $location = sql_prevent($conn,$_POST['location']);

            // run sql
            $sql = "INSERT INTO rooms(room_category_id, room_facility_id, heading,description,area_code,location,price)VALUES('$category','$facility','$heading','$description','$areacode','$location','$price')";
            if($conn->query($sql)==true){
            echo json_encode(array("success" => true, "message" => "room added successfully"));
        }
     } else {
            echo json_encode(array("success" => true, "message" => "Sorry! an error occured"));
        }
    }
            
    } else {
        echo json_encode(array("success" => false, "message" => "Method not found"));
    }

