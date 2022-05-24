<?php
//send email according to the form data
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $to = 'abyssiniea@gmail.com';
    $subject = $_POST['subject'];
    $body = "From: $name\n E-Mail: $email\n Message:\n $message";
    $from = $_POST['email'];
    // Check if name has been entered
    if (!$_POST['name']) {
        $errName = 'Please enter your name';
    }
    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errEmail = 'Please enter a valid email address';
    }
    //Check if message has been entered
    if (!$_POST['message']) {
        $errMessage = 'Please enter your message';
    }
    // If there are no errors, send the email and return response to ajax file to display success message
    if (!$errName && !$errEmail && !$errMessage) {
        if (mail($to, $subject, $body, $from)) {
            //return success message and status json
            $response = array(
                'status' => 'success',
                // french translation that someone will read soon
                'message' => 'Votre message a été envoyé avec succès. Un de nos agents vous contactera dans les plus brefs délai. Merci!'
                
               
            );

        } else {
            //return error  message in french and status json
            $response = array(
                'status' => 'error',
                'message' => 'Une erreur est survenue lors de l\'envoi de votre message. Veuillez réessayer plus tard.'
                
            );
            
        }
    }
}


?>