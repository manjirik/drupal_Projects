<style>
.pagination{margin:0px auto;}
.pagination li{float:left; margin:0px 5px 0px 0px;}
.pagination li:last-child{margin:0px;}
</style>
<?php
class NotificationController extends BaseController {
	
	public function __construct() {
		parent::__construct();
		$this->loadModel('Notification');
		$this->loadLibrary('Fb_common_func');
		$this->loadLibrary('Commonfunc');
		$this->items_per_page = 5;		
		$this->not_read_status = 0; 
	}
	
	public function index(){
		$notification_arr = array();
		$pagination = '';
		$keyword = '';
		$pageNumber  = 1;
		 $offset = $this->items_per_page;
		if(isset($_REQUEST['page'])){
			$pageNumber  = $_REQUEST['page'];
			 
		}
		$user_id  = 0; 
		 
		//$un_read_notifications = $this->un_read_notifications;
		
		$startIndex = ($pageNumber == 1)?(0):(($offset * ($pageNumber - 1)));
		if($fb_user_data=$this->getFBUserData()){
			$user_id = $fb_user_data['fb_user_id'];
			//$user_id = 1220631499;
		}
		
		if($user_id > 0){

			$res = $this->Notification->getUserNotifications($user_id,$startIndex,$this->items_per_page);
		    $updateval = $this->Notification->updateNotificationStatus($user_id);
			//$this->un_read_notifications = 0;

			$inc_not = 0;
			foreach($res['dataSet'] as $key=>$val){
				  
				 $id_user_receive = $val->id_user_receiver;
				 $fb_id_sender = $val->fb_id_sender;
				 $notification_type  = $val->notification_type;
				 $notification_id  = $val->notification_id;
				 $status  = $val->status;
				 
				 $sender_data = $this->Notification->getUserById($fb_id_sender);
				 $sender = 'Skywards';
				 if($fb_id_sender > 0){
				 	 $sender_data_arr =  $sender_data[0];
				 	 $sender = $sender_data_arr->firstname.' '.$sender_data_arr->lastname;
				 }
				 
				$notification_type_arr=$this->Notification->getNotficationDetails($notification_id);
				// $notification_type_arr = $this->Notification->getNotficationByType($notification_type);
				
				 $notification_arr[$inc_not]['from'] = $sender;
			//	 $notification_arr[$inc_not]['time'] = $val->timestamp;
				 $notification_arr[$inc_not]['title'] = $notification_type_arr[0]->notification_title;
				 $notification_arr[$inc_not]['desc'] = $notification_type_arr[0]->notification_desc;
				 $notification_arr[$inc_not]['desc1'] = $notification_type_arr[0]->notification_desc1;
				 $notification_arr[$inc_not]['time'] = $notification_type_arr[0]->notification_time;
				 $notification_arr[$inc_not]['notification_id'] = $notification_type_arr[0]->idnotification;
				 $notification_arr[$inc_not]['status'] = $status;
				// print_r( $sender_data);
				 $inc_not++;
			}		
		 
			$total =  $res['total_results'];

			if($total > $this->items_per_page){
				$pagination = $this->notification_pagination($keyword,$pageNumber,$offset,$total); 
			}
		
		}
	
		$this->assign('pagination',$pagination);
		$this->assign('notification_arr',$notification_arr);

		//$this->template="landing";
		$this->render();
	}

function notification_pagination($keyword,$pageNumber='1',$offset='12',$total)
{
	
	$page = $pageNumber;
	$cur_page = $page;
	$page -= 1;
	$per_page = $offset;
	$previous_btn = true;
	$next_btn = true;
	$first_btn = false;
	$last_btn = false;
	$start = $page * $per_page;
	$pageBand = 9;
	$pagePosition = 4;
	$no_of_paginations = ceil($total / $per_page);

	/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
	if ($cur_page >= $pageBand) {
	    $start_loop = $cur_page - $pagePosition;
	    if ($no_of_paginations > $cur_page + $pagePosition)
	        $end_loop = $cur_page + $pagePosition;
	    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - ($pagePosition*2)) {
	        $start_loop = $no_of_paginations - ($pagePosition*2);
	        $end_loop = $no_of_paginations;
	    } else {
	        $end_loop = $no_of_paginations;
	    }
	} else {
	    $start_loop = 1;
	    if ($no_of_paginations > $pageBand)
	        $end_loop = $pageBand;
	    else
	        $end_loop = $no_of_paginations;
	}
	
