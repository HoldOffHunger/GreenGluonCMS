$(document).ready(function(event){
	var timeout;
	var delay = 1000;	// 1 seconds
	$('.input-area').keyup(function(e) {
		$('#status-text').text(processingText());
		if(timeout) {
			clearTimeout(timeout);
		}
		timeout = setTimeout(function() {
			findKeywords();
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
	
	$('.find-keywords-button').click(function(e) {
		findKeywords();
	});
	
	$('.strip-html').click(function(e) {
		findKeywords();
	});
	
	$('.ignore-common-words').click(function(e) {
		findKeywords();
	});
	
	$('.include-phrases').click(function(e) {
		findKeywords();
	});
	
	$('.show-counts').click(function(e) {
		findKeywords();
	});
	
	$('#sort-order').change(function(e) {
		findKeywords();
	});
	
	function processingText() {
		return 'lavorazione';
	}
	
	function waitingForUserText() {
		return 'In attesa di utente';
	}
	
	function getIgnoreKeywords() {
		var ignorekeywords = [
			'.',
			'!',
			'?',
			',',
			':',
			';',
			'un',
			'di',
			'anche',
			'tra',
			'un',
			'e',
			'qualsiasi',
			'siamo',
			'come',
			'a',
			'essere',
			'perché',
			'stato',
			'prima',
			'essere',
			'al di là',
			'ma',
			'di',
			'può',
			'non puo',
			'venire',
			'venuta',
			'poteva',
			'non poteva',
			'fatto',
			'fare',
			'fa',
			'fare',
			'fatto',
			'giù',
			'pochi',
			'per',
			'da parte di',
			'andare',
			'aveva',
			'ha',
			'avere',
			'avere',
			'lui',
			'sua',
			'lui',
			'il suo',
			'come',
			'però',
			'io',
			'in',
			'in',
			'se',
			'è',
			'it',
			'lasciare',
			'lascia',
			'piace',
			'piace',
			'sapere',
			'di',
			'fatto',
			'me',
			'mio',
			'nessuno dei due',
			'no',
			'non',
			'off',
			'di frequente',
			'sopra',
			'uno',
			'quelli',
			'una volta',
			'solo',
			'o',
			'nostro',
			'proprio',
			'mettere',
			'piuttosto',
			'disse',
			'così',
			'presto',
			'alcuni',
			'ancora',
			'sicuro',
			'certamente',
			'prende',
			'di',
			'quella',
			'il',
			'loro',
			'loro',
			'poi',
			'là',
			'perciò',
			'queste',
			'essi',
			'cosa',
			'questo',
			'quelli',
			'anche se',
			'a',
			'su',
			'su',
			'noi',
			'era',
			'noi',
			'bene',
			'che cosa',
			'quando',
			'dove',
			'quale',
			'chi',
			'di chi',
			'perché',
			'volere',
			'con',
			'senza',
			'avrebbe',
			'tu',
		];
		
		return ignorekeywords;
	}
	
	function getIgnoreKeywordsHash() {
		var ignorekeywords = getIgnoreKeywords();
		var ignorekeywordshash = {};
		
		for(i = 0; i < ignorekeywords.length; i++)
		{
			ignorekeywordshash[ignorekeywords[i]] = 1;
		}
		
		return ignorekeywordshash;
	}
	
	function getInputWords() {
		var inputtext = $('.input-area').val();
		
		if($('.strip-html').is(':checked'))
		{
			inputtext = $("<div/>").html(inputtext).text();
		}
		
		inputtext = inputtext.replace(/\t/gi, " ");
		inputtext = inputtext.replace(/\n/gi, " ");
		inputtext = inputtext.replace(/\r/gi, " ");
		inputtext = inputtext.replace(/,/gi, " ");
		inputtext = inputtext.replace(/!/gi, " ");
		inputtext = inputtext.replace(/;/gi, " ");
		inputtext = inputtext.replace(/:/gi, " ");
		inputtext = inputtext.replace(/’/gi, "'");
		inputtext = inputtext.replace(/\"/gi, " ");
		inputtext = inputtext.replace(/\?/gi, " ");
		inputtext = inputtext.replace(/\./gi, " ");
		inputtext = inputtext.replace(/\(/gi, " ");
		inputtext = inputtext.replace(/\)/gi, " ");
		inputtext = inputtext.replace(/\[/gi, " ");
		inputtext = inputtext.replace(/\]/gi, " ");
		
		var inputwords = inputtext.toLowerCase().split(' ');
		
		var realinputwords = [];
		var inputwordscount = inputwords.length;
		
		for(i = 0; i < inputwordscount; i++)
		{
			var inputword = $.trim(inputwords[i]);
			if(inputword)
			{
				realinputwords.push(inputword);
			}
		}
		
		inputwords = realinputwords;
		
		return inputwords;
	}
	
	function getSkipWords() {
		var skipwords = {};
		
		if($('.ignore-common-words').is(':checked'))
		{
			skipwords = getIgnoreKeywordsHash();
		}
		
		return skipwords;
	}
	
	function findKeywordPhrases(args) {
		var inputwords = args['inputwords'];
		var inputwordscount = args['inputwordscount'];
		var skipwords = args['skipwords'];
		
		var finaloutput = '';
		
		if($('.include-phrases').is(':checked'))
		{
				// Six-Word Phrases
			var sixwordphrases = getSixWordPhraseCounts(args);
			var sixwordphrasessorted = sortKeywords({wordcounts:sixwordphrases});
			var sixwordphrasetext = displayKeywords({keywords:sixwordphrasessorted});
			
			if(sixwordphrasetext)
			{
				finaloutput += sixwordphrasetext + "\n\n";
			}
			
				// Five-Word Phrases
			var fivewordphrases = getFiveWordPhraseCounts(args);
			var fivewordphrasessorted = sortKeywords({wordcounts:fivewordphrases});
			var fivewordphrasetext = displayKeywords({keywords:fivewordphrasessorted});
			
			if(fivewordphrasetext)
			{
				finaloutput += fivewordphrasetext + "\n\n";
			}
			
				// Four-Word Phrases
			var fourwordphrases = getFourWordPhraseCounts(args);
			var fourwordphrasessorted = sortKeywords({wordcounts:fourwordphrases});
			var fourwordphrasetext = displayKeywords({keywords:fourwordphrasessorted});
			
			if(fourwordphrasetext)
			{
				finaloutput += fourwordphrasetext + "\n\n";
			}
			
				// Three-Word Phrases
			var threewordphrases = getThreeWordPhraseCounts(args);
			var threewordphrasessorted = sortKeywords({wordcounts:threewordphrases});
			var threewordphrasetext = displayKeywords({keywords:threewordphrasessorted});
			
			if(threewordphrasetext)
			{
				finaloutput += threewordphrasetext + "\n\n";
			}
			
				// Two-Word Phrases
			var twowordphrases = getTwoWordPhraseCounts(args);
			var twowordphrasessorted = sortKeywords({wordcounts:twowordphrases});
			var twowordphrasetext = displayKeywords({keywords:twowordphrasessorted});
			
			if(twowordphrasetext)
			{
				finaloutput += twowordphrasetext + "\n\n";
			}
		}
		
		return finaloutput;
	}
	
	function getTwoWordPhraseCounts(args) {
		var inputwords = args['inputwords'];
		var inputwordscount = args['inputwordscount'];
		var skipwords = args['skipwords'];
		
		var twowordphrases = {};
		
		for(i = 0; i - 1 < inputwordscount; i++)
		{
			var currentword = $.trim(inputwords[i]);
			var nextword = $.trim(inputwords[i + 1]);
			if(currentword && nextword)
			{
				if(!skipwords[currentword] && !skipwords[nextword])
				{
					var phrase = currentword + ' ' + nextword;
					if(twowordphrases[phrase])
					{
						twowordphrases[phrase]++;
					}
					else
					{
						twowordphrases[phrase] = 1;
					}
				}
			}
		}
		
		return twowordphrases;
	}
	
	function getThreeWordPhraseCounts(args) {
		var inputwords = args['inputwords'];
		var inputwordscount = args['inputwordscount'];
		var skipwords = args['skipwords'];
		
		var threewordphrases = {};
		
		for(i = 0; i - 2 < inputwordscount; i++)
		{
			var currentword = $.trim(inputwords[i]);
			var nextword = $.trim(inputwords[i + 1]);
			var thirdword = $.trim(inputwords[i + 2]);
			if(currentword && nextword && thirdword)
			{
				if(
					(!skipwords[currentword] && !skipwords[nextword]) ||
					(!skipwords[currentword] && !skipwords[thirdword]) ||
					(!skipwords[nextword] && !skipwords[thirdword])
				)
				{
					var phrase = currentword + ' ' + nextword + ' ' + thirdword;
					if(threewordphrases[phrase])
					{
						threewordphrases[phrase]++;
					}
					else
					{
						threewordphrases[phrase] = 1;
					}
				}
			}
		}
		
		return threewordphrases;
	}
	
	function getFourWordPhraseCounts(args) {
		var inputwords = args['inputwords'];
		var inputwordscount = args['inputwordscount'];
		var skipwords = args['skipwords'];
		
		var fourwordphrases = {};
		
		for(i = 0; i - 2 < inputwordscount; i++)
		{
			var currentword = $.trim(inputwords[i]);
			var nextword = $.trim(inputwords[i + 1]);
			var thirdword = $.trim(inputwords[i + 2]);
			var fourthword = $.trim(inputwords[i + 3]);
			if(currentword && nextword && thirdword && fourthword)
			{
				if(
					(!skipwords[currentword] && !skipwords[nextword]) ||
					(!skipwords[currentword] && !skipwords[thirdword]) ||
					(!skipwords[currentword] && !skipwords[fourthword]) ||
					(!skipwords[nextword] && !skipwords[thirdword]) ||
					(!skipwords[nextword] && !skipwords[fourthword]) ||
					(!skipwords[thirdword] && !skipwords[fourthword])
				)
				{
					var phrase = currentword + ' ' + nextword + ' ' + thirdword + ' ' + fourthword;
					if(fourwordphrases[phrase])
					{
						fourwordphrases[phrase]++;
					}
					else
					{
						fourwordphrases[phrase] = 1;
					}
				}
			}
		}
		
		return fourwordphrases;
	}
	
	function getFiveWordPhraseCounts(args) {
		var inputwords = args['inputwords'];
		var inputwordscount = args['inputwordscount'];
		var skipwords = args['skipwords'];
		
		var fivewordphrases = {};
		
		for(i = 0; i - 2 < inputwordscount; i++)
		{
			var currentword = $.trim(inputwords[i]);
			var nextword = $.trim(inputwords[i + 1]);
			var thirdword = $.trim(inputwords[i + 2]);
			var fourthword = $.trim(inputwords[i + 3]);
			var fifthword = $.trim(inputwords[i + 4]);
			if(currentword && nextword && thirdword && fourthword && fifthword)
			{
				if(
					(!skipwords[currentword] && !skipwords[nextword]) ||
					(!skipwords[currentword] && !skipwords[thirdword]) ||
					(!skipwords[currentword] && !skipwords[fourthword]) ||
					(!skipwords[currentword] && !skipwords[fifthword]) ||
					(!skipwords[nextword] && !skipwords[thirdword]) ||
					(!skipwords[nextword] && !skipwords[fourthword]) ||
					(!skipwords[nextword] && !skipwords[fifthword]) ||
					(!skipwords[thirdword] && !skipwords[fourthword]) ||
					(!skipwords[thirdword] && !skipwords[fifthword]) ||
					(!skipwords[fourthword] && !skipwords[fifthword])
				)
				{
					var phrase = currentword + ' ' + nextword + ' ' + thirdword + ' ' + fourthword + ' ' + fifthword;
					if(fivewordphrases[phrase])
					{
						fivewordphrases[phrase]++;
					}
					else
					{
						fivewordphrases[phrase] = 1;
					}
				}
			}
		}
		
		return fivewordphrases;
	}
	
	function getSixWordPhraseCounts(args) {
		var inputwords = args['inputwords'];
		var inputwordscount = args['inputwordscount'];
		var skipwords = args['skipwords'];
		
		var sixwordphrases = {};
		
		for(i = 0; i - 2 < inputwordscount; i++)
		{
			var currentword = $.trim(inputwords[i]);
			var nextword = $.trim(inputwords[i + 1]);
			var thirdword = $.trim(inputwords[i + 2]);
			var fourthword = $.trim(inputwords[i + 3]);
			var fifthword = $.trim(inputwords[i + 4]);
			var sixthword = $.trim(inputwords[i + 5]);
			if(currentword && nextword && thirdword && fourthword && fifthword && sixthword)
			{
				if(
					(!skipwords[currentword] && !skipwords[nextword]) ||
					(!skipwords[currentword] && !skipwords[thirdword]) ||
					(!skipwords[currentword] && !skipwords[fourthword]) ||
					(!skipwords[currentword] && !skipwords[fifthword]) ||
					(!skipwords[currentword] && !skipwords[sixthword]) ||
					(!skipwords[nextword] && !skipwords[thirdword]) ||
					(!skipwords[nextword] && !skipwords[fourthword]) ||
					(!skipwords[nextword] && !skipwords[fifthword]) ||
					(!skipwords[nextword] && !skipwords[sixthword]) ||
					(!skipwords[thirdword] && !skipwords[fourthword]) ||
					(!skipwords[thirdword] && !skipwords[fifthword]) ||
					(!skipwords[thirdword] && !skipwords[sixthword]) ||
					(!skipwords[fourthword] && !skipwords[fifthword]) ||
					(!skipwords[fourthword] && !skipwords[sixthword]) ||
					(!skipwords[fifthword] && !skipwords[sixthword])
				)
				{
					var phrase = currentword + ' ' + nextword + ' ' + thirdword + ' ' + fourthword + ' ' + fifthword + ' ' + sixthword;
					if(sixwordphrases[phrase])
					{
						sixwordphrases[phrase]++;
					}
					else
					{
						sixwordphrases[phrase] = 1;
					}
				}
			}
		}
		
		return sixwordphrases;
	}
	
	function getSingleKeywordCounts(args) {
		words = args['words'];
		wordcount = args['wordcount'];
		skipwords = args['skipwords'];
		
		var wordcounts = {};
		
		for(i = 0; i < wordcount; i++)
		{
			var inputword = $.trim(words[i]);
			
			if(inputword)
			{
				if(!skipwords[inputword])
				{
					if(wordcounts[inputword])
					{
						wordcounts[inputword]++;
					}
					else
					{
						wordcounts[inputword] = 1;
					}
				}
			}
		}
		
		return wordcounts;
	}
	
	function sortKeywords(args) {
		var wordcounts = args['wordcounts'];
		var wordcountkeys = Object.keys(wordcounts);
		var wordcountkeyscount = wordcountkeys.length;
		
		var wordcountsbynumber = [];
		
		for(i = 0; i < wordcountkeyscount; i++)
		{
			wordcountkey = wordcountkeys[i];
			wordcount = wordcounts[wordcountkey];
			if(!wordcountkey.match(' ') || wordcount > 1)
			{
				wordcountsbynumber.push({
					'key':wordcountkey,
					'value':wordcount,
				});
			}
		}
		
		if($('#sort-order').val() == 'most-common-to-least-common')
		{
			wordcountsbynumber = wordcountsbynumber.sort(function(b, a) {
				return a.value -  b.value;
			});
		}
		else if($('#sort-order').val() == 'least-common-to-most-common')
		{
			wordcountsbynumber = wordcountsbynumber.sort(function(a, b) {
				return a.value - b.value;
			});
		}
		
		return wordcountsbynumber;
	}
	
	function displayKeywords(args) {
		var keywords = args['keywords'];
		
		var count = 0;
		var output = '';
		
		$.each(keywords, function(key, value) {
			output += value['key'];
			
			if($('#show-counts').is(':checked'))
			{
				output += ' -- ' + value['value'];
			}
			
			count++;
			
			if(count != keywords.length)
			{
				output += "\n";
			}
		});
		
		return output;
	}
	
	function findKeywords() {
		var skipwords = getSkipWords();
		var inputwords = getInputWords();
		var inputwordscount = inputwords.length;

		var finaloutput = '';
		
		finaloutput = findKeywordPhrases({inputwords:inputwords, inputwordscount:inputwordscount, skipwords:skipwords});
		
		var wordcounts = getSingleKeywordCounts({wordcount:inputwordscount, words:inputwords, skipwords:skipwords});
		
		var wordcountsbynumber = sortKeywords({wordcounts:wordcounts});
		finaloutput += displayKeywords({keywords:wordcountsbynumber});
		
		$('.output-area').val(finaloutput);
		$('.output-area').change();
		$('#status-text').text(waitingForUserText());
	}
});