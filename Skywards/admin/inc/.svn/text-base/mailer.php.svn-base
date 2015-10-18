<?php
include("config.php");

	function mailForRejectPlaylist($username, $emailid, $playlist_name)
	{
		global $adminEmail;
		$headers = "From:Samsung \r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
		$message = messageForRejectPlaylist($username,$emailid, $playlist_name);
		$subject = 'Jumbo Winner Alert';
		mail($emailid,$subject,$message,$headers);
	}

	function messageForRejectPlaylist($username,$emailid, $playlist_name)
	{
		$message = '<html>';
		$message .= '<head>';
			$message .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
			$message .= '<title>Untitled Document</title>';
		$message .= '</head>';
		$message .= '<body>';
			$message .= '<table width="800" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif">';
				$message .= '<tr>';
					$message .= '<td width="800">';
						$message .= '<table border="0" cellspacing="0" cellpadding="0" style="color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px;">';
							$message .= '<tr>';
								$message .= '<td style="padding:20px 0 0 28px; width:800px;">Hi '.$username.',</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:20px 0 0 28px; width:800px;">Your '.$playlist_name.' Playlist Rejected. </td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td width="28">&nbsp;</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:0 0 0 28px; color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px; width:800px;">Thanks,</td>';
							$message .= '</tr>';
							$message .= '<tr>';
								$message .= '<td style="padding:0 0 0 28px; color:#6f6e70;font-weight:bold;font-family:Arial, Helvetica, sans-serif; font-size:13px; width:800px;">Samsung Team.</td>';
							$message .= '</tr>';
						$message .= '</table>';
					$message .= '</td>';
				$message .= '</tr>';
			$message .= '</table>';          
		$message .= '</body>';
		$message .= '</html>';
		return $message;
	}
?>