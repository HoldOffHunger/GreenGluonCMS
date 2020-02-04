<?php

		// https://console.developers.google.com/apis/credentials?project=copyleftlicense

	class globals extends defaultglobals {
		public function SetAPIData() {
			return [
				'google'=>[
					'client_id'=>'139023963905-orlvtdsufuphn5lfoalbn0ekee3v5kjr.apps.googleusercontent.com',
					'client_secret'=>'qVeRpLZ1VQCKcxYJD6NKAsIc',
				],
			];
		}
		
		public function MainMenu_Enabled_Search() {
			return TRUE;
		}
	}
	
?>