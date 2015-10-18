<?php
session_start();
include("inc/config.php");
include_once("controller/tblSongsController.php");
$paramArray = array
(	
	"table_name" => "songs",
	"user_id" => $_SESSION["user_id"],
);
$dbObj = new database();
$conObj = $dbObj->connectDB();
$songsObj = new tblSongsController($conObj);
$songsDetails = $songsObj->getSongsDetailsByUser($paramArray);
$songsStatus = array("0"=>"Pending", "1"=>"Published", "2"=>"Inactive");
?>
<div class="popup popupBg" id="inline_example4">
<?php //print_r($_SESSION); print_r($songsDetails); ?>
    <div class="song-stat">
        <p>Song Status</p>
        <div class="icon"><img src="<?php echo HOST_URL;?>/images/dmm-company-logo.gif" alt="DMMCompany" /></div>
    </div>
    <div class="clear"></div>
    <div class="content1">
        <div class="song-namestat">
            <div class="song-name-title">Song</div>
            <div class="song-name-stat">Status</div>
			<div class="song-name-count">Listens</div>
        </div>
        <div id="song_content">
		<div style="padding:0 24px;">
        <?php
		$j = 1;
		$loop = 1;
		$divesion = 4;
		for($i=0; $i<count($songsDetails); $i++)
		{
			if($j == 1)
			{
			?>
            	<fieldset class="step">
            <?php
			}
		?>
        <div class="clear"></div>
        <div class="song-namestat">
            <div class="song-name"><?php print $songsDetails[$i]['song_name']; ?></div>
            <?php if($songsDetails[$i]['status'] == 2): ?>
            <div class="song-stat reject"><?php print $songsStatus[$songsDetails[$i]['status']]; ?></div>
            <div class="comment-panel">
                <div class="comment-box">
                    <div class="curvetop"></div>
                    <div class="comment"><?php print $songsDetails[$i]['reject_reason']; ?><!-- <a href="#">T-Racks</a>--></div>
                    <div class="curvebot"></div>
                </div>
            </div>
            <?php elseif($songsDetails[$i]['status'] == 1): ?>
            	 <div class="song-stat">Published</div>
				  <div class="comment-panel">
                        <div class="comment-box">
                            <div class="curvetop"></div>
                            <div class="comment"><?php print $songsDetails[$i]['hits']; ?></div>
                            <div class="curvebot"></div>
                        </div>
                    </div>
            <?php else: ?>
            	<div class="song-stat"><?php print $songsStatus[$songsDetails[$i]['status']]; ?></div>
                    <div class="comment-panel">
                        <div class="comment-box">
                            <div class="curvetop"></div>
                            <div class="comment">Pending for approval</div>
                            <div class="curvebot"></div>
                        </div>
                    </div>
            <?php endif; ?>
        </div>
        <?php
			if($j == $divesion || $i == count($songsDetails)-1)
			{
                $prev = "";
                $next = "";
                if($loop > 1)
                {
                    $prev = $loop-1;
                }
                if($loop < ceil(count($songsDetails)/$divesion))
                {
                    $next = $loop+1;
                }
                ?>
                <input type="hidden" id="slide_song_status_prev_hid" value="<?php echo $prev; ?>">
                <input type="hidden" id="slide_song_status_next_hid" value="<?php echo $next; ?>">
                <div>&nbsp;</div>
                </fieldset>
            <?php
				$loop++;
				$j = 1;
			}
			else
			{
				$j++;
			}
		}
		if(ceil(count($songsDetails)/$divesion) > 1)
		{
			$next = 2;
		}
		?>
        </div>
    </div>
    </div>
    <div class="btmPanel">
        <ul class="rhtMenu">
            <li id="slide_song_status_prev_li"></li>
            <li id="slide_song_status_next_li">
            <?php if($next > 1): ?>
            	<a id="slide_song_status_next" class="btnDkGry" href="javascript:void(0);" onclick="slide_song_status(<?php echo $next; ?>)">next</a>
            <?php endif; ?>
            </li>
            <li class="clear"><!----></li>
        </ul>
    </div>
</div>