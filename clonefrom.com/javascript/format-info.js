$(document).ready(function() {
	function getFormatToolTip(args) {
		var imageurl = args.imageurl;
		var header = args.header;
		
		return '<div class="margin-5px font-family-arial">' +
				'<div class="margin-2px">' +
					'<img height="150" src="' + imageurl + '">' +
				'</div>' +
				'<p class="margin-0px font-family-arial font-size-75percent horizontal-center">' +
					'<b>' + header + '</b>' +
				'</p>' +
			'</div>';
	}
	
	$('.mobile-format-icon').tooltip({
		'content':getFormatToolTip({
			'imageurl':'https://www.revoltlib.com/image/formats/mobile.jpg',
			'header':'Mobile<br>Version',
		}),
		'track':true,
	});
	
	$('.pdf-format-icon').tooltip({
		'content':getFormatToolTip({
			'imageurl':'https://www.revoltlib.com/image/formats/pdf.jpg',
			'header':'PDF<br>File',
		}),
		'track':true,
	});
	
	$('.printer-friendly-format-icon').tooltip({
		'content':getFormatToolTip({
			'imageurl':'https://www.revoltlib.com/image/formats/printer-friendly.jpg',
			'header':'Printer<br>Friendly',
		}),
		'track':true,
	});
	
	$('.plaintext-format-icon').tooltip({
		'content':getFormatToolTip({
			'imageurl':'https://www.revoltlib.com/image/formats/plaintext.jpg',
			'header':'Plain<br>Text',
		}),
		'track':true,
	});
	
	$('.wrapped-plaintext-format-icon').tooltip({
		'content':getFormatToolTip({
			'imageurl':'https://www.revoltlib.com/image/formats/wrapped-plaintext.jpg',
			'header':'Wrapped<br>Plaintext',
		}),
		'track':true,
	});
	
	$('.inverted-colors-format-icon').tooltip({
		'content':getFormatToolTip({
			'imageurl':'https://www.revoltlib.com/image/formats/inverted-colors.jpg',
			'header':'Inverted<br>Colors',
		}),
		'track':true,
	});
	
	$('.rtf-format-icon').tooltip({
		'content':getFormatToolTip({
			'imageurl':'https://www.revoltlib.com/image/formats/rtf.jpg',
			'header':'RTF<br>File',
		}),
		'track':true,
	});
	
	$('.epub-format-icon').tooltip({
		'content':getFormatToolTip({
			'imageurl':'https://www.revoltlib.com/image/formats/epub.jpg',
			'header':'Epub<br>File',
		}),
		'track':true,
	});
	
	$('.daisy-format-icon').tooltip({
		'content':getFormatToolTip({
			'imageurl':'https://www.revoltlib.com/image/formats/daisy.jpg',
			'header':'DAISY<br>Format',
		}),
		'track':true,
	});
	
	$('.sgml-format-icon').tooltip({
		'content':getFormatToolTip({
			'imageurl':'https://www.revoltlib.com/image/formats/sgml.jpg',
			'header':'SGML<br>Format',
		}),
		'track':true,
	});
	
	$('.json-format-icon').tooltip({
		'content':getFormatToolTip({
			'imageurl':'https://www.revoltlib.com/image/formats/json.jpg',
			'header':'JSON<br>Format',
		}),
		'track':true,
	});
	
	$('.xml-format-icon').tooltip({
		'content':getFormatToolTip({
			'imageurl':'https://www.revoltlib.com/image/formats/xml.jpg',
			'header':'XML<br>Format',
		}),
		'track':true,
	});
	
	$('.csv-format-icon').tooltip({
		'content':getFormatToolTip({
			'imageurl':'https://www.revoltlib.com/image/formats/csv.jpg',
			'header':'CSV<br>Format',
		}),
		'track':true,
	});
	
	$('.latex-format-icon').tooltip({
		'content':getFormatToolTip({
			'imageurl':'https://www.revoltlib.com/image/formats/latex.jpg',
			'header':'Latex<br>Format',
		}),
		'track':true,
	});
	
	$('.opds-format-icon').tooltip({
		'content':getFormatToolTip({
			'imageurl':'https://www.revoltlib.com/image/formats/opds.jpg',
			'header':'OPDS<br>Format',
		}),
		'track':true,
	});
	
	$('.rdf-format-icon').tooltip({
		'content':getFormatToolTip({
			'imageurl':'https://www.revoltlib.com/image/formats/rdf.jpg',
			'header':'RDF<br>Format',
		}),
		'track':true,
	});
});