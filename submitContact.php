<?php

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$category=$_POST['category'];
	$message=$_POST['message'];
	$to="kvess.krishna@yahoo.com";
	
	
	$headers1 = "From: " . $name . "\r\n";
	$headers1 .= "Reply-To: ". $email . "\r\n";
	$headers1 .= "MIME-Version: 1.0\r\n";
	$headers1 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message1="<html><body>";
	$message1.="<center><h3>Message from Karthikeya InfoMinds Visitor</h4>";
	$message1.="<br><b>Name:</b> ".htmlentities($name);
	$message1.="<br><b>Email:</b> ".htmlentities($email);
	$message1.="<br><b>Phone:</b> ".htmlentities($phone);
	$message1.="<br><b>Category:</b> ".htmlentities($category);
	$message1.="<br><b>Message:</b> ".htmlentities($message);
	$subject1="Message from Karthikeya InfoMinds Website - Reg: ".$category;

	include_once('templates/header.php');
	?>
	<meta name="author" content="Karthikeya InfoMinds Web Designing">
		<meta name="description" content="Thankyou for your interest in karthikeya infominds. We are the leading website designers and software developers in vijayawada">
		<meta name="keywords" content="web design vijayawada , leading website designing vijayawada, software development vijayawada, website designing company vijayawada, cheap web designing company vijayawada, software company vijayawada, vijayawada ecommerce, digital marketing vijayawada, web designing india">
		
		<title>
Thankyou for your interest in best website designers</title>
<?php
include_once('templates/beforeheader.php');
include_once('templates/nav.php');
?>

<section class="contact-message">
<div class="row">
<div class="col-md-offset-4 col-md-8">

<?php
if(mail($to, $subject1, $message1, $headers1)){

	?>	
		<p>Hello <span><?php echo $name;?></span>!
		<br>Thank you for your interest in Karthikeya InfoMinds!<br>We will get back to you shortly.<br>Have a great day!<br>Redirecting to Home..<br>
		<img src="img/animation.gif" alt="Karthikeya InfoMinds - Web Designing" class="img-responsive">
<?php
/**SMS Trigger part**/
$request = "";
$param['workingkey'] = "A317567ab2933cdefc9d83f3dfe9c43d1"; 
$param['sender'] = "SKYPXL"; 
$param['to'] = "$".$phone; 
$param['message'] = "Hi ".$name." Thank You for contacting Karthikeya InfoMinds. Our team will get back to you shortly. You can also reach us on +91 94921 93591."; 
foreach($param as $key=>$val) 
{ 
if($key!='to'){
$request.= $key."=".urlencode($val); 
}
else {$request.= $key."=".$val;}
$request.= "&";
}
$request = substr($request, 0, strlen($request)-1);
$url="http://sms.skypixels.in/api/web2sms.php?".$request;
file_get_contents($url);
/**SMS Trigger end**/

/*Mail to customer start*/
$name2="KarthikeyaInfoMinds";
$subject2="We received your enquiry on ".$category." | Karthikeya InfoMinds";
$headers2 = "From: " . $name2 . "\r\n";
	$headers2 .= "Reply-To: ". $email . "\r\n";
	$headers2 .= "MIME-Version: 1.0\r\n";
	$headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message2="<html><body>Hello ".$name.",<center><br>Thank you for contacting <b>Karthikeya InfoMinds</b>, we will get back to you shortly.<br>Explore our other products and services that can assist you much more on our website <a href='http://www.karthikeyainfominds.com'><b>Karthikeya InfoMinds<b></a>.</center><p><b><em>Thanks and Regards,<br>Team Sales & PR,<br>Karthikeya InfoMinds,<br>Vijayawada, Andhra Pradesh,<br>INDIA.<br></em></b>Phone: +91 94921 93591.</body></html> ";
mail($email, $subject2, $message2, $headers2);
/*mail to customer end*/


?>
		<?php header('Refresh:5;url=/'); 
} 
else{
	echo "Sorry, we cannot send your contact now. Try again later.";
}?>
</div>
</div>
</section>
<?php
include_once('templates/footer.php');
}
else{
header('Location:/#contact-form');	
}
?>