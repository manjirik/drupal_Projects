<?php 
// echo "<pre>"; 
//print_r($rows);
$count_row= count($rows);
?>

<section class="blogsection">
<?php for($i=0; $i<$count_row; $i++) { ?>

<article class="productContent articleContent">
      <div class="blogAuthorName"> <?php print $rows[$i]['title']; ?> </div>
      <span class="blogDate"> <?php print $rows[$i]['created']; ?> </span> <span>
      <div class="blogDescription">
        <p><?php print $rows[$i]['body']; ?></p>
      </div>
      <div class="blogfooter">
		<?php
			 $alias=drupal_get_path_alias('node/'.$rows[$i]['nid']);
			if(!empty($rows[$i]['field_external_url'])){
				$link = $rows[$i]['field_external_url']; }
			else{
				$link = $base_path .$alias;
			}
		?>

	<a href="<?php  echo $link; ?>"><?php echo $rows[$i]['field_text_link']; ?> </a>

	<?php if(!empty($rows[$i]['field_external_url'])){ ?>
		<div class="externalLink">
             	 	<a href="<?php  echo $link; ?>" target="_blank" ><?php $rows[$i]['field_external_url'] ?> </a>
		</div>
	<?php } ?>

      </div>
    </article>


<?php } ?> 
 </section>


<?php //print_r($page['content']['block_3']['#markup']); ?>

      


