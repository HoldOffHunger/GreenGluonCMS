<link rel="alternate"<?php
	
	if($media)
	{
		print(' media="' . $media . '"');
	}
	
	if($language_code)
	{
		print(' hreflang="' . $language_code . '"');
	}

?> href="<?php
	
	$primary_domain_args = array(
		'secure'=>0,
		'www'=>1,
		'lowercased'=>1,
	);

	print($this->domain_object->GetPrimaryDomain($primary_domain_args));
	print($url);
	
	if($language_code)
	{
		print('?language=' . $language_code);
	}

?>">