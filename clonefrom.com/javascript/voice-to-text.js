$(document).ready(function(event){

	 	// Languages
	 	// -----------------------------------
	 	
	var langs =
	[['Afrikaans',       ['af-ZA']],
	 ['Bahasa Indonesia',['id-ID']],
	 ['Bahasa Melayu',   ['ms-MY']],
	 ['Català',          ['ca-ES']],
	 ['Čeština',         ['cs-CZ']],
	 ['Dansk',           ['da-DK']],
	 ['Deutsch',         ['de-DE']],
	 ['English',         ['en-AU', 'Australia'],
	                     ['en-CA', 'Canada'],
	                     ['en-IN', 'India'],
	                     ['en-NZ', 'New Zealand'],
	                     ['en-ZA', 'South Africa'],
	                     ['en-GB', 'United Kingdom'],
	                     ['en-US', 'United States']],
	 ['Español',         ['es-AR', 'Argentina'],
	                     ['es-BO', 'Bolivia'],
	                     ['es-CL', 'Chile'],
	                     ['es-CO', 'Colombia'],
	                     ['es-CR', 'Costa Rica'],
	                     ['es-EC', 'Ecuador'],
	                     ['es-SV', 'El Salvador'],
	                     ['es-ES', 'España'],
	                     ['es-US', 'Estados Unidos'],
	                     ['es-GT', 'Guatemala'],
	                     ['es-HN', 'Honduras'],
	                     ['es-MX', 'México'],
	                     ['es-NI', 'Nicaragua'],
	                     ['es-PA', 'Panamá'],
	                     ['es-PY', 'Paraguay'],
	                     ['es-PE', 'Perú'],
	                     ['es-PR', 'Puerto Rico'],
	                     ['es-DO', 'República Dominicana'],
	                     ['es-UY', 'Uruguay'],
	                     ['es-VE', 'Venezuela']],
	 ['Euskara',         ['eu-ES']],
	 ['Filipino',        ['fil-PH']],
	 ['Français',        ['fr-FR']],
	 ['Galego',          ['gl-ES']],
	 ['Hrvatski',        ['hr_HR']],
	 ['IsiZulu',         ['zu-ZA']],
	 ['Íslenska',        ['is-IS']],
	 ['Italiano',        ['it-IT', 'Italia'],
	                     ['it-CH', 'Svizzera']],
	 ['Lietuvių',        ['lt-LT']],
	 ['Magyar',          ['hu-HU']],
	 ['Nederlands',      ['nl-NL']],
	 ['Norsk bokmål',    ['nb-NO']],
	 ['Polski',          ['pl-PL']],
	 ['Português',       ['pt-BR', 'Brasil'],
	                     ['pt-PT', 'Portugal']],
	 ['Română',          ['ro-RO']],
	 ['Slovenščina',     ['sl-SI']],
	 ['Slovenčina',      ['sk-SK']],
	 ['Suomi',           ['fi-FI']],
	 ['Svenska',         ['sv-SE']],
	 ['Tiếng Việt',      ['vi-VN']],
	 ['Türkçe',          ['tr-TR']],
	 ['Ελληνικά',        ['el-GR']],
	 ['български',       ['bg-BG']],
	 ['Pусский',         ['ru-RU']],
	 ['Српски',          ['sr-RS']],
	 ['Українська',      ['uk-UA']],
	 ['한국어',            ['ko-KR']],
	 ['中文',             ['cmn-Hans-CN', '普通话 (中国大陆)'],
	                     ['cmn-Hans-HK', '普通话 (香港)'],
	                     ['cmn-Hant-TW', '中文 (台灣)'],
	                     ['yue-Hant-HK', '粵語 (香港)']],
	 ['日本語',           ['ja-JP']],
	 ['हिन्दी',            ['hi-IN']],
	 ['ภาษาไทย',         ['th-TH']]];
	 
	 /*
		'en'=>'English',			en-US
		'es'=>'Spanish',			es-MX
		'fr'=>'French',				fr-FR
		'it'=>'Italian',			it-IT
		'de'=>'German',				de-DE
		'ja'=>'Japanese',			ja-JP
		'ko'=>'Korean',				ko-KR
		'zh'=>'Chinese',			cmn-Hans-CN
		'hi'=>'Hindi',				hi-IN
		'id'=>'Indonesian',			id-ID
		'nl'=>'Dutch',				nl-NL
		'pl'=>'Polish',				pl-PL
		'pt'=>'Portuguese',			pt-BR
		'ru'=>'Russian',			ru-RU
	 */

	 	// Implementation
	 	// -----------------------------------
	
	var recognition = false;
	var recognizing = false;
	var final_transcript = '';
	var currentlanguage = $('#language-name').val();
	
	$('#speak-button').click(function(e) {
		if(!checkBrowserForCompatibleVersion())
	 	{
	 		return false;
	 	}
	 	else
	 	{
	 		setupRecognition();
	 	}
	 	
	 	var buttontext = $(this).val();
	 	
	 	if(buttontext == 'Speak')
	 	{
			if(recognizing)
			{
				recognition.stop();
				$('#recording-indicator').hide();
				return false;
			}
	 		$(this).val('Stop Recording');
	 		applyLanguageTypeToRecognition();
	 		recognition.start();
			$('#recording-indicator').css('display', 'inline-block');
	 	}
	 	else
	 	{
	 		$(this).val('Speak');
			recognition.stop();
			$('#recording-indicator').hide();
		}
		
		return true;
	});
	 
	function checkBrowserForCompatibleVersion(e) {
		if ('webkitSpeechRecognition' in window) {
			return true;
		}
		
 		$('#speak-button').val('Upgrade to Chrome to use this feature.');
		return false;
	}
	 
	var onRecognitionStart = function(e) {
		recognizing = true;
		$('#pronunciation-area').val('');
	};
	 
	var onRecognitionEnd = function(e) {
		recognizing = false;
		return checkForCorrectness();
	};
	
	function checkForCorrectness(e) {
		var matched = false;
		var word = $('#pronunciation-area').val();
		var matchedlessonword;
		var possiblematches = $('.pronounce-nonenglish-words-hidden');
		
		for(i = 0; i < possiblematches.length; i++) {
			var possiblematch = possiblematches[i];
			
			if($(possiblematch).val() == word)
			{
				matched = true;
				matchedlessonword = possiblematch;
				i = possiblematches.length;
			}
		}
		
		$('.pronounce-nonenglish-words-hidden').parent('div').css('background-color', '#FFFFFF');
		
		if(matched) {
			$(matchedlessonword).parent('div').css('background-color', '#00CC00');
			return true;
		}
		
		return false;
	}
	 
	var onRecognitionError = function(e) {
		console.log("Recognition Error Detected.");
	};
	 
	var onRecognitionResult = function(e) {
		var interim_transcript = '';
		for (var i = e.resultIndex; i < e.results.length; ++i) {
			if (e.results[i].isFinal) {
				newvalue = $('#pronunciation-area').val();
				if(newvalue) {
					newvalue += ' ';
				}
				newvalue += e.results[i][0].transcript;
				$('#pronunciation-area').val(newvalue);
				final_transcript += e.results[i][0].transcript;
				
				if(checkForCorrectness()) {
					recognition.stop();
					$('#recording-indicator').hide();
 					$('#speak-button').val('Speak');
				}
			} else {
				interim_transcript += e.results[i][0].transcript;
			}
		}
	};
	 
	function setupRecognition(e) {
	 	if(!recognition)
	 	{
	 		recognition = new webkitSpeechRecognition();
	 		
			recognition.continuous = true;
			recognition.interimResults = true;
	 		
	 		recognition.onstart = onRecognitionStart;
	 		recognition.onerror = onRecognitionError;
	 		recognition.onend = onRecognitionEnd;
	 		recognition.onresult = onRecognitionResult;
	 	}
	 	
	 	return recognition;
	}
	
	function populateAccents(e) {
		var accents = [];
 		switch(currentlanguage)
 		{
 			case 'english':
 				accents = [
					['en-AU', 'Australia'],
					['en-CA', 'Canada'],
					['en-IN', 'India'],
					['en-NZ', 'New Zealand'],
					['en-ZA', 'South Africa'],
					['en-GB', 'United Kingdom'],
					['en-US', 'United States'],
				];
 				break;
 			
 			case 'spanish':
 				accents = [
 					['es-AR', 'Argentina'],
					['es-BO', 'Bolivia'],
					['es-CL', 'Chile'],
					['es-CO', 'Colombia'],
					['es-CR', 'Costa Rica'],
					['es-EC', 'Ecuador'],
					['es-SV', 'El Salvador'],
					['es-ES', 'España'],
					['es-US', 'Estados Unidos'],
					['es-GT', 'Guatemala'],
					['es-HN', 'Honduras'],
					['es-MX', 'México'],
					['es-NI', 'Nicaragua'],
					['es-PA', 'Panamá'],
					['es-PY', 'Paraguay'],
					['es-PE', 'Perú'],
					['es-PR', 'Puerto Rico'],
					['es-DO', 'República Dominicana'],
					['es-UY', 'Uruguay'],
					['es-VE', 'Venezuela'],
 				];
 				break;
 				
 			case 'italian':
 				accents = [
					['it-IT', 'Italia'],
					['it-CH', 'Svizzera'],
				];
 				break;
 				
 			case 'chinese':
 				accents = [
					['cmn-Hans-CN', 'Mandarin (Mainland China) / 普通话 (中国大陆)'],
					['cmn-Hans-HK', 'Mandarin (Hong Kong) / 普通话 (香港)'],
					['cmn-Hant-TW', 'Chinese (Taiwan) / 中文 (台灣)'],
					['yue-Hant-HK', 'Cantonese (Hong Kong) / 粵語 (香港)'],
 				];
 				break;
 				
 			case 'portuguese':
 				accents = [
					['pt-BR', 'Brasil'],
					['pt-PT', 'Portugal'],
 				];
 				break;
 		}
 		
 		if(accents.length)
 		{
 			for(i = 0; i < accents.length; i++) {
 				var accent = accents[i];
 				
 				var code = accent[0];
 				var country = accent[1];
 				$('#language-accent-to-speak').append($('<option></option>')
					.attr('value', code)
					.text(country)); 
 			}
 			$('#accent-wrapper').show();
 		}
 		else
 		{
 			$('#accent-wrapper').remove();
 		}
	}
	 
	function applyLanguageTypeToRecognition(e) {
		if($('#language-accent-to-speak').prop('id')) {
			recognition.lang = $('#language-accent-to-speak').val();
		}
		else
		{
	 		switch(currentlanguage)
	 		{
	 			case 'english':
	 				recognition.lang = 'en-US';
	 				break;
	 			
	 			case 'spanish':
	 				recognition.lang = 'es-MX';
	 				break;
	 				
	 			case 'french':
	 				recognition.lang = 'fr-FR';
	 				break;
	 				
	 			case 'italian':
	 				recognition.lang = 'it-IT';
	 				break;
	 				
	 			case 'german':
	 				recognition.lang = 'de-DE';
	 				break;
	 				
	 			case 'japanese':
	 				recognition.lang = 'ja-JP';
	 				break;
	 				
	 			case 'korean':
	 				recognition.lang = 'ko-KR';
	 				break;
	 				
	 			case 'chinese':
	 				recognition.lang = 'cmn-Hans-CN';
	 				break;
	 				
	 			case 'hindi':
	 				recognition.lang = 'hi-IN';
	 				break;
	 				
	 			case 'indonesian':
	 				recognition.lang = 'id-ID';
	 				break;
	 				
	 			case 'dutch':
	 				recognition.lang = 'nl-NL';
	 				break;
	 				
	 			case 'polish':
	 				recognition.lang = 'pl-PL';
	 				break;
	 				
	 			case 'portuguese':
	 				recognition.lang = 'pt-BR';
	 				break;
	 				
	 			case 'russian':
	 				recognition.lang = 'ru-RU';
	 				break;
	 		}
 		}
 		
 		console.log("Accent Code : " + recognition.lang + ".");
 		
 		return recognition.lang;
 	}
 	
 	populateAccents();
});