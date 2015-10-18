<?php 
class Notification extends BaseModel {

	public function __construct() {
		parent::__construct();
		$this->user_notifications_table = 'user_notifications';	
		$this->notification_table = 'notification';	
		
		/* Custom notification types */
		 
		$this->notification_types = array("1"=>array("type"=>"NEW_OFFER",
													"title"=>"New Offer",
													"desc"=>"Thakyou.. you have offer for Emirates skywards program.",
											   		 ),
										  "2"=>array("type"=>"FREIND_JOINED",
													"title"=>"Your friend joined",
													"desc"=>"Congr8s!.. Your friend has just joined the Skywards.",
											   		 ),
										  "3"=>array("type"=>"TICKET_READY",
													"title"=>"Entry ticket is ready",
													"desc"=>"Congr8s!.. Your entry ticket is ready for draw..",
											   		 )
											);
				
	}

	 public function getUserNotifications($userId,$startIndex='0',$offset='2'){
		$fields = array("SQL_CALC_FOUND_ROWS *");	
		$where = "fb_id_receiver ='$userId'";
		$limit = "$startIndex, $offset";
		$order_by = "ORDER BY id DESC";
		
	 	/*echo $sql = "SELECT SQL_CALC_FOUND_ROWS  * FROM $this->user_notifications_table WHERE $where $order_by LIMIT $limit"; 
	 	  $get_results1['dataSet1'] = $this->db->get_results($sql);
		  echo "<br>start from notification.php<br><pre>";
		  print_R($get_results1);
		  echo "################################";
		*/		
		$get_results['dataSet'] = $this->getResults($fields,$this->user_notifications_table,$where,$limit,$order_by);	
		$get_results['total_results'] = $this->getNotificationCount();	
		
	 	return $get_results;
	 }
	 
	 public function getNotificationCount(){
		$sql_cnt = "SELECT FOUND_ROWS() AS found_rows";
		$rows = $this->db->get_row($sql_cnt);
		return $rows->found_rows;    		
	 }
	 
 	public function getUserNotificationsCount($userId,$type='',$status=''){
		
		$startIndex='0';
		$offset='1';
 		$where = '';
		$limit = "$startIndex, $offset";
		$order_by = 'ORDER BY id DESC';
 		if($status == 0){
 			$where = " status='$status' And fb_id_receiver ='$userId' ";
 		}
 		if($status == 1){
 			$where = " status='$status' And fb_id_receiver ='$userId' ";
 		}
		$fields = array('count(*) as cnt');		 	
		return $get_results = $this->getResults($fields,$this->user_notifications_table,$where,$limit,$order_by);	

		/*$sql = "SELECT count(*) as cnt FROM $this->user_notifications_table WHERE fb_id_receiver ='$userId' $where $order_by $limit "; 	 	
         $get_results11 = $this->db->get_results($sql);		*/
		/*return $get_results;*/		
	 	
	 }
	 
	 public function getNotficationByType($type){
	 	$notification_title = $this->notification_types[$type]['title'];
	 	$notification_desc = $this->notification_types[$type]['desc'];	
	 	return array("title"=>$notification_title, "desc"=>$notification_desc);
	 	
	 }
	 
 	public function updateNotificationStatus($user_id){
	 	/* $sql = "UPDATE $this->user_notifications_table SET status=1 WHERE fb_id_receiver='$user_id'";
	 	 $this->db->query($sql);*/
		$data['status'] = '1';
		$where = " fb_id_receiver=$user_id";
		$this->update($data,$this->user_notifications_table,$where);
	 	
	 }
	 
	public function getResults($fields, $table_name, $where, $limit,$order_by) {		
		return parent::getResults($fields, $table_name, $where, $limit,$order_by);
	}
		
	public function getUserById($user_id){
			$where = " fb_id='$user_id'";
			return $data = $this->getResults(array(),"user",$where, 1);
		}
		
	public function update($params,$table_name,$where) {		
		return parent::update($params,$table_name,$where);
	}
	 
   public function getNotficationDetails($notification_id){
   $startIndex='0';
   $offset='1';
   $fields = array("idnotification,notification_title,notification_desc,notification_desc1,notification_time");	
		$where = "idnotification='$notification_id'";
		$limit = "$startIndex, $offset";
		$order_by = "ORDER by idnotification ";
	$get_results = $this->getResults($fields,$this->notification_table,$where,$limit,$order_by);
	
 	return $get_results;
   }
   
   public function get_un_read_title()
	{
        $sql = "SELECT n.notification_desc FROM `notification` as n , user_notifications as un WHERE un.notification_id =n.idnotification and un.fb_id_receiver='".$_SESSION['fb_user_id']."' and un.status=0";
		$res_title=$this->db->get_results($sql);
		return $res_title;
	}
   
   
	 
	 
	 
}