		<!-- Classifications -->
<?php

	if($this->html_data[doctype])
	{

?>

	<meta name="doc-type" content="<?php
	
		print($this->html_data[doctype]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[docclass])
	{

?>

	<meta name="doc-class" content="<?php
	
		print($this->html_data[docclass]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[docrights])
	{

?>

	<meta name="doc-rights" content="<?php
	
		print($this->html_data[docrights]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[resourcetype])
	{

?>

	<meta name="resource-type" content="<?php
	
		print($this->html_data[resourcetype]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[rating])
	{

?>

	<meta name="rating" content="<?php
	
		print($this->html_data[rating]);
	
	?>"><?php

	}
	
?>