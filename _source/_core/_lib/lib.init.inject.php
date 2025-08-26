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
		Inject all Views
	***********************************************************************************************************/	
	function hive__inject($object, $inject) {
		$inject = basename($inject);
		foreach (_HIVE_MODE_ARRAY_ as $filename) {
			$object["hive_mode_config"] = hive__init_site_header($object, $filename);			
			if (file_exists($object["path"]."/_site/".basename($filename)."/_inject/inject.".$inject.".php")) {
				require($object["path"]."/_site/".basename($filename)."/_inject/inject.".$inject.".php");
			}
		} 	
		foreach ($object["extensions_path"] as $filename) {
			if(defined("_HIVE_MODE_")) { 
				if(trim(_HIVE_MODE_ ?? '') != "") { 
					$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_);			
					if (file_exists($filename."/_inject/inject.".$inject.".php")) {
						$object["extension"] = hive__init_extension_header($object, basename($filename));
						require($filename."/_inject/inject.".$inject.".php");
					}
				} 	
			} 	
		} 	
	}

	/***********************************************************************************************************
		Inject Site Modules Views
	***********************************************************************************************************/	
	function hive__inject_site($object, $inject) {
		$inject = basename($inject);
		foreach (_HIVE_MODE_ARRAY_ as $filename) {
			$object["hive_mode_config"] = hive__init_site_header($object, $filename);			
			if (file_exists($object["path"]."/_site/".basename($filename)."/_inject/inject.".$inject.".php")) {
				require($object["path"]."/_site/".basename($filename)."/_inject/inject.".$inject.".php");
			}
		} 		
	}		

	/***********************************************************************************************************
		Inject Extension Views
	***********************************************************************************************************/	
	function hive__inject_ext($object, $inject) {
		$inject = basename($inject);
		foreach ($object["extensions_path"] as $filename) {
			if(defined("_HIVE_MODE_")) { 
				if(trim(_HIVE_MODE_ ?? '') != "") { 
					$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_);			
					if (file_exists($filename."/_inject/inject.".$inject.".php")) {
						$object["extension"] = hive__init_extension_header($object, basename($filename));
						require($filename."/_inject/inject.".$inject.".php");
					}
				} 	
			} 	
		} 		
	}				