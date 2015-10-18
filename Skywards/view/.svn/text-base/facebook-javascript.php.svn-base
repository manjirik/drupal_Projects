<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript"> 
window.fbAsyncInit = function() {
	
	FB.init({
	    appId  : '<?php echo APP_ID;?>',
	    status : true, // check login status
	    cookie : true, // enable cookies to allow the server to access the session
	    xfbml  : true  // parse XFBML
	  });
	  FB.Canvas.setAutoGrow();
 
}

function addToPage() {

    // calling the API ...
    var obj = {
      method: 'pagetab',
      redirect_uri: 'YOUR_URL',
    };

    FB.ui(obj);
  }
  
function check_autorized_user(){
	
  	FB.getLoginStatus(function(response){
	  if (response.status === 'connected')
		{
		  if (response.authResponse)
			{
			  var fbUserId = response.authResponse.userID;
			  var token = response.authResponse.accessToken;
			  check_permissions_from_fb();
			}else { 
			//alert('Facebook login cancelled');
				return false;
			}	
		}else
		{ 
			promt_for_permission();
		} // connected else condition if end here 
	},false);
}

function check_permissions_from_fb(){
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
			        	promt_for_permission();
			        }else{
			        	top.location.href  = '<?php echo FB_PAGE_URL_PERMISSION; ?>';
				    }			

			        
				});
}

function promt_for_permission(){
		FB.login(function(response)  //user is not connected.
			{
				if (response.authResponse) 
				{					
					var fbUserId = response.authResponse.userID;
					var token = response.authResponse.accessToken;	
					check_permissions_from_fb();
				}
				else { 

				//alert('Facebook login cancelled');
				return false;
				}				
			}, { scope : '<?php echo PERMISSION_SCOPE; ?>' });
}

  
  function test_me(){
	  
		FB.ui({
	  method: "stream.publish",
	  display: "iframe",
	  user_message_prompt: "Publish This!",
	  message: "I am so smart!  S M R T!",
	  attachment: {
	     name: "Joe has a gift!",
	     caption: "Joe has tested his skills and did extremely well",
	     description: "Here is a list of Joe's skills:",
	     href: "http://example.com/",
	     media:[{"type":"image","src":"http://example.com/imgs/skills.png","href":"http://example.com/"}],
	     properties:{
	       "1)":{"text":"Reading","href":"http://example.com/skill.php?reading"},
	       "2)":{"text":"Math","href":"http://example.com/skill.php?math"},
	       "3)":{"text":"Farmville","href":"http://example.com/skill.php?farmville"}
	     }
	  },
	  action_links: [{ text: 'Test yourself', href: 'http://example.com/test.php' }]
	 },
	 function(response) {
	   if (response && response.post_id) {
	     //alert('Post was published.');
	   } else {
	     //alert('Post was not published.');
	   }
	 }
	);
	}


  function postToFeed() {

      // calling the API ...
      var obj = {
        method: 'feed',
        redirect_uri: 'YOUR URL HERE',
        link: 'https://developers.facebook.com/docs/reference/dialogs/',
        picture: 'http://fbrell.com/f8.jpg',
        name: 'Rahul, Sandip, Sameer, Chaytanya',
        caption: ' ',
		  message: 'Test Message',
        description: 'Using Dialogs to interact with users.'
      };

      
      FB.ui(obj);
    }
  
	function callback(response) {
        document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
      }

	

  
 
  
	 

 

</script>