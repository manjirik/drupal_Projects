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

	<article class='productContent articleContent'>
        	<h4><?php print $rows[$i]['title']; ?></h4>
		<span class="blogDate">
			<?php print $rows[$i]['created']; ?>
		 </span>
		<span class="blogcomments"> 
			| <?php print $rows[$i]['comment_count']; ?> Comments
		</span>
		 <div class='blogDescription'>
			<?php print $rows[$i]['body']; ?>
		</div>
		<div class='blogfooter'>
			<div class='hyperlink'>
				<?php print $rows[$i]['field_text_link1']; ?> &raquo;
			</div>
		</div>
       </article>

<?php } ?>
</section>
</div>
</section>