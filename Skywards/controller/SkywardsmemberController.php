<?php
/*For Skyward Member Check And Enroll*/
class SkywardsmemberController extends BaseController {
	
	public function __construct() {
		parent::__construct();		
		$this->loadModel('Skywardsmember');
		$this->loadModel('Users');
		$this->loadModel('Myentries');		
		$this->loadLibrary('Commonfunc');
		$this->loadLibrary('Fb_common_func');		
		$this->loadLibrary('Webservice');
		
	}
	
	public function index(){
		//$this->membershipvalidation();
		$data=$this->Skywardsmember->view();	
		//print_r($data);
	}
	
	public function skywardsmembercheck()
	{
		/*echo "<pre>";
		print_r($_SESSION['selected_friends_details']);
		 die();*/
		
		 ?>
		 <?php 
		$fields = array('user_id','email');
		$fb_id=$_SESSION['fb_user_id'];
		$where="fb_id='$fb_id' and sky_mem_id != '' ";
		$getresult = $this->Users->getResults($fields, $table_name='user', $where, $limit=1);
		if(!empty($getresult))
		{
			$getresult[0]->user_id;
			$_SESSION['tbl_user_id']=$getresult[0]->user_id;
			if($getresult[0]->user_id!='') {
				
				$user_entry_data['user_id']=$getresult[0]->user_id;
				$user_entry_data['location_id']=$_SESSION['location_id'];
				$user_entry_data['created_date']= $this->Commonfunc->getDateTime();	
				$user_entry_data['updated_date']= $this->Commonfunc->getDateTime();
				//$user_entry_data['location_id']=2;
				$user_entry_data['entry_status']=1;
				$user_entry_id=$this->Myentries->insert($user_entry_data,$table_name='user_entry');
				if($user_entry_id!='') {
						$_SESSION['tbl_user_entry_id']=$user_entry_id;
						$selected_friends_details=$_SESSION['selected_friends_details'];
						
						$selected_friends_details_count=count($selected_friends_details);
						
						$fields='`user_entry_id`,`friend_id`,`friend_email`,`firstname`,`lastname`'; 
						$values = array();
						foreach($selected_friends_details as $key=>$values1){
							$values[$key]['user_entry_id'] = $user_entry_id;
							$values[$key]['friend_id']= $values1['friend_id'];
							$values[$key]['friend_email'] = $values1['friend_email'];
							$values[$key]['firstname'] = $values1['firstname'];
							$values[$key]['lastname'] = $values1['lastname'];
						
						}
						$this->Myentries->replace($fields,$values,$table_name='user_entry_details');	
						//Start for the sending the email, notofication and wall post
						foreach($selected_friends_details as $key=>$values1){
						if($values1['friend_id']!=''){
						$friend_idarray[]= $values1['friend_id'];
						}
						if($values1['friend_email']!=''){
						$friend_emailarray[]= $values1['friend_email'];
						}
					}
					$first_name=$_SESSION['fb_user_first_name'];
	       				//$first_name='Sandeep';   
	        			$city_name=$_SESSION['cityName'];
					
					if(SEND_NOTIFICATION_EMAIL_WALL==true){
						//Start for the sending the email, notofication and wall post
						//Start for sending the notifications
						if(!empty($friend_idarray))
						{
							foreach($friend_idarray as $fbid) { 
								$subject="Your friend has invited you.";
								$code='invitation|'.$_SESSION['tbl_user_entry_id'].'|'.$fbid;
						$result=$this->Fb_common_func->send_notification($this->facebook,$subject, array($fbid),APP_TOKEN,$_SESSION['fb_user_id'],$code);
						}
						}
						///End for sending the notifications
	
						//Start for sending the email
						
						
						if(!empty($friend_emailarray))
						{
							foreach($friend_emailarray as $email2) { 
								$subject="Your friend has invited you.";
								$code=$_SESSION['tbl_user_entry_id'].'|'.$email2;
								$link=APP_LINK.'&app_data=invitation|'.$code;
								$msg_body='Dear '.$email2.'<br/> Your friend '.$first_name.' has invited you for a trip to '.$city_ncodeame.'. Click on below link to accept or decline his request.<br />'.$link;
								$result=$this->Commonfunc->send_email_acceptance_link(EMAIL_FROM,$email2,$subject,$msg_body);
							}
						}
						//End for sending the notifications	
						
						
						
						$selected_friends_details=$_SESSION['selected_friends_details'];
						$fbfriends=$_SESSION['fb_user_friends'];
						//$fbfriends='609703494,Atul Nath#626417105,Prabhas Nayak#632531552,Jitendra Singh#1041266626,Rajesh Patil#1220631499,Sameer Kelkar#1268065008,Sandip Patil#1347427052,Rahul Sonar#1606136972,Tejinder Singh Nagee#100001187318347,Nitin Tatte#100004307071114,Chaitanya Satpute#100004377272706,Chaitenya Yadav#100004713606450,Sameer Kelkar#100005095356317,Nader Yassa';
						
	        			//$city_name="Dubai";
	        			$email3= $getresult[0]->email;;
	        			$to_email=array($email3);
	        			//$to_email=array('spjahagirdar@gmail.com');
				       
						foreach($selected_friends_details as $key=>$values1){
								if($values1['friend_id']!=''){
									$friend_idarray[]= $values1['friend_id'];
								}
								if($values1['friend_email']!=''){
									$friend_emailarray[]= $values1['friend_email'];
								}
							}
									
						$fb_name=array();
						if(!empty($friend_idarray))
						{
							foreach($friend_idarray as $values)
							{
								$temp=explode($values,$fbfriends);
								$temp=explode(',',$temp[1]);
								$temp=explode('#',$temp[1]);
								$fb_name[] = $temp[0];				
							}
						}
						
						if(!empty($friend_emailarray) && !empty($fb_name) )
						{
							$slected=array_merge($fb_name,$friend_emailarray);
						}
						elseif(!empty($friend_emailarray) && empty($fb_name))
						{
							$slected=$friend_emailarray;
						}
						elseif(!empty($fb_name) && empty($friend_emailarray))
						{
							$slected=$fb_name;
						}
						$slected=array_unique($slected);
						$fb_name_str=implode(",",$slected);

						$friend_idarray_selected=array_unique($friend_idarray);
						$friend_idarray_str=implode(",",$friend_idarray_selected);
						

						$message_body="Dear ".$first_name.",<br/> You have selected the ".$city_name." destination. You have selected ".$fb_name_str."<br/><a href=".APP_LINK.">Click Here</a> to go to application";
						$result=$this->Commonfunc->send_email_notification(EMAIL_FROM,$to_email,'Destination Confirmation',$message_body);
						
						//Wall Of Wall Post
						$location_id=$_SESSION['location_id'];
						$fields = array('city_image');
						$where="location_id='$location_id'";
						$getresult = $this->Users->getResults($fields, $table_name='location', $where, $limit=1);
						//$getresult='images/emirates_logo.gif';
						$pic=SITE_URL.'city_images/'.$getresult[0]->city_image;
						//$pic=SITE_URL.$getresult;
						$wall_message="I am meeting friends ".$fb_name_str.", for a reunion in ".$city_name." with Emirates Skywards";

					//$this->Fb_common_func->wall_post_destination($wall_message,APP_LINK,DESTINATION_WALL_POST_TITLE,$pic,$_SESSION['fb_user_id'],$this->facebook);
					    $obj_url=SITE_URL.'view/og_page.php'; // open graph object page
						$post_tagged=$this->Fb_common_func->wall_post_tagging($wall_message,$pic,$friend_idarray_str,$_SESSION['fb_user_id'],$this->facebook,APP_NAMESPACE,OPEN_GRAPH_ACTION_NAME,$obj_url,'','');
						//print_r($post_tagged);
						//End Of Wall Post
						//End for the sending the email, notofication and wall post
					}
					header('Location: '.SITE_URL.'index.php?r=myentries/show_entries');
					exit();		
					}else
					{
						  $errno='USER_ENTRY_FAILED'; $errstr=implode('###',$user_entry_data); $errfile=__FILE__; $errline=__LINE__;
	  					  ApplicationErrorHandler($errno, $errstr, $errfile, $errline);
					}
				}	
		}
		
		$data=array();
		$data['enrollmem'] = 1;
		$data['first_name'] = $_SESSION['fb_user_first_name'];
		$data['last_name'] = $_SESSION['fb_user_last_name'];
		$data['email'] = $_SESSION['fb_user_email'];
		$this->template="skywardsmembercheck";
		$this->render($data);
	}
	public function skywardsmembercheck_submit()
	{
		$data['enrollmem'] = 1;
		if(isset($_POST['enroll']) && $_POST['enroll']!="")
		{
			//if(isset($_POST['fn']) && $_POST['fn']!="" && isset($_POST['ln']) && $_POST['ln']!="" && isset($_POST['country']) && $_POST['country']!="" && isset($_POST['email']) && $_POST['email']!="" && isset($_POST['country']) && $_POST['country']!="" && isset($_POST['password']) && $_POST['password']!="" && isset($_POST['que']) && $_POST['que']!="")
			
			if(isset($_POST['title']) && $_POST['title']!="" && isset($_POST['fn']) && $_POST['fn']!="" && isset($_POST['ln']) && $_POST['ln']!="" && isset($_POST['year']) && $_POST['year']!="" && isset($_POST['month']) && $_POST['month']!="" && isset($_POST['date']) && $_POST['date']!="" && isset($_POST['email']) && $_POST['email']!="" && isset($_POST['country']) && $_POST['country']!="" )
			{
				$params = array('skywardsProfile'=>array('Member'=>
				array('PersonID'=>'',
				'PreferencesChanged'=>'',
				'MemUID' => '',
				'DayOfDob' => '',
				'MonthOfDob' => '',
				'YearOfDob' => '',
				'PreferredLanguage' => '',
				'PointsBalanace' => '',
				'TierPointsBalance' => '',
				'MergedToMemUID' => '',
				'DateJoined' => '', 
				'NumberOfFamilyMember' => '', 
				'GroupingNumber' => '', 
				'OgranisationID' => '', 
				'TermDate' => '', 
				'NonExpEnd' => '', 
				'UpgradeProhib' => '', 
				'DgradeProhib' => '', 
				'LastDgradeReviewDate' => '', 
				'LastExp' => '', 
				'WelcomeLetterDate' => '', 
				'EubID' => '', 
				'NumberOfEmployees' => '', 
				'PerCreatedDate' => '', 
				'PmpCreatedDate' => '', 
				'AccOnlineStatusDate' => '', 
				'IsProspect' => '', 
				'IsMinorEnrolment' => '', 
				'OtherMemberCardNo' => '', 
				'FamilyHeadMemUID' => '', 
				'Weight' => '', 
				'DuplicateId' => '', 
				'ForceDuplicateEnrolment' => '', 
				'NominatedDate' => '', 
				'NumberOfPendingActivities' => '', 
				'OrgOrgId' => '', 
				'CorpMemUid' => '', 
				'CorpPointsBal' => '', 
				'CorpNoOfMembersLinked' => '', 
				'CorpJoinDate' => '', 
				'IsMinor' => '', 
				'CardExpiryDate' => '', 
				'MilesExpiryDate' => '',
				'UploadID' => '',			
				'Password'=>$_POST['pwd'],'FirstName'=> $_POST['fn'],'Title'=>$_POST['title'],'LastName'=>$_POST['ln'],'BirthDate'=>$_POST['year'].'-'.$_POST['month'].'-'.$_POST['date'].'T00:00:00','EmailAddress'=>$_POST['email'],'EnrolmentMethod'=>'FAB','RegistrationType'=>'M','EcmCode'=>'FACEB'),
				'Addresses'=>array(
					'Address'=>array('Country'=>$_POST['country'],'IsPreferred'=>'true',
					'Usages'=>'HOME',
				'OrgID' => '',
				'PersonID' => '',
				'AddressID' => '',
				'LocationID' => '',
				'IsValidate' => ''
				
				))));
				
				//'EnrolmentMethod'=>'INT','RegistrationType'=>'M','EcmCode'=>'SCDXB';
				$result=$this->Webservice->enrollmember($params);
				$resultarr=(array)$result;
				if($result->wsResult->IsSuccess == '1') {
				
				/*if(1==1) {*/
					$_SESSION['sky_mem_id']= $resultarr['EnrollMemberResult']->Member->Username;
					//$_SESSION['sky_mem_id']= '00199975333';
					$this->insertdetails($resultarr,$validate='');
				}
				else
				{
					$_SESSION['post_title']=$_POST['title'];
					$_SESSION['post_first_name'] = $_POST['fn'];
					$_SESSION['post_last_name'] = $_POST['ln'];
					$_SESSION['post_country'] =$_POST['country'];
					$_SESSION['post_email'] = $_POST['email'];
					$_SESSION['post_month'] = $_POST['month'];
					$_SESSION['post_date'] = $_POST['date'];
					$_SESSION['post_year'] = $_POST['year'];
					$_SESSION['post_month'] = $_POST['month'];
					$_SESSION['post_date'] = $_POST['date'];
					$_SESSION['post_year'] = $_POST['year'];
					$_SESSION['post_reg_answer']=$_POST['reg_answer'];
					$this->template="skywardsmembercheck";
				}
			}
			else
			{
				?>
				<script type="text/javascript">
					alert("All fields are compulsary");
				</script>
				<?php 
				$this->template="skywardsmembercheck";
				$this->render();
			}
		}
		if(isset($_POST['validate']) && $_POST['validate']!="")
		{
			//if(isset($_POST['fn']) && $_POST['fn']!="" && isset($_POST['ln']) && $_POST['ln']!="" && isset($_POST['country']) && $_POST['country']!="" && isset($_POST['email']) && $_POST['email']!="" && isset($_POST['country']) && $_POST['country']!="" && isset($_POST['password']) && $_POST['password']!="" && isset($_POST['que']) && $_POST['que']!="")
			if(isset($_POST['vmn']) && $_POST['vmn']!="")
			{
				$params = array('cardNumber'=> trim($_POST['vmn']));
				$result=$this->Webservice->validatemembershipnumber($params);
				/*echo '<pre>';
				print_r($result);*/
				$resultarr=array();
				$resultarr=(array)$result;
				$member_check =strstr($result->wsResult->Message, 'UDE-8143:');
				if($member_check!='')
				{
					$_SESSION['sky_mem_id']=$_POST['vmn'];
					/*$fb_details=$this->getFBUserData();
					$fb_id=$fb_details['fb_user_id'];
					$_SESSION['sky_mem_id']=$_POST['vmn'];
					$skywards_member_number=$_POST['vmn'];
					$params=array('sky_mem_id'=>$skywards_member_number);
					$where= 'fb_id='.$fb_id;
					$table_name='user';*/
					//$this->Skywardsmember->update($params,$table_name,$where);
					$this->insertdetails($resultarr,$validate='yes');
					}
				else
				{
					$_SESSION['post_reg_answer_validate']=$_POST['reg_answer_validate'];
					$_SESSION['post_vmn'] = $_POST['vmn'];
					$this->template="skywardsmembercheck";
				}
			}
		}
		
		$fbdtlarray=$this->getFBUserData();
		$resarray=array();
		$resarray=array_merge($resultarr,$fbdtlarray);
		$this->render($resarray);
		
	}
	
