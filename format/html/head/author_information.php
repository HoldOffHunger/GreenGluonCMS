		<!-- Author Information -->
<?php

	if($this->html_data[author])
	{

?>

	<meta name="author" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[author]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[contact])
	{

?>

	<meta name="contact" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[contact]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[replyto])
	{

?>

	<meta name="reply-to" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[replyto]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[webauthor])
	{

?>

	<meta name="web_author" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[webauthor]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[copyright])
	{

?>

	<meta name="copyright" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[copyright]));
	
	?>"><?php

	}
	
?>