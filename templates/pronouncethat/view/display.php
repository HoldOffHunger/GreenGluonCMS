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
	
			// Internationalism
		
		// -------------------------------------------------------------
			
			/*
				
				'de',		// German
				'en',		// English
				'es',		// Spanish
				'fr',		// French
				'ja',		// Japanese
				'it',		// Italian
				'nl',		// Dutch
				'pl',		// Polish
				'pt',		// Portuguese
				'ru',		// Russian
				'tr',		// Turkish
				'zh',		// Chinese
			
			*/
	
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
			break;
	}
	
			// Share Package
		
		// -------------------------------------------------------------
	
	require('../modules/html/socialmediasharelinks.php');
	$social_media_share_links_args = [
		'globals'=>$this->globals,
		'languageobject'=>$this->language_object,
		'divider'=>$divider,
		'domainobject'=>$this->domain_object,
		'socialmedia'=>$this->social_media,
		'socialmediasharelinkargs'=>[
			url=>$this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]),
			title=>$this->header_title_text,
			desc=>$instructions_content_text,
			provider=>$this->domain_object->primary_domain_lowercased,
		],
	];
	
	$social_media_share_links = new module_socialmediasharelinks($social_media_share_links_args);
	
			// Display Header
		
		// -------------------------------------------------------------
		
	$header_primary_args = [
		'title'=>$this->header_title_text,
		'image'=>'2/0/s/8/pronounce-that-icon.jpg',
		'rightimage'=>$this->primary_host_record['PrimaryImageRight'],
		'divmouseover'=>$instructions_content_text,
		'imagemouseover'=>'&quot;' . $quote_text . '&quot;',
		'level'=>1,
		'divclass'=>'horizontal-center width-100percent border-2px margin-top-5px background-color-6495ED',
		'textclass'=>'padding-0px margin-0px horizontal-center vertical-center padding-top-22px margin-bottom-10px',
		'imagedivclass'=>'border-2px margin-5px background-color-gray10',
		'imageclass'=>'border-1px',
		'domainobject'=>$this->domain_object,
		'leftimageenable'=>1,
		'rightimageenable'=>1,
	];
	
	$header->display($header_primary_args);
	
			// Basic Divider Arguments
		
		// -------------------------------------------------------------
	
	$divider_main_area_start_args = [
		'class'=>'width-90percent horizontal-center padding-top-22px',
	];
	
	$divider_navigation_args = [
		'class'=>'width-95percent horizontal-center margin-top-14px border-2px',
	];
	
	$divider_secondary_area_start_args = [
		'class'=>'width-90percent horizontal-center',
	];
	
	$divider_instruction_area_start_args = [
		'class'=>'width-50percent border-1px horizontal-center margin-top-22px',
	];
	
	$divider_instruction_area_text_args = [
		'class'=>'width-95percent horizontal-left',
	];
	
	$divider_note_args = [
		'class'=>'width-50percent horizontal-center float-left',
	];
	
	$divider_end_args = [
		'indentlevel'=>1,
	];
	
			// Display Instructions
		
		// -------------------------------------------------------------
	
	$divider->displaystart($divider_instruction_area_start_args);
	
	$divider->displaystart($divider_instruction_area_text_args);
	
	$element_text_args = [
		text=>'<div class="padding-5px"><span class="font-family-tahoma"><b>' . $instructions_label_text . ' :</b> ' . $instructions_content_text . '</span></div>',
		indentlevel=>5,
	];
	$text->Display($element_text_args);
	
	$divider->displayend($divider_end_args);
	
	$divider->displayend($divider_end_args);
	
			// Display Input / Output Areas
		
		// -------------------------------------------------------------
	
	print('<BR>');
	print('<BR>');
	
	print('<center><h4 class="margin-0px padding-0px font-family-tahoma">' . $list_one_main_header_text . '</h4>');
	
	print('<table>');
	print('<tr><td>');
	
	print('<center>');
	
	print('<input type="button" value="');
	print($this->button_text);
	print('" id="pronounce-it" class="margin-bottom-10px">');
	print('<br>');
	/*
	print('<input type="button" value="Use Microphone" id="use-microphone" class="margin-bottom-10px">');
	print('<br>');
	*/
	
	print('<span class="font-family-tahoma"><nobr>');
	print($this->language_text);
	print(' : ');
	
	print('<select id="language">');
	print('<option value="en-us">English</option>');
	print('</select>');
	
	print('</nobr>');
	print('</span>');
	
	print('</center>');
	
	print('</td><td>');
	print('<textarea rows="5" cols="70" class="input-area" placeholder="' . $list_one_content_text . '">'); 
	print('</textarea>');
	print('</td></tr>');
	print('</table>');
	print('</center>');
	
	print('<BR>');
	print('<BR>');
	
			// Display Similar Sites
		
		// -------------------------------------------------------------
	
	require('../modules/html/similarsites-satellites.php');
	
	$similar_site_args = [
		site=>$this->domain_object->primary_domain_lowercased,
		language=>$this->language_object,
	];
	$similar_sites = new module_similarsites_satellites($similar_site_args);
	
	$similar_sites->display();
	
			// Display Social Media Options
		
		// -------------------------------------------------------------
	
	$social_media_share_links->display();
	
			// Display Language Options
		
		// -------------------------------------------------------------
	
	$languages->display();
	
			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	$bottom_navigation_args = [
		'thispage'=>'Home',
	];
	$navigation->DisplayBottomNavigation($bottom_navigation_args);
	
?>
