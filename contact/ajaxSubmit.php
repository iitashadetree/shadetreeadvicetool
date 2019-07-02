<?php
$name = $_POST['name']; // contain name of person
$email = $_POST['email']; // Email address of sender 
$phone = $_POST['subject']; // Your Topic
$body = $_POST['text']; // Your message 
$receiver = "jephamitsolution@gmail.com" ; // hardcorde your email address here - This is the email address that all your feedbacks will be sent to 
if (!empty($name) & !empty($email) && !empty($body)) {
    $body = "Name:{$name}\n\nTopic :{$phone}\n\nComments:{$body}";
	$send = mail($receiver, 'Contact Form Submission', $body, "From: {$email}");
    if ($send) {
        echo 'true'; //if everything is ok,always return true , else ajax submission won't work
    }
}
?>