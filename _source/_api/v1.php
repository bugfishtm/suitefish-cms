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
			API Redirector File to different Site Module or Extension Module API Files.
			Highly recommended to be used together with the integrated administrator interface.
	*/
	
	############################################################################################
	// Pre-API Include and Checkup
	############################################################################################
	// Include Settings.php
	if(file_exists("../settings.php")) { require_once("../settings.php"); }
		else { @http_response_code(503); echo "Critical Error [c0]: <br />This CMS is not yet installed. <br />Please install this CMS by visiting the websites root folder!"; exit(); }
	// Include Initialize.php
	if(file_exists($object['path']."/_core/initialize.php")) {  }
		else { @http_response_code(503); echo "Critical Error [c1]: <br />Misconfigured \$object['path'] in settings.php. <br />Please check your configuration file."; exit(); }
	
	// Do not execute if Update Lock is in place	
	if(file_exists(dirname(__FILE__)."/../update.lock.php")) {
		@http_response_code(503);
		echo "API-Error [c7]: Update Lock is in Place.";
		exit(); 
	}							

	// Do not execute if Backup Lock is in place				
	if(file_exists(dirname(__FILE__)."/../backup.lock.php")) {
		@http_response_code(503);
		echo "API-Error [c8]: Backup Lock is in Place.";
		exit(); 
	}					

	// Do not execute if Maintenance Lock is in place		
	if(file_exists(dirname(__FILE__)."/../maintenance.lock.php")) {
		@http_response_code(503);
		echo "API-Error [c9]: Maintenance Lock is in Place.";
		exit(); 
	}		
	
	############################################################################################
	// Fetch Get Variables
	############################################################################################
	$api_action = isset($_GET['api_action']) ? $_GET['api_action'] : (isset($_POST['api_action']) ? $_POST['api_action'] : '');
	$api_action = basename($api_action);
	$api_action = trim($api_action ?? '');
	$api_mod = isset($_GET['api_mod']) ? $_GET['api_mod'] : (isset($_POST['api_mod']) ? $_POST['api_mod'] : '');
	$api_mod = basename($api_mod);	
	$api_mod = trim($api_mod ?? '');
	$api_ext = isset($_GET['api_ext']) ? $_GET['api_ext'] : (isset($_POST['api_ext']) ? $_POST['api_ext'] : '');
	$api_ext = basename($api_ext);	
	$api_ext = trim($api_ext ?? '');
	$api_token = isset($_GET['api_token']) ? $_GET['api_token'] : (isset($_POST['api_token']) ? $_POST['api_token'] : '');
	$api_token = basename($api_token);	
	$api_token = trim($api_token ?? '');
	$api_rname = isset($_GET['api_rname']) ? $_GET['api_rname'] : (isset($_POST['api_rname']) ? $_POST['api_rname'] : '');
	$api_rname = basename($api_rname);	
	$api_rname = trim($api_rname ?? '');
	$api_endpoint = isset($_GET['api_endpoint']) ? $_GET['api_endpoint'] : (isset($_POST['api_endpoint']) ? $_POST['api_endpoint'] : '');
	$api_endpoint = basename($api_endpoint);	
	$api_endpoint = trim($api_endpoint ?? '');	
	$api_user = isset($_GET['api_user']) ? $_GET['api_user'] : (isset($_POST['api_user']) ? $_POST['api_user'] : '');
	$api_user = basename($api_user);	
	$api_user = trim($api_user ?? '');	

	############################################################################################
	// Store Functionality
	############################################################################################
	if($api_action == "store_software_list") {
		// Initialization
		define("_HIVE_PREVENT_INIT_", true);
		require_once($object['path']."/_core/initialize.php");
		// Output current deployed modules for external instances as serialized array!
		$x_array = $object["mysql"]->select("SELECT * FROM "._TABLE_STORE_." WHERE mod_is_software = 1 ORDER BY mod_version DESC", true);
		if(is_array($x_array)) { 
			echo serialize($x_array);
		} else {
			echo serialize(array());
		}	
		exit();
	}
	if($api_action == "store_cms_list") {
		// Initialization
		define("_HIVE_PREVENT_INIT_", true);
		require_once($object['path']."/_core/initialize.php");
		// Output current deployed modules for external instances as serialized array!
		$x_array = $object["mysql"]->select("SELECT * FROM "._TABLE_STORE_." WHERE mod_is_cms = 1 ORDER BY mod_version DESC", true);
		if(is_array($x_array)) { 
			echo serialize($x_array);
		} else {
			echo serialize(array());
		}	
		exit();
	}
	if($api_action == "store_mod_list") {
		// Initialization
		define("_HIVE_PREVENT_INIT_", true);
		require_once($object['path']."/_core/initialize.php");
		// Output current deployed modules for external instances as serialized array!
		$x_array = $object["mysql"]->select("SELECT * FROM "._TABLE_STORE_." WHERE mod_is_module = 1 ORDER BY mod_version DESC", true);
		if(is_array($x_array)) { 
			echo serialize($x_array);
		} else {
			echo serialize(array());
		}	
		exit();
	}
	if($api_action == "store_software_latest") {
		// Initialization
		define("_HIVE_PREVENT_INIT_", true);
		require_once($object['path']."/_core/initialize.php");
		// Output current deployed modules for external instances as serialized array!
		$x_array = $object["mysql"]->select("SELECT * FROM "._TABLE_STORE_." WHERE mod_is_software = 1 ORDER BY mod_version DESC LIMIT 1", false);
		if(is_array($x_array)) { 
			echo serialize($x_array);
		} else {
			echo serialize(array());
		}	
		exit();
	}
	if($api_action == "store_cms_latest") {
		// Initialization
		define("_HIVE_PREVENT_INIT_", true);
		require_once($object['path']."/_core/initialize.php");
		// Output current deployed modules for external instances as serialized array!
		$x_array = $object["mysql"]->select("SELECT * FROM "._TABLE_STORE_." WHERE mod_is_cms = 1 ORDER BY mod_version DESC LIMIT 1", false);
		if(is_array($x_array)) { 
			echo serialize($x_array);
		} else {
			echo serialize(array());
		}	
		exit();
	}	
	if($api_action == "store_mod_latest") {
		// Initialization
		define("_HIVE_PREVENT_INIT_", true);
		require_once($object['path']."/_core/initialize.php");
		// Output current deployed modules for external instances as serialized array!
		$b = array();
		$b[0]["value"] = $api_rname;
		$x_array = $object["mysql"]->select("SELECT * FROM "._TABLE_STORE_." WHERE mod_is_module = 1 AND mod_rname = ? ORDER BY mod_rname, mod_version DESC", false, $b);
		if(is_array($x_array)) { 
			echo serialize($x_array);
		} else {
			echo serialize(array());
		}
		exit();
	}		
	
	############################################################################################
	// Route Functionality
	############################################################################################
	if($api_action == "route") {
		if(trim($api_endpoint ?? '') != "") {
			if(trim($api_mod ?? '') != "") { 
				if(trim($api_ext ?? '') != "") {
					if(is_dir("../_site/".$api_mod."")) {
						if(is_dir("../_data/".$api_mod."/_extension/".$api_ext."/_api/")) {
							if(file_exists("../_data/".$api_mod."/_extension/".$api_ext."/_api/api.".$api_endpoint.".php")) {
								// Checks
								$has_current_error = false;
								$object["hive_mode"] = false;	
								if(file_exists($object["path"]."/_site/".$api_mod."/version.php")) {
									require($object["path"]."/_site/".$api_mod."/version.php");
									$object["hive_mode"]  = $x;
									unset($x);
									$object["var_xtmp"] = new x_class_var($object["mysql"], $object["prefix"]."cms_var", $api_mod);			
									$tmp_build 		= $object["var_xtmp"]->get("_HIVE_BUILD_ACTIVE_");		
									$tmp_rname 		= $object["var_xtmp"]->get("_HIVE_RNAME_ACTIVE_");		
									$tmp_version 	= $object["var_xtmp"]->get("_HIVE_VERSION_ACTIVE_");	
									$tmp_frun 		= $object["var_xtmp"]->get("_HIVE_BUILD_FIRSTRUN_");
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
								if($has_current_error) {
									@http_response_code(400);
									echo "API-Error [c18]: Site Module Versioning error on request.";
									exit();
								}		
								// Define Current Site Mode Scope
								define("_HIVE_OVR_PRE_SETTING_MODE_", $api_mod);
								require_once($object['path']."/_core/initialize.php");
								// Load Site Mode Info
								$object["hive_mode_config"] = hive__init_site_header($object, $api_mod);
								$object["extension"] = hive__init_extension_header($object, $api_ext); 
								// Include API Script
								require_once("../_data/".$api_mod."/_extension/".$api_ext."/_api/api.".$api_endpoint.".php");
							} else {
								@http_response_code(400);
								echo "API-Error [c16]: Request Site Module Extension Endpoint does not exist.";
							}		
						} else {
							@http_response_code(400);
							echo "API-Error [c15]: Request Site Module Extension Endpoint does not have an API Folder.";
						}
					} else {
						@http_response_code(400);
						echo "API-Error [c14]: Request Site Module Endpoint does not exist.";
					}
				} else {
					if(is_dir("../_site/".$api_mod."/_api")) {
						if(file_exists("../_site/".$api_mod."/_api/api.".$api_endpoint.".php")) {
							//  Checks
							$has_current_error = false;
							$object["hive_mode"] = false;	
							if(file_exists($object["path"]."/_site/".$api_mod."/version.php")) {
								require($object["path"]."/_site/".$api_mod."/version.php");
								$object["hive_mode"]  = $x;
								unset($x);
								$object["var_xtmp"] = new x_class_var($object["mysql"], $object["prefix"]."cms_var", $api_mod);			
								$tmp_build 		= $object["var_xtmp"]->get("_HIVE_BUILD_ACTIVE_");		
								$tmp_rname 		= $object["var_xtmp"]->get("_HIVE_RNAME_ACTIVE_");		
								$tmp_version 	= $object["var_xtmp"]->get("_HIVE_VERSION_ACTIVE_");	
								$tmp_frun 		= $object["var_xtmp"]->get("_HIVE_BUILD_FIRSTRUN_");
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
							if($has_current_error) {
								@http_response_code(400);
								echo "API-Error [c18]: Site Module Versioning error on request.";
								exit();
							}				
							// Define Current Site Mode Scope
							define("_HIVE_OVR_PRE_SETTING_MODE_", $api_mod);
							require_once($object['path']."/_core/initialize.php");
							// Load Site Mode Info
							$object["hive_mode_config"] = hive__init_site_header($object, $api_mod);
							// Include API Script
							require_once("../_site/".$api_mod."/_api/api.".$api_endpoint.".php");
						} else {
							@http_response_code(400);
							echo "API-Error [c17]: Request Site Module Endpoint does not exist.";
						}
					} else {
						@http_response_code(400);
						echo "API-Error [c13]: Request Site Module Endpoint does not have an API Folder.";
					}
				}
			} else {
				@http_response_code(400);
				echo "API-Error [c12]: Missing value for api_mod.";
			}	
		} else {
			@http_response_code(400);
			echo "API-Error [c11]: Missing value for api_endpoint.";
		}
	} else {
		@http_response_code(400);
		echo "API-Error [c10]: Missing value for api_action.";
	}