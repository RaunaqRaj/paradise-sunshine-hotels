<?php

include 'function.php';

if (!user_check($conn)) {
    echo json_encode(array("success" => false, "message" => "User not logged in"));
    die;
}
if ($_SERVER['SERVER_NAME'] == constant("SERVER_NAME")) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_POST['submit'])) {
            echo json_encode(array("success" => false, "message" => "Method not found"));
            die;
        }
        $submit = $_POST['submit'];
        $submit = sql_prevent($conn, xss_prevent($_POST['submit']));

        switch ($submit) {
            case 'customer-list':
                $query = "select id,first_name,last_name,primary_phone_number,secondary_phone_number,created_at from customers";
                $query_execute = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_execute) > 0) {
                    $data = array();
                    $result = mysqli_fetch_array($query_execute , MYSQLI_ASSOC);
                    while ($result = mysqli_fetch_array($query_execute)) {
                        $data[] = $result;
                    }
                    echo json_encode(array("success" => true, "data" => $data));
                } else {
                    echo json_encode(array("success" => false, "data" => "No information found!"));
                }

                break;
            case 'customer-delete':
                $id = sql_prevent($conn, xss_prevent($_POST['id']));
                $query = "DELETE FROM customers where id='$id'";
                $query_execute = mysqli_query($conn, $query);
                if ($query_execute) {
                    echo json_encode(array("success" => true, "message" => "Record Deleted successfully"));
                } else {
                    echo json_encode(array("success" => false, "message" => "Some error Occured"));
                }
                break;

                case 'customer-update':
                    $id = $_POST['id'];
                    $first = $_POST['first'];
                    $last = $_POST['last'];
                    $primary = $_POST['primary'];
                    $secondary = $_POST['secondary'];
                    $id = sql_prevent($conn, xss_prevent($_POST['id']));
                    $first = sql_prevent($conn, xss_prevent($_POST['first']));
                    $last = sql_prevent($conn, xss_prevent($_POST['last']));
                    $primary = sql_prevent($conn, xss_prevent($_POST['primary']));
                    $secondary = sql_prevent($conn, xss_prevent($_POST['secondary']));

                    $query = "UPDATE customers SET first_name = '$first',last_name='$last',primary_phone_number='$primary',secondary_phone_number='$secondary' WHERE id ='$id' ";
                    $query_execute = mysqli_query($conn, $query);
                    if ($query_execute) {
                        echo json_encode(array("success" => true, "message" => "Customer details Updated successfully"));
                    } else {
                        echo json_encode(array("success" => false, "message" => "Some error Occured"));
                    }
                    break;
           
            default:
                echo json_encode(array("success" => false, "message" => "Method not found"));
                die;
                break;
        }

    } else {
        echo json_encode(array("success" => false, "message" => "Method not found"));
    }
}
