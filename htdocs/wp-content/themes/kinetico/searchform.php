<form role="search" method="get" id="searchform" action="<?php echo home_url("/"); ?>" >
	<div class="newsletter_input search_input">
    <input type="text" onClick="if(this.value=='<?php _e("Type and Press Enter", "kinetico"); ?>'){this.value='';}" onblur="if(this.value==''){this.value='<?php _e("Type and Press Enter", "kinetico"); ?>';}" value="" name="s">
	<script type="text/javascript">
		jQuery(document).ready(function() {
			var query = jQuery(".search_input input").val();
			if(query == "")
			{
				jQuery(".search_input input").val("<?php _e("Type and Press Enter", "kinetico"); ?>");
			}
		});
	</script>
	</div>
</form>