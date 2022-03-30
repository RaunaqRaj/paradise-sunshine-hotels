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
            case 'contact-list':
                $query = "select id,name,email,subject,created_at from informations";
                $query_execute = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_execute) > 0) {
                    $data = array();
                    while ($result = mysqli_fetch_assoc($query_execute)) {
                        $data[] = $result;
                    }
                    echo json_encode(array("success" => true, "data" => $data));
                } else {
                    echo json_encode(array("success" => false, "data" => "No information found!"));
                }
                break;
            case 'contact-delete':
                $id = sql_prevent($conn, xss_prevent($_POST['id']));
                $query = "DELETE FROM informations where id='$id'";
                $query_execute = mysqli_query($conn, $query);
                if ($query_execute) {
                    echo json_encode(array("success" => true, "message" => "Record Deleted successfully"));
                } else {
                    echo json_encode(array("success" => false, "message" => "Some error Occured"));
                }
                break;

            case 'contact-message':
                $id = sql_prevent($conn, xss_prevent($_POST['id']));
                $query = "SELECT message FROM informations where id='$id' ORDER BY created_at DESC";
                $query_execute = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_execute) > 0) {
                    $message = array();
                    while ($result = mysqli_fetch_array($query_execute,MYSQLI_ASSOC)) {
                        $message[] = $result;
                    }
                    echo json_encode(array("success" => true, "data" => $message));
                } else {
                    $message[] = "No information found!";
                    echo json_encode(array("success" => false, "message" => $message));
                }
            
                break;

            case 'contact-previous':
                $email = sql_prevent($conn, xss_prevent($_POST['email']));
                $query = "SELECT * FROM informations  WHERE email = '$email' ORDER BY created_at DESC";
                $query_execute = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_execute) > 0) {
                    $previous_data = array();
                    while ($result = mysqli_fetch_array($query_execute,MYSQLI_ASSOC)) {
                        $previous_data[] = $result;
                    }
                    echo json_encode(array("success" => true, "data" => $previous_data));
                } else {
                    $previous_data[] = "No information found!";
                    echo json_encode(array("success" => false, "data" => $previous_data));
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
