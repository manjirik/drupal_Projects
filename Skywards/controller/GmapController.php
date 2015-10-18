<?php
class GmapController extends BaseController {
	
	public $fbfriend;
	public function __construct() {
		parent::__construct();
		$this->loadModel('Gmap');
		$this->loadModel('Getcity');
		$this->loadLibrary('Googlemaps');
		$this->loadLibrary('Fb_common_func');
		$this->loadModel('FbfriendsLocation');
		$this->IsAjaRequest=$this->IsAjaxRequest();
		$loadFb=(isset($_GET['loadFb']) && $_GET['loadFb']!="")?$_GET['loadFb']:0;
		
		try {
			$this->fbfriend=$this->fb_common_func->getUserFriends($this->facebook, $this->getFbAccessToken(),$this->fb_user_info['id'] );
		}
		catch(Exception $e) {
			ApplicationErrorHandler("",serialize($e),__FILE__,__LINE__);
			$this->fbfriend=array();
			
		}
	
	}
	public function index(){			
		$this->map_view_emerites_city();
	}
	
	
	
	public function map_view_emerites_city() {
	
		 $data['mymap'] = 1;

		try {
			$access_token=$this->getFbAccessToken();
			
		}
		catch(Exception $e) {
			ApplicationErrorHandler("",serialize($e),__FILE__,__LINE__);
		}

		try
		{

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
		}
		catch(Exception $e) {
			ApplicationErrorHandler("",serialize($e),__FILE__,__LINE__);
		}
		logMe("fb_user_info gmap: ".serialize($this->fb_user_info),__FILE__,__LINE__);
		
		$user= $this->fb_user_info;
		
		$UserLocation=$this->Getcity->getUserLocation($user['id']);
		
		if(!isset($UserLocation) || $UserLocation=="" || !$UserLocation) {
		
			if(isset($user['location']['name']) && $user['location']['name']!="")
			{
				$UserLocation=$user['location']['name'];
			}
			else if(isset($user['hometown']['name']) && $user['hometown']['name']!="")
			{
				$UserLocation=$user['hometown']['name'];
			}
			else if(isset($_SESSION['fb_user_location']) && $_SESSION['fb_user_location']) {
				$UserLocation=$_SESSION['fb_user_location'];
			}
			else if(isset($_SESSION['fb_user_hometown']) && $_SESSION['fb_user_hometown']) {
				$UserLocation=$_SESSION['fb_user_hometown'];
			}
		
		}
		
		if(isset($UserLocation) && $UserLocation!="") {
			$this->assign('userCity',$UserLocation);
		$objCitydata = $this->Getcity->getCityLatlant($UserLocation);
		$destinations['lati'] = $objCitydata->lat;
		$destinations['longi'] = $objCitydata->lng;
		
		$user_location_id=$this->Getcity->getLocationid($UserLocation, $objCitydata);
		
		$user_location = $UserLocation."~". $destinations['lati'].",".$destinations['longi']."~"."currentuser~".$user_location_id;
		}
		
		$EmiratesCityArray=$this->Getcity->getEmiratesCities();		
	 	if(count($EmiratesCityArray) > 0) {
			$allDataArr = array();
	 		foreach($EmiratesCityArray as $cityinfo) { 
					$city = $cityinfo->city_name;
					$allDataArr[$city] = $cityinfo->latitude.",".$cityinfo->longitude."~".$cityinfo->temprature."~".$cityinfo->city_image."~".$cityinfo->country_name."~".$cityinfo->location_id."~".$cityinfo->short_desc;
			}
		 	if(count($allDataArr) > 0) {
				$allData['data']['city'] = $allDataArr;				
			}
			$this->assign('EmiratesCityArray',$EmiratesCityArray);
			$this->assign('allData',$allData['data']['city']);
	 	}		
		
		if(isset($this->fb_user_info['id']))
		$this->assign('CurrentUserID',$this->fb_user_info['id']);
		$this->assign('status_noti',$status_noti);
		
		
		
		if(isset($user_location))
		$this->assign('currentUser',$user_location);
		
		if(($_REQUEST['status']=="change_destination" || $_REQUEST['status']=="change_friends") && $_SESSION['tbl_user_entry_id'] && $_SESSION['tbl_user_id'] && $_SESSION['old_location_id'])
		{	
			$location_id = $_SESSION['old_location_id'];
			if($location_id!="") {
				$get_location_details = $this->Gmap->getLocationDeatils($location_id);
			}else
			{
				die("issue with session ");
			} 
			
			$this->assign('get_location_details',$get_location_details);
		
		}
		/* Not getting any reference of this variable,hence will comment this - Manish */
		//$this->assign('got_fb_user_data',$got_fb_user_data);
		
		/* --------------------Now, fetch all facebook friends -------------------*/
	
		$friends=$this->fbfriend;
					
		$friends=$this->getFriendsCustomized($friends);

		$FriendsByLocation=$this->getFbFriendsByLocation();
						
		$userCityParts=explode(",",$UserLocation);
		$userCity=$userCityParts[0];
		
		
		$FriendsByLocation['data'][$userCity]['data'][]=array(
									'uid'=>$user['id'],
									'first_name'=>$user['first_name'],
									'last_name'=>$user['last_name']);
		$FriendsByLocation['data'][$userCity]['loggedInUser']=1;
				
		//duplicate array call removed: Manish
		//$unlocated=$this->getFriendsCustomized($FriendsByLocation['unlocated']);
		$unlocated=$FriendsByLocation['unlocated'];
				
		$this->assign('FriendsByLocation',$FriendsByLocation);
		$this->assign('user',$user);
		$this->assign('friends',$friends);
		$this->assign('unlocated',$unlocated);
		
		/* Facebook friends fetching done */
		
		$fbfriendImg = $this->socialsupportbar();
		$this->assign('landing_random_users',$fbfriendImg);
		
		$fields = array('*');
		$where = "is_emirates_location = '1' AND status = '1'";
		$getresult = $this->Gmap->getResults($fields, $table_name='location', $where, $limit='all',$order_by="");
		$cnt_location = count($getresult);
		$this->assign('location_cnt',$cnt_location);

		/* continent lock script*/

		$fb_id=$_SESSION['fb_user_id'];
		$fields = array('user_id');
		$where="fb_id='".$fb_id."'";
		$getuserresult = $this->Gmap->getResults($fields, $table_name='user', $where, $limit=1);
		$user_id = $getuserresult[0]->user_id;
        $continent_data= $this->Gmap->fetch_locked_continents($user_id);
		foreach ($continent_data as $cont_key=>$cont_val)
		{
			$continent_id=$cont_val['continent_id'];
			$continent_name=$cont_val['continent_name'];
			$where_fields="continent_id=".$continent_id." AND is_emirates_location = '1' AND status = '1'";
			$continent_locked_cities=$this->Gmap->getResults(array('city_name'), $table_name='location', $where_fields, $limit='all');
			foreach($continent_locked_cities as $continent_locked_cities_data)
			{
				$continent_locked_cities_arr[]= $continent_locked_cities_data->city_name;
			}
			
		}

		$this->assign('continents_locked',$continent_data);
		$this->assign('continent_locked_cities',$continent_locked_cities_arr);


		
		$this->template="map_view_emerites_city";
		//$this->AddDynamicJs(BASEPATH.DS."view".DS."gmap".DS."js_map_view.php");
		
		$this->render($data);
	}
	
