<?php 
// echo "<pre>"; 
//print_r($rows);
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
		<div><?php print $rows[$i]['field_news_image']; ?></div>
              <div class="subHeading"><span class="date"><?php print $rows[$i]['created']; ?></span></div>
              <div class="news_body"><?php print $rows[$i]['body']; ?></div>
		
		
		<?php
			 $alias=drupal_get_path_alias('node/'.$rows[$i]['nid']);
			if(!empty($rows[$i]['field_external_url'])){
				$link = $rows[$i]['field_external_url']; }
			else{
				$link = $base_path .$alias;
			}
		?>
		<div class="link">
		<div class="internalLink">
             	 <a href="<?php  echo $link; ?>">
			<?php echo $rows[$i]['field_text_link']; 
				?> </a>
		</div>
		<?php if(!empty($rows[$i]['field_external_url'])){ ?>
		<div class="externalLink">
             	 <a href="<?php  echo $link; ?>" target="_blank" ><?php $rows[$i]['field_external_url'] ?>   </a>
		
		</div>
		<?php } ?>
		</div>
	
        </article><!--end of article--> 
	<?php } ?> 
	 </section>
</div>
  </section>

<?php //print_r($page['content']['block_3']['#markup']); ?>

      
<?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_first']); ?>
      </div></div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?> 

