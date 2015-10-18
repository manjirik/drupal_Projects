<script type="text/javascript">
<?php //$temp = 'http://localhost/Skywards/';?>
function selectDestination(latLan)
{
	//alert(latLan);
	$.ajax({
        type: "GET",
        url: "<?php echo SITE_URL;?>index.php?r=gmap/selectDestination&latLan="+latLan,
        success: function(data) {
            //alert(data);
            alert(data);
        }
    });	
}

</script>
<?php echo $map['js']; ?>
<div id="gmap">
<?php echo $map['html'];?>
</div>

