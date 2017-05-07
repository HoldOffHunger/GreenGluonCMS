$(document).ready(function(event){
	var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
	
	if(!isChrome) {
		$('.google-chrome-warning').show();
	}
});