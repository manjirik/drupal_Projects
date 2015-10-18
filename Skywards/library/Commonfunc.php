<?php
class Commonfunc {
	
	public function __construct()
	{
		//$this->loadLibrary('Weather');
	}
		
public function getEmiratesDestinations()
	{
		ob_clean();
		$obj =  new Getcity();
		$data =$obj->getEmiratesCities();
		
		 foreach($data as $cityinfo) 
		{ 
				$city = $cityinfo->city_name;
				$destinations[$city] = $cityinfo->latitude.",".$cityinfo->longitude."~".$cityinfo->temprature."~".$cityinfo->city_image."~".$cityinfo->country_name."~".$cityinfo->location_id;
		}
	
	return $destinations;
	}
	
	/**
	 * @author Chaitenya yadav
	 * Below function will collect all the selected destinations by user 
	 */
	public function getDreamDestinations()
	{
		$dreamDestinations['London'] = '51.5171, -0.1062';
		return $dreamDestinations;
	}
	
 
	
	public function logError($e) 
	{
	}
	
	public function getDateTime($format='Y-m-d H:i:s') {
		return date($format);
	}

	/*
	 * Function name: send_email_notification
	 * Purpose: This function send email notification to user.
	 *   Parameters:
	 * 	$fields= from,to,subject,message
	 * 	$values = email address,email address,string,html data/string
	 * 
	 * Return value: 
	 * 	True: 1
	 * 	False: 0
	 * Created By: nitin tatte / 3/2/2013	 
	 * Updated By: nitin tatte / 3/2/2013	 	 
	 *
	 */

	public function send_email_notification($from,$to,$subject,$message_body)
	{

		  $email_status=""; 
		   if(empty($from)|| empty($to) || empty($subject) || empty($message_body))
			{
			   return false;
			}
       
		
	    foreach($to as $to_emails)
		{
		 
		 $headers  = "From: $from\r\n";
         $headers .= "Content-type: text/html\r\n";

		//options to send to cc+bcc
		//$headers .= "Cc: [email]maa@p-i-s.cXom[/email]";
		//$headers .= "Bcc: [email]email@maaking.cXom[/email]";
    
		 // now lets send the email.
		 $sent_status=mail($to_emails, $subject, $message_body, $headers);

		 if($sent_status==1)
			{ 
			   $email_status.= true;
			}
			else
			{
				$email_status.= false;
			}
		}
		  
	  return $email_status;	 
	}
	
	public function send_email_acceptance_link($from,$to,$subject,$message_body) {
		if($to=='' || !isset($to)) return false;
		$email_status=""; 
		$headers  = "From: $from\r\n";
        $headers .= "Content-type: text/html\r\n";
		
		$send_status=mail($to, $subject, $message_body, $headers);
		if($sent_status==1)
			{ 
			   $email_status.= true;
			}
			else
			{
				$email_status.= false;
			}
		return $email_status;
	
	}
	
}