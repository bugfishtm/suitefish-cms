<?php
	/* 
		 ____  __  __  ___  ____  ____  ___  _   _ 
		(  _ \(  )(  )/ __)( ___)(_  _)/ __)( )_( )
		 ) _ < )(__)(( (_-. )__)  _)(_ \__ \ ) _ ( 
		(____/(______)\___/(__)  (____)(___/(_) (_) www.bugfish.eu
				 ___ _   _ ___ _____ ___ ___ ___ ___ _  _ 
				/ __| | | |_ _|_   _| __| __|_ _/ __| || |
				\__ \ |_| || |  | | | _|| _| | |\__ \ __ |
				|___/\___/|___| |_| |___|_| |___|___/_||_|
		Copyright (C) 2024 Jan Maurice Dahlmanns [Bugfish]

		This program is free software: you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation, either version 3 of the License, or
		(at your option) any later version.

		This program is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		GNU General Public License for more details.

		You should have received a copy of the GNU General Public License
		along with this program.  If not, see <https://www.gnu.org/licenses/>.
		
		File Description:
			Backend Library Functions Initialize...
			
	*/ if(!is_array(@$object)) { @http_response_code(@404); @Header("Location: ../"); exit(); }
	
	#################################################################################################################################################
	// Trigger Function, Execute trigger name for all Site Modules and all current Extensions
	#################################################################################################################################################
		// Execute Site Module and Extensions Triggers
		function hive__trigger($object, $trigger_name) {
			foreach (_HIVE_MODE_ARRAY_ as $filename) {
				$object["hive_mode_config"] = hive__init_site_header($object, $filename);	
				if (file_exists($object["path"]."/_site/".basename($filename)."/_trigger/trigger.".$trigger_name.".php")) {
					require($object["path"]."/_site/".basename($filename)."/_trigger/trigger.".$trigger_name.".php");
				}
			} 	
			if(defined("_HIVE_MODE_")) { 
				if(trim(_HIVE_MODE_ ?? '') != "") { 
					foreach ($object["extensions_path"] as $filename) {
						$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_);			
						if (file_exists($filename."/_trigger/trigger.".$trigger_name.".php")) {
							$object["extension"] = hive__init_extension_header($object, basename($filename));
							require($filename."/_trigger/trigger.".$trigger_name.".php");
						}
					} 	
				} 	
			} 	
		}	
		// Only execute Site Module Triggers
		function hive__trigger_site($object, $trigger_name) {
			foreach (_HIVE_MODE_ARRAY_ as $filename) {
				$object["hive_mode_config"] = hive__init_site_header($object, $filename);	
				if (file_exists($object["path"]."/_site/".basename($filename)."/_trigger/trigger.".$trigger_name.".php")) {
					require($object["path"]."/_site/".basename($filename)."/_trigger/trigger.".$trigger_name.".php");
				}
			} 		
		}	
		// Only execute Current Site Module Extensions Triggers
		function hive__trigger_ext($object, $trigger_name) {
			if(defined("_HIVE_MODE_")) { 
				if(trim(_HIVE_MODE_ ?? '') != "") { 
					foreach ($object["extensions_path"] as $filename) {
						$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_);			
						if (file_exists($filename."/_trigger/trigger.".$trigger_name.".php")) {
							$object["extension"] = hive__init_extension_header($object, basename($filename));
							require($filename."/_trigger/trigger.".$trigger_name.".php");
						}
					} 	
				} 	
			} 	
		}	
