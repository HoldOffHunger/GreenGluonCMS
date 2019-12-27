<?php

	trait TermsOfService {
		public function getTermsOfService() {
			$terms_of_service_paragraphs = $this->getTermsOfServiceParagraphs();
			
			$terms_of_service = implode("\n\n", $terms_of_service_paragraphs);
			
			return $terms_of_service;
		}
		
		public function getTermsOfServiceImages() {
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
				'intellectual-property'=>[
					'creator'=>'Skyclick from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/creative-idea_902744',
					'original-source'=>'https://www.flaticon.com/authors/skyclick',
					'filename'=>'intellectual-property.jpg',
				],
							# image 4
				'prohibited-activity'=>[
					'creator'=>'Victor Erixon from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/forbidden-sign-icon_69317',
					'original-source'=>'https://www.flaticon.com/free-icon/forbidden-sign-icon_69317',
					'filename'=>'prohibited-activity.jpg',
				],
							# image 5
				'limited-liability-policy'=>[
					'creator'=>'Becris from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/money_489935',
					'original-source'=>'https://www.flaticon.com/free-icon/money_489935',
					'filename'=>'limited-liability.jpg',
				],
							# image 6
				'governing-law-policy'=>[
					'creator'=>'DinosoftLabs from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/auction_345529',
					'original-source'=>'https://www.flaticon.com/free-icon/auction_345529',
					'filename'=>'governing-law.jpg',
				],
							# image 7
				'third-party-websites'=>[
					'creator'=>'Gregor Cresnar from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/hierarchical-structure_126460',
					'original-source'=>'https://www.flaticon.com/free-icon/hierarchical-structure_126460',
					'filename'=>'third-party-websites.jpg',
				],
							# image 8
				'behavior-policy'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/teamwork_509653',
					'original-source'=>'https://www.flaticon.com/free-icon/teamwork_509653',
					'filename'=>'behavior-policy.jpg',
				],
							# image 9
				'agreement-policy'=>[
					'creator'=>'Pixel perfect from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/hand-shake_493881',
					'original-source'=>'https://www.flaticon.com/free-icon/hand-shake_493881',
					'filename'=>'agreement-policy.jpg',
				],
							# image 10
				'violation-policy'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/weight-balance_66236',
					'original-source'=>'https://www.flaticon.com/free-icon/weight-balance_66236',
					'filename'=>'violation-policy.jpg',
				],
							# image 11
				'user-termination-policy'=>[
					'creator'=>'Freepik from Flaticon',
					'license'=>'Flaticon Basic License',
					'source'=>'https://www.flaticon.com/free-icon/insurance_913402',
					'original-source'=>'https://www.flaticon.com/free-icon/insurance_913402',
					'filename'=>'user-termination.jpg',
				],
							# image 12
				'license-terms'=>[
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
		
		public function getTermsOfServiceParagraphs() {
			$header_index = 1;
			
			$images = $this->getTermsOfServiceImages();
			
			$terms_of_service_paragraphs = [];
			
			$terms_of_service_paragraphs =
				array_merge($terms_of_service_paragraphs,
					$this->getMissionSection([
						'image'=>$images['mission'],
						'headerindex'=>$header_index++,
					])
				);
			
			$terms_of_service_paragraphs =
				array_merge($terms_of_service_paragraphs,
					$this->getTOCSection([
						'images'=>$images,
						'headerindex'=>$header_index++,
					])
				);
			
			$terms_of_service_paragraphs =
				array_merge($terms_of_service_paragraphs,
					$this->getIntellectualPropertySection([
						'image'=>$images['intellectual-property'],
						'headerindex'=>$header_index++,
					])
				);
			
			$terms_of_service_paragraphs =
				array_merge($terms_of_service_paragraphs,
					$this->getProhibitedActivitySection([
						'image'=>$images['prohibited-activity'],
						'headerindex'=>$header_index++,
					])
				);
			
			$terms_of_service_paragraphs =
				array_merge($terms_of_service_paragraphs,
					$this->getLimitedLiabilitySection([
						'image'=>$images['limited-liability-policy'],
						'headerindex'=>$header_index++,
					])
				);
			
			$terms_of_service_paragraphs =
				array_merge($terms_of_service_paragraphs,
					$this->getGoverningLawSection([
						'image'=>$images['governing-law-policy'],
						'headerindex'=>$header_index++,
					])
				);
			
			$terms_of_service_paragraphs =
				array_merge($terms_of_service_paragraphs,
					$this->getThirdPartyWebsitesSection([
						'image'=>$images['third-party-websites'],
						'headerindex'=>$header_index++,
					])
				);
			
			$terms_of_service_paragraphs =
				array_merge($terms_of_service_paragraphs,
					$this->getBehaviorPolicySection([
						'image'=>$images['behavior-policy'],
						'headerindex'=>$header_index++,
					])
				);
			
			$terms_of_service_paragraphs =
				array_merge($terms_of_service_paragraphs,
					$this->getAgreementPolicySection([
						'image'=>$images['agreement-policy'],
						'headerindex'=>$header_index++,
					])
				);
			
			$terms_of_service_paragraphs =
				array_merge($terms_of_service_paragraphs,
					$this->getViolationPolicySection([
						'image'=>$images['violation-policy'],
						'headerindex'=>$header_index++,
					])
				);
			
			$terms_of_service_paragraphs =
				array_merge($terms_of_service_paragraphs,
					$this->getUserTerminationPolicySection([
						'image'=>$images['user-termination-policy'],
						'headerindex'=>$header_index++,
					])
				);
			
			$terms_of_service_paragraphs =
				array_merge($terms_of_service_paragraphs,
					$this->getLicenseTermsSection([
						'image'=>$images['license-terms'],
						'headerindex'=>$header_index++,
					])
				);
			
			return $terms_of_service_paragraphs;
		}
		
					// Content Sections
					// ------------------------------------------------------------
					// ------------------------------------------------------------
					// ------------------------------------------------------------
		
		public function getMissionSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$mission_section_paragraphs = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$mission_section_paragraphs[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Mission and Purpose of the Terms and Conditions</h3>';
					
					$mission_section_paragraphs[] =
						'<p>The purpose of the terms and conditions is to define what is acceptable usage of the website and what is unacceptable usage of the website.  By using this service, you agree to all of these terms and conditions of service.</p>';
					break;
					
				case 'de':
					$mission_section_paragraphs[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Auftrag und Zweck der Allgemeinen Geschäftsbedingungen</h3>';
					
					$mission_section_paragraphs[] =
						'<p>Der Zweck der Allgemeinen Geschäftsbedingungen besteht darin, die akzeptable Nutzung der Website und die nicht akzeptable Nutzung der Website festzulegen. Durch die Nutzung dieses Dienstes stimmen Sie allen diesen Nutzungsbedingungen zu.</p>';
					break;
					
				case 'es':
					$mission_section_paragraphs[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Misión y propósito de los términos y condiciones</h3>';
					
					$mission_section_paragraphs[] =
						'<p>El propósito de los términos y condiciones es definir qué es el uso aceptable del sitio web y cuál es el uso inaceptable del sitio web. Al utilizar este servicio, usted acepta todos estos términos y condiciones de servicio.</p>';
					break;
					
				case 'fr':
					$mission_section_paragraphs[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Mission et but des termes et conditions</h3>';
					
					$mission_section_paragraphs[] =
						'<p>Les termes et conditions visent à définir ce qui constitue une utilisation acceptable du site Web et une utilisation inacceptable du site. En utilisant ce service, vous acceptez l\'ensemble de ces termes et conditions de service.</p>';
					break;
					
				case 'ja':
					$mission_section_paragraphs[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 利用規約の目的と目的</h3>';
					
					$mission_section_paragraphs[] =
						'<p>利用規約の目的は、Webサイトの許容される用途とWebサイトの許容されない用途を定義することです。 このサービスを利用することで、あなたはこれらの利用規約のすべてに同意したことになります。</p>';
					break;
					
				case 'it':
					$mission_section_paragraphs[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Missione e Scopo dei Termini e Condizioni</h3>';
					
					$mission_section_paragraphs[] =
						'<p>Lo scopo dei termini e delle condizioni è definire l\'utilizzo accettabile del sito Web e l\'uso inaccettabile del sito Web. Utilizzando questo servizio, accetti tutti i presenti termini e condizioni di servizio.</p>';
					break;
					
				case 'nl':
					$mission_section_paragraphs[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Missie en doel van de algemene voorwaarden</h3>';
					
					$mission_section_paragraphs[] =
						'<p>Het doel van de algemene voorwaarden is om te definiëren wat acceptabel gebruik van de website is en wat onaanvaardbaar gebruik van de website is. Door deze service te gebruiken, gaat u akkoord met al deze servicevoorwaarden.</p>';
					break;
					
				case 'pl':
					$mission_section_paragraphs[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Misja i cel niniejszych Warunków</h3>';
					
					$mission_section_paragraphs[] =
						'<p>Celem warunków jest określenie, jakie jest dopuszczalne korzystanie ze strony internetowej i jakie jest niedopuszczalne korzystanie ze strony internetowej. Korzystając z tej usługi, akceptujesz wszystkie warunki korzystania z usługi.</p>';
					break;
					
				case 'pt':
					$mission_section_paragraphs[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Missão e Propósito dos Termos e Condições</h3>';
					
					$mission_section_paragraphs[] =
						'<p>O objetivo dos termos e condições é definir o que é o uso aceitável do site e o uso inaceitável do site. Ao usar este serviço, você concorda com todos esses termos e condições de serviço.</p>';
					break;
					
				case 'ru':
					$mission_section_paragraphs[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Миссия и цель положений и условий</h3>';
					
					$mission_section_paragraphs[] =
						'<p>Целью условий является определение того, что является допустимым использованием веб-сайта и что является недопустимым использованием веб-сайта. Используя этот сервис, вы соглашаетесь со всеми этими условиями обслуживания.</p>';
					break;
					
				case 'tr':
					$mission_section_paragraphs[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Şartlar ve Koşulların Misyonu ve Amacı</h3>';
					
					$mission_section_paragraphs[] =
						'<p>Şart ve koşulların amacı, web sitesinin kabul edilebilir kullanımının ve web sitesinin kabul edilemez kullanımının tanımlanmasıdır. Bu servisi kullanarak, bu servis şartlarının tümünü kabul etmiş olursunuz.</p>';
					break;
					
				case 'zh':
					$mission_section_paragraphs[] =
						'<h3><a name="mission"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 条款和条件的使命和目的</h3>';
					
					$mission_section_paragraphs[] =
						'<p>条款和条件的目的是定义网站的可接受用途以及网站不可接受的用途。 使用此服务即表示您同意所有这些服务条款和条件。</p>';
					break;
			}
				
			return $mission_section_paragraphs;
		}
		
		public function getTOCSection($args) {
			$header_index = $args['headerindex'];
			$images = $args['images'];
			
			$toc_paragraphs = [];
			$toc_index = 1;
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Table of Contents</h3>',
						
						'<p>Our terms and conditions are organized into the following sections :</p>' ,
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Mission and Purpose of the Terms and Conditions</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Table of Contents</a></li>',
							'<li><a href="#intellectual-property">' .
								$this->getImageIconMarkup(['image'=>$images['intellectual-property']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Intellectual Property</a></li>',
							'<li><a href="#prohibited-activity">' .
								$this->getImageIconMarkup(['image'=>$images['prohibited-activity']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Prohibited Activity</a></li>',
							'<li><a href="#limited-liability-policy">' .
								$this->getImageIconMarkup(['image'=>$images['limited-liability-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Limited Liability Policy</a></li>',
							'<li><a href="#governing-law-policy">' .
								$this->getImageIconMarkup(['image'=>$images['governing-law-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Governing Law Policy</a></li>',
							'<li><a href="#third-party-websites">' .
								$this->getImageIconMarkup(['image'=>$images['third-party-websites']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Third Party Websites</a></li>',
							'<li><a href="#behavior-policy">' .
								$this->getImageIconMarkup(['image'=>$images['behavior-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Behavior Policy</a></li>',
							'<li><a href="#agreement-policy">' .
								$this->getImageIconMarkup(['image'=>$images['agreement-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Agreement Policy</a></li>',
							'<li><a href="#violation-policy">' .
								$this->getImageIconMarkup(['image'=>$images['violation-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Violation Policy</a></li>',
							'<li><a href="#user-termination-policy">' .
								$this->getImageIconMarkup(['image'=>$images['user-termination-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : User Termination Policy</a></li>',
							'<li><a href="#terms-of-service-license">' .
								$this->getImageIconMarkup(['image'=>$images['license-terms']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : How is the text of these terms of service licensed?</a></li>',
						'</ul>',
					];
					
					break;
					
				case 'de':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inhaltsverzeichnis</h3>',
						
						'<p>Unsere Geschäftsbedingungen sind in folgende Abschnitte gegliedert :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Auftrag und Zweck der Allgemeinen Geschäftsbedingungen</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Inhaltsverzeichnis</a></li>',
							'<li><a href="#intellectual-property">' .
								$this->getImageIconMarkup(['image'=>$images['intellectual-property']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Geistiges Eigentum</a></li>',
							'<li><a href="#prohibited-activity">' .
								$this->getImageIconMarkup(['image'=>$images['prohibited-activity']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Verbotene Aktivität</a></li>',
							'<li><a href="#limited-liability-policy">' .
								$this->getImageIconMarkup(['image'=>$images['limited-liability-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Haftungsbeschränkung</a></li>',
							'<li><a href="#governing-law-policy">' .
								$this->getImageIconMarkup(['image'=>$images['governing-law-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Geltende Rechtspolitik</a></li>',
							'<li><a href="#third-party-websites">' .
								$this->getImageIconMarkup(['image'=>$images['third-party-websites']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Websites von Drittanbietern</a></li>',
							'<li><a href="#behavior-policy">' .
								$this->getImageIconMarkup(['image'=>$images['behavior-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Verhaltensrichtlinie</a></li>',
							'<li><a href="#agreement-policy">' .
								$this->getImageIconMarkup(['image'=>$images['agreement-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Vereinbarung</a></li>',
							'<li><a href="#violation-policy">' .
								$this->getImageIconMarkup(['image'=>$images['violation-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Verstoßrichtlinie</a></li>',
							'<li><a href="#user-termination-policy">' .
								$this->getImageIconMarkup(['image'=>$images['user-termination-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Kündigungsrichtlinie für Benutzer</a></li>',
							'<li><a href="#terms-of-service-license">' .
								$this->getImageIconMarkup(['image'=>$images['license-terms']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Wie ist der Text dieser Nutzungsbedingungen lizenziert?</a></li>',
						'</ul>',
					];
					
					break;
					
				case 'es':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Tabla de contenido</h3>',
						
						'<p>Nuestros términos y condiciones están organizados en las siguientes secciones :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Misión y propósito de los términos y condiciones</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Tabla de contenido</a></li>',
							'<li><a href="#intellectual-property">' .
								$this->getImageIconMarkup(['image'=>$images['intellectual-property']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Propiedad intelectual</a></li>',
							'<li><a href="#prohibited-activity">' .
								$this->getImageIconMarkup(['image'=>$images['prohibited-activity']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Actividad prohibida</a></li>',
							'<li><a href="#limited-liability-policy">' .
								$this->getImageIconMarkup(['image'=>$images['limited-liability-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Política de responsabilidad limitada</a></li>',
							'<li><a href="#governing-law-policy">' .
								$this->getImageIconMarkup(['image'=>$images['governing-law-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Política de derecho aplicable</a></li>',
							'<li><a href="#third-party-websites">' .
								$this->getImageIconMarkup(['image'=>$images['third-party-websites']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Sitios web de terceros</a></li>',
							'<li><a href="#behavior-policy">' .
								$this->getImageIconMarkup(['image'=>$images['behavior-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Política de comportamiento</a></li>',
							'<li><a href="#agreement-policy">' .
								$this->getImageIconMarkup(['image'=>$images['agreement-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Política de acuerdo</a></li>',
							'<li><a href="#violation-policy">' .
								$this->getImageIconMarkup(['image'=>$images['violation-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Política de violación</a></li>',
							'<li><a href="#user-termination-policy">' .
								$this->getImageIconMarkup(['image'=>$images['user-termination-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Política de terminación de usuario</a></li>',
							'<li><a href="#terms-of-service-license">' .
								$this->getImageIconMarkup(['image'=>$images['license-terms']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : ¿Cómo se licencia el texto de estos términos de servicio?</a></li>',
						'</ul>',
					];
					
					break;
					
				case 'fr':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Table des matières</h3>',
						
						'<p>Nos conditions générales sont organisées dans les sections suivantes :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Mission et but des termes et conditions</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Table des matières</a></li>',
							'<li><a href="#intellectual-property">' .
								$this->getImageIconMarkup(['image'=>$images['intellectual-property']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Propriété intellectuelle</a></li>',
							'<li><a href="#prohibited-activity">' .
								$this->getImageIconMarkup(['image'=>$images['prohibited-activity']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Activité interdite</a></li>',
							'<li><a href="#limited-liability-policy">' .
								$this->getImageIconMarkup(['image'=>$images['limited-liability-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Politique de responsabilité limitée</a></li>',
							'<li><a href="#governing-law-policy">' .
								$this->getImageIconMarkup(['image'=>$images['governing-law-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Politique du droit applicable</a></li>',
							'<li><a href="#third-party-websites">' .
								$this->getImageIconMarkup(['image'=>$images['third-party-websites']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Sites Web de tiers</a></li>',
							'<li><a href="#behavior-policy">' .
								$this->getImageIconMarkup(['image'=>$images['behavior-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Politique de comportement</a></li>',
							'<li><a href="#agreement-policy">' .
								$this->getImageIconMarkup(['image'=>$images['agreement-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Politique d\'accord</a></li>',
							'<li><a href="#violation-policy">' .
								$this->getImageIconMarkup(['image'=>$images['violation-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Politique de violation</a></li>',
							'<li><a href="#user-termination-policy">' .
								$this->getImageIconMarkup(['image'=>$images['user-termination-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Politique de résiliation d\'utilisateur</a></li>',
							'<li><a href="#terms-of-service-license">' .
								$this->getImageIconMarkup(['image'=>$images['license-terms']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Comment le texte de ces conditions d\'utilisation est-il concédé sous licence?</a></li>',
						'</ul>',
					];
					
					break;
					
				case 'ja':
					
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 目次</h3>',
						
						'<p>当社の利用規約は、以下のセクションにまとめられています。</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 利用規約の目的と目的</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 目次</a></li>',
							'<li><a href="#intellectual-property">' .
								$this->getImageIconMarkup(['image'=>$images['intellectual-property']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 知的財産</a></li>',
							'<li><a href="#prohibited-activity">' .
								$this->getImageIconMarkup(['image'=>$images['prohibited-activity']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 禁止されている活動</a></li>',
							'<li><a href="#limited-liability-policy">' .
								$this->getImageIconMarkup(['image'=>$images['limited-liability-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 有限責任ポリシー</a></li>',
							'<li><a href="#governing-law-policy">' .
								$this->getImageIconMarkup(['image'=>$images['governing-law-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 準拠法ポリシー</a></li>',
							'<li><a href="#third-party-websites">' .
								$this->getImageIconMarkup(['image'=>$images['third-party-websites']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 第三者のウェブサイト</a></li>',
							'<li><a href="#behavior-policy">' .
								$this->getImageIconMarkup(['image'=>$images['behavior-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 行動方針</a></li>',
							'<li><a href="#agreement-policy">' .
								$this->getImageIconMarkup(['image'=>$images['agreement-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 契約ポリシー</a></li>',
							'<li><a href="#violation-policy">' .
								$this->getImageIconMarkup(['image'=>$images['violation-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 違反ポリシー</a></li>',
							'<li><a href="#user-termination-policy">' .
								$this->getImageIconMarkup(['image'=>$images['user-termination-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : ユーザー終了ポリシー</a></li>',
							'<li><a href="#terms-of-service-license">' .
								$this->getImageIconMarkup(['image'=>$images['license-terms']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : これらの利用規約のテキストはどのようにライセンスされていますか？</a></li>',
						'</ul>',
					];
					
					break;
					
				case 'it':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Sommario</h3>',
						
						'<p>I nostri termini e condizioni sono organizzati nelle seguenti sezioni :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Missione e Scopo dei Termini e Condizioni</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Sommario</a></li>',
							'<li><a href="#intellectual-property">' .
								$this->getImageIconMarkup(['image'=>$images['intellectual-property']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Proprietà intellettuale</a></li>',
							'<li><a href="#prohibited-activity">' .
								$this->getImageIconMarkup(['image'=>$images['prohibited-activity']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Attività vietata</a></li>',
							'<li><a href="#limited-liability-policy">' .
								$this->getImageIconMarkup(['image'=>$images['limited-liability-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Politica di responsabilità limitata</a></li>',
							'<li><a href="#governing-law-policy">' .
								$this->getImageIconMarkup(['image'=>$images['governing-law-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Politica di diritto applicabile</a></li>',
							'<li><a href="#third-party-websites">' .
								$this->getImageIconMarkup(['image'=>$images['third-party-websites']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Siti Web di terze parti</a></li>',
							'<li><a href="#behavior-policy">' .
								$this->getImageIconMarkup(['image'=>$images['behavior-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Politica di comportamento</a></li>',
							'<li><a href="#agreement-policy">' .
								$this->getImageIconMarkup(['image'=>$images['agreement-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Politica d\'Accordo</a></li>',
							'<li><a href="#violation-policy">' .
								$this->getImageIconMarkup(['image'=>$images['violation-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Politica di violazione</a></li>',
							'<li><a href="#user-termination-policy">' .
								$this->getImageIconMarkup(['image'=>$images['user-termination-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Politica di risoluzione degli utenti</a></li>',
							'<li><a href="#terms-of-service-license">' .
								$this->getImageIconMarkup(['image'=>$images['license-terms']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Come viene concesso in licenza il testo di questi termini di servizio?</a></li>',
						'</ul>',
					];
					
					break;
					
				case 'nl':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Inhoudsopgave</h3>',
						
						'<p>Onze algemene voorwaarden zijn onderverdeeld in de volgende secties :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Missie en doel van de algemene voorwaarden</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Inhoudsopgave</a></li>',
							'<li><a href="#intellectual-property">' .
								$this->getImageIconMarkup(['image'=>$images['intellectual-property']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Intellectueel eigendom</a></li>',
							'<li><a href="#prohibited-activity">' .
								$this->getImageIconMarkup(['image'=>$images['prohibited-activity']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Verboden activiteit</a></li>',
							'<li><a href="#limited-liability-policy">' .
								$this->getImageIconMarkup(['image'=>$images['limited-liability-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Beperkt aansprakelijkheidsbeleid</a></li>',
							'<li><a href="#governing-law-policy">' .
								$this->getImageIconMarkup(['image'=>$images['governing-law-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Governing Law Policy</a></li>',
							'<li><a href="#third-party-websites">' .
								$this->getImageIconMarkup(['image'=>$images['third-party-websites']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Websites van derden</a></li>',
							'<li><a href="#behavior-policy">' .
								$this->getImageIconMarkup(['image'=>$images['behavior-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Gedragsbeleid</a></li>',
							'<li><a href="#agreement-policy">' .
								$this->getImageIconMarkup(['image'=>$images['agreement-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Overeenkomst beleid</a></li>',
							'<li><a href="#violation-policy">' .
								$this->getImageIconMarkup(['image'=>$images['violation-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Overtredingbeleid</a></li>',
							'<li><a href="#user-termination-policy">' .
								$this->getImageIconMarkup(['image'=>$images['user-termination-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Gebruikersbeëindigingsbeleid</a></li>',
							'<li><a href="#terms-of-service-license">' .
								$this->getImageIconMarkup(['image'=>$images['license-terms']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Hoe wordt de tekst van deze servicevoorwaarden in licentie gegeven?</a></li>',
						'</ul>',
					];
					
					break;
					
				case 'pl':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Spis treści</h3>',
						
						'<p>Nasze zasady i warunki są podzielone na następujące sekcje :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Misja i cel niniejszych Warunków</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Spis treści</a></li>',
							'<li><a href="#intellectual-property">' .
								$this->getImageIconMarkup(['image'=>$images['intellectual-property']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Własność intelektualna</a></li>',
							'<li><a href="#prohibited-activity">' .
								$this->getImageIconMarkup(['image'=>$images['prohibited-activity']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Zabroniona aktywność</a></li>',
							'<li><a href="#limited-liability-policy">' .
								$this->getImageIconMarkup(['image'=>$images['limited-liability-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Polityka ograniczonej odpowiedzialności</a></li>',
							'<li><a href="#governing-law-policy">' .
								$this->getImageIconMarkup(['image'=>$images['governing-law-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Polityka obowiązującego prawa</a></li>',
							'<li><a href="#third-party-websites">' .
								$this->getImageIconMarkup(['image'=>$images['third-party-websites']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Witryny stron trzecich</a></li>',
							'<li><a href="#behavior-policy">' .
								$this->getImageIconMarkup(['image'=>$images['behavior-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Zasady zachowania</a></li>',
							'<li><a href="#agreement-policy">' .
								$this->getImageIconMarkup(['image'=>$images['agreement-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Zasady umowy</a></li>',
							'<li><a href="#violation-policy">' .
								$this->getImageIconMarkup(['image'=>$images['violation-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Polityka naruszenia</a></li>',
							'<li><a href="#user-termination-policy">' .
								$this->getImageIconMarkup(['image'=>$images['user-termination-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Zasady rezygnacji użytkownika</a></li>',
							'<li><a href="#terms-of-service-license">' .
								$this->getImageIconMarkup(['image'=>$images['license-terms']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : W jaki sposób licencjonowany jest tekst niniejszych warunków świadczenia usług?</a></li>',
						'</ul>',
					];
					
					break;
					
				case 'pt':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Índice</h3>',
						
						'<p>Nossos termos e condições estão organizados nas seguintes seções :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Missão e Propósito dos Termos e Condições</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Índice</a></li>',
							'<li><a href="#intellectual-property">' .
								$this->getImageIconMarkup(['image'=>$images['intellectual-property']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Propriedade intelectual</a></li>',
							'<li><a href="#prohibited-activity">' .
								$this->getImageIconMarkup(['image'=>$images['prohibited-activity']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Atividade proibida</a></li>',
							'<li><a href="#limited-liability-policy">' .
								$this->getImageIconMarkup(['image'=>$images['limited-liability-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Política de Responsabilidade Limitada</a></li>',
							'<li><a href="#governing-law-policy">' .
								$this->getImageIconMarkup(['image'=>$images['governing-law-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Política de direito governante</a></li>',
							'<li><a href="#third-party-websites">' .
								$this->getImageIconMarkup(['image'=>$images['third-party-websites']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Websites de Terceiros</a></li>',
							'<li><a href="#behavior-policy">' .
								$this->getImageIconMarkup(['image'=>$images['behavior-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Política de Comportamento</a></li>',
							'<li><a href="#agreement-policy">' .
								$this->getImageIconMarkup(['image'=>$images['agreement-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Política de acordo</a></li>',
							'<li><a href="#violation-policy">' .
								$this->getImageIconMarkup(['image'=>$images['violation-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Política de Violação</a></li>',
							'<li><a href="#user-termination-policy">' .
								$this->getImageIconMarkup(['image'=>$images['user-termination-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Política de rescisão de usuário</a></li>',
							'<li><a href="#terms-of-service-license">' .
								$this->getImageIconMarkup(['image'=>$images['license-terms']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Como o texto destes termos de serviço é licenciado?</a></li>',
						'</ul>',
					];
					
					break;
					
				case 'ru':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Оглавление</h3>',
						
						'<p>Наши условия и положения разбиты на следующие разделы :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Миссия и цель положений и условий</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Оглавление</a></li>',
							'<li><a href="#intellectual-property">' .
								$this->getImageIconMarkup(['image'=>$images['intellectual-property']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Интеллектуальная собственность</a></li>',
							'<li><a href="#prohibited-activity">' .
								$this->getImageIconMarkup(['image'=>$images['prohibited-activity']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Запрещенная деятельность</a></li>',
							'<li><a href="#limited-liability-policy">' .
								$this->getImageIconMarkup(['image'=>$images['limited-liability-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Политика ограниченной ответственности</a></li>',
							'<li><a href="#governing-law-policy">' .
								$this->getImageIconMarkup(['image'=>$images['governing-law-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Политика регулирующего права</a></li>',
							'<li><a href="#third-party-websites">' .
								$this->getImageIconMarkup(['image'=>$images['third-party-websites']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Сторонние сайты</a></li>',
							'<li><a href="#behavior-policy">' .
								$this->getImageIconMarkup(['image'=>$images['behavior-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Политика поведения</a></li>',
							'<li><a href="#agreement-policy">' .
								$this->getImageIconMarkup(['image'=>$images['agreement-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Соглашение о политике</a></li>',
							'<li><a href="#violation-policy">' .
								$this->getImageIconMarkup(['image'=>$images['violation-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Нарушение политики</a></li>',
							'<li><a href="#user-termination-policy">' .
								$this->getImageIconMarkup(['image'=>$images['user-termination-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Политика прекращения использования</a></li>',
							'<li><a href="#terms-of-service-license">' .
								$this->getImageIconMarkup(['image'=>$images['license-terms']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Как текст этих условий обслуживания лицензируется?</a></li>',
						'</ul>',
					];
					
					break;
					
				case 'tr':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : İçindekiler</h3>',
						
						'<p>Hüküm ve koşullarımız aşağıdaki bölümlerde düzenlenmiştir :</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Şartlar ve Koşulların Misyonu ve Amacı</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : İçindekiler</a></li>',
							'<li><a href="#intellectual-property">' .
								$this->getImageIconMarkup(['image'=>$images['intellectual-property']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Fikri mülkiyet</a></li>',
							'<li><a href="#prohibited-activity">' .
								$this->getImageIconMarkup(['image'=>$images['prohibited-activity']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Yasaklanmış Faaliyet</a></li>',
							'<li><a href="#limited-liability-policy">' .
								$this->getImageIconMarkup(['image'=>$images['limited-liability-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Sınırlı Sorumluluk Politikası</a></li>',
							'<li><a href="#governing-law-policy">' .
								$this->getImageIconMarkup(['image'=>$images['governing-law-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Geçerli Hukuk Politikası</a></li>',
							'<li><a href="#third-party-websites">' .
								$this->getImageIconMarkup(['image'=>$images['third-party-websites']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Üçüncü Parti Web Siteleri</a></li>',
							'<li><a href="#behavior-policy">' .
								$this->getImageIconMarkup(['image'=>$images['behavior-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Davranış Politikası</a></li>',
							'<li><a href="#agreement-policy">' .
								$this->getImageIconMarkup(['image'=>$images['agreement-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Anlaşma Politikası</a></li>',
							'<li><a href="#violation-policy">' .
								$this->getImageIconMarkup(['image'=>$images['violation-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : İhlal Politikası</a></li>',
							'<li><a href="#user-termination-policy">' .
								$this->getImageIconMarkup(['image'=>$images['user-termination-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Kullanıcı Sonlandırma Politikası</a></li>',
							'<li><a href="#terms-of-service-license">' .
								$this->getImageIconMarkup(['image'=>$images['license-terms']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : Bu hizmet şartlarının metni nasıl lisanslanır?</a></li>',
						'</ul>',
					];
					
					break;
					
				case 'zh':
					$toc_paragraphs = [
						'<h3><a name="table-of-contents"></a>' .
						$this->getImageMarkup(['image'=>$images['table-of-contents']]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 目录</h3>',
						
						'<p>我们的条款和条件分为以下几个部分 ：</p>',
						
						'<ul>',
							'<li><a href="#mission">' .
								$this->getImageIconMarkup(['image'=>$images['mission']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 条款和条件的使命和目的</a></li>',
							'<li><a href="#table-of-contents">' .
								$this->getImageIconMarkup(['image'=>$images['table-of-contents']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 目录</a></li>',
							'<li><a href="#intellectual-property">' .
								$this->getImageIconMarkup(['image'=>$images['intellectual-property']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 知识产权</a></li>',
							'<li><a href="#prohibited-activity">' .
								$this->getImageIconMarkup(['image'=>$images['prohibited-activity']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 禁止的活动</a></li>',
							'<li><a href="#limited-liability-policy">' .
								$this->getImageIconMarkup(['image'=>$images['limited-liability-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 有限责任政策</a></li>',
							'<li><a href="#governing-law-policy">' .
								$this->getImageIconMarkup(['image'=>$images['governing-law-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 适用法律政策</a></li>',
							'<li><a href="#third-party-websites">' .
								$this->getImageIconMarkup(['image'=>$images['third-party-websites']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 第三方网站</a></li>',
							'<li><a href="#behavior-policy">' .
								$this->getImageIconMarkup(['image'=>$images['behavior-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 行为政策</a></li>',
							'<li><a href="#agreement-policy">' .
								$this->getImageIconMarkup(['image'=>$images['agreement-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 协议政策</a></li>',
							'<li><a href="#violation-policy">' .
								$this->getImageIconMarkup(['image'=>$images['violation-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 违反政策</a></li>',
							'<li><a href="#user-termination-policy">' .
								$this->getImageIconMarkup(['image'=>$images['user-termination-policy']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 用户终止政策</a></li>',
							'<li><a href="#terms-of-service-license">' .
								$this->getImageIconMarkup(['image'=>$images['license-terms']]) .
								$this->getSectionText(['headerindex'=>$toc_index++]) . ' : 这些服务条款的文本如何获得许可？</a></li>',
						'</ul>',
					];
					
					break;
			}
			
			return $toc_paragraphs;
		}
		
		public function getIntellectualPropertySection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$intellectual_property_paragraphs = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$intellectual_property_paragraphs[] =
						'<h3><a name="intellectual-property"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Intellectual Property</h3>';
					
					$intellectual_property_paragraphs[] =
						'<p>We maintain the following terms and conditions regarding intellectual property :</p>' .
							'<ul>' .
								'<li><em>Material We Publish and Own</em> - Our website is the owner of the intellectual property in this case.</li>' .
								'<li><em>Material We Publish and Do Not Own</em> - This material is released under the provisions of the Fair Use Act.</li>' .
								'<li><em>Material Users Publish and Own</em> - Any material published by a user of this website, when owned by that user, is retained as property of that user.  We reserve the right to use that material for promotional or advertizing purposes only.</li>' .
								'<li><em>Material Users Publish and Do Not Own</em> - We do not take any responsibility for any user who has posted intellectual property that they do not own or have the right to repost.  If you think you own intellectual property that has been irresponsibly redistributed through this site, then you are urged to contact us.  We cooperate with all valid copyright and intellectual property complaints.</li>' .
							'</ul>';
					break;
					
				case 'de':
					$intellectual_property_paragraphs[] =
						'<h3><a name="intellectual-property"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Geistiges Eigentum</h3>';
					
					$intellectual_property_paragraphs[] =
						'<p>Wir halten uns an die folgenden Bedingungen in Bezug auf geistiges Eigentum :</p>' .
							'<ul>' .
								'<li><em>Material, das wir veröffentlichen und besitzen</em> - Unsere Website ist in diesem Fall Inhaber des geistigen Eigentums.</li>' .
								'<li><em>Material, das wir veröffentlichen und nicht besitzen</em> - Dieses Material wird gemäß den Bestimmungen des Fair Use Act veröffentlicht.</li>' .
								'<li><em>Materialbenutzer veröffentlichen und besitzen</em> - Jegliches Material, das von einem Benutzer dieser Website veröffentlicht wird, bleibt im Eigentum dieses Benutzers. Wir behalten uns das Recht vor, dieses Material nur zu Werbe- oder Werbezwecken zu verwenden.</li>' .
								'<li><em>Wesentliche Benutzer veröffentlichen und besitzen keine eigenen</em> - Wir übernehmen keine Verantwortung für Nutzer, die geistiges Eigentum veröffentlicht haben, das ihnen nicht gehört oder das Recht zur Weiterveröffentlichung hat. Wenn Sie der Meinung sind, dass Sie geistiges Eigentum besitzen, das unverantwortlich über diese Website weitergegeben wurde, sollten Sie sich mit uns in Verbindung setzen. Wir arbeiten mit allen gültigen Beschwerden über Urheberrecht und geistiges Eigentum zusammen.</li>' .
							'</ul>';
					break;
					
				case 'es':
					$intellectual_property_paragraphs[] =
						'<h3><a name="intellectual-property"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Propiedad intelectual</h3>';
					
					$intellectual_property_paragraphs[] =
						'<p>Mantenemos los siguientes términos y condiciones con respecto a la propiedad intelectual :</p>' .
							'<ul>' .
								'<li><em>Material que publicamos y que poseemos</em> - Nuestro sitio web es el titular de la propiedad intelectual en este caso.</li>' .
								'<li><em>Material que publicamos y no poseemos</em> - Este material se publica bajo las disposiciones de la Ley de Uso Justo.</li>' .
								'<li><em>Usuarios de materiales publicar y poseer</em> - Cualquier material publicado por un usuario de este sitio web, cuando es propiedad de ese usuario, se conserva como propiedad de ese usuario. Nos reservamos el derecho de utilizar ese material solo con fines promocionales o publicitarios.</li>' .
								'<li><em>Los usuarios de material publican y no poseen</em> - No nos hacemos responsables de ningún usuario que haya publicado propiedad intelectual que no posea o no tenga derecho a volver a publicar. Si cree que posee propiedad intelectual que se ha redistribuido de manera irresponsable a través de este sitio, se le recomienda contactarnos. Cooperamos con todos los derechos de autor válidos y quejas de propiedad intelectual.</li>' .
							'</ul>';
					break;
					
				case 'fr':
					$intellectual_property_paragraphs[] =
						'<h3><a name="intellectual-property"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Propriété intellectuelle</h3>';
					
					$intellectual_property_paragraphs[] =
						'<p>Nous maintenons les termes et conditions suivants concernant la propriété intellectuelle :</p>' .
							'<ul>' .
								'<li><em>Matériel que nous publions et possédons</em> - Notre site Web est le propriétaire de la propriété intellectuelle dans ce cas.</li>' .
								'<li><em>Matériel que nous publions et ne possédons pas</em> - Ce matériel est publié conformément aux dispositions de la Fair Use Act.</li>' .
								'<li><em>Les utilisateurs matériels publient et possèdent</em> - Tout le matériel publié par un utilisateur de ce site Web, lorsqu\'il appartient à cet utilisateur, est la propriété de l\'utilisateur Nous nous réservons le droit d\'utiliser ce matériel à des fins promotionnelles ou publicitaires uniquement.</li>' .
								'<li><em>Les utilisateurs matériels publient et ne possèdent pas</em> - Nous déclinons toute responsabilité vis-à-vis des utilisateurs ayant publié des éléments de propriété intellectuelle dont ils ne sont ni propriétaires ni qu\'ils ont le droit de publier à nouveau. Si vous pensez posséder une propriété intellectuelle redistribuée de manière irresponsable par le biais de ce site, vous êtes invité à nous contacter. Nous coopérons avec toutes les plaintes de droits d\'auteur et de propriété intellectuelle valables.</li>' .
							'</ul>';
					break;
					
				case 'ja':
					$intellectual_property_paragraphs[] =
						'<h3><a name="intellectual-property"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 知的財産</h3>';
					
					$intellectual_property_paragraphs[] =
						'<p>知的財産権に関しては、以下の条件を守ります。</p>' .
							'<ul>' .
								'<li><em>私たちが公開している素材</em> - この場合、当社のウェブサイトが知的財産の所有者です。</li>' .
								'<li><em>公開していない資料</em> - この資料は、公正使用法の規定に基づいて公開されています。</li>' .
								'<li><em>重要なユーザーが公開して所有する</em> - このWebサイトのユーザーによって公開された資料は、そのユーザーが所有する場合、そのユーザーの所有物として保持されます。 私たちはその資料を宣伝目的または宣伝目的でのみ使用する権利を留保します。</li>' .
								'<li><em>重要なユーザーが公開し、所有していない</em> - 知的所有権を転記したユーザーが所有していない、または再転記する権利を有していないユーザーに対して、当社は一切の責任を負いません。 このサイトを通じて無責任に再配布された知的所有権を所有していると思われる場合は、Googleまでご連絡ください。 私たちはすべての有効な著作権および知的財産権に関する苦情に協力します。</li>' .
							'</ul>';
					break;
					
				case 'it':
					$intellectual_property_paragraphs[] =
						'<h3><a name="intellectual-property"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Proprietà intellettuale</h3>';
					
					$intellectual_property_paragraphs[] =
						'<p>Manteniamo i seguenti termini e condizioni in materia di proprietà intellettuale :</p>' .
							'<ul>' .
								'<li><em>Materiale che pubblichiamo e possediamo</em> - Il nostro sito Web è il proprietario della proprietà intellettuale in questo caso.</li>' .
								'<li><em>Materiale che pubblichiamo e non possediamo</em> - Questo materiale è rilasciato in base alle disposizioni del Fair Use Act.</li>' .
								'<li><em>Gli utenti materiali pubblicano e possiedono</em> - Qualsiasi materiale pubblicato da un utente di questo sito Web, se di proprietà dell\'utente, viene mantenuto come proprietà di tale utente. Ci riserviamo il diritto di utilizzare tale materiale solo a scopo promozionale o pubblicitario.</li>' .
								'<li><em>Gli utenti materiali pubblicano e non possiedono</em> - Non ci assumiamo alcuna responsabilità per qualsiasi utente che abbia pubblicato proprietà intellettuale che non possiede o ha il diritto di ripubblicare. Se pensi di possedere proprietà intellettuale che è stata ridistribuita in modo irresponsabile attraverso questo sito, allora sei invitato a contattarci. Collaboriamo con tutti i reclami di copyright e proprietà intellettuale validi.</li>' .
							'</ul>';
					break;
					
				case 'nl':
					$intellectual_property_paragraphs[] =
						'<h3><a name="intellectual-property"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Intellectueel eigendom</h3>';
					
					$intellectual_property_paragraphs[] =
						'<p>We handhaven de volgende bepalingen en voorwaarden met betrekking tot intellectueel eigendom :</p>' .
							'<ul>' .
								'<li><em>Materiaal dat we publiceren en Ownh</em> - Onze website is in dit geval de eigenaar van de intellectuele eigendom.</li>' .
								'<li><em>Materiaal dat we publiceren en niet bezitten</em> - Dit materiaal wordt vrijgegeven onder de bepalingen van de Fair Use Act.</li>' .
								'<li><em>Materiële gebruikers publiceren en bezitten</em> - Materiaal dat door een gebruiker van deze website wordt gepubliceerd en eigendom is van die gebruiker, wordt bewaard als eigendom van die gebruiker. We behouden ons het recht voor om dat materiaal alleen te gebruiken voor promotionele of advertentiedoeleinden.</li>' .
								'<li><em>Materiële gebruikers publiceren en zijn niet de eigenaar</em> - Wij aanvaarden geen enkele verantwoordelijkheid voor gebruikers die intellectuele eigendom hebben gepost dat zij niet de eigenaar zijn of het recht hebben om te herposten. Als u denkt dat u intellectueel eigendom bezit dat op onverantwoordelijke wijze is herverdeeld via deze site, dan wordt u dringend verzocht contact met ons op te nemen. Wij werken samen met alle geldige klachten over auteursrecht en intellectuele eigendom.</li>' .
							'</ul>';
					break;
					
				case 'pl':
					$intellectual_property_paragraphs[] =
						'<h3><a name="intellectual-property"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Własność intelektualna</h3>';
					
					$intellectual_property_paragraphs[] =
						'<p>Utrzymujemy następujące warunki dotyczące własności intelektualnej :</p>' .
							'<ul>' .
								'<li><em>Materiał, który publikujemy i robimy</em> - Nasza strona internetowa jest właścicielem własności intelektualnej w tym przypadku.</li>' .
								'<li><em>Materiał, który publikujemy i nie tworzymy</em> - Niniejszy materiał jest udostępniany na podstawie przepisów ustawy o dozwolonym użytku.</li>' .
								'<li><em>Użytkownicy materiałów publikuj i udostępniaj</em> - Wszelkie materiały opublikowane przez użytkownika tej witryny, jeśli są własnością tego użytkownika, są zachowane jako własność tego użytkownika. Zastrzegamy sobie prawo do wykorzystania tego materiału wyłącznie w celach promocyjnych lub reklamowych.</li>' .
								'<li><em>Użytkownicy materiałów publikuj i nie przechowuj</em> - Nie bierzemy żadnej odpowiedzialności za użytkowników, którzy opublikowali własność intelektualną, których nie posiadają lub mają prawo do repostowania. Jeśli uważasz, że posiadasz własność intelektualną, która została nieodpowiedzialnie redystrybuowana za pośrednictwem tej strony, to jesteś zachęcany do skontaktowania się z nami. Współpracujemy ze wszystkimi ważnymi skargami dotyczącymi praw autorskich i własności intelektualnej.</li>' .
							'</ul>';
					break;
					
				case 'pt':
					$intellectual_property_paragraphs[] =
						'<h3><a name="intellectual-property"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Propriedade intelectual</h3>';
					
					$intellectual_property_paragraphs[] =
						'<p>Mantemos os seguintes termos e condições relacionados à propriedade intelectual :</p>' .
							'<ul>' .
								'<li><em>Material que nós publicamos e Ownh</em> - Nosso site é o proprietário da propriedade intelectual neste caso.</li>' .
								'<li><em>Material que publicamos e não possuímos</em> - Este material é liberado sob as disposições do Fair Use Act.</li>' .
								'<li><em>Usuários de materiais publicam e possuem</em> - Qualquer material publicado por um usuário deste site, quando pertencente a esse usuário, é retido como propriedade desse usuário. Reservamo-nos o direito de usar esse material apenas para fins promocionais ou publicitários.</li>' .
								'<li><em>Usuários de materiais publicam e não possuem</em> - Nós não assumimos qualquer responsabilidade por qualquer usuário que tenha postado propriedade intelectual que não possua ou tenha o direito de repassar. Se você acha que possui propriedade intelectual que foi irresponsavelmente redistribuída por meio deste site, é recomendável entrar em contato conosco. Nós cooperamos com todas as reclamações válidas de direitos autorais e propriedade intelectual.</li>' .
							'</ul>';
					break;
					
				case 'ru':
					$intellectual_property_paragraphs[] =
						'<h3><a name="intellectual-property"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Интеллектуальная собственность</h3>';
					
					$intellectual_property_paragraphs[] =
						'<p>Мы соблюдаем следующие условия в отношении интеллектуальной собственности :</p>' .
							'<ul>' .
								'<li><em>Материал, который мы публикуем и предоставляем</em> - Наш сайт является владельцем интеллектуальной собственности в этом случае.</li>' .
								'<li><em>Материал, который мы публикуем и не владеем</em> - Этот материал выпущен в соответствии с положениями Закона о добросовестном использовании.</li>' .
								'<li><em>Пользователи материалов публикуют и публикуют</em> - Любой материал, опубликованный пользователем данного веб-сайта, если он принадлежит этому пользователю, сохраняется как собственность этого пользователя. Мы оставляем за собой право использовать этот материал только в рекламных или рекламных целях.</li>' .
								'<li><em>Пользователи материалов публикуют и не владеют</em> - Мы не несем никакой ответственности за любого пользователя, который разместил интеллектуальную собственность, которой он не владеет или имеет право на перепост. Если вы считаете, что владеете интеллектуальной собственностью, которая была безответственно перераспределена через этот сайт, вам настоятельно рекомендуется связаться с нами. Мы сотрудничаем со всеми действующими жалобами на нарушение авторских прав и прав интеллектуальной собственности.</li>' .
							'</ul>';
					break;
					
				case 'tr':
					$intellectual_property_paragraphs[] =
						'<h3><a name="intellectual-property"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Fikri mülkiyet</h3>';
					
					$intellectual_property_paragraphs[] =
						'<p>Fikri mülkiyet ile ilgili aşağıdaki hüküm ve koşulları koruyoruz :</p>' .
							'<ul>' .
								'<li><em>Yayınladığımız ve Sahiplendiğimiz Malzeme</em> - Web sitemiz bu durumda fikri mülkiyet sahibidir.</li>' .
								'<li><em>Yayınladığımız ve Sahip Olmadığımız Malzemeler</em> - Bu materyal Adil Kullanım Yasası hükümleri kapsamında serbest bırakılmıştır.</li>' .
								'<li><em>Malzeme Kullanıcıları Yayınla ve Sahip Ol</em> - Bu web sitesinin kullanıcısı tarafından yayınlanan ve bu kullanıcının sahibi olduğu materyaller, o kullanıcının mülkü olarak saklanır. Bu materyali yalnızca tanıtım veya reklam amaçlı kullanma hakkımızı saklı tutarız.</li>' .
								'<li><em>Malzeme Kullanıcıları Yayınlıyor ve Sahip Olmuyor</em> - Sahip olmadıkları veya yeniden gönderme hakkına sahip olmadığı fikri mülkiyeti olan hiçbir kullanıcı için sorumluluk kabul etmiyoruz. Bu site üzerinden sorumsuzca yeniden dağıtılan fikri mülkiyete sahip olduğunuzu düşünüyorsanız, bizimle iletişime geçmeniz istenir. Tüm geçerli telif hakkı ve fikri mülkiyet şikayetleri ile işbirliği yapıyoruz.</li>' .
							'</ul>';
					break;
					
				case 'zh':
					$intellectual_property_paragraphs[] =
						'<h3><a name="intellectual-property"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 知识产权</h3>';
					
					$intellectual_property_paragraphs[] =
						'<p>我们维护以下有关知识产权的条款和条件 :</p>' .
							'<ul>' .
								'<li><em>我们发布的材料和自己</em> - 在这种情况下，我们的网站是知识产权的所有者。</li>' .
								'<li><em>我们发布和不拥有的材料</em> - 本材料根据“合理使用法”的规定发布。</li>' .
								'<li><em>材料用户发布和拥有</em> - 本网站用户发布的任何材料，当由该用户拥有时，将作为该用户的财产保留。 我们保留仅将该材料用于促销或广告目的的权利。</li>' .
								'<li><em>材料用户发布和不拥有</em> - 对于已发布不拥有或有权转发的知识产权的用户，我们不承担任何责任。 如果您认为自己拥有通过本网站不负责任地重新分发的知识产权，那么请您与我们联系。 我们与所有有效的版权和知识产权投诉合作。</li>' .
							'</ul>';
					break;
			}
			
			return $intellectual_property_paragraphs;
		}
		
		public function getProhibitedActivitySection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$prohibited_activity_paragraphs = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$prohibited_activity_paragraphs[] =
						'<h3><a name="prohibited-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Prohibited Activity</h3>';
					
					$prohibited_activity_paragraphs[] =
						'<p>The following activity is prohibited throughout the site :</p>' .
							'<ul>' .
								'<li><em>Passwords and Other Private Information</em> - Any attempt to gain access to passwords or other private information on the website is prohibited.</li>' .
								'<li><em>Seriously Impersonating Someone You Are Not</em> - Any attempt to interact with the website or other users under an an alternate identity is prohibited.</li>' .
								'<li><em>Interfere With Site Functionality Used by Others</em> - Any attempt to interfere, disrupt, or cause problems for others who are attempting to use this site.</li>' .
							'</ul>';
					break;
					
				case 'de':
					$prohibited_activity_paragraphs[] =
						'<h3><a name="prohibited-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Prohibited Activity</h3>';
					
					$prohibited_activity_paragraphs[] =
						'<p>Die folgende Aktivität ist auf der gesamten Website verboten :</p>' .
							'<ul>' .
								'<li><em>Passwörter und andere private Informationen</em> - Jeder Versuch, Zugang zu Passwörtern oder anderen privaten Informationen auf der Website zu erhalten, ist untersagt.</li>' .
								'<li><em>Imitieren jemand, den Sie nicht sind</em> - Jeder Versuch, mit der Website oder anderen Nutzern unter einer anderen Identität zu interagieren, ist untersagt.</li>' .
								'<li><em>Interferieren mit der von anderen verwendeten Site-Funktionalität</em> - Jeder Versuch, andere zu stören, zu stören oder Probleme zu verursachen, die versuchen, diese Website zu nutzen.</li>' .
							'</ul>';
					break;
					
				case 'es':
					$prohibited_activity_paragraphs[] =
						'<h3><a name="prohibited-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Prohibited Activity</h3>';
					
					$prohibited_activity_paragraphs[] =
						'<p>La siguiente actividad está prohibida en todo el sitio :</p>' .
							'<ul>' .
								'<li><em>Contraseñas y otra información privada</em> - Se prohíbe cualquier intento de obtener acceso a contraseñas u otra información privada en el sitio web.</li>' .
								'<li><em>Seriamente personificando a alguien que no eres</em> - Se prohíbe cualquier intento de interactuar con el sitio web u otros usuarios bajo una identidad alternativa.</li>' .
								'<li><em>Interfiere con la funcionalidad del sitio utilizada por otros</em> - Cualquier intento de interferir, interrumpir o causar problemas a otras personas que intentan utilizar este sitio.</li>' .
							'</ul>';
					break;
					
				case 'fr':
					$prohibited_activity_paragraphs[] =
						'<h3><a name="prohibited-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Prohibited Activity</h3>';
					
					$prohibited_activity_paragraphs[] =
						'<p>L\'activité suivante est interdite sur tout le site :</p>' .
							'<ul>' .
								'<li><em>Mots de passe et autres informations privées</em> - Toute tentative d\'accès aux mots de passe ou à d\'autres informations privées sur le site est interdite.</li>' .
								'<li><em>Sérieusement imitant quelqu\'un que vous n\'êtes pas</em> - Toute tentative d\'interaction avec le site Web ou d\'autres utilisateurs sous une autre identité est interdite.</li>' .
								'<li><em>Interférer avec les fonctionnalités du site utilisées par d\'autres</em> - Toute tentative d\'interférer, de perturber ou de causer des problèmes à d\'autres personnes tentant d\'utiliser ce site.</li>' .
							'</ul>';
					break;
					
				case 'ja':
					$prohibited_activity_paragraphs[] =
						'<h3><a name="prohibited-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Prohibited Activity</h3>';
					
					$prohibited_activity_paragraphs[] =
						'<p>以下の行為はサイト全体で禁止されています。</p>' .
							'<ul>' .
								'<li><em>パスワードとその他の個人情報</em> - Webサイト上のパスワードまたはその他の個人情報にアクセスしようとする試みは禁止されています。</li>' .
								'<li><em>本気で偽装しているのはあなたではありません</em> - 別のIDでWebサイトまたは他のユーザーと対話する試みは禁止されています。</li>' .
								'<li><em>他のユーザーが使用しているサイト機能に干渉する</em> - このサイトを使用しようとしている他の人に干渉、混乱、または問題を引き起こすような試み。</li>' .
							'</ul>';
					break;
					
				case 'it':
					$prohibited_activity_paragraphs[] =
						'<h3><a name="prohibited-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Prohibited Activity</h3>';
					
					$prohibited_activity_paragraphs[] =
						'<p>La seguente attività è vietata in tutto il sito :</p>' .
							'<ul>' .
								'<li><em>Password e altre informazioni private</em> - Qualsiasi tentativo di accedere a password o altre informazioni private sul sito Web è proibito.</li>' .
								'<li><em>Impersonificando seriamente qualcuno che non sei</em> - È vietato qualsiasi tentativo di interagire con il sito Web o altri utenti con un\'identità alternativa.</li>' .
								'<li><em>Interferire con la funzionalità del sito utilizzata da altri</em> - Qualsiasi tentativo di interferire, interrompere o causare problemi agli altri utenti che tentano di utilizzare questo sito.</li>' .
							'</ul>';
					break;
					
				case 'nl':
					$prohibited_activity_paragraphs[] =
						'<h3><a name="prohibited-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Prohibited Activity</h3>';
					
					$prohibited_activity_paragraphs[] =
						'<p>De volgende activiteit is op de hele site verboden :</p>' .
							'<ul>' .
								'<li><em>Wachtwoorden en andere privégegevens</em> - Elke poging om toegang te krijgen tot wachtwoorden of andere privé-informatie op de website is verboden.</li>' .
								'<li><em>Serieus nabootsen van iemand die je niet bent</em> - Elke poging tot interactie met de website of andere gebruikers onder een alternatieve identiteit is verboden.</li>' .
								'<li><em>Interfereren met sitefunctionaliteit gebruikt door anderen</em> - Elke poging om anderen te hinderen, te verstoren of problemen te veroorzaken die een poging doen om deze site te gebruiken.</li>' .
							'</ul>';
					break;
					
				case 'pl':
					$prohibited_activity_paragraphs[] =
						'<h3><a name="prohibited-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Prohibited Activity</h3>';
					
					$prohibited_activity_paragraphs[] =
						'<p>Następujące działania są zabronione w całej witrynie :</p>' .
							'<ul>' .
								'<li><em>Hasła i inne prywatne informacje</em> - Wszelkie próby uzyskania dostępu do haseł lub innych prywatnych informacji na stronie internetowej są zabronione.</li>' .
								'<li><em>Poważnie podszywa się pod kogoś, kogo nie ma</em> - Wszelkie próby interakcji ze stroną internetową lub innymi użytkownikami pod alternatywną tożsamością są zabronione.</li>' .
								'<li><em>Zakłócić funkcjonalność strony używanej przez innych</em> - Każda próba ingerencji, zakłócenia lub spowodowania problemów dla innych, którzy próbują korzystać z tej strony.</li>' .
							'</ul>';
					break;
					
				case 'pt':
					$prohibited_activity_paragraphs[] =
						'<h3><a name="prohibited-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Prohibited Activity</h3>';
					
					$prohibited_activity_paragraphs[] =
						'<p>A seguinte atividade é proibida em todo o site :</p>' .
							'<ul>' .
								'<li><em>Senhas e outras informações privadas</em> - Qualquer tentativa de obter acesso a senhas ou outras informações privadas no site é proibida.</li>' .
								'<li><em>Seriamente personificando alguém que você não é</em> - Qualquer tentativa de interagir com o site ou outros usuários sob uma identidade alternativa é proibida.</li>' .
								'<li><em>Interferir com a funcionalidade do site usada por outros</em> - Qualquer tentativa de interferir, interromper ou causar problemas para outras pessoas que estão tentando usar este site.</li>' .
							'</ul>';
					break;
					
				case 'ru':
					$prohibited_activity_paragraphs[] =
						'<h3><a name="prohibited-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Prohibited Activity</h3>';
					
					$prohibited_activity_paragraphs[] =
						'<p>На сайте запрещены следующие действия :</p>' .
							'<ul>' .
								'<li><em>Пароли и другая частная информация</em> - Любая попытка получить доступ к паролям или другой частной информации на сайте запрещена.</li>' .
								'<li><em>Серьезно выдавая себя за того, кем ты не являешься</em> - Любая попытка взаимодействия с сайтом или другими пользователями под другим именем запрещена.</li>' .
								'<li><em>Вмешиваться в функциональность сайта, используемую другими</em> - Любая попытка помешать, нарушить или вызвать проблемы для других, кто пытается использовать этот сайт.</li>' .
							'</ul>';
					break;
					
				case 'tr':
					$prohibited_activity_paragraphs[] =
						'<h3><a name="prohibited-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Prohibited Activity</h3>';
					
					$prohibited_activity_paragraphs[] =
						'<p>Site genelinde aşağıdaki faaliyetler yasaktır :</p>' .
							'<ul>' .
								'<li><em>Şifreler ve Diğer Özel Bilgiler</em> - Web sitesindeki şifrelere veya diğer özel bilgilere erişim kazanma girişimleri yasaktır.</li>' .
								'<li><em>Cidden Kimliğe Takılmayan Birini</em> - Alternatif bir kimlik altındaki web sitesiyle veya diğer kullanıcılarla etkileşimde bulunma denemesi yasaktır.</li>' .
								'<li><em>Başkaları Tarafından Kullanılan Site İşlevselliğine Müdahale</em> - Bu siteyi kullanmaya çalışanlar için herhangi bir girişimi engelleme, bozma veya sorun yaratma girişimleri.</li>' .
							'</ul>';
					break;
					
				case 'zh':
					$prohibited_activity_paragraphs[] =
						'<h3><a name="prohibited-activity"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Prohibited Activity</h3>';
					
					$prohibited_activity_paragraphs[] =
						'<p>整个网站禁止以下活动 :</p>' .
							'<ul>' .
								'<li><em>密码和其他私人信息</em> - 禁止任何试图访问网站上的密码或其他私人信息的企图。</li>' .
								'<li><em>严重冒充你没有的人</em> - 禁止任何以替代身份与网站或其他用户互动的企图。</li>' .
								'<li><em>干扰他人使用的网站功能</em> - 任何试图干扰，破坏或导致试图使用本网站的其他人的问题的企图。</li>' .
							'</ul>';
					break;
			}
			
			return $prohibited_activity_paragraphs;
		}
		
		public function getLimitedLiabilitySection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$limited_liability_paragraphs = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$limited_liability_paragraphs[] =
						'<h3><a name="limited-liability-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Limited Liability Policy</h3>';
					
					$limited_liability_paragraphs[] =
						'<p>In no event shall ' . $this->domain_object->host . ', nor any of its officers, directors and collaborators, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract.  ' . $this->domain_object->host . ', including its officers, directors and collaborators shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this website.</p>';
					break;
					
				case 'de':
					$limited_liability_paragraphs[] =
						'<h3><a name="limited-liability-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Limited Liability Policy</h3>';
					
					$limited_liability_paragraphs[] =
						'<p>In keinem Fall haften ' . $this->domain_object->host . ' und seine leitenden Angestellten, Direktoren und Mitarbeiter für irgendetwas, das sich aus Ihrer Nutzung dieser Website ergibt oder in irgendeiner Weise damit zusammenhängt, ob eine solche Haftung vertraglich besteht. ' . $this->domain_object->host . ', einschließlich seiner leitenden Angestellten, Direktoren und Mitarbeiter, haftet nicht für indirekte, Folgeschäden oder besondere Haftung, die sich aus Ihrer Nutzung dieser Website ergeben oder in irgendeiner Weise damit zusammenhängen.</p>';
					break;
					
				case 'es':
					$limited_liability_paragraphs[] =
						'<h3><a name="limited-liability-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Limited Liability Policy</h3>';
					
					$limited_liability_paragraphs[] =
						'<p>En ningún caso ' . $this->domain_object->host . ', ni ninguno de sus funcionarios, directores y colaboradores, serán responsables de cualquier cosa que surja o esté relacionada con su uso de este sitio web, ya sea que dicha responsabilidad esté sujeta a un contrato. ' . $this->domain_object->host . ', incluidos sus funcionarios, directores y colaboradores, no será responsable de ninguna responsabilidad indirecta, consecuente o especial que surja de o de cualquier manera relacionada con el uso que usted haga de este sitio web.</p>';
					break;
					
				case 'fr':
					$limited_liability_paragraphs[] =
						'<h3><a name="limited-liability-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Limited Liability Policy</h3>';
					
					$limited_liability_paragraphs[] =
						'<p>En aucun cas, ' . $this->domain_object->host . ', ni aucun de ses dirigeants, administrateurs et collaborateurs, ne pourra être tenu pour responsable de quoi que ce soit qui découle de ou qui est lié à votre utilisation de ce site Web, que cette responsabilité soit contractuelle ou non. ' . $this->domain_object->host . ', y compris ses dirigeants, administrateurs et collaborateurs, ne saurait être tenu pour responsable de toute responsabilité indirecte, consécutive ou particulière résultant de ou liée à votre utilisation de ce site Web.</p>';
					break;
					
				case 'ja':
					$limited_liability_paragraphs[] =
						'<h3><a name="limited-liability-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Limited Liability Policy</h3>';
					
					$limited_liability_paragraphs[] =
						'<p>いかなる場合においても、' . $this->domain_object->host . '、ならびにその役員、取締役、および共同編集者は、そのような責任が契約下にあるかどうかにかかわらず、このWebサイトの使用から生じるまたはこれに関連する何らかの方法について責任を負いません。 役員、取締役、および共同編集者を含む' . $this->domain_object->host . 'は、このWebサイトの使用に起因する、またはそれに関連する間接的、結果的、または特別な責任について一切責任を負いません。</p>';
					break;
					
				case 'it':
					$limited_liability_paragraphs[] =
						'<h3><a name="limited-liability-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Limited Liability Policy</h3>';
					
					$limited_liability_paragraphs[] =
						'<p>In nessun caso ' . $this->domain_object->host . ', né alcuno dei suoi funzionari, direttori e collaboratori, potrà essere ritenuto responsabile di qualsiasi conseguenza derivante da o in qualsiasi modo connessa con l\'uso di questo Sito Web, indipendentemente dal fatto che tale responsabilità sia contrattualizzata. ' . $this->domain_object->host . ', compresi i suoi funzionari, direttori e collaboratori, non potrà essere ritenuta responsabile di alcuna responsabilità indiretta, consequenziale o speciale derivante da o in qualsiasi modo correlata al tuo utilizzo di questo sito web.</p>';
					break;
					
				case 'nl':
					$limited_liability_paragraphs[] =
						'<h3><a name="limited-liability-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Limited Liability Policy</h3>';
					
					$limited_liability_paragraphs[] =
						'<p>' . $this->domain_object->host . ' en haar functionarissen, directeurs en medewerkers zullen in geen geval aansprakelijk worden gehouden voor iets dat voortvloeit uit of in enig opzicht verband houdt met uw gebruik van deze Website, ongeacht of deze aansprakelijkheid onder contract valt. ' . $this->domain_object->host . ', inclusief haar functionarissen, directeurs en medewerkers, kan niet aansprakelijk worden gesteld voor enige indirecte, vervolg- of speciale aansprakelijkheid die voortvloeit uit of in enig opzicht verband houdt met uw gebruik van deze website.</p>';
					break;
					
				case 'pl':
					$limited_liability_paragraphs[] =
						'<h3><a name="limited-liability-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Limited Liability Policy</h3>';
					
					$limited_liability_paragraphs[] =
						'<p>W żadnym wypadku ' . $this->domain_object->host . ', ani żaden z jej członków, dyrektorów ani współpracowników nie będzie ponosił odpowiedzialności za jakiekolwiek skutki wynikające z korzystania z Witryny lub w jakikolwiek sposób związane z korzystaniem z tej witryny internetowej, niezależnie od tego, czy taka odpowiedzialność wynika z umowy. ' . $this->domain_object->host . ', w tym jej funkcjonariusze, dyrektorzy i współpracownicy nie ponoszą odpowiedzialności za jakiekolwiek pośrednie, wynikowe lub szczególne zobowiązania wynikające z lub w jakikolwiek sposób związane z korzystaniem z tej strony internetowej.</p>';
					break;
					
				case 'pt':
					$limited_liability_paragraphs[] =
						'<h3><a name="limited-liability-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Limited Liability Policy</h3>';
					
					$limited_liability_paragraphs[] =
						'<p>Em nenhum caso a ' . $this->domain_object->host . ', nem qualquer de seus diretores, diretores e colaboradores, será responsabilizada por qualquer coisa decorrente ou de alguma forma relacionada ao seu uso deste Website, independentemente de tal responsabilidade estar sob contrato. A ' . $this->domain_object->host . ', incluindo seus diretores, diretores e colaboradores, não será responsabilizada por nenhuma responsabilidade indireta, conseqüente ou especial decorrente ou de qualquer forma relacionada ao uso deste site.</p>';
					break;
					
				case 'ru':
					$limited_liability_paragraphs[] =
						'<h3><a name="limited-liability-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Limited Liability Policy</h3>';
					
					$limited_liability_paragraphs[] =
						'<p>Ни в коем случае ' . $this->domain_object->host . ', ни один из его должностных лиц, директоров и сотрудников не будет нести ответственность за все, что вытекает из или каким-либо образом связано с использованием вами данного Веб-сайта, независимо от того, является ли такое обязательство договорным. ' . $this->domain_object->host . ', включая его должностных лиц, директоров и сотрудников, не несет ответственности за какую-либо косвенную, косвенную или специальную ответственность, вытекающую из или каким-либо образом связанную с использованием вами данного веб-сайта.</p>';
					break;
					
				case 'tr':
					$limited_liability_paragraphs[] =
						'<h3><a name="limited-liability-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Limited Liability Policy</h3>';
					
					$limited_liability_paragraphs[] =
						'<p>Hiçbir durumda, ' . $this->domain_object->host . ' ne de herhangi bir memuru, yöneticisi ve ortak çalışanı, bu Web Sitesini kullanmanızla ilgili olarak herhangi bir şekilde veya herhangi bir şekilde bu yükümlülüğün sözleşmeye tabi olup olmadığına ilişkin herhangi bir şeyden sorumlu tutulamaz. ' . $this->domain_object->host . ', memurları, yöneticileri ve işbirlikçileri de dahil olmak üzere, bu web sitesini kullanmanızdan kaynaklanabilecek herhangi bir şekilde dolaylı, dolaylı veya özel sorumluluktan sorumlu tutulamaz.</p>';
					break;
					
				case 'zh':
					$limited_liability_paragraphs[] =
						'<h3><a name="limited-liability-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Limited Liability Policy</h3>';
					
					$limited_liability_paragraphs[] =
						'<p>在任何情况下，' . $this->domain_object->host . '及其任何高级职员，董事和合作者均不对因使用本网站而产生的任何方式承担任何责任，无论此类责任是否属于合同。 ' . $this->domain_object->host . '，包括其官员，董事和合作者，对因使用本网站而产生或以任何方式引起的任何间接，后果性或特殊责任概不负责。</p>';
					break;
			}
			
			return $limited_liability_paragraphs;
		}
		
		public function getGoverningLawSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$governing_law_paragraphs = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$governing_law_paragraphs[] =
						'<h3><a name="governing-law-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Governing Law Policy</h3>';
					
					$governing_law_paragraphs[] =
						'<p>These terms and conditions will be regulated by and interpreted in accordance with the established law of :</p>';
						
					$governing_law_paragraphs[] =
						'<blockquote>San Francisco, California, USA</blockquote>';
					break;
					
				case 'de':
					$governing_law_paragraphs[] =
						'<h3><a name="governing-law-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Geltende Rechtspolitik</h3>';
					
					$governing_law_paragraphs[] =
						'<p>Diese Bedingungen werden durch das geltende Gesetz geregelt und ausgelegt :</p>';
						
					$governing_law_paragraphs[] =
						'<blockquote>San Francisco, Kalifornien, USA (San Francisco, California, USA)</blockquote>';
					break;
					
				case 'es':
					$governing_law_paragraphs[] =
						'<h3><a name="governing-law-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Política de derecho aplicable</h3>';
					
					$governing_law_paragraphs[] =
						'<p>Estos términos y condiciones serán regulados e interpretados de acuerdo con la ley establecida de :</p>';
						
					$governing_law_paragraphs[] =
						'<blockquote>San Francisco, California, EE.UU. (San Francisco, California, USA)</blockquote>';
					break;
					
				case 'fr':
					$governing_law_paragraphs[] =
						'<h3><a name="governing-law-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Politique du droit applicable</h3>';
					
					$governing_law_paragraphs[] =
						'<p>Les présentes conditions générales seront régies et interprétées conformément au droit en vigueur de :</p>';
						
					$governing_law_paragraphs[] =
						'<blockquote>San Francisco, Californie, États-Unis (San Francisco, California, USA)</blockquote>';
					break;
					
				case 'ja':
					$governing_law_paragraphs[] =
						'<h3><a name="governing-law-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 準拠法ポリシー</h3>';
					
					$governing_law_paragraphs[] =
						'<p>これらの契約条件は、次の確立された法律によって規制され、それに従って解釈されます。</p>';
						
					$governing_law_paragraphs[] =
						'<blockquote>米国カリフォルニア州サンフランシスコ (San Francisco, California, USA)</blockquote>';
					break;
					
				case 'it':
					$governing_law_paragraphs[] =
						'<h3><a name="governing-law-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Politica di diritto applicabile</h3>';
					
					$governing_law_paragraphs[] =
						'<p>Questi termini e condizioni saranno regolati e interpretati in conformità con la legge stabilita di :</p>';
						
					$governing_law_paragraphs[] =
						'<blockquote>San Francisco, California, Stati Uniti d\'America (San Francisco, California, USA)</blockquote>';
					break;
					
				case 'nl':
					$governing_law_paragraphs[] =
						'<h3><a name="governing-law-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Governing Law Policy</h3>';
					
					$governing_law_paragraphs[] =
						'<p>Deze algemene voorwaarden worden gereguleerd door en geïnterpreteerd in overeenstemming met de geldende wet van :</p>';
						
					$governing_law_paragraphs[] =
						'<blockquote>San Francisco, Californië, VS. (San Francisco, California, USA)</blockquote>';
					break;
					
				case 'pl':
					$governing_law_paragraphs[] =
						'<h3><a name="governing-law-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Polityka obowiązującego prawa</h3>';
					
					$governing_law_paragraphs[] =
						'<p>Niniejsze zasady i warunki będą regulowane i interpretowane zgodnie z ustalonym prawem :</p>';
						
					$governing_law_paragraphs[] =
						'<blockquote>San Francisco, Kalifornia, USA (San Francisco, California, USA)</blockquote>';
					break;
					
				case 'pt':
					$governing_law_paragraphs[] =
						'<h3><a name="governing-law-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Política de direito governante</h3>';
					
					$governing_law_paragraphs[] =
						'<p>Estes termos e condições serão regulados e interpretados de acordo com a lei estabelecida de :</p>';
						
					$governing_law_paragraphs[] =
						'<blockquote>São Francisco, Califórnia, EUA (San Francisco, California, USA)</blockquote>';
					break;
					
				case 'ru':
					$governing_law_paragraphs[] =
						'<h3><a name="governing-law-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Политика регулирующего права</h3>';
					
					$governing_law_paragraphs[] =
						'<p>Эти условия будут регулироваться и толковаться в соответствии с установленным законодательством :</p>';
						
					$governing_law_paragraphs[] =
						'<blockquote>Сан-Франциско, Калифорния, США (San Francisco, California, USA)</blockquote>';
					break;
					
				case 'tr':
					$governing_law_paragraphs[] =
						'<h3><a name="governing-law-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Geçerli Hukuk Politikası</h3>';
					
					$governing_law_paragraphs[] =
						'<p>Bu şartlar ve koşullar aşağıdakilerin belirlenmiş yasalarına göre düzenlenecek ve yorumlanacaktır :</p>';
						
					$governing_law_paragraphs[] =
						'<blockquote>San Francisco, Kaliforniya, ABD (San Francisco, California, USA)</blockquote>';
					break;
					
				case 'zh':
					$governing_law_paragraphs[] =
						'<h3><a name="governing-law-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 适用法律政策</h3>';
					
					$governing_law_paragraphs[] =
						'<p>这些条款和条件将根据以下既定法律进行管理和解释 :</p>';
						
					$governing_law_paragraphs[] =
						'<blockquote>旧金山，加利福尼亚州，美国 (San Francisco, California, USA)</blockquote>';
					break;
			}
			
			return $governing_law_paragraphs;
		}
		
		public function getThirdPartyWebsitesSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$third_party_websites_paragraphs = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$third_party_websites_paragraphs[] =
						'<h3><a name="third-party-websites"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Third Party Websites</h3>';
					
					$third_party_websites_paragraphs[] =
						'<p>We do not take any responsibility for material or content appearing on third-party websites that are linked to by :</p>';
					$third_party_websites_paragraphs[] =
							'<ul>' .
								'<li><em>' . $this->getTheWebsiteText() . '</em> - Any materials linked to on any page on this site.</li>' .
								'<li><em>' . $this->getAdminText() . '</em> - Any materials linked to on any page on this site by any admin.</li>' .
								'<li><em>' . $this->getUsersText() . '</em> - Any materials linked to on any page on this site by any user.</li>' .
							'</ul>';
					break;
					
				case 'de':
					$third_party_websites_paragraphs[] =
						'<h3><a name="third-party-websites"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Websites von Drittanbietern</h3>';
					
					$third_party_websites_paragraphs[] =
						'<p>Wir übernehmen keine Verantwortung für Material oder Inhalte, die auf Websites von Drittanbietern erscheinen :</p>';
					$third_party_websites_paragraphs[] =
							'<ul>' .
								'<li><em>' . $this->getTheWebsiteText() . '</em> - Alle Materialien, auf die auf einer Seite dieser Website verwiesen wird.</li>' .
								'<li><em>' . $this->getAdminText() . '</em> - Alle Materialien, auf die auf jeder Seite dieser Website von einem Administrator verwiesen wird.</li>' .
								'<li><em>' . $this->getUsersText() . '</em> - Alle Materialien, auf die auf irgendeiner Seite dieser Website von jedem Benutzer verwiesen wird.</li>' .
							'</ul>';
					break;
					
				case 'es':
					$third_party_websites_paragraphs[] =
						'<h3><a name="third-party-websites"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Sitios web de terceros</h3>';
					
					$third_party_websites_paragraphs[] =
						'<p>No nos hacemos responsables del material o contenido que aparece en sitios web de terceros vinculados a :</p>';
					$third_party_websites_paragraphs[] =
							'<ul>' .
								'<li><em>' . $this->getTheWebsiteText() . '</em> - Cualquier material vinculado a cualquier página en este sitio.</li>' .
								'<li><em>' . $this->getAdminText() . '</em> - Cualquier material vinculado a cualquier página en este sitio por cualquier administrador.</li>' .
								'<li><em>' . $this->getUsersText() . '</em> - Cualquier material vinculado a cualquier página en este sitio por cualquier usuario.</li>' .
							'</ul>';
					break;
					
				case 'fr':
					$third_party_websites_paragraphs[] =
						'<h3><a name="third-party-websites"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Sites Web de tiers</h3>';
					
					$third_party_websites_paragraphs[] =
						'<p>Nous n\'assumons aucune responsabilité pour le matériel ou le contenu apparaissant sur des sites Web tiers liés à :</p>';
					$third_party_websites_paragraphs[] =
							'<ul>' .
								'<li><em>' . $this->getTheWebsiteText() . '</em> - Tout matériel lié à n\'importe quelle page de ce site.</li>' .
								'<li><em>' . $this->getAdminText() . '</em> - Tout matériel lié à n\'importe quelle page de ce site par un administrateur.</li>' .
								'<li><em>' . $this->getUsersText() . '</em> - Tout matériel lié à n\'importe quelle page de ce site par n\'importe quel utilisateur.</li>' .
							'</ul>';
					break;
					
				case 'ja':
					$third_party_websites_paragraphs[] =
						'<h3><a name="third-party-websites"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 第三者のウェブサイト</h3>';
					
					$third_party_websites_paragraphs[] =
						'<p>以下によってリンクされている第三者のWebサイトに掲載されている資料またはコンテンツについて、当社は一切責任を負いません。</p>';
					$third_party_websites_paragraphs[] =
							'<ul>' .
								'<li><em>' . $this->getTheWebsiteText() . '</em> - このサイトの任意のページにリンクされているすべての資料。</li>' .
								'<li><em>' . $this->getAdminText() . '</em> - このサイト上の任意のページにリンクされているすべての資料。</li>' .
								'<li><em>' . $this->getUsersText() . '</em> - このサイト上の任意のページにリンクされているすべての資料。</li>' .
							'</ul>';
					break;
					
				case 'it':
					$third_party_websites_paragraphs[] =
						'<h3><a name="third-party-websites"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Siti Web di terze parti</h3>';
					
					$third_party_websites_paragraphs[] =
						'<p>Non ci assumiamo alcuna responsabilità per materiali o contenuti visualizzati su siti Web di terzi a cui è collegato :</p>';
					$third_party_websites_paragraphs[] =
							'<ul>' .
								'<li><em>' . $this->getTheWebsiteText() . '</em> - Qualsiasi materiale collegato a qualsiasi pagina di questo sito.</li>' .
								'<li><em>' . $this->getAdminText() . '</em> - Qualsiasi materiale collegato a qualsiasi pagina su questo sito da qualsiasi amministratore.</li>' .
								'<li><em>' . $this->getUsersText() . '</em> - Qualsiasi materiale collegato a qualsiasi pagina su questo sito da qualsiasi utente.</li>' .
							'</ul>';
					break;
					
				case 'nl':
					$third_party_websites_paragraphs[] =
						'<h3><a name="third-party-websites"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Websites van derden</h3>';
					
					$third_party_websites_paragraphs[] =
						'<p>Wij aanvaarden geen verantwoordelijkheid voor materiaal of inhoud die wordt weergegeven op websites van derden waarnaar wordt gelinkt door :</p>';
					$third_party_websites_paragraphs[] =
							'<ul>' .
								'<li><em>' . $this->getTheWebsiteText() . '</em> - Alle materialen waarnaar gelinkt is op elke pagina op deze site.</li>' .
								'<li><em>' . $this->getAdminText() . '</em> - Alle materialen waarnaar op elke pagina op deze site is gelinkt door een willekeurige beheerder.</li>' .
								'<li><em>' . $this->getUsersText() . '</em> - Alle materialen waarnaar op elke pagina op deze site is gelinkt door elke gebruiker.</li>' .
							'</ul>';
					break;
					
				case 'pl':
					$third_party_websites_paragraphs[] =
						'<h3><a name="third-party-websites"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Witryny stron trzecich</h3>';
					
					$third_party_websites_paragraphs[] =
						'<p>Nie bierzemy żadnej odpowiedzialności za materiały i treści pojawiające się na stronach internetowych stron trzecich, do których prowadzą linki :</p>';
					$third_party_websites_paragraphs[] =
							'<ul>' .
								'<li><em>' . $this->getTheWebsiteText() . '</em> - Wszelkie materiały powiązane z jakąkolwiek stroną na tej stronie.</li>' .
								'<li><em>' . $this->getAdminText() . '</em> - Wszelkie materiały powiązane z jakąkolwiek stroną na tej stronie przez dowolnego administratora.</li>' .
								'<li><em>' . $this->getUsersText() . '</em> - Wszelkie materiały powiązane z dowolną stroną w tej witrynie przez dowolnego użytkownika.</li>' .
							'</ul>';
					break;
					
				case 'pt':
					$third_party_websites_paragraphs[] =
						'<h3><a name="third-party-websites"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Websites de Terceiros</h3>';
					
					$third_party_websites_paragraphs[] =
						'<p>Não nos responsabilizamos por material ou conteúdo que apareça em sites de terceiros vinculados por :</p>';
					$third_party_websites_paragraphs[] =
							'<ul>' .
								'<li><em>' . $this->getTheWebsiteText() . '</em> - Qualquer material vinculado a qualquer página deste site.</li>' .
								'<li><em>' . $this->getAdminText() . '</em> - Qualquer material vinculado a qualquer página deste site por qualquer administrador.</li>' .
								'<li><em>' . $this->getUsersText() . '</em> - Qualquer material vinculado a qualquer página deste site por qualquer usuário.</li>' .
							'</ul>';
					break;
					
				case 'ru':
					$third_party_websites_paragraphs[] =
						'<h3><a name="third-party-websites"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Сторонние сайты</h3>';
					
					$third_party_websites_paragraphs[] =
						'<p>Мы не несем никакой ответственности за материалы или контент, появляющийся на сторонних веб-сайтах, на которые ссылаются :</p>';
					$third_party_websites_paragraphs[] =
							'<ul>' .
								'<li><em>' . $this->getTheWebsiteText() . '</em> - Любые материалы, ссылки на которые есть на любой странице сайта.</li>' .
								'<li><em>' . $this->getAdminText() . '</em> - Любые материалы, ссылки на которые есть на любой странице этого сайта любым администратором.</li>' .
								'<li><em>' . $this->getUsersText() . '</em> - Любые материалы, ссылки на которые есть на любой странице этого сайта любым пользователем.</li>' .
							'</ul>';
					break;
					
				case 'tr':
					$third_party_websites_paragraphs[] =
						'<h3><a name="third-party-websites"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Üçüncü Parti Web Siteleri</h3>';
					
					$third_party_websites_paragraphs[] =
						'<p>Şununla bağlantılı üçüncü taraf web sitelerinde görünen materyal veya içerikten sorumluluk almayız :</p>';
					$third_party_websites_paragraphs[] =
							'<ul>' .
								'<li><em>' . $this->getTheWebsiteText() . '</em> - Bu sitedeki herhangi bir sayfada bağlantı verilen materyaller.</li>' .
								'<li><em>' . $this->getAdminText() . '</em> - Herhangi bir yönetici tarafından bu sitedeki herhangi bir sayfada bağlantı verilen materyaller.</li>' .
								'<li><em>' . $this->getUsersText() . '</em> - Herhangi bir kullanıcı tarafından bu sitedeki herhangi bir sayfada bağlantı verilen materyaller</li>' .
							'</ul>';
					break;
					
				case 'zh':
					$third_party_websites_paragraphs[] =
						'<h3><a name="third-party-websites"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 第三方网站</h3>';
					
					$third_party_websites_paragraphs[] =
						'<p>对于链接到的第三方网站上出现的材料或内容，我们不承担任何责任 :</p>';
					$third_party_websites_paragraphs[] =
							'<ul>' .
								'<li><em>' . $this->getTheWebsiteText() . '</em> - 链接到本网站任何页面的任何材料。</li>' .
								'<li><em>' . $this->getAdminText() . '</em> - 任何管理员链接到本网站任何页面的任何材料。</li>' .
								'<li><em>' . $this->getUsersText() . '</em> - 任何用户在本网站的任何页面上链接的任何材料。</li>' .
							'</ul>';
					break;
			}
			
			return $third_party_websites_paragraphs;
		}
		
		public function getBehaviorPolicySection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$behavior_policy_paragraphs = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$behavior_policy_paragraphs[] =
						'<h3><a name="behavior-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Behavior Policy</h3>';
					
					$behavior_policy_paragraphs[] =
						'<p>In interactions with all other users, including those affiliated or not affiliated with the site, you are expected to be bound by the Anarchist Code of Conduct.  Find out more at: <a href="http://www.anarchistcode.com/" target="_blank">AnarchistCode.com</a>.</p>';
					break;
					
				case 'de':
					$behavior_policy_paragraphs[] =
						'<h3><a name="behavior-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Verhaltensrichtlinie</h3>';
					
					$behavior_policy_paragraphs[] =
						'<p>Bei Interaktionen mit allen anderen Benutzern, einschließlich derjenigen, die mit der Website verbunden sind oder nicht, ist davon auszugehen, dass Sie an den Anarchist Code of Conduct gebunden sind. Mehr erfahren Sie unter: <a href="http://www.anarchistcode.com/" target="_blank">AnarchistCode.com</a>.</p>';
					break;
					
				case 'es':
					$behavior_policy_paragraphs[] =
						'<h3><a name="behavior-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Política de comportamiento</h3>';
					
					$behavior_policy_paragraphs[] =
						'<p>En las interacciones con todos los demás usuarios, incluidos los afiliados o no afiliados al sitio, se espera que esté sujeto al Código de conducta anarquista. Obtenga más información en: <a href="http://www.anarchistcode.com/" target="_blank">AnarchistCode.com</a>.</p>';
					break;
					
				case 'fr':
					$behavior_policy_paragraphs[] =
						'<h3><a name="behavior-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Politique de comportement</h3>';
					
					$behavior_policy_paragraphs[] =
						'<p>Dans les interactions avec tous les autres utilisateurs, y compris ceux affiliés ou non affiliés au site, vous êtes censé être tenu au code de conduite anarchiste. En savoir plus sur: <a href="http://www.anarchistcode.com/" target="_blank">AnarchistCode.com</a>.</p>';
					break;
					
				case 'ja':
					$behavior_policy_paragraphs[] =
						'<h3><a name="behavior-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 行動方針</h3>';
					
					$behavior_policy_paragraphs[] =
						'<p>このサイトに関連しているかどうかに関わらず、他のすべてのユーザーとのやり取りでは、アナキスト行動規範に拘束されることになります。 もっと詳しく <a href="http://www.anarchistcode.com/" target="_blank">AnarchistCode.com</a>.</p>';
					break;
					
				case 'it':
					$behavior_policy_paragraphs[] =
						'<h3><a name="behavior-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Politica di comportamento</h3>';
					
					$behavior_policy_paragraphs[] =
						'<p>Nelle interazioni con tutti gli altri utenti, inclusi quelli affiliati o non affiliati al sito, ci si aspetta che siano vincolati dal Codice di condotta anarchico. Scopri di più su: <a href="http://www.anarchistcode.com/" target="_blank">AnarchistCode.com</a>.</p>';
					break;
					
				case 'nl':
					$behavior_policy_paragraphs[] =
						'<h3><a name="behavior-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Gedragsbeleid</h3>';
					
					$behavior_policy_paragraphs[] =
						'<p>In interacties met alle andere gebruikers, inclusief degenen die al dan niet aan de site gelieerd zijn, wordt van u verwacht dat u bent gebonden aan de anarchistische gedragscode. Meer informatie op: <a href="http://www.anarchistcode.com/" target="_blank">AnarchistCode.com</a>.</p>';
					break;
					
				case 'pl':
					$behavior_policy_paragraphs[] =
						'<h3><a name="behavior-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Zasady zachowania</h3>';
					
					$behavior_policy_paragraphs[] =
						'<p>W interakcjach ze wszystkimi innymi użytkownikami, w tym powiązanymi lub niepowiązanymi ze stroną, oczekuje się, że będą związani Kodeksem Postępowania Anarchistycznego. Dowiedz się więcej na: <a href="http://www.anarchistcode.com/" target="_blank">AnarchistCode.com</a>.</p>';
					break;
					
				case 'pt':
					$behavior_policy_paragraphs[] =
						'<h3><a name="behavior-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Política de Comportamento</h3>';
					
					$behavior_policy_paragraphs[] =
						'<p>Nas interações com todos os outros usuários, incluindo aqueles afiliados ou não afiliados ao site, espera-se que você esteja vinculado ao Código de Conduta Anarquista. Saiba mais em: <a href="http://www.anarchistcode.com/" target="_blank">AnarchistCode.com</a>.</p>';
					break;
					
				case 'ru':
					$behavior_policy_paragraphs[] =
						'<h3><a name="behavior-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Политика поведения</h3>';
					
					$behavior_policy_paragraphs[] =
						'<p>Ожидается, что во взаимодействии со всеми другими пользователями, включая тех, кто связан или не связан с сайтом, вы должны соблюдать Кодекс поведения Анархиста. Узнайте больше на: <a href="http://www.anarchistcode.com/" target="_blank">AnarchistCode.com</a>.</p>';
					break;
					
				case 'tr':
					$behavior_policy_paragraphs[] =
						'<h3><a name="behavior-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Davranış Politikası</h3>';
					
					$behavior_policy_paragraphs[] =
						'<p>Siteye bağlı olan veya olmayanlar da dahil olmak üzere diğer tüm kullanıcılarla olan etkileşimlerinizde, Anarşist Davranış Kurallarına uymanız beklenir. Daha fazla bilgi edinin: <a href="http://www.anarchistcode.com/" target="_blank">AnarchistCode.com</a>.</p>';
					break;
					
				case 'zh':
					$behavior_policy_paragraphs[] =
						'<h3><a name="behavior-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 行为政策</h3>';
					
					$behavior_policy_paragraphs[] =
						'<p>在与所有其他用户（包括与该网站关联或未关联的用户）的互动中，您应受到无政府主义者行为准则的约束。 了解更多信息： <a href="http://www.anarchistcode.com/" target="_blank">AnarchistCode.com</a>.</p>';
					break;
			}
			
			return $behavior_policy_paragraphs;
		}
		
		public function getAgreementPolicySection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$agreement_policy_paragraphs = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$agreement_policy_paragraphs[] =
						'<h3><a name="agreement-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Agreement Policy</h3>';
					
					$agreement_policy_paragraphs[] =
						'<p>By using this website, you are agreeing to these terms and conditions of use.</p>';
					break;
					
				case 'de':
					$agreement_policy_paragraphs[] =
						'<h3><a name="agreement-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Vereinbarung</h3>';
					
					$agreement_policy_paragraphs[] =
						'<p>Durch die Nutzung dieser Website stimmen Sie diesen Nutzungsbedingungen zu.</p>';
					break;
					
				case 'es':
					$agreement_policy_paragraphs[] =
						'<h3><a name="agreement-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Política de acuerdo</h3>';
					
					$agreement_policy_paragraphs[] =
						'<p>Al utilizar este sitio web, usted acepta estos términos y condiciones de uso.</p>';
					break;
					
				case 'fr':
					$agreement_policy_paragraphs[] =
						'<h3><a name="agreement-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Politique d\'accord</h3>';
					
					$agreement_policy_paragraphs[] =
						'<p>En utilisant ce site Web, vous acceptez ces conditions d\'utilisation.</p>';
					break;
					
				case 'ja':
					$agreement_policy_paragraphs[] =
						'<h3><a name="agreement-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 契約ポリシー</h3>';
					
					$agreement_policy_paragraphs[] =
						'<p>このウェブサイトを使用することにより、あなたはこれらの利用規約に同意したことになります。</p>';
					break;
					
				case 'it':
					$agreement_policy_paragraphs[] =
						'<h3><a name="agreement-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Politica d\'Accordo</h3>';
					
					$agreement_policy_paragraphs[] =
						'<p>Utilizzando questo sito web, accetti i presenti termini e condizioni d\'uso.</p>';
					break;
					
				case 'nl':
					$agreement_policy_paragraphs[] =
						'<h3><a name="agreement-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Overeenkomst beleid</h3>';
					
					$agreement_policy_paragraphs[] =
						'<p>Door deze website te gebruiken, gaat u akkoord met deze gebruiksvoorwaarden.</p>';
					break;
					
				case 'pl':
					$agreement_policy_paragraphs[] =
						'<h3><a name="agreement-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Zasady umowy</h3>';
					
					$agreement_policy_paragraphs[] =
						'<p>Korzystając z tej witryny, zgadzasz się na te warunki użytkowania.</p>';
					break;
					
				case 'pt':
					$agreement_policy_paragraphs[] =
						'<h3><a name="agreement-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Política de acordo</h3>';
					
					$agreement_policy_paragraphs[] =
						'<p>Ao utilizar este site, você concorda com estes termos e condições de uso.</p>';
					break;
					
				case 'ru':
					$agreement_policy_paragraphs[] =
						'<h3><a name="agreement-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Соглашение о политике</h3>';
					
					$agreement_policy_paragraphs[] =
						'<p>Используя этот сайт, вы соглашаетесь с этими условиями использования.</p>';
					break;
					
				case 'tr':
					$agreement_policy_paragraphs[] =
						'<h3><a name="agreement-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Anlaşma Politikası</h3>';
					
					$agreement_policy_paragraphs[] =
						'<p>Bu web sitesini kullanarak, bu kullanım şartlarını kabul ediyorsunuz.</p>';
					break;
					
				case 'zh':
					$agreement_policy_paragraphs[] =
						'<h3><a name="agreement-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 协议政策</h3>';
					
					$agreement_policy_paragraphs[] =
						'<p>使用本网站即表示您同意这些使用条款和条件。</p>';
					break;
			}
			
			return $agreement_policy_paragraphs;
		}
		
		public function getViolationPolicySection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$violation_policy_paragraphs = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$violation_policy_paragraphs[] =
						'<h3><a name="violation-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Violation Policy - What to do if you find a violation of these terms and conditions</h3>';
					
					$violation_policy_paragraphs[] =
						'<p>If you find a violation of these terms and conditions, then you are encouraged to reach out to us.</p>' .
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>';
					break;
					
				case 'de':
					$violation_policy_paragraphs[] =
						'<h3><a name="violation-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Richtlinien zu Verstößen - Was ist zu tun, wenn Sie gegen diese Bedingungen verstoßen?</h3>';
					
					$violation_policy_paragraphs[] =
						'<p>Wenn Sie einen Verstoß gegen diese Allgemeinen Geschäftsbedingungen feststellen, sollten Sie sich an uns wenden.</p>' .
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>';
					break;
					
				case 'es':
					$violation_policy_paragraphs[] =
						'<h3><a name="violation-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Política de violación - Qué hacer si encuentra una violación de estos términos y condiciones</h3>';
					
					$violation_policy_paragraphs[] =
						'<p>Si encuentra una violación de estos términos y condiciones, le recomendamos que se comunique con nosotros.</p>' .
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>';
					break;
					
				case 'fr':
					$violation_policy_paragraphs[] =
						'<h3><a name="violation-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Politique de violation - Que faire si vous constatez une violation de ces termes et conditions</h3>';
					
					$violation_policy_paragraphs[] =
						'<p>Si vous constatez une violation de ces termes et conditions, nous vous invitons à nous contacter.</p>' .
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>';
					break;
					
				case 'ja':
					$violation_policy_paragraphs[] =
						'<h3><a name="violation-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 違反ポリシー - あなたがこれらの利用規約の違反を見つけた場合の対処</h3>';
					
					$violation_policy_paragraphs[] =
						'<p>あなたがこれらの利用規約の違反を見つけた場合、あなたは私たちに手を差し伸べることをお勧めします。</p>' .
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>';
					break;
					
				case 'it':
					$violation_policy_paragraphs[] =
						'<h3><a name="violation-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Politica di violazione - Cosa fare se si rileva una violazione di questi termini e condizioni</h3>';
					
					$violation_policy_paragraphs[] =
						'<p>Se trovi una violazione di questi termini e condizioni, sei incoraggiato a contattarci.</p>' .
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>';
					break;
					
				case 'nl':
					$violation_policy_paragraphs[] =
						'<h3><a name="violation-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Overtredingbeleid - Wat te doen als u een overtreding van deze algemene voorwaarden constateert</h3>';
					
					$violation_policy_paragraphs[] =
						'<p>Als u een overtreding van deze algemene voorwaarden constateert, wordt u aangemoedigd om contact met ons op te nemen.</p>' .
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>';
					break;
					
				case 'pl':
					$violation_policy_paragraphs[] =
						'<h3><a name="violation-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Zasady łamania zasad - co zrobić, jeśli znajdziesz naruszenie tych warunków</h3>';
					
					$violation_policy_paragraphs[] =
						'<p>Jeśli znajdziesz naruszenie tych warunków, zachęcamy do skontaktowania się z nami.</p>' .
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>';
					break;
					
				case 'pt':
					$violation_policy_paragraphs[] =
						'<h3><a name="violation-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Política de Violação - O que fazer se você encontrar uma violação destes termos e condições</h3>';
					
					$violation_policy_paragraphs[] =
						'<p>Se você encontrar uma violação destes termos e condições, então você é encorajado a nos procurar.</p>' .
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>';
					break;
					
				case 'ru':
					$violation_policy_paragraphs[] =
						'<h3><a name="violation-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Политика нарушения - что делать, если вы обнаружите нарушение этих условий</h3>';
					
					$violation_policy_paragraphs[] =
						'<p>Если вы обнаружите нарушение этих положений и условий, вам рекомендуется обратиться к нам.</p>' .
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>';
					break;
					
				case 'tr':
					$violation_policy_paragraphs[] =
						'<h3><a name="violation-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : İhlal Politikası - Bu hüküm ve koşulların ihlal edildiğini tespit ederseniz ne yapılmalı?</h3>';
					
					$violation_policy_paragraphs[] =
						'<p>Bu şartlar ve koşulları ihlal ederseniz, bize ulaşmanız teşvik edilir.</p>' .
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>';
					break;
					
				case 'zh':
					$violation_policy_paragraphs[] =
						'<h3><a name="violation-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 违规政策 - 如果您发现违反这些条款和条件该怎么办</h3>';
					
					$violation_policy_paragraphs[] =
						'<p>如果您发现违反这些条款和条件，我们鼓励您与我们联系。</p>' .
						'<blockquote><a href="/contact.php">' . $this->getContactUsText() . '</a></blockquote>';
					break;
			}
			
			return $violation_policy_paragraphs;
		}
		
		public function getUserTerminationPolicySection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$user_termination_policy_paragraphs = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$user_termination_policy_paragraphs[] =
						'<h3><a name="user-termination-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : User Termination Policy</h3>';
					
					$user_termination_policy_paragraphs[] =
						'<p>If you fail to uphold the basic, expected standards of the Anarchist Code of Code, then we reserve the right to terminate your user account and all data associated with it.</p>';
					break;
					
				case 'de':
					$user_termination_policy_paragraphs[] =
						'<h3><a name="user-termination-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Kündigungsrichtlinie für Benutzer</h3>';
					
					$user_termination_policy_paragraphs[] =
						'<p>Wenn Sie die grundlegenden, erwarteten Standards des Anarchist Code of Code nicht einhalten, behalten wir uns das Recht vor, Ihr Benutzerkonto und alle damit verbundenen Daten zu kündigen.</p>';
					break;
					
				case 'es':
					$user_termination_policy_paragraphs[] =
						'<h3><a name="user-termination-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Política de terminación de usuario</h3>';
					
					$user_termination_policy_paragraphs[] =
						'<p>Si no respeta los estándares básicos esperados del Código de Código Anarquista, entonces nos reservamos el derecho de cancelar su cuenta de usuario y todos los datos asociados con ella.</p>';
					break;
					
				case 'fr':
					$user_termination_policy_paragraphs[] =
						'<h3><a name="user-termination-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Politique de résiliation d\'utilisateur</h3>';
					
					$user_termination_policy_paragraphs[] =
						'<p>Si vous ne respectez pas les normes de base attendues du code de code anarchiste, nous nous réservons le droit de résilier votre compte utilisateur et toutes les données qui lui sont associées.</p>';
					break;
					
				case 'ja':
					$user_termination_policy_paragraphs[] =
						'<h3><a name="user-termination-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : ユーザー終了ポリシー</h3>';
					
					$user_termination_policy_paragraphs[] =
						'<p>あなたがアナキストコードの基本的な、期待される基準を守らない場合、私たちはあなたのユーザーアカウントとそれに関連するすべてのデータを終了させる権利を留保します。</p>';
					break;
					
				case 'it':
					$user_termination_policy_paragraphs[] =
						'<h3><a name="user-termination-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Politica di risoluzione degli utenti</h3>';
					
					$user_termination_policy_paragraphs[] =
						'<p>Se non si rispettano gli standard di base previsti dal codice di codice anarchico, ci riserviamo il diritto di chiudere l\'account utente e tutti i dati ad esso associati.</p>';
					break;
					
				case 'nl':
					$user_termination_policy_paragraphs[] =
						'<h3><a name="user-termination-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Gebruikersbeëindigingsbeleid</h3>';
					
					$user_termination_policy_paragraphs[] =
						'<p>Als je de fundamentele, verwachte standaarden van de anarchistische Code of Code niet handhaaft, behouden we ons het recht voor om je gebruikersaccount en alle bijbehorende gegevens te beëindigen.</p>';
					break;
					
				case 'pl':
					$user_termination_policy_paragraphs[] =
						'<h3><a name="user-termination-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Zasady rezygnacji użytkownika</h3>';
					
					$user_termination_policy_paragraphs[] =
						'<p>Jeśli nie dotrzymasz podstawowych, oczekiwanych standardów anarchistycznego Kodeksu Kodeksu, zastrzegamy sobie prawo do usunięcia konta użytkownika i wszystkich związanych z nim danych.</p>';
					break;
					
				case 'pt':
					$user_termination_policy_paragraphs[] =
						'<h3><a name="user-termination-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Política de rescisão de usuário</h3>';
					
					$user_termination_policy_paragraphs[] =
						'<p>Se você não cumprir os padrões básicos e esperados do Código de Código Anarquista, reservamo-nos o direito de encerrar sua conta de usuário e todos os dados associados a ela.</p>';
					break;
					
				case 'ru':
					$user_termination_policy_paragraphs[] =
						'<h3><a name="user-termination-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Политика прекращения использования</h3>';
					
					$user_termination_policy_paragraphs[] =
						'<p>Если вы не соблюдаете основные ожидаемые стандарты Анархистского кодекса, мы оставляем за собой право прекратить действие вашей учетной записи пользователя и всех данных, связанных с ней.</p>';
					break;
					
				case 'tr':
					$user_termination_policy_paragraphs[] =
						'<h3><a name="user-termination-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Kullanıcı Sonlandırma Politikası</h3>';
					
					$user_termination_policy_paragraphs[] =
						'<p>Anarşist Kod Kurallarının temel ve beklenen standartlarını yerine getiremezseniz, kullanıcı hesabınızı ve onunla ilişkili tüm verileri sonlandırma hakkını saklı tutarız.</p>';
					break;
					
				case 'zh':
					$user_termination_policy_paragraphs[] =
						'<h3><a name="user-termination-policy"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 用户终止政策</h3>';
					
					$user_termination_policy_paragraphs[] =
						'<p>如果您未能遵守无政府主义者准则代码的基本预期标准，那么我们保留终止您的用户帐户及其相关所有数据的权利。</p>';
					break;
			}
			
			return $user_termination_policy_paragraphs;
		}
		
		public function getLicenseTermsSection($args) {
			$header_index = $args['headerindex'];
			$image = $args['image'];
			
			$license_terms_paragraphs = [];
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$license_terms_paragraphs[] =
						'<h3><a name="terms-of-service-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : How is the text of these terms of service licensed?</h3>' .
						
						'<p>This terms and conditions document is licensed under the following terms...</p>' .
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'de':
					$license_terms_paragraphs[] = 
						'<h3><a name="terms-of-service-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Wie ist der Text dieser Nutzungsbedingungen lizenziert?</h3>' .
						
						'<p>Dieses Dokument mit den Allgemeinen Geschäftsbedingungen ist unter den folgenden Bedingungen lizenziert ...</p>' .
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'es':
					$license_terms_paragraphs[] = 
						'<h3><a name="terms-of-service-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : ¿Cómo se licencia el texto de estos términos de servicio?</h3>' .
						
						'<p>Este documento de términos y condiciones está licenciado bajo los siguientes términos ...</p>' .
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'fr':
					$license_terms_paragraphs[] = 
						'<h3><a name="terms-of-service-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Comment le texte de ces conditions d\'utilisation est-il concédé sous licence?</h3>' .
						
						'<p>Ce document de termes et conditions est sous licence selon les termes suivants ...</p>' .
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'ja':
					$license_terms_paragraphs[] = 
						'<h3><a name="terms-of-service-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : これらの利用規約のテキストはどのようにライセンスされていますか？</h3>' .
						
						'<p>この契約条件書は以下の条件の下でライセンスされています...</p>' .
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'it':
					$license_terms_paragraphs[] = 
						'<h3><a name="terms-of-service-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Come viene concesso in licenza il testo di questi termini di servizio?</h3>' .
						
						'<p>Questo documento di termini e condizioni è concesso in licenza con i seguenti termini ...</p>' .
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'nl':
					$license_terms_paragraphs[] = 
						'<h3><a name="terms-of-service-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Hoe wordt de tekst van deze servicevoorwaarden in licentie gegeven?</h3>' .
						
						'<p>Dit document met bepalingen en voorwaarden is gelicentieerd onder de volgende voorwaarden ...</p>' .
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'pl':
					$license_terms_paragraphs[] =
						'<h3><a name="terms-of-service-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : W jaki sposób licencjonowany jest tekst niniejszych warunków świadczenia usług?</h3>' .
						
						'<p>Ten dokument warunków korzystania z usługi jest licencjonowany na następujących warunkach ...</p>' .
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'pt':
					$license_terms_paragraphs[] =
						'<h3><a name="terms-of-service-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Como o texto destes termos de serviço é licenciado?</h3>' .
						
						'<p>Este documento de termos e condições está licenciado sob os seguintes termos ...</p>' .
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'ru':
					$license_terms_paragraphs[] =
						'<h3><a name="terms-of-service-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Как текст этих условий обслуживания лицензируется?</h3>' .
						
						'<p>Этот документ условий и положений лицензируется на следующих условиях ...</p>' .
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'tr':
					$license_terms_paragraphs[] =
						'<h3><a name="terms-of-service-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : Bu hizmet şartlarının metni nasıl lisanslanır?</h3>' .
						
						'<p>Bu şartlar ve koşullar belgesi aşağıdaki şartlar altında lisanslanmıştır ...</p>' .
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
					
				case 'zh':
					$license_terms_paragraphs[] =
						'<h3><a name="terms-of-service-license"></a>' .
						$this->getImageMarkup(['image'=>$image]) .
						$this->getSectionText(['headerindex'=>$header_index]) . ' : 这些服务条款的文本如何获得许可？</h3>' .
						
						'<p>本条款和条件文件根据以下条款获得许可......</p>' .
						
						'<blockquote><a href="http://www.CopyLeftLicense.com/?id=440" target="_blank">Creative Commons Attribution 3.0 License (CC-BY License)</a></blockquote>';
					break;
			}
			
			return $license_terms_paragraphs;
		}
		
						// Privacy Policy Helper Functions
						// ---------------------------------------------
		
		public function getTheWebsiteText() {
			$text = '';
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$text = 'The Website';
					break;
					
				case 'de':
					$text = 'Die Webseite';
					break;
					
				case 'es':
					$text = 'El sitio web';
					break;
					
				case 'fr':
					$text = 'Le site Web';
					break;
					
				case 'ja':
					$text = 'ウェブサイト';
					break;
					
				case 'it':
					$text = 'Il sitoweb';
					break;
					
				case 'nl':
					$text = 'De website';
					break;
					
				case 'pl':
					$text = 'Strona internetowa';
					break;
					
				case 'pt':
					$text = 'O site';
					break;
					
				case 'ru':
					$text = 'Веб-сайт';
					break;
					
				case 'tr':
					$text = 'İnternet sitesi';
					break;
					
				case 'zh':
					$text = '网站';
					break;
			}
			
			return $text;
		}
		
		public function getAdminText() {
			$text = '';
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$text = 'Admin';
					break;
					
				case 'de':
					$text = 'Administrator';
					break;
					
				case 'es':
					$text = 'Administración';
					break;
					
				case 'fr':
					$text = 'Admin';
					break;
					
				case 'ja':
					$text = '管理者';
					break;
					
				case 'it':
					$text = 'Admin';
					break;
					
				case 'nl':
					$text = 'Beheerder';
					break;
					
				case 'pl':
					$text = 'Administrator';
					break;
					
				case 'pt':
					$text = 'Admin';
					break;
					
				case 'ru':
					$text = 'Администратор';
					break;
					
				case 'tr':
					$text = 'Yönetim';
					break;
					
				case 'zh':
					$text = '管理员';
					break;
			}
			
			return $text;
		}
		
		public function getUsersText() {
			$text = '';
			
			switch($this->language_object->getLanguageCode()) {
				default:
				case 'en':
					$text = 'Users';
					break;
					
				case 'de':
					$text = 'Benutzer';
					break;
					
				case 'es':
					$text = 'Usuarios';
					break;
					
				case 'fr':
					$text = 'Utilisatrices';
					break;
					
				case 'ja':
					$text = 'ユーザー';
					break;
					
				case 'it':
					$text = 'Utenti';
					break;
					
				case 'nl':
					$text = 'Gebruikers';
					break;
					
				case 'pl':
					$text = 'Użytkownicy';
					break;
					
				case 'pt':
					$text = 'Comercial';
					break;
					
				case 'ru':
					$text = 'пользователей';
					break;
					
				case 'tr':
					$text = 'Kullanıcılar';
					break;
					
				case 'zh':
					$text = '用户';
					break;
			}
			
			return $text;
		}
		
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
			$base_directory = '/image/terms/';
			
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
					$header_title_text = 'Terms of Service for ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'de':
					$header_title_text = 'Nutzungsbedingungen für ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'es':
					$header_title_text = 'Términos de servicio para ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'fr':
					$header_title_text = 'Conditions d\'utilisation de ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'ja':
					$header_title_text = 'の利用規約' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'it':
					$header_title_text = 'Termini di servizio per ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'nl':
					$header_title_text = 'Servicevoorwaarden voor ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'pl':
					$header_title_text = 'Warunki usługi dla ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'pt':
					$header_title_text = 'Termos de Serviço para ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'ru':
					$header_title_text = 'Условия обслуживания для ' . $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'];
					break;
					
				case 'tr':
					$header_title_text = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'] . ' Hizmet Koşulları';
					break;
					
				case 'zh':
					$header_title_text = $this->master_record['Title'] . ' : ' . $this->master_record['Subtitle'] . '的服务条款';
					break;
			}
			
			return $this->header_title_text = $header_title_text;
		}
	}
	
?>