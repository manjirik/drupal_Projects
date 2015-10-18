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
var c=<?php echo $settingArr[0]['duration_adv_time']; ?>;
var t;
var timer_is_on=0;
var abc = 0;
var abc1 = 0;
window.onresize = function(event) {
	var w = $('.slideshow1').outerWidth();
	$('.slideshow1 img').each(function(index){
		$(this).css({
			marginTop: 0,
			marginLeft: 0,
			width: w,
			height: 'auto'
		});
	});
	$('.slideshow1 a').each(function(index){
		$(this).css({
			marginTop: 0,
			marginLeft: 0,
			width: w,
			height: 'auto'
		});
	});
}

$(document).ready(function() {
$('.slideshow1').cycle({
	fx:     'fade',
	sync: 1,
	speed: 500,
	pager:  '#nav',
	after: onAfter,
	height: 'auto',
	before: onBefore,
	cssBefore: {   
        width: 'auto',
		height: 'auto'
    }, 
	pagerAnchorBuilder: function(idx) { 
				var thumb_pager = $("#slideshow_thumb").children().eq(idx).html();
				var thumb_title = $("#slideshow_thumb").children().eq(idx).attr("title");
				var thumb_class = $("#slideshow_thumb").children().eq(idx).attr("class");
				var thumb_length = $("#slideshow_thumb").children().length;
				if((idx%2)==0 && thumb_class=="feat_add_thumb")
				{
					if(idx == 0)
					{
						var indexId = abc1+6;
						abc1 = abc1+1;
						return '<li class="first_thumb_img"><a id="south'+indexId+'" class="add" href="javascript:void(0)" onclick="add_show()" title="'+thumb_title+'">'+thumb_pager+'</a></li>';
					}
					else
					{
						var indexId = abc1+6;
						abc1 = abc1+1;
						return '<li><a id="south'+indexId+'" class="add" href="javascript:void(0)" onclick="add_show()" title="'+thumb_title+'">'+thumb_pager+'</a></li>';
					}
				}
				else
				{
					return '';
				}
        },
	timeoutFn: timeoutfn
	});
	$('#nav li').each(function(index) {
		var tipsyId = 6+index;
		$("#south"+tipsyId).tipsy({gravity: 's'})
    });
	setTimeout('displayTip()',2000);
	var w = $('.slideshow1').outerWidth();
	$('.slideshow1 img').each(function(index){
		$(this).css({
			marginTop: 0,
			marginLeft: 0,
			width: w,
			height: 'auto'
		});
	});
});

function displayTip(curr,next,opts) {
	$('#nav li').each(function(index) {
		var tipsyId = 6+index;
		$("#south"+tipsyId).tipsy({gravity: 's'})
    });
}
function onBefore(curr,next,opts) {
    var $slide = $(next);
    var w = $slide.parent().outerWidth();
    var h = $slide.parent().outerHeight();
	$slide.parent().children("img").each(function(index){
		$(this).css({
			marginTop: 0,
			marginLeft: 0,
			width: w,
			height: 'auto'
		});
});
}
function onAfter(curr,next,opts) {
    var $slide = $(next);
    var w = $slide.parent().outerWidth();
    var h = $slide.parent().outerHeight();
    $slide.parent().children("img").each(function(index){
		$(this).css({
			marginTop: 0,
			marginLeft: 0,
			width: w,
			height: 'auto'
		});
	});
}

function timeoutfn(currSlideElement, nextSlideElement, opts, forwardFlag) {
    var imgtime = <?php echo ($settingArr[0]['duration_adv_time'])*1000; ?>;
    var blanktime = <?php echo ($settingArr[0]['adv_interval_time'])*1000; ?>;
        if($(currSlideElement).parent().html() == null)
	{
		return 0;
	}
	else if ($(currSlideElement).is('span'))
	{
		time_interval = imgtime;
		return time_interval;
	}
	else if(($(currSlideElement).is('img') || $(currSlideElement).is('a')) && $(nextSlideElement).is('span'))
	{
		if(abc != 0)
		{
			time_interval1 = blanktime;
			return time_interval1;	
		}	
		else
		{
			abc = 1;
			$('.slideshow1').delay(1000).queue(function() {
				$('.slideshow1').cycle('pause');
			});
			return 0;
		}
	}
}
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
	if(c < 0)
	{
		timerEnd();
	}
	else
	{
		c=c-1;
	}
	timer_is_on=1;
	t=setTimeout('timerStart()',1000);
}

