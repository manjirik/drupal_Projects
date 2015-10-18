<?php
global $base_path;
global $theme_path;
//echo '<pre>';
//print_r($node);
//echo '</pre>';


?>

<div class="container"><!-- container start -->
<!--Header-->
  <header>
    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#PrimaryNav">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="menu">Menu</span>
          </button>
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
          <a class="brand secondaryMenu" href="#">
	   </a>
          <div class="clearfix"></div>
          <div id="SecondaryNav" class="nav-collapse subnav-collapse collapse">
            <ul class="nav">
           	<?php print render($page['highlighted']); ?>			  
           </ul>
          </div>
        </div>
      </div>
    </div>
   </div>
  </header><!--header end-->
  <section class="hartContainer"><!--section container starts-->
  	<article class="content">
		<div class="taglineInner">
        	<?php echo $node->title; ?>
        </div>
        <div id="taglineDescription">
        	<?php echo $node->body['und'][0]['value']; ?>
        </div>
    </article>
    <!--1st module wrapper-->  
	  
	<section class="moduleboxwrapper">
    <article class="modulebox Innerpage">
        <ul class="imageThumbnail"><li>
             <img src="<?php print file_create_url($node->field_block_image_1['und'][0]['uri']); ?>" alt="module Image">
        </li></ul>
        <div class="moduleTitle Innerpage">
           <?php echo $node->field_block_title_1['und'][0]['value']; ?>
        </div>
        <div class="moduleDescription Innerpage">
              <p><?php echo $node->field_block_description_1['und'][0]['value']; ?></p>
        </div> 
    </article>
        <div class="modulefooter">
        	<a href="<?php echo $node->field_block_link_1['und'][0]['url']; ?>" > Learn more about <?php echo $node->field_block_title_1['und'][0]['value']; ?> &raquo; </a>
			
        </div>
    </section> 

    <!--2nd module wrapper-->       
	<section class="moduleboxwrapper">
    <article class="modulebox Innerpage">
        <ul class="imageThumbnail"><li>
            <img src="<?php print file_create_url($node->field_block_image_2['und'][0]['uri']); ?>" alt="module Image"/>
        </li></ul>
        <div class="moduleTitle Innerpage">
            <?php echo $node->field_block_title_2['und'][0]['value']; ?>
        </div>
        <div class="moduleDescription Innerpage">
              <p><?php echo $node->field_block_description_2['und'][0]['value']; ?></p>
        </div> 
    </article>
        <div class="modulefooter">
        	<a href="<?php print $node->field_block_link_2['und'][0]['url']; ?>" >Learn more about <?php echo $node->field_block_title_2['und'][0]['value']; ?> &raquo; </a>
        </div>
    </section> 

    <!--3rd module wrapper-->       
	<section class="moduleboxwrapper">
    <article class="modulebox Innerpage">
        <ul class="imageThumbnail" ><li>
            <img src="<?php print file_create_url($node->field_block_image_3['und'][0]['uri']); ?>" alt="module Image"/>
        </li></ul>
        <div class="moduleTitle Innerpage">
           <?php echo $node->field_block_title_3['und'][0]['value']; ?>
        </div>
        <div class="moduleDescription Innerpage">
               <p><?php echo $node->field_block_description_3['und'][0]['value']; ?></p>
        </div> 
    </article>
        <div class="modulefooter">
        	<a href="<?php print $node->field_block_link_3['und'][0]['url']; ?>" >Learn more about <?php echo $node->field_block_title_3['und'][0]['value']; ?> &raquo; </a>
        </div>
    </section>  
  
        <!--4th module wrapper-->
	<section class="moduleboxwrapper">
    <article class="modulebox Innerpage">
        <ul class="imageThumbnail"><li>
            <img src="<?php print file_create_url($node->field_block_image_4['und'][0]['uri']); ?>" alt="module Image"/>
        </li></ul>
        <div class="moduleTitle Innerpage">
            <?php echo $node->field_block_title_4['und'][0]['value']; ?>
        </div>
        <div class="moduleDescription Innerpage">
             <p><?php echo $node->field_block_description_4['und'][0]['value']; ?></p>
        </div> 
    </article>
        <div class="modulefooter">
        <a href="<?php print $node->field_block_link_4['und'][0]['url']; ?>" >Learn more about <?php echo $node->field_block_title_4['und'][0]['value']; ?> &raquo; </a>
        </div>
    </section> 

    <!--Connect with block-->   
    <div class="ConnectWith">
      	<?php print_r($page['content']['block_3']['#markup']); ?>
    </div>            
  </section><!--section container end-->      
  <footer><!--footer main starts-->
  	<section class="hartContainer">
    
		 <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
		 <ul class="footerListing">
		  <?php print render($page['footer_firstcolumn']); ?>
		  </ul>
		  <?php endif; ?>
    	
        <ul class="footerListing">
        	 <?php print render($page['footer_secondcolumn']); ?>
        </ul>
    	
        <ul class="footerListing">
        	<?php print render($page['footer_thirdcolumn']); ?>
        </ul>
    	
       <ul class="footerListing">
           	<?php print render($page['footer_fourthcolumn']); ?>
        </ul>
		
        <hr/>
    </section>    
    <div class="copyright">
    	<?php print render($page['footer']); ?>    </div>
             	
  </footer><!-- main footer ends-->
</div><!-- container end -->

