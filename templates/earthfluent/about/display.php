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
		
			// mission, tech, examples, sample uses, history

	switch($this->language_object->getLanguageCode()) {
		default:
		case 'en':
					// Earth Fluent : Teaching Languages to the World
			$this->header_title_text = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					
					// I learned another language and another way of thinking today!
			$quote_text = $this->master_record['quote'][0]['Quote'];
				
					// Want to learn another language?  Learn Spanish, French, Italian, German, Japanese, Chinese, Hindi, Indonesian, Dutch, Polish, Portuguese, or Russian!
			$div_mouseover = $this->master_record['description'][0]['Description'];
			
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
				'<p class="margin-0px text-indent-50px">Want to communicate with anyone else on the planet?  Want to be able to exchange the inner parts of your heart and soul with any kindred spirit?  Well, today, your problems are likely social, and not technological.  You just need to speak the right language to be heard!</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">At EarthFluent, that is the only goal: giving you the tools you need to educate yourself and learn any of a dozen languages.  These tools are visual and auditory, based on the written word and on the spoken word.  You can learn by listening to phrases, testing phrases out with a microphone, taking quizzes of any number of words or lessons, playing crossword puzzles and other games, or by communicating with others in the comments section.  The ways you can learn ought to be as infinite as the diversity of human beings.  We are not here to mold you into this student or that student, we are here to do one thing: to teach you to speak, write, and communicate in another language.  That is EarthFluent.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">There are two goals that are being satisfied here: bringing people together in a way that mutually benefits all participants, and providing all of the technology necessary to make self-learning of a global-scale possible.  We cannot give you the speakers, but we will give you audio clips of phrases; we cannot give you a microphone, but we will test your microphone output against expected accent and language patterns; we cannot give you Internet access, but we can give you a Google Image Search-based quiz game to test out your language memory.  If you give us the energy, we will you give you the knowledge.  This service is devoted to being free and completely accessible.  (There is even a GitHub project!)</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Where do you want to go?  Europe, Asia, South America, Africa, North America, or Australia?  Check out a language, become educated in it, and you will fit in perfectly among the locals!</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px margin-top-22px">So, how does this actually all <i>work</i>?  With so many commercial products available for teaching, and many of them offering fewer lessons, <i>how can we this be done for free</i>?  And still be both worth-while, as a personal experience, and accurate, in a linguistic and academic sense?  The answers are easier than you would think.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Listening to Audio :</i></b> This is actually composed using the SpeechSynthesis API provided in HTML5.  Nothing magical here, just a web specification that has been worked over for a decade by thousands of inter-industry professionals.  This API currently supports 14 languages in multiple dialects, with more added regularly.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Testing Speaking on Microphone :</i></b> Again, this is just another part of the HTML5 specification, in this case, the SpeechRecognition API.  It, too, is maintained and designed by professionals.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Image-Based Quizzes :</i></b> This is a combination of the above technologies, and Google Image Search API.  The images being displayed for a word being quizzed are from these image searches.  That means you are dealing with fresh, regularly-used images that people actually use, whereas commercial products tend to have very stale, outdated stockphotos, of little value or interest to learners.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">So, <i>exactly what does this all mean for us?</i>  We use popular, well-maintained, and well-used technologies.  The audio voice you hear when listening to French, that is the same voice as a cellphone in Paris would use in speaking to its user (because Android and iPhone dutifully use the HTML5 specs).</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">What does that mean <i>for every other language-learning product</i>?  It means that they are maintained by boring, uninterested grammarians, locked away in their Latin and ancient-Greek halls of learning, without any linguistic connection to the living language of any people on the planet!  A commercial enterprise can hardly afford more than a handful of researchers -- the tools above, in audio and voice and image, are worked on by millions of hands!  Think of the engineers at Google to the HTML5 spec-writers to international standards-creators.  Compare how many hands work in the technologies of our product, and compare it to the leading market products, and there are one million minds behind the tech here for every one mind they employ!</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">And, of course, we are open-source!  EarthFluent.com is built using the <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank">Green Gluon CMS</a>, a content-management system designed for power, speed, and scalability.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">This technology, using PHP7 and MySQL5, provides all of the functionality of this website.  <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank">Check us out on GitHub!</a></p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Below are common uses of this site...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
				
				'<ul>' .
					'<li> How do I write in <i>Spanish</i>?  How do I speak in <i>Spanish</i>?  How do I communicate in <i>Spanish</i>?</li>' .
					'<li> How do I write in <i>French</i>?  How do I speak in <i>French</i>?  How do I communicate in <i>French</i>?</li>' .
					'<li> How do I write in <i>Italian</i>?  How do I speak in <i>Italian</i>?  How do I communicate in <i>Italian</i>?</li>' .
					'<li> How do I write in <i>German</i>?  How do I speak in <i>German</i>?  How do I communicate in <i>German</i>?</li>' .
					'<li> How do I write in <i>Japanese</i>?  How do I speak in <i>Japanese</i>?  How do I communicate in <i>Japanese</i>?</li>' .
					'<li> How do I write in <i>Chinese</i>?  How do I speak in <i>Chinese</i>?  How do I communicate in <i>Chinese</i>?</li>' .
					'<li> How do I write in <i>Hindi</i>?  How do I speak in <i>Hindi</i>?  How do I communicate in <i>Hindi</i>?</li>' .
					'<li> How do I write in <i>Indonesian</i>?  How do I speak in <i>Indonesian</i>?  How do I communicate in <i>Indonesian</i>?</li>' .
					'<li> How do I write in <i>Dutch</i>?  How do I speak in <i>Dutch</i>?  How do I communicate in <i>Dutch</i>?</li>' .
					'<li> How do I write in <i>Polish</i>?  How do I speak in <i>Polish</i>?  How do I communicate in <i>Polish</i>?</li>' .
					'<li> How do I write in <i>Portuguese</i>?  How do I speak in <i>Portuguese</i>?  How do I communicate in <i>Portuguese</i>?</li>' .
					'<li> How do I write in <i>Russian</i>?  How do I speak in <i>Russian</i>?  How do I communicate in <i>Russian</i>?</li>' .
					'<li> How do I write in <i>Korean</i>?  How do I speak in <i>Korean</i>?  How do I communicate in <i>Korean</i>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Below are some sample uses of the site...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
					
				'<ul>' .
							// spanish
						// https://www.earthfluent.com/spanish/culture-food-and-drink-part-21/view.php
					'<li> <a href="/spanish/culture-food-and-drink-part-21/view.php">How do I say <i>"Meet", "Talk", "Suggest", or "Speak"</i> in <i>Spanish</i>?</a></li>' .
						// https://www.earthfluent.com/spanish/nouns-animals-part-1/view.php
					'<li> <a href="/spanish/nouns-animals-part-1/view.php">How do I write <i>"Sheep", "Cow", "Komodo Dragon", or "Porcupine"</i> in <i>Spanish</i>?</a></li>' .
							// french
						// https://www.earthfluent.com/french/entertainment-sports-part-5/view.php
					'<li> <a href="/french/entertainment-sports-part-5/view.php">How do I say <i>"Surfing", "Skateboarding", "Dodgeball", or "Rock Climbing"</i> in <i>French</i>?</a></li>' .
						// https://www.earthfluent.com/french/nouns-animals-part-5/view.php
					'<li> <a href="/french/nouns-animals-part-5/view.php">How do I write <i>"Fish", "Shark", "Owl", or "Rabbit"</i> in <i>French</i>?</a></li>' .
							// italian
						// https://www.earthfluent.com/italian/nouns-objects-part-3/view.php
					'<li> <a href="/italian/nouns-objects-part-3/view.php">How do I say <i>"Paper", "Table", "Product", or "Food"</i> in <i>Italian</i>?</a></li>' .
						// https://www.earthfluent.com/italian/verbs-general-activity-part-11/view.php
					'<li> <a href="/italian/verbs-general-activity-part-11/view.php">How do I write <i>"Achieve", "Choose", "Fail", or "Serve"</i> in <i>Italian</i>?</a></li>' .
							// german
						// https://www.earthfluent.com/german/nouns-society-part-72/view.php
					'<li> <a href="/german/nouns-society-part-72/view.php">How do I say <i>"Wedding", "Dance", "Promise", or "Retirement"</i> in <i>German</i>?</a></li>' .
						// https://www.earthfluent.com/german/adjectives-quality-part-7/view.php
					'<li> <a href="/german/adjectives-quality-part-7/view.php">How do I write <i>"Lucky", "Dear", "Flat", or "Wet"</i> in <i>German</i>?</a></li>' .
							// japanese
						// https://www.earthfluent.com/japanese/nouns-places-part-19/view.php
					'<li> <a href="/japanese/nouns-places-part-19/view.php">How do I say <i>"Valley", "Lake", "Pub", or "Restaurant"</i> in <i>Japanese</i>?</a></li>' .
						// https://www.earthfluent.com/japanese/nouns-places-part-25/view.php
					'<li> <a href="/japanese/nouns-places-part-25/view.php">How do I write <i>"Platform", "Stream", "Airport", or "Province"</i> in <i>Japanese</i>?</a></li>' .
							// chinese
						// https://www.earthfluent.com/chinese/nouns-society-part-12/view.php
					'<li> <a href="/chinese/nouns-society-part-12/view.php">How do I say <i>"Trade", "Training", "Relationship", or "Rule"</i> in <i>Chinese</i>?</a></li>' .
						// https://www.earthfluent.com/chinese/nouns-places-part-25/view.php
					'<li> <a href="/chinese/nouns-places-part-25/view.php">How do I write <i>"Reach", "Walk", "Rise", or "Catch"</i> in <i>Chinese</i>?</a></li>' .
							// hindi
						// https://www.earthfluent.com/hindi/nouns-people-part-55/view.php
					'<li> <a href="/hindi/nouns-people-part-55/view.php">How do I say <i>"Merchant", "Magistrate", "Participant", or "Refugee"</i> in <i>Hindi</i>?</a></li>' .
						// https://www.earthfluent.com/hindi/nouns-places-part-25/view.php
					'<li> <a href="/hindi/nouns-places-part-25/view.php">How do I write <i>"Chief", "Citizen", "Editor", or "General"</i> in <i>Hindi</i>?</a></li>' .
							// indonesian
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-2/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-2/view.php">How do I say <i>"Consider", "Expect", "Read", or "Remember"</i> in <i>Indonesian</i>?</a></li>' .
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-8/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-8/view.php">How do I write <i>"Examine", "Study", "Recognize", or "Stare"</i> in <i>Indonesian</i>?</a></li>' .
							// dutch
						// https://www.earthfluent.com/dutch/nouns-ideas-part-13/view.php
					'<li> <a href="/dutch/nouns-ideas-part-13/view.php">How do I say <i>"Hope", "Meaning", "Assessment", or "Consideration"</i> in <i>Dutch</i>?</a></li>' .
						// https://www.earthfluent.com/dutch/nouns-society-part-25/view.php
					'<li> <a href="/dutch/nouns-society-part-25/view.php">How do I write <i>"Deal", "Payment", "Agency", or "Collection"</i> in <i>Dutch</i>?</a></li>' .
							// polish
						// https://www.earthfluent.com/polish/verbs-economic-activity-part-5/view.php
					'<li> <a href="/polish/verbs-economic-activity-part-5/view.php">How do I say <i>"Depend", "Gain", "Collect", or "Employ"</i> in <i>Polish</i>?</a></li>' .
						// https://www.earthfluent.com/polish/verbs-emotional-activity-part-2/view.php
					'<li> <a href="/polish/verbs-emotional-activity-part-2/view.php">How do I write <i>"Love", "Enjoy", "Relate", or "Suffer"</i> in <i>Polish</i>?</a></li>' .
							// portuguese
						// https://www.earthfluent.com/portuguese/nouns-society-part-42/view.php
					'<li> <a href="/portuguese/nouns-society-part-42/view.php">How do I say <i>"Freedom", "Limit", "Pension", or "Respect"</i> in <i>Portuguese</i>?</a></li>' .
						// https://www.earthfluent.com/portuguese/nouns-society-part-48/view.php
					'<li> <a href="/portuguese/nouns-society-part-48/view.php">How do I write <i>"Crowd", "Curriculum", "Violence", or "Ministry"</i> in <i>Portuguese</i>?</a></li>' .
							// russian
						// https://www.earthfluent.com/russian/culture-calendar-part-3/view.php
					'<li> <a href="/russian/culture-calendar-part-3/view.php">How do I say <i>"September", "October", "November", or "December"</i> in <i>Russian</i>?</a></li>' .
						// https://www.earthfluent.com/russian/adjectives-feeling-part-6/view.php
					'<li> <a href="/russian/adjectives-feeling-part-6/view.php">How do I write <i>"Guilty", "Glad", "Healthy", or "Sad"</i> in <i>Russian</i>?</a></li>' .
							// korean
						// https://www.earthfluent.com/korean/culture-food-and-drink-part-21/view.php
					'<li> <a href="/korean/culture-food-and-drink-part-21/view.php">How do I say <i>"Vodka", "Whiskey", "Tequila", or "Rum"</i> in <i>Korean</i>?</a></li>' .
						// https://www.earthfluent.com/korean/verbs-social-activity-part-1/view.php
					'<li> <a href="/korean/verbs-social-activity-part-1/view.php">How do I write <i>"Say", "Tell", "Ask", or "Show"</i> in <i>Korean</i>?</a></li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">EarthFluent.com was created and launched on April 7, 2017.  Since then, we have been teaching anything and everything we know about language!</p>'
			;
			
			break;
			
		case 'de':
					// Earth Fluent : Teaching Languages to the World
			$this->header_title_text = $this->master_record['Title'] . ' (Erde fließend) : Sprachen unterrichten für die Welt';
					
					// I learned another language and another way of thinking today!
			$quote_text = 'Ich habe heute eine andere Sprache und eine andere Denkweise gelernt!';
				
					// Want to learn another language?  Learn Spanish, French, Italian, German, Japanese, Chinese, Hindi, Indonesian, Dutch, Polish, Portuguese, or Russian!
			$div_mouseover = 'Willst du eine andere Sprache lernen? Lerne Spanisch, Französisch, Italienisch, Deutsch, Japanisch, Chinesisch, Hindi, Indonesisch, Niederländisch, Polnisch, Portugiesisch oder Russisch!';
			
				// More Information About Us
			$about_header_title_text = 'Weitere Informationen über uns';
					
					// Content Header Text
			
			$mission_header_text = 'Mission';
			$examples_header_text = 'Beispiele';
			$uses_header_text = 'Verwendet';
			$history_header_text = 'Geschichte';
			$technology_header_text = 'Technik';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Möchten Sie mit anderen Personen auf dem Planeten kommunizieren? Möchten Sie die inneren Teile Ihres Herzens und Ihrer Seele mit einem verwandten Geist austauschen? Nun, heute sind Ihre Probleme wahrscheinlich sozial und nicht technologisch. Sie müssen nur die richtige Sprache sprechen, um gehört zu werden!</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Bei EarthFluent ist dies das einzige Ziel: Ihnen die Werkzeuge zur Verfügung zu stellen, die Sie benötigen, um sich selbst zu erziehen und Dutzend Sprachen zu lernen. Diese Werkzeuge sind visuell und auditiv und basieren auf dem geschriebenen Wort und dem gesprochenen Wort. Sie können durch das Anhören von Phrasen lernen, mit einem Mikrofon Ausdrücke testen, Quizspiele mit beliebig vielen Wörtern oder Lektionen durchführen, Kreuzworträtsel und andere Spiele spielen oder mit anderen im Kommentarbereich kommunizieren. Die Möglichkeiten, die Sie lernen können, sollten so unendlich sein wie die Vielfalt der Menschen. Wir sind nicht hier, um Sie in diesen Schüler oder diesen Schüler einzugliedern, wir sind hier, um eines zu tun: um Ihnen beizubringen, zu sprechen, zu schreiben und in einer anderen Sprache zu kommunizieren. Das ist EarthFluent.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Es gibt zwei Ziele, die hier erfüllt werden: Menschen so zusammenbringen, dass alle Beteiligten davon profitieren, und alle Technologien bereitzustellen, die für das Selbstlernen von globalem Maßstab erforderlich sind. Wir können Ihnen keine Lautsprecher geben, aber wir geben Ihnen Audioclips von Phrasen. Wir können Ihnen kein Mikrofon geben, aber wir werden Ihren Mikrofonausgang mit den erwarteten Akzent- und Sprachmustern testen. Wir können Ihnen keinen Internetzugang geben, aber wir können Ihnen ein auf Google Image Search basierendes Quiz-Spiel anbieten, um Ihren Sprachspeicher zu testen. Wenn Sie uns die Energie geben, geben wir Ihnen das Wissen. Dieser Service dient dazu, kostenlos und vollständig zugänglich zu sein. (Es gibt sogar ein GitHub-Projekt!)</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Wohin willst du gehen? Europa, Asien, Südamerika, Afrika, Nordamerika oder Australien? Sehen Sie sich eine Sprache an, lernen Sie sie kennen und passen Sie perfekt unter die Einheimischen!</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px margin-top-22px">Also, wie funktioniert das eigentlich all <i> Arbeit </i>? Mit so vielen kommerziellen Produkten verfügbar für den Unterricht, und viele von ihnen weniger Unterricht anbieten, <i> Wie können wir dies kostenlos </i> getan werden? Und dennoch sowohl als persönliche Erfahrung als auch im sprachlichen und akademischen Sinne lohnenswert sein? Die Antworten sind einfacher als Sie denken.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Audio hören :</i></b> Dies wird eigentlich mithilfe der in HTML5 bereitgestellten SpeechSynthesis-API erstellt. Nichts Magisches hier, nur eine Web-Spezifikation, die seit einem Jahrzehnt von Tausenden von branchenübergreifenden Fachleuten bearbeitet wurde. Diese API unterstützt derzeit 14 Sprachen in mehreren Dialekten, wobei regelmäßig weitere hinzugefügt werden.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Testen des Sprechens am Mikrofon :</i></b> Auch dies ist nur ein weiterer Teil der HTML5-Spezifikation, in diesem Fall die SpeechRecognition-API. Es wird auch von Profis gepflegt und gestaltet.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Bildbasierte Quizprogramme :</i></b> Dies ist eine Kombination der oben genannten Technologien und der Google Image Search-API. Die Bilder, die für ein Wort angezeigt werden, das abgefragt wird, stammen von diesen Bildersuchen. Das bedeutet, dass Sie mit frischen, regelmäßig verwendeten Bildern zu tun haben, die von den Benutzern tatsächlich verwendet werden, während kommerzielle Produkte dazu neigen, veraltete, veraltete stockphotos zu haben, die für die Schüler von geringem Wert oder Interesse sind.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Also, <i> genau das, was diese tut alles für uns? </i> Wir verwenden beliebt, gut gepflegt und gut eingesetzten Technologien. Die Audiostimme, die Sie hören, wenn Sie Französisch hören, das ist die gleiche Stimme, die ein Mobiltelefon in Paris verwendet, um mit dem Benutzer zu sprechen (da Android und iPhone die HTML5-Spezifikationen pflichtgemäß verwenden).</p>' . 
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Was bedeutet das <i> für jedes andere Sprachlernprodukt </i>? Das bedeutet, dass sie von langweiligen, uninteressierten Grammatikern unterhalten werden, die in ihren lateinischen und altgriechischen Lernhallen eingeschlossen sind, ohne sprachliche Verbindung zur lebenden Sprache eines jeden Menschen auf der Erde! Ein kommerzielles Unternehmen kann sich kaum mehr als eine Handvoll Forscher leisten - die oben genannten Werkzeuge in Ton, Bild und Ton werden von Millionen von Händen bearbeitet! Denken Sie an die Ingenieure bei Google, an die HTML5-Entwickler und an die Erstellung internationaler Standards. Vergleichen Sie, wie viele Hände in den Technologien unseres Produkts arbeiten, und vergleichen Sie es mit den marktführenden Produkten. Hier steht eine Million Köpfe hinter dem Tech für jeden einzelnen Kopf, den sie einsetzen!</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Und natürlich sind wir Open Source! EarthFluent.com basiert auf dem <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, einem Content-Management-System, das auf Leistung, Geschwindigkeit und Leistung ausgelegt ist Skalierbarkeit.
</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Diese Technologie verwendet PHP7 und MySQL5 und bietet alle Funktionen dieser Website. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Besuchen Sie GitHub! </a></p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Im Folgenden finden Sie allgemeine Verwendungen dieser Website ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
				
				'<ul>' .
					'<li> Wie schreibe ich auf <i> Spanisch </i>? Wie spreche ich auf <i> Spanisch </i>? Wie kommuniziere ich auf <i> Spanisch </i>?</li>' .
					'<li> Wie schreibe ich auf <i> Französisch </i>? Wie spreche ich auf <i> Französisch </i>? Wie kommuniziere ich auf <i> Französisch </i>?</li>' .
					'<li> Wie schreibe ich auf <i> Italienisch </i>? Wie spreche ich auf <i> Italienisch </i>? Wie kommuniziere ich auf <i> Italienisch </i>?</li>' .
					'<li> Wie schreibe ich auf <i> Deutsch </i>? Wie spreche ich auf <i> deutsch </i>? Wie kommuniziere ich auf <i> Deutsch </i>?</li>' .
					'<li> Wie schreibe ich auf <i> Japanisch </i>? Wie spreche ich auf <i> Japanisch </i>? Wie kommuniziere ich auf <i> Japanisch </i>?</li>' .
					'<li> Wie schreibe ich auf <i> Chinesisch </i>? Wie spreche ich auf <i> Chinesisch </i>? Wie kommuniziere ich auf <i> Chinesisch </i>?</li>' .
					'<li> Wie schreibe ich auf <i> Hindi </i>? Wie spreche ich auf <i> Hindi </i>? Wie kommuniziere ich auf <i> Hindi </i>?</li>' .
					'<li> Wie schreibe ich auf <i> Indonesisch </i>? Wie spreche ich auf <i> Indonesisch </i>? Wie kommuniziere ich auf <i> Indonesisch </i>?</li>' .
					'<li> Wie schreibe ich auf <i> Niederländisch </i>? Wie spreche ich auf <i> Niederländisch </i>? Wie kommuniziere ich auf <i> Niederländisch </i>?</li>' .
					'<li> Wie schreibe ich auf <i> Polnisch </i>? Wie spreche ich auf <i> Polnisch </i>? Wie kommuniziere ich auf <i> Polnisch </i>?</li>' .
					'<li> Wie schreibe ich auf <i> Portugiesisch </i>? Wie spreche ich auf <i> Portugiesisch </i>? Wie kommuniziere ich auf <i> Portugiesisch </i>?</li>' .
					'<li> Wie schreibe ich auf <i> Russisch </i>? Wie spreche ich auf <i> Russisch </i>? Wie kommuniziere ich auf <i> Russisch </i>?</li>' .
					'<li> Wie schreibe ich auf <i> Koreanisch </i>? Wie spreche ich auf <i> Koreanisch </i>? Wie kommuniziere ich auf <i> Koreanisch </i>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Nachfolgend finden Sie einige Anwendungsbeispiele der Website ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
					
				'<ul>' .
							// spanish
						// https://www.earthfluent.com/spanish/culture-food-and-drink-part-21/view.php
					'<li> <a href="/spanish/culture-food-and-drink-part-21/view.php">Wie sage ich <i> "Meet", "Talk", "vorschlagen" oder "Speak" </i> in <i> Spanisch </i>?</a></li>' .
						// https://www.earthfluent.com/spanish/nouns-animals-part-1/view.php
					'<li> <a href="/spanish/nouns-animals-part-1/view.php">Wie schreibe ich <i> "Schaf", "Kuh", "Komodowaran" oder "Porcupine" </i> in <i> Spanisch </i>?</a></li>' .
							// french
						// https://www.earthfluent.com/french/entertainment-sports-part-5/view.php
					'<li> <a href="/french/entertainment-sports-part-5/view.php">Wie sage ich <i> "Surfen", "Skateboarding", "Völkerball" oder "Klettern" </i> auf <i> Französisch </i>?</a></li>' .
						// https://www.earthfluent.com/french/nouns-animals-part-5/view.php
					'<li> <a href="/french/nouns-animals-part-5/view.php">Wie schreibe ich <i> "Fisch", "Hai", "Eule" oder "Kaninchen" </i> in <i> Französisch </i>?</a></li>' .
							// italian
						// https://www.earthfluent.com/italian/nouns-objects-part-3/view.php
					'<li> <a href="/italian/nouns-objects-part-3/view.php">Wie sage ich <i> "Papier", "Tabelle", "Produkt" oder "Lebensmittel" auf <i> Italienisch </i>?</a></li>' .
						// https://www.earthfluent.com/italian/verbs-general-activity-part-11/view.php
					'<li> <a href="/italian/verbs-general-activity-part-11/view.php">Wie schreibe ich <i> "Erreiche", "Auswählen", "Fail" oder "Serve" </i> in <i> Italienisch </i>?</a></li>' .
							// german
						// https://www.earthfluent.com/german/nouns-society-part-72/view.php
					'<li> <a href="/german/nouns-society-part-72/view.php">Wie kann ich <i> "Hochzeit", "Tanz", "Versprechen" oder "Ruhestand" </i> auf <i> Deutsch </i> sagen?</li>' .
						// https://www.earthfluent.com/german/adjectives-quality-part-7/view.php
					'<li> <a href="/german/adjectives-quality-part-7/view.php">Wie schreibe ich <i> "Lucky", "Liebe", "Flat" oder "Wet" </i> in <i> Deutsch </i>?</a></li>' .
							// japanese
						// https://www.earthfluent.com/japanese/nouns-places-part-19/view.php
					'<li> <a href="/japanese/nouns-places-part-19/view.php">Wie sage ich <i> "Valley", "Lake", "Pub" oder "Restaurant" </i> auf <i> Japanisch </i>?</a></li>' .
						// https://www.earthfluent.com/japanese/nouns-places-part-25/view.php
					'<li> <a href="/japanese/nouns-places-part-25/view.php">Wie schreibe ich <i> "Plattform", "Stream", "Flughafen" oder "Provinz" </i> auf <i> Japanisch </i>?</a></li>' .
							// chinese
						// https://www.earthfluent.com/chinese/nouns-society-part-12/view.php
					'<li> <a href="/chinese/nouns-society-part-12/view.php">Wie sage ich <i> "Handel", "Ausbildung", "Beziehung" oder "Regel" </i> auf <i> Chinesisch </i>?</a></li>' .
						// https://www.earthfluent.com/chinese/nouns-places-part-25/view.php
					'<li> <a href="/chinese/nouns-places-part-25/view.php">Wie schreibe ich <i> "Reichweite", "Gehen", "Rise" oder "Catch" in <i> Chinesisch </i>?</a></li>' .
							// hindi
						// https://www.earthfluent.com/hindi/nouns-people-part-55/view.php
					'<li> <a href="/hindi/nouns-people-part-55/view.php">Wie sage ich <i> "Händler", "Richter", "Teilnehmer" oder "Flüchtling" </i> in <i> Hindi </i>?</a></li>' .
						// https://www.earthfluent.com/hindi/nouns-places-part-25/view.php
					'<li> <a href="/hindi/nouns-places-part-25/view.php">Wie schreibe ich <i> "Chief", "Citizen", "Editor" oder "General" </i> in <i> Hindi </i>?</a></li>' .
							// indonesian
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-2/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-2/view.php">Wie sage ich <i> "Überlegen", "Erwarten", "Lesen" oder "Erinnern" in <i> Indonesisch </i>?</a></li>' .
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-8/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-8/view.php">Wie schreibe ich <i> "Untersuchen", "Studieren", "Erkennen" oder "Stare" </i> in <i> Indonesisch </i>?</a></li>' .
							// dutch
						// https://www.earthfluent.com/dutch/nouns-ideas-part-13/view.php
					'<li> <a href="/dutch/nouns-ideas-part-13/view.php">Wie sage ich <i> "Hoffnung", "Bedeutung", "Bewertung" oder "Gegenleistung" </i> in <i> Niederländisch </i>?</a></li>' .
						// https://www.earthfluent.com/dutch/nouns-society-part-25/view.php
					'<li> <a href="/dutch/nouns-society-part-25/view.php">Wie schreibe ich <i> "Deal", "Payment", "Agency" oder "Collection" </i> auf <i> Niederländisch </i>?</a></li>' .
							// polish
						// https://www.earthfluent.com/polish/verbs-economic-activity-part-5/view.php
					'<li> <a href="/polish/verbs-economic-activity-part-5/view.php">Wie sage ich <i> "abhängig", "gewinnen", "sammeln" oder "beschäftigen" </i> auf <i> Polnisch </i>?</a></li>' .
						// https://www.earthfluent.com/polish/verbs-emotional-activity-part-2/view.php
					'<li> <a href="/polish/verbs-emotional-activity-part-2/view.php">Wie schreibe ich <i> "Liebe", "Genießen", "Beziehung" oder "Leiden" </i> auf <i> Polnisch </i>? </a></li>' .
							// portuguese
						// https://www.earthfluent.com/portuguese/nouns-society-part-42/view.php
					'<li> <a href="/portuguese/nouns-society-part-42/view.php">Wie sage ich <i> "Freiheit", "Grenze", "Rente" oder "Respekt" </i> auf <i> Portugiesisch </i>? </a></li>' .
						// https://www.earthfluent.com/portuguese/nouns-society-part-48/view.php
					'<li> <a href="/portuguese/nouns-society-part-48/view.php">Wie schreibe ich <i> "Crowd", "Curriculum", "Violence" oder "Ministry" </i> in <i> Portugiesisch </i>?</a></li>' .
							// russian
						// https://www.earthfluent.com/russian/culture-calendar-part-3/view.php
					'<li> <a href="/russian/culture-calendar-part-3/view.php">Wie sage ich <i> "September", "Oktober", "November" oder "Dezember" </i> in <i> Russisch </i>?</a></li>' .
						// https://www.earthfluent.com/russian/adjectives-feeling-part-6/view.php
					'<li> <a href="/russian/adjectives-feeling-part-6/view.php">Wie schreibe ich <i> "schuldig", "gut", "gesund" oder "traurig" </i> in <i> russisch </i>?</a></li>' .
							// korean
						// https://www.earthfluent.com/korean/culture-food-and-drink-part-21/view.php
					'<li> <a href="/korean/culture-food-and-drink-part-21/view.php">Wie sage ich <i> "Wodka", "Whisky", "Tequila" oder "Rum" </i> auf <i> Koreanisch </i>?</a></li>' .
						// https://www.earthfluent.com/korean/verbs-social-activity-part-1/view.php
					'<li> <a href="/korean/verbs-social-activity-part-1/view.php">Wie schreibe ich <i> "Say", "Tell", "Ask" oder "Show" </i> in <i> Koreanisch </i>?</a></li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">EarthFluent.com wurde am 7. April 2017 gegründet und gestartet. Seitdem unterrichten wir alles und alles, was wir über Sprache wissen!</p>'
			;
			
			break;
			
		case 'es':
					// Earth Fluent : Teaching Languages to the World
			$this->header_title_text = $this->master_record['Title'] . ' (Tierra fluida) : Enseñando lenguas al mundo';
					
					// I learned another language and another way of thinking today!
			$quote_text = '¡Aprendí otro idioma y otra forma de pensar hoy!';
				
					// Want to learn another language?  Learn Spanish, French, Italian, German, Japanese, Chinese, Hindi, Indonesian, Dutch, Polish, Portuguese, or Russian!
			$div_mouseover = '¿Quieres aprender otro idioma? ¡Aprenda español, francés, italiano, alemán, japonés, chino, hindi, indonesio, holandés, polaco, portugués o ruso!';
			
				// More Information About Us
			$about_header_title_text = 'Más información sobre nosotros';
					
					// Content Header Text
			
			$mission_header_text = 'Misión';
			$examples_header_text = 'Ejemplos';
			$uses_header_text = 'Usos';
			$history_header_text = 'Historia';
			$technology_header_text = 'Tecnología';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">¿Quieres comunicarte con alguien más en el planeta? ¿Quieres poder intercambiar las partes internas de tu corazón y alma con cualquier espíritu afín? Bueno, hoy, tus problemas son probablemente sociales, y no tecnológicos. ¡Solo necesitas hablar el idioma correcto para ser escuchado!</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">En EarthFluent, ese es el único objetivo: brindarte las herramientas que necesitas para educarte y aprender una docena de idiomas. Estas herramientas son visuales y auditivas, basadas en la palabra escrita y en la palabra hablada. Puede aprender escuchando frases, probando frases con un micrófono, haciendo pruebas de cualquier cantidad de palabras o lecciones, jugando crucigramas y otros juegos, o comunicándose con otros en la sección de comentarios. Las formas en que puede aprender deben ser tan infinitas como la diversidad de los seres humanos. No estamos aquí para moldearlo en este estudiante o ese estudiante, estamos aquí para hacer una cosa: enseñarle a hablar, escribir y comunicarse en otro idioma. Eso es EarthFluent.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Hay dos objetivos que se están satisfaciendo aquí: reunir a las personas de una manera que beneficie mutuamente a todos los participantes, y proporcionar toda la tecnología necesaria para hacer posible el autoaprendizaje a escala global. No podemos darle los altavoces, pero le daremos clips de audio de las frases; no podemos proporcionarle un micrófono, pero probaremos la salida de su micrófono con el acento y los patrones de idioma esperados; No podemos darle acceso a Internet, pero podemos ofrecerle un juego de preguntas basado en la Búsqueda de imágenes de Google para probar la memoria de su idioma. Si nos das la energía, nosotros te daremos el conocimiento. Este servicio está dedicado a ser gratuito y totalmente accesible. (¡Incluso hay un proyecto de GitHub!)</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">¿A donde quieres ir? Europa, Asia, América del Sur, África, América del Norte o Australia? ¡Echa un vistazo a un idioma, educate en él y encajarás perfectamente entre los locales!</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px margin-top-22px">Entonces, ¿cómo funciona realmente todo <i> trabajo </i>? Con tantos productos comerciales disponibles para la enseñanza y muchos de ellos ofreciendo menos lecciones, <i> ¿cómo podemos hacer esto gratis? </i> ¿Y aún así vale la pena, como experiencia personal y precisa, en un sentido lingüístico y académico? Las respuestas son más fáciles de lo que piensas.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Escuchando audio :</i></b> Esto se compone realmente utilizando la API SpeechSynthesis proporcionada en HTML5. Nada mágico aquí, solo una especificación web que ha sido trabajada durante una década por miles de profesionales de la industria. Esta API actualmente admite 14 idiomas en múltiples dialectos, con más agregados regularmente.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Prueba de hablar en el micrófono :</i></b> Nuevamente, esto es solo otra parte de la especificación HTML5, en este caso, la API SpeechRecognition. También es mantenido y diseñado por profesionales.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Pruebas basadas en imágenes :</i></b> Esta es una combinación de las tecnologías anteriores y la API de búsqueda de imágenes de Google. Las imágenes que se muestran para una palabra que se pregunta son de estas búsquedas de imágenes. Eso significa que se trata de imágenes nuevas y de uso regular que las personas usan en realidad, mientras que los productos comerciales tienden a tener fotografías muy antiguas y obsoletas, de poco valor o interés para los estudiantes.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Entonces, <i> ¿qué significa exactamente esto para nosotros? </i> usamos tecnologías populares, bien mantenidas y bien utilizadas. La voz de audio que escuchas cuando escuchas francés, es la misma voz que un teléfono celular en París utilizaría para hablarle a su usuario (porque Android y iPhone usan debidamente las especificaciones de HTML5).</p>' . 
				
				'<p class="margin-0px text-indent-50px margin-top-22px">¿Qué significa eso para todos los demás productos de aprendizaje de idiomas? ¡Significa que son mantenidos por gramáticos aburridos y desinteresados, encerrados en sus salas de aprendizaje latinas y griegas antiguas, sin ninguna conexión lingüística con la lengua viva de cualquier persona del planeta! Una empresa comercial difícilmente puede costear más que un puñado de investigadores: ¡las herramientas anteriores, en audio, voz e imagen, están trabajadas por millones de manos! Piense en los ingenieros de Google a los creadores de especificaciones HTML5 a los creadores de estándares internacionales. Compare cuántas manos trabajan en las tecnologías de nuestro producto, y compárelas con los productos líderes del mercado, ¡y hay un millón de mentes detrás de la tecnología aquí por cada mente que empleen.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Y, por supuesto, somos de código abierto! EarthFluent.com se crea utilizando el <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, un sistema de gestión de contenido diseñado para potencia, velocidad y escalabilidad.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Esta tecnología, que utiliza PHP7 y MySQL5, proporciona toda la funcionalidad de este sitio web. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> ¡Visítenos en GitHub! </a></p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">A continuación se presentan los usos comunes de este sitio ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
				
				'<ul>' .
					'<li> ¿Cómo escribo en <i> español </i>? ¿Cómo hablo en <i> español </i>? ¿Cómo me comunico en <i> español </i>?</li>' .
					'<li> ¿Cómo escribo en <i> francés </i>? ¿Cómo hablo en <i> francés </i>? ¿Cómo me comunico en <i> francés </i>?</li>' .
					'<li> ¿Cómo escribo en <i> italiano </i>? ¿Cómo hablo en <i> italiano </i>? ¿Cómo me comunico en <i> italiano </i>?</li>' .
					'<li> ¿Cómo escribo en <i> alemán </i>? ¿Cómo hablo en <i> alemán </i>? ¿Cómo me comunico en <i> alemán </i>?</li>' .
					'<li> ¿Cómo escribo en <i> japonés </i>? ¿Cómo hablo en <i> japonés </i>? ¿Cómo me comunico en <i> japonés </i>?</li>' .
					'<li> ¿Cómo escribo en <i> chino </i>? ¿Cómo hablo en <i> chino </i>? ¿Cómo me comunico en <i> chino </i>?</li>' .
					'<li> ¿Cómo escribo en <i> hindi </i>? ¿Cómo hablo en <i> hindi </i>? ¿Cómo me comunico en <i> hindi </i>?</li>' .
					'<li> ¿Cómo escribo en <i> indonesio </i>? ¿Cómo hablo en <i> indonesio </i>? ¿Cómo me comunico en <i> indonesio </i>?</li>' .
					'<li> ¿Cómo escribo en <i> holandés </i>? ¿Cómo hablo en <i> holandés </i>? ¿Cómo me comunico en <i> holandés </i>?</li>' .
					'<li> ¿Cómo escribo en <i> polaco </i>? ¿Cómo hablo en <i> polaco </i>? ¿Cómo me comunico en <i> polaco </i>?</li>' .
					'<li> ¿Cómo escribo en <i> portugués </i>? ¿Cómo hablo en <i> portugués </i>? ¿Cómo me comunico en <i> portugués </i>?</li>' .
					'<li> ¿Cómo escribo en <i> ruso </i>? ¿Cómo hablo en <i> ruso </i>? ¿Cómo me comunico en <i> ruso </i>?</li>' .
					'<li> ¿Cómo escribo en <i> coreano </i>? ¿Cómo hablo en <i> coreano </i>? ¿Cómo me comunico en <i> coreano </i>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">A continuación se muestran algunos usos de ejemplo del sitio ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
					
				'<ul>' .
							// spanish
						// https://www.earthfluent.com/spanish/culture-food-and-drink-part-21/view.php
					'<li> <a href="/spanish/culture-food-and-drink-part-21/view.php">¿Cómo digo <i> "Reunirse", "Hablar", "Sugerir" o "Hablar" </i> en <i> español </i>?</a></li>' .
						// https://www.earthfluent.com/spanish/nouns-animals-part-1/view.php
					'<li> <a href="/spanish/nouns-animals-part-1/view.php">¿Cómo escribo <i> "Oveja", "Vaca", "Dragón de Komodo" o "Porcupine" </i> en <i> Español </i>?</a></li>' .
							// french
						// https://www.earthfluent.com/french/entertainment-sports-part-5/view.php
					'<li> <a href="/french/entertainment-sports-part-5/view.php">¿Cómo digo <i> "Surfing", "Skateboarding", "Dodgeball" o "Rock Climbing" </i> en <i> French </i>?</a></li>' .
						// https://www.earthfluent.com/french/nouns-animals-part-5/view.php
					'<li> <a href="/french/nouns-animals-part-5/view.php">¿Cómo escribo <i> "Pez", "Tiburón", "Búho" o "Conejo" </i> en <i> Francés </i>?</a></li>' .
							// italian
						// https://www.earthfluent.com/italian/nouns-objects-part-3/view.php
					'<li> <a href="/italian/nouns-objects-part-3/view.php">¿Cómo digo <i> "Papel", "Tabla", "Producto" o "Comida" </i> en <i> Italiano </i>?</a></li>' .
						// https://www.earthfluent.com/italian/verbs-general-activity-part-11/view.php
					'<li> <a href="/italian/verbs-general-activity-part-11/view.php">¿Cómo escribo <i> "Lograr", "Elegir", "Falla" o "Servir" </i> en <i> italiano </i>?</a></li>' .
							// german
						// https://www.earthfluent.com/german/nouns-society-part-72/view.php
					'<li> <a href="/german/nouns-society-part-72/view.php">¿Cómo digo <i> "Boda", "Baile", "Promesa" o "Jubilación" </i> en <i> Alemán </i>?</a></li>' .
						// https://www.earthfluent.com/german/adjectives-quality-part-7/view.php
					'<li> <a href="/german/adjectives-quality-part-7/view.php">¿Cómo escribo <i> "afortunado", "querido", "plano" o "mojado" </i> en <i> alemán </i>?</a></li>' .
							// japanese
						// https://www.earthfluent.com/japanese/nouns-places-part-19/view.php
					'<li> <a href="/japanese/nouns-places-part-19/view.php">¿Cómo digo <i> "valle", "lago", "pub" o "restaurante" </i> en <i> japonés </i>?</a></li>' .
						// https://www.earthfluent.com/japanese/nouns-places-part-25/view.php
					'<li> <a href="/japanese/nouns-places-part-25/view.php">¿Cómo escribo <i> "plataforma", "flujo", "aeropuerto" o "provincia" </i> en <i> japonés </i>?</a></li>' .
							// chinese
						// https://www.earthfluent.com/chinese/nouns-society-part-12/view.php
					'<li> <a href="/chinese/nouns-society-part-12/view.php">¿Cómo digo "comercio", "entrenamiento", "relación" o "regla"? <i> en <i> chino </i>?</a></li>' .
						// https://www.earthfluent.com/chinese/nouns-places-part-25/view.php
					'<li> <a href="/chinese/nouns-places-part-25/view.php">¿Cómo escribo <i> "alcance", "caminar", "subir" o "atrapar" </i> en <i> chino </i>?</a></li>' .
							// hindi
						// https://www.earthfluent.com/hindi/nouns-people-part-55/view.php
					'<li> <a href="/hindi/nouns-people-part-55/view.php">¿Cómo digo <i> "comerciante", "magistrado", "participante" o "refugiado" </i> en <i> hindi </i>?</a></li>' .
						// https://www.earthfluent.com/hindi/nouns-places-part-25/view.php
					'<li> <a href="/hindi/nouns-places-part-25/view.php">¿Cómo escribo <i> "jefe", "ciudadano", "editor" o "general" </i> en <i> hindi </i>?</a></li>' .
							// indonesian
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-2/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-2/view.php">¿Cómo digo <i> "considerar", "esperar", "leer" o "recordar" </i> en <i> indonesio </i>?</a></li>' .
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-8/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-8/view.php">¿Cómo escribo <i> "examinar", "estudiar", "reconocer" o "mirar" </i> en <i> indonesio </i>?</a></li>' .
							// dutch
						// https://www.earthfluent.com/dutch/nouns-ideas-part-13/view.php
					'<li> <a href="/dutch/nouns-ideas-part-13/view.php">¿Cómo digo <i> "esperanza", "significado", "evaluación" o "consideración" </i> en <i> holandés </i>?</a></li>' .
						// https://www.earthfluent.com/dutch/nouns-society-part-25/view.php
					'<li> <a href="/dutch/nouns-society-part-25/view.php">¿Cómo escribo <i> "deal", "payment", "agency" o "collection" </i> en <i> Dutch </i>?</a></li>' .
							// polish
						// https://www.earthfluent.com/polish/verbs-economic-activity-part-5/view.php
					'<li> <a href="/polish/verbs-economic-activity-part-5/view.php">¿Cómo digo <i> "depender", "ganar", "cobrar" o "emplear" </i> en <i> polaco </i>?</a></li>' .
						// https://www.earthfluent.com/polish/verbs-emotional-activity-part-2/view.php
					'<li> <a href="/polish/verbs-emotional-activity-part-2/view.php">¿Cómo escribo <i> "amor", "disfrutar", "relacionar" o "sufrir" </i> en <i> polaco </i>?</a></li>' .
							// portuguese
						// https://www.earthfluent.com/portuguese/nouns-society-part-42/view.php
  					'<li> <a href="/portuguese/nouns-society-part-42/view.php">¿Cómo digo <i> "libertad", "límite", "pensión" o "respeto" </i> en <i> portugués </i>?</a></li>' .
						// https://www.earthfluent.com/portuguese/nouns-society-part-48/view.php
					'<li> <a href="/portuguese/nouns-society-part-48/view.php">¿Cómo escribo <i> "muchedumbre", "plan de estudios", "violencia" o "ministerio" </i> en <i> portugués </i>?</a></li>' .
							// russian
						// https://www.earthfluent.com/russian/culture-calendar-part-3/view.php
					'<li> <a href="/russian/culture-calendar-part-3/view.php">¿Cómo digo <i> "septiembre", "octubre", "noviembre" o "diciembre" </i> en <i> ruso </i>?</a></li>' .
						// https://www.earthfluent.com/russian/adjectives-feeling-part-6/view.php
					'<li> <a href="/russian/adjectives-feeling-part-6/view.php">¿Cómo escribo <i> "culpable", "contento", "sano" o "triste" </i> en <i> ruso </i>?</a></li>' .
							// korean
						// https://www.earthfluent.com/korean/culture-food-and-drink-part-21/view.php
					'<li> <a href="/korean/culture-food-and-drink-part-21/view.php">¿Cómo digo <i> "vodka", "whisky", "tequila" o "ron" </i> en <i> coreano </i>?</a></li>' .
						// https://www.earthfluent.com/korean/verbs-social-activity-part-1/view.php
					'<li> <a href="/korean/verbs-social-activity-part-1/view.php">¿Cómo escribo <i> "decir", "decir", "preguntar" o "mostrar" </i> en <i> coreano </i>?</a></li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">EarthFluent.com fue creado y lanzado el 7 de abril de 2017. Desde entonces, hemos estado enseñando todo lo que sabemos sobre el idioma.</p>'
			;
			
			break;
			
		case 'fr':
					// Earth Fluent : Teaching Languages to the World
			$this->header_title_text = $this->master_record['Title'] . ' (Terre Courant) : Enseigner les langues au monde';
					
					// I learned another language and another way of thinking today!
			$quote_text = "J'ai appris une autre langue et une autre façon de penser aujourd'hui!";
				
					// Want to learn another language?  Learn Spanish, French, Italian, German, Japanese, Chinese, Hindi, Indonesian, Dutch, Polish, Portuguese, or Russian!
			$div_mouseover = "Voulez-vous apprendre une autre langue? Apprenez l'espagnol, le français, l'italien, l'allemand, le japonais, le chinois, l'hindi, l'indonésien, le néerlandais, le polonais, le portugais ou le russe!";
			
				// More Information About Us
			$about_header_title_text = 'Plus d\'informations sur nous';
					
					// Content Header Text
			
			$mission_header_text = 'Mission';
			$examples_header_text = 'Exemples';
			$uses_header_text = 'Les usages';
			$history_header_text = 'L\'histoire';
			$technology_header_text = 'Technologie';
			
					// Content Text
			
			$mission_info_text =
				"<p class=\"margin-0px text-indent-50px\">Voulez-vous communiquer avec quelqu'un d'autre sur la planète? Vous voulez pouvoir échanger les parties intérieures de votre cœur et de votre âme avec n'importe quel esprit apparenté? Eh bien, aujourd’hui, vos problèmes sont probablement sociaux et non technologiques. Vous avez juste besoin de parler la bonne langue pour être entendu!</p>" .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\">Chez EarthFluent, l’unique objectif est de vous fournir les outils nécessaires pour vous éduquer et apprendre une douzaine de langues. Ces outils sont visuels et auditifs, basés sur le mot écrit et sur le mot parlé. Vous pouvez apprendre en écoutant des phrases, en testant des phrases avec un microphone, en répondant à des quiz de mots ou de leçons, en jouant à des mots croisés et à d'autres jeux, ou en communiquant avec d'autres personnes dans la section commentaires. Les manières d'apprendre peuvent être aussi infinies que la diversité des êtres humains. Nous ne sommes pas ici pour vous transformer en cet étudiant ou cet étudiant, nous sommes ici pour faire une chose: vous apprendre à parler, écrire et communiquer dans une autre langue. C'est EarthFluent.</p>" .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\">Nous visons ici deux objectifs: réunir les personnes de manière à ce que tous les participants en bénéficient mutuellement et fournir toute la technologie nécessaire pour permettre l'autoapprentissage à l'échelle mondiale. Nous ne pouvons pas vous donner les intervenants, mais nous vous donnerons des extraits audio de phrases; nous ne pouvons pas vous donner de microphone, mais nous testerons la sortie de votre microphone en fonction des modèles d’accent et de langage attendus. Nous ne pouvons pas vous donner accès à Internet, mais nous pouvons également vous proposer un jeu-questionnaire basé sur Google Recherche d'images pour tester votre mémoire linguistique. Si vous nous donnez l'énergie, nous vous donnerons la connaissance. Ce service est consacré à être gratuit et complètement accessible. (Il y a même un projet GitHub!)</p>" .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Où veux-tu aller? Europe, Asie, Amérique du Sud, Afrique, Amérique du Nord ou Australie? Découvrez une langue, formez-vous et vous serez parfaitement intégré dans la population locale!</p>'
			;
			
			$technology_info_text =
				"<p class=\"margin-0px text-indent-50px margin-top-22px\">Alors, comment cela se passe-t-il, tout <i> fonctionne </i>? Avec autant de produits commerciaux disponibles pour l'enseignement, et beaucoup offrant moins de cours, <i> comment pouvons-nous le faire gratuitement </i>? Et toujours valables, en tant qu’expérience personnelle, et exactes, au sens linguistique et académique? Les réponses sont plus faciles que vous ne le pensez.</p>" .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\"><b><i>Ecouter de l'audio :</i></b> Ceci est en fait composé en utilisant l'API SpeechSynthesis fournie en HTML5. Rien de magique ici, juste une spécification Web élaborée depuis une décennie par des milliers de professionnels de l’industrie. Cette API prend actuellement en charge 14 langues dans plusieurs dialectes, et d’autres régulièrement ajoutées.</p>" .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\"><b><i>Test de parler au microphone :</i></b> Là encore, il ne s'agit que d'une autre partie de la spécification HTML5, en l'occurrence l'API SpeechRecognition. Il est également entretenu et conçu par des professionnels.</p>" .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\"><b><i>Quiz sur l'image :</i></b> Il s'agit d'une combinaison des technologies ci-dessus et de l'API Google Image Search. Les images affichées pour un mot interrogé proviennent de ces recherches d'images. Cela signifie que vous traitez avec des images fraîches et régulièrement utilisées que les gens utilisent réellement, alors que les produits commerciaux ont tendance à avoir des stockphotos très obsolètes et obsolètes, de peu de valeur ou d'intérêt pour les apprenants.</p>" .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\">Alors, <i> exactement ce que tout cela signifie pour nous? </I> Nous utilisons des technologies populaires, bien entretenues et bien utilisées. La voix audio que vous entendez lorsque vous écoutez le français, c'est la même voix qu'un téléphone portable parisien utiliserait pour parler à son utilisateur (car Android et l'iPhone utilisent consciencieusement les spécifications HTML5).</p>" . 
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\">Qu'est-ce que cela signifie <i> pour tout autre produit d'apprentissage des langues </i>? Cela signifie qu’ils sont entretenus par des grammairiens ennuyeux et indifférents, enfermés dans leurs salles d’apprentissage en latin et en grec ancien, sans aucun lien linguistique avec la langue vivante des peuples de la planète! Une entreprise commerciale peut difficilement se permettre plus qu'une poignée de chercheurs - les outils ci-dessus, en audio et en voix et image, sont travaillés à des millions de mains! Pensez aux ingénieurs de Google, aux rédacteurs de spécifications HTML5, aux créateurs de normes internationales. Comparez le nombre de mains travaillant dans les technologies de notre produit et comparez-le aux produits du marché leader. Il y a un million d'esprits derrière la technologie pour chaque esprit qu'ils emploient!</p>" .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\">Et bien sûr, nous sommes open-source! EarthFluent.com utilise le <a href=\"https://github.com/HoldOffHunger/GreenGluonCMS\" target=\"_blank\"> système de gestion de contenu Green Gluon </a>, conçu pour la gestion de la l'évolutivité.</p>" .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Cette technologie, utilisant PHP7 et MySQL5, fournit toutes les fonctionnalités de ce site Web. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Consultez-nous sur GitHub! </a></p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Voici les utilisations courantes de ce site ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
				
				'<ul>' .
					'<li> Comment écrire en <i> espagnol </i>? Comment parler en <i> espagnol </i>? Comment communiquer en <i> espagnol </i>?</li>' .
					'<li> Comment écrire en <i> français </i>? Comment parler en <i> français </i>? Comment communiquer en <i> français </i>?</li>' .
					'<li> Comment écrire en <i> Italien </i>? Comment parler en <i> italien </i>? Comment communiquer en <i> italien </i>?</li>' .
					'<li> Comment écrire en <i> allemand </i>? Comment parler en <i> allemand </i>? Comment communiquer en <i> allemand </i>?</li>' .
					'<li> Comment écrire en <i> japonais </i>? Comment parler en <i> japonais </i>? Comment communiquer en <i> japonais </i>?</li>' .
					'<li> Comment écrire en <i> chinois </i>? Comment parler en <i> chinois </i>? Comment communiquer en <i> chinois </i>?</li>' .
					'<li> Comment écrire en <i> hindi </i>? Comment parler en <i> Hindi </i>? Comment puis-je communiquer en <i> Hindi </i>?</li>' .
					'<li> Comment écrire en <i> Indonésien </i>? Comment parler en <i> Indonésien </i>? Comment communiquer en <i> Indonésien </i>?</li>' .
					'<li> Comment écrire en <i> néerlandais </i>? Comment parler en <i> néerlandais </i>? Comment communiquer en <i> néerlandais </i>?</li>' .
					'<li> Comment écrire en <i> polonais </i>? Comment parler en <i> polonais </i>? Comment communiquer en <i> polonais </i>?</li>' .
					'<li> Comment écrire en <i> portugais </i>? Comment parler en <i> portugais </i>? Comment communiquer en <i> portugais </i>?</li>' .
					'<li> Comment écrire en <i> russe </i>? Comment puis-je parler en <i> russe </i>? Comment puis-je communiquer en <i> russe </i>?</li>' .
					'<li> Comment écrire en <i> coréen </i>? Comment parler en <i> coréen </i>? Comment communiquer en <i> coréen </i>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Ci-dessous quelques exemples d\'utilisations du site ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
					
				'<ul>' .
							// spanish
						// https://www.earthfluent.com/spanish/culture-food-and-drink-part-21/view.php
					'<li> <a href="/spanish/culture-food-and-drink-part-21/view.php">Comment dire <i> "rencontrer", "parler", "suggérer" ou "parler" </i> en <i> espagnol </i>?</a></li>' .
						// https://www.earthfluent.com/spanish/nouns-animals-part-1/view.php
					'<li> <a href="/spanish/nouns-animals-part-1/view.php">Comment écrire <i> "mouton", "vache", "dragon komodo" ou "porc-épic" </i> en <i> espagnol </i>?</a></li>' .
							// french
						// https://www.earthfluent.com/french/entertainment-sports-part-5/view.php
					'<li> <a href="/french/entertainment-sports-part-5/view.php">Comment dire <i> "surfer", "skateboard", "dodgeball" ou "escalade" </i> en <i> français </i>?</a></li>' .
						// https://www.earthfluent.com/french/nouns-animals-part-5/view.php
					'<li> <a href="/french/nouns-animals-part-5/view.php">Comment écrire <i> "poisson", "requin", "hibou" ou "lapin" </i> en <i> français </i>?</a></li>' .
							// italian
						// https://www.earthfluent.com/italian/nouns-objects-part-3/view.php
					'<li> <a href="/italian/nouns-objects-part-3/view.php">Comment dire <i> "papier", "tableau", "produit" ou "aliment" </i> en <i> italien </i>?</a></li>' .
						// https://www.earthfluent.com/italian/verbs-general-activity-part-11/view.php
					'<li> <a href="/italian/verbs-general-activity-part-11/view.php">Comment puis-je écrire <i> "atteindre", "choisir", "échouer" ou "servir" </i> en <i> italien </i>?</a></li>' .
							// german
						// https://www.earthfluent.com/german/nouns-society-part-72/view.php
					'<li> <a href="/german/nouns-society-part-72/view.php">Comment dire <i> "mariage", "danse", "promesse" ou "retraite" </i> en <i> allemand </i>?</a></li>' .
						// https://www.earthfluent.com/german/adjectives-quality-part-7/view.php
					'<li> <a href="/german/adjectives-quality-part-7/view.php">Comment puis-je écrire <i> "chanceux", "cher", "plat" ou "humide" </i> en <i> allemand </i>?</a></li>' .
							// japanese
						// https://www.earthfluent.com/japanese/nouns-places-part-19/view.php
					'<li> <a href="/japanese/nouns-places-part-19/view.php">Comment dire <i> "vallée", "lac", "pub" ou "restaurant" </i> en <i> japonais </i>?</a></li>' .
						// https://www.earthfluent.com/japanese/nouns-places-part-25/view.php
					'<li> <a href="/japanese/nouns-places-part-25/view.php">Comment écrire <i> "plate-forme", "flux", "aéroport" ou "province" </i> en <i> japonais </i>?</a></li>' .
							// chinese
						// https://www.earthfluent.com/chinese/nouns-society-part-12/view.php
					'<li> <a href="/chinese/nouns-society-part-12/view.php">Comment dire <i> "échange", "formation", "relation" ou "règle" </i> en <i> chinois </i>?</a></li>' .
						// https://www.earthfluent.com/chinese/nouns-places-part-25/view.php
					'<li> <a href="/chinese/nouns-places-part-25/view.php">Comment puis-je écrire <i> "atteindre", "marcher", "monter" ou "attraper" </i> en <i> chinois </i>?</a></li>' .
							// hindi
						// https://www.earthfluent.com/hindi/nouns-people-part-55/view.php
					'<li> <a href="/hindi/nouns-people-part-55/view.php">Comment dire <i> "marchand", "magistrat", "participant" ou "réfugié" </i> en <i> hindi </i>?</a></li>' .
						// https://www.earthfluent.com/hindi/nouns-places-part-25/view.php
					'<li> <a href="/hindi/nouns-places-part-25/view.php">Comment écrire <i> "chef", "citoyen", "éditeur" ou "général" </i> en <i> hindi </i>?</a></li>' .
							// indonesian
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-2/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-2/view.php">Comment dire <i> "considérer", "attendre", "lire" ou "se souvenir" </i> dans <i> Indonésien </i></a></li>' .
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-8/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-8/view.php">Comment puis-je écrire <i> "examiner", "étudier", "reconnaître" ou "regarder" </i> en <i> Indonésien </i>?</a></li>' .
							// dutch
						// https://www.earthfluent.com/dutch/nouns-ideas-part-13/view.php
					'<li> <a href="/dutch/nouns-ideas-part-13/view.php">Comment dire <i> "espoir", "signification", "évaluation" ou "considération" </i> en <i> néerlandais </i>?</a></li>' .
						// https://www.earthfluent.com/dutch/nouns-society-part-25/view.php
					'<li> <a href="/dutch/nouns-society-part-25/view.php">Comment écrire <i> "deal", "paiement", "agence" ou "collection" </i> en <i> néerlandais </i></a></li>' .
							// polish
						// https://www.earthfluent.com/polish/verbs-economic-activity-part-5/view.php
					'<li> <a href="/polish/verbs-economic-activity-part-5/view.php">Comment dire <i> "dépendre", "gagner", "collecter" ou "employer" </i> en <i> polonais </i>?</a></li>' .
						// https://www.earthfluent.com/polish/verbs-emotional-activity-part-2/view.php
					'<li> <a href="/polish/verbs-emotional-activity-part-2/view.php">Comment écrire <i> "aimer", "profiter", "raconter" ou "souffrir" </i> en <i> polonais </i>?</a></li>' .
							// portuguese
						// https://www.earthfluent.com/portuguese/nouns-society-part-42/view.php
  					'<li> <a href="/portuguese/nouns-society-part-42/view.php">Comment dire <i> "liberté", "limite", "pension" ou "respect" </i> en <i> portugais </i>?</a></li>' .
						// https://www.earthfluent.com/portuguese/nouns-society-part-48/view.php
					'<li> <a href="/portuguese/nouns-society-part-48/view.php">Comment puis-je écrire <i> "foule", "curriculum", "violence" ou "ministère" </i> en <i> portugais </i>?</a></li>' .
							// russian
						// https://www.earthfluent.com/russian/culture-calendar-part-3/view.php
					'<li> <a href="/russian/culture-calendar-part-3/view.php">Comment dire <i> "septembre", "octobre", "novembre" ou "décembre" </i> en <i> russe </i>?</a></li>' .
						// https://www.earthfluent.com/russian/adjectives-feeling-part-6/view.php
					'<li> <a href="/russian/adjectives-feeling-part-6/view.php">Comment puis-je écrire <i> "coupable", "heureux", "en bonne santé" ou "triste" </i> en <i> russe </i>?</a></li>' .
							// korean
						// https://www.earthfluent.com/korean/culture-food-and-drink-part-21/view.php
					'<li> <a href="/korean/culture-food-and-drink-part-21/view.php">Comment dire <i> "vodka", "whisky", "tequila" ou "rhum" </i> en <i> coréen </i>?</a></li>' .
						// https://www.earthfluent.com/korean/verbs-social-activity-part-1/view.php
					'<li> <a href="/korean/verbs-social-activity-part-1/view.php">Comment puis-je écrire <i> "dire", "raconter", "demander" ou "afficher" </i> en <i> coréen </i>?</a></li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">EarthFluent.com a été créé et lancé le 7 avril 2017. Depuis, nous enseignons tout ce que nous savons sur la langue!</p>'
			;
			
			break;
			
		case 'ja':
					// Earth Fluent : Teaching Languages to the World
			$this->header_title_text = $this->master_record['Title'] . ' （地球に優しい） : 世界に言語を教える';
					
					// I learned another language and another way of thinking today!
			$quote_text = '今日は別の言語と別の考え方を学びました！';
				
					// Want to learn another language?  Learn Spanish, French, Italian, German, Japanese, Chinese, Hindi, Indonesian, Dutch, Polish, Portuguese, or Russian!
			$div_mouseover = '他の言語を学びたいですか？ スペイン語、フランス語、イタリア語、ドイツ語、日本語、中国語、ヒンディー語、インドネシア語、オランダ語、ポーランド語、ポルトガル語、またはロシア語を学びましょう！';
			
				// More Information About Us
			$about_header_title_text = '私たちについてのより詳しい情報';
					
					// Content Header Text
			
			$mission_header_text = 'ミッション';
			$examples_header_text = '例';
			$uses_header_text = '用途';
			$history_header_text = '歴史';
			$technology_header_text = 'テック';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">地球上の誰かとコミュニケーションを取りたいですか？ あなたの心と魂の内側の部分を、どんな親切な霊とも交換できるようになりたいですか？ さて、今日、あなたの問題はおそらく社会的なものであり、技術的なものではありません。 あなたはちょうど聞かれるために正しい言語を話す必要があります！</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">EarthFluentでは、それが唯一の目標です。自分を教育し、1ダース以上の言語を学ぶために必要なツールを提供することです。 これらのツールは、書かれた言葉と話し言葉に基づいて、視覚的および聴覚的です。 あなたはフレーズを聞くこと、マイクでフレーズをテストすること、単語やレッスンをいくつでもクイズすること、クロスワードパズルや他のゲームをすること、またはコメントセクションで他の人とコミュニケーションをとることによって学ぶことができます。 あなたが学ぶことができる方法は、人間の多様性と同じくらい無限であるべきです。 私たちはあなたをこの学生やその学生に形づくるためにここにいるのではありません。私たちは1つのことをするためにここにいます。 それはEarthFluentです。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">ここで満たされている2つの目標があります：すべての参加者が互いに利益を得るように人々を集めること、そしてグローバル規模の自己学習を可能にするのに必要なすべての技術を提供すること。 私たちはあなたにスピーカーをあげることはできませんが、フレーズのオーディオクリップをあなたにあげるでしょう。 あなたにマイクを渡すことはできませんが、期待されるアクセントと言語パターンに対してあなたのマイク出力をテストします。 インターネットへのアクセスは許可されていませんが、Google Image Searchベースのクイズゲームを提供して、言語記憶をテストすることができます。 あなたが私たちにエネルギーを与えるなら、私たちはあなたにあなたに知識を与えるでしょう。 このサービスは、無料で完全にアクセス可能であることに専念しています。 （GitHubプロジェクトもあります！）</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">どこへ行きたい？ ヨーロッパ、アジア、南アメリカ、アフリカ、北アメリカ、オーストラリアのどれですか。 言語をチェックして、その中で教育を受ければ、あなたは地元の人々の間で完璧にフィットするでしょう！</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px margin-top-22px">それでは、これはどのように実際にすべて<i>機能しますか</i>？ 非常に多くの市販製品が提供されており、それらの多くが提供するレッスン数が少ないため、<i>これを無料で実行できます</i> それでも、個人的な経験として、また言語的、学術的な意味で正確であることの両方に価値があるのでしょうか。 答えはあなたが思うよりも簡単です。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>音声を聞く :</i></b> これは実際にはHTML 5で提供されているSpeechSynthesis APIを使って構成されています。 ここで不思議なことは何もありません。数千の業界間専門家によって10年間にわたって開発されてきたWeb仕様です。 このAPIは現在、複数の方言で14の言語をサポートしており、さらに定期的に追加されています。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>マイクで話すテスト :</i></b> 繰り返しますが、これはHTML 5仕様のもう1つの部分、この場合はSpeechRecognition APIです。 それも、専門家によって維持および設計されています。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>画像ベースのクイズ :</i></b> これは上記の技術とGoogle Image Search APIの組み合わせです。 クイズされている単語に対して表示されている画像は、これらの画像検索からのものです。 それは、人々が実際に使用する新鮮で定期的に使用される画像を扱っていることを意味しますが、商用製品は非常に古くて時代遅れのストックフォトを持ち、学習者にとってほとんど価値がないか興味がありません。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">それでは、<i>これがすべて私たちにとって何を意味するのでしょうか？</i>私たちは人気があり、手入れが行き届いた、よく使用される技術を使用しています。 フランス語を聞いているときに聞こえる音声は、パリの携帯電話と同じ音声です（AndroidとiPhoneはHTML 5仕様を厳密に使用しているため）。</p>' . 
				
				'<p class="margin-0px text-indent-50px margin-top-22px">他のすべての言語学習製品にとって<i> </i>とはどういう意味ですか？ それは彼らがラテン語と古代ギリシャ語の学習ホールに閉じ込められ、退屈で興味をそそられていない文法学者によって維持されていることを意味します。 営利企業は一握りの研究者以上のものを買う余裕はない - オーディオ、音声および画像における上記のツールは、数百万の手によって取り組まれている！ HTML5のスペックライターから国際的なスタンダード作成者まで、Googleのエンジニアのことを考えてください。 私たちの製品の技術で何人の手が働いているかを比較し、それを主要な市場の製品と比較してください。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">そしてもちろん、私たちはオープンソースです。 EarthFluent.comは、パワー、スピード、スピードを重視したコンテンツ管理システムである<a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>を使用して構築されています。 スケーラビリティ</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">このテクノロジは、PHP 7とMySQL 5を使用して、このWebサイトのすべての機能を提供します。 <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> GitHubをご覧ください。</a></p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">以下はこのサイトの一般的な用途です...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
				
				'<ul>' .
					'<li> <i>スペイン語</i>で書くにはどうすればよいですか。 <i>スペイン語</i>で話すにはどうすればよいですか。 <i>スペイン語</i>でコミュニケーションをとるにはどうすればよいですか。</li>' .
					'<li> <i>フランス語</i>で書くにはどうすればよいですか。 <i>フランス語</i>で話すにはどうすればよいですか。 <i>フランス語</i>でコミュニケーションをとるにはどうすればよいですか。</li>' .
					'<li> <i>イタリア語</i>の書き方 <i>イタリア語</i>で話すにはどうすればよいですか。 <i>イタリア語</i>でコミュニケーションをとるにはどうすればよいですか。</li>' .
					'<li> <i>ドイツ語</i>で書くにはどうすればよいですか。 <i>ドイツ語</i>で話すにはどうすればよいですか。 <i>ドイツ語</i>でコミュニケーションをとるにはどうすればよいですか。</li>' .
					'<li> <i>日本語</i>で書くにはどうすればよいですか。 <i>日本語</i>で話すにはどうすればよいですか。 <i>日本語</i>でコミュニケーションする</li>' .
					'<li> <i>中国語</i>で書くにはどうすればよいですか。 <i>中国語</i>で話すにはどうすればよいですか。 <i>中国語</i>でコミュニケーションする</li>' .
					'<li> <i>ヒンディー語</i>を書くにはどうすればよいですか。 <i>ヒンディー語</i>で話す方法 <i>ヒンディー語</i>でコミュニケーションをとるにはどうすればよいですか。</li>' .
					'<li> <i>インドネシア語</i>で書くにはどうすればよいですか。 <i>インドネシア語</i>で話すにはどうすればよいですか。 <i>インドネシア語</i>でコミュニケーションをとるにはどうすればよいですか。</li>' .
					'<li> <i>オランダ</i>で書くにはどうすればよいですか。 <i>オランダ語</i>で話すにはどうすればよいですか。 <i>オランダ</i>でコミュニケーションをとるにはどうすればよいですか。</li>' .
					'<li> <i>ポーランド</i>を書くにはどうすればよいですか。 <i>ポーランド</i>で話す方法 <i>ポーランド</i>でコミュニケーションをとるにはどうすればよいですか。</li>' .
					'<li> <i>ポルトガル語</i>で書くにはどうすればよいですか。 <i>ポルトガル語</i>で話すにはどうすればよいですか。 <i>ポルトガル語</i>でコミュニケーションをとるにはどうすればよいですか。</li>' .
					'<li> <i>ロシア語</i>で書くにはどうすればよいですか。 <i>ロシア語</i>で話すにはどうすればよいですか。 <i>ロシア語</i>でコミュニケーションをとるにはどうすればよいですか。</li>' .
					'<li> <i>韓国語</i>で書くにはどうすればよいですか。 <i>韓国語</i>で話すにはどうすればよいですか。 <i>韓国語</i>でコミュニケーションをとるにはどうすればよいですか。</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">下記はサイトの使用例です。</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
					
				'<ul>' .
							// spanish
						// https://www.earthfluent.com/spanish/culture-food-and-drink-part-21/view.php
					'<li> <a href="/spanish/culture-food-and-drink-part-21/view.php">どのように私は、<i>が "提案"、 "話" を "満たす"、または "話す" と言うん</i>の中に<私>スペイン語</I>？</a></li>' .
						// https://www.earthfluent.com/spanish/nouns-animals-part-1/view.php
					'<li> <a href="/spanish/nouns-animals-part-1/view.php">どのように私は<i>は "羊"、 "牛"、 "コモドオオトカゲ"、または "ヤマアラシ" </I> <I>スペイン語</I>で書くのですか？</a></li>' .
							// french
						// https://www.earthfluent.com/french/entertainment-sports-part-5/view.php
					'<li> <a href="/french/entertainment-sports-part-5/view.php">私は<私> "サーフィン"、 "スケートボード"、 "ドッジボール"、または "ロッククライミング" </I> <I>フランス語</I>でどのように言うのですか？</a></li>' .
						// https://www.earthfluent.com/french/nouns-animals-part-5/view.php
					'<li> <a href="/french/nouns-animals-part-5/view.php">どのように私は<i>は "魚"、 "サメ"、 "フクロウ"、または "ウサギ" </I>での<I>フランス語</i>を書くのですか？</a></li>' .
							// italian
						// https://www.earthfluent.com/italian/nouns-objects-part-3/view.php
					'<li> <a href="/italian/nouns-objects-part-3/view.php">私は<私> "紙"、 "テーブル"、 "製品"、または "食品" </I> <I>イタリア</I>でどのように言うのですか？</a></li>' .
						// https://www.earthfluent.com/italian/verbs-general-activity-part-11/view.php
					'<li> <a href="/italian/verbs-general-activity-part-11/view.php"><i>イタリア語</i>に<i> "達成"、 "選択"、 "失敗"、または "提供" </i>を書くにはどうすればよいですか。</a></li>' .
							// german
						// https://www.earthfluent.com/german/nouns-society-part-72/view.php
					'<li> <a href="/german/nouns-society-part-72/view.php"><i>ドイツ語</i>で<i> "結婚式"、 "ダンス"、 "約束"、または "引退"と言うにはどうすればよいですか。</a></li>' .
						// https://www.earthfluent.com/german/adjectives-quality-part-7/view.php
					'<li> <a href="/german/adjectives-quality-part-7/view.php"><i>ドイツ語</i>で<i> "ラッキー"、 "ディア"、 "フラット"、 "ウェット" </i>をどのように書くのですか</a></li>' .
							// japanese
						// https://www.earthfluent.com/japanese/nouns-places-part-19/view.php
					'<li> <a href="/japanese/nouns-places-part-19/view.php">私は<私> "谷"、 "湖"、 "パブ"、または "レストラン" </I> <I>日本の</I>でどのように言うのですか？</a></li>' .
						// https://www.earthfluent.com/japanese/nouns-places-part-25/view.php
					'<li> <a href="/japanese/nouns-places-part-25/view.php">どのように私は、 "ストリーム"、 "空港"、または "州" </I> <I>日本の</I>で、<I> "プラットフォーム" 書くのですか？</a></li>' .
							// chinese
						// https://www.earthfluent.com/chinese/nouns-society-part-12/view.php
					'<li> <a href="/chinese/nouns-society-part-12/view.php"><i>中国語</i>で<i> "貿易"、 "トレーニング"、 "関係"、または "ルール" </i>をどのように言いますか。</a></li>' .
						// https://www.earthfluent.com/chinese/nouns-places-part-25/view.php
					'<li> <a href="/chinese/nouns-places-part-25/view.php">どのように私は、<I>、 "リーチ" "歩く"、 "上昇"、または "キャッチ" </I>での<I>中国</i>を書くのですか？</a></li>' .
							// hindi
						// https://www.earthfluent.com/hindi/nouns-people-part-55/view.php
					'<li> <a href="/hindi/nouns-people-part-55/view.php">私は "奉行"、 "参加者"、または "難民" とは、</I> <I>ヒンディー語</I>で、<i>が "商人" どのように言うのですか？</a></li>' .
						// https://www.earthfluent.com/hindi/nouns-places-part-25/view.php
					'<li> <a href="/hindi/nouns-places-part-25/view.php">どのように私は<i>は、 "チーフ"、 "市民"、 "編集者"、または "一般" </I> <I>ヒンディー語</I>で書くのですか？</a></li>' .
							// indonesian
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-2/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-2/view.php">私は<i>が "読み取り"、 "期待する"、 "考える"、または "覚えている" </I> <I>インドネシア</I>でどのように言うのですか？</a></li>' .
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-8/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-8/view.php">どのように私は<私> "調べる" 書くか、 "研究"、 "認識"、または</I> <I>インドネシア</I>で "凝視"？</a></li>' .
							// dutch
						// https://www.earthfluent.com/dutch/nouns-ideas-part-13/view.php
					'<li> <a href="/dutch/nouns-ideas-part-13/view.php">私は<私>、 "アセスメント" "意味" "希望"、または "配慮" </I> <I>オランダ</I>でどのように言うのですか？</a></li>' .
						// https://www.earthfluent.com/dutch/nouns-society-part-25/view.php
					'<li> <a href="/dutch/nouns-society-part-25/view.php">どのように私が書くん<i>の "取引"、 "支払い"、 "代理店"、または "コレクション" </I>での<I>オランダ</I>？</a></li>' .
							// polish
						// https://www.earthfluent.com/polish/verbs-economic-activity-part-5/view.php
					'<li> <a href="/polish/verbs-economic-activity-part-5/view.php">私は<i>が "依存"、 "ゲイン" はどのように言うか、 "収集"、または "採用" </I> <I>ポーランド</I>で？</a></li>' .
						// https://www.earthfluent.com/polish/verbs-emotional-activity-part-2/view.php
					'<li> <a href="/polish/verbs-emotional-activity-part-2/view.php">どのように私は、<I> "愛" "楽しむ"、 "関係" の書き込み、または</I> <I>ポーランド</I>で "苦しむ" のか？</a></li>' .
							// portuguese
						// https://www.earthfluent.com/portuguese/nouns-society-part-42/view.php
  					'<li> <a href="/portuguese/nouns-society-part-42/view.php">私は<私> "自由"、 "制限"、 "年金"、または "尊重" </I> <I>ポルトガル語</I>でどのように言うのですか？</a></li>' .
						// https://www.earthfluent.com/portuguese/nouns-society-part-48/view.php
					'<li> <a href="/portuguese/nouns-society-part-48/view.php"><I> "群衆"、 "カリキュラム"、 "暴力"、または "省" </I> <I>ポルトガル語</I>でどのように書くのですか？</a></li>' .
							// russian
						// https://www.earthfluent.com/russian/culture-calendar-part-3/view.php
					'<li> <a href="/russian/culture-calendar-part-3/view.php">私は<私> "9月"、 "10月"、 "11月"、または "12月" </I> <I>ロシア</I>でどのように言うのですか？</a></li>' .
						// https://www.earthfluent.com/russian/adjectives-feeling-part-6/view.php
					'<li> <a href="/russian/adjectives-feeling-part-6/view.php">どのように私は、<I>が</I> <I>ロシア</I>で、 "有罪" "嬉しい"、 "健康"、または "悲しい" 書くのですか？</a></li>' .
							// korean
						// https://www.earthfluent.com/korean/culture-food-and-drink-part-21/view.php
					'<li> <a href="/korean/culture-food-and-drink-part-21/view.php">私は<私> "ウォッカ"、 "ウイスキー"、 "テキーラ"、または "ラム酒" </I>での<I>韓国</i>をどのように言うのですか？</a></li>' .
						// https://www.earthfluent.com/korean/verbs-social-activity-part-1/view.php
					'<li> <a href="/korean/verbs-social-activity-part-1/view.php"><i>が</I>での<私>韓国</i>の "頼む"、 "伝える"、または "ショー"、どのように書くのですか "と言いますか"？</a></li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">EarthFluent.comは、2017年4月7日に作成され、起動されました。それ以来、私たちは言語について知っていることすべてを教えています！</p>'
			;
			
			break;
			
		case 'it':
					// Earth Fluent : Teaching Languages to the World
			$this->header_title_text = $this->master_record['Title'] . ' (Earth Fluent) : Insegnare le lingue al mondo';
					
					// I learned another language and another way of thinking today!
			$quote_text = "Ho imparato un'altra lingua e un altro modo di pensare oggi!";
				
					// Want to learn another language?  Learn Spanish, French, Italian, German, Japanese, Chinese, Hindi, Indonesian, Dutch, Polish, Portuguese, or Russian!
			$div_mouseover = "Vuoi imparare un'altra lingua? Impara spagnolo, francese, italiano, tedesco, giapponese, cinese, hindi, indonesiano, olandese, polacco, portoghese o russo!";
			
				// More Information About Us
			$about_header_title_text = 'Ulteriori informazioni su di noi';
					
					// Content Header Text
			
			$mission_header_text = 'Missione';
			$examples_header_text = 'Esempi';
			$uses_header_text = 'Usi';
			$history_header_text = 'Storia';
			$technology_header_text = 'Tecnologia';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Vuoi comunicare con chiunque altro sul pianeta? Vuoi essere in grado di scambiare le parti interiori del tuo cuore e anima con qualsiasi spirito affine? Bene, oggi i tuoi problemi sono probabilmente sociali e non tecnologici. Hai solo bisogno di parlare la lingua giusta per essere ascoltato!</p>' .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\">A EarthFluent, questo è l'unico obiettivo: fornirti gli strumenti necessari per educare te stesso e imparare una dozzina di lingue. Questi strumenti sono visivi e uditivi, basati sulla parola scritta e sulla parola parlata. Puoi imparare ascoltando frasi, testare frasi con un microfono, fare quiz di un numero qualsiasi di parole o lezioni, giocare a cruciverba e altri giochi, o comunicando con gli altri nella sezione commenti. I modi in cui puoi imparare devono essere infiniti quanto la diversità degli esseri umani. Non siamo qui per modellarti in questo studente o in quello studente, siamo qui per fare una cosa: insegnarti a parlare, scrivere e comunicare in un'altra lingua. Questo è EarthFluent.</p>" .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\">Ci sono due obiettivi che vengono soddisfatti qui: riunire le persone in un modo che avvantaggia reciprocamente tutti i partecipanti e fornire tutta la tecnologia necessaria per rendere possibile l'auto-apprendimento di scala globale. Non possiamo darti gli altoparlanti, ma ti forniremo clip audio di frasi; non possiamo darti un microfono, ma testeremo l'uscita del tuo microfono in base agli accenti e ai modelli linguistici previsti; non possiamo fornirti l'accesso a Internet, ma possiamo darti un gioco a quiz basato su Google Ricerca Immagini per testare la tua memoria linguistica. Se ci dai l'energia, ti forniremo la conoscenza. Questo servizio è dedicato alla gratuità e alla completa accessibilità. (C'è persino un progetto GitHub!)</p>" .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\">Dove vuoi andare? Europa, Asia, Sud America, Africa, Nord America o Australia? Dai un'occhiata a una lingua, imparaci, e ti troverai perfettamente in sintonia con la gente del posto!</p>"
			;
			
			$technology_info_text =
				"<p class=\"margin-0px text-indent-50px margin-top-22px\">Quindi, in che modo tutto questo <i> funziona </i>? Con così tanti prodotti commerciali disponibili per l'insegnamento, e molti di loro offrono meno lezioni, <i> come possiamo farlo gratuitamente </i>? E valga ancora la pena, come esperienza personale e accurata, in un senso linguistico e accademico? Le risposte sono più facili di quanto tu possa pensare.</p>" .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\"><b><i>Ascoltando l'audio :</i></b> Questo è in realtà composto utilizzando l'API SpeechSynthesis fornita in HTML5. Niente di magico qui, solo una specifica web che è stata elaborata per un decennio da migliaia di professionisti inter-industria. Questa API attualmente supporta 14 lingue in più dialetti, con più aggiunte regolarmente.</p>" .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Testing parlando sul microfono :</i></b> Nuevamente, esto es solo otra parte de la especificación HTML5, en este caso, la API SpeechRecognition. También es mantenido y diseñado por profesionales.</p>' .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\"><b><i>Quiz basati su immagini :</i></b> Questa è una combinazione delle tecnologie sopra citate e dell'API di Google Image Search. Le immagini visualizzate per una parola interrogata provengono da queste ricerche di immagini. Ciò significa che hai a che fare con immagini fresche e usate regolarmente che le persone effettivamente usano, mentre i prodotti commerciali tendono ad avere immagini in archivio stantie, obsolete, di scarso valore o interesse per gli studenti.</p>" .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Quindi, <i> esattamente cosa significa tutto questo per noi? </I> Utilizziamo tecnologie popolari, ben curate e ben utilizzate. La voce audio che senti quando ascolti il francese, che è la stessa voce di un cellulare a Parigi, userebbe parlare con il suo utente (perché Android e iPhone usano diligentemente le specifiche HTML5).</p>' . 
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\">Cosa significa <i> per ogni altro prodotto di apprendimento linguistico </i>? Significa che sono mantenuti da noiosi, disinteressati grammatici, rinchiusi nei loro padiglioni di cultura latina e antica-greca, senza alcuna connessione linguistica con il linguaggio vivente di nessuna persona sul pianeta! Un'impresa commerciale può difficilmente permettersi più di una manciata di ricercatori: gli strumenti di cui sopra, nell'audio, nella voce e nell'immagine, sono elaborati da milioni di mani! Pensa agli ingegneri di Google agli autori di speculazioni HTML5 ai creatori di standard internazionali. Confronta quante mani lavorano nelle tecnologie del nostro prodotto e confrontalo con i prodotti leader del mercato e ci sono un milione di menti dietro la tecnologia qui per ogni mente che impiegano!</p>" .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">E, naturalmente, siamo open-source! EarthFluent.com è costruito utilizzando il <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, un sistema di gestione dei contenuti progettato per potenza, velocità e scalabilità.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Questa tecnologia, che utilizza PHP7 e MySQL5, fornisce tutte le funzionalità di questo sito web. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Controllaci su GitHub! </a></p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Di seguito sono gli usi comuni di questo sito ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
				
				'<ul>' .
					'<li> Come scrivere in <i> spagnolo </i>? Come parlo in <i> spagnolo </i>? Come posso comunicare in <i> spagnolo </i>?</li>' .
					'<li> Come scrivere in <i> francese </i>? Come parlo in <i> francese </i>? Come posso comunicare in <i> francese </i>?</li>' .
					'<li> Come scrivere in <i> italiano </i>? Come parlo in <i> italiano </i>? Come posso comunicare in <i> italiano </i>?</li>' .
					'<li> Come scrivere in <i> tedesco </i>? Come parlo in <i> tedesco </i>? Come posso comunicare in <i> tedesco </i>?</li>' .
					'<li> Come scrivere in <i> giapponese </i>? Come parlo in <i> giapponese </i>? Come posso comunicare in <i> giapponese </i>?</li>' .
					'<li> Come scrivere in <i> cinese </i>? Come parlo in <i> cinese </i>? Come posso comunicare in <i> cinese </i>?</li>' .
					'<li> Come scrivere in <i> Hindi </i>? Come parlo in <i> Hindi </i>? Come posso comunicare in <i> Hindi </i>?</li>' .
					'<li> Come scrivere in <i> indonesiano </i>? Come parlo in <i> indonesiano </i>? Come posso comunicare in <i> indonesiano </i>?</li>' .
					'<li> Come scrivere in <i> olandese </i>? Come parlo in <i> olandese </i>? Come posso comunicare in <i> olandese </i>?</li>' .
					'<li> Come scrivere in <i> polacco </i>? Come parlo in <i> polacco </i>? Come posso comunicare in <i> polacco </i>?</li>' .
					'<li> Come scrivere in <i> Portoghese </i>? Come parlo in <i> Portoghese </i>? Come posso comunicare in <i> Portoghese </i>?</li>' .
					'<li> Come scrivere in <i> Russo </i>? Come parlo in <i> russo </i>? Come posso comunicare in <i> Russo </i>?</li>' .
					'<li> Come scrivere in <i> Coreano </i>? Come parlo in <i> Coreano </i>? Come posso comunicare in <i> Coreano </i>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Di seguito sono riportati alcuni esempi di utilizzo del sito ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
					
				'<ul>' .
							// spanish
						// https://www.earthfluent.com/spanish/culture-food-and-drink-part-21/view.php
					'<li> <a href="/spanish/culture-food-and-drink-part-21/view.php">Come posso dire <i> "incontrare", "parlare", "suggerire" o "parlare" </i> in <i> spagnolo </i>?</a></li>' .
						// https://www.earthfluent.com/spanish/nouns-animals-part-1/view.php
					'<li> <a href="/spanish/nouns-animals-part-1/view.php">Come scrivo <i> "pecora", "mucca", "drago di Komodo" o "porcospino" </i> in <i> spagnolo </i>?</a></li>' .
							// french
						// https://www.earthfluent.com/french/entertainment-sports-part-5/view.php
					'<li> <a href="/french/entertainment-sports-part-5/view.php">Come dico <i> "surfing", "skateboard", "dodgeball" o "arrampicata su roccia" </i> in <i> francese </i>?</a></li>' .
						// https://www.earthfluent.com/french/nouns-animals-part-5/view.php
					'<li> <a href="/french/nouns-animals-part-5/view.php">Come scrivo <i> "pesce", "squalo", "gufo" o "coniglio" </i> in <i> francese </i>?</a></li>' .
							// italian
						// https://www.earthfluent.com/italian/nouns-objects-part-3/view.php
					'<li> <a href="/italian/nouns-objects-part-3/view.php">Come si dice <i> "carta", "tabella", "prodotto" o "cibo" </i> in <i> italiano </i>?</a></li>' .
						// https://www.earthfluent.com/italian/verbs-general-activity-part-11/view.php
					'<li> <a href="/italian/verbs-general-activity-part-11/view.php">Come faccio a scrivere <i> "raggiungere", "scegliere", "fallire" o "servire" </i> in <i> italiano </i>?</a></li>' .
							// german
						// https://www.earthfluent.com/german/nouns-society-part-72/view.php
					'<li> <a href="/german/nouns-society-part-72/view.php">Come si dice <i> "matrimonio", "danza", "promessa" o "pensione" </i> in <i> tedesco </i>?</a></li>' .
						// https://www.earthfluent.com/german/adjectives-quality-part-7/view.php
					'<li> <a href="/german/adjectives-quality-part-7/view.php">Come scrivere <i> "fortunato", "caro", "piatto" o "bagnato" </i> in <i> tedesco </i>?</a></li>' .
							// japanese
						// https://www.earthfluent.com/japanese/nouns-places-part-19/view.php
					'<li> <a href="/japanese/nouns-places-part-19/view.php">Come si dice <i> "valle", "lago", "pub" o "ristorante" </i> in <i> giapponese </i>?</a></li>' .
						// https://www.earthfluent.com/japanese/nouns-places-part-25/view.php
					'<li> <a href="/japanese/nouns-places-part-25/view.php">Come scrivere <i> "piattaforma", "flusso", "aeroporto" o "provincia" </i> in <i> giapponese </i>?</a></li>' .
							// chinese
						// https://www.earthfluent.com/chinese/nouns-society-part-12/view.php
					'<li> <a href="/chinese/nouns-society-part-12/view.php">Come faccio a dire <i> "commercio", "formazione", "relazione", o "regola" </i> in <i> cinese </i>?</a></li>' .
						// https://www.earthfluent.com/chinese/nouns-places-part-25/view.php
					'<li> <a href="/chinese/nouns-places-part-25/view.php">Come faccio a scrivere <i> "Reach", "passeggiata", "aumento", o "catturare" </i> in <i> cinese </i>?</a></li>' .
							// hindi
						// https://www.earthfluent.com/hindi/nouns-people-part-55/view.php
					'<li> <a href="/hindi/nouns-people-part-55/view.php">Come si dice <i> "mercante", "magistrato", "partecipante" o "rifugiato" </i> in <i> hindi </i>?</a></li>' .
						// https://www.earthfluent.com/hindi/nouns-places-part-25/view.php
					'<li> <a href="/hindi/nouns-places-part-25/view.php">Come faccio a scrivere <i> "capo", "cittadino", "Editor" o "generale" </i> in <i> polacco </i>?</a></li>' .
							// indonesian
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-2/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-2/view.php">Come posso dire <i> "considerare", "aspettare", "leggere" o "ricordare" </i> in <i> indonesiano </i>?</a></li>' .
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-8/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-8/view.php">Come scrivo <i> "esaminare", "studiare", "riconoscere" o "fissare" </i> in <i> indonesiano </i>?</a></li>' .
							// dutch
						// https://www.earthfluent.com/dutch/nouns-ideas-part-13/view.php
					'<li> <a href="/dutch/nouns-ideas-part-13/view.php">Come posso dire <i> "speranza", "significato", "valutazione" o "considerazione" </i> in <i> olandese </i>?</a></li>' .
						// https://www.earthfluent.com/dutch/nouns-society-part-25/view.php
					'<li> <a href="/dutch/nouns-society-part-25/view.php">Come faccio a scrivere <i> "affare", "pagamento", "agenzia", o "collezione" </i> in <i> olandese </i>?</a></li>' .
							// polish
						// https://www.earthfluent.com/polish/verbs-economic-activity-part-5/view.php
					'<li> <a href="/polish/verbs-economic-activity-part-5/view.php">Come posso dire <i> "dipendere", "guadagnare", "raccogliere" o "impiegare" </i> in <i> polacco </i>?</a></li>' .
						// https://www.earthfluent.com/polish/verbs-emotional-activity-part-2/view.php
					'<li> <a href="/polish/verbs-emotional-activity-part-2/view.php">Come faccio a scrivere <i> "amore", "godere", "si riferiscono", o "soffrire" </i> in <i> polacco </i>?</a></li>' .
							// portuguese
						// https://www.earthfluent.com/portuguese/nouns-society-part-42/view.php
  					'<li> <a href="/portuguese/nouns-society-part-42/view.php">Come posso dire <i> "libertà", "limite", "pensione" o "rispetto" </i> in <i> portoghese </i>?</a></li>' .
						// https://www.earthfluent.com/portuguese/nouns-society-part-48/view.php
					'<li> <a href="/portuguese/nouns-society-part-48/view.php">Come scrivo <i> "folla", "curriculum", "violenza" o "ministero" </i> in <i> portoghese </i>?</a></li>' .
							// russian
						// https://www.earthfluent.com/russian/culture-calendar-part-3/view.php
					'<li> <a href="/russian/culture-calendar-part-3/view.php">Come si dice <i> "settembre", "ottobre", "novembre" o "dicembre" </i> in <i> russo </i>?</a></li>' .
						// https://www.earthfluent.com/russian/adjectives-feeling-part-6/view.php
					'<li> <a href="/russian/adjectives-feeling-part-6/view.php">Come scrivo <i> "colpevole", "felice", "sano" o "triste" </i> in <i> russo </i>?</a></li>' .
							// korean
						// https://www.earthfluent.com/korean/culture-food-and-drink-part-21/view.php
					'<li> <a href="/korean/culture-food-and-drink-part-21/view.php">Come si dice <i> "vodka", "whiskey", "tequila" o "rum" </i> in <i> coreano </i>?</a></li>' .
						// https://www.earthfluent.com/korean/verbs-social-activity-part-1/view.php
					'<li> <a href="/korean/verbs-social-activity-part-1/view.php">Come posso scrivere <i> "dire", "dire", "chiedere" o "mostrare" </i> in <i> coreano </i>?</a></li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">EarthFluent.com è stato creato e lanciato il 7 aprile 2017. Da allora, abbiamo insegnato tutto e tutto ciò che sappiamo sulla lingua!</p>'
			;
			
			break;
			
		case 'nl':
					// Earth Fluent : Teaching Languages to the World
			$this->header_title_text = $this->master_record['Title'] . ' (Earth Fluent) : Lesgeven aan de wereld';
					
					// I learned another language and another way of thinking today!
			$quote_text = 'Ik heb vandaag een andere taal geleerd en een andere manier van denken!';
				
					// Want to learn another language?  Learn Spanish, French, Italian, German, Japanese, Chinese, Hindi, Indonesian, Dutch, Polish, Portuguese, or Russian!
			$div_mouseover = 'Wil je een andere taal leren? Leer Spaans, Frans, Italiaans, Duits, Japans, Chinees, Hindi, Indonesisch, Nederlands, Pools, Portugees of Russisch!';
			
				// More Information About Us
			$about_header_title_text = 'Meer informatie over ons';
					
					// Content Header Text
			
			$mission_header_text = 'Missie';
			$examples_header_text = 'Voorbeelden';
			$uses_header_text = 'Toepassingen';
			$history_header_text = 'Geschiedenis';
			$technology_header_text = 'Technologie';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Wil je communiceren met iemand anders op deze planeet? Wil je de innerlijke delen van je hart en ziel kunnen ruilen met elke geestverwant? Welnu, vandaag zijn uw problemen waarschijnlijk sociaal en niet technologisch. Je hoeft alleen maar de juiste taal te spreken om gehoord te worden!</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Bij EarthFluent is dat het enige doel: je de tools geven die je nodig hebt om jezelf te onderwijzen en een van de twaalf talen te leren. Deze hulpmiddelen zijn visueel en auditief, gebaseerd op het geschreven woord en op het gesproken woord. Je kunt leren door te luisteren naar frases, frases uit te proberen met een microfoon, quizzen van een willekeurig aantal woorden of lessen te nemen, kruiswoordpuzzels en andere games te spelen, of door met anderen te communiceren in de comments. De manieren waarop je kunt leren, moeten net zo oneindig zijn als de diversiteit van mensen. We zijn niet hier om je te vermorzelen voor deze student of die student, we zijn hier om één ding te doen: om je te leren spreken, schrijven en communiceren in een andere taal. Dat is Earth Fluent.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Er zijn twee doelen waaraan wordt voldaan: mensen samenbrengen op een manier die alle deelnemers ten goede komt en alle technologie bieden die nodig is om zelfleren op een wereldwijde schaal mogelijk te maken. We kunnen u de luidsprekers niet geven, maar we zullen u audioclips met frasen geven; we kunnen je geen microfoon geven, maar we zullen je microfoonuitgang testen tegen verwachte accent- en taalpatronen; we kunnen u geen toegang tot internet geven, maar we kunnen u een op Google Image Search gebaseerd quizspel geven om uw taalgeheugen te testen. Als je ons de energie geeft, zullen we je de kennis geven. Deze dienst is gewijd aan het gratis en volledig toegankelijk zijn. (Er is zelfs een GitHub-project!)</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Waar wil je heen? Europa, Azië, Zuid-Amerika, Afrika, Noord-Amerika of Australië? Bekijk een taal, word erin opgeleid en je past perfect bij de lokale bevolking!</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px margin-top-22px">Dus, hoe werkt dit eigenlijk allemaal <i> werken </i>? Met zoveel commerciële producten die beschikbaar zijn voor lesgeven, en veel van hen die minder lessen aanbieden, <i> hoe kunnen we dit gratis doen </i>? En toch zijn beide de moeite waard, als een persoonlijke ervaring en accuraat, in een taalkundige en academische zin? De antwoorden zijn gemakkelijker dan je zou denken.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Luisteren naar audio :</i></b> Dit is eigenlijk samengesteld met behulp van de SpeechSynthesis API in HTML5. Niets magisch hier, slechts een webspecificatie die al meer dan tien jaar door duizenden professionals uit de industrie wordt uitgewerkt. Deze API ondersteunt momenteel 14 talen in meerdere dialecten, met meer regelmatig toegevoegd.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Testen spreken op microfoon :</i></b> Nogmaals, dit is gewoon een ander deel van de HTML5-specificatie, in dit geval de SpeechRecognition API. Het wordt ook onderhouden en ontworpen door professionals.</p>' .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\"><b><i>Op afbeeldingen gebaseerde quizzen :</i></b> Dit is een combinatie van de bovenstaande technologieën en Google Image Search API. De afbeeldingen die worden weergegeven voor een woord dat wordt ondervraagd, zijn afkomstig van deze zoekacties met afbeeldingen. Dat betekent dat u te maken hebt met verse, regelmatig gebruikte afbeeldingen die mensen daadwerkelijk gebruiken, terwijl commerciële producten over het algemeen erg verouderde, ouderwetse stockfoto's hebben, van weinig waarde of interessant voor leerlingen.</p>" .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Dus, <i> precies wat betekent dit allemaal voor ons? </I> We gebruiken populaire, goed onderhouden en goed gebruikte technologieën. De audio-stem die je hoort wanneer je naar het Frans luistert, dat is dezelfde stem als die een mobieltje in Parijs zou gebruiken om tegen de gebruiker te praten (omdat Android en iPhone trouwens de HTML5-specificaties gebruiken).</p>' . 
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Wat betekent dat <i> voor elk ander taalverwervend product </i>? Het betekent dat ze worden onderhouden door saaie, ongeïnteresseerde grammatici, opgesloten in hun Latijnse en oud-Griekse leerzalen, zonder enige taalkundige verbinding met de levende taal van alle mensen op deze planeet! Een commercieel bedrijf kan zich nauwelijks meer dan een handjevol onderzoekers veroorloven - de tools hierboven, in audio en spraak en beeld, worden door miljoenen handen bewerkt! Denk aan de technici bij Google aan de HTML5-spec-schrijvers aan internationale standaarden-makers. Vergelijk hoeveel handen werken in de technologieën van ons product, en vergelijk het met de leidende marktproducten, en er zijn een miljoen mensen achter de technologie hier voor iedereen die ze gebruiken!</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">En we zijn natuurlijk open-source! EarthFluent.com is gebouwd met behulp van de <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, een inhoudbeheersysteem dat is ontworpen voor kracht, snelheid en schaalbaarheid.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Deze technologie, met behulp van PHP7 en MySQL5, biedt alle functionaliteit van deze website. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Bekijk ons op GitHub! </a></p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Hieronder staan veel voorkomende toepassingen van deze site ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
				
				'<ul>' .
					'<li> Hoe schrijf ik in <i> Spaans </i>? Hoe spreek ik in <i> Spaans </i>? Hoe communiceer ik in <i> Spaans </i>?</li>' .
					'<li> Hoe schrijf ik in <i> Frans </i>? Hoe spreek ik in <i> Frans </i>? Hoe communiceer ik in <i> Frans </i>?</li>' .
					'<li> Hoe schrijf ik in <i> Italiaans </i>? Hoe spreek ik in <i> Italiaans </i>? Hoe communiceer ik in <i> Italiaans </i>?</li>' .
					'<li> Hoe schrijf ik in <i> Duits </i>? Hoe spreek ik in <i> Duits </i>? Hoe communiceer ik in <i> Duits </i>?</li>' .
					'<li> Hoe schrijf ik in <i> Japans </i>? Hoe spreek ik in <i> Japans </i>? Hoe communiceer ik in <i> Japans </i>?</li>' .
					'<li> Hoe schrijf ik in <i> Chinees </i>? Hoe spreek ik in <i> Chinees </i>? Hoe communiceer ik in <i> Chinees </i>?</li>' .
					'<li> Hoe schrijf ik in <i> Hindi </i>? Hoe spreek ik in <i> Hindi </i>? Hoe communiceer ik in <i> Hindi </i>?</li>' .
					'<li> Hoe schrijf ik in <i> Indonesisch </i>? Hoe spreek ik in <i> Indonesisch </i>? Hoe communiceer ik in <i> Indonesisch </i>?</li>' .
					'<li> Hoe schrijf ik in <i> Nederlands </i>? Hoe spreek ik in <i> Nederlands </i>? Hoe communiceer ik in <i> Nederlands </i>?</li>' .
					'<li> Hoe schrijf ik in <i> Pools </i>? Hoe spreek ik in <i> Pools </i>? Hoe communiceer ik in <i> Pools </i>?</li>' .
					'<li> Hoe schrijf ik in <i> Portugees </i>? Hoe spreek ik in <i> Portugees </i>? Hoe communiceer ik in <i> Portugees </i>?</li>' .
					'<li> Hoe schrijf ik in <i> Russisch </i>? Hoe spreek ik in <i> Russisch </i>? Hoe communiceer ik in <i> Russisch </i>?</li>' .
					'<li> Hoe schrijf ik in <i> Koreaans </i>? Hoe spreek ik in <i> Koreaans </i>? Hoe communiceer ik in <i> Koreaans </i>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Hieronder vindt u enkele voorbeelden van gebruik van de site ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
					
				'<ul>' .
							// spanish
						// https://www.earthfluent.com/spanish/culture-food-and-drink-part-21/view.php
					'<li> <a href="/spanish/culture-food-and-drink-part-21/view.php">Hoe zeg ik <i> "ontmoeten", "praten", "voorstellen" of "spreken" </i> in <i> Spaans </i>?</a></li>' .
						// https://www.earthfluent.com/spanish/nouns-animals-part-1/view.php
					'<li> <a href="/spanish/nouns-animals-part-1/view.php">Hoe schrijf ik <i> "schapen", "koe", "komododraak" of "stekelvarken" </i> in <i> Spaans </i>?</a></li>' .
							// french
						// https://www.earthfluent.com/french/entertainment-sports-part-5/view.php
					'<li> <a href="/french/entertainment-sports-part-5/view.php">Hoe zeg ik <i> "surfen", "skateboarden", "trefbal" of "rotsklimmen" </i> in <i> Frans </i>?</a></li>' .
						// https://www.earthfluent.com/french/nouns-animals-part-5/view.php
					'<li> <a href="/french/nouns-animals-part-5/view.php">Hoe schrijf ik <i> "vis", "haai", "uil" of "konijn" </i> in <i> Frans </i>?</a></li>' .
							// italian
						// https://www.earthfluent.com/italian/nouns-objects-part-3/view.php
					'<li> <a href="/italian/nouns-objects-part-3/view.php">Hoe zeg ik <i> "papier", "tabel", "product" of "eten" </i> in <i> Italiaans </i>?</a></li>' .
						// https://www.earthfluent.com/italian/verbs-general-activity-part-11/view.php
					'<li> <a href="/italian/verbs-general-activity-part-11/view.php">Hoe schrijf ik <i> "bereiken", "kiezen", "mislukken" of "serveren" </i> in <i> Italiaans </i>?</a></li>' .
							// german
						// https://www.earthfluent.com/german/nouns-society-part-72/view.php
					'<li> <a href="/german/nouns-society-part-72/view.php">Hoe zeg ik <i> "bruiloft", "dansen", "beloven" of "pensionering" </i> in <i> Duits </i>?</a></li>' .
						// https://www.earthfluent.com/german/adjectives-quality-part-7/view.php
					'<li> <a href="/german/adjectives-quality-part-7/view.php">Hoe schrijf ik <i> "lucky", "geachte", "platte" of "natte" </i> in <i> Duits </i>?</a></li>' .
							// japanese
						// https://www.earthfluent.com/japanese/nouns-places-part-19/view.php
					'<li> <a href="/japanese/nouns-places-part-19/view.php">Hoe zeg ik <i> "valley", "meer", "pub", of "restaurant" </i> in <i> Japanse </i>?</a></li>' .
						// https://www.earthfluent.com/japanese/nouns-places-part-25/view.php
					'<li> <a href="/japanese/nouns-places-part-25/view.php">Hoe schrijf ik <i> "platform", "stream", "luchthaven" of "provincie" </i> in <i> Japans </i>?</a></li>' .
							// chinese
						// https://www.earthfluent.com/chinese/nouns-society-part-12/view.php
					'<li> <a href="/chinese/nouns-society-part-12/view.php">Hoe zeg ik <i> "handel", "training", "relatie" of "regel" </i> in <i> Chinees </i>?</a></li>' .
						// https://www.earthfluent.com/chinese/nouns-places-part-25/view.php
					'<li> <a href="/chinese/nouns-places-part-25/view.php">Hoe schrijf ik <i> "te bereiken", "lopen", "stijging" of "vangen" </i> in <i> Chinese </i>?</a></li>' .
							// hindi
						// https://www.earthfluent.com/hindi/nouns-people-part-55/view.php
					'<li> <a href="/hindi/nouns-people-part-55/view.php">Hoe zeg ik <i> "handelaar", "magistraat", "deelnemer" of "vluchteling" </i> in <i> Hindi </i>?</a></li>' .
						// https://www.earthfluent.com/hindi/nouns-places-part-25/view.php
					'<li> <a href="/hindi/nouns-places-part-25/view.php">Hoe schrijf ik <i> "hoofd", "burger", "editor" of "algemeen" </i> in <i> Hindi </i>?</a></li>' .
							// indonesian
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-2/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-2/view.php">Hoe zeg ik <i> "overwegen", "verwachten", "lezen" of "onthouden" </i> in <i> Indonesisch </i>?</a></li>' .
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-8/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-8/view.php">Hoe schrijf ik <i> "onderzoeken", "studeren", "herkennen" of "staren" </i> in <i> Indonesisch </i>?</a></li>' .
							// dutch
						// https://www.earthfluent.com/dutch/nouns-ideas-part-13/view.php
					'<li> <a href="/dutch/nouns-ideas-part-13/view.php">Hoe zeg ik <i> "hoop", "betekenis", "beoordeling" of "overweging" </i> in <i> Nederlands </i>?</a></li>' .
						// https://www.earthfluent.com/dutch/nouns-society-part-25/view.php
					'<li> <a href="/dutch/nouns-society-part-25/view.php">Hoe schrijf ik <i> "deal", "betaling", "bureau" of "verzameling" </i> in <i> Nederlands </i>?</a></li>' .
							// polish
						// https://www.earthfluent.com/polish/verbs-economic-activity-part-5/view.php
					'<li> <a href="/polish/verbs-economic-activity-part-5/view.php">Hoe zeg ik <i> "hangen", "winst", "verzamelen", of "dienst" </i> in <i> Polish </i>?</a></li>' .
						// https://www.earthfluent.com/polish/verbs-emotional-activity-part-2/view.php
					'<li> <a href="/polish/verbs-emotional-activity-part-2/view.php">Hoe schrijf ik <i> "liefde", "genieten", "betrekking hebben", of "lijden" </i> in <i> Polish </i>?</a></li>' .
							// portuguese
						// https://www.earthfluent.com/portuguese/nouns-society-part-42/view.php
  					'<li> <a href="/portuguese/nouns-society-part-42/view.php">Hoe zeg ik <i> "vrijheid", "limiet", "pensioen" of "respect" </i> in <i> Portugees </i>?</a></li>' .
						// https://www.earthfluent.com/portuguese/nouns-society-part-48/view.php
					'<li> <a href="/portuguese/nouns-society-part-48/view.php">Hoe schrijf ik <i> "menigte", "curriculum", "geweld" of "bediening" </i> in <i> Portugees </i>?</a></li>' .
							// russian
						// https://www.earthfluent.com/russian/culture-calendar-part-3/view.php
					'<li> <a href="/russian/culture-calendar-part-3/view.php">Hoe zeg ik <i> "september", "oktober", "november" of "december" </i> in <i> Russisch </i>?</a></li>' .
						// https://www.earthfluent.com/russian/adjectives-feeling-part-6/view.php
					'<li> <a href="/russian/adjectives-feeling-part-6/view.php">Hoe schrijf ik <i> "schuldig", "blij", "gezond" of "verdrietig" </i> in <i> Russisch </i>?</a></li>' .
							// korean
						// https://www.earthfluent.com/korean/culture-food-and-drink-part-21/view.php
					'<li> <a href="/korean/culture-food-and-drink-part-21/view.php">Hoe zeg ik <i> "wodka", "whisky", "tequila" of "rum" </i> in <i> Koreaans </i>?</a></li>' .
						// https://www.earthfluent.com/korean/verbs-social-activity-part-1/view.php
					'<li> <a href="/korean/verbs-social-activity-part-1/view.php">Hoe schrijf ik <i> "zeg", "vertel", "vraag" of "toon" </i> in <i> Koreaans </i>?</a></li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">EarthFluent.com is gemaakt en gestart op 7 april 2017. Sindsdien leren we alles wat we over taal weten!</p>'
			;
			
			break;
			
		case 'pl':
					// Earth Fluent : Teaching Languages to the World
			$this->header_title_text = $this->master_record['Title'] . ' (Earth Fluent) : Nauczanie języków dla świata';
					
					// I learned another language and another way of thinking today!
			$quote_text = 'Nauczyłem się innego języka i innego sposobu myślenia dzisiaj!';
				
					// Want to learn another language?  Learn Spanish, French, Italian, German, Japanese, Chinese, Hindi, Indonesian, Dutch, Polish, Portuguese, or Russian!
			$div_mouseover = 'Chcesz się nauczyć innego języka? Ucz się hiszpańskiego, francuskiego, włoskiego, niemieckiego, japońskiego, chińskiego, hindi, indonezyjskiego, holenderskiego, polskiego, portugalskiego lub rosyjskiego!';
			
				// More Information About Us
			$about_header_title_text = 'Więcej informacji o nas';
					
					// Content Header Text
			
			$mission_header_text = 'Misja';
			$examples_header_text = 'Przykłady';
			$uses_header_text = 'Używa';
			$history_header_text = 'Historia';
			$technology_header_text = 'Technologia';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Chcesz się komunikować z kimkolwiek na świecie? Chcesz mieć możliwość wymiany wewnętrznych części swojego serca i duszy z duszą pokrewną? Cóż, dzisiaj twoje problemy są prawdopodobnie społeczne, a nie technologiczne. Musisz tylko mówić odpowiednim językiem, aby go usłyszeć!</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">W EarthFluent jest to jedyny cel: daje ci narzędzia, których potrzebujesz, aby kształcić się i nauczyć się kilkunastu języków. Narzędzia te są wizualne i słuchowe, oparte na słowie pisanym i na słowie mówionym. Możesz uczyć się słuchając fraz, testując wyrażenia za pomocą mikrofonu, biorąc quizy dowolnej liczby słów lub lekcji, grając krzyżówki i inne gry lub komunikując się z innymi w sekcji komentarzy. Sposoby, których się nauczysz, powinny być tak nieskończone, jak różnorodność ludzi. Nie jesteśmy tutaj po to, aby wcisnąć was w tego ucznia lub tego studenta, jesteśmy tutaj, aby zrobić jedno: nauczyć was mówić, pisać i komunikować się w innym języku. To jest EarthFluent.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Są tu spełnione dwa cele: łączenie ludzi w sposób, który przynosi korzyść wszystkim uczestnikom, i zapewnienie całej technologii niezbędnej do umożliwienia samouczenia się w skali globalnej. Nie możemy dać ci głośników, ale damy ci klipy dźwiękowe fraz; nie możemy dać ci mikrofonu, ale przetestujemy twoje wyjście mikrofonu pod kątem oczekiwanego akcentu i wzorców językowych; nie możemy dać ci dostępu do Internetu, ale możemy dać ci grę quizową opartą na Wyszukiwarce grafiki Google, aby przetestować pamięć językową. Jeśli dasz nam energię, damy ci tę wiedzę. Ta usługa jest przeznaczona do bycia wolnym i całkowicie dostępnym. (Istnieje nawet projekt GitHub!)</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Gdzie chcesz iść? Europa, Azja, Ameryka Południowa, Afryka, Ameryka Północna czy Australia? Sprawdź język, naucz się go, a będziesz doskonale pasował do mieszkańców!</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px margin-top-22px">Jak to właściwie wszystko <i> działa </i>? Przy tak wielu komercyjnych produktach dostępnych dla nauczycieli, a wiele z nich oferuje mniej lekcji, <i> jak możemy to zrobić za darmo </i>? I czy warto być jednocześnie wartościowym, osobistym doświadczeniem i dokładnym, w sensie językowym i akademickim? Odpowiedzi są łatwiejsze niż mogłoby się wydawać.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Słuchanie dźwięku :</i></b> Jest to faktycznie skomponowane za pomocą interfejsu API SpeechSynthesis dostarczonego w języku HTML5. Nic magicznego tutaj, tylko specyfikacja sieci, która została opracowana przez dekadę przez tysiące specjalistów z branży. Ten interfejs API obsługuje obecnie 14 języków w wielu dialektach, a kolejne są regularnie dodawane.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Testowanie mówienia na mikrofonie :</i></b> Ponownie, jest to kolejna część specyfikacji HTML5, w tym przypadku API SpeechRecognition. To także jest utrzymywane i projektowane przez profesjonalistów.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Quizy oparte na obrazie :</i></b> Jest to połączenie powyższych technologii i interfejsu API wyszukiwarki Google Image. Obrazy wyświetlane dla sprawdzanego słowa pochodzą z tych wyszukiwań obrazów. Oznacza to, że masz do czynienia ze świeżymi, regularnie używanymi obrazami, które ludzie faktycznie używają, podczas gdy komercyjne produkty mają zazwyczaj bardzo stare, przestarzałe, fotografie o niskiej wartości lub zainteresowane uczniami.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Więc, <i> co dokładnie to dla nas oznacza? </I> Korzystamy z popularnych, dobrze utrzymanych i dobrze wykorzystywanych technologii. Dźwięk audio słyszany podczas słuchania muzyki francuskiej, czyli taki sam jak telefon komórkowy w Paryżu, byłby użyteczny w rozmowach z jego użytkownikiem (ponieważ Android i iPhone posłusznie wykorzystują specyfikację HTML5).</p>' . 
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Co to oznacza <i> dla każdego innego produktu do nauki języków </i>? Oznacza to, że są one utrzymywane przez nudnych, niezainteresowanych gramatyków, zamkniętych w ich łacińskich i starożytno-greckich salach uczenia się, bez żadnego językowego związku z żywym językiem jakiegokolwiek narodu na świecie! Przedsiębiorstwo komercyjne nie może sobie pozwolić na więcej niż garstkę badaczy - powyższe narzędzia, dźwięk i głos oraz obraz, są obsługiwane przez miliony rąk! Pomyśl o inżynierach z Google o specjalistach od HTML5 do międzynarodowych twórców standardów. Porównaj ile rąk pracuje w technologiach naszego produktu i porównaj go z wiodącymi produktami rynkowymi, i jest milion umysłów za technologią dla każdego umysłu, którego używają!</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">I oczywiście jesteśmy open source! EarthFluent.com jest zbudowany przy użyciu <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, systemu zarządzania treścią zaprojektowanego do zasilania, prędkości i skalowalność.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Ta technologia, wykorzystująca PHP7 i MySQL5, zapewnia wszystkie funkcje tej witryny. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Sprawdź nas na GitHub! </a></p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Poniżej znajdują się typowe zastosowania tej strony ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
				
				'<ul>' .
					'<li> Jak pisać w języku <i> hiszpańskim </i>? Jak mam mówić w języku <i> hiszpańskim </i>? Jak mogę się komunikować w języku <i> hiszpańskim </i>?</li>' .
					'<li> Jak pisać w języku <i> francuskim </i>? Jak mam mówić w języku <i> francuskim </i>? Jak mogę się komunikować w języku <i> francuskim </i>?</li>' .
					'<li> Jak pisać w języku <i> włoskim </i>? Jak mogę mówić po <i> włosku </i>? Jak mogę się komunikować w języku <i> włoskim </i>?</li>' .
					'<li> Jak pisać w języku <i> niemieckim </i>? Jak mam mówić w języku <i> niemieckim </i>? Jak komunikować się w języku <i> niemieckim </i>?</li>' .
					'<li> Jak pisać w języku <i> japońskim </i>? Jak mam mówić w języku <i> japońskim </i>? Jak mogę się komunikować w języku <i> japońskim </i>?</li>' .
					'<li> Jak pisać w języku <i> chińskim </i>? Jak mam mówić w języku <i> chińskim </i>? Jak mogę się komunikować w języku <i> chińskim </i>?</li>' .
					'<li> Jak pisać w języku <i> Hindi </i>? Jak mam mówić w języku <i> Hindi </i>? Jak mogę się komunikować w języku <i> Hindi </i>?</li>' .
					'<li> Jak pisać w języku <i> indonezyjskim </i>? Jak mam mówić w języku <i> indonezyjskim </i>? Jak mogę się komunikować w języku <i> indonezyjskim </i>?</li>' .
					'<li> Jak napisać w języku <i> niderlandzkim </i>? Jak mam mówić w języku <i> niderlandzkim </i>? Jak mogę komunikować się w języku <i> niderlandzkim </i>?</li>' .
					'<li> Jak pisać w języku <i> polskim </i>? Jak mam mówić w języku <i> polskim </i>? Jak komunikować się w języku <i> polskim </i>?</li>' .
					'<li> Jak pisać w języku <i> portugalskim </i>? Jak mam mówić w języku <i> portugalskim </i>? Jak mogę się komunikować w języku <i> portugalskim </i>?</li>' .
					'<li> Jak pisać w języku <i> rosyjskim </i>? Jak mam mówić w języku <i> rosyjskim </i>? Jak mogę się komunikować w języku <i> rosyjskim </i>?</li>' .
					'<li> Jak pisać w języku <i> koreańskim </i>? Jak mam mówić w języku <i> koreańskim </i>? Jak mogę się komunikować w języku <i> koreańskim </i>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Poniżej znajdują się przykładowe zastosowania witryny ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
					
				'<ul>' .
							// spanish
						// https://www.earthfluent.com/spanish/culture-food-and-drink-part-21/view.php
					'<li> <a href="/spanish/culture-food-and-drink-part-21/view.php">Jak powiedzieć <i> „spotkać”, „rozmawiać”, „sugerować” lub „mówić” </i> w <i> hiszpańskim </i>?</a></li>' .
						// https://www.earthfluent.com/spanish/nouns-animals-part-1/view.php
					'<li> <a href="/spanish/nouns-animals-part-1/view.php">Jak napisać <i> „owce”, „krowy”, „smoki komodo” lub „jeżozwierz” </i> w <i> hiszpańskim </i>?</a></li>' .
							// french
						// https://www.earthfluent.com/french/entertainment-sports-part-5/view.php
					'<li> <a href="/french/entertainment-sports-part-5/view.php">Jak mogę powiedzieć <i> „surfing”, „jazda na deskorolce”, „dodgeball” lub „wspinaczka skałkowa” </i> w <i> francuskim </i>?</a></li>' .
						// https://www.earthfluent.com/french/nouns-animals-part-5/view.php
					'<li> <a href="/french/nouns-animals-part-5/view.php">Jak napisać <i> „ryby”, „rekina”, „sowy” lub „królika” </i> w <i> francuskim </i>?</a></li>' .
							// italian
						// https://www.earthfluent.com/italian/nouns-objects-part-3/view.php
					'<li> <a href="/italian/nouns-objects-part-3/view.php">Jak powiedzieć <i> „papier”, „stół”, „produkt” lub „jedzenie” </i> w <i> języku włoskim </i>?</a></li>' .
						// https://www.earthfluent.com/italian/verbs-general-activity-part-11/view.php
					'<li> <a href="/italian/verbs-general-activity-part-11/view.php">Jak napisać <i> „osiągnąć”, „wybrać”, „nie” lub „służyć” </i> w <i> języku włoskim </i>?</a></li>' .
							// german
						// https://www.earthfluent.com/german/nouns-society-part-72/view.php
					'<li> <a href="/german/nouns-society-part-72/view.php">Jak powiedzieć <i> „ślub”, „taniec”, „obietnica” lub „emerytura” </i> w <i> niemieckim </i>?</a></li>' .
						// https://www.earthfluent.com/german/adjectives-quality-part-7/view.php
					'<li> <a href="/german/adjectives-quality-part-7/view.php">Jak napisać <i> „szczęśliwy”, „drogi”, „płaski” lub „mokry” </i> w <i> niemieckim </i>?</a></li>' .
							// japanese
						// https://www.earthfluent.com/japanese/nouns-places-part-19/view.php
					'<li> <a href="/japanese/nouns-places-part-19/view.php">Jak powiedzieć <i> „dolina”, „jezioro”, „pub” lub „restauracja” </i> w <i> japońskim </i>?</a></li>' .
						// https://www.earthfluent.com/japanese/nouns-places-part-25/view.php
					'<li> <a href="/japanese/nouns-places-part-25/view.php">Jak napisać <i> „platformę”, „strumień”, „lotnisko” lub „prowincję” </i> w <i> japońskim </i>?</a></li>' .
							// chinese
						// https://www.earthfluent.com/chinese/nouns-society-part-12/view.php
					'<li> <a href="/chinese/nouns-society-part-12/view.php">Jak powiedzieć <i> „handel”, „szkolenie”, „relacja” lub „reguła” </i> w <i> chińskim </i>?</a></li>' .
						// https://www.earthfluent.com/chinese/nouns-places-part-25/view.php
					'<li> <a href="/chinese/nouns-places-part-25/view.php">Jak napisać <i> „dotrzeć”, „przejść”, „wstać” lub „złapać” </i> w <i> chińskim </i>?</a></li>' .
							// hindi
						// https://www.earthfluent.com/hindi/nouns-people-part-55/view.php
					'<li> <a href="/hindi/nouns-people-part-55/view.php">Jak mogę powiedzieć <i> „sprzedawca”, „magistrat”, „uczestnik” lub „uchodźca” </i> w <i> hindi </i>?</a></li>' .
						// https://www.earthfluent.com/hindi/nouns-places-part-25/view.php
					'<li> <a href="/hindi/nouns-places-part-25/view.php">Jak napisać <i> „główny”, „obywatel”, „edytor” lub „ogólny” </i> w <i> hindi </i>?</a></li>' .
							// indonesian
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-2/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-2/view.php">Jak mogę powiedzieć <i> „rozważyć”, „oczekiwać”, „przeczytać” lub „pamiętać” </i> w <i> indonezyjskim </i>?</a></li>' .
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-8/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-8/view.php">Jak napisać <i> „zbadać”, „przestudiować”, „rozpoznać” lub „gapić się” </i> w <i> indonezyjskim </i>?</a></li>' .
							// dutch
						// https://www.earthfluent.com/dutch/nouns-ideas-part-13/view.php
					'<li> <a href="/dutch/nouns-ideas-part-13/view.php">Jak mogę powiedzieć <i> „nadzieja”, „znaczenie”, „ocena” lub „uwaga” </i> w <i> holenderskim </i>?</a></li>' .
						// https://www.earthfluent.com/dutch/nouns-society-part-25/view.php
					'<li> <a href="/dutch/nouns-society-part-25/view.php">Jak napisać <i> „ofertę”, „płatność”, „agencję” lub „kolekcję” </i> w <i> holenderskim </i>?</a></li>' .
							// polish
						// https://www.earthfluent.com/polish/verbs-economic-activity-part-5/view.php
					'<li> <a href="/polish/verbs-economic-activity-part-5/view.php">Jak mogę powiedzieć, że <i> „zależą”, „zyskują”, „zbierają” lub „zatrudniają” </i> w <i> polskim </i>?</a></li>' .
						// https://www.earthfluent.com/polish/verbs-emotional-activity-part-2/view.php
					'<li> <a href="/polish/verbs-emotional-activity-part-2/view.php">Jak napisać <i> „miłość”, „cieszyć się”, „powiązać” lub „cierpieć” </i> w <i> polskim </i>?</a></li>' .
							// portuguese
						// https://www.earthfluent.com/portuguese/nouns-society-part-42/view.php
  					'<li> <a href="/portuguese/nouns-society-part-42/view.php">Jak mogę powiedzieć <i> „wolność”, „limit”, „emerytura” lub „szacunek” </i> w <i> portugalskim </i>?</a></li>' .
						// https://www.earthfluent.com/portuguese/nouns-society-part-48/view.php
					'<li> <a href="/portuguese/nouns-society-part-48/view.php">Jak napisać <i> „tłum”, „program nauczania”, „przemoc” lub „służba” </i> w <i> portugalskim </i>?</a></li>' .
							// russian
						// https://www.earthfluent.com/russian/culture-calendar-part-3/view.php
					'<li> <a href="/russian/culture-calendar-part-3/view.php">Jak powiedzieć <i> „wrzesień”, „październik”, „listopad” lub „grudzień” </i> w <i> rosyjskim </i>?</a></li>' .
						// https://www.earthfluent.com/russian/adjectives-feeling-part-6/view.php
					'<li> <a href="/russian/adjectives-feeling-part-6/view.php">Jak napisać <i> „winny”, „zadowolony”, „zdrowy” lub „smutny” </i> w <i> rosyjskim </i>?</a></li>' .
							// korean
						// https://www.earthfluent.com/korean/culture-food-and-drink-part-21/view.php
					'<li> <a href="/korean/culture-food-and-drink-part-21/view.php">Jak powiedzieć <i> „wódka”, „whisky”, „tequila” lub „rum” </i> w <i> koreańskim </i>?</a></li>' .
						// https://www.earthfluent.com/korean/verbs-social-activity-part-1/view.php
					'<li> <a href="/korean/verbs-social-activity-part-1/view.php">Jak napisać <i> „powiedz”, „powiedz”, „zapytaj” lub „pokaż” </i> w <i> koreańskim </i>?</a></li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">EarthFluent.com został stworzony i uruchomiony 7 kwietnia 2017 r. Od tego czasu uczymy wszystkiego i wszystkiego, co wiemy o języku!</p>'
			;
			
			break;
			
		case 'pt':
					// Earth Fluent : Teaching Languages to the World
			$this->header_title_text = $this->master_record['Title'] . ' (Fluente Terrestre) : Idiomas de Ensino para o Mundo';
					
					// I learned another language and another way of thinking today!
			$quote_text = 'Eu aprendi outra língua e outra maneira de pensar hoje!';
				
					// Want to learn another language?  Learn Spanish, French, Italian, German, Japanese, Chinese, Hindi, Indonesian, Dutch, Polish, Portuguese, or Russian!
			$div_mouseover = 'Quer aprender outro idioma? Aprenda espanhol, francês, italiano, alemão, japonês, chinês, hindi, indonésio, holandês, polonês, português ou russo!';
			
				// More Information About Us
			$about_header_title_text = 'Mais informações sobre nós';
					
					// Content Header Text
			
			$mission_header_text = 'Missão';
			$examples_header_text = 'Exemplos';
			$uses_header_text = 'Usos';
			$history_header_text = 'História';
			$technology_header_text = 'Tecnologia';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Quer se comunicar com mais alguém no planeta? Quer ser capaz de trocar as partes internas do seu coração e alma com qualquer espírito semelhante? Bem, hoje, seus problemas são provavelmente sociais e não tecnológicos. Você só precisa falar a linguagem certa para ser ouvido!</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Na EarthFluent, esse é o único objetivo: fornecer as ferramentas necessárias para você se instruir e aprender qualquer um de uma dúzia de idiomas. Essas ferramentas são visuais e auditivas, baseadas na palavra escrita e na palavra falada. Você pode aprender ouvindo frases, testando frases com um microfone, fazendo testes de qualquer número de palavras ou lições, jogando palavras cruzadas e outros jogos, ou comunicando-se com outras pessoas na seção de comentários. As maneiras pelas quais você pode aprender devem ser tão infinitas quanto a diversidade dos seres humanos. Não estamos aqui para moldá-lo neste aluno ou aluno, estamos aqui para fazer uma coisa: ensinar você a falar, escrever e se comunicar em outro idioma. Isso é o EarthFluent.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Há duas metas que estão sendo satisfeitas aqui: unir as pessoas de uma maneira que beneficie mutuamente todos os participantes e fornecer toda a tecnologia necessária para tornar possível a auto-aprendizagem em escala global. Nós não podemos lhe dar os alto-falantes, mas vamos dar-lhe clipes de áudio de frases; não podemos lhe dar um microfone, mas vamos testar sua saída de microfone em relação aos padrões esperados de sotaque e linguagem; Não podemos fornecer acesso à Internet, mas podemos oferecer um jogo de perguntas baseado na Pesquisa de imagens do Google para testar sua memória de idioma. Se você nos der energia, nós lhe daremos o conhecimento. Este serviço é dedicado a ser gratuito e completamente acessível. (Existe até um projeto do GitHub!)</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Onde você quer ir? Europa, Ásia, América do Sul, África, América do Norte ou Austrália? Confira um idioma, seja educado nele e você se encaixará perfeitamente entre os habitantes locais!</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px margin-top-22px">Então, como isso realmente funciona </i>? Com tantos produtos comerciais disponíveis para o ensino, e muitos deles oferecendo menos lições, <i> como isso pode ser feito de graça </i>? E ainda vale a pena, enquanto experiência pessoal, e precisa, em um sentido lingüístico e acadêmico? As respostas são mais fáceis do que você imagina.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Ouvindo Áudio :</i></b> Na verdade, isso é composto usando a API do SpeechSynthesis fornecida em HTML5. Nada de mágico aqui, apenas uma especificação da Web que foi trabalhada durante uma década por milhares de profissionais da indústria. Esta API atualmente suporta 14 idiomas em múltiplos dialetos, com mais adicionados regularmente.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Teste falando no microfone :</i></b> Novamente, essa é apenas outra parte da especificação HTML5, neste caso, a API SpeechRecognition. Também é mantido e desenhado por profissionais.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Questionários baseados em imagem :</i></b> Essa é uma combinação das tecnologias acima e da API de pesquisa de imagens do Google. As imagens que estão sendo exibidas para uma palavra sendo questionada são dessas buscas de imagens. Isso significa que você está lidando com imagens novas e usadas regularmente que as pessoas realmente usam, enquanto os produtos comerciais tendem a ter fotos de estoque muito velhas e obsoletas, de pouco valor ou interesse para os alunos.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Então, <i> exatamente o que isso tudo significa para nós? </I> Nós usamos tecnologias populares, bem conservados, e bem utilizados. A voz de áudio que você ouve quando ouve francês, ou seja, a mesma voz que um celular em Paris usaria ao falar com seu usuário (porque o Android e o iPhone obedientemente usam as especificações do HTML5).</p>' . 
				
				'<p class="margin-0px text-indent-50px margin-top-22px">O que isso significa <i> para todos os outros produtos de aprendizado de idiomas </i>? Significa que eles são mantidos por gramáticos chatos e desinteressados, trancados em seus salões de aprendizado latinos e gregos antigos, sem qualquer conexão lingüística com a língua viva de qualquer pessoa no planeta! Uma empresa comercial dificilmente pode pagar mais do que um punhado de pesquisadores - as ferramentas acima, em áudio e voz e imagem, são trabalhadas por milhões de mãos! Pense nos engenheiros do Google para os criadores de especificações HTML5 para criadores de padrões internacionais. Compare quantas mãos trabalham nas tecnologias de nosso produto e as comparamos com os principais produtos do mercado, e há um milhão de mentes por trás da tecnologia aqui para cada mente que elas empregam!</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">E, claro, somos de código aberto! O EarthFluent.com foi criado usando o <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>, um sistema de gerenciamento de conteúdo projetado para gerar energia, velocidade e escalabilidade.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Essa tecnologia, usando PHP7 e MySQL5, fornece todas as funcionalidades deste site. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Consulte-nos no GitHub! </a></p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Abaixo estão os usos comuns deste site ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
				
				'<ul>' .
					'<li> Como escrevo em <i> espanhol </i>? Como eu falo em <i> espanhol </i>? Como me comunico em <i> espanhol </i>?</li>' .
					'<li> Como escrevo em <i> francês </i>? Como falo em <i> francês </i>? Como me comunico em <i> francês </i>?</li>' .
					'<li> Como escrevo em <i> italiano </i>? Como eu falo em <i> italiano </i>? Como me comunico em <i> italiano </i>?</li>' .
					'<li> Como escrevo em <i> alemão </i>? Como falo em <i> alemão </i>? Como me comunico em <i> alemão </i>?</li>' .
					'<li> Como faço para escrever em <i> japonês </i>? Como eu falo em <i> japonês </i>? Como me comunico em <i> japonês </i>?</li>' .
					'<li> Como faço para escrever em <i> chinês </i>? Como eu falo em <i> chinês </i>? Como me comunico em <i> chinês </i>?</li>' .
					'<li> Como faço para escrever em <i> Hindi </i>? Como eu falo em <i> Hindi </i>? Como me comunico em <i> Hindi </i>?</li>' .
					'<li> Como faço para escrever em <i> indonésio </i>? Como eu falo em <i> indonésio </i>? Como me comunico em <i> indonésio </i>?</li>' .
					'<li> Como faço para escrever em <i> holandês </i>? Como falo em <i> holandês </i>? Como me comunico em <i> holandês </i>?</li>' .
					'<li> Como faço para escrever em <i> polonês </i>? Como eu falo em <i> polonês </i>? Como me comunico em <i> polonês </i>?</li>' .
					'<li> Como faço para escrever em <i> português </i>? Como eu falo em <i> português </i>? Como me comunico em <i> português </i>?</li>' .
					'<li> Como faço para escrever em <i> russo </i>? Como eu falo em <i> russo </i>? Como me comunico em <i> russo </i>?</li>' .
					'<li> Como faço para escrever em <i> coreano </i>? Como eu falo em <i> coreano </i>? Como me comunico em <i> coreano </i>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Abaixo estão alguns exemplos de uso do site ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
					
				'<ul>' .
							// spanish
						// https://www.earthfluent.com/spanish/culture-food-and-drink-part-21/view.php
					'<li> <a href="/spanish/culture-food-and-drink-part-21/view.php">Como eu digo "encontrar", "falar", "sugerir" ou "falar" </i> em <i> espanhol </i>?</a></li>' .
						// https://www.earthfluent.com/spanish/nouns-animals-part-1/view.php
					'<li> <a href="/spanish/nouns-animals-part-1/view.php">Como escrevo <i> "ovelha", "vaca", "dragão de komodo" ou "porco-espinho" em <i> espanhol </i>?</a></li>' .
							// french
						// https://www.earthfluent.com/french/entertainment-sports-part-5/view.php
					'<li> <a href="/french/entertainment-sports-part-5/view.php">Como eu digo <i> "surf", "skateboarding", "dodgeball" ou "rock climbing" </i> em <i> French </i>?</a></li>' .
						// https://www.earthfluent.com/french/nouns-animals-part-5/view.php
					'<li> <a href="/french/nouns-animals-part-5/view.php">Como escrevo <i> "fish", "shark", "owl" ou "rabbit" </i> em <i> French </i>?</a></li>' .
							// italian
						// https://www.earthfluent.com/italian/nouns-objects-part-3/view.php
					'<li> <a href="/italian/nouns-objects-part-3/view.php">Como eu digo <i> "papel", "mesa", "produto" ou "comida" </i> em <i> italiano </i>?</a></li>' .
						// https://www.earthfluent.com/italian/verbs-general-activity-part-11/view.php
					'<li> <a href="/italian/verbs-general-activity-part-11/view.php">Como escrevo <i> "alcançar", "escolher", "falhar" ou "atender" </i> em <i> italiano </i>?</a></li>' .
							// german
						// https://www.earthfluent.com/german/nouns-society-part-72/view.php
					'<li> <a href="/german/nouns-society-part-72/view.php">Como eu digo "casamento", "dança", "promessa" ou "aposentadoria" em <i> alemão </i>?</a></li>' .
						// https://www.earthfluent.com/german/adjectives-quality-part-7/view.php
					'<li> <a href="/german/adjectives-quality-part-7/view.php">Como faço para escrever <i> "sorte", "querida", "flat", ou "molhado" </i> em <i> alemão </i>?</a></li>' .
							// japanese
						// https://www.earthfluent.com/japanese/nouns-places-part-19/view.php
					'<li> <a href="/japanese/nouns-places-part-19/view.php">Como eu digo <i> "vale", "lago", "pub" ou "restaurante" </i> em <i> japonês </i>?</a></li>' .
						// https://www.earthfluent.com/japanese/nouns-places-part-25/view.php
					'<li> <a href="/japanese/nouns-places-part-25/view.php">Como escrevo <i> "plataforma", "stream", "aeroporto" ou "província" </i> em <i> japonês </i>?</a></li>' .
							// chinese
						// https://www.earthfluent.com/chinese/nouns-society-part-12/view.php
					'<li> <a href="/chinese/nouns-society-part-12/view.php">Como eu digo <i> "comércio", "treinamento", "relacionamento" ou "regra" </i> em <i> chinês </i>?</a></li>' .
						// https://www.earthfluent.com/chinese/nouns-places-part-25/view.php
					'<li> <a href="/chinese/nouns-places-part-25/view.php">Como faço para escrever <i> "alcance", "andar", "ascensão", ou "catch" </i> em <i> Chinês </i>?</a></li>' .
							// hindi
						// https://www.earthfluent.com/hindi/nouns-people-part-55/view.php
					'<li> <a href="/hindi/nouns-people-part-55/view.php">Como eu digo "comerciante", "magistrado", "participante" ou "refugiado" em <i> Hindi </i>?</a></li>' .
						// https://www.earthfluent.com/hindi/nouns-places-part-25/view.php
					'<li> <a href="/hindi/nouns-places-part-25/view.php">Como escrevo <i> "chefe", "cidadão", "editor" ou "geral" </i> em <i> Hindi </i>?</a></li>' .
							// indonesian
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-2/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-2/view.php">Como eu digo <i> "considere", "espera", "lê" ou "lembra" </i> em <i> indonésio </i>?</a></li>' .
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-8/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-8/view.php">Como escrevo <i> "examine", "estude", "reconheça" ou "olhe" </i> em <i> indonésio </i>?</a></li>' .
							// dutch
						// https://www.earthfluent.com/dutch/nouns-ideas-part-13/view.php
					'<li> <a href="/dutch/nouns-ideas-part-13/view.php">Como eu digo <i> "esperança", "significado", "avaliação" ou "consideração" </i> em <i> holandês </i>?</a></li>' .
						// https://www.earthfluent.com/dutch/nouns-society-part-25/view.php
					'<li> <a href="/dutch/nouns-society-part-25/view.php">Como faço para escrever <i> "negócio", "pagamento", "agência" ou "coleção" </i> em <i> holandês </i>?</a></li>' .
							// polish
						// https://www.earthfluent.com/polish/verbs-economic-activity-part-5/view.php
					'<li> <a href="/polish/verbs-economic-activity-part-5/view.php">Como posso dizer <i> "dependem", "ganho", "recolher", ou "empregar" </i> em <i> Polish </i>?</a></li>' .
						// https://www.earthfluent.com/polish/verbs-emotional-activity-part-2/view.php
					'<li> <a href="/polish/verbs-emotional-activity-part-2/view.php">Como faço para escrever <i> "amor", "aproveitar", "relacionar", ou "sofrer" </i> em <i> Polish </i>?</a></li>' .
							// portuguese
						// https://www.earthfluent.com/portuguese/nouns-society-part-42/view.php
  					'<li> <a href="/portuguese/nouns-society-part-42/view.php">Como eu digo "liberdade", "limite", "pensão" ou "respeito" em <i> português </i>?</a></li>' .
						// https://www.earthfluent.com/portuguese/nouns-society-part-48/view.php
					'<li> <a href="/portuguese/nouns-society-part-48/view.php">Como escrevo <i> "multidão", "currículo", "violência" ou "ministério" </i> em <i> português </i>?</a></li>' .
							// russian
						// https://www.earthfluent.com/russian/culture-calendar-part-3/view.php
					'<li> <a href="/russian/culture-calendar-part-3/view.php">Como digo <i> "setembro", "outubro", "novembro" ou "dezembro" <i> russo </i>?</a></li>' .
						// https://www.earthfluent.com/russian/adjectives-feeling-part-6/view.php
					'<li> <a href="/russian/adjectives-feeling-part-6/view.php">Como escrevo <i> "culpado", "contente", "saudável" ou "triste" em <i> russo </i>?</a></li>' .
							// korean
						// https://www.earthfluent.com/korean/culture-food-and-drink-part-21/view.php
					'<li> <a href="/korean/culture-food-and-drink-part-21/view.php">Como eu digo <i> "vodka", "uísque", "tequila" ou "rum" </i> em <i> coreano </i>?</a></li>' .
						// https://www.earthfluent.com/korean/verbs-social-activity-part-1/view.php
					'<li> <a href="/korean/verbs-social-activity-part-1/view.php">Como faço para escrever <i> "dizer", "dizer", "pedir" ou "show" </i> em <i> Korean </i>?</a></li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">O EarthFluent.com foi criado e lançado em 7 de abril de 2017. Desde então, temos ensinado tudo e qualquer coisa que sabemos sobre o idioma!</p>'
			;
			
			break;
			
		case 'ru':
					// Earth Fluent : Teaching Languages to the World
			$this->header_title_text = $this->master_record['Title'] . ' (Земля свободно говорит) : Преподавание языков миру';
					
					// I learned another language and another way of thinking today!
			$quote_text = 'Я выучил другой язык и другой способ мышления сегодня!';
				
					// Want to learn another language?  Learn Spanish, French, Italian, German, Japanese, Chinese, Hindi, Indonesian, Dutch, Polish, Portuguese, or Russian!
			$div_mouseover = 'Хотите выучить другой язык? Изучайте испанский, французский, итальянский, немецкий, японский, китайский, хинди, индонезийский, голландский, польский, португальский или русский!';
			
				// More Information About Us
			$about_header_title_text = 'Дополнительная информация';
					
					// Content Header Text
			
			$mission_header_text = 'миссия';
			$examples_header_text = 'Примеры';
			$uses_header_text = 'Пользы';
			$history_header_text = 'история';
			$technology_header_text = 'Технология';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Хотите общаться с кем-либо еще на планете? Хотите иметь возможность обмениваться внутренними частями вашего сердца и души с любым родственным духом? Что ж, сегодня ваши проблемы скорее всего социальные, а не технологические. Вам просто нужно говорить на правильном языке, чтобы быть услышанным!</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">В EarthFluent это единственная цель: предоставить вам инструменты, необходимые для обучения и изучения любого из дюжины языков. Эти инструменты являются визуальными и слуховыми, основанными на письменном слове и устном слове. Вы можете учиться, слушая фразы, тестируя фразы с помощью микрофона, проводя викторины из любого количества слов или уроков, играя в кроссворды и другие игры, или общаясь с другими в разделе комментариев. Пути, которым вы можете научиться, должны быть такими же бесконечными, как и разнообразие людей. Мы здесь не для того, чтобы формировать вас из этого ученика или этого ученика, мы здесь для того, чтобы сделать одну вещь: научить вас говорить, писать и общаться на другом языке. Это EarthFluent.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Здесь выполняются две цели: объединение людей таким образом, чтобы взаимно приносить пользу всем участникам, и предоставление всех технологий, необходимых для самообучения в глобальном масштабе. Мы не можем дать вам ораторов, но мы дадим вам аудиофрагменты фраз; мы не можем дать вам микрофон, но мы проверим ваш микрофон на соответствие ожидаемым акцентам и языковым моделям; мы не можем предоставить вам доступ в Интернет, но мы можем предоставить вам игру-викторину на основе поиска картинок Google, чтобы проверить вашу языковую память. Если вы дадите нам энергию, мы дадим вам знания. Этот сервис посвящен тому, чтобы быть бесплатным и полностью доступным. (Есть даже проект GitHub!)</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Куда ты хочешь пойти? Европа, Азия, Южная Америка, Африка, Северная Америка или Австралия? Проверьте язык, станьте образованным на нем, и вы отлично впишетесь в число местных жителей!</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px margin-top-22px">Итак, как же это на самом деле все <I> работы </I>? С таким количеством коммерческих продуктов, доступных для обучения, и многими из них, предлагающими меньше уроков, <i> как мы можем сделать это бесплатно </i>? И все же быть полезным, как личный опыт, и точным, в лингвистическом и академическом смысле? Ответы проще, чем вы думаете.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Прослушивание аудио :</i></b> Это на самом деле составлено с использованием SpeechSynthesis API, предоставленного в HTML5. Здесь нет ничего волшебного, только веб-спецификация, над которой работали десятки тысяч специалистов из разных отраслей. В настоящее время этот API поддерживает 14 языков на нескольких диалектах, причем регулярно добавляются новые.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Тестирование разговора по микрофону :</i></b> Опять же, это просто другая часть спецификации HTML5, в данном случае, SpeechRecognition API. Он также поддерживается и разрабатывается профессионалами.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Основанные на изображении викторины :</i></b> Это комбинация вышеуказанных технологий и Google Image Search API. Изображения, отображаемые для опрашиваемого слова, взяты из этих поисков изображений. Это означает, что вы имеете дело со свежими, регулярно используемыми изображениями, которые фактически используют люди, тогда как коммерческие продукты, как правило, имеют очень устаревшие, устаревшие фотографии, которые не представляют особой ценности или интерес для учащихся.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Итак, <i> что конкретно это все значит для нас? </I> Мы используем популярные, ухоженные и хорошо используемые технологии. Голос, который вы слышите, когда слушаете французский, это тот же голос, который сотовый телефон в Париже использовал бы при разговоре со своим пользователем (поскольку Android и iPhone покорно используют спецификации HTML5).</p>' . 
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Что это значит <i> для любого другого продукта для изучения языка </i>? Это означает, что их поддерживают скучные, незаинтересованные грамматики, запертые в своих латинских и древнегреческих залах обучения, без какой-либо языковой связи с живым языком каких-либо людей на планете! Коммерческое предприятие вряд ли может позволить себе больше, чем горстка исследователей - над инструментами, работающими над аудио, голосом и изображением, работают миллионы рук! Подумайте об инженерах из Google, которые пишут спецификации HTML5 для создателей международных стандартов. Сравните, сколько рук работает в технологиях нашего продукта, и сравните его с ведущими рыночными продуктами, и за технологиями здесь стоит один миллион умов для каждого, кого они используют!</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">И, конечно же, мы с открытым исходным кодом! EarthFluent.com создан с использованием <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> CMS Green Gluon </a>, системы управления контентом, разработанной для обеспечения мощности, скорости и масштабируемость.</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Эта технология, использующая PHP7 и MySQL5, обеспечивает все функциональные возможности этого веб-сайта. <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Проверьте нас на GitHub! </a></p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Ниже приведены общие случаи использования этого сайта ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
				
				'<ul>' .
					'<li> Как мне написать на <i> испанском </i>? Как я говорю на <i> испанском </i>? Как мне общаться на <i> испанском </i>?</li>' .
					'<li> Как мне написать на <i> французском </i>? Как я говорю на <i> французском </i>? Как мне общаться на <i> французском </i>?</li>' .
					'<li> Как мне написать на <i> итальянском </i>? Как я говорю по-итальянски </i>? Как мне общаться на <i> итальянском </i>?</li>' .
					'<li> Как мне написать на <i> немецком </i>? Как я говорю на <i> немецком </i>? Как мне общаться на <i> немецком </i>?</li>' .
					'<li> Как мне написать на <i> японском </i>? Как я говорю на <я> японском </I>? Как мне общаться на <i> японском </i>?</li>' .
					'<li> Как мне написать на <i> китайском </i>? Как я говорю на <i> китайском </i>? Как мне общаться на <i> китайском </i>?</li>' .
					'<li> Как мне написать на <я> хинди </I>? Как я говорю на <я> хинди </I>? Как мне общаться на <я> хинди </I>?</li>' .
					'<li> Как мне написать на <i> индонезийском </i>? Как я говорю на <i> индонезийском </i>? Как мне общаться на <i> индонезийском </i>?</li>' .
					'<li> Как мне написать на <i> голландском </i>? Как я говорю на <i> голландском </i>? Как мне общаться на <i> голландском </i>?</li>' .
					'<li> Как мне написать на <i> польском </i>? Как я говорю на <i> польском </i>? Как мне общаться на <i> польском </i>?</li>' .
					'<li> Как мне написать на <i> португальском </i>? Как я говорю на <i> португальском </i>? Как мне общаться на <i> португальском </i>?</li>' .
					'<li> Как мне написать на <i> русском </i>? Как я говорю на <i> русском </i>? Как мне общаться на <i> русском </i>?</li>' .
					'<li> Как мне написать на <i> корейском </i>? Как я говорю на <i> корейском </i>? Как мне общаться на <i> корейском </i>?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Ниже приведены примеры использования сайта ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
					
				'<ul>' .
							// spanish
						// https://www.earthfluent.com/spanish/culture-food-and-drink-part-21/view.php
					'<li> <a href="/spanish/culture-food-and-drink-part-21/view.php">Как мне сказать <i> «встретиться», «поговорить», «предложить» или «говорить» </i> на <i> испанском </i>?</a></li>' .
						// https://www.earthfluent.com/spanish/nouns-animals-part-1/view.php
					'<li> <a href="/spanish/nouns-animals-part-1/view.php">Как мне написать <i> «овца», «корова», «дракон Комодо» или «дикобраз» </i> на <i> испанском </i>?</a></li>' .
							// french
						// https://www.earthfluent.com/french/entertainment-sports-part-5/view.php
					'<li> <a href="/french/entertainment-sports-part-5/view.php">Как мне сказать <i> «серфинг», «скейтбординг», «dodgeball» или «скалолазание» </i> на <i> французском </i>?</a></li>' .
						// https://www.earthfluent.com/french/nouns-animals-part-5/view.php
					'<li> <a href="/french/nouns-animals-part-5/view.php">Как мне написать <i> «рыба», «акула», «сова» или «кролик» </i> на <i> французском </i>?</a></li>' .
							// italian
						// https://www.earthfluent.com/italian/nouns-objects-part-3/view.php
					'<li> <a href="/italian/nouns-objects-part-3/view.php">Как мне сказать <i> «бумага», «стол», «продукт» или «еда» </i> на <i> итальянском </i>?</a></li>' .
						// https://www.earthfluent.com/italian/verbs-general-activity-part-11/view.php
					'<li> <a href="/italian/verbs-general-activity-part-11/view.php">Как мне написать <i> «достичь», «выбрать», «провал» или «подать» </i> на <i> итальянском </i>?</a></li>' .
							// german
						// https://www.earthfluent.com/german/nouns-society-part-72/view.php
					'<li> <a href="/german/nouns-society-part-72/view.php">Как сказать <i> «свадьба», «танец», «обещание» или «выход на пенсию» </i> на <i> немецком </i>?</a></li>' .
						// https://www.earthfluent.com/german/adjectives-quality-part-7/view.php
					'<li> <a href="/german/adjectives-quality-part-7/view.php">Как мне написать <i> «счастливый», «дорогой», «плоский» или «мокрый» </i> на <i> немецком </i>?</a></li>' .
							// japanese
						// https://www.earthfluent.com/japanese/nouns-places-part-19/view.php
					'<li> <a href="/japanese/nouns-places-part-19/view.php">Как мне сказать <i> «долина», «озеро», «паб» или «ресторан» </i> на <i> японском языке </i>?</a></li>' .
						// https://www.earthfluent.com/japanese/nouns-places-part-25/view.php
					'<li> <a href="/japanese/nouns-places-part-25/view.php">Как написать <i> «платформа», «поток», «аэропорт» или «провинция» </i> на <i> японском языке </i>?</a></li>' .
							// chinese
						// https://www.earthfluent.com/chinese/nouns-society-part-12/view.php
					'<li> <a href="/chinese/nouns-society-part-12/view.php">Как сказать <i> «торговля», «обучение», «отношения» или «правило» </i> на <i> китайском </i>?</a></li>' .
						// https://www.earthfluent.com/chinese/nouns-places-part-25/view.php
					'<li> <a href="/chinese/nouns-places-part-25/view.php">Как мне написать <i> «достичь», «пройти», «подняться» или «поймать» </i> на <i> китайском </i>?</a></li>' .
							// hindi
						// https://www.earthfluent.com/hindi/nouns-people-part-55/view.php
					'<li> <a href="/hindi/nouns-people-part-55/view.php">Как мне сказать <i> «торговец», «магистрат», «участник» или «беженец» </i> в <i> хинди </i>?</a></li>' .
						// https://www.earthfluent.com/hindi/nouns-places-part-25/view.php
					'<li> <a href="/hindi/nouns-places-part-25/view.php">Как мне написать <i> «шеф», «гражданин», «редактор» или «генерал» </i> на <i> хинди </i>?</a></li>' .
							// indonesian
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-2/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-2/view.php">Как мне сказать <i> «рассмотреть», «ожидать», «прочитать» или «запомнить» </i> на <i> индонезийском </i>?</a></li>' .
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-8/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-8/view.php">Как мне написать <i> «исследовать», «изучать», «распознавать» или «смотреть» </i> на <i> индонезийском </i>?</a></li>' .
							// dutch
						// https://www.earthfluent.com/dutch/nouns-ideas-part-13/view.php
					'<li> <a href="/dutch/nouns-ideas-part-13/view.php">Как мне сказать <i> «надежда», «значение», «оценка» или «рассмотрение» </i> на <i> голландском </i>?</a></li>' .
						// https://www.earthfluent.com/dutch/nouns-society-part-25/view.php
					'<li> <a href="/dutch/nouns-society-part-25/view.php">Как написать <i> «сделка», «оплата», «агентство» или «сбор» </i> на <i> голландском языке </i></a></li>' .
							// polish
						// https://www.earthfluent.com/polish/verbs-economic-activity-part-5/view.php
					'<li> <a href="/polish/verbs-economic-activity-part-5/view.php">Как мне сказать <i> «зависеть», «получить», «собирать» или «использовать» </i> на <i> польском </i>?</a></li>' .
						// https://www.earthfluent.com/polish/verbs-emotional-activity-part-2/view.php
					'<li> <a href="/polish/verbs-emotional-activity-part-2/view.php">Как мне написать <i> «любовь», «наслаждаться», «общаться» или «страдать» </i> на <i> польском </i>?</a></li>' .
							// portuguese
						// https://www.earthfluent.com/portuguese/nouns-society-part-42/view.php
  					'<li> <a href="/portuguese/nouns-society-part-42/view.php">Как мне сказать <i> «свобода», «лимит», «пенсия» или «уважение» </i> на <i> португальском </i>?</a></li>' .
						// https://www.earthfluent.com/portuguese/nouns-society-part-48/view.php
					'<li> <a href="/portuguese/nouns-society-part-48/view.php">Как написать <i> «толпу», «учебную программу», «насилие» или «служение» </i> на <i> португальском </i></a></li>' .
							// russian
						// https://www.earthfluent.com/russian/culture-calendar-part-3/view.php
					'<li> <a href="/russian/culture-calendar-part-3/view.php">Как мне сказать <i> «сентябрь», «октябрь», «ноябрь» или «декабрь» </i> на <i> русском </i>?</a></li>' .
						// https://www.earthfluent.com/russian/adjectives-feeling-part-6/view.php
					'<li> <a href="/russian/adjectives-feeling-part-6/view.php">Как мне написать <i> «виновный», «рад», «здоров» или «грустный» </i> на <i> русском </i>?</a></li>' .
							// korean
						// https://www.earthfluent.com/korean/culture-food-and-drink-part-21/view.php
					'<li> <a href="/korean/culture-food-and-drink-part-21/view.php">Как сказать <i> «водка», «виски», «текила» или «ром» </i> на <i> корейском </i>?</a></li>' .
						// https://www.earthfluent.com/korean/verbs-social-activity-part-1/view.php
					'<li> <a href="/korean/verbs-social-activity-part-1/view.php">Как мне написать <i> «сказать», «сказать», «спросить» или «показать» </i> на <i> корейском языке </i>?</a></li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">EarthFluent.com был создан и запущен 7 апреля 2017 года. С тех пор мы обучаем всему, что знаем о языке!</p>'
			;
			
			break;
			
		case 'tr':
					// Earth Fluent : Teaching Languages to the World
			$this->header_title_text = $this->master_record['Title'] . ' (Dünya Akıcı) : Dünyaya Dil Öğretimi';
					
					// I learned another language and another way of thinking today!
			$quote_text = 'Bugün başka bir dil ve başka bir düşünce tarzı öğrendim!';
				
					// Want to learn another language?  Learn Spanish, French, Italian, German, Japanese, Chinese, Hindi, Indonesian, Dutch, Polish, Portuguese, or Russian!
			$div_mouseover = 'Başka bir dil öğrenmek ister misiniz? İspanyolca, Fransızca, İtalyanca, Almanca, Japonca, Çince, Hintçe, Endonezyaca, Hollandaca, Lehçe, Portekizce veya Rusça öğrenin!';
			
				// More Information About Us
			$about_header_title_text = 'Hakkımızda Daha Fazla Bilgi';
					
					// Content Header Text
			
			$mission_header_text = 'Misyon';
			$examples_header_text = 'Örnekler';
			$uses_header_text = 'Kullanımları';
			$history_header_text = 'Tarihçe';
			$technology_header_text = 'Teknoloji';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">Gezegendeki başka biriyle iletişim kurmak ister misiniz? Kalbinizin ve ruhunuzun iç kısımlarını herhangi bir tür ruhla değiştirebilmek mi istiyorsunuz? Bugün, problemleriniz sosyal ve teknolojik değil. Sadece duyulmak için doğru dili konuşmanız gerekiyor!</p>' .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\">EarthFluent'te, tek amaç budur: size kendinizi eğitmek ve bir düzine dilden herhangi birini öğrenmek için ihtiyacınız olan araçları vermek. Bu araçlar yazılı kelimeye ve sözlü kelimeye dayanarak görsel ve işitseldir. İfadeleri dinleyerek, mikrofonu kullanarak cümleleri test ederek, herhangi bir sayıda kelime veya ders sınavını alarak, bulmaca ve diğer oyunları oynayarak veya yorumlar bölümünde başkalarıyla iletişim kurarak öğrenebilirsiniz. Öğrenebildiğiniz yollar, insan çeşitliliği kadar sınırsız olmalıdır. Sizi bu öğrenciye ya da o öğrenciye yönlendirmek için burada değiliz, bir şey yapmak için buradayız: size başka bir dilde konuşmayı, yazmayı ve iletişim kurmayı öğretmek için. Bu EarthFluent.</p>" .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Burada gerçekleşen iki hedef var: insanları tüm katılımcılara karşılıklı olarak fayda sağlayacak şekilde bir araya getirmek ve küresel ölçekte kendi kendine öğrenmeyi mümkün kılmak için gereken tüm teknolojiyi sağlamak. Size konuşmacıları veremiyoruz, ancak size cümlelerin ses kliplerini vereceğiz; size bir mikrofon veremiyoruz, ancak mikrofon çıkışınızı beklenen aksan ve dil düzenlerine karşı test edeceğiz; Size İnternet erişimi sağlayamıyoruz, ancak dil hafızanızı test etmek için size Google Görsel Arama tabanlı bir sınav oyunu sunabiliriz. Bize enerjiyi verirseniz, size bilgi vereceğiz. Bu hizmet ücretsiz ve tamamen erişilebilir olmaya adanmıştır. (GitHub projesi bile var!)</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Nereye gitmek istersin? Avrupa, Asya, Güney Amerika, Afrika, Kuzey Amerika veya Avustralya? Bir dili kontrol et, onunla eğitimli ol ve halk arasında mükemmel bir seçim yap!</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px margin-top-22px">Peki, bu aslında tüm <i> nasıl çalışır? </i>? Öğretilecek çok sayıda ticari ürün ve birçoğu daha az ders sunduğundan, <i> bu nasıl ücretsiz yapılabilir </i>? Ve yine de dilbilimsel ve akademik anlamda kişisel deneyimler olarak hem doğru, hem de değer biçmeyiniz mi? Cevaplar sandığınızdan daha kolay.</p>' .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\"><b><i>Ses Dinleme :</i></b> Bu aslında HTML5'te sağlanan SpeechSynthesis API'sını kullanarak oluşturulmuştur. Burada büyülü bir şey yok, sadece on yıldan fazla süredir sektörler arası profesyoneller tarafından incelenmiş bir web özelliği. Bu API şu anda birden fazla lehçede 14 dili desteklemektedir ve daha düzenli olarak eklenmektedir.</p>" .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>Mikrofonda konuşma testi :</i></b> Yine, bu, HTML5 belirtiminin başka bir parçasıdır, bu durumda SpeechRecognition API. O da profesyoneller tarafından korunur ve tasarlanır.</p>' .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\"><b><i>Görüntü Tabanlı Sınavlar :</i></b> Bu, yukarıdaki teknolojilerin ve Google Görsel Arama API'sının bir kombinasyonudur. Test edilen bir kelime için görüntülenen resimler bu görüntü aramalarından alınmıştır. Bu, insanların gerçekte kullandıkları, düzenli olarak kullanılan taze görüntülerle uğraştığınız anlamına gelir, oysa ticari ürünler çok eski ve modası geçmiş bir stok fotoğraflarına sahip olma eğilimindedir;</p>" .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\">Öyleyse, <i> bunların hepsi bizim için ne anlama geliyor? </i> Popüler, bakımlı ve iyi kullanılan teknolojileri kullanıyoruz. Fransızca dinlerken duyduğunuz ses, Paris'teki bir cep telefonuyla aynı sesle aynıdır (kullanıcısı ile konuşurken).</p>" . 
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Bunun anlamı <i> diğer tüm dil öğrenen ürünler için </i> nedir? Bu, onların Latince ve eski Yunanca öğrenme salonlarına kilitlenmiş, gezegendeki herhangi bir insanın diline dilsel bir bağlantısı olmadan sıkıcı, ilgisiz dilbilgileri tarafından korunmaları demektir! Bir ticari işletme, bir avuç araştırmacının elinden daha fazlasını karşılayamaz - yukarıdaki araçlar, ses, ses ve görüntüde milyonlarca el tarafından çalışılmaktadır! Google’daki mühendisleri, uluslararası standart oluşturuculara hitap eden HTML5 yazarlarına düşünün. Ürünümüzün teknolojilerinde kaç elin çalıştığını karşılaştırın ve onu lider pazar ürünleri ile karşılaştırın ve kullandıkları her zihin için teknolojinin arkasında bir milyon zihin var!</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">Ve elbette, açık kaynaklıyız! EarthFluent.com, güç ve hız için tasarlanmış bir içerik yönetim sistemi olan <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a> kullanılarak oluşturulmuştur ölçeklenebilirlik.</p>' .
				
				"<p class=\"margin-0px text-indent-50px margin-top-22px\">PHP7 ve MySQL5 kullanan bu teknoloji, bu web sitesinin tüm işlevselliğini sağlar. <a href=\"https://github.com/HoldOffHunger/GreenGluonCMS\" target=\"_blank\"> GitHub'da bize göz atın! </a></p>"
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">Aşağıda bu sitenin ortak kullanımları bulunmaktadır ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
				
				'<ul>' .
					'<li> <i> İspanyolca </i> dilinde nasıl yazarım? <i> İspanyolca </i> dilinde nasıl konuşabilirim? <i> İspanyolca </i> dilinde nasıl iletişim kurabilirim?</li>' .
					'<li> <i> Fransızca </i> dilinde nasıl yazarım? <i> Fransızca </i> dilinde nasıl konuşabilirim? <i> Fransızca </i> dilinde nasıl iletişim kurabilirim?</li>' .
					'<li> <i> İtalyanca </i> dilinde nasıl yazarım? <i> İtalyanca </i> dilinde nasıl konuşabilirim? <i> İtalyanca </i> ile nasıl iletişim kurabilirim?</li>' .
					"<li> <i> Almanca </i> 'da nasıl yazarım? <i> Almanca </i> dilinde nasıl konuşabilirim? <i> Almanca </i> ile nasıl iletişim kurabilirim?</li>" .
					'<li> <i> Japonca </i> dilinde nasıl yazarım? <i> Japonca </i> dilinde nasıl konuşabilirim? <i> Japonca </i> ile nasıl iletişim kurabilirim?</li>' .
					'<li> <i> Çince </i> dilinde nasıl yazarım? <i> Çince </i> dilinde nasıl konuşabilirim? <i> Çince </i> dilinde nasıl iletişim kurabilirim?</li>' .
					"<li> <i> Hintçe </i> dilinde nasıl yazarım? <i> Hintçe </i> dilinde nasıl konuşabilirim? <i> Hintçe </i> 'de nasıl iletişim kurabilirim?</li>" .
					'<li> <i> Endonezyaca </i> dilinde nasıl yazarım? <i> Endonezyaca </i> dilinde nasıl konuşabilirim? <i> Endonezyaca </i> ile nasıl iletişim kurabilirim?</li>' .
					"<li> <i> Felemenkçe </i> dilinde nasıl yazarım? <i> Hollandaca </i> dilinde nasıl konuşabilirim? <i> Felemenkçe </i> 'de nasıl iletişim kurabilirim?</li>" .
					'<li> <i> Lehçe </i> dilinde nasıl yazarım? <i> Lehçe </i> dilinde nasıl konuşabilirim? <i> Lehçe </i> dilinde nasıl iletişim kurabilirim?</li>' .
					'<li> <i> Portekizce </i> dilinde nasıl yazarım? <i> Portekizce </i> dilinde nasıl konuşabilirim? <i> Portekizce </i> dilinde nasıl iletişim kurabilirim?</li>' .
					'<li> <i> Rusça </i> dilinde nasıl yazarım? <i> Rusça </i> dilinde nasıl konuşabilirim? <i> Rusça </i> dilinde nasıl iletişim kurabilirim?</li>' .
					'<li> <i> Korece </i> dilinde nasıl yazarım? <i> Korece </i> dilinde nasıl konuşabilirim? <i> Korece </i> dilinde nasıl iletişim kurabilirim?</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">Aşağıda sitenin bazı örnek kullanımları bulunmaktadır ...</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
					
				'<ul>' .
							// spanish
						// https://www.earthfluent.com/spanish/culture-food-and-drink-part-21/view.php
					'<li> <a href="/spanish/culture-food-and-drink-part-21/view.php"><i> İspanyolca </i> \'da <i> "tanışma", "konuşma", "öneri" veya "konuşma" </i> nasıl söylerim?</a></li>' .
						// https://www.earthfluent.com/spanish/nouns-animals-part-1/view.php
					'<li> <a href="/spanish/nouns-animals-part-1/view.php"><i> İspanyolca </i> \'da <i> "koyun", "inek", "komodo ejderhası" veya "kirpik" </i>\' i nasıl yazarım?</a></li>' .
							// french
						// https://www.earthfluent.com/french/entertainment-sports-part-5/view.php
					'<li> <a href="/french/entertainment-sports-part-5/view.php"><i> Fransızca </i> \'da <i> "sörf", "kaykay", "yakar top" veya "kaya tırmanışı" </i> nasıl söylerim?</a></li>' .
						// https://www.earthfluent.com/french/nouns-animals-part-5/view.php
					'<li> <a href="/french/nouns-animals-part-5/view.php"><i> Fransızca </i> \'da <i> "balık", "köpek balığı", "baykuş" veya "tavşan" </i>\' ı nasıl yazarım?</a></li>' .
							// italian
						// https://www.earthfluent.com/italian/nouns-objects-part-3/view.php
					'<li> <a href="/italian/nouns-objects-part-3/view.php"><i> İtalyanca </i> \'da <i> "kağıt", "masa", "ürün" veya "yemek" </i>\' i nasıl söylerim?</a></li>' .
						// https://www.earthfluent.com/italian/verbs-general-activity-part-11/view.php
					'<li> <a href="/italian/verbs-general-activity-part-11/view.php"><i> İtalyanca </i> \'da <i> "elde", "seç", "başarısız" veya "hizmet" </i>\' i nasıl yazarım?</a></li>' .
							// german
						// https://www.earthfluent.com/german/nouns-society-part-72/view.php
					'<li> <a href="/german/nouns-society-part-72/view.php"><i> Almanca </i> \'da <i> "düğün", "dans", "söz ver" veya "emeklilik" </i> nasıl söylerim?</a></li>' .
						// https://www.earthfluent.com/german/adjectives-quality-part-7/view.php
					'<li> <a href="/german/adjectives-quality-part-7/view.php"><i> Almanca </i> \'da <i> "şanslı", "sevgili", "düz" veya "ıslak" </i> nasıl yazarım?</a></li>' .
							// japanese
						// https://www.earthfluent.com/japanese/nouns-places-part-19/view.php
					'<li> <a href="/japanese/nouns-places-part-19/view.php"><i> Japonca </i> \'da <i> "vadi", "göl", "pub" veya "restoran" </i> nasıl söyleyebilirim?</a></li>' .
						// https://www.earthfluent.com/japanese/nouns-places-part-25/view.php
					'<li> <a href="/japanese/nouns-places-part-25/view.php"><i> Japonca </i> \'da <i> "platform", "stream", "havaalanı" veya "il" </i>\' yi nasıl yazarım?</a></li>' .
							// chinese
						// https://www.earthfluent.com/chinese/nouns-society-part-12/view.php
					'<li> <a href="/chinese/nouns-society-part-12/view.php"><i> Çince </i> \'de <i> "ticaret", "eğitim", "ilişki" veya "kural" </i> nasıl söylerim?</a></li>' .
						// https://www.earthfluent.com/chinese/nouns-places-part-25/view.php
					'<li> <a href="/chinese/nouns-places-part-25/view.php"><i> Çince </i> \'de <i> "reach", "walk", "rise" veya "catch" </i> nasıl yazarım?</a></li>' .
							// hindi
						// https://www.earthfluent.com/hindi/nouns-people-part-55/view.php
					'<li> <a href="/hindi/nouns-people-part-55/view.php"><i> Hintçe </i> \'de <i> "satıcı", "hakaret", "katılımcı" veya "mülteci" </i> nasıl söylerim?</a></li>' .
						// https://www.earthfluent.com/hindi/nouns-places-part-25/view.php
					'<li> <a href="/hindi/nouns-places-part-25/view.php"><i> Hintçe </i> \'de <i> "şef", "vatandaş", "editör" veya "genel" </i> nasıl yazarım?</a></li>' .
							// indonesian
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-2/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-2/view.php"><i> Endonezyaca </i> \'da <i> "düşün", "bekle", "oku" veya "hatırla" </i>\' yı nasıl söylerim?</a></li>' .
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-8/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-8/view.php"><i> Endonezyaca </i> \'da <i> "incelemek", "ders çalışmak", "tanımak" veya "bakış" nasıl yazılır?</a></li>' .
							// dutch
						// https://www.earthfluent.com/dutch/nouns-ideas-part-13/view.php
					'<li> <a href="/dutch/nouns-ideas-part-13/view.php"><i> Felemenkçe </i> \'de <i> "umut", "anlam", "değerlendirme" veya "değerlendirme" </i>\' yi nasıl söylerim?</a></li>' .
						// https://www.earthfluent.com/dutch/nouns-society-part-25/view.php
					'<li> <a href="/dutch/nouns-society-part-25/view.php"><i> Felemenkçe </i> \'de <i> "anlaşma", "ödeme", "ajans" veya "koleksiyon" </i> nasıl yazarım?</a></li>' .
							// polish
						// https://www.earthfluent.com/polish/verbs-economic-activity-part-5/view.php
					'<li> <a href="/polish/verbs-economic-activity-part-5/view.php"><i> Lehçe </i> \'da <i> "bağımlı", "kazanç", "topla" veya "işe al" </i>\' ı nasıl söyleyebilirim?</a></li>' .
						// https://www.earthfluent.com/polish/verbs-emotional-activity-part-2/view.php
					'<li> <a href="/polish/verbs-emotional-activity-part-2/view.php"><i> Lehçe </i> \'da <i> "aşk", "zevk", "ilişki" veya "acı" </i> nasıl yazarım?</a></li>' .
							// portuguese
						// https://www.earthfluent.com/portuguese/nouns-society-part-42/view.php
  					'<li> <a href="/portuguese/nouns-society-part-42/view.php"><i> Portekizce </i> \'de <i> "özgürlük", "sınır", "emeklilik" veya "saygı" </i> nasıl söylerim?</a></li>' .
						// https://www.earthfluent.com/portuguese/nouns-society-part-48/view.php
					'<li> <a href="/portuguese/nouns-society-part-48/view.php"><i> Portekizce </i> \'de <i> "kalabalık", "müfredat", "şiddet" veya "bakanlık" </i>\' ı nasıl yazarım?</a></li>' .
							// russian
						// https://www.earthfluent.com/russian/culture-calendar-part-3/view.php
					'<li> <a href="/russian/culture-calendar-part-3/view.php"><i> Rusça </i> \'da <i> "eylül", "ekim", "kasım" veya "aralık" </i>\' ı nasıl söylerim?</a></li>' .
						// https://www.earthfluent.com/russian/adjectives-feeling-part-6/view.php
					'<li> <a href="/russian/adjectives-feeling-part-6/view.php"><i> Rusça </i> \'da <i> "suçlu", "memnun", "sağlıklı" veya "üzgün" </i>\' i nasıl yazarım?</a></li>' .
							// korean
						// https://www.earthfluent.com/korean/culture-food-and-drink-part-21/view.php
					'<li> <a href="/korean/culture-food-and-drink-part-21/view.php"><i> Korece </i> \'de <i> "votka", "viski", "tekila" veya "rum" </i> nasıl söylerim?</a></li>' .
						// https://www.earthfluent.com/korean/verbs-social-activity-part-1/view.php
					'<li> <a href="/korean/verbs-social-activity-part-1/view.php"><i> Korece </i> içine <i> "say", "anlat", "sor" veya "göster" </i> \'i nasıl yazarım?</a></li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">EarthFluent.com 7 Nisan 2017\'de oluşturuldu ve başlatıldı. O zamandan beri, dil hakkında bildiğimiz her şeyi ve her şeyi öğretiyoruz!</p>'
			;
			
			break;
			
		case 'zh':
					// Earth Fluent : Teaching Languages to the World
			$this->header_title_text = $this->master_record['Title'] . ' （地球流利） : 向世界教授语言';
					
					// I learned another language and another way of thinking today!
			$quote_text = '我今天学到了另一种语言和另一种思维方式！';
				
					// Want to learn another language?  Learn Spanish, French, Italian, German, Japanese, Chinese, Hindi, Indonesian, Dutch, Polish, Portuguese, or Russian!
			$div_mouseover = '想学习另一种语言？ 学习西班牙语，法语，意大利语，德语，日语，中文，印地语，印度尼西亚语，荷兰语，波兰语，葡萄牙语或俄语！';
			
				// More Information About Us
			$about_header_title_text = '关于我们的更多信息';
					
					// Content Header Text
			
			$mission_header_text = '任务';
			$examples_header_text = '例子';
			$uses_header_text = '用途';
			$history_header_text = '历史';
			$technology_header_text = '技术';
			
					// Content Text
			
			$mission_info_text =
				'<p class="margin-0px text-indent-50px">想与地球上的其他任何人交流？ 想要能够用任何相似的精神交换你内心和灵魂的内在部分吗？ 那么，今天，你的问题可能是社交问题，而不是技术问题。 你只需要讲正确的语言就能听到！</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">在EarthFluent，这是唯一的目标：为您提供教育自己和学习十几种语言所需的工具。 这些工具是视觉和听觉的，基于书面文字和口语。 您可以通过聆听短语，使用麦克风测试短语，参加任意数量的单词或课程测验，玩填字游戏和其他游戏，或通过评论部分与他人交流来学习。 你可以学习的方法应该像人类的多样性一样无限。 我们不是要把你塑造成这个学生或那个学生，我们在这里做一件事：教你用另一种语言说，写和交流。 那是EarthFluent。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">这里有两个目标：以一种互惠互利的方式将人们聚集在一起，并提供使全球范围内的自学成为可能所需的所有技术。 我们不能给你发音，但我们会给你短语的音频片段; 我们不能给你一个麦克风，但我们会测试你的麦克风输出与预期的重音和语言模式; 我们无法为您提供互联网访问权限，但我们可以为您提供基于Google图像搜索的测验游戏，以测试您的语言记忆。 如果你给我们能量，我们你会给你知识。 这项服务致力于免费和完全访问。 （甚至有一个GitHub项目！）</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">你想去哪里？ 欧洲，亚洲，南美洲，非洲，北美洲或澳大利亚？ 查看一门语言，接受教育，你将完全适合当地人！</p>'
			;
			
			$technology_info_text =
				'<p class="margin-0px text-indent-50px margin-top-22px">那么，这实际上是如何<i>工作</i>？ 有这么多商业产品可用于教学，其中许多提供的课程较少，<i>我们怎样才能免费完成</i>？ 在语言学和学术意义上，作为个人经验和准确，仍然是值得的吗？ 答案比你想象的要容易。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>听音频 :</i></b> 这实际上是使用HTML5中提供的SpeechSynthesis API组成的。 这里没有什么神奇之处，只是一个由成千上万的跨行业专业人士工作了十年的网络规范。 此API目前支持多种方言中的14种语言，并且定期添加更多语言。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>测试讲麦克风 :</i></b> 同样，这只是HTML5规范的另一部分，在本例中是SpeechRecognition API。 它也是由专业人士维护和设计的。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px"><b><i>基于图像的测验 :</i></b> 这是上述技术和Google Image Search API的组合。 针对被测定的单词显示的图像来自这些图像搜索。 这意味着您正在处理人们实际使用的新鲜的，经常使用的图像，而商业产品往往具有非常陈旧，过时的股票照片，对学习者来说没有什么价值或兴趣。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">那么，<i>这对我们来说究竟意味着什么？</i>我们使用流行的，维护良好且使用良好的技术。 听到法语时听到的音频，就像巴黎的手机一样用来与用户说话（因为Android和iPhone尽职尽责地使用HTML5规格）。</p>' . 
				
				'<p class="margin-0px text-indent-50px margin-top-22px">对于其他所有语言学习产品</i>，这意味着什么？ 这意味着他们由无聊的，不感兴趣的语法学家维护，被锁在拉丁语和古希腊语学习的大厅里，与地球上任何人的生活语言没有任何语言联系！ 一个商业企业几乎买不起少数研究人员 - 上面的工具，无论是音频，语音和图像，都是由数百万人掌握的！ 将Google的工程师想象成国际标准创建者的HTML5规范编写者。 比较我们的产品技术中有多少只手工作，并将其与领先的市场产品进行比较，对于他们所采用的每一种思想，这里的技术背后有一百万个人！</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">当然，我们是开源的！ EarthFluent.com使用<a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank"> Green Gluon CMS </a>构建，这是一个专为功率，速度和设计而设计的内容管理系统可扩展性。</p>' .
				
				'<p class="margin-0px text-indent-50px margin-top-22px">这项技术使用PHP7和MySQL5，提供了本网站的所有功能。 <a href="https://github.com/HoldOffHunger/GreenGluonCMS" target="_blank">在GitHub上查看我们！</a></p>'
			;
			
			$examples_info_text =
				'<p class="margin-0px text-indent-50px">以下是本网站的常见用途......</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
				
				'<ul>' .
					'<li> 我如何用<i>西班牙语</i>写作？ 我怎么用<i>西班牙语</i>说话？ 我如何用<i>西班牙语</i>进行交流？</li>' .
					'<li> 如何用<i>法语</i>书写？ 我怎么用<i>法语</i>说话？ 我如何用<i>法语</i>进行交流？</li>' .
					'<li> 我如何用<i>意大利语</i>写作？ 我怎么用<i>意大利语</i>说话？ 我如何用<i>意大利语</i>进行交流？</li>' .
					'<li> 如何用<i>德语</i>书写？ 我怎么用<i>德语</i>说话？ 我如何用<i>德语</i>进行交流？</li>' .
					'<li> 如何用<i>日语</i>书写？ 我怎么用<i>日语</i>说话？ 我如何用<i>日语</i>进行交流？</li>' .
					'<li> 我怎么用<i>中文</i>写？ 我怎么用<i>中文</i>说话？ 我如何用<i>中文</i>进行交流？</li>' .
					'<li> 我如何用<i>印地语</i>写作？ 我怎么用<i>印地语</i>说话？ 我如何用<i>印地语</i>进行交流？</li>' .
					'<li> 我如何用<i>印尼语</i>书写？ 我怎么用<i>印度尼西亚语</i>说话？ 我如何用<i>印度尼西亚语</i>进行交流？</li>' .
					'<li> 我如何用<i>荷兰语</i>写作？ 我怎么用<i>荷兰语</i>说话？ 我如何用<i>荷兰语</i>进行交流？</li>' .
					'<li> 我如何用<i>波兰语</i>写作？ 我怎么用<i>波兰语</i>说话？ 我如何用<i>波兰语</i>进行交流？</li>' .
					'<li> 如何用<i>葡萄牙语</i>书写？ 我怎么用<i>葡萄牙语</i>说话？ 我如何用<i>葡萄牙语</i>进行交流？</li>' .
					'<li> 我如何用<i>俄语</i>写作？ 我怎么用<i>俄语</i>说话？ 我如何用<i>俄语</i>进行交流？</li>' .
					'<li> 如何用<i>韩文</i>书写？ 我怎么用<i>韩语</i>说话？ 我如何用<i>韩语</i>进行交流？</li>' .
				'</ul>'
			;
			
			$uses_info_text =
				'<p class="margin-0px text-indent-50px">以下是该网站的一些示例用途......</p>' .
				
					// spanish, french, italian, german, japanese, chinese, hindi, indonesian, dutch, polish, portuguese, russian, korean
					
				'<ul>' .
							// spanish
						// https://www.earthfluent.com/spanish/culture-food-and-drink-part-21/view.php
					'<li> <a href="/spanish/culture-food-and-drink-part-21/view.php">我如何在<i>西班牙语</i>中说<i>“见面”，“说话”，“建议”或“说话”</i>？</a></li>' .
						// https://www.earthfluent.com/spanish/nouns-animals-part-1/view.php
					'<li> <a href="/spanish/nouns-animals-part-1/view.php">我怎样写<I> “羊”， “牛”， “科莫多龙” 或 “豪猪”</I>在<I>西班牙</I>？</a></li>' .
							// french
						// https://www.earthfluent.com/french/entertainment-sports-part-5/view.php
					'<li> <a href="/french/entertainment-sports-part-5/view.php">如何在<i>法语</i>中说<i>“冲浪”，“滑板”，“躲避球”或“攀岩”</i>？</a></li>' .
						// https://www.earthfluent.com/french/nouns-animals-part-5/view.php
					'<li> <a href="/french/nouns-animals-part-5/view.php">我怎样写<I> “鱼”， “鲨鱼”， “猫头鹰”，或者 “兔子”</I>在<I>法</I>？</a></li>' .
							// italian
						// https://www.earthfluent.com/italian/nouns-objects-part-3/view.php
					'<li> <a href="/italian/nouns-objects-part-3/view.php">我怎么说的<i> “纸”， “表”， “产品” 或 “食物”</I>在<I>意大利</I>？</a></li>' .
						// https://www.earthfluent.com/italian/verbs-general-activity-part-11/view.php
					'<li> <a href="/italian/verbs-general-activity-part-11/view.php">如何在<i>意大利语</i>中编写<i>“达成”，“选择”，“失败”或“提供服务”</i>？</a></li>' .
							// german
						// https://www.earthfluent.com/german/nouns-society-part-72/view.php
					'<li> <a href="/german/nouns-society-part-72/view.php">我如何在<i>德语</i>中说<i>“婚礼”，“跳舞”，“承诺”或“退休”</i>？</a></li>' .
						// https://www.earthfluent.com/german/adjectives-quality-part-7/view.php
					'<li> <a href="/german/adjectives-quality-part-7/view.php">我怎样写<I> “幸运”， “亲爱的”， “平”，或者 “湿”</I>在<I>德国</I>？</a></li>' .
							// japanese
						// https://www.earthfluent.com/japanese/nouns-places-part-19/view.php
					'<li> <a href="/japanese/nouns-places-part-19/view.php">我怎么说的<i> “谷”， “湖”， “酒馆”，或 “餐厅”</I>在<I>日本</I>？</a></li>' .
						// https://www.earthfluent.com/japanese/nouns-places-part-25/view.php
					'<li> <a href="/japanese/nouns-places-part-25/view.php">我怎样写<I> “平台”， “流”， “机场”，或 “省”</I>在<I>日本</I>？</a></li>' .
							// chinese
						// https://www.earthfluent.com/chinese/nouns-society-part-12/view.php
					'<li> <a href="/chinese/nouns-society-part-12/view.php">如何在<i>中文</i>中说<i>“交易”，“培训”，“关系”或“规则”</i>？</a></li>' .
						// https://www.earthfluent.com/chinese/nouns-places-part-25/view.php
					'<li> <a href="/chinese/nouns-places-part-25/view.php">如何在<i>中文</i>中写<i>“达到”，“走路”，“上升”或“抓住”</i>？</a></li>' .
							// hindi
						// https://www.earthfluent.com/hindi/nouns-people-part-55/view.php
					'<li> <a href="/hindi/nouns-people-part-55/view.php">如何在<i>印地语</i>中说<i>“商人”，“地方官员”，“参与者”或“难民”</i>？</a></li>' .
						// https://www.earthfluent.com/hindi/nouns-places-part-25/view.php
					'<li> <a href="/hindi/nouns-places-part-25/view.php">我怎样写<I> “首席”， “公民”， “编辑”，或 “一般”</I>在<I>印地文</I>？</a></li>' .
							// indonesian
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-2/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-2/view.php">我如何在<i>印尼语</i>中说<i>“考虑”，“期待”，“阅读”或“记住”</i>？</a></li>' .
						// https://www.earthfluent.com/indonesian/verbs-mental-activity-part-8/view.php
					'<li> <a href="/indonesian/verbs-mental-activity-part-8/view.php">如何在<i>印尼语</i>中写<i>“检查”，“学习”，“识别”或“凝视”</i>？</a></li>' .
							// dutch
						// https://www.earthfluent.com/dutch/nouns-ideas-part-13/view.php
					'<li> <a href="/dutch/nouns-ideas-part-13/view.php">我如何在<i>荷兰语</i>中说<i>“希望”，“含义”，“评估”或“考虑”</i>？</a></li>' .
						// https://www.earthfluent.com/dutch/nouns-society-part-25/view.php
					'<li> <a href="/dutch/nouns-society-part-25/view.php">我怎样写<I> “交易”， “支付”， “代理”，或 “收藏”</I>在<I>荷兰</I>？</a></li>' .
							// polish
						// https://www.earthfluent.com/polish/verbs-economic-activity-part-5/view.php
					'<li> <a href="/polish/verbs-economic-activity-part-5/view.php">如何在<i>波兰语</i>中说<i>“依赖”，“获取”，“收集”或“雇用”</i>？</a></li>' .
						// https://www.earthfluent.com/polish/verbs-emotional-activity-part-2/view.php
					'<li> <a href="/polish/verbs-emotional-activity-part-2/view.php">如何在<i>波兰语</i>中写下<i>“爱”，“享受”，“关联”或“受苦”</i>？</a></li>' .
							// portuguese
						// https://www.earthfluent.com/portuguese/nouns-society-part-42/view.php
  					'<li> <a href="/portuguese/nouns-society-part-42/view.php">我如何在<i>葡萄牙语</i>中说<i>“自由”，“限制”，“养老金”或“尊重”</i>？</a></li>' .
						// https://www.earthfluent.com/portuguese/nouns-society-part-48/view.php
					'<li> <a href="/portuguese/nouns-society-part-48/view.php">如何在<i>葡萄牙语</i>中写下<i>“人群”，“课程”，“暴力”或“事工”</i>？</a></li>' .
							// russian
						// https://www.earthfluent.com/russian/culture-calendar-part-3/view.php
					'<li> <a href="/russian/culture-calendar-part-3/view.php">如何在<i>俄语</i>中说<i>“9月”，“10月”，“11月”或“12月”</i>？</a></li>' .
						// https://www.earthfluent.com/russian/adjectives-feeling-part-6/view.php
					'<li> <a href="/russian/adjectives-feeling-part-6/view.php">我如何在<i>俄语</i>中写<i>“有罪”，“高兴”，“健康”或“悲伤”</i>？</a></li>' .
							// korean
						// https://www.earthfluent.com/korean/culture-food-and-drink-part-21/view.php
					'<li> <a href="/korean/culture-food-and-drink-part-21/view.php">我怎么说<i>韩国</i>中的<i>“伏特加”，“威士忌”，“龙舌兰酒”或“朗姆酒”</i>？</a></li>' .
						// https://www.earthfluent.com/korean/verbs-social-activity-part-1/view.php
					'<li> <a href="/korean/verbs-social-activity-part-1/view.php">如何在<i>韩语</i>中写<i>“说”，“告诉”，“询问”或“显示”</i>？</a></li>' .
				'</ul>'
			;
			
			$history_info_text =
				'<p class="margin-0px text-indent-50px">EarthFluent.com于2017年4月7日创建并推出。从那时起，我们一直在教授任何语言知识！</p>'
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>' . $this->master_record['Title'] . ' ' . $mission_header_text . ' :</em></h3></center>');
	
	$divider->displayend($divider_end_args);
	
			// Display Mission Info
			
		// ------------------------------------------------------
	
	$divider->displaystart($divider_sectional_area_start_args);
	
	print('<div class="padding-5px margin-20px horizontal-left font-family-arial">' . $mission_info_text . '</div>');
	
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>' . $this->master_record['Title'] . ' ' . $technology_header_text . ' :</em></h3></center>');
	
	$divider->displayend($divider_end_args);
	
			// Display Mission Info
			
		// ------------------------------------------------------
	
	$divider->displaystart($divider_sectional_area_start_args);
	
	print('<div class="padding-5px margin-20px horizontal-left font-family-arial">' . $technology_info_text . '</div>');
	
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>' . $this->master_record['Title'] . ' ' . $examples_header_text . ' :</em></h3></center>');
	
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>' . $this->master_record['Title'] . ' ' . $uses_header_text . ' :</em></h3></center>');
	
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
	
	print('<center><h3 class="margin-5px font-family-tahoma"><em>' . $this->master_record['Title'] . ' ' . $history_header_text . ' :</em></h3></center>');
	
	$divider->displayend($divider_end_args);
	
			// Display Mission Info
			
		// ------------------------------------------------------
	
	$divider->displaystart($divider_sectional_area_start_args);
	
	print('<div class="padding-5px margin-20px horizontal-left font-family-arial">' . $history_info_text . '</div>');
	
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