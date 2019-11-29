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
					
					// Content Text
			
			$mission_header_text = 'Mission';
			$examples_header_text = 'Examples';
			$uses_header_text = 'Uses';
			$history_header_text = 'History';
			$technology_header_text = 'Tech';
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Language is not just the basis for communication.  It is communication.  Knowing how to pronounce words while speaking is as important as picking up the ambience and cues of a social gathering.  You need to know it to think, to cooperate, to organize, and to act.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">This is the need that PronounceThat.com tries to satisfy.  Expanding knowledge of literacy and communication is our mission and purpose.  The written matters, but only because you can say it to someone.  Poetry is good not because it rhymes, but because it is something that can be said outloud.  Your memory is great when you can write something down a thousand times, but becomes impeccable when you can also recite it only with the tongue.  Greatness in ideas is not found because they are perfect, but because they are expressible and lend themselves to the situation.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">At PronounceThat.com, we try to give you everything you need to speak any language.  Learning an ancient word from the 17th century?  Not a problem.  Need to pronounce something in a language you do not know, like French or Spanish.  Got you covered.  Are you practicing a northern or a southern dialact, or a western or eastern style of speaking?  No worries, because we let you pick the accent.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Were you looking for some place to learning pronunciation?  Well, you have found it.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Below are some example uses of the site...</p>' .
				'<ul>' .
					'<li> How do I pronounce <em>bon appetit</em>?</li>' .
					'<li> How do I pronounce <em>fait accompli</em>?</li>' .
					'<li> How do I pronounce <em>bon mot</em>?</li>' .
					'<li> How do I pronounce <em>carte blanche</em>?</li>' .
					'<li> How do I pronounce <em>ad nauseam</em>?</li>' .
					'<li> How do I pronounce <em>hoi polloi</em>?</li>' .
					'<li> How do I pronounce <em>bon voyage</em>?</li>' .
					'<li> How do I pronounce <em>bona fide</em>?</li>' .
					'<li> How do I pronounce <em>faux pas</em>?</li>' .
					'<li> How do I pronounce <em>aficionado</em>?</li>' .
					'<li> How do I pronounce <em>mea culpa</em>?</li>' .
					'<li> How do I pronounce <em>en masse</em>?</li>' .
					'<li> How do I pronounce <em>zeitgeist</em>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Below are some sample uses of the site...</p>' .
				'<ul>' .
					'<li> How do I learn pronunciation?</li>' .
					'<li> How do I learn to pronounce words?</li>' .
					'<li> How do I learn to pronunciation?</li>' .
					'<li> How do I pronounce complicated words?</li>' .
					'<li> How do I pronounce new words?</li>' .
					'<li> How do I pronounce words from other languages?</li>' .
					'<li> How do I pronounce something I have read?</li>' .
					'<li> How do I speak with an accent?</li>' .
					'<li> How do I speak with clarity?</li>' .
					'<li> How do I speak with clearness?</li>' .
					'<li> How do I speak complicated words?</li>' .
					'<li> How do I speak new languages?</li>' .
					'<li> How do I speak new words?</li>' .
					'<li> How do I enunciate?</li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com was created and launched on June 11, 2018.  Since then, we have been showing users how to pronounce anything and everything.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com is built using the <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank">Green Gluon CMS</a>, a content-management system designed for power, speed, and scalability.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">This technology, using PHP7 and MySQL5, provides all of the functionality of this website.  <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank">Check us out on GitHub!</a></p>'
			;
			
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
					
					// Content Text
			
			$mission_header_text = 'Mission';
			$examples_header_text = 'Beispiele';
			$uses_header_text = 'Verwendet';
			$history_header_text = 'Geschichte';
			$technology_header_text = 'Technik';
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Sprache ist nicht nur die Basis für Kommunikation. Es ist Kommunikation. Zu wissen, wie man Wörter spricht, ist genauso wichtig wie das Ambiente und die Hinweise einer gesellschaftlichen Zusammenkunft. Sie müssen es wissen, um zu denken, zusammenzuarbeiten, sich zu organisieren und zu handeln.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Dies ist das Bedürfnis, das PronounceThat.com zu befriedigen versucht. Wissen über Alphabetisierung und Kommunikation zu erweitern, ist unsere Mission und unser Ziel. Die schriftlichen Angelegenheiten sind aber nur, weil man es jemandem sagen kann. Dichtung ist gut, nicht weil sie sich reimt, sondern weil sie etwas laut gesagt werden kann. Ihr Gedächtnis ist großartig, wenn Sie tausendmal etwas aufschreiben können, aber es wird einwandfrei, wenn Sie es auch nur mit der Zunge rezitieren können. Größe in Ideen wird nicht gefunden, weil sie perfekt sind, sondern weil sie sich ausdrücken lassen und sich der Situation anpassen.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Wir bei PronounceThat.com versuchen Ihnen alles zu geben, was Sie brauchen, um eine beliebige Sprache zu sprechen. Ein altes Wort aus dem 17. Jahrhundert lernen? Kein Problem. Müssen Sie etwas in einer Sprache aussprechen, die Sie nicht kennen, wie Französisch oder Spanisch. Hab dich bedeckt. Üben Sie einen nördlichen oder südlichen Dialekt oder eine westliche oder östliche Sprechweise? Keine Sorge, denn wir lassen Sie den Akzent wählen.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Haben Sie nach einem Ort gesucht, um Aussprache zu lernen? Nun, du hast es gefunden.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Nachfolgend finden Sie einige Anwendungsbeispiele der Website ...</p>' .
				'<ul>' .
					'<li> Wie spreche ich <em>bon appetit</em>?</li>' .
					'<li> Wie spreche ich <em>fait accompli</em>?</li>' .
					'<li> Wie spreche ich <em>bon mot</em>?</li>' .
					'<li> Wie spreche ich <em>carte blanche</em>?</li>' .
					'<li> Wie spreche ich <em>ad nauseam</em>?</li>' .
					'<li> Wie spreche ich <em>hoi polloi</em>?</li>' .
					'<li> Wie spreche ich <em>bon voyage</em>?</li>' .
					'<li> Wie spreche ich <em>bona fide</em>?</li>' .
					'<li> Wie spreche ich <em>faux pas</em>?</li>' .
					'<li> Wie spreche ich <em>aficionado</em>?</li>' .
					'<li> Wie spreche ich <em>mea culpa</em>?</li>' .
					'<li> Wie spreche ich <em>en masse</em>?</li>' .
					'<li> Wie spreche ich <em>zeitgeist</em>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Nachfolgend finden Sie einige Anwendungsbeispiele der Website ...</p>' .
				'<ul>' .
					'<li> Wie lerne ich die Aussprache? </li>' .
					'<li> Wie lerne ich Wörter auszusprechen? </li>' .
					'<li> Wie lerne ich die Aussprache? </li>' .
					'<li> Wie spreche ich komplizierte Wörter aus? </li>' .
					'<li> Wie spreche ich neue Wörter aus? </li>' .
					'<li> Wie kann ich Wörter aus anderen Sprachen aussprechen? </li>' .
					'<li> Wie spreche ich etwas aus, das ich gelesen habe? </li>' .
					'<li> Wie spreche ich mit einem Akzent? </li>' .
					'<li> Wie spreche ich mit Klarheit? </li>' .
					'<li> Wie spreche ich klar? </li>' .
					'<li> Wie spreche ich komplizierte Wörter? </li>' .
					'<li> Wie spreche ich neue Sprachen? </li>' .
					'<li> Wie spreche ich neue Wörter? </li>' .
					'<li> Wie kann ich das ausdrücken? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com wurde am 11. Juni 2018 erstellt und gestartet. Seitdem zeigen wir den Benutzern, wie sie alles ausdrücken können.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">Die Version von PronounceThat.com basiert auf dem <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, einem Content-Management-System, das auf Leistung, Geschwindigkeit und Leistung ausgelegt ist Skalierbarkeit.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Diese Technologie verwendet PHP7 und MySQL5 und bietet alle Funktionen dieser Website. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Besuchen Sie GitHub! </a></p>'
			;
	
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
					
					// Content Text
			
			$mission_header_text = 'Misión';
			$examples_header_text = 'Ejemplos';
			$uses_header_text = 'Usos';
			$history_header_text = 'Historia';
			$technology_header_text = 'Tecnología';
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">El lenguaje no es solo la base para la comunicación. Es la comunicación. Saber pronunciar palabras mientras se habla es tan importante como recoger el ambiente y las claves de una reunión social. Necesitas saberlo para pensar, cooperar, organizar y actuar.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Esta es la necesidad que PronounceThat.com trata de satisfacer. Ampliar el conocimiento de la alfabetización y la comunicación es nuestra misión y propósito. Los asuntos escritos, pero solo porque puedes decírselo a alguien. La poesía es buena no porque rime, sino porque es algo que se puede decir en voz alta. Tu memoria es genial cuando puedes escribir algo mil veces, pero se vuelve impecable cuando también puedes recitarla solo con la lengua. La grandeza de las ideas no se encuentra porque son perfectas, sino porque son expresables y se prestan a la situación.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">En PronounceThat.com, tratamos de darle todo lo que necesita para hablar cualquier idioma. ¿Aprender una palabra antigua del siglo XVII? No es un problema. Necesitas pronunciar algo en un idioma que no conoces, como el francés o el español. Te tengo cubierto ¿Está practicando un dialact norte o sur, o un estilo de hablar occidental o oriental? No te preocupes, porque te dejamos elegir el acento.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">¿Estabas buscando un lugar para aprender pronunciación? Bueno, lo has encontrado.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">A continuación se muestran algunos ejemplos de usos del sitio ...</p>' .
				'<ul>' .
					'<li> ¿Cómo se pronuncia <em>bon appetit</em>?</li>' .
					'<li> ¿Cómo se pronuncia <em>fait accompli</em>?</li>' .
					'<li> ¿Cómo se pronuncia <em>bon mot</em>?</li>' .
					'<li> ¿Cómo se pronuncia <em>carte blanche</em>?</li>' .
					'<li> ¿Cómo se pronuncia <em>ad nauseam</em>?</li>' .
					'<li> ¿Cómo se pronuncia <em>hoi polloi</em>?</li>' .
					'<li> ¿Cómo se pronuncia <em>bon voyage</em>?</li>' .
					'<li> ¿Cómo se pronuncia <em>bona fide</em>?</li>' .
					'<li> ¿Cómo se pronuncia <em>faux pas</em>?</li>' .
					'<li> ¿Cómo se pronuncia <em>aficionado</em>?</li>' .
					'<li> ¿Cómo se pronuncia <em>mea culpa</em>?</li>' .
					'<li> ¿Cómo se pronuncia <em>en masse</em>?</li>' .
					'<li> ¿Cómo se pronuncia <em>zeitgeist</em>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">A continuación se muestran algunos usos de ejemplo del sitio ...</p>' .
				'<ul>' .
					'<li> ¿Cómo aprendo la pronunciación? </li>' .
					'<li> ¿Cómo aprendo las palabras? </li>' .
					'<li> ¿Cómo aprendo a la pronunciación? </li>' .
					'<li> ¿Cómo se pronuncia palabras complicadas? </li>' .
					'<li> ¿Cómo puedo pronunciar nuevas palabras? </li>' .
					'<li> ¿Cómo pronuncio palabras de otros idiomas? </li>' .
					'<li> ¿Cómo se pronuncia algo que he leído? </li>' .
					'<li> ¿Cómo hablo con un acento? </li>' .
					'<li> ¿Cómo hablo con claridad? </li>' .
					'<li> ¿Cómo hablo con claridad? </li>' .
					'<li> ¿Cómo hablo las palabras complicadas? </li>' .
					'<li> ¿Cómo hablo nuevos idiomas? </li>' .
					'<li> ¿Cómo hablo nuevas palabras? </li>' .
					'<li> ¿Cómo lo enuncio? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com fue creado y lanzado el 11 de junio de 2018. Desde entonces, hemos estado mostrando a los usuarios cómo pronunciar cualquier cosa y todo.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com se crea utilizando el <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, un sistema de gestión de contenido diseñado para potencia, velocidad y escalabilidad</p>' .
				
				'<p class = "margin-0px text-indent-50px margin-top-22px"> Esta tecnología, que utiliza PHP7 y MySQL5, proporciona toda la funcionalidad de este sitio web. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> ¡Visítenos en GitHub! </a> </p>'
			;
			
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
					
					// Content Text
			
			$mission_header_text = 'Mission';
			$examples_header_text = 'Exemples';
			$uses_header_text = 'Les usages';
			$history_header_text = 'L\'histoire';
			$technology_header_text = 'Technologie';
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">La langue n\'est pas seulement la base de la communication. C\'est la communication. Savoir prononcer des mots en parlant est aussi important que de capter l\'ambiance et les indices d\'une réunion sociale. Vous devez le savoir pour penser, coopérer, organiser et agir.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">C\'est le besoin que PronounceThat.com tente de satisfaire. Accroître les connaissances en littératie et en communication est notre mission et notre objectif. L’écrit compte, mais seulement parce que vous pouvez le dire à quelqu\'un. La poésie est bonne non pas parce qu\'elle rime, mais parce que c\'est quelque chose que l\'on peut dire à voix haute. Votre mémoire est excellente lorsque vous pouvez écrire mille fois quelque chose, mais devient impeccable lorsque vous ne pouvez la réciter qu’avec la langue. La grandeur dans les idées ne se trouve pas parce qu\'elles sont parfaites, mais parce qu\'elles sont exprimables et se prêtent à la situation.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Chez PronounceThat.com, nous essayons de vous donner tout ce dont vous avez besoin pour parler une langue. Apprendre un mot ancien du 17ème siècle? Pas de problème. Besoin de prononcer quelque chose dans une langue que vous ne connaissez pas, comme le français ou l\'espagnol. Vous avez couvert. Pratiquez-vous un dialecte du nord ou du sud, ou un style de conversation occidental ou oriental? Pas de soucis, car nous vous laissons choisir l\'accent.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Cherchiez-vous un endroit pour apprendre la prononciation? Eh bien, vous l\'avez trouvé.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Ci-dessous quelques exemples d\'utilisations du site ...</p>' .
				'<ul>' .
					'<li> Comment est-ce que je prononce <em>bon appetit</em>?</li>' .
					'<li> Comment est-ce que je prononce <em>fait accompli</em>?</li>' .
					'<li> Comment est-ce que je prononce <em>bon mot</em>?</li>' .
					'<li> Comment est-ce que je prononce <em>carte blanche</em>?</li>' .
					'<li> Comment est-ce que je prononce <em>ad nauseam</em>?</li>' .
					'<li> Comment est-ce que je prononce <em>hoi polloi</em>?</li>' .
					'<li> Comment est-ce que je prononce <em>bon voyage</em>?</li>' .
					'<li> Comment est-ce que je prononce <em>bona fide</em>?</li>' .
					'<li> Comment est-ce que je prononce <em>faux pas</em>?</li>' .
					'<li> Comment est-ce que je prononce <em>aficionado</em>?</li>' .
					'<li> Comment est-ce que je prononce <em>mea culpa</em>?</li>' .
					'<li> Comment est-ce que je prononce <em>en masse</em>?</li>' .
					'<li> Comment est-ce que je prononce <em>zeitgeist</em>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Ci-dessous quelques exemples d\'utilisations du site ...</p>' .
				'<ul>' .
					'<li> Comment puis-je apprendre la prononciation? </ li>' .
					'<li> Comment puis-je apprendre à prononcer des mots? </ li>' .
					'<li> Comment puis-je apprendre la prononciation? </ li>' .
					'<li> Comment prononcer des mots compliqués? </ li>' .
					'<li> Comment prononcer de nouveaux mots? </ li>' .
					'<li> Comment prononcer des mots d\'autres langues? </ li>' .
					'<li> Comment prononcer quelque chose que j\'ai lu? </ li>' .
					'<li> Comment puis-je parler avec un accent? </ li>' .
					'<li> Comment puis-je parler avec clarté? </ li>' .
					'<li> Comment puis-je parler avec clarté? </ li>' .
					'<li> Comment puis-je parler des mots compliqués? </ li>' .
					'<li> Comment parler de nouvelles langues? </ li>' .
					'<li> Comment puis-je parler de nouveaux mots? </ li>' .
					'<li> Comment énoncer? </ li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com a été créé et lancé le 11 juin 2018. Depuis lors, nous montrons aux utilisateurs comment prononcer n\'importe quoi.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com est conçu à l\'aide du <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> CMS Green Gluon </a>, un système de gestion de contenu conçu pour optimiser l\'évolutivité.</p>' .
				
				'<p class = "margin-0px text-indent-50px margin-top-22px"> Cette technologie, utilisant PHP7 et MySQL5, fournit toutes les fonctionnalités de ce site Web. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Consultez-nous sur GitHub! </a> </ p>'
			;
			
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
					
					// Content Text
			
			$mission_header_text = 'ミッション';
			$examples_header_text = '例';
			$uses_header_text = '用途';
			$history_header_text = '歴史';
			$technology_header_text = 'テック';
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">言葉はコミュニケーションの基盤ではありません。 コミュニケーションです。 話しながら単語を発音する方法を知ることは、社交会の雰囲気や手がかりを拾うのと同じくらい重要です。 考え、協力し、組織し、行動するためにそれを知る必要があります。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">これは、PronounceThat.comが満足することを試みる必要性です。 識字能力とコミュニケーションの知識を広げることが私たちの使命と目的です。 文章は重要ですが、それはあなたが誰かにそれを言うことができるという理由だけでです。 詩はそれが韻を踏むことからではなく、それが誇張であると言えるからです。 あなたが何かを何千回も書くことができるときあなたの記憶は素晴らしいですが、あなたがそれを舌でのみ暗唱することができるときには申し分のないものになります。 アイデアの素晴らしさは完璧であるからではなく、表現可能で状況に適しているからです。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">PronounceThat.comでは、あらゆる言語を話すために必要なすべてを提供しています。 17世紀から古代の言葉を学びますか？ 問題ない。 フランス語やスペイン語のように、あなたが知らない言語で何かを発音する必要があります。 あなたがカバーしてしまった。 あなたは、北部または南部の方言、または西部または東部の会話を練習していますか？ 私たちはあなたがアクセントを選ぶことができますので、心配しないでください。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">発音を学ぶ場所を探していましたか？ まあ、あなたはそれを見つけました。</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">下記はサイトの使用例です。。。</p>' .
				'<ul>' .
					'<li> <em>bon appetit</em>の発音の仕方</li>' .
					'<li> <em>fait accompli</em>の発音の仕方</li>' .
					'<li> <em>bon mot</em>の発音の仕方</li>' .
					'<li> <em>carte blanche</em>の発音の仕方</li>' .
					'<li> <em>ad nauseam</em>の発音の仕方</li>' .
					'<li> <em>hoi polloi</em>の発音の仕方</li>' .
					'<li> <em>bon voyage</em>の発音の仕方</li>' .
					'<li> <em>bona fide</em>の発音の仕方</li>' .
					'<li> <em>faux pas</em>の発音の仕方</li>' .
					'<li> <em>aficionado</em>の発音の仕方</li>' .
					'<li> <em>mea culpa</em>の発音の仕方</li>' .
					'<li> <em>en masse</em>の発音の仕方</li>' .
					'<li> <em>zeitgeist</em>の発音の仕方</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">下記はサイトの使用例です。。。</p>' .
				'<ul>' .
					'<li>発音を学ぶにはどうすればよいですか？</li>' .
					'<li>単語の発音をどうやって学習するのですか？</li>' .
					'<li>発音の仕方を教えてください？</li>' .
					'<li>複雑な言葉をどう発音するか？</li>' .
					'<li>新しい単語を発音するにはどうすればよいですか？</li>' .
					'<li>他の言語の単語を発音する方法は？？</li>' .
					'<li>読んだものをどのように発音できますか？</li>' .
					'<li>アクセントで話す方法は？</li>' .
					'<li>わかりやすく話すにはどうすればよいですか？</li>' .
					'<li>どうやって明確に話しますか？</li>' .
					'<li>複雑な言葉を話すにはどうすればよいですか？</li>' .
					'<li>新しい言語を話すにはどうすればよいですか？</li>' .
					'<li>新しい単語をどうやって話せますか？</li>' .
					'<li>どうやって発音できますか？</li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.comは、2018年6月11日に創設され、発売されました。</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.comは<a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>を使用して構築されています。 スケーラビリティ</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">PHP 7とMySQL 5を使用するこのテクノロジは、このWebサイトのすべての機能を提供します。 <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> GitHubをご覧ください。</a></p>'
			;
			
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
					
					// Content Text
			
			$mission_header_text = 'Missione';
			$examples_header_text = 'Esempi';
			$uses_header_text = 'Usi';
			$history_header_text = 'Storia';
			$technology_header_text = 'Tecnologia';
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">La lingua non è solo la base per la comunicazione. È comunicazione. Sapere come pronunciare le parole mentre si parla è importante quanto raccogliere l\'atmosfera e le indicazioni di un incontro sociale. Devi saperlo per pensare, per cooperare, per organizzare e per agire.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Questa è la necessità che PronounceThat.com cerca di soddisfare. Espandere la conoscenza dell\'alfabetizzazione e della comunicazione è la nostra missione e il nostro scopo. Le questioni scritte, ma solo perché puoi dirlo a qualcuno. La poesia è buona non perché fa rima, ma perché è qualcosa che può essere detto a voce alta. La tua memoria è grande quando puoi scrivere qualcosa di mille volte, ma diventa impeccabile quando puoi anche recitarlo solo con la lingua. La grandezza delle idee non si trova perché sono perfette, ma perché sono espressive e si prestano alla situazione.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Su PronounceThat.com, cerchiamo di darti tutto il necessario per parlare qualsiasi lingua. Imparare una parola antica del 17 ° secolo? Non è un problema. Hai bisogno di pronunciare qualcosa in una lingua che non conosci, come il francese o lo spagnolo. Ti ho coperto. Stai praticando un dialetto del nord o del sud o uno stile di parlare occidentale o orientale? Nessun problema, perché ti lasciamo scegliere l\'accento.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Stavi cercando un posto dove imparare la pronuncia? Bene, l\'hai trovato.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Di seguito sono riportati alcuni esempi di utilizzo del sito...</p>' .
				'<ul>' .
					'<li> Come si pronuncia <em>bon appetit</em>?</li>' .
					'<li> Come si pronuncia <em>fait accompli</em>?</li>' .
					'<li> Come si pronuncia <em>bon mot</em>?</li>' .
					'<li> Come si pronuncia <em>carte blanche</em>?</li>' .
					'<li> Come si pronuncia <em>ad nauseam</em>?</li>' .
					'<li> Come si pronuncia <em>hoi polloi</em>?</li>' .
					'<li> Come si pronuncia <em>bon voyage</em>?</li>' .
					'<li> Come si pronuncia <em>bona fide</em>?</li>' .
					'<li> Come si pronuncia <em>faux pas</em>?</li>' .
					'<li> Come si pronuncia <em>aficionado</em>?</li>' .
					'<li> Come si pronuncia <em>mea culpa</em>?</li>' .
					'<li> Come si pronuncia <em>en masse</em>?</li>' .
					'<li> Come si pronuncia <em>zeitgeist</em>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Di seguito sono riportati alcuni esempi di utilizzo del sito ...</p>' .
				'<ul>' .
					'<li> Come imparo la pronuncia? </ li>' .
					'<li> Come imparo a pronunciare le parole? </ li>' .
					'<li> Come imparo la pronuncia? </ li>' .
					'<li> Come faccio a pronunciare parole complicate? </ li>' .
					'<li> Come faccio a pronunciare nuove parole? </ li>' .
					'<li> Come faccio a pronunciare parole da altre lingue? </ li>' .
					'<li> Come faccio a pronunciare qualcosa che ho letto? </ li>' .
					'<li> Come parlo con un accento? </ li>' .
					'<li> Come parlo con chiarezza? </ li>' .
					'<li> Come parlo con chiarezza? </ li>' .
					'<li> Come parlo parole complicate? </ li>' .
					'<li> Come parlo nuove lingue? </ li>' .
					'<li> Come parlo nuove parole? </ li>' .
					'<li> Come posso enunciare? </ li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com è stato creato e lanciato l\'11 giugno 2018. Da allora, abbiamo mostrato agli utenti come pronunciare qualsiasi cosa.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com è costruito utilizzando il <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, un sistema di gestione dei contenuti progettato per potenza, velocità e scalabilità.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Questa tecnologia, che utilizza PHP7 e MySQL5, fornisce tutte le funzionalità di questo sito web. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Controllaci su GitHub!</a></p>'
			;
			
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
					
					// Content Text
			
			$mission_header_text = 'Missie';
			$examples_header_text = 'Voorbeelden';
			$uses_header_text = 'Toepassingen';
			$history_header_text = 'Geschiedenis';
			$technology_header_text = 'Technologie';
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Taal is niet alleen de basis voor communicatie. Het is communicatie. Weten hoe woorden moeten worden uitgesproken terwijl ze spreken, is net zo belangrijk als het oppikken van de sfeer en aanwijzingen van een sociale bijeenkomst. Je moet het weten om na te denken, samen te werken, te organiseren en te handelen.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Dit is de behoefte die PronounceThat.com probeert te bevredigen. Meer kennis van geletterdheid en communicatie is onze missie en doel. De geschreven zaken, maar alleen omdat je het tegen iemand kunt zeggen. Poëzie is goed, niet omdat het rijmt, maar omdat het iets is dat je hardop kunt zeggen. Je geheugen is geweldig als je duizend keer iets kunt opschrijven, maar het wordt onberispelijk wanneer je het ook alleen met de tong kunt reciteren. Grootheid in ideeën wordt niet gevonden omdat ze perfect zijn, maar omdat ze tot uitdrukking kunnen worden gebracht en zich aan de situatie lenen.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Bij PronounceThat.com proberen we je alles te geven wat je nodig hebt om in welke taal dan ook te spreken. Een oud woord uit de 17e eeuw leren kennen? Geen probleem. Moet iets uitspreken in een taal die u niet kent, zoals Frans of Spaans. Ik heb je gedekt. Beoefen je een dialect in het noorden of het zuiden, of een westerse of oosterse stijl van spreken? Geen zorgen, omdat we je het accent laten kiezen.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Was je op zoek naar een plaats om te leren uitspraak? Nou, je hebt het gevonden.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Hieronder zijn enkele voorbeelden van gebruik van de site ...</p>' .
				'<ul>' .
					'<li> Hoe spreek ik <em>bon appetit</em> uit?</li>' .
					'<li> Hoe spreek ik <em>fait accompli</em> uit?</li>' .
					'<li> Hoe spreek ik <em>bon mot</em> uit?</li>' .
					'<li> Hoe spreek ik <em>carte blanche</em> uit?</li>' .
					'<li> Hoe spreek ik <em>ad nauseam</em> uit?</li>' .
					'<li> Hoe spreek ik <em>hoi polloi</em> uit?</li>' .
					'<li> Hoe spreek ik <em>bon voyage</em> uit?</li>' .
					'<li> Hoe spreek ik <em>bona fide</em> uit?</li>' .
					'<li> Hoe spreek ik <em>faux pas</em> uit?</li>' .
					'<li> Hoe spreek ik <em>aficionado</em> uit?</li>' .
					'<li> Hoe spreek ik <em>mea culpa</em> uit?</li>' .
					'<li> Hoe spreek ik <em>en masse</em> uit?</li>' .
					'<li> Hoe spreek ik <em>zeitgeist</em> uit?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Hieronder vindt u enkele voorbeelden van gebruik van de site ...</p>' .
				'<ul>' .
					'<li> Hoe kan ik de uitspraak leren? </ li>' .
					'<li> Hoe leer ik woorden uit te spreken? </ li>' .
					'<li> Hoe kan ik de uitspraak leren? </ li>' .
					'<li> Hoe spreek ik gecompliceerde woorden uit? </ li>' .
					'<li> Hoe spreek ik nieuwe woorden uit? </ li>' .
					'<li> Hoe spreek ik woorden uit andere talen uit? </ li>' .
					'<li> Hoe spreek ik iets uit dat ik heb gelezen? </ li>' .
					'<li> Hoe spreek ik met een accent? </ li>' .
					'<li> Hoe spreek ik duidelijkheid? </ li>' .
					'<li> Hoe spreek ik met helderheid? </ li>' .
					'<li> Hoe spreek ik gecompliceerde woorden? </ li>' .
					'<li> Hoe spreek ik nieuwe talen? </ li>' .
					'<li> Hoe spreek ik nieuwe woorden? </ li>' .
					'<li> Hoe communiceer ik? </ li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com is gemaakt en gestart op 11 juni 2018. Sindsdien hebben we gebruikers laten zien hoe je alles en nog wat moet uitspreken.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com is gebouwd met behulp van de <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, een inhoudbeheersysteem dat is ontworpen voor kracht, snelheid en schaalbaarheid.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Deze technologie, met behulp van PHP7 en MySQL5, biedt alle functionaliteit van deze website. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Bekijk ons op GitHub! </a></p>'
			;
			
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
					
					// Content Text
			
			$mission_header_text = 'Misja';
			$examples_header_text = 'Przykłady';
			$uses_header_text = 'Używa';
			$history_header_text = 'Historia';
			$technology_header_text = 'Technologia';
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Język to nie tylko podstawa komunikacji. To jest komunikacja. Umiejętność wymawiania słów podczas mówienia jest równie ważna, jak wychwycenie atmosfery i wskazówek towarzyskiego spotkania. Musisz wiedzieć, aby myśleć, współpracować, organizować i działać.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Jest to potrzeba, którą PronounceThat.com stara się zaspokoić. Rozszerzanie wiedzy na temat umiejętności czytania i pisania jest naszą misją i celem. Sprawy pisemne, ale tylko dlatego, że możesz komuś to powiedzieć. Poezja jest dobra, nie dlatego, że się rymuje, ale dlatego, że można to powiedzieć na głos. Twoja pamięć jest świetna, kiedy możesz napisać coś tysiąc razy, ale staje się nieskazitelna, kiedy możesz ją recytować tylko językiem. Wielkość idei nie została znaleziona, ponieważ są one doskonałe, ale dlatego, że są wyraziste i nadają się do sytuacji.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">W PronounceThat.com staramy się dać ci wszystko, czego potrzebujesz, aby mówić w dowolnym języku. Nauka starożytnego słowa z XVII wieku? Żaden problem. Musisz wymawiać coś w języku, którego nie znasz, np. Francuskim lub hiszpańskim. Jesteś zakryty. Czy ćwiczysz dialekt północny lub południowy, czy zachodni lub wschodni styl mówienia? Bez obaw, ponieważ pozwalamy wybrać akcent.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Czy szukasz miejsca do nauki wymowy? Cóż, znalazłeś to.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Poniżej kilka przykładowych zastosowań witryny ...</p>' .
				'<ul>' .
					'<li> Jak wymówić <em>bon appetit</em>?</li>' .
					'<li> Jak wymówić <em>fait accompli</em>?</li>' .
					'<li> Jak wymówić <em>bon mot</em>?</li>' .
					'<li> Jak wymówić <em>carte blanche</em>?</li>' .
					'<li> Jak wymówić <em>ad nauseam</em>?</li>' .
					'<li> Jak wymówić <em>hoi polloi</em>?</li>' .
					'<li> Jak wymówić <em>bon voyage</em>?</li>' .
					'<li> Jak wymówić <em>bona fide</em>?</li>' .
					'<li> Jak wymówić <em>faux pas</em>?</li>' .
					'<li> Jak wymówić <em>aficionado</em>?</li>' .
					'<li> Jak wymówić <em>mea culpa</em>?</li>' .
					'<li> Jak wymówić <em>en masse</em>?</li>' .
					'<li> Jak wymówić <em>zeitgeist</em>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Hieronder vindt u enkele voorbeelden van gebruik van de site ...</p>' .
				'<ul>' .
					'<li> Hoe kan ik de uitspraak leren? </ li>' .
					'<li> Hoe leer ik woorden uit te spreken? </ li>' .
					'<li> Hoe kan ik de uitspraak leren? </ li>' .
					'<li> Hoe spreek ik gecompliceerde woorden uit? </ li>' .
					'<li> Hoe spreek ik nieuwe woorden uit? </ li>' .
					'<li> Hoe spreek ik woorden uit andere talen uit? </ li>' .
					'<li> Hoe spreek ik iets uit dat ik heb gelezen? </ li>' .
					'<li> Hoe spreek ik met een accent? </ li>' .
					'<li> Hoe spreek ik duidelijkheid? </ li>' .
					'<li> Hoe spreek ik met helderheid? </ li>' .
					'<li> Hoe spreek ik gecompliceerde woorden? </ li>' .
					'<li> Hoe spreek ik nieuwe talen? </ li>' .
					'<li> Hoe spreek ik nieuwe woorden? </ li>' .
					'<li> Hoe communiceer ik? </ li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com został stworzony i uruchomiony 11 czerwca 2018 roku. Od tego czasu pokazujemy użytkownikom, jak wymawiać cokolwiek i wszystko.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com jest zbudowany przy użyciu <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, systemu zarządzania treścią zaprojektowanego pod kątem władzy, szybkości i skalowalność.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Ta technologia, wykorzystująca PHP7 i MySQL5, zapewnia całą funkcjonalność tej witryny. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Sprawdź nas na GitHub! </a></p>'
			;
			
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
					
					// Content Text
			
			$mission_header_text = 'Missão';
			$examples_header_text = 'Exemplos';
			$uses_header_text = 'Usos';
			$history_header_text = 'História';
			$technology_header_text = 'Tecnologia';
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">A linguagem não é apenas a base da comunicação. É comunicação. Saber pronunciar palavras enquanto fala é tão importante quanto captar o ambiente e as sugestões de uma reunião social. Você precisa saber para pensar, cooperar, organizar e agir.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Esta é a necessidade que o PronounceThat.com tenta satisfazer. Expandir o conhecimento da alfabetização e comunicação é a nossa missão e propósito. Os assuntos escritos, mas só porque você pode dizer isso para alguém. A poesia não é boa porque rima, mas porque é algo que pode ser dito em voz alta. Sua memória é ótima quando você pode escrever algo para baixo mil vezes, mas torna-se impecável quando você também pode recitá-lo apenas com a língua. A grandeza nas idéias não é encontrada porque elas são perfeitas, mas porque são expressáveis e se prestam à situação.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">No PronounceThat.com, tentamos oferecer tudo o que você precisa para falar qualquer idioma. Aprendendo uma palavra antiga do século XVII? Não é um problema. Precisa pronunciar algo em um idioma que você não conhece, como francês ou espanhol. Te deixei coberto. Você está praticando um dialato do norte ou do sul, ou um estilo ocidental ou oriental de falar? Não se preocupe, porque nós deixamos você escolher o sotaque.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Você estava procurando por algum lugar para aprender a pronúncia? Bom, você achou.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Abaixo estão alguns exemplos de uso do site...</p>' .
				'<ul>' .
					'<li> Como fazer para pronunciar <em> bon appetit </ em>? </ li>'.
					'<li> Como fazer para votar <em> fait accompli </ em>? </ li>'.
					'<li> Como faço para pronunciar <em> bon mot </ em>? </ li>'.
					'<li> Como fazer para pronunciar <em> carta branca </ em>? </ li>'.
					'<li> Como fazer para pronunciar <em> ad nauseam </ em>? </ li>'.
					'<li> Como faço para pronunciar <em> hoi polloi </ em>? </ li>'.
					'<li> Como faço para pronunciar <em> boa viagem </ em>? </ li>'.
					'<li> Como faço para pronunciar <em> bona fide </ em>? </ li>'.
					'<li> Como faço para pronunciar <em> faux pas </ em>? </ li>'.
					'<li> Como faço para pronunciar <em> aficionado </ em>? </ li>'.
					'<li> Como faço para pronunciar <em> mea culpa </ em>? </ li>'.
					'<li> Como fazer para pronunciar <em> en masse </ em>? </ li>'.
					'<li> Como fazer para pronunciar <em> zeitgeist </ em>? </ li>'.
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Below are some sample uses of the site...</p>' .
				'<ul>' .
					'<li> How do I learn pronunciation?</li>' .
					'<li> How do I learn to pronounce words?</li>' .
					'<li> How do I learn to pronunciation?</li>' .
					'<li> How do I pronounce complicated words?</li>' .
					'<li> How do I pronounce new words?</li>' .
					'<li> How do I pronounce words from other languages?</li>' .
					'<li> How do I pronounce something I have read?</li>' .
					'<li> How do I speak with an accent?</li>' .
					'<li> How do I speak with clarity?</li>' .
					'<li> How do I speak with clearness?</li>' .
					'<li> How do I speak complicated words?</li>' .
					'<li> How do I speak new languages?</li>' .
					'<li> How do I speak new words?</li>' .
					'<li> How do I enunciate?</li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">O PronounceThat.com foi criado e lançado em 11 de junho de 2018. Desde então, temos mostrado aos usuários como pronunciar tudo e qualquer coisa.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">O PronounceThat.com foi criado com o <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, um sistema de gerenciamento de conteúdo projetado para gerar energia, velocidade e escalabilidade.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Esta tecnologia, usando PHP7 e MySQL5, fornece todas as funcionalidades deste site. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Consulte-nos no GitHub! </a></p>'
			;
			
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
					
					// Content Text
			
			$mission_header_text = 'миссия';
			$examples_header_text = 'Примеры';
			$uses_header_text = 'Пользы';
			$history_header_text = 'история';
			$technology_header_text = 'Технология';
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Язык - это не просто основа для общения. Это общение. Знание того, как произносить слова во время разговора, так же важно, как и восприятие атмосферы и сигналов социального собрания. Вы должны знать это, чтобы думать, сотрудничать, организовывать и действовать.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Это потребность, которую PronounceThat.com пытается удовлетворить. Расширение знаний о грамотности и коммуникации - наша миссия и цель. Письменные вопросы, но только потому, что вы можете сказать это кому-то. Поэзия хороша не потому, что рифмуется, а потому, что ее можно сказать вслух. Ваша память великолепна, когда вы можете записать что-то тысячу раз, но становится безупречной, когда вы можете читать это только языком Величие в идеях обнаруживается не потому, что они совершенны, а потому, что они выражаемы и поддаются ситуации.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">На PronounceThat.com мы стараемся дать вам все необходимое, чтобы говорить на любом языке. Выучить древнее слово из 17 века? Не проблема. Нужно произносить что-то на языке, которого вы не знаете, например, на французском или испанском. Получил ли ты покрыты. Вы практикуете северный или южный диалект, или западный или восточный стиль речи? Не беспокойтесь, потому что мы позволим вам выбрать акцент.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Вы искали место для изучения произношения? Ну, вы нашли это.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Ниже приведены примеры использования сайта ...</p>' .
				'<ul>' .
					'<li> Как произнести <em>bon appetit</em>?</li>' .
					'<li> Как произнести <em>fait accompli</em>?</li>' .
					'<li> Как произнести <em>bon mot</em>?</li>' .
					'<li> Как произнести <em>carte blanche</em>?</li>' .
					'<li> Как произнести <em>ad nauseam</em>?</li>' .
					'<li> Как произнести <em>hoi polloi</em>?</li>' .
					'<li> Как произнести <em>bon voyage</em>?</li>' .
					'<li> Как произнести <em>bona fide</em>?</li>' .
					'<li> Как произнести <em>faux pas</em>?</li>' .
					'<li> Как произнести <em>aficionado</em>?</li>' .
					'<li> Как произнести <em>mea culpa</em>?</li>' .
					'<li> Как произнести <em>en masse</em>?</li>' .
					'<li> Как произнести <em>zeitgeist</em>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Ниже приведены примеры использования сайта ...</p>' .
				'<ul>' .
					'<li> Как я могу выучить произношение? </ li>' .
					'<li> Как мне научиться произносить слова? </ li>' .
					'<li> Как мне научиться произношению? </ li>' .
					'<li> Как произносить сложные слова? </ li>' .
					'<li> Как произносить новые слова? </ li>' .
					'<li> Как произносить слова из других языков?</ li> ' .
					'<li> Как произнести то, что я прочитал? </ li>' .
					'<li> Как мне говорить с акцентом? </ li>' .
					'<li> Как я говорю с ясностью? </ li>' .
					'<li> Как я говорю с ясностью? </ li>' .
					'<li> Как мне говорить сложные слова? </ li>' .
					'<li> Как я говорю на новых языках? </ li> ' .
					'<li> Как мне говорить новые слова? </ li>' .
					'<li> Как мне изложить? </ li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com был создан и запущен 11 июня 2018 года. С тех пор мы показываем пользователям, как произносить все и вся.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com создан с использованием <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, системы управления контентом, разработанной для обеспечения мощности, скорости и масштабируемость.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Эта технология, использующая PHP7 и MySQL5, обеспечивает все функциональные возможности этого веб-сайта. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Проверьте нас на GitHub! </a></p>'
			;
			
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
					
					// Content Text
			
			$mission_header_text = 'Misyon';
			$examples_header_text = 'Örnekler';
			$uses_header_text = 'Kullanımları';
			$history_header_text = 'Tarihçe';
			$technology_header_text = 'Teknoloji';
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Dil sadece iletişimin temeli değildir. Bu iletişimdir. Konuşma sırasında kelimelerin nasıl telaffuz edildiğini bilmek, bir sosyal toplamanın ortamını ve ipuçlarını toplamak kadar önemlidir. Düşünmeyi, işbirliği yapmayı, düzenlemeyi ve hareket etmeyi bilmeniz gerekir.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Bu, PronounceThat.com\'un tatmin etmeye çalıştığı ihtiyaç. Okuryazarlık ve iletişim bilgisini genişletmek bizim görevimiz ve amacımızdır. Yazılanlar önemlidir, ancak yalnızca birisine söyleyebildiğiniz için. Şiir, kafiyeli olduğu için değil, dışlanan söylenebilecek bir şey olduğu için iyidir. Binlerce kez bir şey yazabildiğiniz zaman hafızanız harikadır, ancak sadece dil ile de okuyabildiğiniz zaman kusursuz olur. Fikirlerde büyüklük, mükemmel oldukları için bulunmaz, ancak açık oldukları ve kendilerini duruma borçlu oldukları için bulunur.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">PronounceThat.com\'da size herhangi bir dilde konuşmanız için gereken her şeyi vermeye çalışıyoruz. 17. yüzyıldan kalma eski bir kelimeyi mi öğreniyorsunuz? Problem değil. Fransızca ya da İspanyolca gibi, bilmediğiniz bir dilde bir şeyler telaffuz etmeniz gerekiyor. Üstünü örttün. Bir kuzey veya güney diyalaktı mı yoksa bir batı veya doğu tarzı konuşma mı yapıyorsunuz? Endişeye gerek yok, çünkü aksanı seçmenize izin veriyoruz.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Telaffuz öğrenmek için bir yer mi arıyordun? Onu buldun.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Aşağıda sitenin bazı örnek kullanımları bulunmaktadır ...</p>' .
				'<ul>' .
					'<li> <em>bon appetit</em> nasıl telaffuz edilir?</li>' .
					'<li> <em>fait accompli</em> nasıl telaffuz edilir?</li>' .
					'<li> <em>bon mot</em> nasıl telaffuz edilir?</li>' .
					'<li> <em>carte blanche</em> nasıl telaffuz edilir?</li>' .
					'<li> <em>ad nauseam</em> nasıl telaffuz edilir?</li>' .
					'<li> <em>hoi polloi</em> nasıl telaffuz edilir?</li>' .
					'<li> <em>bon voyage</em> nasıl telaffuz edilir?</li>' .
					'<li> <em>bona fide</em> nasıl telaffuz edilir?</li>' .
					'<li> <em>faux pas</em> nasıl telaffuz edilir?</li>' .
					'<li> <em>aficionado</em> nasıl telaffuz edilir?</li>' .
					'<li> <em>mea culpa</em> nasıl telaffuz edilir?</li>' .
					'<li> <em>en masse</em> nasıl telaffuz edilir?</li>' .
					'<li> <em>zeitgeist</em> nasıl telaffuz edilir?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Aşağıda sitenin bazı örnek kullanımları bulunmaktadır...</p>' .
				'<ul>' .
					'<li> Telaffuzu nasıl öğrenirim? </li>' .
					'<li> Kelimeleri telaffuz etmeyi nasıl öğrenirim? </li>' .
					'<li> Telaffuzu nasıl öğrenirim? </li>' .
					'<li> Karmaşık kelimeleri nasıl telaffuz ederim? </li>' .
					'<li> Yeni kelimeleri nasıl telaffuz ederim? </li>' .
					'<li> Başka dillerden gelen kelimeleri nasıl telaffuz ederim? </li>' .
					'<li> Okuduğum bir şeyi nasıl telaffuz ederim? </li>' .
					'<li> Bir aksan ile nasıl konuşabilirim? </li>' .
					'<li> Açıklıkla nasıl konuşabilirim? </li>' .
					'<li> Açıkça nasıl konuşabilirim? </li>' .
					'<li> Karmaşık kelimeleri nasıl konuşurum? </li>' .
					'<li> Yeni dilleri nasıl konuşurum? </li>' .
					'<li> Yeni kelimeleri nasıl konuşurum? </li>' .
					'<li> Nasıl duyururum? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com 11 Haziran 2018\'de kuruldu ve piyasaya sürüldü. O zamandan beri, kullanıcılara her şeyi ve her şeyi nasıl telaffuz edeceklerini gösteriyoruz.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com, güç, hız ve içerik için tasarlanmış bir içerik yönetim sistemi olan <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a> kullanılarak oluşturulmuştur. ölçeklenebilirlik.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">PHP7 ve MySQL5 kullanan bu teknoloji, bu web sitesinin tüm işlevselliğini sağlar. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> GitHub\'da bize göz atın! </a></p>'
			;
			
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
					
					// Content Text
			
			$mission_header_text = '任务';
			$examples_header_text = '例子';
			$uses_header_text = '用途';
			$history_header_text = '历史';
			$technology_header_text = '技术';
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">语言不仅仅是沟通的基础。 这是沟通。 知道如何在说话时发音，与获取社交聚会的氛围和线索一样重要。 你需要知道它，思考，合作，组织和行动。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">这是PronounceThat.com试图满足的需要。 扩大扫盲和沟通知识是我们的使命和宗旨。 书面问题，但只是因为你可以对某人说。 诗歌是好的，不是因为它押韵，而是因为它是可以说出来的东西。 当你可以写下一千次的东西时，你的记忆力很棒，但是当你只能用舌头背诵时，你的记忆力会变得无可挑剔。 没有发现创意的伟大，因为它们是完美的，但因为它们是可表达的并且适合于这种情况。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">在PronounceThat.com，我们会尽力为您提供说任何语言所需的一切。 学习17世纪的古老词汇？ 不是问题。 需要用您不懂的语言（如法语或西班牙语）发音。 你知道吗 你是练习北方或南方的dialact，还是西方或东方的说话方式？ 不用担心，因为我们让你挑选口音。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">你在找一些学习发音的地方吗？ 好吧，你找到了。</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">以下是该网站的一些示例用法......</p>' .
				'<ul>' .
					'<li> 我怎么发音 <em>bon appetit</em>?</li>' .
					'<li> 我怎么发音 <em>fait accompli</em>?</li>' .
					'<li> 我怎么发音 <em>bon mot</em>?</li>' .
					'<li> 我怎么发音 <em>carte blanche</em>?</li>' .
					'<li> 我怎么发音 <em>ad nauseam</em>?</li>' .
					'<li> 我怎么发音 <em>hoi polloi</em>?</li>' .
					'<li> 我怎么发音 <em>bon voyage</em>?</li>' .
					'<li> 我怎么发音 <em>bona fide</em>?</li>' .
					'<li> 我怎么发音 <em>faux pas</em>?</li>' .
					'<li> 我怎么发音 <em>aficionado</em>?</li>' .
					'<li> 我怎么发音 <em>mea culpa</em>?</li>' .
					'<li> 我怎么发音 <em>en masse</em>?</li>' .
					'<li> 我怎么发音 <em>zeitgeist</em>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">以下是该网站的一些示例用途......</p>' .
				'<ul>' .
					'<li>我如何学习发音？</ li>' .
					'<li>我如何学习发音？</ li>' . 
					'<li>我如何学习发音？</ li>' .
					'<li>我如何发音复杂的单词？</ li>' .
					'<li>我如何发音新单词？</ li>' .
					'<li>如何从其他语言中发音？</ li>' .
					'<li>我如何发表我读过的内容？</ li>' .
					'<li>我如何用口音说话？</ li>' .
					'<li>我如何清晰地说话？</ li>' .
					'<li>我如何清楚地说话？</ li>' .
					'<li>我怎么说复杂的词？</ li>' .
					'<li>我怎么说新语言？</ li>' .
					'<li>我怎么说新词？</ li>' .
					'<li>我如何发声？</ li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com于2018年6月11日创建并推出。从那时起，我们一直向用户展示如何发音。</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">PronounceThat.com使用<a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>构建，这是一个专为功率，速度和设计而设计的内容管理系统。可扩展性。</p>' .
				
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>PronounceThat ' . $mission_header_text . ' :</em></h3></center>');
	
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>PronounceThat ' . $examples_header_text . ' :</em></h3></center>');
	
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>PronounceThat ' . $uses_header_text . ' :</em></h3></center>');
	
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>PronounceThat ' . $history_header_text . ' :</em></h3></center>');
	
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>PronounceThat ' . $technology_header_text . ' :</em></h3></center>');
	
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