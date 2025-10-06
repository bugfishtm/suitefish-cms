#!/usr/bin/env php
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
	
	######################################################################################################
	// Logging Functionality
	######################################################################################################							
		function suitefish_worker_log($text) {
			if(!getenv("SUITEFISH_SUPERVISOR_LOG_FILE")) {
				return false;
			}
			$supervisorLogFile = getenv('SUITEFISH_SUPERVISOR_LOG_FILE');
			file_put_contents($supervisorLogFile, $text, FILE_APPEND);
		}		
		
	######################################################################################################
	// Exit if mandatory Logging Environment Variable not found
	######################################################################################################			
		if(!getenv("SUITEFISH_SUPERVISOR_LOG_FILE")) { usleep(60000000); exit(); }
		
	######################################################################################################
	// Prepare some Variables
	######################################################################################################
		$object 					= array();
		$object["path"] 			= dirname(__FILE__)."/../";	
		$object["mysql"] 			= false;
		$valid_object 				= array();
		$valid_object["host"] 		= false;
		$valid_object["port"] 		= false;
		$valid_object["user"] 		= false;
		$valid_object["pass"] 		= false;
		$valid_object["db"] 		= false;
		$valid_object["prefix"] 	= false;
		$valid_object["cookie"] 	= false;
		$valid_object["path"] 		= false;
		$processes_array 			= array();
		$processes_array_run 		= array();					
		
	######################################################################################################
	// Worker Startup Message
	######################################################################################################
		suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - STARTUP".PHP_EOL);		
		
	######################################################################################################
	// Include Settings php
	######################################################################################################
		if(file_exists(dirname(__FILE__)."/../settings.php")) {
			##################################################################################
			// Include the Settings.php File
			##################################################################################
			require(dirname(__FILE__)."/../settings.php");		
			if(!$valid_object["host"]) 		{ $valid_object["host"] 	= $mysql['host']; }
			if(!$valid_object["user"]) 		{ $valid_object["user"] 	= $mysql['user']; }
			if(!$valid_object["port"]) 		{ $valid_object["port"] 	= $mysql['port']; }
			if(!$valid_object["pass"]) 		{ $valid_object["pass"] 	= $mysql['pass']; }
			if(!$valid_object["db"])   		{ $valid_object["db"] 		= $mysql['db']; }
			if(!$valid_object["prefix"])	{ $valid_object["prefix"] 	= $mysql['prefix']; }
			if(!$valid_object["path"])		{ $valid_object["path"] 	= $object['path']; }
			if(!$valid_object["cookie"])	{ $valid_object["cookie"] 	= $object['cookie']; }	
		} else { 
			##################################################################################
			// Sleep for 1min if Settings not Found / Not Installed
			##################################################################################
			suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - settings.php File missing.".PHP_EOL); 
			usleep(60000000);
			exit(); 
		}		

	######################################################################################################
	// Include required libraries
	######################################################################################################	
		if(file_exists($object["path"]."/_core/_framework/classes/x_class_mysql.php")) { require_once($object["path"]."/_core/_framework/classes/x_class_mysql.php"); } 
			else { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Mandatory Files for Executions are missing: x_class_mysql.php!".PHP_EOL); usleep(60000000); exit(); }
		if(file_exists($object["path"]."/_core/_framework/classes/x_class_var.php")) { require_once($object["path"]."/_core/_framework/classes/x_class_var.php"); } 
			else { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Mandatory Files for Executions are missing: x_class_var.php!".PHP_EOL); usleep(60000000); exit(); }
		if(file_exists($object["path"]."/_core/_framework/functions/x_library.php")) { require_once($object["path"]."/_core/_framework/functions/x_library.php"); } 
			else { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Mandatory Files for Executions are missing: x_library.php!".PHP_EOL); usleep(60000000); exit(); }
			
	######################################################################################################
	// Only allow worker in CLI
	######################################################################################################		
		if(!x_inCLI()) { @http_response_code(403); echo date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Worker can only be executed via CLI!"; exit(); }

	######################################################################################################
	// Error if php is not below 8.4
	######################################################################################################	
		if (PHP_VERSION_ID >= 80400 && PHP_VERSION_ID < 90000) {
		} else {
			suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Current PHP Version is not 8.4".PHP_EOL); 
			usleep(60000000); 
			exit();
		}	
		
	######################################################################################################
	// Functions for Process Creation
	######################################################################################################
		/*
			<?php
				// Assuming the JSON is passed as the first argument after the script name
				$jsonParameters = $argv[1] ?? '{}';
				$parameters = json_decode($jsonParameters, true);

				// Now you can use $parameters as an associative array
				print_r($parameters);
			?>
		*/ 
		function hive___worker_execute_php($path, $parameters = false) {
			if(trim(@$parameters ?? '') != "" AND @$parameters) { 
				$parameters = json_decode($parameters, true);
				$command = sprintf(PHP_BINARY." %s %s", escapeshellarg($path), escapeshellarg(json_encode($parameters)));
			} else { $command = sprintf(PHP_BINARY." %s", escapeshellarg($path)); }
			$descriptorspec = array(0 => array("pipe", "r"),1 => array("pipe", "w"),2 => array("pipe", "w"));
			$process = proc_open($command, $descriptorspec, $pipes, null, null, array('bypass_shell' => true));
			if (is_resource($process)) { foreach ($pipes as $pipe) { fclose($pipe); } return $process; }
			return false;
		}
		/*
			#!/bin/bash
			# Assuming the JSON is passed as the first argument
			jsonParameters="$1"
			# Parse JSON using jq
			if command -v jq &> /dev/null; then
				echo "Parsed parameters:"
				echo "$jsonParameters" | jq '.'
			else
				echo "jq is not installed. Raw JSON:"
				echo "$jsonParameters"
			fi
		*/
		function hive___worker_execute_bash($path, $parameters = false) {
			if(trim(@$parameters ?? '') != "" AND @$parameters) { 
				$parameters = json_decode($parameters, true);
				$command = sprintf("/bin/bash %s %s", escapeshellarg($path), escapeshellarg(json_encode($parameters)));
			} else { 
				$command = sprintf("/bin/bash %s", escapeshellarg($path)); 
			}
			$descriptorspec = array(0 => array("pipe", "r"), 1 => array("pipe", "w"), 2 => array("pipe", "w"));
			$process = proc_open($command, $descriptorspec, $pipes, null, null, array('bypass_shell' => true));
			if (is_resource($process)) { 
				foreach ($pipes as $pipe) { 
					fclose($pipe); 
				} 
				return $process; 
			}
			return false;
		}
		/*
			#!/bin/sh
			# Assuming the JSON is passed as the first argument
			jsonParameters="$1"

			echo "Received JSON parameters:"
			echo "$jsonParameters"

			# If you have access to Python, you could use it to pretty-print the JSON
			if command -v python &> /dev/null; then
				echo "Parsed parameters:"
				echo "$jsonParameters" | python -m json.tool
			fi
		*/
		function hive___worker_execute_sh($path, $parameters = false) {
			if(trim(@$parameters ?? '') != "" AND @$parameters) { 
				$parameters = json_decode($parameters, true);
				$command = sprintf("/bin/sh %s %s", escapeshellarg($path), escapeshellarg(json_encode($parameters)));
			} else { 
				$command = sprintf("/bin/sh %s", escapeshellarg($path)); 
			}
			$descriptorspec = array(0 => array("pipe", "r"), 1 => array("pipe", "w"), 2 => array("pipe", "w"));
			$process = proc_open($command, $descriptorspec, $pipes, null, null, array('bypass_shell' => true));
			if (is_resource($process)) { 
				foreach ($pipes as $pipe) { 
					fclose($pipe); 
				} 
				return $process; 
			}
			return false;
		}
		#!/usr/bin/env python3
		# Assuming the JSON is passed as the first argument
		# jsonParameters = sys.argv[1]

		# Example:
		#   python3 worker.py '{"key": "value", "flag": true}'		
		function hive___worker_execute_python($path, $parameters = false) {
			if(trim(@$parameters ?? '') != "" AND @$parameters) { 
				$parameters = json_decode($parameters, true);
				$command = sprintf(PHP_BINARY." %s %s", escapeshellarg($path), escapeshellarg(json_encode($parameters)));
			} else { 
				$command = sprintf("python3 %s", escapeshellarg($path));
			}
			$descriptorspec = array(0 => array("pipe", "r"),1 => array("pipe", "w"),2 => array("pipe", "w"));
			$process = proc_open($command, $descriptorspec, $pipes, null, null, array('bypass_shell' => true));
			if (is_resource($process)) { foreach ($pipes as $pipe) { fclose($pipe); } return $process; }
			return false;
		}
		#!/usr/bin/env perl
		# Assuming the JSON is passed as the first argument
		# my $jsonParameters = shift @ARGV;

		# Example:
		#   perl worker.pl '{"key": "value", "flag": true}'
		function hive___worker_execute_perl($path, $parameters = false) {
			if(trim(@$parameters ?? '') != "" AND @$parameters) { 
				$parameters = json_decode($parameters, true);
				$command = sprintf("perl %s %s", escapeshellarg($path), escapeshellarg(json_encode($parameters)));
			} else { 
				$command = sprintf("perl %s", escapeshellarg($path));
			}
			$descriptorspec = array(0 => array("pipe", "r"),1 => array("pipe", "w"),2 => array("pipe", "w"));
			$process = proc_open($command, $descriptorspec, $pipes, null, null, array('bypass_shell' => true));
			if (is_resource($process)) { foreach ($pipes as $pipe) { fclose($pipe); } return $process; }
			return false;
		}		
				
	######################################################################################################
	// Runtime
	######################################################################################################		
	
	while(true) {		

		######################################################################################################
		// Do not execute if Update Lock is in place
		######################################################################################################		
		if(file_exists(dirname(__FILE__)."/../update.lock.php")) {
			##################################################################################
			// Sleep for 1min if Settings not Found / Not Installed
			##################################################################################
			suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - /update.lock.php is in place.".PHP_EOL); 
			usleep(60000000);
			exit(); 
		}							

		######################################################################################################
		// Do not execute if Backup Lock is in place
		######################################################################################################					
		if(file_exists(dirname(__FILE__)."/../backup.lock.php")) {
			##################################################################################
			// Sleep for 1min if Settings not Found / Not Installed
			##################################################################################
			suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - /backup.lock.php is in place.".PHP_EOL); 
			usleep(60000000);
			exit(); 
		}					

		######################################################################################################
		// Do not execute if Maintenance Lock is in place
		######################################################################################################		
		if(file_exists(dirname(__FILE__)."/../maintenance.lock.php")) {
			##################################################################################
			// Sleep for 1min if Settings not Found / Not Installed
			##################################################################################
			suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - /maintenance.lock.php is in place.".PHP_EOL); 
			usleep(60000000);
			exit(); 
		}				

		######################################################################################################
		// Revalidate Settings File
		######################################################################################################				
		if(file_exists(dirname(__FILE__)."/../settings.php")) {
			##################################################################################
			// Include the Settings.php File
			##################################################################################
			require(dirname(__FILE__)."/../settings.php");		
			if(!$valid_object["host"]) 		{ $valid_object["host"] 	= $mysql['host']; }
			if(!$valid_object["user"]) 		{ $valid_object["user"] 	= $mysql['user']; }
			if(!$valid_object["port"]) 		{ $valid_object["port"] 	= $mysql['port']; }
			if(!$valid_object["pass"]) 		{ $valid_object["pass"] 	= $mysql['pass']; }
			if(!$valid_object["db"])   		{ $valid_object["db"] 		= $mysql['db']; }
			if(!$valid_object["prefix"])	{ $valid_object["prefix"] 	= $mysql['prefix']; }
			if(!$valid_object["path"])		{ $valid_object["path"] 	= $object['path']; }
			if(!$valid_object["cookie"])	{ $valid_object["cookie"] 	= $object['cookie']; }	
		} else { 
			##################################################################################
			// Sleep for 1min if Settings not Found / Not Installed
			##################################################################################
			suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Settings.php File missing.".PHP_EOL); 
			usleep(60000000);
			exit(); 
		}					
			
		######################################################################################################
		// Check Integrity of Settings Variables
		######################################################################################################			
		if(!$mysql['host']) { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Script Exited because Integrity of settings.php variables if no longer guaranteed.".PHP_EOL); usleep(60000000); exit(); }
		if(!$mysql['user']) { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Script Exited because Integrity of settings.php variables if no longer guaranteed.".PHP_EOL); usleep(60000000); exit(); }
		if(!$mysql['port']) { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Script Exited because Integrity of settings.php variables if no longer guaranteed.".PHP_EOL); usleep(60000000); exit(); }
		if(!$mysql['pass']) { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Script Exited because Integrity of settings.php variables if no longer guaranteed.".PHP_EOL); usleep(60000000); exit(); }
		if(!$mysql['db']) { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Script Exited because Integrity of settings.php variables if no longer guaranteed.".PHP_EOL); usleep(60000000); exit(); }
		if(!$mysql['prefix']) { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Script Exited because Integrity of settings.php variables if no longer guaranteed.".PHP_EOL); usleep(60000000); exit(); }
		if(!$object['path']) { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Script Exited because Integrity of settings.php variables if no longer guaranteed.".PHP_EOL); usleep(60000000); exit(); }
		if(!$object['cookie']) { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Script Exited because Integrity of settings.php variables if no longer guaranteed.".PHP_EOL); usleep(60000000); exit(); }
		if($valid_object["host"] != $mysql['host']) { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Script Exited because Integrity of settings.php variables if no longer guaranteed.".PHP_EOL); usleep(60000000); exit(); }
		if($valid_object["user"] != $mysql['user']) { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Script Exited because Integrity of settings.php variables if no longer guaranteed.".PHP_EOL); usleep(60000000); exit(); }
		if($valid_object["port"] != $mysql['port']) { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Script Exited because Integrity of settings.php variables if no longer guaranteed.".PHP_EOL); usleep(60000000); exit(); }
		if($valid_object["pass"] != $mysql['pass']) { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Script Exited because Integrity of settings.php variables if no longer guaranteed.".PHP_EOL); usleep(60000000); exit(); }
		if($valid_object["db"] != $mysql['db']) { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Script Exited because Integrity of settings.php variables if no longer guaranteed.".PHP_EOL); usleep(60000000); exit(); }
		if($valid_object["prefix"] != $mysql['prefix']) { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Script Exited because Integrity of settings.php variables if no longer guaranteed.".PHP_EOL); usleep(60000000); exit(); }
		if($valid_object["path"] != $object['path']) { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Script Exited because Integrity of settings.php variables if no longer guaranteed.".PHP_EOL); usleep(60000000); exit(); }
		if($valid_object["cookie"] != $object['cookie']) { suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - Script Exited because Integrity of settings.php variables if no longer guaranteed.".PHP_EOL); usleep(60000000); exit(); }		
		
		######################################################################################################	
		// Close previous MySQL Connections
		######################################################################################################
		if(is_object(@$object["mysql"])) {
			$object["mysql"]->mysqlcon->close();
		}
		if(is_object(@$object["mysql"])) {
			unset($object["mysql"]);
		} $object["mysql"] = false;			
			
		######################################################################################################		
		// MySQL Connection and Execution
		######################################################################################################		
		$object["mysql"] = new x_class_mysql(@$mysql["host"], @$mysql["user"], @$mysql["pass"], @$mysql["db"], @$mysql["port"]);   
		if ($object["mysql"]->lasterror != false) {
			suitefish_worker_log(date("Y-m-d H:i:s")." - Suitefish - TERMINATED - MySQL Connection Error.".PHP_EOL); 
			usleep(60000000); 
			exit(); 
		}

		######################################################################################################		
		// Get and Update Worker Runtime Variables
		######################################################################################################		
		$object["var_glob"] = new x_class_var($object["mysql"], $valid_object["prefix"]."cms_var", "");			
		$object["var_glob"]->set("_SF_WORKER_TIME_VAR_", date("Y-m-d H:i:s"), "Datetime Value of Last Worker Execution on System", true, true);		
		
		######################################################################################################		
		// Execute Worker Processes
		######################################################################################################					
		$x = $object["mysql"]->select("SELECT * FROM ".$valid_object["prefix"]."cms_worker WHERE script_executed = 0 ORDER BY id ASC", true);
		if(is_array($x)) {
			foreach($x as $k => $v) {
				
				##################################################################################		
				// Determine extension
				##################################################################################	
				if(@$v["script_type"] == "php") { $extension = "php"; }
				elseif(@$v["script_type"] == "sh") { $extension = "sh"; }
				elseif(@$v["script_type"] == "bash") { $extension = "bash"; }
				elseif(@$v["script_type"] == "py") { $extension = "py"; }
				elseif(@$v["script_type"] == "pl") { $extension = "pl"; }
				else { $extension = false; }			
				
				##################################################################################		
				// Preperation
				##################################################################################	
				$is_extension = false;	
				if(@trim(@basename($v["site_extension"] ?? '') ?? '') == "") {
					$is_extension = false;	
				} else {
					$is_extension = true;	
				}
				$path = $object["path"];	

				##################################################################################		
				// STOP ON ERROR OF SITE MODULE
				##################################################################################	
				// Current Error Variable
					$has_current_error = false;
				// Load Module Version File
					$object["hive_mode"] = false;	
					// $object["hive_mode"]["build"]
					// $object["hive_mode"]["version"]
					// $object["hive_mode"]["rname"]
					if(file_exists($object["path"]."/_site/".@trim(@basename(@$v["site_module"]))."/version.php")) {
						require($object["path"]."/_site/".@trim(@basename(@$v["site_module"]))."/version.php");
						$object["hive_mode"]  = $x;
						unset($x);
					// Load Module Version Databae
						$object["var_xtmp"] = new x_class_var($object["mysql"], $valid_object["prefix"]."cms_var", @trim(@basename($v["site_module"])));			
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
						continue;
					}
					
				##################################################################################		
				// Determine the Path to the script
				##################################################################################				
				if($extension) {
					if(!$is_extension) { 
						$error_current = false;
						if(@trim(@basename($v["site_module"] ?? '') ?? '') == "") { $error_current = true; }
						if(@trim(@basename($v["script_execution"] ?? '') ?? '') == "") { $error_current = true; }
						if(!$error_current) { $path .= "/_site/".trim(basename($v["site_module"]))."/_worker/worker.".trim(basename($v["script_execution"])).".".$extension.""; }
						 else { $path = false; }
					} else { 
						$error_current = false;
						if(@trim(@basename($v["site_module"] ?? '') ?? '') == "") { $error_current = true; }
						if(@trim(@basename($v["script_execution"] ?? '') ?? '') == "") { $error_current = true; }
						if(@trim(@basename($v["site_extension"] ?? '') ?? '') == "") { $site_extension = true; }
						
						/*************************************************************************************
							Checkup for Valid Extension
						*************************************************************************************/
						$has_current_error = false;
						if(file_exists("/_data/".trim(basename($v["site_module"]))."/_extension/".trim(basename($v["site_extension"]))."/version.php")) {
							$object["hive_mode_tmp_extension"] = false;	
							require("/_data/".trim(basename($v["site_module"]))."/_extension/".trim(basename($v["site_extension"]))."/version.php");
							$object["hive_mode_tmp_extension"]  = $x;
							unset($x);
							$object["var_xtmp"] = new x_class_var($object["mysql"], $object["prefix"]."cms_var", trim(basename($v["site_module"])));	
							$object["extension"] = hive__init_extension_header($object, trim(basename($v["site_extension"])), trim(basename($v["site_module"]))); 	
							$tmp_build 		= $object["var_xtmp"]->get($object["extension"]["prefix_variables"]."_HIVE_BUILD_ACTIVE_");	
							if(@$object["hive_mode_tmp_extension"]["build"] != $tmp_build OR @trim($tmp_build ?? '') == "") {
								$has_current_error = true;
							} 		
							if($tmp_build == 0) { 
								$has_current_error = true;
							}		
							if(@$object["hive_mode_tmp_extension"]["build"] == 0) { 
								$has_current_error = true;
							}
							if(@$object["hive_mode_tmp_extension"]["version"] == 0) { 
								$has_current_error = true;
							}
							if(@$object["hive_mode_tmp_extension"]["rname"] == 0) { 
								$has_current_error = true;
							}									
						} else {
							$has_current_error = true;
						}			
						if($has_current_error) {
							continue;
						}	
						if(!$error_current) { $path .= "/_data/".trim(basename($v["site_module"]))."/_extension/".trim(basename($v["site_extension"]))."/_worker/worker.".trim(basename($v["script_execution"])).".".$extension.""; }
						 else { $path = false; }
					}	
				} else {
					$path = false;
				}	
				
				##################################################################################		
				// Execute Script and Finish Worker Init
				##################################################################################			
				if($path) {	
					if(file_exists($path) && !is_dir($path)) {
						if($extension == "php") 	{ $process = hive___worker_execute_php($path, $v["script_parameters"]); }
						if($extension == "sh") 		{ $process = hive___worker_execute_sh($path, $v["script_parameters"]); }
						if($extension == "bash") 	{ $process = hive___worker_execute_bash($path, $v["script_parameters"]); }
						if($extension == "py") 	{ $process = hive___worker_execute_python($path, $v["script_parameters"]); }
						if($extension == "pl") 	{ $process = hive___worker_execute_perl($path, $v["script_parameters"]); }
						if ($process !== false) { 	
							$status = proc_get_status($process);
							if(@$status['pid']) { $pid = $status['pid']; }
							$processes_array[$v['id']] = $process;
							$object["mysql"]->query("UPDATE ".$valid_object["prefix"]."cms_worker SET script_executed = 1, script_pid = '".$pid."' WHERE id = ".$v['id']."");
						} else {
							$object["mysql"]->query("UPDATE ".$valid_object["prefix"]."cms_worker SET script_executed = 3, script_pid = '' WHERE id = ".$v['id']."");
						}	
					} else { $object["mysql"]->query("UPDATE ".$valid_object["prefix"]."cms_worker SET script_executed = 2, script_pid = '' WHERE id = ".$v['id'].""); }
				} else { $object["mysql"]->query("UPDATE ".$valid_object["prefix"]."cms_worker SET script_executed = 2, script_pid = '' WHERE id = ".$v['id'].""); }	
				
			}
		}	
			
		######################################################################################################
		// Clean up finished processes for Workers
		######################################################################################################
		foreach ($processes_array as $id => $process) {
			$status = proc_get_status($process);
			if (is_array($status)) {
				if (!$status['running']) {
					proc_close($process);
					unset($processes_array[$id]); 
					if(is_numeric($id)) {
						$object["mysql"]->query("UPDATE ".$valid_object["prefix"]."cms_worker SET script_executed = 3, script_pid = '' WHERE id = ".$id.""); 
					}
				}
			} else {
				unset($processes_array[$id]); 
				$object["mysql"]->query("UPDATE ".$valid_object["prefix"]."cms_worker SET script_executed = 3, script_pid = '' WHERE id = ".$id.""); 
			}
		}		

		######################################################################################################
		// Runtime Scripts from Modules
		######################################################################################################
		if(is_dir($object["path"]."/_site/")) {
			$directoryPathSM = $object["path"]."/_site/";
			$foldersSM = scandir($directoryPathSM);
			foreach ($foldersSM as $folder) {
				if ($folder === '.' || $folder === '..') { continue; }	
				if (!is_dir($directoryPathSM . $folder)) { continue; }	

				// Current Site Mode Variable
					$c_run_sitemod = trim(basename($folder ?? '') ?? '');
				// STOP ON ERROR OF SITE MODULE	
				// Current Error Variable
					$has_current_error = false;
				// Load Module Version File
					$object["hive_mode"] = false;	
					// $object["hive_mode"]["build"]
					// $object["hive_mode"]["version"]
					// $object["hive_mode"]["rname"]
					if(file_exists($directoryPathSM . $folder."/version.php")) {
						require($directoryPathSM . $folder."/version.php");
						$object["hive_mode"]  = $x;
						unset($x);
					// Load Module Version Databae
						$object["var_xtmp"] = new x_class_var($object["mysql"], $valid_object["prefix"]."cms_var", @trim(@basename($c_run_sitemod)));			
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
						continue;
					}
				$fullPath = $directoryPathSM . $folder;
				if (is_dir($fullPath. '/_runtime')) {
					$runtimePath = $fullPath. '/_runtime/';
					$files = scandir($runtimePath);
					foreach ($files as $file) {
						if ($file === '.' || $file === '..') { continue; }
						$procnumnow = md5($runtimePath . '/' . $file);
						if (is_file($runtimePath . '/' . $file) && substr($file, 0, 4) === 'run.' && !isset($processes_array_run[$procnumnow])) {
							if (substr($file, -4) === '.php') {
								$procnumnow = md5($runtimePath . '/' . $file);
								if(!array_key_exists($procnumnow, $processes_array_run)) { 
									$process = false;
									$process = hive___worker_execute_php($runtimePath . '/' . $file);
									if ($process !== false) {
										$processes_array_run[$procnumnow] = $process;
									}	
								}
							}
							if (substr($file, -5) === '.bash') {
								$procnumnow = md5($runtimePath . '/' . $file);
								if(!array_key_exists($procnumnow, $processes_array_run)) { 
									$process = false;
									$process = hive___worker_execute_bash($runtimePath . '/' . $file);
									if ($process !== false) {
										$processes_array_run[$procnumnow] = $process;
									}	
								}
							}										
							if (substr($file, -3) === '.sh') {
								$procnumnow = md5($runtimePath . '/' . $file);
								if(!array_key_exists($procnumnow, $processes_array_run)) { 
									$process = false;
									$process = hive___worker_execute_sh($runtimePath . '/' . $file);
									if ($process !== false) {
										$processes_array_run[$procnumnow] = $process;
									}	
								}
							}									
							if (substr($file, -3) === '.py') {
								$procnumnow = md5($runtimePath . '/' . $file);
								if(!array_key_exists($procnumnow, $processes_array_run)) { 
									$process = false;
									$process = hive___worker_execute_python($runtimePath . '/' . $file);
									if ($process !== false) {
										$processes_array_run[$procnumnow] = $process;
									}	
								}
							}									
							if (substr($file, -3) === '.pl') {
								$procnumnow = md5($runtimePath . '/' . $file);
								if(!array_key_exists($procnumnow, $processes_array_run)) { 
									$process = false;
									$process = hive___worker_execute_perl($runtimePath . '/' . $file);
									if ($process !== false) {
										$processes_array_run[$procnumnow] = $process;
									}	
								}
							}
						}
					}
				}
				// Runtime Scripts from Module Exensions
				if(is_dir($object["path"]."/_data/".$c_run_sitemod."/_extension/")) {		
					$directoryPath = $object["path"] . "/_data/".$c_run_sitemod."/_extension/";
					$folders = scandir($directoryPath);
					foreach ($folders as $folderxy) {
						if ($folderxy === '.' || $folderxy === '..') { continue; }				
						$fullPath = $directoryPath . $folderxy;
						/*************************************************************************************
							Checkup for Valid Extension
						*************************************************************************************/
						$has_current_error = false;
						if(file_exists($fullPath."/version.php")) {
							$object["hive_mode_tmp_extension"] = false;	
							require($fullPath."/version.php");
							$object["hive_mode_tmp_extension"]  = $x;
							unset($x);
							$object["var_xtmp"] = new x_class_var($object["mysql"], $object["prefix"]."cms_var", $c_run_sitemod);	
							$object["extension"] = hive__init_extension_header($object, basename($folderxy), $c_run_sitemod); 	
							$tmp_build 		= $object["var_xtmp"]->get($object["extension"]["prefix_variables"]."_HIVE_BUILD_ACTIVE_");			
							if(@$object["hive_mode_tmp_extension"]["build"] != $tmp_build OR @trim($tmp_build ?? '') == "") {
								$has_current_error = true;
							} 		
							if($tmp_build == 0) { 
								$has_current_error = true;
							}		
							if(@$object["hive_mode_tmp_extension"]["build"] == 0) { 
								$has_current_error = true;
							}
							if(@$object["hive_mode_tmp_extension"]["version"] == 0) { 
								$has_current_error = true;
							}
							if(@$object["hive_mode_tmp_extension"]["rname"] == 0) { 
								$has_current_error = true;
							}									
						} else {
							$has_current_error = true;
						}			
						if($has_current_error) {
							continue;
						}			
						/*************************************************************************************
							Execute
						*************************************************************************************/		
						if (is_dir($fullPath. '/_runtime')) {
							$runtimePath = $fullPath. '/_runtime/';
							$files = scandir($runtimePath);
							foreach ($files as $file) {
								if ($file === '.' || $file === '..') { continue; }
								$procnumnow = md5($runtimePath . '/' . $file);
								if (is_file($runtimePath . '/' . $file) && substr($file, 0, 4) === 'run.' && !isset($processes_array_run[$procnumnow])) {
									if (substr($file, -4) === '.php') {
										$procnumnow = md5($runtimePath . '/' . $file);
										if(!array_key_exists($procnumnow, $processes_array_run)) { 
											$process = false;
											$process = hive___worker_execute_php($runtimePath . '/' . $file);
											if ($process !== false) {
												$processes_array_run[$procnumnow] = $process;
											}	
										}
									}
									if (substr($file, -5) === '.bash') {
										$procnumnow = md5($runtimePath . '/' . $file);
										if(!array_key_exists($procnumnow, $processes_array_run)) { 
											$process = false;
											$process = hive___worker_execute_bash($runtimePath . '/' . $file);
											if ($process !== false) {
												$processes_array_run[$procnumnow] = $process;
											}	
										}
									}										
									if (substr($file, -3) === '.sh') {
										$procnumnow = md5($runtimePath . '/' . $file);
										if(!array_key_exists($procnumnow, $processes_array_run)) { 
											$process = false;
											$process = hive___worker_execute_sh($runtimePath . '/' . $file);
											if ($process !== false) {
												$processes_array_run[$procnumnow] = $process;
											}	
										}
									}									
									if (substr($file, -3) === '.py') {
										$procnumnow = md5($runtimePath . '/' . $file);
										if(!array_key_exists($procnumnow, $processes_array_run)) { 
											$process = false;
											$process = hive___worker_execute_python($runtimePath . '/' . $file);
											if ($process !== false) {
												$processes_array_run[$procnumnow] = $process;
											}	
										}
									}									
									if (substr($file, -3) === '.pl') {
										$procnumnow = md5($runtimePath . '/' . $file);
										if(!array_key_exists($procnumnow, $processes_array_run)) { 
											$process = false;
											$process = hive___worker_execute_perl($runtimePath . '/' . $file);
											if ($process !== false) {
												$processes_array_run[$procnumnow] = $process;
											}	
										}
									}
								}
							}
						}
					}
				}			
			}			
		}
		
		######################################################################################################
		// Clean up finished processes for Runtime
		######################################################################################################
		foreach ($processes_array_run as $id => $process) {
			$status = proc_get_status($process);
			if (is_array($status)) {
				if (!$status['running']) {
					proc_close($process);
					unset($processes_array_run[$id]); 
				}
			} else {
				unset($processes_array_run[$id]); 
			}
		}				

		######################################################################################################
		// Sleep for 5s
		######################################################################################################
		usleep(5000000);		
		
	}	
		
	######################################################################################################
	// Runtime End
	######################################################################################################