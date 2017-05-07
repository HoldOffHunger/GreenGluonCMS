<?php

	trait BaseConversion {
		public function SetConversionBases()
		{
			$this->SelectableValue = array();
			
			foreach(['Base64', 'Hexadecimal', 'EightBit', 'Binary'] as $base)
			{
				$this->SelectableValue[] = array(
					'optionvalue'=>$base,
					'optiontitle'=>$base,
					'optionmouseover'=>'Convert to ' . $base,
				);
			}
			
			return TRUE;
		}
	}

?>