<?php

	class module_alternateformats extends module_spacing {
		public function __construct($args) {
			$this->that = $args['that'];
			$this->filename = $this->that->script_file;
			if(array_key_exists('audio', $args)) {
				$this->audio = $args['audio'];	// enable audio alternate-formats?
			} else {
				$this->audio = TRUE;
			}
			return TRUE;
		}
		
		public function Display() {
			print('<center>');
			print('<div class="horizontal-center width-85percent">');
			
			if($this->audio) {
							// Audio Player
						
						// -------------------------------------------------------------
				
				print('<div class="border-2px background-color-gray15 margin-5px float-left">');
				print('<div class="margin-5px font-family-arial font-size-150percent">');
				print('<button id="play-text-as-audio" class="font-family-arial font-size-150percent">&#9658; Listen</button>');
				print('<div class="float-right">');
				print('<div class="margin-2px font-size-75percent">');
				print('<select id="voice-selection" class="float-right"></select><br>');
				print('<nobr>');
				print('On : ');
				print('<input type="text" id="start-on" size="4" value="1">');
				print(' of ');
				print('<span id="total-words">0</span>');
				print(' Words');
				print(' (Requires Chrome)');
				print('</nobr>');
				print('</div>');
				print('</div>');
				print('</div>');
				print('</div>');
				
				print('<div class="clear-float"></div>');
			}
			
						// All Formats
					
					// -------------------------------------------------------------
			
			$formats = $this->getFormats();
			
			if($this->that->mobile_friendly)
			{
				$formats[0] = [
					text=>'Standard<br><nobr>PC Format</nobr>',
					image=>'',
					url=>'view.php',
				];
			}
			
			$formats_count = count($formats);
			
			for($i = 0; $i < $formats_count; $i++)
			{
				$format = $formats[$i];
				
				print('<div class="margin-left-5px float-left ' . $format['type'] . '-format-icon" title="">');
				
				if(!$this->that->mobile_friendly)
				{
					print('<a href="');
					print($format['url']);
					print('">');
					
					print('<img width="25" src="');
					print($this->that->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]));
					print('/image/formats/');
					print($format['type']);
					print('-icon.jpg');
					print('">');
					
					print('</a>');
				}
				
				print('</div>');
			}
			print('</div>');
			print('</center>');
			
			print('<div class="clear-float"></div>');
			
			return TRUE;
		}
		
		public function getFormats() {
			return [
				[
					'text'=>'Mobile<br>Version',
					'type'=>'mobile',
					'url'=>$this->filename . '.php?mobilefriendly=1',
				],
				[
					'text'=>'PDF<br>File',
					'type'=>'pdf',
					'url'=>$this->filename . '.pdf',
				],
				[
					'text'=>'Printer<br>Friendly',
					'type'=>'printer-friendly',
					'url'=>$this->filename . '.php?printerfriendly=1',
				],
				[
					'text'=>'Plaintext<br>File',
					'type'=>'plaintext',
					'url'=>$this->filename . '.txt',
				],
				[
					'text'=>'Wrapped<br>Plaintext',
					'type'=>'wrapped-plaintext',
					'url'=>$this->filename . '.txt?wrapped=1',
				],
				[
					'text'=>'Inverted<br>Colors',
					'type'=>'inverted-colors',
					'url'=>$this->filename . '.php?invertedcolors=1',
				],
				[
					'text'=>'RTF<br>File',
					'type'=>'rtf',
					'url'=>$this->filename . '.rtf',
				],
				[
					'text'=>'Epub<br>File',
					'type'=>'epub',
					'url'=>$this->filename . '.epub',
				],
				[
					'text'=>'DAISY<br>Format',
					'type'=>'daisy',
					'url'=>$this->filename . '.daisy',
				],
				[
					'text'=>'SGML<br>Format',
					'type'=>'sgml',
					'url'=>$this->filename . '.sgml',
				],
				[
					'text'=>'JSON<br>Format',
					'type'=>'json',
					'url'=>$this->filename . '.json',
				],
				[
					'text'=>'XML<br>Format',
					'type'=>'xml',
					'url'=>$this->filename . '.xml',
				],
				[
					'text'=>'CSV<br>Format',
					'type'=>'csv',
					'url'=>$this->filename . '.csv',
				],
				[
					'text'=>'Latex<br>Format',
					'type'=>'latex',
					'url'=>$this->filename . '.tex',
				],
				[
					'text'=>'OPDS<br>Format',
					'type'=>'opds',
					'url'=>$this->filename . '.opds',
				],
				[
					'text'=>'RDF<br>Format',
					'type'=>'rdf',
					'url'=>$this->filename . '.rdf',
				],
			];
		}
	}
?>