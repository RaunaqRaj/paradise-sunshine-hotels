<?php

session_start();
if(!isset($_SESSION['username'])){
   echo 'you are logged out';
}
session_destroy();
header('location:../index.php');

?>