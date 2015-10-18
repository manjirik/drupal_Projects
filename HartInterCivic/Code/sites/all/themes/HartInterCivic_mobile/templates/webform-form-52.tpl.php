<?php 
//echo "<pre>";
//print_r($page['content']);
//exit;
// print_r($form['#node']->body['und'][0]['value']);
?><section class="hartContainer" >
<article class="content">
<section class="MiddleMainAreaWhite">
	<div class="MidWrapperWhite">
	
		<section class="GenericContent">  
				<?php				
					$block = block_load('block', '20');
					$output = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
					$output1 = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
					print_r ($output1);
					?>  
		    <section class="GenericContent formContent">
				
	        	<div class="formCol">
		            	<h5>First Name: <font color="red">*</font></h5>
		              <?php	
					print drupal_render($form['submitted']['first_name']);
				?>
		            	<h5>Last Name: <font color="red">*</font></h5>
		              <?php	
					print drupal_render($form['submitted']['last_name']);
				?>
		            	<h5>Email: <font color="red">*</font></h5>
		              <?php	
					print drupal_render($form['submitted']['email']);
				?>
		            	<h5>Phone: </h5>
		              <?php	
					print drupal_render($form['submitted']['phone']);
				?>
		        </div>
	        	<div class="formCol colMiddle">	
		            	<h5>Jurisdiction: <font color="red">*</font></h5>
		              <?php	
					print drupal_render($form['submitted']['jurisdiction']);
				?>
		            	<h5>Notes: </h5>
		              <?php	
					print drupal_render($form['submitted']['notes']);
				?>
	            </div>   
	        	<div class="formCol">
			            	<p><font color="red">*</font> <i>Denotes a required field</i></p>
			                <p>Optional additional copy or instructional text can be added to this space if deemed necessary.</p>
	      
       	     </div>          
	        </section>
	</section>
	<?php print drupal_render($form['submitted']);print drupal_render_children($form);?>
	
	<!--<div id="block-block-3">--><?php
					$block = block_load('block', '3');
					$output = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
					$output1 = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
					//print_r ($output1);
	?>
	<!--</div>-->
</div>
</section>
</section></article>
<?php 




?>