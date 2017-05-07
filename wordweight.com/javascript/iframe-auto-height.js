$(document).ready(function(event){
	$('.iframe-full-height').load(function(event) {
		$(this).height($(this).contents().find('html').height() + 'px');
	});
});