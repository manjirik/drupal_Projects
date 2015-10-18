<?php 
logMe('jmvstart',__FILE__,__LINE__);
$mode=(isset($_REQUEST['status']) && $_REQUEST['status']!='')?$_REQUEST['status']:'';
?>
<script type="text/javascript">
		 var flag = false; 
        var myLatlng = new google.maps.LatLng(<?php echo MAP_LATITUDE; ?>,<?php echo MAP_LONGITUDE; ?>);
		var iw = new google.maps.InfoWindow();
        var geodesicPoly=null;
		var path=null;
		var userEmails=[];
		var SelectedDestination=[{"lat":"","lng":""}];
		var markersCitiesArray=[];
		var markersArray=[];
		var currentUserMarker;
		var selectedFrnds=[];
		var finalselectedFrnds=[];
		var pos=[];
		var allFrndBoxids=[];
		var currentUserArrLat;
		var allcities=[];
		var allcountries=[];
		var currentUserArrLng;
		var currentSelectedLocation="";		
		var mode = '<?php echo $mode; ?>';
		var marker=[];
		var map;
		var ib=[];
      function initialize() {
		$("#lastOpenDest").val('');
        var mapOptions = {
          zoom: <?php echo MAP_ZOOM; ?>, 
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			disableDefaultUI: true,
			center: myLatlng,
			 mapTypeControlOptions: {
              style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
              position: google.maps.ControlPosition.BOTTOM_CENTER
          },
          panControl: true,
          panControlOptions: {
              position: google.maps.ControlPosition.TOP_LEFT
          },
          zoomControl: true,
          zoomControlOptions: {
              style: google.maps.ZoomControlStyle.LARGE,
              position: google.maps.ControlPosition.TOP_LEFT
          },
          /* scaleControl: true,
          scaleControlOptions: {
              position: google.maps.ControlPosition.TOP_LEFT
          }, */
          /* streetViewControl: true,
          streetViewControlOptions: {
              position: google.maps.ControlPosition.TOP_LEFT
          } */
        };

        map = new google.maps.Map(document.getElementById('map_canvas'),
                mapOptions);

       /* Loading KML file using continent name*/
			<?php
			if(is_array($continents_locked)) {
			foreach ($continents_locked as $cont_key=>$cont_val)
			{
				$continent_name=$cont_val['continent_name'];
			?>
              // console.log('<?php echo $continent_name;?>');
				 /* KML For Asia*/
               
				<?php if($continent_name=="Asia") { ?>
								       	
					var kml_<?php echo $continent_name;?>_srilanka = new google.maps.KmlLayer('<?php echo SITE_URL;?>kml/Asia/Asia-sri-lanka.kml'
					,{suppressInfoWindows: true,clickable: false,map: map}
					);

					var kml_<?php echo $continent_name;?>_japan= new google.maps.KmlLayer('<?php echo SITE_URL;?>kml/Asia/Asia-japan.kml'
					,{suppressInfoWindows: true,clickable: false,map: map}
					);

					var kml_<?php echo $continent_name;?>_philippines = new google.maps.KmlLayer('<?php echo SITE_URL;?>kml/Asia/Asia-philippines.kml'
					,{suppressInfoWindows: true,clickable: false,map: map}
					);

					var kml_<?php echo $continent_name;?>_jakarta = new google.maps.KmlLayer('<?php echo SITE_URL;?>kml/Asia/Asia-jakarta.kml'
					,{suppressInfoWindows: true,clickable: false,map: map}
					);

					var kml_<?php echo $continent_name;?>_male = new google.maps.KmlLayer('<?php echo SITE_URL;?>kml/Asia/Asia-male.kml'
					,{suppressInfoWindows: true,clickable: false,map: map}
					);

					 var kml_<?php echo $continent_name;?> = new google.maps.KmlLayer('<?php echo SITE_URL;?>kml/Asia/Asia.kml'
					,{suppressInfoWindows: true,clickable: false,map: map}
					);

				<?php } ?>
                
				/* KML For America*/

				<?php if($continent_name=="America") { ?>
				   
				   var kml_<?php echo $continent_name;?> = new google.maps.KmlLayer('<?php echo SITE_URL;?>kml/America/America.kml'
					,{suppressInfoWindows: true,clickable: false,map: map}
					);
				<?php }?>

				/* KML For Australia*/
               <?php if($continent_name=="Australia") { ?>
														
					var kml_<?php echo $continent_name;?>_NewZealand = new google.maps.KmlLayer('<?php echo SITE_URL;?>kml/Australia/NewZealand.kml'
					,{suppressInfoWindows: true,clickable: false,map: map}
					);

					var kml_<?php echo $continent_name;?> = new google.maps.KmlLayer('<?php echo SITE_URL;?>kml/Australia/Australia.kml'
					,{suppressInfoWindows: true,clickable: false,map: map}
					);

				<?php } ?>

				/* KML For Europe*/
				
				<?php if($continent_name=="Europe") { ?>
				
					var kml_<?php echo $continent_name;?>_uk = new google.maps.KmlLayer('<?php echo SITE_URL;?>kml/Europe/Europe-uk.kml'
					,{suppressInfoWindows: true,clickable: false,map: map}
					);

					var kml_<?php echo $continent_name;?>_ireland = new google.maps.KmlLayer('<?php echo SITE_URL;?>kml/Europe/Europe-ireland.kml'
					,{suppressInfoWindows: true,clickable: false,map: map}
					);

					var kml_<?php echo $continent_name;?> = new google.maps.KmlLayer('<?php echo SITE_URL;?>kml/Europe/Europe.kml'
					,{suppressInfoWindows: true,clickable: false,map: map}
					);

				<?php } ?>

				/* KML For Africa*/

				<?php if($continent_name=="Africa") { ?>
			
					var kml_<?php echo $continent_name;?>_seychelles = new google.maps.KmlLayer('<?php echo SITE_URL;?>kml/Africa/Africa-seychelles.kml'
					,{suppressInfoWindows: true,clickable: false,map: map}
					);
					 
					var kml_<?php echo $continent_name;?>_comoros = new google.maps.KmlLayer('<?php echo SITE_URL;?>kml/Africa/Africa-comoros.kml'
					,{suppressInfoWindows: true,clickable: false,map: map}
					);

					var kml_<?php echo $continent_name;?>_mauritius = new google.maps.KmlLayer('<?php echo SITE_URL;?>kml/Africa/Africa-mauritius.kml'
					,{suppressInfoWindows: true,clickable: false,map: map}
					);

					var kml_<?php echo $continent_name;?> = new google.maps.KmlLayer('<?php echo SITE_URL;?>kml/Africa/Africa.kml'
					,{suppressInfoWindows: true,clickable: false,map: map}
					);

				<?php } ?>

			<?php
			}
			}
			?>

var styles = [
  {
    "featureType": "administrative.land_parcel",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "administrative.province",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "administrative.neighborhood",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "administrative.country",
    "stylers": [
      { "visibility": "on" }
    ]
  },{
    "featureType": "administrative.locality",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "landscape.natural.landcover",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "road.highway",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "road.arterial",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "road.local",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "transit.line",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "transit.station.airport",
    "elementType": "geometry",
    "stylers": [
      { "visibility": "on" },
      { "weight": 6.7 }
    ]
  },{
    "featureType": "poi",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "landscape.natural.landcover",
    "stylers": [
      { "visibility": "on" },
      { "color": "#dad5cb" }
    ]
  },{
    "featureType": "landscape.natural.terrain",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "water",
    "stylers": [
      { "visibility": "simplified" },
      { "color": "#f6f4ef" },
      { "lightness": 38 }
    ]
  },{
    "featureType": "administrative"  },{
    "featureType": "landscape.man_made",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "water"  },{
    "featureType": "administrative.country",
    "elementType": "labels",
    "stylers": [
      { "color": "#5b5853" },
      { "weight": 0.1 },
      { "visibility": "on" }
    ]
  },{
    "featureType": "administrative.country",
    "elementType": "geometry.stroke",
    "stylers": [
      { "color": "#5b5853" },
      { "weight": 0.3 },
      { "visibility": "off" }
    ]
  },{
    "featureType": "administrative.locality",
    "stylers": [
      { "visibility": "off" }
    ]
  }
];
		map.setOptions({styles: styles});
		
     <?php if($mode=='change_destination') { ?>
		if(mode == "change_destination") 
		{			
			$("#btn_select_friends").show();
			$("#changeDestinationBtn").hide();
			showDestinationSearch();			
			plotSelectedDestinations(1);
			plotAllDestinations();
			
			 <?php
				$session_data = $_SESSION['old_selected_friends_details'];
				$cnt = 1;
				foreach ($session_data as $key => $Fbval) {
				
				if($Fbval['friend_id']!="") {
					
					//$user_data=$this->fb_common_func->getFriendDetail($this->facebook,$Fbval['friend_id']);
					$first_name=$user_data['first_name'];
				}else 
				{ 
					$first_name=$Fbval['friend_email'];
					$email = str_replace("@", "", $Fbval['friend_email']);
					$first_name = str_replace(".com", "", $email);
				}
			
				$acceptance_status = $Fbval['acceptance_status'];
				$fullname=ucfirst($Fbval['firstname'])." ".ucfirst($Fbval['lastname']);
				?>
			ChooseFriend('<?php echo $Fbval['friend_id']; ?>','<?php echo ucfirst($Fbval['firstname']); ?>','<?php echo $Fbval['profile_img']; ?>','<?php echo $Fbval['friend_email'];?>','','<?php echo $acceptance_status; ?>','<?php echo $fullname; ?>',1);
			<?php $cnt++; } ?>
			nextButtonHide();			
		} 
		<?php } ?>
		<?php if($mode=='change_friends') { ?>
		if(mode=='change_friends') {
			showFriendSearch();
			plotSelectedDestinations(1);
			plotFbFriends();
			
			<?php
				$session_data = $_SESSION['old_selected_friends_details'];
				$cnt = 1;
				foreach ($session_data as $key => $Fbval) {
				
				if($Fbval['friend_id']!="") {
				
					//$user_data=$this->fb_common_func->getFriendDetail($this->facebook,$Fbval['friend_id']);
					$first_name=$user_data['first_name'];
				}else 
				{ 
					$first_name=$Fbval['friend_email'];
					$email = str_replace("@", "", $Fbval['friend_email']);
					$first_name = str_replace(".com", "", $email);
				}
			
				$acceptance_status = $Fbval['acceptance_status'];
				$fullname=ucfirst($Fbval['firstname'])." ".ucfirst($Fbval['lastname']);
				?>
			ChooseFriend('<?php echo $Fbval['friend_id']; ?>','<?php echo ucfirst($Fbval['firstname']); ?>','<?php echo $Fbval['profile_img']; ?>','<?php echo $Fbval['friend_email'];?>','','<?php echo $acceptance_status; ?>','<?php echo $fullname; ?>',1);
			<?php $cnt++; } ?>
			//nextButtonShow();
			$(".addFrndBox").show(); 
			//$("#facebook_like_wrapper").hide();
			$("#your_location").hide();
			$("#user_selected_location").show();
			$("#changeDestinationBtn").show();
			$("#EmailLink").show();
			
			$("#btn_select_friends").hide();
			$("#friends_same_dest").hide();
		}
		<?php } ?>
		<?php if($mode=='') { ?>
		plotAllDestinations();
		<?php } ?>  
		

 }
