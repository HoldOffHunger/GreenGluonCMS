		<!-- Title -->
<?php
	
	if($this->html_data['title'])
	{
	
?>

	<title><?php
			
		print($this->html_data['title']);
			
	?></title>
	
	<meta property="og:title" content="<?php print(str_replace('"', '&quot;', $this->html_data['title'])); ?>"><?php

	}

?>