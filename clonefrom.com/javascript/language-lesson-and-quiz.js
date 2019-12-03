$(document).ready(function(event){
	function showSearch(searchterm) {
		$('#gsc-i-id1').val(searchterm);
		$('#gsc-i-id1').hide();
		$('.gsc-search-button').click();
		$('#gsc-i-id1').val('');
		$('#gsc-i-id1').show();
	}
	
	var lastsearchterm = '';
	
	$('.learn-phrase').click(function(e) {
		var wordid = $(this).attr('id');
		wordid = wordid.replace('nonenglish', 'english');
		var wordid = wordid + '-word';
		var word = $('#' + wordid).val();
		
		searchterm = word;
		
		var wordextraid = wordid + '-extra';
		var extrawords = $('#' + wordextraid);
		
		if(extrawords)
		{
			extrawordvalue = $(extrawords).val();
			if(extrawordvalue)
			{
				searchterm += ' ' + $(extrawords).val();
			}
		}
		
		if(word != lastsearchterm || $('.gs-image :visible').length == 0)	// Don't search the same thing twice in a row.  Unless there's nothing to show currently.
		{
			showSearch(searchterm);
		}
		
		lastsearchterm = word;
	});
	
	var quizquestions = [];
	var quizquestionsextrasearchterms = [];
	var questionindex = 0;
	
	var timeout;
	var delay = 5000;	// 5 seconds
	
	$('.choose-answer').click(function(e) {
		if($(this).prop('disabled')) {
			return false;
		}
		
		var answerid = 'listen-to-phrase-nonenglish-' + $(this).prop('id').replace('choose-phrase-nonenglish-', '') + '-english-translation';
		var givenanswer = $('#' + answerid).val();
		
		var rightanswer = quizquestions[questionindex];
		
		if(rightanswer == givenanswer)
		{
			$('#error-message').html('Correct!');
			$('#message-container').css('background-color','#00CC00');
			questionindex++;
			if(quizquestions.length < (questionindex + 1))
			{
				$('.choose-answer').prop('disabled', true);
				$('#start-quiz').prop('disabled', false);
				$('.gsc-clear-button').click();
				if(timeout) {
					clearTimeout(timeout);
				}
				timeout = setTimeout(function() {
					$('#answer-results-container').hide();
				}, delay);
			}
			else
			{
				quizquestion = quizquestions[questionindex];
				$('#current-question-number').html(questionindex + 1);
				
				searchterm = quizquestion;
				
				if(quizquestionsextrasearchterms[questionindex])
				{	
					quizquestionextra = quizquestionsextrasearchterms[questionindex];
					searchterm +=  ' ' + quizquestionextra;
				}
				
				showSearch(searchterm);
			}
		}
		else
		{
			$('#error-message').html('Incorrect.');
			$('#message-container').css('background-color','#FF0000');
		}
	});
	
	$('.choose-answer').prop('disabled', true);
	$('#start-quiz').prop('disabled', false);
	$('#start-quiz').click(function(e) {
		if(timeout) {
			clearTimeout(timeout);
		}
		$('#answer-results-container').hide();
		$(this).prop('disabled', true);
		$('.choose-answer').prop('disabled', false);
		
		questionindex = 0;
		quizquestionelements = $('.quiz-question');
		
		for(i = 0; i < quizquestionelements.length; i++)
		{
			quizquestionelement = quizquestionelements[i];
			quizquestions[i] = $(quizquestionelement).val();
			
			fullquizquestionid = $(quizquestionelement).prop('id').replace('quiz-question-', '');
			quizquestionextra = $('#quiz-question-extra-' + fullquizquestionid);
			if(quizquestionextra)
			{
				extrasearchvalue = $(quizquestionextra).val();
				
				if(extrasearchvalue)
				{
					quizquestionsextrasearchterms[i] = extrasearchvalue;
				}
			}
		}
		
		$('#total-question-count').html(quizquestions.length);
		$('#current-question-number').html('1');
		
		var searchterm = quizquestions[0];
		
		if(quizquestionsextrasearchterms[0])
		{
			searchterm += ' ' + quizquestionsextrasearchterms[0];
		}
		
		showSearch(searchterm);
		$('#message-container').css('background-color','#FFFFFF');
		$('#answer-results-container').show();
		$('#error-message').html('Select the Answers When You are Ready');
	});
});