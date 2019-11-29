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
	
	switch($this->language_object->getLanguageCode()) {
		default:
		case 'en':
					// Pronounce That : How do I pronounce that?
			$this->header_title_text = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					
					// I learned pronunciation today.
			$quote_text = $this->master_record['quote'][0]['Quote'];
			
					// Use this web app to learn the pronunciation of words.  You can learn English or international words, and you can enter them by voice or by typing.
			$instructions_content_text = 'Use this web app to learn the pronunciation of words.  You can learn English or international words, and you can enter them by voice or by typing.';
			
					// Instructions
			$instructions_label_text = 'Instructions';
			
					// Pronounce That
			$list_one_main_header_text = 'Pronounce That';
					
					// Enter what you want to pronounce here.
			$list_one_content_text = 'Enter what you want to pronounce here.';
			
					// Share
			$this->share_text = 'Share';
			
					// Share With
			$this->share_with_text = 'Share With';
			
					// Pronounce It!
			$this->button_text = 'Pronounce It!';
			
					// Language
			$this->language_text = 'Language';
			
			// ---------------------------------------
				
				// Use this web app to learn the pronunciation of words.  You can learn English or international words, and you can enter them by voice or by typing.
			$div_mouseover = $this->master_record['description'][0]['Description'];
			
				// More Information About Us
			$about_header_title_text = 'More Information About Us';
			
				/*
				<p>So, you wanted to learn how to pronounce some words, right?  That's what brought to you to this page, isn't it?</p>
<p>Good, I hope it helped.</p>

				So, you wanted to learn how to pronounce some words, right?  That's what brought to you to this page, isn't it?  Good, I hope it helped.
*/
			$about_content_text = $this->master_record['textbody'][0]['Text'];
			
			
			$contact_us_title_text = 'Contact Us';
			$site_creator_text = 'Site Creator';
			$site_created_on_text = 'Site Created On';
			$contact_creator_text = 'Contact Creator';
			
			break;
			
		case 'de':
			$this->header_title_text = 'Das sagen' . ' : ' . 'Wie spreche ich das aus?';
			$quote_text = 'Ich habe heute die Aussprache gelernt.';
			$instructions_content_text = 'Verwenden Sie diese Web-App, um die Aussprache von Wörtern zu erlernen. Sie können englische oder internationale Wörter lernen und sie per Sprache oder durch Eingabe eingeben.';
			$instructions_label_text = 'Anleitung';
			$list_one_main_header_text = 'Das sagen';
			$list_one_content_text = 'Geben Sie hier ein, was Sie aussprechen möchten.';
			$this->share_text = 'Teilen';
			$this->share_with_text = 'Teilen mit';
			$this->button_text = 'Aussprechen!';
			$this->language_text = 'Sprache';
			$div_mouseover = 'Verwenden Sie diese Web-App, um die Aussprache von Wörtern zu erlernen. Sie können englische oder internationale Wörter lernen und sie per Sprache oder durch Eingabe eingeben.';
			$about_header_title_text = 'Weitere Informationen über uns';
			$about_content_text = '<p>Sie wollten also lernen, einige Wörter auszusprechen, richtig? Das hat Ihnen diese Seite gebracht, nicht wahr? Gut, ich hoffe es hat geholfen.</p>';
			$contact_us_title_text = 'Kontaktiere uns';
			$site_creator_text = 'Site Creator';
			$site_created_on_text = 'Site erstellt am';
			$contact_creator_text = 'Kontaktieren Sie den Schöpfer';
	
			break;
			
		case 'es':
			$this->header_title_text = 'Pronunciar eso' . ' : ' . '¿Cómo se pronuncia eso?';
			$quote_text = 'Aprendí la pronunciación hoy.';
			$instructions_content_text = 'Usa esta aplicación web para aprender la pronunciación de las palabras. Puede aprender palabras en inglés o internacionales, y puede ingresarlas por voz o escribiendo.';
			$instructions_label_text = 'Instrucciones';
			$list_one_main_header_text = 'Pronunciar eso';
			$list_one_content_text = 'Escribe lo que quieras pronunciar aquí.';
			$this->share_text = 'Compartir';
			$this->share_with_text = 'Compartir con';
			$this->button_text = 'Pronuncialo!';
			$this->language_text = 'Idioma';
			$div_mouseover = 'Usa esta aplicación web para aprender la pronunciación de las palabras. Puede aprender palabras en inglés o internacionales, y puede ingresarlas por voz o escribiendo.';
			$about_header_title_text = 'Más información sobre nosotros';
			$about_content_text = '<p>Entonces, querías aprender a pronunciar algunas palabras, ¿verdad? Eso es lo que te trajo a esta página, ¿no es así? Bien, espero que haya ayudado.</p>';
			$contact_us_title_text = 'Contáctenos';
			$site_creator_text = 'Creador del sitio';
			$site_created_on_text = 'Sitio creado en';
			$contact_creator_text = 'Contactar con el creador';

			break;
			
		case 'fr':
			$this->header_title_text = 'Prononcez ça' . ' : ' . 'Comment est-ce que je prononce ça?';
			$quote_text = "J'ai appris la prononciation aujourd'hui.";
			$instructions_content_text = 'Utilisez cette application Web pour apprendre la prononciation des mots. Vous pouvez apprendre des mots anglais ou internationaux et vous pouvez les saisir à la voix ou en les tapant.';
			$instructions_label_text = 'Instructions';
			$list_one_main_header_text = 'Prononcez ça';
			$list_one_content_text = 'Entrez ce que vous voulez prononcer ici.';
			$this->share_text = 'Partager';
			$this->share_with_text = 'Partager avec';
			$this->button_text = 'Prononce-le!';
			$this->language_text = 'La langue';
			$div_mouseover = 'Utilisez cette application Web pour apprendre la prononciation des mots. Vous pouvez apprendre des mots anglais ou internationaux et vous pouvez les saisir à la voix ou en les tapant.';
			$about_header_title_text = 'Plus d\'informations sur nous';
			$about_content_text = "<p>Donc, vous vouliez apprendre à prononcer quelques mots, non? C'est ce qui vous a amené à cette page, n'est-ce pas? Bien, j'espère que ça a aidé.</p>";
			$contact_us_title_text = 'Contactez nous';
			$site_creator_text = 'Créateur de site';
			$site_created_on_text = 'Site créé le';
			$contact_creator_text = 'Contact créateur';

			break;
			
		case 'ja':
			$this->header_title_text = 'それを発音する' . ' : ' . 'それをどのように発音するのですか？';
			$quote_text = '私は今日の発音を学んだ。';
			$instructions_content_text = '単語の発音を学ぶには、このWebアプリケーションを使用してください。 英語や国際語を学ぶことができます。声や入力で入力することができます。';
			$instructions_label_text = '指示';
			$list_one_main_header_text = 'それを発音する';
			$list_one_content_text = 'ここに発音したいものを入力してください。';
			$this->share_text = '分け合う';
			$this->share_with_text = 'と共有する';
			$this->button_text = 'それを発音してください！';
			$this->language_text = '言語';
			$div_mouseover = '単語の発音を学ぶには、このWebアプリケーションを使用してください。 英語や国際語を学ぶことができます。声や入力で入力することができます。';
			$about_header_title_text = '私たちについてのより詳しい情報';
			$about_content_text = '<p>だから、あなたはいくつかの言葉の発音の仕方を学びたがっていますよね？ それがこのページにあなたをもたらしたものですね。 良い、私はそれが助けて願っています。</p>';
			$contact_us_title_text = 'お問い合わせ';
			$site_creator_text = 'サイトクリエイター';
			$site_created_on_text = '作成されたサイト';
			$contact_creator_text = 'クリエイターに連絡する';

			break;
			
		case 'it':
			$this->header_title_text = 'Pronuncia quello' . ' : ' . 'Come lo pronuncio?';
			$quote_text = 'Ho imparato la pronuncia oggi.';
			$instructions_content_text = 'Usa questa app Web per imparare la pronuncia delle parole. Puoi imparare parole inglesi o internazionali e puoi inserirle a voce o digitando.';
			$instructions_label_text = 'Istruzioni';
			$list_one_main_header_text = 'Pronuncia quello';
			$list_one_content_text = 'Inserisci ciò che vuoi pronunciare qui.';
			$this->share_text = 'Condividi';
			$this->share_with_text = 'Condividi con';
			$this->button_text = 'Pronuncialo!';
			$this->language_text = 'Linguaggio';
			$div_mouseover = 'Usa questa app Web per imparare la pronuncia delle parole. Puoi imparare parole inglesi o internazionali e puoi inserirle a voce o digitando.';
			$about_header_title_text = 'Ulteriori informazioni su di noi';
			$about_content_text = "<p>Quindi, volevi imparare come pronunciare alcune parole, giusto? Questo è quello che ti ha portato in questa pagina, non è vero? Bene, spero che sia stato d'aiuto.</p>";
			$contact_us_title_text = 'Contattaci';
			$site_creator_text = 'Site Creator';
			$site_created_on_text = 'Sito creato';
			$contact_creator_text = 'Creatore di contatti';

			break;
			
		case 'nl':
			$this->header_title_text = 'Spreek Dat uit' . ' : ' . 'Hoe spreek ik dat uit?';
			$quote_text = 'Ik heb vandaag uitspraak geleerd.';
			$instructions_content_text = 'Gebruik deze web-app om de uitspraak van woorden te leren. Je kunt Engelse of internationale woorden leren, en je kunt ze met stem of door typen invoeren.';
			$instructions_label_text = 'Instructies';
			$list_one_main_header_text = 'Spreek Dat uit';
			$list_one_content_text = 'Voer in wat je hier wilt uitspreken.';
			$this->share_text = 'Delen';
			$this->share_with_text = 'Delen met';
			$this->button_text = 'Spreek het uit!';
			$this->language_text = 'Taal';
			$div_mouseover = 'Gebruik deze web-app om de uitspraak van woorden te leren. Je kunt Engelse of internationale woorden leren, en je kunt ze met stem of door typen invoeren.';
			$about_header_title_text = 'Meer informatie over ons';
			$about_content_text = '<p>Dus je wilde leren hoe je een paar woorden uitspreekt, toch? Dat is wat u naar deze pagina bracht, is het niet? Goed, ik hoop dat het geholpen heeft.</p>';
			$contact_us_title_text = 'Neem contact met ons op';
			$site_creator_text = 'Site Creator';
			$site_created_on_text = 'Site gemaakt op';
			$contact_creator_text = 'Neem contact op met Creator';

			break;
			
		case 'pl':
			$this->header_title_text = 'Wymowa That' . ' : ' . 'Jak mam to wymówić?';
			$quote_text = 'Dziś nauczyłem się wymowy.';
			$instructions_content_text = 'Użyj tej aplikacji internetowej, aby nauczyć się wymowy słów. Możesz uczyć się angielskich lub międzynarodowych słów i możesz je wprowadzać głosowo lub przez wpisywanie.';
			$instructions_label_text = 'Instrukcje';
			$list_one_main_header_text = 'Wymów to';
			$list_one_content_text = 'Wpisz tutaj, co chcesz wymawiać.';
			$this->share_text = 'Dzielić';
			$this->share_with_text = 'Udostępnij za pomocą';
			$this->button_text = 'Wymów to!';
			$this->language_text = 'Język';
			$div_mouseover = 'Użyj tej aplikacji internetowej, aby nauczyć się wymowy słów. Możesz uczyć się angielskich lub międzynarodowych słów i możesz je wprowadzać głosowo lub przez wpisywanie.';
			$about_header_title_text = 'Więcej informacji o nas';
			$about_content_text = '<p>Więc chciałeś nauczyć się wymawiać niektóre słowa, prawda? To właśnie doprowadziło cię do tej strony, prawda? Dobrze, mam nadzieję, że pomogło.</p>';
			$contact_us_title_text = 'Skontaktuj się z nami';
			$site_creator_text = 'Twórca strony';
			$site_created_on_text = 'Utworzona witryna';
			$contact_creator_text = 'Skontaktuj się z twórcą';

			break;
			
		case 'pt':
			$this->header_title_text = 'Pronuncie isso' . ' : ' . 'Como eu pronuncia isso?';
			$quote_text = 'Eu aprendi a pronúncia hoje.';
			$instructions_content_text = 'Use este aplicativo da web para aprender a pronúncia das palavras. Você pode aprender palavras em inglês ou internacionais e pode inseri-las por voz ou digitando.';
			$instructions_label_text = 'Instruções';
			$list_one_main_header_text = 'Pronuncie isso';
			$list_one_content_text = 'Digite o que você deseja pronunciar aqui.';
			$this->share_text = 'Compartilhar';
			$this->share_with_text = 'Compartilhar com';
			$this->button_text = 'Pronuncie-o!';
			$this->language_text = 'Língua';
			$div_mouseover = 'Use este aplicativo da web para aprender a pronúncia das palavras. Você pode aprender palavras em inglês ou internacionais e pode inseri-las por voz ou digitando.';
			$about_header_title_text = 'Mais informações sobre nós';
			$about_content_text = '<p>Então, você queria aprender a pronunciar algumas palavras, certo? Isso é o que trouxe a você para esta página, não é? Bom, espero que tenha ajudado.</p>';
			$contact_us_title_text = 'Contate-Nos';
			$site_creator_text = 'Criador do site';
			$site_created_on_text = 'Site criado em';
			$contact_creator_text = 'Entre em contato com o Criador';

			break;
			
		case 'ru':
			$this->header_title_text = 'Произнесите это' . ' : ' . 'Как мне это объявить?';
			$quote_text = 'Я изучил произношение сегодня.';
			$instructions_content_text = 'Используйте это веб-приложение, чтобы узнать произношение слов. Вы можете изучать английские или международные слова, и вы можете вводить их голосом или путем ввода.';
			$instructions_label_text = 'инструкции';
			$list_one_main_header_text = 'Произнесите это';
			$list_one_content_text = 'Введите то, что вы хотите произнести здесь';
			$this->share_text = 'Поделиться';
			$this->share_with_text = 'Поделиться с';
			$this->button_text = 'Произнесите это!';
			$this->language_text = 'язык';
			$div_mouseover = 'Используйте это веб-приложение, чтобы узнать произношение слов. Вы можете изучать английские или международные слова, и вы можете вводить их голосом или путем ввода.';
			$about_header_title_text = 'Дополнительная информация';
			$about_content_text = '<p>Итак, вы хотели научиться произносить некоторые слова, не так ли? Это то, что принесло вам эту страницу, не так ли? Хорошо, надеюсь, это помогло.</p>';
			$contact_us_title_text = 'Связаться с нами';
			$site_creator_text = 'Создатель сайта';
			$site_created_on_text = 'Сайт создан';
			$contact_creator_text = 'Создатель контакта';

			break;
			
		case 'tr':
			$this->header_title_text = 'Bunu telaffuz et' . ' : ' . 'Bunu nasıl telaffuz edebilirim?';
			$quote_text = 'Bugün telaffuz öğrendim.';
			$instructions_content_text = 'Kelimelerin telaffuz öğrenmek için bu web uygulamasını kullanın. İngilizce veya uluslararası kelimeleri öğrenebilir ve bunları sesle veya yazarak girebilirsiniz.';
			$instructions_label_text = 'Talimatlar';
			$list_one_main_header_text = 'Telaffuz';
			$list_one_content_text = 'Burada ne telaffuz etmek istediğinizi girin.';
			$this->share_text = 'Paylaşmak';
			$this->share_with_text = 'İle paylaş.';
			$this->button_text = 'Telaffuz et!';
			$this->language_text = 'Dil';
			$div_mouseover = 'Kelimelerin telaffuz öğrenmek için bu web uygulamasını kullanın. İngilizce veya uluslararası kelimeleri öğrenebilir ve bunları sesle veya yazarak girebilirsiniz.';
			$about_header_title_text = 'Hakkımızda Daha Fazla Bilgi';
			$about_content_text = '<p>Yani, bazı kelimelerin nasıl telaffuz edildiğini öğrenmek istediniz, değil mi? Seni bu sayfaya getiren şey bu değil mi? Güzel, umarım yardımcı olur.</p>';
			$contact_us_title_text = 'Bizimle iletişime geçin';
			$site_creator_text = 'Site Oluşturucu';
			$site_created_on_text = 'Site Oluşturuldu';
			$contact_creator_text = 'İletişim Oluşturucu';

			break;
			
		case 'zh':
			$this->header_title_text = '发音为' . ' : ' . '我怎么发音呢？';
			$quote_text = '我今天学会了发音。';
			$instructions_content_text = '使用此Web应用程序来学习单词的发音。 您可以学习英语或国际单词，也可以通过语音输入或输入。';
			$instructions_label_text = '说明';
			$list_one_main_header_text = '发音为';
			$list_one_content_text = '在此处输入您要发音的内容。';
			$this->share_text = '分享';
			$this->share_with_text = '与某人分享';
			$this->button_text = '发表它！';
			$this->language_text = '语言';
			$div_mouseover = '使用此Web应用程序来学习单词的发音。 您可以学习英语或国际单词，也可以通过语音输入或输入。';
			$about_header_title_text = '关于我们的更多信息';
			$about_content_text = '<p>所以，你想学习如何发音一些，对吧？ 这就是给你带来这个页面的原因，不是吗？ 好，我希望它有所帮助。</p>';
			$contact_us_title_text = '联系我们';
			$site_creator_text = '网站创建者';
			$site_created_on_text = '网站创建';
			$contact_creator_text = '联系创作者';
			break;
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
	
			// Display About Info
		
		// -------------------------------------------------------------
	
	$divider->displaystart($divider_instruction_area_start_args);
	
	$element_text_args = [
		text=>'<center><h2 class="margin-5px font-family-tahoma">' . $contact_us_title_text . ' :</h2></center>',
		indentlevel=>5,
	];
	$text->Display($element_text_args);
	
	$contact_creator_value = $this->primary_host_record['Contact'];
	if(strpos($contact_creator_value, '@') !== false) {
		$contact_creator_value = '<a href="mailto:' . $contact_creator_value . '">' . $contact_creator_value . '</a>';
	}
	
	$element_text_args = [
		text=>
			'<div class="padding-5px horizontal-left font-family-arial">' .
			'<p class="margin-0px margin-top-5px"><strong>' . $site_creator_text . ' :</strong> ' . $this->primary_host_record['Creator'] . '</p>' .
			'<p class="margin-0px margin-top-5px"><strong>' . $site_created_on_text . ' :</strong> ' . $this->primary_host_record['PublicReleaseDate'] . '</p>' .
			'<p class="margin-0px margin-top-5px"><strong>' . $contact_creator_text . ' :</strong> ' . $contact_creator_value . '</p>' .
			'</div>',
		indentlevel=>5,
	];
	$text->Display($element_text_args);
	
	$divider->displayend($divider_end_args);
	
			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	$bottom_navigation_args = [
		'thispage'=>'Contact',
	];
	$navigation->DisplayBottomNavigation($bottom_navigation_args);
	
?>