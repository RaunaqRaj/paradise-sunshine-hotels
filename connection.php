<?php
include("constant.php");

$conn = mysqli_connect(SERVER,USERNAME,PASSWORD,DB);

if($conn->connect_error){
    die("connection failed");
}

?>