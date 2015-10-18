<html>
<head>
<title>PHPMailer - Mail() basic test</title>
</head>
<body>

<?php

require_once('class.phpmailer.php');

$mail             = new PHPMailer(); // defaults to using php "mail()"

/*
	$body             = file_get_contents('contents.html');
	$body             = eregi_replace("[\]",'',$body);
*/

$body = "
	<table border='1'>
		<tr>
			<td>hello...</td>
			<td>hello...</td>
			<td>hello...</td>
			<td>hello...</td>
			<td>hello...</td>
		</tr>
		<tr>
			<td>hello...</td>
			<td>hello...</td>
			<td>hello...</td>
			<td>hello...</td>
			<td>hello...</td>
		</tr>
	</tabel>
";

$mail->AddReplyTo("harshalh@synechron.com","Harshal Hirve");

$mail->SetFrom('admin@synechron.com', 'Synechron Admin');

//$mail->AddReplyTo("name@yourdomain.com","First Last");

$address = "harshalhirve@gmail.com";
$mail->AddAddress($address, "Harshal Hirve");

$mail->Subject    = "test mail with attachment";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

$mail->AddAttachment("2785_Harshal_S_Hirve_May_2010_timesheet.xls");

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}

?>

</body>
</html>
