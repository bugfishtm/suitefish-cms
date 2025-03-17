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
			API Redirector File to different Site Module or Extension Module API Files
	*/
	// Get Variables from GET Operation
	$sitemod = @$_GET["s"];
	$sitemod = @basename($sitemod);
	$extmod = @$_GET["e"];
	$extmod = @basename($extmod);
	$actmod = @$_GET["a"];
	$actmod = @basename($actmod);
	
	// Include if File Exists
	if(trim($actmod ?? '') != "") { 
		if(trim($sitemod ?? '') != "") { 
			if(trim($extmod ?? '') != "") { 
				// Extension Execution
				if(is_dir("../_site/".$sitemod."")) {
					if(is_dir("../_data/".$sitemod."/_extension/".$extmod."/_api/")) {
						if(file_exists("../_data/".$sitemod."/_extension/".$extmod."/_api/api.".$actmod.".php")) {
							if(file_exists("../settings.php")) {
								require_once("../settings.php");
								$object["hive_mode_config"] = hive__init_site_header($object, $sitemod);
								$object["extension"] = hive__init_extension_header($object, $extmod); 
								require_once("../_data/".$sitemod."/_extension/".$extmod."/_api/api.".$actmod.".php");
							} else {
								@http_response_code(400);
								echo "error:endpoint-unavailable:1000";
							}	
						} else {
							@http_response_code(400);
							echo "error:endpoint-unavailable:1007";
						}					
					} else {
						@http_response_code(400);
						echo "error:endpoint-unavailable:1006";
					}
				} else {
					@http_response_code(400);
					echo "error:endpoint-unavailable:1005";
				}
			} else {
				// Site Module Execution
				if(is_dir("../_site/".$sitemod."/_api")) {
					if(file_exists("../_site/".$sitemod."/_api/api.".$actmod.".php")) {
						if(file_exists("../settings.php")) {
							require_once("../settings.php");
							$object["hive_mode_config"] = hive__init_site_header($object, $sitemod);
							require_once("../_site/".$sitemod."/_api/api.".$actmod.".php");
						} else {
							@http_response_code(400);
							echo "error:endpoint-unavailable:1000";
						}				
					} else {
						@http_response_code(400);
						echo "error:endpoint-unavailable:1004";
					}
				} else {
					@http_response_code(400);
					echo "error:endpoint-unavailable:1003";
				}
			}
		} else {
			@http_response_code(400);
			echo "error:endpoint-unavailable:1002";
		}	
	} else {
		@http_response_code(400);
		echo "error:endpoint-unavailable:1001";
	}