	public function getFriendsCustomized($friends) {
		$data=array();
		if($friends=='' || !is_array($friends) || count($friends)==0) 
		{
			return $data;
		}
		
		foreach($friends as $key=>$friend) {
			if($this->FbfriendsLocation->HasAccessedApp($friend['uid'])==false) {
				$data[]=$friend;
				unset($friends[$key]);
			}
		}
		
		foreach($friends as $frnd) {
			$data[]=$frnd;
		}
		return $data;
		
	}
	
	public function getFbFriendsByLocation() {
		ApplicationErrorHandler("custom","getFbFriendsByLocation started",__FILE__,__LINE__);
		$friends=$this->fbfriend;
		
		$data=array();
		$unlocated=array();
		$ret=array();
		foreach($friends as $friend) {
		//var_dump($friend);
			$friendLocation="";
			if(isset($friend['current_location']['name']) && $friend['current_location']['name']!="") {
				$friendLocation=$friend['current_location']['name'];
			}
			else if(isset($friend['current_location']['city']) && $friend['current_location']['city']!="") {
				$friendLocation=$friend['current_location']['city'];
			}
			else if(isset($friend['hometown_location']['name']) && $friend['hometown_location']['name']!="") {
				$friendLocation=$friend['hometown_location']['name'];
			}
			else if(isset($friend['hometown_location']['city']) && $friend['hometown_location']['city']!="") {
				$friendLocation=$friend['hometown_location']['city'];
			}
			if($friendLocation!="") {
				$cityParts=explode(",",$friendLocation);
				$city=(isset($cityParts[0]) && $cityParts[0]!="")?$cityParts[0]:'';
				
				// One hardcoding for delhi. This needs to be removed from here..
				if(strtolower($city)=='new delhi') $city='Delhi';
				if($city!='') {
					
					$d=array();
					$d['uid']=$friend['uid'];
					//$d['hasAccessedApp']=$this->FbfriendsLocation->HasAccessedApp($friend['uid']);
					$d['first_name']=$friend['first_name'];
					$d['last_name']=$friend['last_name'];
					$d['pic_small']=$friend['pic_small'];
					if(!isset($data[$city]['latlang'])) {
						$data[$city]['latlang']=$this->Getcity->getCityLatlant($city);
						$data[$city]['isEmirates']=$this->Getcity->IsEmiratesCity($city);
					}
					$data[$city]['data'][]=$d;
				}
				else {
					$unlocated[]=$friend;
				}
			}
			else {
				$unlocated[]=$friend;
			}
			
		}
		$ret['unlocated']=$unlocated;
		$ret['data']=$data;
		ApplicationErrorHandler("custom","getFbFriendsByLocation end",__FILE__,__LINE__);
		return $ret;
	}
	
	
	
	
	public function currentUserLocation($city) {	
	
		
		$destinations = $this->FbfriendsLocation->getLangLat($city);
		
		$config['zoom'] = '3';
		$config['center'] = $destinations['lati'].",".$destinations['longi'];//$destination;
		$marker['position'] = $destinations['lati'].",".$destinations['longi'];//$destination;
		$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='.$city.'|9999FF|000000';
		$this->Googlemaps->add_marker($marker);
		
		$circle['center'] = $destinations['lati'].",".$destinations['longi'];//$destination;
		$circle['radius'] = '100';
		$this->Googlemaps->add_circle($circle);
		
		
		
		$this->Googlemaps->initialize($config);
		$map = $this->Googlemaps->create_map();
		
		$this->assign('map',$map);
		$this->template="map_view";
		$this->render();
	}
	
