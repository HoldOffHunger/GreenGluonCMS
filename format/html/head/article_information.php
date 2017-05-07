		<!-- Article Information -->
<?php
	$primary_domain = $this->domain_object->GetPrimaryDomain([www=>1, secure=>$this->domain_object->secure]);

	if($this->html_data['description'])
	{

?>

	<meta name="description" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data['description']));
	
	?>">
	<meta property="og:description" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data['description']));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data['abstract'])
	{

?>

	<meta name="abstract" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data['abstract']));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[keywords])
	{

?>

	<meta name="keywords" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[keywords]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[newskeywords])
	{

?>

	<meta name="news_keywords" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[newskeywords]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[classification])
	{

?>

	<meta name="classification" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[classification]));
	
	?>"><?php

	}
	
?>

	<meta property="og:url" content="<?php print($primary_domain . $_SERVER['REQUEST_URI']) ?>">
	