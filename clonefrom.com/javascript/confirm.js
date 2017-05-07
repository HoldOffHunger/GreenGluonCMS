$(document).ready(function(event){
	$('.confirm').click(function(event){
		console.log("BT: Clicky!");
		if(!confirm("Are you sure you would like to " + $(this).val() + "?")) {
			return false;
		}
		
		return true;
	});
});