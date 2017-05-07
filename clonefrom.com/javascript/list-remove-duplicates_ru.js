$(document).ready(function(event){
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
	
	$('.remove-duplicates-button').click(function(e) {
		removeDuplicates();
	});
	
	$('#dedupe-type').change(function(e) {
		removeDuplicates();
	});
	
	$('#trim-whitespace').change(function(e) {
		removeDuplicates();
	});
	
	function processingText() {
		return 'обработка';
	}
	
	function waitingForUserText() {
		return 'Ожидание пользователя';
	}

	function sortWords() {
		dedupedwords = $('.input-area').val().split(/\n/);
		
		if($('#trim-whitespace').prop("checked"))
		{
			var trimmedwords = [];
			
			$.each(dedupedwords, function (index, word) {
				trimmedwords.push($.trim(word));
			});
			
			dedupedwords = trimmedwords;
		}
		
		if($('#dedupe-type').val() == 'remove-duplicates')
		{
			var dedupedlines = [];
			
			for (i = 0; i < dedupedwords.length; i++)
			{
				var found = 0;
				firstline = dedupedwords[i];
				
				for(j = i - 1; j >= 0; j--)
				{
					secondline = dedupedwords[j];
					
					if(firstline == secondline)
					{
						found = 1;
						j = -1;
					}
				}
				
				if(!found)
				{
					dedupedlines.push(firstline);
				}
			}
			
			dedupedwords = dedupedlines;
		}
		else if ($('#dedupe-type').val() == 'find-duplicates')
		{
			var dupelines = [];
			for (i = 0; i < dedupedwords.length; i++)
			{
				firstline = dedupedwords[i];
				for(j = 0; j < dedupedwords.length && j != i; j++)
				{
					secondline = dedupedwords[j];
					if(firstline == secondline)
					{
						if($.inArray(firstline, dupelines) === -1)
						{
							dupelines.push(firstline);
						}
					}
				}
			}
			
			dedupedwords = dupelines;
		}
		
		$('.output-area').val(dedupedwords.join("\n"));
		$('.output-area').change();
		$('#status-text').text(waitingForUserText());
	}
});