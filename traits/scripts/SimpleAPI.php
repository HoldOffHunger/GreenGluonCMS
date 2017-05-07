<?php

	trait SimpleAPI {
		public function SetAPI()
		{
			require('../classes/API/SearchEngine.php');
			
			$this->search_engine = new SearchEngine();
		}
	}
?>