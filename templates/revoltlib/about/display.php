<?php
		
			// Standard Requires
		
		// -------------------------------------------------------------

	require('../modules/spacing.php');
	
	require('../modules/html/text.php');
	$text = new module_text;
	
	require('../modules/html/form.php');
	$form = new module_form;
	
	require('../modules/html/divider.php');
	$divider = new module_divider;
	
	require('../modules/html/table.php');
	$table = new module_table;
	
	require('../modules/html/list/generic.php');
	$generic_list = new module_genericlist;
	
	require('../modules/html/header.php');
	$header = new module_header;
	
	require('../modules/html/languages.php');
	$languages_args = [
		'languageobject'=>$this->language_object,
		'divider'=>$divider,
		'domainobject'=>$this->domain_object,
	];
	$languages = new module_languages($languages_args);
	
	require('../modules/html/navigation.php');
	$navigation_args = [
		'globals'=>$this->globals,
		'languageobject'=>$this->language_object,
		'divider'=>$divider,
		'domainobject'=>$this->domain_object,
	];
	$navigation = new module_navigation($navigation_args);
	
			// Get Header Language
		
		// -------------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$div_mouseover = $this->master_record['description'][0]['Description'];
	}
	else
	{
		$instructions_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainInstructionsContent']);
		
		if($instructions_language_translations[$this->language_object->getLanguageCode()])
		{
			$div_mouseover = $instructions_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$div_mouseover = $this->master_record['description'][0]['Description'];
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$quote_text = $this->master_record['quote'][0]['Quote'];
	}
	else
	{
		$image_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesMainImageQuote']);
		
		if($image_language_translations[$this->language_object->getLanguageCode()])
		{
			$quote_text = $image_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$quote_text = $this->master_record['quote'][0]['Quote'];
		}
	}
	
			// Display Header
		
		// -------------------------------------------------------------
		
	if($this->primary_host_record['PrimaryColor'])
	{
		$primary_color = $this->primary_host_record['PrimaryColor'];
	}
	else
	{
		$primary_color = '6495ED';
	}
	
	$header_primary_args = [
		'title'=>$this->header_title_text,
		'image'=>$this->primary_host_record['PrimaryImageLeft'],
		'rightimage'=>$this->primary_host_record['PrimaryImageRight'],
		'divmouseover'=>$div_mouseover,
		'imagemouseover'=>'&quot;' . $quote_text . '&quot;',
		'level'=>1,
		'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-' . $primary_color,
		'textclass'=>'padding-0px margin-0px horizontal-center vertical-center padding-top-22px',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
	#	'rightimageenable'=>1,
	];
	
	$header->display($header_primary_args);
	
			// Basic Divider Arguments
		
		// -------------------------------------------------------------
	
	$divider_navigation_args = [
		'class'=>'width-95percent horizontal-center margin-top-14px border-2px',
	];
	
	$divider_instruction_area_start_args = [
		'class'=>'width-50percent border-1px horizontal-center margin-top-22px',
	];
	
	$divider_sectional_area_start_args = [
		'class'=>'width-70percent border-1px horizontal-center margin-top-5px',
	];
	
	$divider_sectional_header_start_args = [
		'class'=>'width-50percent border-1px horizontal-center margin-top-5px',
	];
	
			// Get About Info Language
		
		// -------------------------------------------------------------
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$about_header_title_text = 'More Information About Us';
	}
	else
	{
		$about_us_header_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesAboutUsHeader']);
		
		if($about_us_header_language_translations[$this->language_object->getLanguageCode()])
		{
			$about_header_title_text = $about_us_header_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$about_header_title_text = 'More Information About Us';
		}
	}
	
	if($this->language_object->getLanguageCode() == 'en')
	{
		$about_content_text = $this->master_record['textbody'][0]['Text'];
	}
	else
	{
		$about_us_content_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesAboutUsContent']);
		
		if($about_us_content_language_translations[$this->language_object->getLanguageCode()])
		{
			$about_content_text = $about_us_content_language_translations[$this->language_object->getLanguageCode()];
		}
		else
		{
			$about_content_text = $this->master_record['textbody'][0]['Text'];
		}
	}
	
	$about_content_text = str_replace('<p>', '<p class="margin-0px">', $about_content_text);
	
			// Display About Info
	
		// -------------------------------------------------------------
	
	$divider->displaystart($divider_instruction_area_start_args);
	
	print('<center><h2 class="margin-5px font-family-tahoma">' . $about_header_title_text . ' :</h2></center>');
	
	print('<div class="padding-5px margin-0px horizontal-left font-family-arial">' . $about_content_text . '</div>');
	
	$divider->displayend($divider_end_args);
	
			// Build Images
	
		// -------------------------------------------------------------
	
	$images = [
		[		# image 1
			'creator'=>'Glenn Halog',
			'license'=>'CC BY-NC 2.0',
			'source'=>'https://www.flickr.com/photos/ghalog/6662958693/',
			'filename'=>'fuck-the-police.jpg',
		],
		[		# image 2
			'creator'=>'seven resist',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/seven_resist/3347428926/',
			'filename'=>'slingshot-anarchist.jpg',
		],
		[		# image 3
			'creator'=>'seven resist',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/seven_resist/3347473452/',
			'filename'=>'antifa-versus-police.jpg',
		],
		[		# image 4
			'creator'=>'seven resist',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/seven_resist/3598602058/',
			'filename'=>'united-rebels-against-capitalism.jpg',
		],
		[		# image 5
			'creator'=>'seven resist',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/seven_resist/5983943233/',
			'filename'=>'masked-anarchist-activist.jpg',
		],
		[		# image 6
			'creator'=>'seven resist',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/seven_resist/7522718742/',
			'filename'=>'anarchist-ground-control-do-you-read-me.jpg',
		],
		[		# image 7
			'creator'=>'seven resist',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/seven_resist/12590367633/',
			'filename'=>'anarchists-in-revolt-against-the-state.jpg',
		],
		[		# image 8
			'creator'=>'seven resist',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/seven_resist/13384702074/',
			'filename'=>'the-real-power-is-people.jpg',
		],
		[		# image 9
			'creator'=>'seven resist',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/seven_resist/13385208284/',
			'filename'=>'one-more-molotov-cocktail-for-the-boys-in-blue.jpg',
		],
		[		# image 10
			'creator'=>'seven resist',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/seven_resist/13385186214/',
			'filename'=>'gasmask-for-the-teargas-and-megaphone-for-the-crowds.jpg',
		],
		[		# image 11
			'creator'=>'seven resist',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/seven_resist/16509449339/',
			'filename'=>'rising-up-with-the-anarchists.jpg',
		],
		[		# image 12
			'creator'=>'seven resist',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/seven_resist/31260071831/',
			'filename'=>'the-face-of-vandalism.jpg',
		],
		[		# image 13
			'creator'=>'seven resist',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/seven_resist/36475215781/',
			'filename'=>'the-people-cannot-be-defeated.jpg',
		],
		[		# image 14
			'creator'=>'seven resist',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/seven_resist/25298158097/',
			'filename'=>'subcomandante-marcos-overlooking-the-troops.jpg',
		],
		[		# image 15
			'creator'=>'seven resist',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/seven_resist/39271547565/',
			'filename'=>'ezln-anarchist-sister-of-nature.jpg',
		],
		[		# image 16
			'creator'=>'Hugh D\'Andrade',
			'license'=>'CC BY-NC 2.0',
			'source'=>'https://www.flickr.com/photos/hughillustration/5057736548/',
			'filename'=>'rebel-girl-and-anarchist-literature.jpg',
		],
		[		# image 17
			'creator'=>'Hugh D\'Andrade',
			'license'=>'CC BY-NC 2.0',
			'source'=>'https://www.flickr.com/photos/hughillustration/2247444757/',
			'filename'=>'the-mind-of-the-police-officer-is-always-anger-bewilderment-and-confusion.jpg',
		],
		[		# image 18
			'creator'=>'Hugh D\'Andrade',
			'license'=>'CC BY-NC 2.0',
			'source'=>'https://www.flickr.com/photos/hughillustration/2248240352/',
			'filename'=>'read-more-books-and-revolt-more-often.jpg',
		],
		[		# image 19
			'creator'=>'Hugh D\'Andrade',
			'license'=>'CC BY-NC 2.0',
			'source'=>'https://www.flickr.com/photos/hughillustration/2270424104/',
			'filename'=>'revolution-is-in-this-book.jpg',
		],
		[		# image 20
			'creator'=>'Hugh D\'Andrade',
			'license'=>'CC BY-NC 2.0',
			'source'=>'https://www.flickr.com/photos/hughillustration/3346935577/',
			'filename'=>'capitalism-is-bankrupt.jpg',
		],
		[		# image 21
			'creator'=>'Hugh D\'Andrade',
			'license'=>'CC BY-NC 2.0',
			'source'=>'https://www.flickr.com/photos/hughillustration/6858274948/',
			'filename'=>'we-are-free-when-we-read.jpg',
		],
		[		# image 22
			'creator'=>'Wolfgang Sterneck',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/sterneck/9898165723/',
			'filename'=>'just-reading-all-about-this-anarchism.jpg',
		],
		[		# image 23
			'creator'=>'Wolfgang Sterneck',
			'license'=>'CC BY-NC 2.0',
			'source'=>'https://www.flickr.com/photos/snakegirlproductions/22679910854/',
			'filename'=>'anarchist-free-space.jpg',
		],
		[		# image 24
			'creator'=>'Associazione Aut Aut',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/autautpisa/5309036223/',
			'filename'=>'how-does-my-facemask-look.jpg',
		],
		[		# image 25
			'creator'=>'Toban B.',
			'license'=>'CC BY-NC 2.0',
			'source'=>'https://www.flickr.com/photos/tobanblack/8012517848/',
			'filename'=>'help-wanted-revolutionaries.jpg',
		],
		[		# image 26
			'creator'=>'Raymond Lesley',
			'license'=>'CC BY-NC 2.0',
			'source'=>'https://www.flickr.com/photos/raymondlesley/2738662273/',
			'filename'=>'when-cops-make-love.jpg',
		],
		[		# image 27
			'creator'=>'Jan Slangen',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/janslangen/5556906028/',
			'filename'=>'mona-lisa-with-a-rocket-launcher.jpg',
		],
		[		# image 28
			'creator'=>'mustkuup',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/mustkuup/2595803366/',
			'filename'=>'young-and-old-wise-and-active.jpg',
		],
		[		# image 29
			'creator'=>'Simon Aughton',
			'license'=>'CC BY-NC-SA 2.0',
			'source'=>'https://www.flickr.com/photos/simon_aughton/37158957695/',
			'filename'=>'artwork-painted-with-dirt-and-chemicals.jpg',
		],
		[		# image 30
			'creator'=>'Ronnie23',
			'license'=>'CC BY-NC 2.0',
			'source'=>'https://www.flickr.com/photos/veronika23/2479489586/',
			'filename'=>'banksy-cans-festival.jpg',
		],
		[		# image 31
			'creator'=>'Rachel Lovinger',
			'license'=>'CC BY-NC 2.0',
			'source'=>'https://www.flickr.com/photos/mirka23/33433930351/',
			'filename'=>'keeping-to-myself-like-a-good-introvert.jpg',
		],
	];
	
	$shuffled_images = [];
	shuffle($images);
	
	foreach($images as $image) {
		$shuffled_images[] = $image;
	}
	
	$image_index = 0;
	
			// Display Mission Info
	
		// -------------------------------------------------------------
	
	if($this->master_record['textbody'][1]['Text']) {
		
				// Display Header
				
			// ------------------------------------------------------
		
		$header_image = $shuffled_images[$image_index];
		$image_index++;
			
		print('<center>');
		print('<div class="horizontal-center width-97percent">');

		print('<div class="border-2px background-color-gray15 margin-5px float-left" style="background-image:url(\'/image/' . $header_image['filename'] . '\');" title="Image by ' . $header_image['creator'] . ', ' . $header_image['license'] . ' License">');
		print('<div class="border-2px background-color-gray15 margin-top-50px margin-bottom-50px margin-right-100px margin-left-100px float-left" style="background-color:#FFF;">');
		print('<h2 class="horizontal-left margin-5px font-family-arial font-size-250percent">');
		print('<strong>');
		print('Mission');
		print('</strong>');
		print('</h2>');
		print('</div>');
		print('</div>');
		
		$middle_header_image = $shuffled_images[$image_index];
		$image_index++;
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left" style="background-image:url(\'/image/'  . $middle_header_image['filename'] . '\');" title="Image by ' . $middle_header_image['creator'] . ', ' . $middle_header_image['license'] . ' License">');
		print('<div class="background-color-gray15 margin-top-50px margin-bottom-50px margin-right-100px margin-left-100px float-left" style="opacity:0;">');
		print('<h2 class="horizontal-left margin-5px font-family-arial font-size-250percent">');
		print('<strong>');
		print('History');
		print('</strong>');
		print('</h2>');
		print('</div>');
		print('</div>');
		
		$ending_header_image = $shuffled_images[$image_index];
		$image_index++;
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left" style="background-image:url(\'/image/'  . $ending_header_image['filename'] . '\');" title="Image by ' . $ending_header_image['creator'] . ', ' . $ending_header_image['license'] . ' License">');
		print('<div class="background-color-gray15 margin-top-50px margin-bottom-50px margin-right-100px margin-left-100px float-left" style="opacity:0;">');
		print('<h2 class="horizontal-left margin-5px font-family-arial font-size-250percent">');
		print('<strong>');
		print('History');
		print('</strong>');
		print('</h2>');
		print('</div>');
		print('</div>');
		
		print('</div>');
		print('</center>');
		
		$clear_float_divider_start_args = [
			'class'=>'clear-float',
			'indentlevel'=>5,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
		
				// Display About Info
		
			// -------------------------------------------------------------
		
		$divider->displaystart($divider_sectional_header_start_args);
		
		print('<center><h3 class="margin-5px font-family-tahoma"><em>The RevoltLib Mission :</em></h3></center>');
		
		$divider->displayend($divider_end_args);
		
				// Display Mission Info
				
			// ------------------------------------------------------
		
		$mission_info_text = $this->master_record['textbody'][1]['Text'];
		$mission_info_text = str_replace('<p>', '<p class="margin-0px text-indent-50px">', $mission_info_text);
		
		$divider->displaystart($divider_sectional_area_start_args);
		
		print('<div class="padding-5px margin-0px horizontal-left font-family-arial">' . $mission_info_text . '</div>');
		
		$divider->displayend($divider_end_args);
	}
	
			// Display History Info
	
		// -------------------------------------------------------------
	
	if($this->master_record['textbody'][2]['Text']) {
		
				// Display Header
				
			// ------------------------------------------------------
		
		$header_image = $shuffled_images[$image_index];
		$image_index++;
		
		print('<center>');		
		print('<div class="horizontal-center width-97percent">');
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left" style="background-image:url(\'/image/' . $header_image['filename'] . '\');" title="Image by ' . $header_image['creator'] . ', ' . $header_image['license'] . ' License">');
		print('<div class="border-2px background-color-gray15 margin-top-50px margin-bottom-50px margin-right-100px margin-left-100px float-left" style="background-color:#FFF;">');
		print('<h2 class="horizontal-left margin-5px font-family-arial font-size-250percent">');
		print('<strong>');
		print('History');
		print('</strong>');
		print('</h2>');
		print('</div>');
		print('</div>');
		
		$middle_header_image = $shuffled_images[$image_index];
		$image_index++;
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left" style="background-image:url(\'/image/'  . $middle_header_image['filename'] . '\');" title="Image by ' . $middle_header_image['creator'] . ', ' . $middle_header_image['license'] . ' License">');
		print('<div class="background-color-gray15 margin-top-50px margin-bottom-50px margin-right-100px margin-left-100px float-left" style="opacity:0;">');
		print('<h2 class="horizontal-left margin-5px font-family-arial font-size-250percent">');
		print('<strong>');
		print('History');
		print('</strong>');
		print('</h2>');
		print('</div>');
		print('</div>');
		
		$ending_header_image = $shuffled_images[$image_index];
		$image_index++;
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left" style="background-image:url(\'/image/'  . $ending_header_image['filename'] . '\');" title="Image by ' . $ending_header_image['creator'] . ', ' . $ending_header_image['license'] . ' License">');
		print('<div class="background-color-gray15 margin-top-50px margin-bottom-50px margin-right-100px margin-left-100px float-left" style="opacity:0;">');
		print('<h2 class="horizontal-left margin-5px font-family-arial font-size-250percent">');
		print('<strong>');
		print('History');
		print('</strong>');
		print('</h2>');
		print('</div>');
		print('</div>');
		
		print('</div>');
		print('</center>');
		
		$clear_float_divider_start_args = [
			'class'=>'clear-float',
			'indentlevel'=>5,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
		
				// Display About Info
		
			// -------------------------------------------------------------
		
		$divider->displaystart($divider_sectional_header_start_args);
		
		print('<center><h3 class="margin-5px font-family-tahoma"><em>History of RevoltLib :</em></h3></center>');
		
		$divider->displayend($divider_end_args);
		
				// Display Mission Info
				
			// ------------------------------------------------------
		
		$history_info_text = $this->master_record['textbody'][2]['Text'];
		$history_info_text = str_replace('<p>', '<p class="margin-0px text-indent-50px">', $history_info_text);
		
		$divider->displaystart($divider_sectional_area_start_args);
		
		print('<div class="padding-5px margin-0px horizontal-left font-family-arial">' . $history_info_text . '</div>');
		
		$divider->displayend($divider_end_args);
	}
	
			// Display People Info
	
		// -------------------------------------------------------------
	
	if($this->master_record['textbody'][3]['Text']) {
		
				// Display Header
				
			// ------------------------------------------------------
		
		$header_image = $shuffled_images[$image_index];
		$image_index++;
			
		print('<center>');
		print('<div class="horizontal-center width-97percent">');
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left" style="background-image:url(\'/image/' . $header_image['filename'] . '\');" title="Image by ' . $header_image['creator'] . ', ' . $header_image['license'] . ' License">');
		print('<div class="border-2px background-color-gray15 margin-top-50px margin-bottom-50px margin-right-100px margin-left-100px float-left" style="background-color:#FFF;">');
		print('<h2 class="horizontal-left margin-5px font-family-arial font-size-250percent">');
		print('<strong>');
		print('People');
		print('</strong>');
		print('</h2>');
		print('</div>');
		print('</div>');
		
		$middle_header_image = $shuffled_images[$image_index];
		$image_index++;
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left" style="background-image:url(\'/image/'  . $middle_header_image['filename'] . '\');" title="Image by ' . $middle_header_image['creator'] . ', ' . $middle_header_image['license'] . ' License">');
		print('<div class="background-color-gray15 margin-top-50px margin-bottom-50px margin-right-100px margin-left-100px float-left" style="opacity:0;">');
		print('<h2 class="horizontal-left margin-5px font-family-arial font-size-250percent">');
		print('<strong>');
		print('History');
		print('</strong>');
		print('</h2>');
		print('</div>');
		print('</div>');
		
		$ending_header_image = $shuffled_images[$image_index];
		$image_index++;
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left" style="background-image:url(\'/image/'  . $ending_header_image['filename'] . '\');" title="Image by ' . $ending_header_image['creator'] . ', ' . $ending_header_image['license'] . ' License">');
		print('<div class="background-color-gray15 margin-top-50px margin-bottom-50px margin-right-100px margin-left-100px float-left" style="opacity:0;">');
		print('<h2 class="horizontal-left margin-5px font-family-arial font-size-250percent">');
		print('<strong>');
		print('History');
		print('</strong>');
		print('</h2>');
		print('</div>');
		print('</div>');
		
		print('</div>');
		print('</center>');
		
		$clear_float_divider_start_args = [
			'class'=>'clear-float',
			'indentlevel'=>5,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
		
				// Display About Info
		
			// -------------------------------------------------------------
		
		$divider->displaystart($divider_sectional_header_start_args);
		
		print('<center><h3 class="margin-5px font-family-tahoma"><em>The Person Behind RevoltLib :</em></h3></center>');
		
		$divider->displayend($divider_end_args);
		
				// Display Mission Info
				
			// ------------------------------------------------------
		
		$people_info_text = $this->master_record['textbody'][3]['Text'];
		$people_info_text = str_replace('<p>', '<p class="margin-0px text-indent-50px">', $people_info_text);
		
		$divider->displaystart($divider_sectional_area_start_args);
		
		print('<div class="padding-5px margin-0px horizontal-left font-family-arial">' . $people_info_text . '</div>');
		
		$divider->displayend($divider_end_args);
	}
	
			// Build Favorite Authors
	
		// -------------------------------------------------------------
	
	$favorite_author_ids = [
		11,	# https://www.revoltlib.com/people/mikhail-bakunin/view.php
		26,	# https://www.revoltlib.com/people/alexander-berkman/view.php
		19,	# https://www.revoltlib.com/people/murray-bookchin/view.php
		31,	# https://www.revoltlib.com/people/voltairine-de-cleyre/view.php
		38,	# https://www.revoltlib.com/people/francisco-ferrer/view.php
		13,	# https://www.revoltlib.com/people/emma-goldman/view.php
		14,	# https://www.revoltlib.com/people/peter-kropotkin/view.php
		52,	# https://www.revoltlib.com/people/nestor-makhno/view.php
		15,	# https://www.revoltlib.com/people/errico-malatesta/view.php
		63,	# https://www.revoltlib.com/people/lucy-parsons/view.php
		16,	# https://www.revoltlib.com/people/pierre-joseph-proudhon/view.php
		67,	# https://www.revoltlib.com/people/rudolph-rocker/view.php
		18,	# https://www.revoltlib.com/people/max-stirner/view.php
		72,	# https://www.revoltlib.com/people/leo-tolstoy/view.php
	];
	$min = min(7,count($favorite_author_ids));
	
	$shuffled_author_ids = [];
	shuffle($favorite_author_ids);
	
	foreach($favorite_author_ids as $favorite_author_id) {
		$shuffled_author_ids[] = $favorite_author_id;
		if(count($shuffled_author_ids) == 7) {
			break;
		}
	}

	$this->where = [
		sql=>'WHERE Entry1.id IN (' . implode(',', array_fill(0, $min, '?')) . ')',
		bind=>str_repeat('i', $min),
		value=>$shuffled_author_ids,
	];
	$this->SetChildRecords([
		noassignment=>1,
	]);
	$this->SetTagCounts();
	
			// Display Favorite Authors
	
		// -------------------------------------------------------------
	

				// Display Header
				
			// ------------------------------------------------------
		
		$header_image = $shuffled_images[$image_index];
		$image_index++;
			
		print('<center>');
		print('<div class="horizontal-center width-97percent">');
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left" style="background-image:url(\'/image/' . $header_image['filename'] . '\');" title="Image by ' . $header_image['creator'] . ', ' . $header_image['license'] . ' License">');
		print('<div class="border-2px background-color-gray15 margin-top-50px margin-bottom-50px margin-right-100px margin-left-100px float-left" style="background-color:#FFF;">');
		print('<h2 class="horizontal-left margin-5px font-family-arial font-size-250percent">');
		print('<strong>');
		print('Authors');
		print('</strong>');
		print('</h2>');
		print('</div>');
		print('</div>');
		
		$middle_header_image = $shuffled_images[$image_index];
		$image_index++;
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left" style="background-image:url(\'/image/'  . $middle_header_image['filename'] . '\');" title="Image by ' . $middle_header_image['creator'] . ', ' . $middle_header_image['license'] . ' License">');
		print('<div class="background-color-gray15 margin-top-50px margin-bottom-50px margin-right-100px margin-left-100px float-left" style="opacity:0;">');
		print('<h2 class="horizontal-left margin-5px font-family-arial font-size-250percent">');
		print('<strong>');
		print('History');
		print('</strong>');
		print('</h2>');
		print('</div>');
		print('</div>');
		
		$ending_header_image = $shuffled_images[$image_index];
		$image_index++;
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left" style="background-image:url(\'/image/'  . $ending_header_image['filename'] . '\');" title="Image by ' . $ending_header_image['creator'] . ', ' . $ending_header_image['license'] . ' License">');
		print('<div class="background-color-gray15 margin-top-50px margin-bottom-50px margin-right-100px margin-left-100px float-left" style="opacity:0;">');
		print('<h2 class="horizontal-left margin-5px font-family-arial font-size-250percent">');
		print('<strong>');
		print('History');
		print('</strong>');
		print('</h2>');
		print('</div>');
		print('</div>');
		
		print('</div>');
		print('</center>');
		
		$clear_float_divider_start_args = [
			'class'=>'clear-float',
			'indentlevel'=>5,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
		
				// Display About Info
		
			// -------------------------------------------------------------
		
		$divider->displaystart($divider_sectional_header_start_args);
		
		print('<center><h3 class="margin-5px font-family-tahoma"><em>Favorite Authors :</em></h3></center>');
		
		$divider->displayend($divider_end_args);
		
				// Display Favorite Author Info
				
			// ------------------------------------------------------
		
	$divider->displaystart($divider_sectional_area_start_args);
	
	print('<div class="padding-5px margin-0px horizontal-left font-family-arial">' .
		'<p class="margin-0px text-indent-50px">Below you can find some favorite authors on RevoltLib.</p>'
		. '</div>');
	
	$divider->displayend($divider_end_args);
	
	print('<div class="horizontal-center width-90percent">');
	
	shuffle($this->children);
	
	foreach($this->children as $child)
	{
		print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
		
		unset($display_image);
		
		if($child['image'])
		{
			$child_images = $child['image'];
			$child_image_count = count($child_images);
			if($child_image_count)
			{
				shuffle($child_images);
				$child_image = $child_images[0];
				$display_image = $child_image;
			}
		}
		
		if(!$display_image)
		{
			$display_image = [
				IconFileName=>$this->primary_host_record['PrimaryImageLeft'],
				IconPixelWidth=>200,
				IconPixelHeight=>200,
			];
		}
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left">');
		print('<div class="border-2px background-color-gray15 margin-5px float-left">');
		print('<div class="height-100px width-100px background-color-gray0">');
		print('<div class="vertical-specialcenter">');
		print('<a href="people/' . $child['Code'] . '/view.php">');
		print('<img width="');
		print(ceil($display_image['IconPixelWidth'] / 2));
		print('" height="');
		print(ceil($display_image['IconPixelHeight'] / 2));
		print('" src="');
		print($this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]));
		print('/image/');
		print(implode('/', str_split($display_image['FileDirectory'])));
		print('/');
		print($display_image['IconFileName']);
		print('">');
		print('</a>');
		print('</div>');
		print('</div>');
		print('</div>');
		print('</div>');
		
		$child_title = '<a href="people/' . $child['Code'] . '/view.php">';
		
	#	$creation_date = explode(' ', $child['OriginalCreationDate'])[0];
		
	#	$child_title .= date("M d, Y", strtotime($creation_date));
		$child_title .= $child['ListTitle'];
		$child_title .= '</a>';
		
		$div_mouseover = '';
		
		if($child['textbody'])
		{
			$text_bodies = $child['textbody'];
			
			$text_body_count = count($text_bodies);
			if($text_body_count)
			{
				$first_textbody = $text_bodies[0];
				
				$div_mouseover .= number_format($first_textbody['WordCount']) . ' Words / ' . number_format($first_textbody['CharacterCount']) . ' Characters';
			}
		}
		else
		{
			$grand_children = $child['children'];
			
			if($grand_children && is_array($grand_children))
			{
				$grand_children_count = count($grand_children);
				
				if($grand_children_count)
				{
					$grand_child_display = [];
					
					for($i = 0; $i < count($grand_children); $i++)
					{
						$new_child = $grand_children[$i];
						
						$sort_key = $child['ListTitle'];
						
						if(!$sort_key)
						{
							$sort_key = $child['Title'];
						}
						
						$grand_child_display[$sort_key] = $new_child;
					}
					
					uksort($grand_child_display, "strnatcasecmp");
					
					unset($grand_child);
					foreach($grand_child_display as $single_grand_child)
					{
						if(!$grand_child)
						{
							$full_grand_child = $single_grand_child;
							$grand_child = $single_grand_child['textbody'][0];
						}
					}
					
					$div_mouseover .= $full_grand_child['Title'] . ' : ' . number_format($grand_child['WordCount']) . ' Words / ' . number_format($grand_child['CharacterCount']) . ' Characters';
				}
			}
		}
		
		$header_secondary_args = [
			'title'=>$child_title,
			'divmouseover'=>$div_mouseover,
			'level'=>3,
			'divclass'=>'border-2px background-color-gray15 margin-5px float-left',
			'textclass'=>'padding-0px margin-5px horizontal-left font-family-tahoma',
			'imagedivclass'=>'border-2px margin-5px background-color-gray10',
			'imageclass'=>'border-1px',
			'domainobject'=>$this->domain_object,
			'leftimageenable'=>0,
			'rightimageenable'=>0,
		];
		$header->display($header_secondary_args);
		
		print('<p class="horizontal-left margin-5px font-family-arial">');
		
		$time_frame = '';
		
		if($child['eventdate'])
		{
			$child_event_count = count($child['eventdate']);
			for($i = 0; $i < $child_event_count; $i++)
			{
				$child_event = $child['eventdate'][$i];
				
				if($child_event['Title'] == 'Birth Day')
				{
					$birth_event = $child_event;
				}
				elseif($child_event['Title'] == 'Death Day')
				{
					$death_event = $child_event;
				}
				
				if($birth_event && $death_event)
				{
					$i = $child_event_count;
				}
			}
			
			if($birth_event || $death_event)
			{
				$time_frame .= ' (';
				
				if($birth_event && $birth_event['id'])
				{
					if($birth_event['EventDateTime'] != '0000-00-00 00:00:00')
					{
						$birth_event_date_pieces = explode('-', $birth_event['EventDateTime']);
						$birth_year = $birth_event_date_pieces[0];
						$time_frame .= $birth_year;
					}
					else
					{
						$time_frame .= '?';
					}
				}
				
				$time_frame .= ' - ';
				
				if($death_event && $death_event['id'])
				{
					if($death_event['EventDateTime'] != '0000-00-00 00:00:00')
					{
						$death_event_date_pieces = explode('-', $death_event['EventDateTime']);
						$death_year = $death_event_date_pieces[0];
						$time_frame .= $death_year;
					}
					else
					{
						$time_frame .= '?';
					}
				}
				
				$time_frame .= ') ';
				
				unset($birth_event);
				unset($death_event);
			}
		}
		
		if($time_frame)
		{
			print($time_frame);
		}
		
		if($child['Title'] || $child['Subtitle'])
		{
			if($time_frame)
			{
				print(' ~ ');
			}
			
			print('<strong>');
			print('<a href="people/' . $child['Code'] . '/view.php">');
			
			if($child['Title'])
			{
				print($child['Title']);
			}
			if($child['Title'] && $child['Subtitle'])
			{
				print(' : ');
			}
			if($child['Subtitle'])
			{
				print($child['Subtitle']);
			}
			
			print('</a>');
			print('</strong>');
		}
		
		if($child['description'])
		{
			$description = $child['description'][0];
			
			if($description && $description['Description'])
			{
				print('<em>');
				if($time_frame || $child['Subtitle'])
				{
					print(' : ');
				}
				
				print($description['Description']);
				print(' ');
				print('</em>');
				
				if($description['Source'])
				{
					$source = $description['Source'];
					
					if(strlen($source) > 50)
					{
						$source = substr($source, 0, 50) . '...';
					}
					
					print(' (From : ' . $source . '.)');
				}
			}
		}
		
		if($child['quote'])
		{
			$child_quotes = $child['quote'];
			$child_quotes_count = count($child_quotes);
			$max_limit = $child_quotes_count;
			if($max_limit > 3)
			{
				$max_limit = 3;
			}
			shuffle($child_quotes);
			for($i = 0; $i < $max_limit; $i++)
			{
				$quote = $child_quotes[$i];
				if($quote && $quote['Quote'])
				{
					print(' <br>&bull; ');
					print('"');
					print(str_replace('"', '\'', $quote['Quote']));
					print('"');
					
					if($quote['Source'])
					{
						$source = $quote['Source'];
						
						if(strlen($source) > 50)
						{
							$source = substr($source, 0, 50) . '...';
						}
						
						print(' (From : ' . $source . '.)');
					}
				}
			}
		}
		else
		{
			if($child['textbody'])
			{
				$text_bodies = $child['textbody'];
				
				$text_body_count = count($text_bodies);
				if($text_body_count)
				{
					$text_display = $text_bodies[0]['FirstThousandCharacters'];
					
					$text_display = strip_tags($text_display);
					
					if(strlen($text_display) > 750)
					{
						$text_display = substr($text_display, 0, 750) . '...';
					}
					
					if($text_display)
					{
						print('<br>');
						print($text_display);
						
						if($text_bodies[0]['Source'])
						{
							$source = $text_bodies[0]['Source'];
							
							if(strlen($source) > 50)
							{
								$source = substr($source, 0, 50) . '...';
							}
							
							print(' (From : ' . $source . '.)');
						}
					}
				}
			}
		}
		
		print('</p>');
		
				// Finish Float
			
			// -------------------------------------------------------------
								
		$clear_float_divider_start_args = [
			'class'=>'clear-float',
			'indentlevel'=>5,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
		
				// Tags
			
			// -------------------------------------------------------------
		
		if($child['tag'])
		{
			$tag_count = count($child['tag']);
			
			if($tag_count)
			{
				$tags = $child['tag'];
				$max_limit = $tag_count;
				if($max_limit > 10)
				{
					$max_limit = 10;
				}
				shuffle($tags);
				
				for($i = 0; $i < $max_limit; $i++)
				{
					$tag = $tags[$i];
					print('<div class="border-2px background-color-gray15 margin-left-5px margin-bottom-5px float-left">');
					print('<span class="horizontal-left margin-5px font-family-arial">');
					print('<a href="/view.php?action=browseByTag&tag=' . urlencode($tag['Tag']) . '">');
					print($tag['Tag']);
				
					print(' (');
					print(number_format($this->tag_counts[$tag['Tag']]));
					print(')');
					
					print('</a>');
					print('</span>');
					print('</div>');
				}
						// Finish Float
					
					// -------------------------------------------------------------
										
				$clear_float_divider_start_args = [
					'class'=>'clear-float',
					'indentlevel'=>5,
				];
				
				$divider->displaystart($clear_float_divider_start_args);
				
				$clear_float_divider_end_args = [
					'indentlevel'=>5,
				];
				
				$divider->displayend($clear_float_divider_end_args);
			}
		}
		
		print('</div>');
	}
	
	print('<div class="horizontal-center width-50percent">');
	print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
	print('<h3 class="margin-5px">');
	print('<a href="people/view.php?action=browse">');
	print('<span class="font-family-tahoma">');
	print('Browse the Complete Selection of People');
	print('</span>');
	print('</a>');
	print('</h3>');
	print('</div>');
	print('</div>');
	
	print('</div>');
	
			// Build Favorite Works
	
		// -------------------------------------------------------------
	
	$favorite_work_ids = [
		1376,	# https://www.revoltlib.com/anarchism/the-struggle-against-the-state-and-other-essays/view.php
		1368,	# https://www.revoltlib.com/anarchism/the-abc-of-the-revolutionary-anarchist/view.php
		1369,	# https://www.revoltlib.com/anarchism/the-anarchist-revolution-makhno/view.php
		1987,	# https://www.revoltlib.com/anarchism/a-letter-to-russian-liberals/view.php
		1985,	# https://www.revoltlib.com/anarchism/on-anarchy/view.php
		1989,	# https://www.revoltlib.com/anarchism/patriotism-and-government/view.php
		1990,	# https://www.revoltlib.com/anarchism/thou-shalt-not-kill/view.php
		1991,	# https://www.revoltlib.com/anarchism/to-the-tsar-and-his-assistants/view.php
		1994,	# https://www.revoltlib.com/anarchism/to-the-working-people/view.php
		1063,	# https://www.revoltlib.com/anarchism/the-ego-and-its-own/view.php
		1531,	# https://www.revoltlib.com/anarchism/anarchosyndicalism/view.php
		1541,	# https://www.revoltlib.com/anarchism/nationalism-and-culture/view.php
		921,	# https://www.revoltlib.com/anarchism/what-is-property/view.php
		1479,	# https://www.revoltlib.com/anarchism/the-principles-of-anarchism/view.php
		1478,	# https://www.revoltlib.com/anarchism/to-tramps-the-unemployed-the-disinherited-and-miserable/view.php
		83,	# https://www.revoltlib.com/anarchism/anarchism-and-organization/view.php
		92,	# https://www.revoltlib.com/anarchism/the-anarchist-revolution/view.php
		93,	# https://www.revoltlib.com/anarchism/anarchists-in-the-present-time/view.php
		89,	# https://www.revoltlib.com/anarchism/anarchy/view.php
		103,	# https://www.revoltlib.com/anarchism/mutual-aid/view.php
		94,	# https://www.revoltlib.com/anarchism/syndicalism-and-anarchism/view.php
		88,	# https://www.revoltlib.com/anarchism/towards-anarchism/view.php
		106,	# https://www.revoltlib.com/anarchism/anarchism-kropotkin/view.php
		107,	# https://www.revoltlib.com/anarchism/anarchism-its-philosophy-and-ideal/view.php
		453,	# https://www.revoltlib.com/anarchism/anarchist-communism-its-basis-and-principles/view.php
		132,	# https://www.revoltlib.com/anarchism/an-appeal-to-the-young/view.php
		136,	# https://www.revoltlib.com/anarchism/the-commune-of-paris/view.php
		137,	# https://www.revoltlib.com/anarchism/communism-and-anarchy/view.php
		112,	# https://www.revoltlib.com/anarchism/the-conquest-of-bread/view.php
		171,	# https://www.revoltlib.com/anarchism/fields,-factories,-and-workshops/view.php
		207,	# https://www.revoltlib.com/anarchism/the-great-french-revolution/view.php
		387,	# https://www.revoltlib.com/anarchism/mutual-aid-a-factor-of-evolution/view.php
		461,	# https://www.revoltlib.com/anarchism/anarchism-what-it-really-stands-for/view.php
		466,	# https://www.revoltlib.com/anarchism/francisco-ferrer-and-the-modern-school/view.php
		634,	# https://www.revoltlib.com/anarchism/the-individual,-society-and-the-state/view.php
		535,	# https://www.revoltlib.com/anarchism/my-disillusionment-in-russia/view.php
		641,	# https://www.revoltlib.com/anarchism/socialism-caught-in-the-political-trap/view.php
		642,	# https://www.revoltlib.com/anarchism/syndicalism-the-modern-menace-to-capitalism/view.php
		648,	# https://www.revoltlib.com/anarchism/what-i-believe/view.php
		1297,	# https://www.revoltlib.com/anarchism/the-origins-and-ideals-of-the-modern-school/view.php
		1262,	# https://www.revoltlib.com/anarchism/anarchism-and-american-traditions/view.php
		1264,	# https://www.revoltlib.com/anarchism/direct-action-voltairine-de-cleyre/view.php
		1265,	# https://www.revoltlib.com/anarchism/the-dominant-idea/view.php
		1266,	# https://www.revoltlib.com/anarchism/the-economic-tendency-of-freethought/view.php
		999,	# https://www.revoltlib.com/anarchism/anarchism-past-and-present/view.php
		1002,	# https://www.revoltlib.com/anarchism/the-communist-manifesto-insights-and-problems/view.php
		1004,	# https://www.revoltlib.com/anarchism/the-crisis-in-the-ecology-movement/view.php
		1009,	# https://www.revoltlib.com/anarchism/from-spectacle-to-empowerment-grass-roots-democracy-and-the-peace-process/view.php
		1010,	# https://www.revoltlib.com/anarchism/the-ghost-of-anarcho-syndicalism/view.php
		1015,	# https://www.revoltlib.com/anarchism/listen-marxist!/view.php
		1020,	# https://www.revoltlib.com/anarchism/our-synthetic-environment/view.php
		1040,	# https://www.revoltlib.com/anarchism/society-and-ecology/view.php
		1041,	# https://www.revoltlib.com/anarchism/to-remember-spain/view.php
		1051,	# https://www.revoltlib.com/anarchism/what-is-social-ecology/view.php
		1226,	# https://www.revoltlib.com/anarchism/the-kronstadt-rebellion/view.php
		1134,	# https://www.revoltlib.com/anarchism/now-and-after/view.php
		1168,	# https://www.revoltlib.com/anarchism/prison-memoirs-of-an-anarchist/view.php
		1231,	# https://www.revoltlib.com/anarchism/the-russian-tragedy/view.php
		1244,	# https://www.revoltlib.com/anarchism/the-idea-is-the-thing/view.php
		672,	# https://www.revoltlib.com/anarchism/what-is-authority/view.php
		674,	# https://www.revoltlib.com/anarchism/the-class-war/view.php
		657,	# https://www.revoltlib.com/anarchism/god-and-the-state/view.php
		658,	# https://www.revoltlib.com/anarchism/the-immorality-of-the-state/view.php
		660,	# https://www.revoltlib.com/anarchism/marxism,-freedom-and-the-state/view.php
		663,	# https://www.revoltlib.com/anarchism/the-paris-commune-and-the-idea-of-the-state/view.php
		667,	# https://www.revoltlib.com/anarchism/recollections-on-marx-and-engels/view.php
	];
	$min = min(7,count($favorite_work_ids));
	
	$shuffled_work_ids = [];
	shuffle($favorite_work_ids);
	
	foreach($favorite_work_ids as $favorite_work_id) {
		$shuffled_work_ids[] = $favorite_work_id;
		if(count($shuffled_work_ids) == 7) {
			break;
		}
	}

	$this->where = [
		sql=>'WHERE Entry1.id IN (' . implode(',', array_fill(0, $min, '?')) . ')',
		bind=>str_repeat('i', $min),
		value=>$shuffled_work_ids,
	];
	$this->SetChildRecords([
		noassignment=>1,
	]);
	$this->SetChildRecordsOfChildren();
	$this->SetChildAssociationRecords();
	$this->SetTagCounts();
	$this->children = $this->GetEntriesParents(['entries'=>$this->children]);
	
#	print_r($this->children);
	
			// Display Favorite Works
	
		// -------------------------------------------------------------
		
				// Display Header
				
			// ------------------------------------------------------
		
		$header_image = $shuffled_images[$image_index];
		$image_index++;
			
		print('<center>');
		print('<div class="horizontal-center width-97percent">');
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left" style="background-image:url(\'/image/' . $header_image['filename'] . '\');" title="Image by ' . $header_image['creator'] . ', ' . $header_image['license'] . ' License">');
		print('<div class="border-2px background-color-gray15 margin-top-50px margin-bottom-50px margin-right-100px margin-left-100px float-left" style="background-color:#FFF;">');
		print('<h2 class="horizontal-left margin-5px font-family-arial font-size-250percent">');
		print('<strong>');
		print('Works');
		print('</strong>');
		print('</h2>');
		print('</div>');
		print('</div>');
		
		$middle_header_image = $shuffled_images[$image_index];
		$image_index++;
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left" style="background-image:url(\'/image/'  . $middle_header_image['filename'] . '\');" title="Image by ' . $middle_header_image['creator'] . ', ' . $middle_header_image['license'] . ' License">');
		print('<div class="background-color-gray15 margin-top-50px margin-bottom-50px margin-right-100px margin-left-100px float-left" style="opacity:0;">');
		print('<h2 class="horizontal-left margin-5px font-family-arial font-size-250percent">');
		print('<strong>');
		print('History');
		print('</strong>');
		print('</h2>');
		print('</div>');
		print('</div>');
		
		$ending_header_image = $shuffled_images[$image_index];
		$image_index++;
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left" style="background-image:url(\'/image/'  . $ending_header_image['filename'] . '\');" title="Image by ' . $ending_header_image['creator'] . ', ' . $ending_header_image['license'] . ' License">');
		print('<div class="background-color-gray15 margin-top-50px margin-bottom-50px margin-right-100px margin-left-100px float-left" style="opacity:0;">');
		print('<h2 class="horizontal-left margin-5px font-family-arial font-size-250percent">');
		print('<strong>');
		print('History');
		print('</strong>');
		print('</h2>');
		print('</div>');
		print('</div>');
		
		print('</div>');
		print('</center>');
		
		$clear_float_divider_start_args = [
			'class'=>'clear-float',
			'indentlevel'=>5,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
		
				// Display About Info
		
			// -------------------------------------------------------------
		
		$divider->displaystart($divider_sectional_header_start_args);
		
		print('<center><h3 class="margin-5px font-family-tahoma"><em>Favorite Books, Pamphlets, and Essays :</em></h3></center>');
		
		$divider->displayend($divider_end_args);
		
				// Display Favorite Author Info
				
			// ------------------------------------------------------
		
	$divider->displaystart($divider_sectional_area_start_args);
	
	print('<div class="padding-5px margin-0px horizontal-left font-family-arial">' .
		'<p class="margin-0px text-indent-50px">Below you can find some favorite works on RevoltLib.</p>'
		. '</div>');
	
	$divider->displayend($divider_end_args);

	print('<div class="horizontal-center width-90percent">');
	
	shuffle($this->children);
	
	foreach($this->children as $child)
	{
		print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
		unset($display_image);
		
		$child_url = '';
		
		foreach($child['parents'] as $parent) {
			$child_url .= $parent['Code'] . '/';
		}
		
#		print_r($child['parents']);
		
		if($child['image'])
		{
			$child_images = $child['image'];
			$child_image_count = count($child_images);
			if($child_image_count)
			{
				shuffle($child_images);
				$child_image = $child_images[0];
				$display_image = $child_image;
			}
		}
		
		if(!$display_image)
		{
			$display_image = [
				IconFileName=>$this->primary_host_record['PrimaryImageLeft'],
				IconPixelWidth=>200,
				IconPixelHeight=>200,
			];
		}
		
		print('<div class="border-2px background-color-gray15 margin-5px float-left">');
		print('<div class="border-2px background-color-gray15 margin-5px float-left">');
		print('<div class="height-100px width-100px background-color-gray0">');
		print('<div class="vertical-specialcenter">');
		print('<a href="' . $child_url . 'view.php">');
		print('<img width="');
		print(ceil($display_image['IconPixelWidth'] / 2));
		print('" height="');
		print(ceil($display_image['IconPixelHeight'] / 2));
		print('" src="');
		print($this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]));
		print('/image/');
		print(implode('/', str_split($display_image['FileDirectory'])));
		print('/');
		print($display_image['IconFileName']);
		print('">');
		print('</a>');
		print('</div>');
		print('</div>');
		print('</div>');
		print('</div>');
		
		$child_title = '<a href="' . $child_url . 'view.php">';
		
		$child_title .= $child['ListTitle'];
		$child_title .= '</a>';
		
		$div_mouseover = '';
		
		if($child['textbody'])
		{
			$text_bodies = $child['textbody'];
			
			$text_body_count = count($text_bodies);
			if($text_body_count)
			{
				$first_textbody = $text_bodies[0];
				
				$div_mouseover .= number_format($first_textbody['WordCount']) . ' Words / ' . number_format($first_textbody['CharacterCount']) . ' Characters';
			}
		}
		else
		{
			$grand_children = $child['children'];
			
			if($grand_children && is_array($grand_children))
			{
				$grand_children_count = count($grand_children);
				
				if($grand_children_count)
				{
					$grand_child_display = [];
					
					for($i = 0; $i < count($grand_children); $i++)
					{
						$new_child = $grand_children[$i];
						
						$sort_key = $child['ListTitle'];
						
						if(!$sort_key)
						{
							$sort_key = $child['Title'];
						}
						
						$grand_child_display[$sort_key] = $new_child;
					}
					
					uksort($grand_child_display, "strnatcasecmp");
					
					unset($grand_child);
					foreach($grand_child_display as $single_grand_child)
					{
						if(!$grand_child)
						{
							$full_grand_child = $single_grand_child;
							$grand_child = $single_grand_child['textbody'][0];
						}
					}
					
					$div_mouseover .= $full_grand_child['Title'] . ' : ' . number_format($grand_child['WordCount']) . ' Words / ' . number_format($grand_child['CharacterCount']) . ' Characters';
				}
			}
		}
		
		$header_secondary_args = [
			'title'=>$child_title,
			'divmouseover'=>$div_mouseover,
			'level'=>3,
			'divclass'=>'border-2px background-color-gray15 margin-5px float-left',
			'textclass'=>'padding-0px margin-5px horizontal-left font-family-tahoma',
			'imagedivclass'=>'border-2px margin-5px background-color-gray10',
			'imageclass'=>'border-1px',
			'domainobject'=>$this->domain_object,
			'leftimageenable'=>0,
			'rightimageenable'=>0,
		];
		$header->display($header_secondary_args);
		
		print('<p class="horizontal-left margin-5px font-family-arial">');
		
		$time_frame = '';
		
		if($child['eventdate'])
		{
			$child_event_count = count($child['eventdate']);
			for($i = 0; $i < $child_event_count; $i++)
			{
				$child_event = $child['eventdate'][$i];
					
				if($child_event['Title'] == 'Publication')
				{
					$publication_event = $child_event;
				}
				
				if($publication_event)
				{
					$i = $child_event_count;
				}
			}
			
			if($publication_event)
			{
				if($publication_event['EventDateTime'] != '0000-00-00 00:00:00')
				{
					$event_date_pieces = explode('-', $publication_event['EventDateTime']);
					$year = $event_date_pieces[0];
					$time_frame .= $year;
				}
				else
				{
					$time_frame .= '?';
				}
				
				unset($publication_event);
			}
		}
		
		if($time_frame)
		{
			print($time_frame);
		}
		
		if($child['Title'] || $child['Subtitle'] || $child['association'][0]['entry']['Title'])
		{
			if($time_frame)
			{
				print(' ~ ');
			}
			
			print('<strong>');
			print('<a href="' . $child_url . 'view.php">');
			
			if($child['Title'])
			{
				print($child['Title']);
			}
			if($child['Title'] && $child['Subtitle'])
			{
				print(' : ');
			}
			if($child['Subtitle'])
			{
				print($child['Subtitle']);
			}
			print('</a>');
			
			if($child['association'][0]['entry']['Title'])
			{
				print(', by ');
				print('<a href="people/' . $child['association'][0]['entry']['Code'] . '/view.php">');
				print($child['association'][0]['entry']['Title']);
				print('</a>');
			}
			print('</strong>');
		}
		
		if($child['description'])
		{
			$description = $child['description'][0];
			
			if($description && $description['Description'])
			{
				print('<em>');
				if($time_frame || $child['Subtitle'])
				{
					print(' : ');
				}
				
				print($description['Description']);
				print(' ');
				print('</em>');
				
				if($description['Source'])
				{
					$source = $description['Source'];
					
					if(strlen($source) > 50)
					{
						$source = substr($source, 0, 50) . '...';
					}
					
					print(' (From : ' . $source . '.)');
				}
			}
		}
		
		if($child['quote'])
		{
			$child_quotes = $child['quote'];
			$child_quotes_count = count($child_quotes);
			$max_limit = $child_quotes_count;
			if($max_limit > 3)
			{
				$max_limit = 3;
			}
			shuffle($child_quotes);
			for($i = 0; $i < $max_limit; $i++)
			{
				$quote = $child_quotes[$i];
				if($quote && $quote['Quote'])
				{
					print(' <br>&bull; ');
					print('"');
					print(str_replace('"', '\'', $quote['Quote']));
					print('"');
					
					if($quote['Source'])
					{
						$source = $quote['Source'];
						
						if(strlen($source) > 50)
						{
							$source = substr($source, 0, 50) . '...';
						}
						
						print(' (From : ' . $source . '.)');
					}
				}
			}
		}
		else
		{
			$printed = 0;
			if($child['textbody'])
			{
				$text_bodies = $child['textbody'];
				
				$text_body_count = count($text_bodies);
				if($text_body_count)
				{
					$text_display = $text_bodies[0]['FirstThousandCharacters'];
					
					$text_display = strip_tags($text_display);
					
					if(strlen($text_display) > 750)
					{
						$text_display = substr($text_display, 0, 750) . '...';
					}
					
					if($text_display)
					{
						$printed = 1;
						print('<br>');
						print($text_display);
						
						if($text_bodies[0]['Source'])
						{
							$source = $text_bodies[0]['Source'];
							
							if(strlen($source) > 50)
							{
								$source = substr($source, 0, 50) . '...';
							}
							
							print(' (From : ' . $source . '.)');
						}
					}
				}
			}
			
			if(!$printed)
			{
				$grand_children = $child['children'];
				
				if($grand_children && is_array($grand_children))
				{
					$grand_children_count = count($grand_children);
					
					if($grand_children_count)
					{
						$grand_child_display = [];
						
						for($i = 0; $i < count($grand_children); $i++)
						{
							$new_child = $grand_children[$i];
							
							$sort_key = $child['ListTitle'];
							
							if(!$sort_key)
							{
								$sort_key = $child['Title'];
							}
							
							$grand_child_display[$sort_key] = $new_child;
						}
						
						uksort($grand_child_display, "strnatcasecmp");
						
						unset($grand_child);
						foreach($grand_child_display as $single_grand_child)
						{
							if(!$grand_child)
							{
								$grand_child = $single_grand_child['textbody'][0];
							}
						}
						print(strip_tags($grand_child['FirstThousandCharacters']));
						
						if(strlen($grand_child['FirstThousandCharacters']) == 1000)
						{
							print('...');
						}
					}
				}
			}
		}
		
		print('</p>');
		
				// Finish Float
			
			// -------------------------------------------------------------
								
		$clear_float_divider_start_args = [
			'class'=>'clear-float',
			'indentlevel'=>5,
		];
		
		$divider->displaystart($clear_float_divider_start_args);
		
		$clear_float_divider_end_args = [
			'indentlevel'=>5,
		];
		
		$divider->displayend($clear_float_divider_end_args);
		
				// Tags
			
			// -------------------------------------------------------------
		
		if($child['tag'])
		{
			$tag_count = count($child['tag']);
			
			if($tag_count)
			{
				$tags = $child['tag'];
				$max_limit = $tag_count;
				if($max_limit > 10)
				{
					$max_limit = 10;
				}
				shuffle($tags);
				
				for($i = 0; $i < $max_limit; $i++)
				{
					$tag = $tags[$i];
					print('<div class="border-2px background-color-gray15 margin-left-5px margin-bottom-5px float-left">');
					print('<span class="horizontal-left margin-5px font-family-arial">');
					print('<a href="/view.php?action=browseByTag&tag=' . urlencode($tag['Tag']) . '">');
					print($tag['Tag']);
				
					print(' (');
					print(number_format($this->tag_counts[$tag['Tag']]));
					print(')');
					
					print('</a>');
					print('</span>');
					print('</div>');
				}
						// Finish Float
					
					// -------------------------------------------------------------
										
				$clear_float_divider_start_args = [
					'class'=>'clear-float',
					'indentlevel'=>5,
				];
				
				$divider->displaystart($clear_float_divider_start_args);
				
				$clear_float_divider_end_args = [
					'indentlevel'=>5,
				];
				
				$divider->displayend($clear_float_divider_end_args);
			}
		}
		
		print('</div>');
	}
	
	print('<div class="horizontal-center width-50percent">');
	print('<div class="horizontal-center width-100percent background-color-gray14 border-2px margin-top-5px">');
	print('<h3 class="margin-5px">');
	print('<a href="anarchism/view.php?action=browse">');
	print('<span class="font-family-tahoma">');
	print('Browse the Complete Selection of Anarchist Works');
	print('</span>');
	print('</a>');
	print('</h3>');
	print('</div>');
	print('</div>');
	
	print('</div>');

			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	$bottom_navigation_args = [
		'thispage'=>'About',
	];
	$navigation->DisplayBottomNavigation($bottom_navigation_args);
	
?>