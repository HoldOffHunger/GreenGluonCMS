<?php

	class HTML_Navigation
	{
		public $domain_object;
		public function __construct ()
		{
			$this->domain_object = $args[domainobject];
		}
		
		public function Display()
		{
			/*
			require('../format/html/navigation/start_navigation.html');
			$options = $this->Website_Options();
			foreach($options as $option)
			{
				$label = $option[label];
				$id = $option[id];
				$url = $option[url];
				$mouseover = $option[mouseover];
				require('../format/html/navigation/navigation_cell.php');
			#	print("<PRE>");
			#	print_r($option);
			#	print("</PRE>");
			}
		#	print("<PRE>");
		#	print_r($options);
		#	print("</PRE>");
			require('../format/html/navigation/end_navigation.html');
			
			$this->DisplayDoubleReturns();
			
			require('../format/html/navigation/start_content.html');
			
			$this->DisplayDoubleReturns();
			*/
		}
		
		public function Website_Options()
		{
			return array(
				array(
					'label'=>'Home',
					'id'=>'home',
					'url'=>'',
					'mouseover'=>'the home',
				),
				array(
					'label'=>'Blogs',
					'id'=>'blogs',
					'url'=>'blogs.php',
					'mouseover'=>'bloggiest of blogs',
				),
				array(
					'label'=>'Video',
					'id'=>'video',
					'url'=>'video.php',
					'mouseover'=>'all of the revolutionary videos you could possibly handle',
				),
			);
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