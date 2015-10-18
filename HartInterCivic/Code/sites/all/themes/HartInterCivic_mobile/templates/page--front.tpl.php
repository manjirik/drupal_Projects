<?php
global $base_url;
global $base_path;
global $theme_path;
?>
<div class="container"><!-- container start -->
<!--Header-->
  <header>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="menu">Menu</span>
          </button>
          <a class="brand" href="<?php echo $base_path; ?>"><img src="<?php print $base_path.'/'.$theme_path; ?>/images/mobile-logo.png" alt="logo"></a>

		    
          <div class="nav-collapse collapse">
            <ul class="nav">
             
			  <?php print render($page['header']); ?>
              
           </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <!-- home image
    ================================================== -->
   <div class="home_image">
     <img src="<?php print $base_path.'/'.$theme_path; ?>/images/homeImage.png" alt="Home Image">
   </div>
  </header><!--header end-->
  <section class="hartContainer"><!--section container starts-->
  	<article class="content">
		<div id="tagline">
        	Advancing democracy for over 100 years.
        </div>
        <div id="taglineDescription">
        	Proven election management, voting systems and support to ensure election success.
        </div>
    </article>
    <hr/>


  	
<br>
		<?php
		if(drupal_is_front_page()) {
		    unset($page['content']['system_main']['default_message']);
	       }
		?>
	       <?php print render($page['content']); 

?>
          
  </section>

	
<!--section container end-->      
  <footer>
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
             	
  </footer>
</div><!-- container end -->