	public function insertdetailsWithoutEntry($resultarr,$validate='')
	{
		$firstname= ($_POST['fn']) ? $_POST['fn'] : $_SESSION['fb_user_first_name'];
		$lastname=  ($_POST['ln']) ? $_POST['ln'] : $_SESSION['fb_user_last_name'];
		$email= ($_POST['email']) ? $_POST['email'] : $_SESSION['fb_user_email'];
		$vmn= ($_POST['vmn']) ? $_POST['vmn'] : '';
		
		// check if user does not exists
		
		
		if($_SESSION['fb_user_first_name'] && 
		$_SESSION['fb_user_last_name'] &&
		$_SESSION['fb_user_id'] &&
		$_SESSION['fb_user_email'] && 
		$_SESSION['sky_mem_id']) {
			$user_id=$this->Users->userExists($this->fb_user_info);
			if(!$data) {
			$user_data=array();
			$user_data['firstname']=$firstname;
			$user_data['lastname']=$lastname;
			$user_data['fb_id']=$_SESSION['fb_user_id'];
			$user_data['email']=$email;
			$user_data['current_location']=$_SESSION['fb_user_location'];
			$user_data['home_town']=$_SESSION['fb_user_hometown'];
			$user_data['sky_mem_id']=$_SESSION['sky_mem_id'];
			$user_data['is_active']=1;
			
			$user_data['reg_answer']=($_POST['reg_answer'])? $_POST['reg_answer']:$_POST['reg_answer_validate'];
			$user_data['created_date']= $this->Commonfunc->getDateTime();	
			$user_data['updated_date']= $this->Commonfunc->getDateTime();
			$user_id=$this->Users->insert($user_data,$table_name='user');
			}
			
		}
		if($user_id!='') {
			//change acceptance status
			$this->AcceptInvitation();
		}
		else
		{		
			  echo "Somethig went wrong.Please try again.";
			  $errno='USER_ENTRY_DETAILS_FAILED'; $errstr=implode('###',$user_entry_data); $errfile=__FILE__; $errline=__LINE__;
  			  ApplicationErrorHandler($errno, $errstr, $errfile, $errline);
		}
	
	}
	public function insertdetails($resultarr,$validate='')
	{
		/*Start of to reset the form data which are stored in session*/
		$_SESSION['post_title']='';
		$_SESSION['post_first_name'] = '';
		$_SESSION['post_last_name'] = '';
		$_SESSION['post_country'] ='';
		$_SESSION['post_email'] = '';
		$_SESSION['post_month'] = '';
		$_SESSION['post_date'] = '';
		$_SESSION['post_year'] = '';
		$_SESSION['post_month'] = '';
		$_SESSION['post_date'] = '';
		$_SESSION['post_year'] = '';
		$_SESSION['post_reg_answer']= '';
		$_SESSION['post_reg_answer_validate']= '';
		$_SESSION['post_vmn'] = '';
		/*End of to reset the form data which are stored in session*/
		$firstname= ($_POST['fn']) ? $_POST['fn'] : $_SESSION['fb_user_first_name'];
		$lastname=  ($_POST['ln']) ? $_POST['ln'] : $_SESSION['fb_user_last_name'];
		$email= ($_POST['email']) ? $_POST['email'] : $_SESSION['fb_user_email'];
		$vmn= ($_POST['vmn']) ? $_POST['vmn'] : '';
		//print_r($_SESSION);
		if($_SESSION['fb_user_first_name'] && 
		$_SESSION['fb_user_last_name'] &&
		$_SESSION['fb_user_id'] &&
		$_SESSION['fb_user_email'] && 
		$_SESSION['sky_mem_id']) {
			$user_data=array();
			$user_data['firstname']=$firstname;
			$user_data['lastname']=$lastname;
			$user_data['fb_id']=$_SESSION['fb_user_id'];
			$user_data['email']=$email;
			$user_data['current_location']=$_SESSION['fb_user_location'];
			$user_data['home_town']=$_SESSION['fb_user_hometown'];
			$user_data['sky_mem_id']=$_SESSION['sky_mem_id'];
			$user_data['is_active']=1;
			//$user_data['reg_answer']=$_POST['reg_answer'];
			$user_data['reg_answer']=($_POST['reg_answer'])? $_POST['reg_answer']:$_POST['reg_answer_validate'];
			$user_data['created_date']= $this->Commonfunc->getDateTime();	
			$user_data['updated_date']= $this->Commonfunc->getDateTime();
			$user_id=$this->Users->insert($user_data,$table_name='user');
		}
		if($user_id!='') {
			$_SESSION['tbl_user_id']=$user_id;
			$user_entry_data['user_id']=$user_id;
			$user_entry_data['location_id']=$_SESSION['location_id'];
			$user_entry_data['created_date']= $this->Commonfunc->getDateTime();	
			$user_entry_data['updated_date']= $this->Commonfunc->getDateTime();
			//$user_entry_data['location_id']=2;
			$user_entry_data['entry_status']=1;
			$user_entry_id=$this->Myentries->insert($user_entry_data,$table_name='user_entry');
			if($user_entry_id!='') {
					//clear used array
					unset($user_entry_data);
					$_SESSION['tbl_user_entry_id']=$user_entry_id;
					$selected_friends_details=$_SESSION['selected_friends_details'];
					/*$selected_friends_details= array(
						0=>array('friend_id'=>'454545454','friend_email'=>'spj@spj.com'),
						1=>array('friend_id'=>'12222333','friend_email'=>'spj1@spj.com')
					           );*/
					$selected_friends_details_count=count($selected_friends_details);
					
					$fields='`user_entry_id`,`friend_id`,`friend_email`,`firstname`,`lastname`'; 
					$values = array();
					foreach($selected_friends_details as $key=>$values1){
						$values[$key]['user_entry_id'] = $user_entry_id;
						$values[$key]['friend_id']= $values1['friend_id'];
						$values[$key]['friend_email'] = $values1['friend_email'];
						$values[$key]['firstname'] = $values1['firstname'];
						$values[$key]['lastname'] = $values1['lastname'];
					
					}
					$this->Myentries->replace($fields,$values,$table_name='user_entry_details');	
					
					foreach($selected_friends_details as $key=>$values1){
						if($values1['friend_id']!=''){
						$friend_idarray[]= $values1['friend_id'];
						}
						if($values1['friend_email']!=''){
						$friend_emailarray[]= $values1['friend_email'];
						}
					}
					
					
					if(SEND_NOTIFICATION_EMAIL_WALL==true){
						/*Start for the sending the email, notofication and wall post*/
						/*Start for sending the notifications*/
						if(!empty($friend_idarray))
						{
							foreach($friend_idarray as $fbid) {
						$subject="Your friend has invited you.";
						$code='invitation|'.$_SESSION['tbl_user_entry_id'].'|'.$fbid;
						$result=$this->Fb_common_func->send_notification($this->facebook,$subject, array($fbid),APP_TOKEN,$_SESSION['fb_user_id'],$code);
						}
						}
						/*End for sending the notifications*/
	
						/*Start for sending the email*/
						$first_name=$_SESSION['fb_user_first_name'];
	       				//$first_name='Sandeep';   
	        			$city_name=$_SESSION['cityName'];
						
						if(!empty($friend_emailarray))
						{
							foreach($friend_emailarray as $email2) { 
								$subject="Your friend has invited you.";
								$code=$_SESSION['tbl_user_entry_id'].'|'.$email2;
								$link=APP_LINK.'&app_data=invitation|'.$code;
								$msg_body='Dear '.$email2.'<br/> Your friend '.$first_name.' has invited you for a trip to '.$city_name.'. Click on below link to accept or decline his request.<br />'.$link;
								$result=$this->Commonfunc->send_email_acceptance_link(EMAIL_FROM,$email2,$subject,$msg_body);
							}
						}
						/*End for sending the notifications*/	
						
						/**/
						/*$selected_friends_details= array(
							0=>array('friend_id'=>'100001187318347','friend_email'=>''),
							1=>array('friend_id'=>'100004713606450','friend_email'=>''),
							2=>array('friend_id'=>'','friend_email'=>'sameer.kelkar@synechron.com')
						           );*/
						$selected_friends_details=$_SESSION['selected_friends_details'];
						$fbfriends=$_SESSION['fb_user_friends'];
						//$fbfriends='609703494,Atul Nath#626417105,Prabhas Nayak#632531552,Jitendra Singh#1041266626,Rajesh Patil#1220631499,Sameer Kelkar#1268065008,Sandip Patil#1347427052,Rahul Sonar#1606136972,Tejinder Singh Nagee#100001187318347,Nitin Tatte#100004307071114,Chaitanya Satpute#100004377272706,Chaitenya Yadav#100004713606450,Sameer Kelkar#100005095356317,Nader Yassa';
						$first_name=$_SESSION['fb_user_first_name'];
	       				//$first_name='Sandeep';   
	        			$city_name=$_SESSION['cityName'];
	        			//$city_name="Dubai";
	        			$to_email=array($email);
	        			//$to_email=array('spjahagirdar@gmail.com');
				       
						foreach($selected_friends_details as $key=>$values1){
								if($values1['friend_id']!=''){
									$friend_idarray[]= $values1['friend_id'];
								}
								if($values1['friend_email']!=''){
									$friend_emailarray[]= $values1['friend_email'];
								}
							}

							
									
						$fb_name=array();
						if(!empty($friend_idarray))
						{
							foreach($friend_idarray as $values)
							{
								$temp=explode($values,$fbfriends);
								$temp=explode(',',$temp[1]);
								$temp=explode('#',$temp[1]);
								$fb_name[] = $temp[0];				
							}
						}
						
						if(!empty($friend_emailarray) && !empty($fb_name) )
						{
							$slected=array_merge($fb_name,$friend_emailarray);
						}
						elseif(!empty($friend_emailarray) && empty($fb_name))
						{
							$slected=$friend_emailarray;
						}
						elseif(!empty($fb_name) && empty($friend_emailarray))
						{
							$slected=$fb_name;
						}
						$slected=array_unique($slected);
						$fb_name_str=implode(",",$slected);

						$friend_idarray_selected=array_unique($friend_idarray);
						$friend_idarray_str=implode(",",$friend_idarray_selected);


						$message_body="Dear ".$first_name.",<br/> You have selected the ".$city_name." destination. You have selected ".$fb_name_str."<br/><a href=".APP_LINK.">Click Here</a> to go to application";
						$result=$this->Commonfunc->send_email_notification(EMAIL_FROM,$to_email,'Destination Confirmation',$message_body);
						/**/
						/*Wall Of Wall Post*/
						$location_id=$_SESSION['location_id'];
						$fields = array('city_image');
						$where="location_id='$location_id'";
						$getresult = $this->Users->getResults($fields, $table_name='location', $where, $limit=1);
						//$getresult='images/emirates_logo.gif';
						$pic=SITE_URL.'city_images/'.$getresult[0]->city_image;
						//$pic=SITE_URL.$getresult;
						$wall_message="I am meeting friends ".$fb_name_str.", for a reunion in ".$city_name." with Emirates Skywards";

					//$this->Fb_common_func->wall_post_destination($wall_message,APP_LINK,DESTINATION_WALL_POST_TITLE,$pic,$_SESSION['fb_user_id'],$this->facebook);
						$obj_url=SITE_URL.'view/og_page.php'; // open graph object page.
						$post_tagged=$this->Fb_common_func->wall_post_tagging($wall_message,$pic,$friend_idarray_str,$_SESSION['fb_user_id'],$this->facebook,APP_NAMESPACE,OPEN_GRAPH_ACTION_NAME,$obj_url,'','test app data');
						//print_r($post_tagged);
						
						/*End Of Wall Post*/
						/*End for the sending the email, notofication and wall post*/
					}
					//$this->template="skywardsmembercompleted";
					//$this->render($resultarr);
					$_SESSION['EnrollMemberResult_FirstName'] = ($resultarr['EnrollMemberResult']->Member->FirstName) ? $resultarr['EnrollMemberResult']->Member->FirstName : '';
					$_SESSION['EnrollMemberResult_LastName']  = ($resultarr['EnrollMemberResult']->Member->LastName) ? $resultarr['EnrollMemberResult']->Member->LastName : '';
					$_SESSION['EnrollMemberResult_Username']  = ($resultarr['EnrollMemberResult']->Member->Username) ? $resultarr['EnrollMemberResult']->Member->Username : $_SESSION['sky_mem_id']; 
					header('Location:'.SITE_URL.'index.php?r=skywardsmember/skywardsmembercompleted&validate='.$validate.'&vmn='.$vmn );
					exit();
					
				}else
				{
					  echo "Somethig went wrong.Please try again.";
					  $errno='USER_ENTRY_FAILED'; $errstr=implode('###',$user_entry_data); $errfile=__FILE__; $errline=__LINE__;
  					  ApplicationErrorHandler($errno, $errstr, $errfile, $errline);
  					  //clear used array
					  unset($user_entry_data);
				}				
		}
		else
		{		
			  echo "Somethig went wrong.Please try again.";
			  $errno='USER_ENTRY_DETAILS_FAILED'; $errstr=implode('###',$user_entry_data); $errfile=__FILE__; $errline=__LINE__;
  			  ApplicationErrorHandler($errno, $errstr, $errfile, $errline);
		}
	
	}

