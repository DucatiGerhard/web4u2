<?php 
$errors = '';
$myemail = 'office@web4u2.website, ducati.gerhard@gmail.com';   //<-----Put Your email address here.
if(empty($_POST['fName'])  || 
   empty($_POST['lName'])  ||
   empty($_POST['email'])  || 
   empty($_POST['textarea']))
{
    $errors .= "\n Error: First Name, Last Name, Email and Text fields are required";
}

$fName    = $_POST['fName']; 
$lName    = $_POST['lName']; 
$email    = $_POST['email']; 
$textarea = $_POST['textarea']; 



if(empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $lName";
	$email_body = "You have received a new message. \n\n" .
		"Here are the details:\n First Name: $fName \n Last Name: $lName \n Email: $email \n Text \n $textarea"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email";
	
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