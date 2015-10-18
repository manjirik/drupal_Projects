<?php 
//echo "<pre>";
//print_r($rows);
$count_row = count($rows);
global $base_path;

?>



<section class="searchProductsSection">
	<article>
		<div class="displayProducts">
<?php 
for($i=0; $i<$count_row; $i++)
	{
?>        
			<div class="media">
			<?php if($rows[$i]['field_thumbnail_image']): ?>
                    <div class="mediaObject">
                    <?php print $rows[$i]['field_thumbnail_image']; ?>           
					</div>
			<?php endif; ?>
                    <div class="mediaBody more">
                    	<h5 class="mediaHeading"><?php print $rows[$i]['title']; ?></h5>
                        <div class="details"><?php print strip_tags($rows[$i]['field_short_description'], ''); ?></div>
                        <a href="<?php  print $base_path .drupal_get_path_alias('node/'. $rows[$i]['nid']); ?>" class="detailsLink">View details &raquo;</a>
                	</div>
            </div> 
<?php } ?>         
			</div> 	
        </article>
</section>

