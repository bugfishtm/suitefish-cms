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

	//////////////////////////////////////////////////////////////////////////////////////
	## General Header
	//////////////////////////////////////////////////////////////////////////////////////
	function adminbsb_header($object, $title = false) {
		
		//////////////////////////////////////////////////////////////////////////////////////	
		// Header Loaded Constant
		//////////////////////////////////////////////////////////////////////////////////////	
		if(defined("_ADM_HEADER_INITED_")) { return false; }
		define("_ADM_HEADER_INITED_", true);
		
		//////////////////////////////////////////////////////////////////////////////////////
		// Operations
		//////////////////////////////////////////////////////////////////////////////////////	
		// Get User Vars for Operation
		if($object["user"]->loggedIn) { 
			$user_variables = hive__user_key_get($object, $object["user"]->user_id, _HIVE_MODE_, "suitefish");
			if(!is_array($user_variables)) { $user_variables = array(); hive__user_key_set($object, $object["user"]->user_id, _HIVE_MODE_, "suitefish", $user_variables); }
		}
		// Language Selection
		if(_ADM_LANG_FORCE_ == 0) { 
			if(_ADM_LANG_CHOOSE_ == 1) { 
				$change_execute = false;
				if(@in_array(@$_GET["sf____change_lang"], _HIVE_LANG_ARRAY_)) { $change_execute = @$_GET["sf____change_lang"];  } 
				if($change_execute AND strlen($change_execute) < 64) {  
					if($object["user"]->user_loggedIn) {
						hive__user_lang_set($object, $object["user"]->user_id, _HIVE_MODE_, $change_execute);			
					} 
					$_SESSION[_HIVE_SITE_COOKIE_."hive_language"] = $change_execute; 
					$_SESSION[_HIVE_SITE_COOKIE_."admth_lang"] = $change_execute; 
					if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
					{$link = "https";} else {$link = "http";}
					$link .= "://";
					$link .= $_SERVER['HTTP_HOST'];
					$link .= $_SERVER['REQUEST_URI'];
					$link = substr($link, 0, strpos($link, "&sf____change_lang"));
					$object["eventbox"]->ok($object["lang"]->translate("admin_top_t_lang_changed"));
					Header("Location: ".$link);
					exit();			
				} 	
			} 	
		} 	
		// Choose Main Theme
		if(_ADM_TH_FORCE_ == 0) { 
			if(_ADM_TH_CHOOSE_ == 1) { 
				$change_execute = false;
				if(@$_GET["sf____change_theme"]) { $change_execute = @$_GET["sf____change_theme"]; } 
				if($change_execute AND strlen($change_execute) < 64) {
					if($object["user"]->user_loggedIn) {
						@$user_variables["theme"] = $change_execute;
						hive__user_key_set($object, $object["user"]->user_id, _HIVE_MODE_, "suitefish", $user_variables);
					}	
					$_SESSION[_HIVE_SITE_COOKIE_."admth_theme"] = $change_execute;
					unset($_SESSION[_HIVE_SITE_COOKIE_."admth_themesub"]);
					if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
					{$link = "https";} else {$link = "http";}
					$link .= "://";
					$link .= $_SERVER['HTTP_HOST'];
					$link .= $_SERVER['REQUEST_URI'];
					$link = substr($link, 0, strpos($link, "&sf____change_theme"));
					$object["eventbox"]->ok($object["lang"]->translate("admin_top_t_theme_changed"));
					Header("Location: ".$link);  
					exit();
				} 			
			} 			
		} 			
		// Choose Subselection Theme Sub
		if(_ADM_COLOR_FORCE_ == 0) { 
			if(_ADM_COLOR_CHOOSE_ == 1) { 
				$change_execute = false;
				if(@$_GET["sf____change_themesub"]) { $change_execute = @$_GET["sf____change_themesub"]; } 
				if($change_execute AND strlen($change_execute) < 64) {
					if($object["user"]->user_loggedIn) {
						@$user_variables["theme_sub"][_ADM_TH_] = $change_execute;
						hive__user_key_set($object, $object["user"]->user_id, _HIVE_MODE_, "suitefish", $user_variables);
					}	
					$_SESSION[_HIVE_SITE_COOKIE_."admth_themesub"] = $change_execute;
					if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
					{$link = "https";} else {$link = "http";}
					$link .= "://";
					$link .= $_SERVER['HTTP_HOST'];
					$link .= $_SERVER['REQUEST_URI'];
					$link = substr($link, 0, strpos($link, "&sf____change_themesub"));
					$object["eventbox"]->ok($object["lang"]->translate("admin_top_t_themesub_changed"));
					Header("Location: ".$link);  
					exit();
				} 		
			} 		
		} 	
		
		//////////////////////////////////////////////////////////////////////////////////////
		// Setup Topbar and Header 
		//////////////////////////////////////////////////////////////////////////////////////	
		// Language Selection
		if(_ADM_LANG_FORCE_ == 0) { 
			if(_ADM_LANG_CHOOSE_ == 1) { 
				if(_ADM_LANG_TB_ == 1) { 
					$object["ctheme"]["languages_array"] = _ADM_LANG_AR_;  
				} else { $object["ctheme"]["languages_array"] = false;  }
			} else { $object["ctheme"]["languages_array"] = false;  }
		} else { $object["ctheme"]["languages_array"] = false;  }
		// Profile Menue
		if(!$object["user"]->loggedIn) { $object["ctheme"]["pfm"] = false; }
		else { $object["ctheme"]["pfm"] = _ADM_NAV_PFM_; }
		// Allow Theme Choose?
		if(_ADM_TH_FORCE_ == 0) { 
			if(_ADM_TH_CHOOSE_ == 1) { 
				if(_ADM_TH_TB_ == 1) { 
					$object["ctheme"]["topbar_theme"] = true;  
				} else { $object["ctheme"]["topbar_theme"] = false;  }
			} else { $object["ctheme"]["topbar_theme"] = false;  }
		} else { $object["ctheme"]["topbar_theme"] = false;  }
		// Allow Theme Subselection Choose?
		if(_ADM_COLOR_FORCE_ == 0) { 
			if(_ADM_COLOR_CHOOSE_ == 1) { 
				if(_ADM_COLOR_TB_ == 1) { 
					$object["ctheme"]["topbar_themechange"] = true;  
				} else { $object["ctheme"]["topbar_themechange"] = false;  }
			} else { $object["ctheme"]["topbar_themechange"] = false;  }
		} else { $object["ctheme"]["topbar_themechange"] = false;  }
		
		//////////////////////////////////////////////////////////////////////////////////////
		// Notification Information
		//////////////////////////////////////////////////////////////////////////////////////
		if($object["user"]->loggedIn) {
			$object["ctheme"]["notifications"] = $object["mysql"]->select("SELECT alert_text, alert_url, fk_object_item, creation FROM "._TABLE_ALERT_." WHERE fk_user = ".$object["user"]->user_id." AND alert_read = 0 ORDER BY id DESC LIMIT 5", true);
			if(!is_array(@$object["ctheme"]["notifications"])) { 
				$object["ctheme"]["notifications"] = array(); 
			}
		}
		if(!@$object["ctheme"]["notifications"] AND !$object["user"]->loggedIn) { $object["ctheme"]["notifications"] = array(); }
		
		//////////////////////////////////////////////////////////////////////////////////////
		// Object Title
		//////////////////////////////////////////////////////////////////////////////////////	
		$object["ctheme"]["title"] = $title;

		//////////////////////////////////////////////////////////////////////////////////////
		// Init the Themes Header
		//////////////////////////////////////////////////////////////////////////////////////	
		sf__theme_start($object);		
	}		
