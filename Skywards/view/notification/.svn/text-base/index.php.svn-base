<style>
.notifiWrap{background-color:#d9d4ca;}
.notifiWrap h2.header{font-family: 'EK03Plain-M02';background-color:#d9d4ca; color:#121212; padding:20px; border-bottom:1px solid #c9c8c7;}
.notifications li{border-bottom:1px solid #8b827c;border-top:1px solid #eceae9; overflow:hidden;background-color:#eceae9;}
.notifications li .notifIcon{height:100px; width:103px; display:block; float:left; background: url(images/notifIcon.png) no-repeat center center #cec6b3; border-left:5px solid #888077;}
.notifications li .notifText{height:70px;padding:15px 30px; float:left; width:642px; color:#5f5858; line-height:17px;}
.notifications li .notifText strong{font-weight:bold; display:block;}
.notifications li .notifText span{margin:5px 0px 0px;color:#d6152c; font-size:11px; font-style:italic; display:block;}
.notifications li.unread{background-color:#bfbbb2;}
.notifications li.unread .notifIcon{background: url(images/notifIcon.png) no-repeat center center #d61e2a; border-left:5px solid #2f3436;}
.notifications li.unread .notifText{color:#221f1f; font-weight:bold;}
.notifications li.unread .notifText span{font-weight:bold;}
.pgContainer{border-bottom:1px solid #c9c8c7;border-top:1px solid #FFF; height:39px; padding:0px 30px; line-height:39px;}
.pgContainer .next a{color:#d6152c; font-family: 'EK03Plain-M02'; font-size:16px; text-decoration:none;}
.pgContainer .pages{font-family: 'EK03Plain-M02'; font-size:14px;color:#2f3436;}
.pgContainer .pages a{text-decoration:none; color:#2f3436; padding:0px 3px;}
.pgContainer .pages a.active{color:#d6152c;}
</style>

<div class="tabs">
	<?php include_once BASEPATH.DS."view".DS."navigation.php"; ?>
<div>
<?php $cnt_noti = count($notification_arr); ?>
<script type="text/javascript">
function changePage(targetPage)
{
 var url = window.location.href;
 url = 'index.php?r=notification/index';
 url = url + '&page='+targetPage;
 window.location.href = url;
}
</script>
<div class="notifiWrap">
	<h2 class="header">Notifications</h2>
  <ul class="notifications">
	<?php  
	
		if($cnt_noti > 0)
		{
			foreach($notification_arr as $key=>$val)
			{
			
				$from = $val['from'];
				$time = date("dS h:m",strtotime($val['time']));
				$date_to_show = date("l, F dS, Y h:m",strtotime($val['time'])).' GMT';
				//$date_to_show = strtotime($val['time']).' GMT';
				$title = $val['title'];
				$desc = $val['desc']; 
				$desc1 = $val['desc1'];
				$status = $val['status'];
			
			?>
			<?php if($status==0) { ?>
			<li class="unread">
			<?php } else { ?>
			<li class="">
			<?php } ?>
        	<div class="notifIcon"></div>
            <div class="notifText">
            	<strong><?php echo $desc;?></strong> 
				<p><?php echo $desc1;?></p>
				<span><?php echo $date_to_show?></span>
           </div>
        </li>
		<?php 
		 } 
		echo $pagination; 
	 }else{
   echo '<div class="error">&nbsp;&nbsp;&nbsp;Sorry, no more notifications yet!<br />&nbsp;<br /></div>';
    }?>
	
    	<!--<li class="unread">
        	<div class="notifIcon"></div>
            <div class="notifText">
            	<strong>Entry Ticket created successfully</strong> 
            	<p>Congratulations, you have successfully created your first Entry Ticket.</p>
            	<span>Sunday January 13th, 2013 08:35 GMT</span>
           </div>
        </li>
        <li>
        	<div class="notifIcon"></div>
          <div class="notifText">
            	<strong>Entry Ticket converted successfully</strong> 
            	<p>Congratulations, (friends name) has successfully converted their Entry Ticket.</p> 
<p>You are now one step closer to winning the trip a lifetime to (destination) with (name), (name), (name), and (name).</p>
            	<span>Sunday January 13th, 2013 08:35 GMT</span>
           </div>
        </li>
        <li>
        	<div class="notifIcon"></div>
            <div class="notifText">
            	<strong>Entry Ticket has become valid</strong> 
            	<p>Congratulations, your Entry Ticket is now valid.</p> 
<p>You could now win the trip a lifetime to (destination) with (name), (name), (name), (name), and (name).</p>
            	<span>Sunday January 13th, 2013 08:35 GMT</span>
           </div>
        </li>
        <li>
        	<div class="notifIcon"></div>
            <div class="notifText">
            	<strong>Entry Ticket created successfully </strong> 
            	<p>Congratulations, you have successfully created your first Entry Ticket.</p>
            	<span>Sunday January 13th, 2013 08:35 GMT</span>
           </div>
        </li>-->
    </ul>
 <!-- <div class="pgContainer">
    <span class="fL pages">Page: <a href="#" class="active">1</a> | <a href="#">2</a> | <a href="#">3</a></span>	
    <span class="fR next"><a href="#">Next ></a></span>
    </div>-->
  <?php 
	
	/* if($cnt_noti > 0){
		
		
		foreach($notification_arr as $key=>$val){
				$from = $val['from'];
				$time = date("dS h:m",strtotime($val['time']));
				$date_to_show = date("l, F dS, Y h:m",strtotime($val['time'])).' GMT';
				//$date_to_show = strtotime($val['time']).' GMT';
				$title = $val['title'];
				$desc = $val['desc'];
				$desc1 = $val['desc1'];

			?>
			<div class="notifiBox">
				<div class="ltGeryBox">
					From:<br>
					<?php echo $from; ?>
				 <br>
				<?php echo $time; ?>
				</div>
				<div class="descBox">
					<h2><?php echo $title; ?></h2>
					<p class="date"><?php echo $date_to_show?></p>
					<p><?php echo $desc;?></p>
					<p><?php echo $desc1;?></p>
				</div>
			</div>
		<?php 
		 } 
		echo $pagination; 
	}else{
   echo '<div class="error">&nbsp;&nbsp;&nbsp;Sorry, no more notifications yet!<br />&nbsp;<br /></div>';
    } */?>
     
</div>
