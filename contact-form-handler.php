<?php 
$errors = '';
$myemail = 'office@web4u2.website';   //<-----Put Your email address here.
if(empty($_POST['firstname'])  || 
   empty($_POST['lastname'])   ||
   empty($_POST['email'])      || 
   empty($_POST['message']))
{
    $errors .= "\n Error: First Name, Last Name, Email and Message fields are required";
}

$firstname     = $_POST['firstname']; 
$lastname      = $_POST['lastname']; 
$company       = $_POST['company']; 
$street        = $_POST['street']; 
$postcode      = $_POST['postcode']; 
$city          = $_POST['city']; 
$email_address = $_POST['email']; 
$message       = $_POST['message']; 



if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $lastname";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $firstname \n Last Name: $lastname \n Company: $company \n Street: $street \n Postcode: $postcode \n City: $city \n Email: $email_address \n Message \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to, $email_subject, $email_body, $headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>