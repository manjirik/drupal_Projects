<?php
/* User details listing on Video page */
/**
 * @file
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $caption: The caption for this table. May be empty.
 * - $header_classes: An array of header classes keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $classes: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * - $field_classes: An array of classes to apply to each field, indexed by
 *   field id, then row number. This matches the index in $rows.
 * @ingroup views_templates
 */
  // print_r($rows);die();
	global $base_url;
	foreach($rows as $row){
?>
<div class="target">
<div class="video_container" id="video<?php echo $row[nid];?>">
	<div class="video_container_in" >
		<div class="video_profile_block">
			<div class="imgblock">
				<div class="heading_sec">
				  <h2><?php echo $row[field_user_name];?></h2>
					<div class="age"><span>(<?php echo $row[field_user_age];?>)</span> 
						<?php 
								if($row[field_sex] == "Male"){
									echo "<img src='".$base_url."/sites/all/themes/toyota/images/age-icon-min.png' alt='' title='' />";
								}
								else{
									echo "<img src='".$base_url."/sites/all/themes/toyota/images/age-icon.png' alt='' title='' />";
								}
						?>
					</div>
				</div>
				<?php echo $row[field_video_url];?>
			</div>
			<div class="txt_sec">
				<div id="share-me" class="share-me">
					<div class="share_block pdlftbtm"><span><a href="javascript:void(0)">Share this</a></span> 
					<a href="javascript:void(0)"><img src="<?php echo $base_url;?>/sites/all/themes/toyota/images/share-icon.gif" alt="share icon" title="share icon"></a> </div>
					<div id="share-option-me" class="share-option-me" style= "display:none;"><?php 
						$mPath = $row[path]; $mTitle = $row[title];
						$data_options = sharethis_get_options_array();
						echo $share_data = sharethis_get_button_HTML($data_options, $mPath, $mTitle);
					?></div>
				</div>
				<div class="clear"></div>
				<div class="txt"><strong>Country:</strong> <?php echo $row[field_country]; ?></div>
				<div class="txt clear"><strong>Occupation:</strong> <?php echo $row[field_occupation]; ?></div>
				<p><?php echo $row[field_thoughts]; ?> </p>
			</div>
			<div class="my_corolla_car">
				<img src="<?php echo $base_url;?>/sites/all/themes/toyota/images/toyota-corolla-car.png" alt="Toyota Altis" title="Toyota Altis" />
			</div>
			<div class="my_corolla_icon">
				<img src="<?php echo $base_url;?>/sites/all/themes/toyota/images/my-corolla-icon.png" alt="My Corolla" title="My Corolla" />
			</div>
			<div class="my_corolla_txt">9th Generation<br />
				Corolla Altis
			</div>
		</div>
	</div>
</div>
</div>
<div class="mrgbtm150"></div>
<?php
	}
?>
