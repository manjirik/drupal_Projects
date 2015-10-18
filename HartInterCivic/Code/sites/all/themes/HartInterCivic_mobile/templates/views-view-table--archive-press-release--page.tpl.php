<?php 
global $base_path;
$count_row= count($rows);
//echo "<pre>"; 
//print_r($rows);
?>
<section class="blogsection">
<?php for($i=0; $i<$count_row; $i++) { ?>

<article class="productContent articleContent">
      <div class="blogAuthorName"> <?php print $rows[$i]['title']; ?> </div>
      <span class="blogDate"> <?php print $rows[$i]['created']; ?> </span> <span>
      <div class="blogDescription">
        <p><?php print $rows[$i]['field_press_release_summary']; ?></p>
      </div>
      <div class="blogfooter">
		<?php
			 $alias=drupal_get_path_alias('node/'.$rows[$i]['nid']);
		?>
		<a href="<?php  print $base_path .$alias; ?>"><?php print $rows[$i]['field_txt_link']; ?> </a>

     </div>
    </article>


<?php } ?> 
</section>
 
       
