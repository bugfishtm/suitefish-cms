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
	
	/***************************************************************************************************		
		Disable Hardlinking
	***************************************************************************************************/	
	if(!is_array(@$object)) { @http_response_code(@404); @Header("Location: ../"); exit(); }

	/***************************************************************************************************		
		General Tasking
	***************************************************************************************************/	
	function hive__worker($object, $hive_mode, $script_name, $extension_mod = false, $parameters = false, $custom_data = false, $script_c_type = false) {
		// Return error if String Type not Set 
		if(!$script_c_type) { return false; }
			else { $script_c_type = basename($script_c_type); }
		if(strlen($script_c_type) > 12) { return false; }
		
		// Prepare Script Name
		if(hive__trim(@basename(@$hive_mode ?? '')) == "") { return false; } $hive_mode = hive__trim(@basename(@$hive_mode ?? ''));
		if(hive__trim(@basename($script_name ?? '')) == "") { return false; } $script_name = hive__trim(@basename(@$script_name ?? ''));
		if($extension_mod AND hive__trim(@basename($extension_mod ?? '')) == "") { return false; }
		
		// Prepare Extension Module
		if(!$extension_mod) { 
			$extension_mod = ""; 
		} else {
			if(hive__trim(@basename($extension_mod ?? '')) == "") { 
				return false;
			} else {
				$extension_mod = hive__trim(basename($extension_mod));
			}						
		}					
		
		// Prepare Parameters
		if(is_array($parameters)) {  $parameters = json_encode($parameters); }
		if($parameters) { if(!json_validate($parameters)) { return false; } }
		if($parameters == false) {  $parameters = ''; }
		
		// Prepare Custom Data
		if(!$custom_data) { $custom_data = ""; }
		if(is_array($custom_data)) { $custom_data = @serialize($custom_data); }
		
		// Execute Query
		$b = array();
		$b[0] = array();
		$b[0]["value"] = $parameters;
		$b[1]["value"] = $custom_data;
		$object["mysql"]->query("INSERT INTO "._TABLE_WORKER_."(script_execution, script_type, script_parameters, site_extension, site_module, script_data) VALUES('".$script_name."', '".$script_c_type."', ?, '".$extension_mod."', '".$hive_mode."', ?);", $b);
		return $object["mysql"]->insert_id();
	}		
	
	/***************************************************************************************************		
		Worker Aliases
	***************************************************************************************************/	
	function hive__worker_php($object, $hive_mode, $script_name, $extension_mod = false, $parameters = false, $custom_data = false) {
		return hive__worker($object, $hive_mode, $script_name, $extension_mod, $parameters, $custom_data, "php");
	}		
	function hive__worker_sh($object, $hive_mode, $script_name, $extension_mod = false, $parameters = false, $custom_data = false) {
		return hive__worker($object, $hive_mode, $script_name, $extension_mod, $parameters, $custom_data, "sh");
	}			
	function hive__worker_bash($object, $hive_mode, $script_name, $extension_mod = false, $parameters = false, $custom_data = false) {
		return hive__worker($object, $hive_mode, $script_name, $extension_mod, $parameters, $custom_data, "bash");
	}			
	function hive__worker_python($object, $hive_mode, $script_name, $extension_mod = false, $parameters = false, $custom_data = false) {
		return hive__worker($object, $hive_mode, $script_name, $extension_mod, $parameters, $custom_data, "py");
	}			
	function hive__worker_perl($object, $hive_mode, $script_name, $extension_mod = false, $parameters = false, $custom_data = false) {
		return hive__worker($object, $hive_mode, $script_name, $extension_mod, $parameters, $custom_data, "pl");
	}