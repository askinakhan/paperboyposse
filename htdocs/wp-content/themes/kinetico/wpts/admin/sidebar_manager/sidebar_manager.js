jQuery(document).ready( function($) {

	var $final = $(".final-sidebars");

	function getSidebars() {

		var f = '';

		$(".sidebars-custom .sidebar").each(function(i, e) {
			f += $(this).find("input").val() + ";";
		});

		$final.val(f);
	}

	getSidebars();
	
	$(".sidebars-custom .sidebar a").live("click", function() {

		if(confirm("Do you have sure you want delete this sidebar?"))
		{
			$(this).parent().remove();
		}

		getSidebars();

		return false;
	});

	$("#new-sidebar-btn").live("click", function() {
		var ns = $("#new-sidebar").val();

		if(ns != "") {

			$(".sidebars-custom").append('<div class="sidebar"><input type="text" value="'+ ns +'" /><a href="#">Remove</a></div>');

			getSidebars();

			$("#new-sidebar").val('');
		}
		else {
			alert("Insert a Sidebar Name");
		}

		return false;
	});
	
});