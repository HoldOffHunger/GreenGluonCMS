<?php

	class module_similarsites_satellites extends module_spacing
	{
		public function __construct($args)
		{
			$this->site = $args['site'];
			$this->language = $args['language'];
		}
		
		public function getSites()
		{
			$language = $this->language;
			
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
			
			switch($language->language_code) {
				default:
				case 'en':	// English
					$site_info_pieces = [
						[
							title=>'EarthFluent.com',
							domain=>'earthfluent.com',
							url=>'http://www.earthfluent.com/',
							slogan=>'Teaching Languages to the World.',
							description=>'Want to learn another language?  Learn Spanish, French, Italian, German, Japanese, Chinese, Hindi, Indonesian, Dutch, Polish, Portuguese, or Russian!',
							quote=>'I learned another language and another way of thinking today!',
						],
						[
							title=>'ListKeyWords.com',
							domain=>'listkeywords.com',
							url=>'http://www.listkeywords.com/',
							slogan=>'Listing your keywords for you.',
							description=>'Use this web app to list keywords and keyphrases.  You may remove html, ignore common words, and sort generated lists of keywords.',
							quote=>'I generated some keywords today!',
						],
						[
							title=>'PronounceThat.com',
							domain=>'pronouncethat.com',
							url=>'http://www.pronouncethat.com/',
							slogan=>'How do I pronounce that?',
							description=>'Use this web app to learn the pronunciation of words.  You can learn English or international words, and you can enter them by voice or by typing.',
							quote=>'I learned pronunciation today!',
						],
						[
							title=>'RemoveBlankLines.com',
							domain=>'removeblanklines.com',
							url=>'http://www.removeblanklines.com/',
							slogan=>'Removing blank lines from lists.',
							description=>'Use this tool to remove blank lines from your text lists.',
							quote=>'I removed so many blank lines today!',
						],
						[
							title=>'RemoveDuplicateLines.com',
							domain=>'removeduplicatelines.com',
							url=>'http://www.removeduplicatelines.com/',
							slogan=>'Removing duplicate entries from lists.',
							description=>'Use this tool to remove duplicate lines from your text lists.',
							quote=>'I removed so many duplicate lines today!',
						],
						[
							title=>'RemoveSpacing.com',
							domain=>'removespacing.com',
							url=>'http://www.removespacing.com/',
							slogan=>'Removing spaces and spacing from your text.',
							description=>'Use this web app to remove spacing from text.  You may remove spaces, tabs, indents, newlines, and carriage returns.',
							quote=>'I removed some spacing today!',
						],
						[
							title=>'SortWords.com',
							domain=>'sortwords.com',
							url=>'http://www.sortwords.com/',
							slogan=>'Sorting your lists of words for you.',
							description=>'Use this web app to sort lists of words and phrases.  You may sort alphabetically, reverse alphabetically, numerically, or reverse numerically.',
							quote=>'I sorted some words today!',
						],
						[
							title=>'WordWeight.com',
							domain=>'wordweight.com',
							url=>'http://www.wordweight.com/',
							slogan=>'Weigh the words.',
							description=>'Look up a word.  Any dictionary, any definition, any time.',
							quote=>'Do you want to know?  Look it up and then you know.',
						],
					];
					break;
					
				case 'de':	// German
					$site_info_pieces = [
						[
							title=>'EarthFluent.com',
							domain=>'earthfluent.com',
							url=>'http://www.earthfluent.com/',
							slogan=>'Sprachen unterrichten für die Welt.',
							description=>'Willst du eine andere Sprache lernen? Lerne Spanisch, Französisch, Italienisch, Deutsch, Japanisch, Chinesisch, Hindi, Indonesisch, Niederländisch, Polnisch, Portugiesisch oder Russisch!',
							quote=>'Ich habe heute eine andere Sprache und eine andere Denkweise gelernt!',
						],
						[
							title=>'ListKeyWords.com',
							domain=>'listkeywords.com',
							url=>'http://www.listkeywords.com/',
							slogan=>'Listing Ihrer Keywords für Sie.',
							description=>'Verwenden Sie diese Web-App, um Schlüsselwörter und Schlüsselwörter aufzulisten. Sie können html entfernen, gebräuchliche Wörter ignorieren und generierte Stichwortlisten sortieren.',
							quote=>'Ich habe heute einige Keywords generiert!',
						],
						[
							title=>'PronounceThat.com',
							domain=>'pronouncethat.com',
							url=>'http://www.pronouncethat.com/',
							slogan=>'Wie spreche ich das aus?',
							description=>'Verwenden Sie diese Web-App, um die Aussprache von Wörtern zu erlernen. Sie können englische oder internationale Wörter lernen und sie per Sprache oder durch Eingabe eingeben.',
							quote=>'Ich habe heute die Aussprache gelernt!',
						],
						[
							title=>'RemoveBlankLines.com',
							domain=>'removeblanklines.com',
							url=>'http://www.removeblanklines.com/',
							slogan=>'Leere Zeilen aus Listen entfernen.',
							description=>'Verwenden Sie dieses Tool, um leere Zeilen aus Ihren Textlisten zu entfernen.',
							quote=>'Ich habe heute so viele leere Zeilen entfernt!',
						],
						[
							title=>'RemoveDuplicateLines.com',
							domain=>'removeduplicatelines.com',
							url=>'http://www.removeduplicatelines.com/',
							slogan=>'Doppelte Einträge aus Listen entfernen.',
							description=>'Verwenden Sie dieses Tool, um doppelte Zeilen aus Ihren Textlisten zu entfernen.',
							quote=>'Ich habe heute so viele doppelte Zeilen entfernt!',
						],
						[
							title=>'RemoveSpacing.com',
							domain=>'removespacing.com',
							url=>'http://www.removespacing.com/',
							slogan=>'Leerzeichen und Abstände aus Ihrem Text entfernen.',
							description=>'Verwenden Sie diese Web-App, um Abstand vom Text zu entfernen. Sie können Leerzeichen, Tabulatoren, Einzüge, Zeilenumbrüche und Zeilenumbrüche entfernen.',
							quote=>'Ich habe heute etwas Abstand entfernt!',
						],
						[
							title=>'SortWords.com',
							domain=>'sortwords.com',
							url=>'http://www.sortwords.com/',
							slogan=>'Sortieren Sie Ihre Wortlisten für Sie.',
							description=>'Verwenden Sie diese Web-App, um Wortlisten und Phrasen zu sortieren. Sie können alphabetisch sortieren, alphabetisch umkehren, numerisch oder numerisch umkehren.',
							quote=>'Ich habe heute einige Wörter sortiert!',
						],
						[
							title=>'WordWeight.com',
							domain=>'wordweight.com',
							url=>'http://www.wordweight.com/',
							slogan=>'Wiege die Worte.',
							description=>'Ein Wort nachschlagen. Jedes Wörterbuch, jede Definition, jederzeit.',
							quote=>'Willst du wissen? Schauen Sie nach und dann wissen Sie es.',
						],
					];
					break;
				
				case 'es':	// Spanish
					$site_info_pieces = [
						[
							title=>'EarthFluent.com',
							domain=>'earthfluent.com',
							url=>'http://www.earthfluent.com/',
							slogan=>'Enseñando lenguas al mundo.',
							description=>'¿Quieres aprender otro idioma? ¡Aprenda español, francés, italiano, alemán, japonés, chino, hindi, indonesio, holandés, polaco, portugués o ruso!',
							quote=>'¡Aprendí otro idioma y otra forma de pensar hoy!',
						],
						[
							title=>'ListKeyWords.com',
							domain=>'listkeywords.com',
							url=>'http://www.listkeywords.com/',
							slogan=>'Listado de sus palabras clave para usted.',
							description=>'Utilice esta aplicación web para enumerar palabras clave y frases clave. Puede eliminar html, ignorar palabras comunes y ordenar listas generadas de palabras clave.',
							quote=>'¡Generé algunas palabras claves hoy!',
						],
						[
							title=>'PronounceThat.com',
							domain=>'pronouncethat.com',
							url=>'http://www.pronouncethat.com/',
							slogan=>'¿Cómo se pronuncia eso?',
							description=>'Usa esta aplicación web para aprender la pronunciación de las palabras. Puede aprender palabras en inglés o internacionales, y puede ingresarlas por voz o escribiendo.',
							quote=>'¡Aprendí la pronunciación hoy!',
						],
						[
							title=>'RemoveBlankLines.com',
							domain=>'removeblanklines.com',
							url=>'http://www.removeblanklines.com/',
							slogan=>'Eliminar líneas en blanco de las listas.',
							description=>'Utilice esta herramienta para eliminar líneas en blanco de sus listas de texto.',
							quote=>'¡Quité tantas líneas en blanco hoy!',
						],
						[
							title=>'RemoveDuplicateLines.com',
							domain=>'removeduplicatelines.com',
							url=>'http://www.removeduplicatelines.com/',
							slogan=>'Eliminar entradas duplicadas de listas.',
							description=>'Utilice esta herramienta para eliminar líneas duplicadas de sus listas de texto.',
							quote=>'¡Eliminé tantas líneas duplicadas hoy!',
						],
						[
							title=>'RemoveSpacing.com',
							domain=>'removespacing.com',
							url=>'http://www.removespacing.com/',
							slogan=>'Eliminando espacios y espacios de su texto.',
							description=>'Utilice esta aplicación web para eliminar el espaciado del texto. Puede eliminar espacios, tabulaciones, sangrías, nuevas líneas y retornos de carro.',
							quote=>'Quité un poco de espacio hoy!',
						],
						[
							title=>'SortWords.com',
							domain=>'sortwords.com',
							url=>'http://www.sortwords.com/',
							slogan=>'Ordenar tus listas de palabras para ti.',
							description=>'Utilice esta aplicación web para ordenar listas de palabras y frases. Puede ordenar alfabéticamente, revertir alfabéticamente, numéricamente o revertir numéricamente.',
							quote=>'¡Clasifiqué algunas palabras hoy!',
						],
						[
							title=>'WordWeight.com',
							domain=>'wordweight.com',
							url=>'http://www.wordweight.com/',
							slogan=>'Sopesar las palabras.',
							description=>'Buscar una palabra. Cualquier diccionario, cualquier definición, cualquier momento.',
							quote=>'¿Quieres saber? Míralo y ya sabes.',
						],
					];
					break;
					
				case 'fr':	// French
					$site_info_pieces = [
						[
							title=>'EarthFluent.com',
							domain=>'earthfluent.com',
							url=>'http://www.earthfluent.com/',
							slogan=>'Enseigner les langues au monde.',
							description=>"Voulez-vous apprendre une autre langue? Apprenez l'espagnol, le français, l'italien, l'allemand, le japonais, le chinois, l'hindi, l'indonésien, le néerlandais, le polonais, le portugais ou le russe!",
							quote=>"J'ai appris une autre langue et une autre façon de penser aujourd'hui!",
						],
						[
							title=>'ListKeyWords.com',
							domain=>'listkeywords.com',
							url=>'http://www.listkeywords.com/',
							slogan=>'Lister vos mots-clés pour vous.',
							description=>"Utilisez cette application Web pour répertorier les mots-clés et les phrases clés. Vous pouvez supprimer le langage HTML, ignorer les mots courants et trier les listes générées de mots-clés.",
							quote=>"J'ai généré des mots-clés aujourd'hui!",
						],
						[
							title=>'PronounceThat.com',
							domain=>'pronouncethat.com',
							url=>'http://www.pronouncethat.com/',
							slogan=>'Comment est-ce que je prononce ça?',
							description=>'Utilisez cette application Web pour apprendre la prononciation des mots. Vous pouvez apprendre des mots anglais ou internationaux et vous pouvez les saisir à la voix ou en les tapant.',
							quote=>"J'ai appris la prononciation aujourd'hui!",
						],
						[
							title=>'RemoveBlankLines.com',
							domain=>'removeblanklines.com',
							url=>'http://www.removeblanklines.com/',
							slogan=>"Supprimer les lignes vides des listes.",
							description=>'Utilisez cet outil pour supprimer les lignes vides de vos listes de textes.',
							quote=>"J'ai supprimé autant de lignes vierges aujourd'hui!",
						],
						[
							title=>'RemoveDuplicateLines.com',
							domain=>'removeduplicatelines.com',
							url=>'http://www.removeduplicatelines.com/',
							slogan=>'Supprimer les entrées en double des listes.',
							description=>'Utilisez cet outil pour supprimer les lignes en double de vos listes de textes.',
							quote=>"J'ai supprimé autant de doublons aujourd'hui!",
						],
						[
							title=>'RemoveSpacing.com',
							domain=>'removespacing.com',
							url=>'http://www.removespacing.com/',
							slogan=>'Supprimer des espaces et des espaces de votre texte.',
							description=>"Utilisez cette application Web pour supprimer l'espacement du texte. Vous pouvez supprimer des espaces, des tabulations, des retraits, des nouvelles lignes et des retours à la ligne.",
							quote=>"J'ai enlevé un peu d'espacement aujourd'hui!",
						],
						[
							title=>'SortWords.com',
							domain=>'sortwords.com',
							url=>'http://www.sortwords.com/',
							slogan=>'Tri de vos listes de mots pour vous.',
							description=>"Utilisez cette application Web pour trier des listes de mots et d'expressions. Vous pouvez trier alphabétiquement, inverser alphabétiquement, numériquement ou inversement numérique.",
							quote=>"J'ai trié quelques mots aujourd'hui!",
						],
						[
							title=>'WordWeight.com',
							domain=>'wordweight.com',
							url=>'http://www.wordweight.com/',
							slogan=>'Peser les mots.',
							description=>"Rechercher un mot. N'importe quel dictionnaire, n'importe quelle définition, n'importe quand.",
							quote=>'Voulez-vous savoir? Regardez et vous savez.',
						],
					];
					break;
					
				case 'ja':	// Japanese
					$site_info_pieces = [
						[
							title=>'EarthFluent.com',
							domain=>'earthfluent.com',
							url=>'http://www.earthfluent.com/',
							slogan=>'言語を世界に教える。',
							description=>'別の言語を学びたいですか？ スペイン語、フランス語、イタリア語、ドイツ語、日本語、中国語、ヒンディー語、インドネシア語、オランダ語、ポーランド語、ポルトガル語、ロシア語を学ぶ！',
							quote=>'私は今日別の言語と別の考え方を学びました！',
						],
						[
							title=>'ListKeyWords.com',
							domain=>'listkeywords.com',
							url=>'http://www.listkeywords.com/',
							slogan=>'あなたのキーワードをリストアップする。',
							description=>'このウェブアプリケーションを使用して、キーワードとキーフレーズを一覧表示します。 htmlを削除したり、一般的な単語を無視したり、生成されたキーワードのリストを並べ替えることができます。',
							quote=>'私は今日いくつかのキーワードを生成しました！',
						],
						[
							title=>'PronounceThat.com',
							domain=>'pronouncethat.com',
							url=>'http://www.pronouncethat.com/',
							slogan=>'それをどのように発音するのですか？',
							description=>'単語の発音を学ぶには、このWebアプリケーションを使用してください。 英語や国際語を学ぶことができます。声や入力で入力することができます。',
							quote=>'私は今日の発音を学んだ！',
						],
						[
							title=>'RemoveBlankLines.com',
							domain=>'removeblanklines.com',
							url=>'http://www.removeblanklines.com/',
							slogan=>'リストから空白行を削除します。',
							description=>'このツールを使用して、テキストリストから空白行を削除します。',
							quote=>'私は今日非常に多くの空白行を削除しました！',
						],
						[
							title=>'RemoveDuplicateLines.com',
							domain=>'removeduplicatelines.com',
							url=>'http://www.removeduplicatelines.com/',
							slogan=>'重複したエントリをリストから削除する',
							description=>'このツールを使用して、テキストリストから重複する行を削除します。',
							quote=>'私は今日多くの重複した行を削除しました！',
						],
						[
							title=>'RemoveSpacing.com',
							domain=>'removespacing.com',
							url=>'http://www.removespacing.com/',
							slogan=>'スペースとスペースをテキストから削除する',
							description=>'テキストからスペースを削除するには、このWebアプリケーションを使用してください。 スペース、タブ、インデント、改行、キャリッジリターンを削除することができます。',
							quote=>'私は今日いくつかの間隔を削除しました！',
						],
						[
							title=>'SortWords.com',
							domain=>'sortwords.com',
							url=>'http://www.sortwords.com/',
							slogan=>'あなたの言葉のリストを並べ替える。',
							description=>'このWebアプリケーションを使用して、単語やフレーズのリストをソートします。 アルファベット順、アルファベット順、数値順、数値順に並べ替えることができます。',
							quote=>'私は今日いくつかの単語をソートしました！',
						],
						[
							title=>'WordWeight.com',
							domain=>'wordweight.com',
							url=>'http://www.wordweight.com/',
							slogan=>'言葉を秤量する。',
							description=>'単語を調べます。 任意の辞書、任意の定義、任意の時間。',
							quote=>'あなたは知りたいですか？ それを見て、あなたが知っている。',
						],
					];
					break;
					
				case 'it':	// Italian
					$site_info_pieces = [
						[
							title=>'EarthFluent.com',
							domain=>'earthfluent.com',
							url=>'http://www.earthfluent.com/',
							slogan=>'Insegnare le lingue al mondo.',
							description=>"Vuoi imparare un'altra lingua? Impara spagnolo, francese, italiano, tedesco, giapponese, cinese, hindi, indonesiano, olandese, polacco, portoghese o russo!",
							quote=>"Ho imparato un'altra lingua e un altro modo di pensare oggi!",
						],
						[
							title=>'ListKeyWords.com',
							domain=>'listkeywords.com',
							url=>'http://www.listkeywords.com/',
							slogan=>'Elenco delle parole chiave per te.',
							description=>'Utilizzare questa app Web per elencare parole chiave e frasi chiave. Puoi rimuovere html, ignorare le parole comuni e ordinare gli elenchi generati di parole chiave.',
							quote=>'Ho generato alcune parole chiave oggi!',
						],
						[
							title=>'PronounceThat.com',
							domain=>'pronouncethat.com',
							url=>'http://www.pronouncethat.com/',
							slogan=>'Come lo pronuncio?',
							description=>'Usa questa app Web per imparare la pronuncia delle parole. Puoi imparare parole inglesi o internazionali e puoi inserirle a voce o digitando.',
							quote=>'Ho imparato la pronuncia oggi!',
						],
						[
							title=>'RemoveBlankLines.com',
							domain=>'removeblanklines.com',
							url=>'http://www.removeblanklines.com/',
							slogan=>'Rimozione di righe vuote dagli elenchi.',
							description=>'Usa questo strumento per rimuovere le righe vuote dagli elenchi di testo.',
							quote=>'Ho rimosso così tante righe vuote oggi!',
						],
						[
							title=>'RemoveDuplicateLines.com',
							domain=>'removeduplicatelines.com',
							url=>'http://www.removeduplicatelines.com/',
							slogan=>'Rimozione di voci duplicate dagli elenchi.',
							description=>'Usa questo strumento per rimuovere le linee duplicate dagli elenchi di testo.',
							quote=>'Ho rimosso così tante linee duplicate oggi!',
						],
						[
							title=>'RemoveSpacing.com',
							domain=>'removespacing.com',
							url=>'http://www.removespacing.com/',
							slogan=>'Rimozione di spazi e spaziatura dal testo.',
							description=>'Utilizzare questa app Web per rimuovere la spaziatura dal testo. È possibile rimuovere spazi, tabulazioni, rientri, newline e ritorni a capo.',
							quote=>'Oggi ho rimosso alcune spaziature!',
						],
						[
							title=>'SortWords.com',
							domain=>'sortwords.com',
							url=>'http://www.sortwords.com/',
							slogan=>'Ordina i tuoi elenchi di parole per te.',
							description=>'Utilizzare questa applicazione Web per ordinare elenchi di parole e frasi. È possibile ordinare alfabeticamente, in ordine alfabetico, numerico o invertire numericamente.',
							quote=>'Ho ordinato alcune parole oggi!',
						],
						[
							title=>'WordWeight.com',
							domain=>'wordweight.com',
							url=>'http://www.wordweight.com/',
							slogan=>'Pesare le parole.',
							description=>'Cercare una parola. Qualsiasi dizionario, qualsiasi definizione, ogni volta.',
							quote=>'Vuoi sapere? Guarda e poi lo sai.',
						],
					];
					break;
					
				case 'nl':	// Dutch
					$site_info_pieces = [
						[
							title=>'EarthFluent.com',
							domain=>'earthfluent.com',
							url=>'http://www.earthfluent.com/',
							slogan=>'Lesgeven aan de wereld.',
							description=>'Wil je een andere taal leren? Leer Spaans, Frans, Italiaans, Duits, Japans, Chinees, Hindi, Indonesisch, Nederlands, Pools, Portugees of Russisch!',
							quote=>'Ik heb vandaag een andere taal geleerd en een andere manier van denken!',
						],
						[
							title=>'ListKeyWords.com',
							domain=>'listkeywords.com',
							url=>'http://www.listkeywords.com/',
							slogan=>'Uw zoekwoorden vermelden voor u.',
							description=>'Gebruik deze web-app om trefwoorden en trefzinnen weer te geven. U kunt html verwijderen, algemene woorden negeren en gegenereerde lijsten met zoekwoorden sorteren.',
							quote=>'Ik heb vandaag wat zoekwoorden gegenereerd!',
						],
						[
							title=>'PronounceThat.com',
							domain=>'pronouncethat.com',
							url=>'http://www.pronouncethat.com/',
							slogan=>'Hoe spreek ik dat uit?',
							description=>'Gebruik deze web-app om de uitspraak van woorden te leren. Je kunt Engelse of internationale woorden leren, en je kunt ze met stem of door typen invoeren.',
							quote=>'Ik heb vandaag uitspraak geleerd!',
						],
						[
							title=>'RemoveBlankLines.com',
							domain=>'removeblanklines.com',
							url=>'http://www.removeblanklines.com/',
							slogan=>'Lege regels uit lijsten verwijderen.',
							description=>'Gebruik dit hulpmiddel om lege regels uit uw tekstlijsten te verwijderen.',
							quote=>"'Ik heb vandaag zoveel lege regels verwijderd!",
						],
						[
							title=>'RemoveDuplicateLines.com',
							domain=>'removeduplicatelines.com',
							url=>'http://www.removeduplicatelines.com/',
							slogan=>'Dubbele items uit lijsten verwijderen.',
							description=>'Gebruik dit hulpmiddel om dubbele regels uit uw tekstlijsten te verwijderen.',
							quote=>'Ik heb vandaag zoveel dubbele regels verwijderd!',
						],
						[
							title=>'RemoveSpacing.com',
							domain=>'removespacing.com',
							url=>'http://www.removespacing.com/',
							slogan=>'Spaties en spatiëring verwijderen uit uw tekst.',
							description=>'Gebruik deze web-app om ruimte tussen tekst te verwijderen. U kunt spaties, tabs, inspringingen, nieuwe regels en carriage-returns verwijderen.',
							quote=>'Ik heb vandaag wat ruimte verwijderd!',
						],
						[
							title=>'SortWords.com',
							domain=>'sortwords.com',
							url=>'http://www.sortwords.com/',
							slogan=>'Uw woordenlijsten voor u sorteren.',
							description=>'Gebruik deze web-app om lijsten met woorden en zinsdelen te sorteren. U kunt alfabetisch alfabetisch, alfabetisch, numeriek of omgekeerd sorteren.',
							quote=>'Ik heb vandaag wat woorden gesorteerd!',
						],
						[
							title=>'WordWeight.com',
							domain=>'wordweight.com',
							url=>'http://www.wordweight.com/',
							slogan=>'Weeg de woorden.',
							description=>'Een woord opzoeken. Elk woordenboek, elke definitie, op elk moment.',
							quote=>'Wil je weten? Zoek het op en dan weet je het.',
						],
					];
					break;
					
				case 'pl':	// Polish
					$site_info_pieces = [
						[
							title=>'EarthFluent.com',
							domain=>'earthfluent.com',
							url=>'http://www.earthfluent.com/',
							slogan=>'Nauczanie języków dla świata.',
							description=>'Chcesz się nauczyć innego języka? Ucz się hiszpańskiego, francuskiego, włoskiego, niemieckiego, japońskiego, chińskiego, hindi, indonezyjskiego, holenderskiego, polskiego, portugalskiego lub rosyjskiego!',
							quote=>'Nauczyłem się innego języka i innego sposobu myślenia dzisiaj!',
						],
						[
							title=>'ListKeyWords.com',
							domain=>'listkeywords.com',
							url=>'http://www.listkeywords.com/',
							slogan=>'Lista słów kluczowych dla Ciebie.',
							description=>'Użyj tej aplikacji internetowej, aby wyświetlić listę słów kluczowych i fraz. Możesz usunąć html, ignorować popularne słowa i sortować wygenerowane listy słów kluczowych.',
							quote=>'Wygenerowałem kilka słów kluczowych już dziś!',
						],
						[
							title=>'PronounceThat.com',
							domain=>'pronouncethat.com',
							url=>'http://www.pronouncethat.com/',
							slogan=>'Jak mam to wymówić?',
							description=>'Użyj tej aplikacji internetowej, aby nauczyć się wymowy słów. Możesz uczyć się angielskich lub międzynarodowych słów i możesz je wprowadzać głosowo lub przez wpisywanie.',
							quote=>'Nauczyłem się wymowy dzisiaj!',
						],
						[
							title=>'RemoveBlankLines.com',
							domain=>'removeblanklines.com',
							url=>'http://www.removeblanklines.com/',
							slogan=>'Usuwanie pustych linii z list.',
							description=>'Użyj tego narzędzia, aby usunąć puste wiersze z list tekstowych.',
							quote=>'Usunąłem dzisiaj tyle pustych linii!',
						],
						[
							title=>'RemoveDuplicateLines.com',
							domain=>'removeduplicatelines.com',
							url=>'http://www.removeduplicatelines.com/',
							slogan=>'Usuwanie zduplikowanych wpisów z list.',
							description=>'Użyj tego narzędzia, aby usunąć zduplikowane linie z list tekstowych.',
							quote=>'Usunąłem tyle powtórzeń linii już dziś!',
						],
						[
							title=>'RemoveSpacing.com',
							domain=>'removespacing.com',
							url=>'http://www.removespacing.com/',
							slogan=>'Usuwanie spacji i odstępów od tekstu.',
							description=>'Użyj tej aplikacji internetowej, aby usunąć odstępy od tekstu. Możesz usunąć spacje, tabulatory, wcięcia, znaki nowej linii i powroty z karetki.',
							quote=>'Dzisiaj usunąłem trochę odstępów!',
						],
						[
							title=>'SortWords.com',
							domain=>'sortwords.com',
							url=>'http://www.sortwords.com/',
							slogan=>'Sortowanie list słów dla ciebie.',
							description=>'Użyj tej aplikacji internetowej do sortowania list słów i wyrażeń. Możesz sortować alfabetycznie, odwrotnie, alfabetycznie, numerycznie lub odwrotnie.',
							quote=>'Dziś posortowałem słowa!',
						],
						[
							title=>'WordWeight.com',
							domain=>'wordweight.com',
							url=>'http://www.wordweight.com/',
							slogan=>'Zważ słowa.',
							description=>'Wyszukaj słowo. Dowolny słownik, dowolna definicja, zawsze.',
							quote=>'Chcesz wiedzieć? Sprawdź to, a potem wiesz.',
						],
					];
					break;
					
				case 'pt':	// Portuguese
					$site_info_pieces = [
						[
							title=>'EarthFluent.com',
							domain=>'earthfluent.com',
							url=>'http://www.earthfluent.com/',
							slogan=>'Idiomas de Ensino para o Mundo.',
							description=>'Quer aprender outro idioma? Aprenda espanhol, francês, italiano, alemão, japonês, chinês, hindi, indonésio, holandês, polonês, português ou russo!',
							quote=>'Eu aprendi outra língua e outra maneira de pensar hoje!',
						],
						[
							title=>'ListKeyWords.com',
							domain=>'listkeywords.com',
							url=>'http://www.listkeywords.com/',
							slogan=>'Listando suas palavras-chave para você.',
							description=>'Use este aplicativo da web para listar palavras-chave e frases-chave. Você pode remover o html, ignorar palavras comuns e classificar listas geradas de palavras-chave.',
							quote=>'Eu geramos algumas palavras-chave hoje!',
						],
						[
							title=>'PronounceThat.com',
							domain=>'pronouncethat.com',
							url=>'http://www.pronouncethat.com/',
							slogan=>'Como eu pronuncia isso?',
							description=>'Use este aplicativo da web para aprender a pronúncia das palavras. Você pode aprender palavras em inglês ou internacionais e pode inseri-las por voz ou digitando.',
							quote=>'Eu aprendi a pronúncia hoje!',
						],
						[
							title=>'RemoveBlankLines.com',
							domain=>'removeblanklines.com',
							url=>'http://www.removeblanklines.com/',
							slogan=>'Removendo linhas em branco das listas..',
							description=>'Use essa ferramenta para remover linhas em branco de suas listas de texto.',
							quote=>'Eu removi tantas linhas em branco hoje!',
						],
						[
							title=>'RemoveDuplicateLines.com',
							domain=>'removeduplicatelines.com',
							url=>'http://www.removeduplicatelines.com/',
							slogan=>'Removendo entradas duplicadas de listas.',
							description=>'Use esta ferramenta para remover linhas duplicadas de suas listas de texto.',
							quote=>'Eu removi tantas linhas duplicadas hoje!',
						],
						[
							title=>'RemoveSpacing.com',
							domain=>'removespacing.com',
							url=>'http://www.removespacing.com/',
							slogan=>'Removendo espaços e espaçamento do seu texto.',
							description=>'Use este aplicativo da Web para remover o espaçamento do texto. Você pode remover espaços, tabulações, recuos, novas linhas e retornos de carro.',
							quote=>'Eu removi alguns espaços hoje!',
						],
						[
							title=>'SortWords.com',
							domain=>'sortwords.com',
							url=>'http://www.sortwords.com/',
							slogan=>'Classificando suas listas de palavras para você.',
							description=>'Use este aplicativo da web para classificar listas de palavras e frases. Você pode ordenar alfabeticamente, inverter alfabeticamente, numericamente ou inverter numericamente.',
							quote=>'Eu classifiquei algumas palavras hoje!',
						],
						[
							title=>'WordWeight.com',
							domain=>'wordweight.com',
							url=>'http://www.wordweight.com/',
							slogan=>'Pese as palavras.',
							description=>'Procure uma palavra. Qualquer dicionário, qualquer definição, a qualquer momento.',
							quote=>'Você quer saber? Olhe para cima e então você sabe.',
						],
					];
					break;
					
				case 'ru':	// Russian
					$site_info_pieces = [
						[
							title=>'EarthFluent.com',
							domain=>'earthfluent.com',
							url=>'http://www.earthfluent.com/',
							slogan=>'Обучение языкам миру.',
							description=>'Хотите узнать другой язык? Изучайте испанский, французский, итальянский, немецкий, японский, китайский, хинди, индонезийский, голландский, польский, португальский или русский!',
							quote=>'Сегодня я узнал другой язык и другой способ мышления!',
						],
						[
							title=>'ListKeyWords.com',
							domain=>'listkeywords.com',
							url=>'http://www.listkeywords.com/',
							slogan=>'Список ключевых слов для вас.',
							description=>'Используйте это веб-приложение для отображения ключевых слов и ключевых фраз. Вы можете удалить html, игнорировать общие слова и сортировать созданные списки ключевых слов.',
							quote=>'Сегодня я создал несколько ключевых слов!',
						],
						[
							title=>'PronounceThat.com',
							domain=>'pronouncethat.com',
							url=>'http://www.pronouncethat.com/',
							slogan=>'Как мне это объявить?',
							description=>'Используйте это веб-приложение, чтобы узнать произношение слов. Вы можете изучать английские или международные слова, и вы можете вводить их голосом или путем ввода.',
							quote=>'Я изучил произношение сегодня!',
						],
						[
							title=>'RemoveBlankLines.com',
							domain=>'removeblanklines.com',
							url=>'http://www.removeblanklines.com/',
							slogan=>'Удаление пустых строк из списков.',
							description=>'Используйте этот инструмент для удаления пустых строк из текстовых списков.',
							quote=>'Сегодня я удалил так много пустых строк!',
						],
						[
							title=>'RemoveDuplicateLines.com',
							domain=>'removeduplicatelines.com',
							url=>'http://www.removeduplicatelines.com/',
							slogan=>'Удаление повторяющихся записей из списков.',
							description=>'Используйте этот инструмент для удаления повторяющихся строк из текстовых списков.',
							quote=>'Сегодня я удалил так много повторяющихся строк!',
						],
						[
							title=>'RemoveSpacing.com',
							domain=>'removespacing.com',
							url=>'http://www.removespacing.com/',
							slogan=>'Удаление пробелов и интервалов из текста.',
							description=>'Используйте это веб-приложение для удаления интервала из текста. Вы можете удалить пробелы, вкладки, отступы, новые строки и возврат каретки.',
							quote=>'Сегодня я удалил промежуток времени!',
						],
						[
							title=>'SortWords.com',
							domain=>'sortwords.com',
							url=>'http://www.sortwords.com/',
							slogan=>'Сортировка списков слов для вас.',
							description=>'Используйте это веб-приложение для сортировки списков слов и фраз. Вы можете сортировать по алфавиту, в обратном порядке, в цифровом или цифровом формате.',
							quote=>'Сегодня я разобрал слова!',
						],
						[
							title=>'WordWeight.com',
							domain=>'wordweight.com',
							url=>'http://www.wordweight.com/',
							slogan=>'Взвесьте слова.',
							description=>'Найдите слово. Любой словарь, любое определение, в любое время.',
							quote=>'Ты хочешь знать? Посмотри, а потом знаешь.',
						],
					];
					break;
					
				case 'tr':	// Turkish
					$site_info_pieces = [
						[
							title=>'EarthFluent.com',
							domain=>'earthfluent.com',
							url=>'http://www.earthfluent.com/',
							slogan=>'Dünyaya Dil Öğretimi.',
							description=>'Başka bir dil öğrenmek ister misiniz? İspanyolca, Fransızca, İtalyanca, Almanca, Japonca, Çince, Hintçe, Endonezyaca, Hollandaca, Lehçe, Portekizce veya Rusça öğrenin!',
							quote=>'Başka bir dil ve bugün başka bir düşünme şekli öğrendim!',
						],
						[
							title=>'ListKeyWords.com',
							domain=>'listkeywords.com',
							url=>'http://www.listkeywords.com/',
							slogan=>'Anahtar kelimelerinizi sizin için listeler.',
							description=>"Anahtar kelimeleri ve anahtar sözcükleri listelemek için bu web uygulamasını kullanın. Html'yi kaldırabilir, genel kelimeleri yok sayabilir ve oluşturulan anahtar kelime listelerini sıralayabilirsiniz.",
							quote=>'Bugün bazı anahtar kelimeler oluşturdum!',
						],
						[
							title=>'PronounceThat.com',
							domain=>'pronouncethat.com',
							url=>'http://www.pronouncethat.com/',
							slogan=>'Bunu nasıl telaffuz edebilirim?',
							description=>'Kelimelerin telaffuz öğrenmek için bu web uygulamasını kullanın. İngilizce veya uluslararası kelimeleri öğrenebilir ve bunları sesle veya yazarak girebilirsiniz.',
							quote=>'Bugün telaffuz öğrendim!',
						],
						[
							title=>'RemoveBlankLines.com',
							domain=>'removeblanklines.com',
							url=>'http://www.removeblanklines.com/',
							slogan=>'Boş satırları listelerden kaldırma.',
							description=>'Metin listelerinizdeki boş satırları kaldırmak için bu aracı kullanın.',
							quote=>'Bugün çok boş satırları kaldırdım!',
						],
						[
							title=>'RemoveDuplicateLines.com',
							domain=>'removeduplicatelines.com',
							url=>'http://www.removeduplicatelines.com/',
							slogan=>'Yinelenen girişleri listelerden kaldırma.',
							description=>'Metin listelerinizdeki yinelenen satırları kaldırmak için bu aracı kullanın.',
							quote=>'Bugün çok fazla yinelenen satırı kaldırdım!',
						],
						[
							title=>'RemoveSpacing.com',
							domain=>'removespacing.com',
							url=>'http://www.removespacing.com/',
							slogan=>'Metninizden boşlukları ve boşlukları kaldırma.',
							description=>'Metinden boşluk kaldırmak için bu web uygulamasını kullanın. Boşlukları, sekmeleri, girintileri, satır sonlarını ve satırbaşı iadelerini kaldırabilirsiniz.',
							quote=>'Bugün biraz boşluk kaldırdım!',
						],
						[
							title=>'SortWords.com',
							domain=>'sortwords.com',
							url=>'http://www.sortwords.com/',
							slogan=>'Sizin için kelime listelerinizi sıralamak.',
							description=>'Kelimeleri ve kelime öbeklerini listelemek için bu web uygulamasını kullanın. Alfabetik olarak sıralayabilir, alfabetik olarak, sayısal olarak tersine çevirebilir veya sayısal olarak tersine çevirebilirsiniz.',
							quote=>'Bugün bazı kelimeler sıraladım!',
						],
						[
							title=>'WordWeight.com',
							domain=>'wordweight.com',
							url=>'http://www.wordweight.com/',
							slogan=>'Kelimeleri tart.',
							description=>'Sözlükte kelime aramak. Herhangi bir sözlük, herhangi bir tanım, her zaman.',
							quote=>'Bilmek istiyor musun? Bak ve biliyorsun.',
						],
					];
					break;
					
				case 'zh':	// Chinese
					$site_info_pieces = [
						[
							title=>'EarthFluent.com',
							domain=>'earthfluent.com',
							url=>'http://www.earthfluent.com/',
							slogan=>'向世界教授语言。',
							description=>'想学习另一种语言？ 学习西班牙语，法语，意大利语，德语，日语，中文，印地语，印度尼西亚语，荷兰语，波兰语，葡萄牙语或俄语！',
							quote=>'我今天学到了另一种语言和另一种思维方式！',
						],
						[
							title=>'ListKeyWords.com',
							domain=>'listkeywords.com',
							url=>'http://www.listkeywords.com/',
							slogan=>'为您列出关键字。',
							description=>'使用此Web应用程序列出关键字和关键短语。 您可以删除html，忽略常用单词，并对生成的关键字列表进行排序。',
							quote=>'我今天生成了一些关键字！',
						],
						[
							title=>'PronounceThat.com',
							domain=>'pronouncethat.com',
							url=>'http://www.pronouncethat.com/',
							slogan=>'我怎么发音呢？',
							description=>'使用此Web应用程序来学习单词的发音。 您可以学习英语或国际单词，也可以通过语音输入或输入。',
							quote=>'我今天学会了发音！',
						],
						[
							title=>'RemoveBlankLines.com',
							domain=>'removeblanklines.com',
							url=>'http://www.removeblanklines.com/',
							slogan=>'从列表中删除空行。',
							description=>'使用此工具从文本列表中删除空白行。',
							quote=>'我今天删除了这么多空行！',
						],
						[
							title=>'RemoveDuplicateLines.com',
							domain=>'removeduplicatelines.com',
							url=>'http://www.removeduplicatelines.com/',
							slogan=>'从列表中删除重复的条目。',
							description=>'使用此工具从文本列表中删除重复的行。',
							quote=>'我今天删除了这么多重复的行！',
						],
						[
							title=>'RemoveSpacing.com',
							domain=>'removespacing.com',
							url=>'http://www.removespacing.com/',
							slogan=>'从文本中删除空格和间距。',
							description=>'使用此Web应用程序删除文本间距。 您可以删除空格，制表符，缩进，换行符和回车符。',
							quote=>'我今天删除了一些间距！',
						],
						[
							title=>'SortWords.com',
							domain=>'sortwords.com',
							url=>'http://www.sortwords.com/',
							slogan=>'为您排序单词列表。',
							description=>'使用此Web应用程序对单词和短语列表进行排序。 您可以按字母顺序排序，按字母顺序，数字顺序或数字反转排序。',
							quote=>'我今天整理了一些单词！',
						],
						[
							title=>'WordWeight.com',
							domain=>'wordweight.com',
							url=>'http://www.wordweight.com/',
							slogan=>'称重单词。',
							description=>'查词。 任何字典，任何定义，任何时间。',
							quote=>'你想知道吗？ 查一下然后你知道。',
						],
					];
					break;
			}
			
			return $site_info_pieces;
		}
		
		public function display_Header()
		{
			$language = $this->language;
			
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
			
			switch($language->language_code) {
				default:
				case 'en':
					$header = 'Similar Sites of Interest';
					break;
					
				case 'de':
					$header = 'Ähnliche interessante Seiten';
					break;
				
				case 'es':
					$header = 'Sitios de interés similares';
					break;
					
				case 'fr':
					$header = 'Sites d\'intérêt similaires';
					break;
					
				case 'ja':
					$header = '類似のサイト';
					break;
					
				case 'it':
					$header = 'Siti di interesse simili';
					break;
					
				case 'nl':
					$header = 'Vergelijkbare sites van belang';
					break;
					
				case 'pl':
					$header = 'Podobne miejsca zainteresowania';
					break;
					
				case 'pt':
					$header = 'Sites de Interesse Semelhantes';
					break;
					
				case 'ru':
					$header = 'Похожие сайты';
					break;
					
				case 'tr':
					$header = 'Benzer İlgi Alanları';
					break;
					
				case 'zh':
					$header = '类似的景点';
					break;
			}
			
			print('<h3>');
			print($header);
			print('</h3>');
		}
		
		public function display()
		{
			$site_info_pieces = $this->getSites();
			print('<div class="width-70percent horizontal-center margin-top-14px border-1px font-family-arial">');
			
			$this->display_Header();
			
			print('<div class="width-90percent horizontal-left">');
			print('<ul>');
			
			foreach($site_info_pieces as $site_info_piece) {
				if($site_info_piece['domain'] != $this->site) {
					print('<li ');
					print('title="');
					print($site_info_piece['quote']);
					print('"');
					print('>');
					print('<a href="');
					print($site_info_piece['url']);
					if($language->language_code != 'en') {
						print('?language=' . $language->language_code);
					}
					print('" ');
					print('target="_blank">');
					print($site_info_piece['title']);
					print(' ~ ');
					print($site_info_piece['slogan']);
					print('</a>');
					print(' : ');
					print($site_info_piece['description']);
					print('</li>');
				}
			}
			
			print('</ul>');
			print('</div>');
			
			print('</div>');
		}
	}

?>