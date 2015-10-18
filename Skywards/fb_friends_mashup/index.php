<?php
include('base.php');

?>
<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>php-sdk</title>
    <style>
      html, body, #map_canvas {
        margin: 0;
        padding: 0;
        height: 500px;
		width:100%;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
   <script>
      var geocoder;
      var map;
	  var marker;
	  var image = 'icon.png';
	 
      function initialize() {
        geocoder = new google.maps.Geocoder();
		
		
	    var mapOptions = {
          zoom: 3,
          center: new google.maps.LatLng(0, 0),
          mapTypeId: google.maps.MapTypeId.ROADMAP
		 
        }
        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
		
		var address1 = document.getElementById('address').value;
		codeAddress(address1);

			
		<?php 
		$index=0;
		$ArrayString = "";
		foreach($user as $key => $value)
		{
			$ArrayString = $ArrayString . "'"."$value";

			$index++;
			
			if($index<3)
			$ArrayString = $ArrayString . "',";
			else
			$ArrayString = $ArrayString . "'";

		} ?>
		
		var users=new Array(<?php echo $ArrayString ?>);
				
		userCount = users.length;
				
		for(i=0;i<userCount;i++)
		{
			codeAddress(users[i]);	
		}
		//var address2 = document.getElementById('frnd_address').value;
		//codeAddress(address2);
		
		
    }
	  	  

      function codeAddress(address) {
		
        geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
				animation: google.maps.Animation.DROP,
                position: results[0].geometry.location,
				title:"<?php echo $usr_name; ?>",
				icon: image
            });
			 google.maps.event.addListener(marker, 'click', function() {
 			 infowindow.open(map,marker);
				});
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
		  
		  
        });
		
		
		
		
      }
	  
	  
	  
	  var contentString = '<div id="content">'+
    '<?php
	echo '<img src=https://graph.facebook.com/'.$user.'/picture>';
	echo '<br>';	
	echo $usr_fname;
	echo '<br>';
	echo $usr_lname;	
	echo '<br>';	
	echo $usr_cityu;
	
	?>'+
   
    '</div>';
	
		var infowindow = new google.maps.InfoWindow({
   			 content: contentString
		});
	  
	 
    </script>
    </head>
  <body  onload="initialize()" >
 <div>
      <input  id="address" type="textbox" value="<?php echo $usr_cityu; ?>" />
      <!--<input  id="frnd_address" type="textbox" value="< ?php echo $user['loc'] ?>"/>
-->
     
    </div>
   <div id="map_canvas"></div>

    <?php if ($user): ?>
      <a href="index.php?logout=1">Logout</a>
      <br>
       <?php echo $countFull; ?>
    <?php else: ?>
      <div>
        Login using OAuth 2.0 handled by the PHP SDK:
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
      </div>
    <?php endif ?>

    <h3>PHP Session</h3>
    <pre><?php print_r($_SESSION); ?></pre>

    <?php if ($user): ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">
      <br/>
---------------------------------------
<br/>
	<?php
	
	echo $usr_fname;
	echo $usr_lname;	
	echo $usr_cityu;
	
	?>
    <br/>
---------------------------------------
    
    

      <h3>Your User Object (/me)</h3>
      <pre><?php print_r($user_profile); ?></pre>
    <?php else: ?>
      <strong><em>You are not Connected.</em></strong>
    <?php endif ?>
    
    
     
  </body>
</html>
