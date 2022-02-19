<?php
      include 'function.php';

      // include 'connection.php';

      $data = stripslashes(file_get_contents("php://input"));

      // stripsslashes function can be used to clean up data retrieved from a database or from an HTML form.

      //php://input - this is a read only stream that allows us to read raw data from the request body . it returns all the raw data after the HTTP-headers of the request , regardless of the content type.

      $mydata = json_decode($data,true);

      //json_decode - it takes JSON string and converts it into a php object or array, if true then an associative array.

      $name = xss_prevent($mydata['name']);
      $email = xss_prevent($mydata['email']);
      $subject =xss_prevent($mydata['subject']);
      $message =xss_prevent($mydata['message']);

      $name = sql_prevent($conn,$mydata['name']);
      $email = sql_prevent($conn,$mydata['email']);
      $subject =sql_prevent($conn,$mydata['subject']);
      $message =sql_prevent($conn,$mydata['message']);


      if(!empty($name)&& !empty($email) && !empty($subject) && !empty($message)){

            if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$name)){

                  echo "<strong style='color : red;'>please enter a valid name</strong>";

            }
            else{
            if(!preg_match("/^[a-zA-Z]*$/",$name)){

                  echo "<strong style='color : red;'>name must be A-Z & a-z</strong>";
            }
      
            else{


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  
                  echo "<strong style='color : red;'>invalid email address</strong>";

            }
            else{
            $sql = "INSERT INTO informations(name, email, subject,message)VALUES('$name','$email','$subject','$message')";

            if($conn->query($sql)==TRUE){
                  echo "message has been sent succesfully";
            }else{
                  echo "<strong style='color : red;'>unable to send message</strong>";
            }
      }
      }
      }
      }     
      else{
            
      }
      
?>
