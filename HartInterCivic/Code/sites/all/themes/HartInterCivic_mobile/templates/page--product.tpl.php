<?php
$theme_path = drupal_get_path('theme', variable_get('theme_default', NULL));
global $base_path;
echo '<pre>';
//print_r($node);
echo '</pre>';
?>
<div class="container"><!-- container start --> 
  <!--Header-->
  <header> 
    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#PrimaryNav"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="menu">Menu</span> </button>
          <a class="brand" href="<?php echo $base_path; ?>" ><img src="<?php print $base_path.''.$theme_path; ?>/images/mobile-logo.png" alt="logo"></a>
          <div id="PrimaryNav" class="nav-collapse collapse">
            <ul class="nav">
              <?php print render($page['header']); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- voting Environment Sub Menu
    ================================================== -->
    <div class="home_image">
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
         <div class="container SecondaryNavigation"> <a class="btn-navbar new-navbar" data-toggle="collapse" data-target="#SecondaryNav">+</a>
 	  <span><a class="btn-navbar new-navbar" data-toggle="collapse" data-target="#SecondaryNav">-</a></span>
	<?php if(!empty($node->field_product_category['und'][0]['taxonomy_term']->name)){ ?>
	    <a class="brand secondaryMenu" href="#"><?php print $node->field_product_category['und'][0]['taxonomy_term']->name; ?></a>
	<?php } 
		else if(!empty($node->title)){ ?>
	<a class="brand secondaryMenu" href="#"><?php print $node->title; ?></a>
	<?php 	} ?>
	
            <div class="clearfix"></div>
            <div id="SecondaryNav" class="nav-collapse subnav-collapse collapse">
              <ul class="menu clearfix">
			<li><?php print $node->title;  ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--header end-->
  <section class="hartContainer"><!--section hartcontainer starts-->
    <article class="content">
      <div class="taglineInner"> <h2> <?php if($node->title !='') echo $node->field_product_title['und'][0]['value']; ?></h2></div>
      <div id="taglineDescription"><?php if($node->body['und'][0]['value'] !='' ) echo $node->body['und'][0]['value']; ?></div>
    </article>
      <div id="taglineImage">
	<!-- Flexsider Starts -->
<div class="sliderImage">
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
</div>
	<!-- End of Flexsider -->

      </div>
    <article class="featureListing">
<?php if (!empty($node->field_feature1_title['und'][0]['value'])  || !empty($node->field_feature1_short_description['und'][0]['value']) ){?>

        <ul>
            <li><?php if($node->field_feature1_title['und'][0]['value'] !='' ) echo $node->field_feature1_title['und'][0]['value']; ?></li>
                <p><?php if($node->field_feature1_short_description['und'][0]['value'] !='' ) echo $node->field_feature1_short_description['und'][0]['value']; ?></p>
      	</ul>
<?php }
if (!empty($node->field_feature2_title['und'][0]['value'])  || !empty($node->field_feature2_short_description['und'][0]['value']) ){?>

	<ul>

            <li><?php if($node->field_feature2_title['und'][0]['value'] !='' ) echo $node->field_feature2_title['und'][0]['value']; ?></li>
            <p><?php if($node->field_feature2_short_description['und'][0]['value'] !='' ) echo $node->field_feature2_short_description['und'][0]['value']; ?></p>
       </ul>
<?php } 
if (!empty($node->field_feature3_title['und'][0]['value'])  || !empty($node->field_feature3_short_description['und'][0]['value']) ){?>

	<ul>
            <li><?php if($node->field_feature3_title['und'][0]['value'] !='' ) echo $node->field_feature3_title['und'][0]['value']; ?></li>
            <p><?php if($node->field_feature3_short_description['und'][0]['value'] !='' ) echo $node->field_feature3_short_description['und'][0]['value']; ?></p>
        </ul>    
<?php } ?>
    </article>
  </section><!-- end of section hart container-->

<section class="hartContainer">

<?php 
	$count_relcontent = count($node->field_related_content['und']);
	$related_contents = array();
	for($i=0; $i<=($count_relcontent -1); $i++){
			$related_nid =  $node->field_related_content['und'][$i]['nid'];
			$node_related = node_load($related_nid,$reset=FALSE);
			$related_contents[] = $node_related;
	} 
?>

  <!--============CTA BLOCK=====================-->
<?php if(isset($related_contents) && !empty($related_contents)){ ?>

	
			<?php 
			for($i=0; $i<=count($related_contents)-1; $i++){
			 	$image_path = file_create_url($related_contents[$i]->field_related_image['und'][0]['uri']);
			 	$content_label = $related_contents[$i]->field_content_label['und'][0]['value'];
			 	$video_data =   $related_contents[$i]->field_video['und'][0]['fid'];
			 	$file_attached = file_create_url($related_contents[$i]->field_file_attachement['und'][0]['uri']);
				$related_url = drupal_get_path_alias('node/'.$related_contents[$i]->nid);

			?>
				<section class="moduleboxwrapper">
    				<article class="modulebox Innerpage cta">
           	 	 		<ul><li><img src="<?php echo $image_path;?>" /></li></ul>
       	 			<div class="moduleTitle Innerpage cta">
          	  				<a href="<?php print $base_path .$related_url; ?>"><?php echo $content_label; ?>  &raquo;</a>
        				</div> 
				</article>
   				</section><!--END OF 1ST MODULE WRAPPER-->
		      <?php } ?>

   <section class="moduleboxwrapper last">
       	<div class="modulefooter"><?php print_r($page['content']['block_7']['#markup']); ?></div>
    </section><!--END OF 3RD MODULE WRAPPER--> 
<?php } ?>


