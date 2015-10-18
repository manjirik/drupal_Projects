<?php 
global $base_path;
//echo "<pre>";
//print_r($rows);
$count_row = count($rows);
?>
<div class="container"><!-- container start --> 
  
  <section class="blogsection"> 
<?php for($i=0; $i<$count_row; $i++){ ?> 

    <article class="productContent articleContent">
	<?php if($rows[$i]['field_thumbnail_image']): ?>
        <ul class="imageThumbnail"><li>
           <!--  <img src="images/complementoryProduct1.png" alt="Product Image"/>-->
		<?php print $rows[$i]['field_thumbnail_image']; ?>     
        </li></ul> 
	<?php endif; ?>   

      <div class="blogAuthorName"> <?php print $rows[$i]['title']; ?> </div>

      <div class="blogDescription">
        <p><?php print strip_tags($rows[$i]['field_short_description'], ''); ?></p>
      </div>
      <div class="blogfooter"> <a href="<?php  print $base_path .drupal_get_path_alias('node/'. $rows[$i]['nid']); ?>" class="hyperlink"> View Details &raquo; </a> </div>
    </article>
  
   <?php } ?>
        
  </section>
  
 
  <!--section hartcontainer ends here-->
 
  <!-- main footer ends--> 
</div>


