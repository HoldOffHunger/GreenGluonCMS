$(document).ready(function(event){
	$('.play-game-button').click(function(e) {
		var url = $('#play-base-url').val() + '?' + $(this).attr('id');
		$('#game-view').attr('src', url);
		$('#game-view').show().focus();
	});
});