	public function skywardsmembercompleted() {
		$this->template="skywardsmembercompleted";
		$data['FirstName'] = $_SESSION['EnrollMemberResult_FirstName'];
		$data['LastName'] = $_SESSION['EnrollMemberResult_LastName'];
		$data['Username'] = $_SESSION['EnrollMemberResult_Username'];
		$this->render($data);
	}
	
	public function accept_invitation() {
		
		$this->template='accept_invitation';
		$this->render();
	}
	
	
	public function skywardsmembercheck_invitation()
	{
		$data=array();
		$data['enrollmem'] = 1;
		$data['first_name'] = $_SESSION['fb_user_first_name'];
		$data['last_name'] = $_SESSION['fb_user_last_name'];
		$data['email'] = $_SESSION['fb_user_email'];
		$this->template="skywardsmembercheck_invitation";
		$this->render($data);
	}
	
	public function regHandle() {
				$data['enrollmem'] = 1;
		if(isset($_POST['enroll']) && $_POST['enroll']!="")
		{
			//if(isset($_POST['fn']) && $_POST['fn']!="" && isset($_POST['ln']) && $_POST['ln']!="" && isset($_POST['country']) && $_POST['country']!="" && isset($_POST['email']) && $_POST['email']!="" && isset($_POST['country']) && $_POST['country']!="" && isset($_POST['password']) && $_POST['password']!="" && isset($_POST['que']) && $_POST['que']!="")
			
			if(isset($_POST['title']) && $_POST['title']!="" && isset($_POST['fn']) && $_POST['fn']!="" && isset($_POST['ln']) && $_POST['ln']!="" && isset($_POST['year']) && $_POST['year']!="" && isset($_POST['month']) && $_POST['month']!="" && isset($_POST['date']) && $_POST['date']!="" && isset($_POST['email']) && $_POST['email']!="" && isset($_POST['country']) && $_POST['country']!="" )
			{
				$params = array('skywardsProfile'=>array('Member'=>
				array('PersonID'=>'',
				'PreferencesChanged'=>'',
				'MemUID' => '',
				'DayOfDob' => '',
				'MonthOfDob' => '',
				'YearOfDob' => '',
				'PreferredLanguage' => '',
				'PointsBalanace' => '',
				'TierPointsBalance' => '',
				'MergedToMemUID' => '',
				'DateJoined' => '', 
				'NumberOfFamilyMember' => '', 
				'GroupingNumber' => '', 
				'OgranisationID' => '', 
				'TermDate' => '', 
				'NonExpEnd' => '', 
				'UpgradeProhib' => '', 
				'DgradeProhib' => '', 
				'LastDgradeReviewDate' => '', 
				'LastExp' => '', 
				'WelcomeLetterDate' => '', 
				'EubID' => '', 
				'NumberOfEmployees' => '', 
				'PerCreatedDate' => '', 
				'PmpCreatedDate' => '', 
				'AccOnlineStatusDate' => '', 
				'IsProspect' => '', 
				'IsMinorEnrolment' => '', 
				'OtherMemberCardNo' => '', 
				'FamilyHeadMemUID' => '', 
				'Weight' => '', 
				'DuplicateId' => '', 
				'ForceDuplicateEnrolment' => '', 
				'NominatedDate' => '', 
				'NumberOfPendingActivities' => '', 
				'OrgOrgId' => '', 
				'CorpMemUid' => '', 
				'CorpPointsBal' => '', 
				'CorpNoOfMembersLinked' => '', 
				'CorpJoinDate' => '', 
				'IsMinor' => '', 
				'CardExpiryDate' => '', 
				'MilesExpiryDate' => '',
				'UploadID' => '',			
				'Password'=>$_POST['pwd'],'FirstName'=> $_POST['fn'],'Title'=>$_POST['title'],'LastName'=>$_POST['ln'],'BirthDate'=>$_POST['year'].'-'.$_POST['month'].'-'.$_POST['date'].'T00:00:00','EmailAddress'=>$_POST['email'],'EnrolmentMethod'=>'FAB','RegistrationType'=>'M','EcmCode'=>'FACEB'),
				'Addresses'=>array(
					'Address'=>array('Country'=>$_POST['country'],'IsPreferred'=>'true',
					'Usages'=>'HOME',
				'OrgID' => '',
				'PersonID' => '',
				'AddressID' => '',
				'LocationID' => '',
				'IsValidate' => ''
				
				))));
				
				//'EnrolmentMethod'=>'INT','RegistrationType'=>'M','EcmCode'=>'SCDXB';
				$result=$this->Webservice->enrollmember($params);
				$resultarr=(array)$result;
				if($result->wsResult->IsSuccess == '1') {
				
				/*if(1==1) {*/
					$_SESSION['sky_mem_id']= $resultarr['EnrollMemberResult']->Member->Username;
					//$_SESSION['sky_mem_id']= '00199975333';
					$this->insertdetailsWithoutEntry($resultarr,$validate='');
					header("Location: index.php?r=skywardsmember/userjourneyBcompleted");
					die();
				}
				else
				{
					$this->template="skywardsmembercheck_invitation";
				}
			}
			else
			{
				?>
				<script type="text/javascript">
					alert("All fields are compulsary");
				</script>
				<?php 
				$this->template="accept_invitation";
				$this->render();
			}
		}
		if(isset($_POST['validate']) && $_POST['validate']!="")
		{
			//if(isset($_POST['fn']) && $_POST['fn']!="" && isset($_POST['ln']) && $_POST['ln']!="" && isset($_POST['country']) && $_POST['country']!="" && isset($_POST['email']) && $_POST['email']!="" && isset($_POST['country']) && $_POST['country']!="" && isset($_POST['password']) && $_POST['password']!="" && isset($_POST['que']) && $_POST['que']!="")
			if(isset($_POST['vmn']) && $_POST['vmn']!="")
			{
				$params = array('cardNumber'=> trim($_POST['vmn']));
				$result=$this->Webservice->validatemembershipnumber($params);
				/*echo '<pre>';
				print_r($result);*/
				$resultarr=array();
				$resultarr=(array)$result;
				$member_check =strstr($result->wsResult->Message, 'UDE-8143:');
				if($member_check!='')
				{
					$_SESSION['sky_mem_id']=$_POST['vmn'];
					/*$fb_details=$this->getFBUserData();
					$fb_id=$fb_details['fb_user_id'];
					$_SESSION['sky_mem_id']=$_POST['vmn'];
					$skywards_member_number=$_POST['vmn'];
					$params=array('sky_mem_id'=>$skywards_member_number);
					$where= 'fb_id='.$fb_id;
					$table_name='user';*/
					//$this->Skywardsmember->update($params,$table_name,$where);
					$this->insertdetailsWithoutEntry($resultarr,$validate='yes');
					header("Location: index.php?r=skywardsmember/userjourneyBcompleted");
					die();
					}
				else
				{
					$this->template="skywardsmembercheck_invitation";
				}
			}
		}
		
		$fbdtlarray=$this->getFBUserData();
		$resarray=array();
		$resarray=array_merge($resultarr,$fbdtlarray);
		$this->render($resarray);
	}
	public function invitation() {
		// check valid Entry 
		if(!$this->Skywardsmember->isValidEntry($_SESSION['invitation_data']['entry_id'],$_SESSION['invitation_data']['data'],$this->fb_user_info)) {
			// handle invalid entry here
			echo "Invalid Entry";
			die();
		}
		
		// check if user already added to system
		$user_id=$this->Users->userExists($this->fb_user_info);
		if($user_id)
		{
		
			$this->AcceptInvitation();
			header("Location: index.php?r=skywardsmember/userjourneyBcompleted&status=alreadyMember");
			die();
		}
		else 
		{
			header("Location: index.php?r=skywardsmember/skywardsmembercheck_invitation");
			die();
		}
		
	}
	
