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
					// Word Weight : Weighing the Words
			$this->header_title_text = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					
					// Do you want to know?  Look it up and then you know.
			$quote_text = $this->master_record['quote'][0]['Quote'];
				
					// Look up a word.  Any dictionary, any definition, any time.
			$div_mouseover = $this->master_record['description'][0]['Description'];
			
					// Share
			$this->share_text = 'Share';
			
					// Share With
			$this->share_with_text = 'Share With';
			
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
				'<p class="margin-0px text-indent-50px">What does it mean?  You have to find out what it means.  But it is a lot easier to figure out when you can just look up what any word, any concept, or any definition means at any time, for any purpose, and for anyone.  That is what WordWeight is for -- we define the words across the spectrum of dictionaries.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">There are standard dictionaries.  There are also specialty dictionaries, such as those dealing with a subject, like medicinal dictionaries or engineering dictionaries.  There are also jargon and street phrase dictionaries, which detail specific phrasing to a field of interest or slang terms commonly found in public.  Dictionaries for house plants, for meaning of names, for countries, for personalities, for scientific fields, and for anything else you can think of.  It would be nice if you could just look up one word, and then find its meaning across all dictionaries.  That is what we do -- we are WordWeight.com, and our purpose is to give you a single, regular method for weighing words.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">At WordWeight.com, everything you want in a dictionary, a thesaurus, and a book of pronunciation is here at your fingertips.  We may provide information from dictionaries that anyone can lookup, but we do it in a way that nobody has done before.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Were you looking for some place to look up words?  Well, you have found it.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Below are some example uses of the site...</p>' .
				'<ul>' .
					'<li> How do I weigh a word?</li>' .
					'<li> How do I look up a word?</li>' .
					'<li> How do I define a word?</li>' .
					'<li> How do I explain a word?</li>' .
					'<li> How do I understand a word?</li>' .
					'<li> How do I learn a new word?</li>' .
					'<li> How do I weigh a phrase?</li>' .
					'<li> How do I look up a phrase?</li>' .
					'<li> How do I define a phrase?</li>' .
					'<li> How do I explain a phrase?</li>' .
					'<li> How do I understand a phrase?</li>' .
					'<li> How do I learn a new phrase?</li>' .
					'<li> How do I weigh a concept?</li>' .
					'<li> How do I look up a concept?</li>' .
					'<li> How do I define a concept?</li>' .
					'<li> How do I explain a concept?</li>' .
					'<li> How do I understand a concept?</li>' .
					'<li> How do I learn a new concept?</li>' .
				'</ul>'
			;
			
				// BT: here!
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Below are some sample uses of the site...</p>' .
				'<ul>' .
					'<li> Definition of <em>autoclave</em>?</li>' .
					'<li> Definition of <em>ambivalent</em>?</li>' .
					'<li> Definition of <em>magnanimous</em>?</li>' .
					'<li> Definition of <em>ennui</em>?</li>' .
					'<li> Definition of <em>conformity</em>?</li>' .
					'<li> Definition of <em>revolution</em>?</li>' .
					'<li> Definition of <em>abolishment</em>?</li>' .
					'<li> Definition of <em>monopsony</em>?</li>' .
					'<li> Definition of <em>absolution</em>?</li>' .
					'<li> Definition of <em>intransignence</em>?</li>' .
					'<li> Definition of <em>inception</em>?</li>' .
					'<li> Definition of <em>macabre</em>?</li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com was created and launched on May 5, 2017.  Since then, we have been showing users how to weigh words for anything and everything.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com is built using the <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank">Green Gluon CMS</a>, a content-management system designed for power, speed, and scalability.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">This technology, using PHP7 and MySQL5, provides all of the functionality of this website.  <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank">Check us out on GitHub!</a></p>'
			;
			
			break;
			
		case 'de':
					// Word Weight : Weighing the Words
			$this->header_title_text = 'Wortgewicht: Wiegen der Wörter';
					
					// Do you want to know?  Look it up and then you know.
			$quote_text = 'Willst du wissen? Schauen Sie nach und dann wissen Sie es.';
				
					// Look up a word.  Any dictionary, any definition, any time.
			$div_mouseover = 'Ein Wort nachschlagen. Jedes Wörterbuch, jede Definition, jederzeit.';
			
			$this->share_text = 'Teilen';
			$this->share_with_text = 'Teilen mit';
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
				'<p class="margin-0px text-indent-50px">Was heißt das? Sie müssen herausfinden, was es bedeutet. Es ist jedoch viel einfacher herauszufinden, wann Sie einfach nachsehen können, was ein Wort, ein Begriff oder eine Definition zu jeder Zeit für jeden Zweck und für jeden bedeutet. Dafür steht WordWeight - wir definieren die Wörter über das gesamte Spektrum der Wörterbücher.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Es gibt Standardwörterbücher. Es gibt auch Fachwörterbücher, beispielsweise solche, die sich mit einem Thema befassen, beispielsweise medizinische Wörterbücher oder Konstruktionswörterbücher. Es gibt auch Wörterbücher für Jargon- und Straßenphrasen, die spezifische Phrasierungen für ein Interessengebiet oder häufig verwendete Slangausdrücke enthalten. Wörterbücher für Zimmerpflanzen, für die Bedeutung von Namen, für Länder, für Persönlichkeiten, für wissenschaftliche Bereiche und für alles andere, woran Sie denken können. Es wäre schön, wenn Sie nur ein Wort nachschlagen und dann die Bedeutung in allen Wörterbüchern finden könnten. Das ist, was wir tun - wir sind WordWeight.com, und unser Ziel ist es, Ihnen eine einzige, regelmäßige Methode zum Abwägen von Wörtern zu geben.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Auf WordWeight.com finden Sie alles, was Sie in einem Wörterbuch, einem Thesaurus und einem Aussprache-Buch möchten, an Ihren Fingerspitzen. Wir können Informationen aus Wörterbüchern bereitstellen, die jeder nachschlagen kann, aber wir tun dies auf eine Weise, die noch niemand zuvor gemacht hat.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Suchen Sie einen Ort, an dem Sie nachschlagen können? Nun, du hast es gefunden.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Nachfolgend finden Sie einige Anwendungsbeispiele der Website ...</p>' .
				'<ul>' .
					'<li> Wiege ich ein Wort? </li>' .
					'<li> Wie kann ich ein Wort nachschlagen? </li>' .
					'<li> Wie definiere ich ein Wort? </li>' .
					'<li> Wie erkläre ich ein Wort? </li>' .
					'<li> Wie kann ich ein Wort verstehen? </li>' .
					'<li> Wie lerne ich ein neues Wort? </li>' .
					'<li> Wiege ich eine Phrase? </li>' .
					'<li> Wie kann ich einen Satz nachschlagen? </li>' .
					'<li> Wie definiere ich eine Phrase? </li>' .
					'<li> Wie erkläre ich einen Satz? </li>' .
					'<li> Wie kann ich eine Phrase verstehen? </li>' .
					'<li> Wie lerne ich einen neuen Satz? </li>' .
					'<li> Wiege ich ein Konzept? </li>' .
					'<li> Wie kann ich ein Konzept nachschlagen? </li>' .
					'<li> Wie definiere ich ein Konzept? </li>' .
					'<li> Wie erkläre ich ein Konzept? </li>' .
					'<li> Wie kann ich ein Konzept verstehen? </li>' .
					'<li> Wie lerne ich ein neues Konzept? </li>' .
				'</ul>'
			;
			
				// BT: here!
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Nachfolgend finden Sie einige Anwendungsbeispiele der Website ...</p>' .
				'<ul>' .
					'<li> Definition von <em> Autoklav </em>? </li>' .
					'<li> Definition von <em> ambivalent </em>? </li>' .
					'<li> Definition von <em> großmütig </em>? </li>' .
					'<li> Definition von <em> ennui </em>? </li>' .
					'<li> Definition der <em> Konformität </em>? </li>' .
					'<li> Definition der <em> Revolution </em>? </li>' .
					'<li> Definition der <em> Abschaffung </em>? </li>' .
					'<li> Definition von <em> Monopson </em>? </li>' .
					'<li> Definition von <em> Absolution </em>? </li>' .
					'<li> Definition von <em> intransignence </em>? </li>' .
					'<li> Definition der <em> Einführung </em>? </li>' .
					'<li> Definition von <em> macabre </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com wurde am 5. Mai 2017 erstellt und gestartet. Seitdem zeigen wir den Benutzern, wie Wörter für alles und jedes zu wiegen sind.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com wurde mit dem <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a> erstellt, einem Content-Management-System, das auf Leistung, Geschwindigkeit und Leistung ausgelegt ist Skalierbarkeit.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Diese Technologie verwendet PHP7 und MySQL5 und bietet alle Funktionen dieser Website. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Besuchen Sie uns auf GitHub!</a></p>'
			;
	
			break;
			
		case 'es':
					// Word Weight : Weighing the Words
			$this->header_title_text = 'Peso de la palabra: pesando las palabras';
					
					// Do you want to know?  Look it up and then you know.
			$quote_text = '¿Quieres saber? Míralo y luego lo sabes.';
				
					// Look up a word.  Any dictionary, any definition, any time.
			$div_mouseover = 'Buscar una palabra. Cualquier diccionario, cualquier definición, cualquier momento.';
			
			$this->share_text = 'Compartir';
			$this->share_with_text = 'Compartir con';
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
				'<p class="margin-0px text-indent-50px">Qué significa eso? Tienes que averiguar lo que significa. Pero es mucho más fácil averiguar cuándo puede simplemente buscar lo que significa cualquier palabra, cualquier concepto o cualquier definición en cualquier momento, para cualquier propósito y para cualquier persona. Para eso es WordWeight: definimos las palabras en todo el espectro de diccionarios.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Hay diccionarios estándar. También hay diccionarios especializados, como los que tratan de un tema, como diccionarios de medicina o diccionarios de ingeniería. También hay diccionarios de jerga y frases callejeras, que detallan expresiones específicas de un campo de interés o términos de jerga comúnmente encontrados en público. Diccionarios para plantas domésticas, para el significado de nombres, para países, para personalidades, para campos científicos y para cualquier otra cosa que se pueda imaginar. Sería bueno si pudiera buscar una palabra y luego encontrar su significado en todos los diccionarios. Eso es lo que hacemos: somos WordWeight.com y nuestro propósito es brindarle un método único y regular para ponderar palabras.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">En WordWeight.com, todo lo que desea en un diccionario, un diccionario de sinónimos y un libro de pronunciación está aquí a su alcance. Podemos proporcionar información de diccionarios que cualquiera puede buscar, pero lo hacemos de una manera que nadie lo ha hecho antes.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">¿Estabas buscando un lugar para buscar palabras? Bueno, lo has encontrado.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">A continuación se muestran algunos ejemplos de usos del sitio ...</p>' .
				'<ul>' .
					'<li> ¿Cómo peso una palabra? </li>' .
					'<li> ¿Cómo busco una palabra? </li>' .
					'<li> ¿Cómo defino una palabra? </li>' .
					'<li> ¿Cómo explico una palabra? </li>' .
					'<li> ¿Cómo entiendo una palabra? </li>' .
					'<li> ¿Cómo aprendo una nueva palabra? </li>' .
					'<li> ¿Cómo peso una frase? </li>' .
					'<li> ¿Cómo busco una frase? </li>' .
					'<li> ¿Cómo defino una frase? </li>' .
					'<li> ¿Cómo explico una frase? </li>' .
					'<li> ¿Cómo entiendo una frase? </li>' .
					'<li> ¿Cómo aprendo una nueva frase? </li>' .
					'<li> ¿Cómo sopesar un concepto? </li>' .
					'<li> ¿Cómo busco un concepto? </li>' .
					'<li> ¿Cómo defino un concepto? </li>' .
					'<li> ¿Cómo explico un concepto? </li>' .
					'<li> ¿Cómo entiendo un concepto? </li>' .
					'<li> ¿Cómo aprendo un nuevo concepto? </li>' .
				'</ul>'
			;
			
				// BT: here!
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">A continuación se muestran algunos usos de ejemplo del sitio ...</p>' .
				'<ul>' .
					'<li> Definición de <em> autoclave </em>? </li> '.
					'<li> Definición de <em> ambivalente </em>? </li>' .
					'<li> Definición de <em> magnánimo </em>? </li>' .
					'<li> Definición de <em> ennui </em>? </li>' .
					'<li> Definición de <em> conformidad </em>? </li>' .
					'<li> Definición de <em> revolución </em>? </li>' .
					'<li> Definición de <em> abolición </em>? </li>' .
					'<li> Definición de <em> monopsonio </em>? </li>' .
					'<li> Definición de <em> absolución </em>? </li>' .
					'<li> Definición de <em> intransignence </em>? </li>' .
					'<li> Definición de <em> inicio </em>? </li>' .
					'<li> Definición de <em> macabro </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com fue creado y lanzado el 5 de mayo de 2017. Desde entonces, hemos estado mostrando a los usuarios cómo evaluar las palabras para cualquier cosa y todo.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com se crea utilizando el <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, un sistema de gestión de contenido diseñado para potencia, velocidad y escalabilidad</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Esta tecnología, que utiliza PHP7 y MySQL5, proporciona toda la funcionalidad de este sitio web. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> ¡Visítenos en GitHub! </a></p>'
			;
			
			break;
			
		case 'fr':
					// Word Weight : Weighing the Words
			$this->header_title_text = 'Poids des mots: peser les mots';
					
					// Do you want to know?  Look it up and then you know.
			$quote_text = 'Voulez-vous savoir? Regardez et vous savez.';
				
					// Look up a word.  Any dictionary, any definition, any time.
			$div_mouseover = 'Rechercher un mot. N\'importe quel dictionnaire, n\'importe quelle définition, n\'importe quand.';
			
			$this->share_text = 'Partager';
			$this->share_with_text = 'Partager avec';
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
				'<p class="margin-0px text-indent-50px">Qu\'est-ce que ça veut dire? Vous devez découvrir ce que cela signifie. Mais il est beaucoup plus facile de savoir quand vous pouvez simplement rechercher ce que tout mot, tout concept ou toute définition signifie à tout moment, pour quelque fin que ce soit et pour n\'importe qui. C’est à quoi WordWeight est destiné: nous définissons les mots dans l’ensemble des dictionnaires.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Il existe des dictionnaires standard. Il existe également des dictionnaires spécialisés, tels que ceux traitant d\'un sujet, tels que les dictionnaires médicaux ou les dictionnaires techniques. Il existe également des dictionnaires de jargon et de phrases de rue, qui détaillent la formulation spécifique d\'un domaine d\'intérêt ou des termes d\'argot que l\'on trouve couramment en public. Dictionnaires pour plantes d\'intérieur, pour la signification des noms, pour les pays, pour les personnalités, pour les domaines scientifiques et pour tout ce que vous pouvez penser. Ce serait bien si vous pouviez simplement rechercher un mot, puis trouver sa signification dans tous les dictionnaires. C’est ce que nous faisons - nous sommes WordWeight.com et notre but est de vous donner une méthode unique et régulière pour peser des mots.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Chez WordWeight.com, tout ce que vous voulez dans un dictionnaire, un thésaurus et un livre de prononciation est à portée de main. Nous pouvons fournir des informations à partir de dictionnaires que tout le monde peut consulter, mais nous le faisons comme personne ne l’a fait auparavant.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Vous cherchiez un endroit où chercher des mots? Eh bien, vous l\'avez trouvé.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Ci-dessous quelques exemples d\'utilisations du site ...</p>' .
				'<ul>' .
					'<li> Comment peser un mot? </li>' .
					'<li> Comment rechercher un mot? </li>' .
					'<li> Comment définir un mot? </li>' .
					'<li> Comment puis-je expliquer un mot? </li>' .
					'<li> Comment puis-je comprendre un mot? </li>' .
					'<li> Comment apprendre un nouveau mot? </li>' .
					'<li> Comment peser une phrase? </li>' .
					'<li> Comment rechercher une phrase? </li>' .
					'<li> Comment définir une phrase? </li>' .
					'<li> Comment puis-je expliquer une phrase? </li>' .
					'<li> Comment puis-je comprendre une phrase? </li>' .
					'<li> Comment apprendre une nouvelle phrase? </li>' .
					'<li> Comment peser un concept? </li>' .
					'<li> Comment rechercher un concept? </li>' .
					'<li> Comment définir un concept? </li>' .
					'<li> Comment puis-je expliquer un concept? </li>' .
					'<li> Comment puis-je comprendre un concept? </li>' .
					'<li> Comment apprendre un nouveau concept? </li>' .
				'</ul>'
			;
			
				// BT: here!
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Ci-dessous quelques exemples d\'utilisations du site ...</p>' .
				'<ul>' .
					'<li> Définition de <em> autoclave </em>? </li>' .
					'<li> Définition de <em> ambivalent </em>? </li>' .
					'<li> Définition de <em> magnanime </em>? </li>' .
					'<li> Définition de <em> ennui </em>? </li>' .
					'<li> Définition de <em> conformité </em>? </li>' .
					'<li> Définition de <em> révolution </em>? </li>' .
					'<li> Définition de <em> l\'abolition </em>? </li>' .
					'<li> Définition de <em> monopsone </em>? </li>' .
					'<li> Définition de <em> absolution </em>? </li>' .
					'<li> Définition de <em> l\'intransignence </em>? </li>' .
					'<li> Définition de <em> création </em>? </li>' .
					'<li> Définition de <em> macabre </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com a été créé et lancé le 5 mai 2017. Depuis lors, nous montrons aux utilisateurs comment peser les mots pour tout et n\'importe quoi.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com est construit à l\'aide du <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> CMS Green Gluon </a>, un système de gestion de contenu conçu pour optimiser la puissance, la vitesse et l\'évolutivité.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Cette technologie, utilisant PHP7 et MySQL5, fournit toutes les fonctionnalités de ce site Web. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Consultez-nous sur GitHub! </a></p>'
			;
			
			break;
			
		case 'ja':
					// Word Weight : Weighing the Words
			$this->header_title_text = '単語の重さ：単語を量る';
					
					// Do you want to know?  Look it up and then you know.
			$quote_text = '知りたいですか？ それを調べてください、それからあなたは知っています。';
				
					// Look up a word.  Any dictionary, any definition, any time.
			$div_mouseover = '単語を調べます。 あらゆる辞書、あらゆる定義、いつでも。';
			
			$this->share_text = '分け合う';
			$this->share_with_text = 'と共有する';
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
				'<p class="margin-0px text-indent-50px">どういう意味ですか？ あなたはそれが何を意味するのかを見つけなければなりません。 しかし、いつでも、どんな目的のためにも、そして誰のためにも、どんな言葉、どんな概念、または定義も何を意味するのかを調べることができるのはいつか理解するのはずっと簡単です。 それがWordWeightの目的です - 私たちは辞書のスペクトルにわたって単語を定義します。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">標準辞書があります。 薬の辞書や工学の辞書のように、主題を扱うような専門の辞書もあります。 専門分野やストリートフレーズの辞書もあります。これらは、関心のある分野や一般的に見られるスラング用語に対する具体的な表現を詳しく説明しています。 観葉植物のための、名前の意味のために、国のために、人格のために、科学分野のために、そしてあなたが考えることができる何か他のもののために。 あなたがただ一つの単語を調べて、それからすべての辞書にわたってその意味を見つけることができればそれは素晴らしいことです。 それが私たちがしていることです - 私たちはWordWeight.comです、そして私たちの目的はあなたに言葉を量るための単一の、通常の方法を与えることです。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">WordWeight.comでは、辞書、シソーラス、および発音簿に必要なものがすべてここにあります。 私たちは誰でも検索できる辞書からの情報を提供するかもしれませんが、私たちは誰も以前にしなかった方法でそれをします。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">言葉を探す場所を探していましたか？ まあ、あなたはそれを見つけました。</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">下記はサイトの使用例です。</p>' .
				'<ul>' .
					'<li>単語の重み付けをするにはどうすればよいですか。</li>' .
					'<li>どうやって単語を調べますか？</li>' .
					'<li>単語を定義するにはどうすればよいですか</li>' .
					'<li>どうやって言葉を説明できますか</li>' .
					'<li>どうやって言葉を理解できますか</li>' .
					'<li>新しい単語を学ぶにはどうすればよいですか</li>' .
					'<li>フレーズをどのように評価するのですか</li>' .
					'<li>フレーズを調べるにはどうすればよいですか</li>' .
					'<li>フレーズを定義するにはどうすればよいですか</li>' .
					'<li>フレーズを説明するにはどうすればよいですか</li>' .
					'<li>フレーズを理解するにはどうすればよいですか</li>' .
					'<li>新しいフレーズを学ぶにはどうすればよいですか</li>' .
					'<li>概念をどのように評価するのですか</li>' .
					'<li>概念を調べる方法は？</li>' .
					'<li>概念を定義するにはどうすればよいですか</li>' .
					'<li>概念を説明するにはどうすればよいですか</li>' .
					'<li>概念の理解方法は？</li>' .
					'<li>新しい概念を学ぶにはどうすればよいですか</li>' .
				'</ul>'
			;
			
				// BT: here!
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">下記はサイトの使用例です。</p>' .
				'<ul>' .
					'<li> <em>オートクレーブの定義</em>？</li>' .
					'<li> <em> ambivalent </em>？</li>の定義' .
					'<li> <em>壮大</em>の定義</em>' .
					'<li> <em> ennui </em>？</li>の定義' .
					'<li>準拠の定義</em>？</li>' .
					'<li>革命の定義</em>？</li>' .
					'<li>廃止の定義<em> </em>？</li>' .
					'<li>独占の定義</em>？</li>' .
					'<li> <em>棄権の定義</em>？</li>' .
					'<li> <em>透明性の定義</em>？</li>' .
					'<li> <em>インセプションの定義</em>？</li>' .
					'<li>マカブレの定義は？' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.comは2017年5月5日に作成され、開始されました。それ以来、私たちはユーザーにあらゆることに対して単語を比較検討する方法を示してきました。</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.comは<a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>を使用して構築されています。 スケーラビリティ</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">PHP 7とMySQL 5を使用するこのテクノロジは、このWebサイトのすべての機能を提供します。 <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> GitHubをご覧ください。</a></p>'
			;
			
			break;
			
		case 'it':
					// Word Weight : Weighing the Words
			$this->header_title_text = 'Peso della parola: pesare le parole';
					
					// Do you want to know?  Look it up and then you know.
			$quote_text = 'Vuoi sapere? Guarda e poi lo sai.';
				
					// Look up a word.  Any dictionary, any definition, any time.
			$div_mouseover = 'Cercare una parola. Qualsiasi dizionario, qualsiasi definizione, ogni volta.';
			
			$this->share_text = 'Condividi';
			$this->share_with_text = 'Condividi con';
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
				'<p class="margin-0px text-indent-50px">Cosa significa? Devi scoprire cosa significa. Ma è molto più facile capire quando puoi solo cercare qualsiasi parola, concetto o definizione significa in qualsiasi momento, per qualsiasi scopo e per chiunque. Ecco a cosa serve WordWeight: definiamo le parole attraverso lo spettro dei dizionari.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Ci sono dizionari standard. Ci sono anche dizionari specializzati, come quelli che trattano un argomento, come dizionari medicinali o dizionari di ingegneria. Ci sono anche dizionari di gergo e frasi di strada, che descrivono in modo specifico frasi specifiche per un campo di interesse o termini gergali comunemente trovati in pubblico. Dizionari per piante da appartamento, per significato di nomi, per paesi, per personalità, per campi scientifici e per qualsiasi altra cosa tu possa pensare. Sarebbe bello se potessi solo cercare una parola, e poi trovare il suo significato in tutti i dizionari. Questo è ciò che facciamo - siamo WordWeight.com, e il nostro scopo è quello di darti un metodo unico e regolare per pesare le parole.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">A WordWeight.com, tutto quello che vuoi in un dizionario, un dizionario dei sinonimi e un libro di pronuncia è qui a portata di mano. Possiamo fornire informazioni dai dizionari che chiunque può cercare, ma lo facciamo in un modo che nessuno ha mai fatto prima.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Stavi cercando un posto dove cercare le parole? Bene, l\'hai trovato.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Di seguito sono riportati alcuni esempi di utilizzo del sito ...</p>' .
				'<ul>' .
					'<li> Come pesare una parola? </li>' .
					'<li> Come posso cercare una parola? </li>' .
					'<li> Come posso definire una parola? </li>' .
					'<li> Come faccio a spiegare una parola? </li>' .
					'<li> Come faccio a capire una parola? </li>' .
					'<li> Come imparo una nuova parola? </li>' .
					'<li> Come pesa una frase? </li>' .
					'<li> Come posso cercare una frase? </li>' .
					'<li> Come definisco una frase? </li>' .
					'<li> Come faccio a spiegare una frase? </li>' .
					'<li> Come faccio a capire una frase? </li>' .
					'<li> Come imparo una nuova frase? </li>' .
					'<li> Come pesa un concetto? </li>' .
					'<li> Come posso cercare un concetto? </li>' .
					'<li> Come definisco un concetto? </li>' .
					'<li> Come posso spiegare un concetto? </li>' .
					'<li> Come faccio a capire un concetto? </li>' .
					'<li> Come imparo un nuovo concetto? </li>' .
				'</ul>'
			;
			
				// BT: here!
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Di seguito sono riportati alcuni esempi di utilizzo del sito ...</p>' .
				'<ul>' .
					'<li> Definizione di <em> autoclave </em>? </li>' .
					'<li> Definizione di <em> ambivalente </em>? </li>' .
					'<li> Definizione di <em> magnanimo </em>? </li>' .
					'<li> Definizione di <em> ennui </em>? </li>' .
					'<li> Definizione di <em> conformità </em>? </li>' .
					'<li> Definizione di <em> rivoluzione </em>? </li>' .
					'<li> Definizione di <em> abolizione </em>? </li>' .
					'<li> Definizione di <em> monopsony </em>? </li>' .
					'<li> Definizione di <em> assoluzione </em>? </li>' .
					'<li> Definizione di <em> intransgence </em>? </li>' .
					'<li> Definizione di <em> inizio </em>? </li>' .
					'<li> Definizione di <em> macabro </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com è stato creato e lanciato il 5 maggio 2017. Da allora, mostriamo agli utenti come ponderare le parole per qualsiasi cosa.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com è stato creato utilizzando il <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, un sistema di gestione dei contenuti progettato per potenza, velocità e scalabilità.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Questa tecnologia, che utilizza PHP7 e MySQL5, fornisce tutte le funzionalità di questo sito web. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Controllaci su GitHub! </a></p>'
			;
			
			break;
			
		case 'nl':
					// Word Weight : Weighing the Words
			$this->header_title_text = 'Woordgewicht: de woorden wegen';
					
					// Do you want to know?  Look it up and then you know.
			$quote_text = 'Wil je weten? Zoek het op en dan weet je het.';
				
					// Look up a word.  Any dictionary, any definition, any time.
			$div_mouseover = 'Een woord opzoeken. Elk woordenboek, elke definitie, op elk moment.';
			
			$this->share_text = 'Delen';
			$this->share_with_text = 'Delen met';
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
				'<p class="margin-0px text-indent-50px">Wat betekent het? Je moet uitvinden wat het betekent. Maar het is een stuk eenvoudiger om erachter te komen wanneer je gewoon kunt opzoeken wat elk woord, welk concept of welke definitie dan ook betekent op elk moment, voor welk doel dan ook, en voor wie dan ook. Dat is waar WordWeight voor is - we definiëren de woorden in het hele spectrum van woordenboeken.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Er zijn standaardwoordenboeken. Er zijn ook speciale woordenboeken, zoals die over een onderwerp, zoals medicinale woordenboeken of technische woordenboeken. Er zijn ook woordenboeken voor jargon en straatspraak, waarin specifieke frasering wordt beschreven in een interesseveld of in termen van jargon die algemeen in het openbaar worden aangetroffen. Woordenboeken voor kamerplanten, voor betekenis van namen, voor landen, voor persoonlijkheden, voor wetenschappelijke velden en voor alles wat je maar kunt bedenken. Het zou leuk zijn als je één woord op zou kunnen zoeken en dan de betekenis ervan in alle woordenboeken kunt vinden. Dat is wat we doen - wij zijn WordWeight.com, en het is onze bedoeling om u een enkele, regelmatige methode voor het afwegen van woorden te geven.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Op WordWeight.com is alles wat je wilt in een woordenboek, een thesaurus en een uitspraakboek binnen handbereik. We kunnen informatie uit woordenboeken verstrekken die iedereen kan opzoeken, maar we doen het op een manier die niemand eerder heeft gedaan.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Was je op zoek naar een plek om woorden op te zoeken? Nou, je hebt het gevonden.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Hieronder zijn enkele voorbeelden van gebruik van de site ...</p>' .
				'<ul>' .
					'<li> Hoe weeg ik een woord? </li>' .
					'<li> Hoe kan ik een woord opzoeken? </li>' .
					'<li> Hoe definieer ik een woord? </li>' .
					'<li> Hoe verklaar ik een woord? </li>' .
					'<li> Hoe versta ik een woord? </li>' .
					'<li> Hoe kan ik een nieuw woord leren? </li>' .
					'<li> Hoe weeg ik een zin? </li>' .
					'<li> Hoe zoek ik een zin op? </li>' .
					'<li> Hoe definieer ik een zin? </li>' .
					'<li> Hoe verklaar ik een zin? </li>' .
					'<li> Hoe versta ik een zin? </li>' .
					'<li> Hoe kan ik een nieuwe zin leren? </li>' .
					'<li> Hoe weeg ik een concept? </li>' .
					'<li> Hoe zoek ik een concept op? </li>' .
					'<li> Hoe definieer ik een concept? </li>' .
					'<li> Hoe leg ik een concept uit? </li>' .
					'<li> Hoe begrijp ik een concept? </li>' .
					'<li> Hoe leer ik een nieuw concept? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Hieronder vindt u enkele voorbeelden van gebruik van de site ...</p>' .
				'<ul>' .
					'<li> Definitie van <em> autoclaaf </em>? </li>' .
					'<li> Definitie van <em> ambivalent </em>? </li>' .
					'<li> Definitie van <em> grootmoedig </em>? </li>' .
					'<li> Definitie van <em> ennui </em>? </li>' .
					'<li> Definitie van <em> conformiteit </em>? </li>' .
					'<li> Definitie van <em> revolutie </em>? </li>' .
					'<li> Definitie van <em> afschaffen </em>? </li>' .
					'<li> Definitie van <em> monopsony </em>? </li>' .
					'<li> Definitie van <em> absolutie </em>? </li>' .
					'<li> Definitie van <em> intransignence </em>? </li>' .
					'<li> Definitie van <em> begin </em>? </li>' .
					'<li> Definitie van <em> macabre </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com is gemaakt en gestart op 5 mei 2017. Sindsdien hebben we gebruikers laten zien hoe woorden kunnen worden gewogen voor alles en nog wat.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com is gebouwd met behulp van het <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, een inhoudbeheersysteem dat is ontworpen voor kracht, snelheid en schaalbaarheid.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Deze technologie, met behulp van PHP7 en MySQL5, biedt alle functionaliteit van deze website. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Bekijk ons op GitHub! </a></p>'
			;
			
			break;
			
		case 'pl':
					// Word Weight : Weighing the Words
			$this->header_title_text = 'Masa słowa: Ważenie słów';
					
					// Do you want to know?  Look it up and then you know.
			$quote_text = 'Chcesz wiedzieć? Sprawdź to, a potem wiesz.';
				
					// Look up a word.  Any dictionary, any definition, any time.
			$div_mouseover = 'Wyszukaj słowo. Dowolny słownik, dowolna definicja, zawsze.';
			
			$this->share_text = 'Dzielić';
			$this->share_with_text = 'Udostępnij za pomocą';
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
				'<p class="margin-0px text-indent-50px">Co to znaczy? Musisz dowiedzieć się, co to znaczy. Ale o wiele łatwiej jest zrozumieć, kiedy można po prostu sprawdzić, co każde słowo, jakakolwiek koncepcja lub jakakolwiek definicja oznacza w dowolnym momencie, w jakimkolwiek celu i dla każdego. Do tego właśnie służy WordWeight - definiujemy słowa w całym spektrum słowników.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Są standardowe słowniki. Istnieją również specjalne słowniki, takie jak słowniki dotyczące słowników leczniczych lub słowników technicznych. Istnieją również żargonowe i uliczne słownictwo frazowe, które wyszczególniają określone sformułowania do interesujących pól lub slangów powszechnie występujących w miejscach publicznych. Słowniki dla roślin domowych, znaczenia nazw, krajów, osobowości, dziedzin naukowych i wszystkiego, co można wymyślić. Byłoby miło, gdybyś mógł wyszukać jedno słowo, a potem znaleźć jego znaczenie we wszystkich słownikach. To właśnie robimy - jesteśmy WordWeight.com, a naszym celem jest dać ci jedną, regularną metodę ważenia słów.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">W WordWeight.com wszystko, co chcesz w słowniku, tezaurusie i książce wymowy jest tutaj na wyciągnięcie ręki. Możemy dostarczać informacje ze słowników, które każdy może wyszukać, ale robimy to w sposób, którego nikt wcześniej nie robił.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Czy szukałeś jakiegoś miejsca, by wyszukać słowa? Cóż, znalazłeś to.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Poniżej kilka przykładowych zastosowań witryny ...</p>' .
				'<ul>' .
					'<li> Jak ważę słowo? </li>' .
					'<li> Jak wyszukać słowo? </li>' .
					'<li> Jak zdefiniować słowo? </li>' .
					'<li> Jak wyjaśnić słowo? </li>' .
					'<li> Jak rozumiem słowo? </li>' .
					'<li> Jak nauczyć się nowego słowa? </li>' .
					'<li> Jak ważę wyrażenie? </li>' .
					'<li> Jak wyszukać frazę? </li>' .
					'<li> Jak zdefiniować frazę? </li>' .
					'<li> Jak wyjaśnić wyrażenie? </li>' .
					'<li> Jak rozumiem wyrażenie? </li>' .
					'<li> Jak mogę nauczyć się nowej frazy? </li>' .
					'<li> Jak ważę koncepcję? </li>' .
					'<li> Jak mogę sprawdzić koncepcję? </li>' .
					'<li> Jak zdefiniować pojęcie? </li>' .
					'<li> Jak wyjaśnić koncepcję? </li>' .
					'<li> Jak rozumiem koncepcję? </li>' .
					'<li> Jak mogę się nauczyć nowej koncepcji? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Poniżej kilka przykładowych zastosowań witryny ...</p>' .
				'<ul>' .
					'<li> Definicja <em> autoklawu </em>? </li>' .
					'<li> Definicja <em> ambivalent </em>? </li>' .
					'<li> Definicja <em> wielkoduszności </em>? </li>' .
					'<li> Definicja <em> ennui </em>? </li>' .
					'<li> Definicja <em> zgodności </em>? </li>' .
					'<li> Definicja <em> rewolucji </em>? </li>' .
					'<li> Definicja <em> abolicji </em>? </li>' .
					'<li> Definicja <em> monopsony </em>? </li>' .
					'<li> Definicja <em> rozgrzeszenia </em>? </li>' .
					'<li> Definicja <em> intransignence </em>? </li>' .
					'<li> Definicja <em> incepcji </em>? </li>' .
					'<li> Definicja <em> macabre </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com został stworzony i uruchomiony 5 maja 2017 r. Od tego czasu pokazujemy użytkownikom, jak ważenie słów dla wszystkiego.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com jest zbudowany przy użyciu <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, systemu zarządzania treścią zaprojektowanego do zasilania, prędkości i skalowalność.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Ta technologia, wykorzystująca PHP7 i MySQL5, zapewnia całą funkcjonalność tej witryny. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Sprawdź nas na GitHub! </a></p>'
			;
			
			break;
			
		case 'pt':
					// Word Weight : Weighing the Words
			$this->header_title_text = 'Palavra peso: pesando as palavras';
					
					// Do you want to know?  Look it up and then you know.
			$quote_text = 'Você quer saber? Olhe para cima e então você sabe.';
				
					// Look up a word.  Any dictionary, any definition, any time.
			$div_mouseover = 'Procure uma palavra. Qualquer dicionário, qualquer definição, a qualquer momento.';
			
			$this->share_text = 'Compartilhar';
			$this->share_with_text = 'Compartilhar com';
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
				'<p class="margin-0px text-indent-50px">O que isso significa? Você tem que descobrir o que isso significa. Mas é muito mais fácil descobrir quando é possível procurar o que qualquer palavra, conceito ou definição significa a qualquer momento, para qualquer finalidade e para qualquer pessoa. É para isso que o WordWeight serve - definimos as palavras em todo o espectro de dicionários.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Existem dicionários padrão. Há também dicionários de especialidades, como os que tratam de um assunto, como dicionários medicinais ou dicionários de engenharia. Há também jargões e dicionários de frases de rua, que detalham frases específicas para um campo de interesse ou gírias comumente encontradas em público. Dicionários para plantas de casas, para o significado de nomes, para países, para personalidades, para campos científicos e para qualquer outra coisa em que você possa pensar. Seria bom se você pudesse procurar uma palavra e depois encontrar seu significado em todos os dicionários. É isso que fazemos - somos o WordWeight.com, e nosso objetivo é fornecer um método único e regular para pesar palavras.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">No WordWeight.com, tudo o que você quer em um dicionário, um dicionário de sinônimos e um livro de pronúncia está aqui na ponta dos seus dedos. Podemos fornecer informações de dicionários que qualquer um pode procurar, mas fazemos isso de uma forma que ninguém fez antes.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Você estava procurando algum lugar para procurar palavras? Bom, você achou.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Abaixo estão alguns exemplos de uso do site ...</p>' .
				'<ul>' .
					'<li> Como eu pese uma palavra? </li>' .
					'<li> Como procuro uma palavra? </li>' .
					'<li> Como defino uma palavra? </li>' .
					'<li> Como explico uma palavra? </li>' .
					'<li> Como entendo uma palavra? </li>' .
					'<li> Como eu aprendo uma nova palavra? </li>' .
					'<li> Como pese uma frase? </li>' .
					'<li> Como procuro uma frase? </li>' .
					'<li> Como defino uma frase? </li>' .
					'<li> Como explico uma frase? </li>' .
					'<li> Como eu entendo uma frase? </li>' .
					'<li> Como aprendo uma nova frase? </li>' .
					'<li> Como eu pese um conceito? </li>' .
					'<li> Como procuro um conceito? </li>' .
					'<li> Como defino um conceito? </li>' .
					'<li> Como eu explico um conceito? </li>' .
					'<li> Como entendo um conceito? </li>' .
					'<li> Como aprendo um novo conceito? </li>' .
				'</ul>'
			;
			
				// BT: here!
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Abaixo estão alguns exemplos de uso do site ...</p>' .
				'<ul>' .
					'<li> Definição de <em> autoclave </em>? </li>' .
					'<li> Definição de <em> ambivalente </em>? </li>' .
					'<li> Definição de <em> magnânimo </em>? </li>' .
					'<li> Definição de <em> ennui </em>? </li>' .
					'<li> Definição de <em> conformidade </em>? </li>' .
					'<li> Definição de <em> revolução </em>? </li>' .
					'<li> Definição de <em> abolição </em>? </li>' .
					'<li> Definição de <em> monopsônio </em>? </li>' .
					'<li> Definição de <em> absolução </em>? </li>' .
					'<li> Definição de <em> intransignência </em>? </li>' .
					'<li> Definição de <em> início </em>? </li>' .
					'<li> Definição de <em> macabre </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">O WordWeight.com foi criado e lançado em 5 de maio de 2017. Desde então, temos mostrado aos usuários como pesar palavras para tudo e qualquer coisa.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">O WordWeight.com foi criado usando o <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, um sistema de gerenciamento de conteúdo projetado para energia, velocidade e escalabilidade.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Esta tecnologia, usando PHP7 e MySQL5, fornece todas as funcionalidades deste site. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Consulte-nos no GitHub! </a></p>'
			;
			
			break;
			
		case 'ru':
					// Word Weight : Weighing the Words
			$this->header_title_text = 'Вес слова: взвешивание слов';
					
					// Do you want to know?  Look it up and then you know.
			$quote_text = 'Ты хочешь знать? Ищите это, и тогда вы знаете.';
				
					// Look up a word.  Any dictionary, any definition, any time.
			$div_mouseover = 'Найдите слово. Любой словарь, любое определение, любое время.';
			
			$this->share_text = 'Поделиться';
			$this->share_with_text = 'Поделиться с';
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
				'<p class="margin-0px text-indent-50px">Что это значит? Вы должны выяснить, что это значит. Но гораздо проще понять, когда можно просто посмотреть, что означает любое слово, любое понятие или любое определение в любое время, для любой цели и для любого. Для этого и нужен WordWeight - мы определяем слова по всему спектру словарей.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Есть стандартные словари. Существуют также специальные словари, например, посвященные предмету, например, медицинские словари или технические словари. Существуют также словари жаргонных и уличных фраз, которые детализируют конкретные фразы в области интересов или жаргонных слов, обычно встречающихся в общественных местах. Словари для домашних растений, для обозначения имен, для стран, для личностей, для научных областей и для всего, что вы можете придумать. Было бы хорошо, если бы вы могли просто найти одно слово, а затем найти его значение во всех словарях. Это то, что мы делаем - мы WordWeight.com, и наша цель состоит в том, чтобы дать вам единый, регулярный метод для взвешивания слов.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">На WordWeight.com все, что вам нужно в словаре, тезаурусе и книге произношения, у вас под рукой. Мы можем предоставить информацию из словарей, которую может найти каждый, но мы делаем это так, как никто не делал раньше.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Вы искали место для поиска слов? Ну, вы нашли это.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Ниже приведены примеры использования сайта ...</p>' .
				'<ul>' .
					'<li> Как мне взвесить слово? </li> ' .
					'<li> Как мне найти слово? </li>' .
					'<li> Как мне определить слово? </li>' .
					'<li> Как я могу объяснить слово? </li> ' .
					'<li> Как я понимаю слово? </li> ' .
					'<li> Как я могу выучить новое слово? </li> ' .
					'<li> Как мне взвесить фразу? </li> ' .
					'<li> Как мне найти фразу? </li>' .
					'<li> Как определить фразу? </li>' .
					'<li> Как я могу объяснить фразу? </li> ' .
					'<li> Как я понимаю фразу? </li> ' .
					'<li> Как я могу выучить новую фразу? </li>' .
					'<li> Как мне взвесить концепцию? </li> ' .
					'<li> Как мне найти концепцию? </li>' .
					'<li> Как определить понятие? </li>' .
					'<li> Как я могу объяснить концепцию? </li> ' .
					'<li> Как я понимаю концепцию? </li> ' .
					'<li> Как я могу выучить новую концепцию? </li> ' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Ниже приведены примеры использования сайта ...</p>' .
				'<ul>' .
					'<li> Определение <em> автоклава </em>? </li>' .
					'<li> Определение <em> ambivalent </em>? </li>' .
					'<li> Определение <em> великодушного </em>? </li>' .
					'<li> Определение <em> ennui </em>? </li> ' .
					'<li> Определение <em> соответствия </em>? </li>' .
					'<li> Определение <em> revolution </em>? </li>' .
					'<li> Определение <em> отмены </em>? </li>' .
					'<li> Определение <em> монопсонии </em>? </li>' .
					'<li> Определение <em> отпущения грехов </em>? </li> ' .
					'<li> Определение <em> непримиримости </em>? </li>' .
					'<li> Определение <em> начала </em>? </li>' .
					'<li> Определение <em> macabre </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com был создан и запущен 5 мая 2017 года. С тех пор мы показываем пользователям, как взвешивать слова для всего и вся.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com создан с использованием <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> CMS Green Gluon </a>, системы управления контентом, разработанной для обеспечения мощности, скорости и масштабируемость.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Эта технология, использующая PHP7 и MySQL5, обеспечивает все функциональные возможности этого веб-сайта. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Проверьте нас на GitHub! </a></p>'
			;
			
			break;
			
		case 'tr':
					// Word Weight : Weighing the Words
			$this->header_title_text = 'Kelime Ağırlığı: Kelimeleri Tartmak';
					
					// Do you want to know?  Look it up and then you know.
			$quote_text = 'Bilmek istiyor musun? Bak ve sonra bilirsin.';
				
					// Look up a word.  Any dictionary, any definition, any time.
			$div_mouseover = 'Sözlükte kelime aramak. Herhangi bir sözlük, herhangi bir tanım, herhangi bir zamanda.';
			
			$this->share_text = 'Paylaşmak';
			$this->share_with_text = 'İle paylaş.';
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
				'<p class="margin-0px text-indent-50px">Bunun anlamı ne? Ne anlama geldiğini öğrenmelisin. Ancak, herhangi bir zamanda, herhangi bir kelimenin, herhangi bir kavramın veya herhangi bir tanımın, herhangi bir zamanda, herhangi bir amaç için, herhangi bir amaç için ne anlama geldiğine bir bakın. WordWeight bunun içindir - kelimeleri sözlükler yelpazesinde tanımlarız.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Standart sözlükler var. Tıbbi sözlükler veya mühendislik sözlükleri gibi bir konuyla ilgilenenler gibi özel sözlükler de vardır. Ayrıca, genel olarak kamuya açık bir ilgi alanına veya argo terimlerine özel ifadeleri ayrıntılandıran jargon ve sokak tabiri sözlükleri de vardır. Ev bitkileri, isimler, ülkeler, kişilikler, bilimsel alanlar ve aklınıza gelebilecek her şey için sözlükler. Sadece bir kelimeyi araştırabilir ve tüm sözlüklerdeki anlamını bulabilirseniz çok iyi olur. Bu bizim yaptığımız şey - biz WordWeight.com\'uz ve amacımız size kelimeleri tartmak için tek ve düzenli bir yöntem sunmak.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">WordWeight.com\'da, bir sözlükte, eş anlamlılar sözlüğünde ve telaffuz kitabında istediğiniz her şey parmaklarınızın ucunda. Sözlüklerden kimsenin arayabileceği bilgiler sağlayabiliriz, ancak bunu daha önce kimsenin yapmadığı şekilde yapıyoruz.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Kelimeleri aramak için bir yer mi arıyordun? Onu buldun.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Aşağıda sitenin bazı örnek kullanımları bulunmaktadır ...</p>' .
				'<ul>' .
					'<li> Bir kelimeyi nasıl tartarım? </li>' .
					'<li> Bir kelimeyi nasıl ararım? </li>' .
					'<li> Bir kelimeyi nasıl tanımlarım? </li>' .
					'<li> Bir kelimeyi nasıl açıklarım? </li>' .
					'<li> Bir kelimeyi nasıl anlarım? </li>' .
					'<li> Yeni bir kelimeyi nasıl öğrenirim? </li>' .
					'<li> Bir cümleyi nasıl tartarım? </li>' .
					'<li> Bir cümleyi nasıl ararım? </li>' .
					'<li> Bir cümleyi nasıl tanımlarım? </li>' .
					'<li> Bir cümleyi nasıl açıklayabilirim? </li>' .
					'<li> Bir cümleyi nasıl anlarım? </li>' .
					'<li> Yeni bir cümleyi nasıl öğrenebilirim? </li>' .
					'<li> Bir konsepti nasıl tartarım? </li>' .
					'<li> Bir konsepte nasıl bakabilirim? </li>' .
					'<li> Bir kavramı nasıl tanımlarım? </li>' .
					'<li> Bir kavramı nasıl açıklarım? </li>' .
					'<li> Bir kavramı nasıl anlarım? </li>' .
					'<li> Yeni bir kavramı nasıl öğrenirim? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Aşağıda sitenin bazı örnek kullanımları bulunmaktadır ...</p>' .
				'<ul>' .
					'<li> <em> Otoklavın tanımı </em>? </li>' .
					'<li> <em> belirsiz </em> tanımı? </li>' .
					'<li> <em> Magnanimous </em>? un tanımı </li>' .
					'<li> <em> ennui </em>? in tanımı</li>' .
					'<li> <em> uygunluk tanımı </em>? </li>' .
					'<li> <em> Devrimin tanımı </em>? </li>' .
					'<li> <em> Kaldırılması </em>? </li>' .
					'<li> <em> Monopsony\'nin tanımı </em>? </li>' .
					'<li> <em> Ayrılma </em>? </li>' .
					'<li> <em> uyumsuzluk tanımı </em>? </li>' .
					'<li> <em> Başlangıç </em>? ın tanımı</li>' .
					'<li> <em> Macabre </em>? in tanımı</li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com, 5 Mayıs 2017 tarihinde oluşturuldu ve başlatıldı. O zamandan beri, kullanıcılara her şey için kelimeleri nasıl tartacağımızı gösteriyoruz.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com, güç ve hız için tasarlanmış bir içerik yönetim sistemi olan <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a> kullanılarak oluşturulmuştur. ölçeklenebilirlik.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">PHP7 ve MySQL5 kullanan bu teknoloji, bu web sitesinin tüm işlevselliğini sağlar. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> GitHub\'da bize göz atın! </a></p>'
			;
			
			break;
			
		case 'zh':
					// Word Weight : Weighing the Words
			$this->header_title_text = '单词重量：称重单词';
					
					// Do you want to know?  Look it up and then you know.
			$quote_text = '你想知道吗？ 查一下然后你知道。';
				
					// Look up a word.  Any dictionary, any definition, any time.
			$div_mouseover = '查词。 任何字典，任何定义，任何时间。';
			
			$this->share_text = '分享';
			$this->share_with_text = '与某人分享';
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
				'<p class="margin-0px text-indent-50px">这是什么意思？ 你必须找出它的含义。 但是，当你可以随时查看任何单词，任何概念或任何定义对任何目的和任何人的意义时，都要容易得多。 这就是WordWeight的用途 - 我们定义了各种词典中的单词。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">有标准的词典。 还有专业词典，例如涉及主题的词典，如医学词典或工程词典。 还有行话和街头短语词典，详细说明了对公众常见的感兴趣领域或俚语的具体措辞。 室内植物词典，名称含义，国家，个性，科学领域以及您能想到的任何其他内容。 如果你只能查找一个单词，然后在所有词典中找到它的含义，那就太好了。 这就是我们所做的 - 我们是WordWeight.com，我们的目的是为您提供单一，常规的称量单词的方法。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">在WordWeight.com上，你想要的所有词典，词库和发音书都在触手可及。 我们可以从字典中提供任何人都可以查找的信息，但我们以前所未有的方式进行查找。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">你在寻找一些可以查找单词的地方吗？ 好吧，你找到了。</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">以下是该网站的一些示例用法......</p>' .
				'<ul>' .
					'<li>我如何权衡一个词？</li>' .
					'<li>我如何查找单词？</li>' .
					'<li>如何定义单词？</li>' .
					'<li>我如何解释一个词？</li>' .
					'<li>我如何理解一个词？</li>' .
					'<li>如何学习新单词？</li>' .
					'<li>我如何权衡一个短语？</li>' .
					'<li>我如何查找短语？</li>' .
					'<li>如何定义短语？</li>' .
					'<li>我如何解释一个短语？</li>' .
					'<li>我如何理解短语？</li>' .
					'<li>如何学习新短语？</li>' .
					'<li>我如何权衡一个概念？</li>' .
					'<li>我如何查找概念？</li>' .
					'<li>如何定义概念？</li>' .
					'<li>我如何解释一个概念？</li>' .
					'<li>我如何理解一个概念？</li>' .
					'<li>我如何学习新概念？</li>' .
				'</ul>'
			;
			
				// BT: here!
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">以下是该网站的一些示例用途......</p>' .
				'<ul>' .
					'<li> <em>高压灭菌器的定义</em>？</li>' .
					'<li> <em>矛盾的定义</em>？</li>' .
					'<li> <em> magnanimous的定义</em>？</li>' .
					'<li> <em> ennui </em>的定义？</li>' .
					'<li> <em>整合的定义</em>？</li>' .
					'<li> <em>革命的定义</em>？</li>' .
					'<li> <em>废除的定义</em>？</li>' .
					'<li> <em> monopsony的定义</em>？</li>' .
					'<li> <em>赦免</em>的定义？</li>' .
					'<li> <em> intransignence的定义</em>？</li>' .
					'<li> <em>开始的定义</em>？</li>' .
					'<li> <em> macabre的定义</em>？</li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com于2017年5月5日创建并推出。从那时起，我们一直在向用户展示如何权衡任何事物和所有内容。</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">WordWeight.com使用<a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>构建，这是一个专为功率，速度和设计而设计的内容管理系统可扩展性。</p>' .
				
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
		
				// Start Top Bar
			
			// -------------------------------------------------------------
		
		print('<div class="horizontal-center width-95percent margin-top-5px">');
		
				// Breadcrumbs Info
			
			// -------------------------------------------------------------
		
		require('../modules/html/breadcrumbs.php');
		$breadcrumbs = new module_breadcrumbs(['that'=>$this, 'title'=>$about_header_title_text]);
		$breadcrumbs->Display();
		
				// Login Info
			
			// -------------------------------------------------------------
			
		require('../modules/html/auth.php');
		$auth = new module_auth(['that'=>$this]);
		$auth->Display();
		
				// End Top Bar
			
			// -------------------------------------------------------------
		
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>WordWeight ' . $mission_header_text . ' :</em></h3></center>');
	
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>WordWeight ' . $examples_header_text . ' :</em></h3></center>');
	
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>WordWeight ' . $uses_header_text . ' :</em></h3></center>');
	
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>WordWeight ' . $history_header_text . ' :</em></h3></center>');
	
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>WordWeight ' . $technology_header_text . ' :</em></h3></center>');
	
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