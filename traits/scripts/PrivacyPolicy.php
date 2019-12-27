<?php

	trait PrivacyPolicy {
		public function getPrivacyPolicy() {
			$privacy_policy_paragraphs = $this->getPrivacyPolicyParagraphs();
			
			$privacy_policy = implode("\n\n", $privacy_policy_paragraphs);
			
			return $privacy_policy;
		}
		
		public function getPrivacyPolicyImages() {
			$images = [
							# image 1
				'mission'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/premium-icon/megaphone_13809',
					'original-source'=>'https://www.freepik.com/free-icon/promoting_754744.htm',
					'filename'=>'mission.jpg',
				],
							# image 2
				'table-of-contents'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/list_130291',
					'original-source'=>'https://www.freepik.com/free-icon/list_942266.htm',
					'filename'=>'table-of-contents.jpg',
				],
							# image 3
				'what-data'=>[
					'creator'=>'Gregor Cresnar from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/id-card_126352',
					'original-source'=>'https://www.freepik.com/free-icon/id-card_934346.htm',
					'filename'=>'what-data.jpg',
				],
							# image 4
				'when-collected'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/business-presentation_66520',
					'original-source'=>'https://www.freepik.com/free-icon/business-presentation_772506.htm',
					'filename'=>'when-collected.jpg',
				],
							# image 5
				'how-long-stored'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/shelf-full_32152',
					'original-source'=>'https://www.freepik.com/free-icon/shelf-full_740180.htm',
					'filename'=>'how-long-stored.jpg',
				],
							# image 6
				'who-processes'=>[
					'creator'=>'Gregor Cresnar from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/networking_126309',
					'original-source'=>'https://www.freepik.com/free-icon/networking_934303.htm',
					'filename'=>'who-processes.jpg',
				],
							# image 7
				'data-portability'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/wallet_31368',
					'original-source'=>'https://www.freepik.com/free-icon/wallet_739397.htm',
					'filename'=>'data-portability.jpg',
				],
							# image 8
				'data-editability'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/businessman-paper-of-the-application-for-a-job_30382',
					'original-source'=>'https://www.freepik.com/free-icon/businessman-paper-of-the-application-for-a-job_738304.htm',
					'filename'=>'data-editability.jpg',
				],
							# image 9
				'erase-data'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/safe-box_31074',
					'original-source'=>'https://www.freepik.com/free-icon/safe-box_739062.htm',
					'filename'=>'erase-data.jpg',
				],
							# image 10
				'privacy-violation'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/balance_122112',
					'original-source'=>'https://www.freepik.com/free-icon/balance_924648.htm',
					'filename'=>'privacy-violation.jpg',
				],
							# image 11
				'contact-events'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/open-mail_18635',
					'original-source'=>'https://www.freepik.com/free-icon/open-envelope-with-letter_750512.htm',
					'filename'=>'contact-events.jpg',
				],
							# image 12
				'avoided-site-activity'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/insurance_122057',
					'original-source'=>'https://www.freepik.com/free-icon/insurance_924593.htm',
					'filename'=>'avoided-site-activity.jpg',
				],
							# image 13
				'privacy-policy-license'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/open-hanging-signal_44957',
					'original-source'=>'https://www.freepik.com/free-icon/open-hanging-signal_724429.htm',
					'filename'=>'privacy-policy-license.jpg',
				],
			];
			
			return $images;
		}
		
						// Privacy Policy Paragraphs
						// ---------------------------------------------
		
		public function getPrivacyPolicyParagraphs() {
			$header_index = 1;
			
			$images = $this->getPrivacyPolicyImages();
			
			$privacy_policy_paragraphs = [];
			
			$privacy_policy_paragraphs =
				array_merge($privacy_policy_paragraphs,
					$this->getMissionSection([
						'image'=>$images['mission'],
						'headerindex'=>$header_index++,
					])
				);
			
			$privacy_policy_paragraphs =
				array_merge($privacy_policy_paragraphs,
					$this->getTableOfContentsSection([
						'images'=>$images,
						'headerindex'=>$header_index++,
					])
				);
			
			$privacy_policy_paragraphs =
				array_merge($privacy_policy_paragraphs,
					$this->getWhatDataSection([
						'image'=>$images['what-data'],
						'headerindex'=>$header_index++,
					])
				);
			
			$privacy_policy_paragraphs =
				array_merge($privacy_policy_paragraphs,
					$this->getWhenCollectedSection([
						'image'=>$images['when-collected'],
						'headerindex'=>$header_index++,
					])
				);
			
			$privacy_policy_paragraphs =
				array_merge($privacy_policy_paragraphs,
					$this->getHowLongStoredSection([
						'image'=>$images['how-long-stored'],
						'headerindex'=>$header_index++,
					])
				);
			
			$privacy_policy_paragraphs =
				array_merge($privacy_policy_paragraphs,
					$this->getWhoProcessesSection([
						'image'=>$images['who-processes'],
						'headerindex'=>$header_index++,
					])
				);
			
			$privacy_policy_paragraphs =
				array_merge($privacy_policy_paragraphs,
					$this->getDataPortabilitySection([
						'image'=>$images['data-portability'],
						'headerindex'=>$header_index++,
					])
				);
			
			$privacy_policy_paragraphs =
				array_merge($privacy_policy_paragraphs,
					$this->getDataEditabilitySection([
						'image'=>$images['data-editability'],
						'headerindex'=>$header_index++,
					])
				);
			
			$privacy_policy_paragraphs =
				array_merge($privacy_policy_paragraphs,
					$this->getEraseDataSection([
						'image'=>$images['erase-data'],
						'headerindex'=>$header_index++,
					])
				);
			
			$privacy_policy_paragraphs =
				array_merge($privacy_policy_paragraphs,
					$this->getPrivacyViolationSection([
						'image'=>$images['privacy-violation'],
						'headerindex'=>$header_index++,
					])
				);
			
			$privacy_policy_paragraphs =
				array_merge($privacy_policy_paragraphs,
					$this->getContactEventsSection([
						'image'=>$images['contact-events'],
						'headerindex'=>$header_index++,
					])
				);
			
			$privacy_policy_paragraphs =
				array_merge($privacy_policy_paragraphs,
					$this->getAvoidedSiteActivitySection([
						'image'=>$images['avoided-site-activity'],
						'headerindex'=>$header_index++,
					])
				);
			
			$privacy_policy_paragraphs =
				array_merge($privacy_policy_paragraphs,
					$this->getPrivacyPolicyLicenseSection([
						'image'=>$images['privacy-policy-license'],
						'headerindex'=>$header_index++,
					])
				);
			
			return $privacy_policy_paragraphs;
		}
		
						// Individual Privacy Policy Sections
						// ---------------------------------------------
		
		public function getMissionSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$mission_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$mission_section[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Mission and Purpose of the Privacy Policy</h3>';
					
					$mission_section[] =
						'<p>The purpose of this privacy policy is to guarantee that everyone can find out how we may use their personal information on this website.  This document was authored by our Data Privacy Officer (DPO) on January 3rd, 2019.  Additional contact information is listed below.</p>';
					break;
					
				case 'de':
					$mission_section[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Auftrag und Zweck der Datenschutzrichtlinie</h3>';
					
					$mission_section[] =
						'<p>Mit dieser Datenschutzrichtlinie soll sichergestellt werden, dass jeder erfahren kann, wie wir seine persönlichen Informationen auf dieser Website verwenden. Dieses Dokument wurde am 3. Januar 2019 von unserem Datenschutzbeauftragten (DPO) verfasst. Weitere Kontaktinformationen sind unten aufgeführt.</p>';
					break;
					
				case 'es':
					$mission_section[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Misión y finalidad de la política de privacidad</h3>';
					
					$mission_section[] =
						'<p>El propósito de esta política de privacidad es garantizar que todos puedan descubrir cómo utilizamos su información personal en este sitio web. Este documento fue creado por nuestro Oficial de Privacidad de Datos (DPO) el 3 de enero de 2019. A continuación se incluye información de contacto adicional.</p>';
					break;
					
				case 'fr':
					$mission_section[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Mission et objectif de la politique de confidentialité</h3>';
					
					$mission_section[] =
						'<p>Le but de cette politique de confidentialité est de garantir que tout le monde puisse savoir comment nous utilisons leurs informations personnelles sur ce site. Ce document a été rédigé par notre responsable de la protection des données (DPO) le 3 janvier 2019. Des informations de contact supplémentaires sont énumérées ci-dessous.</p>';
					break;
					
				case 'ja':
					$mission_section[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : プライバシーポリシーの目的と目的</h3>';
					
					$mission_section[] =
						'<p>このプライバシーポリシーの目的は、このウェブサイト上で私たちが自分の個人情報をどのように使用しているかを誰もが知ることができることを保証することです。 このドキュメントは、2019年1月3日に当社のデータプライバシーオフィサー（DPO）によって作成されました。その他の連絡先は以下のとおりです。</p>';
					break;
					
				case 'it':
					$mission_section[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Missione e scopo della politica sulla privacy</h3>';
					
					$mission_section[] =
						'<p>Lo scopo di questa politica sulla privacy è garantire che tutti possano scoprire come utilizziamo le loro informazioni personali su questo sito web. Questo documento è stato creato dal nostro Responsabile della privacy dei dati (DPO) il 3 gennaio 2019. Ulteriori informazioni di contatto sono elencate di seguito.</p>';
					break;
					
				case 'nl':
					$mission_section[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Missie en doel van het privacybeleid</h3>';
					
					$mission_section[] =
						'<p>Het doel van dit privacybeleid is te garanderen dat iedereen kan achterhalen hoe we zijn persoonlijke informatie op deze website gebruiken. Dit document is geschreven door onze Data Privacy Officer (DPO) op 3 januari 2019. Aanvullende contactgegevens vindt u hieronder.</p>';
					break;
					
				case 'pl':
					$mission_section[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Misja i cel polityki prywatności</h3>';
					
					$mission_section[] =
						'<p>Celem niniejszej polityki prywatności jest zagwarantowanie, że każdy może dowiedzieć się, w jaki sposób wykorzystujemy jej dane osobowe na tej stronie. Ten dokument został opracowany przez naszego inspektora ochrony danych (Data Privacy Officer, DPO) 3 stycznia 2019 roku. Dodatkowe informacje kontaktowe podano poniżej.</p>';
					break;
					
				case 'pt':
					$mission_section[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Missão e Propósito da Política de Privacidade</h3>';
					
					$mission_section[] =
						'<p>O objetivo desta política de privacidade é garantir que todos possam descobrir como usamos suas informações pessoais neste site. Este documento foi criado por nosso Diretor de Privacidade de Dados (DPO) em 3 de janeiro de 2019. Informações adicionais de contato estão listadas abaixo.</p>';
					break;
					
				case 'ru':
					$mission_section[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Миссия и цель Политики конфиденциальности</h3>';
					
					$mission_section[] =
						'<p>TЦель данной политики конфиденциальности - гарантировать, что каждый может узнать, как мы используем их личную информацию на этом сайте. Этот документ был создан нашим сотрудником по конфиденциальности данных (DPO) 3 января 2019 года. Дополнительная контактная информация приведена ниже.</p>';
					break;
					
				case 'tr':
					$mission_section[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Gizlilik Politikasının Misyonu ve Amacı</h3>';
					
					$mission_section[] =
						'<p>Bu gizlilik politikasının amacı, herkesin kişisel bilgilerini bu web sitesinde nasıl kullandığımızı öğrenmesini sağlamaktır. Bu belge 3 Ocak 2019 tarihinde Veri Gizliliği Görevlimiz (DPO) tarafından hazırlanmıştır. Ek iletişim bilgileri aşağıda listelenmiştir.</p>';
					break;
					
				case 'zh':
					$mission_section[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 隐私政策的使命和目的</h3>';
					
					$mission_section[] =
						'<p>本隐私政策的目的是保证每个人都能了解我们如何在本网站上使用他们的个人信息。 本文档由我们的数据隐私官（DPO）于2019年1月3日撰写。其他联系信息如下。</p>';
					break;
			}
			
			return $mission_section;
		}
		
		public function getTableOfContentsSection($args) {
			$header_index = $args['headerindex'];
			$images = $args['images'];
			
			$toc_index = 1;
			
			$toc_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$toc_section = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Table of Contents</h3>',
						
						'<p>Our privacy policy is organized into the following sections :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Mission and Purpose of the Privacy Policy</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Table of Contents</a></li>',
							'<li><a href="#what-data">' .
								$this->getImageIconMarkup(['image'=>$images['what-data']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : What data do we collect?</a></li>',
							'<li><a href="#when-collected">' .
								$this->getImageIconMarkup(['image'=>$images['when-collected']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : When do we collect data?</a></li>',
							'<li><a href="#how-long-stored">' .
								$this->getImageIconMarkup(['image'=>$images['how-long-stored']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : How long do we store data we collect?</a></li>',
							'<li><a href="#who-processes">' .
								$this->getImageIconMarkup(['image'=>$images['who-processes']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Who processes our data?</a></li>',
							'<li><a href="#data-portability">' .
								$this->getImageIconMarkup(['image'=>$images['data-portability']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : How do I get a copy of my personal information on this site?</a></li>',
							'<li><a href="#data-editability">' .
								$this->getImageIconMarkup(['image'=>$images['data-editability']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : How do I update my personal information on this site?</a></li>',
							'<li><a href="#erase-data">' .
								$this->getImageIconMarkup(['image'=>$images['erase-data']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Who do I contact to erase my personal information on this site?</a></li>',
							'<li><a href="#privacy-violation">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-violation']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Who do I contact to report a violation of the Privacy Policy?</a></li>',
							'<li><a href="#contact-events">' .
								$this->getImageIconMarkup(['image'=>$images['contact-events']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : When will we contact you?</a></li>',
							'<li><a href="#avoided-site-activity">' .
								$this->getImageIconMarkup(['image'=>$images['avoided-site-activity']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . " : What don't we do?</a></li>",
							'<li><a href="#privacy-policy-license">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-policy-license']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : How is the text of this privacy policy licensed?</a></li>',
						'</ul>',
					];
					break;
					
				case 'de':
					$toc_section = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inhaltsverzeichnis</h3>',
						
						'<p>Unsere Datenschutzerklärung ist in folgende Abschnitte gegliedert :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Auftrag und Zweck der Datenschutzrichtlinie</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Inhaltsverzeichnis</a></li>',
							'<li><a href="#what-data">' .
								$this->getImageIconMarkup(['image'=>$images['what-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Welche Daten sammeln wir?</a></li>',
							'<li><a href="#when-collected">' .
								$this->getImageIconMarkup(['image'=>$images['when-collected']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Wann sammeln wir Daten?</a></li>',
							'<li><a href="#how-long-stored">' .
								$this->getImageIconMarkup(['image'=>$images['how-long-stored']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Wie lange speichern wir Daten, die wir sammeln?</a></li>',
							'<li><a href="#who-processes">' .
								$this->getImageIconMarkup(['image'=>$images['who-processes']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Wer verarbeitet unsere Daten?</a></li>',
							'<li><a href="#data-portability">' .
								$this->getImageIconMarkup(['image'=>$images['data-portability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Wie erhalte ich eine Kopie meiner persönlichen Informationen auf dieser Website?</a></li>',
							'<li><a href="#data-editability">' .
								$this->getImageIconMarkup(['image'=>$images['data-editability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Wie aktualisiere ich meine persönlichen Informationen auf dieser Site?</a></li>',
							'<li><a href="#erase-data">' .
								$this->getImageIconMarkup(['image'=>$images['erase-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : An wen kann ich mich wenden, um meine persönlichen Informationen auf dieser Website zu löschen?</a></li>',
							'<li><a href="#privacy-violation">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-violation']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : An wen kann ich mich wenden, um einen Verstoß gegen die Datenschutzbestimmungen zu melden?</a></li>',
							'<li><a href="#contact-events">' .
								$this->getImageIconMarkup(['image'=>$images['contact-events']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Wann werden wir Sie kontaktieren?</a></li>',
							'<li><a href="#avoided-site-activity">' .
								$this->getImageIconMarkup(['image'=>$images['avoided-site-activity']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . " : Was machen wir nicht?</a></li>",
							'<li><a href="#privacy-policy-license">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-policy-license']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Wie ist der Text dieser Datenschutzerklärung lizenziert?</a></li>',
						'</ul>',
					];
					break;
					
				case 'es':
					$toc_section = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Tabla de contenido</h3>',
						
						'<p>Nuestra política de privacidad está organizada en las siguientes secciones :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Misión y finalidad de la política de privacidad</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Tabla de contenido</a></li>',
							'<li><a href="#what-data">' .
								$this->getImageIconMarkup(['image'=>$images['what-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : ¿Qué datos recogemos?</a></li>',
							'<li><a href="#when-collected">' .
								$this->getImageIconMarkup(['image'=>$images['when-collected']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : ¿Cuándo recopilamos datos?</a></li>',
							'<li><a href="#how-long-stored">' .
								$this->getImageIconMarkup(['image'=>$images['how-long-stored']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : ¿Cuánto tiempo almacenamos los datos que recopilamos?</a></li>',
							'<li><a href="#who-processes">' .
								$this->getImageIconMarkup(['image'=>$images['who-processes']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : ¿Quién procesa nuestros datos?</a></li>',
							'<li><a href="#data-portability">' .
								$this->getImageIconMarkup(['image'=>$images['data-portability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : ¿Cómo obtengo una copia de mi información personal en este sitio?</a></li>',
							'<li><a href="#data-editability">' .
								$this->getImageIconMarkup(['image'=>$images['data-editability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : ¿Cómo actualizo mi información personal en este sitio?</a></li>',
							'<li><a href="#erase-data">' .
								$this->getImageIconMarkup(['image'=>$images['erase-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : ¿Con quién me comunico para borrar mi información personal en este sitio?</a></li>',
							'<li><a href="#privacy-violation">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-violation']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : ¿Con quién me comunico para informar una violación de la Política de privacidad?</a></li>',
							'<li><a href="#contact-events">' .
								$this->getImageIconMarkup(['image'=>$images['contact-events']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : ¿Cuándo nos pondremos en contacto con usted?</a></li>',
							'<li><a href="#avoided-site-activity">' .
								$this->getImageIconMarkup(['image'=>$images['avoided-site-activity']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . " : ¿Qué no hacemos?</a></li>",
							'<li><a href="#privacy-policy-license">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-policy-license']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : ¿Cómo se licencia el texto de esta política de privacidad?</a></li>',
						'</ul>',
					];
					break;
				
				case 'fr':
					$toc_section = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Table des matières</h3>',
						
						'<p>Notre politique de confidentialité est organisée dans les sections suivantes :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Mission et objectif de la politique de confidentialité</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Table des matières</a></li>',
							'<li><a href="#what-data">' .
								$this->getImageIconMarkup(['image'=>$images['what-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Quelles données recueillons-nous?</a></li>',
							'<li><a href="#when-collected">' .
								$this->getImageIconMarkup(['image'=>$images['when-collected']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Quand recueillons-nous des données?</a></li>',
							'<li><a href="#how-long-stored">' .
								$this->getImageIconMarkup(['image'=>$images['how-long-stored']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Combien de temps stockons-nous les données que nous recueillons?</a></li>',
							'<li><a href="#who-processes">' .
								$this->getImageIconMarkup(['image'=>$images['who-processes']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Qui traite nos données?</a></li>',
							'<li><a href="#data-portability">' .
								$this->getImageIconMarkup(['image'=>$images['data-portability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Comment puis-je obtenir une copie de mes informations personnelles sur ce site?</a></li>',
							'<li><a href="#data-editability">' .
								$this->getImageIconMarkup(['image'=>$images['data-editability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Comment mettre à jour mes informations personnelles sur ce site?</a></li>',
							'<li><a href="#erase-data">' .
								$this->getImageIconMarkup(['image'=>$images['erase-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Qui dois-je contacter pour effacer mes informations personnelles sur ce site?</a></li>',
							'<li><a href="#privacy-violation">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-violation']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Qui dois-je contacter pour signaler une violation de la politique de confidentialité?</a></li>',
							'<li><a href="#contact-events">' .
								$this->getImageIconMarkup(['image'=>$images['contact-events']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Quand allons-nous vous contacter?</a></li>',
							'<li><a href="#avoided-site-activity">' .
								$this->getImageIconMarkup(['image'=>$images['avoided-site-activity']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . " : Que ne faisons-nous pas?</a></li>",
							'<li><a href="#privacy-policy-license">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-policy-license']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Comment le texte de cette politique de confidentialité est-il autorisé?</a></li>',
						'</ul>',
					];
					break;
					
				case 'ja':
					$toc_section = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 目次</h3>',
						
						'<p>当社のプライバシーポリシーは以下のセクションにまとめられています。</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : プライバシーポリシーの目的と目的</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : 目次</a></li>',
							'<li><a href="#what-data">' .
								$this->getImageIconMarkup(['image'=>$images['what-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : どのようなデータを収集しますか</a></li>',
							'<li><a href="#when-collected">' .
								$this->getImageIconMarkup(['image'=>$images['when-collected']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : いつデータを収集しますか。</a></li>',
							'<li><a href="#how-long-stored">' .
								$this->getImageIconMarkup(['image'=>$images['how-long-stored']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : 収集したデータはどのくらいの期間保存しますか？</a></li>',
							'<li><a href="#who-processes">' .
								$this->getImageIconMarkup(['image'=>$images['who-processes']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : 誰が私たちのデータを処理しますか？</a></li>',
							'<li><a href="#data-portability">' .
								$this->getImageIconMarkup(['image'=>$images['data-portability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : このサイトで私の個人情報のコピーを入手するにはどうすればいいですか？</a></li>',
							'<li><a href="#data-editability">' .
								$this->getImageIconMarkup(['image'=>$images['data-editability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : このサイトの個人情報を更新するにはどうすればいいですか？</a></li>',
							'<li><a href="#erase-data">' .
								$this->getImageIconMarkup(['image'=>$images['erase-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : このサイトの個人情報を消去するために誰に連絡すればよいですか</a></li>',
							'<li><a href="#privacy-violation">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-violation']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : プライバシーポリシーの違反を報告するためにだれに連絡しますか？</a></li>',
							'<li><a href="#contact-events">' .
								$this->getImageIconMarkup(['image'=>$images['contact-events']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : 私達はいつあなたに連絡しますか？</a></li>',
							'<li><a href="#avoided-site-activity">' .
								$this->getImageIconMarkup(['image'=>$images['avoided-site-activity']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . " : 何しないの？</a></li>",
							'<li><a href="#privacy-policy-license">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-policy-license']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : このプライバシーポリシーの本文はどのようにライセンスされていますか？</a></li>',
						'</ul>',
					];
					break;
					
				case 'it':
					$toc_section = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Sommario</h3>',
						
						'<p>La nostra politica sulla privacy è organizzata nelle seguenti sezioni :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Missione e scopo della politica sulla privacy</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Sommario</a></li>',
							'<li><a href="#what-data">' .
								$this->getImageIconMarkup(['image'=>$images['what-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Quali dati raccogliamo?</a></li>',
							'<li><a href="#when-collected">' .
								$this->getImageIconMarkup(['image'=>$images['when-collected']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Quando raccogliamo i dati?</a></li>',
							'<li><a href="#how-long-stored">' .
								$this->getImageIconMarkup(['image'=>$images['how-long-stored']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Quanto tempo conserviamo i dati che raccogliamo?</a></li>',
							'<li><a href="#who-processes">' .
								$this->getImageIconMarkup(['image'=>$images['who-processes']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Chi elabora i nostri dati?</a></li>',
							'<li><a href="#data-portability">' .
								$this->getImageIconMarkup(['image'=>$images['data-portability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Come posso ottenere una copia delle mie informazioni personali su questo sito?</a></li>',
							'<li><a href="#data-editability">' .
								$this->getImageIconMarkup(['image'=>$images['data-editability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Come posso aggiornare le mie informazioni personali su questo sito?</a></li>',
							'<li><a href="#erase-data">' .
								$this->getImageIconMarkup(['image'=>$images['erase-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Chi devo contattare per cancellare le mie informazioni personali su questo sito?</a></li>',
							'<li><a href="#privacy-violation">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-violation']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Chi devo contattare per segnalare una violazione dell\'Informativa sulla privacy?</a></li>',
							'<li><a href="#contact-events">' .
								$this->getImageIconMarkup(['image'=>$images['contact-events']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Quando ti contatteremo?</a></li>',
							'<li><a href="#avoided-site-activity">' .
								$this->getImageIconMarkup(['image'=>$images['avoided-site-activity']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . " : Cosa non facciamo?</a></li>",
							'<li><a href="#privacy-policy-license">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-policy-license']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Come viene concesso in licenza il testo di questa informativa sulla privacy?</a></li>',
						'</ul>',
					];
					break;
					
				case 'nl':
					$toc_section = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inhoudsopgave</h3>',
						
						'<p>Ons privacybeleid is onderverdeeld in de volgende secties :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Missie en doel van het privacybeleid</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Inhoudsopgave</a></li>',
							'<li><a href="#what-data">' .
								$this->getImageIconMarkup(['image'=>$images['what-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Welke gegevens verzamelen we?</a></li>',
							'<li><a href="#when-collected">' .
								$this->getImageIconMarkup(['image'=>$images['when-collected']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Wanneer verzamelen we gegevens?</a></li>',
							'<li><a href="#how-long-stored">' .
								$this->getImageIconMarkup(['image'=>$images['how-long-stored']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Hoe lang bewaren we gegevens die we verzamelen?</a></li>',
							'<li><a href="#who-processes">' .
								$this->getImageIconMarkup(['image'=>$images['who-processes']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Wie verwerkt onze gegevens?</a></li>',
							'<li><a href="#data-portability">' .
								$this->getImageIconMarkup(['image'=>$images['data-portability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Hoe krijg ik een kopie van mijn persoonlijke informatie op deze site?</a></li>',
							'<li><a href="#data-editability">' .
								$this->getImageIconMarkup(['image'=>$images['data-editability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Hoe kan ik mijn persoonlijke informatie op deze site bijwerken?</a></li>',
							'<li><a href="#erase-data">' .
								$this->getImageIconMarkup(['image'=>$images['erase-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Met wie neem ik contact op om mijn persoonlijke gegevens op deze site te wissen?</a></li>',
							'<li><a href="#privacy-violation">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-violation']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Met wie neem ik contact op om een schending van het privacybeleid te melden?</a></li>',
							'<li><a href="#contact-events">' .
								$this->getImageIconMarkup(['image'=>$images['contact-events']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Wanneer nemen we contact met u op?</a></li>',
							'<li><a href="#avoided-site-activity">' .
								$this->getImageIconMarkup(['image'=>$images['avoided-site-activity']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . " : Wat doen we niet?</a></li>",
							'<li><a href="#privacy-policy-license">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-policy-license']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Hoe wordt de tekst van dit privacybeleid gelicentieerd?</a></li>',
						'</ul>',
					];
					break;
					
				case 'pl':
					$toc_section = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Spis treści</h3>',
						
						'<p>Nasza polityka prywatności jest podzielona na następujące sekcje :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Misja i cel polityki prywatności</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Spis treści</a></li>',
							'<li><a href="#what-data">' .
								$this->getImageIconMarkup(['image'=>$images['what-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Jakie dane zbieramy?</a></li>',
							'<li><a href="#when-collected">' .
								$this->getImageIconMarkup(['image'=>$images['when-collected']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Kiedy gromadzimy dane?</a></li>',
							'<li><a href="#how-long-stored">' .
								$this->getImageIconMarkup(['image'=>$images['how-long-stored']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Jak długo przechowujemy gromadzone dane?</a></li>',
							'<li><a href="#who-processes">' .
								$this->getImageIconMarkup(['image'=>$images['who-processes']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Kto przetwarza nasze dane?</a></li>',
							'<li><a href="#data-portability">' .
								$this->getImageIconMarkup(['image'=>$images['data-portability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Jak mogę uzyskać kopię moich danych osobowych na tej stronie?</a></li>',
							'<li><a href="#data-editability">' .
								$this->getImageIconMarkup(['image'=>$images['data-editability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Jak mogę zaktualizować moje dane osobowe na tej stronie?</a></li>',
							'<li><a href="#erase-data">' .
								$this->getImageIconMarkup(['image'=>$images['erase-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Z kim mam się skontaktować, aby usunąć moje dane osobowe na tej stronie??</a></li>',
							'<li><a href="#privacy-violation">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-violation']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Z kim mam się skontaktować, aby zgłosić naruszenie Polityki prywatności?</a></li>',
							'<li><a href="#contact-events">' .
								$this->getImageIconMarkup(['image'=>$images['contact-events']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Kiedy się z Tobą skontaktujemy?</a></li>',
							'<li><a href="#avoided-site-activity">' .
								$this->getImageIconMarkup(['image'=>$images['avoided-site-activity']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . " : Co nie robimy?</a></li>",
							'<li><a href="#privacy-policy-license">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-policy-license']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : W jaki sposób licencjonowana jest treść niniejszej polityki prywatności?</a></li>',
						'</ul>',
					];
					break;
				
				case 'pt':
					$toc_section = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Índice</h3>',
						
						'<p>Nossa política de privacidade está organizada nas seguintes seções :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Missão e Propósito da Política de Privacidade</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Índice</a></li>',
							'<li><a href="#what-data">' .
								$this->getImageIconMarkup(['image'=>$images['what-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Quais dados coletamos?</a></li>',
							'<li><a href="#when-collected">' .
								$this->getImageIconMarkup(['image'=>$images['when-collected']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Quando coletamos dados?</a></li>',
							'<li><a href="#how-long-stored">' .
								$this->getImageIconMarkup(['image'=>$images['how-long-stored']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Por quanto tempo armazenamos os dados que coletamos?</a></li>',
							'<li><a href="#who-processes">' .
								$this->getImageIconMarkup(['image'=>$images['who-processes']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Quem processa nossos dados?</a></li>',
							'<li><a href="#data-portability">' .
								$this->getImageIconMarkup(['image'=>$images['data-portability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Como faço para obter uma cópia das minhas informações pessoais neste site?</a></li>',
							'<li><a href="#data-editability">' .
								$this->getImageIconMarkup(['image'=>$images['data-editability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Como faço para atualizar minhas informações pessoais neste site?</a></li>',
							'<li><a href="#erase-data">' .
								$this->getImageIconMarkup(['image'=>$images['erase-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Quem devo contatar para apagar minhas informações pessoais neste site?</a></li>',
							'<li><a href="#privacy-violation">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-violation']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Quem devo contatar para denunciar uma violação da Política de Privacidade?</a></li>',
							'<li><a href="#contact-events">' .
								$this->getImageIconMarkup(['image'=>$images['contact-events']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Quando entraremos em contato?</a></li>',
							'<li><a href="#avoided-site-activity">' .
								$this->getImageIconMarkup(['image'=>$images['avoided-site-activity']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . " : O que não fazemos?</a></li>",
							'<li><a href="#privacy-policy-license">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-policy-license']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Como o texto desta política de privacidade é licenciado?</a></li>',
						'</ul>',
					];
					break;
					
				case 'ru':
					$toc_section = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Оглавление</h3>',
						
						'<p>Наша политика конфиденциальности состоит из следующих разделов :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Миссия и цель Политики конфиденциальности</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Оглавление</a></li>',
							'<li><a href="#what-data">' .
								$this->getImageIconMarkup(['image'=>$images['what-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Какие данные мы собираем?</a></li>',
							'<li><a href="#when-collected">' .
								$this->getImageIconMarkup(['image'=>$images['when-collected']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Когда мы собираем данные?</a></li>',
							'<li><a href="#how-long-stored">' .
								$this->getImageIconMarkup(['image'=>$images['how-long-stored']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Как долго мы храним данные, которые собираем?</a></li>',
							'<li><a href="#who-processes">' .
								$this->getImageIconMarkup(['image'=>$images['who-processes']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Кто обрабатывает наши данные?</a></li>',
							'<li><a href="#data-portability">' .
								$this->getImageIconMarkup(['image'=>$images['data-portability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Как я могу получить копию моей личной информации на этом сайте?</a></li>',
							'<li><a href="#data-editability">' .
								$this->getImageIconMarkup(['image'=>$images['data-editability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Как мне обновить мою личную информацию на этом сайте?</a></li>',
							'<li><a href="#erase-data">' .
								$this->getImageIconMarkup(['image'=>$images['erase-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : С кем мне связаться, чтобы стереть мою личную информацию на этом сайте?</a></li>',
							'<li><a href="#privacy-violation">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-violation']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : С кем мне связаться, чтобы сообщить о нарушении Политики конфиденциальности?</a></li>',
							'<li><a href="#contact-events">' .
								$this->getImageIconMarkup(['image'=>$images['contact-events']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Когда мы с вами свяжемся?</a></li>',
							'<li><a href="#avoided-site-activity">' .
								$this->getImageIconMarkup(['image'=>$images['avoided-site-activity']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . " : Что мы не делаем?</a></li>",
							'<li><a href="#privacy-policy-license">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-policy-license']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Как лицензируется текст этой политики конфиденциальности?</a></li>',
						'</ul>',
					];
					break;
				
				case 'tr':
					$toc_section = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : İçindekiler</h3>',
						
						'<p>Gizlilik politikamız aşağıdaki bölümlerde düzenlenmiştir :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Gizlilik Politikasının Misyonu ve Amacı</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : İçindekiler</a></li>',
							'<li><a href="#what-data">' .
								$this->getImageIconMarkup(['image'=>$images['what-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Hangi verileri topluyoruz?</a></li>',
							'<li><a href="#when-collected">' .
								$this->getImageIconMarkup(['image'=>$images['when-collected']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Ne zaman veri topluyoruz?</a></li>',
							'<li><a href="#how-long-stored">' .
								$this->getImageIconMarkup(['image'=>$images['how-long-stored']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Topladığımız verileri ne kadar süreyle saklıyoruz?</a></li>',
							'<li><a href="#who-processes">' .
								$this->getImageIconMarkup(['image'=>$images['who-processes']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Verilerimizi kim işliyor?</a></li>',
							'<li><a href="#data-portability">' .
								$this->getImageIconMarkup(['image'=>$images['data-portability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Bu sitedeki kişisel bilgilerimin bir kopyasını nasıl edinebilirim?</a></li>',
							'<li><a href="#data-editability">' .
								$this->getImageIconMarkup(['image'=>$images['data-editability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Bu sitedeki kişisel bilgilerimi nasıl güncellerim?</a></li>',
							'<li><a href="#erase-data">' .
								$this->getImageIconMarkup(['image'=>$images['erase-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Bu sitedeki kişisel bilgilerimi silmek için kiminle iletişim kurabilirim?</a></li>',
							'<li><a href="#privacy-violation">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-violation']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Gizlilik Politikasının ihlal edildiğini bildirmek için kiminle iletişim kurabilirim?</a></li>',
							'<li><a href="#contact-events">' .
								$this->getImageIconMarkup(['image'=>$images['contact-events']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Sizinle ne zaman iletişim kuracağız?</a></li>',
							'<li><a href="#avoided-site-activity">' .
								$this->getImageIconMarkup(['image'=>$images['avoided-site-activity']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . " : Ne yapmayız</a></li>",
							'<li><a href="#privacy-policy-license">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-policy-license']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : Bu gizlilik politikasının metni nasıl lisanslanmaktadır?</a></li>',
						'</ul>',
					];
					break;
					
				case 'zh':
					$toc_section = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 目录</h3>',
						
						'<p>我们的隐私政策分为以下几个部分 ：</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : 隐私政策的使命和目的</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : 目录</a></li>',
							'<li><a href="#what-data">' .
								$this->getImageIconMarkup(['image'=>$images['what-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : 我们收集了哪些数据？</a></li>',
							'<li><a href="#when-collected">' .
								$this->getImageIconMarkup(['image'=>$images['when-collected']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : 我们什么时候收集数据？</a></li>',
							'<li><a href="#how-long-stored">' .
								$this->getImageIconMarkup(['image'=>$images['how-long-stored']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : 我们存储收集数据的时间有多长？</a></li>',
							'<li><a href="#who-processes">' .
								$this->getImageIconMarkup(['image'=>$images['who-processes']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : 谁处理我们的数据？</a></li>',
							'<li><a href="#data-portability">' .
								$this->getImageIconMarkup(['image'=>$images['data-portability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : 如何在本网站上获取我的个人信息副本？</a></li>',
							'<li><a href="#data-editability">' .
								$this->getImageIconMarkup(['image'=>$images['data-editability']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : 如何更新本网站上的个人信息？</a></li>',
							'<li><a href="#erase-data">' .
								$this->getImageIconMarkup(['image'=>$images['erase-data']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : 我应该联系谁来删除我在本网站上的个人信息？</a></li>',
							'<li><a href="#privacy-violation">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-violation']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : 我应该联系谁报告违反隐私政策的行为？</a></li>',
							'<li><a href="#contact-events">' .
								$this->getImageIconMarkup(['image'=>$images['contact-events']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : 我们什么时候联系你？</a></li>',
							'<li><a href="#avoided-site-activity">' .
								$this->getImageIconMarkup(['image'=>$images['avoided-site-activity']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . " : 我们不做什么？</a></li>",
							'<li><a href="#privacy-policy-license">' .
								$this->getImageIconMarkup(['image'=>$images['privacy-policy-license']]) .
								' ' . $this->getSectionText(['headerindex'=>$toc_index++]) . ' : 本隐私政策的文本如何获得许可？</a></li>',
						'</ul>',
					];
					break;
			}
			
			return $toc_section;
		}
		
		public function getWhatDataSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$what_data_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$what_data_section = [
						'<h3><a name="what-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : What data do we collect?</h3>',
						
						'<p>We collect the following data :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - We store IP addresses for networking and security diagnostics.  This information is not connected to either users or user accounts.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - We track webpage-viewing patterns, such as pages clicked or time spent on a page, to improve the website.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - We store usernames and associated information, such as upvotes, downvotes, comments, or biographical information, as given by the user.  We hash all passwords.  We use cookies to maintain user logins and settings.  ' . $this->getPersonallyIdentifiableText() . '</li>',
						'</ul>',
					];
					break;
					
				case 'de':
					$what_data_section = [
						'<h3><a name="what-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Welche Daten sammeln wir?</h3>',
						
						'<p>Wir erheben folgende Daten :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Wir speichern IP-Adressen für die Netzwerk- und Sicherheitsdiagnose. Diese Informationen sind weder mit Benutzern noch mit Benutzerkonten verbunden.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Wir protokollieren Muster für das Anzeigen von Webseiten, z. B. auf angeklickte Seiten oder auf einer Seite verbrachte Zeit, um die Website zu verbessern.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Wir speichern Benutzernamen und zugehörige Informationen wie Upvotes, Downvotes, Kommentare oder biografische Informationen, wie vom Benutzer angegeben. Wir verwenden alle Passwörter. Wir verwenden Cookies, um Benutzeranmeldungen und -einstellungen zu verwalten.  ' . $this->getPersonallyIdentifiableText() . '</li>',
						'</ul>',
					];
					break;
					
				case 'es':
					$what_data_section = [
						'<h3><a name="what-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : ¿Qué datos recogemos?</h3>',
						
						'<p>Recopilamos los siguientes datos :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Almacenamos direcciones IP para redes y diagnósticos de seguridad. Esta información no está conectada a los usuarios ni a las cuentas de usuario.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Hacemos un seguimiento de los patrones de visualización de páginas web, como las páginas en las que se hace clic o el tiempo dedicado a una página, para mejorar el sitio web.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Almacenamos los nombres de usuario y la información asociada, tales como upvotes, downvotes, comentarios o información biográfica, según lo dado por el usuario. Tenemos todas las contraseñas. Usamos cookies para mantener el inicio de sesión y la configuración de los usuarios.  ' . $this->getPersonallyIdentifiableText() . '</li>',
						'</ul>',
					];
					break;
				
				case 'fr':
					$what_data_section = [
						'<h3><a name="what-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Quelles données recueillons-nous?</h3>',
						
						'<p>Nous collectons les données suivantes :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Nous stockons les adresses IP pour les diagnostics de réseau et de sécurité. Ces informations ne sont connectées ni aux utilisateurs ni aux comptes d\'utilisateurs.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Nous suivons les habitudes d\'affichage des pages Web, telles que les pages cliquées ou le temps passé sur une page, afin d\'améliorer le site Web.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Nous stockons les noms d\'utilisateur et les informations associées, tels que les votes positifs, les commentaires négatifs, les commentaires ou les informations biographiques, tels que fournis par l\'utilisateur. Nous hachons tous les mots de passe. Nous utilisons des cookies pour gérer les connexions et les paramètres des utilisateurs.  ' . $this->getPersonallyIdentifiableText() . '</li>',
						'</ul>',
					];
					break;
					
				case 'ja':
					$what_data_section = [
						'<h3><a name="what-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : どのようなデータを収集しますか</h3>',
						
						'<p>以下のデータを収集します。</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - ネットワーキングおよびセキュリティ診断用にIPアドレスを保管しています。 この情報は、ユーザーにもユーザーアカウントにも関連していません。  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - クリックされたページやページに費やされた時間などのWebページ表示パターンを追跡して、Webサイトを改善します。  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - ユーザーから提供されたユーザー名とそれに関連する情報（上昇投票、下降投票、コメント、略歴など）を保存します。 すべてのパスワードをハッシュします。 ユーザーのログインと設定を維持するためにクッキーを使用します。  ' . $this->getPersonallyIdentifiableText() . '</li>',
						'</ul>',
					];
					break;
					
				case 'it':
					$what_data_section = [
						'<h3><a name="what-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Quali dati raccogliamo?</h3>',
						
						'<p>Raccogliamo i seguenti dati :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Archiviamo gli indirizzi IP per la diagnostica di rete e di sicurezza. Questa informazione non è collegata a utenti o account utente.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Monitoriamo i modelli di visualizzazione delle pagine Web, come le pagine su cui è stato fatto clic o il tempo trascorso su una pagina, per migliorare il sito Web.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Memorizziamo i nomi utente e le informazioni associate, come upvotes, downvotes, commenti o informazioni biografiche, come fornite dall\'utente. Abbiamo cancellato tutte le password. Utilizziamo i cookie per mantenere gli accessi e le impostazioni degli utenti.  ' . $this->getPersonallyIdentifiableText() . '</li>',
						'</ul>',
					];
					break;
					
				case 'nl':
					$what_data_section = [
						'<h3><a name="what-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Welke gegevens verzamelen we?</h3>',
						
						'<p>Wij verzamelen de volgende gegevens :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - We slaan IP-adressen op voor netwerk- en beveiligingsdiagnostiek. Deze informatie is niet verbonden met gebruikers of gebruikersaccounts.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - We volgen patronen voor het bekijken van webpagina\'s, zoals pagina\'s waarop is geklikt of tijd besteed aan een pagina, om de website te verbeteren.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - We slaan gebruikersnamen en bijbehorende informatie op, zoals upvotes, downvotes, opmerkingen of biografische informatie, zoals door de gebruiker gegeven. We hash alle wachtwoorden. We gebruiken cookies om de aanmeldingen en instellingen van gebruikers te behouden.  ' . $this->getPersonallyIdentifiableText() . '</li>',
						'</ul>',
					];
					break;
					
				case 'pl':
					$what_data_section = [
						'<h3><a name="what-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Jakie dane zbieramy?</h3>',
						
						'<p>Zbieramy następujące dane :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Przechowujemy adresy IP dla potrzeb sieci i diagnostyki bezpieczeństwa. Te informacje nie są połączone z użytkownikami ani kontami użytkowników.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Śledzimy wzorce wyświetlania stron internetowych, takie jak kliknięte strony lub czas spędzony na stronie, w celu ulepszenia witryny.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Przechowujemy nazwy użytkowników i powiązane informacje, takie jak upvotes, notatki w dół, komentarze lub informacje biograficzne, podane przez użytkownika. Łączymy wszystkie hasła. Używamy plików cookie do utrzymywania logowań użytkownika i ustawień.  ' . $this->getPersonallyIdentifiableText() . '</li>',
						'</ul>',
					];
					break;
				
				case 'pt':
					$what_data_section = [
						'<h3><a name="what-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Quais dados coletamos?</h3>',
						
						'<p>Nós coletamos os seguintes dados :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Nós armazenamos endereços IP para diagnósticos de rede e segurança. Essas informações não estão conectadas a usuários ou contas de usuários.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Rastreamos padrões de visualização de páginas da Web, como páginas clicadas ou tempo gasto em uma página, para melhorar o site.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Armazenamos nomes de usuários e informações associadas, como votos positivos, votos negativos, comentários ou informações biográficas, conforme fornecidas pelo usuário. Nós hash todas as senhas. Nós usamos cookies para manter logins e configurações de usuários.  ' . $this->getPersonallyIdentifiableText() . '</li>',
						'</ul>',
					];
					break;
					
				case 'ru':
					$what_data_section = [
						'<h3><a name="what-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Какие данные мы собираем?</h3>',
						
						'<p>Мы собираем следующие данные :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Мы храним IP-адреса для диагностики сети и безопасности. Эта информация не связана ни с пользователями, ни с учетными записями пользователей.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Мы отслеживаем шаблоны просмотра веб-страниц, например, количество нажатых страниц или время, проведенное на странице, чтобы улучшить веб-сайт.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Мы храним имена пользователей и связанную с ними информацию, такую как положительные отзывы, отрицательные отзывы, комментарии или биографические данные, предоставленные пользователем. Мы хэшируем все пароли. Мы используем куки-файлы для поддержания пользовательских логинов и настроек.  ' . $this->getPersonallyIdentifiableText() . '</li>',
						'</ul>',
					];
					break;
				
				case 'tr':
					$what_data_section = [
						'<h3><a name="what-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Hangi verileri topluyoruz?</h3>',
						
						'<p>Aşağıdaki verileri topluyoruz :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Ağ ve güvenlik teşhisi için IP adreslerini saklıyoruz. Bu bilgi kullanıcılara veya kullanıcı hesaplarına bağlı değildir.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Web sayfasını geliştirmek için tıklanan sayfalar veya bir sayfada harcanan süre gibi web sayfası görüntüleme modellerini izleriz.  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Kullanıcı adlarını ve kullanıcı tarafından verilen en yüksek oy, en düşük oy, yorum veya biyografik bilgi gibi ilişkili bilgileri depolarız. Tüm şifrelere sahibiz. Kullanıcı girişlerini ve ayarlarını korumak için çerezleri kullanıyoruz.  ' . $this->getPersonallyIdentifiableText() . '</li>',
						'</ul>',
					];
					break;
					
				case 'zh':
					$what_data_section = [
						'<h3><a name="what-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 我们收集了哪些数据？</h3>',
						
						'<p>我们收集以下数据 ：</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - 我们存储用于网络和安全诊断的IP地址。 此信息未连接到用户或用户帐户。  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - 我们跟踪网页查看模式，例如点击的页面或在页面上花费的时间，以改进网站。  ' . $this->getNotPersonallyIdentifiableText() . '</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - 我们存储用户名和相关信息，例如用户给出的upvotes，downvotes，comments或传记信息。 我们哈希所有密码。 我们使用cookie来维护用户登录和设置。  ' . $this->getPersonallyIdentifiableText() . '</li>',
						'</ul>',
					];
					break;
			}
			
			return $what_data_section;
		}
		
		public function getWhenCollectedSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$when_collected_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$when_collected_section = [
						'<h3><a name="when-collected"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : When do we collect data?</h3>',
						
						'<p>We collect data in the following events :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - We collect this data upon connecting to our website over the Internet.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - We collect this data upon loading pages within a browser or other javascript/http-capable program.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - We collect this data upon signing up for a user account on the site.</li>',
						'</ul>',
					];
					break;
					
				case 'de':
					$when_collected_section = [
						'<h3><a name="when-collected"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Wann sammeln wir Daten?</h3>',
						
						'<p>Wir erfassen Daten bei folgenden Ereignissen :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Wir erheben diese Daten, wenn wir über das Internet eine Verbindung zu unserer Website herstellen.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Wir erheben diese Daten beim Laden von Seiten in einem Browser oder einem anderen Javascript / http-fähigen Programm.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Wir erheben diese Daten bei der Anmeldung eines Benutzerkontos auf der Website.</li>',
						'</ul>',
					];
					break;
					
				case 'es':
					$when_collected_section = [
						'<h3><a name="when-collected"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : ¿Cuándo recopilamos datos?</h3>',
						
						'<p>Recopilamos datos en los siguientes eventos :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Recopilamos estos datos al conectarnos a nuestro sitio web a través de Internet.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Recopilamos estos datos al cargar páginas dentro de un navegador u otro programa compatible con javascript / http.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Recopilamos estos datos al registrarse para obtener una cuenta de usuario en el sitio.</li>',
						'</ul>',
					];
					break;
				
				case 'fr':
					$when_collected_section = [
						'<h3><a name="when-collected"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Quand recueillons-nous des données?</h3>',
						
						'<p>Nous collectons des données dans les événements suivants :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Nous recueillons ces données lors de la connexion à notre site Web via Internet.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Nous recueillons ces données lors du chargement de pages dans un navigateur ou dans un autre programme compatible javascript / http.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Nous collectons ces données lors de la création d\'un compte utilisateur sur le site.</li>',
						'</ul>',
					];
					break;
					
				case 'ja':
					$when_collected_section = [
						'<h3><a name="when-collected"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : いつデータを収集しますか。</h3>',
						
						'<p>以下のイベントでデータを収集します。</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - インターネットを通じて当社のウェブサイトに接続した際に、このデータを収集します。</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - ブラウザまたは他のjavascript / http対応プログラム内にページをロードする際に、このデータを収集します。</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - このデータは、サイトのユーザーアカウントにサインアップしたときに収集されます。</li>',
						'</ul>',
					];
					break;
					
				case 'it':
					$when_collected_section = [
						'<h3><a name="when-collected"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Quando raccogliamo i dati?</h3>',
						
						'<p>Raccogliamo dati nei seguenti eventi :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Raccogliamo questi dati al momento della connessione al nostro sito Web tramite Internet.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Raccogliamo questi dati al caricamento di pagine all\'interno di un browser o di un altro programma abilitato per javascript / http.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Raccogliamo questi dati al momento della registrazione per un account utente sul sito.</li>',
						'</ul>',
					];
					break;
					
				case 'nl':
					$when_collected_section = [
						'<h3><a name="when-collected"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Wanneer verzamelen we gegevens?</h3>',
						
						'<p>We verzamelen gegevens in de volgende evenementen :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - We verzamelen deze gegevens bij het verbinden met onze website via internet.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - We verzamelen deze gegevens bij het laden van pagina\'s in een browser of een ander javascript / http-geschikt programma.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - We verzamelen deze gegevens bij het aanmelden voor een gebruikersaccount op de site.</li>',
						'</ul>',
					];
					break;
					
				case 'pl':
					$when_collected_section = [
						'<h3><a name="when-collected"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Kiedy gromadzimy dane?</h3>',
						
						'<p>Zbieramy dane w następujących wydarzeniach :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Zbieramy te dane po połączeniu z naszą witryną przez Internet.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Zbieramy te dane po załadowaniu stron w przeglądarce lub innym programie obsługującym javascript / http.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Zbieramy te dane po zarejestrowaniu konta użytkownika na stronie.</li>',
						'</ul>',
					];
					break;
				
				case 'pt':
					$when_collected_section = [
						'<h3><a name="when-collected"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Quando coletamos dados?</h3>',
						
						'<p>Coletamos dados nos seguintes eventos :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Coletamos esses dados ao nos conectarmos ao nosso site pela Internet.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Coletamos esses dados ao carregar páginas em um navegador ou outro programa compatível com javascript / http.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Coletamos esses dados quando nos inscrevemos em uma conta de usuário no site.</li>',
						'</ul>',
					];
					break;
					
				case 'ru':
					$when_collected_section = [
						'<h3><a name="when-collected"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Когда мы собираем данные?</h3>',
						
						'<p>Мы собираем данные в следующих событиях :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Мы собираем эти данные при подключении к нашему веб-сайту через Интернет.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Мы собираем эти данные при загрузке страниц в браузере или другой javascript / http-совместимой программе.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Мы собираем эти данные после регистрации учетной записи пользователя на сайте.</li>',
						'</ul>',
					];
					break;
				
				case 'tr':
					$when_collected_section = [
						'<h3><a name="when-collected"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Ne zaman veri topluyoruz?</h3>',
						
						'<p>Aşağıdaki olaylarda veri topluyoruz :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Bu verileri web sitemize İnternet üzerinden bağlanarak topluyoruz.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Bu verileri bir tarayıcıya veya başka bir javascript / http yetenekli program içerisine sayfa yerleştirdikten sonra toplarız.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Bu verileri sitedeki bir kullanıcı hesabına kaydolduktan sonra alıyoruz.</li>',
						'</ul>',
					];
					break;
					
				case 'zh':
					$when_collected_section = [
						'<h3><a name="when-collected"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 我们什么时候收集数据？</h3>',
						
						'<p>我们收集以下事件中的数据 :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - 我们通过互联网连接到我们的网站时收集这些数据。</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - 我们在浏览器或其他支持javascript / http的程序中加载页面时收集此数据。</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - 我们在网站上注册用户帐户时收集此数据。</li>',
						'</ul>',
					];
					break;
			}
			
			return $when_collected_section;
		}
		
		public function getHowLongStoredSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$how_long_stored_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$how_long_stored_section = [
						'<h3><a name="how-long-stored"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How long do we store data we collect?</h3>',
						
						'<p>We store different pieces of data differently :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - This information is stored online for 2-3 years, before it is taken down and encrypted.  Some of it is used with networking and diagnostic software, and that information may be stored indefinitely.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - We store this data indefinitely.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - We store this data indefinitely, or until the user requests it to be removed.</li>',
						'</ul>',
					];
					break;
					
				case 'de':
					$how_long_stored_section = [
						'<h3><a name="how-long-stored"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Wie lange speichern wir Daten, die wir sammeln?</h3>',
						
						'<p>Wir speichern verschiedene Daten unterschiedlich :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Diese Informationen werden online für 2-3 Jahre gespeichert, bevor sie abgebrochen und verschlüsselt werden. Ein Teil davon wird mit Netzwerk- und Diagnosesoftware verwendet, und diese Informationen können unbegrenzt gespeichert werden.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Wir speichern diese Daten auf unbestimmte Zeit.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Wir speichern diese Daten auf unbestimmte Zeit oder bis der Benutzer die Entfernung verlangt.</li>',
						'</ul>',
					];
					break;
					
				case 'es':
					$how_long_stored_section = [
						'<h3><a name="how-long-stored"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : ¿Cuánto tiempo almacenamos los datos que recopilamos?</h3>',
						
						'<p>Almacenamos diferentes datos de manera diferente :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Esta información se almacena en línea durante 2-3 años, antes de que se elimine y encripte. Parte de ella se utiliza con software de diagnóstico y redes, y esa información puede almacenarse indefinidamente.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Almacenamos estos datos por tiempo indefinido.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Almacenamos estos datos indefinidamente, o hasta que el usuario solicite que se eliminen.</li>',
						'</ul>',
					];
					break;
				
				case 'fr':
					$how_long_stored_section = [
						'<h3><a name="how-long-stored"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Combien de temps stockons-nous les données que nous recueillons?</h3>',
						
						'<p>Nous stockons différents types de données différemment :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Ces informations sont stockées en ligne pendant 2-3 ans, avant d’être enregistrées et cryptées. Certaines d\'entre elles sont utilisées avec des logiciels de réseau et de diagnostic, et ces informations peuvent être stockées indéfiniment.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Nous stockons ces données indéfiniment.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Nous stockons ces données indéfiniment ou jusqu\'à ce que l\'utilisateur demande leur suppression.</li>',
						'</ul>',
					];
					break;
					
				case 'ja':
					$how_long_stored_section = [
						'<h3><a name="how-long-stored"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 収集したデータはどのくらいの期間保存しますか？</h3>',
						
						'<p>さまざまなデータを別々に保存します。</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - この情報は、削除され暗号化されるまで2〜3年間オンラインで保存されます。 そのうちのいくつかはネットワーキングおよび診断ソフトウェアと使用され、その情報は無期限に保存されるかもしれません。</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - このデータは無期限に保管されます。</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - このデータは無期限に、またはユーザーが削除を要求するまで保存されます。</li>',
						'</ul>',
					];
					break;
					
				case 'it':
					$how_long_stored_section = [
						'<h3><a name="how-long-stored"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Quanto tempo conserviamo i dati che raccogliamo?</h3>',
						
						'<p>Archiviamo diversi dati in modo diverso :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Queste informazioni vengono archiviate online per 2-3 anni, prima che vengano eliminate e crittografate. Alcuni di essi vengono utilizzati con software di rete e di diagnostica e tali informazioni possono essere archiviate indefinitamente.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Archiviamo questi dati indefinitamente.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Archiviamo questi dati a tempo indeterminato o finché l\'utente non richiede di rimuoverli.</li>',
						'</ul>',
					];
					break;
					
				case 'nl':
					$how_long_stored_section = [
						'<h3><a name="how-long-stored"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Hoe lang bewaren we gegevens die we verzamelen?</h3>',
						
						'<p>We slaan verschillende soorten gegevens op verschillende manieren op :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Deze informatie wordt 2-3 jaar online opgeslagen voordat deze wordt verwijderd en versleuteld. Een deel ervan wordt gebruikt met netwerk- en diagnosesoftware en die informatie kan voor onbepaalde tijd worden opgeslagen.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - We slaan deze gegevens voor onbepaalde tijd op.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - We slaan deze gegevens voor onbepaalde tijd op, of totdat de gebruiker verzoekt dat deze wordt verwijderd.</li>',
						'</ul>',
					];
					break;
					
				case 'pl':
					$how_long_stored_section = [
						'<h3><a name="how-long-stored"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Jak długo przechowujemy gromadzone dane?</h3>',
						
						'<p>Różnie przechowujemy różne dane :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Informacje te są przechowywane online przez 2-3 lata, zanim zostaną usunięte i zaszyfrowane. Niektóre z nich są używane z oprogramowaniem sieciowym i diagnostycznym, a informacje te mogą być przechowywane w nieskończoność.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Przechowujemy te dane w nieskończoność.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Przechowujemy te dane w nieskończoność lub do momentu, gdy użytkownik zażąda ich usunięcia.</li>',
						'</ul>',
					];
					break;
				
				case 'pt':
					$how_long_stored_section = [
						'<h3><a name="how-long-stored"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Por quanto tempo armazenamos os dados que coletamos?</h3>',
						
						'<p>Nós armazenamos diferentes partes de dados de maneira diferente :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Essas informações são armazenadas on-line por dois a três anos, antes de serem retiradas e criptografadas. Algumas delas são usadas com software de rede e diagnóstico, e essas informações podem ser armazenadas indefinidamente.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Nós armazenamos esses dados indefinidamente.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Armazenamos esses dados indefinidamente ou até que o usuário solicite sua remoção.</li>',
						'</ul>',
					];
					break;
					
				case 'ru':
					$how_long_stored_section = [
						'<h3><a name="how-long-stored"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Как долго мы храним данные, которые собираем?</h3>',
						
						'<p>Мы храним разные фрагменты данных по-разному :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Эта информация хранится в сети в течение 2-3 лет, прежде чем она будет снята и зашифрована. Часть из них используется с сетевым и диагностическим программным обеспечением, и эта информация может храниться неограниченное время.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Мы храним эти данные бесконечно.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Мы храним эти данные неограниченное время или до тех пор, пока пользователь не запросит их удаление.</li>',
						'</ul>',
					];
					break;
				
				case 'tr':
					$how_long_stored_section = [
						'<h3><a name="how-long-stored"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Topladığımız verileri ne kadar süreyle saklıyoruz?</h3>',
						
						'<p>Farklı veri parçalarını farklı depolarız :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - Bu bilgi 2-3 yıl boyunca çevrimiçi olarak saklanıp şifrelenmeden önce saklanır. Bazıları ağ oluşturma ve tanılama yazılımlarıyla kullanılır ve bu bilgiler süresiz olarak depolanabilir.</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - Bu verileri süresiz olarak saklıyoruz.</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - Bu verileri süresiz olarak veya kullanıcı kaldırılmasını isteyinceye kadar depolarız.</li>',
						'</ul>',
					];
					break;
					
				case 'zh':
					$how_long_stored_section = [
						'<h3><a name="how-long-stored"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 我们存储收集数据的时间有多长？</h3>',
						
						'<p>我们以不同方式存储不同的数据 :</p>',
						
						'<ul>',
							'<li><em>' . $this->getIPAddressesHeader() . '</em> - 该信息在被删除和加密之前在线存储2  -  3年。 其中一些用于网络和诊断软件，并且该信息可以无限期地存储。</li>',
							'<li><em>' . $this->getTrafficAnalyticsHeader() . '</em> - 我们无限期地存储这些数据。</li>',
							'<li><em>' . $this->getUserAccountInformationHeader() . '</em> - 我们无限期地存储这些数据，或者直到用户请求删除它为止。</li>',
						'</ul>',
					];
					break;
			}
			
			return $how_long_stored_section;
		}
		
		public function getWhoProcessesSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$who_processes_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$who_processes_section = [
						'<h3><a name="who-processes"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Who processes our data?</h3>',
						
						'<p>We use third-party processing on some of our data :</p>',
						
						'<ul>',
							'<li><em>Google OAuth</em> - The Google OAuth 2.0 authentication system is used to authenticate users into or out of our website.  The information processed is strictly for authentication.</li>',
							'<li><em>Google Analytics</em> - This Google service helps us monitor traffic and usage of our website.</li>',
						'</ul>',
					];
					break;
					
				case 'de':
					$who_processes_section = [
						'<h3><a name="who-processes"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Wer verarbeitet unsere Daten?</h3>',
						
						'<p>Bei einigen unserer Daten verwenden wir die Verarbeitung durch Dritte :</p>',
						
						'<ul>',
							'<li><em>Google OAuth</em> - Das Google OAuth 2.0-Authentifizierungssystem wird verwendet, um Benutzer auf unserer Website zu authentifizieren oder sie zu verlassen. Die verarbeiteten Informationen dienen ausschließlich der Authentifizierung.</li>',
							'<li><em>Google Analytics</em> - 此Google服务可帮助我们监控网站的流量和使用情况。</li>',
						'</ul>',
					];
					break;
					
				case 'es':
					$who_processes_section = [
						'<h3><a name="who-processes"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : ¿Quién procesa nuestros datos?</h3>',
						
						'<p>Utilizamos el procesamiento de terceros en algunos de nuestros datos :</p>',
						
						'<ul>',
							'<li><em>Google OAuth</em> - El sistema de autenticación Google OAuth 2.0 se utiliza para autenticar a los usuarios dentro o fuera de nuestro sitio web. La información procesada es estrictamente para la autenticación.</li>',
							'<li><em>Google Analytics</em> - Este servicio de Google nos ayuda a controlar el tráfico y el uso de nuestro sitio web.</li>',
						'</ul>',
					];
					break;
				
				case 'fr':
					$who_processes_section = [
						'<h3><a name="who-processes"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Qui traite nos données?</h3>',
						
						'<p>Nous utilisons un traitement tiers sur certaines de nos données :</p>',
						
						'<ul>',
							'<li><em>Google OAuth</em> - Le système d\'authentification Google OAuth 2.0 est utilisé pour authentifier les utilisateurs sur ou hors de notre site Web. Les informations traitées sont strictement destinées à l\'authentification.</li>',
							'<li><em>Google Analytics</em> - Ce service Google nous aide à surveiller le trafic et l\'utilisation de notre site Web.</li>',
						'</ul>',
					];
					break;
					
				case 'ja':
					$who_processes_section = [
						'<h3><a name="who-processes"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 誰が私たちのデータを処理しますか？</h3>',
						
						'<p>当社のデータの一部には、第三者処理が使用されています。</p>',
						
						'<ul>',
							'<li><em>Google OAuth</em> - Google OAuth 2.0認証システムは、当社のWebサイトへの出入りのユーザー認証に使用されます。 処理される情報は厳密に認証用です。</li>',
							'<li><em>Google Analytics</em> - このGoogleサービスを利用すると、Webサイトのトラフィックと使用状況を監視できます。</li>',
						'</ul>',
					];
					break;
					
				case 'it':
					$who_processes_section = [
						'<h3><a name="who-processes"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Chi elabora i nostri dati?</h3>',
						
						'<p>Usiamo l\'elaborazione di terze parti su alcuni dei nostri dati :</p>',
						
						'<ul>',
							'<li><em>Google OAuth</em> - Il sistema di autenticazione Google OAuth 2.0 viene utilizzato per autenticare gli utenti all\'interno o all\'esterno del nostro sito web. Le informazioni elaborate sono strettamente per l\'autenticazione.</li>',
							'<li><em>Google Analytics</em> - Questo servizio di Google ci aiuta a monitorare il traffico e l\'utilizzo del nostro sito web.</li>',
						'</ul>',
					];
					break;
					
				case 'nl':
					$who_processes_section = [
						'<h3><a name="who-processes"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Wie verwerkt onze gegevens?</h3>',
						
						'<p>We gebruiken externe verwerking voor sommige van onze gegevens :</p>',
						
						'<ul>',
							'<li><em>Google OAuth</em> - Het Google OAuth 2.0-authenticatiesysteem wordt gebruikt om gebruikers op of buiten onze website te authenticeren. De verwerkte informatie is strikt voor authenticatie.</li>',
							'<li><em>Google Analytics</em> - Met deze Google-service kunnen we het verkeer en het gebruik van onze website volgen.</li>',
						'</ul>',
					];
					break;
					
				case 'pl':
					$who_processes_section = [
						'<h3><a name="who-processes"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Kto przetwarza nasze dane?</h3>',
						
						'<p>W przypadku niektórych naszych danych wykorzystujemy przetwarzanie zewnętrzne :</p>',
						
						'<ul>',
							'<li><em>Google OAuth</em> - System uwierzytelniania Google OAuth 2.0 służy do uwierzytelniania użytkowników w naszej witrynie lub poza nią. Przetwarzane informacje są wyłącznie w celu uwierzytelnienia.</li>',
							'<li><em>Google Analytics</em> - Ta usługa Google pomaga nam monitorować ruch i korzystanie z naszej witryny.</li>',
						'</ul>',
					];
					break;
				
				case 'pt':
					$who_processes_section = [
						'<h3><a name="who-processes"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Quem processa nossos dados?</h3>',
						
						'<p>Usamos o processamento de terceiros em alguns de nossos dados :</p>',
						
						'<ul>',
							'<li><em>Google OAuth</em> - O sistema de autenticação do Google OAuth 2.0 é usado para autenticar usuários dentro ou fora do nosso site. A informação processada é estritamente para autenticação.</li>',
							'<li><em>Google Analytics</em> - Este serviço do Google nos ajuda a monitorar o tráfego e o uso de nosso website.</li>',
						'</ul>',
					];
					break;
					
				case 'ru':
					$who_processes_section = [
						'<h3><a name="who-processes"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Кто обрабатывает наши данные?</h3>',
						
						'<p>Мы используем стороннюю обработку некоторых наших данных :</p>',
						
						'<ul>',
							'<li><em>Google OAuth</em> - Система аутентификации Google OAuth 2.0 используется для аутентификации пользователей на нашем веб-сайте или за его пределами. Информация обрабатывается исключительно для аутентификации.</li>',
							'<li><em>Google Analytics</em> - Этот сервис Google помогает нам отслеживать трафик и использование нашего веб-сайта.</li>',
						'</ul>',
					];
					break;
				
				case 'tr':
					$who_processes_section = [
						'<h3><a name="who-processes"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Verilerimizi kim işliyor?</h3>',
						
						'<p>Verilerimizin bazılarında üçüncü taraf işlemlerini kullanıyoruz :</p>',
						
						'<ul>',
							'<li><em>Google OAuth</em> - Google OAuth 2.0 kimlik doğrulama sistemi, web sitemizdeki veya dışındaki kullanıcıların kimliklerini doğrulamak için kullanılır. İşlenen bilgiler kesinlikle kimlik doğrulaması içindir.</li>',
							'<li><em>Google Analytics</em> - Bu Google hizmeti, web sitemizin trafiğini ve kullanımını izlememize yardımcı olmaktadır.</li>',
						'</ul>',
					];
					break;
					
				case 'zh':
					$who_processes_section = [
						'<h3><a name="who-processes"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 谁处理我们的数据？</h3>',
						
						'<p>我们对部分数据使用第三方处理 ：</p>',
						
						'<ul>',
							'<li><em>Google OAuth</em> - Google OAuth 2.0身份验证系统用于对进出我们网站的用户进行身份验证。 处理的信息严格用于身份验证。</li>',
							'<li><em>Google Analytics</em> - 此Google服务可帮助我们监控网站的流量和使用情况。</li>',
						'</ul>',
					];
					break;
			}
			
			return $who_processes_section;
		}
		
		public function getDataPortabilitySection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$data_portability_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$data_portability_section = [
						'<h3><a name="data-portability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How do I get a copy of my personal information on this site?</h3>',
						
						'<p>If you would like to download what information we have collected, you can do so by inserting your username into the URL, https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=(Your Username Here), for example...</p>',
						
						'<blockquote><a href="https://www.' . $this->domain_object->host . '.com/users.php?action=exportuser&user=holdoffhunger" target="_blank">https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=holdoffhunger</a></blockquote>',
					];
					break;
					
				case 'de':
					$data_portability_section = [
						'<h3><a name="data-portability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Wie erhalte ich eine Kopie meiner persönlichen Informationen auf dieser Website?</h3>',
						
						'<p>Wenn Sie herunterladen möchten, welche Informationen wir gesammelt haben, können Sie dies tun, indem Sie Ihren Benutzernamen in die URL eingeben, https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=(Ihr Benutzername hier), zum Beispiel...</p>',
						
						'<blockquote><a href="https://www.' . $this->domain_object->host . '.com/users.php?action=exportuser&user=holdoffhunger" target="_blank">https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=holdoffhunger</a></blockquote>',
					];
					break;
					
				case 'es':
					$data_portability_section = [
						'<h3><a name="data-portability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : ¿Cómo obtengo una copia de mi información personal en este sitio?</h3>',
						
						'<p>Si desea descargar la información que hemos recopilado, puede hacerlo insertando su nombre de usuario en la URL, https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=(Su nombre de usuario aquí), por ejemplo...</p>',
						
						'<blockquote><a href="https://www.' . $this->domain_object->host . '.com/users.php?action=exportuser&user=holdoffhunger" target="_blank">https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=holdoffhunger</a></blockquote>',
					];
					break;
				
				case 'fr':
					$data_portability_section = [
						'<h3><a name="data-portability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Comment puis-je obtenir une copie de mes informations personnelles sur ce site?</h3>',
						
						'<p>Si vous souhaitez télécharger les informations que nous avons collectées, vous pouvez le faire en insérant votre nom d\'utilisateur dans l\'URL, https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=(Votre nom d\'utilisateur ici), par exemple...</p>',
						
						'<blockquote><a href="https://www.' . $this->domain_object->host . '.com/users.php?action=exportuser&user=holdoffhunger" target="_blank">https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=holdoffhunger</a></blockquote>',
					];
					break;
					
				case 'ja':
					$data_portability_section = [
						'<h3><a name="data-portability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : このサイトで私の個人情報のコピーを入手するにはどうすればいいですか？</h3>',
						
						'<p>収集した情報をダウンロードする場合は、ユーザー名をURLに挿入してください, https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=(ここにあなたのユーザー名), 例えば...</p>',
						
						'<blockquote><a href="https://www.' . $this->domain_object->host . '.com/users.php?action=exportuser&user=holdoffhunger" target="_blank">https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=holdoffhunger</a></blockquote>',
					];
					break;
					
				case 'it':
					$data_portability_section = [
						'<h3><a name="data-portability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Come posso ottenere una copia delle mie informazioni personali su questo sito?</h3>',
						
						'<p>Se desideri scaricare le informazioni che abbiamo raccolto, puoi farlo inserendo il tuo nome utente nell\'URL, https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=(Il tuo nome utente qui), per esempio...</p>',
						
						'<blockquote><a href="https://www.' . $this->domain_object->host . '.com/users.php?action=exportuser&user=holdoffhunger" target="_blank">https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=holdoffhunger</a></blockquote>',
					];
					break;
					
				case 'nl':
					$data_portability_section = [
						'<h3><a name="data-portability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Hoe krijg ik een kopie van mijn persoonlijke informatie op deze site?</h3>',
						
						'<p>Als u wilt downloaden welke informatie we hebben verzameld, kunt u dit doen door uw gebruikersnaam in de URL in te voegen, https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=(Uw gebruikersnaam hier), bijvoorbeeld...</p>',
						
						'<blockquote><a href="https://www.' . $this->domain_object->host . '.com/users.php?action=exportuser&user=holdoffhunger" target="_blank">https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=holdoffhunger</a></blockquote>',
					];
					break;
					
				case 'pl':
					$data_portability_section = [
						'<h3><a name="data-portability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Jak mogę uzyskać kopię moich danych osobowych na tej stronie?</h3>',
						
						'<p>Jeśli chcesz pobrać zebrane informacje, możesz to zrobić, wstawiając swoją nazwę użytkownika do adresu URL, https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=(Twoja nazwa użytkownika tutaj), na przykład...</p>',
						
						'<blockquote><a href="https://www.' . $this->domain_object->host . '.com/users.php?action=exportuser&user=holdoffhunger" target="_blank">https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=holdoffhunger</a></blockquote>',
					];
					break;
				
				case 'pt':
					$data_portability_section = [
						'<h3><a name="data-portability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Como faço para obter uma cópia das minhas informações pessoais neste site?</h3>',
						
						'<p>Se você gostaria de baixar as informações que coletamos, você pode fazer isso inserindo seu nome de usuário no URL, https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=(Seu nome de usuário aqui), por exemplo...</p>',
						
						'<blockquote><a href="https://www.' . $this->domain_object->host . '.com/users.php?action=exportuser&user=holdoffhunger" target="_blank">https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=holdoffhunger</a></blockquote>',
					];
					break;
					
				case 'ru':
					$data_portability_section = [
						'<h3><a name="data-portability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Как я могу получить копию моей личной информации на этом сайте?</h3>',
						
						'<p>Если вы хотите загрузить информацию, которую мы собрали, вы можете сделать это, вставив свое имя пользователя в URL, https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=(Ваше имя пользователя здесь), например...</p>',
						
						'<blockquote><a href="https://www.' . $this->domain_object->host . '.com/users.php?action=exportuser&user=holdoffhunger" target="_blank">https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=holdoffhunger</a></blockquote>',
					];
					break;
				
				case 'tr':
					$data_portability_section = [
						'<h3><a name="data-portability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Bu sitedeki kişisel bilgilerimin bir kopyasını nasıl edinebilirim?</h3>',
						
						'<p>Hangi bilgileri topladığımızı indirmek istiyorsanız, kullanıcı adınızı URL’ye ekleyerek yapabilirsiniz., https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=(Buraya Kullanıcı Adınız), Örneğin...</p>',
						
						'<blockquote><a href="https://www.' . $this->domain_object->host . '.com/users.php?action=exportuser&user=holdoffhunger" target="_blank">https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=holdoffhunger</a></blockquote>',
					];
					break;
					
				case 'zh':
					$data_portability_section = [
						'<h3><a name="data-portability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 如何在本网站上获取我的个人信息副本？</h3>',
						
						'<p>如果您想下载我们收集的信息，您可以通过将您的用户名插入网址来实现, https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=(你的用户名在这里), 例如...</p>',
						
						'<blockquote><a href="https://www.' . $this->domain_object->host . '.com/users.php?action=exportuser&user=holdoffhunger" target="_blank">https://www.' . $this->master_record['Code'] . '/users.php?action=exportuser&user=holdoffhunger</a></blockquote>',
					];
					break;
			}
			
			return $data_portability_section;
		}
		
		public function getDataEditabilitySection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$data_editability_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$data_editability_section = [
						'<h3><a name="data-editability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How do I update my personal information on this site?</h3>',
						
						'<p>If you have a user account, you may update your user information through your user information panel after logging in.</p>',
					];
					break;
					
				case 'de':
					$data_editability_section = [
						'<h3><a name="data-editability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Wie aktualisiere ich meine persönlichen Informationen auf dieser Site?</h3>',
						
						'<p>Wenn Sie über ein Benutzerkonto verfügen, können Sie Ihre Benutzerinformationen nach der Anmeldung über den Bereich Benutzerinformationen aktualisieren.</p>',
					];
					break;
					
				case 'es':
					$data_editability_section = [
						'<h3><a name="data-editability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : ¿Cómo actualizo mi información personal en este sitio?</h3>',
						
						'<p>Si tiene una cuenta de usuario, puede actualizar su información de usuario a través de su panel de información de usuario después de iniciar sesión.</p>',
					];
					break;
				
				case 'fr':
					$data_editability_section = [
						'<h3><a name="data-editability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Comment mettre à jour mes informations personnelles sur ce site?</h3>',
						
						'<p>Si vous avez un compte d\'utilisateur, vous pouvez mettre à jour vos informations d\'utilisateur via votre panneau d\'informations d\'utilisateur après vous être connecté.</p>',
					];
					break;
					
				case 'ja':
					$data_editability_section = [
						'<h3><a name="data-editability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : このサイトの個人情報を更新するにはどうすればいいですか？</h3>',
						
						'<p>ユーザーアカウントをお持ちの場合は、ログイン後にユーザー情報パネルからユーザー情報を更新できます。</p>',
					];
					break;
					
				case 'it':
					$data_editability_section = [
						'<h3><a name="data-editability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Come posso aggiornare le mie informazioni personali su questo sito?</h3>',
						
						'<p>Se si dispone di un account utente, è possibile aggiornare le informazioni utente tramite il pannello delle informazioni dell\'utente dopo aver effettuato l\'accesso.</p>',
					];
					break;
					
				case 'nl':
					$data_editability_section = [
						'<h3><a name="data-editability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Hoe kan ik mijn persoonlijke informatie op deze site bijwerken?</h3>',
						
						'<p>Als u een gebruikersaccount hebt, kunt u uw gebruikersinformatie bijwerken via uw gebruikersinformatiepaneel na het inloggen.</p>',
					];
					break;
					
				case 'pl':
					$data_editability_section = [
						'<h3><a name="data-editability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Jak mogę zaktualizować moje dane osobowe na tej stronie?</h3>',
						
						'<p>Jeśli masz konto użytkownika, możesz zaktualizować informacje o użytkowniku za pomocą panelu informacyjnego użytkownika po zalogowaniu.</p>',
					];
					break;
				
				case 'pt':
					$data_editability_section = [
						'<h3><a name="data-editability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Como faço para atualizar minhas informações pessoais neste site?</h3>',
						
						'<p>Se você tiver uma conta de usuário, poderá atualizar as informações do usuário por meio do painel de informações do usuário após efetuar o login.</p>',
					];
					break;
					
				case 'ru':
					$data_editability_section = [
						'<h3><a name="data-editability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Как мне обновить мою личную информацию на этом сайте?</h3>',
						
						'<p>Если у вас есть учетная запись пользователя, вы можете обновить информацию о ней через панель информации о пользователе после входа в систему.</p>',
					];
					break;
				
				case 'tr':
					$data_editability_section = [
						'<h3><a name="data-editability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Bu sitedeki kişisel bilgilerimi nasıl güncellerim?</h3>',
						
						'<p>Bir kullanıcı hesabınız varsa, giriş yaptıktan sonra kullanıcı bilgilerinizi kullanıcı bilgileri panelinizden güncelleyebilirsiniz.</p>',
					];
					break;
					
				case 'zh':
					$data_editability_section = [
						'<h3><a name="data-editability"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 如何更新本网站上的个人信息？</h3>',
						
						'<p>如果您有用户帐户，则可以在登录后通过用户信息面板更新用户信息。</p>',
					];
					break;
			}
			
			return $data_editability_section;
		}
		
		public function getEraseDataSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$erase_data_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$erase_data_section = [
						'<h3><a name="erase-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Who do I contact to erase my personal information on this site?</h3>',
						
						'<p>In the event you want to have your personal information erased, please contact our Data Protection Officer (DPO), below :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
					
				case 'de':
					$erase_data_section = [
						'<h3><a name="erase-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : An wen kann ich mich wenden, um meine persönlichen Informationen auf dieser Website zu löschen?</h3>',
						
						'<p>Falls Sie Ihre persönlichen Informationen löschen möchten, wenden Sie sich bitte an unseren Datenschutzbeauftragten (DPO) :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
					
				case 'es':
					$erase_data_section = [
						'<h3><a name="erase-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : ¿Con quién me comunico para borrar mi información personal en este sitio?</h3>',
						
						'<p>En caso de que desee borrar su información personal, comuníquese con nuestro Oficial de Protección de Datos (DPO), a continuación :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
				
				case 'fr':
					$erase_data_section = [
						'<h3><a name="erase-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Qui dois-je contacter pour effacer mes informations personnelles sur ce site?</h3>',
						
						'<p>Si vous souhaitez que vos informations personnelles soient effacées, veuillez contacter notre délégué à la protection des données, ci-dessous :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
					
				case 'ja':
					$erase_data_section = [
						'<h3><a name="erase-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : このサイトの個人情報を消去するために誰に連絡すればよいですか</h3>',
						
						'<p>個人情報を消去したい場合は、下記のデータ保護責任者（DPO）に連絡してください。</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
					
				case 'it':
					$erase_data_section = [
						'<h3><a name="erase-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Chi devo contattare per cancellare le mie informazioni personali su questo sito?</h3>',
						
						'<p>Nel caso in cui desideri cancellare le tue informazioni personali, contatta il nostro Responsabile della protezione dei dati (DPO), di seguito :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
					
				case 'nl':
					$erase_data_section = [
						'<h3><a name="erase-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Met wie neem ik contact op om mijn persoonlijke gegevens op deze site te wissen?</h3>',
						
						'<p>Als u wilt dat uw persoonlijke gegevens worden gewist, neem dan contact op met onze gegevensbeschermingsfunctionaris (DPO) hieronder :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
					
				case 'pl':
					$erase_data_section = [
						'<h3><a name="erase-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Z kim mam się skontaktować, aby usunąć moje dane osobowe na tej stronie?</h3>',
						
						'<p>Jeśli chcesz usunąć swoje dane osobowe, skontaktuj się z naszym inspektorem ochrony danych (DPO), poniżej :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
				
				case 'pt':
					$erase_data_section = [
						'<h3><a name="erase-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Quem devo contatar para apagar minhas informações pessoais neste site?</h3>',
						
						'<p>Caso você queira apagar suas informações pessoais, entre em contato com nosso Diretor de Proteção de Dados (DPO), abaixo :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
					
				case 'ru':
					$erase_data_section = [
						'<h3><a name="erase-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : С кем мне связаться, чтобы стереть мою личную информацию на этом сайте?</h3>',
						
						'<p>Если вы хотите стереть вашу личную информацию, пожалуйста, свяжитесь с нашим сотрудником по защите данных (DPO) ниже :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
				
				case 'tr':
					$erase_data_section = [
						'<h3><a name="erase-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Bu sitedeki kişisel bilgilerimi silmek için kiminle iletişim kurabilirim?</h3>',
						
						'<p>Kişisel bilgilerinizin silinmesini istiyorsanız, lütfen aşağıdaki Veri Koruma Görevlimizle (DPO) iletişime geçin :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
					
				case 'zh':
					$erase_data_section = [
						'<h3><a name="erase-data"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 我应该联系谁来删除我在本网站上的个人信息？</h3>',
						
						'<p>如果您希望删除个人信息，请联系我们的数据保护官（DPO），如下所示 ：</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
			}
			
			return $erase_data_section;
		}
		
		public function getPrivacyViolationSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$privacy_violation_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$privacy_violation_section = [
						'<h3><a name="privacy-violation"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Who do I contact to report a violation of the Privacy Policy?</h3>',
						
						'<p>In the event you believe that something has happened that violates this privacy policy, please contact our Data Protection Officer (DPO), below :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
					
				case 'de':
					$privacy_violation_section = [
						'<h3><a name="privacy-violation"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : An wen kann ich mich wenden, um einen Verstoß gegen die Datenschutzbestimmungen zu melden?</h3>',
						
						'<p>Falls Sie glauben, dass etwas passiert ist, das gegen diese Datenschutzrichtlinie verstößt, wenden Sie sich bitte an unseren Datenschutzbeauftragten (DPO) :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
					
				case 'es':
					$privacy_violation_section = [
						'<h3><a name="privacy-violation"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : ¿Con quién me comunico para informar una violación de la Política de privacidad?</h3>',
						
						'<p>En caso de que crea que ha ocurrido algo que viola esta política de privacidad, comuníquese con nuestro Oficial de Protección de Datos (DPO), a continuación :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
				
				case 'fr':
					$privacy_violation_section = [
						'<h3><a name="privacy-violation"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Qui dois-je contacter pour signaler une violation de la politique de confidentialité?</h3>',
						
						'<p>Si vous pensez que quelque chose qui a violé la présente politique de confidentialité est arrivé, veuillez contacter notre délégué à la protection des données, ci-dessous :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
					
				case 'ja':
					$privacy_violation_section = [
						'<h3><a name="privacy-violation"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : プライバシーポリシーの違反を報告するためにだれに連絡しますか？</h3>',
						
						'<p>このプライバシーポリシーに違反するようなことが起こったと思われる場合は、下記のデータ保護責任者（DPO）に連絡してください。</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
					
				case 'it':
					$privacy_violation_section = [
						'<h3><a name="privacy-violation"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Chi devo contattare per segnalare una violazione dell\'Informativa sulla privacy?</h3>',
						
						'<p>Nel caso in cui ritieni che qualcosa sia successo che viola questa informativa sulla privacy, contatta il nostro Responsabile della protezione dei dati (DPO), di seguito :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
					
				case 'nl':
					$privacy_violation_section = [
						'<h3><a name="privacy-violation"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Met wie neem ik contact op om een schending van het privacybeleid te melden?</h3>',
						
						'<p>In het geval dat u van mening bent dat er iets is gebeurd dat in strijd is met dit privacybeleid, neem dan contact op met onze gegevensbeschermingsfunctionaris (DPO) hieronder :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
					
				case 'pl':
					$privacy_violation_section = [
						'<h3><a name="privacy-violation"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Z kim mam się skontaktować, aby zgłosić naruszenie Polityki prywatności?</h3>',
						
						'<p>Jeśli uważasz, że wydarzyło się coś, co narusza niniejszą politykę prywatności, skontaktuj się z naszym inspektorem ochrony danych (DPO), poniżej :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
				
				case 'pt':
					$privacy_violation_section = [
						'<h3><a name="privacy-violation"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Quem devo contatar para denunciar uma violação da Política de Privacidade?</h3>',
						
						'<p>Caso você acredite que algo aconteceu que viole esta política de privacidade, entre em contato com nosso Diretor de Proteção de Dados (DPO), abaixo :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
					
				case 'ru':
					$privacy_violation_section = [
						'<h3><a name="privacy-violation"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : С кем мне связаться, чтобы сообщить о нарушении Политики конфиденциальности?</h3>',
						
						'<p>Если вы считаете, что произошло что-то, что нарушает данную политику конфиденциальности, обратитесь к нашему сотруднику по защите данных (DPO) ниже :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
				
				case 'tr':
					$privacy_violation_section = [
						'<h3><a name="privacy-violation"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Gizlilik Politikasının ihlal edildiğini bildirmek için kiminle iletişim kurabilirim?</h3>',
						
						'<p>Bu gizlilik politikasını ihlal eden bir şey olduğuna inanıyorsanız, lütfen aşağıdaki Veri Koruma Görevlimizle (DPO) iletişime geçin :</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
					
				case 'zh':
					$privacy_violation_section = [
						'<h3><a name="privacy-violation"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 我应该联系谁报告违反隐私政策的行为？</h3>',
						
						'<p>如果您认为发生了违反本隐私政策的事件，请联系我们的数据保护官（DPO），如下所示：</p>',
						
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>',
					];
					break;
			}
			
			return $privacy_violation_section;
		}
		
		public function getContactEventsSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$contact_events_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$contact_events_section = [
						'<h3><a name="contact-events"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : When will we contact you?</h3>',
						
						'<p>If you are a user of this site, and we have a user account for you with an e-mail address, then you will be notified in the following events :</p>',
						
						'<ul>',
							'<li>The privacy policy was updated.</li>',
							'<li>A breach of protected user information was detected.</li>',
						'</ul>',
					];
					break;
					
				case 'de':
					$contact_events_section = [
						'<h3><a name="contact-events"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Wann werden wir Sie kontaktieren?</h3>',
						
						'<p>IWenn Sie ein Benutzer dieser Site sind und wir ein Benutzerkonto mit einer E-Mail-Adresse für Sie haben, werden Sie bei den folgenden Ereignissen benachrichtigt :</p>',
						
						'<ul>',
							'<li>Die Datenschutzerklärung wurde aktualisiert.</li>',
							'<li>Es wurde ein Verstoß gegen geschützte Benutzerinformationen festgestellt.</li>',
						'</ul>',
					];
					break;
					
				case 'es':
					$contact_events_section = [
						'<h3><a name="contact-events"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : ¿Cuándo nos pondremos en contacto con usted?</h3>',
						
						'<p>Si usted es usuario de este sitio y tenemos una cuenta de usuario para usted con una dirección de correo electrónico, se le notificará en los siguientes eventos :</p>',
						
						'<ul>',
							'<li>La política de privacidad fue actualizada.</li>',
							'<li>Se detectó una violación de la información protegida del usuario.</li>',
						'</ul>',
					];
					break;
				
				case 'fr':
					$contact_events_section = [
						'<h3><a name="contact-events"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Quand allons-nous vous contacter?</h3>',
						
						'<p>Si vous êtes un utilisateur de ce site et que nous avons un compte utilisateur pour vous avec une adresse de messagerie, vous serez averti lors des événements suivants :</p>',
						
						'<ul>',
							'<li>La politique de confidentialité a été mise à jour.</li>',
							'<li>Une violation des informations utilisateur protégées a été détectée.</li>',
						'</ul>',
					];
					break;
					
				case 'ja':
					$contact_events_section = [
						'<h3><a name="contact-events"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 私達はいつあなたに連絡しますか？</h3>',
						
						'<p>あなたがこのサイトのユーザーであり、私たちがあなたのために電子メールアドレスを持つユーザーアカウントを持っているなら、あなたは以下のイベントで通知されます ：</p>',
						
						'<ul>',
							'<li>プライバシーポリシーが更新されました。</li>',
							'<li>保護されたユーザー情報の侵害が検出されました。</li>',
						'</ul>',
					];
					break;
					
				case 'it':
					$contact_events_section = [
						'<h3><a name="contact-events"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Quando ti contatteremo?</h3>',
						
						'<p>Se sei un utente di questo sito e disponiamo di un account utente per te con un indirizzo e-mail, riceverai una notifica nei seguenti eventi :</p>',
						
						'<ul>',
							'<li>L\'informativa sulla privacy è stata aggiornata.</li>',
							'<li>È stata rilevata una violazione delle informazioni utente protette.</li>',
						'</ul>',
					];
					break;
					
				case 'nl':
					$contact_events_section = [
						'<h3><a name="contact-events"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Wanneer nemen we contact met u op?</h3>',
						
						'<p>Als u een gebruiker van deze site bent en wij een gebruikersaccount voor u hebben met een e-mailadres, ontvangt u een melding bij de volgende evenementen :</p>',
						
						'<ul>',
							'<li>Het privacybeleid is bijgewerkt.</li>',
							'<li>Een inbreuk op beveiligde gebruikersinformatie werd gedetecteerd.</li>',
						'</ul>',
					];
					break;
					
				case 'pl':
					$contact_events_section = [
						'<h3><a name="contact-events"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Kiedy się z Tobą skontaktujemy?</h3>',
						
						'<p>Jeśli jesteś użytkownikiem tej strony i mamy dla Ciebie konto użytkownika z adresem e-mail, zostaniesz o tym powiadomiony w następujących wydarzeniach :</p>',
						
						'<ul>',
							'<li>Polityka prywatności została zaktualizowana.</li>',
							'<li>Wykryto naruszenie chronionych informacji o użytkowniku.</li>',
						'</ul>',
					];
					break;
				
				case 'pt':
					$contact_events_section = [
						'<h3><a name="contact-events"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Quando entraremos em contato?</h3>',
						
						'<p>Se você é um usuário deste site, e nós temos uma conta de usuário para você com um endereço de e-mail, você será notificado nos seguintes eventos :</p>',
						
						'<ul>',
							'<li>A política de privacidade foi atualizada.</li>',
							'<li>Uma violação de informações protegidas do usuário foi detectada.</li>',
						'</ul>',
					];
					break;
					
				case 'ru':
					$contact_events_section = [
						'<h3><a name="contact-events"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Когда мы с вами свяжемся?</h3>',
						
						'<p>Если вы являетесь пользователем этого сайта, и у нас есть учетная запись для вас с адресом электронной почты, вы будете уведомлены о следующих событиях :</p>',
						
						'<ul>',
							'<li>Политика конфиденциальности была обновлена.</li>',
							'<li>Обнаружено нарушение защищенной информации пользователя.</li>',
						'</ul>',
					];
					break;
				
				case 'tr':
					$contact_events_section = [
						'<h3><a name="contact-events"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Sizinle ne zaman iletişim kuracağız?</h3>',
						
						'<p>Bu sitenin kullanıcısıysanız ve e-posta adresine sahip bir kullanıcı hesabımız varsa, aşağıdaki etkinliklerde size bilgi verilir :</p>',
						
						'<ul>',
							'<li>Gizlilik politikası güncellendi.</li>',
							'<li>Korunan kullanıcı bilgilerinde bir ihlal tespit edildi.</li>',
						'</ul>',
					];
					break;
					
				case 'zh':
					$contact_events_section = [
						'<h3><a name="contact-events"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 我们什么时候联系你？</h3>',
						
						'<p>如果您是此站点的用户，并且我们拥有一个包含电子邮件地址的用户帐户，那么您将收到以下事件的通知 :</p>',
						
						'<ul>',
							'<li>隐私政策已更新。</li>',
							'<li>检测到违反受保护的用户信息。</li>',
						'</ul>',
					];
					break;
			}
			
			return $contact_events_section;
		}
		
		public function getAvoidedSiteActivitySection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$avoided_site_activity_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$avoided_site_activity_section = [
						'<h3><a name="avoided-site-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . " : What don't we do?</h3>",
						
						'<p>We do not do any of the following things :</p>',
						
						'<ul>',
							'<li>We do not store credit card numbers.</li>',
							'<li>We do not sell, trade, or otherwise transfer your personal information to third parties.</li>',
							'<li>We do not take responsibility for third party websites when we are hyperlinking to them.</li>',
						'</ul>',
					];
					break;
					
				case 'de':
					$avoided_site_activity_section = [
						'<h3><a name="avoided-site-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . " : Was machen wir nicht?</h3>",
						
						'<p>Wir machen keine der folgenden Dinge :</p>',
						
						'<ul>',
							'<li>Wir speichern keine Kreditkartennummern.</li>',
							'<li>Wir verkaufen, tauschen oder übertragen Ihre persönlichen Informationen nicht an Dritte.</li>',
							'<li>Wir übernehmen keine Verantwortung für Websites Dritter, auf die durch Hyperlink verwiesen wird.</li>',
						'</ul>',
					];
					break;
					
				case 'es':
					$avoided_site_activity_section = [
						'<h3><a name="avoided-site-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . " : ¿Qué no hacemos?</h3>",
						
						'<p>No hacemos nada de lo siguiente :</p>',
						
						'<ul>',
							'<li>No almacenamos números de tarjetas de crédito.</li>',
							'<li>No vendemos, intercambiamos ni transferimos su información personal a terceros.</li>',
							'<li>No nos hacemos responsables de los sitios web de terceros cuando estamos hipervinculando con ellos.</li>',
						'</ul>',
					];
					break;
				
				case 'fr':
					$avoided_site_activity_section = [
						'<h3><a name="avoided-site-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . " : Que ne faisons-nous pas?</h3>",
						
						'<p>Nous ne faisons aucune des choses suivantes :</p>',
						
						'<ul>',
							'<li>Nous ne stockons pas les numéros de carte de crédit.</li>',
							'<li>Nous ne vendons, n\'échangeons ni ne transférons vos informations personnelles à des tiers.</li>',
							'<li>Nous ne prenons pas la responsabilité des sites Web de tiers lorsque nous établissons des liens hypertextes avec ceux-ci.</li>',
						'</ul>',
					];
					break;
					
				case 'ja':
					$avoided_site_activity_section = [
						'<h3><a name="avoided-site-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . " : 何しないの？</h3>",
						
						'<p>以下のことは一切行いません。</p>',
						
						'<ul>',
							'<li>クレジットカード番号は保存しません。</li>',
							'<li>私たちはあなたの個人情報を第三者に売却、取引、または他の方法で転送することはありません。</li>',
							'<li>私達がそれらにハイパーリンクしているとき私達は第三者のウェブサイトに対して責任を負いません。</li>',
						'</ul>',
					];
					break;
					
				case 'it':
					$avoided_site_activity_section = [
						'<h3><a name="avoided-site-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . " : Cosa non facciamo?</h3>",
						
						'<p>Non facciamo nessuna delle seguenti cose :</p>',
						
						'<ul>',
							'<li>Non memorizziamo i numeri delle carte di credito.</li>',
							'<li>Non vendiamo, scambiamo o altrimenti trasferiamo le vostre informazioni personali a terzi.</li>',
							'<li>Non ci assumiamo la responsabilità per i siti Web di terzi quando effettuiamo collegamenti ipertestuali a tali siti.</li>',
						'</ul>',
					];
					break;
					
				case 'nl':
					$avoided_site_activity_section = [
						'<h3><a name="avoided-site-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . " : Wat doen we niet?</h3>",
						
						'<p>We doen geen van de volgende dingen :</p>',
						
						'<ul>',
							'<li>We slaan geen creditcardnummers op.</li>',
							'<li>Wij verkopen uw persoonlijke informatie niet, verhandelen deze niet of geven deze niet op andere wijze door aan derden.</li>',
							'<li>Wij nemen geen verantwoordelijkheid voor websites van derden wanneer we hyperlinks naar hen hebben.</li>',
						'</ul>',
					];
					break;
					
				case 'pl':
					$avoided_site_activity_section = [
						'<h3><a name="avoided-site-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . " : Co nie robimy?</h3>",
						
						'<p>Nie robimy żadnej z następujących rzeczy :</p>',
						
						'<ul>',
							'<li>Nie przechowujemy numerów kart kredytowych.</li>',
							'<li>Nie sprzedajemy, nie handlujemy ani w żaden inny sposób nie przekazujemy danych osobowych stronom trzecim.</li>',
							'<li>Nie bierzemy odpowiedzialności za strony internetowe osób trzecich, gdy łączymy się z nimi.</li>',
						'</ul>',
					];
					break;
				
				case 'pt':
					$avoided_site_activity_section = [
						'<h3><a name="avoided-site-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . " : O que não fazemos?</h3>",
						
						'<p>Nós não fazemos nenhuma das seguintes coisas :</p>',
						
						'<ul>',
							'<li>Nós não armazenamos números de cartão de crédito.</li>',
							'<li>Nós não vendemos, trocamos ou transferimos suas informações pessoais para terceiros.</li>',
							'<li>Não nos responsabilizamos por sites de terceiros quando estamos vinculando a eles.</li>',
						'</ul>',
					];
					break;
					
				case 'ru':
					$avoided_site_activity_section = [
						'<h3><a name="avoided-site-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . " : Что мы не делаем?</h3>",
						
						'<p>Мы не делаем ничего из следующего :</p>',
						
						'<ul>',
							'<li>Мы не храним номера кредитных карт.</li>',
							'<li>Мы не продаем, не обмениваем или иным образом не передаем вашу личную информацию третьим лицам.</li>',
							'<li>Мы не несем ответственности за сторонние веб-сайты, когда мы ссылаемся на них.</li>',
						'</ul>',
					];
					break;
				
				case 'tr':
					$avoided_site_activity_section = [
						'<h3><a name="avoided-site-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . " : Ne yapmayız</h3>",
						
						'<p>Aşağıdakilerden hiçbirini yapmıyoruz :</p>',
						
						'<ul>',
							'<li>Kredi kartı numaralarını saklamıyoruz.</li>',
							'<li>Kişisel bilgilerinizi üçüncü şahıslara satmaz, takas etmez veya başka şekilde aktarmayız.</li>',
							'<li>Onlarla bağlantı kurarken üçüncü taraf web sitelerinin sorumluluğunu üstlenmiyoruz.</li>',
						'</ul>',
					];
					break;
					
				case 'zh':
					$avoided_site_activity_section = [
						'<h3><a name="avoided-site-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . " : 我们不做什么？</h3>",
						
						'<p>我们不做以下任何事情 ：</p>',
						
						'<ul>',
							'<li>我们不存储信用卡号码。</li>',
							'<li>我们不会将您的个人信息出售，交易或以其他方式转让给第三方。</li>',
							'<li>当我们超链接时，我们不对第三方网站负责。</li>',
						'</ul>',
					];
					break;
			}
			
			return $avoided_site_activity_section;
		}
		
		public function getPrivacyPolicyLicenseSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$privacy_policy_license_section = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$privacy_policy_license_section = [
						'<h3><a name="privacy-policy-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How is the text of this privacy policy licensed?</h3>',
						
						'<p>This privacy policy is licensed under the following terms...</p>',
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>',
					];
					break;
					
				case 'de':
					$privacy_policy_license_section = [
						'<h3><a name="privacy-policy-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Wie ist der Text dieser Datenschutzerklärung lizenziert?</h3>',
						
						'<p>Diese Datenschutzerklärung ist unter den folgenden Bedingungen lizenziert ...</p>',
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440&lang=de" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License) / Creative Commons Attribution 3.0 License (CC-BY-Lizenz)</a></blockquote>',
					];
					break;
					
				case 'es':
					$privacy_policy_license_section = [
						'<h3><a name="privacy-policy-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : ¿Cómo se licencia el texto de esta política de privacidad?</h3>',
						
						'<p>Esta política de privacidad está licenciada bajo los siguientes términos ...</p>',
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440&lang=es" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License) / Licencia Creative Commons Attribution 3.0 (licencia CC-BY)</a></blockquote>',
					];
					break;
				
				case 'fr':
					$privacy_policy_license_section = [
						'<h3><a name="privacy-policy-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Comment le texte de cette politique de confidentialité est-il autorisé?</h3>',
						
						'<p>Cette politique de confidentialité est sous licence selon les termes suivants ...</p>',
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440&lang=fr" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License) / Creative Commons Attribution 3.0 License (Licence CC-BY)</a></blockquote>',
					];
					break;
					
				case 'ja':
					$privacy_policy_license_section = [
						'<h3><a name="privacy-policy-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : このプライバシーポリシーの本文はどのようにライセンスされていますか？</h3>',
						
						'<p>このプライバシーポリシーは以下の条件の下でライセンスされています...</p>',
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440&lang=ja" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License) / クリエイティブコモンズ表示3.0ライセンス（CC-BYライセンス）</a></blockquote>',
					];
					break;
					
				case 'it':
					$privacy_policy_license_section = [
						'<h3><a name="privacy-policy-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Come viene concesso in licenza il testo di questa informativa sulla privacy?</h3>',
						
						'<p>Questa informativa sulla privacy è concessa in licenza ai seguenti termini ...</p>',
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440&lang=it" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License) / Licenza Creative Commons Attribution 3.0 (licenza CC-BY)</a></blockquote>',
					];
					break;
					
				case 'nl':
					$privacy_policy_license_section = [
						'<h3><a name="privacy-policy-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Hoe wordt de tekst van dit privacybeleid gelicentieerd?</h3>',
						
						'<p>Dit privacybeleid is gelicentieerd onder de volgende voorwaarden ...</p>',
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440&lang=nl" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License) / Creative Commons Attribution 3.0-licentie (CC-BY-licentie)</a></blockquote>',
					];
					break;
					
				case 'pl':
					$privacy_policy_license_section = [
						'<h3><a name="privacy-policy-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : W jaki sposób licencjonowana jest treść niniejszej polityki prywatności?</h3>',
						
						'<p>Niniejsza polityka prywatności jest licencjonowana na następujących warunkach ...</p>',
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440&lang=pl" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License) / Licencja Creative Commons Attribution 3.0 (licencja CC-BY)</a></blockquote>',
					];
					break;
				
				case 'pt':
					$privacy_policy_license_section = [
						'<h3><a name="privacy-policy-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Como o texto desta política de privacidade é licenciado?</h3>',
						
						'<p>Esta política de privacidade está licenciada sob os seguintes termos ...</p>',
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440&lang=pt" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License) / Licença Creative Commons Attribution 3.0 (Licença CC-BY)</a></blockquote>',
					];
					break;
					
				case 'ru':
					$privacy_policy_license_section = [
						'<h3><a name="privacy-policy-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Как лицензируется текст этой политики конфиденциальности?</h3>',
						
						'<p>Эта политика конфиденциальности лицензируется на следующих условиях ...</p>',
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440&lang=ru" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License) / Лицензия Creative Commons Attribution 3.0 (лицензия CC-BY)</a></blockquote>',
					];
					break;
				
				case 'tr':
					$privacy_policy_license_section = [
						'<h3><a name="privacy-policy-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Bu gizlilik politikasının metni nasıl lisanslanmaktadır?</h3>',
						
						'<p>Bu gizlilik politikası aşağıdaki şartlar altında lisanslanmıştır ...</p>',
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440&lang=tr" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License) / Creative Commons Atıf 3.0 Lisansı (CC-BY Lisansı)</a></blockquote>',
					];
					break;
					
				case 'zh':
					$privacy_policy_license_section = [
						'<h3><a name="privacy-policy-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 本隐私政策的文本如何获得许可？</h3>',
						
						'<p>本隐私政策根据以下条款获得许可......</p>',
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440&lang=zh" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License) / 知识共享署名3.0许可（CC-BY许可）</a></blockquote>',
					];
					break;
			}
			
			return $privacy_policy_license_section;
		}
		
						// Privacy Policy Helper Functions
						// ---------------------------------------------
		
		public function getContactUsText() {
			$text = '';
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$text = 'Contact Us';
					break;
					
				case 'de':
					$text = 'Kontaktiere uns';
					break;
					
				case 'es':
					$text = 'Contáctenos';
					break;
				
				case 'fr':
					$text = 'Contactez nous';
					break;
					
				case 'ja':
					$text = 'お問い合わせ';
					break;
					
				case 'it':
					$text = 'Contattaci';
					break;
					
				case 'nl':
					$text = 'Neem contact met ons op';
					break;
					
				case 'pl':
					$text = 'Skontaktuj się z nami';
					break;
				
				case 'pt':
					$text = 'Contate-Nos';
					break;
					
				case 'ru':
					$text = 'Связаться с нами';
					break;
				
				case 'tr':
					$text = 'Bizimle iletişime geçin';
					break;
					
				case 'zh':
					$text = '联系我们';
					break;
			}
			
			return $text;
		}
		
		public function getIPAddressesHeader() {
			$header_text = '';
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$header_text = 'IP Addresses';
					break;
					
				case 'de':
					$header_text = 'IP-Adressen';
					break;
					
				case 'es':
					$header_text = 'Direcciones IP';
					break;
				
				case 'fr':
					$header_text = 'Adresses IP';
					break;
					
				case 'ja':
					$header_text = 'IPアドレス';
					break;
					
				case 'it':
					$header_text = 'Indirizzi IP';
					break;
					
				case 'nl':
					$header_text = 'IP-adressen';
					break;
					
				case 'pl':
					$header_text = 'Adresy IP';
					break;
				
				case 'pt':
					$header_text = 'Endereços IP';
					break;
					
				case 'ru':
					$header_text = 'IP-адреса';
					break;
				
				case 'tr':
					$header_text = 'IP Adresleri';
					break;
					
				case 'zh':
					$header_text = 'IP地址';
					break;
			}
			
			return $header_text;
		}
		
		public function getTrafficAnalyticsHeader() {
			$header_text = '';
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$header_text = 'Traffic Analytics';
					break;
					
				case 'de':
					$header_text = 'Verkehrsanalysen';
					break;
					
				case 'es':
					$header_text = 'Analítica de tráfico';
					break;
				
				case 'fr':
					$header_text = 'Analyse du trafic';
					break;
					
				case 'ja':
					$header_text = 'トラフィック分析';
					break;
					
				case 'it':
					$header_text = 'Analisi del traffico';
					break;
					
				case 'nl':
					$header_text = 'Verkeersanalyse';
					break;
					
				case 'pl':
					$header_text = 'Analiza ruchu';
					break;
				
				case 'pt':
					$header_text = 'Análise de tráfego';
					break;
					
				case 'ru':
					$header_text = 'Аналитика трафика';
					break;
				
				case 'tr':
					$header_text = 'Trafik Analizi';
					break;
					
				case 'zh':
					$header_text = '流量分析';
					break;
			}
			
			return $header_text;
		}
		
		public function getUserAccountInformationHeader() {
			$header_text = '';
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$header_text = 'User Account Information';
					break;
					
				case 'de':
					$header_text = 'Informationen zum Benutzerkonto';
					break;
					
				case 'es':
					$header_text = 'Información de cuenta de usuario';
					break;
				
				case 'fr':
					$header_text = 'Informations sur le compte d\'utilisateur';
					break;
					
				case 'ja':
					$header_text = 'ユーザーアカウント情報';
					break;
					
				case 'it':
					$header_text = 'Informazioni sull\'account utente';
					break;
					
				case 'nl':
					$header_text = 'Gebruikersaccountgegevens';
					break;
					
				case 'pl':
					$header_text = 'Informacje o koncie użytkownika';
					break;
				
				case 'pt':
					$header_text = 'Informação da conta do usuário';
					break;
					
				case 'ru':
					$header_text = 'Информация об учетной записи пользователя';
					break;
				
				case 'tr':
					$header_text = 'Kullanıcı Hesap Bilgileri';
					break;
					
				case 'zh':
					$header_text = '用户帐户信息';
					break;
			}
			
			return $header_text;
		}
		
		public function getNotPersonallyIdentifiableText() {
			$text = '';
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$text = 'This <strong><u>is not</u></strong> personally-identifiable information.';
					break;
					
				case 'de':
					$text = 'Diese <strong><u>sind keine</u></strong> personenbezogenen Daten.';
					break;
					
				case 'es':
					$text = 'Esta <strong><u>no es</u> </strong> información de identificación personal.';
					break;
				
				case 'fr':
					$text = 'Esta <strong><u>no es</u></strong> información de identificación personal.';
					break;
					
				case 'ja':
					$text = 'この<strong><u>は</u></strong>個人を特定できる情報ではありません。';
					break;
					
				case 'it':
					$text = 'Questa <strong><u>non è</u></strong> informazioni identificabili personalmente.';
					break;
					
				case 'nl':
					$text = 'Deze <strong><u>is geen</u></strong> persoonlijk identificeerbare informatie.';
					break;
					
				case 'pl':
					$text = 'Ta <strong> <u>nie jest</u></strong> danymi osobowymi.';
					break;
				
				case 'pt':
					$text = 'Essa <strong><u>não é</u></strong> informações de identificação pessoal.';
					break;
					
				case 'ru':
					$text = 'Эта <strong><u>не является</u></strong> личной информацией.';
					break;
				
				case 'tr':
					$text = 'Bu <strong><u>değildir</u></strong> kişisel olarak tanımlanabilir bilgiler.';
					break;
					
				case 'zh':
					$text = '此<strong><u>不是</u></strong>个人身份信息。';
					break;
			}
			
			return $text;
		}
		
		public function getPersonallyIdentifiableText() {
			$text = '';
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$text = 'This <strong><u>is</u></strong> personally-identifiable information.';
					break;
					
				case 'de':
					$text = 'Diese <strong><u>sind</u></strong> persönlich identifizierbare Informationen.';
					break;
					
				case 'es':
					$text = 'Esta <strong><u>es</u></strong> información personal identificable.';
					break;
				
				case 'fr':
					$text = 'Ces <strong><u>sont</u></strong> des informations personnellement identifiables.';
					break;
					
				case 'ja':
					$text = 'これは個人を特定できる情報<strong><u>です</u></strong>。';
					break;
					
				case 'it':
					$text = 'Queste <strong><u>sono</u></strong> informazioni identificabili personalmente.';
					break;
					
				case 'nl':
					$text = 'Deze <strong><u>is</u></strong> persoonlijk identificeerbare informatie.';
					break;
					
				case 'pl':
					$text = 'Ta <strong><u>jest</u></strong> danymi osobowymi.';
					break;
				
				case 'pt':
					$text = 'Esta <strong><u>é</u></strong> informação de identificação pessoal.';
					break;
					
				case 'ru':
					$text = 'Эта <strong><u>является</u></strong> личной информацией.';
					break;
				
				case 'tr':
					$text = 'Bu <strong><u>is</u></strong> kişisel olarak tanımlanabilir bilgiler.';
					break;
					
				case 'zh':
					$text = '此<strong><u>是</u></strong>个人身份信息。';
					break;
			}
			
			return $text;
		}
		
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
		
		public function getImageBaseDirectory() {
			$base_directory = '/image/privacy/';
			
			if(	($this->script_format_lower == 'pdf') ||
				($this->script_format_lower == 'rtf')) {
				$base_directory = 'https://www.' . $this->domain_object->host . '.com' . $base_directory;
			}
			
			return $base_directory;
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
		
						// HTML Data
						// ---------------------------------------------
		
		public function GetHTMLFormatData_Title()
		{
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$header_title_text = 'Privacy Policy for ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'de':
					$header_title_text = 'Datenschutzerklärung für ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'es':
					$header_title_text = 'Política de privacidad para ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'fr':
					$header_title_text = 'Politique de confidentialité pour ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'ja':
					$header_title_text = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'] . 'のプライバシーポリシー';
					break;
					
				case 'it':
					$header_title_text = 'Informativa sulla privacy per ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'nl':
					$header_title_text = 'Privacybeleid voor ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'pl':
					$header_title_text = 'Polityka prywatności dla ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'pt':
					$header_title_text = 'Política de Privacidade para ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'ru':
					$header_title_text = 'Политика конфиденциальности для ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'tr':
					$header_title_text = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'] . ' için Gizlilik Politikası';
					break;
					
				case 'zh':
					$header_title_text = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'] . '的隐私政策';
					break;
			}
			
			return $this->header_title_text = $header_title_text;
		}
	}
	
?>