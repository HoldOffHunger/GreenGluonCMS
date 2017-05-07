		<!-- Favicon Information -->

<?php

	$displayed = 0;
	
	$primary_domain = $this->domain_object->GetPrimaryDomain([www=>1, secure=>$this->domain_object->secure]);
	
	if(is_file('favicon.ico'))
	{
		print("\t" . '<link rel="icon" href="' . $primary_domain . '/favicon.ico" type="image/x-icon">' . "\n");
		print("\t" . '<link rel="shortcut icon" href="' . $primary_domain . '/favicon.ico" type="image/x-icon">' . "\n");
		$displayed = 1;
	}
	
	if(is_file('apple-touch-icon-57x57.png'))
	{
		print("\t" . '<link rel="apple-touch-icon" sizes="57x57" href="' . $primary_domain . '/apple-touch-icon-57x57.png">' . "\n");
		$displayed = 1;
	}
	
	if(is_file('apple-touch-icon-60x60.png'))
	{
		print("\t" . '<link rel="apple-touch-icon" sizes="60x60" href="' . $primary_domain . '/apple-touch-icon-60x60.png">' . "\n");
		$displayed = 1;
	}
	
	if(is_file('apple-touch-icon-72x72.png'))
	{
		print("\t" . '<link rel="apple-touch-icon" sizes="72x72" href="' . $primary_domain . '/apple-touch-icon-72x72.png">' . "\n");
		$displayed = 1;
	}
	
	if(is_file('apple-touch-icon-76x76.png'))
	{
		print("\t" . '<link rel="apple-touch-icon" sizes="76x76" href="' . $primary_domain . '/apple-touch-icon-76x76.png">' . "\n");
		$displayed = 1;
	}
	
	if(is_file('apple-touch-icon-114x114.png'))
	{
		print("\t" . '<link rel="apple-touch-icon" sizes="114x114" href="' . $primary_domain . '/apple-touch-icon-114x114.png">' . "\n");
		$displayed = 1;
	}
	
	if(is_file('apple-touch-icon-120x120.png'))
	{
		print("\t" . '<link rel="apple-touch-icon" sizes="120x120" href="' . $primary_domain . '/apple-touch-icon-120x120.png">' . "\n");
		$displayed = 1;
	}
	
	if(is_file('apple-touch-icon-144x144.png'))
	{
		print("\t" . '<link rel="apple-touch-icon" sizes="144x144" href="' . $primary_domain . '/apple-touch-icon-144x144.png">' . "\n");
		$displayed = 1;
	}
	
	if(is_file('apple-touch-icon-152x152.png'))
	{
		print("\t" . '<link rel="apple-touch-icon" sizes="152x152" href="' . $primary_domain . '/apple-touch-icon-152x152.png">' . "\n");
		$displayed = 1;
	}
	
	if(is_file('apple-touch-icon-180x180.png'))
	{
		print("\t" . '<link rel="apple-touch-icon" sizes="180x180" href="' . $primary_domain . '/apple-touch-icon-180x180.png">' . "\n");
		$displayed = 1;
	}
	
	if(is_file('favicon-32x32.png'))
	{
		print("\t" . '<link rel="icon" type="image/png" href="' . $primary_domain . '/favicon-32x32.png" sizes="32x32">' . "\n");
		$displayed = 1;
	}
	
	if(is_file('android-chrome-192x192.png'))
	{
		print("\t" . '<link rel="icon" type="image/png" href="' . $primary_domain . '/android-chrome-192x192.png" sizes="192x192">' . "\n");
		$displayed = 1;
	}
	
	if(is_file('favicon-96x96.png'))
	{
		print("\t" . '<link rel="icon" type="image/png" href="' . $primary_domain . '/favicon-96x96.png" sizes="96x96">' . "\n");
		$displayed = 1;
	}
	
	if(is_file('favicon-16x16.png'))
	{
		print("\t" . '<link rel="icon" type="image/png" href="' . $primary_domain . '/favicon-16x16.png" sizes="16x16">' . "\n");
		$displayed = 1;
	}
	
	if(is_file('manifest.json'))
	{
		print("\t" . '<link rel="manifest" href="' . $primary_domain .  '/manifest.json">' . "\n");
		$displayed = 1;
	}
	
	if(is_file('safari-pinned-tab.svg'))
	{
		print("\t" . '<link rel="mask-icon" href="' . $primary_domain . '/safari-pinned-tab.svg" color="#5bbad5">' . "\n");
		$displayed = 1;
	}
	
	if($this->script->primary_host_record['FullImage'] || $this->script->primary_host_record['PrimaryImageLeft'])
	{
		print("\t" . '<meta property="og:image" content="' . $primary_domain . '/image/');
		
		if($this->script->primary_host_record['FullImage'])
		{
			print($this->script->primary_host_record['FullImage']);
		}
		elseif($this->script->primary_host_record['PrimaryImageLeft'])
		{
			print($this->script->primary_host_record['PrimaryImageLeft']);
		}
		
		print('">' . "\n");
	}
	
	if($displayed)
	{
		print("\t" . '<meta name="msapplication-TileColor" content="#da532c">' . "\n");
		print("\t" . '<meta name="msapplication-TileImage" content="' . $primary_domain . '/mstile-144x144.png">' . "\n");
		print("\t" . '<meta name="theme-color" content="#ffffff">');
	}
	else
	{
		print("\t" . '<!-- Not Available -->');
	}

?>