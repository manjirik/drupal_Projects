//--------------------------------------------------------------------------------------------	

function playlistStatus(id, playlist_id, message, username, emailid, playlist_name){

	var answer = confirm(message)
	if (answer){
		var dataString = "id=" + playlist_id + "username=" + username + "emailid=" + emailid + "playlist_name=" + playlist_name + "&checkedValue="+id.checked;
		$.ajax
		(
			{
				type: "POST", url: "playlistStatus.php", data: dataString,   
				success: 
					function(data) 
					{ 
					document.getElementById('message').innerHTML = data;
					setTimeout("location.reload(true);",2000);
					},
				error: 
					function (XMLHttpRequest, textStatus, errorThrown) 
					{
					
					}
			}
		)
		//window.location = "http://www.google.com/";
	}
	else{
		setTimeout("location.reload(true);",5);
	}

}

//--------------------------------------------------------------------------------------------	

function change_profile_status(playlist_id, username, emailid, playlist_name, mode)
{
	var tmp_mode = $("#"+mode).val();
	if(tmp_mode == 0){
	var message = 'Are you sure that you want to Unpublished this Playlist? Press ok to proceed.';
	var answer = confirm(message);
	}else if(tmp_mode == 1){
	var message = 'Are you sure that you want to Published this Playlist? Press ok to proceed.';
	var answer = confirm(message);
	}else if(tmp_mode == 2){
	var message = 'Are you sure that you want to Rejected this Playlist? Press ok to proceed.';
	var answer = confirm(message);
	}
	
	if (answer){
	// call ajax to interchange order.
	
	var dataString = "id=" + playlist_id +"&mode="+tmp_mode + "&username=" + username + "&emailid=" + emailid + "&playlist_name=" + playlist_name;
	//alert(dataString)
	$.ajax
	(
		{   									
			type: "POST", url: "playlistStatus.php", data: dataString, 
			success: 
				function(data) 
				{ 	
					//alert(data);					
					//window.location.href = "countryList.php";
					//window.location.reload();
					document.getElementById('message').innerHTML = data;
					setTimeout("location.reload(true);",2000);
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) 
				{
																					
				}
		}
	)
	}
	else{
		setTimeout("location.reload(true);",5);
	}
}

//--------------------------------------------------------------------------------------------	

function fbUserStatus(id, user_id, message){

	var answer = confirm(message)
	if (answer){
		var dataString = "id=" + user_id + "&checkedValue="+id.checked;
		$.ajax
		(
			{
				type: "POST", url: "userStatus.php", data: dataString,   
				success: 
					function(data) 
					{ 
					document.getElementById('message').innerHTML = data;
					setTimeout("location.reload(true);",2000);
					},
				error: 
					function (XMLHttpRequest, textStatus, errorThrown) 
					{
					
					}
			}
		)
		//window.location = "http://www.google.com/";
	}
	else{
		setTimeout("location.reload(true);",5);
	}

}

//--------------------------------------------------------------------------------------------	