function timerEnd()
{
	clearTimeout(t);
	disableTimer();
}

function disableTimer()
{
	$('#comment_adv_freez').val("0");
	if($('#comment_popup_freez').val() != 1)
	{
	$('.slideshow').cycle("resume");
	}
	if(timer_is_on == 1)
	{
		$("#add_timer").css("display","none");
		timer_is_on=0;
    }
}

function timerclickStart()
{
	if($(".slideshow1").html() != null)
	{
	$('.slideshow').cycle("pause");
	}
	$('#comment_adv_freez').val("1");
	c=<?php echo $settingArr[0]['duration_adv_time']; ?>;
	var w = $('.slideshow1').outerWidth();
	$('.slideshow1 img').each(function(index){
		$(this).css({
			marginTop: 0,
			marginLeft: 0,
			width: w
		});
	});
	clearTimeout(t);
	if(timerRunning == true)
	{
		timerStart();
	}
	timerRunning = true;
}

</script>
<?php 
			if(isset($_REQUEST["musician"]))
			{
			$adv_user_id = $addsObj->getUserID($_REQUEST['musician']);
			$paramArray1 = array
			(	
				"table_name" => "admin_advertise",
				"user_id" => $adv_user_id,
			);
			$addsObj = new tblAddsController($conObj);
			$addsArr = $addsObj->getAddsListByUser($paramArray1);
			$addsArrCnt = count($addsArr);			
			}else{
			$paramArray1 = array
			(	
				"table_name" => "admin_advertise",
			);
			$addsObj = new tblAddsController($conObj);
			$addsArr = $addsObj->getAddsList($paramArray1);
			$addsArrCnt = count($addsArr);
			}
			
			if($addsArrCnt >0) {?>
<div class="addPanel" style="width:auto">
	<input type="hidden" id="img_hidden_time" value="<?php echo ($settingArr[0]['duration_adv_time'])*1000; ?>" />
	<div id="add_timer"></div>
    <div class="slideshow1" style="width:auto">
		<?php 
			$add_path = ADMIN_ADV_PATH.$addsArr[$addsArrCnt-1]['ad_path'];
			if($addsArr[$addsArrCnt-1]['adv_link'] != ""): 
			?>
            <a class="123" href="<?php echo $addsArr[$addsArrCnt-1]['adv_link']; ?>" target="_blank"><img src="<?php echo $add_path; ?>" /></a>
            <?php else: ?>
        	<img class="456" src="<?php echo $add_path; ?>" />
            <?php endif; ?>
            <span class="789"></span>
        <?php   
        for($i=0; $i<$addsArrCnt-1; $i++)
        {
            $add_path = ADMIN_ADV_PATH.$addsArr[$i]['ad_path'];
        ?>
        	<?php if($addsArr[$i]['adv_link'] != ""): ?>
            <a class="123" href="<?php echo $addsArr[$i]['adv_link']; ?>" target="_blank"><img src="<?php echo $add_path; ?>" /></a>
            <?php else: ?>
        	<img class="456" src="<?php echo $add_path; ?>" />
            <?php endif; ?>
            <span class="789"></span>
        <?php
        }
        ?>
    </div>
    <div class="slideshow_thumb" id="slideshow_thumb" style="display:none">
        <?php
        $add_path = ADMIN_ADV_PATH."thumb/".$addsArr[$addsArrCnt-1]['ad_thumb_path'];
		$add_title = $addsArr[$addsArrCnt-1]['ad_name'];
		?>
		<div <?php if($addsArr[$addsArrCnt-1]['featured'] == 1){echo 'class="feat_add_thumb"'; } ?> title="<?php echo $add_title; ?>"><img src="<?php echo $add_path; ?>" alt="Add <?php echo $addsArrCnt-1; ?>" /></div>
        <div></div>
		<?php
        for($i=0; $i<$addsArrCnt-1; $i++)
        {
            $add_path = ADMIN_ADV_PATH."thumb/".$addsArr[$i]['ad_thumb_path'];
			$add_title = $addsArr[$i]['ad_name'];
        ?>
        	<div <?php if($addsArr[$i]['featured'] == 1){echo 'class="feat_add_thumb"'; } ?> title="<?php echo $add_title; ?>"><img src="<?php echo $add_path; ?>" alt="Add <?php echo $i+0; ?>" /></div>
            <div></div>
        <?php
        }
        ?>
    </div>
</div>
<?php }	?>