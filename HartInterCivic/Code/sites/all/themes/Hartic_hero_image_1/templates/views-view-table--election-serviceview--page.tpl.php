
<?php 
	$count_row = count($rows);	
	global $base_path,$theme_path;
?>
<section class="MiddleMainAreaWhite">
    <div class="MidWrapperWhite">
	
	<div class="MidMiddleSectionWhite">
	    <div class="votingBig">
		<div class="middleImage"><img src = "../<?php echo $base_path.$theme_path; ?>/images/middleVoting.png"></div>
	<?php 
	for($i=0; $i<$count_row; $i++)
	{ 
		if($i == 0){
	?>
	<div class="votingWrapMain left marginbottom15px">
            <div class="votingWrap">
             <div class="VotingWrap_Inside">
<div class="VotingWrap_ImageArea"><?php print $rows[$i]['field_shortimage']; ?></div>
<div class="VotingWrap_ContentArea">
<h3><?php print $rows[$i]['title']; ?></h3>
<p><?php  print $rows[$i]['body']; ?></p>
</div>
</div>
             </div>
			<div class="bottom">
			<?php $alias=drupal_get_path_alias('node/'.$rows[$i]['nid']); ?>
              <a href="<?php  print $base_path . $alias; ?>"><h4>Learn more about <?php print strtolower($rows[$i]['title']); ?> &raquo;</h4></a>
            </div>
			</div>
	<?php } 
	
	if($i == 1){
	?>
	<div class="votingWrapMain left marginLeft15px marginbottom15px">
             <div class="votingWrap">
             <div class="VotingWrap_Inside">
<div class="VotingWrap_ImageArea"><?php print $rows[$i]['field_shortimage']; ?></div>
<div class="VotingWrap_ContentArea">
<h3><?php print $rows[$i]['title']; ?></h3>
<p><?php  print $rows[$i]['body']; ?></p>
</div>
</div>
             </div>
			<div class="bottom">
			<?php $alias=drupal_get_path_alias('node/'.$rows[$i]['nid']); ?>
              <a href="<?php  print $base_path .$alias; ?>"><h4>Learn more about <?php print strtolower($rows[$i]['title']); ?> &raquo;</h4></a>
            </div>
			</div>
	<?php }
	
	if($i == 2){
	?>
	<div class="votingWrapMain left">
             <div class="votingWrap">
             <div class="VotingWrap_Inside">
<div class="VotingWrap_ImageArea"><?php print $rows[$i]['field_shortimage']; ?></div>
<div class="VotingWrap_ContentArea">
<h3><?php print $rows[$i]['title']; ?></h3>
<p><?php  print $rows[$i]['body']; ?></p>
</div>
</div>
             </div>
			<div class="bottom">
			<?php $alias=drupal_get_path_alias('node/'.$rows[$i]['nid']);	?>
              <a href="<?php  print $base_path .$alias; ?>"><h4>Learn more about <?php print strtolower($rows[$i]['title']); ?> &raquo;</h4></a>
            </div>
			</div>
	<?php }
	if($i == 3){
	?>
	 <div class="votingWrapMain left marginLeft15px">
             <div class="votingWrap">
             <div class="VotingWrap_Inside">
<div class="VotingWrap_ImageArea"><?php print $rows[$i]['field_shortimage']; ?></div>
<div class="VotingWrap_ContentArea">
<h3><?php print $rows[$i]['title']; ?></h3>
<p><?php  print $rows[$i]['body']; ?></p>
</div>
</div>
             </div>
			<div class="bottom">
			<?php $alias=drupal_get_path_alias('node/'.$rows[$i]['nid']); ?>
              <a href="<?php  print $base_path .$alias; ?>"><h4>Learn more about <?php print strtolower($rows[$i]['title']); ?> &raquo;</h4></a>
            </div>
			</div>
	<?php }

}	?>
</div>
</div>
</div>
</section>

	