<?php 
//echo "<pre>";
//print_r($node);
//exit;
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
      <div class="secondoryMenuWrap"> 
	<span class="left">
		<?php print $node->field_related_content_headline['und'][0]['value']; ?>
	</span>
        <ul>
<?php
	$len_subpage=sizeOf($node->field_subpage['und']);
	for($p=0; $p<$len_subpage; $p++ ){
		$nid=$node->field_subpage['und'][$p]['nid'];
		$ntitle=$node->field_subpage['und'][$p]['node']->title;
		$alias=drupal_get_path_alias('node/'.$nid); 
?>
		<li><a href="<?php  print $base_path .$alias; ?>" ><?php echo $ntitle; ?></a></li>
<?php } ?>
       </ul>
      </div>
    </div>
  </div>
  <section class="MiddleMainAreaWhite">
    <div class="MidWrapperWhite">
      <div class="newsIteamTopSection">
        <h1><?php if($node->title !='') echo $node->title; ?></h1>
        <p><?php if($node->field_product_detail['und'][0]['value'] !='') echo ($node->field_product_detail['und'][0]['value']); ?></p>
      </div>
      <section class="MidWrapperWhite">
        <section class="newsTopwhiteBottomGrey marginbottom32px">
          <div class="NewsTextImage marginAuto">

           
            <p> <?php if(!empty($node->field_related_image['und'][0]['uri'])){
			$url = file_create_url($node->field_related_image['und'][0]['uri']); ?>
			<img src="<?php echo $url; ?>"> <?php } ?></p>
			
		<?php $video_url = file_create_url($node->field_video['und'][0]['file']->uri); ?>

	    <a href="<?php print $video_url; ?>"> <p> <?php if(!empty($node->field_video['und'][0]['file'])) echo $node->field_video['und'][0]['file']->filename; ?></p></a>
		<?php $file_url = file_create_url($node->field_file_attachement['und'][0]['uri']); ?>

	     <a href="<?php echo $file_url; ?>"><p> <?php if(!empty($node->field_file_attachement['und'][0]['filename'])) echo $node->field_file_attachement['und'][0]['filename']; ?></p></a>


            
            <div class="redborder1px"></div>
            
          </div>
        </section>
	

        <div class="bottomBreadCrum">
         	<?php if ($breadcrumb): 
      			 print_r($breadcrumb); 
		 endif; ?>

        </div>
      </section>
    </div>
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
    <div class="FooterBottomPart"><?php print render($page['footer']); ?></div>
  </div>
</footer>
</div>
<!-- container end -->

