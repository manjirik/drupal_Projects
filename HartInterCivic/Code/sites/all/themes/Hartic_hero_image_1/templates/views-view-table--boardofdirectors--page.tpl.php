<?php 
//echo "<pre>";
//print_r($rows);
$count_row = count($rows);
?>
<section class="MiddleMainAreaWhite">
    <div class="MidWrapperWhite">
      <div class="newsIteamTopSection">
        <h1>Intro Headline for News</h1>
        <p>Additional introductory copy excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="blogIndexContentContainer group">
      <section class="blogIndexContentMember">

<?php
	for($i=0; $i<$count_row; $i++)
	{
?>

	<article>
             <div class="imageIcon"><?php print $rows[$i]['field_profile_photo']; ?></div>
        	<h4><?php print $rows[$i]['title']; ?></h4>
		<p><?php print $rows[$i]['body']; ?></p>
            <div class="subHeading">Contact Number:<?php print $rows[$i]['field_members_contact_number']; ?></div>
 	     <div class="subHeading"><span class="date">Email ID: <?php print $rows[$i]['field_member_email_id']; ?></span></div>
       </article>

<?php } ?>

 </section>
</div>

</div>
</section>

