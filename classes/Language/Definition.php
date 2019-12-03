<?php
/*	
		#	RULES TO IMPLEMENT
		
	Neither Force Nor Absolute Sovereignty => "definition"
	Force "Not definition", Absolute Sovereignty "Not definition"
	https://www.revoltlib.com/people/gandhi/view.php?action=definitions

	Men In Whom The Sentiment Of Equality => 'born" (definition)
	https://www.revoltlib.com/anarchism/god-and-the-state/view.php?action=definitions
	
	Whom
	https://www.revoltlib.com/anarchism/integral-education-ii/view.php?action=definitions
	
	Passions Which Now Absorb Me
	https://www.revoltlib.com/anarchism/letter-from-bakunin-to-elisee-reclus,-feb-15,-1875/view.php?action=definitions
	
	Evils That The Worker [is] Subjected to by the division of labor are much easier to determine: forced to work for others because he is born to poverty and misery, deprived of all rational upbringing and 
	https://www.revoltlib.com/anarchism/revolutionary-catechism/view.php?action=definitions
	
	Slavery Will Last Until Capitalism [is] Overthrown by the collective action of the workers. 
	Slavery : Will Last Until Capitalism is Overthrown by the collective action of the workers. 
	https://www.revoltlib.com/anarchism/revolutionary-catechism/view.php?action=definitions
	
	
	Making You Believe That Capitalism [is] All right and by having you support the existing system with its government and 'law and order. 
	https://www.revoltlib.com/anarchism/now-and-after/view.php?action=definitions
	
	To Show Us How Capital [is] Formed, how it accumulates through interest, how interest enters into the price of products, how all laborers are themselves guilty of the sin of usury: we have long known all these things, just as we are convinced of the personal honesty of annuitants and proprietors. 
	
	https://www.revoltlib.com/anarchism/the-class-war/view.php#glossary
	"difference, but the injustice is not premeditated. " --> not seeing "Injustice: Not premeditated."

		# NEXT TO CHECK : Prison Memoirs of an Anarchist

*/
	
	class Definition
	{
						// TOC
						// ------------------------------------------------------------------------
				
		// Sections :
				
			// Primary Access Functions
			// Before-Start Prepare Functions
			// Find Definition Functions
			// Definition Validation Functions
			// After-End Prepare Functions
			// Sort Functions
			// English Grammar (Word Lists)
		
						// Construction
						// ------------------------------------------------------------------------
		
		public function __construct($args)
		{
			$this->grammar = $args['grammar'];
			$this->textcleanup = $args['textcleanup'];
		}
						
						// Primary Access Functions
						// ------------------------------------------------------------------------
						
		public function GetDefinitions($args)
		{
			if(!isset($args['text']))
			{
				return FALSE;
			}
			
			$text = $args['text'];
			
			$sentences = $this->textcleanup->PrepareSentences(['text'=>$text]);
			$definitions = $this->FindDefinitions(['sentences'=>$sentences]);
			$definitions = $this->textcleanup->UnescapeCommonFalsePositiveSentenceEnds(['definitions'=>$definitions]);
			$sorted_definitions = $this->SortDefinitions(['definitions'=>$definitions]);
			
			return $sorted_definitions;
		}
						
						// Find Definition Functions
						// ------------------------------------------------------------------------
		
		public function FindDefinitions($args)
		{
			$sentences = $args['sentences'];
			$sentence_count = count($sentences);
			
			$definitions = [];
			
			for($i = 0; $i < $sentence_count; $i++)
			{
				$sentence = $sentences[$i];
				$definition_results = $this->FindDefinition(['text'=>$sentence]);
				
				if($definition_results)
				{
					foreach($definition_results as $definition_result) {
						$word = $definition_result['word'];
						$definition = $definition_result['definition'];
						if(!$definitions[$word])
						{
							$definitions[$word] = [];
							$definitions[$word][] = $definition;
						#	print("BT: DEF" . $definition);
						}
						else
						{
							$found = 0;
							$definitions_count = count($definitions[$word]);
							for($j = 0; $j < $definitions_count; $j++)
							{
								$previous_definition = $definitions[$word][$j];
								if($previous_definition == $definition)
								{
									$found = 1;
									$j = $definitions_count;
								}
							}
							
							if(!$found)
							{
								$definitions[$word][] = $definition;
							}
						#	print("BT: !DEF" . $definition);
						}
					}
				}
			}
			
			return $definitions;
		}
		
		public function FindDefinition($args)
		{
			$text = $args['text'];
			
			$all_definition_results = [];
			
			$definition_separators = $this->DefinitionSeparators();
			$definition_separator_count = count($definition_separators);
			
			for($i = 0; $i < $definition_separator_count; $i++)
			{
				$definition_separator = $definition_separators[$i];
				$text_pieces = explode(' ' . $definition_separator . ' ', $text);
				$text_pieces_count = count($text_pieces);
				
				if($text_pieces_count > 1)
				{	
					$new_result = $this->FindDefinitionInPlace(['place'=>0, 'textpieces'=>$text_pieces, 'definitionseparator'=>$definition_separator]);
					
					if($new_result) {
						$all_definition_results[] = $new_result;
					}
				}
				
				if(!$definition_results && $text_pieces_count > 2)
				{
					$new_result = $this->FindDefinitionInPlace(['place'=>1, 'textpieces'=>$text_pieces, 'definitionseparator'=>$definition_separator]);
					
					if($new_result) {
						$all_definition_results[] = $new_result;
					}
				}
				
				if(!$definition_results && $text_pieces_count > 3)
				{
					$new_result = $this->FindDefinitionInPlace(['place'=>2, 'textpieces'=>$text_pieces, 'definitionseparator'=>$definition_separator]);
					
					if($new_result) {
						$all_definition_results[] = $new_result;
					}
				}
				
				if(!$definition_results && $text_pieces_count > 4)
				{
					$new_result = $this->FindDefinitionInPlace(['place'=>3, 'textpieces'=>$text_pieces, 'definitionseparator'=>$definition_separator]);
					
					if($new_result) {
						$all_definition_results[] = $new_result;
					}
				}
				
				if(!$definition_results && $text_pieces_count > 5)
				{
					$new_result = $this->FindDefinitionInPlace(['place'=>4, 'textpieces'=>$text_pieces, 'definitionseparator'=>$definition_separator]);
					
					if($new_result) {
						$all_definition_results[] = $new_result;
					}
				}
			}
			
			return $all_definition_results;
		}
		
		public function FindDefinitionInPlace($args)
		{
			$place = $args['place'];
			$text_pieces = $args['textpieces'];
			$definition_separator = $args['definitionseparator'];
			
			$word = $text_pieces[$place];
		#	print("BT: " . $word . "<BR><BR>");
		
			if($place != 0)
			{
				$word = $this->GetDefinedWordFromMidSentence(['sentencefragment'=>$word]);
			}
		#	print("BT: Now?" . $word . "<BR><BR>");
			
			$word = $this->textcleanup->UnescapeCommonFalsePositiveSentenceEndsSingular(['line'=>strtolower($this->textcleanup->PrepareSentence(['sentence'=>$word]))]);
			
			for($i = 0; $i <= $place; $i++)
			{
				unset($text_pieces[$i]);
			}
			
			$new_definition = implode(' ' . $definition_separator . ' ', $text_pieces);
			
			$definition = $this->textcleanup->PrepareSentence(['sentence'=>$new_definition]);
			$validation_results = $this->ValidateDefinition(['word'=>$word, 'definition'=>$definition]);
		#	print("BT: Validate???" . $word . "|...|" . $definition . "|" . $validation_results . "|<BR><BR>");
			if($validation_results)
			{
				$valid_definition = $validation_results['definition'];
				$valid_word = $validation_results['word'];
				$reformat_definition_and_defined_word_results = $this->ReformatDefinitionAndDefinedWord(['word'=>$valid_word, 'definition'=>$valid_definition, 'definitionseparator'=>$definition_separator]);
				
				$valid_definition = $reformat_definition_and_defined_word_results['definition'];
				$valid_word = $reformat_definition_and_defined_word_results['word'];
				
				$valid_definition = $this->ReformatDefinition(['definition'=>$valid_definition, 'word'=>$valid_word]);
				$valid_word = $this->ReformatDefinedWord(['word'=>$valid_word]);
				
				#print("BT: VALID!" . $valid_word . "|...|" . $valid_definition . "|<BR><BR>");
				return [
					'word'=>trim($valid_word),
					'definition'=>trim($valid_definition),
				];
			}
			
			return FALSE;
		}
		
		public function GetDefinedWordFromMidSentence($args)
		{
			$sentence_fragment = $args['sentencefragment'];
			
			$old_word_pieces = explode(' ', $sentence_fragment);
			$old_word_pieces_count = count($old_word_pieces);
			$new_word_pieces = [];
			
			for($i = $old_word_pieces_count - 1; $i >= 0; $i--)
			{
				$definition_piece = $old_word_pieces[$i];
				$definition_piece = $this->PullOutInvalidFirstWordsForDefinedWord(['word'=>$definition_piece]);
				
				if(!$definition_piece)
				{
					$i = 0;
				}
				else
				{
					$new_word_pieces[] = $definition_piece;
				}
				
				if(count($new_word_pieces) > 4)
				{
					$i = 0;
				}
			}
			
			$word = implode(' ', array_reverse($new_word_pieces));
			
			return $word;
		}
		
						// Definition Validation Functions
						// ------------------------------------------------------------------------
		
		public function PullOutInvalidFirstWordsForDefinitions($args)
		{
			$definition = $args['definition'];
			$definition_pieces_to_compare = $this->textcleanup->BuildWordsFully(['sentence'=>$definition]);
			
			$definition_pieces = explode(' ', $definition);
			$definition_pieces_count = count($definition_pieces);
			
			$invalid_first_words = $this->InvalidWordsForDefinitions();
			$invalid_first_words_count = count($invalid_first_words);
			
			for($i = 0; $i < $invalid_first_words_count; $i++)
			{
				$invalid_first_word = $invalid_first_words[$i];
				
				if(
					$invalid_first_word == $definition_pieces_to_compare[0] ||
					($invalid_first_word . ':') == $definition_pieces_to_compare[0] ||
					($invalid_first_word . ' :') == $definition_pieces_to_compare[0] ||
					($invalid_first_word . ',') == $definition_pieces_to_compare[0]
				)
				{
					unset($definition_pieces[0]);
					$definition = implode(' ', $definition_pieces);
					if($definition)
					{
						$definition_pieces = explode(' ', $definition);
						$definition_pieces_count = count($definition_pieces);
						
						$definition_pieces_to_compare_count = count($definition_pieces_to_compare);
						
						for($j = 1; $j < $definition_pieces_to_compare_count; $j++)
						{
							$definition_pieces_to_compare[$j - 1] = $definition_pieces_to_compare[$j];
						}
						
						unset($definition_pieces_to_compare[$definition_pieces_to_compare_count - 1]);
						
						$i = -1;
					}
				}
			}
			
			return $definition;
		}
		
		public function PullOutInvalidFirstWordsForDefinedWord($args)
		{
			$word = $args['word'];
			$word_pieces_to_compare = $this->textcleanup->BuildWordsFully(['sentence'=>$word]);
			
			$word_pieces = explode(' ', $word);
			$word_piece_count = count($word_pieces);
			
			$invalid_first_words = $this->grammar->InvalidWordsForDefinedWords();
			$invalid_first_words_count = count($invalid_first_words);
			
			for($i = 0; $i < $invalid_first_words_count; $i++)
			{
				$invalid_first_word = $invalid_first_words[$i];
				
				if(
					$invalid_first_word == $word_pieces_to_compare[0] ||
					($invalid_first_word . ':') == $word_pieces_to_compare[0] ||
					($invalid_first_word . ' :') == $word_pieces_to_compare[0] ||
					($invalid_first_word . ',') == $word_pieces_to_compare[0]
				)
				{
					unset($word_pieces[0]);
					$word = implode(' ', $word_pieces);
					if($word)
					{
						$word_pieces = explode(' ', $word);
						$word_piece_count = count($word_pieces);
						
						$word_pieces_to_compare_count = count($word_pieces_to_compare);
						
						for($j = 1; $j < $word_pieces_to_compare_count; $j++)
						{
							$word_pieces_to_compare[$j - 1] = $word_pieces_to_compare[$j];
						}
						
						unset($word_pieces_to_compare[$word_pieces_to_compare_count - 1]);
						
						$i = -1;
					}
				}
			}
			
			return $word;
		}
		
		public function PullOutInvalidLastWordsForDefinedWord($args)
		{
			$word = $args['word'];
			$word_pieces_to_compare = $this->textcleanup->BuildWordsFully(['sentence'=>$word]);
			
			$word_pieces = explode(' ', $word);
			$word_piece_count = count($word_pieces);
			
			$invalid_last_words = $this->grammar->InvalidWordsForDefinedWords();
			$invalid_last_words_count = count($invalid_last_words);
			
			$word_pieces_to_compare_count = count($word_pieces_to_compare);
			
			for($i = 0; $i < $invalid_last_words_count; $i++)
			{
				$invalid_last_word = $invalid_last_words[$i];
				
				if(
					$invalid_last_word == $word_pieces_to_compare[$word_pieces_to_compare_count - 1] ||
					($invalid_last_word . ':') == $word_pieces_to_compare[$word_pieces_to_compare_count - 1] ||
					($invalid_last_word . ' :') == $word_pieces_to_compare[$word_pieces_to_compare_count - 1] ||
					($invalid_last_word . ',') == $word_pieces_to_compare[$word_pieces_to_compare_count - 1]
				)
				{
					unset($word_pieces[$word_pieces_to_compare_count - 1]);
					$word = implode(' ', $word_pieces);
					$word_pieces_to_compare_count = count($word_pieces);
					if($word)
					{
						$word_pieces = explode(' ', $word_pieces);
						$word_piece_count = count($word_pieces);
						
						$i = -1;
					}
				}
			}
			
			return $word;
		}
		
		public function PullOutInvalidPhrasesForDefinedWord($args)
		{
			$word = $args['word'];
			$word_pieces_to_compare = $this->textcleanup->BuildWordsFully(['sentence'=>$word]);
			
			$word_pieces = explode(' ', $word);
			$word_piece_count = count($word_pieces);
			
			$invalid_phrases = $this->grammar->IrrelevantPhrases();
			$invalid_phrase_count = count($invalid_phrases);
			
			for($i = 0; $i < $invalid_phrase_count; $i++)
			{
				$invalid_phrase = $invalid_phrases[$i];
				
				if(preg_match('/^' . $invalid_phrase . '/', $word))
				{
					$word = trim(preg_replace('/^' . $invalid_phrase . '/', '', $word));
					$word_pieces_to_compare_count = count($word_pieces);
					if($word)
					{
						$word_pieces = explode(' ', $word);
						$word_piece_count = count($word_pieces);
						
						$i = -1;
					}
				}
				elseif(preg_match('/' . $invalid_phrase . '$/', $word))
				{
					$word = trim(preg_replace('/' . $invalid_phrase . '$/', '', $word));
					$word_pieces_to_compare_count = count($word_pieces);
					if($word)
					{
						$word_pieces = explode(' ', $word);
						$word_piece_count = count($word_pieces);
						
						$i = -1;
					}
				}
				
				if($i < 0)
				{
					$word_pieces_to_compare = [];
					for($j = 0; $j < $word_piece_count; $j++)
					{
						$word_piece = strtolower($this->textcleanup->PrepareSentence(['sentence'=>$word_pieces[$j]]));
						
						$word_pieces_to_compare[$j] = $word_piece;
					}
				}
			}
			
			return $word;
		}
		
		public function GetCancelDefinitionsResults($args)
		{
			$definition = $this->textcleanup->CleansePhrase(['phrase'=>$args['definition']]);
			$definition_pieces_to_compare = $this->textcleanup->BuildWords(['sentence'=>$definition]);
			
			$cancel_first_words = $this->CanceledWordsForDefinitionsHash();
			if($cancel_first_words[$definition_pieces_to_compare[0]])
			{
				return FALSE;
			}
			
			return TRUE;
		}
		
		public function GetFirstRejectedWordsResults($args)
		{
			$word = $args['word'];
			
			$reject_first_words = $this->RejectedWordsForDefinedWordsHash();
			if($reject_first_words[$word]) {
				return FALSE;
			}
			
			return TRUE;
		}
		
		public function GetFirstCancelWordsResults($args)
		{
			$word = $args['word'];
			$word_pieces_to_compare = $this->textcleanup->BuildWordsFully(['sentence'=>$word]);
			
			$word_pieces = explode(' ', $word);
			$word_piece_count = count($word_pieces);
			
			$cancel_first_words = $this->CanceledWordsForDefinedWordsHash();
			if($cancel_first_words[$word_pieces_to_compare[0]]) {
				return FALSE;
			}
			
			return TRUE;
		}
		
		public function GetLastCancelWordsResults($args)
		{
			$word = $args['word'];
			$word_pieces_to_compare = $this->textcleanup->BuildWordsFully(['sentence'=>$word]);
			$word_pieces_to_compare_count = count($word_pieces_to_compare);
			
			$word_pieces = explode(' ', $word);
			$word_piece_count = count($word_pieces);
			
			$cancel_last_words = $this->CanceledWordsForDefinedWords();
			$cancel_last_words_count = count($cancel_last_words);
			
			for($i = 0; $i < $cancel_last_words_count; $i++)
			{
				$cancel_last_word = $cancel_last_words[$i];
				if($cancel_last_word == $word_pieces_to_compare[$word_pieces_to_compare_count - 1])
				{
					return FALSE;
				}
			}
			
			return TRUE;
		}
		
		public function GetLastCancelWordsPhrasesResults($args)
		{
			$word = $args['word'];
			
			$cancel_first_phrases = $this->grammar->UninformativePhrases();
			$cancel_first_phrases_count = count($cancel_first_phrases);
			
			for($i = 0; $i < $cancel_first_phrases_count; $i++)
			{
				$cancel_first_phrase = $cancel_first_phrases[$i];
				
				if(preg_match('/^' . $cancel_first_phrase . '/', $word))
				{
					return FALSE;
				}
				elseif(preg_match('/' . $cancel_first_phrase . '$/', $word))
				{
					return FALSE;
				}
			}
			
			return TRUE;
		}
		
		public function GetInvalidDefinitionResults($args)
		{
			$definition = $args['definition'];
			
			$invalid_definitions = $this->grammar->UninformativeDescriptions();
			$invalid_definitions_count = count($invalid_definitions);
			
			for($i = 0; $i < $invalid_definitions_count; $i++)
			{
				$invalid_definition = $invalid_definitions[$i];
				if($definition == $invalid_definition)
				{
					return FALSE;
				}
			}
			
			return TRUE;
		}
		
		public function GetInvalidDefinedWordResults($args)
		{
			$word = $args['word'];
			
			$invalid_words = $this->grammar->UninformativeDefinedWords();
			$invalid_words_count = count($invalid_words);
			
			for($i = 0; $i < $invalid_words_count; $i++)
			{
				$invalid_word = $invalid_words[$i];
				
				if($word == $invalid_word)
				{
					return FALSE;
				}
			}
			
			return TRUE;
		}
		
		public function ValidateDefinition($args)
		{
			$word = $this->textcleanup->CleansePhraseFully(['phrase'=>$args['word']]);
			$definition = $this->textcleanup->CleansePhrase(['phrase'=>$args['definition']]);
			
			if(!$word || !$definition)
			{
				return FALSE;
			}
			
			$word_pieces = explode(' ', $word);
			$word_piece_count = count($word_pieces);
			
			if($word_piece_count < 10)
			{
				$definition_pieces_to_compare = $this->textcleanup->BuildWords(['sentence'=>$definition]);
				$word_pieces_to_compare = $this->textcleanup->BuildWordsFully(['sentence'=>$word]);
				
				if(!$this->GetCancelWordAndDefinitionResults(['word'=>$word, 'definition'=>$definition]))
				{
					return FALSE;
				}
				
					# Special Conversions
			
				$word_and_definition_conversion = $this->SpecialDefinedWordAndDefinitionConversions(['word'=>$word, 'definition'=>$definition]);	
				$word = $word_and_definition_conversion['word'];
				$definition = $word_and_definition_conversion['definition'];
				
					# First Sweep
				$word = $this->PullOutInvalidPhrasesForDefinedWord(['word'=>$word]);
				$word = $this->PullOutInvalidFirstWordsForDefinedWord(['word'=>$word]);
				$word = $this->PullOutInvalidLastWordsForDefinedWord(['word'=>$word]);
				$definition = $this->PullOutInvalidFirstWordsForDefinitions(['definition'=>$definition]);
				
					# Special Conversions
			
				$word_and_definition_conversion = $this->SpecialDefinedWordAndDefinitionConversions(['word'=>$word, 'definition'=>$definition]);	
				$word = $word_and_definition_conversion['word'];
				$definition = $word_and_definition_conversion['definition'];
				
					# Second Sweep
				$word = $this->PullOutInvalidPhrasesForDefinedWord(['word'=>$word]);
				$word = $this->PullOutInvalidFirstWordsForDefinedWord(['word'=>$word]);
				$word = $this->PullOutInvalidLastWordsForDefinedWord(['word'=>$word]);
				$definition = $this->PullOutInvalidFirstWordsForDefinitions(['definition'=>$definition]);
				
				if(!$this->GetCancelWordAndDefinitionResults(['word'=>$word, 'definition'=>$definition]))
				{
					return FALSE;
				}
				
				if($word && strlen($word) && $definition && strlen($definition))
				{
					$word_pieces = explode(' ', $word);
					$word_piece_count = count($word_pieces);
					
					if($word_pieces_count < 10)
					{
						$word_replacements = str_replace(',', ',', $word, $comma_count);
						if(!$comma_count)
						{
							$word = $this->textcleanup->CleansePhraseFully(['phrase'=>$word]);
							$definition = $this->textcleanup->CleansePhrase(['phrase'=>$definition]);
							
							if($word && strlen($word))
							{
								return [
									'word'=>$word,
									'definition'=>$definition,
								];
							}
						}
					}
				}
			}
			
			return FALSE;
		}
		
		public function SpecialDefinedWordAndDefinitionConversions($args)
		{
			$word = $args['word'];
			$definition = $args['definition'];
				
				# Handle Swap Words
			$swap_words_results = $this->DoSwapWordsConversion(['word'=>$word, 'definition'=>$definition]);
			$word = $swap_words_results['word'];
			$definition = $swap_words_results['definition'];
				
				# Handle Swap Phrases
			$swap_phrases_results = $this->DoSwapPhrasesConversion(['word'=>$word, 'definition'=>$definition]);
			$word = $swap_phrases_results['word'];
			$definition = $swap_phrases_results['definition'];
			
				# Handle "Says" / "Said"
			$word = $this->DoThirdPersonConversion(['word'=>$word]);
			
			return [
				'word'=>$word,
				'definition'=>$definition,
			];
		}
		
		# BT: add "tells us", etc.
		public function DoThirdPersonConversion($args)
		{
			$word = $args['word'];
			
			$word_separators = $this->DefinedWordSeparators();
			$word_separators_count = count($word_separators);
			
			for($i = 0; $i < $word_separators_count; $i++)
			{
				$word_separator = $word_separators[$i];
				$word_separator_pieces = explode(' ' . $word_separator . ' ', $word);
				$word_separator_pieces_count = count($word_separator_pieces);
				
				if($word_separator_pieces_count > 1)
				{
					$word = $word_separator_pieces[1];
				}
			}
			
			return $word;
		}
		
		public function DoSwapPhrasesConversion($args)
		{
			$word = $args['word'];
			$definition = $args['definition'];
			
			$swap_phrases = $this->grammar->InformativePreOrPostPhrases();
			
			foreach($swap_phrases as $swap_phrase)
			{
				$matched = 0;
				
				if(preg_match('/^' . $swap_phrase . '/', $word))
				{
					$word = preg_replace('/^' . $swap_phrase . '/', '', $word);
					$matched = 1;
				}
				elseif (preg_match('/' . $swap_phrase . '$/', $word))
				{
					$word = preg_replace('/' . $swap_phrase . '$/', '', $word);
					$matched = 1;
				}
				
				if($matched)
				{
					$word = $this->PullOutInvalidPhrasesForDefinedWord(['word'=>$word]);
					$word = $this->PullOutInvalidFirstWordsForDefinedWord(['word'=>$word]);
					$word = $this->PullOutInvalidLastWordsForDefinedWord(['word'=>$word]);
					
					$definition = $this->RebuildDefinitionWithSwapPhrase(['definition'=>$definition, 'swapphrase'=>$swap_phrase]);
				}
			}
			
			return [
				'word'=>$word,
				'definition'=>$definition,
			];
		}
		
		public function RebuildDefinitionWithSwapPhrase($args)
		{
			$definition = $args['definition'];
			$swap_phrase = $args['swapphrase'];
			
			$definition_pieces = explode(' ', $definition);
			
			if($definition_pieces[0] != $swap_word && $definition_pieces[0] != $swap_phrase . ',')
			{
				$last_swap_phrase_char = substr($swap_phrase, -1);
				
				if(
					$last_swap_phrase_char == '?' ||
					$last_swap_phrase_char == '!' ||
					$last_swap_phrase_char == '.'
				)
				{
					$definition = $swap_phrase . ' ' . ucfirst($definition);
				}
				elseif(
					$last_swap_phrase_char == ';' ||
					$last_swap_phrase_char == ':'
				)
				{
					$definition = $swap_phrase . ' ' . $definition;
				}
				else
				{
					$definition = $swap_phrase . ', ' . $definition;
				}
			}
			
			return $definition;
		}
		
		public function DoSwapWordsConversion($args)
		{
			$word = $args['word'];
			$definition = $args['definition'];
			
			$swap_words = $this->grammar->InformativeAdverbs();
			
			foreach($swap_words as $swap_word)
			{
				$word_pieces = explode(' ', $word);
				$word_pieces_count = count($word_pieces);
				
				if(($word_pieces[0] == $swap_word || $word_pieces[0] == $swap_word . ',') && $word_pieces_count > 1)
				{
					unset($word_pieces[0]);
					$word = implode(' ', $word_pieces);
					$word = $this->PullOutInvalidPhrasesForDefinedWord(['word'=>$word]);
					$word = $this->PullOutInvalidFirstWordsForDefinedWord(['word'=>$word]);
					$word = $this->PullOutInvalidLastWordsForDefinedWord(['word'=>$word]);
					
					$definition_pieces = explode(' ', $definition);
					
					if($definition_pieces[0] != $swap_word && $definition_pieces[0] != $swap_word . ',')
					{
						$definition = $swap_word . ', ' . $definition;
					}
				}
				elseif(($word_pieces[$word_pieces_count - 1] == $swap_word || $word_pieces[$word_pieces_count - 1] == $swap_word . ',') && $word_pieces_count > 1)
				{
					unset($word_pieces[$word_pieces_count - 1]);
					$word = implode(' ', $word_pieces);
					$word = $this->PullOutInvalidPhrasesForDefinedWord(['word'=>$word]);
					$word = $this->PullOutInvalidFirstWordsForDefinedWord(['word'=>$word]);
					$word = $this->PullOutInvalidLastWordsForDefinedWord(['word'=>$word]);
					
					$definition_pieces = explode(' ', $definition);
					
					if($definition_pieces[0] != $swap_word && $definition_pieces[0] != $swap_word . ',')
					{
						$definition = $swap_word . ', ' . $definition;
					}
				}
			}
			
			return [
				'word'=>$word,
				'definition'=>$definition,
			];
		}
		
		public function GetCancelWordAndDefinitionResults($args)
		{
			$word = $args['word'];
			$definition = $args['definition'];
			
			if(
				!$this->GetCancelDefinitionsResults(['definition'=>$definition]) ||
				!$this->GetFirstRejectedWordsResults(['word'=>$word]) ||
				!$this->GetFirstCancelWordsResults(['word'=>$word]) ||
				!$this->GetLastCancelWordsResults(['word'=>$word]) ||
				!$this->GetLastCancelWordsPhrasesResults(['word'=>$word]) ||
				!$this->GetInvalidDefinitionResults(['definition'=>$definition]) ||
				!$this->GetInvalidDefinedWordResults(['word'=>$word]))
			{
				return FALSE;
			}
			
			return TRUE;
		}
						
						// After-End Prepare Functions
						// ------------------------------------------------------------------------
		
		public function ReformatDefinitionAndDefinedWord($args)
		{
			$word = $args['word'];
			$definition = $args['definition'];
			$definition_separator = $args['definitionseparator'];
			
			$word_asa_explosion = explode(' as a ', $word);
			$word_asa_explosion_count = count($word_asa_explosion);
			
				# Marx as a Thinker: Could be Right.
				#   TO
				# Marx: As a thinker could be right.
			if($word_asa_explosion_count == 2)
			{
				$word = $word_asa_explosion[0];
				$definition = 'As a ' . $word_asa_explosion[1] . ' ' . $definition_separator . ' ' . $definition;
			}
			
				# More Menacing Still: Unionism.
				#   TO
				# Menacing: Unionism.
			$word_pieces = explode(' ', $word);
			$word_pieces_count = count($word_pieces);
			
			if($word_pieces[0] == 'more' && $word_pieces[$word_pieces_count - 1] == 'still')
			{
				unset($word_pieces[0]);
				unset($word_pieces[$word_pieces_count - 1]);
				
				$word = implode(' ', $word_pieces);
			}
			
			return [
				'word'=>$word,
				'definition'=>$definition,
			];
		}
		
		public function ReformatDefinedWord($args)
		{
			$word = $args['word'];
			
			$acronyms = $this->grammar->Acronyms();
			
			foreach($acronyms as $acronym)
			{
				$word = preg_replace('/\b' . $acronym . '\b/', strtoupper($acronym), $word);
			}
			
			$word = $this->CollapseDefinedWord(['word'=>$word]);
			
			if($word == 'point')
			{
				$word = 'the point';
			}
			
			$word = $this->textcleanup->CleansePhraseFully(['phrase'=>$word]);
			
			return ucwords(implode('-', array_map('ucfirst', explode('-', $word))));
		}
		
		public function CollapseDefinedWord($args)
		{
			$word = $args['word'];
			
			$current_piece = '';
			$word_pieces = explode(':', $word);
			$word_pieces_count = count($word_pieces);
			
			if($word_pieces_count > 1)
			{
				$first_piece = trim($word_pieces[0]);
				
				for($i = 1; $i < $word_pieces_count; $i++)
				{
					$last_piece = trim($word_pieces[$i]);
					
					if($first_piece != $last_piece)
					{
						$first_piece = '';
						$i = $word_pieces_count;
					}
				}
				
				if($first_piece)
				{
					$word = trim($first_piece);
				}
			}
			
			return $word;
		}
		
		public function ReformatDefinition($args)
		{
			$definition = $args['definition'];
			$word = $args['word'];
			
			$concluding_puncuation = '';
			$last_char = mb_substr($definition, -1, 1);
			
			if($last_char != '?' && $last_char != '!' && $last_char != '.') {
				$concluding_puncuation = '.';
			}
			
			return ucfirst($definition) . $concluding_puncuation;
		}
		
						// Sort Functions
						// ------------------------------------------------------------------------
		
		public function SortDefinitions($args)
		{
			$definitions = $args['definitions'];
			uksort($definitions, 'strnatcasecmp');
			return $definitions;
		}
		
						// English Grammar Hash Optimizers
						// ------------------------------------------------------------------------
		
		public function DefinitionSeparatorsHash() {
			if($this->defined_separators) {
				return $this->defined_separators;
			}
			$defined_separators = $this->DefinitionSeparators();
			$defined_separator_count = count($defined_separators);
			
			$defined_separators_hash = [];
			
			for($i = 0; $i < $defined_separator_count; $i++) {
				$defined_separator = $defined_separators[$i];
				$defined_separators_hash[$defined_separator] = TRUE;
			}
			
			$this->defined_separators = $defined_separators_hash;
			
			return $defined_separators_hash;
		}
		
		public function RejectedWordsForDefinedWordsHash() {
			if($this->rejected_words_for_defined_words) {
				return $this->rejected_words_for_defined_words;
			}
			$rejected_words = $this->RejectedWordsForDefinedWords();
			$rejected_words_count = count($rejected_words);
			
			$rejected_words_hash = [];
			
			for($i = 0; $i < $rejected_words_count; $i++) {
				$rejected_word = $rejected_words[$i];
				$rejected_words_hash[$rejected_word] = TRUE;
			}
			
			$this->rejected_words_for_defined_words = $rejected_words_hash;
			
			return $rejected_words_hash;
		}
		
		public function CanceledWordsForDefinedWordsHash()
		{
			if($this->canceled_words_for_defined_words) {
				return $this->canceled_words_for_defined_words;
			}
			$canceled_words = $this->CanceledWordsForDefinedWords();
			$canceled_words_count = count($canceled_words);
			
			$canceled_words_hash = [];
			
			for($i = 0; $i < $canceled_words_count; $i++) {
				$canceled_word = $canceled_words[$i];
				$canceled_words_hash[$canceled_word] = TRUE;
			}
			
			$this->canceled_words_for_defined_words = $canceled_words_hash;
			
			return $canceled_words_hash;
		}
		
		public function CanceledWordsForDefinitionsHash() {
			if($this->canceled_words_for_definitions) {
				return $this->canceled_words_for_definitions;
			}
			$canceled_words = $this->CanceledWordsForDefinitions();
			$canceled_words_count = count($canceled_words);
			
			$canceled_words_hash = [];
			
			for($i = 0; $i < $canceled_words_count; $i++) {
				$canceled_word = $canceled_words[$i];
				$canceled_words_hash[$canceled_word] = TRUE;
			}
			
			$this->canceled_words_for_definitions = $canceled_words_hash;
			
			return $canceled_words_hash;
		}
		
						// English Grammar (Word Lists)
						// ------------------------------------------------------------------------
		
				# Grammar Infrastructure Logic
				# ----------------------------
		
			# DefinitionSeparators() : What separates a defined word from a definition.
		public function DefinitionSeparators()
		{
			return [
				'are',
				'is',
				':',
			//	'(',
			//	'was',
			//	'should be',
			//	'ought to be',
			];
		}
		
			# DefinedWordSeparators() : Words that can separate a defined word, returning the right-side chunk.
		public function DefinedWordSeparators()
		{
			return [
				'assure me',
				'assures me',
				'believe in',
				'believes in',
				'i discover',
				'i discover that',
				'i learn that',
				'i learned that',
				'mean that',
				'means that',
				'said',
				'say that',
				'says that',
				'says',
				'such a',
				'taught that',
				'teaches that',
				'tell me that',
				'tell me',
				'tell you that',
				'tell you',
				'tell sme that',
				'tells me',
				'tells you that',
				'tells you',
				'the fact that',
				'told me',
			];
		}
		
				# Invalid Defined Words Logic
				# ------------------------
		
			# InvalidWordsForDefinitions() : Words to reject if they are the defined word.
		public function RejectedWordsForDefinedWords()
		{
			return [
	#			'both',
			];
		}
		
				# Invalid Definition Logic
				# ------------------------
		
			# InvalidWordsForDefinitions() : Words to strip out of definitions if the definition starts with them.
		public function InvalidWordsForDefinitions()
		{
			return [
				'and',
				'be',
				'that',
				'those',
			];
		}
		
				# Cancel Definition Logic
				# -----------------------
		
			# CanceledWordsForDefinedWords() : Defined words are rejected if they start or end with any of these words.
		public function CanceledWordsForDefinedWords()
		{
			return [
				'almost',
				'chapter',
				'he',
				'her',
				'his',
				'how',
				'its',
				'object',
				'no',
				'not',
				'once',
				'she',
				'such',
				'their',
				'thing',
				'until',
				'what',
				'when',
				'where',
				'who',
				'why',
				'your',
			];
		}
		
			# CanceledWordsForDefinitions() : Definitions are rejected if they start or end with any of these words.
		public function CanceledWordsForDefinitions()
		{
			return [
				'it',
				'its',
			];
		}
	}

?>