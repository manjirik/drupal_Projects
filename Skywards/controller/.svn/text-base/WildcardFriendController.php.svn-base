<?php
class WildcardFriendController extends BaseController {
	
	public function __construct() {
		parent::__construct();	
		$this->loadModel('WildcardFriend');
		$this->email_header_from = "From: Emirates Skywards  <sameer.kelkar@gmail.com>\r\n"; 
		$this->email_subject = "Emirates: Meet Me There - Invitation"; 		
	}
	
	public function index(){
		 
		if($this->fb_user_info){
				$fname= $_POST['fname']; 
				$lname = $_POST['lname'];  
				$email = $_POST['email'];
				$sender_fb_id = $this->fb_user_info['id'];
				$sender_name  = $this->fb_user_info['first_name']. ' '.$this->fb_user_info['last_name'];				 
				$sender_email_id = $this->fb_user_info['email'];	
				//$sender_link = 	$this->fb_user_info['link'];
				$app_url = FB_PAGE_URL_PERMISSION;
				$app_data_url = FB_CANVAS_URL.'notify_handel.php?type=wildcard';
		 
		 if(isset($fname) && isset($lname) && isset($email) && $email !=""){
			$name = $fname. ' '. $lname;
			$message = "Dear $name,<br /><br />";
			$message .= "You have been invited by $sender_name for Emirats Skywards Meet me there. Click on below url to accept your invitation: <br /><br />";
			$message .= $app_data_url;
			$message = "<br /><br />Thanks,<br />Emirates Skywards Team.";		
			if(sendEmailToWildCardFriend($email_address, $message)){
				echo 'true';
			}else{
				echo 'Problem in sending an email. Please try again later.';
			}			
		 }
		 }else{
			echo 'Fb user data missing.';
		 }
		 die;
	}
	
	public function sendEmailToWildCardFriend($email_address, $message){
		$headers = $this->email_header_from;		
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";		 
		$subject = $this->email_subject;
		if(mail($email_address,$subject,$message,$headers)){
			return true;
		}else{
			return false;
		}
	
	}


	/*
	 * Function name: checkWildCardUser
	 * Purpose: check wild card user : there are two cases 1) check wild card user for 5th user for fb user 2) check wild card user for 1st user for email pop up
	 *  Query string Parameters:
	 * 	$fields= useremaillist and val_no
	 * 	$values = useremaillist - string and val_no- number
	 * 
	 * Return value: 
	 * 	True: success
	 * 	False: fail
	 * Created By: nitin tatte 
	 * Updated By: nitin tatte / 1/2/2013	 
	 *
	 */

	public function checkWildCardUser()
	{  
     
	// [useremaillist] => 609703494,100001187318347,100003618890095,1347427052,100004933985926	//$useremaillist='sameer.kelkar@synechron.com,nits.tatte@gmail.com,sameer.kelkar@gmail.com,sonar.soni@gmail.com,munawwars@gmail.com';
	  // $val_no=5;
	    
	   //$useremail=$_GET['useremail'];
	   if(isset($_REQUEST['useremaillist']))
		{
		   $useremail=explode(",",$_REQUEST['useremaillist']);
		  
	   $useremail_str="";
	   foreach($useremail as $emal_val)
		{
		   $useremail_str.=$emal_val."','";
		}
		$useremail_str_fin=trim($useremail_str,",'");
	       $wildcardstatus = $this->WildcardFriend->checkWildCardUser($useremail_str_fin);
			
			
				if($wildcardstatus >= 5)
				{
					//echo "fail";
					$ids = $_REQUEST['useremaillist'];
					$fields = array('fb_id,firstname,lastname,user_id');
					$where = "fb_id IN ($ids)";
					$order_by = "ORDER BY fb_id DESC";
					$limit= 5;
					$getresult = $this->WildcardFriend->getResults($fields, $table_name='user', $where,$limit,$order_by);
					
					$selectBox = '<select name="selectedfriend" id="selectedfriend" class="selectComman"><option value="">Select</option>';
					foreach ($getresult as $key=>$value) 
					{
						$getval = $getresult[$key]->fb_id.'#'.$getresult[$key]->firstname.'#'.$getresult[$key]->lastname;
						$selectBox .= '<option value='.$getval.'>'.$getresult[$key]->firstname.' '.$getresult[$key]->lastname.'</option>';
					}
					$selectBox .= '</select>';
					echo $selectBox."!@!"."fail";
					
					
					
					
				}
				else
				{
					echo "success";
				}
			
		}
		else
		{
            echo "fail";
			
		}
	}
	
	/*
	 * Function name: store_email_user
	 * Purpose: store email user details in session
	 *  Post values:
	 * 	$fields= first name,last name and email address
	 * 	$values = first name - string,last name -string and email address-string
	 * Return value: 
	 * 	True: success if suceess store values into session
	 * 	False: fail - return error message
	 * Created By: nitin tatte  / 1/2/2013
	 * Updated By: nitin tatte / 1/2/2013	 
	 *
	 */

	public function store_email_user()
	{
       
	  if(isset($_POST["email"]))
		{
	        $wildcardstatus = $this->WildcardFriend->checkWildCardUser($_POST["email"]);
			
				if($wildcardstatus >= 1)
				{
					echo "fail";
				}
				else
				{
					$_SESSION['first_name_email_user']=$_POST["fname"];
					$_SESSION['last_name_email_user']=$_POST["lname"];
					$_SESSION['email_email_user']=$_POST["email"];

					echo "success";
				}
		}
		else
		{
			echo "fail";
		}

	}
 
	public function view() {
		$data=$this->Vote->view();		
	}
} 
?>