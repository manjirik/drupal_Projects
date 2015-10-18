<?php /* <ul class="tab-list">
	<li><a <?php if(isset($data['mymap'])){?> class="selected" <?php }?> href="javascript:void(0);" onclick="open_me('mymap',1);" id="link_tab_1">My Map</a> </li>
	<li><a <?php if(isset($data['myentries'])){?> class="selected" <?php }?> href="javascript:void(0);" onclick="open_me('myentries',1);" id="link_tab_2">My Entries</a> </li>
	<li><a <?php if(isset($data['myskywards'])){?> class="selected" <?php }?> href="javascript: void(0);" id="link_tab_3">Skywards</a> </li>
	<!--<li><a <?php if(isset($data['enrollmem'])){?> class="selected" <?php }?> href="<?php echo SITE_URL.'index.php?r=poc/enrollmember';?>" id="link_tab_4">Enroll Member</a> </li>
	<li><a <?php if(isset($data['validatemem'])){?> class="selected" <?php }?> href="<?php echo SITE_URL.'index.php?r=poc/membervalidation';?>" id="link_tab_5">Validate Member</a> </li>-->
</ul>
<?php */ ?>
<?php

$req=(isset($_GET['r']) && $_GET['r']!='')?$_GET['r']:'';
if($hasEntry) 
{ 
if($req=='' || $req=='landing/invitation' || $req=='myentries' || $req=='myentries/show_entries' || $req=='notification/index') { ?>
<div class="topNavWrap">
	<div class="navLink">
		<a <?php if(isset($data['myentries'])){?> class="selected" <?php }?> href="javascript:void(0);" onclick="open_me('myentries',1);" id="link_tab_2">My Entries</a>
	</div>
</div>

<?php } 
else if($req == 'gmap/map_view_emerites_city' || $req == 'gmap/index') {
?>
<div class="topNavWrap">
	<div class="navLink">
		<a <?php if(isset($data['myentries'])){?> class="selected" <?php }?> href="javascript:void(0);" onclick="open_me('myentries',1);" id="link_tab_2">My Entries</a>
	</div>
	<div class="tonavNotification">
		
                    
                    <script type="text/javascript">
                        /*$(function(){
                            $('#vertical-ticker').totemticker({
                                row_height	:	'24px',
                                next		:	null,
                                previous	:	null,
                                stop		:	null,
                                start		:	null,
                                mousestop	:	false,
                                direction	:	'down'
                            });
                        });*/
						$(function() {
						  $('#vertical-ticker').vTicker();
						});
                    </script>
                    <?php
                    
                    if(isset($_GET['status']) && $_GET['status']=="change_destination")
                    {
                    ?>
                        
                    <ul id="vertical-ticker">			
                    <li>Use the map to <b>select from over 130 destinations</b> offered by Emirates.</li>
                        <?php
                        if (TIP_MESSAGE_DEST != "") {
                            $arrTipMsg = unserialize(TIP_MESSAGE_DEST);
                            if (is_array($arrTipMsg) && count($arrTipMsg)) {
                                foreach ($arrTipMsg as $arrTipMsgval) {
                                    ?>
                                    <li><?php echo $arrTipMsgval; ?></li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                    <?php
                    }
                    else if(isset($_GET['status']) && $_GET['status']=="change_friends")
                    {
                        ?>
                        
                    <ul id="vertical-ticker">			
                        <?php
                        if (TIP_MESSAGE_FRND != "") {
                            $arrTipMsg = unserialize(TIP_MESSAGE_FRND);
                            if (is_array($arrTipMsg) && count($arrTipMsg)) {
                                foreach ($arrTipMsg as $arrTipMsgval) {
                                    ?>
                                    <li><?php echo $arrTipMsgval; ?></li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                    <?php
                    }
                    else
                    {
                        ?>
                        <span>Use the map to <b>select from over 130 destinations</b> offered by Emirates.</span>
                        <?php
                    }
                    ?>
	</div>
</div>
<?php
}

}
else {
	if($req!='' && $req!='landing/invitation') {
	?>
	<div class="topNavWrap">
	
	<div class="tonavNotification">
     	<div class="tipsWrap">
    	<ul>
        	<li>Use the map to <b>select one of more than <?php if(isset($location_cnt)){ echo $location_cnt; } ?> destination</b> offered by Emirates.</li>
<li>Use the map to select one of more than offered by Emirates.</li>
<li>Use the map to select one of more than offered by Emirates.</li>
        </ul>
        </div>
			</div>
            <script type="text/javascript">
						$(function() {
						  $('.tipsWrap').vTicker();
						});
                    </script>
</div>
	<?php
	}
}
?>