$(document).ready(function(){
initialize();
	$("#destSearchIcon").click(function(){
		if(trim(document.getElementById('srchFld').value)!='' 
			&& (document.getElementById('srchFld').value)!='Go to destination'){
			
			DestSearchResultAction();
		}else{
			
			$("#destNotFound").hide();
		}

	});
	
  $("#srchFld").keypress(function(e){
	if(e.which==13) {
		if(trim(document.getElementById('srchFld').value)!=''){
		
			DestSearchResultAction();
		}else{
			$("#destNotFound").hide();
		}		
	}
  });
  $("#srchfriendsinput").keyup(function(e){
		FrndSearchResultAction();
  });
	$("#scrollbar1").tinyscrollbar();
	$("#btn_select_friends").click(function(){
		$("#btn_select_friends").hide();
		$("#friends_same_dest").hide();
		$("#changeDestinationBtn").show();
		$(".btm-content-send-email-wrapper").show();
		$("#destNotFound").hide();
		$(".addFrndBox").show();
		if(selectedFrnds.length==5) {
			nextButtonShow();
		}
		if(typeof(SelectedDestination.lat)=="undefined") {
			alert('<?php echo DESTINATION_ERROR; ?>');
			return false;
		}
		$(".destSrch").hide();
		 var loc_id = document.getElementById("location_id").value;
		 var fbu_id =   document.getElementById("CurrentFBID").value;
		showFriendSearch();		
		clearOverlays();
		plotFbFriends();
		$("#scrollbar1").tinyscrollbar();
	});
	$(".frndBox").on('mouseover',function(){
		var id=$(this).attr('id');
		$("#"+id+" .picRollover").show();
	});
	$(".frndBox").on('mouseout',function(){
		var id=$(this).attr('id');
		$('#'+id+' .picRollover').hide();
	});
	$(".allFrndBox").on('mouseover',function(){
		var id=$(this).attr('id');
		$('#'+id+' .picRollover').show();
	});
	$(".allFrndBox").on('mouseout',function(){
		var id=$(this).attr('id');
		$('#'+id+' .picRollover').hide();
	});	
	$("#nextBtn").click(function(){
		if(selectedFrnds.length<5) {
			alert('Please select 5 friends');
			return false;
		}
		$(".unloctdFrnds").hide();
		var userEntryId=$("#userEntryId").val();
		var fbu_id =   document.getElementById("CurrentFBID").value;
		var status = '<?php echo $mode; ?>';
		if(status!="")
		{
			status = status;
		}
		else
		{
			status = '';
		}
		document.UserEntryDetails.action="<?php echo SITE_URL; ?>index.php?r=gmap/InsertEntryDetails&status="+status;
		var str=selectedFrnds.join(',');
		
		var strfinalselectedFrnds=finalselectedFrnds.join(',');
		$(".rdBdr").hide();
		$("#loader").show();
		$.ajax({
                type: "GET",
				async :false,
                url: "index.php?r=wildcardFriend/checkWildCardUser&loadFb=1&useremaillist="+str,
                success: function(data) {
				
					var data1 =data.split("!@!"); 
					
                  if(data1[1]=='fail')
				  {
              		$("#loader").hide();
					$('#friends_popup').show();
					 $("#addFrndBox123").html(data1[0]);

					$('.ltBox').show();
					//alert('Please select at least one friend who has not accessed the application yet');
					$(".rdBdr").show();   
				  }
				  
				  if(data=='success')
				  {
						$("#selectedFrnds").val(str);
						$("#finalselectedFrnds").val(strfinalselectedFrnds);
						if(mode != "change_destination" && mode!="change_friends") 
						{
							$.ajax({
				                type: "GET",
								async :false,
				                url: "index.php?r=gmap/entry_ticket_status",
	
				                success: function(data) {
								
				                  if(data=='false')
								  {
				                	  $(function(){
				                			$("#loader").hide();
				                	  }); 
									   alert('Last entry ticket status is pending');
									   $(".rdBdr").show();
									   
								  }
								  if(data=='true')
								  {
										document.UserEntryDetails.submit();
								  }				                    
				                }
							}); 
						}
						else
						{
							document.UserEntryDetails.submit();
						}
				  }
					//alert(data);
                    
                }
			});
	});
	
	$("#changeDestinationBtn").click(function(){
	flag = true
	//mode = '';
	var lastOpen=$("#lastOpen").val();
			if(lastOpen!='')
			ib[lastOpen].close();
		clearOverlaysFriends()
		clearOverlaysFrnds();
		$("#changeDestinationBtn").hide();
		plotAllDestinations();
		$("#btn_select_friends").show();
		nextButtonHide();
		$(".addFrndBox").hide();		
		$(".btm-content-send-email-wrapper").hide();
		showDestinationSearch();
		$(".unloctdFrnds").hide();
	});
});
function nextBtnPagination(locationKey) {

	var pageoffset=$("#pageOffset_"+locationKey).val();
	var resPerPage=4;
		
	var totFriends=$("#totFriends_"+locationKey).val();
	var totPages=Math.ceil(totFriends/resPerPage);
	
	if(pageoffset>=totPages) {
		pageoffset--;
		$("#pageOffset_"+locationKey).val(pageoffset);
		return;
	}
	pageoffset++;
	if(pageoffset<1) pageoffset=1;
	var start, end;
	start=((pageoffset-1)*resPerPage);
	end=start+3;
	$("#InfoboxFrnds_"+locationKey+" .frndBox").hide();
	for(var i=start; i<=end; i++) {
		$("#InfoboxFrnds_"+locationKey+" .frndBox:eq("+i+")").show();
	}
	$("#pageOffset_"+locationKey).val(pageoffset);
}

