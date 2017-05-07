		<!-- Search Engine Data -->
<?php

	if($this->html_data[robots])
	{

?>

	<meta name="robots" content="<?php
	
		print($this->html_data[robots]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[cachecontrol])
	{

?>

	<meta name="cache-control" content="<?php
	
		print($this->html_data[cachecontrol]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[pragma])
	{

?>

	<meta name="pragma" content="<?php
	
		print($this->html_data[pragma]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[distribution])
	{

?>

	<meta name="distribution" content="<?php
	
		print($this->html_data[distribution]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[revisitafter])
	{

?>

	<meta name="revisit-after" content="<?php
	
		print($this->html_data[revisitafter]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[expires])
	{

?>

	<meta name="expires" content="<?php
	
		print($this->html_data[expires]);
	
	?>">
	<meta http-equiv="expires" content="<?php
	
		print($this->html_data[expires]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[noemailcollection])
	{

?>

	<meta name="no-email-collection" content="<?php
	
		print($this->html_data[noemailcollection]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[googlebot])
	{

?>

	<meta name="googlebot" content="<?php
	
		print($this->html_data[googlebot]);
	
	?>"><?php

	}
	
?><?php

	if($this->html_data[slurp])
	{

?>

	<meta name="slurp" content="<?php
	
		print($this->html_data[slurp]);
	
	?>"><?php

	}
	
?>

	<link rel="canonical" href="<?php
	
	print($this->domain_object->GetPrimaryDomain([insecure=>1, lowercase=>0, www=>1]));
	print($_SERVER['REDIRECT_URL']);
	
	$page = (int)$this->query_object->Parameter([parameter=>'page']);
	$per_page = (int)$this->query_object->Parameter([parameter=>'perpage']);
	
	if($page || $per_page)
	{
		print('?');
		if($page) {
			print('page=' . $page);
		}
		
		if($page && $per_page)
		{
			print('&');
		}
		
		if($per_page)
		{
			print('perpage=' . $per_page);
		}
	}
	
?>">