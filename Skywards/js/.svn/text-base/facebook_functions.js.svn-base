function check_autorized_user(fb_page_url,permission_scope,redirectPage){	 
  	FB.getLoginStatus(function(response){	 
	  if (response.status === 'connected')
		{ 
		  if (response.authResponse)
			{
			  var fbUserId = response.authResponse.userID;
			  var token = response.authResponse.accessToken;
			  check_permissions_from_fb(fb_page_url,permission_scope, redirectPage);
			}else { 			
			//alert('Facebook login cancelled');
				return false;
			}	
		}else
		{ 		
			promt_for_permission(fb_page_url,permission_scope,redirectPage);
		} // connected else condition if end here 
	},true);
}

function check_permissions_from_fb(fb_page_url,permission_scope, redirectPage){
	  var permsNeeded = ['publish_stream'];	  
	  FB.api('/me/permissions', function(res) // get friends list count
				{
				  var permsArray = res.data[0];
				  var permsToPrompt = [];
			        for (var i in permsNeeded) {
			          if (permsArray[permsNeeded[i]] == null) {
			            permsToPrompt.push(permsNeeded[i]);
			          }
			        } 
			        if (permsToPrompt.length > 0) {
			        	promt_for_permission(fb_page_url,permission_scope,redirectPage);
			        }else{
						if(redirectPage=='hideVideo') {
							$("#video_popup").hide();
							$('landContWrap').hide();
							$('.ltBox').hide();
						}
						else {
						//top.location.href = fb_page_url;						 
						window.location.href  = 'index.php?r='+redirectPage;
						}
			        	
				    }			

			        
				});
}

function promt_for_permission(fb_page_url,permission_scope,redirectPage){
 
		FB.login(function(response)  //user is not connected.
			{
				if (response.authResponse) 
				{					
					var fbUserId = response.authResponse.userID;
					var token = response.authResponse.accessToken;	
					check_permissions_from_fb(fb_page_url,permission_scope,redirectPage);					 
				}
				else { 

				//alert('Facebook login cancelled');
				return false;
				}				
			}, { scope : permission_scope });
} 
 