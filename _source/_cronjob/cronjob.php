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
			Hourly cronjob to be executed by server with the website user.
			- See Documentation for Available Variables and Functionalities of this file!
			- You can find the Documentation at: https://bugfishtm.github.io/suitefish-cms/
	*/

	// Include Settings.php
	if(file_exists(dirname(__FILE__)."/../settings.php")) { require_once(dirname(__FILE__)."/../settings.php"); }
		else { @http_response_code(503); echo "Critical Error [c0]: <br />This CMS is not yet installed. <br />Please install this CMS by visiting the websites root folder!"; exit(); }
	
	// Prevent Init
	define("_HIVE_PREVENT_INIT_", true);
	
	// Include Initialize.php
	if(file_exists($object['path']."/_core/initialize.php")) { require_once($object['path']."/_core/initialize.php"); }
		else { @http_response_code(503); echo "Critical Error [c1]: <br />Misconfigured \$object['path'] in settings.php. <br />Please check your configuration file."; exit(); }
	
	// Only execute in CLI Message
	if(!x_inCLI()) { hive__error("Critical Error [c6]", "Cronjobs can only be executed via CLI!", "", true, 401);  exit(); } 
	
	// Do not execute if Update Lock is in place	
	if(file_exists(dirname(__FILE__)."/../update.lock.php")) {
		echo "Stop Execution [c7]: Update Lock is in Place.";
		exit(); 
	}							

	// Do not execute if Backup Lock is in place				
	if(file_exists(dirname(__FILE__)."/../backup.lock.php")) {
		echo "Stop Execution [c8]: Backup Lock is in Place.";
		exit(); 
	}					

	// Do not execute if Maintenance Lock is in place		
	if(file_exists(dirname(__FILE__)."/../maintenance.lock.php")) {
		echo "Stop Execution [c9]: Maintenance Lock is in Place.";
		exit(); 
	}		

	// Cronjob Header
	ob_start();
	define("_CRON_SPACE_", "\r\n");
	
	// Starting Message
	echo "[START] Cronjob executed at ". date('Y-m-d H:i:s').""._CRON_SPACE_;
	
	// Check Site Modules Folder
	if(is_dir($object["path"]."/_site/")) {
		
		// Scan Site Folder for Available Modules
		$scan = scandir($object["path"]."/_site/");
		
		// Loop through and remove files
		foreach ($scan as $key => $item) {
			if (!is_dir($object["path"]."/_site/".$item) || $item === '.' || $item === '..' || $item === '__disabled') {
				unset($scan[$key]); 
			}
		}			

		// Re-index the array (optional)
		$scan = array_values($scan);		
		
		// Run Through Available Site Module Folders
		foreach($scan as $file) {		
			// STOP ON ERROR OF SITE MODULE	
			// Current Error Variable
				$has_current_error = false;
			// Load Module Version File
				$object["hive_mode"] = false;	
				// $object["hive_mode"]["build"]
				// $object["hive_mode"]["version"]
				// $object["hive_mode"]["rname"]
				if(file_exists($object["path"]."/_site/".$file."/version.php")) {
					require($object["path"]."/_site/".$file."/version.php");
					$object["hive_mode"]  = $x;
					unset($x);
				// Load Module Version Databae
					$object["var_xtmp"] = new x_class_var($object["mysql"], $object["prefix"]."cms_var", @trim(@basename($file)));			
					$tmp_build 		= $object["var_xtmp"]->get("_HIVE_BUILD_ACTIVE_");		
					$tmp_rname 		= $object["var_xtmp"]->get("_HIVE_RNAME_ACTIVE_");		
					$tmp_version 	= $object["var_xtmp"]->get("_HIVE_VERSION_ACTIVE_");	
					$tmp_frun 		= $object["var_xtmp"]->get("_HIVE_BUILD_FIRSTRUN_");	
				// STOP on Version Number/RNAME Mismatches			
					if($tmp_frun == 0) { 
						$has_current_error = true;
					}
					if(@$object["hive_mode"]["build"] == 0) { 
						$has_current_error = true;
					}
					if(@$object["hive_mode"]["version"] == 0) { 
						$has_current_error = true;
					}
					if(@$object["hive_mode"]["rname"] == 0) { 
						$has_current_error = true;
					}
					if($tmp_build == 0) { 
						$has_current_error = true;
					}
					if($tmp_rname == 0) { 
						$has_current_error = true;
					}
					if($tmp_version == 0) { 
						$has_current_error = true;
					}				
					if(@$object["hive_mode"]["rname"] != $tmp_rname OR @trim($tmp_rname ?? '') == "") {
						$has_current_error = true;
					} 		 
					if(@$object["hive_mode"]["version"] != $tmp_version OR @trim($tmp_version ?? '') == "") {
						$has_current_error = true;
					} 		 
					if(@$object["hive_mode"]["build"] != $tmp_build OR @trim($tmp_build ?? '') == "") {
						$has_current_error = true;
					} 		
				} else {
					$has_current_error = true;
				}	
				// End loop
				if($has_current_error) {
					echo "[SKIPPED] [SITE] ".$file." Skipped, because of current versioning error on Site Module."._CRON_SPACE_;
					continue;
				}	
	
			// Get Site Mode Info
			$object["hive_mode_config"] = hive__init_site_header($object, $file); 
			$object["extension"] = false;

			// Output Message for New Site Module Executions
			echo "[MODULE] Executions for Site Module: '".$file."'"._CRON_SPACE_;
			
			// Check for Available Related Cron Directory in Site Module
		    if (is_dir($object["path"]."/_site/".$file."/_cron") AND $file != "." AND $file != "..") {
				// Loop Through Cronjobs in Modules Cronjob Folders	
			    foreach (glob($object["path"]."/_site/".$file."/_cron/cron.*.php") as $filename){
					echo "[EXEC] [SITE] ".$file." [FILE] ".basename($filename).""._CRON_SPACE_;
					hive__require_once($object, $filename);	
			    }
		    }

			// Extension Libraries 
			$object["extensions_path"] = hive__extension_path($file);
			foreach ($object["extensions_path"] as $filename) {
				$object["extension"] = hive__init_extension_header($object, basename($filename), $file); 
				if (is_dir($filename."/_cron")) {
					foreach (glob($filename."/_cron/cron.*.php") as $filenamex){ 
						echo "[EXEC] [SITE] ".$file." [EXT] ".basename($filename)." [FILE] ".basename($filenamex).""._CRON_SPACE_;
						hive__require_once($object, $filenamex);
					}
				}
			}	
		}			
	}
	
	// Log and output Content
	echo "[FINISH] Cronjob finished at ". date('Y-m-d H:i:s').""._CRON_SPACE_;
	$content = ob_get_contents();
	$cron_log = new x_class_log($object["mysql"], _TABLE_LOG_CRON_, "");
	$cron_log->message($content);
	ob_end_clean();
	echo $content;
	