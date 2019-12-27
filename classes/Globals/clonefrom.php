<?php

	class defaultglobals {
						// Constructor
						// -------------------------------------------------------------------
						
		public function __construct($args) {
			$this->primaryhost = $this->PrimaryHostInfo();
			$this->db = $this->DBInfo();
			$this->mainmenu = $this->MainMenu();
			$this->styling = $this->Styling();
			$this->passwordseed = $this->NewRandomPasswordSeed();
			$this->apidata = $this->SetAPIData();
			$this->functionality = [
				'sharing'=>$this->SharingInfo(),
			];
			
			return $this;
		}
						// Primary Host Info
						// -------------------------------------------------------------------
		
		public function PrimaryHostInfo() {
			return [
				'id'=>0,
			];
		}
		
						// DB Info
						// -------------------------------------------------------------------
		
		public function DBInfo() {
			return [
				'username'=>'insert-username-here',
				'password'=>'insert-password-here',
				'hostname'=>'mysql.website.com',
			];
		}
		
		public function NewRandomPasswordSeed() {
			return 'oeuidoeydf5a3p3u3';
		}
		
		public function SetAPIData() {
			return [];
		}
		
						// Main Menu Info
						// -------------------------------------------------------------------
						
							// Master List
							// -------------------------------------------------------------------
		
		public function MainMenu() {
			return [
				'home'=>[
					'url'=>$this->MainMenu_URL_Home(),
					'text'=>[
						'en'=>'Home',
						'de'=>'Zuhause',
						'es'=>'Casa',
						'fr'=>'Accueil',
						'ja'=>'ホーム',
						'it'=>'Casa',
						'nl'=>'Huis',
						'pl'=>'Dom',
						'pt'=>'Casa',
						'ru'=>'Главная',
						'tr'=>'Ev',
						'zh'=>'家',
					],
					'enabled'=>$this->MainMenu_Enabled_Home(),
				],
				'about'=>[
					'url'=>$this->MainMenu_URL_About(),
					'text'=>[
						'en'=>'About',
						'de'=>'Etwa',
						'es'=>'Acerca de',
						'fr'=>'Sur',
						'ja'=>'約',
						'it'=>'Di',
						'nl'=>'Over',
						'pl'=>'O',
						'pt'=>'Sobre',
						'ru'=>'Около',
						'tr'=>'hakkında',
						'zh'=>'关于',
					],
					'enabled'=>$this->MainMenu_Enabled_About(),
				],
				'contact'=>[
					'url'=>$this->MainMenu_URL_Contact(),
					'text'=>[
						'en'=>'Contact',
						'de'=>'Kontakt',
						'es'=>'Contacto',
						'fr'=>'Contact',
						'ja'=>'接触',
						'it'=>'Contatto',
						'nl'=>'Contact',
						'pl'=>'Kontakt',
						'pt'=>'Contato',
						'ru'=>'контакт',
						'tr'=>'Temas',
						'zh'=>'联系',
					],
					'enabled'=>$this->MainMenu_Enabled_Contact(),
				],
				'search'=>[
					'url'=>$this->MainMenu_URL_Search(),
					'text'=>[
						'en'=>'Search',
						'de'=>'Suche',
						'es'=>'Buscar',
						'fr'=>'Chercher',
						'ja'=>'サーチ',
						'it'=>'Ricerca',
						'nl'=>'Zoeken',
						'pl'=>'Szukaj',
						'pt'=>'Procurar',
						'ru'=>'Поиск',
						'tr'=>'Arama',
						'zh'=>'搜索',
					],
					'enabled'=>$this->MainMenu_Enabled_Search(),
				],
				'languages'=>[
					'url'=>$this->MainMenu_URL_Languages(),
					'text'=>[
						'en'=>'Languages',
						'de'=>'Sprachen',
						'es'=>'Idiomas',
						'fr'=>'Langues',
						'ja'=>'言語',
						'it'=>'Le lingue',
						'nl'=>'Talen',
						'pl'=>'Języki',
						'pt'=>'Idiomas',
						'ru'=>'Языки',
						'tr'=>'Diller',
						'zh'=>'语言',
					],
					'enabled'=>$this->MainMenu_Enabled_Languages(),
				],
				'privacypolicy'=>[
					'url'=>$this->MainMenu_URL_PrivacyPolicy(),
					'text'=>[
						'en'=>'Privacy Policy',
						'de'=>'Datenschutz-Bestimmungen',
						'es'=>'Política de privacidad',
						'fr'=>'Politique de confidentialité',
						'ja'=>'個人情報保護方針',
						'it'=>'politica sulla riservatezza',
						'nl'=>'Privacybeleid',
						'pl'=>'Polityka prywatności',
						'pt'=>'Política de Privacidade',
						'ru'=>'политика конфиденциальности',
						'tr'=>'Gizlilik Politikası',
						'zh'=>'隐私政策',
					],
					'enabled'=>$this->MainMenu_Enabled_PrivacyPolicy(),
				],
				'terms'=>[
					'url'=>$this->MainMenu_URL_Terms(),
					'text'=>[
						'en'=>'Terms and Conditions',
						'de'=>'Geschäftsbedingungen',
						'es'=>'Términos y Condiciones',
						'fr'=>'Termes et conditions',
						'ja'=>'規約と条件',
						'it'=>'Termini e condizioni',
						'nl'=>'Voorwaarden',
						'pl'=>'Regulamin',
						'pt'=>'Termos e Condições',
						'ru'=>'Условия и положения',
						'tr'=>'Şartlar ve koşullar',
						'zh'=>'条款和条件',
					],
					'enabled'=>$this->MainMenu_Enabled_Terms(),
				],
				'codeofconduct'=>[
					'url'=>$this->MainMenu_URL_CodeOfConduct(),
					'text'=>[
						'en'=>'Code of Conduct',
						'de'=>'Verhaltensregeln',
						'es'=>'Código de Conducta',
						'fr'=>'Code de conduite',
						'ja'=>'行動規範',
						'it'=>'Codice di condotta',
						'nl'=>'Gedragscode',
						'pl'=>'Kodeks postępowania',
						'pt'=>'Código de conduta',
						'ru'=>'Нормы поведения',
						'tr'=>'Davranış kodu',
						'zh'=>'行为守则',
					],
					'enabled'=>$this->MainMenu_Enabled_CodeOfConduct(),
				],
				'login'=>[
					'url'=>$this->MainMenu_URL_Login(),
					'text'=>[
						'en'=>'Login',
						'de'=>'Anmeldung',
						'es'=>'Iniciar sesión',
						'fr'=>'S\'identifier',
						'ja'=>'ログイン',
						'it'=>'Accesso',
						'nl'=>'Log in',
						'pl'=>'Zaloguj Się',
						'pt'=>'Entrar',
						'ru'=>'Авторизоваться',
						'tr'=>'Oturum aç',
						'zh'=>'登录',
					],
					'enabled'=>$this->MainMenu_Enabled_Login(),
				],
			];
		}
						
							// URLs
							// -------------------------------------------------------------------
		
		public function MainMenu_URL_Home() {
			return '/';
		}
		
		public function MainMenu_URL_About() {
			return '/about.php';
		}
		
		public function MainMenu_URL_Contact() {
			return '/contact.php';
		}
		
		public function MainMenu_URL_Search() {
			return '/search.php';
		}
		
		public function MainMenu_URL_Languages() {
			return '/languages.php';
		}
		
		public function MainMenu_URL_PrivacyPolicy() {
			return '/privacy.php';
		}
		
		public function MainMenu_URL_Terms() {
			return '/terms.php';
		}
		
		public function MainMenu_URL_CodeOfConduct() {
			return '/codeofconduct.php';
		}
		
		public function MainMenu_URL_Login() {
			return '/login.php';
		}
						
							// Enabled/Disabled
							// -------------------------------------------------------------------
		
		public function MainMenu_Enabled_Home() {
			return TRUE;
		}
		
		public function MainMenu_Enabled_About() {
			return TRUE;
		}
		
		public function MainMenu_Enabled_Contact() {
			return TRUE;
		}
		
		public function MainMenu_Enabled_Search() {
			return FALSE;
		}
		
		public function MainMenu_Enabled_Languages() {
			return FALSE;
		}
		
		public function MainMenu_Enabled_PrivacyPolicy() {
			return TRUE;
		}
		
		public function MainMenu_Enabled_Terms() {
			return TRUE;
		}
		
		public function MainMenu_Enabled_CodeOfConduct() {
			return FALSE;
		}
		
		public function MainMenu_Enabled_Login() {
			return FALSE;
		}
		
						// Styling Info
						// -------------------------------------------------------------------
		
		public function Styling() {
			return [
				'PrimaryColor'=>'6495ED',
				'SecondaryColor'=>'C2DFFF',
				'ThirdColor'=>'B7CEEC',
			];
		}
		
						// Functionality Info
						// -------------------------------------------------------------------
		
		public function SharingInfo() {
			return [
				'text'=>[
					'Share'=>[
						'en'=>'Share',
						'de'=>'Aktie',
						'es'=>'Compartir',
						'fr'=>'Partager',
						'ja'=>'シェア',
						'it'=>'Condividere',
						'nl'=>'Delen',
						'pl'=>'Dzielić',
						'pt'=>'Compartilhar',
						'ru'=>'Поделиться',
						'tr'=>'Pay',
						'zh'=>'分享',
					],
					'Share With'=>[
						'en'=>'Share With',
						'de'=>'Teilen mit',
						'es'=>'Compartir con',
						'fr'=>'Partager avec',
						'ja'=>'と共有する',
						'it'=>'Condividi con',
						'nl'=>'Delen met',
						'pl'=>'Udostępniać',
						'pt'=>'Compartilhar com',
						'ru'=>'Разрешить',
						'tr'=>'İle paylaş',
						'zh'=>'与某人分享',
					],
				],
			];
		}
		
		/*
			'en'=>'',
			'de'=>'',
			'es'=>'',
			'fr'=>'',
			'ja'=>'',
			'it'=>'',
			'nl'=>'',
			'pl'=>'',
			'pt'=>'',
			'ru'=>'',
			'tr'=>'',
			'zh'=>'',
		*/
	}
	
?>