	public function userjourneyBcompleted() {
		$this->template="accept_invitation";
		$data['FirstName'] = $_SESSION['EnrollMemberResult_FirstName'];
		$data['LastName'] = $_SESSION['EnrollMemberResult_LastName'];
		$data['Username'] = $_SESSION['EnrollMemberResult_Username'];
		
		$userData=$this->Users->getUserdata($this->fb_user_info['id']);
		
		$data['member_since']=date("d/m/Y",strtotime($userData->created_date));
		
		$this->render($data);
	}
	public function AcceptInvitation() {
		$this->Skywardsmember->AcceptInvitation($_SESSION['invitation_data']['entry_id'],$_SESSION['invitation_data']['data']);
		if(SEND_NOTIFICATION_EMAIL_WALL==true) {
		$Entry=$this->Skywardsmember->getEntry($_SESSION['invitation_data']['entry_id']);
		
		$entry_details=$this->Skywardsmember->entryDetails($_SESSION['invitation_data']['entry_id'],$_SESSION['invitation_data']['data']);
		
		$msg=str_replace('%USER%',$this->fb_user_info['first_name'],str_replace('%CITYNAME%',$Entry->city_name,INVITATION_ACCEPTANCE_MESSAGE));
		$user_ids=array($Entry->fb_id);
		
		
		$datatoPass="ACCEPTANCE|".$entry_details->user_entry_details_id;
		$this->Fb_common_func->send_notification($this->facebook,$msg,$user_ids,APP_TOKEN,$this->fb_user_info['id'],$datatoPass);
		}
	}

}
?>