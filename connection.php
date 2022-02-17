<?php
 $server = "localhost";
 $username = "root";
 $password = "";
 $db = "enquiry";

$conn = new mysqli($server,$username,$password,$db);

if($conn->connect_error){
    die("connection failed");
}

?>