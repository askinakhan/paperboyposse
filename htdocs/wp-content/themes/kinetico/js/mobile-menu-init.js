
jQuery(document).ready( function($) {
	$('.main-menu ul').mobileMenu({
		switchWidth: 768,                   //width (in px to switch at)
		topOptionText: 'Select a page',     //first option text
		indentString: '&nbsp;&nbsp;&nbsp;'  //string for indenting nested items
	});
});