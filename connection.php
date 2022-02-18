<?php
include("constant.php");

$conn = mysqli_connect("localhost","root","","enquiry");

if($conn->connect_error){
    die("connection failed");
}

?>