<?php
global $base_path;
global $theme_path;
?>
<div class="container"><!-- container start --> 
  <!--Header-->
  <header> 
    <!-- Navbar    ================================================== -->
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
		<a class="brand secondaryMenu" href="#"></a>
            <div class="clearfix"></div>
            <div id="SecondaryNav" class="nav-collapse subnav-collapse collapse">
              <ul class="nav">
		<?php 
		if($page['highlighted']){
			print render($page['highlighted']);
		}
		?>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>



 

	
			
		       <?php  print render($page['content']);   ?>
	








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
           
			<?php print render($page['footer_fourthcolumn']); ?>
        </ul>
		 <?php endif; ?>
        <hr/>
    </section>    

 <div class="copyright"><?php print render($page['footer']); ?></a>  </div>

  </footer>

	</div>
  

  

  
