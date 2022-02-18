<?php
      include 'connection.php';

      $data = stripslashes(file_get_contents("php://input"));

      // stripsslashes function can be used to clean up data retrieved from a database or from an HTML form.

      //php://input - this is a read only stream that allows us to read raw data from the request body . it returns all the raw data after the HTTP-headers of the request , regardless of the content type.

      $mydata = json_decode($data,true);

      //json_decode - it takes JSON string and converts it into a php object or array, if true then an associative array.

      $name = $mydata['name'];
      $email = $mydata['email'];
      $subject = $mydata['subject'];
      $message = $mydata['message'];


      if(!empty($name)&& !empty($email) && !empty($subject) && !empty($message)){

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  
                  echo "invalid email address";

            }
            else{
            $sql = "INSERT INTO informations(name, email, subject,message)VALUES('$name','$email','$subject','$message')";

            if($conn->query($sql)==TRUE){
                  echo "message has been sent succesfully";
            }else{
                  echo "unable to send message";
            }
      }
      }else{
            echo "please fill the above details";
      }


?>
