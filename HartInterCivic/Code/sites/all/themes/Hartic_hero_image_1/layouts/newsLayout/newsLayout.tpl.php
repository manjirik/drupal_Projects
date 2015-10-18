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
<div class="MidWrapperWhite">
	<div class="newsIteamTopSection">
 		 <?php print $content['top']; ?>
   	</div>
  
 	<div class="MidWrapperWhiteNew">
		<div class="leftsidebar">
			 <section class="blogIndexContent">
				<article class="blogcontent">
					<?php print $content['left1']; ?>
				</article><!--end of article-->                           		                         		
			</section>	
			 <section class="blogIndexContent1">
				<article class="blogcontent">
					<?php print $content['left2']; ?>
				</article>
			</section> 
		</div>
		<div class="rightsidebar">
			<aside>
      				<article class="newsCategories">
					  <?php print $content['right']; ?>
			       </article>
			</aside>
		</div>
	</div> 
 </div>
</section>

 