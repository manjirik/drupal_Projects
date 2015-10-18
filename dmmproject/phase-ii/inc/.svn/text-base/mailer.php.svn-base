<?php

include_once 'config.php';

$site_url = SITE_URL;

	function mailForNotifySongsUpload($to, $username)
	{
		global $notify_by_admin;
		$headers = "From:DMMAdmin <".$notify_by_admin.">\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
		$message = messageForNotifySongsUpload($username);
		$subject = 'New Song Uploaded';
		mail($to,$subject,$message,$headers);
	}

	function messageForNotifySongsUpload($username)
	{
		//$message = "Dear clinic,"."<br/>";
		//$message .= "Your appointment has been booked for ".$date." in ".$clinicName." at ".$startTime.". To cancel logon to www.weqaya.ae";
		$message = '<html>';
		$message .= '<head>';
			$message .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
			$message .= '<title>Untitled Document</title>';
		$message .= '</head>';
		$message .= '<body>';
			$message .= '<table width="800" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif">';
				$message .= '<tr>';
					$message .= '<td>';
						$message .= '<table width="800" height="80" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #8b8b8b;border-top:1px solid #8b8b8b;font-family:Arial, Helvetica, sans-serif">';
							$message .= '<tr>';
								$message .= '<td width="28">&nbsp;</td>';
								$message .= '<td width="203" style="padding:26px 0 17px 0"><img  src="'.HOST_URL.'/images/logo.jpg" /></td>';
								$message .= '<td width="384">&nbsp;</td>';
							$message .= '</tr>';
						$message .= '</table>';
					$message .= '</td>';
				$message .= '</tr>';
				$message .= '<tr>';
					$message .= '<td width="800">';
						$message .= '<table border="0" cellspacing="0" cellpadding="0" style="color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px;">';
							$message .= '<tr>';
								$message .= '<td style="padding:28px 0 0 28px;">Hey Admin ,</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:20px 0 0 28px; width:800px;">New songs Uploaded By '.$username.'</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td width="28">&nbsp;</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:0 0 0 28px; color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px;">Thanks,</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:0 0 0 28px; color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px; width:800px;">DMMCompany&reg; The Musician&#39;s Brand&trade;</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:20px 0 0 28px; width:800px;"><a href="http://dmmcompany.com" target="_blank">http://dmmcompany.com</a></td>';
							$message .= '</tr>';
						$message .= '</table>';
					$message .= '</td>';
				$message .= '</tr>';
			$message .= '</table>';          
		$message .= '</body>';
		$message .= '</html>';
		return $message;
	}

	function mailForNotifyAdvertiseUpload($to, $username)
	{
		global $notify_by_admin;
		$headers = "From:DMMAdmin <".$notify_by_admin.">\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
		$message = messageForNotifyAdvertiseUpload($username);
		$subject = 'New Advertise Uploaded';
		mail($to,$subject,$message,$headers);
	}

	function messageForNotifyAdvertiseUpload($username)
	{
		//$message = "Dear clinic,"."<br/>";
		//$message .= "Your appointment has been booked for ".$date." in ".$clinicName." at ".$startTime.". To cancel logon to www.weqaya.ae";
		$message = '<html>';
		$message .= '<head>';
			$message .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
			$message .= '<title>Untitled Document</title>';
		$message .= '</head>';
		$message .= '<body>';
			$message .= '<table width="800" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif">';
				$message .= '<tr>';
					$message .= '<td>';
						$message .= '<table width="800" height="80" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #8b8b8b;border-top:1px solid #8b8b8b;font-family:Arial, Helvetica, sans-serif">';
							$message .= '<tr>';
								$message .= '<td width="28">&nbsp;</td>';
								$message .= '<td width="203" style="padding:26px 0 17px 0"><img  src="'.HOST_URL.'/images/logo.jpg" /></td>';
								$message .= '<td width="384">&nbsp;</td>';
							$message .= '</tr>';
						$message .= '</table>';
					$message .= '</td>';
				$message .= '</tr>';
				$message .= '<tr>';
					$message .= '<td width="800">';
						$message .= '<table border="0" cellspacing="0" cellpadding="0" style="color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px;">';
							$message .= '<tr>';
								$message .= '<td style="padding:28px 0 0 28px;">Hey Admin ,</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:20px 0 0 28px; width:800px;">New Advertise Uploaded By '.$username.'</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td width="28">&nbsp;</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:0 0 0 28px; color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px;">Thanks,</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:0 0 0 28px; color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px; width:800px;">DMMCompany&reg; The Musician&#39;s Brand&trade;</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:20px 0 0 28px; width:800px;"><a href="http://dmmcompany.com" target="_blank">http://dmmcompany.com</a></td>';
							$message .= '</tr>';
						$message .= '</table>';
					$message .= '</td>';
				$message .= '</tr>';
			$message .= '</table>';          
		$message .= '</body>';
		$message .= '</html>';
		return $message;
	}

	function mailForForgotPass($to, $username, $pass)
	{
		global $notify_pass_payment;
		$headers = "From:DMMCompany Secure <".$notify_pass_payment.">\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
		$message = messageForForgotPass($username, $pass);
		$subject = 'DMMCompany Password Reset';
		mail($to,$subject,$message,$headers);
	}
	
	function messageForForgotPass($username, $pass)
	{
		//$message = "Dear clinic,"."<br/>";
		//$message .= "Your appointment has been booked for ".$date." in ".$clinicName." at ".$startTime.". To cancel logon to www.weqaya.ae";
		$message = '<html>';
		$message .= '<head>';
			$message .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
			$message .= '<title>Untitled Document</title>';
		$message .= '</head>';
		$message .= '<body>';
			$message .= '<table width="800" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif">';
				$message .= '<tr>';
					$message .= '<td>';
						$message .= '<table width="800" height="80" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #8b8b8b;border-top:1px solid #8b8b8b;font-family:Arial, Helvetica, sans-serif">';
							$message .= '<tr>';
								$message .= '<td width="28">&nbsp;</td>';
								$message .= '<td width="203" style="padding:26px 0 17px 0"><img  src="'.HOST_URL.'/images/logo.jpg" /></td>';
								$message .= '<td width="384">&nbsp;</td>';
							$message .= '</tr>';
						$message .= '</table>';
					$message .= '</td>';
				$message .= '</tr>';
				$message .= '<tr>';
					$message .= '<td width="800">';
						$message .= '<table border="0" cellspacing="0" cellpadding="0" style="color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px;">';
							$message .= '<tr>';
							$message .= '<td style="padding:28px 0 0 28px;">Hi '.$username.' ,</td>';
							$message .= '</tr>';
							$message .= '<tr>';
							$message .= '<td style="padding:28px 0 0 28px; width:800px;">For your security, your password has been reset. Please log in with the details provided below. We recommend that you reset your password once you have logged in.</td>';
							$message .= '</tr>';
							$message .= '<tr>';
							$message .= '<td style="padding:28px 0 0 28px; width:800px;">&nbsp;</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:0 0 0 28px; width:800px;">DMMCompany Name : '.$username.'</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:10px 0 0 28px; width:800px;">Password : '.$pass.'</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td width="28">&nbsp;</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:0 0 0 28px; color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px; width:800px;">Thanks,</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:0 0 0 28px; color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px; width:800px;">DMMCompany&reg; The Musician&#39;s Brand&trade;</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:20px 0 0 28px; width:800px;"><a href="http://dmmcompany.com" target="_blank">http://dmmcompany.com</a></td>';
							$message .= '</tr>';
						$message .= '</table>';
					$message .= '</td>';
				$message .= '</tr>';
			$message .= '</table>';          
		$message .= '</body>';
		$message .= '</html>';
		return $message;
	}

	function mailForUserRegistration($to, $name, $username, $password)
	{
		global $notify_registration;
		$headers = "From:DMMCompany <".$notify_registration.">\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
		$message = messageForUserRegistration($name, $username, $password);
		$subject = 'DMMCompany Registration Confirmation';
		mail($to,$subject,$message,$headers);
	}

	function messageForUserRegistration($name, $username, $password)
	{
		//$message = "Dear clinic,"."<br/>";
		//$message .= "Your appointment has been booked for ".$date." in ".$clinicName." at ".$startTime.". To cancel logon to www.weqaya.ae";
		$message = '<html>';
		$message .= '<head>';
			$message .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
			$message .= '<title>Untitled Document</title>';
		$message .= '</head>';
		$message .= '<body>';
			$message .= '<table width="800" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif">';
				$message .= '<tr>';
					$message .= '<td>';
						$message .= '<table width="800" height="80" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #8b8b8b;border-top:1px solid #8b8b8b;font-family:Arial, Helvetica, sans-serif">';
							$message .= '<tr>';
								$message .= '<td width="28">&nbsp;</td>';
								$message .= '<td width="203" style="padding:26px 0 17px 0"><img  src="'.HOST_URL.'/images/logo.jpg" /></td>';
								$message .= '<td width="384">&nbsp;</td>';
							$message .= '</tr>';
						$message .= '</table>';
					$message .= '</td>';
				$message .= '</tr>';
				$message .= '<tr>';
					$message .= '<td width="800">';
						$message .= '<table border="0" cellspacing="0" cellpadding="0" style="color:#6f6e70;font-weight:normal;font-family:Arial, Helvetica, sans-serif; font-size:13px;">';
							$message .= '<tr>';
							$message .= '<td style="padding:28px 0 0 28px;">Hi '.$name.' ,</td>';
							$message .= '</tr>';
							$message .= '<tr>';
							$message .= '<td style="padding:28px 0 0 28px; width:800px;">Experience the DMMCompany&reg; DMMApp! Version 9.0</br></br>Start enjoying all that amazingly talented musicians have to offer to the world of music. Digest, share, search, comment, message and recommend good musicians and their innovative sounds. From Seasoned Veterans to Basement Brilliants, DMMCompany&reg; provides an equal and engaging arena for all musicians.</br></br>A FREE 2 SONG UPLOAD COMPLIMENTARY IS OFFERED TO ALL MUSICIANS!</br>Click your personal Musician ID below to get started.</br></br><a href="http://dmmcompany.com/'.$name.'" style="color:#00A9EC;">http://dmmcompany.com/'.$name.'</a></br></br>NOTE: If you checked I AM A MUSICIAN during registration, an email containing your personal MUSICIAN ID will arrive shortly! When you receive your MUSICIAN ID Confirmation you will have access.</td>';
							$message .= '</tr>';
							$message .= '<tr>';
							$message .= '<td style="padding:0 0 0 28px">&nbsp;</td>';
							$message .= '</tr>';
							$message .= '<tr>';
							$message .= '<td style="padding:0 0 0 28px; width:800px;">Username : '.$username.'</td>';
							$message .= '</tr>';
							$message .= '<tr>';
							$message .= '<td style="padding:0 0 0 28px; width:800px;">Password : '.$password.'</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td width="28">&nbsp;</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:0 0 0 28px; color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px; width:800px;">Thanks,</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:0 0 0 28px; color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px; width:800px;">DMMCompany&reg; The Musician&#39;s Brand&trade;</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:20px 0 0 28px; width:800px;"><a href="http://dmmcompany.com" target="_blank">http://dmmcompany.com</a></td>';
							$message .= '</tr>';
						$message .= '</table>';
					$message .= '</td>';
				$message .= '</tr>';
			$message .= '</table>';          
		$message .= '</body>';
		$message .= '</html>';
		return $message;
	}

	function mailToAdminForUserRegistration($to, $name, $username, $password)
	{
		global $notify_by_admin;
		$headers = "From:DMMAdmin <".$notify_by_admin.">\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
		$message = messageToAdminForUserRegistration($name, $username, $password);
		$subject = 'DMMCompany New Registration';
		mail($to,$subject,$message,$headers);
	}

	function messageToAdminForUserRegistration($name, $username, $password)
	{
		//$message = "Dear clinic,"."<br/>";
		//$message .= "Your appointment has been booked for ".$date." in ".$clinicName." at ".$startTime.". To cancel logon to www.weqaya.ae";
		$message = '<html>';
		$message .= '<head>';
			$message .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
			$message .= '<title>Untitled Document</title>';
		$message .= '</head>';
		$message .= '<body>';
			$message .= '<table width="800" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif">';
				$message .= '<tr>';
					$message .= '<td>';
						$message .= '<table width="800" height="80" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #8b8b8b;border-top:1px solid #8b8b8b;font-family:Arial, Helvetica, sans-serif">';
							$message .= '<tr>';
								$message .= '<td width="28">&nbsp;</td>';
								$message .= '<td width="203" style="padding:26px 0 17px 0"><img  src="'.HOST_URL.'/images/logo.jpg" /></td>';
								$message .= '<td width="384">&nbsp;</td>';
							$message .= '</tr>';
						$message .= '</table>';
					$message .= '</td>';
				$message .= '</tr>';
				$message .= '<tr>';
					$message .= '<td width="800">';
						$message .= '<table border="0" cellspacing="0" cellpadding="0" style="color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px;">';
							$message .= '<tr>';
								$message .= '<td style="padding:28px 0 0 28px;">Hey Admin ,</td>';
							$message .= '</tr>';
							$message .= '<tr>';
							$message .= '<td style="padding:28px 0 0 28px; width:800px;">'.$name.' has registered. Please find username and password below.</br></br>FREE ACCESS! 2 song uploads and 1 Billboard are granted to all musicians upon registration.</br></br>Get started!</td>';
							$message .= '</tr>';
							$message .= '<tr>';
							$message .= '<td style="padding:0 0 0 28px">&nbsp;</td>';
							$message .= '</tr>';
							$message .= '<tr>';
							$message .= '<td style="padding:0 0 0 28px; width:800px;">Username : '.$username.'</td>';
							$message .= '</tr>';
							$message .= '<tr>';
							$message .= '<td style="padding:0 0 0 28px; width:800px;">Password : '.$password.'</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td width="28">&nbsp;</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:0 0 0 28px; color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px; width:800px;">Thanks,</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:0 0 0 28px; color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px; width:800px;">DMMCompany&reg; The Musician&#39;s Brand&trade;</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:20px 0 0 28px; width:800px;"><a href="http://dmmcompany.com" target="_blank">http://dmmcompany.com</a></td>';
							$message .= '</tr>';
						$message .= '</table>';
					$message .= '</td>';
				$message .= '</tr>';
			$message .= '</table>';          
		$message .= '</body>';
		$message .= '</html>';
		return $message;
	}
	
	function mailForEditBillbord($to, $username)
	{
		global $notify_by_admin;
		$headers = "From:DMMAdmin <".$notify_by_admin.">\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
		$message = messageForEditBillbord($username);
		$subject = 'New Billboard Uploaded';
		mail($to,$subject,$message,$headers);
	}

	function messageForEditBillbord($username)
	{
		//$message = "Dear clinic,"."<br/>";
		//$message .= "Your appointment has been booked for ".$date." in ".$clinicName." at ".$startTime.". To cancel logon to www.weqaya.ae";
		$message = '<html>';
		$message .= '<head>';
			$message .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
			$message .= '<title>Untitled Document</title>';
		$message .= '</head>';
		$message .= '<body>';
			$message .= '<table width="800" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif">';
				$message .= '<tr>';
					$message .= '<td>';
						$message .= '<table width="800" height="80" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #8b8b8b;border-top:1px solid #8b8b8b;font-family:Arial, Helvetica, sans-serif">';
							$message .= '<tr>';
								$message .= '<td width="28">&nbsp;</td>';
								$message .= '<td width="203" style="padding:26px 0 17px 0"><img  src="'.HOST_URL.'/images/logo.jpg" /></td>';
								$message .= '<td width="384">&nbsp;</td>';
							$message .= '</tr>';
						$message .= '</table>';
					$message .= '</td>';
				$message .= '</tr>';
				$message .= '<tr>';
					$message .= '<td width="800">';
						$message .= '<table border="0" cellspacing="0" cellpadding="0" style="color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px;">';
							$message .= '<tr>';
								$message .= '<td style="padding:28px 0 0 28px;">Hey Admin ,</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:20px 0 0 28px; width:800px;">A new Billboard was uploaded by '.$username.'</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td width="28">&nbsp;</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:0 0 0 28px; color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px; width:800px;">Thanks,</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:0 0 0 28px; color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px; width:800px;">DMMCompany&reg; The Musician&#39;s Brand&trade;</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:20px 0 0 28px; width:800px;"><a href="http://dmmcompany.com" target="_blank">http://dmmcompany.com</a></td>';
							$message .= '</tr>';
						$message .= '</table>';
					$message .= '</td>';
				$message .= '</tr>';
			$message .= '</table>';          
		$message .= '</body>';
		$message .= '</html>';
		return $message;
	}
	
	/* send mail to musician when user send message on song */
	function mailForMessageMusician($to, $comment, $musician_name, $message_by)
	{
		global $messaging_mail_id;
		$headers = "From:DMMessaging <".$messaging_mail_id.">\r\n";
		$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
		$message = messageForMessageMusician($comment, $musician_name, $message_by);
	    $subject = "{$message_by} send you a message via DMMCompany";
		mail($to,$subject,$message,$headers);
		// include("PHPMailer/config.php");
		// _send_mail($to,$subject,$message,$headers);

	}

	function messageForMessageMusician($comment, $musician_name, $message_by) {
		global $site_url;
		$message = <<<STR
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>
<body style="margin:0;padding:0;font-family:Arial, Helvetica, sans-serif;">
	<div style="width: 800px;">
		<p style="color: #999999;font-size: 12px;"><a style="color:#0c89ff;text-decoration:none;color:#0c89ff;text-decoration: none;" href="{$site_url}/{$message_by}">{$message_by}</a> send you a message</p>
		<p style="color: #000000;display: block;font-size: 21px;font-weight: 700;line-height: 23px;overflow: hidden;position: relative;">{$comment}</p>
		<p style="display: block;overflow: hidden;margin-bottom: 15px;"><a href="#" style="text-decoration: none;font-size: 21px;font-weight: 700;line-height: 23px;border: 1px solid #E0E0E0;clear: both;color: #0C89FF;cursor: pointer;float: left;font-weight: 700;left: 0;line-height: 45px;text-align: center;padding:0px 20px;margin:0;">Reply</a></p>
		<p><a href="{$site_url}" style="display:block;margin: 65px 0 0 0;"><img src="{$site_url}/images/logo.jpg" border="0" /></a></p>
		<p style="color: #999999;font-size: 12px;width: 124px;">Definitive Music Media</p>
		<p><a href="{$site_url}" style="color:#0c89ff;font-size: 12px;">{$site_url}</a></p>
		<p style="color: #999999;font-size: 12px;">Do notice when comments are left on your page</p>
	</div>
</body>
</html>
STR;

	return $message;
	}
	
	/* send mail to musician when user post comment on song */
	function mailForCommentMusician($to, $comment, $musician_name, $comment_user_name, $song_name, $song_id){
		global $messaging_mail_id;
		$headers = "From:DMMessaging <".$messaging_mail_id.">\r\n";
		$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
		$commentbody = commentForMessageMusician($comment,$musician_name,$comment_user_name, $song_name, $song_id);
		$subject =" Song Feedback via DMMCompany - by {$comment_user_name}";
		mail($to, $subject, $commentbody, $headers);
		// include("PHPMailer/config.php");
		// _send_mail($to, $subject, $commentbody, $headers);
	}
	
	
	function commentForMessageMusician($comment, $musician_name, $comment_user_name, $song_name, $song_id) {
		global $site_url;
		$message = <<<STR
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>
<body style="margin:0;padding:0;font-family:Arial, Helvetica, sans-serif;">
	<div style="width: 800px;">
		<p style="color: #999999;font-size: 12px;"><a style="color:#0c89ff;text-decoration:none;color:#0c89ff;text-decoration: none;" href="{$site_url}/{$comment_user_name}">{$comment_user_name}</a> commented on <a style="color:#0c89ff;text-decoration:none;text-transform:capitalize;color:#0c89ff;text-decoration: none;" href="{$site_url}/{$musician_name}/{$song_id}">{$song_name}</a></p>
		<p style="color: #000000;display: block;font-size: 21px;font-weight: 700;line-height: 23px;overflow: hidden;position: relative;">{$comment}</p>
		<p style="display: block;overflow: hidden;margin-bottom: 15px;color: #999999;font-size: 12px;font-weight: 700;">Did you know that you can turn off song comment notifications?</p>
		<ol style="color: #999999;font-size: 12px;">
				<li>Sing in to your dmmcompany.com account</li>
				<li>Click your avatar to edit your account</li>
				<li>Click settings</li>
			</ol>
		<p><a href="{$site_url}" style="display:block;margin: 65px 0 0 0;"><img src="{$site_url}/images/logo.jpg" border="0" /></a></p>
		<p style="color: #999999;font-size: 12px;width: 124px;">Definitive Music Media</p>
		<p><a href="{$site_url}" style="color:#0c89ff;font-size: 12px;">{$site_url}</a></p>
		<p style="color: #999999;font-size: 12px;">Do notice when comments are left on your page</p>
	</div>
</body>
</html>
STR;

	return $message;
}

	/* send mail when user send message from song video */
	function sendSongVideoPvtMsgMail($to, $comment, $musician_name, $comment_user_name)
	{
		global $messaging_mail_id;
		$headers = "From:DMMessaging <".$messaging_mail_id.">\r\n";
		$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
		$message = songVideoPvtMessage($comment ,$musician_name, $comment_user_name);
	    $subject = "{$comment_user_name} send you a message via DMMCompany";
		mail($to, $subject, $message, $headers);
		// include("PHPMailer/config.php");
		// _send_mail($to, $subject, $message, $headers);
	}

	function songVideoPvtMessage($comment, $musician_name, $comment_user_name) {
		global $site_url;
		$message = <<<STR
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>
<body style="margin:0;padding:0;font-family:Arial, Helvetica, sans-serif;">
	<div style="width: 800px;">
		<p style="color: #999999;font-size: 12px;"><a style="color:#0c89ff;text-decoration:none;color:#0c89ff;text-decoration: none;" href="{$site_url}/{$comment_user_name}">{$comment_user_name}</a> send you a private message</p>
		<p style="color: #000000;display: block;font-size: 21px;font-weight: 700;line-height: 23px;overflow: hidden;position: relative;">{$comment}</p>
		<p style="display: block;overflow: hidden;margin-bottom: 15px;"><a href="#" style="text-decoration: none;font-size: 21px;font-weight: 700;line-height: 23px;border: 1px solid #E0E0E0;clear: both;color: #0C89FF;cursor: pointer;float: left;font-weight: 700;left: 0;line-height: 45px;text-align: center;padding:0px 20px;margin:0;">Reply</a></p>
		<p><a href="{$site_url}" style="display:block;margin: 65px 0 0 0;"><img src="{$site_url}/images/logo.jpg" border="0" /></a></p>
		<p style="color: #999999;font-size: 12px;width: 124px;">Definitive Music Media</p>
		<p><a href="{$site_url}" style="color:#0c89ff;font-size: 12px;">{$site_url}</a></p>
		<p style="color: #999999;font-size: 12px;">Do notice when comments are left on your page</p>
	</div>
</body>
</html>
STR;

	return $message;
	}

?>