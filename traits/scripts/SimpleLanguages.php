<?php

	trait SimpleLanguages {
		public function SetSelectableLanguages()
		{
			$this->SelectableLanguages = [];
			
			$this->SelectableLanguages[] = [
				'optionvalue'=>'',
				'optiontitle'=>'',
				'optionmouseover'=>'Select no language for no translation.',
			];
			
			foreach($this->language_object->GetListOfLanguageCodes() as $language_code => $language_name)
			{
				$this->SelectableLanguages[] = [
					'optionvalue'=>$language_code,
					'optiontitle'=>$language_name,
					'optionmouseover'=>'Set Language to ' . $language_name,
				];
			}
			
			return $this->SelectableLanguages;
		}
	}

?>