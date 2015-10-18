<?php
$len = sizeOf($rows);	
?>
 
  <section class="blogsection">
  
	  <?php
			for($j=0; $j<$len; $j++){
				echo "  <article class=\"productContent articleContent\">
					 <div class=\"blogAuthorName\">".$rows[$j]['title']."</div>
					 <span class=\"blogDate\">
						<span class=\"date\">".$rows[$j]['created']."</span>
					 </span>
					<div class=\"blogDescription\"><p>".$rows[$j]['field_short_text']."</p></div><div class=\"blogfooter\">".
					$rows[$j]['field_text_hyperlink']."</div>
					</article>";
			}
	  ?>

  
      </section>


  

  
