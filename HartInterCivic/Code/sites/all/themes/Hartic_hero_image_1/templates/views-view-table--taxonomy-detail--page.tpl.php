<?php 
//echo "<pre>";
//print_r($rows);
$count_row = count($rows);
?>
<section class="MiddleMainAreaWhiteElectionResource">
<div class="MidWrapperWhite">  
  <section class="blogIndexContent_new">

<?php
	for($i=0; $i<$count_row; $i++)
	{
?>

	<article>
        	<h4><?php print $rows[$i]['title']; ?></h4>
		<div class="date"><?php print $rows[$i]['created']; ?> | <?php print $rows[$i]['comment_count']; ?> Comments </div> 
		<div class='field-content'><?php print $rows[$i]['body']; ?>
		<br/>
		<?php print $rows[$i]['field_text_link1']; ?></div>

       </article>

<?php } ?>
</section>
</div>
</section>