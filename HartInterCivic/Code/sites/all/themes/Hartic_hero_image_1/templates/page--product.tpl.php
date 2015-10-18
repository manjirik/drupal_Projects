<?php
$theme_path = drupal_get_path('theme', variable_get('theme_default', NULL));
global $base_path;
//echo "<pre>";
//print_r($node->field_product_category['und']);


?>
<!-- container start -->
<div class="container">
  <div id="noImage">
    <div class="HeaderWrapper">
      <section class="HeaderTopArea">
        <div class="logoMain" onclick ="window.location = '<?php print $base_path; ?>'"><a href="#">Hart intetcivic</a></div>
        <nav>
        <?php print render($page['header']); ?>
        </nav>
      </section>
    </div>
    <div class="secondoryMenu">
      <div class="secondoryMenuWrap"> <span class="left"><?php print $node->field_product_category['und'][0]['taxonomy_term']->name; ?></span>
        <ul class="highlight">
          <li><?php print $node->title;  ?></li>
        </ul>
      </div>
    </div>
  </div>
 
    <div class="MidWrapperWhite">
      <div class="MidTopSectionWhite">
        <div class="sliderDescription">
          <h3><?php if($node->title !='') echo $node->field_product_title['und'][0]['value']; ?></h3>
          <p><?php if($node->body['und'][0]['value'] !='' ) echo $node->body['und'][0]['value']; ?>  </p>

          <?php if (!empty($node->field_feature1_title['und'][0]['value'])  || !empty($node->field_feature1_short_description['und'][0]['value']) ){?>
          <div class="sliderListItems">
            <h4>
		<?php if($node->field_feature1_title['und'][0]['value'] !='' ) echo $node->field_feature1_title['und'][0]['value']; ?></h4>
            <p><?php if($node->field_feature1_short_description['und'][0]['value'] !='' ) echo $node->field_feature1_short_description['und'][0]['value']; ?></p>
          </div><?php } 
	
	 if (!empty($node->field_feature2_title['und'][0]['value'])  || !empty($node->field_feature2_short_description['und'][0]['value']) ){?>
          <div class="sliderListItems">
            <h4>
		<?php if($node->field_feature2_title['und'][0]['value'] !='' ) echo $node->field_feature2_title['und'][0]['value']; ?></h4>
		<p><?php if($node->field_feature2_short_description['und'][0]['value'] !='' ) echo $node->field_feature2_short_description['und'][0]['value']; ?></p>
          </div><?php } 
	
	 if (!empty($node->field_feature3_title['und'][0]['value'])  || !empty($node->field_feature3_short_description['und'][0]['value']) ){?>

          <div class="sliderListItems last">
            <h4>
		<?php if($node->field_feature3_title['und'][0]['value'] !='' ) echo $node->field_feature3_title['und'][0]['value']; ?></h4>
		<p><?php if($node->field_feature3_short_description['und'][0]['value'] !='' ) echo $node->field_feature3_short_description['und'][0]['value']; ?>
          </div>
<?php } ?>
        </div>
        <div class="sliderImage">
		
<!-- Flexsider Starts -->
<div class="flexslider">
  <ul class="slides">
<?php

$len_images=sizeOf($node->field_detail_image['und']);
for($i=0; $i<$len_images; $i++){
				$detail_image_path[$i] = $node->field_detail_image['und'][$i]['filename'];
				$detail_image_uri[$i] = file_build_uri($detail_image_path[$i]); 
				$detail_image_url[$i] = file_create_url($detail_image_uri[$i]); 

?>
<li><img src="<?php echo $detail_image_url[$i] ; ?>"  alt="<?php echo $node->field_detail_image['und'][$i]['alt']; ?>" title="<?php echo $node->field_detail_image['und'][$i]['title']; ?>" ></li>
<?php } ?>

</ul>
</div>
<!-- Flexsider Ends -->


	</div>
        <div class="clearfix"></div>
      </div>
    </div>


  <section class="midWrappergrey">
    <section class="MidWrapperWhite">
<?php 
$count_relcontent = count($node->field_related_content['und']);
$related_contents = array();
for($i=0; $i<=($count_relcontent -1); $i++){
			$related_nid =  $node->field_related_content['und'][$i]['nid'];
			$node_related = node_load($related_nid,$reset=FALSE);
			$related_contents[] = $node_related;
}
//int count($related_contents);

if(isset($related_contents) && !empty($related_contents)){
?>
      <div class="MidBottompSection">
        <ul class="productlisting">
	<?php 
	for($i=0; $i<=count($related_contents)-1; $i++){
			 $image_path = file_create_url($related_contents[$i]->field_related_image['und'][0]['uri']);
			 $content_label = $related_contents[$i]->field_content_label['und'][0]['value'];
			 $video_data =   $related_contents[$i]->field_video['und'][0]['fid'];
			 $file_attached = file_create_url($related_contents[$i]->field_file_attachement['und'][0]['uri']);
	
			$related_url = drupal_get_path_alias('node/'.$related_contents[$i]->nid);

	?>
          <li><img src="<?php echo $image_path;?>"> 
		<span> <a href="<?php print $base_path .$related_url; ?>"><?php echo $content_label; ?></a></span> </li>
         <?php } ?>
        </ul>
      </div>


      <div class="bottom">
       <h4><?php print_r($page['content']['block_7']['#markup']); ?> </h4>
     </div>
<?php } 

		$count_relproject = count($node->field_related_project['und']);
		$term_services = array();
		$term_software = array();
		$term_hardware = array();
		for($i=0; $i<=($count_relproject-1); $i++){
			$related_nid =  $node->field_related_project['und'][$i]['nid'];
			$node_related = node_load($related_nid,$reset=FALSE);
			$tid = $node_related->field_product_type['und'][0]['tid'];
			$term = taxonomy_term_load($tid);
			$term_name = $term->name;
			 if($term_name == "Services"){
				 $term_services[] = $node_related;
			 }	
			 if($term_name == "Hardware"){
				 $term_hardware[] = $node_related;
			 }	
			 if($term_name == "Software"){
				 $term_software[] = $node_related;
			 }				
		}
		
