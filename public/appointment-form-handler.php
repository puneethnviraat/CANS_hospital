<?php

$EmailTo = "canshospital1@gmail.com";
$Subject = "New appointment Request: $name";

$success = false;
$errorMSG = array();
$name = $name = $email = $phone=  $message = null;
$fields = array(
    'name' => "First name is required ",
    'email' => "Email is required ",
    'phone' => "Phone is required ",
    'message' => "Message is required "
);

foreach($fields as $key => $e_message){
    if (empty($_POST[$key])) {
        $errorMSG[] = $e_message;
    } else {
        $$key = $_POST[$key];
    }
}

$name = $name ;

// prepare email body text
$Body = null;
$Body .= "<p><b>Name:</b> {$name}</p>";
$Body .= "<p><b>Email:</b> {$email}</p>";
$Body .= "<p><b>Phone:</b> {$phone}</p>";
$Body .= "<p><b>Message:</b> </p><p>{$message}</p>";

// send email
$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";

if($name && $email && $message){
    $success = mail($EmailTo, $Subject, $Body, $headers );
}

if(empty($errorMSG)){
    $errorMSG[] = "Something went wrong :(";
}

echo json_encode(array(
    'success' => $success,
    'message' => $errorMSG
));

die();