function prevBtnPagination(locationKey) {
	var pageoffset=$("#pageOffset_"+locationKey).val();
	if(pageoffset==1) {
		$("#pageOffset_"+locationKey).val(pageoffset);
		return;
	}
	pageoffset--;
	var resPerPage=4;
	if(pageoffset<1) pageoffset=1;
	var start, end;
	start=((pageoffset-1)*resPerPage);
	end=start+3;
	$("#InfoboxFrnds_"+locationKey+" .frndBox").hide();
	for(var i=start; i<=end; i++) {
		$("#InfoboxFrnds_"+locationKey+" .frndBox:eq("+i+")").show();
	}
	$("#pageOffset_"+locationKey).val(pageoffset);
}
function FrndSearchResultAction() {
	$(".unloctdFrnds").show();
	$(".allFrndBox").hide();
	var frndName=$("#srchfriendsinput").val();
	if(frndName.length==0) {
		$(".unloctdFrnds").hide();
	}
	frndName=getKeycityname(frndName);
	var c=0;
	for(var i=0; i<allFrndBoxids.length;i++) {
		var id=allFrndBoxids[i];
		
		if(id.indexOf(frndName)>-1) {
			$("#"+id).show();
			c++;
		}
	}
	$('.h2FriendsFound').html(c+' friends found');
	$('#scrollbar1').tinyscrollbar_update();
}

function PlotCurLocation() {
	var city=$("#curLocationDropDown").val();
	if(city=='') {
		alert('Please select your current location');
		return false;
	}
	$("#UsersCurrentCity").val(city);
	var cityParts=city.split('||');
	var CityName=cityParts[1];
	var keycityname=getKeycityname(CityName);
	var current_location_id=cityParts[0];
	currentUserArrLat=cityParts[2];
	currentUserArrLng=cityParts[3];
	var pos = new google.maps.LatLng(cityParts[2],cityParts[3]);
			marker[current_location_id] = new google.maps.Marker({map:map,
			animation: google.maps.Animation.DROP,
			position: pos,
			icon:'<?php echo SITE_URL; ?>images/pinBlue.png'
			});
	currentUserMarker=marker[current_location_id];		
	markersCitiesArray.push(marker[current_location_id]);
	$("#destSelectPopup").hide();
	$(".ltBox").hide();
	$("#userLocation").html(CityName);
}
function DestSearchResultAction(cityname1) {
	if(typeof(cityname1)!='undefined') {
	var cityName=cityname1;
	}
	else
	{
	var cityName=$("#srchFld").val();
	}
	var key;
	for(var i=0; i<allcities.length; i++) {
		if(allcities[i]==cityName) {
			key=i;
			break;
		}
	}
	
	
	if(typeof(ib[key])!='undefined') {
	$("#destNotFound").hide();
	var lastOpenDest=$("#lastOpenDest").val();
			
			
			if(lastOpenDest!='' && typeof(ib[lastOpenDest])!='undefined')
			ib[lastOpenDest].close();
			
			$("#lastOpenDest").val(key);
			
			ib[key].open(map, marker[key]);
			setTimeout(function() {
			$("#popup_"+key+" span.img").hover(function(){
					  
				   $("#popup_"+key+" .overlayBox").stop(true, true).fadeIn(500);
				   $("#popup_"+key+" .description").stop(true, true).fadeIn(500);       
					},function(){
					  $("#popup_"+key+" .overlayBox").stop(true, true).fadeOut(500);
					  $("#popup_"+key+" .description").stop(true, true).fadeOut(500);
				  });
				},10);
				
			var newcityname =key;
				currentSelectedLocation=$("#currentSelectedLocation").val();
				var latopn = currentSelectedLocation;
				
				if(latopn == newcityname && typeof(ib[latopn])!='undefined')
				{	
					if(latopn)
					{ ib[latopn].close();}
					 setTimeout(function() {
					 $("#"+latopn).addClass("selected"); 
					 $("#"+latopn).html("<span>Destination Selected</span>");
					 $("#dest_"+key).attr("onclick","");
				
					
					 }, 10);
				}
				else 
				{	
					
					 setTimeout(function() {
					 $("#"+newcityname).removeClass("selected");
					 $("#"+newcityname).html("<span>Select this destination</span>");
					  $("#dest_"+key).attr("onclick","draw_arc('"+marker[key].getPosition().lat()+"','"+marker[key].getPosition().lng()+"','"+key+"','"+cityName+"','"+allcountries[key]+"','')");
					 
					 }, 10);
				}
		}
		else {
			$("#destNotFound").show();
			
			var lastOpenDest=$("#lastOpenDest").val();
			if(lastOpenDest!='')
			if(typeof(ib[lastOpenDest])!='undefined')
			ib[lastOpenDest].close();
			
			
		}
}
function removeByValue(arr, val) {
    for(var i=0; i<arr.length; i++) {
        if(arr[i] == val) {
			if(arr.length==1) {
				arr = [];
			} else {
				arr.splice(i, 1);
			}
            break;
        }
    }
	return arr;
}

function AddCssSelectedFrnds() {
	  cnt = selectedFrnds.length;
	for(var i=0; i<cnt;i++) {
		var fbid=selectedFrnds[i];
		
		$('#userInfoxBox_'+fbid).removeClass('frndSelected');
		$('#userInfoxBox_'+fbid+" .checked").removeClass('checked').addClass('uncheck');
		$('#userInfoxBox_'+fbid).find('.picSelected').hide();
		$('#checkbox_'+fbid).addClass('uncheck');
		
		$('#frndBox_'+fbid).removeClass('frndSelected');
		$('#frndBox_'+fbid).find('.picSelected').hide();
		
		$(".allFrndBox").filter(function(){ return this.id.match('//'+fbid+'+d'); }).addClass('frndSelected');
		
	}
	
}

function RemoveCssSelectedFrnds() {
		 cnt = selectedFrnds.length;
		for(var i=0; i<cnt;i++) {
		var fbid=selectedFrnds[i];
			$('.social_support_users').prepend('<div id="SocialSupportUser'+fbid+'" class="userSelected"></div>');
			$("#SocialSupportUser"+fbid).html('<span class="pic"><img id="user_image_'+fbid+'" src="'+fbimage+'" width="50" height="50" /></span>');
			$("#SocialSupportUser"+fbid).append('<span class="name">'+fbname+'</span>');
			
		
			$("#frndBox_"+fbid).addClass('frndSelected');
			$("#frndBox_"+fbid+" .picSelected").show();
			$("#checkbox_"+fbid).removeClass('uncheck').addClass('checked');
			
			$("#userInfoxBox_"+fbid).addClass('frndSelected');
			$("#userInfoxBox_"+fbid+" .picSelected").show();
			$("#userInfoxBox_"+fbid+" .uncheck").removeClass('uncheck').addClass('checked');
		}
}

function removeKey(arrayName,key)
{
 var x;
 var tmpArray = new Array();
 for(x in arrayName)
 {
  if(x!=key) { tmpArray[x] = arrayName[x]; }
 }
 return tmpArray;
}

