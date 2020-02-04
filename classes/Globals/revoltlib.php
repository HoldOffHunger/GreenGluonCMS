<?php

	class globals extends defaultglobals {
		public function MainMenu_Enabled_Search() {
			return TRUE;
		}
		
		public function SetAPIData() {
			return [
				'google'=>[
					'client_id'=>'31222432483-8qvk3uhd27ce8ct5hdhfqb41hh34ihls.apps.googleusercontent.com',
					'client_secret'=>'FB4dPeTj_uCg1Jn_LJPUIlOH',
				],
			];
		}
		
						// Styling Info
						// -------------------------------------------------------------------
		
		public function Styling() {
			return [
				'PrimaryColor'=>'DDDDDD',
				'SecondaryColor'=>'AAAAAA',
			];
		}
	}
	
?>