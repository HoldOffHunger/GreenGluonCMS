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
					// List Keywords : Finding and Listing Your Keywords For You
			$this->header_title_text = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					
					// I generated some keywords today!
			$quote_text = $this->master_record['quote'][0]['Quote'];
				
					// Use this web app to list keywords and keyphrases.  You may remove html, ignore common words, and sort generated lists of keywords.
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
				'<p class="margin-0px text-indent-50px">Being able to summarize, organize, and categorize information is as important as understanding it.  If you cannot sort and analyze what you learn, then you will need to relearn the same thing endlessly.  By providing some sort of synthesis and completeness, your thinking becomes clarified.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">If you can distill and reduce a document to just the keywords it uses, then you have a concise and sortable understanding of that document.  What are keywords?  They are words that appear with a higher frequency than other words.  We use a few refining techniques, such as excluding common words (such as "the" or "as"), or stripping out HTML.  We also offer formatting options, such as listing the number of times a word appears next to the words, or just giving a clean list without numbers.  If information is infinite, then being able to condense it is being infinitely powerful.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">At ListKeywords.com, we provide the code and the technique: what you input is a simple document of any type, and what you get in return is the keywords, filtered how you need, or displayed as required.  That\'s it.  It\'s just keywords generation with no limits.  Needed keywords for SEO on your webpage?  Make them here.  Trying to make labels and tags to link your blogposts together?  Find the most commonly recurring phrases and words you use here.  Wanted to analyze Tolstoy\'s literature for the most common themes?  We do that, too.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Were you looking for some place to build keyword lists from documents and text?  Well, you have found it.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Below are some example uses of the site...</p>' .
				'<ul>' .
					'<li> How do I summarize <em>content</em>?</li>' .
					'<li> How do I condense <em>content</em>?</li>' .
					'<li> How do I get keywords for <em>content</em>?</li>' .
					'<li> How do generate keywords for <em>content</em>?</li>' .
					'<li> How do handle SEO for <em>content</em>?</li>' .
					'<li> How do support Search Engine Optimization for <em>text</em>?</li>' .
					'<li> How do I most common words in my <em>text</em>?</li>' .
					'<li> How do I list most-used words in my <em>text</em>?</li>' .
					'<li> How do generate a list of words by frequency in my <em>text</em>?</li>' .
					'<li> How do generate most-common words in my <em>text</em>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Below are some sample uses of the site...</p>' .
				'<ul>' .
					'<li> How do I summarize a <em>document</em>?</li>' .
					'<li> How do I summarize a <em>chapter</em>?</li>' .
					'<li> How do I summarize a <em>blogpost</em>?</li>' .
					'<li> How do I summarize a <em>poem</em>?</li>' .
					'<li> How do I summarize a <em>essay</em>?</li>' .
					'<li> How do I summarize a <em>research</em>?</li>' .
					'<li> How do I summarize a <em>memo</em>?</li>' .
					'<li> How do I condense a <em>document</em>?</li>' .
					'<li> How do I condense a <em>chapter</em>?</li>' .
					'<li> How do I condense a <em>blogpost</em>?</li>' .
					'<li> How do I condense a <em>poem</em>?</li>' .
					'<li> How do I condense a <em>essay</em>?</li>' .
					'<li> How do I condense a <em>research</em>?</li>' .
					'<li> How do I condense a <em>memo</em>?</li>' .
					'<li> How do I get keywords for a <em>document</em>?</li>' .
					'<li> How do I get keywords for a <em>chapter</em>?</li>' .
					'<li> How do I get keywords for a <em>blogpost</em>?</li>' .
					'<li> How do I get keywords for a <em>poem</em>?</li>' .
					'<li> How do I get keywords for a <em>essay</em>?</li>' .
					'<li> How do I get keywords for a <em>research</em>?</li>' .
					'<li> How do I get keywords for a <em>memo</em>?</li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com was created and launched on January 9, 2017.  Since then, we have been showing users how to list keywords for anything and everything.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com is built using the <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank">Green Gluon CMS</a>, a content-management system designed for power, speed, and scalability.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">This technology, using PHP7 and MySQL5, provides all of the functionality of this website.  <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank">Check us out on GitHub!</a></p>'
			;
			
			break;
			
		case 'de':
					// List Keywords : Finding and Listing Your Keywords For You
			$this->header_title_text = 'ListKeywords : Suchen und Auflisten Ihrer Schlüsselwörter für Sie';
					
					// I generated some keywords today!
			$quote_text = 'Ich habe heute einige Keywords generiert!';
				
					// Use this web app to list keywords and keyphrases.  You may remove html, ignore common words, and sort generated lists of keywords.
			$div_mouseover = 'Verwenden Sie diese Web-App, um Schlüsselwörter und Schlüsselwörter aufzulisten. Sie können html entfernen, gebräuchliche Wörter ignorieren und generierte Stichwortlisten sortieren.';
			
			$this->share_text = 'Teilen';
			$this->share_with_text = 'Teilen mit';
			$this->language_text = 'Sprache';
			$about_header_title_text = 'Weitere Informationen über uns';
					
					// Content Text
			
			$mission_header_text = 'Mission';
			$examples_header_text = 'Beispiele';
			$uses_header_text = 'Verwendet';
			$history_header_text = 'Geschichte';
			$technology_header_text = 'Technik';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Informationen zusammenfassen, organisieren und kategorisieren zu können, ist ebenso wichtig wie das Verstehen von Informationen. Wenn Sie das Gelernte nicht sortieren und analysieren können, müssen Sie dasselbe immer wieder neu lernen. Durch eine Art Synthese und Vollständigkeit wird Ihr Denken klarer.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Wenn Sie ein Dokument auf die verwendeten Schlüsselwörter beschränken und reduzieren können, haben Sie ein präzises und sortierbares Verständnis dieses Dokuments. Was sind Keywords? Es sind Wörter, die häufiger erscheinen als andere Wörter. Wir verwenden einige Verfeinerungstechniken, z. B. das Ausschließen gebräuchlicher Wörter (wie "das" oder "als") oder das Entfernen von HTML. Wir bieten auch Formatierungsoptionen an, z. B. die Auflistung der Häufigkeit, mit der ein Wort neben den Wörtern angezeigt wird, oder einfach eine reine Liste ohne Zahlen. Wenn Informationen unendlich sind, dann ist die Fähigkeit, zu verdichten, unendlich mächtig.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Bei ListKeywords.com stellen wir den Code und die Technik bereit: Das, was Sie eingeben, ist ein einfaches Dokument jeglicher Art, und das, was Sie dafür erhalten, sind die Schlüsselwörter, die nach Bedarf gefiltert oder angezeigt werden. Das ist es. Es ist nur die Erzeugung von Schlüsselwörtern ohne Grenzen. Benötigte Keywords für SEO auf Ihrer Webseite? Machen Sie sie hier. Sie möchten Etiketten und Tags erstellen, um Ihre Blogposts miteinander zu verknüpfen? Hier finden Sie die am häufigsten wiederkehrenden Phrasen und Wörter, die Sie verwenden. Wollten Sie Tolstois Literatur nach den häufigsten Themen analysieren? Das machen wir auch.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Haben Sie nach einem Ort gesucht, um Keyword-Listen aus Dokumenten und Text zu erstellen? Nun, du hast es gefunden.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Nachfolgend finden Sie einige Anwendungsbeispiele der Website ...</p>' .
				'<ul>' .
					'<li> Wie fasse ich <em> Inhalt </em> zusammen? </li>' .
					'<li> Wie kann ich den <em> Inhalt </em> verdichten? </li>' .
					'<li> Wie erhalte ich Schlüsselwörter für den <em> Inhalt </em>? </li>' .
					'<li> Wie generiere ich Schlüsselwörter für <em> Inhalt </em>? </li>' .
					'<li> Wie gehen Sie mit SEO für <em> Inhalte </em> um? </li>' .
					'<li> Wie wird die Suchmaschinenoptimierung für <em> Text </em> unterstützt? </li>' .
					'<li> Wie kann ich die häufigsten Wörter in meinem <em> Text </em>? </li>' .
					'<li> Wie liste ich die am häufigsten verwendeten Wörter in meinem <em> Text </em> auf? </li>' .
					'<li> Wie generiere ich eine Liste von Wörtern nach Häufigkeit in meinem <em> Text </em>? </li>' .
					'<li> Wie generiere ich die häufigsten Wörter in meinem <em> Text </em>? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Nachfolgend finden Sie einige Anwendungsbeispiele der Website ...</p>' .
				'<ul>' .
					'<li> Wie fasse ich ein <em> Dokument </em> zusammen? </li>' .
					'<li> Wie fasse ich ein <em> Kapitel </em> zusammen? </li>' .
					'<li> Wie fasse ich einen <em> Blogpost </em> zusammen? </li>' .
					'<li> Wie fasse ich ein <em> Gedicht </em> zusammen? </li>' .
					'<li> Wie fasse ich einen <em> Essay </em> zusammen? </li>' .
					'<li> Wie fasse ich eine <em> Forschung </em> zusammen? </li>' .
					'<li> Wie fasse ich ein <em> Memo </em> zusammen? </li>' .
					'<li> Wie kann ich ein <em> Dokument </em> verdichten? </li>' .
					'<li> Wie kondensiere ich ein <em> Kapitel </em>? </li>' .
					'<li> Wie kondensiere ich einen <em> Blogpost </em>? </li>' .
					'<li> Wie verdichte ich ein <em> Gedicht </em>? </li>' .
					'<li> Wie kondensiere ich einen <em> Essay </em>? </li>' .
					'<li> Wie verdichte ich eine <em> Forschung </em>? </li>' .
					'<li> Wie kann ich ein <em> Memo </em> zusammenfassen? </li>' .
					'<li> Wie erhalte ich Schlüsselwörter für ein <em> Dokument </em>? </li>' .
					'<li> Wie erhalte ich Schlüsselwörter für ein <em> Kapitel </em>? </li>' .
					'<li> Wie bekomme ich Keywords für einen <em> Blogpost </em>? </li>' .
					'<li> Wie erhalte ich Schlüsselwörter für ein <em> Gedicht </em>? </li>' .
					'<li> Wie erhalte ich Schlüsselwörter für einen <em> Essay </em>? </li>' .
					'<li> Wie erhalte ich Keywords für eine <em> Recherche </em>? </li>' .
					'<li> Wie erhalte ich Schlüsselwörter für ein <em> Memo </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com wurde am 9. Januar 2017 erstellt und gestartet. Seitdem zeigen wir Benutzern, wie Schlüsselwörter für alles und jedes aufgelistet werden.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com basiert auf dem <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, einem Content-Management-System, das auf Leistung, Geschwindigkeit und Leistung ausgelegt ist Skalierbarkeit.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Diese Technologie verwendet PHP7 und MySQL5 und bietet alle Funktionen dieser Website. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Besuchen Sie uns auf GitHub!</p>'
			;
	
			break;
			
		case 'es':
					// List Keywords : Finding and Listing Your Keywords For You
			$this->header_title_text = 'ListKeywords : Encontrar y enumerar sus palabras clave para usted';
					
					// I generated some keywords today!
			$quote_text = '¡Generé algunas palabras claves hoy!';
				
					// Use this web app to list keywords and keyphrases.  You may remove html, ignore common words, and sort generated lists of keywords.
			$div_mouseover = 'Utilice esta aplicación web para enumerar palabras clave y frases clave. Puede eliminar html, ignorar palabras comunes y ordenar listas generadas de palabras clave.';
			
			$this->share_text = 'Compartir';
			$this->share_with_text = 'Compartir con';
			$this->language_text = 'Idioma';
			$about_header_title_text = 'Más información sobre nosotros';
					
					// Content Text
			
			$mission_header_text = 'Misión';
			$examples_header_text = 'Ejemplos';
			$uses_header_text = 'Usos';
			$history_header_text = 'Historia';
			$technology_header_text = 'Tecnología';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Ser capaz de resumir, organizar y categorizar la información es tan importante como comprenderla. Si no puede ordenar y analizar lo que aprende, entonces deberá volver a aprender lo mismo sin cesar. Al proporcionar algún tipo de síntesis e integridad, su pensamiento se aclara.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Si puede destilar y reducir un documento solo a las palabras clave que utiliza, entonces tiene un entendimiento conciso y ordenable de ese documento. ¿Qué son las palabras clave? Son palabras que aparecen con mayor frecuencia que otras palabras. Usamos algunas técnicas de refinamiento, como excluir palabras comunes (como "the" o "as"), o eliminar HTML. También ofrecemos opciones de formato, como enumerar el número de veces que aparece una palabra al lado de las palabras, o simplemente dar una lista limpia sin números. Si la información es infinita, entonces ser capaz de condensarla es infinitamente poderoso.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">En ListKeywords.com, proporcionamos el código y la técnica: lo que ingresa es un documento simple de cualquier tipo, y lo que obtiene a cambio son las palabras clave, se filtran según lo que necesita o se muestran según sea necesario. Eso es. Es solo generación de palabras clave sin límites. ¿Necesitas palabras clave para SEO en tu página web? Hazlos aquí. ¿Tratando de hacer etiquetas y etiquetas para vincular sus postes de blog? Encuentra las frases y las palabras más recurrentes que usas aquí. ¿Quería analizar la literatura de Tolstoi para los temas más comunes? Nosotros también hacemos eso.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">¿Estaba buscando un lugar para crear listas de palabras clave a partir de documentos y texto? Bueno, lo has encontrado.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">A continuación se muestran algunos ejemplos de usos del sitio ...</p>' .
				'<ul>' .
					'<li> ¿Cómo resumo <em> contenido </em>? </li>' .
					'<li> ¿Cómo puedo condensar <em> contenido </em>? </li>' .
					'<li> ¿Cómo obtengo palabras clave para <em> contenido </em>? </li>' .
					'<li> ¿Cómo generar palabras clave para <em> contenido </em>? </li>' .
					'<li> ¿Cómo manejar el SEO para <em> contenido </em>? </li>' .
					'<li> ¿Cómo se admite la optimización del motor de búsqueda para <em> texto </em>? </li>' .
					'<li> ¿Cómo hago la mayoría de las palabras comunes en mi <em> texto </em>? </li>' .
					'<li> ¿Cómo enumero las palabras más utilizadas en mi <em> texto </em>? </li>' .
					'<li> ¿Cómo generar una lista de palabras por frecuencia en mi <em> texto </em>? </li>' .
					'<li> ¿Cómo generar las palabras más comunes en mi <em> texto </em>? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">A continuación se muestran algunos usos de ejemplo del sitio ...</p>' .
				'<ul>' .
					'<li> ¿Cómo resumo un <em> documento </em>? </li>' .
					'<li> ¿Cómo resumo un <em> capítulo </em>? </li>' .
					'<li> ¿Cómo resumo un <em> blogpost </em>? </li>' .
					'<li> ¿Cómo resumo un <em> poema </em>? </li>' .
					'<li> ¿Cómo resumo un <em> ensayo </em>? </li>' .
					'<li> ¿Cómo resumo una <em> investigación </em>? </li>' .
					'<li> ¿Cómo resumo un <em> memo </em>? </li>' .
					'<li> ¿Cómo puedo condensar un <em> documento </em>? </li>' .
					'<li> ¿Cómo puedo condensar un <em> capítulo </em>? </li>' .
					'<li> ¿Cómo puedo condensar un <em> blogpost </em>? </li>' .
					'<li> ¿Cómo puedo condensar un <em> poema </em>? </li>' .
					'<li> ¿Cómo puedo condensar un <em> ensayo </em>? </li>' .
					'<li> ¿Cómo puedo condensar una <em> investigación </em>? </li>' .
					'<li> ¿Cómo puedo condensar un <em> memo </em>? </li>' .
					'<li> ¿Cómo obtengo palabras clave para un <em> documento </em>? </li>' .
					'<li> ¿Cómo obtengo palabras clave para un <em> capítulo </em>? </li>' .
					'<li> ¿Cómo obtengo palabras clave para un <em> blogpost </em>? </li>' .
					'<li> ¿Cómo obtengo palabras clave para un <em> poema </em>? </li>' .
					'<li> ¿Cómo obtengo palabras clave para un <em> ensayo </em>? </li>' .
					'<li> ¿Cómo obtengo palabras clave para una <em> investigación </em>? </li>' .
					'<li> ¿Cómo obtengo palabras clave para un <em> memo </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com fue creado y lanzado el 9 de enero de 2017. Desde entonces, hemos estado mostrando a los usuarios cómo hacer una lista de palabras clave para cualquier cosa y todo.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com se crea utilizando el <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, un sistema de administración de contenido diseñado para potencia, velocidad y escalabilidad.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Esta tecnología, que utiliza PHP7 y MySQL5, proporciona toda la funcionalidad de este sitio web. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> ¡Visítenos en GitHub! </a></p>'
			;
			
			break;
			
		case 'fr':
					// List Keywords : Finding and Listing Your Keywords For You
			$this->header_title_text = 'ListKeywords : Trouver et répertorier vos mots-clés pour vous';
					
					// I generated some keywords today!
			$quote_text = 'J\'ai généré des mots-clés aujourd\'hui!';
				
					// Use this web app to list keywords and keyphrases.  You may remove html, ignore common words, and sort generated lists of keywords.
			$div_mouseover = 'Utilisez cette application Web pour répertorier les mots-clés et les phrases clés. Vous pouvez supprimer le langage HTML, ignorer les mots courants et trier les listes de mots-clés générées.';
			
			$this->share_text = 'Partager';
			$this->share_with_text = 'Partager avec';
			$this->language_text = 'La langue';
			$about_header_title_text = 'Plus d\'informations sur nous';
					
					// Content Text
			
			$mission_header_text = 'Mission';
			$examples_header_text = 'Exemples';
			$uses_header_text = 'Les usages';
			$history_header_text = 'L\'histoire';
			$technology_header_text = 'Technologie';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Pouvoir résumer, organiser et classer les informations est aussi important que de les comprendre. Si vous ne pouvez pas trier et analyser ce que vous apprenez, vous devrez réapprendre sans cesse la même chose. En fournissant une sorte de synthèse et de complétude, votre pensée devient clarifiée.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Si vous pouvez distiller et réduire un document uniquement aux mots-clés qu\'il utilise, vous avez une compréhension concise et triable de ce document. Quels sont les mots-clés? Ce sont des mots qui apparaissent avec une fréquence plus élevée que les autres mots. Nous utilisons quelques techniques de raffinage, telles que l’exclusion de mots courants (tels que "le" ou "en tant que") ou la suppression de HTML. Nous proposons également des options de formatage, telles que l’énumération du nombre de fois où un mot apparaît à côté des mots ou simplement la liste blanche sans chiffres. Si l\'information est infinie, alors être capable de la condenser est infiniment puissante.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Chez ListKeywords.com, nous fournissons le code et la technique: vous saisissez un document simple, quel que soit son type, et vous obtenez en retour les mots-clés, filtrés comme vous le souhaitez ou affichés à la demande. C\'est tout. C\'est juste la génération de mots-clés sans limites. Besoin de mots-clés pour le référencement sur votre page Web? Faites-les ici. Vous essayez de créer des étiquettes et des étiquettes pour lier vos articles de blog? Trouvez les phrases et les mots les plus récurrents que vous utilisez ici. Voulu analyser la littérature de Tolstoï pour les thèmes les plus communs? Nous faisons cela aussi.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Cherchez-vous un endroit pour créer des listes de mots-clés à partir de documents et de texte? Eh bien, vous l\'avez trouvé.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Ci-dessous quelques exemples d\'utilisations du site ...</p>' .
				'<ul>' .
					'<li> Comment résumer le <em> contenu </em>? </li>' .
					'<li> Comment condenser le <em> contenu </em>? </li>' .
					'<li> Comment puis-je obtenir des mots clés pour le <em> contenu </em>? </li>' .
					'<li> Comment générer des mots clés pour le <em> contenu </em>? </li>' .
					'<li> Comment gérer le référencement pour le <em> contenu </em>? </li>' .
					'<li> Comment l\'assistance pour l\'optimisation du moteur de recherche pour le <em> texte </em>? </li>' .
					'<li> Comment puis-je utiliser les mots les plus courants dans mon <em> texte </em>? </li>' .
					'<li> Comment répertorier les mots les plus utilisés dans mon <em> texte </em>? </li>' .
					'<li> Comment générer une liste de mots par fréquence dans mon <em> texte </em>? </li>' .
					'<li> Comment générer les mots les plus communs dans mon <em> texte </em>? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Ci-dessous quelques exemples d\'utilisations du site ...</p>' .
				'<ul>' .
					'<li> Comment résumer un <em> document </em>? </li>' .
					'<li> Comment résumer un <em> chapitre </em>? </li>' .
					'<li> Comment résumer un <em> article de blog </em>? </li>' .
					'<li> Comment résumer un <em> poème </em>? </li>' .
					'<li> Comment résumer un <em> essai </em>? </li>' .
					'<li> Comment résumer une <em> recherche </em>? </li>' .
					'<li> Comment résumer un <em> mémo </em>? </li>' .
					'<li> Comment condenser un <em> document </em>? </li>' .
					'<li> Comment condenser un <em> chapitre </em>? </li>' .
					'<li> Comment condenser un <em> article de blog </em>? </li>' .
					'<li> Comment condenser un <em> poème </em>? </li>' .
					'<li> Comment condenser un <em> essai </em>? </li>' .
					'<li> Comment condenser une <em> recherche </em>? </li>' .
					'<li> Comment condenser un <em> mémo </em>? </li>' .
					'<li> Comment puis-je obtenir des mots clés pour un <em> document </em>? </li>' .
					'<li> Comment puis-je obtenir des mots clés pour un <em> chapitre </em>? </li>' .
					'<li> Comment puis-je obtenir des mots clés pour un <em> article de blog </em>? </li>' .
					'<li> Comment puis-je obtenir les mots clés d\'un <em> poème </em>? </li>' .
					'<li> Comment puis-je obtenir des mots clés pour un <em> essai </em>? </li>' .
					'<li> Comment puis-je obtenir des mots clés pour une <em> recherche </em>? </li>' .
					'<li> Comment puis-je obtenir des mots clés pour un <em> mémo </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com a été créé et lancé le 9er janvier 2017. Depuis lors, nous avons montré aux utilisateurs comment répertorier les mots-clés pour tout et n\'importe quoi.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com est construit à l’aide du <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> CMS Green Gluon </a>, un système de gestion de contenu conçu pour la puissance, la rapidité et la l\'évolutivité.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Cette technologie, utilisant PHP7 et MySQL5, fournit toutes les fonctionnalités de ce site Web. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Consultez-nous sur GitHub! </a></p>'
			;
			
			break;
			
		case 'ja':
					// List Keywords : Finding and Listing Your Keywords For You
			$this->header_title_text = 'ListKeywords : あなたのキーワードを見つけてリストする';
					
					// I generated some keywords today!
			$quote_text = '今日はキーワードをいくつか生成しました。';
				
					// Use this web app to list keywords and keyphrases.  You may remove html, ignore common words, and sort generated lists of keywords.
			$div_mouseover = 'このWebアプリを使用して、キーワードとキーフレーズを一覧表示します。 htmlを削除し、一般的な単語を無視し、そして生成されたキーワードのリストをソートすることができます。';
			
			$this->share_text = '分け合う';
			$this->share_with_text = 'と共有する';
			$this->language_text = '言語';
			$about_header_title_text = '私たちについてのより詳しい情報';
					
					// Content Text
			
			$mission_header_text = 'ミッション';
			$examples_header_text = '例';
			$uses_header_text = '用途';
			$history_header_text = '歴史';
			$technology_header_text = 'テック';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">情報を要約、整理、および分類できることは、情報を理解することと同じくらい重要です。 あなたがあなたが学んだことを分類して分析することができないならば、あなたは無限に同じことを再学習する必要があるでしょう。 ある種の総合と完全性を提供することによって、あなたの考えは明確になります。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">文書を蒸留して、それが使用しているキーワードだけに絞り込むことができれば、その文書について簡潔で分類可能な理解が得られます。 キーワードとは 彼らは他の単語よりも高い頻度で表示される単語です。 一般的な単語（ "the"や "as"など）を除外したり、HTMLを削除したりするなど、いくつかの洗練された手法を使用します。 また、単語の隣に単語が表示される回数を一覧表示する、または番号のないきれいな一覧を表示するなど、書式設定オプションも提供します。 情報が無限であるならば、それを凝縮することができるということは無限に強力です。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">ListKeywords.comでは、コードとテクニックを提供しています：あなたが入力するものはあらゆるタイプの単純な文書です、そしてあなたが返すものはキーワード、必要に応じてフィルタをかける、または必要に応じて表示される それでおしまい。 それは単なるキーワード生成であり、制限はありません。 あなたのWebページでSEOに必要なキーワードは？ ここに作りなさい。 ブログポストをリンクするためのラベルとタグを作成しようとしていますか？ あなたがここで使う最も一般的なフレーズと単語を見つけてください。 最も一般的なテーマのためにTolstoyの文学を分析したいですか？ 私たちもそうします。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">文書やテキストからキーワードリストを作成する場所を探していましたか？ まあ、あなたはそれを見つけました。</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">下記はサイトの使用例です。</p>' .
				'<ul>' .
					'<li> コンテンツを要約する方法</li>' .
					'<li> コンテンツを要約するにはどうすればいいですか。</li>' .
					'<li> コンテンツのキーワードを取得する方法</li>' .
					'<li> コンテンツのキーワードを生成する方法</li>' .
					'<li> コンテンツのSEOをどのように処理しますか？</li>' .
					'<li> テキスト検索エンジン最適化のサポート方法</li>' .
					'<li> テキストの中で最も一般的な単語はどのようにしますか。</li>' .
					'<li> テキストで最も使用されている単語をどのように記載しますか？</li>' .
					'<li> テキスト内の頻度で単語のリストを生成する方法</li>' .
					'<li> テキスト内で最も一般的な単語を生成する方法</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">下記はサイトの使用例です。</p>' .
				'<ul>' .
					'<li> 文書を要約する方法</li>' .
					'<li> 章をまとめるにはどうすればいいですか。</li>' .
					'<li> ブログ記事を要約するにはどうすればよいですか。</li>' .
					'<li> 詩をまとめるにはどうすればいいですか。</li>' .
					'<li> エッセイをまとめるにはどうすればいいですか。</li>' .
					'<li> 研究をまとめるにはどうすればいいですか。</li>' .
					'<li> メモを要約するにはどうすればいいですか。</li>' .
					'<li> 文書を要約するにはどうすればいいですか。</li>' .
					'<li> 章をまとめるにはどうすればいいですか。</li>' .
					'<li> ブログ記事を要約するにはどうすればよいですか。</li>' .
					'<li> どうやって詩をまとめるのですか？</li>' .
					'<li> エッセイをまとめるにはどうすればいいですか。</li>' .
					'<li> 研究をまとめるにはどうすればいいですか。</li>' .
					'<li> メモを要約するにはどうすればいいですか。</li>' .
					'<li> 文書のキーワードを取得する方法</li>' .
					'<li> 章のキーワードを取得する方法</li>' .
					'<li> ブログ記事のキーワードを取得する方法</li>' .
					'<li> 詩のキーワードを取得する方法</li>' .
					'<li> 小論文のキーワードを取得するにはどうすればよいですか。</li>' .
					'<li> 研究用のキーワードを取得する方法</li>' .
					'<li> メモのキーワードを取得する方法</li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.comは、2017年1月9日に作成され、発売されました。それ以来、私たちはユーザーにあらゆるキーワードを一覧表示する方法を示してきました。</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.comは<a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>を使用して構築されています。 スケーラビリティ</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">PHP 7とMySQL 5を使用するこのテクノロジは、このWebサイトのすべての機能を提供します。 <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> GitHubをご覧ください。</a></p>'
			;
			
			break;
			
		case 'it':
					// List Keywords : Finding and Listing Your Keywords For You
			$this->header_title_text = 'ListKeywords : Trovare e elencare le tue parole chiave per te';
					
					// I generated some keywords today!
			$quote_text = 'Ho generato alcune parole chiave oggi!';
				
					// Use this web app to list keywords and keyphrases.  You may remove html, ignore common words, and sort generated lists of keywords.
			$div_mouseover = 'Utilizzare questa app Web per elencare parole chiave e frasi chiave. Puoi rimuovere html, ignorare le parole comuni e ordinare gli elenchi generati di parole chiave.';
			
			$this->share_text = 'Condividi';
			$this->share_with_text = 'Condividi con';
			$this->language_text = 'Linguaggio';
			$about_header_title_text = 'Ulteriori informazioni su di noi';
					
					// Content Text
			
			$mission_header_text = 'Missione';
			$examples_header_text = 'Esempi';
			$uses_header_text = 'Usi';
			$history_header_text = 'Storia';
			$technology_header_text = 'Tecnologia';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Essere in grado di riassumere, organizzare e categorizzare le informazioni è importante quanto comprenderle. Se non è possibile ordinare e analizzare ciò che si impara, sarà necessario reimparare la stessa cosa all\'infinito. Fornendo una sorta di sintesi e completezza, il tuo pensiero si chiarisce.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Se riesci a distillare e ridurre un documento solo alle parole chiave che usa, allora hai una comprensione concisa e ordinabile di quel documento. Quali sono le parole chiave? Sono parole che appaiono con una frequenza più alta rispetto ad altre parole. Usiamo alcune tecniche di raffinazione, ad esempio escludendo parole comuni (come "il" o "come"), o estrapolando HTML. Offriamo anche opzioni di formattazione, come elencare il numero di volte in cui una parola appare accanto alle parole o semplicemente dare una lista pulita senza numeri. Se l\'informazione è infinita, essere in grado di condensare è infinitamente potente.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">A ListKeywords.com, forniamo il codice e la tecnica: ciò che inserisci è un semplice documento di qualsiasi tipo, e ciò che ottieni in cambio sono le parole chiave, filtrato come necessario o visualizzato come richiesto. Questo è tutto. È solo generazione di parole chiave senza limiti. Parole chiave necessarie per SEO sulla tua pagina web? Fateli qui. Stai cercando di creare etichette e tag per collegare insieme i tuoi post di blog? Trova le frasi e le parole più ricorrenti che usi qui. Volevi analizzare la letteratura di Tolstoy per i temi più comuni? Lo facciamo anche noi.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Stavi cercando un posto dove costruire elenchi di parole chiave da documenti e testo? Bene, l\'hai trovato.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Di seguito sono riportati alcuni esempi di utilizzo del sito ...</p>' .
				'<ul>' .
					'<li> Come faccio a riepilogare <em> contenuto </em>? </li>' .
					'<li> Come faccio a condensare <em> contenuto </em>? </li>' .
					'<li> Come posso ottenere parole chiave per <em> contenuto </em>? </li>' .
					'<li> Come generare parole chiave per <em> contenuto </em>? </li>' .
					'<li> Come gestire la SEO per <em> contenuto </em>? </li>' .
					'<li> Come supporto l\'ottimizzazione dei motori di ricerca per <em> testo </em>? </li>' .
					'<li> Come faccio le parole più comuni nel mio <em> testo </em>? </li>' .
					'<li> Come faccio a elencare le parole più usate nel mio <em> testo </em>? </li>' .
					'<li> Come generare un elenco di parole per frequenza nel mio <em> testo </em>? </li>' .
					'<li> Come si generano le parole più comuni nel mio <em> testo </em>? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Di seguito sono riportati alcuni esempi di utilizzo del sito ...</p>' .
				'<ul>' .
					'<li> Come faccio a riepilogare un <em> documento </em>? </li>' .
					'<li> Come faccio a riepilogare un <em> capitolo </em>? </li>' .
					'<li> Come faccio a riepilogare un <em> blogpost </em>? </li>' .
					'<li> Come faccio a riepilogare un <em> poema </em>? </li>' .
					'<li> Come faccio a riepilogare un <em> saggio </em>? </li>' .
					'<li> Come faccio a riepilogare una <em> ricerca </em>? </li>' .
					'<li> Come faccio a riepilogare un <em> memo </em>? </li>' .
					'<li> Come faccio a condensare un <em> documento </em>? </li>' .
					'<li> Come faccio a condensare un <em> capitolo </em>? </li>' .
					'<li> Come faccio a condensare un <em> blogpost </em>? </li>' .
					'<li> Come faccio a condensare un <em> poema </em>? </li>' .
					'<li> Come faccio a condensare un <em> saggio </em>? </li>' .
					'<li> Come faccio a condensare una <em> ricerca </em>? </li>' .
					'<li> Come faccio a condensare un <em> memo </em>? </li>' .
					'<li> Come posso ottenere le parole chiave per un <em> documento </em>? </li>' .
					'<li> Come ottengo le parole chiave per un <em> capitolo </em>? </li>' .
					'<li> Come ottengo le parole chiave per un <em> post del blog </em>? </li>' .
					'<li> Come ottengo le parole chiave per un <em> poema </em>? </li>' .
					'<li> Come ottengo le parole chiave per un <em> saggio </em>? </li>' .
					'<li> Come faccio a ottenere parole chiave per una <em> ricerca </em>? </li>' .
					'<li> Come ottengo le parole chiave per un <em> memo </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com è stato creato e lanciato il 9 ° gennaio 2017. Da allora, abbiamo mostrato agli utenti come elencare le parole chiave per qualsiasi cosa.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com è costruito utilizzando il <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, un sistema di gestione dei contenuti progettato per potenza, velocità e scalabilità.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Questa tecnologia, che utilizza PHP7 e MySQL5, fornisce tutte le funzionalità di questo sito web. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Controllaci su GitHub! </a></p>'
			;
			
			break;
			
		case 'nl':
					// List Keywords : Finding and Listing Your Keywords For You
			$this->header_title_text = 'ListKeywords : Uw zoekwoorden zoeken en noteren voor u';
					
					// I generated some keywords today!
			$quote_text = 'Ik heb vandaag wat zoekwoorden gegenereerd!';
				
					// Use this web app to list keywords and keyphrases.  You may remove html, ignore common words, and sort generated lists of keywords.
			$div_mouseover = 'Gebruik deze web-app om trefwoorden en trefzinnen weer te geven. U kunt html verwijderen, algemene woorden negeren en gegenereerde lijsten met zoekwoorden sorteren.';
			
			$this->share_text = 'Delen';
			$this->share_with_text = 'Delen met';
			$this->language_text = 'Taal';
			$about_header_title_text = 'Meer informatie over ons';
					
					// Content Text
			
			$mission_header_text = 'Missie';
			$examples_header_text = 'Voorbeelden';
			$uses_header_text = 'Toepassingen';
			$history_header_text = 'Geschiedenis';
			$technology_header_text = 'Technologie';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Informatie kunnen samenvatten, organiseren en categoriseren is net zo belangrijk als het begrijpen ervan. Als je niet kunt sorteren en analyseren wat je leert, dan zul je hetzelfde eindeloos opnieuw moeten leren. Door een soort synthese en volledigheid aan te brengen, wordt je denken opgehelderd.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Als u een document kunt destilleren en verkleinen tot alleen de zoekwoorden die het gebruikt, heeft u een beknopt en sorteerbaar begrip van dat document. Wat zijn trefwoorden? Het zijn woorden die met een hogere frequentie verschijnen dan andere woorden. We gebruiken enkele verfijningstechnieken, zoals het uitsluiten van veelvoorkomende woorden (zoals "de" of "als") of het verwijderen van HTML. We bieden ook opmaakopties, zoals een lijst met het aantal keren dat een woord naast de woorden staat of gewoon een lege lijst zonder cijfers. Als informatie oneindig is, is het oneindig krachtig om het te kunnen condenseren.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Bij ListKeywords.com bieden we de code en de techniek: wat u invoert is een eenvoudig document van elk type en wat u daarvoor terugkrijgt, zijn de trefwoorden, gefilterd zoals u nodig heeft of weergegeven zoals vereist. Dat is het. Het zijn gewoon sleutelwoorden genereren zonder grenzen. Benodigde sleutelwoorden voor SEO op uw webpagina? Maak ze hier. Wil je labels en labels maken om je blogposts aan elkaar te linken? Zoek de meest voorkomende zinnen en woorden die u hier gebruikt. Wil je de Tolstoys literatuur voor de meest voorkomende thema\'s analyseren? Dat doen we ook.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Was u op zoek naar een plek om zoekwoordenlijsten uit documenten en tekst te maken? Nou, je hebt het gevonden.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Hieronder zijn enkele voorbeelden van gebruik van de site ...</p>' .
				'<ul>' .
					'<li> Hoe vatten we <em> inhoud </em> samen? </li>' .
					'<li> Hoe condense ik <em> inhoud </em>? </li>' .
					'<li> Hoe krijg ik trefwoorden voor <em> inhoud </em>? </li>' .
					'<li> Hoe genereren zoekwoorden voor <em> inhoud </em>? </li>' .
					'<li> Hoe omgaan met SEO voor <em> inhoud </em>? </li>' .
					'<li> Hoe ondersteuning van zoekmachineoptimalisatie voor <em> tekst </em>? </li>' .
					'<li> Hoe vind ik de meest voorkomende woorden in mijn <em> tekst </em>? </li>' .
					'<li> Hoe noteer ik de meestgebruikte woorden in mijn <em> tekst </em>? </li>' .
					'<li> Hoe genereer ik een lijst met woorden op frequentie in mijn <em> tekst </em>? </li>' .
					'<li> Hoe genereer je de meest voorkomende woorden in mijn <em> tekst </em>? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Hieronder vindt u enkele voorbeelden van gebruik van de site ...</p>' .
				'<ul>' .
					'<li> Hoe vat ik een <em> -document </em> samen? </li>' .
					'<li> Hoe vat ik een <em> hoofdstuk </em> samen? </li>' .
					'<li> Hoe vat ik een <em> blogpost </em> samen? </li>' .
					'<li> Hoe vat ik een <em> gedicht </em> samen? </li>' .
					'<li> Hoe vat ik een <em> essay </em> samen? </li>' .
					'<li> Hoe vat ik een <em> onderzoek </em> samen? </li>' .
					'<li> Hoe vat ik een <em> memo </em>? </li>' .
					'<li> Hoe condenseer ik een <em> document </em>? </li>' .
					'<li> Hoe condenseer ik een <em> hoofdstuk </em>? </li>' .
					'<li> Hoe condenseer ik een <em> blogpost </em>? </li>' .
					'<li> Hoe constrast ik een <em> gedicht </em>? </li>' .
					'<li> Hoe condenseer ik een <em> essay </em>? </li>' .
					'<li> Hoe condenseer ik een <em> onderzoek </em>? </li>' .
					'<li> Hoe condenseer ik een <em> memo </em>? </li>' .
					'<li> Hoe krijg ik trefwoorden voor een <em> document </em>? </li>' .
					'<li> Hoe krijg ik trefwoorden voor een <em> hoofdstuk </em>? </li>' .
					'<li> Hoe krijg ik trefwoorden voor een <em> blogpost </em>? </li>' .
					'<li> Hoe krijg ik trefwoorden voor een <em> gedicht </em>? </li>' .
					'<li> Hoe krijg ik trefwoorden voor een <em> essay </em>? </li>' .
					'<li> Hoe krijg ik trefwoorden voor een <em> onderzoek </em>? </li>' .
					'<li> Hoe krijg ik trefwoorden voor een <em> memo </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com is gemaakt en gestart op 9 januari 2017. Sindsdien hebben we gebruikers laten zien hoe zoekwoorden kunnen worden weergegeven voor alles en nog wat.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com is gebouwd met behulp van de <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, een inhoudbeheersysteem dat is ontworpen voor kracht, snelheid en schaalbaarheid.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Deze technologie, met behulp van PHP7 en MySQL5, biedt alle functionaliteit van deze website. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Bekijk ons op GitHub! </a></p>'
			;
			
			break;
			
		case 'pl':
					// List Keywords : Finding and Listing Your Keywords For You
			$this->header_title_text = 'ListKeywords : Wyszukiwanie i wpisywanie słów kluczowych dla Ciebie';
					
					// I generated some keywords today!
			$quote_text = 'Wygenerowałem kilka słów kluczowych już dziś!';
				
					// Use this web app to list keywords and keyphrases.  You may remove html, ignore common words, and sort generated lists of keywords.
			$div_mouseover = 'Użyj tej aplikacji internetowej, aby wyświetlić listę słów kluczowych i fraz. Możesz usunąć html, ignorować popularne słowa i sortować wygenerowane listy słów kluczowych.';
			
			$this->share_text = 'Dzielić';
			$this->share_with_text = 'Udostępnij za pomocą';
			$this->language_text = 'Język';
			$about_header_title_text = 'Więcej informacji o nas';
					
					// Content Text
			
			$mission_header_text = 'Misja';
			$examples_header_text = 'Przykłady';
			$uses_header_text = 'Używa';
			$history_header_text = 'Historia';
			$technology_header_text = 'Technologia';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Możliwość podsumowywania, organizowania i kategoryzowania informacji jest równie ważna, jak jej zrozumienie. Jeśli nie możesz posortować i przeanalizować tego, czego się nauczyłeś, będziesz musiał bez końca uczyć się tego samego. Zapewniając pewien rodzaj syntezy i kompletności, twoje myślenie zostaje wyjaśnione.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Jeśli potrafisz destylować i redukować dokument tylko do słów kluczowych, których używasz, masz zrozumiałe i zrozumiałe zrozumienie tego dokumentu. Czym są słowa kluczowe? Są to słowa, które pojawiają się z większą częstotliwością niż inne słowa. Używamy kilku technik udoskonalania, takich jak wykluczanie popularnych słów (takich jak "the" lub "as") lub usuwanie HTML. Oferujemy również opcje formatowania, takie jak określanie, ile razy słowo pojawia się obok słów lub po prostu podawanie czystej listy bez numerów. Jeśli informacja jest nieskończona, to zdolność do kondensacji jest nieskończenie potężna.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">W witrynie ListKeywords.com udostępniamy kod i technikę: to, co wpisujesz, jest prostym dokumentem dowolnego typu, a otrzymujesz w zamian słowa kluczowe, filtrowane według potrzeb lub wyświetlane zgodnie z wymaganiami. to jest to! To tylko generowanie słów kluczowych bez ograniczeń. Potrzebne słowa kluczowe do SEO na swojej stronie? Zrób je tutaj. Próbujesz tworzyć etykiety i tagi, by łączyć swoje blogi razem? Znajdź najczęściej powtarzające się wyrażenia i słowa, których używasz tutaj. Chciałem przeanalizować literaturę Tołsto dla najczęstszych tematów? My też to robimy.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Czy szukałeś jakiegoś miejsca do budowania list słów kluczowych z dokumentów i tekstu? Cóż, znalazłeś to.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Poniżej kilka przykładowych zastosowań witryny ...</p>' .
				'<ul>' .
					'<li> Jak podsumować <em> treść </em>? </li>' .
					'<li> Jak skondensować zawartość <em> </em>? </li>' .
					'<li> Jak uzyskać słowa kluczowe dla <em> treści </em>? </li>' .
					'<li> Jak generować słowa kluczowe dla <em> treści </em>? </li>' .
					'<li> Jak radzić sobie z SEO dla <em> treści </em>? </li>' .
					'<li> W jaki sposób obsługuje się optymalizację pod kątem wyszukiwarek dla <em> tekstu </em>? </li>' .
					'<li> Jak najczęściej używane słowa w moim <em> tekście </em>? </li>' .
					'<li> Jak wyświetlić listę najczęściej używanych słów w moim tekście <em> </em>? </li> ' .
					'<li> Jak wygenerować listę słów według częstotliwości w moim <em> tekście </em>? </li>' .
					'<li> Jak generować najczęściej używane słowa w moim <em> tekście </em>? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Poniżej kilka przykładowych zastosowań witryny ...</p>' .
				'<ul>' .
					'<li> Jak podsumować <em>dokument  </em>? </li>' .
					'<li> Jak podsumować <em>rozdział  </em>? </li>' .
					'<li> Jak podsumować <em>blogpost  </em>? </li>' .
					'<li> Jak podsumować <em>wiersz  </em>? </li>' .
					'<li> Jak podsumować <em>e-mail  </em>? </li> ' .
					'<li> Jak podsumować <em>badanie  </em>? </li> ' .
					'<li> Jak podsumować <em>notatkę  </em>? </li> ' .
					'<li> Jak skondensować <em>dokument  </em>? </li>' .
					'<li> Jak skondensować <em>rozdział  </em>? </li>' .
					'<li> Jak skondensować <em>blogpost  </em>? </li>' .
					'<li> Jak skondensować <em>wiersz  </em>? </li>' .
					'<li> Jak skondensować <em> wypracowanie </em>? </li>' .
					'<li> Jak skondensować <em>badanie  </em>? </li> ' .
					'<li> Jak skondensować <em>notatkę  </em>? </li> ' .
					'<li> Jak uzyskać słowa kluczowe dla <em>dokumentu  </em>? </li>' .
					'<li> Jak uzyskać słowa kluczowe dla <em> rozdziału </em>? </li>' .
					'<li> Jak uzyskać słowa kluczowe dla <em> blogpost </em>? </li>' .
					'<li> Jak uzyskać słowa kluczowe dla <em>wiersza </em>? </li>' .
					'<li> Jak uzyskać słowa kluczowe dla <em> eseju </em>? </li>' .
					'<li> Jak uzyskać słowa kluczowe do <em> badania </em>? </li> ' .
					'<li> Jak uzyskać słowa kluczowe dla <em> notatki </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com został utworzony i uruchomiony 9 stycznia 2017 roku. Od tego czasu pokazywaliśmy użytkownikom, jak wyświetlać słowa kluczowe dla dowolnego elementu.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com jest zbudowany przy użyciu <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, systemu zarządzania treścią zaprojektowanego pod kątem władzy, szybkości i skalowalność.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Ta technologia, wykorzystująca PHP7 i MySQL5, zapewnia całą funkcjonalność tej witryny. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Sprawdź nas na GitHub! </a></p>'
			;
			
			break;
			
		case 'pt':
					// List Keywords : Finding and Listing Your Keywords For You
			$this->header_title_text = 'ListKeywords : Encontrando e listando suas palavras-chave para você';
					
					// I generated some keywords today!
			$quote_text = 'Eu geramos algumas palavras-chave hoje!';
				
					// Use this web app to list keywords and keyphrases.  You may remove html, ignore common words, and sort generated lists of keywords.
			$div_mouseover = 'Use este aplicativo da web para listar palavras-chave e frases-chave. Você pode remover o html, ignorar palavras comuns e classificar listas geradas de palavras-chave.';
			
			$this->share_text = 'Compartilhar';
			$this->share_with_text = 'Compartilhar com';
			$this->language_text = 'Língua';
			$about_header_title_text = 'Mais informações sobre nós';
					
					// Content Text
			
			$mission_header_text = 'Missão';
			$examples_header_text = 'Exemplos';
			$uses_header_text = 'Usos';
			$history_header_text = 'História';
			$technology_header_text = 'Tecnologia';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Ser capaz de resumir, organizar e categorizar informações é tão importante quanto compreendê-las. Se você não puder classificar e analisar o que aprende, precisará reaprender a mesma coisa indefinidamente. Ao fornecer algum tipo de síntese e completude, seu pensamento fica claro.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Se você puder destilar e reduzir um documento apenas às palavras-chave usadas, terá uma compreensão concisa e classificável desse documento. O que são palavras-chave? São palavras que aparecem com uma freqüência maior que outras palavras. Usamos algumas técnicas de refinamento, como excluir palavras comuns (como "o" ou "como") ou excluir HTML. Também oferecemos opções de formatação, como listar o número de vezes que uma palavra aparece ao lado das palavras ou apenas fornecer uma lista limpa sem números. Se a informação é infinita, ser capaz de condensá-la é infinitamente poderoso.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Em ListKeywords.com, fornecemos o código e a técnica: o que você insere é um documento simples de qualquer tipo, e o que você recebe em retorno são as palavras-chave, filtradas como você precisa ou exibidas conforme necessário. É isso aí. É apenas geração de palavras-chave sem limites. Palavras-chave necessárias para SEO em sua página da web? Faça-os aqui. Tentando criar etiquetas e tags para unir suas postagens de blog? Encontre as frases e palavras mais comuns que você usa aqui. Queria analisar a literatura de Tolstoi para os temas mais comuns? Nós também fazemos isso.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Você estava procurando algum lugar para criar listas de palavras-chave a partir de documentos e texto? Bom, você achou.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Abaixo estão alguns exemplos de uso do site ...</p>' .
				'<ul>' .
					'<li> Como faço para resumir <em> conteúdo </em>? </li>' .
					'<li> Como condeno <em> conteúdo </em>? </li>' .
					'<li> Como obtenho palavras-chave para <em> conteúdo </em>? </li>' .
					'<li> Como gerar palavras-chave para <em> conteúdo </em>? </li>' .
					'<li> Como lidar com SEO para <em> conteúdo </em>? </li>' .
					'<li> Como apoiar a otimização de mecanismos de pesquisa para <em> texto </em>? </li>' .
					'<li> Como faço para as palavras mais comuns no meu <em> texto </em>? </li>' .
					'<li> Como faço para listar as palavras mais usadas no meu <em> texto </em>? </li>' .
					'<li> Como gerar uma lista de palavras por frequência no meu <em> texto </em>? </li>' .
					'<li> Como gerar palavras mais comuns no meu <em> texto </em>? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Abaixo estão alguns exemplos de uso do site ...</p>' .
				'<ul>' .
					'<li> Como faço para resumir um <em> documento </em>? </li>' .
					'<li> Como faço para resumir um <em> capítulo </em>? </li>' .
					'<li> Como faço para resumir um <em> blogpost </em>? </li>' .
					'<li> Como faço para resumir um <em> poema </em>? </li>' .
					'<li> Como faço para resumir um <em> ensaio </em>? </li>' .
					'<li> Como faço para resumir uma <em> pesquisa </em>? </li>' .
					'<li> Como faço para resumir um <em> memo </em>? </li>' .
					'<li> Como faço para condensar um <em> documento </em>? </li>' .
					'<li> Como eu condenso um <em> capítulo </em>? </li>' .
					'<li> Como faço para condensar um <em> blogpost </em>? </li>' .
					'<li> Como eu condenso um <em> poema </em>? </li>' .
					'<li> Como faço para condensar um <em> ensaio </em>? </li>' .
					'<li> Como faço para condensar uma <em> pesquisa </em>? </li>' .
					'<li> Como faço para condensar um <em> memo </em>? </li>' .
					'<li> Como obtenho palavras-chave para um <em> documento </em>? </li>' .
					'<li> Como obtenho palavras-chave para um <em> capítulo </em>? </li>' .
					'<li> Como obtenho palavras-chave para um <em> blogpost </em>? </li>' .
					'<li> Como obtenho palavras-chave para um <em> poema </em>? </li>' .
					'<li> Como obtenho palavras-chave para um <em> ensaio </em>? </li>' .
					'<li> Como obtenho palavras-chave para uma <em> pesquisa </em>? </li>' .
					'<li> Como obtenho palavras-chave para uma <em> nota </​​em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">O ListKeywords.com foi criado e lançado em 9º de janeiro de 2017. Desde então, mostramos aos usuários como listar palavras-chave para tudo e qualquer coisa.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">O ListKeywords.com foi criado usando o <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, um sistema de gerenciamento de conteúdo projetado para energia, velocidade e escalabilidade.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Esta tecnologia, usando PHP7 e MySQL5, fornece todas as funcionalidades deste site. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Consulte-nos no GitHub! </a></p>'
			;
			
			break;
			
		case 'ru':
					// List Keywords : Finding and Listing Your Keywords For You
			$this->header_title_text = 'ListKeywords : Найти и перечислить ваши ключевые слова для вас';
					
					// I generated some keywords today!
			$quote_text = 'Я сгенерировал несколько ключевых слов сегодня!';
				
					// Use this web app to list keywords and keyphrases.  You may remove html, ignore common words, and sort generated lists of keywords.
			$div_mouseover = 'Используйте это веб-приложение для составления списка ключевых слов и фраз. Вы можете удалить HTML, игнорировать общие слова и сортировать сгенерированные списки ключевых слов.';
			
			$this->share_text = 'Поделиться';
			$this->share_with_text = 'Поделиться с';
			$this->language_text = 'язык';
			$about_header_title_text = 'Дополнительная информация';
					
					// Content Text
			
			$mission_header_text = 'миссия';
			$examples_header_text = 'Примеры';
			$uses_header_text = 'Пользы';
			$history_header_text = 'история';
			$technology_header_text = 'Технология';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Возможность суммировать, систематизировать и классифицировать информацию так же важна, как и ее понимание. Если вы не можете сортировать и анализировать то, что вы изучаете, тогда вам придется бесконечно переучивать одно и то же. Предоставляя своего рода синтез и полноту, ваше мышление становится ясным.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Если вы можете дистиллировать и сокращать документ только по ключевым словам, которые он использует, то у вас есть четкое и понятное понимание этого документа. Какие ключевые слова? Это слова, которые появляются с большей частотой, чем другие слова. Мы используем несколько методов уточнения, таких как исключение распространенных слов (таких как «the» или «as») или удаление HTML. Мы также предлагаем варианты форматирования, такие как перечисление количества раз, когда слово появляется рядом со словами, или просто предоставление чистого списка без цифр. Если информация бесконечна, то способность к ее сжатию является бесконечно мощной.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">На ListKeywords.com мы предоставляем код и технику: то, что вы вводите, представляет собой простой документ любого типа, а взамен вы получаете ключевые слова, отфильтрованные по вашему усмотрению или отображаемые по мере необходимости. Вот и все. Это просто генерация ключевых слов без ограничений. Нужны ключевые слова для SEO на вашей веб-странице? Сделай их здесь. Пытаетесь сделать ярлыки и теги, чтобы связать ваши посты вместе? Найдите наиболее часто встречающиеся фразы и слова, которые вы используете здесь. Хотите проанализировать литературу Толстого на наиболее распространенные темы? Мы тоже это делаем.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Вы искали место для создания списков ключевых слов из документов и текста? Ну, вы нашли это.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Ниже приведены примеры использования сайта ...</p>' .
				'<ul>' .
					'<li> Как мне обобщить <em> контент </em>? </li>' .
					'<li> Как мне сжать <em> контент </em>? </li>' .
					'<li> Как получить ключевые слова для <em> контента </em>? </li>' .
					'<li> Как создать ключевые слова для <em> контента </em>? </li>' .
					'<li> Как обрабатывать SEO для <em> контента </em>? </li>' .
					'<li> Как поддержать поисковую оптимизацию для <em> текста </em>? </li>' .
					'<li> Как мне использовать наиболее распространенные слова в моем <em> тексте </em>? </li>' .
					'<li> Как мне перечислить наиболее часто используемые слова в моем <em> тексте </em>? </li>' .
					'<li> Как создать список слов по частоте в моем <em> тексте </em>? </li>' .
					'<li> Как создать наиболее распространенные слова в моем <em> тексте </em>? </li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Ниже приведены примеры использования сайта ...</p>' .
				'<ul>' .
					'<li> Как мне обобщить <em> документ </em>? </li>' .
					'<li> Как мне обобщить <em> главу </em>? </li> ' .
					'<li> Как мне подвести итог <em> blogpost </em>? </li>' .
					'<li> Как мне обобщить <em> стихотворение </em>? </li>' .
					'<li> Как мне обобщить <em> эссе </em>? </li> ' .
					'<li> Как мне обобщить <em> исследование </em>? </li> ' .
					'<li> Как мне суммировать <em> памятку </em>? </li>' .
					'<li> Как мне сжать <em> документ </em>? </li>' .
					'<li> Как мне сжать <em> главу </em>? </li>' .
					'<li> Как мне сжать <em> блог </em>? </li>' .
					'<li> Как мне сжать <em> стихотворение </em>? </li>' .
					'<li> Как мне сжать <em> эссе </em>? </li>' .
					'<li> Как мне сжать <em> исследование </em>? </li>' .
					'<li> Как мне сжать <em> заметку </em>? </li>' .
					'<li> Как получить ключевые слова для <em> документа </em>? </li>' .
					'<li> Как получить ключевые слова для <em> главы </em>? </li>' .
					'<li> Как получить ключевые слова для <em> блога </em>? </li>' .
					'<li> Как получить ключевые слова для <em> стихотворения </em>? </li>' .
					'<li> Как получить ключевые слова для <em> эссе </em>? </li>' .
					'<li> Как получить ключевые слова для <em> исследования </em>? </li>' .
					'<li> Как получить ключевые слова для <em> заметки </em>? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com был создан и запущен 9 января 2017 г.  С тех пор мы показываем пользователям, как составить список ключевых слов для всего и вся.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com создан с использованием <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> CMS Green Gluon </a>, системы управления контентом, разработанной для обеспечения мощности, скорости и масштабируемость.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Эта технология, использующая PHP7 и MySQL5, обеспечивает все функциональные возможности этого веб-сайта. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Проверьте нас на GitHub! </a></p>'
			;
			
			break;
			
		case 'tr':
					// List Keywords : Finding and Listing Your Keywords For You
			$this->header_title_text = 'ListKeywords : Anahtar Kelimeler Sizin İçin Bulma ve Listeleme';
					
					// I generated some keywords today!
			$quote_text = 'Bugün bazı anahtar kelimeler ürettim!';
				
					// Use this web app to list keywords and keyphrases.  You may remove html, ignore common words, and sort generated lists of keywords.
			$div_mouseover = 'Anahtar kelimeleri ve anahtar kelimeleri listelemek için bu web uygulamasını kullanın. HTML\'yi kaldırabilir, genel kelimeleri yok sayabilir ve oluşturulan anahtar kelime listelerini sıralayabilirsiniz.';
			
			$this->share_text = 'Paylaşmak';
			$this->share_with_text = 'İle paylaş.';
			$this->language_text = 'Dil';
			$about_header_title_text = 'Hakkımızda Daha Fazla Bilgi';
					
					// Content Text
			
			$mission_header_text = 'Misyon';
			$examples_header_text = 'Örnekler';
			$uses_header_text = 'Kullanımları';
			$history_header_text = 'Tarihçe';
			$technology_header_text = 'Teknoloji';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Bilgiyi özetleyebilmek, organize edebilmek ve kategorilere ayırabilmek, onu anlamak kadar önemlidir. Öğrendiklerinizi sıralayamaz ve analiz edemezseniz, o zaman aynı şeyi tekrar tekrar öğrenmeniz gerekir. Bir çeşit sentez ve bütünlük sağlayarak, düşünceleriniz netleşir.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Bir dokümanı yalnızca kullandığı anahtar kelimelere damlatabilir ve azaltabilirseniz, o dokümanın kısa ve özlü bir anlayışına sahipsiniz. Anahtar kelimeler nedir? Diğer kelimelerden daha yüksek frekansta görünen kelimelerdir. Genel kelimeleri ("" veya "gibi" gibi) dışlamak veya HTML\'yi çıkarmak gibi birkaç ayrıntılandırma tekniği kullanıyoruz. Ayrıca, bir kelimenin kelimelerin yanında kaç kez göründüğünü listelemek veya sadece rakamsız temiz bir liste vermek gibi biçimlendirme seçenekleri de sunuyoruz. Eğer bilgi sonsuz ise yoğunlaşabilmek sonsuz güçlüdür.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">ListKeywords.com\'da kodu ve tekniği sunuyoruz: girdiğiniz her tür basit bir belgedir ve karşılığında elde ettiğiniz şey, anahtar kelimeleriniz, ihtiyaç duyduğunuz şekilde filtrelendiğiniz veya gerektiği gibi gösterildiğinizdir. Bu kadar. Sadece limitsiz anahtar kelime üretimi Web sayfanızda SEO için anahtar kelimeler mi gerekli? Onları burada yap. Blog sayfalarınızı birbirine bağlamak için etiketler ve etiketler yapmaya mı çalışıyorsunuz? En sık kullandığınız cümleleri ve kelimeleri burada kullanın. En yaygın temalar için Tolstoya\'nın literatürünü analiz etmek mi istiyorsunuz? Bunu biz de yapıyoruz.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Belge ve metinden anahtar kelime listeleri oluşturmak için bir yer mi arıyorsunuz? Onu buldun.</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Aşağıda sitenin bazı örnek kullanımları bulunmaktadır...</p>' .
				'<ul>' .
					'<li> <em> İçeriği </em> nasıl özetlerim? </li> '.
					'<li> <em> İçeriği </em> nasıl yoğunlaştırırım? </li>' .
					'<li> <em> İçerik </em> için anahtar kelimeleri nasıl alırım? </li>' .
					'<li> <em> İçerik </em> için anahtar kelimeler nasıl oluşturulur? </li>' .
					'<li> SEO, <em> içerik </em> için nasıl kullanılır? </li>' .
					'<li> <em> metin </em> için Arama Motoru Optimizasyonunu nasıl destekler? </li>' .
					'<li> <em> Metnim </em>\' de en yaygın kullanılan kelimeleri nasıl kullanırım? </li> ' .
					'<li> En çok kullanılan kelimeleri <em> metnimde </em> nasıl listeleyebilirim? </li>' .
					'<li> <em> Metnim </em>\' de sıklıkta kelimelerin bir listesini nasıl oluştururum? </li>' .
					'<li> <em> Metnimde </em> en yaygın kelimeler nasıl oluşturulur? </li>'. 
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Aşağıda sitenin bazı örnek kullanımları bulunmaktadır ...</p>' .
				'<ul>' .
					'<li> Bir <em> belgesini </em> nasıl özetlerim? </li>' .
					'<li> Bir <em> bölümü </em> nasıl özetlerim? </li>' .
					'<li> Bir <em> blog yayınını </em> nasıl özetlerim? </li>' .
					'<li> Bir <em> şiirini </em> nasıl özetlerim? </li>' .
					'<li> Bir <em> kompozisyonunu </em> nasıl özetlerim? </li>' .
					'<li> Bir <em> araştırmayı </em> nasıl özetlerim? </li>' .
					'<li> Bir <em> notu </em> nasıl özetlerim? </li>' .
					'<li> Bir <em> belgesini </em> nasıl sıkıştırabilirim? </li>' .
					'<li> Bir <em> bölümünü </em> nasıl yoğunlaştırırım? </li>' .
					'<li> Bir <em> blog yayınını </em> nasıl yoğunlaştırırım? </li>' .
					'<li> Bir <em> şiirini </em> nasıl sıkıştırabilirim? </li> '.
					'<li> <em> Denemeyi </em> nasıl sıkıştırabilirim? </li> '.
					'<li> Bir <em> araştırmasını </em> nasıl yoğunlaştırırım? </li>' .
					'<li> Bir <em> notunu </em> nasıl sıkıştırabilirim? </li>' .
					'<li> Bir <em> dokümanı </em> için anahtar kelimeleri nasıl alırım? </li>' .
					'<li> Bir <em> bölümü </em> için anahtar kelimeleri nasıl alırım? </li>' .
					'<li> Bir <em> blog postası </em> için anahtar kelimeleri nasıl alırım? </li>' .
					'<li> Bir <em> şiir </em> için anahtar kelimeleri nasıl alırım? </li>' .
					'<li> Bir <em> deneme </em> için anahtar kelimeleri nasıl alırım? </li>' .
					'<li> Bir <em> araştırma </em> için anahtar kelimeleri nasıl alırım? </li>' .
					'<li> Bir <em> notu </em> için anahtar kelimeleri nasıl alırım? </li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com 9 Ocak 2017’da oluşturulmuş ve başlatılmıştır. O zamandan beri, kullanıcılara her şey için anahtar kelimeleri nasıl listeleyeceğimizi gösteriyoruz.</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com, güç ve hız için tasarlanmış bir içerik yönetim sistemi olan <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a> kullanılarak oluşturulmuştur. ölçeklenebilirlik.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">PHP7 ve MySQL5 kullanan bu teknoloji, bu web sitesinin tüm işlevselliğini sağlar. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> GitHub\'da bize göz atın! </a></p>'
			;
			
			break;
			
		case 'zh':
					// List Keywords : Finding and Listing Your Keywords For You
			$this->header_title_text = 'ListKeywords : 为您找到并列出您的关键字';
					
					// I generated some keywords today!
			$quote_text = '我今天生成了一些关键字！';
				
					// Use this web app to list keywords and keyphrases.  You may remove html, ignore common words, and sort generated lists of keywords.
			$div_mouseover = '使用此Web应用程序列出关键字和关键短语。 您可以删除html，忽略常用单词，并对生成的关键字列表进行排序。';
			
			$this->share_text = '分享';
			$this->share_with_text = '与某人分享';
			$this->language_text = '语言';
			$about_header_title_text = '关于我们的更多信息';
					
					// Content Text
			
			$mission_header_text = '任务';
			$examples_header_text = '例子';
			$uses_header_text = '用途';
			$history_header_text = '历史';
			$technology_header_text = '技术';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">能够对信息进行汇总，组织和分类与理解信息一样重要。 如果你无法对你学到的东西进行排序和分析，那么你将需要无休止地重新学习同样的东西。 通过提供某种综合和完整性，您的想法变得清晰。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">如果您可以将文档提取并简化为它使用的关键字，那么您对该文档有一个简明扼要的理解。 什么是关键字？ 它们的出现频率高于其他单词。 我们使用一些提炼技术，例如排除常用词（例如“the”或“as”）或剥离HTML。 我们还提供格式化选项，例如列出单词旁边出现的单词的次数，或者仅提供没有数字的干净列表。 如果信息是无限的，那么能够压缩信息就是无限强大的。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">在ListKeywords.com，我们提供代码和技术：您输入的是任何类型的简单文档，您获得的回报是关键字，过滤您需要的方式，或根据需要显示。 而已。 它只是关键字生成而没有限制。 在您的网页上需要搜索引擎优化的关键字？ 让他们在这里。 试图制作标签和标签，将博客链接在一起？ 找到您在此处使用的最常见的重复短语和单词。 想要分析托尔斯泰的文献中最常见的主题吗？ 我们也这样做。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">您是否正在寻找一些从文档和文本构建关键字列表的地方？ 好吧，你找到了。</p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">以下是该网站的一些示例用法......</p>' .
				'<ul>' .
					'<li>如何汇总<em>内容</em>？</li>' .
					'<li>如何压缩<em>内容</em>？</li>' .
					'<li>如何获取<em>内容的关键字</em>？</li>' .
					'<li>如何为<em>内容生成关键字</em>？</li>' .
					'<li>如何处理<em>内容的搜索引擎优化</em>？</li>' .
					'<li>如何支持搜索引擎优化<em>文本</em>？</li>' .
					'<li>我的<em>文字</em>中最常见的单词怎么样？</li>' .
					'<li>如何在<em>文本</em>中列出最常用的单词？</li>' .
					'<li>如何在我的<em>文本</em>中按频率生成单词列表？</li>' .
					'<li>如何在我的<em>文本中生成最常见的单词</em>？</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">以下是该网站的一些示例用途......</p>' .
				'<ul>' .
					'<li>如何汇总<em>文档</em>？</li>' .
					'<li>如何总结<em>章</em>？</li>' .
					'<li>如何汇总<em> blogpost </em>？</li>' .
					'<li>如何总结一首<em>诗</em>？</li>' .
					'<li>如何总结一篇<em>论文</em>？</li>' .
					'<li>如何总结<em>研究</em>？</li>' .
					'<li>如何汇总<em>备忘录</em>？</li>' .
					'<li>如何压缩<em>文档</em>？</li>' .
					'<li>如何压缩<em>章</em>？</li>' .
					'<li>如何压缩<em> blogpost </em>？</li>' .
					'<li>如何缩小<em>诗</em>？</li>' .
					'<li>如何压缩<em>论文</em>？</li>' .
					'<li>如何缩小<em>研究</em>？</li>' .
					'<li>如何压缩<em>备忘录</em>？</li>' .
					'<li>如何获取<em>文档的关键字</em>？</li>' .
					'<li>如何获取<em>章</em>的关键字？</li>' .
					'<li>如何获取<em> blogpost </em>的关键字？</li>' .
					'<li>如何获取<em>诗的关键字</em>？</li>' .
					'<li>如何获取<em>论文的关键词</em>？</li>' .
					'<li>如何获取<em>研究的关键字</em>？</li>' .
					'<li>如何获取<em>备忘录的关键字</em>？</li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com于2017年1月9日创建并发布。从那时起，我们一直在向用户展示如何列出任何内容和所有内容的关键字。</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px">ListKeywords.com使用<a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>构建，这是一个专为功率，速度和设计而设计的内容管理系统可扩展性。</p>' .
				
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>ListKeywords ' . $mission_header_text . ' :</em></h3></center>');
	
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>ListKeywords ' . $examples_header_text . ' :</em></h3></center>');
	
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>ListKeywords ' . $uses_header_text . ' :</em></h3></center>');
	
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>ListKeywords ' . $history_header_text . ' :</em></h3></center>');
	
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>ListKeywords ' . $technology_header_text . ' :</em></h3></center>');
	
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