$(document).ready(function(event){
	var voicelist = responsiveVoice.getVoices();
	var vselect = $("#voice-selection");
	$.each(voicelist, function() {
		vselect.append($("<option >").val(this.name).text(this.name));
		$('#voice-selection').val('UK English Male');
	});

	var texttoplay = getCleanText();
	var texttoplayarray = getCleanTextArray();
	$('#play-text-as-audio').click(function() {
		if($(this).html().match('Listen'))
		{
			$(this).html('&#9632; Stop');
			texttoplaynow = texttoplay;
			var starton = $('#start-on');
			
			if(starton)
			{
				var startonvalue = parseInt($(starton).val());
				if(startonvalue && startonvalue > 1)
				{
					texttoplaynow = texttoplayarray.slice(startonvalue + 1, texttoplayarray.length + 2).join(' ');
				}
			}
			
			console.log("Playing the Following Audio: " + texttoplaynow);
			responsiveVoice.speak(texttoplaynow, $('#voice-selection').val());
		}
		else
		{
			$(this).html('&#9658; Listen');
			responsiveVoice.pause();
		}
		
		//BT: ???
		//return false;
	});
	
	function getCleanText() {
		var text = $('.text-to-play-as-audio').first().html();
		var cleantext = $("<div/>").html(text).text();
		var textpieces = cleantext.split("\n");
		var textlist = [];
		
		for(i = 0; i < textpieces.length; i++)
		{
			var textpiece = $.trim(textpieces[i]);
			if(textpiece.length)
			{
				var lastchar = textpiece.charAt(textpiece.length - 1);
				if(
					lastchar != '.' &&
					lastchar != '!' &&
					lastchar != '?' &&
					lastchar != ',' &&
					lastchar != ';' &&
					lastchar != ':' &&
					lastchar != '"' &&
					lastchar != '-' &&
					lastchar != '_' &&
					lastchar != '#' &&
					lastchar != '/' &&
					lastchar != '\\' &&
					lastchar != '\'')
				{
					textpiece = textpiece + '.';
				}
			}
			textlist.push(textpiece);
		}
		
		texttoplay = textlist.join(' ');
		
		return texttoplay;
	}
	
	function getCleanTextArray() {
		var textforarray = texttoplay;
		textforarray = textforarray
			.replace(/\n/g, ' ')
			.replace(/\r/g, ' ')
			.replace(/\t/g, ' ')
			.replace(/!/g, '! ')
			.replace(/\?/g, '? ')
		;
		
		depth = 0;
		
		while(textforarray.match('..'))
		{
			textforarray = textforarray.replace(/\.\./g, '.');
			
			depth++;
			if(depth > 10)
			{
				break;
			}
		}
		
		textforarray = textforarray.replace(/\./g, '. ');
		
		depth = 0;
			
		while(textforarray.match('  '))
		{
			textforarray = textforarray.replace(/\s+/g, ' ');
			
			depth++;
			if(depth > 10)
			{
				break;
			}
		}
		
		texttoplayarray = textforarray.split(' ');
		$('#total-words').html(texttoplayarray.length.toLocaleString());
		
		return texttoplayarray;
	}
});