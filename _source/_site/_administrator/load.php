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
	*/ if(!is_array(@$object)) { http_response_code(404); Header("Location: ../"); exit(); }

	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// CookieBannerPre
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	x_cookieBanner_Pre(_HIVE_SITE_COOKIE_);			
			
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Load Required Page for Location
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	switch(_HIVE_URL_CUR_[0]) {		
	
		// -------------------------------------------------------------------------------------------------------------------------
		// Owner / Impressum
		// -------------------------------------------------------------------------------------------------------------------------
		case "impressum": 
			if(_ADM_S_IMPRESSUM_ == 1) {
				if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
				$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]);
				require_once(_HIVE_SITE_PATH_."/_html/owner/impressum.php"); 
			} else { if(!defined("_ADM_ERROR_404_")) { define("_ADM_ERROR_404_", 1); } }
		break;
		
		// -------------------------------------------------------------------------------------------------------------------------
		// Owner / Privacy
		// -------------------------------------------------------------------------------------------------------------------------
		case "privacy": 
			if(_ADM_S_PRIVACY_ == 1) {
				if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
				$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]);
				require_once(_HIVE_SITE_PATH_."/_html/owner/privacy.php"); 
			} else { if(!defined("_ADM_ERROR_404_")) { define("_ADM_ERROR_404_", 1); } }
		break;			
	
		// -------------------------------------------------------------------------------------------------------------------------
		// System			
		// -------------------------------------------------------------------------------------------------------------------------
		case "system":	
			if(hive__access($object, array("admin_system_setup"), false) AND _HIVE_URL_CUR_[1] == "setup") {
				if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
				$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/system/setup.php");
			}
			if(hive__access($object, array("admin_system_translation"), false) AND _HIVE_URL_CUR_[1] == "translation") {
				if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
				$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/system/translation.php");
			}	
			if(hive__access($object, array("admin_system_mailtpl"), false) AND _HIVE_URL_CUR_[1] == "mailtemplates") {
				if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
				$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/system/mailtemplates.php");
			}		
			if(hive__access($object, array("admin_system_blacklist"), false) AND _HIVE_URL_CUR_[1] == "blacklist") {
				if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
				$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/system/blacklist.php");
			}	
			if(hive__access($object, array("admin_system_api"), false) AND _HIVE_URL_CUR_[1] == "api") {
				if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
				$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/system/api.php");
			}		
			if(hive__access($object, array("admin_system_info"), false) AND _HIVE_URL_CUR_[1] == "info") {
				if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
				$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/system/info.php");
			}	
			if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) {
				if(!defined("_ADM_ERROR_401_")) { define("_ADM_ERROR_401_", 1); }
			}
		break;	
		
		// -------------------------------------------------------------------------------------------------------------------------
		// Developer			
		// -------------------------------------------------------------------------------------------------------------------------
		case "developer":	
			if(_ADM_S_DEVELOPER_ == 1) {		
				if(hive__access($object, array("admin_developer_const"), false) AND _HIVE_URL_CUR_[1] == "constants") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/developer/constants.php");
				}	
				if(hive__access($object, array("admin_developer_db"), false) AND _HIVE_URL_CUR_[1] == "db") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/developer/db.php");
				}			
				if(hive__access($object, array("admin_developer_init"), false) AND _HIVE_URL_CUR_[1] == "init") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/developer/init.php");
				}	
				if(hive__access($object, array("admin_developer_mysql"), false) AND _HIVE_URL_CUR_[1] == "mysql") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/developer/mysql.php");
				}	
				if(hive__access($object, array("admin_developer_curl"), false) AND _HIVE_URL_CUR_[1] == "curl") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/developer/curl.php");
				}	
				if(hive__access($object, array("admin_developer_benchmark"), false) AND _HIVE_URL_CUR_[1] == "benchmark") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/developer/benchmark.php");
				}		
				if(hive__access($object, array("admin_developer_referer"), false) AND _HIVE_URL_CUR_[1] == "referer") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/developer/referer.php");
				}		
				if(hive__access($object, array("admin_developer_visits"), false) AND _HIVE_URL_CUR_[1] == "visits") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/developer/visits.php");
				}	
				if(hive__access($object, array("admin_developer_js"), false) AND _HIVE_URL_CUR_[1] == "js") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/developer/js.php");
				}	
				if(hive__access($object, array("admin_developer_mail"), false) AND _HIVE_URL_CUR_[1] == "mail") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/developer/mail.php");
				}	
				if(hive__access($object, array("admin_developer_php"), false) AND _HIVE_URL_CUR_[1] == "php") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/developer/php.php");
				}	
				if(hive__access($object, array("admin_developer_worker"), false) AND _HIVE_URL_CUR_[1] == "worker") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/developer/worker.php");
				}	
				if(hive__access($object, array("admin_developer_cron"), false) AND _HIVE_URL_CUR_[1] == "cron") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/developer/cron.php");
				}		
				if(hive__access($object, array("admin_developer_logging"), false) AND _HIVE_URL_CUR_[1] == "logging") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/developer/logging.php");
				}		
			}
			if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) {
				if(!defined("_ADM_ERROR_401_")) { define("_ADM_ERROR_401_", 1); }
			}
		break;			
		
		// -------------------------------------------------------------------------------------------------------------------------
		// Deployment			
		// -------------------------------------------------------------------------------------------------------------------------
		case "deploy":	
			if(_ADM_S_DEPLOY_ == 1) {	
				if(hive__access($object, array("admin_deploy_cms"), false) AND _HIVE_URL_CUR_[1] == "cms") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/deploy/cms.php");
				}		
				if(hive__access($object, array("admin_deploy_software"), false) AND _HIVE_URL_CUR_[1] == "software") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/deploy/software.php");
				}		
				if(hive__access($object, array("admin_deploy_module"), false) AND _HIVE_URL_CUR_[1] == "module") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/deploy/module.php");
				}		
			}
			if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) {
				if(!defined("_ADM_ERROR_401_")) { define("_ADM_ERROR_401_", 1); }
			}			
		break;

		// -------------------------------------------------------------------------------------------------------------------------
		// Package			
		// -------------------------------------------------------------------------------------------------------------------------
		case "package":	
			if(_ADM_S_PACKAGE_ == 1) {	
				if(hive__access($object, array("admin_package"), false)) {
					if(_HIVE_URL_CUR_[1] == "store") {
						if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
						$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/package/store.php");
					}		
					if(_HIVE_URL_CUR_[1] == "upload") {
						if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
						$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/package/upload.php");
					}		
					if(_HIVE_URL_CUR_[1] == "site") {
						if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
						$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/package/site.php");
					}					
					if(_HIVE_URL_CUR_[1] == "image") {
						if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
						$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/package/image.php");
					}		
					if(_HIVE_URL_CUR_[1] == "extension") {
						if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
						$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/package/extension.php");
					}		
					if(_HIVE_URL_CUR_[1] == "theme") {
						if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
						$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/package/theme.php");
					}				
					if(_HIVE_URL_CUR_[1] == "docker") {
						if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
						$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/package/docker.php");
					}				
				}
			}
			if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) {
				if(!defined("_ADM_ERROR_401_")) { define("_ADM_ERROR_401_", 1); }
			}			
		break;

		// -------------------------------------------------------------------------------------------------------------------------
		// Docker			
		// -------------------------------------------------------------------------------------------------------------------------
		case "docker":	
			if(_ADM_S_DOCKER_ == 1) {	
				if(hive__access($object, array("admin_docker"), false)) {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]); require_once(_HIVE_SITE_PATH_."/_html/docker/docker.php");		
				}
			}
			if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) {
				if(!defined("_ADM_ERROR_401_")) { define("_ADM_ERROR_401_", 1); }
			}			
		break;

		// -------------------------------------------------------------------------------------------------------------------------
		// Object			
		// -------------------------------------------------------------------------------------------------------------------------
		case "object":	
			if(_ADM_S_OBJECT_ == 1) {	
				if(hive__access($object, array("admin_object"), false)) {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]); require_once(_HIVE_SITE_PATH_."/_html/object/object.php");		
				}
			}
			if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) {
				if(!defined("_ADM_ERROR_401_")) { define("_ADM_ERROR_401_", 1); }
			}			
		break;

		// -------------------------------------------------------------------------------------------------------------------------
		// Page			
		// -------------------------------------------------------------------------------------------------------------------------
		case "page":	
			if(_ADM_S_PAGE_ == 1) {	
				if(hive__access($object, array("admin_page"), false)) {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]); require_once(_HIVE_SITE_PATH_."/_html/page/page.php");		
				}
			}
			if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) {
				if(!defined("_ADM_ERROR_401_")) { define("_ADM_ERROR_401_", 1); }
			}			
		break;

		// -------------------------------------------------------------------------------------------------------------------------
		// Files			
		// -------------------------------------------------------------------------------------------------------------------------
		case "file":	
			if(_ADM_S_FILE_ == 1) {	
				if(hive__access($object, array("admin_file_list"), false) AND _HIVE_URL_CUR_[1] == "list") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/file/list.php");
				}		
				if(hive__access($object, array("admin_file_public"), false) AND _HIVE_URL_CUR_[1] == "public") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/file/public.php");
				}		
				if(hive__access($object, array("admin_file_private"), false) AND _HIVE_URL_CUR_[1] == "private") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/file/private.php");
				}		
				if(hive__access($object, array("admin_file_php"), false) AND _HIVE_URL_CUR_[1] == "php") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/file/php.php");
				}		
				if(hive__access($object, array("admin_file_css"), false) AND _HIVE_URL_CUR_[1] == "css") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/file/css.php");
				}		
				if(hive__access($object, array("admin_file_js"), false) AND _HIVE_URL_CUR_[1] == "js") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/file/js.php");
				}		
			}
			if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) {
				if(!defined("_ADM_ERROR_401_")) { define("_ADM_ERROR_401_", 1); }
			}			
		break;
		
		// -------------------------------------------------------------------------------------------------------------------------
		// Files			
		// -------------------------------------------------------------------------------------------------------------------------
		case "user":	
			if(_ADM_S_USER_ == 1) {	
				if(hive__access($object, array("admin_user_user"), false) AND _HIVE_URL_CUR_[1] == "user") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/user/user.php");
				}		
				if(hive__access($object, array("admin_user_field"), false) AND _HIVE_URL_CUR_[1] == "field") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/user/field.php");
				}	
				if(hive__access($object, array("admin_user_group"), false) AND _HIVE_URL_CUR_[1] == "group") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/user/group.php");
				}	
				if(hive__access($object, array("admin_user_session"), false) AND _HIVE_URL_CUR_[1] == "session") {
					if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
					$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]._HIVE_URL_CUR_[1]); require_once(_HIVE_SITE_PATH_."/_html/user/session.php");
				}		
			}
			if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) {
				if(!defined("_ADM_ERROR_401_")) { define("_ADM_ERROR_401_", 1); }
			}			
		break;

		// -------------------------------------------------------------------------------------------------------------------------
		// Admin Dashboard Page		
		// -------------------------------------------------------------------------------------------------------------------------
		case "admin": 
			if(hive__access($object, array("admin_admin"), false)) {		
				if(!defined("_HIVE_INT_LOAD_VL_FOUND_")) { define("_HIVE_INT_LOAD_VL_FOUND_", true); }
				$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]);
				require_once(_HIVE_SITE_PATH_."/_html/admin/admin.php"); 
			} else { if(!defined("_ADM_ERROR_401_")) { define("_ADM_ERROR_401_", 1); } }
		break;			
			

		// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Non-Structural Items	
		// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------			
	
		// -------------------------------------------------------------------------------------------------------------------------
		// login_reset			
		// -------------------------------------------------------------------------------------------------------------------------
		case "login_reset": if($object["user"]->loggedIn) { if($object["user"]->login_as_is()) {
				$object["user"]->login_as_return();
				$object["eventbox"]->ok($object["lang"]->translate("event_operation_success"));			
				Header("Location: ./"); exit();
			} else { Header("Location: ./"); exit(); } } else { Header("Location: ./"); exit(); }  break;	

		// -------------------------------------------------------------------------------------------------------------------------
		// Logout			
		// -------------------------------------------------------------------------------------------------------------------------	
		case "logout": Header("Location: ./_user/user_logout.php"); exit(); break;

		// -------------------------------------------------------------------------------------------------------------------------
		// Login			
		// -------------------------------------------------------------------------------------------------------------------------
		case "login": if(!$object["user"]->loggedIn) { $object["lang"]->translate("string_login"); if(!defined("_ADM_ERROR_401_")) { define("_ADM_ERROR_401_", 1); } } else { Header("Location: ./"); exit(); } break;	

		// -------------------------------------------------------------------------------------------------------------------------
		// Alert Page			
		// -------------------------------------------------------------------------------------------------------------------------
		case "alert": 	
			if($object["user"]->loggedIn) {
				$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]);
				require_once(_HIVE_SITE_PATH_."/_html/alert/alert.php"); 
			} else { if(!defined("_ADM_ERROR_401_")) { define("_ADM_ERROR_401_", 1); } }
		break;			
		
		// -------------------------------------------------------------------------------------------------------------------------
		// Profile Page (Privilegues and checks in File)				
		// -------------------------------------------------------------------------------------------------------------------------	
		case "profile": 	
			$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]);
			require_once(_HIVE_SITE_PATH_."/_html/profile/profile.php"); 
		break;
		
		// -------------------------------------------------------------------------------------------------------------------------
		// First Page and Message Loadup
		// -------------------------------------------------------------------------------------------------------------------------
		case false: case "": 
			$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"); 
			if(defined("ADM_INTERNAL_STARTLOCATION")) { 
				Header("Location: ".ADM_INTERNAL_STARTLOCATION."");
				exit();
			} else {
				require_once(_HIVE_SITE_PATH_."/_html/_fallback/welcome.php"); 
			} 
		break;	 
		
		// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Default and Injection/WFC handler	
		// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		default: 		

			// -------------------------------------------------------------------------------------------------------------------------
			// Extensions - Site (Privilegues in File)			
			// -------------------------------------------------------------------------------------------------------------------------	
			if(substr(_HIVE_URL_CUR_[0], 0, 4) == "smd_") {
				$have_one_included = false;
				foreach (_HIVE_MODE_ARRAY_ as $filename) { 
					if(substr(_HIVE_URL_CUR_[0], 4) == basename($filename)) { 
						if (file_exists($object["path"]."/_site/".basename($filename)."/_admin/mod_site.php")) {
							$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]); 
							$object["hive_mode_config"] = hive__init_site_header($object, basename($filename));						
							require($object["path"]."/_site/".$filename."/_admin/mod_site.php");
							$have_one_included = true;
						}
					}
				} 
				if(!$have_one_included) {  if(!defined("_ADM_ERROR_404_")) { define("_ADM_ERROR_404_", 1); } }
			}		
			
			// -------------------------------------------------------------------------------------------------------------------------
			// Extensions - Extension (Privilegues in File)	
			// -------------------------------------------------------------------------------------------------------------------------
			elseif(substr(_HIVE_URL_CUR_[0], 0, 4) == "ext_") { 
				$have_one_included = false;
				foreach ($object["extensions_path"] as $filename) 
					if(substr(_HIVE_URL_CUR_[0], 4) == basename($filename)) {
						if (file_exists($filename."/_admin/mod_site.php")) { { 
							$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_"._HIVE_URL_CUR_[0]); 
							$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_);	
							$object["extension"] = hive__init_extension_header($object, basename($filename));
							require($filename."/_admin/mod_site.php");
							$have_one_included = true;
						}
					}
				} unset($object["extension"]);	
				if(!$have_one_included) {  if(!defined("_ADM_ERROR_404_")) { define("_ADM_ERROR_404_", 1); } }			
			} 

			// -------------------------------------------------------------------------------------------------------------------------
			// WFC - Pages for Public and Private (May include Listings and Links to Object Pages)
			// -------------------------------------------------------------------------------------------------------------------------
			elseif(substr(_HIVE_URL_CUR_[0], 0, 4) == "wfc_") {
				require_once(_HIVE_SITE_PATH_."/_html/_generic/wfc.php");
			}

			// -------------------------------------------------------------------------------------------------------------------------
			// WFC - Object (Privilegues in File, Every Handling in External File)	
			// -------------------------------------------------------------------------------------------------------------------------
			elseif(substr(_HIVE_URL_CUR_[0], 0, 4) == "obj_") {	
				require_once(_HIVE_SITE_PATH_."/_html/_generic/object.php");
			}

			// -------------------------------------------------------------------------------------------------------------------------
			// Error 404 if nothing found.
			// -------------------------------------------------------------------------------------------------------------------------
			else { if(!defined("_ADM_ERROR_404_")) { define("_ADM_ERROR_404_", 1); } }
			
	};

	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Show Pages if Init Constant is Set
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	if(defined("_ADM_ERROR_404_")) {
		$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_index_404");
		require_once(_HIVE_SITE_PATH_."/_html/_fallback/404.php"); 
	} elseif(defined("_ADM_ERROR_401_") AND !$object["user"]->loggedIn) {
		$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_index_login");
		require_once(_HIVE_SITE_PATH_."/_html/_fallback/login.php"); 
	} elseif(defined("_ADM_ERROR_401_") AND $object["user"]->loggedIn) {
		$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."admsc_index_401");
		require_once(_HIVE_SITE_PATH_."/_html/_fallback/401.php"); 
	} 
		
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Show EventBox Classes Objects if required
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	$object["eventbox"]->show($object["lang"]->translate("string_close"));
		
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Show Cookiebanner if required
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	x_cookieBanner(_HIVE_SITE_COOKIE_, true, $object["lang"]->translate("adm_cb_text"), false, false, $object["lang"]->translate("string_confirm"));
		
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Display Footer and End Website
	// -------------------------------------------------------------------------------------------------------------------------------------------------------------------
	echo sf__theme_end($object);