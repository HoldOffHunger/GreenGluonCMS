var languagecode;
var utterance = new SpeechSynthesisUtterance();

window.speechSynthesis.onvoiceschanged = function ()
{
	updateLanguage();
}

function updateLanguage() {
	voices = window.speechSynthesis.getVoices();
	for(i = 0; i < voices.length; i++)
	{
		voice = voices[i];
	//	console.log("BT: Voices.lang???" + voice.lang + "|");
		if(voice.lang == languagecode)
		{
			utterance.voice = voice;
			i = voices.length;
		}
	}
}

$(document).ready(function(event){
	$('.listen-to-phrase').on('click', function() {
		var id = $(this).attr('id');
		var wordid = id + '-word';
		var phrase = $('#' + wordid).val();
		
		var language = 'english';
		if(id.match('nonenglish'))
		{
			language = $('#language').val();
		}
		
		switch(language) {
			case 'chinese':
				languagecode = 'zh-CN';
				break;
				
			case 'english':
				languagecode = 'en-US';
				break;
			
			case 'dutch':
				languagecode = 'nl-NL';
				break;
			
			case 'french':
				languagecode = 'fr-FR';
				break;
			
			case 'german':
				languagecode = 'de-DE';
				break;
			
			case 'hindi':
				languagecode = 'hi-IN';
				break;
			
			case 'indonesian':
				languagecode = 'id-ID';
				break;
			
			case 'italian':
				languagecode = 'it-IT';
				break;
				
			case 'japanese':
				languagecode = 'ja-JP';
				break;
			
			case 'korean':
				languagecode = 'ko-KR';
				break;
			
			case 'polish':
				languagecode = 'pl-PL';
				break;
				
			case 'portuguese':
				languagecode = 'pt-BR';
				break;
			
			case 'russian':
				languagecode = 'ru-RU';
				break;
			
			case 'spanish':
				languagecode = 'es-US';
				break;
		}
		
		updateLanguage();
		
		var utterance = new SpeechSynthesisUtterance();
		utterance.text = phrase;
		window.speechSynthesis.speak(utterance);
	});
});