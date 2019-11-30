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
					// Sort Words : Sorting Your Lists of Words For You
			$this->header_title_text = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					
					// I sorted some words today!
			$quote_text = $this->master_record['quote'][0]['Quote'];
				
					// Use this web app to sort lists of words and phrases.  You may sort alphabetically, reverse alphabetically, numerically, or reverse numerically.
			$div_mouseover = $this->master_record['description'][0]['Description'];
			
					// Language
			$this->language_text = 'Language';
			
				// More Information About Us
			$about_header_title_text = 'More Information About Us';
					
					// Content Header Text
			
			$mission_header_text = 'Mission';
			$examples_header_text = 'Examples';
			$uses_header_text = 'Uses';
			$history_header_text = 'History';
			$technology_header_text = 'Tech';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Being able to sort and organize words is something all of us must do from time to time on the job.  Now we have a regular, certain place to do it.  SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">By having everything sorted, you know where everything can be found.  This is true of both information and physical material.  Your lists, your indexes, your collections, your arrangements, all of it can be sorted here.  It is easier to make more resourceful use of your information when you can find what you need quickly.  It improves efficiency, of course, but it also lets you estimate the total value of your content quickly.  Organizational ability, administrative oversight, and optimized efficiency -- that is SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">At SortWords.com, the power is just at your fingertips.  This functionality can be found in most applications, but now there is a dedicated place for it, that runs in a browser on any operating system.  Be organized, be powerful, be sorted.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Were you looking for some place to sort lists of text?  Well, you have found it.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Below are some example uses of the site...</p>' .
				'<ul>' .
					'<li> How do I sort lists?</li>' .
					'<li> How do I organize ideas?</li>' .
					'<li> How do I categorize information?</li>' .
					'<li> How do I store data?</li>' .
					'<li> How do I collate collections?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Below are some sample uses of the site...</p>' .
				'<ul>' .
					'<li> How do I sort a <em>list of names</em>?</li>' .
					'<li> How do I sort a <em>list of numbers</em>?</li>' .
					'<li> How do I sort a <em>list of numeric data</em>?</li>' .
					'<li> How do I sort a <em>list of data</em>?</li>' .
					'<li> How do I sort a <em>list of addresses</em>?</li>' .
					'<li> How do I sort a <em>list of information</em>?</li>' .
					'<li> How do I sort a <em>list of groceries</em>?</li>' .
					'<li> How do I alphabetize a <em>list of names</em>?</li>' .
					'<li> How do I alphabetize a <em>list of numbers</em>?</li>' .
					'<li> How do I alphabetize a <em>list of numeric data</em>?</li>' .
					'<li> How do I alphabetize a <em>list of data</em>?</li>' .
					'<li> How do I alphabetize a <em>list of addresses</em>?</li>' .
					'<li> How do I alphabetize a <em>list of information</em>?</li>' .
					'<li> How do I alphabetize a <em>list of groceries</em>?</li>' .
					'<li> How do I order a <em>list of names</em>?</li>' .
					'<li> How do I order a <em>list of numbers</em>?</li>' .
					'<li> How do I order a <em>list of numeric data</em>?</li>' .
					'<li> How do I order a <em>list of data</em>?</li>' .
					'<li> How do I order a <em>list of addresses</em>?</li>' .
					'<li> How do I order a <em>list of information</em>?</li>' .
					'<li> How do I order a <em>list of groceries</em>?</li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com was created and launched on June 2, 2016.  Since then, we have been showing users how to sort words for anything and everything.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com is built using the <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank">Green Gluon CMS</a>, a content-management system designed for power, speed, and scalability.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">This technology, using PHP7 and MySQL5, provides all of the functionality of this website.  <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank">Check us out on GitHub!</a></p>'
			;
			
			break;
			
		case 'de':
					// Sort Words : Sorting Your Lists of Words For You
			$this->header_title_text = 'Wörter sortieren: Sortieren der Wortlisten für Sie';
					
					// I sorted some words today!
			$quote_text = 'Ich habe heute einige Wörter sortiert!';
				
					// Use this web app to sort lists of words and phrases.  You may sort alphabetically, reverse alphabetically, numerically, or reverse numerically.
			$div_mouseover = 'Verwenden Sie diese Web-App, um Listen von Wörtern und Ausdrücken zu sortieren. Sie können alphabetisch sortieren, alphabetisch umkehren, numerisch oder numerisch umkehren.';
			
			$this->language_text = 'Sprache';
			$about_header_title_text = 'Weitere Informationen über uns';
					
					// Content Header Text
			
			$mission_header_text = 'Mission';
			$examples_header_text = 'Beispiele';
			$uses_header_text = 'Verwendet';
			$history_header_text = 'Geschichte';
			$technology_header_text = 'Technik';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Wörter sortieren und ordnen zu können, müssen wir von Zeit zu Zeit erledigen. Jetzt haben wir einen festen, festen Ort, um es zu tun.  SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Wenn Sie alles sortiert haben, wissen Sie, wo alles zu finden ist. Dies gilt sowohl für Informationen als auch für physisches Material. Ihre Listen, Ihre Indexe, Ihre Sammlungen, Ihre Arrangements, alles kann hier sortiert werden. Es ist einfacher, Ihre Informationen raffinierter einzusetzen, wenn Sie schnell finden, was Sie benötigen. Natürlich verbessert es die Effizienz, aber Sie können auch den Gesamtwert Ihrer Inhalte schnell schätzen. Organisationsfähigkeit, Verwaltungsaufsicht und optimierte Effizienz - das ist SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Bei SortWords.com steht Ihnen die Leistung zur Verfügung. Diese Funktionalität kann in den meisten Anwendungen gefunden werden, jetzt gibt es jedoch einen dedizierten Platz, der in einem Browser unter jedem Betriebssystem ausgeführt wird. Sei organisiert, sei stark, sortiere.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Haben Sie nach einem Platz gesucht, um Textlisten zu sortieren? Nun, du hast es gefunden.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Nachfolgend finden Sie einige Anwendungsbeispiele der Website ...</p>' .
				'<ul>' .
					'<li> Wie sortiere ich Listen? </li>' .
					'<li> Wie organisiere ich Ideen? </li>' .
					'<li> Wie kann ich Informationen kategorisieren? </li>' .
					'<li> Wie speichere ich Daten? </li>' .
					'<li> Wie sortiere ich Sammlungen? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Nachfolgend finden Sie einige Anwendungsbeispiele der Website ...</p>' .
				'<ul>' .
					'<li> Wie sortiere ich eine <em> Namensliste </em>? </li>' .
					'<li> Wie sortiere ich eine <em> Liste von Nummern </em>? </li>' .
					'<li> Wie sortiere ich eine <em> Liste numerischer Daten </em>? </li>' .
					'<li> Wie sortiere ich eine <em> Liste von Daten </em>? </li>' .
					'<li> Wie sortiere ich eine <em> Adressenliste </em>? </li>' .
					'<li> Wie sortiere ich eine <em> Liste mit Informationen </em>? </li>' .
					'<li> Wie sortiere ich eine <em> Liste der Lebensmittel </em>? </li>' .
					'<li> Wie kann ich eine <em> Namensliste </em> alphabetisieren? </li>' .
					'<li> Wie kann ich eine <em> Liste von Zahlen </em> alphabetisch sortieren? </li>' .
					'<li> Wie kann ich eine <em> Liste mit numerischen Daten </em> alphabetisch sortieren? </li>' .
					'<li> Wie kann ich eine <em> Liste von Daten </em> alphabetisieren? </li>' .
					'<li> Wie kann ich eine <em> Liste von Adressen </em> alphabetisch sortieren? </li>' .
					'<li> Wie kann ich eine <em> Liste mit Informationen </em> alphabetisieren? </li>' .
					'<li> Wie kann ich eine <em> Liste von Lebensmitteln </em> alphabetisch sortieren? </li>' .
					'<li> Wie bestelle ich eine <em> Namensliste </em>? </li>' .
					'<li> Wie bestelle ich eine <em> Liste von Nummern </em>? </li>' .
					'<li> Wie bestelle ich eine <em> Liste numerischer Daten </em>? </li>' .
					'<li> Wie bestelle ich eine <em> Liste von Daten </em>? </li>' .
					'<li> Wie bestelle ich eine <em> Adressenliste </em>? </li>' .
					'<li> Wie bestelle ich eine <em> Liste mit Informationen </em>? </li>' .
					'<li> Wie bestelle ich eine <em> Liste mit Lebensmitteln </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com wurde am 2. Juni 2016 erstellt und eingeführt. Seitdem zeigen wir den Benutzern, wie Wörter für alles und jedes sortiert werden.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com basiert auf dem <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, einem Content-Management-System, das auf Leistung, Geschwindigkeit und Leistung ausgelegt ist Skalierbarkeit.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Diese Technologie verwendet PHP7 und MySQL5 und bietet alle Funktionen dieser Website. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Besuchen Sie uns auf GitHub!</a></p>'
			;
	
			break;
			
		case 'es':
					// Sort Words : Sorting Your Lists of Words For You
			$this->header_title_text = 'Ordenar palabras: Ordenar sus listas de palabras para usted';
					
					// I sorted some words today!
			$quote_text = '¡Clasifiqué algunas palabras hoy!';
				
					// Use this web app to sort lists of words and phrases.  You may sort alphabetically, reverse alphabetically, numerically, or reverse numerically.
			$div_mouseover = 'Utilice esta aplicación web para ordenar listas de palabras y frases. Puede ordenar alfabéticamente, revertir alfabéticamente, numéricamente o revertir numéricamente.';
			
			$this->language_text = 'Idioma';
			$about_header_title_text = 'Más información sobre nosotros';
					
					// Content Header Text
			
			$mission_header_text = 'Misión';
			$examples_header_text = 'Ejemplos';
			$uses_header_text = 'Usos';
			$history_header_text = 'Historia';
			$technology_header_text = 'Tecnología';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Poder ordenar y organizar las palabras es algo que todos debemos hacer de vez en cuando en el trabajo. Ahora tenemos un lugar regular, cierto para hacerlo. SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Al tener todo ordenado, sabes dónde se puede encontrar todo. Esto es cierto tanto para la información como para el material físico. Sus listas, sus índices, sus colecciones, sus arreglos, todo puede ordenarse aquí. Es más fácil hacer un uso más ingenioso de su información cuando puede encontrar lo que necesita rápidamente. Por supuesto, mejora la eficiencia, pero también le permite estimar el valor total de su contenido rápidamente. Capacidad organizativa, supervisión administrativa y eficiencia optimizada, eso es SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">En SortWords.com, el poder está al alcance de su mano. Esta funcionalidad se puede encontrar en la mayoría de las aplicaciones, pero ahora hay un lugar dedicado para ella, que se ejecuta en un navegador en cualquier sistema operativo. Sé organizado, sé poderoso, ordénate.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">¿Estabas buscando un lugar para ordenar listas de texto? Bueno, lo has encontrado.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">A continuación se muestran algunos ejemplos de usos del sitio ...</p>' .
				'<ul>' .
					'<li> ¿Cómo ordeno las listas? </li>' .
					'<li> ¿Cómo organizo las ideas? </li>' .
					'<li> ¿Cómo categorizo la información? </li>' .
					'<li> ¿Cómo almaceno los datos? </li>' .
					'<li> ¿Cómo compagino las colecciones? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">A continuación se muestran algunos usos de ejemplo del sitio ...</p>' .
				'<ul>' .
					'<li> ¿Cómo ordeno una <em> lista de nombres </em>? </li>' .
					'<li> ¿Cómo ordeno una <em> lista de números </em>? </li>' .
					'<li> ¿Cómo ordeno una <em> lista de datos numéricos </em>? </li>' .
					'<li> ¿Cómo ordeno una <em> lista de datos </em>? </li>' .
					'<li> ¿Cómo ordeno una <em> lista de direcciones </em>? </li>' .
					'<li> ¿Cómo ordeno una <em> lista de información </em>? </li>' .
					'<li> ¿Cómo ordeno una <em> lista de comestibles </em>? </li>' .
					'<li> ¿Cómo alfabetizar una <em> lista de nombres </em>? </li>' .
					'<li> ¿Cómo alfabetizo una <em> lista de números </em>? </li>' .
					'<li> ¿Cómo alfabetizar una <em> lista de datos numéricos </em>? </li>' .
					'<li> ¿Cómo alfabetizar una <em> lista de datos </em>? </li>' .
					'<li> ¿Cómo alfabetizar una <em> lista de direcciones </em>? </li>' .
					'<li> ¿Cómo alfabetizar una <em> lista de información </em>? </li>' .
					'<li> ¿Cómo alfabetizo una <em> lista de comestibles </em>? </li>' .
					'<li> ¿Cómo ordeno una <em> lista de nombres </em>? </li>' .
					'<li> ¿Cómo ordeno una <em> lista de números </em>? </li>' .
					'<li> ¿Cómo ordeno una <em> lista de datos numéricos </em>? </li>' .
					'<li> ¿Cómo ordeno una <em> lista de datos </em>? </li>' .
					'<li> ¿Cómo ordeno una <em> lista de direcciones </em>? </li>' .
					'<li> ¿Cómo ordeno una <em> lista de información </em>? </li>' .
					'<li> ¿Cómo ordeno una <em> lista de comestibles </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com fue creado y lanzado el 2 de junio de 2016. Desde entonces, hemos estado mostrando a los usuarios cómo clasificar las palabras para cualquier cosa y para todo.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com se ha creado utilizando el <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, un sistema de gestión de contenido diseñado para potencia, velocidad y escalabilidad</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Esta tecnología, que utiliza PHP7 y MySQL5, proporciona toda la funcionalidad de este sitio web. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> ¡Visítenos en GitHub! </a></p>'
			;
			
			break;
			
		case 'fr':
					// Sort Words : Sorting Your Lists of Words For You
			$this->header_title_text = 'Trier les mots: trier vos listes de mots pour vous';
					
					// I sorted some words today!
			$quote_text = 'J\'ai trié quelques mots aujourd\'hui!';
				
					// Use this web app to sort lists of words and phrases.  You may sort alphabetically, reverse alphabetically, numerically, or reverse numerically.
			$div_mouseover = 'Utilisez cette application Web pour trier des listes de mots et d\'expressions. Vous pouvez trier alphabétiquement, inverser alphabétiquement, numériquement ou inversement numérique.';
			
			$this->language_text = 'La langue';
			$about_header_title_text = 'Plus d\'informations sur nous';
					
					// Content Header Text
			
			$mission_header_text = 'Mission';
			$examples_header_text = 'Exemples';
			$uses_header_text = 'Les usages';
			$history_header_text = 'L\'histoire';
			$technology_header_text = 'Technologie';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Pouvoir trier et organiser les mots est une chose que nous devons tous faire de temps en temps au travail. Nous avons maintenant un endroit sûr et régulier pour le faire. SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">En ayant tout réglé, vous savez où tout peut être trouvé. Cela est vrai à la fois de l\'information et du matériel physique. Vos listes, vos index, vos collections, vos arrangements, tout cela peut être trié ici. Il est plus facile d\'utiliser vos informations avec plus de ressources lorsque vous pouvez trouver rapidement ce dont vous avez besoin. Cela améliore évidemment l\'efficacité, mais vous permet également d\'estimer rapidement la valeur totale de votre contenu. Capacité d\'organisation, supervision administrative et efficacité optimisée: c\'est ce que SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Sur SortWords.com, le pouvoir est à portée de main. Cette fonctionnalité peut être trouvée dans la plupart des applications, mais il existe maintenant un emplacement dédié, qui s\'exécute dans un navigateur sur n\'importe quel système d\'exploitation. Soyez organisé, soyez puissant, trié.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Cherchez-vous un endroit pour trier des listes de texte? Eh bien, vous l\'avez trouvé.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Ci-dessous quelques exemples d\'utilisations du site ...</p>' .
				'<ul>' .
					'<li> Comment trier les listes? </li>' .
					'<li> Comment organiser les idées? </li>' .
					'<li> Comment catégoriser les informations? </li>' .
					'<li> Comment stocker les données? </li>' .
					'<li> Comment puis-je assembler des collections? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Ci-dessous quelques exemples d\'utilisations du site ...</p>' .
				'<ul>' .
					'<li> Comment trier une <em> liste de noms </em>? </li>' .
					'<li> Comment trier une <em> liste de nombres </em>? </li>' .
					'<li> Comment trier une <em> liste de données numériques </em>? </li>' .
					'<li> Comment trier une <em> liste de données </em>? </li>' .
					'<li> Comment trier une <em> liste d\'adresses </em>? </li>' .
					'<li> Comment trier une <em> liste d\'informations </em>? </li>' .
					'<li> Comment trier une <em> liste d\'épicerie </em>? </li>' .
					'<li> Comment puis-je alphabétiser une <em> liste de noms </em>? </li>' .
					'<li> Comment alphabétiser une <em> liste de nombres </em>? </li>' .
					'<li> Comment alphabétiser une <em> liste de données numériques </em>? </li>' .
					'<li> Comment alphabétiser une <em> liste de données </em>? </li>' .
					'<li> Comment puis-je alphabétiser une <em> liste d\'adresses </em>? </li>' .
					'<li> Comment puis-je alphabétiser une <em> liste d\'informations </em>? </li>' .
					'<li> Comment puis-je alphabétiser une <em> liste d\'épicerie </em>? </li>' .
					'<li> Comment commander une <em> liste de noms </em>? </li>' .
					'<li> Comment commander une <em> liste de numéros </em>? </li>' .
					'<li> Comment commander une <em> liste de données numériques </em>? </li>' .
					'<li> Comment commander une <em> liste de données </em>? </li>' .
					'<li> Comment commander une <em> liste d\'adresses </em>? </li>' .
					'<li> Comment commander une <em> liste d\'informations </em>? </li>' .
					'<li> Comment commander une <em> liste d\'épicerie </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com a été créé et lancé le 2 juin 2016. Depuis lors, nous montrons aux utilisateurs comment trier les mots pour tout et n\'importe quoi.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com est conçu à l\'aide du <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> système de gestion de contenu Green Gluon </a>, conçu pour la gestion de la puissance, de la vitesse et de la vitesse. l\'évolutivité.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Cette technologie, utilisant PHP7 et MySQL5, fournit toutes les fonctionnalités de ce site Web. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Consultez-nous sur GitHub! </a></p>'
			;
			
			break;
			
		case 'ja':
					// Sort Words : Sorting Your Lists of Words For You
			$this->header_title_text = '単語を並べ替える：あなたのために単語のリストを並べ替える';
					
					// I sorted some words today!
			$quote_text = '今日は言葉を並べ替えました！';
				
					// Use this web app to sort lists of words and phrases.  You may sort alphabetically, reverse alphabetically, numerically, or reverse numerically.
			$div_mouseover = 'このWebアプリを使用して、単語とフレーズのリストをソートします。 アルファベット順、逆アルファベット順、数字順、または数字逆順にソートできます。';
			
			$this->language_text = '言語';
			$about_header_title_text = '私たちについてのより詳しい情報';
					
					// Content Header Text
			
			$mission_header_text = 'ミッション';
			$examples_header_text = '例';
			$uses_header_text = '用途';
			$history_header_text = '歴史';
			$technology_header_text = 'テック';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">言葉を分類して整理することができるということは、私たち全員が仕事の中で時々しなければならないことです。 今、私たちはそれを行うための定期的で確実な場所を持っています。 SortWords.com。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">すべてをソートすることで、すべての場所を見つけることができます。 これは情報と物理的材料の両方に当てはまります。 あなたのリスト、あなたのインデックス、あなたのコレクション、あなたの手配、それらすべてはここでソートすることができます。 必要なものがすぐに見つかると、情報をより有効に活用できます。 もちろん効率性は向上しますが、コンテンツの総価値を迅速に見積もることもできます。 組織力、管理監督、そして効率の最適化 - それがSortWords.comです。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">SortWords.comでは、力はあなたの指先にちょうどあります。 この機能はほとんどのアプリケーションに見られますが、今ではそれ専用の場所があり、それはあらゆるオペレーティングシステムのブラウザで動作します。 整理され、強力になり、ソートされます。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">テキストのリストをソートするための場所を探していましたか？ まあ、あなたはそれを見つけました。</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">下記はサイトの使用例です。</p>' .
				'<ul>' .
					'<li>リストの並べ替え方法は？</li>' .
					'<li>アイデアをまとめるにはどうすればよいですか</li>' .
					'<li>情報を分類するにはどうすればよいですか。</li>' .
					'<li>データを保存するにはどうすればよいですか</li>' .
					'<li>コレクションをどのように照合できますか？</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">下記はサイトの使用例です。</p>' .
				'<ul>' .
					'<li> <em>名前のリスト</em>を並べ替える</em> </li>' .
					'<li> <em>数字のリスト</em>を並べ替える</em> </li>' .
					'<li>数値データのリスト<em> </em>を並べ替える</em> </li>' .
					'<li>データの<em>リスト</em>を並べ替える</em> </li>' .
					'<li> <em>住所のリスト</em>を並べ替える</em> </li>' .
					'<li> <em>情報のリスト</em>を並べ替える</em> </li>' .
					'<li>食料品のリストを並べ替える方法</em> </li>' .
					'<li> <em>名前のリスト</em>をアルファベット順に並べ替える</em> </li>' .
					'<li>数字リスト<em> </em>をアルファベット順に並べ替えるにはどうすればよいですか。</li>' .
					'<li>数値データの<em>リスト</em>をアルファベット順に並べ替える</em> </li>' .
					'<li> <em>データのリスト</em>をアルファベット順に並べ替える</em> </li>' .
					'<li>住所リスト<em> </em>をアルファベット順に並べ替える</em> </li>' .
					'<li> <em>情報のリスト</em>をアルファベット順に並べ替える</em> </li>' .
					'<li>食料品のリスト<em> </em>をアルファベット順に並べ替える</em> </li>' .
					'<li> <em>名前のリスト</em>を注文する</em> </li>' .
					'<li>どうやって<em>数字のリスト</em> </em>を注文できますか</li>' .
					'<li>数値データのリスト<em> </em>を注文する方法</li>' .
					'<li> <em>データのリスト</em>を注文する</em> </li>' .
					'<li>住所リスト<em> </em>の注文方法</em> </li>' .
					'<li> <em>情報のリスト</em>を注文する</em> </li>' .
					'<li>食料品リスト<em> </em>を注文するにはどうすればよいですか？</li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.comは2016年6月2日に作成され、起動しました。それ以来、私たちはユーザーに何でも何でもすべての単語をソートする方法を示しています。</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.comは<a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>を使用して構築されています。 スケーラビリティ</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">PHP 7とMySQL 5を使用するこのテクノロジは、このWebサイトのすべての機能を提供します。 <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> GitHubをご覧ください。</a></p>'
			;
			
			break;
			
		case 'it':
					// Sort Words : Sorting Your Lists of Words For You
			$this->header_title_text = 'Ordina parole: ordina le tue liste di parole per te';
					
					// I sorted some words today!
			$quote_text = 'Ho ordinato alcune parole oggi!';
				
					// Use this web app to sort lists of words and phrases.  You may sort alphabetically, reverse alphabetically, numerically, or reverse numerically.
			$div_mouseover = 'Utilizzare questa applicazione Web per ordinare elenchi di parole e frasi. È possibile ordinare alfabeticamente, in ordine alfabetico, numerico o invertire numericamente.';
			
			$this->language_text = 'Linguaggio';
			$about_header_title_text = 'Ulteriori informazioni su di noi';
					
					// Content Header Text
			
			$mission_header_text = 'Missione';
			$examples_header_text = 'Esempi';
			$uses_header_text = 'Usi';
			$history_header_text = 'Storia';
			$technology_header_text = 'Tecnologia';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Essere in grado di ordinare e organizzare le parole è qualcosa che tutti noi dobbiamo fare di volta in volta sul posto di lavoro. Ora abbiamo un posto regolare e sicuro per farlo. SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Avendo ordinato tutto, sai dove tutto può essere trovato. Questo è vero sia per le informazioni che per il materiale fisico. Le tue liste, i tuoi indici, le tue collezioni, i tuoi arrangiamenti, tutto può essere ordinato qui. È più facile fare un uso più pieno di risorse delle informazioni quando riesci a trovare ciò di cui hai bisogno rapidamente. Ovviamente migliora l\'efficienza, ma ti consente anche di stimare rapidamente il valore totale dei tuoi contenuti. Capacità organizzativa, supervisione amministrativa e efficienza ottimizzata: SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Su SortWords.com, il potere è a portata di mano. Questa funzionalità può essere trovata nella maggior parte delle applicazioni, ma ora c\'è un posto dedicato per esso, che viene eseguito in un browser su qualsiasi sistema operativo. Essere organizzati, essere potenti, essere ordinati.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Stavi cercando un posto dove ordinare elenchi di testo? Bene, l\'hai trovato.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Di seguito sono riportati alcuni esempi di utilizzo del sito ...</p>' .
				'<ul>' .
					'<li> Come posso ordinare gli elenchi? </li>'. 
					'<li> Come organizzo le idee? </li>' .
					'<li> Come categorizzo le informazioni? </li>' .
					'<li> Come immagazzino i dati? </li>' .
					'<li> Come faccio a fascicolare le raccolte? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Di seguito sono riportati alcuni esempi di utilizzo del sito ...</p>' .
				'<ul>' .
					'<li> Come faccio a ordinare un <em> elenco di nomi </em>? </li>' .
					'<li> Come faccio a ordinare un <em> elenco di numeri </em>? </li>' .
					'<li> Come faccio a ordinare un <em> elenco di dati numerici </em>? </li>' .
					'<li> Come faccio a ordinare un <em> elenco di dati </em>? </li>' .
					'<li> Come faccio a ordinare un <em> elenco di indirizzi </em>? </li>' .
					'<li> Come faccio a ordinare un <em> elenco di informazioni </em>? </li>' .
					'<li> Come faccio a ordinare un <em> elenco di generi alimentari </em>? </li>' .
					'<li> Come faccio ad alfabetizzare un <em> elenco di nomi </em>? </li>' .
					'<li> Come faccio ad alfabetizzare un <em> elenco di numeri </em>? </li>' .
					'<li> Come faccio ad alfabetizzare un <em> elenco di dati numerici </em>? </li>' .
					'<li> Come faccio ad alfabetizzare un <em> elenco di dati </em>? </li>' .
					'<li> Come faccio ad alfabetizzare un <em> elenco di indirizzi </em>? </li>' .
					'<li> Come faccio ad alfabetizzare un <em> elenco di informazioni </em>? </li>' .
					'<li> Come faccio ad alfabetizzare un <em> elenco di generi alimentari </em>? </li>' .
					'<li> Come posso ordinare un <em> elenco di nomi </em>? </li>' .
					'<li> Come posso ordinare un <em> elenco di numeri </em>? </li>' .
					'<li> Come posso ordinare un <em> elenco di dati numerici </em>? </li>' .
					'<li> Come posso ordinare un <em> elenco di dati </em>? </li>' .
					'<li> Come posso ordinare un <em> elenco di indirizzi </em>? </li>' .
					'<li> Come posso ordinare un <em> elenco di informazioni </em>? </li>' .
					'<li> Come posso ordinare un <em> elenco di generi alimentari </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com è stato creato e lanciato il 2 giugno 2016. Da allora, abbiamo mostrato agli utenti come ordinare le parole per qualsiasi cosa.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com è costruito utilizzando il <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, un sistema di gestione dei contenuti progettato per potenza, velocità e scalabilità.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Questa tecnologia, che utilizza PHP7 e MySQL5, fornisce tutte le funzionalità di questo sito web. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Controllaci su GitHub! </a></p>'
			;
			
			break;
			
		case 'nl':
					// Sort Words : Sorting Your Lists of Words For You
			$this->header_title_text = 'Sorteerwoorden: Sorteer uw lijsten met woorden voor u';
					
					// I sorted some words today!
			$quote_text = 'Ik heb vandaag wat woorden gesorteerd!';
				
					// Use this web app to sort lists of words and phrases.  You may sort alphabetically, reverse alphabetically, numerically, or reverse numerically.
			$div_mouseover = 'Gebruik deze web-app om lijsten met woorden en zinsdelen te sorteren. U kunt alfabetisch alfabetisch, alfabetisch, numeriek of omgekeerd sorteren.';
			
			$this->language_text = 'Taal';
			$about_header_title_text = 'Meer informatie over ons';
					
					// Content Header Text
			
			$mission_header_text = 'Missie';
			$examples_header_text = 'Voorbeelden';
			$uses_header_text = 'Toepassingen';
			$history_header_text = 'Geschiedenis';
			$technology_header_text = 'Technologie';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Woorden kunnen ordenen en ordenen is iets dat we allemaal van tijd tot tijd op het werk moeten doen. Nu hebben we een vaste, zekere plek om het te doen. SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Door alles gesorteerd te hebben, weet je waar alles te vinden is. Dit geldt voor zowel informatie als fysiek materiaal. Uw lijsten, uw indexen, uw collecties, uw arrangementen, alles kan hier worden gesorteerd. Het is gemakkelijker om vindingrijker gebruik te maken van uw informatie wanneer u snel vindt wat u zoekt. Het verbetert natuurlijk de efficiëntie, maar u kunt ook snel de totale waarde van uw inhoud schatten. Organisatorisch vermogen, administratief toezicht en geoptimaliseerde efficiëntie - dat is SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Bij SortWords.com is de kracht binnen handbereik. Deze functionaliteit is te vinden in de meeste applicaties, maar nu is er een speciale plaats voor, die wordt uitgevoerd in een browser op elk besturingssysteem. Wees georganiseerd, wees krachtig, wees gesorteerd.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Was je op zoek naar een plek om tekstlijsten te sorteren? Nou, je hebt het gevonden.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Hieronder zijn enkele voorbeelden van gebruik van de site ...</p>' .
				'<ul>' .
					'<li> Hoe sorteer ik lijsten? </li>' .
					'<li> Hoe organiseer ik ideeën? </li>' .
					'<li> Hoe kan ik informatie indelen? </li>' .
					'<li> Hoe sla ik gegevens op? </li>' .
					'<li> Hoe verzamel ik verzamelingen? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Hieronder vindt u enkele voorbeelden van gebruik van de site ...</p>' .
				'<ul>' .
					'<li> Hoe sorteer ik een <em> lijst met namen </em>? </li>' .
					'<li> Hoe sorteer ik een <em> lijst met nummers </em>? </li>' .
					'<li> Hoe sorteer ik een <em> lijst met numerieke gegevens </em>? </li>' .
					'<li> Hoe sorteer ik een <em> lijst met gegevens </em>? </li>' .
					'<li> Hoe sorteer ik een <em> lijst met adressen </em>? </li>' .
					'<li> Hoe sorteer ik een <em> informatielijst </em>? </li>' .
					'<li> Hoe sorteer ik een <em> lijst met boodschappen </em>? </li>' .
					'<li> Hoe alfabetiseer ik een <em> namenlijst </em>? </li>' .
					'<li> Hoe alfabetiseer ik een <em> lijst met nummers </em>? </li>' .
					'<li> Hoe alfabetiseer ik een <em> lijst met numerieke gegevens </em>? </li>' .
					'<li> Hoe alfabetiseer ik een <em> lijst met gegevens </em>? </li>' .
					'<li> Hoe alfabetiseer ik een <em> lijst met adressen </em>? </li>' .
					'<li> Hoe alfabetiseer ik een <em> informatielijst </em>? </li>' .
					'<li> Hoe alfabetiseer ik een <em> lijst met boodschappen </em>? </li>' .
					'<li> Hoe bestel ik een <em> lijst met namen </em>? </li>' .
					'<li> Hoe bestel ik een <em> lijst met nummers </em>? </li>' .
					'<li> Hoe bestel ik een <em> lijst met numerieke gegevens </em>? </li>' .
					'<li> Hoe bestel ik een <em> lijst met gegevens </em>? </li>' .
					'<li> Hoe bestel ik een <em> lijst met adressen </em>? </li>' .
					'<li> Hoe bestel ik een <em> informatielijst </em>? </li>' .
					'<li> Hoe bestel ik een <em> lijst met boodschappen </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com is gemaakt en gestart op 2 juni 2016. Sindsdien hebben we gebruikers laten zien hoe woorden kunnen worden gesorteerd voor alles en nog wat.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com is gebouwd met behulp van de <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, een inhoudbeheersysteem dat is ontworpen voor kracht, snelheid en schaalbaarheid.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Deze technologie, met behulp van PHP7 en MySQL5, biedt alle functionaliteit van deze website. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Bekijk ons op GitHub! </a></p>'
			;
			
			break;
			
		case 'pl':
					// Sort Words : Sorting Your Lists of Words For You
			$this->header_title_text = 'Sort Words: Sortowanie list słów dla ciebie';
					
					// I sorted some words today!
			$quote_text = 'Dziś posortowałem słowa!';
				
					// Use this web app to sort lists of words and phrases.  You may sort alphabetically, reverse alphabetically, numerically, or reverse numerically.
			$div_mouseover = 'Użyj tej aplikacji internetowej do sortowania list słów i wyrażeń. Możesz sortować alfabetycznie, odwrotnie, alfabetycznie, numerycznie lub odwrotnie.';
			
			$this->language_text = 'Język';
			$about_header_title_text = 'Więcej informacji o nas';
					
					// Content Header Text
			
			$mission_header_text = 'Misja';
			$examples_header_text = 'Przykłady';
			$uses_header_text = 'Używa';
			$history_header_text = 'Historia';
			$technology_header_text = 'Technologia';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Możliwość sortowania i porządkowania słów jest czymś, co każdy z nas musi wykonywać od czasu do czasu w pracy. Teraz mamy regularne, pewne miejsce, aby to zrobić.  SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Po uporządkowaniu wszystkiego wiesz, gdzie wszystko można znaleźć. Dotyczy to zarówno informacji, jak i materiału fizycznego. Twoje listy, twoje indeksy, twoje zbiory, twoje ustalenia, wszystko to możesz posortować tutaj. Łatwiej jest bardziej efektywnie wykorzystać informacje, gdy szybko znajdziesz to, czego potrzebujesz. Oczywiście poprawia wydajność, ale pozwala także szybko oszacować łączną wartość treści. Zdolności organizacyjne, nadzór administracyjny i zoptymalizowana wydajność - czyli SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">W SortWords.com moc jest na wyciągnięcie ręki. Funkcję tę można znaleźć w większości aplikacji, ale teraz istnieje dedykowane miejsce, które działa w przeglądarce na dowolnym systemie operacyjnym. Bądźcie zorganizowani, bądźcie potężni, posortowani.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Czy szukałeś jakiegoś miejsca do sortowania list tekstu? Cóż, znalazłeś to.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Poniżej kilka przykładowych zastosowań witryny ...</p>' .
				'<ul>' .
					'<li> Jak sortować listy? </li>' .
					'<li> Jak organizować pomysły? </li>' .
					'<li> Jak kategoryzować informacje? </li>' .
					'<li> Jak mogę przechowywać dane? </li>' .
					'<li> Jak sortować kolekcje? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Poniżej kilka przykładowych zastosowań witryny ...</p>' .
				'<ul>' .
					'<li> Jak sortować <em> listę nazw </em>? </li>' .
					'<li> Jak sortować listę <em> liczb </em>? </li>' .
					'<li> Jak sortować listę <em> danych liczbowych </em>? </li>' .
					'<li> Jak sortować listę <em> danych </em>? </li>' .
					'<li> Jak sortować <em> listę adresów </em>? </li>' .
					'<li> Jak sortować listę informacji <em> </em>? </li>' .
					'<li> Jak sortować <em> listę artykułów spożywczych </em>? </li>' .
					'<li> Jak dokonać alfabetycznej listy <em> nazw </em>? </li>' .
					'<li> Jak dokonać alfabetycznej listy <em> liczb </em>? </li>' .
					'<li> Jak dokonać alfabetycznej listy <em> danych liczbowych </em>? </li>' .
					'<li> Jak dokonać alfabetycznej listy <em> danych </em>? </li>' .
					'<li> Jak dokonać alfabetycznej listy adresów <em> </em>? </li>' .
					'<li> Jak mogę alfabetować listę informacji <em> </em>? </li>' .
					'<li> Jak dokonać alfabetycznej listy <em> artykułów spożywczych </em>? </li>' .
					'<li> Jak zamówić <em> listę nazw </em>? </li>' .
					'<li> Jak zamówić <em> listę numerów </em>? </li>' .
					'<li> Jak zamówić <em> listę danych liczbowych </em>? </li>' .
					'<li> Jak mogę zamówić <em> listę danych </em>? </li>' .
					'<li> Jak mogę zamówić <em> listę adresów </em>? </li>' .
					'<li> Jak zamówić <em> listę informacji </em>? </li>' .
					'<li> Jak zamówić <em> listę artykułów spożywczych </em>? </li> ' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com został utworzony i uruchomiony 2 czerwca 2016 r. Od tego czasu pokazywaliśmy użytkownikom, jak sortować słowa na wszystko.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com jest zbudowany przy użyciu <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, systemu zarządzania treścią zaprojektowanego pod kątem władzy, szybkości i skalowalność.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Ta technologia, wykorzystująca PHP7 i MySQL5, zapewnia całą funkcjonalność tej witryny. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Sprawdź nas na GitHub! </a></p>'
			;
			
			break;
			
		case 'pt':
					// Sort Words : Sorting Your Lists of Words For You
			$this->header_title_text = 'Ordenar palavras: classificando suas listas de palavras para você';
					
					// I sorted some words today!
			$quote_text = 'Eu classifiquei algumas palavras hoje!';
				
					// Use this web app to sort lists of words and phrases.  You may sort alphabetically, reverse alphabetically, numerically, or reverse numerically.
			$div_mouseover = 'Use este aplicativo da web para classificar listas de palavras e frases. Você pode ordenar alfabeticamente, inverter alfabeticamente, numericamente ou inverter numericamente.';
			
			$this->language_text = 'Língua';
			$about_header_title_text = 'Mais informações sobre nós';
					
					// Content Header Text
			
			$mission_header_text = 'Missão';
			$examples_header_text = 'Exemplos';
			$uses_header_text = 'Usos';
			$history_header_text = 'História';
			$technology_header_text = 'Tecnologia';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Ser capaz de classificar e organizar palavras é algo que todos nós devemos fazer de tempos em tempos no trabalho. Agora temos um lugar certo e certo para fazer isso.  SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Por ter tudo resolvido, você sabe onde tudo pode ser encontrado. Isso vale tanto para informações quanto para material físico. Suas listas, seus índices, suas coleções, seus arranjos, tudo isso pode ser classificado aqui. É mais fácil fazer uso mais engenhoso de suas informações quando você pode encontrar rapidamente o que precisa. Melhora a eficiência, é claro, mas também permite estimar o valor total do seu conteúdo rapidamente. Habilidade organizacional, supervisão administrativa e eficiência otimizada - ou seja, SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">No SortWords.com, o poder está apenas ao seu alcance. Essa funcionalidade pode ser encontrada na maioria dos aplicativos, mas agora há um local dedicado para isso, que é executado em um navegador em qualquer sistema operacional. Seja organizado, seja poderoso, seja classificado.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Você estava procurando por algum lugar para classificar listas de texto? Bom, você achou.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Abaixo estão alguns exemplos de uso do site ...</p>' .
				'<ul>' .
					'<li> Como faço para classificar listas? </li>' .
					'<li> Como organizo ideias? </li>' .
					'<li> Como classifico as informações? </li>' .
					'<li> Como faço para armazenar dados? </li>' .
					'<li> Como faço para agrupar coleções? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Abaixo estão alguns exemplos de uso do site ...</p>' .
				'<ul>' .
					'<li> Como classifico uma <em> lista de nomes </em>? </li>' .
					'<li> Como classifico uma <em> lista de números </em>? </li>' .
					'<li> Como classifico uma <em> lista de dados numéricos </em>? </li>' .
					'<li> Como classifico uma <em> lista de dados </em>? </li>' .
					'<li> Como classifico uma <em> lista de endereços </em>? </li>' .
					'<li> Como classifico uma <em> lista de informações </em>? </li>' .
					'<li> Como faço para classificar uma <em> lista de mantimentos </em>? </li>' .
					'<li> Como faço para colocar em ordem alfabética uma <em> lista de nomes </em>? </li>' .
					'<li> Como faço para colocar em ordem alfabética uma <em> lista de números </em>? </li>' .
					'<li> Como faço para colocar em ordem alfabética uma <em> lista de dados numéricos </em>? </li>' .
					'<li> Como faço para colocar em ordem alfabética uma <em> lista de dados </em>? </li>' .
					'<li> Como faço para alfabetizar uma <em> lista de endereços </em>? </li>' .
					'<li> Como faço para alfabetizar uma <em> lista de informações </em>? </li>' .
					'<li> Como eu coloco em ordem alfabética uma <em> lista de mantimentos </em>? </li>' .
					'<li> Como faço para solicitar uma <em> lista de nomes </em>? </li>' .
					'<li> Como faço para solicitar uma <em> lista de números </em>? </li>' .
					'<li> Como faço para solicitar uma <em> lista de dados numéricos </em>? </li>' .
					'<li> Como faço para solicitar uma <em> lista de dados </em>? </li>' .
					'<li> Como faço para solicitar uma <em> lista de endereços </em>? </li>' .
					'<li> Como faço para solicitar uma <em> lista de informações </em>? </li>' .
					'<li> Como faço para comprar uma <em> lista de mantimentos </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">O SortWords.com foi criado e lançado em 2 de junho de 2016. Desde então, mostramos aos usuários como classificar palavras para qualquer coisa e tudo.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com é construído usando o <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, um sistema de gerenciamento de conteúdo projetado para energia, velocidade e escalabilidade.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Esta tecnologia, usando PHP7 e MySQL5, fornece todas as funcionalidades deste site. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Consulte-nos no GitHub! </a></p>'
			;
			
			break;
			
		case 'ru':
					// Sort Words : Sorting Your Lists of Words For You
			$this->header_title_text = 'Сортировка слов: сортировка списков слов для вас';
					
					// I sorted some words today!
			$quote_text = 'Я отсортировал несколько слов сегодня!';
				
					// Use this web app to sort lists of words and phrases.  You may sort alphabetically, reverse alphabetically, numerically, or reverse numerically.
			$div_mouseover = 'Используйте это веб-приложение для сортировки списков слов и фраз. Вы можете сортировать по алфавиту, обратному алфавитному, числовому или числовому.';
			
			$this->language_text = 'язык';
			$about_header_title_text = 'Дополнительная информация';
					
					// Content Header Text
			
			$mission_header_text = 'миссия';
			$examples_header_text = 'Примеры';
			$uses_header_text = 'Пользы';
			$history_header_text = 'история';
			$technology_header_text = 'Технология';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Способность сортировать и систематизировать слова - это то, что каждый из нас должен время от времени делать на работе. Теперь у нас есть постоянное, определенное место для этого.  SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Имея все отсортировано, вы знаете, где все можно найти. Это верно как для информации, так и для физического материала. Ваши списки, ваши индексы, ваши коллекции, ваши мероприятия, все это можно отсортировать здесь. Проще использовать вашу информацию более изобретательно, когда вы сможете быстро найти то, что вам нужно. Конечно, это повышает эффективность, но также позволяет быстро оценить общую стоимость вашего контента. Организационные возможности, административный надзор и оптимизированная эффективность - это SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">На SortWords.com сила только у вас под рукой. Эту функциональность можно найти в большинстве приложений, но теперь для нее есть специальное место, которое запускается в браузере любой операционной системы Быть организованным, быть сильным, быть отсортированным.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Вы искали место для сортировки списков текста? Ну, вы нашли это.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Ниже приведены примеры использования сайта ...</p>' .
				'<ul>' .
					'<li> Как сортировать списки? </li>' .
					'<li> Как мне организовать идеи? </li>' .
					'<li> Как классифицировать информацию? </li>' .
					'<li> Как мне хранить данные? </li>' .
					'<li> Как собирать коллекции? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Ниже приведены примеры использования сайта ...</p>' .
				'<ul>' .
					'<li> Как мне отсортировать <em> список имен </em>? </li>' .
					'<li> Как мне отсортировать <em> список чисел </em>? </li>' .
					'<li> Как мне отсортировать <em> список числовых данных </em>? </li>' .
					'<li> Как мне отсортировать <em> список данных </em>? </li>' .
					'<li> Как мне отсортировать <em> список адресов </em>? </li>' .
					'<li> Как мне отсортировать <em> список информации </em>? </li>' .
					'<li> Как мне отсортировать <em> список продуктов </em>? </li>' .
					'<li> Как мне алфавитировать <em> список имен </em>? </li>' .
					'<li> Как мне алфавитировать <em> список чисел </em>? </li>' .
					'<li> Как мне разместить в алфавитном порядке <em> список числовых данных </em>? </li>' .
					'<li> Как мне разместить в алфавитном порядке <em> список данных </em>? </li>' .
					'<li> Как мне алфавитировать <em> список адресов </em>? </li>' .
					'<li> Как мне разместить в алфавитном порядке <em> список информации </em>? </li>' .
					'<li> Как мне разместить в алфавитном порядке <em> список продуктов </em>? </li>' .
					'<li> Как заказать <em> список имен </em>? </li>' .
					'<li> Как заказать <em> список номеров </em>? </li>' .
					'<li> Как заказать <em> список числовых данных </em>? </li>' .
					'<li> Как заказать <em> список данных </em>? </li>' .
					'<li> Как заказать <em> список адресов </em>? </li>' .
					'<li> Как заказать <em> список информации </em>? </li>' .
					'<li> Как заказать <em> список продуктов </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com был создан и запущен 2 июня 2016 года. С тех пор мы показываем пользователям, как сортировать слова для всего и вся.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com создан с использованием <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> CMS Green Gluon </a>, системы управления контентом, разработанной для обеспечения мощности, скорости и масштабируемость.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Эта технология, использующая PHP7 и MySQL5, обеспечивает все функциональные возможности этого веб-сайта. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Проверьте нас на GitHub! </a></p>'
			;
			
			break;
			
		case 'tr':
					// Sort Words : Sorting Your Lists of Words For You
			$this->header_title_text = 'Kelimeleri Sırala: Sizin İçin Sözcük Listelerini Sıralama';
					
					// I sorted some words today!
			$quote_text = 'Bugün birkaç kelime sıraladım!';
				
					// Use this web app to sort lists of words and phrases.  You may sort alphabetically, reverse alphabetically, numerically, or reverse numerically.
			$div_mouseover = 'Kelimelerin ve cümlelerin listesini sıralamak için bu web uygulamasını kullanın. Alfabetik olarak sıralayabilir, alfabetik olarak, sayısal olarak veya sayısal olarak geriye doğru sıralayabilirsiniz.';
			
			$this->language_text = 'Dil';
			$about_header_title_text = 'Hakkımızda Daha Fazla Bilgi';
					
					// Content Header Text
			
			$mission_header_text = 'Misyon';
			$examples_header_text = 'Örnekler';
			$uses_header_text = 'Kullanımları';
			$history_header_text = 'Tarihçe';
			$technology_header_text = 'Teknoloji';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Kelimeleri sıralamak ve düzenlemek, hepimizin işte zaman zaman yapması gereken bir şeydir. Şimdi bunun için düzenli ve kesin bir yerimiz var.  SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Her şeyi sıralayarak, her şeyin nerede bulunabileceğini bilirsiniz. Bu, hem bilgi hem de fiziksel materyal için geçerlidir. Listeleriniz, indeksleriniz, koleksiyonlarınız, düzenlemeleriniz, hepsi burada sıralanabilir. İhtiyacınız olanı hızlı bir şekilde bulabildiğinizde, bilgilerinizi daha verimli bir şekilde kullanmak kolaydır. Elbette verimliliği artırır, ancak içeriğinizin toplam değerini hızlı bir şekilde tahmin etmenizi sağlar. Örgütsel yetenek, idari gözetim ve optimize edilmiş verimlilik - yani SortWords.com.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">SortWords.com\'da, güç sadece parmaklarınızın ucunda. Bu işlevsellik çoğu uygulamada bulunabilir, ancak şimdi herhangi bir işletim sisteminde tarayıcıda çalışan özel bir yer var. Organize olun, güçlü olun, sıralanın.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Metin listelerini sıralamak için bir yer mi arıyorsunuz? Onu buldun.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Aşağıda sitenin bazı örnek kullanımları bulunmaktadır ...</p>' .
				'<ul>' .
					'<li> Listeleri nasıl sıralarım? </li>' .
					'<li> Fikirleri nasıl düzenlerim? </li>' .
					'<li> Bilgileri nasıl kategorilere ayırabilirim? </li>' .
					'<li> Verileri nasıl depolarım? </li>' .
					'<li> Koleksiyonları nasıl harmanlarım? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Aşağıda sitenin bazı örnek kullanımları bulunmaktadır ...</p>' .
				'<ul>' .
					'<li> <em> İsim listesini </em> nasıl sıralarım? </li>' .
					'<li> Nasıl bir <em> numara listesini </em> sıralarım? </li>' .
					'<li> <em> Sayısal verilerin listesini nasıl düzenlerim </em>? </li>' .
					'<li> Bir <em> veri listesini nasıl sıralarım </em>? </li>' .
					'<li> Bir <em> adres listesini </em> nasıl sıralarım? </li>' .
					'<li> Bir <em> bilgi listesini </em> nasıl sıralarım? </li>' .
					'<li> <em> Yiyecek listesini nasıl düzenlerim </em>? </li>' .
					'<li> Bir <em> ad listesini </em> nasıl alfabetikleştiririm? </li>' .
					'<li> Bir <em> numara listesini </em> nasıl alfabetikleştiririm? </li>' .
					'<li> <em> Sayısal veri listesini </em> nasıl alfabetiklerim? </li>' .
					'<li> Bir <em> veri listesini </em> nasıl alfabetikleştiririm? </li>' .
					'<li> Bir <em> adres listesini </em> nasıl alfabetikleştiririm? </li>' .
					'<li> Bir <em> bilgi listesini </em> nasıl alfabetikleştiririm? </li>' .
					'<li> Bir <em> alışveriş listesini </em> nasıl alfabetikleştiririm? </li>' .
					'<li> Nasıl bir <em> ad listesi </em> sipariş edebilirim? </li>' .
					'<li> Nasıl bir <em> numara listesi </em> sipariş edebilirim? </li>' .
					'<li> Nasıl bir <em> sayısal veri listesi </em> sipariş edebilirim? </li>' .
					'<li> Nasıl bir <em> veri listesi </em> sipariş edebilirim? </li>' .
					'<li> Nasıl bir <em> adres listesi </em> sipariş edebilirim? </li>' .
					'<li> Nasıl bir <em> bilgi listesi </em> sipariş edebilirim? </li>' .
					'<li> <em> Yiyecek listesini nasıl sipariş edebilirim </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com 2 Haziran 2016\'da oluşturuldu ve piyasaya sürüldü. O zamandan beri, kullanıcılara her şey için kelimeleri nasıl sıralayacaklarını gösteriyoruz.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com, güç ve hız için tasarlanmış bir içerik yönetim sistemi olan <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a> kullanılarak oluşturulmuştur. ölçeklenebilirlik.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">PHP7 ve MySQL5 kullanan bu teknoloji, bu web sitesinin tüm işlevselliğini sağlar. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> GitHub\'da bize göz atın! </a></p>'
			;
			
			break;
			
		case 'zh':
					// Sort Words : Sorting Your Lists of Words For You
			$this->header_title_text = '排序单词：为您排序单词列表';
					
					// I sorted some words today!
			$quote_text = '我今天整理了一些单词！';
				
					// Use this web app to sort lists of words and phrases.  You may sort alphabetically, reverse alphabetically, numerically, or reverse numerically.
			$div_mouseover = '使用此Web应用程序对单词和短语列表进行排序。 您可以按字母顺序排序，按字母顺序，数字顺序或数字反转排序。';
			
			$this->language_text = '语言';
			$about_header_title_text = '关于我们的更多信息';
					
					// Content Header Text
			
			$mission_header_text = '任务';
			$examples_header_text = '例子';
			$uses_header_text = '用途';
			$history_header_text = '历史';
			$technology_header_text = '技术';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">能够分类和组织单词是我们所有人在工作中不时必须做的事情。 现在我们有一个定期的，特定的地方去做。SortWords.com。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">通过对所有内容进行排序，您就知道可以找到所有内容。 信息和物理材料都是如此。 您的列表，索引，收藏品，您的安排，所有这些都可以在这里排序。 当您可以快速找到所需信息时，更容易使用您的信息。 当然，它可以提高效率，但它也可以让您快速估算内容的总价值。 组织能力，行政监督和优化效率 - 即SortWords.com。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">在SortWords.com上，功能就在您的指尖。 此功能可以在大多数应用程序中找到，但现在有一个专用的位置，可以在任何操作系统的浏览器中运行。 有条理，有力，有分类。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">你在寻找一些地方来排序文本列表吗？ 好吧，你找到了。</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">以下是该网站的一些示例用法......</p>' .
				'<ul>' .
					'<li>如何对列表进行排序？</li>' .
					'<li>我如何组织创意？</li>' .
					'<li>如何对信息进行分类？</li>' .
					'<li>如何存储数据？</li>' .
					'<li>如何整理馆藏？</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">以下是该网站的一些示例用途......</p>' .
				'<ul>' .
					'<li>如何对<em>名称列表进行排序</em>？</li>' .
					'<li>如何对<em>数字列表</em>进行排序？</li>' .
					'<li>如何排序<em>数字数据列表</em>？</li>' .
					'<li>如何排序<em>数据列表</em>？</li>' .
					'<li>如何排序<em>地址列表</em>？</li>' .
					'<li>如何对<em>信息列表</em>进行排序？</li>' .
					'<li>如何排序<em>杂货列表</em>？</li>' .
					'<li>如何按字母顺序排列<em>名称列表</em>？</li>' .
					'<li>如何按字母顺序排列<em>数字列表</em>？</li>' .
					'<li>如何按字母顺序排列<em>数字数据列表</em>？</li>' .
					'<li>如何按字母顺序排列<em>数据列表</em>？</li>' .
					'<li>如何按字母顺序排列<em>地址列表</em>？</li>' .
					'<li>如何按字母顺序排列<em>信息列表</em>？</li>' .
					'<li>如何按字母顺序排列<em>杂货列表</em>？</li>' .
					'<li>如何订购<em>名称</em>？</li>' .
					'<li>如何订购<em>数字列表</em>？</li>' .
					'<li>如何订购<em>数字数据列表</em>？</li>' .
					'<li>如何订购<em>数据列表</em>？</li>' .
					'<li>如何订购<em>地址列表</em>？</li>' .
					'<li>如何订购<em>信息列表</em>？</li>' .
					'<li>如何订购<em>杂货清单</em>？</li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com于2016年6月2日创建并推出。从那时起，我们一直向用户展示如何为任何事物和所有内容排序单词。</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">SortWords.com使用<a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>构建，这是一个专为功率，速度和设计而设计的内容管理系统。可扩展性。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">这项技术使用PHP7和MySQL5，提供了本网站的所有功能。 <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank">在GitHub上查看我们！</a></p>'
			;
			
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
	
	print('<center><h2 class="margin-5px font-family-tahoma">' . $about_header_title_text . ' :</h2></center>');
	
	$divider->displayend($divider_end_args);
	
			// Breadcrumb Trails
		
		// -------------------------------------------------------------
	
	print('<div class="horizontal-center width-95percent margin-top-5px">');
	print('<div class="float-left border-2px background-color-gray13">');
	print('<p class="font-family-arial margin-5px">');
	
	if($this->master_record)
	{
		print('<a href="' . $this->domain_object->GetPrimaryDomain([lowercase=>1, www=>1]) . '">');
		print($this->header_title_text);
		print('</a>');
		
		print(' &gt;&gt; ');
		
		print($about_header_title_text);
	}
	
	print('</p>');
	print('</div>');
	print('</div>');
	
			// Finish Breadcrumb Trails
		
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
	
			// Build Images
	
		// -------------------------------------------------------------
		
	$images = [
		/*[		# image 1
			'creator'=>'Glenn Halog',
			'license'=>'CC BY-NC 2.0',
			'source'=>'https://www.flickr.com/photos/ghalog/6662958693/',
			'filename'=>'fuck-the-police.jpg',
		],*/
		[
			'creator'=>'Robbie Sproule',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/robbie1/1555797/',
			'filename'=>'digital-internet-tunnel.jpg',		// 1555797_7d9af41276_o
		],
		[
			'creator'=>'Robbie Sproule',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/robbie1/1555798/',
			'filename'=>'digital-tunnel-to-consciousness.jpg',		// 1555798_d892d5c41d_o
		],
		[
			'creator'=>'Dennis Sylvester Hurd',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/dennissylvesterhurd/36420881/',
			'filename'=>'computer-memory-enables-digitization.jpg',		// 36420881_3d6c3c88b2_o
		],
		[
			'creator'=>'ReaL-FrienD',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/realfriend/64178901/',
			'filename'=>'master-control-station-or-mastery-control-station.jpg',		// 64178901_c3008ff401_o
		],
		[
			'creator'=>'Logan Ingalls',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/plutor/193877730/',
			'filename'=>'techno-geek-electrical-engineering-desktop.jpg',		// 193877730_40df06dddd_o
		],
		[
			'creator'=>'DSmous',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/geminidustin/275375865/',
			'filename'=>'mission-control-measuring-the-blips-and-the-bleeps.jpg',		// 275375865_9b92f94941_o
		],
		[
			'creator'=>'Jonathan Brodsky',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/jonbro/284102586/',
			'filename'=>'not-enough-wires-in-my-computer.jpg',		// 284102586_75bb13dec1_o
		],
		[
			'creator'=>'Holly Higgins',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/hollyberrie05/297626857/',
			'filename'=>'ground-control-to-whoever-likes-my-lasers.jpg',		// 297626857_65397a2430_o
		],
		[
			'creator'=>'Duncan Hull',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/dullhunk/359634390/',
			'filename'=>'grand-challenge-equations-of-computer-science.jpg',		// 359634390_e3d534e04b_o
		],
		[
			'creator'=>'altemark',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/altemark/363947788/',
			'filename'=>'pulse-of-the-universe-if-its-heart-were-the-electrons.jpg',		// 363947788_7df63ebe6e_o
		],
		[
			'creator'=>'Torley',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/torley/367721681/',
			'filename'=>'there-is-no-suchs-thing-as-data-overload.jpg',		// 367721681_e3a397bb33_o
		],
		[
			'creator'=>'Qasim Al Khuzaie',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/qassoom/370784627/',
			'filename'=>'maximum-laser-power-in-a-red-light-controlled-environment.jpg',		// 370784627_1140bbc5fc_o
		],
		[
			'creator'=>'fdecomite',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/fdecomite/449818981/',
			'filename'=>'pebble-rolling-down-the-sands-of-time.jpg',		// 449818981_f2c07adb24_o
		],
		[
			'creator'=>'Keenan Pepper',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/keenanpepper/486080654/',
			'filename'=>'sine-wave-of-electrical-pathways.jpg',		// 486080654_7b35778fb0_o
		],
		[
			'creator'=>'Kyle',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/wackyland/625696794/',
			'filename'=>'logic-circuit-laser-electro-diagram.jpg',		// 625696794_3c25affedb_o
		],
		[
			'creator'=>'Josh Kopel',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/mrigneous/842836418/',
			'filename'=>'oscilloscope-of-my-techno-dweeb-heart.jpg',		// 842836418_ae18dd72f2_o
		],
		[
			'creator'=>'dave',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/superdavechen/1129020996/',
			'filename'=>'caffeine-computer-love.jpg',		// 1129020996_20d357f10d_o
		],
		[
			'creator'=>'Edward Webb',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/crazyeddie/1463295872/',
			'filename'=>'radar-across-the-lightwaves-and-through-the-spectrum.jpg',		// 1463295872_bb030ac38f_o
		],
		[
			'creator'=>'ben dalton',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/noii/1841732364/',
			'filename'=>'electron-driven-power-and-logic-systems.jpg',		// 1841732364_4e7d3af10d_o
		],
		[
			'creator'=>'Paul Downey',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/psd/2109912106/',
			'filename'=>'electron-analysis-of-continuous-problems.jpg',		// 2109912106_865ceb7bfb_o
		],
		[
			'creator'=>'Dirk',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/dirkusmaximus/2214874011/',
			'filename'=>'electrical-engineering-logical-motherboard-solution.jpg',		// 2214874011_03ea5b10b9_o
		],
		[
			'creator'=>'Dirk',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/dirkusmaximus/2215666320/',
			'filename'=>'logical-adaptation-is-the-source-of-logical-brilliance.jpg',		// 2215666320_f0b211b6ca_o
		],
		[
			'creator'=>'Marcin Wichary',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/mwichary/2290086766/',
			'filename'=>'a-key-for-every-heart-string-and-every-mind-twist.jpg',		// 2290086766_07b22d2972_o
		],
		[
			'creator'=>'Peter Shanks',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/botheredbybees/2389301860/',
			'filename'=>'logic-dictates-that-this-circuit-will-work.jpg',		// 2389301860_a1ed02c163_o
		],
		[
			'creator'=>'Karl-Ludwig Poggemann',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/hinkelstone/2435823037/',
			'filename'=>'digitally-and-electronically-rewired.jpg',		// 2435823037_7c7598d137_o
		],
		[
			'creator'=>'Christian Klöppel',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/christian-kloeppel/2488788897/',
			'filename'=>'hallway-of-the-shadowy-brilliant-mysteries.jpg',		// 2488788897_e2df12f51f_o
		],
		[
			'creator'=>'Krassy Can Do It',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/krassycandoit/2518431249/',
			'filename'=>'brilliance-contrasted-against-geometry.jpg',		// 2518431249_3f69902d7d_o
		],
		[
			'creator'=>'Jon Callas',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/joncallas/2717324083/',
			'filename'=>'oscilloscopically-inline-with-technology.jpg',		// 2717324083_5ef7d1edc7_o
		],
		[
			'creator'=>'Adam Mayer',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/phooky/2852249114/',
			'filename'=>'one-pulse-for-the-heart-and-two-pulses-for-the-mind.jpg',		// 2852249114_10bcab7d10_o
		],
		[
			'creator'=>'A Gude',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/agude/2856224284/',
			'filename'=>'please-select-the-lever-that-does-the-special-stuff.jpg',		// 2856224284_aa180c95c2_o
		],
		[
			'creator'=>'Andres Rodriguez',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/symic/2899482713/',
			'filename'=>'mini-computer-cpu-core.jpg',		// 2899482713_7786e31924_o
		],
		[
			'creator'=>'Jos Dielis',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/dielis/3032289046/',
			'filename'=>'electron-boxes-to-store-all-your-power-needs.jpg',		// 3032289046_55911e1068_o
		],
		[
			'creator'=>'Marion Doss',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/ooocha/3070061808/',
			'filename'=>'ground-control-here-and-waiting-for-targets.jpg',		// 3070061808_08ef666d0b_o
		],
		[
			'creator'=>'Jonathan Haynes',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/jonathancharles/3141473903/',
			'filename'=>'check-your-incoming-signal-on-the-monitor.jpg',		// 3141473903_4d334084fe_o
		],
		[
			'creator'=>'arvind grover',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/arvindgrover/3171161577/',
			'filename'=>'banana-laptop-coffee-morning-time-go-go-go.jpg',		// 3171161577_a345a4d776_o
		],
		[
			'creator'=>'Roy Montgomery',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/roymontgomery/3315580974/',
			'filename'=>'lasers-dancing-and-music-are-the-essentials-of-existence.jpg',		// 3315580974_af6738a4af_o
		],
		[
			'creator'=>'pushandplay',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/pushandplay/3346168331/',
			'filename'=>'scene-decompiling-and-3d-visual-processing.jpg',		// 3346168331_7c939b15fe_o
		],
		[
			'creator'=>'Anders Sandberg',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/arenamontanus/3407135068/',
			'filename'=>'science-math-and-the-language-are-our-concepts.jpg',		// 3407135068_833dea354a_o
		],
		[
			'creator'=>'Creativity103',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/creative_stock/3457523146/',
			'filename'=>'sine-against-cosine-in-this-brutal-world.jpg',		// 3457523146_8941f68d96_o
		],
		[
			'creator'=>'Patrick Stahl',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/pdstahl/3467548157/',
			'filename'=>'computer-on-the-wall-who-is-the-leetest-of-them-all.jpg',		// 3467548157_6863d6c229_o
		],
		[
			'creator'=>'Patrick Stahl',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/pdstahl/3469156022/',
			'filename'=>'digital-board-to-heaven-with-bass-and-subwoofer.jpg',		// 3469156022_39ecdd267c_o
		],
		[
			'creator'=>'John R. Southern',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/krunkwerke/3477207473/',
			'filename'=>'auxiliary-power-and-brilliance-connectors.jpg',		// 3477207473_7ef8ee9df5_o
		],
		[
			'creator'=>'Kristian Thøgersen',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/flottenheimer/3522385070/',
			'filename'=>'digital-rainbow-through-the-global-cloud.jpg',		// 3522385070_b8659a49ac_o
		],
		[
			'creator'=>'Mark Cameron',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/marada/3596236819/',
			'filename'=>'mission-control-in-watch-of-the-relays-and-switches.jpg',		// 3596236819_14151c8da1_o
		],
		[
			'creator'=>'David Orban',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/davidorban/3629258983/',
			'filename'=>'tunneling-portal-through-time-and-space.jpg',		// 3629258983_d498f9332c_o
		],
		[
			'creator'=>'Shawn Nystrand',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/the_webhamster/3754194116/',
			'filename'=>'connected-grid-provides-power-and-reliability.jpg',		// 3754194116_75fb7b8ca9_o
		],
		[
			'creator'=>'Fernando Marcelino',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/fernandomarcelino/3924758480/',
			'filename'=>'neon-green-sinewave-is-the-ideal-technological-pattern.jpg',		// 3924758480_561db994f6_o
		],
		[
			'creator'=>'Razvan Orendovici',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/razvanorendovici/4140355880/',
			'filename'=>'unlimited-flow-of-information-equals-unlimited-power.jpg',		// 4140355880_eafbb9a187_o
		],
		[
			'creator'=>'Mark Rowland',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/roubicek/4305786259/',
			'filename'=>'laser-hallway-of-internet-connectivity.jpg',		// 4305786259_ede3ce7fc0_o
		],
		[
			'creator'=>'Mark Rowland',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/roubicek/4306520908/',
			'filename'=>'swirl-patterns-of-data-mining-against-a-two-dimensional-backdrop.jpg',		// 4306520908_9cb2c7aa42_o
		],
		[
			'creator'=>'gurmit singh',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/gurms/4362825014/',
			'filename'=>'light-powers-blasted-against-the-dark-powers.jpg',		// 4362825014_0e2f691a69_o
		],
		[
			'creator'=>'Windell Oskay',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/oskay/4421548945/',
			'filename'=>'circuit-to-the-heart-and-the-mind.jpg',		// 4421548945_ecebe562ec_o
		],
		[
			'creator'=>'Windell Oskay',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/oskay/4422312064/',
			'filename'=>'proton-yield-sustaining-against-intensive-gamma-radiation.jpg',		// 4422312064_ed8d60dfb6_o
		],
		[
			'creator'=>'Zach Zupancic',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/crazyoctopus/4467690139/',
			'filename'=>'circuit-diagram-and-the-flow-of-technical-information.jpg',		// 4467690139_0c31f79cfe_o
		],
		[
			'creator'=>'RaVerXeNo2010',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/shaundelage/4651122224/',
			'filename'=>'green-dots-connecting-to-form-a-full-informational-pattern.jpg',		// 4651122224_b1302d9338_o
		],
		[
			'creator'=>'Blake Patterson',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/blakespot/4817090890/',
			'filename'=>'data-ribbon-cable-connection-on-the-green-silicon-valley.jpg',		// 4817090890_0b645dd58b_o
		],
		[
			'creator'=>'Blake Patterson',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/randomskk/4876772918/',
			'filename'=>'on-and-off-as-the-ideal-data-metric.jpg',		// 4876772918_101a8614d5_o
		],
		[
			'creator'=>'Alan Levine',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/cogdog/4905720367/',
			'filename'=>'wired-from-mecca-to-new-york-to-st-petersburg.jpg',		// 4905720367_644d754c5b_o
		],
		[
			'creator'=>'Joanna Poe',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/jopoe/5035399450/',
			'filename'=>'endless-journey-toward-consolation-and-data-throughput.jpg',		// 5035399450_6ff5171ac7_o
		],
		[
			'creator'=>'Zach Zupancic',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/crazyoctopus/5121956722/',
			'filename'=>'unaligned-circuit-prepares-for-intensive-readjustment.jpg',		// 5121956722_d6b7462995_o
		],
		[
			'creator'=>'Shannon Blackburn',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/wildtexas/5170409612/',
			'filename'=>'one-thousand-data-systems-within-the-exchange.jpg',		// 5170409612_68072689d4_o
		],
		[
			'creator'=>'Arthur John Picton',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/arthurjohnpicton/5304260588/',
			'filename'=>'radar-command-picking-up-unusual-signals-to-the-northeast.jpg',		// 5304260588_435256fd83_o
		],
		[
			'creator'=>'Satoshi KAYA',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/kayakaya/5323341588/',
			'filename'=>'radar-signals-inbound-do-not-match-up-with-calculated-data.jpg',		// 5323341588_12832610fe_o
		],
		[
			'creator'=>'Michael Styne',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/mstyne/5377204996/',
			'filename'=>'electron-against-the-nucleus-in-this-mad-world.jpg',		// 5377204996_aa0ff08b24_o
		],
		[
			'creator'=>'NOAA Photo Library',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/noaaphotolib/5425221954/',
			'filename'=>'ground-control-listening-for-vibrations-in-the-stratosphere.jpg',		// 5425221954_34fba55da0_o
		],
		[
			'creator'=>'Andy Li',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/andy-li/5457844452/',
			'filename'=>'digital-logic-diagram-of-forest-of-decisions.jpg',		// 5457844452_597ef9904b_o
		],
		[
			'creator'=>'NASA APPEL Knowledge Services',
			'license'=>'Public Domain',
			'source'=>'https://www.flickr.com/photos/nasa_appel/5556072698/',
			'filename'=>'green-screen-monitor-of-death-and-absolution.jpg',		// 5556072698_377785c34f_o
		],
		[
			'creator'=>'Max Braun',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/maxbraun/5745046913/',
			'filename'=>'some-light-at-the-end-of-the-tunnel-to-all-this-madness.jpg',		// 5745046913_be7bafae65_o
		],
		[
			'creator'=>'Carol Neuschul',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/pixculture/5803552859/',
			'filename'=>'dance-of-the-afternight-jellyfish-in-techno-mode.jpg',		// 5803552859_6957a10d54_o
		],
		[
			'creator'=>'Jamie Bellal',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/yabphotos/5852706367/',
			'filename'=>'dj-logic-puts-up-another-track-of-logically-composed-ideals.jpg',		// 5852706367_4b0c6a5fcf_o
		],
		[
			'creator'=>'Tufani Mayfield',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/tufani/5934757597/',
			'filename'=>'static-contrasted-against-signal-produces-beauty.jpg',		// 5934757597_9c6f999278_o
		],
		[
			'creator'=>'Joy Mystic',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/joymystic/6010025114/',
			'filename'=>'digital-battlestation-ready-for-internet-fighting.jpg',		// 6010025114_b7abfc0311_o
		],
		[
			'creator'=>'Chris Metcalf',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/laffy4k/6064636026/',
			'filename'=>'increase-the-bandwith-and-cut-the-distortion.jpg',		// 6064636026_3b1c05673d_o
		],
		[
			'creator'=>'Catrin Austin',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/catrinaustin/6188864651/',
			'filename'=>'enter-the-mystical-complex-of-brilliance-and-thunder.jpg',		// 6188864651_9eb84119b5_o
		],
		[
			'creator'=>'Felix Morgner',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/felixmorgner/6312726999/',
			'filename'=>'measuring-the-pulse-of-society-and-technology-together.jpg',		// 6312726999_e33f1f3490_o
		],
		[
			'creator'=>'Dennis Skley',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/dskley/6536548107/',
			'filename'=>'harmonic-brilliance-of-the-digital-circuit.jpg',		// 6536548107_85bc523bac_o
		],
		[
			'creator'=>'NASA Goddard Space Flight Center',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/nasa_goddard/6560643705/',
			'filename'=>'testing-the-technology-to-conform-to-humanity.jpg',		// 6560643705_ea34a197b4_o
		],
		[
			'creator'=>'Dru Bloomfield',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/athomeinscottsdale/6613027937/',
			'filename'=>'master-laser-show-before-the-masses.jpg',		// 6613027937_cf767db427_o
		],
		[
			'creator'=>'deepsonic',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/deepsonic/6912039873/',
			'filename'=>'digital-circuits-and-temporary-memory-pathways.jpg',		// 6912039873_a23bee88a7_o
		],
		[
			'creator'=>'deepsonic',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/deepsonic/6912069063/',
			'filename'=>'attack-time-calculation-is-possibly-inconceivable.jpg',		// 6912069063_b376dca450_o
		],
		[
			'creator'=>'Lisa Brewster',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/sophistechate/6912499296/',
			'filename'=>'coordinator-unit-is-refusing-to-work-with-aggression-unit.jpg',		// 6912499296_db7586c5f0_o
		],
		[
			'creator'=>'Travis Goodspeed',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/travisgoodspeed/7106527681/',
			'filename'=>'parallel-circuit-diagram-denoting-logic-and-coordination.jpg',		// 7106527681_2d15798a77_o
		],
		[
			'creator'=>'CLS Research Office',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/clsresoff/7159374480/',
			'filename'=>'just-one-more-nuclear-plant-to-keep-watch-over.jpg',		// 7159374480_2362645816_o
		],
		[
			'creator'=>'Alexander Baxevanis',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/futureshape/7706846866/',
			'filename'=>'power-and-intelligence-broadcast-over-the-sky.jpg',		// 7706846866_77fdb0e141_o
		],
		[
			'creator'=>'Adam Foster',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/twosevenoneonenineeightthreesevenatenzerosix/7848902570/',
			'filename'=>'systems-maintenance-and-control-unit-on-the-ready.jpg',		// 7848902570_cde4f30ac0_o
		],
		[
			'creator'=>'NASA APPEL Knowledge Services',
			'license'=>'Public Domain',
			'source'=>'https://www.flickr.com/photos/nasa_appel/7893984008/',
			'filename'=>'broadcasting-past-your-mind-and-into-the-future.jpg',		// 7893984008_6ddf3d277e_o
		],
		[
			'creator'=>'Charles Kremenak',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/charleskremenak/7898527008/',
			'filename'=>'electron-and-atom-bending-against-and-burning-within-each-other.jpg',		// 7898527008_4cc4bfca6d_o
		],
		[
			'creator'=>'martin_vmorris',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/martin55/7986843384/',
			'filename'=>'give-me-the-switch-any-switch.jpg',		// 7986843384_6b6d82051a_o
		],
		[
			'creator'=>'Metropolitan Transportation Authority of the State of New York',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/mtaphotos/8048296016/',
			'filename'=>'hexagonal-mastery-of-brilliance-and-technology-together.jpg',		// 8048296016_8d04c1061e_o
		],
		[
			'creator'=>'Manuel Aristarán',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/jazzido/8097291809/',
			'filename'=>'digital-circuitry-powering-computer-development.jpg',		// 8097291809_e38d1a0fcc_o
		],
		[
			'creator'=>'Dennis van Zuijlekom',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/dvanzuijlekom/8183805051/',
			'filename'=>'red-buttons-are-bad-green-buttons-are-good.jpg',		// 8183805051_ba3b6ed9e4_o
		],
		[
			'creator'=>'IAEA Imagebank',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/iaea_imagebank/8385432391/',
			'filename'=>'nuclear-power-still-running-at-optimal-efficiency.jpg',		// 8385432391_95c7c3217c_o
		],
		[
			'creator'=>'Pete Brown',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/psychlist1972/8418290509/',
			'filename'=>'digits-circuits-metal-machinery-logic-and-a-little-bit-of-beauty.jpg',		// 8418290509_28a586d58c_o
		],
		[
			'creator'=>'régine debatty',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/nearnearfuture/8446996549/',
			'filename'=>'door-leading-to-the-technological-netherworld.jpg',		// 8446996549_69493b758e_o
		],
		[
			'creator'=>'NASA APPEL Knowledge Services',
			'license'=>'Public Domain',
			'source'=>'https://www.flickr.com/photos/nasa_appel/8510829720/',
			'filename'=>'close-examination-reveals-burnt-plastic-and-bad-algorithms.jpg',		// 8510829720_c232388634_o
		],
		[
			'creator'=>'Dennis van Zuijlekom',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/dvanzuijlekom/8521623921/',
			'filename'=>'one-million-bits-and-bleeps-per-second.jpg',		// 8521623921_391a1cb09f_o
		],
		[
			'creator'=>'Counse',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/cbroders/8557913411/',
			'filename'=>'technotronic-phonebooth-from-the-future-and-with-lasers.jpg',		// 8557913411_4e2fc52c6a_o
		],
		[
			'creator'=>'Counse',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/cbroders/8557923207/',
			'filename'=>'electron-trees-growing-through-the-digital-forest.jpg',		// 8557923207_989800dfa4_o
		],
		[
			'creator'=>'SLAC National Accelerator Laboratory',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/slaclab/8570190312/',
			'filename'=>'a-modern-tesla-in-this-mad-industry.jpg',		// 8570190312_29962bed06_o
		],
		[
			'creator'=>'NASA APPEL Knowledge Services',
			'license'=>'Public Domain',
			'source'=>'https://www.flickr.com/photos/nasa_appel/8574346035/',
			'filename'=>'component-analysis-initiated-and-proceeding.jpg',		// 8574346035_a3f0cbc8b7_o
		],
		[
			'creator'=>'NASA APPEL Knowledge Services',
			'license'=>'Public Domain',
			'source'=>'https://www.flickr.com/photos/nasa_appel/8589263717/',
			'filename'=>'satellite-of-love-looking-down-at-this-radical-psychedelic-world.jpg',		// 8589263717_e675679cf2_o
		],
		[
			'creator'=>'Henri Bergius',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/bergie/8635266221/',
			'filename'=>'computer-ai-here-watching-you-and-just-doing-what-i-do.jpg',		// 8635266221_1bfd27744c_o
		],
		[
			'creator'=>'hackNY.org',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/hackny/8675042626/',
			'filename'=>'ultra-wired-through-the-core.jpg',		// 8675042626_c909216b51_o
		],
		[
			'creator'=>'Adam Foster',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/twosevenoneonenineeightthreesevenatenzerosix/8719825080/',
			'filename'=>'systems-control-reporting-back-that-no-problems-are-found.jpg',		// 8719825080_aeca144f80_o
		],
		[
			'creator'=>'Adam Foster',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/twosevenoneonenineeightthreesevenatenzerosix/8719825254/',
			'filename'=>'cockpit-to-the-digital-pathways-and-electronic-vibes.jpg',		// 8719825254_c06f3984a2_o
		],
		[
			'creator'=>'COMSEVENTHFLT',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/us7thfleet/8734025158/',
			'filename'=>'rewiring-the-oscilloscope-to-the-rock-and-roll-mode.jpg',		// 8734025158_7a1473461a_o
		],
		[
			'creator'=>'Michael Lux',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/michaellux/8758628566/',
			'filename'=>'one-more-formula-to-describe-the-relationship-of-eternity-and-mind.jpg',		// 8758628566_e484652a52_o
		],
		[
			'creator'=>'Oak Ridge National Laboratory',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/oakridgelab/8806362948/',
			'filename'=>'tracking-and-watching-the-changes-in-command-and-power.jpg',		// 8806362948_16a3127bff_o
		],
		[
			'creator'=>'Mark Wilson',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/funnypolynomial/8837669326/',
			'filename'=>'oscilloscope-or-japanese-clock-you-decide.jpg',		// 8837669326_43abd0f84c_o
		],
		[
			'creator'=>'NASA APPEL Knowledge Services',
			'license'=>'Public Domain',
			'source'=>'https://www.flickr.com/photos/nasa_appel/8970445498/',
			'filename'=>'angular-momentum-of-the-body-and-the-mind.jpg',		// 8970445498_5e12fbd7a0_o
		],
		[
			'creator'=>'NASA\'s Marshall Space Flight Center',
			'license'=>'Public Domain',
			'source'=>'https://www.flickr.com/photos/nasamarshall/9076806233/',
			'filename'=>'atomic-chamber-for-measuring-electron-performance.jpg',		// 9076806233_522df5646d_o
		],
		[
			'creator'=>'Idaho National Laboratory',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/inl/9193576875/',
			'filename'=>'one-visual-display-for-every-binary-system-being-watched.jpg',		// 9193576875_50c4deedb7_o
		],
		[
			'creator'=>'Defence Images',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/defenceimages/9199437265/',
			'filename'=>'scientist-and-computer-in-perpetual-lock-of-each-other.jpg',		// 9199437265_b146ca445c_o
		],
		[
			'creator'=>'Freya Schmidt',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/65238468@N08/10103838194/',
			'filename'=>'digital-connectivity-for-the-masses.jpg',		// 10103838194_97d7c28244_o
		],
		[
			'creator'=>'Dion Hinchcliffe',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/dionhinchcliffe/10338129283/',
			'filename'=>'electron-transfer-towering-above-the-world.jpg',		// 10338129283_eb73b1f1e7_o
		],
		[
			'creator'=>'Scott W. Vincent',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/lungstruck/10779667803/',
			'filename'=>'algorithm-optimization-in-progress.jpg',		// 10779667803_579dfd9127_o
		],
		[
			'creator'=>'methodshop .com',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/methodshop/11032189304/',
			'filename'=>'monitor-team-on-the-task.jpg',		// 11032189304_54e3cf7b7c_o
		],
		[
			'creator'=>'Patrick Finnegan',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/vax-o-matic/11612944765/',
			'filename'=>'digitally-restructured-binary-trees-provide-best-performance.jpg',		// 11612944765_2ab3716302_o
		],
		[
			'creator'=>'Patrick Finnegan',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/vax-o-matic/11613243165/',
			'filename'=>'atomic-processing-is-a-matter-of-the-now.jpg',		// 11613243165_08684a9803_o
		],
		[
			'creator'=>'Davino',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/daview/11697635574/',
			'filename'=>'memory-and-cpus-wired-together-on-the-backend.jpg',		// 11697635574_d0841d6b5f_o
		],
		[
			'creator'=>'UC Davis College of Engineering',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/ucdaviscoe/12004175116/',
			'filename'=>'chip-of-the-ol-cpu-block-from-the-old-motherboard-neighborhood.jpg',		// 12004175116_b2920f8de9_o
		],
		[
			'creator'=>'Marco Assini',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/marco_ask/12107349526/',
			'filename'=>'molex-power-connector-contrasts-against-our-power-and-data-connectors.jpg',		// 12107349526_c4e791ca82_o
		],
		[
			'creator'=>'Amanda',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/amanderson/13180677873/',
			'filename'=>'electron-tower-providing-endless-digital-illumination.jpg',		// 13180677873_34b0b778eb_o
		],
		[
			'creator'=>'Thorsten Krienke',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/krienke/13437558964/',
			'filename'=>'lasers-in-all-directions-and-at-all-times-and-for-all-reasons.jpg',		// 13437558964_626551f81f_o
		],
		[
			'creator'=>'Thorsten Krienke',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/krienke/13437753324/',
			'filename'=>'laser-distribution-is-following-defined-formulaic-laws.jpg',		// 13437753324_c0b690a1b0_o
		],
		[
			'creator'=>'Thorsten Krienke',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/krienke/13437879934/',
			'filename'=>'power-tower-reaching-through-to-the-data-river.jpg',		// 13437879934_1148b21273_o
		],
		[
			'creator'=>'wetwebwork',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/wetwebwork/14317250680/',
			'filename'=>'ubuntu-network-scanning-in-progress.jpg',		// 14317250680_03ba25c2e8_o
		],
		[
			'creator'=>'David J',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/sebilden/14438018995/',
			'filename'=>'data-patterns-modeled-on-a-multi-dimensional-platform.jpg',		// 14438018995_3a373e7fea_o
		],
		[
			'creator'=>'NACA',
			'license'=>'Public Domain',
			'source'=>'https://www.flickr.com/photos/24354425@N03/14470396028/',
			'filename'=>'every-computer-wired-to-the-same-signal.jpg',		// 14470396028_1eeb562d46_o
		],
		[
			'creator'=>'Marco Verch',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/30478819@N08/14505353488/',
			'filename'=>'all-systems-properly-relaying-data-and-statistics.jpg',		// 14505353488_7b245bbee8_o
		],
		[
			'creator'=>'Nan Palmero',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/nanpalmero/14588580964/',
			'filename'=>'happiness-as-the-grand-thing-for-all-of-living-purpose.jpg',		// 14588580964_f773b0e115_o
		],
		[
			'creator'=>'Thorsten Krienke',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/krienke/14663320412/',
			'filename'=>'disco-party-at-revolutionary-headquarters.jpg',		// 14663320412_8bbbaffbed_o
		],
		[
			'creator'=>'Darrell A.',
			'license'=>'Public Domain',
			'source'=>'https://www.flickr.com/photos/117427305@N05/15722572132/',
			'filename'=>'smoking-weed-and-listening-to-music.jpg',		// 15722572132_c875823cc0_o
		],
		[
			'creator'=>'UpSticksNGo Crew',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/upsticksngo/15789488057/',
			'filename'=>'every-blip-and-bleep-contributing-to-the-whole-sound.jpg',		// 15789488057_82c2c50dba_o
		],
		[
			'creator'=>'Matt Brown',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/londonmatt/15803030488/',
			'filename'=>'amiga-commodore-atari-mastery-etc-workstation.jpg',		// 15803030488_3d016166a0_o
		],
		[
			'creator'=>'Nan Palmero',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/nanpalmero/15879032767/',
			'filename'=>'cathedral-of-psychedelic-and-logical-power.jpg',		// 15879032767_2429b12e6c_o
		],
		[
			'creator'=>'UpSticksNGo Crew',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/upsticksngo/15949406436/',
			'filename'=>'millions-of-lasers-blending-against-the-light.jpg',		// 15949406436_e15b8e36b4_o
		],
		[
			'creator'=>'giesing',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/giesing/16503462226/',
			'filename'=>'cold-fusion-based-technique-for-radar-control.jpg',		// 16503462226_851594c1a2_o
		],
		[
			'creator'=>'fs-phil',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/fsphil/17516251194/',
			'filename'=>'millions-of-monitors-for-millions-of-users.jpg',		// 17516251194_cc4f2bcb6e_o
		],
		[
			'creator'=>'Matthew Juzenas',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/mjuzenas/18192697588/',
			'filename'=>'blip-blip-against-the-bleep-bleep-in-this-dark-world.jpg',		// 18192697588_70ccc63e92_o
		],
		[
			'creator'=>'ESA_events',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/esa_events/19270367431/',
			'filename'=>'deliberate-wire-shark-attempt-on-port-number.jpg',		// 19270367431_cabc4333a2_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/20013034943/',
			'filename'=>'keys-of-logic-and-keys-of-board.jpg',		// 20013034943_8d05a13ab1_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/20445396158/',
			'filename'=>'binary-logic-contrasted-against-real-world-logic.jpg',		// 20445396158_cd5085aa8a_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/20537027794/',
			'filename'=>'authentication-crypto-key-decryption-sequence.jpg',		// 20537027794_7e26f4a343_o
		],
		[
			'creator'=>'tony_duell',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/tony_duell/20654752948/',
			'filename'=>'diagram-of-a-circuit-hell-without-angels-or-demons.jpg',		// 20654752948_4cfd0b85e7_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/20658192674/',
			'filename'=>'bound-to-limitless-potential-in-the-darkest-world.jpg',		// 20658192674_3dddb878d3_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/20946247399/',
			'filename'=>'command-control-options-in-power-of-the-system.jpg',		// 20946247399_f574f128d2_o
		],
		[
			'creator'=>'Antonio Roberts',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/hellocatfood/21114346719/',
			'filename'=>'thousands-of-keypress-and-keyturns-to-a-single-emotion.jpg',		// 21114346719_e486d00d98_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/21133466726/',
			'filename'=>'crypto-keys-of-system-authenticated-users.jpg',		// 21133466726_d33823ffc2_k
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/21133467696/',
			'filename'=>'infinite-users-in-an-infinite-space.jpg',		// 21133467696_d54b0aed65_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/21159699905/',
			'filename'=>'rsa-authenticated-key-list-for-master-users.jpg',		// 21159699905_bbb5fbc310_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/21167500651/',
			'filename'=>'decryption-algorithm-completion-time-estimated-in-years.jpg',		// 21167500651_42c2a535bd_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/22463919567/',
			'filename'=>'code-anomaly-found-at-point-alpha.jpg',		// 22463919567_60571564dc_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/22868801292/',
			'filename'=>'echo-code-test-photographic-artwork.jpg',		// 22868801292_54ed356705_o
		],
		[
			'creator'=>'www.Pixel.la Free Stock Photos',
			'license'=>'Public Domain',
			'source'=>'https://www.flickr.com/photos/137643065@N06/23698613303/',
			'filename'=>'ventilation-of-cpu-and-ram-to-guarantee-stable-electron-flow.jpg',		// 23698613303_6082438af7_o
		],
		[
			'creator'=>'Dave Jones',
			'license'=>'Public Domain',
			'source'=>'https://www.flickr.com/photos/eevblog/24126403559/',
			'filename'=>'electrically-engineering-the-hell-out-of-this-thing.jpg',		// 24126403559_cc3b345894_o
		],
		[
			'creator'=>'Har Gobind Singh Khalsa',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/gobindkhalsa/24413047686/',
			'filename'=>'da-vinci-and-the-natural-shape-of-the-human-mind.jpg',		// 24413047686_4768ba963e_o
		],
		[
			'creator'=>'Robert Anders',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/schwarzbrot/24485223267/',
			'filename'=>'anime-of-the-oscilloscopes.jpg',		// 24485223267_7df35d6fe7_o
		],
		[
			'creator'=>'Christopher Henry',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/153004825@N03/25316738978/',
			'filename'=>'geometry-of-the-mind-applied-to-the-logic-of-circuitry.jpg',		// 25316738978_86bb09ccbc_o
		],
		[
			'creator'=>'Thorsten Krienke',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/krienke/25945189055/',
			'filename'=>'red-laser-lightshow-of-architectural-logic-and-brilliance.jpg',		// 25945189055_f965a94e33_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/26519416396/',
			'filename'=>'ssh-attack-script-for-linux-system-and-ifconfig.jpg',		// 26519416396_b88da63ac3_o
		],
		[
			'creator'=>'User #160462157@flickr',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/160462157@N08/27650962608/',
			'filename'=>'gigabit-data-connections-throughout-all-architecture.jpg',		// 27650962608_b20f457f59_o
		],
		[
			'creator'=>'User #160462157@flickr',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/160462157@N08/27696862078/',
			'filename'=>'transfer-system-of-matter-and-ideas.jpg',		// 27696862078_e23267f88c_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/27812526352/',
			'filename'=>'mvc-views-and-data-control-mechanism-through-code.jpg',		// 27812526352_63720ed5f1_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/27812527502/',
			'filename'=>'max-min-limits-api-service-calculation-in-scripting.jpg',		// 27812527502_88bae173f3_o
		],
		[
			'creator'=>'tony_duell',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/tony_duell/28067205617/',
			'filename'=>'logic-diagram-and-analytical-concepts-chart-for-circuit.jpg',		// 28067205617_85626863f2_o
		],
		[
			'creator'=>'godata img',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/141899785@N06/28106901961/',
			'filename'=>'another-radar-dish-just-looking-for-a-kindred-mind.jpg',		// 28106901961_de3fe1d698_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/29633529472/',
			'filename'=>'electron-map-of-the-motherboard-circuitry-decision-making.jpg',		// 29633529472_557a9a8473_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/29745134205/',
			'filename'=>'logic-means-truth-and-binary-logic-means-computer-truth.jpg',		// 29745134205_ee1d9fbf1e_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/29745134445/',
			'filename'=>'capacitance-of-logic-provides-the-memory-of-the-computer.jpg',		// 29745134445_9f63ece703_o
		],
		[
			'creator'=>'User #160462157@flickr',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/160462157@N08/29846634418/',
			'filename'=>'ultimate-horizon-on-the-civilized-edge-of-existence.jpg',		// 29846634418_a752fc239e_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/29854860342/',
			'filename'=>'while-reading-system-batch-file-provide-output-to-sysadmin.jpg',		// 29854860342_876dd1a01e_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/29854860712/',
			'filename'=>'i-am-the-request-and-the-logic.jpg',		// 29854860712_9cf442d94c_o
		],
		[
			'creator'=>'denisbin',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/82134796@N03/30225769627/',
			'filename'=>'laser-powered-brilliance-converter.jpg',		// 30225769627_ae979cbf9f_o
		],
		[
			'creator'=>'User #160462157@flickr',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/160462157@N08/30304888527/',
			'filename'=>'one-million-lines-of-code-cannot-stop-a-small-virus.jpg',		// 30304888527_8aa65fe7f7_o
		],
		[
			'creator'=>'denisbin',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/82134796@N03/30360384407/',
			'filename'=>'dance-or-logic-yourself-to-the-bar.jpg',		// 30360384407_8b4e657ac7_o
		],
		[
			'creator'=>'sandra hibb',
			'license'=>'Public Domain',
			'source'=>'https://www.flickr.com/photos/139351344@N07/30398261260/',
			'filename'=>'infinite-colors-contrasted-against-infinite-algorithms.jpg',		// 30398261260_4f2e34f1bf_o
		],
		[
			'creator'=>'Mussi Katz',
			'license'=>'Public Domain',
			'source'=>'https://www.flickr.com/photos/mussikatz/30622486187/',
			'filename'=>'multiple-radars-for-multiple-spectral-wavelengths.jpg',		// 30622486187_f5d412bed3_o
		],
		[
			'creator'=>'sandra hibb',
			'license'=>'Public Domain',
			'source'=>'https://www.flickr.com/photos/139351344@N07/30698266635/',
			'filename'=>'light-analysis-on-the-colors-of-existence.jpg',		// 30698266635_9a179eb9c5_o
		],
		[
			'creator'=>'Philippe Put',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/34547181@N00/31125482324/',
			'filename'=>'fountains-of-color-and-psychedelia.jpg',		// 31125482324_09e4d780a5_o
		],
		[
			'creator'=>'Philippe Put',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/34547181@N00/31147844094/',
			'filename'=>'want-and-ego-are-not-one-and-the-same.jpg',		// 31147844094_158be17770_o
		],
		[
			'creator'=>'Philippe Put',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/34547181@N00/31178714003/',
			'filename'=>'millions-of-databits-for-endless-streams-of-info.jpg',		// 31178714003_a645b2174b_o
		],
		[
			'creator'=>'User #160462157@flickr',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/160462157@N08/31369922498/',
			'filename'=>'keyboard-deus-ex-machina-for-the-programmer.jpg',		// 31369922498_41e03bce6a_o
		],
		[
			'creator'=>'User #160462157@flickr',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/160462157@N08/31369923398/',
			'filename'=>'code-require-include-dependency-conclusion-or-dependency-injection.jpg',		// 31369923398_b265e1f26f_o
		],
		[
			'creator'=>'Philippe Put',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/34547181@N00/31614225850/',
			'filename'=>'endless-travel-in-this-pipedream-of-reality.jpg',		// 31614225850_27c45b201d_o
		],
		[
			'creator'=>'Karen Roe',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/karen_roe/31759240313/',
			'filename'=>'elephants-of-the-sine-wave-and-mice-of-the-mathematicians.jpg',		// 31759240313_5607ae5bda_o
		],
		[
			'creator'=>'Dampfzentrale Bern',
			'license'=>'CC BY-ND 2.0',
			'source'=>'https://www.flickr.com/photos/131711151@N05/32693595291/',
			'filename'=>'phased-against-the-phase-ambience.jpg',		// 32693595291_12c05db882_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/33091146460/',
			'filename'=>'keys-and-ciphers-among-this-mass-of-electronic-madness.jpg',		// 33091146460_fd309b0477_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/33091154720/',
			'filename'=>'array-to-function-analytics-output-with-keyboard.jpg',		// 33091154720_927c85f72d_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/33318605932/',
			'filename'=>'every-green-computer-character-equals-one-byte.jpg',		// 33318605932_0ab48911ff_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/33318606502/',
			'filename'=>'initiate-program-hacker-one-on-the-mainframe.jpg',		// 33318606502_661197f13d_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/33433851596/',
			'filename'=>'computer-terminal-connected-to-the-core-of-madness.jpg',		// 33433851596_4c89eea5c9_o
		],
		[
			'creator'=>'caliandris',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/29883063@N00/33528505265/',
			'filename'=>'dancing-against-logic-bits-in-a-binary-storm.jpg',		// 33528505265_3d0ceab1e3_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/33904011110/',
			'filename'=>'if-null-pointer-then-goto-null-exception.jpg',		// 33904011110_1f9c555b32_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/33904011850/',
			'filename'=>'try-var-escape-sequences-and-their-code-blocks.jpg',		// 33904011850_27e427e830_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/34156921031/',
			'filename'=>'one-thousand-and-one-bytes-in-this-get-request.jpg',		// 34156921031_543d8870a7_o
		],
		[
			'creator'=>'Carter McKendry',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/seiya235/34162659441/',
			'filename'=>'calculating-jupiter-landing-sequence-in-t-minus-one-minute.jpg',		// 34162659441_293c9bdb51_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/34247406926/',
			'filename'=>'string-and-function-pointers-equivallently-treated.jpg',		// 34247406926_76e5d13142_o
		],
		[
			'creator'=>'Christiaan Colen',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/christiaancolen/34287882275/',
			'filename'=>'microservice-request-responding-with-200-over-https.jpg',		// 34287882275_b00ca4329b_o
		],
		[
			'creator'=>'H. KoPP',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/kopp1963/36405915524/',
			'filename'=>'unlimited-hallway-of-doom-and-destruction.jpg',		// 36405915524_29db74a73c_o
		],
		[
			'creator'=>'Astro',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/127035051@N06/36434344415/',
			'filename'=>'infinite-color-spectrum-in-this-mad-world-of-chaos.jpg',		// 36434344415_2d448edf82_o
		],
		[
			'creator'=>'miguel_discart_vrac_2',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/miguel_discart_vrac_2/38673596730/',
			'filename'=>'massive-unlimited-color-matrix-transcending-the-fifth-dimension.jpg',		// 38673596730_4aae848186_o
		],
		[
			'creator'=>'Wonderlane',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/wonderlane/38990721550/',
			'filename'=>'circuit-pathway-to-the-heart-and-through-the-mind.jpg',		// 38990721550_b835874e9c_o
		],
		[
			'creator'=>'User #160462157@flickr',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/160462157@N08/40475220085/',
			'filename'=>'coding-all-the-lines-one-line-at-a-time.jpg',		// 40475220085_a7049c87de_o
		],
		[
			'creator'=>'User #160462157@flickr',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/160462157@N08/41328139132/',
			'filename'=>'external-infrastructure-relating-the-outside-frame-to-the-inside.jpg',		// 41328139132_c366b63360_o
		],
		[
			'creator'=>'User #160462157@flickr',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/160462157@N08/41781876950/',
			'filename'=>'linux-eternal-keyboard-of-brilliant-mastery.jpg',		// 41781876950_d6ce3fe87d_o
		],
		[
			'creator'=>'User #160462157@flickr',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/160462157@N08/43289186450/',
			'filename'=>'all-of-the-colors-all-of-the-ideas-all-of-the-madness.jpg',		// 43289186450_f0aee39e3f_o
		],
		[
			'creator'=>'User #160462157@flickr',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/160462157@N08/44521823204/',
			'filename'=>'code-diff-in-linux-terminal-application.jpg',		// 44521823204_f6a7734e2a_o
		],
		[
			'creator'=>'User #160462157@flickr',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/160462157@N08/44521845074/',
			'filename'=>'unlimited-eternally-powered-sounds-of-the-horizon.jpg',		// 44521845074_05562985f5_o
		],
		[
			'creator'=>'J. C. Barros',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/jcbarros71/44570595124/',
			'filename'=>'oscilloscope-and-machine-bound-together.jpg',		// 44570595124_3822ae3d8f_o
		],
		[
			'creator'=>'J. C. Barros',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/jcbarros71/44687991412/',
			'filename'=>'eternal-and-unlimited-power-bandwidth-over-the-wire.jpg',		// 44687991412_6e68257db7_o
		],
		[
			'creator'=>'User #160462157@flickr',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/160462157@N08/45243708001/',
			'filename'=>'capacitance-diode-in-the-mainframe-brain.jpg',		// 45243708001_058c4d52bc_o
		],
		[
			'creator'=>'Gareth Halfacree',
			'license'=>'CC BY-SA 2.0',
			'source'=>'https://www.flickr.com/photos/120586634@N05/45329917862',
			'filename'=>'electron-device-calculator-and-measurement-tool.jpg',		// 45329917862_8e9d900b30_o
		],
		[
			'creator'=>'NASA Goddard Space Flight Center',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/gsfc/45735372792/',
			'filename'=>'analyzing-the-data-through-the-eye-of-the-mind.jpg',		// 45735372792_3dceaa8c12_o
		],
		[
			'creator'=>'Ilmicrofono Oggiono',
			'license'=>'CC BY 2.0',
			'source'=>'https://www.flickr.com/photos/115089924@N02/45938605772/',
			'filename'=>'turn-up-the-soundpower-charts-beyond-the-max.jpg',		// 45938605772_e90b90ee9d_o
		],
		[
			'creator'=>'NASA',
			'license'=>'Public Domain',
			'source'=>'Unknown',
			'filename'=>'shooting-through-clouds-and-atmospheres.jpg',		// bill-jelen-721824-unsplash
		],
		[
			'creator'=>'NASA',
			'license'=>'Public Domain',
			'source'=>'Unknown',
			'filename'=>'bottom-of-the-interstellar-core.jpg',		// hafidh-satyanto-733864-unsplash
		],
		[
			'creator'=>'NASA',
			'license'=>'Public Domain',
			'source'=>'Unknown',
			'filename'=>'space-belongs-to-me-and-to-all-else.jpg',		// jeremy-thomas-63102-unsplash
		],
		[
			'creator'=>'NASA',
			'license'=>'Public Domain',
			'source'=>'Unknown',
			'filename'=>'satellite-with-purple-space-and-green-planet.jpg',		// nasa-43567-unsplash
		],
		[
			'creator'=>'NASA',
			'license'=>'Public Domain',
			'source'=>'Unknown',
			'filename'=>'planet-of-passions-compulsions-and-heart.jpg',		// nasa-53884-unsplash
		],
		[
			'creator'=>'NASA',
			'license'=>'Public Domain',
			'source'=>'Unknown',
			'filename'=>'down-the-hallway-of-self-consciousness.jpg',		// nasa-53885-unsplash
		],
		[
			'creator'=>'NASA',
			'license'=>'Public Domain',
			'source'=>'Unknown',
			'filename'=>'blasting-through-the-unknown-and-into-the-possibly-known.jpg',		// spacex-101796-unsplash
		],
		[
			'creator'=>'NASA',
			'license'=>'Public Domain',
			'source'=>'Unknown',
			'filename'=>'sky-of-stars-and-knowledge.jpg',		// yong-chuan-688149-unsplash
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
	print($mission_header_text);
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
	print($mission_header_text);
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
	print($mission_header_text);
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>SortWords ' . $mission_header_text . ' :</em></h3></center>');
	
	$divider->displayend($divider_end_args);
	
			// Display Mission Info
			
		// ------------------------------------------------------
	
	$divider->displaystart($divider_sectional_area_start_args);
	
	print('<div class="padding-5px margin-20px horizontal-left font-family-arial">' . $mission_info_text . '</div>');
	
	$divider->displayend($divider_end_args);
		
				// Display Example Uses
		
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
	print($examples_header_text);
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
	print($examples_header_text);
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
	print($examples_header_text);
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>SortWords ' . $examples_header_text . ' :</em></h3></center>');
	
	$divider->displayend($divider_end_args);
	
			// Display Mission Info
			
		// ------------------------------------------------------
	
	$divider->displaystart($divider_sectional_area_start_args);
	
	print('<div class="padding-5px margin-20px horizontal-left font-family-arial">' . $examples_info_text . '</div>');
	
	$divider->displayend($divider_end_args);
		
				// Display Uses
		
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
	print($uses_header_text);
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
	print($uses_header_text);
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
	print($uses_header_text);
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>SortWords ' . $uses_header_text . ' :</em></h3></center>');
	
	$divider->displayend($divider_end_args);
	
			// Display Mission Info
			
		// ------------------------------------------------------
	
	$divider->displaystart($divider_sectional_area_start_args);
	
	print('<div class="padding-5px margin-20px horizontal-left font-family-arial">' . $uses_info_text . '</div>');
	
	$divider->displayend($divider_end_args);
		
				// Display History
		
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
	print($history_header_text);
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
	print($history_header_text);
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
	print($history_header_text);
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>SortWords ' . $history_header_text . ' :</em></h3></center>');
	
	$divider->displayend($divider_end_args);
	
			// Display Mission Info
			
		// ------------------------------------------------------
	
	$divider->displaystart($divider_sectional_area_start_args);
	
	print('<div class="padding-5px margin-20px horizontal-left font-family-arial">' . $history_info_text . '</div>');
	
	$divider->displayend($divider_end_args);
		
				// Display Technology
		
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
	print($technology_header_text);
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
	print($technology_header_text);
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
	print($technology_header_text);
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>SortWords ' . $technology_header_text . ' :</em></h3></center>');
	
	$divider->displayend($divider_end_args);
	
			// Display Mission Info
			
		// ------------------------------------------------------
	
	$divider->displaystart($divider_sectional_area_start_args);
	
	print('<div class="padding-5px margin-20px horizontal-left font-family-arial">' . $technology_info_text . '</div>');
	
	$divider->displayend($divider_end_args);
		
				// Display Future (i.e. END)
		
			// -------------------------------------------------------------
			
	// eh, in time
		
				// Display Algorithm
		
			// -------------------------------------------------------------
			
	// eh, in time
	
			// Display Language Options
		
		// -------------------------------------------------------------
	
	$languages->display();
	
			// Display Final Ending Navigation
		
		// -------------------------------------------------------------
	
	$bottom_navigation_args = [
		'thispage'=>'About',
	];
	$navigation->DisplayBottomNavigation($bottom_navigation_args);
	
?>