<?php 
//echo "<pre>"; 
//print_r($rows);
//exit;
 $count_row= count($rows);
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
              <div class="subHeading"><span class="date"><?php print $rows[$i]['created']; ?></span></div>
              <div class='field-content'><?php print $rows[$i]['field_press_release_summary']; ?></div>
		
		<?php
			 $alias=drupal_get_path_alias('node/'.$rows[$i]['nid']);
			
		?>
		
		<div class="internalLink">
             	 <a href="<?php  print $base_path .$alias; ?>"><?php print $rows[$i]['field_txt_link']; ?> </a>
		</div>
		
	
        </article><!--end of article--> 
	<?php } ?> 
	 </section>
</div>
  </section>

<?php //print_r($page['content']['block_3']['#markup']); ?>

       
