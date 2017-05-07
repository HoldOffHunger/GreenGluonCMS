<?php

	class Grammar
	{
		public function AllValidPhrasesWithPeriods()
		{
			$all_valid_phrases_with_periods = $this->PhrasesWithPeriods();
			$valid_abbreviations = $this->SingleLetterAbbreviations();
			
			foreach($valid_abbreviations as $valid_abbreviation)
			{
				$all_valid_phrases_with_periods[] = $valid_abbreviation;
			}
			
			return $all_valid_phrases_with_periods;
		}
		
		public function SingleLetterAbbreviations()
		{
			return [
				'A.',
				'B.',
				'C.',
				'D.',
				'E.',
				'F.',
				'G.',
				'H.',
				'I.',
				'J.',
				'K.',
				'L.',
				'M.',
				'N.',
				'O.',
				'P.',
				'Q.',
				'R.',
				'S.',
				'T.',
				'U.',
				'V.',
				'W.',
				'X.',
				'Y.',
				'Z.',
			];
		}
		
		public function PhrasesWithPeriods()
		{
			return [
				'i.e.',
				'ex.',
				'Mr.',
				'Mrs.',
				'Mme.',
				'Msgrs.',
				'Mgr.',
				'St.',
				'p.',
				'pp.',
			];
		}
		
		public function Acronyms()
		{
			return [
				'abc',
				'cnt',
				'cnt-fai',
				'cntfai',
				'fai',
				'gpu',
				'iwma',
				'iww',
				'po',
				'usa',
				'ussr',
				'usss',
			];
		}
		
		public function InformativeAdverbs()
		{
			return [
				'boldly',
				'courageously',
				'culturally',
				'externally',
				'heroically',
				'hopefully',
				'internally',
				'logically',
				'naturally',
				'politically',
				'socially',
				'strategically',
				'supposedly',
				'theoretically',
				'today',
				'usually',
				'valiantly',
				'yesterday',
			];
		}
		
		public function InvalidWords()
		{
			return [
				'"',
				'\'',
				',',
				'!',
				'?',
			];
		}
		
		public function RomanNumerals()		# Currently: the first 100
		{
			return [
				'i',
				'ii',
				'iii',
				'iv',
				'v',
				'vi',
				'vii',
				'viii',
				'ix',
				'x',
				'xi',
				'xii',
				'xiii',
				'xiv',
				'xv',
				'xvi',
				'xvii',
				'xviii',
				'xix',
				'xx',
			];
		}
		
		public function SpelledOutNumbers()		# Currently: the first 100
		{
			return [
				'one',
				'two',
				'three',
				'four',
				'five',
				'six',
				'seven',
				'eight',
				'nine',
				'ten',
				'eleven',
				'twelve',
				'thirteen',
				'fourteen',
				'fifteen',
				'sixteen',
				'seventeen',
				'eighteen',
				'nineteen',
				'twenty',
			];
		}
		
		public function Numbers()		# Currently: the first 100
		{
			return [
				'0',
				'1',
				'2',
				'3',
				'4',
				'5',
				'6',
				'7',
				'8',
				'9',
			];
		}
		
		public function IrrelevantWords()
		{
			return [
				'a',
				'across',
				'actually',
				'aforesaid',
				'again',
				'alas',
				'all',
				'alone',
				'already',
				'also',
				'although',
				'among',
				'an',
				'anyway',
				'are',
				'as',
				'and',
				'another',
				'because',
				'besides',
				'briefly',
				'but',
				'by',
				'consequently',
				'contrary',
				'either',
				'essentially',
				'even',
				'every',
				'evidently',
				'first',
				'firstly',
				'footnote',
				'for',
				'fundamentally',
				'hence',
				'here',
				'however',
				'if',
				'in',
				'indeed',
				'instantly',
				'is',
				'it',
				'meanwhile',
				'nor',
				'note',
				'now',
				'of',
				'oft-mentioned',
				'often',
				'one',
				'only',
				'or',
				'ordinarily',
				'perhaps',
				'probably',
				'precisely',
				'quickly',
				'second',
				'secondly',
				'similarly',
				'simply',
				'since',
				'slowly',
				'so',
				'some',
				'somehow',
				'soon',
				'straightaway',
				'straightway',
				'such',
				'suddenly',
				'that',
				'the',
				'thee',
				'them',
				'then',
				'there',
				'therefore',
				'therein',
				'these',
				'they',
				'third',
				'thirdly',
				'this',
				'though',
				'thus',
				'too',
				'undoubtedly',
				'very',
				'well',
				'whatever',
				'whence',
				'where',
				'wherein',
				'wherever',
				'whether',
				'which',
				'while',
				'within',
				'whom',
				'whose',
				'yes',
				'yet',
				'your',
				'yours',
			];
		}
		
		public function IrrelevantPhrases()
		{
			return [
				'after all',
				'according to another version',
				'according to her',
				'according to him',
				'after which they gravely tell us',
				'after which they gravely told us',
				'after which they told us',
				'after which they tell us',
				'after which',
				'all the time',
				'all the',
				'apparent that the',
				'as long as our',
				'as long as the',
				'as long as',
				'assert that the',
				'assert that',
				'asserts that the',
				'asserts that',
				'at a',
				'at least',
				'at the same time',
				'back in',
				'before to whose',
				'before to',
				'between them',
				'both alleged that',
				'both asserted that',
				'but as long as the',
				'but as long as',
				'but little',
				'by itself',
				'called',
				'can do',
				'cherished superstition that',
				'cherished superstitions that',
				'claim that',
				'claim then that',
				'comes',
				'complete significance of',
				'consider all that',
				'consider also that',
				'contains much that',
				'contains much',
				'consider that',
				'consider then how',
				'consider then',
				'consider what a',
				'consider what the',
				'consider what',
				'consider yourself how',
				'consider yourself what',
				'consider yourself when',
				'consider yourself where',
				'consider yourself why',
				'consider yourself',
				'did it by',
				'did not you say',
				'didn\'t you say',
				'did you say',
				'do it by',
				'do you see how',
				'do you see',
				'don\'t you see how',
				'don\'t you see',
				'full significance of',
				'general view of',
				'general view that',
				'goes on',
				'have always claimed that the',
				'have always claimed that',
				'have claimed that the',
				'have claimed that',
				'hence our conclusion',
				'history has shown that',
				'history has shown',
				'history shows that',
				'history shows',
				'i am convinced that',
				'i am convinced',
				'i am deeply convinced that',
				'i am deeply convinced',
				'i care about',
				'i believe',
				'i believed',
				'i discover',
				'i discovered',
				'i know',
				'i learn that',
				'i learn',
				'i learned that',
				'i learned',
				'i maintain that',
				'i maintain',
				'i remember',
				'i said',
				'i say',
				'i think',
				'i thought',
				'importance of',
				'in actual application',
				'in actual practice',
				'in actual reality',
				'in application',
				'in between',
				'in certain of these',
				'in certain of those',
				'in fact',
				'in itself',
				'in most cases',
				'in order to',
				'in particular of these',
				'in particular of those',
				'in particular',
				'in practical application',
				'in practice',
				'in reality',
				'in the last analysis',
				'in these',
				'in this analysis',
				'in this sense',		# must be done first before "in this"
				'in this',
				'in those',
				'it follows that when',
				'it follows that',
				'it follows',
				'it seems that',
				'it seems',
				'just as',
				'just because',
				'just here',
				'just now',
				'just today',
				'just yesterday',
				'let us admit once for all',
				'let us admit',
				'let\'s admit that',
				'let\'s admit',
				'mest memorable of the',
				'most notable of the',
				'most noteworthy of the',
				'much that',
				'not only',
				'of itself',
				'of course',
				'on the contrary',
				'on the',
				'on those',
				'once this',
				'or another',
				'or other',
				'ordinarily called',
				'our answer to',
				'our answer to that',
				'profoundest sense',
				'remember that the',
				'remember that',
				'rumor that',
				'rumors that',
				'see how full',
				'see how',
				'see that the',
				'step in',
				'steps in',
				'successfully conducted',
				'successfully conducting',
				'such a happening',
				'superstition that',
				'superstitions that',
				'suppose that',
				'suppose the',
				'tell me',
				'thank god',
				'that means that',
				'that means',
				'they believe that',
				'they said',
				'they say',
				'they see that the',
				'they see that',
				'they tell me',
				'thing only',
				'to their left',
				'to their right',
				'to her left',
				'to her right',
				'to his left',
				'to his right',
				'to me',
				'to recognize this clearly',
				'to them',
				'to our comrades everywhere',
				'to our comrades',
				'to our friends everywhere',
				'to our friends',
				'to us',
				'total significance of',
				'underpinning many of his',
				'view that',
				'we all have known that',
				'we all have known',
				'we all know that',
				'we all know',
				'we are convinced that',
				'we are convinced',
				'we are firmly convinced that',
				'we are firmly convinced',
				'we can feel',
				'we can know',
				'we feel',
				'we have seen that',
				'we have seen',
				'we have',
				'we know that',
				'we know',
				'we must recognize that',
				'we must recognize',
				'what we hear',
				'with that',
				'with these',
				'with what',
				'worse even',
				'worse yet',
				'you can easily see that',
				'you can easily see then',
				'you can easily see',
				'you can readily understand',
				'you can see',
				'you can therefore see',
				'you did say',
				'you find that',
				'you find then',
				'you find',
				'you know',
				'you remember',
				'you say',
				'you see',
				'you think',
				'you thought',
				'you will always find that',
				'you will always find then',
				'you will always find',
			];
		}
		
			# InvalidWordsForDefinedWords() : Words to strip out of defined words if the definition starts or ends with them.
		public function InvalidWordsForDefinedWords()
		{
			$invalid_words = $this->InvalidWords();
			$roman_numerals = $this->RomanNumerals();
			$spelled_out_numbers = $this->SpelledOutNumbers();
			$numbers = $this->Numbers();
			$irrelevant_words = $this->IrrelevantWords();
			
			$all_invalid_words = [];
			
			foreach($invalid_words as $invalid_word)
			{
				$all_invalid_words[] = $invalid_word;
			}
			
			foreach($roman_numerals as $roman_numeral)
			{
				$all_invalid_words[] = $roman_numeral;
			}
			
			foreach($spelled_out_numbers as $spelled_out_number)
			{
				$all_invalid_words[] = $spelled_out_number;
			}
			
			foreach($numbers as $number)
			{
				$all_invalid_words[] = $number;
			}
			
			foreach($irrelevant_words as $irrelevant_word)
			{
				$all_invalid_words[] = $irrelevant_word;
			}
			
			return $all_invalid_words;
		}
		
			# DoSwapPhrasesConversion
		public function InformativePreOrPostPhrases()
		{
			return [
				'around this',
				'below this',
				'beneath this',
				'can religion do it?',
				'clearly',
				'considered collectively',
				'considered individually',
				'considered politically',
				'considered socially',
				'even within',
				'from the viewpoint of social usefulness',
				'on a score of fronts',
				'on a score of sides',
				'till this day',
				'till this very day',
				'underneath this',
				'until this day',
				'until this very day',
			];
		}
		
			# GetLastCancelWordsPhrasesResults
		public function UninformativePhrases()
		{
			return [
				'all of this',
				'all this',
				'as the custom',
				'between these',
				'both of these',
				'both of',
				'cannot be',
				'cannot do',
				'charge that',
				'he leads',
				'i do not mean that',
				'i do not think',
				'i don\'t mean that',
				'i don\'t think',
				'let\'s face it',
				'line between these',
				'line between',
				'neither of these',
				'neither of',
				'none of these',
				'none of',
				'of both',
				'on her',
				'on him',
				'our purpose here',
				'she leads',
				'something else',
				'to her',
				'to him',
				'to them',
				'what cannot be denied',
				'we deny that',
				'we have always denied',
				'we have always denied that',
				'we have denied that',
				'we are asked to believe that',
				'we are asked to believe ',
				'you are told',
				'you don\'t think',
			];
		}
		
			# GetInvalidDefinitionResults
		public function UninformativeDescriptions()
		{
			return [
				'a striking illustration of it',
				'above',
				'alleged',
				'arrives',
				'an illustration of it',
				'at the core of this conception',
				'below',
				'born',
				'called',
				'doing it',
				'equally false',
				'full of such examples',
				'here',
				'matter',
				'not the only one to have said this',
				'one of the means of doing it',
				'replete with such examples',
				'result',
				'the best recent illustration of it',
				'that',
				'this',
			];
		}
		
			# GetInvalidDefinedWordResults
		public function UninformativeDefinedWords()
		{
			return [
				'above',
				'actual reality',
				'among the former',
				'among the latter',
				'any kind',
				'at large',
				'below',
				'comparison',
				'contrast',
				'defined',
				'difference',
				'exception',
				'exception to the rule',
				'former',
				'great deal',
				'has been',
				'has done',
				'has not been',
				'has not done',
				'herein',
				'latter',
				'learning how to do',
				'little',
				'much',
				'neither',
				'negro',
				'none',
				'nothing',
				'on the contrary',
				'phrase',
				'position of the former',
				'position of the latter',
				'position of these former',
				'position of these latter',
				'principal object of this treatise',
				'question',
				'quite the contrary of this',
				'reality',
				'same',
				'suppose',
				'to this end',
				'type',
				'very little',
				'yet-it',
			];
		}
	}

?>