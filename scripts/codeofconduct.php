<?php

	require('../traits/scripts/DBFunctions.php');
	require('../traits/scripts/CodeOfConductTrait.php');
	require('../traits/scripts/SimpleErrors.php');
	require('../traits/scripts/SimpleForms.php');
	require('../traits/scripts/SimpleLookupLists.php');
	require('../traits/scripts/SimpleORM.php');

	class codeofconduct extends basicscript {
						// Traits
						// ---------------------------------------------
		
		use DBFunctions;
		use CodeOfConductTrait;
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
			
			$this->FormatErrors();
			
			return TRUE;
		}
		
		public function getCodeOfConduct() {
			$code_of_conduct_paragraphs = $this->getCodeOfConductParagraphs();
			
			$code_of_conduct = implode("\n\n", $code_of_conduct_paragraphs);
			
			return $code_of_conduct;
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
							'<li>Acosar fotografiando o filmando,</li>' .
							'<li>Contacto físico inapropiado,</li>' .
							'<li>Imágenes sexualizadas inapropiadas,</li>' .
							'<li>Atención sexual no deseada,</li>' .
							'<li>Cualquier acción persistente y no deseada que implique el espacio personal de otro.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Intrusión no deseada en ambientes públicos o privados:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam y comercialismo,</li>' .
							'<li>Interrupciones basadas en material no relacionado o que distrae.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Dominación política, social o económica, como amenazar o revelar sin consentimiento la información personal de otra persona a lo siguiente:</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Un empleador o posible empleador.</li>' .
							'<li>Un gobierno, una agencia autorizada por el gobierno, o un agente u oficial de policía autorizado por el gobierno.</li>' .
							'<li>Cualquier organización de censura, como instituciones religiosas, sociales, culturales, económicas o políticas, como familiares, amigos, iglesias, periódicos, editoriales, estaciones de radio, etc.</li>' .
							'<li>Cualquier tercero sin su consentimiento directo.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>El autoritarismo, o la propagación del comportamiento diseñado para anular los estándares descritos hasta ahora, como los intentos de avanzar, apoyar o ayudar a cualquiera de los siguientes:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sexismo,' .
							'Racismo,' .
							'Supremacía blanca (o cualquier supremacía étnica),' .
							'Homofobia (o cualquier fobia a la sexualidad),' .
							'Fascismo,' .
							'Genocidio,' .
							'Fobia a las drogas,' .
							'Insultos étnicos, de género, de sexualidad, de capacidad, etc., basados en' .
							'Toma de juramento o compromiso.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Abogar o alentar cualquiera de los anteriores.</h3>';
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
							'<li>Sexe ou identité de genre,</li>' .
							'<li>Ethnicité,</li>' .
							'<li>Statut d\'immigrant,</li>' .
							'<li>Religion,</li>' .
							'<li>Sexualité,</li>' .
							'<li>Langue,</li>' .
							'<li>Apparence physique ou taille corporelle,</li>' .
							'<li>Opinion politique,</li>' .
							'<li>Substance ou usage médicinal,</li>' .
							'<li>Invalidité,</li>' .
							'<li>Âge,</li>' .
							'<li>Acceptation de tout groupe défavorable ou défavorable, que ce groupe soit politique, économique, social ou culturel.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Harcèlement:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Abus de tout type,</li>' .
							'<li>Intimidation, traque, intimide, suit,</li>' .
							'<li>Harcèlement photographier ou filmer,</li>' .
							'<li>Contact physique inapproprié,</li>' .
							'<li>Imagerie sexualisée inappropriée,</li>' .
							'<li>Attention sexuelle importune,</li>' .
							'<li>Toute action persistante et indésirable impliquant l\'espace personnel d\'un autre.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Intrusion indésirable dans des atmosphères publiques ou privées:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam et commercialisme,</li>' .
							'<li>Interruptions basées sur des éléments non liés ou distrayants.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Domination politique, sociale ou économique, telle que la menace ou la divulgation non consensuelle des informations personnelles d'autrui aux personnes suivantes:</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Un employeur ou un employeur potentiel.</li>' .
							'<li>Un gouvernement, une agence habilitée par le gouvernement ou un agent ou un officier de police habilité par le gouvernement.</li>' .
							'<li>Toute organisation de censure, telle que les institutions religieuses, sociales, culturelles, économiques ou politiques, telles que la famille, les amis, les églises, les journaux, les éditeurs, les stations de radio, etc.</li>' .
							'<li>Tout tiers sans son consentement direct.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>L\'autoritarisme, ou la propagation d\'un comportement conçu pour renverser les normes décrites jusqu\'à présent, telles que les tentatives d\'avancer, de soutenir ou d\'aider l\'un des éléments suivants:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sexisme,' .
							'Racisme,' .
							'Suprématie blanche (ou toute suprématie ethnique),' .
							'Homophobie (ou toute phobie sexuelle),' .
							'Fascisme,' .
							'Génocide,' .
							'Phobie médicamenteuse,' .
							'Ethnique, genre, sexualité, capacitante, etc., insultes à base,' .
							'Serment ou serment.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Préconiser ou encourager l\'un des éléments ci-dessus.</h3>';
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
							'<li>性別または性同一性、</li>' .
							'<li>人種、</li>' .
							'<li>移民ステータス、</li>' .
							'<li>宗教、</li>' .
							'<li>セクシュアリティ、</li>' .
							'<li>言語、</li>' .
							'<li>身体的外観または体の大きさ、</li>' .
							'<li>政治的意見、</li>' .
							'<li>物質または医薬品の使用、</li>' .
							'<li>障害、</li>' .
							'<li>年齢、</li>' .
							'<li>このグループが政治的、経済的、社会的、または文化的であるかどうかにかかわらず、不利なまたは不利なグループの受け入れ。</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>嫌がらせ：</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>あらゆるタイプの虐待、</li>' .
							'<li>いじめ、ストーカー行為、脅迫、フォロー、</li>' .
							'<li>嫌がらせの写真撮影や撮影、</li>' .
							'<li>不適切な物理的接触、</li>' .
							'<li>不適切な性的な画像、</li>' .
							'<li>望ましくない性的注意、</li>' .
							'<li>他者の個人的なスペースを含む、持続的で望ましくないアクション。</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>公共または私的な雰囲気での望ましくない侵入：</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>スパムと商業主義、</li>' .
							'<li>無関係または気を散らすものに基づいた中断。</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>政治的、社会的、または経済的支配。脅迫したり、他人の個人情報を次のように同意せずに明らかにするなど。</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>雇用主または潜在的な雇用主。</li>' .
							'<li>政府、政府によって権限を与えられた機関、または政府によって権限を与えられたエージェントまたは警察官。
</li>' .
							'<li>家族、友人、教会、新聞、出版社、ラジオ局などの宗教的、社会的、文化的、経済的、または政治的機関などの検閲機関。</li>' .
							'<li>直接の同意がない第三者。</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>独裁主義、またはこれまでに説明した基準を覆すように設計された行動の広がり、例えば、次のいずれかを前進、支援、または支援する試み：</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'性差別、' .
							'人種差別、' .
							'ホワイトスプレマシー（または任意の民族的優位）、' .
							'ホモフォビア（または性的恐怖症）、' .
							'ファシズム、' .
							'ジェノサイド、' .
							'薬物恐怖症、' .
							'民族、性別、セクシュアリティ、有能主義者など、スラー、' .
							'宣誓または誓約の取得。' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>上記のいずれかを支持または奨励する。</h3>';
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
							'<li>Genere o identità di genere,</li>' .
							'<li>Etnia,</li>' .
							'<li>Stato di immigrato,</li>' .
							'<li>Religione,</li>' .
							'<li>Sessualità,</li>' .
							'<li>Linguaggio,</li>' .
							'<li>Aspetto fisico o dimensione corporea,</li>' .
							'<li>Opinione politica,</li>' .
							'<li>Sostanza o uso medicinale,</li>' .
							'<li>Disabilità,</li>' .
							'<li>Età,</li>' .
							'<li>Accettazione di qualsiasi gruppo sfavorevole o sfavorevole, sia esso politico, economico, sociale o culturale.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Molestie:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Abuso di qualsiasi tipo,</li>' .
							'<li>Bullismo, stalking, intimidazione, seguendo,</li>' .
							'<li>Molestare fotografando o filmando,</li>' .
							'<li>Contatto fisico inappropriato,</li>' .
							'<li>Immagini sessualizzate inadeguate,</li>' .
							'<li>Attenzione sessuale indesiderata,</li>' .
							'<li>Qualsiasi azione persistente e indesiderata che coinvolge lo spazio personale di un altro.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Intrusione indesiderata in atmosfere pubbliche o private:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam e commercialismo,</li>' .
							'<li>Interruzioni basate su materiale non correlato o che distrae.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Dominazione politica, sociale o economica, come minacciando o rivelando in modo non consensuale le informazioni personali di un altro a quanto segue:</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Un datore di lavoro o potenziale datore di lavoro.</li>' .
							'<li>Un governo, un\'agenzia abilitata dal governo o un agente o un ufficiale di polizia autorizzato dal governo.</li>' .
							'<li>Qualsiasi organizzazione di censura, come istituzioni religiose, sociali, culturali, economiche o politiche, come famiglia, amici, chiese, giornali, editori, stazioni radio, ecc.</li>' .
							'<li>Qualsiasi terza parte senza il suo consenso diretto.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>L\'autoritarismo o la diffusione di comportamenti progettati per rovesciare gli standard descritti finora, come i tentativi di avanzare, sostenere o aiutare uno dei seguenti:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sessismo,' .
							'Razzismo,' .
							'Supremazia bianca (o qualsiasi supremazia etnica),' .
							'Omofobia (o qualsiasi fobia della sessualità),' .
							'Fascismo,' .
							'Genocidio,' .
							'Drug-fobia,' .
							'Insulti etnici, di genere, di sessualità, di aiuto, ecc.,' .
							'Giuramento o impegno.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Sostenere o incoraggiare quanto sopra.</h3>';
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
							'<li>Geslacht of geslachtsidentiteit,</li>' .
							'<li>Etniciteit,</li>' .
							'<li>Immigrantenstatus,</li>' .
							'<li>Religie,</li>' .
							'<li>Seksualiteit,</li>' .
							'<li>Taal,</li>' .
							'<li>Fysiek uiterlijk of lichaamsgrootte,</li>' .
							'<li>Politieke mening,</li>' .
							'<li>Stof of medicinaal gebruik,</li>' .
							'<li>Onbekwaamheid,</li>' .
							'<li>Leeftijd,</li>' .
							'<li>Acceptatie van een ongunstige of ongunstige groep, of deze groep nu politiek, economisch, sociaal of cultureel is.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Intimidatie :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Misbruik van welke aard dan ook,</li>' .
							'<li>Pesten, stalken, intimideren, volgen,</li>' .
							'<li>Lastig fotograferen of filmen,</li>' .
							'<li>Ongepast fysiek contact,</li>' .
							'<li>Ongepaste geseksualiseerde afbeeldingen,</li>' .
							'<li>Ongewenste seksuele aandacht,</li>' .
							'<li>Elke aanhoudende en ongewenste actie met betrekking tot de persoonlijke ruimte van een ander.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Ongewenste inbraak in openbare of privé-omgevingen:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam en commercie,</li>' .
							'<li>Onderbrekingen op basis van niet-gerelateerd of afleidend materiaal.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Politieke, sociale of economische dominantie, zoals het dreigen met of niet-consensueel onthullen van andermans persoonlijke informatie aan het volgende:</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Een werkgever of potentiële werkgever.</li>' .
							'<li>Een overheid, een agentschap dat door de overheid is gemachtigd, of een agent of politieagent die door de overheid is gemachtigd.</li>' .
							'<li>Elke censurerende organisatie, zoals religieuze, sociale, culturele, economische of politieke instellingen, zoals familie, vrienden, kerken, kranten, uitgevers, radiostations, enz.</li>' .
							'<li>Elke derde zonder hun directe toestemming.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Autoritarisme, of de verspreiding van gedrag dat is ontworpen om de tot nu toe beschreven normen teniet te doen, zoals pogingen om een van de volgende zaken te bevorderen, ondersteunen of ondersteunen:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Seksisme,' .
							'Racisme,' .
							'Witte suprematie (of enige etnische suprematie),' .
							'Homofobie (of een seksualiteit-fobie),' .
							'Fascisme,' .
							'Genocide,' .
							'Drug-fobie,' .
							'Etnische, geslacht, seksualiteit, bekwaamheid, etc., op basis van leugens,' .
							'Eedaflegging of eedaflegging.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Het bovenstaande bepleiten of aanmoedigen.</h3>';
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
							'<li>Płeć lub tożsamość płciowa,</li>' .
							'<li>Pochodzenie etniczne,</li>' .
							'<li>Status imigranta,</li>' .
							'<li>Religia,</li>' .
							'<li>Seksualność,</li>' .
							'<li>Język,</li>' .
							'<li>Wygląd fizyczny lub wielkość ciała,</li>' .
							'<li>Opinia polityczna,</li>' .
							'<li>Zastosowanie substancji lub substancji leczniczych,</li>' .
							'<li>Inwalidztwo,</li>' .
							'<li>Wiek,</li>' .
							'<li>Akceptacja każdej niekorzystnej lub niekorzystnej grupy, niezależnie od tego, czy jest to grupa polityczna, gospodarcza, społeczna lub kulturowa.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Molestowanie:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Nadużycie dowolnego rodzaju,</li>' .
							'<li>Zastraszanie, prześladowanie, zastraszanie, śledzenie,</li>' .
							'<li>Nękanie fotografowania lub filmowania,</li>' .
							'<li>Niewłaściwy kontakt fizyczny,</li>' .
							'<li>Niewłaściwe zseksualizowane obrazy,</li>' .
							'<li>Niepożądana uwaga seksualna,</li>' .
							'<li>Wszelkie uporczywe i niepożądane działania obejmujące przestrzeń osobistą innej osoby.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Niepożądane wtargnięcie w atmosferę publiczną lub prywatną:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam i komercja,</li>' .
							'<li>Przerwy na podstawie niepowiązanych lub rozpraszających materiałów.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Dominacja polityczna, społeczna lub ekonomiczna, taka jak grożenie lub niejawne ujawnienie danych osobowych innej osoby:</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Pracodawca lub potencjalny pracodawca.</li>' .
							'<li>Rząd, agencja upoważniona przez rząd lub agent lub policjant upoważniony przez rząd.</li>' .
							'<li>Każda organizacja cenzurująca, taka jak instytucje religijne, społeczne, kulturalne, gospodarcze lub polityczne, takie jak rodzina, przyjaciele, kościoły, gazety, wydawcy, stacje radiowe itp.</li>' .
							'<li>Każda osoba trzecia bez ich bezpośredniej zgody.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Autorytaryzm lub rozprzestrzenianie się zachowań, które mają na celu obalenie opisanych dotychczas standardów, takich jak próby awansu, wsparcia lub pomocy któregokolwiek z poniższych:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Seksizm,' .
							'Rasizm,' .
							'Biała supremacja (lub jakakolwiek etniczna supremacja),' .
							'Homofobia (lub jakakolwiek fobia seksualna),' .
							'Faszyzm,' .
							'Ludobójstwo,' .
							'Fobia narkotykowa,' .
							'Slogany etniczne, płciowe, seksualne, zdolne itp.,' .
							'Przysięga lub składanie przyrzeczeń.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Propagowanie lub zachęcanie do któregokolwiek z powyższych.</h3>';
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
							'<li>Gênero ou identidade de gênero,</li>' .
							'<li>Etnia,</li>' .
							'<li>Estatuto de imigrante,</li>' .
							'<li>Religião,</li>' .
							'<li>Sexualidade,</li>' .
							'<li>Língua,</li>' .
							'<li>Aparência física ou tamanho do corpo,</li>' .
							'<li>Opinião política,</li>' .
							'<li>Substância ou uso medicinal,</li>' .
							'<li>Incapacidade,</li>' .
							'<li>Era,</li>' .
							'<li>Aceitação de qualquer grupo desfavorável ou desfavorável, seja ele político, econômico, social ou cultural.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Assédio :</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Abuso de qualquer tipo,</li>' .
							'<li>Bullying, perseguição, intimidação, seguimento,</li>' .
							'<li>Assediando fotografar ou filmar,</li>' .
							'<li>Contato físico inadequado,</li>' .
							'<li>Imagens sexualizadas inadequadas,</li>' .
							'<li>Atenção sexual indesejada,</li>' .
							'<li>Qualquer ação persistente e indesejada envolvendo o espaço pessoal de outro.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Intrusão indesejada em atmosferas públicas ou privadas:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam e comercialismo,</li>' .
							'<li>Interrupções baseadas em material não relacionado ou que distrai.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Dominação política, social ou econômica, como ameaçar ou revelar não consensualmente as informações pessoais de outras pessoas para o seguinte:</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Um empregador ou potencial empregador.</li>' .
							'<li>Um governo, uma agência habilitada pelo governo ou um agente ou policial habilitado pelo governo.</li>' .
							'<li>Qualquer organização de censura, como instituições religiosas, sociais, culturais, econômicas ou políticas, como família, amigos, igrejas, jornais, editores, estações de rádio etc.</li>' .
							'<li>Qualquer terceiro sem o seu consentimento direto.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>O autoritarismo ou a disseminação de comportamentos projetados para anular os padrões descritos até o momento, como tentativas de avançar, apoiar ou ajudar qualquer um dos seguintes:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Sexismo,' .
							'Racismo,' .
							'Supremacia Branca (ou qualquer supremacia étnica),' .
							'Homofobia (ou qualquer fobia da sexualidade),' .
							'Fascismo,' .
							'Genocídio,' .
							'Fobia de drogas,' .
							'Insultos étnicos, de gênero, sexualidade, capazes, etc., baseados em' .
							'Juramento ou promessa.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Defendendo ou incentivando qualquer uma das opções acima.</h3>';
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
							'<li>Пол или гендерная идентичность,</li>' .
							'<li>Этничность,</li>' .
							'<li>Статус иммигранта,</li>' .
							'<li>Религия,</li>' .
							'<li>Сексуальность,</li>' .
							'<li>Язык,</li>' .
							'<li>Внешность или размер тела,</li>' .
							'<li>Политическое мнение,</li>' .
							'<li>Вещество или лекарственное использование,</li>' .
							'<li>Инвалидность,</li>' .
							'<li>Возраст,</li>' .
							'<li>Принятие любой неблагоприятной или неблагоприятной группы, будь то политическая, экономическая, социальная или культурная группа.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Домогательство:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Злоупотребление любого типа,</li>' .
							'<li>Запугивание, преследование, запугивание, следование,</li>' .
							'<li>Изводить фотографирование или съемку,</li>' .
							'<li>Неподходящий физический контакт,</li>' .
							'<li>Неуместные сексуализированные образы,</li>' .
							'<li>Нежелательное сексуальное внимание,</li>' .
							'<li>Любые настойчивые и нежелательные действия, затрагивающие личное пространство другого.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Нежелательное вторжение в общественную или частную атмосферу:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Спам и коммерциализация,</li>' .
							'<li>Прерывания на основе несвязанного или отвлекающего материала.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Политическое, социальное или экономическое доминирование, такое как угроза или непреднамеренное раскрытие личной информации другого лица следующим лицам:</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Работодатель или потенциальный работодатель.</li>' .
							'<li>Правительство, агентство, уполномоченное правительством, или агент или сотрудник полиции, уполномоченный правительством.</li>' .
							'<li>Любая организация порицания, такая как религиозные, социальные, культурные, экономические или политические институты, такие как семья, друзья, церкви, газеты, издатели, радиостанции и т. Д.</li>' .
							'<li>Любая третья сторона без их прямого согласия.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Авторитаризм или распространение поведения, направленного на отмену описанных стандартов, таких как попытки продвинуть, поддержать или помочь любому из следующего:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'Сексизм,' .
							'Расизм,' .
							'Белое превосходство (или любое этническое превосходство),' .
							'Гомофобия (или любая сексуальная фобия),' .
							'Фашизм,' .
							'Геноцид,' .
							'Drug-фобии,' .
							'Этнические, гендерные, сексуальные, способные и т. Д., Основанные на пятнах,' .
							'Присяга или принятие клятвы.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Защита или поощрение любого из вышеперечисленного.</h3>';
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
							'<li>Cinsiyet veya Cinsiyet Kimliği,</li>' .
							'<li>Etnik köken,</li>' .
							'<li>Göçmen statüsü,</li>' .
							'<li>Din,</li>' .
							'<li>Cinsellik,</li>' .
							'<li>Dil,</li>' .
							'<li>Fiziksel görünüm veya vücut büyüklüğü,</li>' .
							'<li>Politik düşünce,</li>' .
							'<li>Madde veya tıbbi kullanım,</li>' .
							'<li>Engellilik,</li>' .
							'<li>Yaş,</li>' .
							'<li>Bu grubun politik, ekonomik, sosyal veya kültürel olsun, olumsuz veya olumsuz bir grubun kabulü.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Taciz:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Her türlü istismar,</li>' .
							'<li>Zorbalık, takip, gözdağı verme, takip etme,</li>' .
							'<li>Fotoğraf çekmek veya filme çekmek,</li>' .
							'<li>Uygunsuz fiziksel temas,</li>' .
							'<li>Uygunsuz cinselleştirilmiş görüntüler,</li>' .
							'<li>Hoş olmayan cinsel ilgi,</li>' .
							'<li>Bir başkasının kişisel alanını içeren kalıcı ve istenmeyen eylemler.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Kamusal veya özel ortamlarda istenmeyen saldırı:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Spam ve reklamcılık,</li>' .
							'<li>İlgisiz veya dikkat dağıtıcı malzemeye dayalı kesintiler.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>Siyasi, sosyal veya ekonomik tahakküm, örneğin başkalarının kişisel bilgilerini aşağıdakilerle tehdit etmek veya rıza dışı olarak açıklamak:</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>Bir işveren veya potansiyel işveren.</li>' .
							'<li>Bir hükümet, hükümet tarafından yetkilendirilmiş bir kurum veya hükümet tarafından yetkilendirilmiş bir ajan veya polis memuru.</li>' .
							'<li>Aile, arkadaşlar, kiliseler, gazeteler, yayıncılar, radyo istasyonları gibi dini, sosyal, kültürel, ekonomik veya politik kurumlar gibi herhangi bir sansür organizasyonu.</li>' .
							'<li>Doğrudan rızası olmayan herhangi bir üçüncü taraf.</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Otoriterlik ya da aşağıdakilerden herhangi birini ilerletme, destekleme ya da bunlara yardımcı olma girişimleri gibi şimdiye kadar açıklanan standartları tersine çevirmek için tasarlanmış davranışların yayılması:</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'cinsiyetçilik,' .
							'Irkçılık,' .
							'Beyaz Üstünlük (veya herhangi bir etnik üstünlük),' .
							'Homofobi (veya herhangi bir cinsellik fobisi),' .
							'Faşizm,' .
							'Soykırım,' .
							'İlaç-fobi,' .
							'Etnik-, cinsiyet-, cinsellik-, yetenekli-, vb.' .
							'Yemin etme veya rehin alma.' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>Yukarıdakilerin herhangi birini savunmak veya teşvik etmek.</h3>';
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
							'<li>性别或性别认同，</li>' .
							'<li>种族，</li>' .
							'<li>移民身份，</li>' .
							'<li>宗教，</li>' .
							'<li>性欲，</li>' .
							'<li>语言，</li>' .
							'<li>外观或体型，</li>' .
							'<li>政治见解，</li>' .
							'<li>物质或药物用途，</li>' .
							'<li>失能，</li>' .
							'<li>年龄，</li>' .
							'<li>接受任何不利或不利的群体，无论该群体是政治，经济，社会还是文化的。</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>骚扰：</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>滥用任何形式，</li>' .
							'<li>欺凌，跟踪，恐吓，关注，</li>' .
							'<li>骚扰摄影或摄制，</li>' .
							'<li>身体接触不当，</li>' .
							'<li>不适当的色情图片，</li>' .
							'<li>不受欢迎的性关注，</li>' .
							'<li>任何涉及他人个人空间的持续性和不希望有的行为。</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>有害侵入公共或私人场合：</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>垃圾邮件和商业主义，</li>' .
							'<li>基于无关或分散注意力的材料的中断。</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						"<h3>政治，社会或经济上的统治，例如威胁或以非自愿方式将他人的个人信息泄露给以下人员：</h3>";
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'<li>雇主或潜在雇主。</li>' .
							'<li>政府，政府授权的代理机构或政府授权的代理人或警务人员。</li>' .
							'<li>任何检查组织，例如宗教，社会，文化，经济或政治机构，例如家庭，朋友，教堂，报纸，出版商，广播电台等。</li>' .
							'<li>未经他们直接同意的任何第三方。</li>' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>威权主义或旨在推翻目前为止描述的标准的行为传播，例如试图推进，支持或帮助以下任何一项：</h3>';
					
					$what_is_unacceptable_section[] =
						'<ul>' .
							'性别歧视' .
							'种族主义，' .
							'白色至上（或任何种族至上），' .
							'恐同症（或任何性恐惧症），' .
							'法西斯主义' .
							'种族灭绝' .
							'恐惧症' .
							'基于种族，性别，性别，能力等的诽谤，' .
							'宣誓或承诺。' .
						'</ul>';
					
					$what_is_unacceptable_section[] =
						'<h3>提倡或鼓励上述任何一种。</h3>';
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
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Was ist nicht rechenschaftspflichtig</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>Wir sind eine Gemeinschaftsorganisation. Wenn Ihre Beschwerde schwerwiegend genug ist, müssen Sie sie möglicherweise über das in dieser Vereinbarung vorgesehene Maß hinaus erheben. Sie sind dazu ermächtigt und ermutigt, wenn Sie der Meinung sind, dass Ihre Beschwerde nicht zufriedenstellend beantwortet werden kann.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>Sie dürfen dieses Dokument nicht als Grund anführen, wenn:</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Verabschiedung oder Aufhebung von Regierungsgesetzen,</li>' .
							'<li>Arbeitnehmer einstellen oder entlassen,</li>' .
							'<li>Weigerung, bei der Untersuchung einer legitimen Nichtregierungsorganisation für Menschenrechte mitzuwirken.</li>' .
						'</ul>';
					break;
					
				case 'es':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Lo que es inexplicable</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>Somos una organización comunitaria. Si su queja es lo suficientemente grave, es posible que deba elevarla más allá de lo que establece este acuerdo. Usted está autorizado y se le recomienda que lo haga si no cree que su queja se pueda satisfacer con satisfacción.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>No puede citar este documento como razón, cuando:</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Aprobar o derogar leyes gubernamentales,</li>' .
							'<li>Contratar o despedir trabajadores,</li>' .
							'<li>Negarse a cooperar con la investigación de una organización no gubernamental legítima de derechos humanos.</li>' .
						'</ul>';
					break;
					
				case 'fr':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Ce qui est inexplicable</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>Nous sommes un organisme communautaire. Si votre plainte est suffisamment grave, vous devrez peut-être la porter au-delà de ce que cet accord prévoit. Vous y êtes autorisé et encouragé si vous ne pensez pas que votre réclamation puisse être satisfaite.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>Vous ne pouvez pas citer ce document comme raison, lorsque:</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Adopter ou abroger des lois gouvernementales,</li>' .
							'<li>Embaucher ou licencier des travailleurs,</li>' .
							'<li>Refus de coopérer à l\'enquête sur une organisation non gouvernementale légitime des droits de l\'homme.</li>' .
						'</ul>';
					break;
					
				case 'ja':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 説明不能とは何ですか</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>私たちは1つのコミュニティ組織です。 苦情がひどい場合は、この契約で定められている以上に苦情を上げる必要があるかもしれません。 苦情が満足できるとは思わない場合は、これを許可され、奨励されます。</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>次の場合、このドキュメントを理由として引用することはできません:</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>政府法の可決または廃止、</li>' .
							'<li>労働者の雇用または解雇、</li>' .
							'<li>合法的な人権非政府組織の調査への協力を拒否。</li>' .
						'</ul>';
					break;
					
				case 'it':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Cosa non è responsabile</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>Siamo un\'organizzazione comunitaria. Se il reclamo è abbastanza grave, potrebbe essere necessario elevarlo oltre quanto previsto dal presente accordo. Sei autorizzato e incoraggiato a farlo se non ritieni che il tuo reclamo possa essere soddisfatto con soddisfazione.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>Non puoi citare questo documento come motivo, quando:</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Approvazione o abrogazione di leggi governative,</li>' .
							'<li>Assumere o licenziare lavoratori,</li>' .
							'<li>Rifiuto di collaborare alle indagini su un\'organizzazione legittima, diritti umani, non governativa.</li>' .
						'</ul>';
					break;
					
				case 'nl':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Wat is onverantwoordelijk</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>Wij zijn een gemeenschapsorganisatie. Als uw klacht ernstig genoeg is, moet u deze mogelijk verder brengen dan wat in deze overeenkomst is bepaald. U bent hiertoe geautoriseerd en aangemoedigd als u denkt dat uw klacht niet met tevredenheid kan worden behandeld.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>U mag dit document niet als reden aanhalen wanneer:</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Overname of intrekking van overheidswetten,</li>' .
							'<li>Werknemers aannemen of ontslaan,</li>' .
							'<li>Weigering om mee te werken aan het onderzoek van een legitieme, mensenrechtenorganisatie, niet-gouvernementele organisatie.</li>' .
						'</ul>';
					break;
					
				case 'pl':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Co jest nieobliczalne</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>Jesteśmy jedną organizacją społeczną. Jeśli twoja skarga jest wystarczająco poważna, być może będziesz musiał ją podnieść ponad to, co przewiduje niniejsza umowa. Jesteś do tego upoważniony i zachęcany, jeśli uważasz, że skarga nie zostanie spełniona.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>Nie możesz cytować tego dokumentu jako powodu, gdy:</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Uchwalanie lub uchylanie przepisów rządowych,</li>' .
							'<li>Zatrudnianie lub zwalnianie pracowników,</li>' .
							'<li>Odmowa współpracy przy dochodzeniu w sprawie legalnej Organizacji Pozarządowej ds. Praw Człowieka.</li>' .
						'</ul>';
					break;
					
				case 'pt':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : O que é inexplicável</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>Somos uma organização comunitária. Se a sua reclamação for grave o suficiente, talvez seja necessário elevá-la além do que este contrato prevê. Você está autorizado e incentivado a isso se não acredita que sua reclamação possa ser satisfeita.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>Você não pode citar este documento como motivo, quando:</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Aprovar ou revogar leis governamentais,</li>' .
							'<li>Contratação ou alta de trabalhadores,</li>' .
							'<li>Recusar-se a cooperar com a investigação de uma organização não governamental legítima de direitos humanos.</li>' .
						'</ul>';
					break;
					
				case 'ru':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Что не подлежит ответственности</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>Мы одна общественная организация. Если ваша жалоба является достаточно серьезной, вам, возможно, придется поднять ее сверх того, что предусмотрено настоящим соглашением. Вы имеете на это право и поощряетесь, если не считаете, что ваша жалоба может быть удовлетворена.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>Вы не можете ссылаться на этот документ в качестве причины, когда:</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Принятие или отмена государственных законов,</li>' .
							'<li>Найм или увольнение работников,</li>' .
							'<li>Отказ от сотрудничества с расследованием законной неправительственной организации по правам человека.</li>' .
						'</ul>';
					break;
					
				case 'tr':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Sorumsuz nedir</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>Biz bir toplum örgütüyüz. Şikayetiniz yeterince ağırsa, bu anlaşmanın öngördüğünden daha ileriye götürmeniz gerekebilir. Şikayetinizin memnuniyetle karşılanabileceğini düşünmüyorsanız, buna yetkili ve teşvik edilirsiniz.</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>Bu belgeyi aşağıdaki durumlarda gerekçeli olarak gösteremezsiniz:</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>Devlet yasalarını kabul etmek veya yürürlükten kaldırmak,</li>' .
							'<li>Çalışanların işe alınması veya işten çıkarılması,</li>' .
							'<li>Meşru bir İnsan Hakları, Hükümet Dışı Örgüt\'ün soruşturmasıyla işbirliği yapmayı reddetmek.</li>' .
						'</ul>';
					break;
					
				case 'zh':
					$what_is_unaccountable_section[] =
						'<h3><a name="what-is-unaccountable"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 什么是不负责任的</h3>';
					
					$what_is_unaccountable_section[] =
						'<p>我们是一个社区组织。 如果您的投诉足够严重，您可能需要将其提升为超出本协议规定的范围。 如果您认为自己的投诉不能令人满意，就可以授权并鼓励您这样做。</p>';
					
					$what_is_unaccountable_section[] =
						'<h3>在以下情况下，您可能不会引用此文档作为理由：</h3>';
					
					$what_is_unaccountable_section[] =
						'<ul>' .
							'<li>通过或废除政府法律，</li>' .
							'<li>雇用或解雇工人，</li>' .
							'<li>拒绝配合合法的人权非政府组织的调查。</li>' .
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
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Wie wir Community-Standards durchsetzen</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>Wenn Sie Zeuge eines Verstoßes gegen diesen Verhaltenskodex werden oder einen solchen feststellen, werden Sie aufgefordert, sich unverzüglich an offizielle Organisatoren innerhalb der Community zu wenden.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>Als Reaktion auf Verstöße gegen inakzeptables Verhalten können wir dem Täter wie folgt antworten:</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Warnung,</li>' .
							'<li>Vorübergehendes Verbot,</li>' .
							'<li>Dauerausweisung.</li>' .
						'</ul>';
					break;
					
				case 'es':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Cómo hacemos cumplir los estándares de la comunidad</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>Si es testigo o experimenta alguna violación de este Código de Conducta, se le insta a comunicarse de inmediato con los organizadores oficiales dentro de la comunidad.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>En respuesta a violaciones de comportamiento inaceptable, podemos responder al infractor de la siguiente manera:</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Advertencia,</li>' .
							'<li>Prohibición temporal,</li>' .
							'<li>Expulsión permanente.</li>' .
						'</ul>';
					break;
					
				case 'fr':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Comment nous appliquons les normes communautaires</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>Si vous êtes témoin ou rencontrez une violation de ce code de conduite, vous êtes invité à contacter immédiatement les organisateurs officiels au sein de la communauté.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>En réponse à des violations de comportement inacceptable, nous pouvons répondre au délinquant comme suit:</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Avertissement,</li>' .
							'<li>Interdiction temporaire,</li>' .
							'<li>Expulsion permanente.</li>' .
						'</ul>';
					break;
					
				case 'ja':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : コミュニティ基準の実施方法</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>この行動規範の違反を目撃または経験した場合は、コミュニティ内の公式主催者にすぐに連絡することをお勧めします。</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>容認できない行動の違反に応じて、次のように違反者に対応する場合があります。</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>警告、</li>' .
							'<li>一時的な禁止、</li>' .
							'<li>永久追放。</li>' .
						'</ul>';
					break;
					
				case 'it':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Come applichiamo gli standard comunitari</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>Se sei testimone o subisci una violazione del presente Codice di condotta, sei invitato a contattare immediatamente gli organizzatori ufficiali all\'interno della comunità.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>In risposta a violazioni di comportamenti inaccettabili, potremmo rispondere all\'autore del reato come segue:</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Avvertimento,</li>' .
							'<li>Divieto temporaneo,</li>' .
							'<li>Espulsione permanente.</li>' .
						'</ul>';
					break;
					
				case 'nl':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Hoe we communautaire normen afdwingen</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>Als u getuige bent van of enige overtreding van deze Gedragscode ervaart, wordt u dringend verzocht om onmiddellijk contact op te nemen met officiële organisatoren binnen de gemeenschap.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>Als reactie op schendingen van onaanvaardbaar gedrag kunnen we als volgt reageren op de dader:</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Waarschuwing,</li>' .
							'<li>Tijdelijk verbod</li>' .
							'<li>Permanente verwijdering.</li>' .
						'</ul>';
					break;
					
				case 'pl':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Jak egzekwujemy standardy wspólnotowe</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>Jeśli jesteś świadkiem lub doświadczyłeś naruszenia niniejszego Kodeksu postępowania, zachęcamy Cię do niezwłocznego skontaktowania się z oficjalnymi organizatorami w społeczności.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>W odpowiedzi na naruszenia niedopuszczalnego zachowania możemy odpowiedzieć sprawcy w następujący sposób:</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Ostrzeżenie,</li>' .
							'<li>Tymczasowy zakaz,</li>' .
							'<li>Trwałe wydalenie.</li>' .
						'</ul>';
					break;
					
				case 'pt':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Como aplicamos os padrões da comunidade</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>Se você testemunhar ou sofrer alguma violação deste Código de Conduta, deverá entrar em contato imediatamente com os organizadores oficiais da comunidade.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>Em resposta a violações de comportamento inaceitável, podemos responder ao ofensor da seguinte maneira:</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Atenção,</li>' .
							'<li>Proibição temporária,</li>' .
							'<li>Expulsão permanente.</li>' .
						'</ul>';
					break;
					
				case 'ru':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Как мы соблюдаем стандарты сообщества</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>Если вы станете свидетелем или испытаете какое-либо нарушение настоящего Кодекса поведения, вам настоятельно рекомендуется немедленно связаться с официальными организаторами сообщества.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>В ответ на нарушения неприемлемого поведения мы можем ответить нарушителю следующим образом:</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Предупреждение,</li>' .
							'<li>Временный запрет,</li>' .
							'<li>Постоянное изгнание.</li>' .
						'</ul>';
					break;
					
				case 'tr':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Topluluk Standartlarını Nasıl Uygularız?</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>Bu Davranış Kurallarının herhangi bir şekilde ihlal edildiğine tanıklık ederseniz veya derhal topluluk içindeki resmi organizatörlerle iletişime geçmeniz istenir.</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>Kabul edilemez davranış ihlallerine yanıt olarak, suçluya aşağıdaki gibi yanıt verebiliriz:</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>Uyarı,</li>' .
							'<li>Geçici yasak,</li>' .
							'<li>Kalıcı sınır dışı etme.</li>' .
						'</ul>';
					break;
					
				case 'zh':
					$how_we_enforce_community_standards_section[] =
						'<h3><a name="introduction"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 我们如何执行社区标准</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<p>如果您目睹或遇到任何违反本《行为准则》的行为，请敦促您立即联系社区内的官方组织者。</p>';
					
					$how_we_enforce_community_standards_section[] =
						'<h3>对于违反不可接受行为的行为，我们可以对违规者做出如下回应：</h3>';
					
					$how_we_enforce_community_standards_section[] =
						'<ul>' .
							'<li>警告，</li>' .
							'<li>临时禁止，</li>' .
							'<li>永久驱逐。</li>' .
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
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Lizenzierung dieses Dokuments</h3>';
					
					$licensing_section[] =
						'<p>Dieses Dokument steht unter der Creative Commons Attribution 3.0-Lizenz. Diese Begriffe finden Sie hier ...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'es':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licencia de este documento</h3>';
					
					$licensing_section[] =
						'<p>Este documento se publica bajo la licencia Creative Commons Attribution 3.0. Puede encontrar estos términos aquí ...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'fr':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licence de ce document</h3>';
					
					$licensing_section[] =
						'<p>Ce document est publié sous la licence Creative Commons Attribution 3.0. Vous pouvez trouver ces termes ici ...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'ja':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : このドキュメントのライセンス</h3>';
					
					$licensing_section[] =
						'<p>このドキュメントは、Creative Commons Attribution 3.0 Licenseの下でリリースされています。 ここにこれらの用語があります...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'it':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licenza di questo documento</h3>';
					
					$licensing_section[] =
						'<p>Questo documento è rilasciato sotto la Licenza Creative Commons Attribution 3.0. Puoi trovare questi termini qui ...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'nl':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licentiëring van dit document</h3>';
					
					$licensing_section[] =
						'<p>Dit document is uitgegeven onder de Creative Commons Attribution 3.0-licentie. U kunt deze voorwaarden hier vinden ...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'pl':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licencjonowanie tego dokumentu</h3>';
					
					$licensing_section[] =
						'<p>Ten dokument został wydany na licencji Creative Commons Uznanie autorstwa 3.0. Możesz znaleźć te warunki tutaj ...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'pt':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Licenciamento deste documento</h3>';
					
					$licensing_section[] =
						'<p>Este documento é liberado sob a Licença Creative Commons Attribution 3.0. Você pode encontrar estes termos aqui ...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'ru':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Лицензирование этого документа</h3>';
					
					$licensing_section[] =
						'<p>Этот документ выпущен под лицензией Creative Commons Attribution 3.0. Вы можете найти эти условия здесь ...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'tr':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Bu Belgenin Lisanslanması</h3>';
					
					$licensing_section[] =
						'<p>Bu belge, Creative Commons Atıf 3.0 Lisansı altında yayınlanmıştır. Bu terimleri burada bulabilirsiniz ...</p>';
						
					$licensing_section[] =
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'zh':
					$licensing_section[] =
						'<h3><a name="licensing"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 本文件的许可</h3>';
					
					$licensing_section[] =
						'<p>本文档是根据知识共享署名3.0许可发布的。 您可以在这里找到这些术语...</p>';
						
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
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiration für dieses Dokument</h3>';
					
					$inspiration_section[] =
						'<p>Dieses Dokument wurde von einer Vielzahl anderer Materialien inspiriert, und ich bin ihnen zu großem Dank verpflichtet! Vielen Dank :</p>';
					
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
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiración para este documento</h3>';
					
					$inspiration_section[] =
						'<p>Este documento fue inspirado por una gran cantidad de otros materiales, ¡y les debo todo mi agradecimiento! Gracias :</p>';
					
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
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiration pour ce document</h3>';
					
					$inspiration_section[] =
						'<p>Ce document a été inspiré par un grand nombre d\'autres documents, et je leur dois toute ma gratitude! Merci :</p>';
					
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
						$this->getSectionText(['headerindex'=>$header_index]) . ' : このドキュメントのインスピレーション</h3>';
					
					$inspiration_section[] =
						'<p>このドキュメントは、他の多くの資料に触発されたものであり、感謝の意を表します。 ありがとうございました ：</p>';
					
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
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Ispirazione per questo documento</h3>';
					
					$inspiration_section[] =
						'<p>Questo documento è stato ispirato da numerosi altri materiali e devo loro tutta la mia gratitudine! Grazie :</p>';
					
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
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiratie voor dit document</h3>';
					
					$inspiration_section[] =
						'<p>Dit document is geïnspireerd door een groot aantal andere materialen en ik ben ze al mijn dank verschuldigd! Dank je :</p>';
					
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
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiracja do tego dokumentu</h3>';
					
					$inspiration_section[] =
						'<p>Dokument ten został zainspirowany wieloma innymi materiałami i jestem im winien całą moją wdzięczność! Dziękuję Ci :</p>';
					
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
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inspiração para este documento</h3>';
					
					$inspiration_section[] =
						'<p>Este documento foi inspirado por um grande número de outros materiais e devo-lhes toda a minha gratidão! Obrigado :</p>';
					
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
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Вдохновение для этого документа</h3>';
					
					$inspiration_section[] =
						'<p>Этот документ был вдохновлен множеством других материалов, и я всем им благодарен! Спасибо :</p>';
					
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
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Bu Belge için İlham</h3>';
					
					$inspiration_section[] =
						'<p>Bu belgede çok sayıda başka materyalden ilham aldım ve onlara minnettarlığımı borçluyum! Teşekkür ederim :</p>';
					
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
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 本文件的启示</h3>';
					
					$inspiration_section[] =
						'<p>本文档的灵感来自多种其他材料，我要感谢他们！ 谢谢 ：</p>';
					
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
		
						// HTML Data
						// ---------------------------------------------
		
		public function GetHTMLFormatData_Title()
		{
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$header_title_text = 'Code of Conduct for ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'de':
					$header_title_text = 'Verhaltenskodex für ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'es':
					$header_title_text = 'Código de conducta para ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'fr':
					$header_title_text = 'Code de conduite pour ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'ja':
					$header_title_text = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'] . 'の行動規範';
					break;
					
				case 'it':
					$header_title_text = 'Codice di condotta per ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'nl':
					$header_title_text = 'Gedragscode voor ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'pl':
					$header_title_text = 'Kodeks postępowania dla ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'pt':
					$header_title_text = 'Código de Conduta para ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'ru':
					$header_title_text = 'Кодекс поведения для ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'tr':
					$header_title_text = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'] . ' için Davranış Kuralları';
					break;
					
				case 'zh':
					$header_title_text = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'] . '行为准则';
					break;
			}
			
			return $this->header_title_text = $header_title_text;
		}
	}
?>