	public function highlightDestination() {
         $config['center'] = '18.52242271380059,73.8552474975586';
         $config['kmlLayerURL'] = SITE_URL.'kml/africa.kml';
         //$config['zoom'] = '3';
         //$config['center'] = '25.271009345647187, 55.30755526123039';

         /*$dreamDestinations = $this->Commonfunc->getDreamDestinations();
         foreach ($dreamDestinations as $dreamkey => $dreamDestination) {
             $marker = array();
             $marker['position'] = $dreamDestination;
              $this->Googlemaps->add_marker($marker);
         }*/

         $marker = array();
         $marker['position'] = "18.52242271380059,73.8552474975586";
         $marker['onclick'] = "selectDestination('".$marker['position']."')";
         $this->Googlemaps->add_marker($marker);

         $marker = array();
         $marker['position'] = "26.863280626766237,75.76171875";
         $marker['onclick'] = "selectDestination('".$marker['position']."')";
         $this->Googlemaps->add_marker($marker);

         $marker = array();
         $marker['position'] = "13.111580118251648,80.244140625";
         $marker['onclick'] = "selectDestination('".$marker['position']."')";
         $this->Googlemaps->add_marker($marker);

         $marker = array();
         $marker['position'] = "24.886436490787712,67.0166015625";
         $marker['onclick'] = "selectDestination('".$marker['position']."')";
         $this->Googlemaps->add_marker($marker);

         $marker = array();
         $marker['position'] = "39.842286020743394,116.54296875";
         $marker['onclick'] = "selectDestination('".$marker['position']."')";
         $this->Googlemaps->add_marker($marker);

         $marker = array();
         $marker['position'] = "34.52466147177172,69.2138671875";
         $marker['onclick'] = "selectDestination('".$marker['position']."')";
         $this->Googlemaps->add_marker($marker);
         
          $marker = array();
         $marker['position'] = "17.97873309555617, 9.140625";
         $marker['onclick'] = "selectDestination('".$marker['position']."')";
         $this->Googlemaps->add_marker($marker);
         
          $marker = array();
         $marker['position'] = "-12.554563528593656, 19.3359375";
         $marker['onclick'] = "selectDestination('".$marker['position']."')";
         $this->Googlemaps->add_marker($marker);

         $this->Googlemaps->initialize($config);

         $map = $this->Googlemaps->create_map();
         //print_r($map);
         $this->assign('map',$map);
         $this->template="highlight_view";
         $this->render();
     }

