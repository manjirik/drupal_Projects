<?php
include_once('../config/config.php');
include_once('../config/fb_config.php');

if(!empty($_REQUEST["fb_action_ids"]) && !empty($_REQUEST["fb_action_types"]))
{
		$app_data=$_REQUEST['fb_ref'];
		$url = FB_PAGE_URL_PERMISSION."&app_data=".$_REQUEST['fb_ref'];
	?>
	<script type="text/javascript">
	top.location.href="<?php echo $url; ?>";
	</script>
	<?php
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"
  xmlns:fb="https://www.facebook.com/2008/fbml"> 
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# <?php echo APP_NAMESPACE;?>: http://ogp.me/ns/fb/<?php echo APP_NAMESPACE;?>#">
  <meta property="fb:app_id" content="<?php echo APP_ID;?>" />
  <meta property="og:type"   content="<?php echo APP_NAMESPACE;?>:<?php echo OPEN_GRAPH_OBJECT_NAME;?>" />
  <meta property="og:url" content="<?php echo SITE_URL;?>view/og_page.php" />
  <meta property="og:title"  content="<?php echo OPEN_GRAPH_ACTION_TITLE;?>" />
  <meta property="og:image"  content="<?php echo OPEN_GRAPH_ACTION_IMG;?>" />
  
</head>
<body>
</body>
</html>