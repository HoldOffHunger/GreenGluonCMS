<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleErrors.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleGeography.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleORM.php');

	class languageutils extends basicscript {
						// Traits
						// ---------------------------------------------
		
		use DBFunctions;
		use SimpleErrors;
		use SimpleForms;
		use SimpleGeography;
		use SimpleLookupLists;
		use SimpleORM;
		
						// Security Data
						// ---------------------------------------------
		
		public function IsSecure() {
			return TRUE;
		}
		
		public function RequiresLogin() {
			return TRUE;
		}
		
						// Functionality
						// ---------------------------------------------
		
		public function display() {
			$this->SetORM();
			$this->SetRecordTree();
			$this->SetPrimaryHostRecords();
			
			if(!$this->ValidateOrm()) {
				return FALSE;	# 404
			}
			
			$this->SetMasterRecord();
			$this->SetGeographyBasics();
			
			$this->letter = $this->Param('letter');
			
			if(strlen($this->letter) > 0) {
				$file_location = '../classes/Language/Words/EnglishMisspellings/EnglishMisspellingsWords_' . strtoupper($this->letter) . '.php';
				
				$source_code = file_get_contents($file_location);
				
				$source_pieces = explode('public function', $source_code);
				
				$word_source = end($source_pieces);
				
				$word_pieces = explode('return [', $word_source);
				
				$words_original = end($word_pieces);
				
				$words_original = str_replace("\n" . '?>', '', $words_original);
				
				$lines = explode("\n", $words_original);
				
				$new_words = [];
				$current_word = '';
				
				for($i = 0; $i < count($lines); $i++) {
					$line = trim($lines[$i]);
					
					if(strlen($line) > 0 && $line != ']' && $line != '}' && $line != '],' && $line != '];') {
						$split = explode('=>', $line);
						
						$split_count = count($split);
						
						if($split_count > 1) {
							$word = $split[0];
							$word = $this->cleanseWord(['word'=>$word]);
							
							$current_word = $word;
							
							if(!$new_words[$word]) {
								$new_words[$word] = [];
							}
							
							$other_word = $split[1];
							
							if($other_word != '[') {
								$other_word = $this->cleanseListItem(['word'=>$other_word]);
								$other_word = $this->cleanseWord(['word'=>$other_word]);
								
								$new_words[$word][$other_word] = TRUE;
							}
						} else {
							$word = $current_word;
							
							$other_word = $split[0];
							
							if($other_word[0] != ']') {
								$other_word = $this->cleanseListItem(['word'=>$other_word]);
								$other_word = $this->cleanseWord(['word'=>$other_word]);
								$new_words[$word][$other_word] = TRUE;
							}
						}
					}
				}
				
				$new_text = "\n";
				
				ksort($new_words);
				foreach($new_words as $correct => $incorrect) {
					$new_text .= "\t\t\t\t'" . $correct . "'=>[\n";
					
					ksort($incorrect);
					foreach($incorrect as $misspelling => $truth_value) {
						$new_text .= "\t\t\t\t\t'" . $misspelling . "',\n";
					}
					
					$new_text .= "\t\t\t\t],\n";
				}
				
				$word_pieces[count($word_pieces) - 1] = $new_text . "\t\t\t];\n\t\t}\n\t}\n\n" . '?>';
				
				$pre_finalized = implode('return [', $word_pieces);
				
				$source_pieces[count($source_pieces) - 1] = $pre_finalized;
				
				$finalized = implode('public function', $source_pieces);
			#	print("<PRE>");
			#	print_r($new_words);
			#	print("</PRE>");
				
			#	$finalized = implode("\n", $lines);
				
				$this->reformatted_file = $finalized;
			#	print($word_source);
			#	print($source_code);
				
#				print("YAR!");
			}
			
			return TRUE;
		}
		
		public function cleanseListItem($args) {
			$word = $args['word'];
			
			$length = strlen($word);
			
			if($word[$length - 1] == ",") {
				$word = substr($word, 0, -1);
			}
			
			return $word;
		}
		
		public function cleanseWord($args) {
			$word = $args['word'];
			
			if($word[0] == "[") {
				$word = substr($word, 1);
			}
			
			if($word[0] == "'") {
				$word = substr($word, 1);
			}
			
			$length = strlen($word);
			
			if($word[$length - 1] == "'") {
				$word = substr($word, 0, -1);
			}
			
			$length = strlen($word);
			
			if($word[$length - 1] == ",") {
				$word = substr($word, 0, -1);
			}
			
			$length = strlen($word);
			
			if($word[$length - 1] == "]") {
				$word = substr($word, 0, -1);
			}
			
			$length = strlen($word);
			
			if($word[$length - 1] == ",") {
				$word = substr($word, 0, -1);
			}
			
			$length = strlen($word);
			
			if($word[$length - 1] == "'") {
				$word = substr($word, 0, -1);
			}
			
			return $word;
		}
	}

?>