function ChooseFriend(fbid, fbname, fbimage, fbemail,status,accept,friend_name,divindexForce) { 
	
	var wildcardCheck=true;
	var friend_name=friend_name;
	var fbnameOriginal=fbname;
	var fbemailOriginal=fbemail;
	fbname=getKeycityname(fbname);
	var chk_val='';
	var chk_status='';
	
		if(fbid!='')
	 	{
			var chk=fbid;
			var full_name=friend_name.split(" ");
			var chk_new=fbid+'#'+full_name[0]+'#'+full_name[1];
			var chk_val=fbid;
			chk_status='fb';
		}
		if(fbemail!='')
		{
			var fbemail_val=fbemail.replace('@','');
			chk_status='email';
			var fbemial_val1=fbemail_val.replace('.com','');
			var fbemial_val2=fbemial_val1.replace('.','');
			var chk_val=fbemial_val2;
			var full_name=friend_name.split(" ");
			var chk_new=fbid+'#'+full_name[0]+'#'+full_name[1];
			var chk=fbemail;
			
			if(selectedFrnds.indexOf(chk)>-1 && status=='')
			{
              //alert ("Email address already exist. Please enter another one.");
			  return false;

		    }
		}
		
		if(chk_val=='') return false;
	
	if(selectedFrnds.indexOf(chk)>-1){
		
		$(".profile-pic-wrapper").show();
		$('#frndBox_'+fbid).removeClass('frndSelected');
		$('#userInfoxBox_'+fbid).removeClass('frndSelected');
		
		$('#userInfoxBox_'+fbid+" .checked").removeClass('checked').addClass('uncheck');
		
		$('#checkbox_'+fbid).removeClass('checked').addClass('uncheck');
		var id=$("#checkbox_"+fbid).parent().parent().attr("id");
		$("#"+id).removeClass("frndSelected");
		$("#"+id+" .pic .picSelected").hide();
		
		$('#frndBox_'+fbid).find('.picSelected').hide();
		$('#userInfoxBox_'+fbid).find('.picSelected').hide();
		
		$("#allFrndBox_"+fbname+"_"+fbid).removeClass("frndSelected");
		$("#allFrndBox_"+fbname+"_"+fbid+" .checked").removeClass('checked').addClass('uncheck');
		$("#allFrndBox_"+fbname+"_"+fbid).find('.picSelected').hide();
		var alreadAdded=false;
		$("#SocialSupportUser"+fbid).remove();
		nextButtonHide();
		var divIndex=1;
		// get the div index
		if(chk_status=='fb') {
		for(var i=1; i<=5; i++) {
			if($("#fbidBar"+i).val()==chk_val) {
				divIndex=i;
				break;
			}
		}
		}
		else if(chk_status=='email'){
			divIndex=$("#EmailIndex").val();
		}
		
		$('.userfrndBox_'+chk_val+' span.pic').html('<span class="rdBdr"></span>');
		$('.userfrndBox_'+chk_val+' span.selFrnd').html('Select friend from map');
		$('#fbidBar'+divIndex).val('');
		
		$('#addFrndBox'+divIndex).attr('class','');		
		//delete selectedFrnds[selectedFrnds.indexOf(fbid)];
		selectedFrnds = removeByValue(selectedFrnds, chk);
		finalselectedFrnds = removeByValue(finalselectedFrnds, chk_new);
		
		userEmails=removeKey(userEmails,fbemail);
		if(selectedFrnds.length == 0) {
			changeProgressbar('30%','SELECT YOUR DESTINATION');
			$('.social_support_users').hide();  
			$('#destinationImgBox').show();  
		}
		nextButtonHide();
		
	} else {
		
		var alreadAdded=false;
		var totalFiveFriends=false;
		var index=jQuery.inArray(fbid,selectedFrnds);
		var f=index+1;
		
		if(selectedFrnds.length==5)
		{
			totalFiveFriends=true;
			alert('You already have selected five friends');
			return false;
        }
		
		//if(0) {
		if(selectedFrnds.length==4) {
			// Start Wildcard friend check
			//var userlist='';
			//userlist+=selectedFrnds.join(',')+','+chk;
			
			
			/*$.ajax({
                type: "GET",
				async :false,
                url: "index.php?r=wildcardFriend/checkWildCardUser&loadFb=1&useremaillist="+userlist,

                success: function(data) {
				
                  if(data=='fail')
				  {
					alert('Please select at least one friend who has not accessed the application yet');
				  }
				  if(data=='success')
				  {
					AddFrindToList(fbid, fbname, fbimage,fbemail,fbnameOriginal,friend_name);
					$("#nextBtn").show().css("float","none");
					$(".btm-content-rt-container div.info").css("float","none");
					$(".btm-content-rt-container div.info").css("width","auto");
					$(".profile-pic-wrapper").hide();
				  }
					//alert(data);
                    
                }
			});*/


			AddFrindToList(fbid, fbname, fbimage,fbemail,accept,fbnameOriginal,fbemailOriginal,friend_name,divindexForce);
			nextButtonShow();
			
		} else {
			nextButtonHide();
			AddFrindToList(fbid, fbname, fbimage, fbemail,accept,fbnameOriginal,fbemailOriginal,friend_name,divindexForce);
		}
		
	}
}

function AddFrindToList(fbid, fbname, fbimage,fbemail,accept, fbnameOriginal,fbemailOriginal,friend_name,divindexForce) {	

			
			$("#destinationImgBox").hide();
			$(".social_support_users").show();
			
			userEmails[fbid]=fbemail;
			var chk_status='';
			
			if(fbid!='')
	         {
				selectedFrnds.push(fbid);
				chk_status='fb';
				var name2=fbnameOriginal.split(" ");
				var name1=name2[0];
				var chk_val=fbid;
				var full_name=friend_name.split(" ");
				var final_selectedFrnds=fbid+'#'+full_name[0]+'#'+full_name[1];
				
				finalselectedFrnds.push(final_selectedFrnds);
				
			 }
			 if(fbemail!='')
	         {
				chk_status='email';
				 selectedFrnds.push(fbemail);
				 var name1=fbemailOriginal.split(" ");
				var chk_val=fbemail;
				 var full_name=friend_name.split(" ");
				 var final_selectedFrnds=fbemail+'#'+full_name[0]+'#'+full_name[1];
				 finalselectedFrnds.push(final_selectedFrnds);
				
	         }
			
			var divIndex=1;
			
			for(var i=1; i<=5; i++) {
				
				if($("#fbidBar"+i).val()=='') {
					divIndex=i;
					break;
				}
			}
			
			if(chk_status=='email'){
				if(typeof(divindexForce)=='undefined' || divindexForce!=1)
				divIndex=$("#EmailIndex").val();
			}
			
			if(fbid!='')
	         {
				$('#addFrndBox'+divIndex).addClass('userfrndBox_'+fbid);
				$("#fbidBar"+divIndex).val(fbid);

			 }
			 if(fbemail!='')
	         {
				var fbemail_val=fbemail.replace('@','');
				var fbemial_val1=fbemail_val.replace('.com','');
				var fbemial_val2=fbemial_val1.replace('.','');
				$('#addFrndBox'+divIndex).addClass('userfrndBox_'+fbemial_val2);
				$("#fbidBar"+divIndex).val(fbemial_val2);

	         }
			$('#addFrndBox'+divIndex+' .pic').html('<span class="rdBdr"></span><img id="user_image_'+fbid+'" src="'+fbimage+'" width="50" height="50" />');
			//if(accept!= 1) {
			$('#addFrndBox'+divIndex+' .selFrnd').html(full_name[0].substring(0,10)+'<a href="javascript:void(0);" onclick="ChooseFriend(\''+fbid+'\',\''+fbname+'\',\''+fbimage+'\',\''+fbemail+'\',\'change\',\'\',\''+friend_name+'\');">Change</a>');
			//}
			$("#SocialSupportUser"+fbid).html('<span class="pic"><img id="user_image_'+fbid+'" src="'+fbimage+'" width="50" height="50" /></span>');
			$("#SocialSupportUser"+fbid).append('<span class="name">'+fbname+'</span>');
			
			//$("#sucial_support_bar").append(' <img src="'+fbimage+'" />'+' '+fbname);
			$("#frndBox_"+fbid).addClass('frndSelected');
			$("#userInfoxBox_"+fbid).addClass('frndSelected');
			$("#frndBox_"+fbid+" .picSelected").show();
			$("#userInfoxBox_"+fbid+" .picSelected").show();
			$("#checkbox_"+fbid).removeClass('uncheck').addClass('checked');
			$("#userInfoxBox_"+fbid+" .uncheck").removeClass('uncheck').addClass('checked');
			$("#allFrndBox_"+fbname+"_"+fbid).addClass("frndSelected");
			var id=$("#checkbox_"+fbid).parent().parent().attr("id");
			$("#"+id).addClass("frndSelected");
			$("#"+id+" .pic .picSelected").show();
			
			$("#allFrndBox_"+fbname+"_"+fbid+" .uncheck").removeClass('uncheck').addClass('checked');
			$("#allFrndBox_"+fbname+"_"+fbid).find('.picSelected').hide();
			changeProgressbar('55%','PICK 5 FRIENDS TO GO WITH YOU');
}

/*THIS FUNCTION CALL WHEN USER COMES FROM MODIFY ENTRY PAGE*/


