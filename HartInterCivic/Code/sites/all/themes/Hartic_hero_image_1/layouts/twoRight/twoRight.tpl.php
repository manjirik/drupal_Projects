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
<div class="newsIteamTopSection">
 		 <?php print $content['top']; ?>
</div>
<section class="MiddleMainAreaWhite" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<div class="MidWrapperWhite">
		<div class="articlewrapper">
			<div class="MidWrapperWhiteNew">
				<div class="leftsidebar">
					<article>
						<?php print $content['left']; ?>
					</article><!--end of article-->                           		                         		
				</div>
				<div class="rightsidebar">
					<aside>
						<article class="categories">
							<?php print $content['right1']; ?>
						</article>
						<article class="archives">
							<?php print $content['right2']; ?>
						</article>
					</aside>
				</div>
			</div>
		</div>
	</div>
</section>

 