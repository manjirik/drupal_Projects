<?php
/**
 * @file
 * Template for a 2 column panel layout.
 *
 * This template provides a two column panel display layout, with
 * each column roughly equal in width.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['left']: Content in the left column.
 *   - $content['right']: Content in the right column.
 */
?>

<section class="MiddleMainAreaWhite" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
 
  <section class="hartContainer"><!--section hartcontainer starts-->
    <article class="content">
       <?php print $content['top1']; ?>
    </article>
  
    <!--end of article--> 
	<section class="blogsection">
     <?php print $content['top2']; ?>
	 </section>
 
     <section class="blogsection">
     <?php print $content['top3']; ?>
	 </section>
 
  <!-- end of section hart container-->
  <section class="blogsection">
     <?php print $content['top4']; ?>
    
  
  
   </section><!-- end of 
 
    <!--Connect with block-->
  </section>
  <!--section hartcontainer ends here-->
</section>
 