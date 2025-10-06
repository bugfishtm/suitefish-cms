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
		Global API Key Check
	***************************************************************************************************/	
	function hive__api_user_access($object, $rights_local, $exit_on_false = true){
		// Initial Access Variable
		$has_final_access = false;
		// Check provided Request/Module data
		$current_api_token = false;
		$current_api_user = false;
		if(isset($_GET["api_token"]) AND !$current_api_token) 	{ $current_api_token = $_GET["api_token"]; }
		if(isset($_POST["api_token"]) AND !$current_api_token) 	{ $current_api_token = $_POST["api_token"]; }
		if(isset($_GET["api_user"]) AND !$current_api_user) 	{ $current_api_user = $_GET["api_user"]; }
		if(isset($_POST["api_user"]) AND !$current_api_user) 	{ $current_api_user = $_POST["api_user"]; }
		// Get current Token from Database
		$valid_token = $object["api"]->validateKey($current_api_token, "user_".$current_api_user);
		// Check is current token has permission for this request
		if($valid_token) {
			// Get Permission Item
			$cureitemperm = $object["api_perm"]->item($valid_token);
			// Check for Local Permissions Array
			if(!is_array($rights_local)) { $rights_local = array($rights_local); }
			// Check for Permission and Return
			if(is_array($rights_local)) {
				foreach($rights_local AS $key => $value) {
					if($cureitemperm->has_perm($value)) { $has_final_access = true; }
				}
			}
		}
		// Return or Exit
		if(!$has_final_access AND $exit_on_false) { 
			$error = array();
			$error["type"] 			= "error";
			$error["error"] 		= "true";
			$error["function"] 		= "hive__api_user_access";
			$error["message"] 		= "The provided API token is invalid or lacks the necessary permissions to perform this action.";
			$error = json_encode($error);
			http_response_code(401);
			echo $error;
			exit();
		}
		return $has_final_access = false;
	}
	
	/***************************************************************************************************		
		User API Key Check
	***************************************************************************************************/	
	function hive__api_global_access($object, $rights_local, $exit_on_false = true) {
		// Initial Access Variable
		$has_final_access = false;
		// Check provided Request/Module data
		$current_api_token = false;
		if(isset($_GET["api_token"]) AND !$current_api_token) 	{ $current_api_token = $_GET["api_token"]; }
		if(isset($_POST["api_token"]) AND !$current_api_token) 	{ $current_api_token = $_POST["api_token"]; }
		// Get current Token from Database
		$valid_token = $object["api"]->validateKey($current_api_token, "global");
		// Check is current token has permission for this request
		if($valid_token) {
			// Get Permission Item
			$cureitemperm = $object["api_perm"]->item($valid_token);
			// Check for Local Permissions Array
			if(!is_array($rights_local)) { $rights_local = array($rights_local); }
			// Check for Permission and Return
			if(is_array($rights_local)) {
				foreach($rights_local AS $key => $value) {
					if($cureitemperm->has_perm($value)) { $has_final_access = true; }
				}
			}
		}
		// Return or Exit
		if(!$has_final_access AND $exit_on_false) { 
			$error = array();
			$error["type"] 			= "error";
			$error["error"] 		= "true";
			$error["function"] 		= "hive__api_global_access";
			$error["message"] 		= "The provided API token is invalid or lacks the necessary permissions to perform this action.";
			$error = json_encode($error);
			http_response_code(401);
			echo $error;
			exit();
		}
		return $has_final_access = false;
	}
