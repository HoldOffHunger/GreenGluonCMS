$(document).ready(function(event){
					// Globals
					// ---------------------------------------------------------
					// ---------------------------------------------------------
					// ---------------------------------------------------------
			
		/* getTimeOutDelay()
		
			Get the delay of the timeout for typing.
		
		*/
			
	function getTimeOutDelay() {
		return 1000;	// 1 seconds
	}
	
		/* processingText()
			
			Get the text to display when the misspelling list generator is thinking.
			
		*/
	
	function processingText() {
		return 'Processing';
	}
	
		/* waitingForUserText()
		
			Get the text to display when the misspelling list generator is waiting.
		
		*/
	
	function waitingForUserText() {
		return 'Waiting for User';
	}
	
		/* getResultSeparator()
		
			Get the text that separates a misspelling from another result.
		
		*/
		
	function getResultSeparator() {
		return "\n";
	}
	
		/* getResultSectionSeparator()
		
			Get the text that separates a result section from other sections.
		
		*/
		
	function getResultSectionSeparator() {
		return "\n\n";
	}

					// Event and Element Handlers
					// ---------------------------------------------------------
					// ---------------------------------------------------------
					// ---------------------------------------------------------
		
		/* $('.input-area').keyup(function(e) {...})
		
			Run spellCheck() only after so much time has delayed from keyup movements.
		
		*/
		
	var timeout = false;
	
	$('.input-area').keyup(function(e) {
		$('#status-text').text(processingText());
		if(timeout) {
			clearTimeout(timeout);
		}
		timeout = setTimeout(function() {
			spellCheck();
		}, getTimeOutDelay());
		return true;
	});
	
		/* $('.input-area').click(function(e) {...})
		
			Clear the input area of its default instruction set when input area is clicked.
		
		*/
	
	$('.input-area').click(function(e) {
		return initiateApp();
	});
	
		/* $('.function-button').click(function(e) {...})
		
			User clicked the "Find Errors" button.
			
			Regenerate the errors list.
		
		*/
	
	$('#function-button').click(function(e) {
		return spellCheck();
	});
	
		/* $('.strip-html').click(function(e) {...})
		
			User changed the option of stripping HTML from the input.
			
			Regenerate the error list.
		
		*/
	
	$('.strip-html').click(function(e) {
		return spellCheck();
	});
	
		/* initiateApp()
		
			Clear the input area of its default instruction set.
			
			Bound to many event handlers.
		
		*/
		
	var started = false;
	
	function initiateApp() {
		if(!started) {
			$('.input-area').val('');
			started = true;
		}
		
		return true;
	}
					// Application
					// ---------------------------------------------------------
					// ---------------------------------------------------------
					// ---------------------------------------------------------

function onlyUnique(value, index, self) { 
    return self.indexOf(value) === index;
}

	function spellCheck() {
		const errors = getSpellCheckErrors();
		displayErrors({'errors':errors});
		$('#status-text').text(waitingForUserText());
		return true;
	}
	
	function getSpellCheckErrors() {
		var input = cleanupInput();
		words.sort(function(a, b){		// guarantee that "19OO" is listed as first problem before "19O" is!
		  // ASC  -> a.length - b.length
		  // DESC -> b.length - a.length
		  return b.length - a.length;
		});
		//for(i = 0; i < words.length; i++) {
		//	words[i] = '\\b' + words[i] + '\\b';	// double-escaped backslashes, because bullshit
		//}
		const wordregex = new RegExp(words.join('|'));
		const errors = input.match(new RegExp(words.join('|'), 'gi'));
	//	const errors = input.match(new RegExp('/\bah\b/', 'gi'));
		
		
		console.log("BT: ERRORS!");
		console.log("BT: INPUT!" + input + "|");
		console.log(errors);
		if(!errors) {
			return [];
		}
		
		const realerrors = getRealErrors({'errors':errors, 'input':input});
		
		return realerrors;
	}
	
	function getRealErrors(args) {
		const errors = args.errors.filter(onlyUnique);
		const input = args.input;
		
		console.log("BT: REAL ERRORS TO DETECT???");
		console.log(errors);
		
		for(i = 0; i < errors.length; i++) {
			errors[i] = '\\b' + errors[i] + '\\b';
		}
		
		const realerrors = input.match(new RegExp(errors.join('|'), 'gi')).filter(onlyUnique);
		
		if(!realerrors) {
			return [];
		}
		
		return realerrors;
	}
	
	function displayErrors(args) {
		$('#output-area').val(args.errors.join(getResultSeparator()));
		return true;
	}
	
		/* cleanupInput(args)
			
			Cleanup the input from the user.
			
		*/
	
	function cleanupInput() {
		var inputtext = $('.input-area').val();
		var input = formatInput({'input':inputtext});
		
		return input;
	}
	
		/* formatInput(args)
		
			Format the input from the user.
			
			Specifically, lowercase and, if necessary, strip HTML.
		
		*/
	
	function formatInput(args) {
		var input = args.input;
		
		input = input.toLowerCase();
		
		if($('.strip-html').is(':checked')) {
			input = $('<div/>').html(input).text();
		}
		
		return input;
	}
});