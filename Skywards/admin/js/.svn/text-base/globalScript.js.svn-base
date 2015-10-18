// JavaScript Document
//________________________________________________________________________________________________________________  login xml request
var xmlRequest;
var xmlRequestRead;
var unReadNotificationCount;
var noUnreadMessage ="0 Unread notifications";


//________________________________________________________________________________________________________________ readNotification
function readNotification (event){
	var nid = $(event.target).attr("notificationID");
	//alert(nid)
	//call ajax to update read flag
	datastring = "notificationID="+nid;
	xmlRequestRead = $.ajax({
	  type: "POST",
	  url: "php/notificationRead.php" ,
	  data: datastring,
	});
	
	unReadNotificationCount--;
	$(this).parents(".notificationRowContainer").animate({ opacity: 'hide' }, "fast");

	if (unReadNotificationCount==1){
		$('#notificationPopup').html('<div class="blankNotification">0 Unread notifications</div>  <div class="arrow"></div>')
	}
	
	updateNotificationsBadge (unReadNotificationCount-1);
}

function updateNotificationsBadge (cnt){
	if (cnt==0){
		//$('#notificationBadge').css("display","none");
		$('#notificationBadge').html("0")
	}else{
		//$('#notificationBadge').css("display","block");
		$('#notificationBadge').html(nct)
	}
	
}

//________________________________________________________________________________________________________________ submit data

function doAjax() {
	/*xmlRequest = $.ajax({
	  type: "GET",
	  url: "php/notifications.php",
	  processData: false
	});
	
	xmlRequest.done(function(xml) {
		//success
		var html="";
		var cnt = $(xml).find('notification').length;
		var videosCount = $(xml).find("notifications").attr('videos');
		var photosCount = $(xml).find("notifications").attr('photos');
		var votesCount = $(xml).find("notifications").attr('votes');
		//
		//alert (videosCount + " : " + photosCount + " : " + votesCount);
		//
		$('#videoCounter h3').html(videosCount);
		$('#photoCounter h3').html(photosCount);
		$('#votesCounter h3').html(votesCount);
		
		updateNotificationsBadge(cnt);
		
		$(xml).find('notification').each(function(){
				var id = $(this).find('id').text();
				var description = $(this).find('desc').text();
				var message = $(this).find('msg').text();
				var htmlpart ='<div class="deleteNotificationBTN" notificationID="' + id + ' "></div> <h3>' + description + '</h3><p>' + message + '</p></div>';
				
				cnt--;
				if (cnt>=1){
					html += '<div class="notificationRowContainer">' + htmlpart;
				}else{
					html += '<div class="notificationRowContainer notificationRowContainerNoBoarder">' + htmlpart;
				}
		});
		
		if (html==""){
			$('#notificationPopup').html('<div class="blankNotification">noUnreadMessage</div>  <div class="arrow"></div>');
		}else{
			$('#notificationPopup').html(html + '<div class="arrow"></div>');
		}
		unReadNotificationCount = $("#notificationPopup").children().size()	;
	});
	
	xmlRequest.fail(function(jqXHR, textStatus) {
	  alert( "Request failed: " + textStatus );
	});	*/
	url = window.location.href;
	url1 = url.substr(url.indexOf("uid=")+4);
	if(url1.indexOf("&") > -1)
	{
		uId = url1.substr(0,url1.indexOf("&"));
	}
	else
	{
		uId = url1;
	}
	//alert(uId)
	//uId = 1;
	datastring = "uId="+uId;
	$.ajax({  
		type: "POST",
		url: "php/notifications.php",
		data: datastring,
		
		success: function(msg){
			//alert(msg);
			var html="";
			var cnt = $(msg).find('notification').length;
			var videosCount = $(msg).find("notifications").attr('videos');
			var photosCount = $(msg).find("notifications").attr('photos');
			var votesCount = $(msg).find("notifications").attr('votes');
			//
			//alert (videosCount + " : " + photosCount + " : " + votesCount);
			//
			$('#videoCounter h3').html(videosCount);
			$('#photoCounter h3').html(photosCount);
			$('#votesCounter h3').html(votesCount);
			
			$('#notificationBadge').html(cnt);
			
			$(msg).find('notification').each(function(){
					var id = $(this).find('id').text();
					var description = $(this).find('desc').text();
					var message = $(this).find('msg').text();
					var htmlpart ='<div class="deleteNotificationBTN" notificationID="' + id + ' "></div> <h3>' + description + '</h3><p>' + message + '</p></div>';
					
					cnt--;
					if (cnt>=1){
						html += '<div class="notificationRowContainer">' + htmlpart;
					}else{
						html += '<div class="notificationRowContainer notificationRowContainerNoBoarder">' + htmlpart;
					}
			});
			
			if (html==""){
				$('#notificationPopup').html('<div class="blankNotification">noUnreadMessage</div>  <div class="arrow"></div>');
			}else{
				$('#notificationPopup').html(html + '<div class="arrow"></div>');
			}
			unReadNotificationCount = $("#notificationPopup").children().size()	;
		},
		
		error: function(msg){
			//alert(result);
			//alert( "Request failed: " + msg );
		}
		
	});

}