function plotSelectedDestinations(flag1) {
<?php
		$currentUserArr = explode('~',$currentUser);
		
		$currentUserArrLatLang = explode(',',$currentUserArr[1]);
		$selectedDestionLat = $get_location_details[0]->latitude;
		$selectedDestionLong = $get_location_details[0]->longitude;
		$latLang = $selectedDestionLat.",".$selectedDestionLong;
		$user_location_id=$currentUserArr[3];
		if($user_location_id!="") {
	?>
	if(typeof(currentUserArrLat)=='undefined') {
	currentUserArrLat='<?php echo $currentUserArrLatLang[0]; ?>';
	currentUserArrLng='<?php echo $currentUserArrLatLang[1]; ?>';
	}
	<?php
			if($get_location_details[0]->latitude!="" && $get_location_details[0]->longitude!="") {
			
			//$latLang ="32.7801,-96.8005";
			
			$latlong = explode(',',$latLang);
			//$key = "Dallas";
			$key = $get_location_details[0]->city_name;
			$keycityname=str_replace(" ","",str_replace(".","",str_replace(",","",str_replace("(","",str_replace(")","",str_replace("-","",strtolower($key)))))));
			$keycityname=str_replace("’","",$keycityname);
			$keycityname=str_replace("'","",$keycityname);
			$city_name = $key; 
			$country_name=$get_location_details[0]->country_name;
			$short_desc = $get_location_details[0]->short_desc; 
			//$country_name='United States';
			$city_image_path = SITE_URL . '/city_images/'.rawurlencode($get_location_details[0]->city_image); 
			$temprature = $get_location_details[0]->temprature; 
			//$location_id = "30"; 
			$location_id = $get_location_details[0]->location_id; 
	?>		if(<?php echo $latLang ; ?>!="") {
			var pos_<?php echo $user_location_id; ?> = new google.maps.LatLng(<?php echo $latLang ; ?>);
			}
			marker['<?php echo $user_location_id; ?>'] = new google.maps.Marker({map:map,
			animation: google.maps.Animation.DROP,
			position: pos_<?php echo $user_location_id; ?>,
			icon:'<?php echo SITE_URL; ?>images/pinBlue.png'
			});
			
			currentUserMarker=marker['<?php echo $user_location_id; ?>'];
			markersCitiesArray.push(marker['<?php echo $user_location_id; ?>']);
			icon:'<?php echo SITE_URL; ?>images/pinBlue.png'
		
			var cityname_<?php echo $user_location_id; ?> = getKeycityname('<?php echo $user_location_id; ?>');
			var country_name_<?php echo $user_location_id; ?> ='<?php echo $country_name; ?>';
			var country_name_<?php echo $user_location_id; ?> = getKeycityname(country_name_<?php echo $user_location_id; ?>);
			var country_name_<?php echo $user_location_id; ?>=country_name_<?php echo $user_location_id; ?>.replace(" ","");
			var boxText_<?php echo $user_location_id; ?> = document.createElement("div");
			$(window).load(function() { 
			
			draw_arc('<?php echo $latlong[0];?>','<?php echo $latlong[1];?>','<?php echo $location_id;?>','<?php echo $user_location_id; ?>','<?php echo $country_name; ?>','<?php echo $temprature; ?>',flag1); 
			});
			
			boxText_<?php echo $user_location_id; ?>.style.cssText = " margin-top: 35px; padding: 0 0 15px 0; background:url(<?php echo SITE_URL;?>/images/popup_images/infobox-tip.png)bottom left no-repeat; ";
			boxText_<?php echo $user_location_id; ?>.innerHTML = "<div class='popup'  id='popup_<?php echo $user_location_id; ?>'><span class='img' style='background:url(<?php echo $city_image_path; ?>) 0 0 no-repeat;'><span class='cityName'><?php echo $user_location_id; ?><span><?php echo $country_name; ?></span></span><span class='desc'>&nbsp;</span><span class='weather'><?php echo $temprature; ?>&deg;</span><div class='overlayBox'></div><span class='description'><?php echo $short_desc; ?></span></span><div class='selDestination'> <span class='selectButton selected'><span>Destination Selected</span></span>  </div></div>";
			
			var myOptions_<?php echo $user_location_id; ?> = {
			 content: boxText_<?php echo $user_location_id; ?>
			,disableAutoPan: false
			,maxWidth: 0 
			,pixelOffset: new google.maps.Size(-145, -310)
			,zIndex: null
			,boxStyle: { 
			  background: "url('') no-repeat"
			  ,opacity: 1
			  ,width: "291px"
			 }
			,closeBoxMargin: "22px -14px 0px 0px"
			,closeBoxURL:'<?php echo SITE_URL; ?>images/close.png'
			,infoBoxClearance: new google.maps.Size(1, 1)
			,isHidden: false
			,pane: "floatPane"
			,enableEventPropagation: false
			};
			setTimeout(function() {
					 $("#popup_<?php echo $user_location_id; ?> span.img").hover(function(){
					  
				   $("#popup_<?php echo $user_location_id; ?> .overlayBox").stop(true, true).fadeIn(500);
				   $("#popup_<?php echo $user_location_id; ?> .description").stop(true, true).fadeIn(500);       
					},function(){
					  $("#popup_<?php echo $user_location_id; ?> .overlayBox").stop(true, true).fadeOut(500);
					  $("#popup_<?php echo $user_location_id; ?> .description").stop(true, true).fadeOut(500);
				  });
				},10);
		    google.maps.event.addListener(marker['<?php echo $user_location_id; ?>'], "click", function(event) {
			
			setTimeout(function() {
			 $("#popup_<?php echo $user_location_id; ?> span.img").hover(function(){
					  
				   $("#popup_<?php echo $user_location_id; ?> .overlayBox").stop(true, true).fadeIn(500);
				   $("#popup_<?php echo $user_location_id; ?> .description").stop(true, true).fadeIn(500);       
					},function(){
					  $("#popup_<?php echo $user_location_id; ?> .overlayBox").stop(true, true).fadeOut(500);
					  $("#popup_<?php echo $user_location_id; ?> .description").stop(true, true).fadeOut(500);
				  });
				},10);
		 		var lastOpenDest=$("#lastOpenDest").val();
				$("#lastOpenDest").val('<?php echo $user_location_id; ?>');
				 if(lastOpenDest!='' && typeof(ib[lastOpenDest])!='undefined')
				{
					 ib[lastOpenDest].close();
                }
				
				var newcityname =<?php echo $user_location_id; ?>;
				currentSelectedLocation=$("#currentSelectedLocation").val();
				var latopn = getKeycityname(currentSelectedLocation);
				
				if(latopn == newcityname && typeof(ib[latopn])!='undefined')
				{	
					if(latopn)
					{ ib[latopn].close();}
					 setTimeout(function() {
					 $("#"+latopn).addClass("selected"); 
					 $("#"+latopn).html("<span>Destination Selected</span>");
					 $("#dest_<?php echo $user_location_id; ?>").attr("onclick","");
				
					
					 }, 10);
				}
				else 
				{	
					
					 setTimeout(function() {
					 $("#"+newcityname).removeClass("selected"); 
					 $("#"+newcityname).html("<span>Select this destination</span>");
					  $("#dest_<?php echo $user_location_id; ?>").attr("onclick","draw_arc('<?php echo $latLang[0]; ?>','<?php echo $latLang[1]; ?>','<?php echo $temp[4]; ?>','"+cityname_<?php echo $user_location_id; ?>+"','"+country_name_<?php echo $user_location_id; ?>+"','<?php echo $temp[1]; ?>')");
					 
					 }, 10);
				}
				ib['<?php echo $user_location_id; ?>'].open(map, this);
				
			});

			ib['<?php echo $user_location_id; ?>'] = new InfoBox(myOptions_<?php echo $user_location_id; ?>);
			
			
var pos_<?php echo $user_location_id; ?> = new google.maps.LatLng(<?php echo $currentUserArr[1] ; ?>);
			marker['<?php echo $user_location_id; ?>'] = new google.maps.Marker({map:map,
			animation: google.maps.Animation.DROP,
			position: pos_<?php echo $user_location_id; ?>,
			icon:'<?php echo SITE_URL; ?>images/pinBlue.png'
			});
			<?php } ?>
<?php } ?>
}

