<?php

if(empty($_POST['name'])){
    $name_err = "**please fill the name";

    if(empty($_POST['email'])){
    $email_err = "please enter your email";
    }
        if(empty($_POST['subject'])){

            $subject_err="please fill the query-subject";

        }

            if(empty($_POST['message'])){

                $message_err="please tell your query";

            }

}





?>