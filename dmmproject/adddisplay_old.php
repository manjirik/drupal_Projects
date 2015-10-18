<?php
include_once "inc/config.php";
include_once "inc/database.php";
include_once "controller/tblAddsController.php";
include_once "controller/tblSettingsController.php";
$dbObj = new database();
$conObj = $dbObj->connectDB();
$settingsObj = new tblSettingsController($conObj);
$settingArr = $settingsObj->getSettings();
?>
<script type="text/javascript">
$(document).ready(function() {

$('.slideshow1').cycle({
	fx:     'scrollLeft',
	speed:  <?php echo $settingArr[0]['adv_interval_time']*1000; ?>,
	timeout: <?php echo ($settingArr[0]['duration_adv_time']+$settingArr[0]['adv_interval_time'])*1000; ?>,
	sync: 0,
	before:  timerEnd, 
        after:   timerStart,
	pager:  '#nav',
	pagerAnchorBuilder: function(idx) { 
				var thumb_pager = $("#slideshow_thumb").children().eq(idx).html();
                return '<li><a id="south6" class="add" href="javascript:void(0)" onclick="add_show()" title="Add 1">'+thumb_pager+'</a></li>';
        }

	});
});
$('.slideshow1').cycle('stop');
var c=<?php echo $settingArr[0]['duration_adv_time']; ?>;
var t;
var timer_is_on=0;

function timerStart()
{
	if(c<10)
	{
		c1 = '0'+c;
	}
	else
	{
		c1=c;
	}
	$("#add_timer").html(':'+c1);
	$("#add_timer").css("display","block");
	if(c <= 1)
	{
	}
	else
	{
		c=c-1;
	}

	t=setTimeout("timerStart()",1000);
	timer_is_on=1;
}

function timerEnd()
{
	//alert("hi")
	if(timer_is_on == 1)
	{
		c = <?php echo $settingArr[0]['duration_adv_time']; ?>;
	}
	else
	{
		if(c<10)
		{
			c1 = '0'+c;
		}
		else
		{
			c1=c;
		}
		$("#add_timer").html(':'+c1);
	}
	clearTimeout(t);
	disableTimer();
	timer_is_on=0;
}

function disableTimer()
{
	$("#add_timer").html("0");
	$("#add_timer").css("display","none");
}

</script>
<?php
			$paramArray1 = array
			(	
				"table_name" => "admin_advertise",
			);
			$addsObj = new tblAddsController($conObj);
			$addsArr = $addsObj->getAddsList($paramArray1);
			$addsArrCnt = count($addsArr);
			if($addsArrCnt >0) {?>
<div class="addPanel" style="width:100%">
	<div id="add_timer"></div>
    <div class="slideshow1" style="width:100%">
        <?php    
        for($i=0; $i<$addsArrCnt; $i++)
        {
            $add_path = ADMIN_ADV_PATH.$addsArr[$i]['ad_path'];
        ?>
        	<?php if($addsArr[$i]['adv_link'] != ""): ?>
            <a href="<?php echo $addsArr[$i]['adv_link']; ?>" target="_blank"><img src="<?php echo $add_path; ?>" /></a>
            <?php else: ?>
        	<img src="<?php echo $add_path; ?>" />
            <?php endif; ?>
        <?php
        }
        ?>
    </div>
    <div class="slideshow_thumb" id="slideshow_thumb" style="display:none">
        <?php
        
        for($i=0; $i<$addsArrCnt; $i++)
        {
            $add_path = ADMIN_ADV_PATH."thumb/".$addsArr[$i]['ad_thumb_path'];
        ?>
        	<div><img src="<?php echo $add_path; ?>" alt="Add <?php echo $i+0; ?>" /></div>
        <?php
        }
        ?>
    </div>
</div>
<?php }	?>