function plotAllDestinations() {
<?php
		$currentUserArr = array();
		$c=0;
		$currentUserArr = explode('~',$currentUser);
		$currentUserArrLatLang = explode(',',$currentUserArr[1]);		
	?>
	
	if(typeof(currentUserArrLat)=='undefined') {
	currentUserArrLat='<?php echo $currentUserArrLatLang[0]; ?>';
	currentUserArrLng='<?php echo $currentUserArrLatLang[1]; ?>';
	}
	<?php	
	
	foreach ($allData as $key => $value) {
		
		$allcities[]=$key;
			$temp = explode('~',$value);
			
			if($temp[0]=="") continue;
			$location_id=$temp[4];
			if($location_id=='') continue;
			$country_name='';
			if(isset($temp[3]) && $temp[3] !=""){
			$country_name = str_replace("'","\'",str_replace('"','\"',$temp[3]));
			}
			?>
			allcities[<?php echo $location_id; ?>]='<?php echo $key; ?>';
			allcountries[<?php echo $location_id; ?>]='<?php echo $country_name; ?>';
		<?php
			$latLang = explode(',',$temp[0]);
			
			$keycityname=str_replace(" ","",str_replace(".","",str_replace(",","",str_replace("(","",str_replace(")","",str_replace("-","",strtolower($key)))))));
			$keycityname=str_replace("’","",$keycityname);
			$keycityname=str_replace("'","",$keycityname);
			$city_name = $key;
			
			if(is_array($continent_locked_cities) && in_array($key,$continent_locked_cities))
			 {
			   ?>   
				    var pos_<?php echo $location_id; ?> = new google.maps.LatLng(<?php echo $temp[0] ; ?>);
					marker[<?php echo $location_id; ?>] = new google.maps.Marker({map:map,
					animation: google.maps.Animation.DROP,
					position: pos_<?php echo $location_id; ?>,
					clickable:false,
					icon:'<?php echo SITE_URL; ?>images/pinRed.png'
					});
			 <?php
			 }
			 else
			{
				 ?>
					var pos_<?php echo $location_id; ?> = new google.maps.LatLng(<?php echo $temp[0] ; ?>);
					marker['<?php echo $location_id; ?>'] = new google.maps.Marker({map:map,
					animation: google.maps.Animation.DROP,
					position: pos_<?php echo $location_id; ?>,
					clickable:true,
					icon:'<?php echo SITE_URL; ?>images/pinRed.png'
					});
			<?php
			}
			if($temp[1]=="currentuser") { ?>
			currentUserMarker=marker['<?php echo $location_id; ?>'];
			<?php } ?>
			markersCitiesArray.push(marker['<?php echo $location_id; ?>']);
			<?php 
			if($temp[1]=="currentuser") { ?>
			icon:'<?php echo SITE_URL; ?>images/pinBlue.png'
			<?php } ?>
			<?php 
					//check image exists or not
					$city_image_path = '';
					
					if( isset($temp[2]) && $temp[2] != '' && file_exists(BASEPATH.DS.CITY_IMAGES.DS.$temp[2])) 
					{
						$city_image_path = SITE_URL . '/city_images/'. $temp[2]; 
					}
				?>	
			var cityname_<?php echo $location_id; ?> = getKeycityname('<?php echo $location_id; ?>');
			var countryName_<?php echo $location_id; ?>='<?php echo $country_name; ?>';
			var country_name_<?php echo $location_id; ?> = getKeycityname(countryName_<?php echo $location_id; ?>);
			var boxText_<?php echo $location_id; ?> = document.createElement("div");
			
			boxText_<?php echo $location_id; ?>.style.cssText = " margin-top: 35px; padding: 0 0 15px 0; background:url(<?php echo SITE_URL;?>/images/popup_images/infobox-tip.png)bottom left no-repeat; ";
			boxText_<?php echo $location_id; ?>.innerHTML = "<div id='popup_<?php echo $location_id; ?>' class='popup'><span class='img' style='background:url(<?php echo SITE_URL."city_images/".rawurlencode($temp[2]); ?>) 0 0 no-repeat;'><span class='cityName'><?php echo $key; ?><span><?php echo $country_name; ?></span></span><span class='desc'>&nbsp;</span><span class='weather'><?php echo $temp[1]; ?>&deg;</span><div class='overlayBox'></div><span class='description'><?php echo $temp[5]; ?></span></span><div class='selDestination' id='dest_<?php echo $location_id; ?>' onclick=draw_arc('<?php echo $latLang[0]; ?>','<?php echo $latLang[1]; ?>','<?php echo $temp[4]; ?>','"+cityname_<?php echo $location_id; ?>+"','"+country_name_<?php echo $location_id; ?>+"','<?php echo $temp[1]; ?>')> <span class='selectButton' id='<?php echo $location_id; ?>'><span>Select this destination</span></span>  </div></div>";
			
			var myOptions_<?php echo $location_id; ?> = {
			 content: boxText_<?php echo $location_id; ?>
			,disableAutoPan: false
			,maxWidth: 0 
			,pixelOffset: new google.maps.Size(-145, -310)
			,zIndex: null
			,boxStyle: { 
			  background: "url('') no-repeat"
			  ,opacity: 1
			  ,width: "291px"
			 }
			,closeBoxMargin: "22px -14px 0px 0px"
			,closeBoxURL:'<?php echo SITE_URL; ?>images/close.png'
			,infoBoxClearance: new google.maps.Size(1, 1)
			,isHidden: false
			,pane: "floatPane"
			,enableEventPropagation: false
			};
			
				setTimeout(function(){
					//alert("IN setTimeout");
					$("#popup_<?php echo $location_id; ?> span.img").hover(function(){
					  
				   $("#popup_<?php echo $location_id; ?> .overlayBox").stop(true, true).fadeIn(500);
				   $("#popup_<?php echo $location_id; ?> .description").stop(true, true).fadeIn(500);       
					},function(){
					  $("#popup_<?php echo $location_id; ?> .overlayBox").stop(true, true).fadeOut(500);
					  $("#popup_<?php echo $location_id; ?> .description").stop(true, true).fadeOut(500);
				  });
				},100);  
		    google.maps.event.addListener(marker['<?php echo $location_id; ?>'], "click", function(event) {
				//alert("IN addListener");
				setTimeout(function(){
					/*
					$("#popup_<?php echo $keycityname; ?> span.img").bind({
					mouseenter :function(){alert('enter');},
					mouseleave: function(){alert('out');}
					});
					*/
				 $("#popup_<?php echo $location_id; ?> span.img").hover(function(){
					  
				   $("#popup_<?php echo $location_id; ?> .overlayBox").stop(true, true).fadeIn(500);
				   $("#popup_<?php echo $location_id; ?> .description").stop(true, true).fadeIn(500);       
					},function(){
					  $("#popup_<?php echo $location_id; ?> .overlayBox").stop(true, true).fadeOut(500);
					  $("#popup_<?php echo $location_id; ?> .description").stop(true, true).fadeOut(500);
				  });
				},100);
				
				
				var lastOpenDest=$("#lastOpenDest").val();
				$("#lastOpenDest").val('<?php echo $location_id; ?>');
				 if(lastOpenDest!='' && typeof(ib[lastOpenDest])!='undefined')
				{
					 ib[lastOpenDest].close();
                }
				
				var newcityname =<?php echo $location_id; ?>;
				currentSelectedLocation=$("#currentSelectedLocation").val();
				var latopn = currentSelectedLocation;
				
				if(latopn == newcityname && typeof(ib[latopn])!='undefined')
				{	
					if(latopn)
					{ ib[latopn].close();}
				
					 setTimeout(function() {
					 $("#"+latopn).addClass("selected"); 
					 $("#"+latopn).html("<span>Destination Selected</span>");
					 $("#dest_<?php echo $location_id; ?>").attr("onclick","");					
					 
					 }, 10);
					 
				}
				else 
				{	
					setTimeout(function() {
					 $("#"+newcityname).removeClass("selected");
					 
					 $("#"+newcityname).html("<span>Select this destination</span>");
					 $("#dest_<?php echo $location_id; ?>").attr("onclick","draw_arc('<?php echo $latLang[0]; ?>','<?php echo $latLang[1]; ?>','<?php echo $temp[4]; ?>','"+cityname_<?php echo $location_id; ?>+"','"+country_name_<?php echo $location_id; ?>+"','<?php echo $temp[1]; ?>')");
					 
					 }, 10);
				}
				
				
				ib['<?php echo $location_id; ?>'].open(map, this);
				
			});
			ib['<?php echo $location_id; ?>'] = new InfoBox(myOptions_<?php echo $location_id; ?>);
			<?php
			$c++;
		}
		?>	
		
var pos_<?php echo $location_id; ?> = new google.maps.LatLng(<?php echo $currentUserArr[1] ; ?>);

/* Code for continent locking. Below code set marker clickable property to false.*/

<?php 
	 if(is_array($continent_locked_cities) && in_array($city_name,$continent_locked_cities))
	 {
	   ?>
	       marker['<?php echo $location_id; ?>'] = new google.maps.Marker({map:map,
			animation: google.maps.Animation.DROP,
			position: pos_<?php echo $location_id; ?>,
		    clickable:false,
			icon:'<?php echo SITE_URL; ?>images/pinBlue.png'
			});
	 <?php
	 }
	 else
	{
		 ?>
            marker['<?php echo $location_id; ?>'] = new google.maps.Marker({map:map,
			animation: google.maps.Animation.DROP,
			position: pos_<?php echo $location_id; ?>,
			clickable:true,
			icon:'<?php echo SITE_URL; ?>images/pinBlue.png'
			});
	<?php
	}
	?>
}
function plotFbFriends() {
<?php
$totPins=count($FriendsByLocation['data']);
		$totCity=count($allData['data']); 
		$i=0;
		$cssInfobox='';
		
		foreach ($FriendsByLocation['data'] as $location => $dataMain) {
			//echo '<pre>';
			//var_dump($friend);
			//echo '<pre>';
		
			$ToShow=sizeof($dataMain['data']);
			$height=$ToShow*170;
			
			$locationKey=str_replace(" ","",str_replace(".","",str_replace(",","",str_replace("(","",str_replace(")","",str_replace("-","",strtolower($location)))))));
			$locationKey=str_replace("’","",$locationKey);
			$locationKey=str_replace("'","",$locationKey);
           $html='<div class=\"InfoboxFrnds\" id=\"InfoboxFrnds_'.$locationKey.'\">';
		   
		   //$html.='<img align=\"right\" class=\"closeBtnFriendsInfobox\" onclick=\"ib['.$i.'].close();\" src=\"'.SITE_URL.'images/close.png\">';
		   if(count($dataMain['data'])>4) {
		   $html.='<div class=\"paging\"><a href=\"#\" class=\"nextBtnInfobox\" onclick=\"nextBtnPagination(\''.$locationKey.'\')\" id=\"nextBtnInfobox_'.$locationKey.'\"><img src=\"'.SITE_URL.'images/frnds-srch-arrowBottom.png\" /></a>';
			$html.='<a href=\"#\" class=\"prevBtnInfobox\"  onclick=\"prevBtnPagination(\''.$locationKey.'\')\" id=\"prevBtnInfobox_'.$locationKey.'\"><img src=\"'.SITE_URL.'images/frnds-srch-arrowTop.png\" /></a></div>';
			}
			//$html='<div style=\"height:'.$height.'px\"><strong>'.$location.'</strong><img align=\"right\" onclick=\"ib['.$i.'].close();\" src=\"'.SITE_URL.'images/close.png\"><br />';
			$j=0;
			foreach($dataMain['data'] as $frnd) {
				if($frnd['uid']!=$user['id']) {
				$display='';
				if($j>3) 
				$display='style=\"display:none\"';
				$uid=$frnd['uid'];
				$img= $frnd['pic_small'];
				$html.='<div class=\"frndBox\" '.$display.' onmouseover=\"frndInfoboxMouseOver(this);\" onmouseout=\"frndInfoboxMouseOut(this);\" id=\"userInfoxBox_'.$uid.'\" ';
				$fullname=$frnd['first_name']." ".$frnd['last_name'];
				$friend_name=trim($frnd['first_name'])." ".trim($frnd['last_name']);
				if($frnd['uid']!=$user['id']) {
					$html.='onclick=\"ChooseFriend(\''.$frnd['uid'].'\',\''.$fullname.'\',\''.$img.'\',\''.$frnd['email'].'\',\'\',\'\',\''.$friend_name.'\');\"';
				}
				
				$html.='><div class=\"pic\"><div class=\"picRollover\"></div><div class=\"picSelected\"></div><img src=\"'.$img.'\" alt=\"\" width=\"50\" height=\"50\" /></div><div class=\"info\"><span class=\"name\">'.$fullname.'</span>';
				
				
					$html.='<span class=\"chFrnd\">Choose this friend</span>';
				
				
				$html.='<span class=\"uncheck\"></span></div></div>';
				
				
				$j++;
				}
			}	
			
			$html.='</div><input type=\"hidden\" id=\"pageOffset_'.$locationKey.'\" value=\"1\" /><input type=\"hidden\" id=\"totFriends_'.$locationKey.'\" value=\"'.$ToShow.'\" />';
			$positions=$dataMain['latlang'];
			$isEmirates=$dataMain['isEmirates'];
			
			if($positions && $positions!=NULL) { ?>
			var pos_<?php echo $i; ?> = new google.maps.LatLng(<?php echo $positions->lat; ?>, <?php echo $positions->lng; ?>);
			marker_<?php echo $i; ?> = new google.maps.Marker({map:map,
			animation: google.maps.Animation.DROP,
			position: pos_<?php echo $i; ?>,
			<?php if(isset($dataMain['loggedInUser']) && $dataMain['loggedInUser']==1) { ?>
			icon:'<?php echo SITE_URL; ?>images/pinBlue.png'
			<?php }
			elseif($isEmirates) { ?>
			icon:'<?php echo SITE_URL; ?>images/pinFriendRed.png'
			<?php }
			else { ?>
			icon:'<?php echo SITE_URL; ?>images/pinFriendRed.png'
			<?php
			}?>
            });
			
			<?php if(isset($dataMain['loggedInUser']) && $dataMain['loggedInUser']==1) { ?>
			currentUserMarker=marker_<?php echo $i; ?>;
			<?php } ?>
			markersArray.push(marker_<?php echo $i; ?>);
	
		var boxText_<?php echo $i; ?> = document.createElement("div");
		boxText_<?php echo $i; ?>.style.cssText = " margin-top: 8px; padding: 0 0 15px 0;";
		boxText_<?php echo $i; ?>.innerHTML = "<?php echo $html; ?>";
		
		var myOptions_<?php echo $i; ?> = {
			 content: boxText_<?php echo $i; ?>
			,disableAutoPan: false
			,maxWidth: 0
			,pixelOffset: new google.maps.Size(-145, -150)
			,zIndex: null
			,boxStyle: { 
			  /*background: "#efefef"
			  ,*/opacity: 1
			  ,width: "291px"
			 }
			,closeBoxMargin: "-4px -14px 0px 0px"
			,closeBoxURL:'<?php echo SITE_URL; ?>images/close.png'
			,infoBoxClearance: new google.maps.Size(1, 1)
			,isHidden: false
			,pane: "floatPane"
			,enableEventPropagation: false
		};
		
		google.maps.event.addListener(marker_<?php echo $i; ?>, "click", function (e) {
			var lastOpen=$("#lastOpen").val();
			if(lastOpen!='')
			ib[lastOpen].close();
			$("frndBox").on("mouseover",function(){frndboxMouseover()});
			
			$("#lastOpen").val(<?php echo $i; ?>);
			ib[<?php echo $i; ?>].close();
			ib[<?php echo $i; ?>].open(map, this);
			
		});
			
		ib[<?php echo $i; ?>] = new InfoBox(myOptions_<?php echo $i; ?>);
		
			<?php
			$i++;
			}
} ?>	
	
}
function frndInfoboxMouseOver(instance) {
	var id=$(instance).attr('id');
	$("#"+id+" .picRollover").show();
}

