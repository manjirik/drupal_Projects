<?php
global $base_path;
global $theme_path;
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
         <a class="brand" href="<?php echo $base_path; ?>"><img src="<?php print $base_path.''.$theme_path; ?>/images/mobile-logo.png" alt="logo"></a>
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
	   <a class="brand secondaryMenu" href="#"> <?php if($node->field_related_content_headline['und'][0]['value'] !=''){ print $node->field_related_content_headline['und'][0]['value']; } ?></a>
            <div class="clearfix"></div>
            <div id="SecondaryNav" class="nav-collapse subnav-collapse collapse">
              <ul class="nav">
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
      </div>
    </div>
  </header>
  <!--header end-->
  <section class="hartContainer"><!--section hartcontainer starts-->
    <article class="content">
      <div class="taglineInner"><?php if($node->title !='') echo $node->title; ?> </div>
      <div id="taglineDescription"> <?php if($node->field_product_detail['und'][0]['value'] !='') echo ($node->field_product_detail['und'][0]['value']); ?></div>
    </article>
  </section><!-- end of section hart container-->
  <section class="blogsection">
  	<article class="productContent">      
      <div class="blogDescription Secondary"> 

	<p> <?php if(!empty($node->field_related_image['und'][0]['uri'])){
				$url = file_create_url($node->field_related_image['und'][0]['uri']); ?>
				<img src="<?php echo $url; ?>"> <?php 
	  	} ?>
	</p>
			
		<?php $video_url = file_create_url($node->field_video['und'][0]['file']->uri); ?>

	    	<a href="<?php print $video_url; ?>"> <p> <?php if(!empty($node->field_video['und'][0]['file'])) echo $node->field_video['und'][0]['file']->filename; ?></p></a>
	<?php $file_url = file_create_url($node->field_file_attachement['und'][0]['uri']); ?>

	     	<a href="<?php echo $file_url; ?>"><p> <?php if(!empty($node->field_file_attachement['und'][0]['filename'])) echo $node->field_file_attachement['und'][0]['filename']; ?></p></a>
               
      </div>      
    </article>
  </section>
 
  <footer><!--footer main starts-->
  <section class="hartContainer">
	 <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
		 <div class="footerTitle"> </div>
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
            <!--<li>News & Events</li>
            <li>Our Blog</li>-->
			<?php print render($page['footer_fourthcolumn']); ?>
        </ul>
		 <?php endif; ?>
        <hr/>
    </section>    

 <div class="copyright"><?php print render($page['footer']); ?></a>  </div>

  </footer>
  <!-- main footer ends--> 
</div>
<!-- container end -->

