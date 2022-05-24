<?php
//send email according to the form data
if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $to = 'abyssiniea@gmail.com';
    $subject = $_POST['subject'];
    $body = "From: $name\n E-Mail: $email\n Message:\n $message";
    $from = $_POST['email'];
    //mail headers are mandatory for sending email
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "Return-Path: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
    $headers .= "X-Priority: 3\r\n";
    $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
    //send email
  
    // If there are no errors, send the email and return response to ajax file to display success message

        if(mail($to, $subject, $body, $headers)) {
            //return success message and status json
            return "success";
           

        } else {
            //return error  message in french and status json
           //return $response = json_encode(array('status' => false, 'message' => 'Désolé, il y a eu un problème lors de l\'envoi de votre message. Veuillez réessayer plus tard.'));
            return "error";
            
            
        }
    
}


?>