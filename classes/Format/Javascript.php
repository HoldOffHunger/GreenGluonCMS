<?php

	class Javascript
	{
		public function __construct()
		{
		}
		
		public function Javascript_HeaderLocation()
		{
			return '../format/html/head/javascript_include.php';
		}
		
		public function Javascript_IncludeLocation()
		{
			return '../format/html/head/javascript_include.php';
		}
		
		public function Javascript_UnavailableLocation()
		{
			return '../format/html/head/unavailable.php';
		}
		
		public function Javascript_Unavailable()
		{
			require('../format/html/basics/spacing/return.html');
			require('../format/html/head/javascript_header.php');
			$this->DisplayDoubleReturns();
			require('../format/html/head/javascript.php');
		}
		
			// HTML Spacing
			// -----------------------------------------------
		
		public function DisplayDoubleReturns()
		{
			require('../format/html/basics/spacing/return.html');
			require('../format/html/basics/spacing/return.html');
		}
	}

?>