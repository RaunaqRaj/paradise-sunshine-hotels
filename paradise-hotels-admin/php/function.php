<?php

include 'connection.php';

// function check_user(){

//     if(isset($_SESSION['username'])&&isset($_SESSION['user_iv'])){  
//         $user = decryption($_SESSION['username'],hex2bin($_SESSION['user_iv']));
//         $user_check = "select * from users where id=$user_id";
//         $query = mysqli_query($conn,$user_check);
//         $user_count = mysqli_num_rows($query);
    
//         if($user_count>0){
//             return true;
//         }
//         else{
//             return false;
//         }
//     }else{
//         return false;
//     }
 

// }

function xss_prevent($value)
{
    return strip_tags(htmlspecialchars($value));
}

function sql_prevent($conn, $value)
{
    return mysqli_real_escape_string($conn, $value);
}

function encryption($value, $iv)
{
    return openssl_encrypt($value, constant("CIPHER"), constant("KEY"), constant("OPTIONS"), $iv);
}

function decryption($value, $iv)
{
    return openssl_decrypt($value, constant("CIPHER"), constant("KEY"), constant("OPTIONS"), $iv);
}

?>