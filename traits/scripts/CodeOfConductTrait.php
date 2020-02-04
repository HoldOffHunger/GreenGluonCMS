<?php

	trait CodeOfConductTrait {
		public function getCodeOfConduct() {
			$code_of_conduct_paragraphs = $this->getCodeOfConductParagraphs();
			
			$code_of_conduct = implode("\n\n", $code_of_conduct_paragraphs);
			
			return $code_of_conduct;
		}
		
		public function getCodeOfConductImages() {
			$images = [
							# image 1
				'preface'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/coffee-maker_701320?term=prepare&page=1&position=67',
					'original-source'=>'',
					'filename'=>'preface.jpg',
				],
							# image 2
				'introduction'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/reunion_1006080?term=introduction&page=1&position=1',
					'original-source'=>'',
					'filename'=>'introduction.jpg',
				],
							# image 3
				'table-of-contents'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/list_130291',
					'original-source'=>'https://www.freepik.com/free-icon/list_942266.htm',
					'filename'=>'table-of-contents.jpg',
				],
							# image 3
				'what-is-encouraged'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/leaves_113860',
					'original-source'=>'',
					'filename'=>'what-is-encouraged.jpg',
				],
							# image 4
				'what-is-unacceptable'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/disabled_2089699?term=prohibited&page=1&position=64',
					'original-source'=>'',
					'filename'=>'what-is-unacceptable.jpg',
				],
							# image 5
				'what-is-unaccountable'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/relationship_1189177?term=accountable&page=1&position=34',
					'original-source'=>'',
					'filename'=>'what-is-unaccountable.jpg',
				],
							# image 6
				'how-we-enforce-community-standards'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/balance_994414?term=law&page=1&position=1',
					'original-source'=>'',
					'filename'=>'how-we-enforce-community-standards.jpg',
				],
							# image 7
				'licensing'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/open-hanging-signal_44957',
					'original-source'=>'https://www.freepik.com/free-icon/open-hanging-signal_724429.htm',
					'filename'=>'code-of-conduct-license.jpg',
				],
							# image 8
				'inspiration'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/lightbulb_2010820?term=inspire&page=1&position=5',
					'original-source'=>'',
					'filename'=>'inspiration.jpg',
				],
			];
			
			return $images;
		}
		
		
						// Code of Conduct Paragraphs
						// ---------------------------------------------
		
		public function getCodeOfConductParagraphs() {
			$header_index = 1;
			
			$images = $this->getCodeOfConductImages();
			
			$code_of_conduct_paragraphs = [];
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getPrefaceSection([
						'image'=>$images['preface'],
					])
				);
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getIntroductionSection([
						'image'=>$images['introduction'],
						'headerindex'=>$header_index++,
					])
				);
				
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getTableOfContentsSection([
						'image'=>$images['table-of-contents'],
						'headerindex'=>$header_index++,
					])
				);
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getWhatIsEncouragedSection([
						'image'=>$images['what-is-encouraged'],
						'headerindex'=>$header_index++,
					])
				);
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getWhatIsUnacceptableSection([
						'image'=>$images['what-is-unacceptable'],
						'headerindex'=>$header_index++,
					])
				);
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getWhatIsUnaccountableSection([
						'image'=>$images['what-is-unaccountable'],
						'headerindex'=>$header_index++,
					])
				);
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getHowWeEnforceCommunityStandardsSection([
						'image'=>$images['how-we-enforce-community-standards'],
						'headerindex'=>$header_index++,
					])
				);
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getLicensingSection([
						'image'=>$images['licensing'],
						'headerindex'=>$header_index++,
					])
				);
			
			$code_of_conduct_paragraphs =
				array_merge($code_of_conduct_paragraphs,
					$this->getInspirationSection([
						'image'=>$images['inspiration'],
						'headerindex'=>$header_index++,
					])
				);
			
			return $code_of_conduct_paragraphs;
		}

		
						// Individual Code of Conduct Sections
						// ---------------------------------------------
		
		public function getPrefaceSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$preface_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'Preface' .
						'</h3>';
					
					$preface_section[] =
						'<p>Version 1.0, May 22, 2018, by HoldOffHunger</p>';
					break;
					
				case 'de':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Version 1.0, 22. Mai 2018, von HoldOffHunger</p>';
					break;
					
				case 'es':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Versión 1.0, 22 de mayo de 2018, por HoldOffHunger</p>';
					break;
					
				case 'fr':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Version 1.0, 22 mai 2018, par HoldOffHunger</p>';
					break;
					
				case 'ja':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>バージョン1.0、2018年5月22日、HoldOffHunger著</p>';
					break;
					
				case 'it':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Versione 1.0, 22 maggio 2018, di HoldOffHunger</p>';
					break;
					
				case 'nl':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Versie 1.0, 22 mei 2018, door HoldOffHunger</p>';
					break;
					
				case 'pl':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Wersja 1.0, 22 maja 2018 roku, przez HoldOffHunger</p>';
					break;
					
				case 'pt':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Versão 1.0, 22 de maio de 2018, por HoldOffHunger</p>';
					break;
					
				case 'ru':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Версия 1.0, 22 мая 2018 г., автор HoldOffHunger</p>';
					break;
					
				case 'tr':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>Sürüm 1.0, 22 Mayıs 2018, HoldOffHunger tarafından</p>';
					break;
					
				case 'zh':
					$preface_section[] =
						'<h3><a name="preface"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						'</h3>';
					
					$preface_section[] =
						'<p>版本1.0，即2018年5月22日，由HoldOffHunger提供</p>';
					break;
			}
			
			return $preface_section;
		}
		
		public function getIntroductionSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$introduction_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduction</h3>';
					
					$introduction_section[] =
						'<p>Everyone expects a standard of behavior. And everyone will react to the behavior of others.</p>' .
						'<p>This is always true -- whether or not people are working together under a common agreement.</p>' .
						'<p>But by having an agreement, at least discussion should be easier.</p>';
					break;
					
				case 'de':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Einführung</h3>';
					
					$introduction_section[] =
						'<p>Jeder erwartet einen Verhaltensstandard. Und jeder wird auf das Verhalten anderer reagieren.</p>' .
						'<p>Dies trifft immer zu - unabhängig davon, ob Menschen im Rahmen einer gemeinsamen Vereinbarung zusammenarbeiten.</p>' .
						'<p>Aber durch eine Vereinbarung sollte zumindest die Diskussion einfacher sein.</p>';
					break;
					
				case 'es':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introducción</h3>';
					
					$introduction_section[] =
						'<p>Todo el mundo espera un estándar de comportamiento. Y todos reaccionarán al comportamiento de los demás.</p>' .
						'<p>Esto siempre es cierto, ya sea que las personas trabajen juntas o no bajo un acuerdo común.</p>' .
						'<p>Pero al tener un acuerdo, al menos la discusión debería ser más fácil.</p>';
					break;
					
				case 'fr':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduction</h3>';
					
					$introduction_section[] =
						'<p>Tout le monde attend une norme de comportement. Et tout le monde réagira au comportement des autres.</p>' .
						"<p>Cela est toujours vrai, que des personnes travaillent ensemble ou non dans le cadre d'un accord commun.</p>" .
						'<p>Mais en ayant un accord, au moins la discussion devrait être plus facile.</p>';
					break;
					
				case 'ja':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 前書き</h3>';
					
					$introduction_section[] =
						'<p>誰もが行動の標準を期待しています。 そして、誰もが他人の行動に反応するでしょう。</p>' .
						'<p>これは常に本当です - 人々が共通の合意の下で一緒に働いているかどうか。</p>' .
						'<p>しかし、合意することで、少なくとも議論は容易になるはずです。</p>';
					break;
					
				case 'it':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduzione</h3>';
					
					$introduction_section[] =
						'<p>Tutti si aspettano uno standard di comportamento. E tutti reagiranno al comportamento degli altri.</p>' .
						'<p>Questo è sempre vero - indipendentemente dal fatto che le persone lavorino o meno in base a un accordo comune.</p>' .
						'<p>Ma avendo un accordo, almeno la discussione dovrebbe essere più facile.</p>';
					break;
					
				case 'nl':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Invoering</h3>';
					
					$introduction_section[] =
						'<p>Iedereen verwacht een gedragsnorm. En iedereen zal reageren op het gedrag van anderen.</p>' .
						'<p>Dit is altijd waar - ongeacht of mensen samenwerken onder een gemeenschappelijk akkoord.</p>' .
						'<p>Maar door een overeenkomst te hebben, zou tenminste de discussie eenvoudiger moeten zijn.</p>';
					break;
					
				case 'pl':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Wprowadzenie</h3>';
					
					$introduction_section[] =
						'<p>Wszyscy oczekują standardu zachowania. I każdy zareaguje na zachowanie innych.</p>' .
						'<p>Jest to zawsze prawdziwe - niezależnie od tego, czy ludzie pracują razem w ramach wspólnej umowy.</p>' .
						'<p>Ale dzięki porozumieniu przynajmniej dyskusja powinna być łatwiejsza.</p>';
					break;
					
				case 'pt':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introdução</h3>';
					
					$introduction_section[] =
						'<p>Todos esperam um padrão de comportamento. E todos vão reagir ao comportamento dos outros.</p>' .
						'<p>Isso é sempre verdade - se as pessoas estão ou não trabalhando juntas sob um acordo comum.</p>' .
						'<p>Mas, por ter um acordo, pelo menos a discussão deve ser mais fácil.</p>';
					break;
					
				case 'ru':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Вступление</h3>';
					
					$introduction_section[] =
						'<p>Каждый ожидает стандарт поведения. И каждый будет реагировать на поведение других.</p>' .
						'<p>Это всегда верно - работают ли люди вместе по общему соглашению.</p>' .
						'<p>Но при наличии соглашения, по крайней мере, обсуждение должно быть проще.</p>';
					break;
					
				case 'tr':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Giriş</h3>';
					
					$introduction_section[] =
						'<p>Herkes standart bir davranış bekler. Ve herkes başkalarının davranışlarına tepki verecektir.</p>' .
						'<p>Bu her zaman doğrudur - insanların ortak bir anlaşma çerçevesinde birlikte çalışıp çalışmadıklarını.</p>' .
						'<p>Ancak bir anlaşma yaparak, en azından tartışma daha kolay olmalı.</p>';
					break;
					
				case 'zh':
					$introduction_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 介绍</h3>';
					
					$introduction_section[] =
						'<p>每个人都期望有一种行为标准。 每个人都会对别人的行为做出反应。</p>' .
						'<p>这始终是真的 - 无论人们是否在共同协议下共同合作。</p>' .
						'<p>但通过达成协议，至少讨论应该更容易。</p>';
					break;
			}
			
			return $introduction_section;
		}
		
		public function getTableOfContentsSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			$images = $this->getCodeOfConductImages();
			
			$toc_paragraphs = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Table of Contents</h3>',
						
						'<p>The Anarchist Code of Conduct is organized into the following sections :</p>' ,
						
						'<ul>',
							'<li><a href="#preface">' .
								$this->getImageIconMarkup(['image'=>$images['preface']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Preface</a></li>',
							'<li><a href="#introduction">' .
								$this->getImageIconMarkup(['image'=>$images['introduction']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Introduction</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Table of Contents</a></li>',
							'<li><a href="#what-is-encouraged">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-encouraged']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : What Is Encouraged</a></li>',
							'<li><a href="#what-is-unacceptable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unacceptable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : What Is Unacceptable</a></li>',
							'<li><a href="#what-is-unaccountable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unaccountable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : What Is Unaccountable</a></li>',
							'<li><a href="#how-we-enforce-community-standards">' .
								$this->getImageIconMarkup(['image'=>$images['how-we-enforce-community-standards']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : How We Enforce Community Standards</a></li>',
							'<li><a href="#licensing">' .
								$this->getImageIconMarkup(['image'=>$images['licensing']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Licensing of this Document</a></li>',
							'<li><a href="#inspiration">' .
								$this->getImageIconMarkup(['image'=>$images['inspiration']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Inspiration for this Document</a></li>',
						'</ul>',
					];
					break;
					
				case 'de':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inhaltsverzeichnis</h3>',
						
						'<p>Der anarchistische Verhaltenskodex ist in folgende Abschnitte gegliedert :</p>' ,
						
						'<ul>',
							'<li><a href="#preface">' .
								$this->getImageIconMarkup(['image'=>$images['preface']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Vorwort</a></li>',
							'<li><a href="#introduction">' .
								$this->getImageIconMarkup(['image'=>$images['introduction']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Einführung</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Inhaltsverzeichnis</a></li>',
							'<li><a href="#what-is-encouraged">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-encouraged']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Was wird gefördert</a></li>',
							'<li><a href="#what-is-unacceptable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unacceptable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Was ist inakzeptabel</a></li>',
							'<li><a href="#what-is-unaccountable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unaccountable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Was ist nicht rechenschaftspflichtig</a></li>',
							'<li><a href="#how-we-enforce-community-standards">' .
								$this->getImageIconMarkup(['image'=>$images['how-we-enforce-community-standards']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Wie wir Gemeinschaftsstandards durchsetzen</a></li>',
							'<li><a href="#licensing">' .
								$this->getImageIconMarkup(['image'=>$images['licensing']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Lizenzierung dieses Dokuments</a></li>',
							'<li><a href="#inspiration">' .
								$this->getImageIconMarkup(['image'=>$images['inspiration']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Inspiration für dieses Dokument</a></li>',
						'</ul>',
					];
					break;
					
				case 'es':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Tabla de contenido</h3>',
						
						'<p>TEl Código de Conducta Anarquista está organizado en las siguientes secciones :</p>' ,
						
						'<ul>',
							'<li><a href="#preface">' .
								$this->getImageIconMarkup(['image'=>$images['preface']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Prefacio</a></li>',
							'<li><a href="#introduction">' .
								$this->getImageIconMarkup(['image'=>$images['introduction']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Introducción</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Tabla de contenido</a></li>',
							'<li><a href="#what-is-encouraged">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-encouraged']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Lo que se anima</a></li>',
							'<li><a href="#what-is-unacceptable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unacceptable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Lo que es inaceptable</a></li>',
							'<li><a href="#what-is-unaccountable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unaccountable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Lo que es irresponsable</a></li>',
							'<li><a href="#how-we-enforce-community-standards">' .
								$this->getImageIconMarkup(['image'=>$images['how-we-enforce-community-standards']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Cómo hacemos cumplir los estándares de la comunidad</a></li>',
							'<li><a href="#licensing">' .
								$this->getImageIconMarkup(['image'=>$images['licensing']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Licenciamiento de este documento</a></li>',
							'<li><a href="#inspiration">' .
								$this->getImageIconMarkup(['image'=>$images['inspiration']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Inspiración para este documento</a></li>',
						'</ul>',
					];
					break;
					
				case 'fr':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Table des matières</h3>',
						
						'<p>Le code de conduite anarchiste est organisé dans les sections suivantes :</p>' ,
						
						'<ul>',
							'<li><a href="#preface">' .
								$this->getImageIconMarkup(['image'=>$images['preface']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Préface</a></li>',
							'<li><a href="#introduction">' .
								$this->getImageIconMarkup(['image'=>$images['introduction']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Introduction</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Table des matières</a></li>',
							'<li><a href="#what-is-encouraged">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-encouraged']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Ce qui est encouragé</a></li>',
							'<li><a href="#what-is-unacceptable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unacceptable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . " : Qu'est-ce qui est inacceptable</a></li>",
							'<li><a href="#what-is-unaccountable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unaccountable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Quel est inexplicable</a></li>',
							'<li><a href="#how-we-enforce-community-standards">' .
								$this->getImageIconMarkup(['image'=>$images['how-we-enforce-community-standards']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Comment nous appliquons les normes communautaires</a></li>',
							'<li><a href="#licensing">' .
								$this->getImageIconMarkup(['image'=>$images['licensing']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Licence de ce document</a></li>',
							'<li><a href="#inspiration">' .
								$this->getImageIconMarkup(['image'=>$images['inspiration']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Inspiration pour ce document</a></li>',
						'</ul>',
					];
					break;
					
				case 'ja':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 目次</h3>',
						
						'<p>アナキスト行動規範は以下のセクションにまとめられています。</p>' ,
						
						'<ul>',
							'<li><a href="#preface">' .
								$this->getImageIconMarkup(['image'=>$images['preface']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 序文</a></li>',
							'<li><a href="#introduction">' .
								$this->getImageIconMarkup(['image'=>$images['introduction']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 前書き</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 目次</a></li>',
							'<li><a href="#what-is-encouraged">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-encouraged']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 奨励されるもの</a></li>',
							'<li><a href="#what-is-unacceptable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unacceptable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 許容できないもの</a></li>',
							'<li><a href="#what-is-unaccountable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unaccountable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 説明できないもの</a></li>',
							'<li><a href="#how-we-enforce-community-standards">' .
								$this->getImageIconMarkup(['image'=>$images['how-we-enforce-community-standards']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : コミュニティ基準の実施方法</a></li>',
							'<li><a href="#licensing">' .
								$this->getImageIconMarkup(['image'=>$images['licensing']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : この文書の使用許諾</a></li>',
							'<li><a href="#inspiration">' .
								$this->getImageIconMarkup(['image'=>$images['inspiration']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : この文書のインスピレーション</a></li>',
						'</ul>',
					];
					break;
					
				case 'it':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Sommario</h3>',
						
						'<p>Il codice di condotta anarchico è organizzato nelle seguenti sezioni :</p>' ,
						
						'<ul>',
							'<li><a href="#preface">' .
								$this->getImageIconMarkup(['image'=>$images['preface']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Prefazione</a></li>',
							'<li><a href="#introduction">' .
								$this->getImageIconMarkup(['image'=>$images['introduction']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Introduzione</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Sommario</a></li>',
							'<li><a href="#what-is-encouraged">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-encouraged']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Cosa è incoraggiato</a></li>',
							'<li><a href="#what-is-unacceptable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unacceptable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Cosa è inaccettabile</a></li>',
							'<li><a href="#what-is-unaccountable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unaccountable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Cosa è irresponsabile</a></li>',
							'<li><a href="#how-we-enforce-community-standards">' .
								$this->getImageIconMarkup(['image'=>$images['how-we-enforce-community-standards']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Come applichiamo gli standard comunitari</a></li>',
							'<li><a href="#licensing">' .
								$this->getImageIconMarkup(['image'=>$images['licensing']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Licenza di questo documento</a></li>',
							'<li><a href="#inspiration">' .
								$this->getImageIconMarkup(['image'=>$images['inspiration']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Ispirazione per questo documento</a></li>',
						'</ul>',
					];
					break;
					
				case 'nl':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inhoudsopgave</h3>',
						
						'<p>De anarchistische gedragscode is georganiseerd in de volgende secties :</p>' ,
						
						'<ul>',
							'<li><a href="#preface">' .
								$this->getImageIconMarkup(['image'=>$images['preface']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Voorwoord</a></li>',
							'<li><a href="#introduction">' .
								$this->getImageIconMarkup(['image'=>$images['introduction']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Invoering</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Inhoudsopgave</a></li>',
							'<li><a href="#what-is-encouraged">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-encouraged']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Wat wordt aangemoedigd</a></li>',
							'<li><a href="#what-is-unacceptable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unacceptable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Wat is onacceptabel</a></li>',
							'<li><a href="#what-is-unaccountable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unaccountable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Wat is onverklaarbaar</a></li>',
							'<li><a href="#how-we-enforce-community-standards">' .
								$this->getImageIconMarkup(['image'=>$images['how-we-enforce-community-standards']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Hoe wij de communautaire normen naleven</a></li>',
							'<li><a href="#licensing">' .
								$this->getImageIconMarkup(['image'=>$images['licensing']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Licentiëring van dit document</a></li>',
							'<li><a href="#inspiration">' .
								$this->getImageIconMarkup(['image'=>$images['inspiration']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Inspiratie voor dit document</a></li>',
						'</ul>',
					];
					break;
					
				case 'pl':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Spis treści</h3>',
						
						'<p>Anarchistyczny kodeks postępowania jest podzielony na następujące sekcje :</p>' ,
						
						'<ul>',
							'<li><a href="#preface">' .
								$this->getImageIconMarkup(['image'=>$images['preface']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Przedmowa</a></li>',
							'<li><a href="#introduction">' .
								$this->getImageIconMarkup(['image'=>$images['introduction']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Wprowadzenie</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Spis treści</a></li>',
							'<li><a href="#what-is-encouraged">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-encouraged']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Co zachęca</a></li>',
							'<li><a href="#what-is-unacceptable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unacceptable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Co jest niedopuszczalne</a></li>',
							'<li><a href="#what-is-unaccountable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unaccountable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Co jest nie do opisania</a></li>',
							'<li><a href="#how-we-enforce-community-standards">' .
								$this->getImageIconMarkup(['image'=>$images['how-we-enforce-community-standards']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Jak egzekwujemy standardy wspólnotowe</a></li>',
							'<li><a href="#licensing">' .
								$this->getImageIconMarkup(['image'=>$images['licensing']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Licencjonowanie tego dokumentu</a></li>',
							'<li><a href="#inspiration">' .
								$this->getImageIconMarkup(['image'=>$images['inspiration']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Inspiracja do tego dokumentu</a></li>',
						'</ul>',
					];
					break;
					
				case 'pt':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Índice</h3>',
						
						'<p>O Código de Conduta Anarquista está organizado nas seguintes seções :</p>' ,
						
						'<ul>',
							'<li><a href="#preface">' .
								$this->getImageIconMarkup(['image'=>$images['preface']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Prefácio</a></li>',
							'<li><a href="#introduction">' .
								$this->getImageIconMarkup(['image'=>$images['introduction']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Introdução</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Índice</a></li>',
							'<li><a href="#what-is-encouraged">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-encouraged']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : O que é encorajado?</a></li>',
							'<li><a href="#what-is-unacceptable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unacceptable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : O que é inaceitável</a></li>',
							'<li><a href="#what-is-unaccountable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unaccountable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : O que é inexplicável</a></li>',
							'<li><a href="#how-we-enforce-community-standards">' .
								$this->getImageIconMarkup(['image'=>$images['how-we-enforce-community-standards']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Como nós reforçamos os padrões da comunidade</a></li>',
							'<li><a href="#licensing">' .
								$this->getImageIconMarkup(['image'=>$images['licensing']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Licenciamento deste documento</a></li>',
							'<li><a href="#inspiration">' .
								$this->getImageIconMarkup(['image'=>$images['inspiration']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Inspiração para este documento</a></li>',
						'</ul>',
					];
					break;
					
				case 'ru':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Оглавление</h3>',
						
						'<p>Анархистский Кодекс поведения состоит из следующих разделов :</p>' ,
						
						'<ul>',
							'<li><a href="#preface">' .
								$this->getImageIconMarkup(['image'=>$images['preface']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Предисловие</a></li>',
							'<li><a href="#introduction">' .
								$this->getImageIconMarkup(['image'=>$images['introduction']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Вступление</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Оглавление</a></li>',
							'<li><a href="#what-is-encouraged">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-encouraged']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Что поощряется</a></li>',
							'<li><a href="#what-is-unacceptable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unacceptable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Что недопустимо</a></li>',
							'<li><a href="#what-is-unaccountable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unaccountable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Что не подлежит ответственности</a></li>',
							'<li><a href="#how-we-enforce-community-standards">' .
								$this->getImageIconMarkup(['image'=>$images['how-we-enforce-community-standards']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Как мы соблюдаем стандарты сообщества</a></li>',
							'<li><a href="#licensing">' .
								$this->getImageIconMarkup(['image'=>$images['licensing']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Лицензирование этого документа</a></li>',
							'<li><a href="#inspiration">' .
								$this->getImageIconMarkup(['image'=>$images['inspiration']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Вдохновение для этого документа</a></li>',
						'</ul>',
					];
					break;
					
				case 'tr':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : İçindekiler</h3>',
						
						'<p>Anarşist Davranış Kuralları aşağıdaki bölümlerde düzenlenmiştir :</p>' ,
						
						'<ul>',
							'<li><a href="#preface">' .
								$this->getImageIconMarkup(['image'=>$images['preface']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : önsöz</a></li>',
							'<li><a href="#introduction">' .
								$this->getImageIconMarkup(['image'=>$images['introduction']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Giriş</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : İçindekiler</a></li>',
							'<li><a href="#what-is-encouraged">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-encouraged']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Teşvik Nedir</a></li>',
							'<li><a href="#what-is-unacceptable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unacceptable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Kabul Edilemez Nedir</a></li>',
							'<li><a href="#what-is-unaccountable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unaccountable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Hesaplanamayan Nedir</a></li>',
							'<li><a href="#how-we-enforce-community-standards">' .
								$this->getImageIconMarkup(['image'=>$images['how-we-enforce-community-standards']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Topluluk Standartlarını Nasıl Zorlarız</a></li>',
							'<li><a href="#licensing">' .
								$this->getImageIconMarkup(['image'=>$images['licensing']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Bu Belgenin Lisanslanması</a></li>',
							'<li><a href="#inspiration">' .
								$this->getImageIconMarkup(['image'=>$images['inspiration']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Bu Belge için İlham</a></li>',
						'</ul>',
					];
					break;
					
				case 'zh':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 目录</h3>',
						
						'<p>无政府主义行为准则分为以下几个部分 :</p>' ,
						
						'<ul>',
							'<li><a href="#preface">' .
								$this->getImageIconMarkup(['image'=>$images['preface']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 前言</a></li>',
							'<li><a href="#introduction">' .
								$this->getImageIconMarkup(['image'=>$images['introduction']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 介绍</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 目录</a></li>',
							'<li><a href="#what-is-encouraged">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-encouraged']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 什么是鼓励</a></li>',
							'<li><a href="#what-is-unacceptable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unacceptable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 什么是不可接受的</a></li>',
							'<li><a href="#what-is-unaccountable">' .
								$this->getImageIconMarkup(['image'=>$images['what-is-unaccountable']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 什么是不负责任的</a></li>',
							'<li><a href="#how-we-enforce-community-standards">' .
								$this->getImageIconMarkup(['image'=>$images['how-we-enforce-community-standards']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 我们如何实施社区标准</a></li>',
							'<li><a href="#licensing">' .
								$this->getImageIconMarkup(['image'=>$images['licensing']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 本文件的许可</a></li>',
							'<li><a href="#inspiration">' .
								$this->getImageIconMarkup(['image'=>$images['inspiration']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 本文件的灵感</a></li>',
						'</ul>',
					];
					break;
			}
			
			return $toc_paragraphs;
		}
		
		public function getWhatIsEncouragedSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$what_is_encouraged_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$what_is_encouraged_section[] =
						'<h3><a name="whatisencouraged"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What Is Encouraged</h3>';
					
					$what_is_encouraged_section[] =
						'<h3>Cooperative participation, especially when it is :</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Inclusive,</li>' .
							'<li>Cooperative,</li>' .
							'<li>Community-oriented,</li>' .
							'<li>Active,</li>' .
							'<li>Considerate,</li>' .
							'<li>Respectful,</li>' .
							'<li>Collaborative,</li>' .
							'<li>Authentic,</li>' .
							'<li>And when all of these approaches are attempted before conflict.</li>' .
						'</ul>';
					
					$what_is_encouraged_section[] =
						'<h3>Voluntary interaction, especially when it includes :</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Inclusive language and behavior,</li>' .
							'<li>Welcoming attitude and approach,</li>' .
							'<li>Rational debate and discussion,</li>' .
							'<li>Genuine exchanges of ideas,</li>' .
							'<li>Spreading useful or enlightening information,</li>' .
							'<li>Community-driven and built projects,</li>' .
							'<li>Political, social, or economic progress,</li>' .
							'<li>Identifying with a community-oriented cause,</li>' .
							'<li>Solidarity and a sense of interest in the community.</li>' .
						'</ul>';
					break;
					
				case 'de':
					$what_is_encouraged_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Was wird gefördert?</h3>';
					
					$what_is_encouraged_section[] =
						'<h3>Kooperative Beteiligung, insbesondere wenn :</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Inklusive,</li>' .
							'<li>Genossenschaft,</li>' .
							'<li>Gemeinschaftsorientiert,</li>' .
							'<li>Aktiv,</li>' .
							'<li>Rücksichtsvoll,</li>' .
							'<li>Respektvoll,</li>' .
							'<li>Kollaborativ,</li>' .
							'<li>Authentisch,</li>' .
							'<li>Und wenn all diese Ansätze vor dem Konflikt versucht werden.</li>' .
						'</ul>';
					
					$what_is_encouraged_section[] =
						'<h3>Freiwillige Interaktion, insbesondere wenn es umfasst :</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Inklusive Sprache und Verhalten,</li>' .
							'<li>Einladende Haltung und Herangehensweise,</li>' .
							'<li>Rationale Debatte und Diskussion,</li>' .
							'<li>Echter Gedankenaustausch,</li>' .
							'<li>Nützliche oder aufschlussreiche Informationen verbreiten,</li>' .
							'<li>Community-getriebene und gebaute Projekte,</li>' .
							'<li>Politischer, sozialer oder wirtschaftlicher Fortschritt,</li>' .
							'<li>Sich mit einer gemeindenahen Sache identifizieren,</li>' .
							'<li>Solidarität und Interesse an der Gemeinschaft.
</li>' .
						'</ul>';
					break;
					
				case 'es':
					$what_is_encouraged_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Lo que se alienta</h3>';
					
					$what_is_encouraged_section[] =
						'<h3>Participación cooperativa, especialmente cuando es :</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Inclusiva,</li>' .
							'<li>Cooperativa,</li>' .
							'<li>Orientado a la comunidad,</li>' .
							'<li>Activa,</li>' .
							'<li>Considerada,</li>' .
							'<li>Respetuosa,</li>' .
							'<li>Colaborativa,</li>' .
							'<li>Auténtica,</li>' .
							'<li>Y cuando se intentan todos estos enfoques antes del conflicto.</li>' .
						'</ul>';
					
					$what_is_encouraged_section[] =
						'<h3>Interacción voluntaria, especialmente cuando incluye :</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Lenguaje y comportamiento inclusivo,</li>' .
							'<li>Actitud de acogida y enfoque,</li>' .
							'<li>Debate y discusión racional,</li>' .
							'<li>Intercambios genuinos de ideas,</li>' .
							'<li>Difundir información útil o esclarecedora,</li>' .
							'<li>Proyectos construidos y dirigidos por la comunidad,</li>' .
							'<li>Progreso político, social o económico,</li>' .
							'<li>Identificarse con una causa orientada a la comunidad,</li>' .
							'<li>Solidarity and a sense of interest in the community.</li>' .
						'</ul>';
					break;
					
				case 'fr':
					$what_is_encouraged_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduction</h3>';
					
					$what_is_encouraged_section[] =
						'<h3>Participation coopérative, surtout quand il s’agit de :</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Compris,</li>' .
							'<li>Coopératif,</li>' .
							'<li>Orienté vers la communauté,</li>' .
							'<li>Actif,</li>' .
							'<li>Prévenant,</li>' .
							'<li>Respectueux,</li>' .
							'<li>Collaboratif,</li>' .
							'<li>Authentique,</li>' .
							'<li>Et quand toutes ces approches sont tentées avant le conflit.</li>' .
						'</ul>';
					
					$what_is_encouraged_section[] =
						'<h3>Interaction volontaire, notamment lorsqu\'elle comprend :</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Langage et comportement inclusifs,</li>' .
							'<li>Attitude accueillante et approche,</li>' .
							'<li>Débat et discussion rationnelle,</li>' .
							'<li>Échanges authentiques d\'idées,</li>' .
							'<li>Diffuser des informations utiles ou éclairantes,</li>' .
							'<li>Projets construits et dirigés par la communauté,</li>' .
							'<li>Progrès politique, social ou économique,</li>' .
							'<li>S\'identifier à une cause axée sur la communauté,</li>' .
							'<li>Solidarité et intérêt pour la communauté.</li>' .
						'</ul>';
					break;
					
							// BT : HERE!
					
				case 'ja':
					$what_is_encouraged_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 前書き</h3>';
					
					$what_is_encouraged_section[] =
						'<h3>特に次の場合には、協同参加 :</h3>';
					
						// BT: HERE!
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>包括的、</li>' .
							'<li>協同組合、</li>' .
							'<li>コミュニティ指向、</li>' .
							'<li>アクティブ、</li>' .
							'<li>思いやりのある、</li>' .
							'<li>敬意を表する、</li>' .
							'<li>共同作業、</li>' .
							'<li>本物の、</li>' .
							'<li>そして、これらのアプローチのすべてが紛争の前に試みられたとき。</li>' .
						'</ul>';
					
					$what_is_encouraged_section[] =
						'<h3>自発的な相互作用、特に以下を含む場合：</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>包括的な言語と行動、</li>' .
							'<li>歓迎の態度とアプローチ、</li>' .
							'<li>合理的な議論と議論、</li>' .
							'<li>真のアイデア交換、</li>' .
							'<li>有用なまたは啓発的な情報を広める、</li>' .
							'<li>コミュニティ主導のプロジェクト、</li>' .
							'<li>政治的、社会的、または経済的進歩、</li>' .
							'<li>コミュニティ指向の原因を特定し、</li>' .
							'<li>連帯とコミュニティへの関心。</li>' .
						'</ul>';
					break;
					
				case 'it':
					$what_is_encouraged_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introduzione</h3>';
					
					$what_is_encouraged_section[] =
						'<h3>Partecipazione cooperativa, specialmente quando è :</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Inclusiva,</li>' .
							'<li>Cooperativa,</li>' .
							'<li>Orientata alla comunità,</li>' .
							'<li>Attiva,</li>' .
							'<li>Premurosa,</li>' .
							'<li>Rispettosa,</li>' .
							'<li>Collaborative,</li>' .
							'<li>Autentica,</li>' .
							'<li>E quando tutti questi approcci vengono tentati prima del conflitto.</li>' .
						'</ul>';
					
					$what_is_encouraged_section[] =
						'<h3>Interazione volontaria, specialmente quando include:</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Linguaggio e comportamento inclusivi,</li>' .
							'<li>Atteggiamento e approccio di benvenuto,</li>' .
							'<li>Dibattito e discussione razionali,</li>' .
							'<li>Scambi genuini di idee,</li>' .
							'<li>Diffondere informazioni utili o illuminanti,</li>' .
							'<li>Progetti guidati e realizzati dalla comunità,</li>' .
							'<li>Progresso politico, sociale o economico,</li>' .
							'<li>Identificarsi con una causa orientata alla comunità,</li>' .
							'<li>Solidarietà e senso di interesse per la comunità.</li>' .
						'</ul>';
					break;
					
				case 'nl':
					$what_is_encouraged_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Invoering</h3>';
					
					$what_is_encouraged_section[] =
						'<h3>Coöperatieve deelname, vooral als het gaat om :</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Inclusief,</li>' .
							'<li>Coöperatieve,</li>' .
							'<li>Gemeenschapsgericht,</li>' .
							'<li>Actief,</li>' .
							'<li>Attent,</li>' .
							'<li>Eerbiedig,</li>' .
							'<li>Samenwerkend,</li>' .
							'<li>Authentiek,</li>' .
							'<li>En wanneer al deze benaderingen worden geprobeerd vóór het conflict.</li>' .
						'</ul>';
					
					$what_is_encouraged_section[] =
						'<h3>Vrijwillige interactie, vooral wanneer deze omvat:</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Inclusief taal en gedrag,</li>' .
							'<li>Gastvrije houding en aanpak,</li>' .
							'<li>Rationeel debat en discussie,</li>' .
							'<li>Echte ideeënuitwisseling,</li>' .
							'<li>Nuttige of verhelderende informatie verspreiden,</li>' .
							'<li>Gemeenschapgestuurde en gebouwde projecten,</li>' .
							'<li>Politieke, sociale of economische vooruitgang,</li>' .
							'<li>Zich identificeren met een gemeenschapsgerichte oorzaak,</li>' .
							'<li>Solidariteit en een gevoel van interesse in de gemeenschap.</li>' .
						'</ul>';
					break;
					
				case 'pl':
					$what_is_encouraged_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Wprowadzenie</h3>';
					
					$what_is_encouraged_section[] =
						'<h3>Współpraca, szczególnie gdy :</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Włącznie,</li>' .
							'<li>Spółdzielnia,</li>' .
							'<li>Zorientowany na społeczność,</li>' .
							'<li>Aktywny,</li>' .
							'<li>Uważny,</li>' .
							'<li>Pełen szacunku,</li>' .
							'<li>Współpracy,</li>' .
							'<li>Autentyczny,</li>' .
							'<li>A kiedy wszystkie te podejścia są podejmowane przed konfliktem.</li>' .
						'</ul>';
					
					$what_is_encouraged_section[] =
						'<h3>Dobrowolna interakcja, szczególnie gdy obejmuje:</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Włączający język i zachowanie,</li>' .
							'<li>Przyjazne nastawienie i podejście,</li>' .
							'<li>Racjonalna debata i dyskusja,</li>' .
							'<li>Prawdziwa wymiana pomysłów,</li>' .
							'<li>Rozpowszechnianie przydatnych lub pouczających informacji,</li>' .
							'<li>Projekty realizowane przez społeczność i budowane,</li>' .
							'<li>Postęp polityczny, społeczny lub gospodarczy,</li>' .
							'<li>Identyfikacja z przyczyną zorientowaną na społeczność,</li>' .
							'<li>Solidarność i zainteresowanie wspólnotą.</li>' .
						'</ul>';
					break;
					
				case 'pt':
					$what_is_encouraged_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Introdução</h3>';
					
					$what_is_encouraged_section[] =
						'<h3>Participação cooperativa, especialmente quando é :</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Inclusiva,</li>' .
							'<li>Cooperativa,</li>' .
							'<li>Orientado para a comunidade,</li>' .
							'<li>Ativa,</li>' .
							'<li>Atenciosa,</li>' .
							'<li>Respeitosa,</li>' .
							'<li>Colaborativa,</li>' .
							'<li>Autêntica,</li>' .
							'<li>E quando todas essas abordagens são tentadas antes do conflito.</li>' .
						'</ul>';
					
					$what_is_encouraged_section[] =
						'<h3>Interação voluntária, especialmente quando inclui:</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Linguagem e comportamento inclusivos,</li>' .
							'<li>Atitude e abordagem acolhedoras,</li>' .
							'<li>Debate e discussão racional,</li>' .
							'<li>Trocas genuínas de idéias,</li>' .
							'<li>Divulgação de informações úteis ou esclarecedoras,</li>' .
							'<li>Projetos construídos e dirigidos pela comunidade,</li>' .
							'<li>Progresso político, social ou econômico,</li>' .
							'<li>Identificando-se com uma causa orientada para a comunidade,</li>' .
							'<li>Solidariedade e senso de interesse na comunidade.</li>' .
						'</ul>';
					break;
					
				case 'ru':
					$what_is_encouraged_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Вступление</h3>';
					
					$what_is_encouraged_section[] =
						'<h3>Совместное участие, особенно когда это :</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>включительно,</li>' .
							'<li>кооперативный,</li>' .
							'<li>cообщество-ориентированной,</li>' .
							'<li>активный,</li>' .
							'<li>тактичный,</li>' .
							'<li>почтительный,</li>' .
							'<li>совместный,</li>' .
							'<li>аутентичный,</li>' .
							'<li>И когда все эти подходы предпринимаются до конфликта.</li>' .
						'</ul>';
					
					$what_is_encouraged_section[] =
						'<h3>Добровольное взаимодействие, особенно когда оно включает в себя:</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Инклюзивный язык и поведение,</li>' .
							'<li>Приветственное отношение и подход,</li>' .
							'<li>Рациональная дискуссия и дискуссия,</li>' .
							'<li>Подлинный обмен идеями,</li>' .
							'<li>Распространение полезной или полезной информации,</li>' .
							'<li>Общественные и построенные проекты,</li>' .
							'<li>Политический, социальный или экономический прогресс,</li>' .
							'<li>Идентификация с ориентированной на сообщество причиной,</li>' .
							'<li>Солидарность и чувство интереса к сообществу.</li>' .
						'</ul>';
					break;
					
				case 'tr':
					$what_is_encouraged_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Giriş</h3>';
					
					$what_is_encouraged_section[] =
						'<h3>Kooperatif katılımı, özellikle :</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>dahil,</li>' .
							'<li>kooperatif,</li>' .
							'<li>Toplum odaklı,</li>' .
							'<li>Aktif,</li>' .
							'<li>Düşünceli,</li>' .
							'<li>Saygılı,</li>' .
							'<li>İşbirlikçi,</li>' .
							'<li>Otantik,</li>' .
							'<li>Ve tüm bu yaklaşımlar çatışmadan önce denendiğinde..</li>' .
						'</ul>';
					
					$what_is_encouraged_section[] =
						'<h3>Gönüllü etkileşim, özellikle aşağıdakileri içerdiğinde:</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>Kapsayıcı dil ve davranış,</li>' .
							'<li>Hoş tutum ve yaklaşım,</li>' .
							'<li>Akılcı tartışma ve tartışma,</li>' .
							'<li>Orijinal fikir alışverişi,</li>' .
							'<li>Yararlı veya aydınlatıcı bilgi yayma,</li>' .
							'<li>Topluluk odaklı ve inşa edilmiş projeler,</li>' .
							'<li>Politik, sosyal veya ekonomik ilerleme,</li>' .
							'<li>Topluma yönelik bir nedenle özdeşleşmek,</li>' .
							'<li>Toplumda dayanışma ve ilgi duygusu.</li>' .
						'</ul>';
					break;
					
				case 'zh':
					$what_is_encouraged_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 介绍</h3>';
					
					$what_is_encouraged_section[] =
						'<h3>合作参与，特别是当它是 ：</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>包括的,</li>' .
							'<li>合作社,</li>' .
							'<li>面向社区,</li>' .
							'<li>活性,</li>' .
							'<li>周到,</li>' .
							'<li>尊敬的,</li>' .
							'<li>协同合作,</li>' .
							'<li>真实,</li>' .
							'<li>并且在冲突之前尝试了所有这些方法。</li>' .
						'</ul>';
					
					$what_is_encouraged_section[] =
						'<h3>自愿互动，特别是当它包括：</h3>';
					
					$what_is_encouraged_section[] =
						'<ul>' .
							'<li>包容性语言和行为,</li>' .
							'<li>热情的态度和方法,</li>' .
							'<li>理性辩论与讨论,</li>' .
							'<li>真正的思想交流,</li>' .
							'<li>传播有用或启发性的信息,</li>' .
							'<li>社区推动和建设的项目,</li>' .
							'<li>政治，社会或经济进步,</li>' .
							'<li>找出以社区为导向的事业,</li>' .
							'<li>团结和对社区的兴趣。</li>' .
						'</ul>';
					break;
			}
			
			return $what_is_encouraged_section;
		}
		
		public function getWhatIsUnacceptableSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$what_is_unacceptable_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$what_is_unacceptable_section[] =
						'<h3><a name="what-is-unacceptable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What is Unacceptable</h3>';
					
					$what_is_unacceptable_section[] =
						'<h3>Degrading, disrespecting, or insulting another person or group of people, because of their :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Gender or Gender Identity,</li>' .
							'<li>Ethnicity,</li>' .
							'<li>Immigrant status,</li>' .
							'<li>Religion,</li>' .
							'<li>Sexuality,</li>' .
							'<li>Language,</li>' .
							'<li>Physical appearance or body size,</li>' .
							'<li>Political opinion,</li>' .
							'<li>Substance or medicinal use,</li>' .
							'<li>Disability,</li>' .
							'<li>Age,</li>' .
							'<li>Acceptance of any unfavorable or disfavorable group, whether this group is political, economic, social, or cultural.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Harassment :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Abuse of any type,</li>' .
							'<li>Bullying, stalking, intimidating, following,</li>' .
							'<li>Harassing photographing or filming,</li>' .
							'<li>Inappropriate physical contact,</li>' .
							'<li>Inappropriate sexualized imagery,</li>' .
							'<li>Unwelcome sexual attention,</li>' .
							'<li>Any persistent and undesired action involving the personal space of another.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Unwanted intrusion in public or private atmospheres :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam and commercialism,</li>' .
							'<li>Interruptions based on unrelated or distracting material.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Political, social, or economic domination, such as threatening to or non-consensually revealing another's personal information to the following :</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>An employer or potential employer.</li>' .
							'<li>A government, an agency empowered by the government, or an agent or police officer empowered by the government.</li>' .
							'<li>Any censuring organization, such as religious, social, cultural, economic, or political institutions, such as family, friends, churches, newspapers, publishers, radio stations, etc..</li>' .
							'<li>Any third party without their direct consent.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Authoritarianism, or the spread of behavior that is designed to overturn the standards described so far, such as attempts to advance, support, or aid any of the following :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sexism,' .
							'Racism,' .
							'White Supremacy (or any ethnic-supremacy),' .
							'Homophobia (or any sexuality-phobia),' .
							'Fascism,' .
							'Genocide,' .
							'Drug-phobia,' .
							'Ethnic-, gender-, sexuality-, ableist-, etc., based slurs,' .
							'Oath-taking or pledge-taking.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Advocating or encouraging any of the above.</h3>';
					break;
					
				case 'de':
					$what_is_unacceptable_section[] =
						'<h3><a name="what-is-unacceptable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Was ist inakzeptabel</h3>';
					
					$what_is_unacceptable_section[] =
						'<h3>Eine andere Person oder Gruppe von Menschen herabsetzen, respektlos behandeln oder beleidigen, weil:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Geschlecht oder Geschlechtsidentität,</li>' .
							'<li>Ethnische Zugehörigkeit,</li>' .
							'<li>Zuwandererstatus,</li>' .
							'<li>Religion,</li>' .
							'<li>Sexualität,</li>' .
							'<li>Sprache,</li>' .
							'<li>Aussehen oder Körpergröße,</li>' .
							'<li>Politische Meinung,</li>' .
							'<li>Substanz oder medizinische Verwendung,</li>' .
							'<li>Behinderung,</li>' .
							'<li>Alter,</li>' .
							'<li>Akzeptanz jeder ungünstigen oder ungünstigen Gruppe, unabhängig davon, ob es sich um eine politische, wirtschaftliche, soziale oder kulturelle Gruppe handelt.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Belästigung :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Missbrauch jeglicher Art,</li>' .
							'<li>Mobbing, Stalking, Einschüchterung, Folgen,</li>' .
							'<li>Belästigung beim Fotografieren oder Filmen,</li>' .
							'<li>Unangemessener körperlicher Kontakt,</li>' .
							'<li>Unangemessene sexualisierte Bilder,</li>' .
							'<li>Unerwünschte sexuelle Aufmerksamkeit,</li>' .
							'<li>Jede anhaltende und unerwünschte Handlung, die den persönlichen Bereich eines anderen einbezieht.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Unerwünschtes Eindringen in öffentliche oder private Bereiche :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam und Kommerz,</li>' .
							'<li>Unterbrechungen aufgrund von nicht verwandtem oder ablenkendem Material.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Politische, soziale oder wirtschaftliche Vorherrschaft, z. B. die Drohung oder nicht einvernehmliche Offenlegung personenbezogener Daten eines anderen für Folgendes:</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Ein Arbeitgeber oder potenzieller Arbeitgeber.</li>' .
							'<li>Eine Regierung, eine von der Regierung ermächtigte Behörde oder ein von der Regierung ermächtigter Agent oder Polizeibeamter.</li>' .
							'<li>Jede zensierende Organisation wie religiöse, soziale, kulturelle, wirtschaftliche oder politische Institutionen wie Familie, Freunde, Kirchen, Zeitungen, Verlage, Radiosender usw..</li>' .
							'<li>Dritte ohne deren direkte Zustimmung.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Autoritarismus oder die Verbreitung von Verhaltensweisen, die dazu dienen sollen, die bisher beschriebenen Standards zu überschreiten, z. B. Versuche, Folgendes voranzutreiben, zu unterstützen oder zu unterstützen:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sexismus,' .
							'Rassismus,' .
							'Weiße Vormachtstellung (oder jede ethnische Vormachtstellung),' .
							'Homophobie (oder eine Sexualphobie),' .
							'Faschismus,' .
							'Völkermord,' .
							'Drogenphobie,' .
							'Ethnische, geschlechtsspezifische, sexuelle, ableistungs- usw.' .
							'Eid- oder Pfandübernahme.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Befürwortung oder Ermutigung der oben genannten Punkte.</h3>';
					break;
					
				case 'es':
					$what_is_unacceptable_section[] =
						'<h3><a name="what-is-unacceptable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Lo que es inaceptable</h3>';
					
					$what_is_unacceptable_section[] =
						'<h3>Degradar, faltar al respeto o insultar a otra persona o grupo de personas, debido a su:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Género o identidad de género,</li>' .
							'<li>Etnicidad,</li>' .
							'<li>Estado de inmigrante,</li>' .
							'<li>Religión,</li>' .
							'<li>Sexualidad,</li>' .
							'<li>Idioma,</li>' .
							'<li>Apariencia física o tamaño del cuerpo,</li>' .
							'<li>Opinión política,</li>' .
							'<li>Sustancia o uso medicinal,</li>' .
							'<li>Invalidez,</li>' .
							'<li>Años,</li>' .
							'<li>Aceptación de cualquier grupo desfavorable o desfavorable, ya sea este grupo político, económico, social o cultural.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Acoso :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Abuso de cualquier tipo,</li>' .
							'<li>Intimidación, acoso, intimidación, seguimiento,</li>' .
							'<li>Harassing photographing or filming,</li>' .
							'<li>Inappropriate physical contact,</li>' .
							'<li>Inappropriate sexualized imagery,</li>' .
							'<li>Unwelcome sexual attention,</li>' .
							'<li>Any persistent and undesired action involving the personal space of another.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Unwanted intrusion in public or private atmospheres :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam and commercialism,</li>' .
							'<li>Interruptions based on unrelated or distracting material.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Political, social, or economic domination, such as threatening to or non-consensually revealing another's personal information to the following :</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>An employer or potential employer.</li>' .
							'<li>A government, an agency empowered by the government, or an agent or police officer empowered by the government.</li>' .
							'<li>Any censuring organization, such as religious, social, cultural, economic, or political institutions, such as family, friends, churches, newspapers, publishers, radio stations, etc..</li>' .
							'<li>Any third party without their direct consent.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Authoritarianism, or the spread of behavior that is designed to overturn the standards described so far, such as attempts to advance, support, or aid any of the following :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sexism,' .
							'Racism,' .
							'White Supremacy (or any ethnic-supremacy),' .
							'Homophobia (or any sexuality-phobia),' .
							'Fascism,' .
							'Genocide,' .
							'Drug-phobia,' .
							'Ethnic-, gender-, sexuality-, ableist-, etc., based slurs,' .
							'Oath-taking or pledge-taking.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Advocating or encouraging any of the above.</h3>';
					break;
					
				case 'fr':
					$what_is_unacceptable_section[] =
						'<h3><a name="what-is-unacceptable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Ce qui est inacceptable</h3>';
					
					$what_is_unacceptable_section[] =
						'<h3>Dégrader, manquer de respect ou insulter une autre personne ou un groupe de personnes, en raison de:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Gender or Gender Identity,</li>' .
							'<li>Ethnicity,</li>' .
							'<li>Immigrant status,</li>' .
							'<li>Religion,</li>' .
							'<li>Sexuality,</li>' .
							'<li>Language,</li>' .
							'<li>Physical appearance or body size,</li>' .
							'<li>Political opinion,</li>' .
							'<li>Substance or medicinal use,</li>' .
							'<li>Disability,</li>' .
							'<li>Age,</li>' .
							'<li>Acceptance of any unfavorable or disfavorable group, whether this group is political, economic, social, or cultural.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Harassment :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Abuse of any type,</li>' .
							'<li>Bullying, stalking, intimidating, following,</li>' .
							'<li>Harassing photographing or filming,</li>' .
							'<li>Inappropriate physical contact,</li>' .
							'<li>Inappropriate sexualized imagery,</li>' .
							'<li>Unwelcome sexual attention,</li>' .
							'<li>Any persistent and undesired action involving the personal space of another.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Unwanted intrusion in public or private atmospheres :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam and commercialism,</li>' .
							'<li>Interruptions based on unrelated or distracting material.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Political, social, or economic domination, such as threatening to or non-consensually revealing another's personal information to the following :</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>An employer or potential employer.</li>' .
							'<li>A government, an agency empowered by the government, or an agent or police officer empowered by the government.</li>' .
							'<li>Any censuring organization, such as religious, social, cultural, economic, or political institutions, such as family, friends, churches, newspapers, publishers, radio stations, etc..</li>' .
							'<li>Any third party without their direct consent.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Authoritarianism, or the spread of behavior that is designed to overturn the standards described so far, such as attempts to advance, support, or aid any of the following :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sexism,' .
							'Racism,' .
							'White Supremacy (or any ethnic-supremacy),' .
							'Homophobia (or any sexuality-phobia),' .
							'Fascism,' .
							'Genocide,' .
							'Drug-phobia,' .
							'Ethnic-, gender-, sexuality-, ableist-, etc., based slurs,' .
							'Oath-taking or pledge-taking.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Advocating or encouraging any of the above.</h3>';
					break;
					
				case 'ja':
					$what_is_unacceptable_section[] =
						'<h3><a name="what-is-unacceptable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 受け入れられないもの</h3>';
					
					$what_is_unacceptable_section[] =
						'<h3>以下の理由により、他の人またはグループをDe辱、軽視、or辱します。</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Gender or Gender Identity,</li>' .
							'<li>Ethnicity,</li>' .
							'<li>Immigrant status,</li>' .
							'<li>Religion,</li>' .
							'<li>Sexuality,</li>' .
							'<li>Language,</li>' .
							'<li>Physical appearance or body size,</li>' .
							'<li>Political opinion,</li>' .
							'<li>Substance or medicinal use,</li>' .
							'<li>Disability,</li>' .
							'<li>Age,</li>' .
							'<li>Acceptance of any unfavorable or disfavorable group, whether this group is political, economic, social, or cultural.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Harassment :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Abuse of any type,</li>' .
							'<li>Bullying, stalking, intimidating, following,</li>' .
							'<li>Harassing photographing or filming,</li>' .
							'<li>Inappropriate physical contact,</li>' .
							'<li>Inappropriate sexualized imagery,</li>' .
							'<li>Unwelcome sexual attention,</li>' .
							'<li>Any persistent and undesired action involving the personal space of another.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Unwanted intrusion in public or private atmospheres :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam and commercialism,</li>' .
							'<li>Interruptions based on unrelated or distracting material.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Political, social, or economic domination, such as threatening to or non-consensually revealing another's personal information to the following :</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>An employer or potential employer.</li>' .
							'<li>A government, an agency empowered by the government, or an agent or police officer empowered by the government.</li>' .
							'<li>Any censuring organization, such as religious, social, cultural, economic, or political institutions, such as family, friends, churches, newspapers, publishers, radio stations, etc..</li>' .
							'<li>Any third party without their direct consent.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Authoritarianism, or the spread of behavior that is designed to overturn the standards described so far, such as attempts to advance, support, or aid any of the following :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sexism,' .
							'Racism,' .
							'White Supremacy (or any ethnic-supremacy),' .
							'Homophobia (or any sexuality-phobia),' .
							'Fascism,' .
							'Genocide,' .
							'Drug-phobia,' .
							'Ethnic-, gender-, sexuality-, ableist-, etc., based slurs,' .
							'Oath-taking or pledge-taking.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Advocating or encouraging any of the above.</h3>';
					break;
					
				case 'it':
					$what_is_unacceptable_section[] =
						'<h3><a name="what-is-unacceptable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Cosa è inaccettabile</h3>';
					
					$what_is_unacceptable_section[] =
						'<h3>Degradare, mancare di rispetto o insultare un\'altra persona o un gruppo di persone, a causa della loro:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Gender or Gender Identity,</li>' .
							'<li>Ethnicity,</li>' .
							'<li>Immigrant status,</li>' .
							'<li>Religion,</li>' .
							'<li>Sexuality,</li>' .
							'<li>Language,</li>' .
							'<li>Physical appearance or body size,</li>' .
							'<li>Political opinion,</li>' .
							'<li>Substance or medicinal use,</li>' .
							'<li>Disability,</li>' .
							'<li>Age,</li>' .
							'<li>Acceptance of any unfavorable or disfavorable group, whether this group is political, economic, social, or cultural.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Harassment :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Abuse of any type,</li>' .
							'<li>Bullying, stalking, intimidating, following,</li>' .
							'<li>Harassing photographing or filming,</li>' .
							'<li>Inappropriate physical contact,</li>' .
							'<li>Inappropriate sexualized imagery,</li>' .
							'<li>Unwelcome sexual attention,</li>' .
							'<li>Any persistent and undesired action involving the personal space of another.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Unwanted intrusion in public or private atmospheres :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam and commercialism,</li>' .
							'<li>Interruptions based on unrelated or distracting material.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Political, social, or economic domination, such as threatening to or non-consensually revealing another's personal information to the following :</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>An employer or potential employer.</li>' .
							'<li>A government, an agency empowered by the government, or an agent or police officer empowered by the government.</li>' .
							'<li>Any censuring organization, such as religious, social, cultural, economic, or political institutions, such as family, friends, churches, newspapers, publishers, radio stations, etc..</li>' .
							'<li>Any third party without their direct consent.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Authoritarianism, or the spread of behavior that is designed to overturn the standards described so far, such as attempts to advance, support, or aid any of the following :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sexism,' .
							'Racism,' .
							'White Supremacy (or any ethnic-supremacy),' .
							'Homophobia (or any sexuality-phobia),' .
							'Fascism,' .
							'Genocide,' .
							'Drug-phobia,' .
							'Ethnic-, gender-, sexuality-, ableist-, etc., based slurs,' .
							'Oath-taking or pledge-taking.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Advocating or encouraging any of the above.</h3>';
					break;
					
				case 'nl':
					$what_is_unacceptable_section[] =
						'<h3><a name="what-is-unacceptable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Wat is onaanvaardbaar</h3>';
					
					$what_is_unacceptable_section[] =
						'<h3>Een andere persoon of groep mensen vernederen, respectloos maken of beledigen vanwege hun:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Gender or Gender Identity,</li>' .
							'<li>Ethnicity,</li>' .
							'<li>Immigrant status,</li>' .
							'<li>Religion,</li>' .
							'<li>Sexuality,</li>' .
							'<li>Language,</li>' .
							'<li>Physical appearance or body size,</li>' .
							'<li>Political opinion,</li>' .
							'<li>Substance or medicinal use,</li>' .
							'<li>Disability,</li>' .
							'<li>Age,</li>' .
							'<li>Acceptance of any unfavorable or disfavorable group, whether this group is political, economic, social, or cultural.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Harassment :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Abuse of any type,</li>' .
							'<li>Bullying, stalking, intimidating, following,</li>' .
							'<li>Harassing photographing or filming,</li>' .
							'<li>Inappropriate physical contact,</li>' .
							'<li>Inappropriate sexualized imagery,</li>' .
							'<li>Unwelcome sexual attention,</li>' .
							'<li>Any persistent and undesired action involving the personal space of another.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Unwanted intrusion in public or private atmospheres :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam and commercialism,</li>' .
							'<li>Interruptions based on unrelated or distracting material.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Political, social, or economic domination, such as threatening to or non-consensually revealing another's personal information to the following :</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>An employer or potential employer.</li>' .
							'<li>A government, an agency empowered by the government, or an agent or police officer empowered by the government.</li>' .
							'<li>Any censuring organization, such as religious, social, cultural, economic, or political institutions, such as family, friends, churches, newspapers, publishers, radio stations, etc..</li>' .
							'<li>Any third party without their direct consent.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Authoritarianism, or the spread of behavior that is designed to overturn the standards described so far, such as attempts to advance, support, or aid any of the following :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sexism,' .
							'Racism,' .
							'White Supremacy (or any ethnic-supremacy),' .
							'Homophobia (or any sexuality-phobia),' .
							'Fascism,' .
							'Genocide,' .
							'Drug-phobia,' .
							'Ethnic-, gender-, sexuality-, ableist-, etc., based slurs,' .
							'Oath-taking or pledge-taking.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Advocating or encouraging any of the above.</h3>';
					break;
					
				case 'pl':
					$what_is_unacceptable_section[] =
						'<h3><a name="what-is-unacceptable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Co jest niedopuszczalne</h3>';
					
					$what_is_unacceptable_section[] =
						'<h3>Obrażanie, brak szacunku lub obrażanie innej osoby lub grupy osób z powodu:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Gender or Gender Identity,</li>' .
							'<li>Ethnicity,</li>' .
							'<li>Immigrant status,</li>' .
							'<li>Religion,</li>' .
							'<li>Sexuality,</li>' .
							'<li>Language,</li>' .
							'<li>Physical appearance or body size,</li>' .
							'<li>Political opinion,</li>' .
							'<li>Substance or medicinal use,</li>' .
							'<li>Disability,</li>' .
							'<li>Age,</li>' .
							'<li>Acceptance of any unfavorable or disfavorable group, whether this group is political, economic, social, or cultural.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Harassment :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Abuse of any type,</li>' .
							'<li>Bullying, stalking, intimidating, following,</li>' .
							'<li>Harassing photographing or filming,</li>' .
							'<li>Inappropriate physical contact,</li>' .
							'<li>Inappropriate sexualized imagery,</li>' .
							'<li>Unwelcome sexual attention,</li>' .
							'<li>Any persistent and undesired action involving the personal space of another.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Unwanted intrusion in public or private atmospheres :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam and commercialism,</li>' .
							'<li>Interruptions based on unrelated or distracting material.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Political, social, or economic domination, such as threatening to or non-consensually revealing another's personal information to the following :</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>An employer or potential employer.</li>' .
							'<li>A government, an agency empowered by the government, or an agent or police officer empowered by the government.</li>' .
							'<li>Any censuring organization, such as religious, social, cultural, economic, or political institutions, such as family, friends, churches, newspapers, publishers, radio stations, etc..</li>' .
							'<li>Any third party without their direct consent.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Authoritarianism, or the spread of behavior that is designed to overturn the standards described so far, such as attempts to advance, support, or aid any of the following :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sexism,' .
							'Racism,' .
							'White Supremacy (or any ethnic-supremacy),' .
							'Homophobia (or any sexuality-phobia),' .
							'Fascism,' .
							'Genocide,' .
							'Drug-phobia,' .
							'Ethnic-, gender-, sexuality-, ableist-, etc., based slurs,' .
							'Oath-taking or pledge-taking.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Advocating or encouraging any of the above.</h3>';
					break;
					
				case 'pt':
					$what_is_unacceptable_section[] =
						'<h3><a name="what-is-unacceptable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : O que é inaceitável</h3>';
					
					$what_is_unacceptable_section[] =
						'<h3>Degradando, desrespeitando ou insultando outra pessoa ou grupo de pessoas, devido a:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Gender or Gender Identity,</li>' .
							'<li>Ethnicity,</li>' .
							'<li>Immigrant status,</li>' .
							'<li>Religion,</li>' .
							'<li>Sexuality,</li>' .
							'<li>Language,</li>' .
							'<li>Physical appearance or body size,</li>' .
							'<li>Political opinion,</li>' .
							'<li>Substance or medicinal use,</li>' .
							'<li>Disability,</li>' .
							'<li>Age,</li>' .
							'<li>Acceptance of any unfavorable or disfavorable group, whether this group is political, economic, social, or cultural.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Harassment :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Abuse of any type,</li>' .
							'<li>Bullying, stalking, intimidating, following,</li>' .
							'<li>Harassing photographing or filming,</li>' .
							'<li>Inappropriate physical contact,</li>' .
							'<li>Inappropriate sexualized imagery,</li>' .
							'<li>Unwelcome sexual attention,</li>' .
							'<li>Any persistent and undesired action involving the personal space of another.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Unwanted intrusion in public or private atmospheres :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam and commercialism,</li>' .
							'<li>Interruptions based on unrelated or distracting material.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Political, social, or economic domination, such as threatening to or non-consensually revealing another's personal information to the following :</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>An employer or potential employer.</li>' .
							'<li>A government, an agency empowered by the government, or an agent or police officer empowered by the government.</li>' .
							'<li>Any censuring organization, such as religious, social, cultural, economic, or political institutions, such as family, friends, churches, newspapers, publishers, radio stations, etc..</li>' .
							'<li>Any third party without their direct consent.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Authoritarianism, or the spread of behavior that is designed to overturn the standards described so far, such as attempts to advance, support, or aid any of the following :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sexism,' .
							'Racism,' .
							'White Supremacy (or any ethnic-supremacy),' .
							'Homophobia (or any sexuality-phobia),' .
							'Fascism,' .
							'Genocide,' .
							'Drug-phobia,' .
							'Ethnic-, gender-, sexuality-, ableist-, etc., based slurs,' .
							'Oath-taking or pledge-taking.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Advocating or encouraging any of the above.</h3>';
					break;
					
				case 'ru':
					$what_is_unacceptable_section[] =
						'<h3><a name="what-is-unacceptable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Что недопустимо</h3>';
					
					$what_is_unacceptable_section[] =
						'<h3>Унижение, неуважение или оскорбление другого человека или группы людей из-за их:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Gender or Gender Identity,</li>' .
							'<li>Ethnicity,</li>' .
							'<li>Immigrant status,</li>' .
							'<li>Religion,</li>' .
							'<li>Sexuality,</li>' .
							'<li>Language,</li>' .
							'<li>Physical appearance or body size,</li>' .
							'<li>Political opinion,</li>' .
							'<li>Substance or medicinal use,</li>' .
							'<li>Disability,</li>' .
							'<li>Age,</li>' .
							'<li>Acceptance of any unfavorable or disfavorable group, whether this group is political, economic, social, or cultural.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Harassment :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Abuse of any type,</li>' .
							'<li>Bullying, stalking, intimidating, following,</li>' .
							'<li>Harassing photographing or filming,</li>' .
							'<li>Inappropriate physical contact,</li>' .
							'<li>Inappropriate sexualized imagery,</li>' .
							'<li>Unwelcome sexual attention,</li>' .
							'<li>Any persistent and undesired action involving the personal space of another.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Unwanted intrusion in public or private atmospheres :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam and commercialism,</li>' .
							'<li>Interruptions based on unrelated or distracting material.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Political, social, or economic domination, such as threatening to or non-consensually revealing another's personal information to the following :</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>An employer or potential employer.</li>' .
							'<li>A government, an agency empowered by the government, or an agent or police officer empowered by the government.</li>' .
							'<li>Any censuring organization, such as religious, social, cultural, economic, or political institutions, such as family, friends, churches, newspapers, publishers, radio stations, etc..</li>' .
							'<li>Any third party without their direct consent.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Authoritarianism, or the spread of behavior that is designed to overturn the standards described so far, such as attempts to advance, support, or aid any of the following :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sexism,' .
							'Racism,' .
							'White Supremacy (or any ethnic-supremacy),' .
							'Homophobia (or any sexuality-phobia),' .
							'Fascism,' .
							'Genocide,' .
							'Drug-phobia,' .
							'Ethnic-, gender-, sexuality-, ableist-, etc., based slurs,' .
							'Oath-taking or pledge-taking.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Advocating or encouraging any of the above.</h3>';
					break;
					
				case 'tr':
					$what_is_unacceptable_section[] =
						'<h3><a name="what-is-unacceptable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Kabul Edilemez</h3>';
					
					$what_is_unacceptable_section[] =
						'<h3>Aşağıdakiler nedeniyle başka bir kişiyi veya bir grup insanı aşağılamak, saygısızlık etmek veya aşağılamak:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Gender or Gender Identity,</li>' .
							'<li>Ethnicity,</li>' .
							'<li>Immigrant status,</li>' .
							'<li>Religion,</li>' .
							'<li>Sexuality,</li>' .
							'<li>Language,</li>' .
							'<li>Physical appearance or body size,</li>' .
							'<li>Political opinion,</li>' .
							'<li>Substance or medicinal use,</li>' .
							'<li>Disability,</li>' .
							'<li>Age,</li>' .
							'<li>Acceptance of any unfavorable or disfavorable group, whether this group is political, economic, social, or cultural.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Harassment :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Abuse of any type,</li>' .
							'<li>Bullying, stalking, intimidating, following,</li>' .
							'<li>Harassing photographing or filming,</li>' .
							'<li>Inappropriate physical contact,</li>' .
							'<li>Inappropriate sexualized imagery,</li>' .
							'<li>Unwelcome sexual attention,</li>' .
							'<li>Any persistent and undesired action involving the personal space of another.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Unwanted intrusion in public or private atmospheres :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam and commercialism,</li>' .
							'<li>Interruptions based on unrelated or distracting material.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Political, social, or economic domination, such as threatening to or non-consensually revealing another's personal information to the following :</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>An employer or potential employer.</li>' .
							'<li>A government, an agency empowered by the government, or an agent or police officer empowered by the government.</li>' .
							'<li>Any censuring organization, such as religious, social, cultural, economic, or political institutions, such as family, friends, churches, newspapers, publishers, radio stations, etc..</li>' .
							'<li>Any third party without their direct consent.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Authoritarianism, or the spread of behavior that is designed to overturn the standards described so far, such as attempts to advance, support, or aid any of the following :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sexism,' .
							'Racism,' .
							'White Supremacy (or any ethnic-supremacy),' .
							'Homophobia (or any sexuality-phobia),' .
							'Fascism,' .
							'Genocide,' .
							'Drug-phobia,' .
							'Ethnic-, gender-, sexuality-, ableist-, etc., based slurs,' .
							'Oath-taking or pledge-taking.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Advocating or encouraging any of the above.</h3>';
					break;
					
				case 'zh':
					$what_is_unacceptable_section[] =
						'<h3><a name="what-is-unacceptable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 什么是不可接受的</h3>';
					
					$what_is_unacceptable_section[] =
						'<h3>侮辱，侮辱或侮辱另一个人或一群人，因为：</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Gender or Gender Identity,</li>' .
							'<li>Ethnicity,</li>' .
							'<li>Immigrant status,</li>' .
							'<li>Religion,</li>' .
							'<li>Sexuality,</li>' .
							'<li>Language,</li>' .
							'<li>Physical appearance or body size,</li>' .
							'<li>Political opinion,</li>' .
							'<li>Substance or medicinal use,</li>' .
							'<li>Disability,</li>' .
							'<li>Age,</li>' .
							'<li>Acceptance of any unfavorable or disfavorable group, whether this group is political, economic, social, or cultural.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Harassment :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Abuse of any type,</li>' .
							'<li>Bullying, stalking, intimidating, following,</li>' .
							'<li>Harassing photographing or filming,</li>' .
							'<li>Inappropriate physical contact,</li>' .
							'<li>Inappropriate sexualized imagery,</li>' .
							'<li>Unwelcome sexual attention,</li>' .
							'<li>Any persistent and undesired action involving the personal space of another.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Unwanted intrusion in public or private atmospheres :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam and commercialism,</li>' .
							'<li>Interruptions based on unrelated or distracting material.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Political, social, or economic domination, such as threatening to or non-consensually revealing another's personal information to the following :</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>An employer or potential employer.</li>' .
							'<li>A government, an agency empowered by the government, or an agent or police officer empowered by the government.</li>' .
							'<li>Any censuring organization, such as religious, social, cultural, economic, or political institutions, such as family, friends, churches, newspapers, publishers, radio stations, etc..</li>' .
							'<li>Any third party without their direct consent.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Authoritarianism, or the spread of behavior that is designed to overturn the standards described so far, such as attempts to advance, support, or aid any of the following :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sexism,' .
							'Racism,' .
							'White Supremacy (or any ethnic-supremacy),' .
							'Homophobia (or any sexuality-phobia),' .
							'Fascism,' .
							'Genocide,' .
							'Drug-phobia,' .
							'Ethnic-, gender-, sexuality-, ableist-, etc., based slurs,' .
							'Oath-taking or pledge-taking.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Advocating or encouraging any of the above.</h3>';
					break;
			}
			
			return $what_is_unacceptable_section;
		}
		
		public function getWhatIsUnaccountableSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$what_is_unaccountable_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What is Unaccountable</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>We are one community organization. If your complaint is severe enough, you may need to elevate it beyond what this agreement provides for. You are authorized and encouraged to this if you do not think your complaint can be met with satisfaction.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>You may not cite this document as reason, when :</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Passing or repealing government laws,</li>' .
							'<li>Hiring or discharging workers,</li>' .
							'<li>Refusing to cooperate with the investigation of a legitimate, Humans Rights, Non-Government Organization.</li>' .
						'</ul>';
					break;
					
				case 'de':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What is Unaccountable</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>We are one community organization. If your complaint is severe enough, you may need to elevate it beyond what this agreement provides for. You are authorized and encouraged to this if you do not think your complaint can be met with satisfaction.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>You may not cite this document as reason, when :</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Passing or repealing government laws,</li>' .
							'<li>Hiring or discharging workers,</li>' .
							'<li>Refusing to cooperate with the investigation of a legitimate, Humans Rights, Non-Government Organization.</li>' .
						'</ul>';
					break;
					
				case 'es':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What is Unaccountable</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>We are one community organization. If your complaint is severe enough, you may need to elevate it beyond what this agreement provides for. You are authorized and encouraged to this if you do not think your complaint can be met with satisfaction.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>You may not cite this document as reason, when :</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Passing or repealing government laws,</li>' .
							'<li>Hiring or discharging workers,</li>' .
							'<li>Refusing to cooperate with the investigation of a legitimate, Humans Rights, Non-Government Organization.</li>' .
						'</ul>';
					break;
					
				case 'fr':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What is Unaccountable</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>We are one community organization. If your complaint is severe enough, you may need to elevate it beyond what this agreement provides for. You are authorized and encouraged to this if you do not think your complaint can be met with satisfaction.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>You may not cite this document as reason, when :</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Passing or repealing government laws,</li>' .
							'<li>Hiring or discharging workers,</li>' .
							'<li>Refusing to cooperate with the investigation of a legitimate, Humans Rights, Non-Government Organization.</li>' .
						'</ul>';
					break;
					
				case 'ja':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What is Unaccountable</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>We are one community organization. If your complaint is severe enough, you may need to elevate it beyond what this agreement provides for. You are authorized and encouraged to this if you do not think your complaint can be met with satisfaction.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>You may not cite this document as reason, when :</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Passing or repealing government laws,</li>' .
							'<li>Hiring or discharging workers,</li>' .
							'<li>Refusing to cooperate with the investigation of a legitimate, Humans Rights, Non-Government Organization.</li>' .
						'</ul>';
					break;
					
				case 'it':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What is Unaccountable</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>We are one community organization. If your complaint is severe enough, you may need to elevate it beyond what this agreement provides for. You are authorized and encouraged to this if you do not think your complaint can be met with satisfaction.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>You may not cite this document as reason, when :</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Passing or repealing government laws,</li>' .
							'<li>Hiring or discharging workers,</li>' .
							'<li>Refusing to cooperate with the investigation of a legitimate, Humans Rights, Non-Government Organization.</li>' .
						'</ul>';
					break;
					
				case 'nl':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What is Unaccountable</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>We are one community organization. If your complaint is severe enough, you may need to elevate it beyond what this agreement provides for. You are authorized and encouraged to this if you do not think your complaint can be met with satisfaction.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>You may not cite this document as reason, when :</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Passing or repealing government laws,</li>' .
							'<li>Hiring or discharging workers,</li>' .
							'<li>Refusing to cooperate with the investigation of a legitimate, Humans Rights, Non-Government Organization.</li>' .
						'</ul>';
					break;
					
				case 'pl':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What is Unaccountable</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>We are one community organization. If your complaint is severe enough, you may need to elevate it beyond what this agreement provides for. You are authorized and encouraged to this if you do not think your complaint can be met with satisfaction.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>You may not cite this document as reason, when :</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Passing or repealing government laws,</li>' .
							'<li>Hiring or discharging workers,</li>' .
							'<li>Refusing to cooperate with the investigation of a legitimate, Humans Rights, Non-Government Organization.</li>' .
						'</ul>';
					break;
					
				case 'pt':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What is Unaccountable</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>We are one community organization. If your complaint is severe enough, you may need to elevate it beyond what this agreement provides for. You are authorized and encouraged to this if you do not think your complaint can be met with satisfaction.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>You may not cite this document as reason, when :</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Passing or repealing government laws,</li>' .
							'<li>Hiring or discharging workers,</li>' .
							'<li>Refusing to cooperate with the investigation of a legitimate, Humans Rights, Non-Government Organization.</li>' .
						'</ul>';
					break;
					
				case 'ru':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What is Unaccountable</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>We are one community organization. If your complaint is severe enough, you may need to elevate it beyond what this agreement provides for. You are authorized and encouraged to this if you do not think your complaint can be met with satisfaction.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>You may not cite this document as reason, when :</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Passing or repealing government laws,</li>' .
							'<li>Hiring or discharging workers,</li>' .
							'<li>Refusing to cooperate with the investigation of a legitimate, Humans Rights, Non-Government Organization.</li>' .
						'</ul>';
					break;
					
				case 'tr':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What is Unaccountable</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>We are one community organization. If your complaint is severe enough, you may need to elevate it beyond what this agreement provides for. You are authorized and encouraged to this if you do not think your complaint can be met with satisfaction.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>You may not cite this document as reason, when :</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Passing or repealing government laws,</li>' .
							'<li>Hiring or discharging workers,</li>' .
							'<li>Refusing to cooperate with the investigation of a legitimate, Humans Rights, Non-Government Organization.</li>' .
						'</ul>';
					break;
					
				case 'zh':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What is Unaccountable</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>We are one community organization. If your complaint is severe enough, you may need to elevate it beyond what this agreement provides for. You are authorized and encouraged to this if you do not think your complaint can be met with satisfaction.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>You may not cite this document as reason, when :</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Passing or repealing government laws,</li>' .
							'<li>Hiring or discharging workers,</li>' .
							'<li>Refusing to cooperate with the investigation of a legitimate, Humans Rights, Non-Government Organization.</li>' .
						'</ul>';
					break;
			}
			
			return $what_is_unaccountable_section;
		}
		
		public function getHowWeEnforceCommunityStandardsSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$how_we_enforce_community_standards_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How we Enforce Community Standards</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>If you witness or experience any violation of this Code of Conduct, you are urged to immediately contact official organizers within the community.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>In response to violations of unacceptable behavior, we may respond to the offender as follows :</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Warning,</li>' .
							'<li>Temporary ban,</li>' .
							'<li>Permanent expulsion.</li>' .
						'</ul>';
					break;
					
				case 'de':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How we Enforce Community Standards</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>If you witness or experience any violation of this Code of Conduct, you are urged to immediately contact official organizers within the community.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>In response to violations of unacceptable behavior, we may respond to the offender as follows :</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Warning,</li>' .
							'<li>Temporary ban,</li>' .
							'<li>Permanent expulsion.</li>' .
						'</ul>';
					break;
					
				case 'es':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How we Enforce Community Standards</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>If you witness or experience any violation of this Code of Conduct, you are urged to immediately contact official organizers within the community.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>In response to violations of unacceptable behavior, we may respond to the offender as follows :</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Warning,</li>' .
							'<li>Temporary ban,</li>' .
							'<li>Permanent expulsion.</li>' .
						'</ul>';
					break;
					
				case 'fr':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How we Enforce Community Standards</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>If you witness or experience any violation of this Code of Conduct, you are urged to immediately contact official organizers within the community.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>In response to violations of unacceptable behavior, we may respond to the offender as follows :</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Warning,</li>' .
							'<li>Temporary ban,</li>' .
							'<li>Permanent expulsion.</li>' .
						'</ul>';
					break;
					
				case 'ja':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How we Enforce Community Standards</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>If you witness or experience any violation of this Code of Conduct, you are urged to immediately contact official organizers within the community.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>In response to violations of unacceptable behavior, we may respond to the offender as follows :</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Warning,</li>' .
							'<li>Temporary ban,</li>' .
							'<li>Permanent expulsion.</li>' .
						'</ul>';
					break;
					
				case 'it':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How we Enforce Community Standards</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>If you witness or experience any violation of this Code of Conduct, you are urged to immediately contact official organizers within the community.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>In response to violations of unacceptable behavior, we may respond to the offender as follows :</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Warning,</li>' .
							'<li>Temporary ban,</li>' .
							'<li>Permanent expulsion.</li>' .
						'</ul>';
					break;
					
				case 'nl':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How we Enforce Community Standards</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>If you witness or experience any violation of this Code of Conduct, you are urged to immediately contact official organizers within the community.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>In response to violations of unacceptable behavior, we may respond to the offender as follows :</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Warning,</li>' .
							'<li>Temporary ban,</li>' .
							'<li>Permanent expulsion.</li>' .
						'</ul>';
					break;
					
				case 'pl':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How we Enforce Community Standards</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>If you witness or experience any violation of this Code of Conduct, you are urged to immediately contact official organizers within the community.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>In response to violations of unacceptable behavior, we may respond to the offender as follows :</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Warning,</li>' .
							'<li>Temporary ban,</li>' .
							'<li>Permanent expulsion.</li>' .
						'</ul>';
					break;
					
				case 'pt':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How we Enforce Community Standards</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>If you witness or experience any violation of this Code of Conduct, you are urged to immediately contact official organizers within the community.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>In response to violations of unacceptable behavior, we may respond to the offender as follows :</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Warning,</li>' .
							'<li>Temporary ban,</li>' .
							'<li>Permanent expulsion.</li>' .
						'</ul>';
					break;
					
				case 'ru':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How we Enforce Community Standards</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>If you witness or experience any violation of this Code of Conduct, you are urged to immediately contact official organizers within the community.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>In response to violations of unacceptable behavior, we may respond to the offender as follows :</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Warning,</li>' .
							'<li>Temporary ban,</li>' .
							'<li>Permanent expulsion.</li>' .
						'</ul>';
					break;
					
				case 'tr':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How we Enforce Community Standards</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>If you witness or experience any violation of this Code of Conduct, you are urged to immediately contact official organizers within the community.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>In response to violations of unacceptable behavior, we may respond to the offender as follows :</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Warning,</li>' .
							'<li>Temporary ban,</li>' .
							'<li>Permanent expulsion.</li>' .
						'</ul>';
					break;
					
				case 'zh':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How we Enforce Community Standards</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>If you witness or experience any violation of this Code of Conduct, you are urged to immediately contact official organizers within the community.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>In response to violations of unacceptable behavior, we may respond to the offender as follows :</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Warning,</li>' .
							'<li>Temporary ban,</li>' .
							'<li>Permanent expulsion.</li>' .
						'</ul>';
					break;
			}
			
			return $how_we_enforce_community_standards_section;
		}
		
		public function getLicensingSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$licensing_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licensing of this Document</h3>';
					
					$licensing_section[] =
						'<p>This document is released under the Creative Commons Attribution 3.0 License.  You may find these terms here...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'de':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licensing of this Document</h3>';
					
					$licensing_section[] =
						'<p>This document is released under the Creative Commons Attribution 3.0 License.  You may find these terms here...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'es':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licensing of this Document</h3>';
					
					$licensing_section[] =
						'<p>This document is released under the Creative Commons Attribution 3.0 License.  You may find these terms here...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'fr':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licensing of this Document</h3>';
					
					$licensing_section[] =
						'<p>This document is released under the Creative Commons Attribution 3.0 License.  You may find these terms here...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'ja':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licensing of this Document</h3>';
					
					$licensing_section[] =
						'<p>This document is released under the Creative Commons Attribution 3.0 License.  You may find these terms here...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'it':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licensing of this Document</h3>';
					
					$licensing_section[] =
						'<p>This document is released under the Creative Commons Attribution 3.0 License.  You may find these terms here...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'nl':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licensing of this Document</h3>';
					
					$licensing_section[] =
						'<p>This document is released under the Creative Commons Attribution 3.0 License.  You may find these terms here...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'pl':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licensing of this Document</h3>';
					
					$licensing_section[] =
						'<p>This document is released under the Creative Commons Attribution 3.0 License.  You may find these terms here...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'pt':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licensing of this Document</h3>';
					
					$licensing_section[] =
						'<p>This document is released under the Creative Commons Attribution 3.0 License.  You may find these terms here...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'ru':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licensing of this Document</h3>';
					
					$licensing_section[] =
						'<p>This document is released under the Creative Commons Attribution 3.0 License.  You may find these terms here...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'tr':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licensing of this Document</h3>';
					
					$licensing_section[] =
						'<p>This document is released under the Creative Commons Attribution 3.0 License.  You may find these terms here...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'zh':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licensing of this Document</h3>';
					
					$licensing_section[] =
						'<p>This document is released under the Creative Commons Attribution 3.0 License.  You may find these terms here...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
			}
			
			return $licensing_section;
		}
		
		public function getInspirationSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$inspiration_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$inspiration_section[] =
						'<h3><a name="inspiration"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiration for this Document</h3>';
					
					$inspiration_section[] =
						'<p>This document was inspired by a wide number of other materials, and I owe them all my gratitude! Thank you :</p>';
					
					$inspiration_section[] =
						'<ul>' .
							'<li>Reddit Anarchism Rules</li>' .
							'<li>Anti-Authoritarian Academic Code of Conduct</li>' .
							'<li>Geek Feminism Conference Anti-Harassment Policy</li>' .
							'<li>The Constitution of the Rojava Cantons : Modern, Anarchist Constitution (2014)</li>' .
							"<li>Workers' Solidarity Movement : WSM Code of Conduct</li>" .
							'<li>Industrial Workers of the World : Code of Ethics</li>' .
							'<li>The French Declaration of Rights of Man : Classical, Socialist Declaration (1789)</li>' .
							'<li>The Citizen Code of Conduct</li>' .
							'<li>The Contributor Covenant</li>' .
							'<li>The Tao Teh Ching, by Lao Tzu (400-600 BCE)</li>' .
						'</ul>';
					break;
					
				case 'de':
					$inspiration_section[] =
						'<h3><a name="inspiration"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiration for this Document</h3>';
					
					$inspiration_section[] =
						'<p>This document was inspired by a wide number of other materials, and I owe them all my gratitude! Thank you :</p>';
					
					$inspiration_section[] =
						'<ul>' .
							'<li>Reddit Anarchism Rules</li>' .
							'<li>Anti-Authoritarian Academic Code of Conduct</li>' .
							'<li>Geek Feminism Conference Anti-Harassment Policy</li>' .
							'<li>The Constitution of the Rojava Cantons : Modern, Anarchist Constitution (2014)</li>' .
							"<li>Workers' Solidarity Movement : WSM Code of Conduct</li>" .
							'<li>Industrial Workers of the World : Code of Ethics</li>' .
							'<li>The French Declaration of Rights of Man : Classical, Socialist Declaration (1789)</li>' .
							'<li>The Citizen Code of Conduct</li>' .
							'<li>The Contributor Covenant</li>' .
							'<li>The Tao Teh Ching, by Lao Tzu (400-600 BCE)</li>' .
						'</ul>';
					break;
					
				case 'es':
					$inspiration_section[] =
						'<h3><a name="inspiration"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiration for this Document</h3>';
					
					$inspiration_section[] =
						'<p>This document was inspired by a wide number of other materials, and I owe them all my gratitude! Thank you :</p>';
					
					$inspiration_section[] =
						'<ul>' .
							'<li>Reddit Anarchism Rules</li>' .
							'<li>Anti-Authoritarian Academic Code of Conduct</li>' .
							'<li>Geek Feminism Conference Anti-Harassment Policy</li>' .
							'<li>The Constitution of the Rojava Cantons : Modern, Anarchist Constitution (2014)</li>' .
							"<li>Workers' Solidarity Movement : WSM Code of Conduct</li>" .
							'<li>Industrial Workers of the World : Code of Ethics</li>' .
							'<li>The French Declaration of Rights of Man : Classical, Socialist Declaration (1789)</li>' .
							'<li>The Citizen Code of Conduct</li>' .
							'<li>The Contributor Covenant</li>' .
							'<li>The Tao Teh Ching, by Lao Tzu (400-600 BCE)</li>' .
						'</ul>';
					break;
					
				case 'fr':
					$inspiration_section[] =
						'<h3><a name="inspiration"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiration for this Document</h3>';
					
					$inspiration_section[] =
						'<p>This document was inspired by a wide number of other materials, and I owe them all my gratitude! Thank you :</p>';
					
					$inspiration_section[] =
						'<ul>' .
							'<li>Reddit Anarchism Rules</li>' .
							'<li>Anti-Authoritarian Academic Code of Conduct</li>' .
							'<li>Geek Feminism Conference Anti-Harassment Policy</li>' .
							'<li>The Constitution of the Rojava Cantons : Modern, Anarchist Constitution (2014)</li>' .
							"<li>Workers' Solidarity Movement : WSM Code of Conduct</li>" .
							'<li>Industrial Workers of the World : Code of Ethics</li>' .
							'<li>The French Declaration of Rights of Man : Classical, Socialist Declaration (1789)</li>' .
							'<li>The Citizen Code of Conduct</li>' .
							'<li>The Contributor Covenant</li>' .
							'<li>The Tao Teh Ching, by Lao Tzu (400-600 BCE)</li>' .
						'</ul>';
					break;
					
				case 'ja':
					$inspiration_section[] =
						'<h3><a name="inspiration"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiration for this Document</h3>';
					
					$inspiration_section[] =
						'<p>This document was inspired by a wide number of other materials, and I owe them all my gratitude! Thank you :</p>';
					
					$inspiration_section[] =
						'<ul>' .
							'<li>Reddit Anarchism Rules</li>' .
							'<li>Anti-Authoritarian Academic Code of Conduct</li>' .
							'<li>Geek Feminism Conference Anti-Harassment Policy</li>' .
							'<li>The Constitution of the Rojava Cantons : Modern, Anarchist Constitution (2014)</li>' .
							"<li>Workers' Solidarity Movement : WSM Code of Conduct</li>" .
							'<li>Industrial Workers of the World : Code of Ethics</li>' .
							'<li>The French Declaration of Rights of Man : Classical, Socialist Declaration (1789)</li>' .
							'<li>The Citizen Code of Conduct</li>' .
							'<li>The Contributor Covenant</li>' .
							'<li>The Tao Teh Ching, by Lao Tzu (400-600 BCE)</li>' .
						'</ul>';
					break;
					
				case 'it':
					$inspiration_section[] =
						'<h3><a name="inspiration"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiration for this Document</h3>';
					
					$inspiration_section[] =
						'<p>This document was inspired by a wide number of other materials, and I owe them all my gratitude! Thank you :</p>';
					
					$inspiration_section[] =
						'<ul>' .
							'<li>Reddit Anarchism Rules</li>' .
							'<li>Anti-Authoritarian Academic Code of Conduct</li>' .
							'<li>Geek Feminism Conference Anti-Harassment Policy</li>' .
							'<li>The Constitution of the Rojava Cantons : Modern, Anarchist Constitution (2014)</li>' .
							"<li>Workers' Solidarity Movement : WSM Code of Conduct</li>" .
							'<li>Industrial Workers of the World : Code of Ethics</li>' .
							'<li>The French Declaration of Rights of Man : Classical, Socialist Declaration (1789)</li>' .
							'<li>The Citizen Code of Conduct</li>' .
							'<li>The Contributor Covenant</li>' .
							'<li>The Tao Teh Ching, by Lao Tzu (400-600 BCE)</li>' .
						'</ul>';
					break;
					
				case 'nl':
					$inspiration_section[] =
						'<h3><a name="inspiration"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiration for this Document</h3>';
					
					$inspiration_section[] =
						'<p>This document was inspired by a wide number of other materials, and I owe them all my gratitude! Thank you :</p>';
					
					$inspiration_section[] =
						'<ul>' .
							'<li>Reddit Anarchism Rules</li>' .
							'<li>Anti-Authoritarian Academic Code of Conduct</li>' .
							'<li>Geek Feminism Conference Anti-Harassment Policy</li>' .
							'<li>The Constitution of the Rojava Cantons : Modern, Anarchist Constitution (2014)</li>' .
							"<li>Workers' Solidarity Movement : WSM Code of Conduct</li>" .
							'<li>Industrial Workers of the World : Code of Ethics</li>' .
							'<li>The French Declaration of Rights of Man : Classical, Socialist Declaration (1789)</li>' .
							'<li>The Citizen Code of Conduct</li>' .
							'<li>The Contributor Covenant</li>' .
							'<li>The Tao Teh Ching, by Lao Tzu (400-600 BCE)</li>' .
						'</ul>';
					break;
					
				case 'pl':
					$inspiration_section[] =
						'<h3><a name="inspiration"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiration for this Document</h3>';
					
					$inspiration_section[] =
						'<p>This document was inspired by a wide number of other materials, and I owe them all my gratitude! Thank you :</p>';
					
					$inspiration_section[] =
						'<ul>' .
							'<li>Reddit Anarchism Rules</li>' .
							'<li>Anti-Authoritarian Academic Code of Conduct</li>' .
							'<li>Geek Feminism Conference Anti-Harassment Policy</li>' .
							'<li>The Constitution of the Rojava Cantons : Modern, Anarchist Constitution (2014)</li>' .
							"<li>Workers' Solidarity Movement : WSM Code of Conduct</li>" .
							'<li>Industrial Workers of the World : Code of Ethics</li>' .
							'<li>The French Declaration of Rights of Man : Classical, Socialist Declaration (1789)</li>' .
							'<li>The Citizen Code of Conduct</li>' .
							'<li>The Contributor Covenant</li>' .
							'<li>The Tao Teh Ching, by Lao Tzu (400-600 BCE)</li>' .
						'</ul>';
					break;
					
				case 'pt':
					$inspiration_section[] =
						'<h3><a name="inspiration"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiration for this Document</h3>';
					
					$inspiration_section[] =
						'<p>This document was inspired by a wide number of other materials, and I owe them all my gratitude! Thank you :</p>';
					
					$inspiration_section[] =
						'<ul>' .
							'<li>Reddit Anarchism Rules</li>' .
							'<li>Anti-Authoritarian Academic Code of Conduct</li>' .
							'<li>Geek Feminism Conference Anti-Harassment Policy</li>' .
							'<li>The Constitution of the Rojava Cantons : Modern, Anarchist Constitution (2014)</li>' .
							"<li>Workers' Solidarity Movement : WSM Code of Conduct</li>" .
							'<li>Industrial Workers of the World : Code of Ethics</li>' .
							'<li>The French Declaration of Rights of Man : Classical, Socialist Declaration (1789)</li>' .
							'<li>The Citizen Code of Conduct</li>' .
							'<li>The Contributor Covenant</li>' .
							'<li>The Tao Teh Ching, by Lao Tzu (400-600 BCE)</li>' .
						'</ul>';
					break;
					
				case 'ru':
					$inspiration_section[] =
						'<h3><a name="inspiration"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiration for this Document</h3>';
					
					$inspiration_section[] =
						'<p>This document was inspired by a wide number of other materials, and I owe them all my gratitude! Thank you :</p>';
					
					$inspiration_section[] =
						'<ul>' .
							'<li>Reddit Anarchism Rules</li>' .
							'<li>Anti-Authoritarian Academic Code of Conduct</li>' .
							'<li>Geek Feminism Conference Anti-Harassment Policy</li>' .
							'<li>The Constitution of the Rojava Cantons : Modern, Anarchist Constitution (2014)</li>' .
							"<li>Workers' Solidarity Movement : WSM Code of Conduct</li>" .
							'<li>Industrial Workers of the World : Code of Ethics</li>' .
							'<li>The French Declaration of Rights of Man : Classical, Socialist Declaration (1789)</li>' .
							'<li>The Citizen Code of Conduct</li>' .
							'<li>The Contributor Covenant</li>' .
							'<li>The Tao Teh Ching, by Lao Tzu (400-600 BCE)</li>' .
						'</ul>';
					break;
					
				case 'tr':
					$inspiration_section[] =
						'<h3><a name="inspiration"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiration for this Document</h3>';
					
					$inspiration_section[] =
						'<p>This document was inspired by a wide number of other materials, and I owe them all my gratitude! Thank you :</p>';
					
					$inspiration_section[] =
						'<ul>' .
							'<li>Reddit Anarchism Rules</li>' .
							'<li>Anti-Authoritarian Academic Code of Conduct</li>' .
							'<li>Geek Feminism Conference Anti-Harassment Policy</li>' .
							'<li>The Constitution of the Rojava Cantons : Modern, Anarchist Constitution (2014)</li>' .
							"<li>Workers' Solidarity Movement : WSM Code of Conduct</li>" .
							'<li>Industrial Workers of the World : Code of Ethics</li>' .
							'<li>The French Declaration of Rights of Man : Classical, Socialist Declaration (1789)</li>' .
							'<li>The Citizen Code of Conduct</li>' .
							'<li>The Contributor Covenant</li>' .
							'<li>The Tao Teh Ching, by Lao Tzu (400-600 BCE)</li>' .
						'</ul>';
					break;
					
				case 'zh':
					$inspiration_section[] =
						'<h3><a name="inspiration"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiration for this Document</h3>';
					
					$inspiration_section[] =
						'<p>This document was inspired by a wide number of other materials, and I owe them all my gratitude! Thank you :</p>';
					
					$inspiration_section[] =
						'<ul>' .
							'<li>Reddit Anarchism Rules</li>' .
							'<li>Anti-Authoritarian Academic Code of Conduct</li>' .
							'<li>Geek Feminism Conference Anti-Harassment Policy</li>' .
							'<li>The Constitution of the Rojava Cantons : Modern, Anarchist Constitution (2014)</li>' .
							"<li>Workers' Solidarity Movement : WSM Code of Conduct</li>" .
							'<li>Industrial Workers of the World : Code of Ethics</li>' .
							'<li>The French Declaration of Rights of Man : Classical, Socialist Declaration (1789)</li>' .
							'<li>The Citizen Code of Conduct</li>' .
							'<li>The Contributor Covenant</li>' .
							'<li>The Tao Teh Ching, by Lao Tzu (400-600 BCE)</li>' .
						'</ul>';
					break;
			}
			
			return $inspiration_section;
		}
		
						// Helper Functions
						// ---------------------------------------------
		
		public function getSectionText($args) {
			$header_index = $args['headerindex'];
			
			$section_text = '';
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$section_text = 'Section ' . $header_index;
					break;
					
				case 'de':
					$section_text = 'Abschnitt ' . $header_index;
					break;
					
				case 'es':
					$section_text = 'Sección ' . $header_index;
					break;
				
				case 'fr':
					$section_text = 'Section ' . $header_index;
					break;
					
				case 'ja':
					$section_text = '第' . $header_index . '節';
					break;
					
				case 'it':
					$section_text = 'Sezione ' . $header_index;
					break;
					
				case 'nl':
					$section_text = 'Sectie ' . $header_index;
					break;
					
				case 'pl':
					$section_text = 'Sekcja ' . $header_index;
					break;
				
				case 'pt':
					$section_text = 'Seção ' . $header_index;
					break;
					
				case 'ru':
					$section_text = 'Секция ' . $header_index;
					break;
				
				case 'tr':
					$section_text = 'Bölüm ' . $header_index;
					break;
					
				case 'zh':
					$section_text = '第' . $header_index . '节';
					break;
			}
			
			if(	($this->script_format_lower != 'pdf')) {
				$section_text = ' ' . $section_text;
			}
			
			return $section_text;
		}
		
		public function getImageMarkup($args) {
			$image = $args['image'];
			
			if($this->mobile_friendly) {
				return '';
			}
			
			$base_directory = $this->getImageBaseDirectory();
			
			$markup =
				'<img src="' . $base_directory .
				$image['filename'] .
				'" title="Icon designed by ' .
				$image['creator'] . ', ' .
				$image['license'] . ' License, from ' .
				$image['source'] .
				'"height="50" width="50" class="border-2px"> '
			;
			$markup .= "\n";
			
			return $markup;
		}
		
		public function getImageIconMarkup($args) {
			$image = $args['image'];
			
			if($this->mobile_friendly || ($this->script_format_lower == 'pdf')) {
				return '';
			}
			
			$base_directory = $this->getImageBaseDirectory();
			
			$markup =
				'<img src="' . $base_directory .
				$image['filename'] .
				'" title="Icon designed by ' .
				$image['creator'] . ', ' .
				$image['license'] . ' License, from ' .
				$image['source'] .
				'"height="15" width="15" class="border-2px"> '
			;
			
			return $markup;
		}
		
		public function getImageBaseDirectory() {
			$base_directory = '/image/code-of-conduct/';
			
			if(	($this->script_format_lower == 'pdf') ||
				($this->script_format_lower == 'rtf')) {
				$base_directory = 'https://www.' . $this->domain_object->host . '.com' . $base_directory;
			}
			
			return $base_directory;
		}
	}
	
?>