		<!-- Basic HTTP Equiv Tags -->
<?php

	if($this->html_data[contenttype])
	{

?>

	<meta http-equiv="content-type" content="<?php
	
		print($this->html_data[contenttype]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[contentlanguage])
	{

?>

	<meta http-equiv="content-language" content="<?php
	
		print($this->html_data[contentlanguage]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[contentscripttype])
	{

?>

	<meta http-equiv="content-script-type" content="<?php
	
		print($this->html_data[contentscripttype]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[contentstyletype])
	{

?>

	<meta http-equiv="content-style-type" content="<?php
	
		print($this->html_data[contentstyletype]);
	
	?>"><?php

	}
	
?>