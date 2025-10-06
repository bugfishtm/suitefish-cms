<?php
	#	 ░▒▓███████▓▒░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░▒▓████████▓▒░▒▓████████▓▒░▒▓████████▓▒░▒▓█▓▒░░▒▓███████▓▒░▒▓█▓▒░░▒▓█▓▒░ 
	#	░▒▓█▓▒░      ░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░▒▓█▓▒░      ░▒▓█▓▒░░▒▓█▓▒░ 
	#	░▒▓█▓▒░      ░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░▒▓█▓▒░      ░▒▓█▓▒░░▒▓█▓▒░ 
	#	 ░▒▓██████▓▒░░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓██████▓▒░ ░▒▓██████▓▒░ ░▒▓█▓▒░░▒▓██████▓▒░░▒▓████████▓▒░ 
	#		   ░▒▓█▓▒░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░▒▓█▓▒░░▒▓█▓▒░ 
	#		   ░▒▓█▓▒░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░▒▓█▓▒░░▒▓█▓▒░ 
	#	░▒▓███████▓▒░ ░▒▓██████▓▒░░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓████████▓▒░▒▓█▓▒░      ░▒▓█▓▒░▒▓███████▓▒░░▒▓█▓▒░░▒▓█▓▒░ 
		
	#	Copyright (C) 2025 Jan Maurice Dahlmanns [Bugfish]

	#	This program is free software: you can redistribute it and/or modify
	#	it under the terms of the GNU General Public License as published by
	#	the Free Software Foundation, either version 3 of the License, or
	#	(at your option) any later version.

	#	This program is distributed in the hope that it will be useful,
	#	but WITHOUT ANY WARRANTY; without even the implied warranty of
	#	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	#	GNU General Public License for more details.

	#	You should have received a copy of the GNU General Public License
	#	along with this program.  If not, see <https://www.gnu.org/licenses/>.
		
	/***********************************************************************************************************
		Disable Hardlinking
	***********************************************************************************************************/
	if(!is_array(@$object)) { @http_response_code(@404); @Header("Location: ../"); exit(); }

	/***********************************************************************************************************
		View a File in Browser (download-fallback)
	***********************************************************************************************************/
	function hive__download_view($filePath, $filenamex = false) {	
		if(!$filenamex) { $filenamex = basename($filePath); }
		// Determine Current Extension	
			$extension = pathinfo($filenamex, PATHINFO_EXTENSION);
			$extension = $extension ? "".$extension."" : "";
		if (!empty($filePath) && file_exists($filePath)) {
			$fileInfo = pathinfo($filePath);
			$fileName = $filenamex;
			$fileExtension = strtolower($extension);
			$defaultContentType = "application/octet-stream";
			$contentTypesList = hive__download_mimeTypes();
			$contentType = $contentTypesList[$fileExtension] ?? $defaultContentType;

			$size = filesize($filePath);
			$offset = 0;
			$length = $size;

			if (isset($_SERVER['HTTP_RANGE'])) {
				if (preg_match('/bytes=(\d+)-(\d+)?/', $_SERVER['HTTP_RANGE'], $matches)) {
					$offset = intval($matches[1]);
					$length = (isset($matches[2]) ? intval($matches[2]) : $size) - $offset;
					$length = max($length, 0);
					$size = $size;
				} else {
					header('HTTP/1.1 400 Invalid Range');
					exit;
				}
			} 
			
			// Headers for viewing/downloading
			header('Content-Type: ' . $contentType);
			header('Accept-Ranges: bytes');
			header('Cache-Control: no-cache, must-revalidate');
			header('Pragma: no-cache');
			header('Expires: 0');

			// Determine if the file should be viewed inline or downloaded
			$inlineExtensions = ['jpg', 'jpeg', 'gif', 'png', 'pdf', 'mp4', 'webm', 'ogg'];
			if (in_array($fileExtension, $inlineExtensions)) {
				header('Content-Disposition: inline; filename="' . $fileName . '"');
			} else { 
				header('Content-Disposition: attachment; filename="' . $fileName . '"');
			}

			if ($offset > 0 || $length < $size) {
				header('HTTP/1.1 206 Partial Content');
				header('Content-Range: bytes ' . $offset . '-' . ($offset + $length - 1) . '/' . $size);
				header('Content-Length: ' . $length);
			} else {
				header('Content-Length: ' . $size);
			}

			// Output file content
			$chunkSize = 8 * 1024 * 1024; // 8MB
			$handle = fopen($filePath, 'rb');

			if ($handle === false) {
				header('HTTP/1.1 500 Internal Server Error');
				exit;
			}

			if ($offset > 0) {
				fseek($handle, $offset);
			}

			while (!feof($handle) && (connection_status() === CONNECTION_NORMAL)) {
				echo fread($handle, $chunkSize);
				ob_flush();
				flush();
			}

			fclose($handle);
		} else {
			header('HTTP/1.1 404 Not Found');
			echo 'File does not exist or path is empty!';
		}
	}
	
	/***********************************************************************************************************
		Download a file in Browser (Force Download/No View)
	***********************************************************************************************************/
	function hive__download_force($filePath, $filenamex = false) {  
		if(!$filenamex) { $filenamex = basename($filePath); }  
		$extension = pathinfo($filenamex, PATHINFO_EXTENSION);
		$extension = $extension ? "".$extension."" : ""; 
		if (!empty($filePath) && file_exists($filePath)) 
		{ 
			$fileInfo = pathinfo($filePath); 
			$fileName = $filenamex; 
			$fileExtension = strtolower($extension);
			$defaultContentType = "application/octet-stream"; 
			$contentTypesList = hive__download_mimeTypes(); 
			$contentType = $contentTypesList[$fileExtension] ?? $defaultContentType; 

			$size = filesize($filePath); 
			$offset = 0; 
			$length = $size; 

			if (isset($_SERVER['HTTP_RANGE'])) 
			{ 
				if (preg_match('/bytes=(\d+)-(\d+)?/', $_SERVER['HTTP_RANGE'], $matches)) 
				{ 
					$offset = intval($matches[1]); 
					$length = (isset($matches[2]) ? intval($matches[2]) : $size) - $offset; 
					$length = max($length, 0); 
					$size = $size; 
				} 
				else 
				{ 
					header('HTTP/1.1 400 Invalid Range'); 
					exit; 
				} 
			} 

			// Headers for download
			header('Content-Type: ' . $contentType); 
			header('Content-Disposition: attachment; filename="' . $fileName . '"'); 
			header('Accept-Ranges: bytes'); 
			header('Cache-Control: no-cache, must-revalidate'); 
			header('Pragma: no-cache'); 
			header('Expires: 0'); 

			if ($offset > 0 || $length < $size) 
			{ 
				header('HTTP/1.1 206 Partial Content'); 
				header('Content-Range: bytes ' . $offset . '-' . ($offset + $length - 1) . '/' . $size); 
				header('Content-Length: ' . $length); 
			} 
			else 
			{ 
				header('Content-Length: ' . $size); 
			} 

			// Output file content
			$chunkSize = 8 * 1024 * 1024; // 8MB
			$handle = fopen($filePath, 'rb'); 

			if ($handle === false) 
			{ 
				header('HTTP/1.1 500 Internal Server Error'); 
				exit; 
			} 

			if ($offset > 0) 
			{ 
				fseek($handle, $offset); 
			} 

			while (!feof($handle) && (connection_status() === CONNECTION_NORMAL)) 
			{ 
				echo fread($handle, $chunkSize); 
				ob_flush(); 
				flush(); 
			} 

			fclose($handle); 
		} else { 
			header('HTTP/1.1 404 Not Found'); 
			echo 'File does not exist or path is empty!'; 
		} 
	}
	
	/***********************************************************************************************************
		Accepted MIME Types for Display and Download
	***********************************************************************************************************/
	function hive__download_mimeTypes() { 
		/* Just add any required MIME type if you are going to download something not listed here.*/ 
		$mime_types = array("323" => "text/h323", 
			"acx" => "application/internet-property-stream", 
			"ai" => "application/postscript", 
			"aif" => "audio/x-aiff", 
			"aifc" => "audio/x-aiff", 
			"aiff" => "audio/x-aiff", 
			"asf" => "video/x-ms-asf", 
			"asr" => "video/x-ms-asf", 
			"asx" => "video/x-ms-asf", 
			"au" => "audio/basic", 
			"avi" => "video/x-msvideo", 
			"axs" => "application/olescript", 
			"bas" => "text/plain", 
			"bcpio" => "application/x-bcpio", 
			"bin" => "application/octet-stream", 
			"bmp" => "image/bmp", 
			"c" => "text/plain", 
			"cat" => "application/vnd.ms-pkiseccat", 
			"cdf" => "application/x-cdf", 
			"cer" => "application/x-x509-ca-cert", 
			"class" => "application/octet-stream", 
			"clp" => "application/x-msclip", 
			"cmx" => "image/x-cmx", 
			"cod" => "image/cis-cod", 
			"cpio" => "application/x-cpio", 
			"crd" => "application/x-mscardfile", 
			"crl" => "application/pkix-crl", 
			"crt" => "application/x-x509-ca-cert", 
			"csh" => "application/x-csh", 
			"css" => "text/css", 
			"dcr" => "application/x-director", 
			"der" => "application/x-x509-ca-cert", 
			"dir" => "application/x-director", 
			"dll" => "application/x-msdownload", 
			"dms" => "application/octet-stream", 
			"doc" => "application/msword", 
			"dot" => "application/msword", 
			"dvi" => "application/x-dvi", 
			"dxr" => "application/x-director", 
			"eps" => "application/postscript", 
			"etx" => "text/x-setext", 
			"evy" => "application/envoy", 
			"exe" => "application/octet-stream", 
			"fif" => "application/fractals", 
			"flr" => "x-world/x-vrml", 
			"gif" => "image/gif", 
			"gtar" => "application/x-gtar", 
			"gz" => "application/x-gzip", 
			"h" => "text/plain", 
			"hdf" => "application/x-hdf", 
			"hlp" => "application/winhlp", 
			"hqx" => "application/mac-binhex40", 
			"hta" => "application/hta", 
			"png" => "image/png",
			"htc" => "text/x-component", 
			"htm" => "text/html", 
			"html" => "text/html", 
			"htt" => "text/webviewhtml", 
			"ico" => "image/x-icon", 
			"ief" => "image/ief", 
			"iii" => "application/x-iphone", 
			"ins" => "application/x-internet-signup", 
			"isp" => "application/x-internet-signup", 
			"jfif" => "image/pipeg", 
			"jpe" => "image/jpeg", 
			"jpeg" => "image/jpeg", 
			"jpg" => "image/jpeg", 
			"js" => "application/x-javascript", 
			"latex" => "application/x-latex", 
			"lha" => "application/octet-stream", 
			"lsf" => "video/x-la-asf", 
			"lsx" => "video/x-la-asf", 
			"lzh" => "application/octet-stream", 
			"m13" => "application/x-msmediaview", 
			"m14" => "application/x-msmediaview", 
			"m3u" => "audio/x-mpegurl", 
			"man" => "application/x-troff-man", 
			"mdb" => "application/x-msaccess", 
			"me" => "application/x-troff-me", 
			"mht" => "message/rfc822", 
			"mhtml" => "message/rfc822", 
			"mid" => "audio/mid", 
			"mny" => "application/x-msmoney", 
			"mov" => "video/quicktime", 
			"movie" => "video/x-sgi-movie", 
			"mp2" => "video/mpeg", 
			"mp3" => "audio/mpeg", 
			"mpa" => "video/mpeg", 
			"mpe" => "video/mpeg", 
			"mpeg" => "video/mpeg", 
			"mpg" => "video/mpeg", 
			"mpp" => "application/vnd.ms-project", 
			"mpv2" => "video/mpeg", 
			"ms" => "application/x-troff-ms", 
			"mvb" => "application/x-msmediaview", 
			"nws" => "message/rfc822", 
			"oda" => "application/oda", 
			"p10" => "application/pkcs10", 
			"p12" => "application/x-pkcs12", 
			"p7b" => "application/x-pkcs7-certificates", 
			"p7c" => "application/x-pkcs7-mime", 
			"p7m" => "application/x-pkcs7-mime", 
			"p7r" => "application/x-pkcs7-certreqresp", 
			"p7s" => "application/x-pkcs7-signature", 
			"pbm" => "image/x-portable-bitmap", 
			"pdf" => "application/pdf", 
			"pfx" => "application/x-pkcs12", 
			"pgm" => "image/x-portable-graymap", 
			"pko" => "application/ynd.ms-pkipko", 
			"pma" => "application/x-perfmon", 
			"pmc" => "application/x-perfmon", 
			"pml" => "application/x-perfmon", 
			"pmr" => "application/x-perfmon", 
			"pmw" => "application/x-perfmon", 
			"pnm" => "image/x-portable-anymap", 
			"pot" => "application/vnd.ms-powerpoint", 
			"ppm" => "image/x-portable-pixmap", 
			"pps" => "application/vnd.ms-powerpoint", 
			"ppt" => "application/vnd.ms-powerpoint", 
			"prf" => "application/pics-rules", 
			"ps" => "application/postscript", 
			"pub" => "application/x-mspublisher", 
			"qt" => "video/quicktime", 
			"ra" => "audio/x-pn-realaudio", 
			"ram" => "audio/x-pn-realaudio", 
			"ras" => "image/x-cmu-raster", 
			"rgb" => "image/x-rgb", 
			"rmi" => "audio/mid", 
			"roff" => "application/x-troff", 
			"rtf" => "application/rtf", 
			"rtx" => "text/richtext", 
			"scd" => "application/x-msschedule", 
			"sct" => "text/scriptlet", 
			"setpay" => "application/set-payment-initiation", 
			"setreg" => "application/set-registration-initiation", 
			"sh" => "application/x-sh", 
			"shar" => "application/x-shar", 
			"sit" => "application/x-stuffit", 
			"snd" => "audio/basic", 
			"spc" => "application/x-pkcs7-certificates", 
			"spl" => "application/futuresplash", 
			"src" => "application/x-wais-source", 
			"sst" => "application/vnd.ms-pkicertstore", 
			"stl" => "application/vnd.ms-pkistl", 
			"stm" => "text/html", 
			"svg" => "image/svg+xml", 
			"sv4cpio" => "application/x-sv4cpio", 
			"sv4crc" => "application/x-sv4crc", 
			"t" => "application/x-troff", 
			"tar" => "application/x-tar", 
			"tcl" => "application/x-tcl", 
			"tex" => "application/x-tex", 
			"texi" => "application/x-texinfo", 
			"texinfo" => "application/x-texinfo", 
			"tgz" => "application/x-compressed", 
			"tif" => "image/tiff", 
			"tiff" => "image/tiff", 
			"tr" => "application/x-troff", 
			"trm" => "application/x-msterminal", 
			"tsv" => "text/tab-separated-values", 
			"txt" => "text/plain", 
			"uls" => "text/iuls", 
			"ustar" => "application/x-ustar", 
			"vcf" => "text/x-vcard", 
			"vrml" => "x-world/x-vrml", 
			"wav" => "audio/x-wav", 
			"wcm" => "application/vnd.ms-works", 
			"wdb" => "application/vnd.ms-works", 
			"wks" => "application/vnd.ms-works", 
			"wmf" => "application/x-msmetafile", 
			"wps" => "application/vnd.ms-works", 
			"wri" => "application/x-mswrite", 
			"wrl" => "x-world/x-vrml", 
			"wrz" => "x-world/x-vrml", 
			"xaf" => "x-world/x-vrml", 
			"xbm" => "image/x-xbitmap", 
			"xla" => "application/vnd.ms-excel", 
			"xlc" => "application/vnd.ms-excel", 
			"xlm" => "application/vnd.ms-excel", 
			"xls" => "application/vnd.ms-excel", 
			"xlt" => "application/vnd.ms-excel", 
			"xlw" => "application/vnd.ms-excel", 
			"xof" => "x-world/x-vrml", 
			"xpm" => "image/x-xpixmap", 
			"xwd" => "image/x-xwindowdump", 
			"z" => "application/x-compress", 
			"rar" => "application/x-rar-compressed", 
			"zip" => "application/zip"); 
		return $mime_types;                     
	} 	

