<?php

	class PhishingCharacters
	{
		public function CleanseInput_PhishingCharacters($args)
		{
			$input = $args[input];
			
			$replacement_characters = $this->CleanseInput_PhishingCharacters_Replacements();
			
			$cleansed_input = str_replace(array_keys($replacement_characters), $replacement_characters, $input);
			
			$cleansed_input_results = array(
				'cleansedinput'=>$cleansed_input,
			);
			
			return $cleansed_input_results;
		}
		
		public function CleanseInput_PhishingCharacters_Replacements()
		{
			return array(
				"&#0;" => " ",
				"&#1;" => " ",
				"&#2;" => " ",
				"&#3;" => " ",
				"&#4;" => " ",
				"&#5;" => " ",
				"&#6;" => " ",
				"&#7;" => " ",
				"&#8;" => " ",
				"&#9;" => " ",
				"&#11;" => " ",
				"&#12;" => " ",
				"&#14;" => " ",
				"&#15;" => " ",
				"&#16;" => " ",
				"&#17;" => " ",
				"&#18;" => " ",
				"&#19;" => " ",
				"&#20;" => " ",
				"&#21;" => " ",
				"&#22;" => " ",
				"&#23;" => " ",
				"&#24;" => " ",
				"&#25;" => " ",
				"&#26;" => " ",
				"&#27;" => " ",
				"&#28;" => " ",
				"&#29;" => " ",
				"&#30;" => " ",
				"&#31;" => " ",
				"&#32;" => " ",
				"&#127;" => " ",
				"&#129;" => " ",
				"&#141;" => " ",
				"&#143;" => " ",
				"&#144;" => " ",
				"&#157;" => " ",
				"&#160;" => " ",
				"&#173;" => " ",
				"&#180;" => "'",
			//	"&#188;" => "1/4",	// Handled by HTMLEntities
			//	"&#189;" => "1/2",	// Handled by HTMLEntities
			//	"&#190;" => "3/4",	// Handled by HTMLEntities
				"&#306;" => "IJ",
				"&#307;" => "ij",
				"&#338;" => "&#140;",
				"&#339;" => "&#156;",
				"&#444;" => "5",
				"&#448;" => "|",
				"&#449;" => "||",
				"&#451;" => "!",
				"&#452;" => "D&#142;",
				"&#453;" => "D&#158;",
				"&#454;" => "d&#158;",
				"&#455;" => "LJ",
				"&#456;" => "Lj",
				"&#457;" => "lj",
				"&#458;" => "NJ",
				"&#459;" => "Nj",
				"&#460;" => "nj",
				"&#497;" => "DZ",
				"&#498;" => "Dz",
				"&#499;" => "dz",
				"&#609;" => "g",
				"&#697;" => "'",
				"&#698;" => "\"",
				"&#706;" => "&#60;",
				"&#707;" => "&#62;",
				"&#710;" => "^",
				"&#714;" => "'",
				"&#716;" => ",",
				"&#717;" => "_",
				"&#718;" => ",",
				"&#719;" => ",",
				"&#720;" => ":",
				"&#722;" => "&#62;",
				"&#723;" => "&#60;",
				"&#726;" => "+",
				"&#733;" => "\"",
				"&#823;" => "/",
				"&#824;" => "/",
				"&#884;" => "'",
				"&#904;" => "'E",
				"&#905;" => "'H",
				"&#906;" => "'I",
				"&#908;" => "'O",
				"&#910;" => "'Y",
				"&#911;" => "'&#937;",
				"&#913;" => "A",
				"&#914;" => "B",
				"&#917;" => "E",
				"&#918;" => "Z",
				"&#919;" => "H",
				"&#921;" => "I",
				"&#922;" => "K",
				"&#924;" => "M",
				"&#925;" => "N",
				"&#957;" => "v",
				"&#959;" => "o",
				"&#965;" => "u",
				"&#967;" => "x",
				"&#1010;" => "c",
				"&#1011;" => "j",
				"&#1040;" => "A",
				"&#1042;" => "B",
				"&#1045;" => "E",
				"&#1052;" => "M",
				"&#1053;" => "H",
				"&#1054;" => "O",
				"&#1056;" => "P",
				"&#1057;" => "C",
				"&#1058;" => "T",
				"&#1059;" => "y",
				"&#1072;" => "a",
				"&#1077;" => "e",
				"&#1086;" => "o",
				"&#1088;" => "p",
				"&#1089;" => "c",
				"&#1417;" => ":",
				"&#1475;" => ":",
				"&#1524;" => "\"",
				"&#1545;" => "%.",
				"&#1546;" => "%..",
				"&#1642;" => "%",
				"&#1748;" => "-",
				"&#1793;" => "-",
				"&#1794;" => ".",
				"&#1795;" => ":",
				"&#1796;" => ":",
				"&#4447;" => " ",
				"&#4448;" => " ",
				"&#5941;" => "/",
				"&#8192;" => " ",
				"&#8193;" => " ",
				"&#8194;" => " ",
				"&#8195;" => " ",
				"&#8196;" => " ",
				"&#8197;" => " ",
				"&#8198;" => " ",
				"&#8199;" => " ",
				"&#8200;" => " ",
				"&#8201;" => " ",
				"&#8202;" => " ",
				"&#8203;" => " ",
				"&#8228;" => ".",
				"&#8231;" => "-",
				"&#8232;" => " ",
				"&#8233;" => " ",
				"&#8239;" => " ",
				"&#8249;" => "&lt;",
				"&#8250;" => "&gt;",
				"&#8257;" => "/",
				"&#8260;" => "/",
				"&#8274;" => "%",
				"&#8287;" => " ",
				"&#8531;" => "1/3",
				"&#8532;" => "2/3",
				"&#8533;" => "1/5",
				"&#8534;" => "2/5",
				"&#8535;" => "3/5",
				"&#8536;" => "4/5",
				"&#8537;" => "1/6",
				"&#8538;" => "5/6",
				"&#8539;" => "1/8",
				"&#8540;" => "3/8",
				"&#8541;" => "5/8",
				"&#8542;" => "7/8",
				"&#8543;" => "1/",
				"&#8725;" => "/",
				"&#8758;" => ":",
				"&#8764;" => "~",
				"&#8826;" => "&#60;",
				"&#8827;" => "&#62;",
				"&#9134;" => "|",
				"&#9352;" => "1.",
				"&#9353;" => "2.",
				"&#9354;" => "3.",
				"&#9355;" => "4.",
				"&#9356;" => "5.",
				"&#9357;" => "6.",
				"&#9358;" => "7.",
				"&#9359;" => "8.",
				"&#9360;" => "9.",
				"&#9361;" => "10.",
				"&#9362;" => "11.",
				"&#9363;" => "12.",
				"&#9364;" => "13.",
				"&#9365;" => "14.",
				"&#9366;" => "15.",
				"&#9367;" => "16.",
				"&#9368;" => "17.",
				"&#9369;" => "18.",
				"&#9370;" => "19.",
				"&#9371;" => "20.",
				"&#9474;" => "|",
				"&#9475;" => "|",
				"&#9585;" => "/",
				"&#9621;" => "|",
				"&#9711;" => "O",
				"&#10742;" => "/",
				"&#10744;" => "/",
				"&#11003;" => "///",
				"&#11005;" => "//",
				"&#12272;" => " ",
				"&#12273;" => " ",
				"&#12274;" => " ",
				"&#12275;" => " ",
				"&#12276;" => " ",
				"&#12277;" => " ",
				"&#12278;" => " ",
				"&#12279;" => " ",
				"&#12280;" => " ",
				"&#12281;" => " ",
				"&#12282;" => " ",
				"&#12283;" => " ",
				"&#12288;" => " ",
				"&#12290;" => ".",
				"&#12308;" => "(",
				"&#12309;" => ")",
				"&#12339;" => "/",
				"&#12644;" => " ",
				"&#12829;" => " ",
				"&#12830;" => " ",
				"&#13230;" => "rad/s",
				"&#13231;" => "rad/s2",
				"&#13254;" => "C/kg",
				"&#13279;" => "A/M",
				"&#42889;" => ":",
				"&#65044;" => ";",
				"&#65045;" => "!",
				"&#65087;" => "^",
				"&#65117;" => "(",
				"&#65118;" => ")",
				"&#65279;" => " ",
				"&#65294;" => ".",
				"&#65295;" => "/",
				"&#65377;" => ".",
				"&#65440;" => " ",
				"&#65529;" => " ",
				"&#65530;" => " ",
				"&#65531;" => " ",
				"&#65532;" => "[OBJ]",
				"&#65533;" => "?",
			);
		}
	}

?>