function showHide (obj){

	if ($(obj).is( ":visible" )){ 
		$(obj).css ("bottom", 100);
		$(obj).css ("opacity", 1);
		$(obj).animate( {
									bottom: 75,
									opacity: 0
									}, 300, function() {$(obj).css ("display", "none");});
									
		if (obj=="#notificationPopup"){
			$("#tabNotification").removeClass ("tabNotificationActive");
		}else{
			$("#tabUpload").removeClass ("tabUploadActive");			
		}					
	} else { 
		$(obj).css ("bottom", 75);
		$(obj).css ("opacity", 0);
		$(obj).css ("display", "block");
		
		$(obj).animate( {
									easing: "cubicIn",
									bottom: 100,
									opacity: 1
									}, 300);
									
		if (obj=="#notificationPopup"){
			$("#tabNotification").addClass ("tabNotificationActive");
		}else{
			$("#tabUpload").addClass ("tabUploadActive");			
		}								
	}
}

//________________________________________________________________________________________________________________FaceBook Twitter share submit
		
function fb_twitter_share(flag) {
	//alert(flag)
	url = window.location.href;
	url1 = url.substr(url.indexOf("uid=")+4);
	if(url1.indexOf("&") > -1)
	{
		uId = url1.substr(0,url1.indexOf("&"));
	}
	else
	{
		uId = url1;
	}
	var message = $("#message").val();
	//alert(message)
	datastring = "uId="+uId+"&flag="+flag+"&message="+message+"&language=en";
	$.ajax({  
		type: "POST",
		url: "php/add_share.php",
		data: datastring,
		
		success: function(msg){
			//alert(msg);
			parent.$.fancybox.close();
		},
		
		error: function(msg){
			//alert(result);
			//alert( "Request failed: " + msg );
		}
		
	});

}
//________________________________________________________________________________________________________________ uploadClick
function tabClick( event ){
	event.preventDefault(); 
	if (this.id == "tabNotification"){
		if ($("#uploadPopup").is( ":visible" )){
			showHide ("#uploadPopup");
		}
		showHide ("#notificationPopup");
		
	}else{
		if ($("#notificationPopup").is( ":visible" )){ 
			showHide ("#notificationPopup");
		}
		showHide ("#uploadPopup");
	}
}

function uploadIconClick(event){
	//alert (event.target.id)
	if (event.target.id == "videoUploadIcon"){
		window.location.href = "videoUpload.html";
	}else{
		window.location.href = "photoUpload.html";
	}
}

//________________________________________________________________________________________________________________ on document ready
function onReady(){
	//checkbox code
	$("#container").removeClass().addClass("animClass fadeIn");
	
	$("#tabUpload").click(tabClick);
	$("#tabNotification").click(tabClick);
	
	$("#videoUploadIcon").click(uploadIconClick);
	$("#photoUploadIcon").click(uploadIconClick);
	
	doAjax();
	
	setInterval(doAjax, 30000);
	unReadNotificationCount = $("#notificationPopup").children().size()	;
	
	
	updateNotificationsBadge (unReadNotificationCount-1);
	
	$("body").delegate(".deleteNotificationBTN", "click", readNotification);
	
	
	
	//_____________________________________________________________________________________________________ navigation links
	url = window.location.href;
	url1 = url.substr(url.indexOf("uid=")+4);
	if(url1.indexOf("&") > -1)
	{
		uId = url1.substr(0,url1.indexOf("&"));
	}
	else
	{
		uId = url1;
	}
	$("#BTN_home").click (function (){
					var str;
					str = $("#BTN_home").attr("class");
					if (str.indexOf ("navigationButtonActive") ==-1){
						window.location = "home.php?uid="+uId;
					}
	});

	$("#BTN_viewProfile").click (function (){
					var str;
					str = $("#BTN_viewProfile").attr("class");
					
					if (str.indexOf ("navigationButtonActive") ==-1){
						window.location = "profile.php?uid="+uId;
					}
	});
	
	$("#BTN_Lang").click (function (){
					if ( $("#BTN_Lang").attr("class") == "navigationButton redButton arabicText"){
						window.location = "../en/home.php?uid="+uId;
					}else{
						window.location = "../ar/home.php?uid="+uId;
					}
				});
	
	
	$("#BTN_Logout").click (function (){window.location = "logout.php"});
	
	
	$("#BTN_Checkin").fancybox({
				'width'				: 600,
				'height'			: 517,
				'autoScale'			: false,
				'transitionIn'		: 'easing',
				'transitionOut'		: 'easing',
				'type'				: 'iframe',
				'padding'			:0, 
				'margin'			:0
			});
			
	$("#tabShare").fancybox({
				'width'				: 605,
				'height'			: 380,
				'autoScale'			: false,
				'transitionIn'		: 'easing',
				'transitionOut'		: 'easing',
				'type'				: 'iframe',
				'padding'			:0, 
				'margin'			:0
			});		
}

//________________________________________________________________________________________________________________ on document load
function onLoad(){

}

//________________________________________________________________________________________________________________ attach events
$(window).load(onLoad);
$(document).ready(onReady);