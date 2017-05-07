$(document).ready(function(event){
	$(function() {
		$( ".datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "-100:+2",
			dateFormat: "yy-mm-dd",
		});
	});
});