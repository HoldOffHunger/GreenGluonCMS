$(document).ready(function(e) {
	var timeout;
	var delay = 1000;	// 1 seconds
	$('.input-area').keyup(function(e) {
		$('#status-text').text(processingText());
		if(timeout) {
			clearTimeout(timeout);
		}
		timeout = setTimeout(function() {
			sortWords();
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
	
	$('.sort-button').click(function(e) {
		sortWords();
	});
	
	$('.sort-order').change(function(e) {
		sortWords();
	});
	
	$('#trim-whitespace').change(function(e) {
		sortWords();
	});
	
	function processingText() {
		return 'Tratamiento';
	}
	
	function waitingForUserText() {
		return 'Esperando usuario';
	}

	function sortNumber(a,b) {
		return a - b;
	}

	function reverseSortNumber(a,b) {
		return b - a;
	}

	function sortWords() {
		sortedwords = $('.input-area').val().split(/\n/);
		
		if($('#trim-whitespace').prop("checked"))
		{
			var trimmedwords = [];
			
			$.each(sortedwords, function (index, word) {
				trimmedwords.push($.trim(word));
			});
			
			sortedwords = trimmedwords;
		}
		
		var sortorder = $('.sort-order option:selected').val();
		
		if(sortorder == 'alphabetical')
		{
			sortedwords.sort();
		}
		else if(sortorder == 'reverse-alphabetical')
		{
			sortedwords.sort();
			sortedwords.reverse();
		}
		else if(sortorder == 'numeric')
		{
			sortedwords.sort(sortNumber);
		}
		else if(sortorder == 'reverse-numeric')
		{
			sortedwords.sort(reverseSortNumber);
		}
		
		$('.output-area').val(sortedwords.join("\n"));
		$('.output-area').change();
		$('#status-text').text(waitingForUserText());
	}
});