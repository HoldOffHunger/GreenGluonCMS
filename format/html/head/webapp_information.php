		<!-- WebApp Information -->

	<meta name="application-name" content="<?php print($this->html_data[applicationname]) ?>">
	<meta name="application-tooltip" content="<?php print($this->html_data[applicationname]) ?>">
<?php
	
	if(is_file('browserconfig.xml'))
	{
		print("\t" . '<meta name="msapplication-config" content="' . $this->domain_object->GetPrimaryDomain([www=>1, secure=>$this->domain_object->secure]) . '/browserconfig.xml">' . "\n");
	}
	
	?>
	<meta name="msapplication-starturl" content="<?php print $this->domain_object->GetPrimaryDomain([www=>1, secure=>$this->domain_object->secure]); ?>/">
	<meta name="msapplication-allowDomainApiCalls" content="true">
	<meta name="msapplication-allowDomainMetaTags" content="true">