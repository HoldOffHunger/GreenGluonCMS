<?php

	class Error404
	{
		public $cleanser;
		public $script_name;
		public $script_file;
		public $script_type;
		public $script_format;
		
		public function Display($args)
		{
			$this->cleanser = $args[cleanser];
			$this->script_name = $args[scriptname];
			$this->script_file = $args[scriptfile];
			$this->script_type = $args[scripttype];
			$this->script_format = $args[scriptformat];
			print("\n\n<BR><BR>That's going to be a 404, roger!");
		}
	}

?>