		<!-- Server and Technical Details -->
<?php

	if($this->html_data[template])
	{

?>

	<meta name="template" content="<?php
	
		print($this->html_data[template]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[viewport])
	{

?>

	<meta name="viewport" content="<?php
	
		print($this->html_data[viewport]);
	
	?>"><?php

	}
	
?>