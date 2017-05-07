$(document).ready(function(event){
	var timeout;
	var delay = 1000;	// 1 seconds
	$('.input-area').keyup(function(e) {
		$('#status-text').text(processingText());
		if(timeout) {
			clearTimeout(timeout);
		}
		timeout = setTimeout(function() {
			removeSpacing();
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
	
	$('.remove-spacing-button').click(function(e) {
		removeSpacing();
	});
	
	$('#spacing-type').change(function(e) {
		removeSpacing();
	});
	
	function processingText() {
		return 'Em processamento';
	}
	
	function waitingForUserText() {
		return 'Aguardando Usuário';
	}
	
	function removeSpacing() {
		despacedtext = $('.input-area').val();
		
		if($('#spacing-type option:selected').val().match('spaces'))
		{
			despacedtext = despacedtext.replace(/ /gi, "");
		}
		
		if($('#spacing-type option:selected').val().match('tabs'))
		{
			despacedtext = despacedtext.replace(/\t/gi, "");
		}
		
		if($('#spacing-type option:selected').val().match('newlines'))
		{
			despacedtext = despacedtext.replace(/\n/gi, "");
			despacedtext = despacedtext.replace(/\r/gi, "");
		}
		
		$('.output-area').val(despacedtext);
		$('.output-area').change();
		$('#status-text').text(waitingForUserText());
	}
});