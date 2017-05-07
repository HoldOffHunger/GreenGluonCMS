$(document).ready(function(event) {
	function selectAllText(textbox) {
		textbox.focus();
		textbox.select();
	}
	
	$('.select-input-contents').click(function() {
		selectAllText($(this));
	});
});