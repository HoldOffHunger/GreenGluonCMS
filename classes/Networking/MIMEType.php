<?php

	class MIMEType
	{
		public function GetMIMETypeCodes()
		{
					# SOURCE :
					# http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types
					
			return [
					// Standard
					// ---------------------------------------------------------
				'txt'=>'text/plain',
				'htm'=>'text/html',
				'html'=>'text/html',
				'php'=>'text/html',
				'css'=>'text/css',
				'js'=>'application/javascript',
				'json'=>'application/json',
				'xml'=>'application/xml',
				'swf'=>'application/x-shockwave-flash',
				'flv'=>'video/x-flv',
				
					// Images
					// ---------------------------------------------------------
				'png'=>'image/png',
				'jpe'=>'image/jpeg',
				'jpeg'=>'image/jpeg',
				'jpg'=>'image/jpeg',
				'gif'=>'image/gif',
				'bmp'=>'image/bmp',
				'ico'=>'image/vnd.microsoft.icon',
				'tiff'=>'image/tiff',
				'tif'=>'image/tiff',
				'svg'=>'image/svg+xml',
				'svgz'=>'image/svg+xml',
				
					// Archives
					// ---------------------------------------------------------
				'zip'=>'application/zip',
				'rar'=>'application/x-rar-compressed',
				'exe'=>'application/x-msdownload',
				'msi'=>'application/x-msdownload',
				'cab'=>'application/vnd.ms-cab-compressed',
				
					// Audio/Video
					// ---------------------------------------------------------
				'mp3'=>'audio/mpeg',
				'qt'=>'video/quicktime',
				'mov'=>'video/quicktime',
				
					// Adobe
					// ---------------------------------------------------------
				'pdf'=>'application/pdf',
				'psd'=>'image/vnd.adobe.photoshop',
				'ai'=>'application/postscript',
				'eps'=>'application/postscript',
				'ps'=>'application/postscript',
				
					// MS Office
					// ---------------------------------------------------------
				'doc'=>'application/msword',
				'rtf'=>'application/rtf',
				'xls'=>'application/vnd.ms-excel',
				'ppt'=>'application/vnd.ms-powerpoint',
				
					// Open Office
					// ---------------------------------------------------------
				'odt'=>'application/vnd.oasis.opendocument.text',
				'ods'=>'application/vnd.oasis.opendocument.spreadsheet',
				
					// Source Code
					// ---------------------------------------------------------
				'csv'=>'text/csv',
				'tex'=>'application/x-tex',
				'opds'=>'application/xml',
				'sgml'=>'text/sgml',
				'rdf'=>'application/rdf+xml',
				
					// NEW
					// ---------------------------------------------------------
				'ez'=>'application/andrew-inset',
				'aw'=>'application/applixware',
				'atom'=>'application/atom+xml',
				'atomcat'=>'application/atomcat+xml',
				'atomsvc'=>'application/atomsvc+xml',
				'ccxml'=>'application/ccxml+xml',
				'cdmia'=>'application/cdmi-capability',
				'cdmic'=>'application/cdmi-container',
				'cdmid'=>'application/cdmi-domain',
				'cdmio'=>'application/cdmi-object',
				'cdmiq'=>'application/cdmi-queue',
				'cu'=>'application/cu-seeme',
				'davmount'=>'application/davmount+xml',
				'dbk'=>'application/docbook+xml',
				'dssc'=>'application/dssc+der',
				'xdssc'=>'application/dssc+xml',
				'ecma'=>'application/ecmascript',
				'emma'=>'application/emma+xml',
				'epub'=>'application/epub+zip',
				'exi'=>'application/exi',
				'pfr'=>'application/font-tdpfr',
				'woff'=>'application/font-woff',
				'gml'=>'application/gml+xml',
				'gpx'=>'application/gpx+xml',
				'gxf'=>'application/gxf',
				
					// POSSIBLY SYSTEM-INVENTED
					// ---------------------------------------------------------
				'daisy'=>'text/html',
			];
		}
	}
?>