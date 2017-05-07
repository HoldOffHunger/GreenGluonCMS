		<!-- Server and Technical Credits -->
<?php

	if($this->html_data[designer])
	{

?>

	<meta name="designer" content="<?php
	
		print($this->html_data[designer]);
	
	?>"><?php
	
	}
	
?><?php

	if($this->html_data[generator])
	{

?>

	<meta name="generator" content="<?php
	
		print($this->html_data[generator]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[publisher])
	{

?>

	<meta name="publisher" content="<?php
	
		print($this->html_data[publisher]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[progid])
	{

?>

	<meta name="progid" content="<?php
	
		print($this->html_data[progid]);
	
	?>"><?php

	}
	
?>