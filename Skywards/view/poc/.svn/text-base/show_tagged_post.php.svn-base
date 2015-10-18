<h3>Post Tagged Page</h3>
<!--  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# <?php echo APP_NAMESPACE;?>: http://ogp.me/ns/fb/<?php echo APP_NAMESPACE;?>#">  <meta property="fb:app_id" content="<?php echo APP_ID;?>" /> <meta property="og:type"   content="<?php echo APP_NAMESPACE;?>:<?php echo OPEN_GRAPH_OBJECT_NAME;?>" /> <meta property="og:url" content="<?php echo $data["art_url"];?>" /> <meta property="og:title"  content="<?php echo $data["art_title"];?>" /> <meta property="og:image"  content="<?php echo $data["art_image"];?>" />  -->

<script>
//generate_open_graph_meta('<?php echo $data["art_url"];?>','<?php echo $data["art_title"];?>','<?php echo $data["art_image"];?>');
 /*
	* Function name : post_wall_users_tagged
	* Description : This function post an artcles on user wall with friends tagging.
	* Paramerts : art_url and tagged_users
	* Created by: nitin tatte 17/2/13
	* Updated by: nitin tatte 17/2/13
	*/

 function post_wall_users_tagged(art_title,art_image,tagged_users)
  {
      FB.api(
        '/me/<?php echo APP_NAMESPACE;?>:<?php echo OPEN_GRAPH_ACTION_NAME;?>',
        'post',
        { <?php echo OPEN_GRAPH_OBJECT_NAME;?>: '<?php echo SITE_URL;?>view/og_page.php',
		  image:art_image,
		  message:art_title,
		  tags: tagged_users
		},
        function(response) {
           if (!response || response.error) {
              alert('Error occured');
			  alert(response.error);
			  console.log(response.error);
           } else {
              alert('<?php echo OPEN_GRAPH_ACTION_NAME;?> was successful! Action ID: ' + response.id);
           }
        });
  }

    
   /*
	* Function name : post_wall_places_tagged
	* Description : This function post an artcles on user wall with friends tagging and place tagging.
	* Paramerts : art_url,tagged_users and place_tagged
	* Created by: nitin tatte 17/2/13
	* Updated by: nitin tatte 17/2/13
	*/

  function post_wall_places_tagged(art_title,art_image,tagged_users,place_tagged)
  {
      FB.api(
        '/me/<?php echo APP_NAMESPACE;?>:<?php echo OPEN_GRAPH_ACTION_NAME;?>',
        'post',
        { <?php echo OPEN_GRAPH_OBJECT_NAME;?>: '<?php echo SITE_URL;?>view/og_page.php',
		  image:art_image,
		  message:art_title,
		  tags: tagged_users,
		  place:place_tagged
		},
        function(response) {
           if (!response || response.error) {
              alert('Error occured');
			  alert(response.error);
			  console.log(response.error);
           } else {
              alert('<?php echo OPEN_GRAPH_ACTION_NAME;?> was successful! Action ID: ' + response.id);
           }
        });
  }
</script>


<form>
<input type="button" value="Cook" onclick="javascript:post_wall_users_tagged('<?php echo $data["art_title"];?>','<?php echo $data["art_image"];?>','<?php echo $data["tagged_users"];?>');" />
<input type="button" value="CookLocation" onclick="javascript:post_wall_places_tagged('<?php echo $data["art_url"];?>','<?php echo $data["tagged_users"];?>','<?php echo $data["place_tagged"];?>');" />
</form>