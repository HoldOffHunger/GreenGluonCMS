<?php

	trait BaseConversion {
		public function SetConversionBases() {
			$this->SelectableValue = [];
			
			foreach(['Base64', 'Hexadecimal', 'EightBit', 'Binary'] as $base) {
				$this->SelectableValue[] = [
					'optionvalue'=>$base,
					'optiontitle'=>$base,
					'optionmouseover'=>'Convert to ' . $base,
				];
			}
			
			return TRUE;
		}
	}

?>