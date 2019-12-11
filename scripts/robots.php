<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/SimpleErrors.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleORM.php');
	
	class robots extends basicscript
	{
						// Traits
						// ---------------------------------------------
		
		use DBFunctions;
		use SimpleErrors;
		use SimpleForms;
		use SimpleLookupLists;
		use SimpleORM;
		
						// Security Data
						// ---------------------------------------------
		
		public function IsSecure()
		{
			return FALSE;
		}
		
		public function RequiresLogin()
		{
			return FALSE;
		}
		
						// Functionality
						// ---------------------------------------------
		
		public function display()
		{
			$this->SetORM();
			$this->SetRecordTree();
			$this->SetPrimaryHostRecords();
			
			if(!$this->ValidateOrm())
			{
				return FALSE;	# 404
			}
			
			$this->SetMasterRecord();
			$this->SetAllDomains();
			
			$this->SetRobotsTXTAttributes();
			
			if($this->script_format_lower != 'xml')
			{
				$this->SetRobotsTXTFile();
				$this->SetRobotsForHTML();
			}
			else
			{
				$this->SetRobotsForXML();
				
				$this->humanreadable = $this->Param('humanreadable');
			}
			
			$this->FormatErrors();
			
			return TRUE;
		}
		
		public function SetRobotsForXML()
		{
			$domains = [];
			
			$all_domains = $this->all_domains;
			
			foreach($all_domains as $domain)
			{
				$domains[] = [
					domain=>$domain
				];
			}
			
			$this->robots = [
				[
					domains=>$domains,
				],
				$this->robots_attributes,
			];
		}
		
		public function SetRobotsForHTML()
		{
			$robots = [];
			
			$all_domains = $this->all_domains;
			
			$robots[] = ['Domain :', implode(', ', $all_domains)];
			
			$robots_attributes = $this->robots_attributes;
			
			foreach($robots_attributes as $robots_attribute_name => $robots_attribute_value)
			{
				$robots[] = ['<nobr>' . $robots_attribute_name . ' :</nobr>', $robots_attribute_value];
			}
			
			return $this->robots = $robots;
		}
		
		public function SetAllDomains()
		{
			$all_domains = [
				$this->domain_object->primary_domain_lowercased,
			];
			
			$alternate_domains = $this->primary_host_record['AlternateDomain'];
			
			if($alternate_domains)
			{
				if(is_array($alternate_domains))
				{
					sort($alternate_domains);
					foreach($alternate_domains as $alternate_domain)
					{
						$all_domains[] = $alternate_domain;
					}
				}
				else
				{
					$all_domains[] = $alternate_domains;
				}
			}
			
			$this->all_domains = $all_domains;
		}
		
		public function SetRobotsTXTFile()
		{
			$displayable_domains = [];
			
			foreach($this->all_domains as $domain)
			{
				$displayable_domains[] = "#   * " . $domain . "\n";
			}
			
			$printable_domains = implode('', $displayable_domains);
			
			$first_domain = $this->domain_object->primary_domain_lowercased;
			$sitemap_html = 'http://www.' . $first_domain . '/sitemap.php';
			$sitemap_humanreadable = 'http://www.' . $first_domain . '/sitemap.xml?humanreadable=1';
			$robots_html = 'http://www.' . $first_domain . '/robots.php';
			$robots_xml = 'http://www.' . $first_domain . '/robots.xml';
			$robots_xml_humanreadable = 'http://www.' . $first_domain . '/robots.xml?humanreadable=1';
			
			$robots_attributes = $this->robots_attributes;
			$robots_attributes_to_display = [];
			
			foreach($robots_attributes as $robots_attribute_key => $robots_attribute_value)
			{
				$robots_attribute_to_display = $robots_attribute_key .  ':';
				
				if($robots_attribute_value)
				{
					$robots_attribute_to_display .= ' ' . $robots_attribute_value;
				}
				
				$robots_attributes_to_display[] = $robots_attribute_to_display;
			}
			
			$robots_attributes_to_display_imploded = implode("\n", $robots_attributes_to_display);
			
			$comment_line = '######################################################################';
			$copyright_policy_language = '';
			
			if($this->language_object->getLanguageCode() == 'en')
			{
					// Welcome to the Hello123 File for :
				
				$welcome_opening_line = 'Welcome to the';
				$welcome_closing_line = 'Robots.txt File for :';
				$copyright_policy = 'Copyright Policy';
				$please_crawl_line = 'Please crawl the website.';
				
					// Code supporting the content is provided by Hello123.
				
				$code_supporting_the_content_line = 'Code supporting the content is provided by Punkerslut.';
				
					// Please crawl using the sitemap below.  You may also find these sitemap links useful, if you want a human-readable sitemap, available here :
				$crawl_alternate_links_first_line = 'Please crawl using the sitemap below.  You may also';
				$crawl_alternate_links_second_line = 'find these sitemap links useful, if you want a human-readable';
				$crawl_alternate_links_third_line = 'sitemap, available here :';
					
					// If you would like a computer readable version of the Hello123 file, then try here :
				
				$computer_readable_opening_line = 'If you would like a computer readable version of the robots.txt';
				$computer_readable_closing_line = 'file, then try here :';
					
					// If you would like something more human-readable, try here :
					
				$human_readable_line = 'If you would like something more human-readable, try here :';
			}
			else
			{
				switch($this->language_object->getLanguageCode())
				{
					case 'de':	# German
						$welcome_opening_line = 'Willkommen in der';
						$welcome_closing_line = 'Robots.txt Datei Für :';
						$copyright_policy = 'Copyright-Richtlinien';
						$please_crawl_line = 'Bitte kriechen die Website.';
						$code_supporting_the_content_line = '-Code den Inhalt trägt, wird von Punkerslut vorgesehen.';
						$crawl_alternate_links_first_line = 'Bitte kriechen die Sitemap unten.  Sie können auch';
						$crawl_alternate_links_second_line = 'diese Sitemap Links nützlich finden, wenn Sie einen Menschen lesbaren';
						$crawl_alternate_links_third_line = 'Sitemap möchten, finden Sie hier :';
						$computer_readable_opening_line = 'Wenn Sie einen Computer lesbare Version der robots.txt';
						$computer_readable_closing_line = 'Datei möchten, dann versuchen Sie hier :';
						$human_readable_line = 'Wenn Sie etwas mehr Menschen lesbare möchten, klicken Sie bitte hier :';
						$copyright_policy_language = 'Englisch';
						
						break;
					
					case 'es':	# Spanish
						$welcome_opening_line = 'Bienvenido al archivo';
						$welcome_closing_line = 'Robots.txt para :';
						$copyright_policy = 'política de derechos de autor';
						$please_crawl_line = 'Por favor rastrear el sitio web.';
						$code_supporting_the_content_line = 'Código apoyar el contenido es proporcionado por Punkerslut.';
						$crawl_alternate_links_first_line = 'Por favor rastrear usando el mapa a continuación. También puede encontrar';
						$crawl_alternate_links_second_line = 'estos enlaces mapa útil, si quieres un mapa legible por';
						$crawl_alternate_links_third_line = 'humanos, disponible aquí :';
						$computer_readable_opening_line = 'Si desea una versión legible por ordenador del archivo Robots.txt,';
						$computer_readable_closing_line = 'a continuación, tratar aquí :';
						$human_readable_line = 'Si desea algo más legible, probar aquí :';
						$copyright_policy_language = 'Inglés';
						
						break;
						
					case 'fr':	# French
						$welcome_opening_line = 'Bienvenue sur le fichier';
						$welcome_closing_line = 'Robots.txt pour :';
						$copyright_policy = 'Politique du droit d\'auteur';
						$please_crawl_line = 'S\'il vous plaît explorer le site.';
						$code_supporting_the_content_line = 'Code de soutenir le contenu est fourni par Punkerslut.';
						$crawl_alternate_links_first_line = 'S\'il vous plaît ramper en utilisant le plan du site ci-dessous. Vous pouvez également';
						$crawl_alternate_links_second_line = 'trouver ces liens sitemap utile, si vous voulez un plan du site, disponible lisible';
						$crawl_alternate_links_third_line = 'par l\'homme ici :';
						$computer_readable_opening_line = 'Si vous voulez un ordinateur version lisible du fichier robots.txt,';
						$computer_readable_closing_line = 'puis essayez ici :';
						$human_readable_line = 'Si vous voulez quelque chose de plus lisible par l\'homme, essayez ici :';
						$copyright_policy_language = 'Anglais';
						
						break;
						
					case 'ja':	# Japanese
						$welcome_opening_line = '以下のための';
						$welcome_closing_line = 'robots.txtファイルへようこそ ：';
						$copyright_policy = '著作権ポリシー';
						$please_crawl_line = 'ウェブサイトをクロールしてください。';
						$code_supporting_the_content_line = 'コンテンツをサポートするコードはPunkerslutによって提供されています。';
						$crawl_alternate_links_first_line = '下記サイトマップを使用してクロールしてください。ここで、利用可能な';
						$crawl_alternate_links_second_line = '人間が読めるサイトマップをしたい場合にも、便利なこれらのサイトマッ';
						$crawl_alternate_links_third_line = 'プのリンクを見つけることがあります :';
						$computer_readable_opening_line = 'あなたががrobots.txtファイルのコンピュータ読み取り可能なバージ';
						$computer_readable_closing_line = 'ョンをご希望の場合は、こちらを試してみてください :';
						$human_readable_line = 'あなたが何かもっと人間が読める希望の場合は、こちらを試してみてください :';
						$copyright_policy_language = '英語';
						
						break;
						
					case 'it':	# Italian
						$welcome_opening_line = 'Benvenuti al file';
						$welcome_closing_line = 'Robots.txt per :';
						$copyright_policy = 'Informativa sul copyright';
						$please_crawl_line = 'Si prega di eseguire la scansione del sito.';
						$code_supporting_the_content_line = 'Codice sostenere il contenuto è fornito da Punkerslut.';
						$crawl_alternate_links_first_line = 'Si prega di eseguire la scansione utilizzando la mappa del sito in basso. È inoltre possibile';
						$crawl_alternate_links_second_line = 'trovare questi collegamenti sitemap utile, se si desidera una mappa del sito leggibile,';
						$crawl_alternate_links_third_line = 'disponibile qui :';
						$computer_readable_opening_line = 'Se si desidera un computer la versione leggibile del file Robots.txt,';
						$computer_readable_closing_line = 'quindi provare qui :';
						$human_readable_line = 'Se volete qualcosa di più leggibile, provare qui :';
						$copyright_policy_language = 'Inglese';
						
						break;
						
					case 'nl':	# Dutch
						$welcome_opening_line = 'Welkom op de';
						$welcome_closing_line = 'Robots.txt File voor :';
						$copyright_policy = 'beleid van het auteursrecht';
						$please_crawl_line = 'Gelieve kruipen de website.';
						$code_supporting_the_content_line = 'Code ondersteunen van de inhoud door Punkerslut.';
						$crawl_alternate_links_first_line = 'Gelieve te kruipen via het onderstaande sitemap. U kunt ook';
						$crawl_alternate_links_second_line = 'vinden deze sitemap koppelingen handig, als je een leesbare';
						$crawl_alternate_links_third_line = 'sitemap hier beschikbaar willen :';
						$computer_readable_opening_line = 'Als u graag een computer leesbare versie van het bestand ';
						$computer_readable_closing_line = 'Robots.txt, probeer dan hier :';
						$human_readable_line = 'Als u graag iets meer leesbare, probeer hier :';
						$copyright_policy_language = 'Engels';
						
						break;
						
					case 'pl':	# Polish
						$welcome_opening_line = 'Zapraszamy do pliku';
						$welcome_closing_line = 'Robots.txt dla :';
						$copyright_policy = 'Zasady ochrony praw autorskich';
						$please_crawl_line = 'Proszę indeksować strony internetowej.';
						$code_supporting_the_content_line = 'Kod wspieranie treść jest dostarczana przez Punkerslut.';
						$crawl_alternate_links_first_line = 'Proszę indeksować przy użyciu mapa poniżej. Można również znaleźć';
						$crawl_alternate_links_second_line = 'te linki mapa serwisu przydatna, jeśli chcesz mapa, dostępne';
						$crawl_alternate_links_third_line = 'tutaj postaci czytelnej dla człowieka :';
						$computer_readable_opening_line = 'Jeśli chcieliby Państwo otrzymać czytelny dla komputera, wersję';
						$computer_readable_closing_line = 'pliku Robots.txt, a następnie spróbuj tutaj :';
						$human_readable_line = 'Jeśli chcesz coś bardziej czytelny dla człowieka, spróbuj tutaj :';
						$copyright_policy_language = 'Angielski';
						
						break;
						
					case 'pt':	# Portuguese
						$welcome_opening_line = 'Bem-vindo ao arquivo';
						$welcome_closing_line = 'Hello123 para :';
						$copyright_policy = 'política de direitos autorais';
						$please_crawl_line = 'Por favor rastrear o site.';
						$code_supporting_the_content_line = 'Código apoiar o conteúdo é fornecido por Punkerslut.';
						$crawl_alternate_links_first_line = 'Por favor, rastejar usando o mapa do site abaixo. Você também pode';
						$crawl_alternate_links_second_line = ' encontrar esses links mapa do site útil, se você quer um mapa do site';
						$crawl_alternate_links_third_line = 'legível, disponível aqui :';
						$computer_readable_opening_line = 'Se você gostaria de uma versão de computador legível do arquivo Robots.txt,';
						$computer_readable_closing_line = 'e depois tentar aqui :';
						$human_readable_line = 'Se você gostaria de algo mais legível, tente aqui :';
						$copyright_policy_language = 'Inglês';
						
						break;
					
					case 'ru':	# Russian
						$welcome_opening_line = 'Добро пожаловать в файл';
						$welcome_closing_line = 'Robots.txt для :';
						$copyright_policy = 'Политика защиты авторских прав';
						$please_crawl_line = 'Пожалуйста, сканируют веб-сайт.';
						$code_supporting_the_content_line = 'Код поддержки контента обеспечивается Punkerslut.';
						$crawl_alternate_links_first_line = 'Пожалуйста, ползать с помощью карты сайта ниже. Вы также можете';
						$crawl_alternate_links_second_line = 'найти эти ссылки карта сайта полезно, если вы хотите, читаемую карту';
						$crawl_alternate_links_third_line = 'сайта, можно посмотреть здесь :';
						$computer_readable_opening_line = 'Если вы хотите машиночитаемом версию файла Robots.txt,';
						$computer_readable_closing_line = 'то попробуйте здесь :';
						$human_readable_line = 'Если вы хотите что-то более удобной для восприятия человеком, попробуйте здесь :';
						$copyright_policy_language = 'Английский';
						
						break;
						
					case 'tr':	# Turkish
						$welcome_opening_line = 'için Robots.txt Dosya';
						$welcome_closing_line = 'hoş geldiniz :';
						$copyright_policy = 'Telif Hakkı Politikası';
						$please_crawl_line = 'web tarama ediniz.';
						$code_supporting_the_content_line = 'içeriği destekleyen kod Punkerslut tarafından sağlanır.';
						$crawl_alternate_links_first_line = 'Aşağıdaki site haritası kullanarak tarama ediniz. Burada, mevcut';
						$crawl_alternate_links_second_line = 'okunabilir site haritası istiyorsanız da, kullanışlı bu site haritası';
						$crawl_alternate_links_third_line = 'bağlantıları bulabilirsiniz :';
						$computer_readable_opening_line = 'Eğer robots.txt dosyasının bir bilgisayar tarafından okunabilen sürümünü';
						$computer_readable_closing_line = 'isterseniz, o zaman burada deneyin :';
						$human_readable_line = 'Eğer bir şey daha insan tarafından okunabilir istiyorsanız, burada deneyin :';
						$copyright_policy_language = 'İngilizce';
						
						break;
						
					case 'zh':	# Chinese
						$welcome_opening_line = '欢迎来到';
						$welcome_closing_line = 'Robots.txt文件 ：';
						$copyright_policy = '版权声明';
						$please_crawl_line = '请抓取网站。';
						$code_supporting_the_content_line = '支持内容代码由Punkerslut提供。';
						$crawl_alternate_links_first_line = '请抓取使用下面的地图。你也可能会发现这些网站地图的链接有用的，';
						$crawl_alternate_links_second_line = '如果你想要一个人类可读的地图，可在这里 ：';
						$crawl_alternate_links_third_line = '';
						$computer_readable_opening_line = '如果您希望Robots.txt文件的计算机可读的版本，然后试一下 ：';
						$computer_readable_closing_line = '';
						$human_readable_line = '如果您想更多的东西可读，试一下 ：';
						$copyright_policy_language = '英语';
						
						break;
						
					case 'en':	# English
					default:
						$welcome_opening_line = 'Welcome to the';
						$welcome_closing_line = 'Robots.txt File for :';
						$copyright_policy = 'Copyright Policy';
						$please_crawl_line = 'Please crawl the website.';
						$code_supporting_the_content_line = 'Code supporting the content is provided by Punkerslut.';
						$crawl_alternate_links_first_line = 'Please crawl using the sitemap below.  You may also';
						$crawl_alternate_links_second_line = 'find these sitemap links useful, if you want a human-readable';
						$crawl_alternate_links_third_line = 'sitemap, available here :';
						$computer_readable_opening_line = 'If you would like a computer readable version of the robots.txt';
						$computer_readable_closing_line = 'file, then try here :';
						$human_readable_line = 'If you would like something more human-readable, try here :';
						$copyright_policy_language = '';
						
						break;
				}
			}
			
			if($copyright_policy_language)
			{
				$copyright_policy_language = ' (' . $copyright_policy_language . ')';
			}
			
			if($this->primary_host_record['Copyright'])
			{
				$displayable_copyright =
					"#    " . $copyright_policy . $copyright_policy_language . " :\n" .
					"#    " . wordwrap($this->primary_host_record['Copyright'], 60, "\n#    ") .  ".\n" .
					"#\n";
			}
			
			$welcome_text_block = '';
			
			if($welcome_opening_line)
			{
				$welcome_text_block .=
					"#          " . $welcome_opening_line . "\n" ;
			}
			
			if($welcome_closing_line)
			{
				$welcome_text_block .=
					"#       " . $welcome_closing_line . "\n" ;
			}
			
			$crawl_alternate_links_block = '';
			
			if($crawl_alternate_links_first_line)
			{
				$crawl_alternate_links_block .=
					"#    " . $crawl_alternate_links_first_line . "\n" ;
			}
			
			if($crawl_alternate_links_second_line)
			{
				$crawl_alternate_links_block .=
					"#    " . $crawl_alternate_links_second_line . "\n" ;
			}
			
			if($crawl_alternate_links_third_line)
			{
				$crawl_alternate_links_block .=
					"#    " . $crawl_alternate_links_third_line . "\n" ;
			}
			
			$computer_readable_block = '';
			
			if($computer_readable_opening_line)
			{
				$computer_readable_block .=
					"#    " . $computer_readable_opening_line . "\n" ;
			}
			
			if($computer_readable_closing_line)
			{
				$computer_readable_block .=
					"#    " . $computer_readable_closing_line . "\n" ;
			}
			
			return $this->robots_txt_file =
				$comment_line . "\n" .
				"#\n" .
				$welcome_text_block .
				"#\n" .
				$printable_domains .
				"#\n" .
				$comment_line . "\n" .
				"#\n" .
				"#    " . $please_crawl_line . "\n" .
				"#\n" .
				"#    " . $code_supporting_the_content_line . "\n" .
				"#\n" .
				$displayable_copyright .
				$comment_line . "\n" .
				"#\n" .
				$crawl_alternate_links_block .
				"#\n" .
				"#   * " . $sitemap_html . "\n" .
				"#   * " . $sitemap_humanreadable . "\n" .
				"#\n" .
				$comment_line . "\n" .
				"#\n" .
				$computer_readable_block .
				"#\n" .
				"#   * " . $robots_xml . "\n" .
				"#\n" .
				"#    " . $human_readable_line . "\n" .
				"#\n" .
				"#   * " . $robots_html . "\n" .
				"#   * " . $robots_xml_humanreadable . "\n" .
				"#\n" .
				$comment_line . "\n\n" .
				
				$robots_attributes_to_display_imploded .
			"";
		}
		
		public function SetRobotsTXTAttributes()
		{
			$first_domain = $this->domain_object->primary_domain_lowercased;
			
			$sitemap = 'http://www.' . $first_domain . '/sitemap.xml';
			
			$this->robots_attributes = [
				'Crawl-delay'=>'1',
				'User-agent'=>'*',
				'Disallow'=>$this->getDisallowed(),
				'Sitemap'=>$sitemap,
			];
		}
		
		public function getDisallowed() {
			return "\n" . implode("\n", $this->getDisallowedList()) . "\n";
		}
		
		public function getDisallowedList() {
			return [
				'/image/flags/',
				'/image/master-c/',
				'/image/privacy/',
				'/image/social-media/',
				'/image/terms/',
				
				'/image/thumbs-up-right.jpg',		# TODO: improve this, move images to own dir
				'/image/thumbs-down-right.jpg',
				
				'/*.pdf$',
				'/*.txt$',
				'/*.txt?wrapped=1$',
				'/*.rtf$',
				'/*.epub$',
				'/*.daisy$',
				'/*.sgml$',
				'/*.json$',
				'/*.xml$',
				'/*.csv$',
				'/*.latex$',
				'/*.opds$',
				'/*.rdf$',
			];
		}
		
		public function GetHTMLFormatData_Title()
		{
			if(!$this->parent['id'] && $this->master_record && $this->master_record['id'])
			{
				if($this->language_object->getLanguageCode() == 'en')
				{
					$header_title_text = 'Robots File For ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
				}
				else
				{
					$robots_header_language_translations = $this->getListAndItems(['ListTitle'=>'LanguagesRobotsHeader']);
					
					if($robots_header_language_translations[$this->language_object->getLanguageCode()])
					{
						$header_title_text = $robots_header_language_translations[$this->language_object->getLanguageCode()];
					}
					else
					{
						$header_title_text = 'Robots File For ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					}
				}
				
				return $this->header_title_text = $header_title_text;
			}
			return FALSE;
		}
	}
	
?>