     public function selectDestination()
     {
         $latLan=$_GET["latLan"];
         $response = $this->Gmap->selectDestination($latLan);
         if($response  === false){
             $resMsg = "This continent already chossen by you. Please select another.";
             echo $resMsg;
         }else{
             $resMsg = "Destination is selected as dream destination.";
             echo $resMsg;
         }
     }

	/*
	 * Function name: get_city_data() do not use this function is discarted
	 * Purpose: get the city temprature from API
	 * Parameters: Cit name 
	 * 	$fields = array, table columns
	 * 	$values = array, columns values
	 * 	$table_name = string
	 * Return value: 
	 * 	True: inserted rows
	 * 	False: fail
	 * Created By: Rajesh Patil / 2013-01-02
	 * Updated By: Rajesh Patil / Date	 
	 *
	 */
	 
	public function get_city_data()
	{
       $city_name=$_GET["city"];
	 
		$city_data = $this->Gmap->getCityInfo($city_name);
		$weather_info = $this->Gmap->getWeatherInformation($city_name);
		
		$html_city_info = $this->Commonfunc->get_city_info_html($city_data , $weather_info);
		echo $html_city_info;
	}
	
	/* public function insetDestination()
	{	
		if(!empty($_GET["fbu_id"]))
		{
			$dataRespone = $this->Gmap->SaveDestination($_GET["loc_id"],$_GET["fbu_id"]);
			
			if($dataRespone == "NEWENTRY") 
			{	
				$where = "fb_id=".$_GET["fbu_id"];
				$fields = array("user_id");
				$fbid_userid = $this->Gmap->getResults($fields, $table_name="user", $where, $limit="1");
				
				$insetData['user_id'] = $fbid_userid[0]->user_id;
				$insetData['location_id'] = $_GET["loc_id"];
				$result = $this->Gmap->insert($insetData,$table_name='user_entry');
				echo $result;
				
			}else
			{
				echo $dataRespone;
				
			}	
		}
		else
		{
			echo "FB ID not Found";
			
		}
		$friends = $this->Fb_common_func->getUserFriendsData($this->facebook);
		
		foreach ($friends['data'] as $key=>$val)
		{
			$data1[$key] = $val['id'];
		}
		//print_r($data1);
		$getresult = $this->Gmap->getuserwheredesti($_GET["loc_id"]);
		foreach ($getresult as $key=>$value) {
			$data2[] = $getresult[$key]->fb_id;
		}
		
		$data2=array_unique($data2);
		//print_r($data2);
		$result=array_intersect($data1,$data2);
		$result_cnt=count($result);		
		if($result_cnt<DISPLAY_IMAGE_FB)
		{
				$temparr = array_diff($data2, $result);
				$result=array_merge($result,$temparr);
		}
		
		$getres= implode(',',array_slice($result,0,5));
		echo $savedata .'||'.$getres;
	} */
	 
