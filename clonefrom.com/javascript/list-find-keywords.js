$(document).ready(function(event){
	var timeout;
	var delay = 1000;	// 1 seconds
	$('.input-area').keyup(function(e) {
		$('#status-text').text(processingText());
		if(timeout) {
			clearTimeout(timeout);
		}
		timeout = setTimeout(function() {
			findKeywords();
		}, delay);
	});
	
	var clicked = 0;
	
	$('.input-area').click(function(e) {
		if(!clicked)
		{
			$(this).val('');
			clicked = 1;
		}
	});
	
	$('.find-keywords-button').click(function(e) {
		findKeywords();
	});
	
	$('.strip-html').click(function(e) {
		findKeywords();
	});
	
	$('.ignore-common-words').click(function(e) {
		findKeywords();
	});
	
	$('.include-phrases').click(function(e) {
		findKeywords();
	});
	
	$('.show-counts').click(function(e) {
		findKeywords();
	});
	
	$('#sort-order').change(function(e) {
		findKeywords();
	});
	
	function processingText() {
		return 'Processing';
	}
	
	function waitingForUserText() {
		return 'Waiting for User';
	}
	
//'first', 'second',' etc.
//'firstly', secondly', etc.
// twenty-five, etc.
// fifth, sixith, etc.
// 5th, 6th, etc.
// no.1, no.2, etc.
// n.1, n.2, etc.
//1, 2, etc.
//i, ii, etc.
//(ALL MULTIPLE APOSTROPHES)
	
	function getIgnoreKeywords() {
		var ignorekeywords = [
			'.',
			'!',
			'?',
			',',
			':',
			';',
			'#',	// new
			'=',	// new
			'\'',		// new
			'\'\'',		// new
			'\'\'\'',		// new
			'"',		// new
			'""',		// new
			'"""',		// new
			'/',	// new
			'\\',	// new
			'&',	// new
			'&c',	// new, "&c.", ("etc.")
			'¶',	// new
			'-',			// BT: New.
			'--',			// BT: New.
			'---',			// BT: New.
			'–',			// BT: New
			'––',			// BT: New
			'–––',			// BT: New
			'_',			// BT: New.
			'__',			// BT: New.
			'___',			// BT: New.
			'____',			// BT: New.
			'_____',		// BT: New.
			'______',		// BT: New.
			'_______',		// BT: New.
			'—',			// BT: new.
			'——',			// BT: new.
			'———',			// BT: new.
			'\'',			// BT: New.
			'',			// BT: new.
			'',			// BT: new.
			'*',			// BT: New.
			'**',			// BT: New.
			'***',			// BT: New.
			'…',	// new
			'……',	// new
			'………',	// new
			
			'00th',	// new
			'0th',
			'1st',
			'2nd',
			'3rd',
			'4th',
			'5th',
			'6th',
			'7th',
			'8th',
			'9th',
			'10th',
			
			'00\'th',	// new
			'0\th',
			'1\'st',
			'2\'nd',
			'3\'rd',
			'4\'th',
			'5\'th',
			'6\'th',
			'7\'th',
			'8\'th',
			'9\'th',
			'10\'th',
			'11\'th',
			'12\'th',
			'13\'th',
			'14\'th',
			'15\'th',
			'16\'th',
			'17\'th',
			'18\'th',
			'19\'th',
			'20\'th',
			
			'first',	// bt: new
			'second',
			'third',
			'fourth',
			'fifth',
			'sixth',
			'seventh',
			'eighth',
			'ninth',
			'tenth',
			'eleventh',
			'twelfth',
			'thirteenth',
			'fourteenth',
			'fifteenth',
			'sixteenth',
			'seventeeth',
			'eighteenth',
			'ninteenth',
			'twentieth',
			
			'firstly',	// BT: new
			'secondly',
			'thirdly',
			'fourthly',
			'fifthly',
			'sixthly',
			'seventhly',
			'eighthly',
			'ninthly',
			'tenthly',
			'eleventhly',
			'twelfthly',
			'thirteenthly',
			'fourteenthly',
			'fifteenthly',
			'sixteenthly',
			'seventeenthly',
			'eighteenthly',
			'nineteenthly',
			'twenthiethly',
			
			'one',	// bt: new
			'two',
			'three',
			'four',
			'five',
			'six',
			'seven',
			'eight',
			'nine',
			'ten',
			'eleven',
			'twelve',
			'thirteen',
			'fourteen',
			'fifteen',
			'sixteen',
			'seventeen',
			'eighteen',
			'nineteen',
			'twenty',
			
			'i',	// bt: new
			'ii',
			'iii',
			'iv',
			'v',
			'vi',
			'vii',
			'viii',
			'ix',
			'x',
			
			'00',	// BT: new
			'000',			// BT: New
			'0',			// BT: New.
			'1',			// BT: New.
			'2',			// BT: New.
			'3',			// BT: New.
			'4',			// BT: New.
			'5',			// BT: New.
			'6',			// BT: New.
			'7',			// BT: New.
			'8',			// BT: New.
			'9',			// BT: New.
			'10',
			'11',
			'12',
			'13',
			'14',
			'15',
			'16',
			'17',
			'18',
			'19',
			'20',
			'21',
			'22',
			'23',
			'24',
			'25',			// BT: New.
			'26',
			'27',
			'28',
			'29',
			'30',
			'31',
			'32',
			'33',
			'34',
			'35',
			'36',
			'37',
			'38',
			'39',
			'40',
			'41',
			'42',
			'43',
			'44',
			'45',
			'46',
			'47',
			'48',
			'49',
			'50',
			'51',
			'52',
			'53',
			'54',
			'55',
			'56',
			'57',
			'58',
			'59',
			'60',
			'61',
			'62',
			'63',
			'64',
			'65',
			'66',
			'67',
			'68',
			'69',
			'70',
			'71',
			'72',
			'73',
			'74',
			'75',
			'76',
			'77',
			'78',
			'79',
			'80',
			'81',
			'82',
			'83',
			'84',
			'85',
			'86',
			'87',
			'88',
			'89',
			'90',
			'91',
			'92',
			'93',
			'94',
			'95',
			'96',
			'97',
			'98',
			'99',
			'100',
			'200',
			'300',
			'400',
			'500',
			'600',
			'700',
			'800',
			'900',
			'1000',
			
			'0.',	// bt: new
			'1.',
			'2.',
			'3.',
			'4.',
			'5.',
			'6.',
			'7.',
			'8.',
			'9.',
			'10.',
			
			'p0',	// bt: new
			'p1',
			'p2',
			'p3',
			'p4',
			'p5',
			'p6',
			'p7',
			'p8',
			'p9',
			'p10',
			'p11',
			'p12',
			'p13',
			'p14',
			'p15',
			'p16',
			'p17',
			'p18',
			'p19',
			'p20',
			
			'0)',	// bt: new
			'1)',	// bt: new
			
			'a\'',		// new
			
			'\'a',		// new
			
			'a',		// all new
			'b',		// new ... etc.
			'c',
			'd',
			'e',
			'f',
			'g',
			'h',
			'i',
			'j',
			'k',
			'l',
			'm',
			'n',
			'o',
			'p',
			'q',
			'r',
			's',
			't',
			'u',
			'v',
			'w',
			'x',
			'y',
			'z',
			
			'\'gainst',	// new
			'\'neath',	// new
			'\'round',	// new
			'\'tis',	// new
			'\'s',	 // new
			'ab',	// new, latin, as in "ab novo"
			'abideth',	// new
			'able',	//new.
			'above',	// new
			'about',
			'absolutely',	// new
			'according',		// new.
			'accordingly',		// new
			'achieving',	// new
			'across',	// new
			'actual',	// new
			'actually',		// BT: New
			'admit',	// new
			'admittably',	// new
			'admitted',		// B:T New
			'affect',	// new
			'affecting',	// new
			'affects',	// new
			'after',		// BT: New
			'afterward',	// new
			'afterwards',	// new
			'again',		// BT: New.
			'against',	// new.
			'ago',	// new
			'agree',		// new
			'agreed',	// new
			'agrees',	// new
			'agreeing',	// new
			'ah',	// new
			'ahead',	// new.
			'al',	// new, as in "et al"
			'alas',	// new
			'albeit',	// new
			'alike',	// new
			'all',	// new
			'allage',	// new
			'alleged',	// new
			'allegedly',	// new
			'allow',	// new.
			'almost',	// new.
			'aloft',	// new
			'along',	// new
			'already',	// new
			'also',
			'although',	//new
			'altogether',	// new
			'always',	// new
			'am',			// BT: New
			'amid',	// new
			'amidst',	// new
			'among',
			'amongst',		// bt: new
			'amount',	// new
			'amounting',	// new
			'amounts',	// new
			'amuck',	// new
			'an',
			'and',
			'another',		// BT: new.
			'any',
			'anymore',	// new
			'anyway',	// BT: new
			'apart',	// new
			'apparent',	// new
			'apparently',	// new
			'appear',	// new
			'appeared', // bt
			'appearing', // new
			'appears',	// new
			'apply',	// new
			'are',
			'around',	// new
			'as',
			'aside',	// new
			'ask',	//new.
			'aspect',	// new.
			'aspects',	// new.
			'ass\'n',	// new, "assistant"
			'assume',	// new.
			'assumed',	// new
			'assumes',	// new
			'assuming',	// new
			'at',
			'attributable',	// new
			'au',	// new, "au contraire"
			'augers',	// new, "augers well"
			'aught',	// new
			'away',	// new
			'awhile',	// new
			'aye',	// new
			'back',		// New.
			'backward',	// new
			'badly',	// new
			'barely',	// new
			'based',	// new
			'basically',	// new
			'be',
			'became',	// new
			'because',
			'become',	// new
			'becoming',	// new
			'becomes',	// new
			'been',
			'before',
			'beforehand',	// new
			'began',	// new
			'behalf',	// new
			'beheld',	// new
			'behind',	// new
			'behold',	// new
			'beholding',	// new
			'being',
			'believe',	// New.
			'beneath',	// new
			'beside',	// new
			'besides',	// new
			'better',	// new
			'between',	// new
			'betwixt',	// new
			'both',		// new.
			'bout',	// new
			'beyond',
			'bid',	// new
			'brief',	//new
			'briefly',	// new
			'bring',	// new
			'bringing',	// new
			'brings',	// new
			'briskly',	// new
			'brought',	// new
			'but',
			'by',
			'call',	//new
			'called',	// new.
			'came',	// new
			'can',
			'can\'t', //new
			'cannot',
			'case',	// new
			'certain',	// new.
			'certainly',	// new
			'chapter',	// new
			'chiefly',	// new
			'circumstances',	// new
			'claim',	// new
			'claims',	// new
			'clearly',	// new
			'closely',	// new
			'closer',	// new
			'co',	// i.e., company
			'come',
			'comes',	// new
			'coming',
			'commit',	// new
			'committed',	// new
			'committing',	// new
			'commits',	// new
			'completely',		// New.
			'concerned',	// new
			'concerns',	// new
			'concerning',	// new
			'condition',	// new
			'consequently',		// new
			'consider',	// new
			'considerable',	// new
			'considered',	// new
			'considering',	// new
			'consist',	// new
			'consisted',	// new
			'consisting',	// new
			'consists',	// new
			'constantly',	// new
			'constitute',	// new
			'constituted',	// new
			'constitutes',	// new
			'constituting',	// new
			'contain',	// new
			'contained',	// new
			'contains',	// new
			'containing',	// new
			'continually',	// new
			'continuously',	// new
			'contraire',	// new, "au contraire"
			'contrarily',	// new.
			'contrary',	// new
			'could',
			'couldn\'t',
			'culpa',	// new, "mea culpa"
			'currently',	// new
			'daily',	// new
			'day',	// new
			'de',	 // new, "De facto", "De Jure", Latin, etc.
			'dear',		// new.
			'declare',	// new
			'declared',	// new
			'definitely',	// new
			'describe',	// new
			'describes',	// new
			'despite',		// New.
			'determine',	// new
			'determined',	// new
			'determines',	// new
			'determining',	// new
			'did',
			'didn\'t',	// new
			'do',
			'does',
			'doesn\'t',	// new
			'doesn’t',	// new
			'doing',
			'done',
			'don\'t',	// new
			'don\’t',	// new
			'dost',	// dost thou toketh?
			'doth',	// new
			'doubtless',	// new
			'doubtlessly',	// new
			'down',
			'downright',	// new
			'dozen',	// new
			'drang',	// new, german, 'sturm und drang'
			'duly',		// new
			'during',	// new
			'each',		// new
			'earlier',	// new
			'earlieriest',	// new
			'early',	// new
			'easily',	// new
			'effect',	// new
			'effecting',	// new
			'effects',	// new
			'eg',	// new, i.e, "e.g."
			'end',	//new
			'ends',	// new
			'entire',	// new
			'either',	// new.
			'else',		// new.
			'else',	// new.
			'else\'s',	// new.
			'else’s',	// new
			'elsewhere',	// new
			'en',	// new, as in "en gros"
			'enough',	// new.
			'entirely',	// new.
			'erstwhile',	// new
			'especially',	// new.
			'essentially',	// new
			'et',	// new, as in "et al"
			'etc',		// new.
			'even',		// New.
			'eventually',	// new
			'ever',	 // new
			'every',	// New.
			'evident',	// new.
			'evidently',	// new.
			'exactly',	// new
			'example',	// new
			'examples',	// new
			'except',	// new
			'excepted',	// new
			'excepting',	// new
			'excepts',	// new
			'exception',	// new
			'exceptions',	// new
			'exclusively',	// new
			'exercising',	// new.
			'exist',	// new
			'exists',	// new
			'expense',	// new
			'explicitly',	// new
			'extent',	// new
			'externally',	// new
			'extremely',	// new
			'faced',	// new
			'faces',	// new
			'facing',	// New.
			'fact',	// new
			'facto',	// new, "de facto"
			'facts',	// new
			'fairly',	// new
			'false',	// new
			'far',	 //new
			'farther',	// new
			'few',
			'finally',	// new
			'find',	// new
			'finds',	// new
			'finding',	// new
			'findings',	// new
			'five',	// new
			'former',	// new
			'formerly',	//new
			'found',	// new
			'founded',	// new
			'founds',	// new
			'for',
			'force', //new
			'forefront',	// new
			'foremost',	// new
			'foreswearing',	// new
			'former',	// new
			'formidably',	// new
			'forth',	// new, "go forth"
			'forthwith',	// new
			'four',	// new
			'frankly',	// new
			'frequently',	// new
			'from',
			'full',	// new
			'fully',	// new.
			'further',	// new.
			'furthermore',	// new
			'gave',	// new
			'general',	// new
			'generally',	// new
			'generic',	// new.
			'get',	// New.
			'gets',	// new
			'getting',	// new
			'give',	// new.
			'given',	// new.
			'gives',	// new
			'go',
			'goes',	// new
			'going',	// new
			'goings',	// new
			'goings-on',	// new
			'goingson',	// new
			'goodbye',	//new
			'goodly',	// new
			'got',		// new
			'gotten',	// new
			'gradually',	// new
			'greater',	// new
			'gros',	// new, as in "en gros"
			'grossly',	// new
			'ha',	 // new
			'had',
			'hadn\'t',	// new
			'half',	// new
			'happen',	// new
			'happened',	// new
			'happens',	// new
			'hardly',	// new
			'has',
			'hast',	// "hast thou toketh?"
			'hath',	// new
			'have',
			'haven\'t',	// new
			'having',
			'he',
			'he\'d',	// new
			'he\'s',	// new
			'held',	// new
			'hello',	// new
			'hence',	// new
			'henceforth',	// new
			'her',
			'here', // new.
			'hereafter',	// new
			'hereby',	// new
			'heretofore',	// new
			'hers',	// new
			'herself', // new
			'highly',	// new
			'him',
			'himself',	//new
			'his',
			'hither',	// new
			'hitherto',	// new
			'hold',	// new
			'holding',	// new
			'how',
			'however',
			'hundreds',	//new.
			'i',
			'i\'d',		// new
			'i\'m',		// new
			'i\'ve',	// new
			'ibid',	// new
			'ibidum',	// new
			'ie',	// new, "i.e."
			'if',
			'im',		// new
			'imagined',	// new
			'imagines',	// new
			'imagining',	// new
			'immediately',	// new.
			'implicitly',	// new
			'implied',	// new
			'implies',	// new
			'imply',	// new
			'incomparably',	// new
			'increasingly',	// new
			'indeed',	// new
			'inevitably',	// new
			'instance',	// new.
			'into',
			'in',		// new
			'inasmuch',	// new
			'include',	// new
			'included',	// new
			'including',	// new
			'infer',	// new
			'inferred',	// new
			'inferring',	// new
			'inside',	 // new
			'insofar',	// new
			'instead',	// new
			'insuch',	// new
			'internally',	// new
			'invariably',	// new
			'irregardless',	// new
			'irregardlessly',	// new
			'irrespective',	// new
			'irrespectively',	// new
			'is',
			'isn\'t',	// new
			'issue',	// new
			'it',
			'its',		// new
			'it\'s',	// new
			'itself',	// new
			'ized',	// new, as in "anarchist-ized"
			'jure',	// new, "De Jure", etc.
			'keep',		// new.
			'keeping',	// new
			'keeps',	// new
			'kept',	// new
			'kind',		// New.
			'kinds',	// new
			'km',	// new, "kilometer", metric system
			'knew',		//new.
			'know',
			'knowing',	// new.
			'knows',	// new
			'lack',		// new
			'lacks',	// new
			'lacking',	// new
			'largely',	// new.
			'larger',	// new
			'largest',	// new
			'last',		// new
			'lastly',	// new
			'latest',	// new.
			'latter',
			'la',	// new, french
			'late',	// new
			'lately',	// new
			'later',	// new
			'le',	// new, french
			'least',	// new.
			'leave',	// new
			'les',	// new, french
			'less',	// new
			'lest',	// new
			'let',
			'let\'s',	// new
			'lets',
			'like',
			'likely',	// new
			'likes',	// new
			'likewise',	// new
			'literally',	// new
			'little',	// New.
			'lo',	// new
			'lo\'',	// new
			'long',	//new
			'longer',	// new
			'longest',	// new
			'longing',	// new
			'look', //new
			'looked',	// new
			'looking',	// new
			'looks',	// new
			'luckily',	// new
			'made',
			'make',		// new.
			'makes',	// new
			'making',	// new
			'main',		// new
			'mainly',	//new
			'man\'s',	// new
			'many',	//new
			'may',		// New
			'maybe',	// new
			'me',
			'mea',	 // new, "mea culpa"
			'mean',	// new.
			'means',	// new
			'meant',	// new
			'meantime',	// new
			'meanwhile',	// new
			'mere',	// new
			'merely',	//new
			'messrs',	// new
			'met',	// new
			'midst',	// new
			'midsts',	// new
			'minor',	// new
			'miss',	// new
			'mister',	// new
			'mlle',	// new, french
			'mme',	// new, french
			'moment',	// New
			'more',	//new
			'moreover',	// new
			'morrow',	// new
			'most',	//new
			'mostly',	// new
			'mr',	// new
			'mrs',	// new
			'much',	// new
			'must',		// New
			'my',
			'myself',	// new
			'name',		// new
			'namely',	// new
			'naturally',	// new
			'naught',	// new
			'nay',	// new
			'ne',	// new
			'ne\'er',	// new
			'near',		// new
			'nearest',	// new
			'nearly',	// new
			'necessarily',	// new
			'needs',	// new
			'neither',
			'never',	//new
			'nevertheless',	//new
			'new',	// new.
			'next',	// new
			'nil',	// nuw
			'no',
			'nobody',	// New
			'non',	// new, latin
			'none',	// new
			'nonetheless',	// new
			'nor',		// new
			'normally',	// new
			'not',
			'notably',	// new
			'notwith',	// new
			'notwithstanding',	// new
			'nouveau',	// new, french
			'nouveaux',	// new, french
			'novo',	// new, latin
			'now',	// new
			'nowaday',	// new
			'nowadays',	// new
			'o\'',	// new
			'obstinately',	// new
			'obviously',	// new
			'occasion',	// new
			'occasionally',	// new
			'occassion',	// new
			'occassionally',	// new
			'occur',	// new
			'occuring',	// new
			'occurs',	// new
			'occurred',	// new
			'of',	// new
			'off',
			'oft',	// new
			'often',
			'oftener',	// new
			'oh',	// new
			'ol',	 // new
			'ole',	// new
			'on',
			'once',
			'one',
			'one\'s',
			'one’s',
			'ones',
			'only',
			'onto',	// new
			'or',
			'ordinarily',	// bt: new
			'originally',	// bt: new
			'other',	// new.
			'others',	//new.
			'otherwise',	// new
			'ought',	// new
			'our',
			'ourselves',	// new.
			'out',		// New.
			'outright',	// new
			'outside',	// new
			'o\'er',	// new
			'over',	// new
			'overlooks',	// new
			'owe',	// new
			'owed',	// new
			'owes',	// new
			'owing',	// new
			'own',
			'paces',	// new
			'pacing',	// new
			'par',	// new
			'part',	// new.
			'parted',	// new
			'partly',	// new
			'parts',	// new
			'parting',	// new
			'particular',	// new
			'particularly',	// new
			'passed',	// new
			'passing',	// new
			'passings',	// new
			'patiently',	//new
			'peculiarly',	// new
			'per',	// new
			'perchance',	// new
			'perhaps',	// new
			'place',	// new
			'places',	// new
			'placing',	// new
			'possible',	// new
			'possibly',	// new
			'pour',	// new, portuguese
			'pp',	// new
			'practically',	// new
			'precede',	// new
			'precedes',	// new
			'preceding',	// new
			'precisely',	// new
			'prefer',	// new
			'prefers',	// new
			'preliminary',	// new
			'pre',	// new
			'present',
			'presently',	// new
			'presume',	// new
			'presumably',	// new
			'presuming',	// new
			'presumingly',	// new
			'presuppose',	// new
			'presupposes',	// new
			'presupposing',	// new
			'previously',	// new
			'pro',	// new
			'probable',	// new
			'probably',	// new
			'proceed',	// new
			'proceeding',	// new
			'proceeds',	// new
			'proportionately',	// new
			'pull',		// new
			'pulled',	// new
			'pulling',	// new
			'pulls',	// new
			'put',
			'puts',	// new
			'putting',	// new
			'puts',	// new
			'quickly',	// new
			'quite',	// New.
			'rarely',	// new
			'rather',
			'readily',	// new
			'realize',	// new
			'realized',	// new
			'realizes',	// new
			'realizing',	// new
			'really',	// new.
			'recent',	// new'
			'recently',	// new
			'recieved',	// new
			'recieves',	// new
			'recieving',	// new
			'reckon',	// new
			'regard',	// new
			'regarded',	// new
			'regarding',	// new
			'regardless',	// new
			'regardlessly',	// new
			'regards',	// New.
			'relatively',	// new
			'remain',	// new
			'remained',	// new
			'remaining',	// new
			'remains',	// new
			'remind',	// new
			'requisite',	// new
			'represents',	// new
			'resulting',	// new
			'rid',	// new
			'said',
			'sake',	// new
			'same',		// new
			'saw',		// new
			'say',		// new
			'saying',	// new
			'says',		// new
			'scarcely',	// new
			'see',		// new
			'seeing',	// new
			'seen',		// new
			'sees',		// new
			'seek',		// new
			'seeked',	// new
			'seeks',	// new
			'seem',		// new
			'seemed',	// new
			'seeming',	// new
			'seemingly',	// new
			'seems',	// new
			'seldom',	// new
			'send',	// new
			'sending',	// new
			'sends',	// new
			'sent',	// new
			'separate',	// new
			'separated',	// new
			'separates',	// new
			'separating',	// new
			'set',	// new.
			'several',	// new
			'shall',	// new
			'she',	// new
			'she\'d',	// new
			'she\'s',	// new
			'sheer',	// new
			'shew',	// new
			'short',	// new
			'shorter',	// new
			'shortest',	// new
			'shortly',	// new
			'should',	// new
			'show',		// new
			'shows',	// new
			'sic',		// new
			'side',		// new
			'sides',	// new
			'siding',	// new
			'signifies',	// new.
			'simply',	// new
			'simultaneosly',	// new
			'since',	// new.
			'sincerely',	// new
			'slightly',	// new
			'slowly',	// new
			'so',
			'so-called',	// new
			'socalled',	// new
			'some',		// new.
			'somebody',	// new
			'someone',	// New.
			'somewhat',	// new.
			'soon',
			'some',
			'somehow',	// new
			'something',	// new.
			'sometimes',	// new
			'sought',	// new
			'specially',	// new
			'st',	// new
			'stated',	// new
			'steadily',	// new
			'still',
			'stop',	// new
			'strictly',	// new
			'sturm',	// new, german, 'sturm und drang'
			'subject',	// new
			'such',		// New.
			'sudden',	// new.
			'suddenly',	// new
			'suppose',	// new
			'supposed',	// new
			'supposedly',	// new
			'supposes',	// new
			'supposing',	// new
			'sure',
			'surely',
			'take',		// new
			'taken',	// New.
			'takes',
			'taking',	//new
			'technically',	// new
			'tell',	//new
			'telling', //new
			'tellingly',	// new
			'tells',	// new
			'temporarily',	// new
			'tend',	// new
			'tends',	// new
			'than',
			'that',
			'that\'s',	// new
			'the',
			'thee',		// new
			'their',
			'theirs',	// new
			'them',
			'themselves',	// new
			'then',
			'there',
			'there\'ll',	// new
			'there\'s',	// new
			'thereafter',	// new
			'thereby',	// new
			'therefor',
			'therefore',
			'therefrom',	// new
			'therein',	// new
			'thereof',	// new
			'these',
			'they',
			'they\'d',	// new
			'they\'ll',	// new
			'they\'re',	// new
			'thine',	// new
			'thing',
			'things',	// new
			'this',
			'thither',	// new
			'thorough',	// new
			'thoroughly',	// new
			'those',
			'thou',	//new
			'though',
			'thousands',	// new
			'three',	// new
			'through',	// new
			'throughout',	// new
			'thus', //new
			'thy',	// new
			'thyself',	// new
			'time',	// new
			'tis',	// new
			'to',
			'to-day',	// new
			'to-night',	// new
			'today',	 // new
			'together',	//new
			'told',	// new
			'tonight',	// new
			'too', //new
			'took',	// new
			'topic',	//new
			'total',	// new
			'totalled',	// new
			'totally',	// new.
			'toward',	// new
			'towards',	//new
			'tried',	// new
			'true',		// new
			'truly',	// new
			'try',		// New.
			'trying',	// new
			'turn',	// new
			'turned',	// new
			'turning',	// new
			'turns',	// new
			'two',	// new
			'ultimately',	// new
			'unable',	// new.
			'unconsciously',	// new
			'undeniably',	// new
			'under',	// new.
			'underlying',	// new
			'undoubtedly',	// new
			'unduly',	// new
			'unfortunately',	// new.
			'unless',	// new
			'unlike',	// new
			'unlikely',	// new
			'unlimitedly',	// new
			'unspeakably',	// new
			'utterly',	// new
			'und',	// new, german, "sturm und drang"
			'until',	//new
			'unto',	// new
			'up',
			'upon',
			'us',
			'use',		// New.
			'used',		// New.
			'using',	// new.
			'usually',	// New.
			'utmost',	// new
			'utter',	// new
			'variably',	// new
			'various',	// new.
			'verily',	// new
			'very',		// New.
			'view',		// new
			'views',	// new
			'virtually',	// new
			'viz',	// new
			'wait',	//new
			'waited',	// new
			'waiting',	// new
			'waits',	// new
			'want',		// new.
			'was',
			'wasn\'t',	// new
			'way',	//new
			'ways', //new
			'we',
			'we\'ll',	// new
			'we\'re',	// new
			'well',
			'went',	// new
			'were',	// new
			'what',
			'what\'s',	// new
			'whatever',	// new
			'whathaveyou',	// new
			'whatsoever',	// new
			'when',
			'whence',	// new
			'whenever',	// new
			'where',
			'whereas',	 // new.
			'whereby',	// new
			'wherefore',	// new
			'wherefrom',	// new
			'wherein',	// new
			'whereto',	// new
			'wheretofore',	// new
			'whereupon',	// new
			'wherever',	// new
			'whether',
			'which',
			'while',	// BT: new.
			'whilst',	// BT: new
			'who',
			'whoever',	// BT: new
			'whomever',	// BT: new
			'whomsoever',	// new
			'whosoever',	// new
			'whom',	// BT: new.
			'whomsoever',	// new
			'whose',
			'why',
			'wide',	// new
			'widely',	// new
			'will',
			'willing',	// new
			'willingly',	// new
			'with',
			'within',
			'without',
			'woman\'s',	// new
			'won\'t',	// new
			'wont',	// new
			'would',	// bt: new
			'wouldn\'t',	// new
			'wouldst',	// bt: new, as in "wouldst thou toketh?"
			'write',	// new
			'writes',	// new
			'wrote',	// new
			'wrought',	// new
			'ye',	// new
			'year\'s',	// new
			'yee',	// new
			'yes',	// new
			'yet',	// new
			'you',
			'you\'ll',	// new
			'you\'re',	// new
			'you’re',	// new
			'you\'ve',	// new
			'you’ve',	// new
			'your',		// new
			'yours',	// new
			'yourself',	// new
			'yourselves',	// new
		];
		
		return ignorekeywords;
	}
	
	function getIgnoreKeywordsHash() {
		var ignorekeywords = getIgnoreKeywords();
		var ignorekeywordshash = {};
		
		for(i = 0; i < ignorekeywords.length; i++)
		{
			ignorekeywordshash[ignorekeywords[i]] = 1;
		}
		
		return ignorekeywordshash;
	}
	
	function getInputWords() {
		var inputtext = $('.input-area').val();
		
		if($('.strip-html').is(':checked'))
		{
			inputtext = $("<div/>").html(inputtext).text();
		}
		
		inputtext = inputtext.replace(/\t/gi, " ");
		inputtext = inputtext.replace(/\n/gi, " ");
		inputtext = inputtext.replace(/\r/gi, " ");
		inputtext = inputtext.replace(/,/gi, " ");
		inputtext = inputtext.replace(/!/gi, " ");
		inputtext = inputtext.replace(/;/gi, " ");
		inputtext = inputtext.replace(/:/gi, " ");
		inputtext = inputtext.replace(//gi, "'");		// BT: New.
		inputtext = inputtext.replace(//gi, "'");
		inputtext = inputtext.replace(//gi, " ");
		inputtext = inputtext.replace(//gi, " ");
		inputtext = inputtext.replace(/\"/gi, " ");
		inputtext = inputtext.replace(/\?/gi, " ");
		inputtext = inputtext.replace(/\./gi, " ");
		inputtext = inputtext.replace(/\(/gi, " ");
		inputtext = inputtext.replace(/\)/gi, " ");
		inputtext = inputtext.replace(/\[/gi, " ");
		inputtext = inputtext.replace(/\]/gi, " ");
		inputtext = inputtext.replace(/{/gi, " ");
		inputtext = inputtext.replace(/}/gi, " ");
		inputtext = inputtext.replace(/’/gi, "'");
		inputtext = inputtext.replace(/`/gi, "'");
		inputtext = inputtext.replace(/“/gi, " ");
		inputtext = inputtext.replace(/”/gi, " ");
		inputtext = inputtext.replace(/"/gi, " ");
		inputtext = inputtext.replace(/ ' /gi, " ");
		inputtext = inputtext.replace(/•/gi, " ");
		inputtext = inputtext.replace(/\*/gi, " ");
		
		inputtext = inputtext.replace(/to-morrow/gi, "tomorrow");
		inputtext = inputtext.replace(/good-bye/gi, "goodbye");
		
		var inputwords = inputtext.toLowerCase().split(' ');
		
		var realinputwords = [];
		var inputwordscount = inputwords.length;
		
		for(i = 0; i < inputwordscount; i++)
		{
			var inputword = $.trim(inputwords[i]);
			if(inputword)
			{
				realinputwords.push(inputword);
			}
		}
		
		inputwords = realinputwords;
		
		return inputwords;
	}
	
	function getSkipWords() {
		var skipwords = {};
		
		if($('.ignore-common-words').is(':checked'))
		{
			skipwords = getIgnoreKeywordsHash();
		}
		
		return skipwords;
	}
	
	function findKeywordPhrases(args) {
		var inputwords = args['inputwords'];
		var inputwordscount = args['inputwordscount'];
		var skipwords = args['skipwords'];
		
		var finaloutput = '';
		
		if($('.include-phrases').is(':checked'))
		{
				// Six-Word Phrases
			var sixwordphrases = getSixWordPhraseCounts(args);
			var sixwordphrasessorted = sortKeywords({wordcounts:sixwordphrases});
			var sixwordphrasetext = displayKeywords({keywords:sixwordphrasessorted});
			
			if(sixwordphrasetext)
			{
				finaloutput += sixwordphrasetext + "\n\n";
			}
			
				// Five-Word Phrases
			var fivewordphrases = getFiveWordPhraseCounts(args);
			var fivewordphrasessorted = sortKeywords({wordcounts:fivewordphrases});
			var fivewordphrasetext = displayKeywords({keywords:fivewordphrasessorted});
			
			if(fivewordphrasetext)
			{
				finaloutput += fivewordphrasetext + "\n\n";
			}
			
				// Four-Word Phrases
			var fourwordphrases = getFourWordPhraseCounts(args);
			var fourwordphrasessorted = sortKeywords({wordcounts:fourwordphrases});
			var fourwordphrasetext = displayKeywords({keywords:fourwordphrasessorted});
			
			if(fourwordphrasetext)
			{
				finaloutput += fourwordphrasetext + "\n\n";
			}
			
				// Three-Word Phrases
			var threewordphrases = getThreeWordPhraseCounts(args);
			var threewordphrasessorted = sortKeywords({wordcounts:threewordphrases});
			var threewordphrasetext = displayKeywords({keywords:threewordphrasessorted});
			
			if(threewordphrasetext)
			{
				finaloutput += threewordphrasetext + "\n\n";
			}
			
				// Two-Word Phrases
			var twowordphrases = getTwoWordPhraseCounts(args);
			var twowordphrasessorted = sortKeywords({wordcounts:twowordphrases});
			var twowordphrasetext = displayKeywords({keywords:twowordphrasessorted});
			
			if(twowordphrasetext)
			{
				finaloutput += twowordphrasetext + "\n\n";
			}
		}
		
		return finaloutput;
	}
	
	function getTwoWordPhraseCounts(args) {
		var inputwords = args['inputwords'];
		var inputwordscount = args['inputwordscount'];
		var skipwords = args['skipwords'];
		
		var twowordphrases = {};
		
		for(i = 0; i - 1 < inputwordscount; i++)
		{
			var currentword = $.trim(inputwords[i]);
			var nextword = $.trim(inputwords[i + 1]);
			if(currentword && nextword)
			{
				if(!skipwords[currentword] && !skipwords[nextword])
				{
					var phrase = currentword + ' ' + nextword;
					if(twowordphrases[phrase])
					{
						twowordphrases[phrase]++;
					}
					else
					{
						twowordphrases[phrase] = 1;
					}
				}
			}
		}
		
		return twowordphrases;
	}
	
	function getThreeWordPhraseCounts(args) {
		var inputwords = args['inputwords'];
		var inputwordscount = args['inputwordscount'];
		var skipwords = args['skipwords'];
		
		var threewordphrases = {};
		
		for(i = 0; i - 2 < inputwordscount; i++)
		{
			var currentword = $.trim(inputwords[i]);
			var nextword = $.trim(inputwords[i + 1]);
			var thirdword = $.trim(inputwords[i + 2]);
			if(currentword && nextword && thirdword)
			{
				if(
					(!skipwords[currentword] && !skipwords[nextword]) ||
					(!skipwords[currentword] && !skipwords[thirdword]) ||
					(!skipwords[nextword] && !skipwords[thirdword])
				)
				{
					var phrase = currentword + ' ' + nextword + ' ' + thirdword;
					if(threewordphrases[phrase])
					{
						threewordphrases[phrase]++;
					}
					else
					{
						threewordphrases[phrase] = 1;
					}
				}
			}
		}
		
		return threewordphrases;
	}
	
	function getFourWordPhraseCounts(args) {
		var inputwords = args['inputwords'];
		var inputwordscount = args['inputwordscount'];
		var skipwords = args['skipwords'];
		
		var fourwordphrases = {};
		
		for(i = 0; i - 2 < inputwordscount; i++)
		{
			var currentword = $.trim(inputwords[i]);
			var nextword = $.trim(inputwords[i + 1]);
			var thirdword = $.trim(inputwords[i + 2]);
			var fourthword = $.trim(inputwords[i + 3]);
			if(currentword && nextword && thirdword && fourthword)
			{
				if(
					(!skipwords[currentword] && !skipwords[nextword]) ||
					(!skipwords[currentword] && !skipwords[thirdword]) ||
					(!skipwords[currentword] && !skipwords[fourthword]) ||
					(!skipwords[nextword] && !skipwords[thirdword]) ||
					(!skipwords[nextword] && !skipwords[fourthword]) ||
					(!skipwords[thirdword] && !skipwords[fourthword])
				)
				{
					var phrase = currentword + ' ' + nextword + ' ' + thirdword + ' ' + fourthword;
					if(fourwordphrases[phrase])
					{
						fourwordphrases[phrase]++;
					}
					else
					{
						fourwordphrases[phrase] = 1;
					}
				}
			}
		}
		
		return fourwordphrases;
	}
	
	function getFiveWordPhraseCounts(args) {
		var inputwords = args['inputwords'];
		var inputwordscount = args['inputwordscount'];
		var skipwords = args['skipwords'];
		
		var fivewordphrases = {};
		
		for(i = 0; i - 2 < inputwordscount; i++)
		{
			var currentword = $.trim(inputwords[i]);
			var nextword = $.trim(inputwords[i + 1]);
			var thirdword = $.trim(inputwords[i + 2]);
			var fourthword = $.trim(inputwords[i + 3]);
			var fifthword = $.trim(inputwords[i + 4]);
			if(currentword && nextword && thirdword && fourthword && fifthword)
			{
				if(
					(!skipwords[currentword] && !skipwords[nextword]) ||
					(!skipwords[currentword] && !skipwords[thirdword]) ||
					(!skipwords[currentword] && !skipwords[fourthword]) ||
					(!skipwords[currentword] && !skipwords[fifthword]) ||
					(!skipwords[nextword] && !skipwords[thirdword]) ||
					(!skipwords[nextword] && !skipwords[fourthword]) ||
					(!skipwords[nextword] && !skipwords[fifthword]) ||
					(!skipwords[thirdword] && !skipwords[fourthword]) ||
					(!skipwords[thirdword] && !skipwords[fifthword]) ||
					(!skipwords[fourthword] && !skipwords[fifthword])
				)
				{
					var phrase = currentword + ' ' + nextword + ' ' + thirdword + ' ' + fourthword + ' ' + fifthword;
					if(fivewordphrases[phrase])
					{
						fivewordphrases[phrase]++;
					}
					else
					{
						fivewordphrases[phrase] = 1;
					}
				}
			}
		}
		
		return fivewordphrases;
	}
	
	function getSixWordPhraseCounts(args) {
		var inputwords = args['inputwords'];
		var inputwordscount = args['inputwordscount'];
		var skipwords = args['skipwords'];
		
		var sixwordphrases = {};
		
		for(i = 0; i - 2 < inputwordscount; i++)
		{
			var currentword = $.trim(inputwords[i]);
			var nextword = $.trim(inputwords[i + 1]);
			var thirdword = $.trim(inputwords[i + 2]);
			var fourthword = $.trim(inputwords[i + 3]);
			var fifthword = $.trim(inputwords[i + 4]);
			var sixthword = $.trim(inputwords[i + 5]);
			if(currentword && nextword && thirdword && fourthword && fifthword && sixthword)
			{
				if(
					(!skipwords[currentword] && !skipwords[nextword]) ||
					(!skipwords[currentword] && !skipwords[thirdword]) ||
					(!skipwords[currentword] && !skipwords[fourthword]) ||
					(!skipwords[currentword] && !skipwords[fifthword]) ||
					(!skipwords[currentword] && !skipwords[sixthword]) ||
					(!skipwords[nextword] && !skipwords[thirdword]) ||
					(!skipwords[nextword] && !skipwords[fourthword]) ||
					(!skipwords[nextword] && !skipwords[fifthword]) ||
					(!skipwords[nextword] && !skipwords[sixthword]) ||
					(!skipwords[thirdword] && !skipwords[fourthword]) ||
					(!skipwords[thirdword] && !skipwords[fifthword]) ||
					(!skipwords[thirdword] && !skipwords[sixthword]) ||
					(!skipwords[fourthword] && !skipwords[fifthword]) ||
					(!skipwords[fourthword] && !skipwords[sixthword]) ||
					(!skipwords[fifthword] && !skipwords[sixthword])
				)
				{
					var phrase = currentword + ' ' + nextword + ' ' + thirdword + ' ' + fourthword + ' ' + fifthword + ' ' + sixthword;
					if(sixwordphrases[phrase])
					{
						sixwordphrases[phrase]++;
					}
					else
					{
						sixwordphrases[phrase] = 1;
					}
				}
			}
		}
		
		return sixwordphrases;
	}
	
	function getSingleKeywordCounts(args) {
		words = args['words'];
		wordcount = args['wordcount'];
		skipwords = args['skipwords'];
		
		var wordcounts = {};
		
		for(i = 0; i < wordcount; i++)
		{
			var inputword = $.trim(words[i]);
			
			if(inputword)
			{
				if(!skipwords[inputword])
				{
					if(wordcounts[inputword])
					{
						wordcounts[inputword]++;
					}
					else
					{
						wordcounts[inputword] = 1;
					}
				}
			}
		}
		
		return wordcounts;
	}
	
	function sortKeywords(args) {
		var wordcounts = args['wordcounts'];
		var wordcountkeys = Object.keys(wordcounts);
		var wordcountkeyscount = wordcountkeys.length;
		
		var wordcountsbynumber = [];
		
		for(i = 0; i < wordcountkeyscount; i++)
		{
			wordcountkey = wordcountkeys[i];
			wordcount = wordcounts[wordcountkey];
			if(!wordcountkey.match(' ') || wordcount > 1)
			{
				wordcountsbynumber.push({
					'key':wordcountkey,
					'value':wordcount,
				});
			}
		}
		
		if($('#sort-order').val() == 'most-common-to-least-common')
		{
			wordcountsbynumber = wordcountsbynumber.sort(function(b, a) {
				return a.value -  b.value;
			});
		}
		else if($('#sort-order').val() == 'least-common-to-most-common')
		{
			wordcountsbynumber = wordcountsbynumber.sort(function(a, b) {
				return a.value - b.value;
			});
		}
		
		return wordcountsbynumber;
	}
	
	function displayKeywords(args) {
		var keywords = args['keywords'];
		
		var count = 0;
		var output = '';
		
		$.each(keywords, function(key, value) {
			output += value['key'];
			
			if($('#show-counts').is(':checked'))
			{
				output += ' -- ' + value['value'];
			}
			
			count++;
			
			if(count != keywords.length)
			{
				output += "\n";
			}
		});
		
		return output;
	}
	
	function findKeywords() {
		var skipwords = getSkipWords();
		var inputwords = getInputWords();
		var inputwordscount = inputwords.length;

		var finaloutput = '';
		
		finaloutput = findKeywordPhrases({inputwords:inputwords, inputwordscount:inputwordscount, skipwords:skipwords});
		
		var wordcounts = getSingleKeywordCounts({wordcount:inputwordscount, words:inputwords, skipwords:skipwords});
		
		var wordcountsbynumber = sortKeywords({wordcounts:wordcounts});
		finaloutput += displayKeywords({keywords:wordcountsbynumber});
		
		$('.output-area').val(finaloutput);
		$('.output-area').change();
		$('#status-text').text(waitingForUserText());
	}
});