function frndInfoboxMouseOut(instance) {
	var id=$(instance).attr('id');
	$("#"+id+" .picRollover").hide();
}

function draw_arc(srclat,srclgt,location_id,city_name,country_name,temperature, flag1)
{	
	
	$("#lastOpenDest").val(location_id);
	$("#currentSelectedLocation").val(location_id);
	var lineSymbol = {
	path: 'M 0,-0.5 0,0.5',
	strokeWeight: 2,
	strokeOpacity: 1,
	scale: 3
	};
	
	var destLat1=currentUserArrLat;
	var destlnt1=currentUserArrLng;
	var srcLatlng = new google.maps.LatLng(srclat,srclgt);
	var destLatlng1 = new google.maps.LatLng(destLat1,destlnt1);

    var distance = google.maps.geometry.spherical.computeDistanceBetween(srcLatlng,destLatlng1);
    
 /* Code to check distance between to points. If distance is greater than config val then it will draw straight line. */
	 if(distance > "<?php echo STRAIGHT_LINE_DISTANCE;?>")
    	{
 		   var geodesic_val=false; // for straight line
		}
		else
		{
		   var geodesic_val=true; // for curve line
		}

	var geodesicOptions = {
	strokeColor: '#d61e2a',
	strokeOpacity: 0,
	strokeWeight: 3,
	geodesic: geodesic_val,
	icons: [{
	icon: lineSymbol,
	offset: '100%',
	repeat: '10px'}],
	map: map
	};


   //if(geodesicPoly==null)
	//{
	   var geodesicPoly = new google.maps.Polyline(geodesicOptions);
	   //map.removeOverlay(geodesicPoly);
	   //geodesicPoly.setPath([]);
	//}
	var path = [srcLatlng, destLatlng1];
	geodesicPoly.setPath(path);

	var prepath = this.geodesicPoly;
    if(prepath){
        prepath.setMap(null);
    }
    //new polyline
    geodesicPoly.setMap(this.map);

    this.geodesicPoly = geodesicPoly;
	 
	
	SelectedDestination.lat=null;
	SelectedDestination.lng=null;
	
	var tmp1=srcLatlng.toString();
	tmp1=tmp1.replace('(','');
	tmp1=tmp1.replace(')','');
	tmp1=tmp1.split(',');
	
	SelectedDestination.lat=tmp1[0];
	SelectedDestination.lng=tmp1[1];
	
	//$(".infoBox").hide();
	var Cityname =allcities[location_id];
        
	if(typeof(ib[location_id])!='undefined')
	ib[location_id].close();
	
	/*Set Hidden variable */	
	document.getElementById("location_id").value = location_id;
	document.getElementById("selectedDestionLat").value = srclat;
	document.getElementById("selectedDestionLong").value = srclgt;
	document.getElementById("cityName").value = Cityname;
	//var Countryname = getKeycityname(country_name);
	
	var Countryname = allcountries[location_id];
	document.getElementById("countryName").value =  Countryname;	
	
	/*Set Hidden variable */	
	$("#user_selected_location").show();
	
	if(document.getElementById("user_selected_location"))
	{
		var c_con_name = ucfirst(Cityname);
		if(country_name !="")
		{
			c_con_name = c_con_name + ', '+ ucfirst(Countryname); 
		}
		
		document.getElementById("btn_select_friends").style.display = '';
		if(mode == "change_destination")
	  {	
		$("#changeDestinationBtn").hide();
		$("#EmailLink").hide();
		
		if(typeof(flag1)!='undefined' && flag1==1) {
		document.getElementById("btn_select_friends").style.display = 'block';
		}
	  }
	  
	  if(mode == "change_friends") {
		$("#changeDestinationBtn").show();
		$("#EmailLink").show();
		
		if(typeof(flag1)!='undefined' && flag1==1) {
		document.getElementById("btn_select_friends").style.display = 'none';
		}
	  }
	  
	for(var i=0; i<markersCitiesArray.length; i++) {
	
		if(markersCitiesArray[i].getPosition().lat()==SelectedDestination.lat && markersCitiesArray[i].getPosition().lng()==SelectedDestination.lng) {
			markersCitiesArray[i].setIcon('<?php echo SITE_URL; ?>images/pinBlue.png');
		}
		else {
			markersCitiesArray[i].setIcon('<?php echo SITE_URL; ?>images/pinRed.png');
		}
	}
	  
	  $("#your_location").hide();
		document.getElementById("user_selected_location").style.display = 'block';		
		document.getElementById("user_selected_location").innerHTML = 'Selected destination <span >'+c_con_name+'</span>';
		
		 var datastring = 'location_id='+location_id+'&selectedDestionLat='+srclat+'&selectedDestionLong='+srclgt+'&cityName='+Cityname+'&countryName='+Countryname+'&temperature='+temperature;
		 //$("#friends_same_dest").html('<img src="<?php echo SITE_URL; ?>images/bx_loader.gif" alt="loading" />');
		 //    		 $("#facebook_like_wrapper").hide();
			$.ajax({
                type: "GET",
				url: "index.php?r=gmap/getFriendsForSelectedDestination",
				data:datastring,
				success:
					function(data)
					{					 
					  //$(".facebook_like_wrapper").hide();
					  $("#your_location").hide();
						if(data!='') {
						  $("#friends_same_dest").show();
						  $("#friends_same_dest").html(data);
						}
					},
				error:
					function (XMLHttpRequest, textStatus, errorThrown)
					{				
						//console.log('error: '+errorThrown);
						//console.log(XMLHttpRequest);
					}
			});
	 }
}

