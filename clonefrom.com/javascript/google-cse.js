google.load('search', '1',
{language : 'en', style : google.loader.themes.GREENSKY});
	
(function() {
	var cx = '003109742948514404477:qjbcmlj8yue';		// EarthFluent CSE Engine ID
	var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
	gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
		'//www.google.com/cse/cse.js?cx=' + cx;
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
})();