<?php
$errors = '';
$myemail = 'sarthi.abhi@gmail.com';   //<-----Put Your email address here.
if(empty($_POST['fname'])  || 
   empty($_POST['lname']) || 
   empty($_POST['email']) || 
   empty($_POST['contactno']) || 
   empty($_POST['messagearea']))
   
{
    $errors .= "\n Error: all fields are required";
}

$fname = $_POST['fname']; 
$lname = $_POST['lname']; 
$email_address = $_POST['email']; 
$contactno = $_POST['contactno']; 
$message = $_POST['messagearea']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))

{

$to = $myemail;

$email_subject = "Contact form submission: $fname $lname";

$email_body = "You have received a new message. ".

" Here are the details:\n Name: $fname $lname \n ".

"Email: $email_address\n Contact Number: $contactno \n Message \n $message";

$headers = "From: $myemail\n";

$headers .= "Reply-To: $email_address";

mail($to,$email_subject,$email_body,$headers);
}
?>