function getKeycityname(cityName) {
	
	cityName=cityName.replace(" ","");
	cityName=cityName.replace(/ /g, "");
	cityName=cityName.replace("%20","");
	cityName=cityName.replace(".","");
	cityName=cityName.replace(",","");
	cityName=cityName.replace("(","");
	cityName=cityName.replace(")","");
	cityName=cityName.replace("-","");
	cityName=cityName.replace("'","");
	cityName=cityName.replace("-","");
	cityName=cityName.replace("’","");
	cityName=cityName.replace("'","");
	cityName=cityName.replace('"',"");
	cityName=cityName.toLowerCase();
	cityName=cityName.replace('/[^A-Za-z 0-9 \.,\?""!@#\$%\^&\*\(\)-_=\+;:<>\/\\\|\}\{\[\]`~]*/g', '') ; 
	return cityName;
}
function ucfirst(str) {
	if(typeof(str)=='undefined' || str=='') {
		return '';
	}
  var f = str.charAt(0).toUpperCase();
  return f + str.substr(1);
} 
function clearOverlaysonChangeDest() {
	  for (var i = 0; i < markersCitiesArray.length; i++ ) 
	  {
	
		if(markersCitiesArray[i].getPosition().lat()!=SelectedDestination.lat && markersCitiesArray[i].getPosition().lng()!=SelectedDestination.lng) 
		{
			markersCitiesArray[i].setMap(null);
		}
	  }
	  markersCitiesArray=[];
}

function clearOverlays() {

	  for (var i = 0; i < markersCitiesArray.length; i++ ) {
		
		if(currentUserMarker!=markersCitiesArray[i] && markersCitiesArray[i].getPosition().lat()!=SelectedDestination.lat && markersCitiesArray[i].getPosition().lng()!=SelectedDestination.lng) {
			markersCitiesArray[i].setMap(null);
		}
	  }	  
	  flag = false;
}

function clearOverlaysFriends() {

	  for (var i = 0; i < markersArray.length; i++ ) {
		
		markersArray[i].setMap(null);
	  }	  
	//  flag = false;
}

function clearOverlaysFrnds() {
	
	for (var i = 0; i < markersArray.length; i++ ) {
			
		if(markersArray[i].getPosition().lat()!=currentUserArrLat && markersArray[i].getPosition().lng()!=currentUserArrLng && markersArray[i].getPosition().lat()!=SelectedDestination.lat && markersArray[i].getPosition().lng()!=SelectedDestination.lng) {
			markersArray[i].setMap(null);
		}
	  }
	  markersArray=[];
}

var KEYCODE_ESC = 27;
$(document).keyup(function(e) {
  
  if (e.keyCode == KEYCODE_ESC) { $(".unloctdFrnds").hide(); $("#srchfriendsinput").val('Search Friends'); } 
});
$(function(){
	$(".btm-content-rt-container").show();
	$(".btm-content-rt-container .info").show();
<?php  if(!isset($currentUser)) { ?>
//$("#destSelectPopup").show();
//$(".ltBox").show();
<?php } ?>
	$('#curLocationDropDown').selectmenu({style:'dropdown',select:function(event,ui){
		PlotCurLocation(ui.item.value); 
	}});
var availableTags = [
	<?php
	$count=0;
	$totCities=count($allcities);
	foreach($allcities as $cityName) { ?>
	"<?php echo $cityName; ?>",
	<?php
	}
	?>];
	  
    $( "#srchFld" ).autocomplete({
      source: availableTags,
	  minLength:3,
	  response: function( event, ui ) { $(".ui-helper-hidden-accessible").hide(); },
	  select: function(event,ui){  DestSearchResultAction(ui.item.value); }
	  
    });
});
function showDestinationSearch() {
	$("#srchFld").show();
	$("#srchfriendsinput").hide();
	$("#srchFld").val('');
	$("#srchfriendsinput").val('');
	$("#destSearchIcon").show();
	$("#frndSearchIcon").hide();
	$(".srchDestination").removeClass('srchFrndIcon');
}

function showFriendSearch() {
	$("#srchFld").hide();
	$("#srchfriendsinput").show();
	$("#srchFld").val('');
	$("#srchfriendsinput").val('');
	$("#destSearchIcon").hide();
	$("#frndSearchIcon").show();
	$(".srchDestination").addClass('srchFrndIcon');
}

function nextButtonShow() {
	$("#nextBtn").show().css("float","right");
	$(".btm-content-rt-container div.info").show();
	$(".btm-content-rt-container div.info").css("float","none");
	$(".btm-content-rt-container div.info").css("width","auto");
	$(".profile-pic-wrapper").hide();
}

function nextButtonHide() {
	$("#nextBtn").hide();
	$(".btm-content-rt-container div.info").show();
	$(".btm-content-rt-container div.info").css("float","left");
	$(".btm-content-rt-container div.info").css("width","270px");
	$(".profile-pic-wrapper").show(); 
}
</script>
<?php
logMe('jmvend',__FILE__,__LINE__);
?>