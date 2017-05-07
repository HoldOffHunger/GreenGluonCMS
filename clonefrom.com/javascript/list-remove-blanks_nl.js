$(document).ready(function(event){
	var timeout;
	var delay = 1000;	// 1 seconds
	$('.input-area').keyup(function(e) {
		$('#status-text').text(processingText());
		if(timeout) {
			clearTimeout(timeout);
		}
		timeout = setTimeout(function() {
			removeBlanks();
		}, delay);
	});
	
	var clicked = 0;
	
	$('.input-area').click(function(e) {
		if(!clicked)
		{
			$(this).val('');
			clicked = 1;
		}
	});
	
	$('.remove-blanks-button').click(function(e) {
		removeBlanks();
	});
	
	$('#trim-whitespace').change(function(e) {
		removeBlanks();
	});
	
	function processingText() {
		return 'verwerking';
	}
	
	function waitingForUserText() {
		return 'Wachten op gebruiker';
	}

	function removeBlanks() {
		deblankedwords = $('.input-area').val().split(/\n/);
		
		if($('#trim-whitespace').prop("checked"))
		{
			var trimmedwords = [];
			
			$.each(deblankedwords, function (index, word) {
				trimmedwords.push($.trim(word));
			});
			
			deblankedwords = trimmedwords;
		}
		
		var deblankedlines = [];
		
		for (i = 0; i < deblankedwords.length; i++)
		{
			var found = 0;
			line = deblankedwords[i];
			
			if(line)
			{
				deblankedlines.push(line);
			}
		}
		
		deblankedwords = deblankedlines;
		
		$('.output-area').val(deblankedwords.join("\n"));
		$('.output-area').change();
		$('#status-text').text(waitingForUserText());
	}
});