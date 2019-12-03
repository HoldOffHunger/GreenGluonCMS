$(document).ready(function(event){
		// Refresh all panels
	var images = {};
	var texts = {};
	var interval = 10000;		// 10 seconds
	window.setInterval(function() {
		var backgrounds = $('.active-background-image');
		var backgroundscount = backgrounds.length;
		for(i = 0; i < backgroundscount; i++)
		{
			var background = backgrounds[i];
			var backgroundid = $(background).attr('id');
			var backgroundidpieces = backgroundid.split('_');
			var childcode = backgroundidpieces[0];
			var textcitationid = childcode + '_backgroundimagetext';
			
			var backgroundimages = $('input[id^=' + backgroundid + ']');
			var backgroundtexts = $('input[id^=' + textcitationid + ']');
			
			if(backgroundimages.length > 1 && backgroundtexts.length > 1)
			{
				var selectedindex = 0;
				var currenturl = $(background).css('background-image');
				
				for(j = 0; j < backgroundimages.length; j++)
				{
					var backgroundimage = backgroundimages[j];
					if('url("' + $(backgroundimage).val() + '")' == currenturl)
					{
						selectedindex = j;
						j = backgroundimages.length;
					}
				}
				
				var nextindex = selectedindex + 1;
				
				if(backgroundimages.length - 1 < nextindex)
				{
					nextindex = 0;
				}
				
				var nextbackgroundimage = backgroundimages[nextindex];
				var nextbackgroundtext = backgroundtexts[nextindex];
				var nexturl = $(nextbackgroundimage).val();
				var nexttext = $(nextbackgroundtext).val();
				
				images[childcode] = nexturl;
				texts[childcode] = nexttext;
				
				$('#' + backgroundid).fadeTo(400, 0.5, function() {
					var backgroundidpieces = $(this).attr('id').split('_');
					var childcode = backgroundidpieces[0];
					var textcitationid = childcode + '_backgroundimagetext';
					$(this).css('background-image', 'url("' + images[childcode] + '")');
					$('#' + textcitationid).html(texts[childcode]);
				}).fadeTo(400, 1);
				cacheset = 0;
			}
		}
	}, interval);
	
	var cacheset = 0;
	var cacheinterval = 2500;		// 2.5 seconds
	window.setInterval(function() {
		if(!cacheset) {
			cacheset = 1;
			var backgrounds = $('.active-background-image');
			var backgroundscount = backgrounds.length;
			for(i = 0; i < backgroundscount; i++)
			{
				var background = backgrounds[i];
				var backgroundid = $(background).attr('id');
				
				var backgroundimages = $('input[id^=' + backgroundid + ']');
				
				if(backgroundimages.length > 1)
				{
					var selectedindex = 0;
					var currenturl = $(background).css('background-image');
					
					for(j = 0; j < backgroundimages.length; j++)
					{
						var backgroundimage = backgroundimages[j];
						if('url("' + $(backgroundimage).val() + '")' == currenturl)
						{
							selectedindex = j;
							j = backgroundimages.length;
						}
					}
					
					var nextindex = selectedindex + 1;
					
					if(backgroundimages.length - 1 < nextindex)
					{
						nextindex = 0;
					}
					
					var nextbackgroundimage = backgroundimages[nextindex];
					var nexturl = $(nextbackgroundimage).val();
					
					$('<img/>').prop('src', nexturl).appendTo('body').css('display','none');
				}
			}
		}
	}, cacheinterval);
});