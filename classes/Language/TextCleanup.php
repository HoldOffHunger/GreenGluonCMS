<?php

	class TextCleanup
	{
		
						// Construction
						// ------------------------------------------------------------------------
		
		public function __construct($args)
		{
			$this->grammar = $args['grammar'];
		}
		
						// Before-Start Prepare Functions
						// ------------------------------------------------------------------------
		
		public function PrepareSentences($args)
		{
			$text = $this->EscapeCommonFalsePositiveSentenceEnds(['text'=>$args['text']]);
			
			$possible_sentences = preg_split('/[\.\n\r]/', $text);
			
			$sentences = [];
			
			$possible_sentences_count = count($possible_sentences);
			
			for($i = 0; $i < $possible_sentences_count; $i++)
			{
				$possible_sentence = $this->PrepareSentence(['sentence'=>$possible_sentences[$i]]);
				
				if(strlen($possible_sentence) > 10)
				{
					$sentences[] = $possible_sentence;
					
					$subsentences = $this->GetSubSentences(['text'=>$possible_sentence]);
					
					if($subsentences && count($subsentences))
					{
						foreach($subsentences as $subsentence)
						{
							$sentences[] = $this->PrepareSentence(['sentence'=>$subsentence]);
						}
					}
				}
			}
			
			return $sentences;
		}
		
		public function GetSubSentences($args)
		{
			$text = $args['text'];
			
			$text_pieces = explode(':', $text);
			$text_pieces_counts = count($text_pieces);
			
			$subsentences = [];
			
			if($text_pieces_counts > 1)
			{
				unset($text_pieces[0]);
				$new_sentence = implode(':', $text_pieces);
				
				if(strlen($new_sentence) > 10)
				{
					$subsentences[] = $new_sentence;
				}
			}
			
			return $subsentences;
		}
		
		public function PrepareSentence($args)
		{
			$sentence = $args['sentence'];
			
			$escape_sequences = $this->GetEscapeSequences();
			
			$sentence = trim($sentence, $escape_sequences);
			
			$sentence = preg_replace('/[\s' . $escape_sequences . ']+/', ' ', $sentence);
			
			return $sentence;
		}
		
		public function PrepareSentenceFully($args)
		{
			$sentence = $args['sentence'];
			
			$escape_sequences = $this->GetFullEscapeSequences();
			
			$sentence = trim($sentence, $escape_sequences);
			
			$sentence = preg_replace('/[\s' . $escape_sequences . ']+/', ' ', $sentence);
			
			return $sentence;
		}
		
		public function GetEscapeSequences()
		{
			$escape_sequences = 
				urldecode("%C2%A0") .
				urldecode("+") .
				urldecode("%A0") .
				urldecode("%20") .
				urldecode("%0D") .
				urldecode("%0A");
				
			return $escape_sequences;
		}
		
		public function GetFullEscapeSequences()
		{
			$escape_sequences = 
				urldecode("%C2%A0") .
				urldecode("+") .
				urldecode("%A0") .
				urldecode("%20") .
				urldecode("%21") .
				urldecode("%22") .
				urldecode("%23") .
				urldecode("%24") .
				urldecode("%25") .
				urldecode("%26") .
				urldecode("%27") .
				urldecode("%28") .
				urldecode("%29") .
				urldecode("%0D") .
				urldecode("%0A");
				
			return $escape_sequences;
		}
		
		public function EscapeCommonFalsePositiveSentenceEnds($args)
		{
			$text = $args['text'];
			
			$text = $this->CleanupTextBeforeEscaping(['text'=>$text]);
			$text = $this->EscapeAcronym(['line'=>$text]);
			$text = $this->EscapePeriodValidPhrase(['line'=>$text]);
			
			return $text;
		}
		
		public function CleanupTextBeforeEscaping($args)
		{
			$text = $args['text'];
			
			$text = str_replace('”', '\'', $text);
			$text = str_replace('“', '\'', $text);
			$text = str_replace('’', '\'', $text);
			$text = str_replace('‘', '\'', $text);
			$text = str_replace('`', '\'', $text);
			$text = str_replace('"', '\'', $text);
			
			$text = preg_replace('/\n/i', ' ', $text);
			$text = preg_replace('/\r/i', ' ', $text);
			
			$text = preg_replace('/[\s]*\?/i', '?', $text);
			$text = preg_replace('/[\s]*\!/i', '!', $text);
			
			$text = preg_replace('/----/i', ' ---- ', $text);
			$text = preg_replace('/---/i', ' --- ', $text);
			$text = preg_replace('/--/i', ' -- ', $text);
			
			$text = preg_replace('/—/i', ' — ', $text);
			
			$text = preg_replace('/ to-day /i', ' today ', $text);
			
			$text = preg_replace('/ isn\'t /i', ' is not ', $text);
			$text = preg_replace('/ aren\'t /i', ' are not ', $text);
			
			return $text;
		}
		
		public function EscapeAcronym($args)
		{
			$line = $args['line'];
			
			$acronyms = $this->grammar->Acronyms();
			
			foreach($acronyms as $acronym_index => $acronym)
			{
				$acronyms[$acronym_index] = implode('.', str_split(strtoupper($acronym))) . '.';
			}
			
			return $this->EscapeSinglePhrase(['line'=>$line, 'escapethis'=>$acronyms]);
		}
		
		public function EscapePeriodValidPhrase($args)
		{
			$line = $args['line'];
			
			$phrases = $this->grammar->AllValidPhrasesWithPeriods();
			
			return $this->EscapeSinglePhrase(['line'=>$line, 'escapethis'=>$phrases]);
		}
		
		public function EscapeSinglePhrase($args)
		{
			$line = ' ' . $args['line'] . ' ';
			$escape_this = $args['escapethis'];
			$escape_this_count = count($escape_this);
			
			for($i = 0; $i < $escape_this_count; $i++)
			{
				$escape_piece = $escape_this[$i];
				$escape_piece_delimited = str_replace('.', '_', $escape_piece);
				$escape_piece = str_replace('.', '\.', $escape_piece);
				
				$line = preg_replace('/[\s\b]' . $escape_piece . '[\s\b]/i', ' ' . $escape_piece_delimited . ' ', $line);
				$line = preg_replace('/[\s\b]\(' . $escape_piece . '/i', ' (' . $escape_piece_delimited . ' ', $line);
			}
			
			return $line;
		}
		
		public function UnescapeCommonFalsePositiveSentenceEnds($args)
		{
			$definitions = $args['definitions'];
			
			foreach ($definitions as $definition_key => $definition_values)
			{
				foreach($definition_values as $definition_index => $definition_line)
				{
					
					$definitions[$definition_key][$definition_index] = $this->UnescapeCommonFalsePositiveSentenceEndsSingular(['line'=>$definition_line]);
				}
			}
			
			return $definitions;
		}
		
		public function UnescapeCommonFalsePositiveSentenceEndsSingular($args)
		{
			$line = $args['line'];
			
			$line = $this->UnescapeAcronym(['line'=>$line]);
			$line = $this->UnescapePeriodValidPhrase(['line'=>$line]);
			
			return $line;
		}
		
		public function UnescapeAcronym($args)
		{
			$line = $args['line'];
			
			$acronyms = $this->grammar->Acronyms();
			
			foreach($acronyms as $acronym_index => $acronym)
			{
				$acronyms[$acronym_index] = implode('.', str_split(strtoupper($acronym))) . '.';
			}
			
			return $this->UnescapeSinglePhrase(['line'=>$line, 'escapethis'=>$acronyms]);
		}
		
		public function UnescapePeriodValidPhrase($args)
		{
			$line = $args['line'];
			
			$phrases = $this->grammar->AllValidPhrasesWithPeriods();
			
			return $this->UnescapeSinglePhrase(['line'=>$line, 'escapethis'=>$phrases]);
		}
		
		public function UnescapeSinglePhrase($args)
		{
			$line = ' ' . $args['line'] . ' ';
			$escape_this = $args['escapethis'];
			$escape_this_count = count($escape_this);
			
			for($i = 0; $i < $escape_this_count; $i++)
			{
				$escape_piece = $escape_this[$i];
				$escape_piece_delimited = str_replace('.', '_', $escape_piece);
				
				$line = preg_replace('/[\s\b]' . $escape_piece_delimited . '[\s\b]/i', ' ' . $escape_piece . ' ', $line);
				$line = preg_replace('/[\s\b]\(' . $escape_piece_delimited . '/i', ' (' . $escape_piece . ' ', $line);
			}
			
			return $line;
		}
		
						// Cleanse Functions
						// ------------------------------------------------------------------------
		
		public function CleansePhrase($args)
		{
			$phrase = $args['phrase'];
			
			$phrase = str_replace('*', '', $phrase);
			$phrase = trim($phrase, '—-_');
			
			return trim($phrase);
		}
		
		public function CleansePhraseFully($args)
		{
			$phrase = $args['phrase'];
			
			$phrase = trim($phrase, '*“”"‘’`\'—-_,;:!? ');
			$phrase = str_replace('*', '', $phrase);
			$phrase = str_replace('(', '', $phrase);
			$phrase = str_replace(')', '', $phrase);
			$phrase = str_replace('[', '', $phrase);
			$phrase = str_replace(']', '', $phrase);
			
			return trim($phrase);
		}
		
		public function BuildWords($args)
		{
			$sentence = $args['sentence'];
			$sentence_pieces = explode(' ', $sentence);
			
			$sentence_pieces_to_compare = [];
			for($i = 0; $i < count($sentence_pieces); $i++)
			{
				$sentence_piece = strtolower($this->PrepareSentence(['sentence'=>$sentence_pieces[$i]]));
				$sentence_pieces_to_compare[$i] = $sentence_piece;
			}
			
			return $sentence_pieces_to_compare;
		}
		
		public function BuildWordsFully($args)
		{
			$sentence = $args['sentence'];
			$sentence_pieces = explode(' ', $sentence);
			
			$sentence_pieces_to_compare = [];
			for($i = 0; $i < count($sentence_pieces); $i++)
			{
				$sentence_piece = strtolower($this->PrepareSentenceFully(['sentence'=>$sentence_pieces[$i]]));
				$sentence_pieces_to_compare[$i] = $sentence_piece;
			}
			
			return $sentence_pieces_to_compare;
		}
	}

?>