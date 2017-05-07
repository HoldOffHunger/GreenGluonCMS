$(document).ready(function(event){
	$('.link-clickable').mousedown(function(event) {
		var hyperlink = $(this).find('a');
		var url = hyperlink.attr('href');
		switch(event.which)
		{
			case 1:
				console.log("BT:1!");
				window.location.href = url;
				break;
				
			case 2:
				console.log("BT:!");
				window.open(url, '_blank');
				break;
		}
		return false;
	});
});