	public function InsertEntryDetails() {
	
	$params=array();
 	//print_r($_REQUEST['selectedFrnds']);

	$i =0;
		
	$selectedFrnds1 = explode(",", $_REQUEST['finalselectedFrnds']);
	foreach($selectedFrnds1 as $key=>$val)
	{
		$selectedFrnds2 = explode("#", $selectedFrnds1[$key]);
		//foreach ($selectedFrnds2 as $key1=>$val1)
		//print_r($selectedFrnds2);
		/*for($i=0;$i<count($selectedFrnds2);$i++) 
		{*/
			if(strstr($selectedFrnds2[0], '@') ===false){
				$tempA[$selectedFrnds2[0]]['friend_id'] = $selectedFrnds2[0];
				$tempA[$selectedFrnds2[0]]['friend_email'] ='';
				$tempA[$selectedFrnds2[0]]['acceptance_status'] =0;
				$tempA[$selectedFrnds2[0]]['acceptance_date'] ='';
				$tempA[$selectedFrnds2[0]]['profile_img'] ='';
				$tempA[$selectedFrnds2[0]]['firstname'] =$selectedFrnds2[1];
				$tempA[$selectedFrnds2[0]]['lastname'] =$selectedFrnds2[2];
				
			} else{
				$tempA[$selectedFrnds2[0]]['friend_id'] = null;
				$tempA[$selectedFrnds2[0]]['friend_email'] =$selectedFrnds2[0];	
				$tempA[$selectedFrnds2[0]]['acceptance_status'] =0;
				$tempA[$selectedFrnds2[0]]['acceptance_date'] ='';
				$tempA[$selectedFrnds2[0]]['profile_img'] ='';
				$tempA[$selectedFrnds2[0]]['firstname'] =$selectedFrnds2[1];
				$tempA[$selectedFrnds2[0]]['lastname'] =$selectedFrnds2[2];
			}
			
		$i++;
		//}
	}
	
	
	foreach($_GET['users'] as $user) {
	
		$params['entry_id']=$_GET['entry_id'];
		$params['user_id']=$user;
		$params['email']='';
		//$_SESSION['selected_friends_details'][]=array('friend_id'=>$user,'friend_email'=>$email);
		//$this->Gmap->SaveEntryDetails($params);
	}
	

		$intersect = array_intersect_key($_SESSION['old_selected_friends_details'],$tempA);
		$diff=array_diff_key($tempA, $_SESSION['old_selected_friends_details']);
		$res=array_merge($diff, $intersect);
		if (count($res) == 0 ) {
			$res = $tempA;
		}
		$_SESSION['selected_friends_details']= $res;
		
		/*echo "<pre>";
		print_r($intersect);
		print_r($tempA);
		print_r($diff);
		print_r($res);
		 die();*/
		 /* echo "<pre>";
		print_r($_SESSION['selected_friends_details']);
		echo "<pre>";
		print_r($_SESSION['old_selected_friends_details']);
		print_r($res);
		exit;  */
		
		//print_r($_SESSION['old_selected_friends_details']);
		
		// save user's current location
		if(isset($_REQUEST['UsersCurrentCity']) && $_REQUEST['UsersCurrentCity']!="") {
			$req=explode("||",$_REQUEST['UsersCurrentCity']);
			$city=$req[1];/*
			$data=array('fbid'=>$this->fb_user_info['id'],'city'=>$city);
			$this->Gmap->setCurrentLocation($data);*/
			$_SESSION['fb_user_location']=$city;
		}
		
		//
		if($_REQUEST['status']!= "change_destination" && $_REQUEST['status']!="change_friends") {
			header("Location: ".SITE_URL."/index.php?r=skywardsmember/skywardsmembercheck");
		}else
		{
				header("Location: ".SITE_URL."/index.php?r=myentries/show_entries&status=".$_REQUEST['status']);
		}
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

	public function checkWildCardUser()
	{  
       //$userlist='100003618890095,100004235285323,100000670101825,566769531,10000045284033341';
	   $userlist=$_GET['userlist'];
	   if(isset($userlist))
		{
	       $wildcardstatus = $this->Gmap->checkWildCardUser($userlist);
			if($wildcardstatus >= 5)
			{
				echo "fail";
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

	public function socialsupportbar()
	{	
		$FBUserData = $this->getFBUserData();
		$ids = '';
		$data = array();
		if( isset($FBUserData['fb_user_friends_id']) && $FBUserData['fb_user_friends_id'] != '' ){						 
			$ids  = $FBUserData['fb_user_friends_id'];
		}	
		
		$fields = array('fb_id,firstname,lastname,user_id');
		$where = "fb_id IN ($ids)";
		$order_by = "ORDER BY RAND()";
		$limit= 10;
		$user_freinds_from_db = '';
		$getresult = $this->Gmap->getResults($fields, $table_name='user', $where, $limit,$order_by);
		
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
	
	public function getFriendsForSelectedDestination(){
	 	/* Added by Rajesh Patil for save selected destination into session */
		 $location_id = $_REQUEST['location_id'];
		 $_SESSION['location_id'] = $location_id;
		 $_SESSION['selectedDestionLat'] =  $_GET['selectedDestionLat'];
		 $_SESSION['selectedDestionLong'] =  $_GET['selectedDestionLong'];
		 $_SESSION['cityName'] =  $_GET['cityName'];
		 $_SESSION['countryName'] =  $_GET['countryName'];
		
		 /* End here */
		$limit_friends = 3; 
		$return_arr = array();
		$html = '';
		$name_html = '';
		$wheather_html  = '';
		$temperture = $_REQUEST['temperature'];
		
		$FBUserData = $this->getFBUserData();
		$ids = '';
		$data = array();
		if( isset($FBUserData['fb_user_friends_id']) && $FBUserData['fb_user_friends_id'] != '' ){						 
			$ids  = $FBUserData['fb_user_friends_id'];
		}		

		$cnt = 0;
			
		if ($ids !="") {
				$data = $this->Gmap->getDestinationFriends($location_id,$ids);				
				$total_friends = count($data);
				$flag = true;
				//$html .=  '<span class="pics">';	
				$concat_and = ' and ';				
				foreach ($data as $key=>$value) {	
					$cnt++;
					$concat_and = '';
					//$img = $this->Fb_common_func->get_fb_user_pic($data[$key]->fb_id);						 
					$name[] = $data[$key]->firstname.' '.$data[$key]->lastname;
					$cnt_name=count($name);
					if($cnt_name==1){
						$names_concat=$name[0]." has ";
					}
					else if($cnt_name==2){
						$names_concat=$name[0] ." and ". $name[1]." have ";
					}
					else if($cnt_name==3){
						$names_concat=$name[0] ." , ". $name[1]." and ". $name[2]." have ";
					}
					else if($cnt_name>3){
						$names_concat=$name[0] ." , ". $name[1]." , ". $name[2]." and other have ";
					}					
					else
					{
						$names_concat='';
					}
				}	
		}
		
		if($names_concat !=""){
			//$name_html .= $names_concat.' have selected '.$_SESSION['cityName'].' too';
			$name_html .= $names_concat.' selected '.$_SESSION['cityName'].' too';
		}
		/*if($temperture !=""){
			$wheather_html .=  '<div id="weatherDiv"> The weather there is currently '.$temperture.'  celsius </div>';	
		}*/
			
		//echo $html.$name_html.$wheather_html;
		//echo $name_html.$wheather_html;
		echo $name_html;
	
	}
	
function entry_ticket_status()
	{
		
		$fields = array('user_id','email');
		$fb_id=$_SESSION['fb_user_id'];
		//$fb_id='100003618890095';
		$where="fb_id='".$fb_id."' and sky_mem_id != '' ";
		$getresult_user = $this->Gmap->getResults($fields, $table_name='user', $where, $limit=1);
		
		if(!empty($getresult_user) && $getresult_user[0]->user_id!='')
		{
			$_SESSION['tbl_user_id']=$getresult_user[0]->user_id;
			
			$fields = array('user_entry_id');
			$user_id=$_SESSION['tbl_user_id'];
			$where="user_id='".$user_id."'";
			$order_by="order by user_entry_id desc";
			$getresult_user_entry = $this->Gmap->getResults($fields, $table_name='user_entry', $where, $limit=1,$order_by);
			if($getresult_user_entry[0]->user_entry_id!='' && !empty($getresult_user_entry)) {
				$_SESSION['tbl_user_entry_id']=$getresult_user_entry[0]->user_entry_id;
				$fields = array('user_entry_details_id');
				$user_entry_id=$_SESSION['tbl_user_entry_id'];
				$where="user_entry_id='".$user_entry_id."' && acceptance_status !=1";
				$getresult_user_entry_details = $this->Gmap->getResults($fields, $table_name='user_entry_details', $where, $limit='all');
				if(!empty($getresult_user_entry_details)){
					echo "false";
				}
				else
				{
					echo "true";
				}	
				
			}
			else
			{
				echo "true";
			}
		}
		else
		{
			echo "true";
		}
	}
	
	
}