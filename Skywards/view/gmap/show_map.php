<!-- Tab content -->
<div class="tabs">
	<?php include_once BASEPATH.DS."view".DS."navigation.php";; ?>	
	<div class="tab-content" id="tab_0">
		<img src="images/map.jpg" width="821" height="791" alt="Map" />
	</div>
	<div class="tab-content" id="tab_1">
		<?php echo $data['map']['js']; ?>
		<div id="gmap">
			<?php echo $data['map']['html'];?>
		</div>
	</div>
	<div class="tab-content" id="tab_2">	
	My Entries Page will come here.</div>
	<div class="tab-content" id="tab_3">Skywards Page will come here.</div>
	<div class="tab-content" id="tab_4"> </div>
	<div class="tab-content" id="tab_5"> </div>
</div>
<!-- Tab content ends-->
