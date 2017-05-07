$(document).ready(function(event){
	$('.autofocus').focus();
	
	var tmpStr = $('.autofocus').val();
	$('.autofocus').val('');
	$('.autofocus').val(tmpStr);
});