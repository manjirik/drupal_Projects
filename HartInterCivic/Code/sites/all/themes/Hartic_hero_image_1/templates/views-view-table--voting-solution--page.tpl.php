
<?php 
	$count_row = count($rows);	
	global $base_path;
global $theme_path;

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
<div class="VotingWrap_ImageArea"><?php print $rows[$i]['field_term_image']; ?></div>
<div class="VotingWrap_ContentArea">
<h3><?php print $rows[$i]['name']; ?></h3>
<p><?php  print $rows[$i]['description']; ?></p>
</div>
</div>
             </div>
			<div class="bottom">
			<?php $alias=drupal_get_path_alias('taxonomy/term/'.$rows[$i]['tid']);
				?>
              <a href="<?php  print $base_path ."content/vote-cycle"; ?>"><h4>Learn more about <?php print strtolower($rows[$i]['name']);  ?> &raquo;</h4></a>
            </div>
			</div>
	<?php } 
	
	if($i == 1){
	?>
	<div class="votingWrapMain left marginLeft15px marginbottom15px">
             <div class="votingWrap">
              <div class="VotingWrap_Inside">
<div class="VotingWrap_ImageArea"><?php print $rows[$i]['field_term_image']; ?></div>
<div class="VotingWrap_ContentArea">
<h3><?php print $rows[$i]['name']; ?></h3>
<p><?php  print $rows[$i]['description']; ?></p>
</div>
</div>
             </div>
			<div class="bottom">
			<?php $alias=drupal_get_path_alias('taxonomy/term/'.$rows[$i]['tid']);
			?>
              <a href="<?php  print $base_path ."content/electronic-pollbook"; ?>"><h4>Learn more about <?php print strtolower($rows[$i]['name']); ?> &raquo;</h4></a>
            </div>
			</div>
	<?php }
	
	if($i == 2){
	?>
	<div class="votingWrapMain left">
             <div class="votingWrap">
              <div class="VotingWrap_Inside">
<div class="VotingWrap_ImageArea"><?php print $rows[$i]['field_term_image']; ?></div>
<div class="VotingWrap_ContentArea">
<h3><?php print $rows[$i]['name']; ?></h3>
<p><?php  print $rows[$i]['description']; ?></p>
</div>
</div>
             </div>
			<div class="bottom">
			<?php $alias=drupal_get_path_alias('taxonomy/term/'.$rows[$i]['tid']);
			?>

              <a href="<?php  print $base_path ."content/election-cycle"; ?>"><h4>Learn more about <?php print strtolower($rows[$i]['name']); ?> &raquo;</h4></a>
            </div>
			</div>
	<?php }
	if($i == 3){
	?>
	 <div class="votingWrapMain left marginLeft15px">
             <div class="votingWrap">
              <div class="VotingWrap_Inside">
<div class="VotingWrap_ImageArea"><?php print $rows[$i]['field_term_image']; ?></div>
<div class="VotingWrap_ContentArea">
<h3><?php print $rows[$i]['name']; ?></h3>
<p><?php  print $rows[$i]['description']; ?></p>
</div>
</div>
             </div>
			<div class="bottom">
			<?php $alias=drupal_get_path_alias('taxonomy/term/'.$rows[$i]['tid']);
			?>

              <a href="<?php  print $base_path ."all_product"; ?>"><h4>Learn more about <?php print strtolower($rows[$i]['name']); ?> &raquo;</h4></a>
            </div>
			</div>
	<?php }

}	?>
</div>
</div>
</div>
</section>

	