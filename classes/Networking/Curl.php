<?php

	class Curl
	{
		public function GetCurlOptions()
		{
			return [
				'Effective URL'=>CURLINFO_EFFECTIVE_URL,
				'HTTP Code'=>CURLINFO_HTTP_CODE,
				'File Name'=>CURLINFO_FILETIME,
				'Total Time'=>CURLINFO_TOTAL_TIME,
				'Name Lookup Time'=>CURLINFO_NAMELOOKUP_TIME,
				'Connect Time'=>CURLINFO_CONNECT_TIME,
				'Pretransfer Time'=>CURLINFO_PRETRANSFER_TIME,
				'Start Transfer Time'=>CURLINFO_STARTTRANSFER_TIME,
				'Redirect Count'=>CURLINFO_REDIRECT_COUNT,
				'Redirect Time'=>CURLINFO_REDIRECT_TIME,
				'Redirect URL'=>CURLINFO_REDIRECT_URL,
				'Primary IP'=>CURLINFO_PRIMARY_IP,
				'Primary Port'=>CURLINFO_PRIMARY_PORT,
				'Local IP'=>CURLINFO_LOCAL_IP,
				'Local Port'=>CURLINFO_LOCAL_PORT,
				'Size Upload'=>CURLINFO_SIZE_UPLOAD,
				'Size Download'=>CURLINFO_SIZE_DOWNLOAD,
				'Speed Download'=>CURLINFO_SPEED_DOWNLOAD,
				'Speed Upload'=>CURLINFO_SPEED_UPLOAD,
				'Header Size'=>CURLINFO_HEADER_SIZE,
				'Header Out'=>CURLINFO_HEADER_OUT,
				'Request Size'=>CURLINFO_REQUEST_SIZE,
				'SSL Verify Result'=>CURLINFO_SSL_VERIFYRESULT,
				'Content Length Download'=>CURLINFO_CONTENT_LENGTH_DOWNLOAD,
				'Content Length Upload'=>CURLINFO_CONTENT_LENGTH_UPLOAD,
				'Content Type'=>CURLINFO_CONTENT_TYPE,
				'Private'=>CURLINFO_PRIVATE,
				'Response Code'=>CURLINFO_RESPONSE_CODE,
				'Connect Code'=>CURLINFO_HTTP_CONNECTCODE,
				'HTTP Auth Avail'=>CURLINFO_HTTPAUTH_AVAIL,
				'Proxy Auth Avail'=>CURLINFO_PROXYAUTH_AVAIL,
				'Proxy OS Error Number'=>CURLINFO_OS_ERRNO,
				'Number of Connects'=>CURLINFO_NUM_CONNECTS,
				'SSL Engines'=>CURLINFO_SSL_ENGINES,
				'Cookie List'=>CURLINFO_COOKIELIST,
				'FTP Entry Path'=>CURLINFO_FTP_ENTRY_PATH,
				'Application Connect Time'=>CURLINFO_APPCONNECT_TIME,
				'Cert Info'=>CURLINFO_CERTINFO,
				'Condition Unmet'=>CURLINFO_CONDITION_UNMET,
				'RTSP Client CSeq'=>CURLINFO_RTSP_CLIENT_CSEQ,
				'RTSP CSeq Received'=>CURLINFO_RTSP_CSEQ_RECV,
				'RTSP Server CSeq'=>CURLINFO_RTSP_SERVER_CSEQ,
				'RTSP Session ID'=>CURLINFO_RTSP_SESSION_ID,
			];
		}
	}

?>