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
			- Configuration Injection on Site Module execution AFTER all Site Module Initializations are done.
			- See Documentation for Available Variables and Functionalities of this file!
			- You can find the Documentation at: https://bugfishtm.github.io/suitefish-cms/
	*/ if(!is_array(@$object)) { http_response_code(404); Header("Location: ../"); exit(); }

	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Administrator Module Related
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------	

	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Table Settings
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// -------------------------------------------------------------------------------------------------------------------------
		// Alert Table
		// -------------------------------------------------------------------------------------------------------------------------
		define("_TABLE_ALERT_", 				_HIVE_SITE_PREFIX_."alert");
		// -------------------------------------------------------------------------------------------------------------------------
		// Files
		// -------------------------------------------------------------------------------------------------------------------------
		define("_TABLE_FILE_FOLDER_", 			_HIVE_SITE_PREFIX_."file_folder");
		define("_TABLE_FILE_SHARE_", 			_HIVE_SITE_PREFIX_."file_share");
		define("_TABLE_FILE_", 					_HIVE_SITE_PREFIX_."file");	
		// -------------------------------------------------------------------------------------------------------------------------
		// Objects
		// -------------------------------------------------------------------------------------------------------------------------
		define("_TABLE_OBJ_", 					_HIVE_SITE_PREFIX_."object");
		define("_TABLE_OBJ_STATUS_", 			_HIVE_SITE_PREFIX_."object_status");
		define("_TABLE_OBJ_ITEM_", 				_HIVE_SITE_PREFIX_."object_item");
		define("_TABLE_OBJ_PERM_", 				_HIVE_SITE_PREFIX_."object_perm");
		define("_TABLE_OBJ_DATA_", 				_HIVE_SITE_PREFIX_."object_data");
		define("_TABLE_OBJ_FIELD_", 			_HIVE_SITE_PREFIX_."object_field");
		// -------------------------------------------------------------------------------------------------------------------------
		// Pages
		// -------------------------------------------------------------------------------------------------------------------------
		define("_TABLE_PG_", 					_HIVE_SITE_PREFIX_."page");
		define("_TABLE_PG_BUILD_", 				_HIVE_SITE_PREFIX_."page_build");
		define("_TABLE_PG_PERM_", 				_HIVE_SITE_PREFIX_."page_perm");
		// -------------------------------------------------------------------------------------------------------------------------
		// User
		// -------------------------------------------------------------------------------------------------------------------------
		define("_TABLE_U_DATA_", 				_HIVE_SITE_PREFIX_."user_data");
		define("_TABLE_U_FIELD_", 				_HIVE_SITE_PREFIX_."user_field");	
		// -------------------------------------------------------------------------------------------------------------------------
		// Link Table
		// -------------------------------------------------------------------------------------------------------------------------
		define("_TABLE_LINK_", 					_HIVE_SITE_PREFIX_."link");	

	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Suitefish Information Array
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
		$object["suitefish"] = array();

		// -------------------------------------------------------------------------------------------------------------------------
		// Group Informations for Current Instance
		// -------------------------------------------------------------------------------------------------------------------------
		$object["suitefish"]["group"] = array();

			// -------------------------------------------------------------------------------------------------------------------------
			// Simple Array with Permitted Group IDs
			// -------------------------------------------------------------------------------------------------------------------------
			$object["suitefish"]["group"]["active"] = array();
			if($object["user"]->loggedIn) {
				$groups = $object["mysql"]->select("SELECT * FROM "._TABLE_USER_GROUP_LINK_." WHERE fk_user = ".$object["user"]->user_id."", true);
				if(is_array($groups)) {
					foreach($groups as $key => $value) {
						array_push($object["suitefish"]["group"]["active"], $value["id"]);
					}
				} unset($groups);				
			}

		// -------------------------------------------------------------------------------------------------------------------------
		// Theme Informations for Current Instance
		// -------------------------------------------------------------------------------------------------------------------------
		$object["suitefish"]["theme"] = array();













			// $object["suitefish"]["group"]["active"]
			// public  system owner private
			//  $object["suitefish"]["wfc"]["active"] Currently Active Pages the user can view (hidden and public)
			// smods_X
			// emods_X
					

	/*	[API PERM]
		api_user api_page api_object
	
	*/

	/*	[USER API PERM]
		apiu_user_get 
	*/

	/*	[DEFAULT PERM]
		[UNRELREAINODAS!!!! NOT IN NAVIGATION STRUCTURE:] admin_user_superuser  admin_upgrade [upgrade manager]
		admin_system_setup  admin_system_translation admin_system_mailtpl admin_system_blacklist admin_system_api admin_system_info
		admin_developer_const  admin_developer_db admin_developer_init admin_developer_mysql admin_developer_curl admin_developer_benchmark admin_developer_referer
		admin_developer_visits  admin_developer_js admin_developer_mail admin_developer_php admin_developer_worker admin_developer_cron admin_developer_logging
		admin_deploy_cms admin_deploy_software admin_deploy_module
		admin_package	 admin_docker admin_object admin_page
		admin_file_list admin_file_public admin_file_private admin_file_php admin_file_css admin_file_js
		admin_user_user admin_user_field admin_user_group admin_user_session  [admin_user_superuser/menationed at top of readme] [to change perm = superadmin in general]
		admin_admin (admin dashboard) 
	*/









			// -------------------------------------------------------------------------------------------------------------------------
			// Simple String with Valid Themes / Info Array about all themes
			// -------------------------------------------------------------------------------------------------------------------------
			$object["suitefish"]["theme"]["valid"] = array();
			$object["suitefish"]["theme"]["info"] = array();
			$path = $object["path"] . "/_data/" . _HIVE_MODE_ . "/_theme/";
			foreach (scandir($path) as $item) {
				if ($item !== '.' && $item !== '..' && $item !== '__disabled') {
					$fullPath = $path . $item;
					if (is_dir($fullPath)) { 
						if(file_exists($fullPath."/version.php")) { 
							array_push($object["suitefish"]["theme"]["valid"], basename($fullPath)); 
							$object["suitefish"]["theme"]["info"][basename($fullPath)] = hive__require_x($fullPath."/version.php");
						}
					}
				}
			}
			// -------------------------------------------------------------------------------------------------------------------------
			// Simple String with Current Active Theme // DO ONLY USE AFTER HEADER FUNCTION
			// -------------------------------------------------------------------------------------------------------------------------
			$object["suitefish"]["theme"]["active"] = _ADM_TH_DEFAULT_; // will be replaced with current active theme
			$object["suitefish"]["theme"]["sub_active"] = _ADM_COLOR_DEFAULT_; // will be replaced with current active sub-theme
			$valid_theme_adminbsb = array("red", "pink", "purple", "deep-purple", "indigo", "blue", "light-blue", "cyan", "teal", "green", "light-green", "lime", "yellow", "amber", "orange", "deep-orange", "brown", "grey", "blue-grey", "black"); 
			define("_ADM_ADMINBSB_VALIDSUB_", $valid_theme_adminbsb);
			// Set Default Variables
			if(!isset($_SESSION[_HIVE_SITE_COOKIE_."admth_theme"])) { $_SESSION[_HIVE_SITE_COOKIE_."admth_theme"] = $object["suitefish"]["theme"]["active"]; }
			if(!isset($_SESSION[_HIVE_SITE_COOKIE_."admth_themesub"])) { $_SESSION[_HIVE_SITE_COOKIE_."admth_themesub"] = $object["suitefish"]["theme"]["sub_active"]; }
			// Determine Current Theme
			if($object["user"]->loggedIn) {
				$is_loggedin = true;
			} else { 
				$is_loggedin = false;
			}
			$deftheme = _ADM_TH_DEFAULT_;
			if(!in_array(_ADM_TH_DEFAULT_, $object["suitefish"]["theme"]["valid"])) {
				$deftheme = "adminbsb";
			}
			$defsub = _ADM_COLOR_DEFAULT_;
			if($deftheme == "adminbsb") {
				if(!in_array(_ADM_COLOR_DEFAULT_, $valid_theme_adminbsb)) {
					$defsub = "deep-orange";
				}
			}
			if($is_loggedin) {
				$user_variables = hive__user_key_get($object, $object["user"]->user_id, _HIVE_MODE_, "suitefish");
				if(is_array($user_variables)) {
					if(isset($user_variables["theme"])) {
						$object["suitefish"]["theme"]["active"] = $user_variables["theme"];
					} else {
						$object["suitefish"]["theme"]["active"] = @$_SESSION[_HIVE_SITE_COOKIE_."admth_theme"];
						if(!in_array($object["suitefish"]["theme"]["active"], $object["suitefish"]["theme"]["valid"])) {
							$object["suitefish"]["theme"]["active"] = $deftheme;
						}	
					}
					if(isset($user_variables["theme_sub"][$object["suitefish"]["theme"]["active"]])) {
						$object["suitefish"]["theme"]["sub_active"] = $user_variables["theme_sub"][$object["suitefish"]["theme"]["active"]];
						$cursub = $user_variables["theme_sub"][$object["suitefish"]["theme"]["active"]];
						if($object["suitefish"]["theme"]["active"] == "adminbsb") {
							if(!in_array($cursub, $valid_theme_adminbsb)) {
								$cursub = $defsub;
							}			
						}
					} else {
						$object["suitefish"]["theme"]["sub_active"] = false;
						if($object["suitefish"]["theme"]["active"] == "adminbsb") { 
							$object["suitefish"]["theme"]["sub_active"] = $defsub;
							if($object["suitefish"]["theme"]["active"] == "adminbsb") { $object["suitefish"]["theme"]["sub_active"] =  @$cursub;} 
						}
					}
				} else {
					$object["suitefish"]["theme"]["active"] = @$_SESSION[_HIVE_SITE_COOKIE_."admth_theme"];
					$object["suitefish"]["theme"]["sub_active"] = @$_SESSION[_HIVE_SITE_COOKIE_."admth_themesub"];
					$cursub = @$_SESSION[_HIVE_SITE_COOKIE_."admth_themesub"];
					if(!in_array($object["suitefish"]["theme"]["active"], $object["suitefish"]["theme"]["valid"])) {
						$object["suitefish"]["theme"]["active"] = $deftheme;
					}				
					if($object["suitefish"]["theme"]["active"] == "adminbsb") { 
						if(!in_array($object["suitefish"]["theme"]["sub_active"], $valid_theme_adminbsb)) {
							$object["suitefish"]["theme"]["sub_active"] = $defsub;
							$cursub = $defsub;
						}				
					}						
				}
			} else {
				$object["suitefish"]["theme"]["active"] = @$_SESSION[_HIVE_SITE_COOKIE_."admth_theme"];
				$object["suitefish"]["theme"]["sub_active"] = @$_SESSION[_HIVE_SITE_COOKIE_."admth_themesub"];
				$cursub = @$_SESSION[_HIVE_SITE_COOKIE_."admth_themesub"];
				if(!in_array($object["suitefish"]["theme"]["active"], $object["suitefish"]["theme"]["valid"])) {
					$object["suitefish"]["theme"]["active"] = $deftheme;
				}				
				if($object["suitefish"]["theme"]["active"] == "adminbsb") { 
					if(!in_array($object["suitefish"]["theme"]["sub_active"], $valid_theme_adminbsb)) {
						$object["suitefish"]["theme"]["sub_active"] = $defsub;
						$cursub = $defsub;
					}				
				}				
			} 
			if(!in_array($object["suitefish"]["theme"]["active"], $object["suitefish"]["theme"]["valid"])) {
				$object["suitefish"]["theme"]["active"] = $deftheme;
				if(isset($user_variables["theme_sub"][$deftheme])) {
					$object["suitefish"]["theme"]["sub_active"] = $user_variables["theme_sub"][$deftheme];
				} else { 
					$object["suitefish"]["theme"]["sub_active"] = $defsub;
					if($object["suitefish"]["theme"]["active"] == "adminbsb") { $object["suitefish"]["theme"]["sub_active"] =  @$cursub;	} 
				}
			}
			if($object["suitefish"]["theme"]["active"] == "adminbsb") {
				if(!in_array($object["suitefish"]["theme"]["sub_active"], $valid_theme_adminbsb)) {
					$object["suitefish"]["theme"]["sub_active"] = $defsub; 
					if($object["suitefish"]["theme"]["active"] == "adminbsb") { $object["suitefish"]["theme"]["sub_active"] =  @$cursub;} 
				}
			} 
			if(!in_array($object["suitefish"]["theme"]["active"], $object["suitefish"]["theme"]["valid"])) {
				$object["suitefish"]["theme"]["active"] = $deftheme;
				$object["suitefish"]["theme"]["sub_active"] = $defsub;
				if($object["suitefish"]["theme"]["active"] == "adminbsb") { $object["suitefish"]["theme"]["sub_active"] =  @$cursub;} 
			} 
			if(_ADM_TH_FORCE_ == 1) {
				$object["suitefish"]["theme"]["active"] = $deftheme;
				$object["suitefish"]["theme"]["sub_active"] = $defsub;
				if($object["suitefish"]["theme"]["active"] == "adminbsb") { $object["suitefish"]["theme"]["sub_active"] =  @$cursub;} 
			} 
			if($object["suitefish"]["theme"]["active"] == "adminbsb") {
				if(!in_array($object["suitefish"]["theme"]["sub_active"], $valid_theme_adminbsb)) {
					$object["suitefish"]["theme"]["sub_active"] = $defsub; 
					if($object["suitefish"]["theme"]["active"] == "adminbsb") { $object["suitefish"]["theme"]["sub_active"] =  @$cursub;} 
				}
			}
			if($object["suitefish"]["theme"]["active"] == "adminbsb") {
				if(!in_array($object["suitefish"]["theme"]["sub_active"], $valid_theme_adminbsb)) {
					$object["suitefish"]["theme"]["sub_active"] = $defsub; 
				}
			}
			unset($user_variables);
			unset($deftheme);
			unset($defsub);
			unset($is_loggedin);
			unset($valid_theme_adminbsb);
			unset($cursub);
			// Set Variables
			$_SESSION[_HIVE_SITE_COOKIE_."admth_lang"] = _HIVE_LANG_; 
			$_SESSION[_HIVE_SITE_COOKIE_."admth_theme"] = $object["suitefish"]["theme"]["active"];
			$_SESSION[_HIVE_SITE_COOKIE_."admth_themesub"] = $object["suitefish"]["theme"]["sub_active"];
			define("_ADM_TH_", $object["suitefish"]["theme"]["active"]);
			define("_ADM_COLOR_", $object["suitefish"]["theme"]["sub_active"]);
			



	


			








		// -------------------------------------------------------------------------------------------------------------------------
		// WFC Information for Current Instance
		// -------------------------------------------------------------------------------------------------------------------------
		$object["suitefish"]["wfc"] = array();
		
			// -------------------------------------------------------------------------------------------------------------------------
			// Simple Array with Permitted Private Page IDs
			// -------------------------------------------------------------------------------------------------------------------------
			$object["suitefish"]["wfc"]["active"] = array();
			$array_with_sites = array();
			foreach($object["suitefish"]["group"]["active"] as $key => $value) {
				$groups_tmp = $object["mysql"]->select("SELECT id, fk_page FROM "._TABLE_PG_PERM_." WHERE fk_group = ".$value."", true);
				if(is_array($groups_tmp)) {
					foreach($groups_tmp as $key2 => $value2) {
						array_push($array_with_sites, $value2["fk_page"]);
					}
				} unset($groups_tmp);
			}			
			if($object["user"]->loggedIn) {
				$user = $object["mysql"]->select("SELECT id, fk_page FROM "._TABLE_PG_PERM_." WHERE fk_user = ".$object["user"]->user_id."", true);
				if(is_array($user)) {
					foreach($user as $key2 => $value2) {
						array_push($array_with_sites, $value2["fk_page"]);
					}
				} unset($user);
			}
			$array_with_sites = array_unique($array_with_sites); 
			$object["suitefish"]["wfc"]["active"] = $array_with_sites; 
			unset($array_with_sites);	

	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Include Current Themes Library
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	if(file_exists($object["path"]."/_data/"._HIVE_MODE_."/_theme/".basename($object["suitefish"]["theme"]["active"])."/library.php")) {
		require_once($object["path"]."/_data/"._HIVE_MODE_."/_theme/".basename($object["suitefish"]["theme"]["active"])."/library.php");
	}	
	
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Init Default SET Array
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------	
	if(!is_array($object["set"])) {
		$object["set"] = array();
	}
	
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// API Default Permissions
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------	
	$object["set"]["permission_api"] = array();
	
		// -------------------------------------------------------------------------------------------------------------------------
		// Backend API Endpoints
		// -------------------------------------------------------------------------------------------------------------------------		
		array_push($object["set"]["permission_api"], array("api_user", $object["lang"]->translate("adm_perm-api_user"), $object["lang"]->translate("adm_permd-api_user")));
		array_push($object["set"]["permission_api"], array("api_page", $object["lang"]->translate("adm_perm-api_page"), $object["lang"]->translate("adm_permd-api_page")));
		array_push($object["set"]["permission_api"], array("api_object", $object["lang"]->translate("adm_perm-api_object"), $object["lang"]->translate("adm_permd-api_object")));


	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// API Default User Permissions
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------		
	$object["set"]["permission_apiu"] = array();
	
		// -------------------------------------------------------------------------------------------------------------------------
		// User Data Get
		// -------------------------------------------------------------------------------------------------------------------------		
		array_push($object["set"]["permission_apiu"], array("apiu_user_get", $object["lang"]->translate("adm_perm-apiu_user_get"), $object["lang"]->translate("adm_permd-apiu_user_get")));

	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Default UserPermissions
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------		
	$object["set"]["permission"] = array();			

		// -------------------------------------------------------------------------------------------------------------------------
		// Upgrade Manager
		// -------------------------------------------------------------------------------------------------------------------------	
		array_push($object["set"]["permission"], array("admin_upgrade", $object["lang"]->translate("adm_perm-upgrade"), $object["lang"]->translate("adm_permd-upgrade")));

		// -------------------------------------------------------------------------------------------------------------------------
		// Admin Dashboard Area
		// -------------------------------------------------------------------------------------------------------------------------		
		array_push($object["set"]["permission"], array("admin_admin", $object["lang"]->translate("adm_perm-admin_admin"), $object["lang"]->translate("adm_permd-admin_admin")));

		// -------------------------------------------------------------------------------------------------------------------------
		// User Area Permissions
		// -------------------------------------------------------------------------------------------------------------------------
		if(_ADM_S_USER_ == 1) {		
			array_push($object["set"]["permission"], array("admin_user_superuser", $object["lang"]->translate("adm_perm-admin_user_superuser"), $object["lang"]->translate("adm_permd-admin_user_superuser")));
			array_push($object["set"]["permission"], array("admin_user_admin", $object["lang"]->translate("adm_perm-admin_user_admin"), $object["lang"]->translate("adm_permd-admin_user_admin")));
			array_push($object["set"]["permission"], array("admin_user_user", $object["lang"]->translate("adm_perm-admin_user_user"), $object["lang"]->translate("adm_permd-admin_user_user")));
			array_push($object["set"]["permission"], array("admin_user_field", $object["lang"]->translate("adm_perm-admin_user_field"), $object["lang"]->translate("adm_permd-admin_user_field")));
			array_push($object["set"]["permission"], array("admin_user_group", $object["lang"]->translate("adm_perm-admin_user_group"), $object["lang"]->translate("adm_permd-admin_user_group")));
			array_push($object["set"]["permission"], array("admin_user_session", $object["lang"]->translate("adm_perm-admin_user_session"), $object["lang"]->translate("adm_permd-admin_user_session")));
		}	
		// -------------------------------------------------------------------------------------------------------------------------
		// Files Areas
		// -------------------------------------------------------------------------------------------------------------------------	
		if(_ADM_S_FILE_ == 1) {
			array_push($object["set"]["permission"], array("admin_file_list", $object["lang"]->translate("adm_perm-admin_file_list"), $object["lang"]->translate("adm_permd-admin_file_list")));
			array_push($object["set"]["permission"], array("admin_file_public", $object["lang"]->translate("adm_perm-admin_file_public"), $object["lang"]->translate("adm_permd-admin_file_public")));
			array_push($object["set"]["permission"], array("admin_file_private", $object["lang"]->translate("adm_perm-admin_file_private"), $object["lang"]->translate("adm_permd-admin_file_private")));
			array_push($object["set"]["permission"], array("admin_file_php", $object["lang"]->translate("adm_perm-admin_file_php"), $object["lang"]->translate("adm_permd-admin_file_php")));
			array_push($object["set"]["permission"], array("admin_file_css", $object["lang"]->translate("adm_perm-admin_file_css"), $object["lang"]->translate("adm_permd-admin_file_css")));
			array_push($object["set"]["permission"], array("admin_file_js", $object["lang"]->translate("adm_perm-admin_file_js"), $object["lang"]->translate("adm_permd-admin_file_js")));
		}	

		// -------------------------------------------------------------------------------------------------------------------------
		// Pages Areas
		// -------------------------------------------------------------------------------------------------------------------------		
		if(_ADM_S_PAGE_ == 1) {
			array_push($object["set"]["permission"], array("admin_page", $object["lang"]->translate("adm_perm-admin_page"), $object["lang"]->translate("adm_permd-admin_page")));
		}	
		
		// -------------------------------------------------------------------------------------------------------------------------
		// Object Areas
		// -------------------------------------------------------------------------------------------------------------------------		
		if(_ADM_S_OBJECT_ == 1) {
			array_push($object["set"]["permission"], array("admin_object", $object["lang"]->translate("adm_perm-admin_object"), $object["lang"]->translate("adm_permd-admin_object")));
		}	
		
		// -------------------------------------------------------------------------------------------------------------------------
		// Docker Areas
		// -------------------------------------------------------------------------------------------------------------------------		
		if(_ADM_S_DOCKER_ == 1) {
			array_push($object["set"]["permission"], array("admin_docker", $object["lang"]->translate("adm_perm-admin_docker"), $object["lang"]->translate("adm_permd-admin_docker")));
		}
		
		// -------------------------------------------------------------------------------------------------------------------------
		// Package Areas
		// -------------------------------------------------------------------------------------------------------------------------
		if(_ADM_S_PACKAGE_ == 1) {
			array_push($object["set"]["permission"], array("admin_package", $object["lang"]->translate("adm_perm-admin_package"), $object["lang"]->translate("adm_permd-admin_package")));
		}
		
		// -------------------------------------------------------------------------------------------------------------------------
		// Deploy Areas
		// -------------------------------------------------------------------------------------------------------------------------
		if(_ADM_S_DEPLOY_ == 1) {
			array_push($object["set"]["permission"], array("admin_deploy_cms", $object["lang"]->translate("adm_perm-admin_deploy_cms"), $object["lang"]->translate("adm_permd-admin_deploy_cms")));
			array_push($object["set"]["permission"], array("admin_deploy_software", $object["lang"]->translate("adm_perm-admin_deploy_software"), $object["lang"]->translate("adm_permd-admin_deploy_software")));
			array_push($object["set"]["permission"], array("admin_deploy_module", $object["lang"]->translate("adm_perm-admin_deploy_module"), $object["lang"]->translate("adm_permd-admin_deploy_module")));
		}

		// -------------------------------------------------------------------------------------------------------------------------
		// Developer Areas
		// -------------------------------------------------------------------------------------------------------------------------
		if(_ADM_S_DEVELOPER_ == 1) {
			array_push($object["set"]["permission"], array("admin_developer_logging", $object["lang"]->translate("adm_perm-admin_developer_logging"), $object["lang"]->translate("adm_permd-admin_developer_logging")));
			array_push($object["set"]["permission"], array("admin_developer_cron", $object["lang"]->translate("adm_perm-admin_developer_cron"), $object["lang"]->translate("adm_permd-admin_developer_cron")));
			array_push($object["set"]["permission"], array("admin_developer_worker", $object["lang"]->translate("adm_perm-admin_developer_worker"), $object["lang"]->translate("adm_permd-admin_developer_worker")));
			array_push($object["set"]["permission"], array("admin_developer_php", $object["lang"]->translate("adm_perm-admin_developer_php"), $object["lang"]->translate("adm_permd-admin_developer_php")));
			array_push($object["set"]["permission"], array("admin_developer_mail", $object["lang"]->translate("adm_perm-admin_developer_mail"), $object["lang"]->translate("adm_permd-admin_developer_mail")));
			array_push($object["set"]["permission"], array("admin_developer_js", $object["lang"]->translate("adm_perm-admin_developer_js"), $object["lang"]->translate("adm_permd-admin_developer_js")));
			array_push($object["set"]["permission"], array("admin_developer_visits", $object["lang"]->translate("adm_perm-admin_developer_visits"), $object["lang"]->translate("adm_permd-admin_developer_visits")));
			array_push($object["set"]["permission"], array("admin_developer_referer", $object["lang"]->translate("adm_perm-admin_developer_referer"), $object["lang"]->translate("adm_permd-admin_developer_referer")));
			array_push($object["set"]["permission"], array("admin_developer_benchmark", $object["lang"]->translate("adm_perm-admin_developer_benchmark"), $object["lang"]->translate("adm_permd-admin_developer_benchmark")));
			array_push($object["set"]["permission"], array("admin_developer_curl", $object["lang"]->translate("adm_perm-admin_developer_curl"), $object["lang"]->translate("adm_permd-admin_developer_curl")));
			array_push($object["set"]["permission"], array("admin_developer_mysql", $object["lang"]->translate("adm_perm-admin_developer_mysql"), $object["lang"]->translate("adm_permd-admin_developer_mysql")));
			array_push($object["set"]["permission"], array("admin_developer_init", $object["lang"]->translate("adm_perm-admin_developer_init"), $object["lang"]->translate("adm_permd-admin_developer_init")));
			array_push($object["set"]["permission"], array("admin_developer_db", $object["lang"]->translate("adm_perm-admin_developer_db"), $object["lang"]->translate("adm_permd-admin_developer_db")));
			array_push($object["set"]["permission"], array("admin_developer_const", $object["lang"]->translate("adm_perm-admin_developer_const"), $object["lang"]->translate("adm_permd-admin_developer_const")));
		}

		// -------------------------------------------------------------------------------------------------------------------------
		// System Areas
		// -------------------------------------------------------------------------------------------------------------------------
		array_push($object["set"]["permission"], array("admin_system_setup", $object["lang"]->translate("adm_perm-admin_system_setup"), $object["lang"]->translate("adm_permd-admin_system_setup")));
		array_push($object["set"]["permission"], array("admin_system_translation", $object["lang"]->translate("adm_perm-admin_system_translation"), $object["lang"]->translate("adm_permd-admin_system_translation")));
		array_push($object["set"]["permission"], array("admin_system_mailtpl", $object["lang"]->translate("adm_perm-admin_system_mailtpl"), $object["lang"]->translate("adm_permd-admin_system_mailtpl")));
		array_push($object["set"]["permission"], array("admin_system_blacklist", $object["lang"]->translate("adm_perm-admin_system_blacklist"), $object["lang"]->translate("adm_permd-admin_system_blacklist")));
		array_push($object["set"]["permission"], array("admin_system_api", $object["lang"]->translate("adm_perm-admin_system_api"), $object["lang"]->translate("adm_permd-admin_system_api")));
		array_push($object["set"]["permission"], array("admin_system_info", $object["lang"]->translate("adm_perm-admin_system_info"), $object["lang"]->translate("adm_permd-admin_system_info")));

	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Profile Manager Menue
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	$pfm = array();
	array_push($pfm, array( "nav_title" => $object["lang"]->translate("string_profile"), 
							"nav_img" => "sentiment_satisfied_alt", 
							"nav_loc" => hive__url(array("profile", false, false, false, false))));
	array_push($pfm, array( "nav_title" => $object["lang"]->translate("string_logout"), 
							"nav_img" => "meeting_room", 
							"nav_loc" => hive__url(array("logout", false, false, false, false))));	

	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Add 3rd Party Permissions
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Include Other Site Modules Permissions
	foreach (_HIVE_MODE_ARRAY_ as $filename) {
		if (file_exists($object["path"]."/_site/".$filename."/_admin/mod_permission.php")) {
			$object["hive_mode_config"] = hive__init_site_header($object, $filename);			
			require($object["path"]."/_site/".$filename."/_admin/mod_permission.php");
		}
	} 
	// Include Extension Permissions
	foreach ($object["extensions_path"] as $filename) {
		$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_);			
		if (file_exists($filename."/_admin/mod_permission.php")) {
			$object["extension"] = hive__init_extension_header($object, basename($filename));
			require($filename."/_admin/mod_permission.php");
		}
	} 			
	
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Navigation Settings
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------		
	$object["nav"] = array();			
			
		// -------------------------------------------------------------------------------------------------------------------------
		// Public Pages
		// -------------------------------------------------------------------------------------------------------------------------
		$tmpnewbt = $object["mysql"]->select("SELECT * FROM "._TABLE_PG_." WHERE is_public = 1 AND page_hide <> 1 ORDER BY page_sort ASC", true);
		if(is_array($tmpnewbt)) {
			if($object["user"]->loggedIn) {
					if(isset($_SESSION[_HIVE_SITE_COOKIE_."_nav_public"])) {} else { $_SESSION[_HIVE_SITE_COOKIE_."_nav_public"] = 1; }  
					if($_SESSION[_HIVE_SITE_COOKIE_."_nav_public"]) { $tmpnav = " <span style='cursor:pointer;' onclick='hive_menu_switch($(this), \"public\")'>(-)</span>"; } 
					else { $tmpnav = " <span style='cursor:pointer;' onclick='hive_menu_switch($(this), \"public\")' class='hive_menu_switch_hide'>(+)</span>"; }
					
					array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_h_front")).$tmpnav, 
													 "nav_header" => true)); 	
			}		
			foreach($tmpnewbt as $key => $value) {
				if($value["page_cat"] == 1) {
					$tmpnewbt32 = $object["mysql"]->select("SELECT * FROM "._TABLE_PG_." WHERE is_public = 1 AND page_hide <> 1 AND fk_page = ".$value["id"]." ORDER BY page_sort ASC", true);
					if($tmpnewbt32) {
						$submenue = array();
						foreach($tmpnewbt32 as $keyx1 => $valuex1) {
							array_push($submenue, array("nav_title" => hive__hsc($object["lang"]->translate($valuex1["page_name"])),
															 "nav_img" => "", 
															 "nav_sub" => false, 
															 "nav_act" => $valuex1["page_key"], 
															 "nav_loc" => hive__url(array("wfc_".$value["page_key"], $valuex1["page_key"], false, false, false))));
							if(!defined("ADM_INTERNAL_STARTLOCATION")) { 
								define("ADM_INTERNAL_STARTLOCATION", hive__url(array("wfc_".$value["page_key"], $valuex1["page_key"], false, false, false))); 
							}								
						}
						if(count($submenue) > 0) {
							array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate($value["page_name"])), 
														 "nav_img" => $value["page_image"], 
														 "nav_sub" => $submenue, 
														 "nav_act" => "wfc_".$value["page_key"], 
														 "nav_loc" => false));						
						}
					}
				} else {
					array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate($value["page_name"])), 
													 "nav_img" => $value["page_image"], 
													 "nav_sub" => false, 
													 "nav_act" => "wfc_".$value["page_key"], 
													 "nav_loc" => hive__url(array("wfc_".$value["page_key"], false, false, false, false))));	
					if(!defined("ADM_INTERNAL_STARTLOCATION")) { 
						define("ADM_INTERNAL_STARTLOCATION", hive__url(array("wfc_".$value["page_key"], false, false, false, false))); 
					}	
				}	
			}
		} unset($tmpnewbt); unset($tmpnewbt32); unset($submenue);			
			
		// -------------------------------------------------------------------------------------------------------------------------
		// Hidden Pages
		// -------------------------------------------------------------------------------------------------------------------------
		if($object["user"]->loggedIn) {
			$tmpnewbt = $object["mysql"]->select("SELECT * FROM "._TABLE_PG_." WHERE is_private = 1 AND page_hide <> 1 ORDER BY page_sort ASC", true);
			if(is_array($tmpnewbt)) {
				$cansee = false;
				foreach($tmpnewbt as $key => $value) {
					if(in_array($value["id"], $object["suitefish"]["wfc"]["active"])) {
						$cansee = true;
					}
				}
				if($cansee) {	
					if(isset($_SESSION[_HIVE_SITE_COOKIE_."_nav_private"])) {} else { $_SESSION[_HIVE_SITE_COOKIE_."_nav_private"] = 1; }  
					if($_SESSION[_HIVE_SITE_COOKIE_."_nav_private"]) { $tmpnav = " <span style='cursor:pointer;' onclick='hive_menu_switch($(this), \"private\")'>(-)</span>"; } 
					else { $tmpnav = " <span style='cursor:pointer;' onclick='hive_menu_switch($(this), \"private\")' class='hive_menu_switch_hide'>(+)</span>"; }
					array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_h_front")).$tmpnav, 
													 "nav_header" => true)); 		
				}		
				foreach($tmpnewbt as $key => $value) {
					if(in_array($value["id"], $object["suitefish"]["wfc"]["active"])) {
						if($value["page_cat"] == 1) {
							$tmpnewbt32 = $object["mysql"]->select("SELECT * FROM "._TABLE_PG_." WHERE is_private = 1 AND page_hide <> 1 AND fk_page = ".$value["id"]." ORDER BY page_sort ASC", true);
							if($tmpnewbt32) {
								$submenue = array();
								foreach($tmpnewbt32 as $keyx1 => $valuex1) {
									array_push($submenue, array("nav_title" => hive__hsc($object["lang"]->translate($valuex1["page_name"])),
																	 "nav_img" => "", 
																	 "nav_sub" => false, 
																	 "nav_act" => $valuex1["page_key"], 
																	 "nav_loc" => hive__url(array("wfc_".$value["page_key"], $valuex1["page_key"], false, false, false))));
									if(!defined("ADM_INTERNAL_STARTLOCATION")) { 
										define("ADM_INTERNAL_STARTLOCATION", hive__url(array("wfc_".$value["page_key"], $valuex1["page_key"], false, false, false))); 
									}	
								}
								if(count($submenue) > 0) {
									array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate($value["page_name"])), 
																 "nav_img" => $value["page_image"], 
																 "nav_sub" => $submenue, 
																 "nav_act" => "wfc_".$value["page_key"], 
																 "nav_loc" => false));						
								}
							}	
						} else {
							array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate($value["page_name"])), 
															 "nav_img" => $value["page_image"], 
															 "nav_sub" => false, 
															 "nav_act" => "wfc_".$value["page_key"], 
															 "nav_loc" => hive__url(array("wfc_".$value["page_key"], false, false, false, false))));	
							if(!defined("ADM_INTERNAL_STARTLOCATION")) { 
								define("ADM_INTERNAL_STARTLOCATION", hive__url(array("wfc_".$value["page_key"], false, false, false, false))); 
							}	
						}				
					}	
				}	
			} unset($tmpnewbt); unset($tmpnewbt32); unset($submenue); unset($cansee);
		}    				
			
		// ---------------------------------------------------------------------------------------------------------------------
		// Site Module Navigation Injection Items
		// ---------------------------------------------------------------------------------------------------------------------
		$tmp_to_save = $object["nav"];
		$object["nav"] = array();
		$hasentries = false; 
		foreach (_HIVE_MODE_ARRAY_ as $filename) {
			if (file_exists($object["path"]."/_site/".$filename."/_admin/mod_nav.php")) {
				$object["hive_mode_config"] = hive__init_site_header($object, $filename);	
				require($object["path"]."/_site/".$filename."/_admin/mod_nav.php");
				if(count($object["nav"]) > 0) {  $hasentries = true; break; }
			}
		} $object["nav"] = $tmp_to_save; unset($tmp_to_save);
		if($hasentries) {		
			foreach (_HIVE_MODE_ARRAY_ as $filename) {
				if (file_exists($object["path"]."/_site/".$filename."/_admin/mod_nav.php")) {
					if($object["user"]->loggedIn) {
							if(isset($_SESSION[_HIVE_SITE_COOKIE_."_nav_smods_".$filename.""])) {} else { $_SESSION[_HIVE_SITE_COOKIE_."_nav_smods_".$filename.""] = 1; }  
							if($_SESSION[_HIVE_SITE_COOKIE_."_nav_smods_".$filename.""]) { $tmpnav = " <span style='cursor:pointer;' onclick='hive_menu_switch($(this), \"smods_".$filename."\")'>(-)</span>"; } 
							else { $tmpnav = " <span style='cursor:pointer;' onclick='hive_menu_switch($(this), \"smods_".$filename."\")' class='hive_menu_switch_hide'>(+)</span>"; }
							array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_h_smods")." [".$filename."]").$tmpnav, 
															 "nav_header" => true)); 	
					}		
					$object["hive_mode_config"] = hive__init_site_header($object, $filename);
					require($object["path"]."/_site/".$filename."/_admin/mod_nav.php");
				}
			}		
		}    
	
		// ---------------------------------------------------------------------------------------------------------------------
		// Extension Navigation Injection Items
		// ---------------------------------------------------------------------------------------------------------------------
		$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_);
		$tmp_to_save = $object["nav"];
		$object["nav"] = array();
		$hasentries = false; 			
		foreach ($object["extensions_path"] as $filename) {
			if (file_exists($filename."/_admin/mod_nav.php")) { 
				$object["extension"] 		= hive__init_extension_header($object, basename($filename));	
				require($filename."/_admin/mod_nav.php");
				if(count($object["nav"]) > 0) {  $hasentries = true; break; }
			}
		} unset($object["extension"]); $object["nav"] = $tmp_to_save; unset($tmp_to_save);			
		if($hasentries) {
			foreach ($object["extensions_path"] as $filename) {
				if($object["user"]->loggedIn) {
						if(isset($_SESSION[_HIVE_SITE_COOKIE_."_nav_emods_".basename($filename).""])) {} else { $_SESSION[_HIVE_SITE_COOKIE_."_nav_emods_".basename($filename).""] = 1; }  
						if($_SESSION[_HIVE_SITE_COOKIE_."_nav_emods_".basename($filename).""]) { $tmpnav = " <span style='cursor:pointer;' onclick='hive_menu_switch($(this), \"emods_".basename($filename)."\")'>(-)</span>"; } 
						else { $tmpnav = " <span style='cursor:pointer;' onclick='hive_menu_switch($(this), \"emods_".basename($filename)."\")' class='hive_menu_switch_hide'>(+)</span>"; }
						array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_h_emods")." [".basename($filename)."]").$tmpnav, 
														 "nav_header" => true)); 	
				}		
				if (file_exists($filename."/_admin/mod_nav.php")) { 
					$object["extension"] 		= hive__init_extension_header($object, basename($filename));		
					require($filename."/_admin/mod_nav.php");
				}
			} unset($object["extension"]);		
		}
		define("_ADM_NAV_PFM_", $pfm);				
			
		// ---------------------------------------------------------------------------------------------------------------------
		// Determine Access to Admin Labeled Areas
		// ---------------------------------------------------------------------------------------------------------------------
		$tmp_access = false;
		if(hive__access($object, array("admin_admin", "admin_system_setup", "admin_system_mailtpl", "admin_system_translation", "admin_system_blacklist", "admin_system_api", "admin_system_info"), false)) {
			$tmp_access = true;
		} else { 
			if(_ADM_S_PACKAGE_ == 1) {
				if(hive__access($object, array("admin_package"), false)) {
					$tmp_access = true;
				}
			}
			if(_ADM_S_DOCKER_ == 1) {
				if(hive__access($object, array("admin_docker"), false)) {
					$tmp_access = true;
				}
			}
			if(_ADM_S_OBJECT_ == 1) {
				if(hive__access($object, array("admin_object"), false)) {
					$tmp_access = true;
				}
			}
			if(_ADM_S_PAGE_ == 1) {
				if(hive__access($object, array("admin_page"), false)) {
					$tmp_access = true;
				}
			}
			if(_ADM_S_DEVELOPER_ == 1) {
				if(hive__access($object, array("admin_developer_logging", "admin_developer_cron", "admin_developer_worker", "admin_developer_php", "admin_developer_mail", "admin_developer_js", "admin_developer_visits", "admin_developer_referer", "admin_developer_benchmark", "admin_developer_curl", "admin_developer_mysql", "admin_developer_init", "admin_developer_db", "admin_developer_const"), false)) {
					$tmp_access = true;
				}
			}	
			if(_ADM_S_DEPLOY_ == 1) {
				if(hive__access($object, array("admin_deploy_cms", "admin_deploy_software", "admin_deploy_module"), false)) {
					$tmp_access = true;
				}
			}
			if(_ADM_S_FILE_ == 1) {
				if(hive__access($object, array("admin_file_js", "admin_file_css", "admin_file_php", "admin_file_private", "admin_file_public", "admin_file_list"), false)) {
					$tmp_access = true;
				}
			}
			if(_ADM_S_USER_ == 1) {
				if(hive__access($object, array("admin_user_session", "admin_user_group", "admin_user_field", "admin_user_user", "admin_user_superuser"), false)) {
					$tmp_access = true;
				}
			}
		}
		
		// ---------------------------------------------------------------------------------------------------------------------
		// Administration Area
		// ---------------------------------------------------------------------------------------------------------------------
		if($tmp_access) {
		if(isset($_SESSION[_HIVE_SITE_COOKIE_."_nav_system"])) {} else { $_SESSION[_HIVE_SITE_COOKIE_."_nav_system"] = 1; } 
		if($_SESSION[_HIVE_SITE_COOKIE_."_nav_system"]) { $tmpnav = " <span style='cursor:pointer;' onclick='hive_menu_switch($(this), \"system\")'>(-)</span>"; } 
		else { $tmpnav = " <span style='cursor:pointer;' onclick='hive_menu_switch($(this), \"system\")' class='hive_menu_switch_hide'>(+)</span>"; }
		array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_h_administrator")).$tmpnav, 
										 "nav_header" => true)); }

		// ---------------------------------------------------------------------------------------------------------------------
		// Admin Dashboard Page 
		// ---------------------------------------------------------------------------------------------------------------------
		if(hive__access($object, array("admin_admin"), false)) { 
			array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_admin")), 
											 "nav_img" => "rocket_launch", 
											 "nav_sub" => false, 
											 "nav_act" => "admin", 
											 "nav_loc" => hive__url(array("admin", false, false, false, false))));
		}
		
		// ---------------------------------------------------------------------------------------------------------------------
		// User
		// ---------------------------------------------------------------------------------------------------------------------
		$submenu = array();
		if(_ADM_S_USER_ == 1) {
			if(hive__access($object, array("admin_user_user", "admin_user_superuser"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_user_user")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "user", 
												 "nav_loc" => hive__url(array("user", "user", false, false, false))));
			}
			if(hive__access($object, array("admin_user_field", "admin_user_superuser"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_user_field")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "field", 
												 "nav_loc" => hive__url(array("user", "field", false, false, false))));
			}
			if(hive__access($object, array("admin_user_group", "admin_user_superuser"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_user_group")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "group", 
												 "nav_loc" => hive__url(array("user", "group", false, false, false))));
			}
			if(hive__access($object, array("admin_user_session", "admin_user_superuser"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_user_session")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "session", 
												 "nav_loc" => hive__url(array("user", "session", false, false, false))));
			}
		}
		if(count($submenu) > 0) {
			array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_user")), 
											 "nav_img" => "account_box", 
											 "nav_sub" => $submenu, 
											 "nav_act" => "user", 
											 "nav_loc" => false));	
		}	
		
		// ---------------------------------------------------------------------------------------------------------------------	
		// Files	
		// ---------------------------------------------------------------------------------------------------------------------	
		$submenu = array();
		if(_ADM_S_FILE_ == 1) {
			if(hive__access($object, array("admin_file_list"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_file_list")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "list", 
												 "nav_loc" => hive__url(array("file", "list", false, false, false))));
			}
			if(hive__access($object, array("admin_file_public"), false)) {
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_file_public")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "public", 
												 "nav_loc" => hive__url(array("file", "public", false, false, false))));
			}				
			if(hive__access($object, array("admin_file_private"), false)) {
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_file_private")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "private", 
												 "nav_loc" => hive__url(array("file", "private", false, false, false))));	
			}					 
			if(hive__access($object, array("admin_file_php"), false)) {
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_file_php")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "php", 
												 "nav_loc" => hive__url(array("file", "php", false, false, false))));
			}							 
			if(hive__access($object, array("admin_file_css"), false)) {
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_file_css")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "css", 
												 "nav_loc" => hive__url(array("file", "css", false, false, false))));
			}							 
			if(hive__access($object, array("admin_file_js"), false)) {
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_file_js")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "js", 
												 "nav_loc" => hive__url(array("file", "js", false, false, false))));
			}
		}
		if(count($submenu) > 0) {
			array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_file")), 
											 "nav_img" => "perm_media", 
											 "nav_sub" => $submenu, 
											 "nav_act" => "file", 
											 "nav_loc" => false));	
		}		

		// ---------------------------------------------------------------------------------------------------------------------
		// Pages
		// ---------------------------------------------------------------------------------------------------------------------
		if(_ADM_S_PAGE_ == 1) {
			if(hive__access($object, array("admin_page"), false)) { 
				array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_page")), 
												 "nav_img" => "library_books", 
												 "nav_sub" => false, 
												 "nav_act" => "page", 
												 "nav_loc" => hive__url(array("page", false, false, false, false))));	
			}	
		}	

		// ---------------------------------------------------------------------------------------------------------------------
		// Object
		// ---------------------------------------------------------------------------------------------------------------------
		if(_ADM_S_OBJECT_ == 1) {
			if(hive__access($object, array("admin_object"), false)) { 
				array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_object")), 
												 "nav_img" => "category", 
												 "nav_sub" => false, 
												 "nav_act" => "object", 
												 "nav_loc" => hive__url(array("object", false, false, false, false))));	
			}	
		}		
	
		// ---------------------------------------------------------------------------------------------------------------------
		// Docker Area
		// ---------------------------------------------------------------------------------------------------------------------
		if(_ADM_S_DOCKER_ == 1) {
			if(hive__access($object, array("admin_docker"), false)) { 
				array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_docker")), 
												 "nav_img" => "sailing", 
												 "nav_sub" => false, 
												 "nav_act" => "docker", 
												 "nav_loc" => hive__url(array("docker", false, false, false, false))));	
			}	
		}		
	
		// ---------------------------------------------------------------------------------------------------------------------
		// Package Installations
		// ---------------------------------------------------------------------------------------------------------------------
		$submenu = array();
		if(_ADM_S_PACKAGE_ == 1) {
			if(hive__access($object, array("admin_package"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_package_store")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "store", 
												 "nav_loc" => hive__url(array("package", "store", false, false, false))));
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_package_upload")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "upload", 
												 "nav_loc" => hive__url(array("package", "upload", false, false, false))));			
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_package_site")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "site", 
												 "nav_loc" => hive__url(array("package", "site", false, false, false))));
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_package_image")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "image", 
												 "nav_loc" => hive__url(array("package", "image", false, false, false))));
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_package_extension")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "extension", 
												 "nav_loc" => hive__url(array("package", "extension", false, false, false))));
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_package_theme")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "theme", 
												 "nav_loc" => hive__url(array("package", "theme", false, false, false))));
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_package_docker")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "docker", 
												 "nav_loc" => hive__url(array("package", "docker", false, false, false))));
			}
		}
		if(count($submenu) > 0) {
			array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_package")), 
											 "nav_img" => "extension", 
											 "nav_sub" => $submenu, 
											 "nav_act" => "package", 
											 "nav_loc" => hive__url(array("package", false, false, false))));	
		}		
	
		// ---------------------------------------------------------------------------------------------------------------------
		// Deploy own Store
		// ---------------------------------------------------------------------------------------------------------------------
		$submenu = array();
		if(_ADM_S_DEPLOY_ == 1) {
			if(hive__access($object, array("admin_deploy_cms"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_deploy_cms")), 
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "cms", 
												 "nav_loc" => hive__url(array("deploy", "cms", false, false, false))));
			}
			if(hive__access($object, array("admin_deploy_software"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_deploy_software")),  
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "software", 
												 "nav_loc" => hive__url(array("deploy", "software", false, false, false))));
			}
			if(hive__access($object, array("admin_deploy_module"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_deploy_module")),  
												 "nav_img" => "", 
												 "nav_sub" => false, 
												 "nav_act" => "module", 
												 "nav_loc" => hive__url(array("deploy", "module", false, false, false))));
			}
		}
		if(count($submenu) > 0) {
			array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_deploy")), 
											 "nav_img" => "cloud_upload", 
											 "nav_sub" => $submenu, 
											 "nav_act" => "deploy", 
											 "nav_loc" => false));	
		}		
	
		// ---------------------------------------------------------------------------------------------------------------------
		// Developer
		// ---------------------------------------------------------------------------------------------------------------------		
		$submenu = array();
		if(_ADM_S_DEVELOPER_ == 1) {
			if(hive__access($object, array("admin_developer_const"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_developer_const")), "nav_sub" => false, "nav_loc" => hive__url(array("developer", "constants", false)), "nav_img" => "", "nav_act" => "constants" ));
			}	
			if(hive__access($object, array("admin_developer_db"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_developer_db")), "nav_sub" => false, "nav_loc" => hive__url(array("developer", "db", false)), "nav_img" => "", "nav_act" => "db" ));
			}	
			if(hive__access($object, array("admin_developer_init"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_developer_init")), "nav_sub" => false, "nav_loc" => hive__url(array("developer", "init", false)), "nav_img" => "", "nav_act" => "init" ));
			}	
			if(hive__access($object, array("admin_developer_mysql"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_developer_mysql")), "nav_sub" => false, "nav_loc" => hive__url(array("developer", "mysql", false)), "nav_img" => "", "nav_act" => "mysql" ));
			}	
			if(hive__access($object, array("admin_developer_curl"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_developer_curl")), "nav_sub" => false, "nav_loc" => hive__url(array("developer", "curl", false)), "nav_img" => "", "nav_act" => "curl" ));
			}	
			if(hive__access($object, array("admin_developer_benchmark"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_developer_benchmark")), "nav_sub" => false, "nav_loc" => hive__url(array("developer", "benchmark", false)), "nav_img" => "", "nav_act" => "benchmark" ));
			}	
			if(hive__access($object, array("admin_developer_referer"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_developer_referer")), "nav_sub" => false, "nav_loc" => hive__url(array("developer", "referer", false)), "nav_img" => "", "nav_act" => "referer" ));
			}	
			if(hive__access($object, array("admin_developer_visits"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_developer_visits")), "nav_sub" => false, "nav_loc" => hive__url(array("developer", "visits", false)), "nav_img" => "", "nav_act" => "visits" ));
			}	
			if(hive__access($object, array("admin_developer_js"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_developer_js")), "nav_sub" => false, "nav_loc" => hive__url(array("developer", "js", false)), "nav_img" => "", "nav_act" => "js" ));
			}	
			if(hive__access($object, array("admin_developer_mail"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_developer_mail")), "nav_sub" => false, "nav_loc" => hive__url(array("developer", "mail", false)), "nav_img" => "", "nav_act" => "mail" ));
			}	
			if(hive__access($object, array("admin_developer_php"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_developer_php")), "nav_sub" => false, "nav_loc" => hive__url(array("developer", "php", false)), "nav_img" => "", "nav_act" => "php" ));
			}	
			if(hive__access($object, array("admin_developer_worker"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_developer_worker")), "nav_sub" => false, "nav_loc" => hive__url(array("developer", "worker", false)), "nav_img" => "", "nav_act" => "worker" ));
			}	
			if(hive__access($object, array("admin_developer_cron"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_developer_cron")), "nav_sub" => false, "nav_loc" => hive__url(array("developer", "cron", false)), "nav_img" => "", "nav_act" => "cron" ));
			}	
			if(hive__access($object, array("admin_developer_logging"), false)) { 
				array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_developer_logging")), "nav_sub" => false, "nav_loc" => hive__url(array("developer", "logging", false)), "nav_img" => "", "nav_act" => "logging" ));
			}	
		}
		if(count($submenu) > 0) {
			array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_developer")), 
											 "nav_img" => "find_in_page", 
											 "nav_sub" => $submenu, 
											 "nav_act" => "developer", 
											 "nav_loc" => false));
		}		
		
		// ---------------------------------------------------------------------------------------------------------------------
		// System
		// ---------------------------------------------------------------------------------------------------------------------	
		$submenu = array();
		if(hive__access($object, array("admin_system_setup"), false)) { 
			array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_system_setup")), "nav_sub" => false, "nav_loc" => hive__url(array("system", "setup", false)), "nav_img" => "", "nav_act" => "setup" ));
		}	
		if(hive__access($object, array("admin_system_translation"), false)) { 
			array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_system_translation")), "nav_sub" => false, "nav_loc" => hive__url(array("system", "translation", false)), "nav_img" => "", "nav_act" => "translation" ));
		}	
		if(hive__access($object, array("admin_system_mailtpl"), false)) { 
			array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_system_mailtpl")), "nav_sub" => false, "nav_loc" => hive__url(array("system", "mailtemplates", false)), "nav_img" => "", "nav_act" => "mailtemplates" ));
		}	
		if(hive__access($object, array("admin_system_blacklist"), false)) { 
			array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_system_blacklist")), "nav_sub" => false, "nav_loc" => hive__url(array("system", "blacklist", false)), "nav_img" => "", "nav_act" => "blacklist" ));
		}	
		if(hive__access($object, array("admin_system_api"), false)) { 
			array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_system_api")), "nav_sub" => false, "nav_loc" => hive__url(array("system", "api", false)), "nav_img" => "", "nav_act" => "api" ));
		}	
		if(hive__access($object, array("admin_system_info"), false)) { 
			array_push($submenu, array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_system_info")), "nav_sub" => false, "nav_loc" => hive__url(array("system", "info", false)), "nav_img" => "", "nav_act" => "info" ));
		}	
		if(count($submenu) > 0) {
			array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_system")), 
											 "nav_img" => "settings_applications", 
											 "nav_sub" => $submenu, 
											 "nav_act" => "system", 
											 "nav_loc" => false));
		}		
	
		// ---------------------------------------------------------------------------------------------------------------------
		// Owner Imprint / Privacy
		// ---------------------------------------------------------------------------------------------------------------------		
		if(_ADM_S_IMPRESSUM_ == 1 OR _ADM_S_PRIVACY_ == 1) {
			if($object["user"]->user_loggedIn) {
				if(isset($_SESSION[_HIVE_SITE_COOKIE_."_nav_owner"])) {} else { $_SESSION[_HIVE_SITE_COOKIE_."_nav_owner"] = 1; } 
				if($_SESSION[_HIVE_SITE_COOKIE_."_nav_owner"]) { $tmpnav = " <span style='cursor:pointer;' onclick='hive_menu_switch($(this), \"owner\")'>(-)</span>"; } 
				else { $tmpnav = " <span style='cursor:pointer;' onclick='hive_menu_switch($(this), \"owner\")' class='hive_menu_switch_hide'>(+)</span>"; }
				array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_h_owner")).$tmpnav, 
											 "nav_header" => true)); }		
			if(_ADM_S_IMPRESSUM_ == 1) {							 
				array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_impressum")), "nav_img" => "contact_page", "nav_sub" => false, "nav_act" => "impressum", "nav_loc" => hive__url(array("impressum", false, false, false, false))));	
			}
			if(_ADM_S_PRIVACY_ == 1) {	
				array_push($object["nav"], array("nav_title" => hive__hsc($object["lang"]->translate("adm_nav_privacy")), "nav_img" => "admin_panel_settings", "nav_sub" => false, "nav_act" => "privacy", "nav_loc" => hive__url(array("privacy", false, false, false, false))));		
			}
		}	
	
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	## Language Setup Variable
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------			
	$lang_ar = array();
	$lang_ar[0]["current_ident"] = _HIVE_LANG_;
	$lang_ar[0]["current_img"] = _HIVE_URL_REL_."/_core/_vendor/country-flags-icons/png/"._HIVE_LANG_.".png";
	$lang_ar[0]["ident"] = "en";
	$lang_ar[0]["img"] = _HIVE_URL_REL_."/_core/_vendor/country-flags-icons/png/en.png";
	$lang_ar[0]["name"] = "English";
	$lang_ar[1]["ident"] = "de";
	$lang_ar[1]["img"] = _HIVE_URL_REL_."/_core/_vendor/country-flags-icons/png/de.png";
	$lang_ar[1]["name"] = "Deutsch";
	$lang_ar[2]["ident"] = "es";
	$lang_ar[2]["img"] = _HIVE_URL_REL_."/_core/_vendor/country-flags-icons/png/es.png";
	$lang_ar[2]["name"] = "Espanol";
	$lang_ar[3]["ident"] = "ja";
	$lang_ar[3]["img"] = _HIVE_URL_REL_."/_core/_vendor/country-flags-icons/png/ja.png";
	$lang_ar[3]["name"] = "日本語";	
	$lang_ar[4]["ident"] = "zh";
	$lang_ar[4]["img"] = _HIVE_URL_REL_."/_core/_vendor/country-flags-icons/png/zh.png";
	$lang_ar[4]["name"] = "中国人";	
	$lang_ar[5]["ident"] = "it";
	$lang_ar[5]["img"] = _HIVE_URL_REL_."/_core/_vendor/country-flags-icons/png/it.png";
	$lang_ar[5]["name"] = "Italiano ";	
	$lang_ar[6]["ident"] = "fr";
	$lang_ar[6]["img"] = _HIVE_URL_REL_."/_core/_vendor/country-flags-icons/png/fr.png";
	$lang_ar[6]["name"] = "Français";	
	$lang_ar[7]["ident"] = "pt";
	$lang_ar[7]["img"] = _HIVE_URL_REL_."/_core/_vendor/country-flags-icons/png/pt.png";
	$lang_ar[7]["name"] = "Português";	
	$lang_ar[8]["ident"] = "kr";
	$lang_ar[8]["img"] = _HIVE_URL_REL_."/_core/_vendor/country-flags-icons/png/kr.png";
	$lang_ar[8]["name"] = "한국어";	
	$lang_ar[9]["ident"] = "ru";
	$lang_ar[9]["img"] = _HIVE_URL_REL_."/_core/_vendor/country-flags-icons/png/ru.png";
	$lang_ar[9]["name"] = "Русский";	
	$lang_ar[10]["ident"] = "tr";
	$lang_ar[10]["img"] = _HIVE_URL_REL_."/_core/_vendor/country-flags-icons/png/tr.png";
	$lang_ar[10]["name"] = "Türkçe";	
	$lang_ar[11]["ident"] = "in";
	$lang_ar[11]["img"] = _HIVE_URL_REL_."/_core/_vendor/country-flags-icons/png/in.png";
	$lang_ar[11]["name"] = "हिन्दी";	
	define("_ADM_LANG_AR_", $lang_ar);

	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	## Restore Current Site Module Variable Information
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------		
	$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_);