		<!-- Dublin Core -->
<?php

	if($this->html_data[dctitle])
	{

?>

	<meta name="dc.title" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[dctitle]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[dccreator])
	{

?>

	<meta name="dc.creator" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[dccreator]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[dcsubject])
	{

?>

	<meta name="dc.subject" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[dcsubject]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[dcdescription])
	{

?>

	<meta name="dc.description" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[dcdescription]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[dcpublisher])
	{

?>

	<meta name="dc.publisher" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[dcpublisher]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[dccontributor])
	{

?>

	<meta name="dc.contributor" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[dccontributor]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[dcdate])
	{

?>

	<meta name="dc.date" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[dcdate]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[dctype])
	{

?>

	<meta name="dc.type" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[dctype]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[dcformat])
	{

?>

	<meta name="dc.format" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[dcformat]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[dcidentifier])
	{

?>

	<meta name="dc.identifier" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[dcidentifier]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[dcsource])
	{

?>

	<meta name="dc.source" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[dcsource]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[dclanguage])
	{

?>

	<meta name="dc.language" content="<?php
	
		print($this->html_data[dclanguage]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[dcrelation])
	{

?>

	<meta name="dc.relation" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[dcrelation]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[dccoverage])
	{

?>

	<meta name="dc.coverage" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[dccoverage]));
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[dcrights])
	{

?>

	<meta name="dc.rights" content="<?php
	
		print(str_replace('"', '&quot;', $this->html_data[dcrights]));
	
	?>"><?php

	}
	
?>