if(!empty($term_hardware) || !empty($term_software) || !empty($term_services)){?>
<section class="ComplimentoryProducts">
<h3>Complementary Products</h3>
<?php

		if(isset($term_hardware) && !empty($term_hardware)){
		?>
			<div class="products product1">
			<h4>HARDWARE</h4>
		<?php
			for($i=0; $i<=count($term_hardware)-1; $i++){
			 $image_uri = file_create_url($term_hardware[$i]->field_thumbnail_image['und'][0]['uri']);
			?>
				<div class="media"> <a class="pull-left" href="#"> <img class="mediaObject" src="<?php echo $image_uri;?>"> </a>
					<div class="mediaBody">
					<h5 class="mediaHeading"><?php echo $term_hardware[$i]->title ;?></h5>
					<p class="details"><?php echo $term_hardware[$i]->field_short_description['und'][0]['value'] ;?></p>
					<a href="../<?php echo drupal_get_path_alias('node/'.$term_hardware[$i]->nid) ;?>" class="detailsLink">View details &raquo;</a> 
					<?php if((count($term_hardware)-$i)>1){?>
					<div class="more"></div>
					<?php } ?>
					</div>
				</div>
				
			<?php
			
			}?>
			</div><?php
		}

		
		if(isset($term_software) && !empty($term_software)){
		?>
			<div class="products product2">
			<h4>SOFTWARE</h4>
		<?php
			for($i=0; $i<=count($term_software)-1; $i++){
			 $image_uri = file_create_url($term_software[$i]->field_thumbnail_image['und'][0]['uri']);
			?>
				<div class="media"> <a class="pull-left" href="#"> <img class="mediaObject" src="<?php echo $image_uri;?>"> </a>
					<div class="mediaBody">
					<h5 class="mediaHeading"><?php echo $term_software[$i]->title ;?></h5>
					<p class="details"><?php echo $term_software[$i]->field_short_description['und'][0]['value'] ;?></p>
					<a href="../<?php echo drupal_get_path_alias('node/'.$term_software[$i]->nid) ;?>" class="detailsLink">View details &raquo;</a> 
					<?php if((count($term_software)-$i)>1){?>
					<div class="more"></div>
					<?php } ?>
					</div>
				</div>
				
			<?php
			
			}?>
			</div><?php
		}


		

		if(isset($term_services) && !empty($term_services)){
		?>
			<div class="products product3">
			<h4>SERVICES</h4>
		<?php
			for($i=0; $i<=count($term_services)-1; $i++){
			 $image_uri = file_create_url($term_services[$i]->field_thumbnail_image['und'][0]['uri']);
			?>
				<div class="media"> <a class="pull-left" href="#"> <img class="mediaObject" src="<?php echo $image_uri;?>"> </a>
					<div class="mediaBody">
					<h5 class="mediaHeading"><?php echo $term_services[$i]->title ;?></h5>
					<p class="details"><?php echo $term_services[$i]->field_short_description['und'][0]['value'] ;?></p>
					<a href="../<?php echo drupal_get_path_alias('node/'.$term_services[$i]->nid) ;?>" class="detailsLink">View details &raquo;</a> 
					<?php if((count($term_services)-$i)>1){?>
					<div class="more"></div>
					<?php } ?>

					</div>
				</div>
				
			<?php
			
			}?>
			</div><?php
		}
?>  
</section><?php
}
?><div id="block-block-3" class="block block-block contextual-links-region">

	<div class="content">
	<?php print_r($page['content']['block_3']['#markup']); ?>
	</div>
</div>
	
    <section class="MidWrapperWhite marginBotTop1em">
   <div class="bottomBreadCrum">
    <?php if ($breadcrumb): ?>
      <?php 	print_r($breadcrumb); 
		
	  ?>
	<ul>
	<li><a href = "<?php  print $base_path . 'voting-solution'; ?>">Voting Solution</a></li>
	<?php if(!empty( $node->field_product_category['und'][0]['taxonomy_term']->name)){ ?>
		<li><a href =""><?php  print $node->field_product_category['und'][0]['taxonomy_term']->name; ?></a></li>
	<?php } 
	if(!empty($node->title)){
	?>
	<li><a href =""><?php print $node->title; ?></a></li>
	<?php } ?>
	</ul>
	
	
    <?php endif; ?>
   </div>
</section>
</section>
</div>



<footer>
  <div class="FooterWrapper">
 <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
    <div class="FooterTopPart">
      <div class="FooterColumn1">
       
	 <?php print render($page['footer_firstcolumn']); ?>
	 
      </div>
      <div class="FooterColumn2">
        <?php print render($page['footer_secondcolumn']); ?>
      </div>
      <div class="FooterColumn3">
         <?php print render($page['footer_thirdcolumn']); ?>
      </div>
      <div class="FooterColumn4">
        <?php print render($page['footer_fourthcolumn']); ?>
      </div>
    </div>
	<?php endif; ?>
    <div class="FooterBottomPart"><?php print render($page['footer']); ?></a> 
  </div>
</footer>
</div>
<!-- container end -->