	/* ----------------------------------------------------------------------------------------------------------- */
	$msg = '';
	//$msg .= "<div class='pagination'><ul>";
	$msg .= "<ul class='pagination'>";
	// FOR ENABLING THE FIRST BUTTON
	if ($first_btn && $cur_page > 1) {
	    $msg .= "<li><a href='javascript:void(0)' onClick='javascript:changePage(1)'>First</a></li>";
	} else if ($first_btn) {
	    $msg .= "<li>First</li>";
	}
	
	// FOR ENABLING THE PREVIOUS BUTTON
	if ($previous_btn && $cur_page > 1) {
	    $pre = $cur_page - 1;
	    $msg .= "<li class='next'><a href='javascript:void(0)' onClick='javascript:changePage($pre)' ><img src='images/next.png' alt='Previous' /></a></li>";
	} else if ($previous_btn) {
	    $msg .= "<li class='next'><img src='images/next.png' alt='Previous' /></li>";
	}
	for ($i = $start_loop; $i <= $end_loop; $i++) {
		/*echo "<br><br>";
		echo "<br>".$start_loop;
		echo "<br>".$pagePosition;
		echo "<br>".$end_loop;
		echo "<br>".$no_of_paginations;*/
		if($i == $start_loop && $start_loop > $pagePosition){
    		$msg .= "<li><a href='javascript:void(0)' onClick='javascript:changePage($start_loop)'>. . .</a></li>";
 		}
	    if ($cur_page == $i)
	        $msg .= "<li>{$i}</li>";
	    else
	        $msg .= "<li><a href='javascript:void(0)' onClick='javascript:changePage($i)'>{$i}</a></li>";
	        
			if($i == $end_loop && $end_loop < $no_of_paginations){
	        	$msg .= "<li><a href='javascript:void(0)' onClick='javascript:changePage($end_loop)'>. . .</a></li>";
	        }
	}
	
	// TO ENABLE THE NEXT BUTTON
	if ($next_btn && $cur_page < $no_of_paginations) {
	    $nex = $cur_page + 1;
	    $msg .= "<li class='prev'><a href='javascript:void(0)' onClick='javascript:changePage($nex)'><img src='images/prev.png' alt='Next' /></a></li>";
	} else if ($next_btn) {
	    $msg .= "<li class='prev'><img src='images/prev.png' alt='Next' /></li>";
	}
	
	// TO ENABLE THE END BUTTON
	if ($last_btn && $cur_page < $no_of_paginations) {
	    $msg .= "<li><a href='javascript:void(0)' onClick='javascript:changePage($no_of_paginations)'>Last</a></li>";
	} else if ($last_btn) {
	    $msg .= "<li>Last</li>";
	}
	$msg = $msg . "</ul>";  // Content for pagination
	return $msg;
}
	 
	
	public function view() {
		$data=$this->Notification->view();		
	}

	/*
	 * Function name: trigger_notification
	 * Purpose: This function send fb notification to users.
	 *   Parameters:
	 * 	$fields= fb object,notification message,fb_id array,app token,originator id
	 * 	$values = oject,srting,array,string,int
	 * 
	 * Return value: 
	 * 	True: true
	 * 	False: false
	 * Created By: nitin tatte / 3/2/2013	 
	 * Updated By: nitin tatte / 3/2/2013	 
	 *
	 */

    //trigger facebook notification to friends and originator
	public function trigger_notification()
	{
       		
		 $result=$this->Fb_common_func->send_notification($this->facebook,'Skywards meet me here!',array('100001187318347','1220631499','1268065008','1347427052','566769531','1041266626','100004263879862','100000452840341'),APP_TOKEN,'566769531');

	     echo $result;
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

	public function send_email_notification()
	{
       		
		$result=$this->Commonfunc->send_email_notification('nitin.tatte@synechron.com',array('nits.tatte@gmail.com','spjahagirdar@gmail.com','sameer.kelkar@gmail.com'),'test message','this is my test message');
	     echo $result;
	}
} 
?>