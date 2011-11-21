/*
$(document).ready(function () {	
	
	$('#nav li').hover(
		function () {
			//show its submenu
			$('ul', this).slideDown(180);

		}, 
		function () {
			//hide its submenu
			$('ul', this).slideUp(180);			
		}
	);
	
});
*/
$(document).ready(function () {	
	
	$('#nav').hover(
		function () {
			//show its submenu
			$('ul', this).slideDown(180);

		}, 
		function () {
			//hide its submenu
			$('ul', this).slideUp(180);			
		}
	);
	
});