</section>
<!--end of hartContainer-->
    
<!--start of product overview-->
<?php
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
if(!empty($term_hardware) || !empty($term_software) || !empty($term_services)){ ?>

  <section class="productOverview complimentaryProducts">
  	<article class="productContent">
      		<div class="taglineInner Secondary"><h2> Complimentary Products </h2></div> 
         	 <!-- pagination article 1-->
        	

		<?php if(isset($term_hardware) && !empty($term_hardware)){ ?>
			<section class="productHeading"><h3>Hardware</h3> </section>
				<?php
				for($i=0; $i<=count($term_hardware)-1; $i++){
			 		$image_uri = file_create_url($term_hardware[$i]->field_thumbnail_image['und'][0]['uri']);
				?>
    					<article class="productContent articleContent">
        					<ul class="imageThumbnail"><li><img src="<?php echo $image_uri;?>" /></li></ul>    
			     			 <div class="blogAuthorName"> <?php echo $term_hardware[$i]->title ;?> </div>

     			 			<div class="blogDescription">
      				  			<p><?php echo $term_hardware[$i]->field_short_description['und'][0]['value'] ;?></p>
			     			 </div>
    						<div class="blogfooter" > <a href="../<?php echo drupal_get_path_alias('node/'.$term_hardware[$i]->nid) ;?>" class="hyperlink"> View Details &raquo; </a> </div>
						

   		 			</article> <!--end of 1st articleContent-->
				<?php } ?>
		
		<?php } ?>
		
               
    </article><!--end of 1st product content-->
    
<!--start of 2nd product content-->    
   <article class="productContent">
          	<?php if(isset($term_software) && !empty($term_software)){ ?>

        		<section class="productHeading"><h3>Software</h3></section>
			<?php
			for($i=0; $i<=count($term_software)-1; $i++){
			 $image_uri = file_create_url($term_software[$i]->field_thumbnail_image['und'][0]['uri']);
			?>

    			<article class="productContent articleContent">
        			<ul class="imageThumbnail"><li><img src="<?php echo $image_uri;?>" /></li></ul>    
	      			<div class="blogAuthorName"> <?php echo $term_software[$i]->title ;?>  </div>

     				<div class="blogDescription">
       				 <p><?php echo $term_software[$i]->field_short_description['und'][0]['value'] ;?></p>
     			 	</div>
    			  	<div class="blogfooter"> <a href="../<?php echo drupal_get_path_alias('node/'.$term_software[$i]->nid) ;?>" class="hyperlink"> View Details &raquo; </a> </div>

				

   			</article> 
			<?php } ?>

		<?php } ?>
    </article><!--end of 2nd product content--> 

<!--start of 3rd product content-->
    <article class="productContent">

		<?php if(isset($term_services) && !empty($term_services)){ ?>
        		<section class="productHeading"><h3>Services</h3></section>
			<?php
			for($i=0; $i<=count($term_services)-1; $i++){
			 $image_uri = file_create_url($term_services[$i]->field_thumbnail_image['und'][0]['uri']);
			?>

			<article class="productContent articleContent">
		       	<ul class="imageThumbnail"><li><img src="<?php echo $image_uri; ?>" /></li></ul>    
			       <div class="blogAuthorName"><?php echo $term_services[$i]->title ;?></div>

      				<div class="blogDescription">
				        <p><?php echo $term_services[$i]->field_short_description['und'][0]['value'] ;?></p>
			      </div>
			      <div class="blogfooter"> <a href="../<?php echo drupal_get_path_alias('node/'.$term_services[$i]->nid) ;?>" class="hyperlink"> View Details &raquo; </a> </div>
				

    			</article> <!--end of 1st articleContent-->    
				
			<?php } 
		} ?>
           
    </article><!--end of 3rd product content-->
                   
   
  </section><!--End of product overview complimentaryProducts-->
  
<?php } ?>


  <section class="hartContainer">               
    <!--Connect with block-->
    <div class="ConnectWith"><?php print_r($page['content']['block_3']['#markup']); ?> </div>
  </section><!--section hartcontainer ends here-->


  <footer><!--footer main starts-->
      <section class="hartContainer">
	 <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
		 <ul class="footerListing">
		  <?php print render($page['footer_firstcolumn']); ?>
		  </ul>
		     	
        <ul class="footerListing">
        	 <?php print render($page['footer_secondcolumn']); ?>
        </ul>
    	
        <ul class="footerListing">
        	<?php print render($page['footer_thirdcolumn']); ?>
        </ul>
    	
        
		<ul class="footerListing">
           
			<?php print render($page['footer_fourthcolumn']); ?>
        </ul>
		 <?php endif; ?>
        <hr/>
    </section>    
    <div class="copyright">
    	<?php print render($page['footer']); ?>    </div>
  </footer>
  <!-- main footer ends--> 
</div>
<!-- container end -->

</body>
</html>
