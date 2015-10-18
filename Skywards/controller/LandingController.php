<?php
class LandingController extends BaseController {
	
	public function __construct() {
		parent::__construct();	
		$this->loadModel('Users');		
		$this->loadModel('Skywardsmember');
		$this->loadLibrary('Fb_common_func');
	}
	
	public function index(){ 
		
		$hasEntry=$this->Users->hasEntry($this->fb_user_info['id']);
		if($hasEntry) {
			header("Location: index.php?r=myentries/show_entries");
			exit();
		}
		$this->assign('padBt35','padBt35');
		$landing_random_users = $this->getSocialSupportBarUsers();
		 
		$this->assign('landing_random_users',$landing_random_users);
		
	/*
		$result_noti=$this->Fb_common_func->parsePageSignedRequest();
		if(!empty($result_noti))
		{
		    $status_noti= $result_noti->app_data;
		    //$status_noti="";
        }
		else
		{
			$status_noti= "";
		}
			$data['myhome'] = 1;
			$data['status_noti']=$status_noti;
			$this->assign('landing_data',$data);
			*/
			//$this->template="landing";
			$this->render();
	}
	
	/*
	 * Function name: getSocialSupportBarUsers
	 * Purpose: get Social Support Bar Users
	 * Parameters: none	 
	 * Return value: get fb_access_token from session / else get it thru FB call
	 * Created By: Sandip Patil / 2013-01-31
	 * Updated By: Your Name / Date	 
	 *
	 */
	public function getSocialSupportBarUsers() {
	$return_arr = array();
		$fields	=  array("fb_id,firstname,lastname");
		$order_by = "ORDER BY RAND()";
		$limit = 10;
		$where = '';
		$getresult = $this->Users->getResults($fields,$table_name='user',$where,$limit,$order_by);
		if($getresult && count($getresult))	{
		$cnt = 0;
			foreach ($getresult as $key=>$value) {
				$return_arr[$cnt]['fb_id'] = $getresult[$key]->fb_id;
				$img = $this->Fb_common_func->get_fb_user_pic($getresult[$key]->fb_id);
				$return_arr[$cnt]['image'] = $img;
				$return_arr[$cnt]['name'] = $getresult[$key]->firstname.' '.$getresult[$key]->lastname;
				$cnt++;
			}
		}
			return $return_arr; 
	}
	
	
	public function terms_and_conditions(){
		$data['myterms'] = 1;
		$this->template="terms_and_conditions";
		$this->render($data);
	}
	
	public function Faq(){
		$data['myterms'] = 2;
		$this->template="Faq";
		$this->render($data);
	}
	public function Prizes(){
		$data['myterms'] = 3;
		$this->template="Prizes";
		$this->render($data);
	}
	
	public function Privacy(){
		$data['myterms'] = 4;
		$this->template="Privacypolicy";
		$this->render($data);
	}

	public function notify_handler()
	{
			if(!empty($_REQUEST['status']))
		     {
               $status = $_REQUEST['status'];
			 }
			 else
		     {
               $status = "";
			 }

			
			$url = FB_PAGE_URL_PERMISSION."&app_data=".$status;
			//echo $url;
			//header("Location: $url");?>
			<script type="text/javascript">
				top.location.href="<?php echo $url; ?>";
				</script>
				<?php
			//die;
			
	}
	/*Get User id fort he privacy policy code start */

	public function getUserIdFromFbId($fb_id) {
	$return_arr = array();
		$fields	=  array("user_id");
		$order_by = "";
		$limit = 10;
		$where = 'fb_id='.$fb_id;
		$getresult = $this->Users->getResults($fields,$table_name='user',$where,$limit,$order_by);
		return $getresult; 
	}
	
	public function invitation() {
		//$this->assign('fb_user_info',$this->fb_user_info);
		$from_user=$this->Users->getFromUserEntry($_SESSION['invitation_data']['entry_id']);
		$this->assign('from_user',$from_user);
		
		$toUser=$this->Skywardsmember->entryDetails($_SESSION['invitation_data']['entry_id'],$_SESSION['invitation_data']['data']);
		
		$this->assign('toUser',$toUser);
		if(!isset($this->data['hasEntry']) || !$this->data['hasEntry'])
		{
			$this->assign('padBt35','padBt35');
		}
		$this->template='invitation';
		$this->render();
	}

	/*code end */

} 
?>