<?php 
$count_row = count($rows);
?>
 <hr/>   
<?php
for($i=0; $i<$count_row; $i++)
{ 
?>
    	<section class="modulebox">
        <ul><li>
            <!--<img src="images/midImage1.png" alt="module Image"/>-->
	    <?php print $rows[$i]['field_promotion_image']; ?>
        </li></ul>
        <div class="moduleTitle">
          <a href="#"> <?php print $rows[$i]['title']; ?> &raquo;</a>
        </div>
        <div class="moduleDescription">
              <?php print $rows[$i]['body']; ?>
        </div> 
      </section>
<?php 
}
?>

  

             