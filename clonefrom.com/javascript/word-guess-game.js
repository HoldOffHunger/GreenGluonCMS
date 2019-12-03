function WordGuessGame(word) {
	ResetBrowserCache();
	
	$('#guess').attr('data-guess', '1');
	
	var wordletterpieces = [];
	
	for(var i = 0; i < word.length; i++) {
		var letter = word[i];
		var letterelement = '<span class="solvable-letter" data-visible="false" data-letter="' + letter + '">___' + '</span>';
		wordletterpieces.push(letterelement);
	}
	
	var wordletters = wordletterpieces.join(' ');
	
	preLoadImages();
	
	return $('#open-letters').html(wordletters);
}

function ResetBrowserCache() {
	$('#solution-answer').val('');
	$('#guess').attr('disabled', false);
	$('#solution-answer').attr('disabled', false);
	$('#solution-answer').focus();
	$('#guess').click(guessclick);
	$('#solution-answer').keypress(enterguess);
}

function preLoadImages() {
	for(var i = 1; i < 9; i++) {
		var nexturl = '/image/full-lunar-eclipse-progression-phase-' + i + '.jpg';
		$('<img/>').prop('src', nexturl).appendTo('body').css('display','none');
	}
}

var enterguess = function(e) {
	if(e.which == 13) {
		$('#guess').click();
	}
};

$('#solution-answer').keypress(enterguess);

var guessclick = function() {
	var guessedletter = $('#solution-answer').val();
	$('#solution-answer').focus();
	$('#solution-answer').val('');
	
	if(!guessedletter.length) {
		$('#message').text('You must enter a letter to make a guess.');
		return false;
	}
	
	var lettersguessedsofar = $('#letters-tried-so-far').text();
	
	if(lettersguessedsofar == '(none)') {
		lettersguessedsofar = '';
	}
	
	if(lettersguessedsofar.match(guessedletter)) {
		$('#message').text('You have already guessed this letter : ' + guessedletter + '.');
	} else {
		if(lettersguessedsofar.length) {
			lettersguessedsofar += ', ';
		}
		
		lettersguessedsofar += guessedletter;
		$('#letters-tried-so-far').text(lettersguessedsofar);
		
		var matched = false;
		
		var solvableletters = $('.solvable-letter');
		
		for(var i = 0; i < solvableletters.length; i++) {
			var solvableletter = solvableletters[i];
			var solvablelettervalue = $(solvableletter).attr('data-letter');
			if(solvablelettervalue == guessedletter) {
				$(solvableletter).html('<u>&nbsp;&nbsp;' + guessedletter + '&nbsp;&nbsp;</u>');
				$(solvableletter).attr('data-solved', true);
				matched = true;
				solvableletters[i] = solvableletter;
			}
		}
		
		if(!matched) {
			var phase = parseInt($(this).attr('data-guess'), 10);
			phase++;
			$('#image').attr('src', '/image/full-lunar-eclipse-progression-phase-' + phase + '.jpg');
			$(this).attr('data-guess', phase);
			if(phase == 8) {
				for(var i = 0; i < solvableletters.length; i++) {
					var solvableletter = solvableletters[i];
					$(solvableletter).html('<u>&nbsp;&nbsp;' + $(solvableletter).attr('data-letter') + '&nbsp;&nbsp;</u>');
				}
				
				$('#guess').attr('disabled', true);
				$('#solution-answer').attr('disabled', true);
				$('#message').html('Game Over!  <a href="">Try again?</a>');
			}
		} else {
			var winner = true;
			
			for(var i = 0; i < solvableletters.length; i++) {
				var solvableletter = solvableletters[i];
				
				if($(solvableletter).attr('data-solved') != 'true') {
					winner = false;
					i = solvableletters.letter;
				}
			}
			
			if(winner) {		// Cuz I'm a Winner!!!!!!!!!
				$('#guess').attr('disabled', true);
				$('#solution-answer').attr('disabled', true);
				$('#message').html('You Win!  <a href="">Try again?</a>');
			}
		}
	}	
};

$('#guess').click(guessclick);