<?php
      include 'connection.php';

      $data = stripslashes(file_get_contents("php://input"));
      $mydata = json_decode($data,true);
      $name = $mydata['name'];
      $email = $mydata['email'];
      $subject = $mydata['subject'];
      $message = $mydata['message'];


      if(!empty($name)&& !empty($email) && !empty($subject) && !empty($message)){
            $sql = "INSERT INTO informations(name, email, subject,message)VALUES('$name','$email','$subject','$message')";

            if($conn->query($sql)==TRUE){
                  echo "message has been sent succesfully";
            }else{
                  echo "unable to send message";
            }
      }else{
            echo "please fill the above details";
      }

?>
