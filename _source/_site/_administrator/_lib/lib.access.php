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
	*/if(!is_array(@$object)) { @http_response_code(404); Header("Location: ../"); exit(); }
	
	#################################################################################################################################################
	// Check for Local or Remote Global Permissions (OR PERMISSION CHECK)
	#################################################################################################################################################
		function adm__access_group($object, $rights_local, $userid) {
			// Check for Local Permissions
			if(!is_array($rights_local)) { $rights_local = array($rights_local); }
			// Reinit
			$valuex = $object["mysql"]->select("SELECT * FROM "._TABLE_USER_GROUP_." WHERE id = '".$userid."'", false);
			if(!is_array($valuex)) { return false; }
			$valuex["perm_obj"] = $object["perm_group"]->item($valuex["id"]);
			// Check for Permission and Return
			if(is_array($rights_local)) {
				foreach($rights_local AS $key => $value) {
					if($valuex["perm_obj"]->has_perm($value)) { return true; }
				}
			}
			return false;
		}
		
		function adm__access_user($object, $rights_local, $userid) {
			// Check for Local Permissions
			if(!is_array($rights_local)) { $rights_local = array($rights_local); }
			// Reinit
			$object["user_perm"] = $object["perm_user"]->item($userid);
			// Check for Permission and Return
			if(is_array($rights_local)) {
				foreach($rights_local AS $key => $value) {
					if($object["user_perm"]->has_perm($value)) { return true; }
				}
			} 
			return false;
		}
		
		function adm__access_api($object, $rights_local, $api_key, $user_id = false) {
			// Check for Local Permissions
			if(!is_array($rights_local)) { $rights_local = array($rights_local); }
			
			if(!$user_id) {
				// Operation for Non-User-Id Keys
				$b = array();
				$b[0]["value"] = $api_key;
				$x = $object["mysql"]->select("SELECT * FROM "._TABLE_API_." WHERE api_key = ? AND status = 'active'", false, $b);
				if(!is_array($x)) { return false; } 
				$current_api_id = $x["id"];
				if(!is_numeric($x["id"])) { return false; } 
				if(hive__trim($x["reference"]) != "") {
					return false;
				}
				if(is_array($rights_local)) {
					foreach($rights_local AS $key => $value) {
						if($object["api_perm"]->has_perm($current_api_id, $value)) { return true; }
					}
				} 
			} else {
				// Operation for User-Id Keys
				$b = array();
				$b[0]["value"] = $api_key;
				$x = $object["mysql"]->select("SELECT * FROM "._TABLE_API_." WHERE api_key = ? AND status = 'active'", false, $b);
				if(!is_array($x)) { return false; } 
				$current_api_id = $x["id"];
				if(!is_numeric($x["id"])) { return false; } 
				if(hive__trim($x["reference"]) != $user_id) {
					return false;
				}
				if(is_array($rights_local)) {
					foreach($rights_local AS $key => $value) {
						if($object["api_perm"]->has_perm($current_api_id, $value)) { return true; }
					}
				} 
			}
			return false;
		}