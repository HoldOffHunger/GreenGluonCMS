$(document).ready(function(event){
	$('.linked-header').mousedown(function(event) {
		var hyperlink = $(this).find('.header-link-url');
		var url = hyperlink.attr('href');
		switch(event.which)
		{
			case 1:
				window.location.href = url;
				break;
				
			case 2:
				window.open(url, '_blank');
				break;
		}
		return false;
	});
});