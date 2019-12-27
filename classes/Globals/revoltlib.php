<?php

	class globals extends defaultglobals {
		public function MainMenu_Enabled_Search() {
			return TRUE;
		}
		
		public function SetAPIData() {
			return [
				'google'=>[
					'client_id'=>'31222432483-dlqvmashnrbcrt69pa82j38m2ur5vp5m.apps.googleusercontent.com',
					'client_secret'=>'vLhzS8e9foqWLyg6x_3KWp7W',
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