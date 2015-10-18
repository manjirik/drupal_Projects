<!-- Container to hold our Suggestion Box-->
<script type="text/javascript">
	function onentersubmit(formid,evt,thisObj) 
	{			
		evt = (evt) ? evt : ((window.event) ? window.event : "")
		if (evt) 
		{
			if ( evt.keyCode==13 || evt.which==13 ) 
			{
			   return false;
			}
			else
			{
				return true;
			}
		}
    }
</script>
<form name="search" method="post">
	<label class="searchLabel">
		<?php 
		global $musician_tmp;
		$musician_tmp = $_REQUEST['musician'];
		?>
		<input type="hidden" name="musician_search" id="musician_search" value="<?php echo $musician_tmp;?>" />
        <input class="searchInput" type="text" name="search_field" size="30" value="" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" autocomplete="off" onkeypress="return onentersubmit('search',event,this)"/>
		<input class="btnGo" type="button" value="Search" name="Search" />
	</label>
    <div class="suggestionsBox" id="suggestions" style="display: none;">
        <div class="suggestionList" id="autoSuggestionsList"></div>
    </div>
</form>