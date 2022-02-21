<?php
      include 'function.php';

      // include 'connection.php';

      if(SERVER=="localhost"){

      

      $success = array("response"=>"your message is recieved", "fail"=>"your request is denied");

      $err = array("error"=>"please fill the details","name"=>"please enter a valid name", "email"=>"email should be in correct format","subject"=>"subject is required","message"=>"message is required");
      // stripsslashes function can be used to clean up data retrieved from a database or from an HTML form.

      //php://input - this is a read only stream that allows us to read raw data from the request body . it returns all the raw data after the HTTP-headers of the request , regardless of the content type.

      // $mydata = json_decode($data,true);

      $new = json_encode($success);
      $error = json_encode($new);

      //json_decode - it takes JSON string and converts it into a php object or array, if true then an associative array.

      $_REQUEST="POST";
      if($_REQUEST=="POST"){

      

      $name = xss_prevent($_POST['name']);
      $email = xss_prevent($_POST['email']);
      $subject =xss_prevent($_POST['subject']);
      $message =xss_prevent($_POST['message']);
      
      // $name = sql_prevent($conn,$mydata['name']);
      // $email = sql_prevent($conn,$mydata['email']);
      // $subject =sql_prevent($conn,$mydata['subject']);
      // $message =sql_prevent($conn,$mydata['message']);


      if(!empty($name)&& !empty($email) && !empty($subject) && !empty($message)){


            if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$name)){

                  echo $err["name"];

            }
            else{
            if(!preg_match("/^[a-zA-Z]*$/",$name)){

                  echo $err["name"];
            }
      
            else{


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  
                  echo  $err["email"];

            }
            else{
            $sql = "INSERT INTO informations(name, email, subject,message)VALUES('$name','$email','$subject','$message')";

            if($conn->query($sql)==TRUE){

                  echo $success["response"];
                  

            }else{
                  echo $success["fail"];
            }
      }
      }
      }
      }     
      else{
            
      }
      }
}     
?>
