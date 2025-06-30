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
			CMS Initialization File. This file will make all required validations, verifications
			and set all variables and constants as they are required. It also will include required library
			files and load extensions configuration and mysql files. MySQL Core and Site Module Files will
			be installed automatically if Table Name related to MySQL Init File Name does not exist.
			
	*/ if(!is_array(@$object) OR !is_array($mysql)) { @http_response_code(503); echo "Error [c2]: Your settings.php file is corrupted or has not been included before including initialize.php."; exit(); }	

	#################################################################################################################################################
	// Do not allow twice include of initialization
	#################################################################################################################################################
		if(defined("_HIVE_INIT_INCLUDED_")) {
			@http_response_code(503); echo "Error [c3]: You are not allowed to include initialize.php twice."; exit();
		} else {
			define("_HIVE_INIT_INCLUDED_", true);
		}
		
	#################################################################################################################################################
	// Check PHP Version
	#################################################################################################################################################
		if (PHP_VERSION_ID >= 80300 && PHP_VERSION_ID < 90000) {
		} else {
			@http_response_code(503); echo "Error [c4]: You need PHP version higher or equal than 8.3 and lower than 9.0 to run this software. You are currently running: ".PHP_VERSION.""; exit();
		}			
	
	#################################################################################################################################################
	// Check if website root folder is writeable
	#################################################################################################################################################	
		if (!is_writable($object["path"])) {
			@http_response_code(503); echo "Error [c5]: The document root is not writeable. Please set correct permission and ownerships for the website document root or corrent \$object['path'] in settings.php."; exit();
		}		

	#################################################################################################################################################
	// Stacktrace Init Variable
	#################################################################################################################################################
		if(!is_array(@$object["loadup"])) { $object["loadup"] = array(); }
		if(!is_array(@$object["loadup"]["stack"])) { $object["loadup"]["stack"] = array(); }


	#################################################################################################################################################
	// Function to output current Stack
	#################################################################################################################################################
		function hive___stackecho($stackarray) {
			if(defined("_HIVE_DEBUG_STACKTRACE_")) { if(_HIVE_DEBUG_STACKTRACE_) { echo end($stackarray)["text"]."<br />"; } }
		}
	
	#################################################################################################################################################
	// Ruleset-cfg [xxxx110]
	#################################################################################################################################################	
		array_push($object["loadup"]["stack"], array("text" => "------- Area for including Ruleset [xxxx110]"));
		hive___stackecho($object["loadup"]["stack"]);	
		// Include Ruleset
		//////////////////////////////////////////////////////////////
		if(file_exists(@$object["path"]."/cfg_ruleset.php")) { 
			require_once($object["path"]."/cfg_ruleset.php"); 
			array_push($object["loadup"]["stack"], array("text" => "File Include: '".$object["path"]."/cfg_ruleset.php"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		} 		
		// Stacktrace Switch
		//////////////////////////////////////////////////////////////
		if(!defined("_HIVE_DEBUG_STACKTRACE_")) { 
			define("_HIVE_DEBUG_STACKTRACE_", false); 
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEBUG_STACKTRACE_' fallback to '".@serialize(@_HIVE_DEBUG_STACKTRACE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEBUG_STACKTRACE_' set by cfg_ruleset.php or before to '".@serialize(@_HIVE_DEBUG_STACKTRACE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}		
		// Stacktrace Opener
		//////////////////////////////////////////////////////////////	
			array_push($object["loadup"]["stack"], array("text" => "-------------------------------------------------------------------------------------"));
			hive___stackecho($object["loadup"]["stack"]);
			array_push($object["loadup"]["stack"], array("text" => "SUITEFISH CMS STACKTRACE (start at: ".date("Y-m-d H:i:s").")"));
			hive___stackecho($object["loadup"]["stack"]);
			array_push($object["loadup"]["stack"], array("text" => "-------------------------------------------------------------------------------------"));
			hive___stackecho($object["loadup"]["stack"]);
			array_push($object["loadup"]["stack"], array("text" => "YOU CAN DISABLE STACKTRACE IN /CFG_RULESET.PHP"));
			hive___stackecho($object["loadup"]["stack"]);
			array_push($object["loadup"]["stack"], array("text" => "ITS NOT RECOMMENDED TO ACTIVATE STACKTRACE ON A PUBLIC SERVER"));
			hive___stackecho($object["loadup"]["stack"]);
			array_push($object["loadup"]["stack"], array("text" => "THIS MAY TAKES YOUR DATA AT RISK"));
			hive___stackecho($object["loadup"]["stack"]);
			array_push($object["loadup"]["stack"], array("text" => "-------------------------------------------------------------------------------------"));
			hive___stackecho($object["loadup"]["stack"]);
		// Administrator Switch to Site Functionality
		//////////////////////////////////////////////////////////////
		if(!@$hive_mode_default) { 
			$hive_mode_default = "_administrator";
			define('_HIVE_ADMIN_SITE_', "_administrator");
			array_push($object["loadup"]["stack"], array("text" => "'administrative_page' fallback to '".@serialize(@$administrative_page)."'"));
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ADMIN_SITE_' fallback to '".@serialize(@$administrative_page)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		} else {
			define('_HIVE_ADMIN_SITE_',   $administrative_page);
			array_push($object["loadup"]["stack"], array("text" => "'administrative_page' set by cfg_ruleset.php or before to '".@serialize(@$administrative_page)."'"));
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ADMIN_SITE_' set by cfg_ruleset.php or before to '".@serialize(@$administrative_page)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		} unset($administrative_page);		
		// Set default Hive Mode if not Set
		//////////////////////////////////////////////////////////////
		if(!@$hive_mode_default) { 
			$hive_mode_default = "_administrator";
			array_push($object["loadup"]["stack"], array("text" => "'hive_mode_default' fallback to '".@serialize(@$hive_mode_default)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'hive_mode_default' set by cfg_ruleset.php or before to '".@serialize(@$hive_mode_default)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}		
		// Set Override Switch
		//////////////////////////////////////////////////////////////
		if(!@$hive_mode_override) { 
			$hive_mode_override = false;
			define("_HIVE_MOD_OVR_", false);	
			array_push($object["loadup"]["stack"], array("text" => "'hive_mode_override' fallback to '".@serialize(@$hive_mode_override)."'"));
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_MOD_OVR_' fallback to '".@serialize(@$hive_mode_override)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		} else {
			define("_HIVE_MOD_OVR_", $hive_mode_override);	
			array_push($object["loadup"]["stack"], array("text" => "'hive_mode_override' set by cfg_ruleset.php or before to '".@serialize(@$hive_mode_override)."'"));
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_MOD_OVR_' set by cfg_ruleset.php or before to '".@serialize(@$hive_mode_override)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}
		// Override Upgrader/Updater Access Code
		//////////////////////////////////////////////////////////////
		if(!defined("_UPDATER_CODE_OVR_")) { 
			array_push($object["loadup"]["stack"], array("text" => "'_UPDATER_CODE_OVR_' not yet defined."));
			hive___stackecho($object["loadup"]["stack"]);
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_UPDATER_CODE_OVR_' set by cfg_ruleset.php or before to ****REDACTED****'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		// Set Cookie Domain if set in cfg_ruleset.php
		//////////////////////////////////////////////////////////////
		if(!defined("_HIVE_COOKIE_DOMAIN_")) { 
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_COOKIE_DOMAIN_' fallback to default"));
			hive___stackecho($object["loadup"]["stack"]);
		} else {
			ini_set('session.cookie_domain', _HIVE_COOKIE_DOMAIN_);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_COOKIE_DOMAIN_' set by cfg_ruleset.php or before to '".@serialize(@_HIVE_COOKIE_DOMAIN_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		// Set PHP Errors Log Path on Start if not defined
		// Set PHP Errors Output on Start if not defined
		//////////////////////////////////////////////////////////////
		if(!defined("_HIVE_PHP_LOG_PATH_")) { 
			define("_HIVE_PHP_LOG_PATH_", false); 
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PHP_LOG_PATH_' fallback to '".@serialize(@_HIVE_PHP_LOG_PATH_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PHP_LOG_PATH_' set by cfg_ruleset.php or before to '".@serialize(@_HIVE_PHP_LOG_PATH_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		if(!defined("_HIVE_PHP_DISPLAY_ERROR_ON_START_")) { 
			define("_HIVE_PHP_DISPLAY_ERROR_ON_START_", 0); 
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PHP_DISPLAY_ERROR_ON_START_' fallback to '".@serialize(@_HIVE_PHP_DISPLAY_ERROR_ON_START_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PHP_DISPLAY_ERROR_ON_START_' set by cfg_ruleset.php or before to '".@serialize(@_HIVE_PHP_DISPLAY_ERROR_ON_START_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}			
		// Define Site Block Default Variable
		//////////////////////////////////////////////////////////////
		if(!defined("_HIVE_BLOCK_FP_")) { 
			define("_HIVE_BLOCK_FP_", false); 
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_BLOCK_FP_' fallback to '".@serialize(@_HIVE_BLOCK_FP_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_BLOCK_FP_' set by cfg_ruleset.php or before to '".@serialize(@_HIVE_BLOCK_FP_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}					 
		// Set Primary Store URL
		//////////////////////////////////////////////////////////////
		if(!defined("_HIVE_SERVER_")) { 
			define("_HIVE_SERVER_", "https://suitefish.com"); 
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SERVER_' fallback to '".@serialize(@_HIVE_SERVER_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SERVER_' set by cfg_ruleset.php or before to '".@serialize(@_HIVE_SERVER_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}			
		// Installer Variable
		//////////////////////////////////////////////////////////////
		if(!defined("_INSTALLER_TITLE_")) { 
			define("_INSTALLER_TITLE_", "Suitefish"); 
			array_push($object["loadup"]["stack"], array("text" => "'_INSTALLER_TITLE_' fallback to '".@serialize(@_INSTALLER_TITLE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_INSTALLER_TITLE_' set by cfg_ruleset.php or before to '".@serialize(@_INSTALLER_TITLE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		if(!defined("_INSTALLER_COOKIE_")) { 
			define("_INSTALLER_COOKIE_", "sf_"); 
			array_push($object["loadup"]["stack"], array("text" => "'_INSTALLER_COOKIE_' fallback to '".@serialize(@_INSTALLER_COOKIE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_INSTALLER_COOKIE_' set by cfg_ruleset.php or before to '".@serialize(@_INSTALLER_COOKIE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		if(!defined("_INSTALLER_PREFIX_")) { 
			define("_INSTALLER_PREFIX_", "sf_"); 
			array_push($object["loadup"]["stack"], array("text" => "'_INSTALLER_PREFIX_' fallback to '".@serialize(@_INSTALLER_PREFIX_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_INSTALLER_PREFIX_' set by cfg_ruleset.php or before to '".@serialize(@_INSTALLER_PREFIX_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		if(!defined("_INSTALLER_CODE_")) { 
			define("_INSTALLER_CODE_", false); 
			array_push($object["loadup"]["stack"], array("text" => "'_INSTALLER_CODE_' fallback to '".@serialize(@_INSTALLER_CODE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_INSTALLER_CODE_' set by cfg_ruleset.php or before to '".@serialize(@_INSTALLER_CODE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		// Currently not implemented, maybe in the future.
		//////////////////////////////////////////////////////////////
		// Set fetch Site modules by URL Array	
		// **Automatic Site Mode by URL**:
		// - Enables automatic selection of a site module based on the requested URL.
		// - Default value: `false` (disables this feature).
		// - Example configuration: 
		//   `array(array("url" => "x.domain", "mode" => "xdomainmod"), ...)`
		// Uncomment and adjust the following line to use:
		// define("_HIVE_MOD_FETCH_", false);
		if(!defined("_HIVE_MOD_FETCH_")) 						{ 
			define('_HIVE_MOD_FETCH_',   false); 
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_MOD_FETCH_' fallback to '".@serialize(@_HIVE_MOD_FETCH_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_MOD_FETCH_' set by cfg_ruleset.php or before to '".@serialize(@_HIVE_MOD_FETCH_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		// Currently not implemented, maybe in the future.
		//////////////////////////////////////////////////////////////
		// Array of Site Modes to Switch to and Force use only of them.
		// **Allowed Site Modules**:
		// - Restrict the CMS to only allow certain site modules.
		// - Default value: `false`.
		// Uncomment and adjust the following line to use:
		// $hive_mode_array = array("modname1", "modname2", "modname3");
		if(!is_array(@$hive_mode_array)) 						{ $hive_mode_array = false; }		
		
	#################################################################################################################################################
	// Init Docker Variables [xxxx112]
	#################################################################################################################################################	
		array_push($object["loadup"]["stack"], array("text" => "------- Area for Docker Variable Checkup [xxxx112]"));
		hive___stackecho($object["loadup"]["stack"]);
		if(!defined("_HIVE_IS_IN_DOCKER_")) { 
			define("_HIVE_IS_IN_DOCKER_", false); 
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_IS_IN_DOCKER_' fallback to false"));
			hive___stackecho($object["loadup"]["stack"]);
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_IS_IN_DOCKER_' has been set before to '".@serialize(@_HIVE_IS_IN_DOCKER_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}
		
	#################################################################################################################################################
	// Include Error Page Library File [xxxx111]
	#################################################################################################################################################
		array_push($object["loadup"]["stack"], array("text" => "------- Area for including Error Template Lib File [xxxx111]"));
		hive___stackecho($object["loadup"]["stack"]);	
		array_push($object["loadup"]["stack"], array("text" => "File Include: '"."/_core/_lib/lib.init.error.php"."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		require_once($object["path"]."/_core/_lib/lib.init.error.php");			
		
	#################################################################################################################################################
	// PHP Error Logging Functionality [xxxx109]
	#################################################################################################################################################	
		array_push($object["loadup"]["stack"], array("text" => "------- Area for including Bugfish Framework [xxxx109]"));
		hive___stackecho($object["loadup"]["stack"]);	
		error_reporting(E_ALL); 
		ini_set('log_errors', TRUE);
		if(defined("_HIVE_PHP_LOG_PATH_")) { if(_HIVE_PHP_LOG_PATH_) { 
			ini_set('error_log',_HIVE_PHP_LOG_PATH_);
			array_push($object["loadup"]["stack"], array("text" => "PHP configuration: 'error_log' is now '"._HIVE_PHP_LOG_PATH_."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} }
		if(defined("_HIVE_PHP_DISPLAY_ERROR_ON_START_")) { 
			ini_set('display_errors', _HIVE_PHP_DISPLAY_ERROR_ON_START_); 
			array_push($object["loadup"]["stack"], array("text" => "PHP configuration: 'display_errors' is now '"._HIVE_PHP_DISPLAY_ERROR_ON_START_."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else { 
			ini_set('display_errors', 0); 
			array_push($object["loadup"]["stack"], array("text" => "PHP configuration: 'display_errors' is fallback now '0'"));
			hive___stackecho($object["loadup"]["stack"]);	
		}	
	
	#################################################################################################################################################
	// Bugfish Framework [xxxx108]
	#################################################################################################################################################	
		array_push($object["loadup"]["stack"], array("text" => "------- Area for including Bugfish Framework [xxxx108]"));
		hive___stackecho($object["loadup"]["stack"]);	
		require_once($object["path"]."/_core/_framework/classes/x_class_2fa.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_2fa.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_api.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_api.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_benchmark.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_benchmark.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_block.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_block.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_comment.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_comment.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_crypt.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_crypt.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_csrf.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_csrf.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_curl.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_curl.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_debug.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_debug.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_eventbox.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_eventbox.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_hitcounter.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_hitcounter.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_ipbl.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_ipbl.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_lang.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_lang.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_log.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_log.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_mail.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_mail.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_mail_item.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_mail_item.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_mail_phpmailer.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_mail_phpmailer.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_mail_template.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_mail_template.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_mysql.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_mysql.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_mysql_item.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_mysql_item.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_perm.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_perm.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_perm_item.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_perm_item.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_redis.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_redis.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_referer.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_referer.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_table.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_table.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_user.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_user.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_var.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_var.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_version.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_version.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/classes/x_class_zip.php");	
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/classes/x_class_zip.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/functions/x_button.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/functions/x_button.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/functions/x_captcha.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/functions/x_captcha.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/functions/x_cookiebanner.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/functions/x_cookiebanner.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/functions/x_curl.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/functions/x_curl.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/functions/x_eventbox.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/functions/x_eventbox.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/functions/x_library.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/functions/x_library.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/functions/x_rss.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/functions/x_rss.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/functions/x_search.php");
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/functions/x_search.php".""));
			hive___stackecho($object["loadup"]["stack"]);
		require_once($object["path"]."/_core/_framework/functions/x_table.php");		
			array_push($object["loadup"]["stack"], array("text" => "File Include: ".$object["path"]."/_core/_framework/functions/x_table.php".""));
			hive___stackecho($object["loadup"]["stack"]);
	
	#################################################################################################################################################
	// Init Debug Class [xxxx107]
	#################################################################################################################################################		
		array_push($object["loadup"]["stack"], array("text" => "------- Area init Debug Class [xxxx107]"));
		hive___stackecho($object["loadup"]["stack"]);	
		array_push($object["loadup"]["stack"], array("text" => "'object[debug]' is now object of 'x_class_debug'"));
		hive___stackecho($object["loadup"]["stack"]);	
		$object["debug"] = new x_class_debug();
	
	#################################################################################################################################################
	// Check for missing PHP Modules [xxxx106]
	#################################################################################################################################################	
		array_push($object["loadup"]["stack"], array("text" => "------- Area for checking php modules [xxxx106]"));
		hive___stackecho($object["loadup"]["stack"]);	
		if(!$object["debug"]->required_php_module("mysqli", false)) {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Not Found: mysqli (debug)"));
			hive___stackecho($object["loadup"]["stack"]);	
			array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
			hive___stackecho($object["loadup"]["stack"]);
			hive__error("Critical Error", "[000-001] A PHP Module is missing: 'mysqli'. Please install the required PHP Module.", "", true, 503);
			exit();
		} else {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Found: mysqli (debug)"));
			hive___stackecho($object["loadup"]["stack"]);					
		}			
		if(!$object["debug"]->required_php_module("xml", false)) {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Not Found: xml (debug)"));
			hive___stackecho($object["loadup"]["stack"]);	
			array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
			hive___stackecho($object["loadup"]["stack"]);
			hive__error("Critical Error", "[000-001] A PHP Module is missing: 'xml'. Please install the required PHP Module.", "", true, 503);
			exit();
		} else {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Found: xml (debug)"));
			hive___stackecho($object["loadup"]["stack"]);					
		}			
		if(!$object["debug"]->required_php_module("mbstring", false)) {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Not Found: mbstring (debug)"));
			hive___stackecho($object["loadup"]["stack"]);	
			array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
			hive___stackecho($object["loadup"]["stack"]);
			hive__error("Critical Error", "[000-001] A PHP Module is missing: 'mbstring'. Please install the required PHP Module.", "", true, 503);
			exit();
		} else {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Found: mbstring (debug)"));
			hive___stackecho($object["loadup"]["stack"]);					
		}	
		if(!$object["debug"]->required_php_module("curl", false)) {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Not Found: curl (debug)"));
			hive___stackecho($object["loadup"]["stack"]);	
			array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
			hive___stackecho($object["loadup"]["stack"]);
			hive__error("Critical Error", "[000-001] A PHP Module is missing: 'curl'. Please install the required PHP Module.", "", true, 503);
			exit();
		} else {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Found: curl (debug)"));
			hive___stackecho($object["loadup"]["stack"]);					
		}		
		if(!$object["debug"]->required_php_module("zip", false)) {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Not Found: zip (debug)"));
			hive___stackecho($object["loadup"]["stack"]);	
			array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
			hive___stackecho($object["loadup"]["stack"]);
			hive__error("Critical Error", "[000-001] A PHP Module is missing: 'zip'. Please install the required PHP Module.", "", true, 503);
			exit();
		} else {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Found: zip (debug)"));
			hive___stackecho($object["loadup"]["stack"]);					
		}			
		if(!$object["debug"]->required_php_module("intl", false)) {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Not Found: intl (debug)"));
			hive___stackecho($object["loadup"]["stack"]);	
			array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
			hive___stackecho($object["loadup"]["stack"]);
			hive__error("Critical Error", "[000-001] A PHP Module is missing: 'intl'. Please install the required PHP Module.", "", true, 503);
			exit();
		} else {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Found: intl (debug)"));
			hive___stackecho($object["loadup"]["stack"]);					
		}				
		if(!$object["debug"]->required_php_module("fileinfo", false)) {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Not Found: fileinfo (debug)"));
			hive___stackecho($object["loadup"]["stack"]);	
			array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
			hive___stackecho($object["loadup"]["stack"]);
			hive__error("Critical Error", "[000-001] A PHP Module is missing: 'fileinfo'. Please install the required PHP Module.", "", true, 503);
			exit();
		} else {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Found: fileinfo (debug)"));
			hive___stackecho($object["loadup"]["stack"]);					
		}					
		if(!$object["debug"]->required_php_module("gd", false)) {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Not Found: gd (debug)"));
			hive___stackecho($object["loadup"]["stack"]);	
			array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
			hive___stackecho($object["loadup"]["stack"]);
			hive__error("Critical Error", "[000-001] A PHP Module is missing: 'gd'. Please install the required PHP Module.", "", true, 503);
			exit();
		} else {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Found: gd (debug)"));
			hive___stackecho($object["loadup"]["stack"]);					
		}					
		if(!$object["debug"]->required_php_module("bcmath", false)) {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Not Found: bcmath (debug)"));
			hive___stackecho($object["loadup"]["stack"]);	
			array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
			hive___stackecho($object["loadup"]["stack"]);
			hive__error("Critical Error", "[000-001] A PHP Module is missing: 'bcmath'. Please install the required PHP Module.", "", true, 503);
			exit();
		} else {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Found: bcmath (debug)"));
			hive___stackecho($object["loadup"]["stack"]);					
		}						
		/*if(!$object["debug"]->required_php_module("pdo_mysql", false)) {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Not Found: pdo_mysql (debug)"));
			hive___stackecho($object["loadup"]["stack"]);	
			array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
			hive___stackecho($object["loadup"]["stack"]);
			hive__error("Critical Error", "[000-001] A PHP Module is missing: 'pdo_mysql'. Please install the required PHP Module.", "", true, 503);
			exit();
		} else {
			array_push($object["loadup"]["stack"], array("text" => "PHP Module Found: pdo_mysql (debug)"));
			hive___stackecho($object["loadup"]["stack"]);					
		}*/										
	
	#################################################################################################################################################
	// Start a session php [xxxx105]
	#################################################################################################################################################
		array_push($object["loadup"]["stack"], array("text" => "------- Area for starting php session [xxxx105]"));
		hive___stackecho($object["loadup"]["stack"]);	
		@session_start();	
	
	#################################################################################################################################################
	// Table Constants [xxxx104]
	#################################################################################################################################################	
		array_push($object["loadup"]["stack"], array("text" => "------- Area for setup Table Constants [xxxx104]"));
		hive___stackecho($object["loadup"]["stack"]);	
		$object["prefix"]						= @$mysql["prefix"];
			array_push($object["loadup"]["stack"], array("text" => "'object[\"prefix\"]' set to '".@$mysql["prefix"]."' from mysql[prefix]"));
			hive___stackecho($object["loadup"]["stack"]);
		// Default Table Constants - Classes Auto-Creation
		define("_TABLE_LOG_", 				$object["prefix"]."cms_log");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_LOG_' set to '".$object["prefix"]."cms_log"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_LOG_IP_", 			$object["prefix"]."cms_log_ip");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_LOG_IP_' set to '".$object["prefix"]."cms_log_ip"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_LOG_BENCHMARK_", 	$object["prefix"]."cms_log_benchmark");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_LOG_BENCHMARK_' set to '".$object["prefix"]."cms_log_benchmark"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_LOG_CURL_", 			$object["prefix"]."cms_log_curl");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_LOG_CURL_' set to '".$object["prefix"]."cms_log_curl"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_LOG_MAIL_", 			$object["prefix"]."cms_log_mail");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_LOG_MAIL_' set to '".$object["prefix"]."cms_log_mail"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_LOG_MYSQL_", 		$object["prefix"]."cms_log_mysql");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_LOG_MYSQL_' set to '".$object["prefix"]."cms_log_mysql"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_LOG_REFERER_", 		$object["prefix"]."cms_log_referer");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_LOG_REFERER_' set to '".$object["prefix"]."cms_log_referer"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_LOG_CRON_", 			$object["prefix"]."cms_log_cron");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_LOG_CRON_' set to '".$object["prefix"]."cms_log_cron"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_LOG_JS_", 			$object["prefix"]."cms_log_js");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_LOG_JS_' set to '".$object["prefix"]."cms_log_js"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_LOG_VISIT_", 		$object["prefix"]."cms_log_hitcounter");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_LOG_VISIT_' set to '".$object["prefix"]."cms_log_hitcounter"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_LOG_API_", 		$object["prefix"]."cms_log_api");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_LOG_API_' set to '".$object["prefix"]."cms_log_api"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		// Default Table Constants - Classes Auto-Creation
		define("_TABLE_USER_", 				$object["prefix"]."cms_user");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_USER_' set to '".$object["prefix"]."cms_user"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_USER_EXTRAFIELDS_", 	$object["prefix"]."cms_user_extrafield");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_USER_EXTRAFIELDS_' set to '".$object["prefix"]."cms_user_extrafield"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_USER_SESSION_",		$object["prefix"]."cms_user_session");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_USER_SESSION_' set to '".$object["prefix"]."cms_user_session"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_USER_PERM_",			$object["prefix"]."cms_user_perm");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_USER_PERM_' set to '".$object["prefix"]."cms_user_perm"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_USER_GROUP_",		$object["prefix"]."cms_group");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_USER_GROUP_' set to '".$object["prefix"]."cms_group"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_USER_GROUP_PERM_",	$object["prefix"]."cms_group_perm");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_USER_GROUP_PERM_' set to '".$object["prefix"]."cms_group_perm"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_USER_GROUP_LINK_",	$object["prefix"]."cms_group_link");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_USER_GROUP_LINK_' set to '".$object["prefix"]."cms_group_link"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		// Default Table Constants - Classes Auto-Creation
		define("_TABLE_VAR_", 				$object["prefix"]."cms_var");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_VAR_' set to '".$object["prefix"]."cms_var"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_LANG_",				$object["prefix"]."cms_lang");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_LANG_' set to '".$object["prefix"]."cms_lang"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_MAIL_TPL_",			$object["prefix"]."cms_mail_tpl");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_MAIL_TPL_' set to '".$object["prefix"]."cms_mail_tpl"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_COMMENT_", 			$object["prefix"]."cms_comment");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_COMMENT_' set to '".$object["prefix"]."cms_comment"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_API_",				$object["prefix"]."cms_api");	
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_API_' set to '".$object["prefix"]."cms_api"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_API_PERM_",			$object["prefix"]."cms_api_perm");	
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_API_PERM_' set to '".$object["prefix"]."cms_api_perm"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		// Tables for Store and Token Access to Modules - Installed out of _core/_mysql folder!
		define("_TABLE_STORE_", 			$object["prefix"]."cms_store");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_STORE_' set to '".$object["prefix"]."cms_store"."'"));
			hive___stackecho($object["loadup"]["stack"]);
		define("_TABLE_WORKER_", 			$object["prefix"]."cms_worker");
			array_push($object["loadup"]["stack"], array("text" => "'_TABLE_WORKER_' set to '".$object["prefix"]."cms_worker"."'"));
			hive___stackecho($object["loadup"]["stack"]);
	
	#################################################################################################################################################
	// Init some default variables [xxxx103]
	#################################################################################################################################################
		array_push($object["loadup"]["stack"], array("text" => "------- Area for setting some default global variables [xxxx103]"));
		hive___stackecho($object["loadup"]["stack"]);		
		define("_HIVE_CREATOR_", 				'Powered by Suitefish-CMS');	
		array_push($object["loadup"]["stack"], array("text" => "'_HIVE_CREATOR_' is now '".'Powered by Suitefish-CMS'."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		define("_HIVE_PREFIX_", 				@$mysql["prefix"]);
		array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PREFIX_' is now '".@$mysql["prefix"]."' from mysql[prefix]"));
		hive___stackecho($object["loadup"]["stack"]);	
		define("_HIVE_COOKIE_", 				@$object["cookie"]);
		array_push($object["loadup"]["stack"], array("text" => "'_HIVE_COOKIE_' is now '".@$object["cookie"]."' from object[cookie]"));
		hive___stackecho($object["loadup"]["stack"]);	
		define("_HIVE_PATH_", 					@$object["path"]);	
		array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PATH_' is now '".@$object["path"]."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		define("_HIVE_PATH_API_", 				@$object["path"]."/_api/");	
		array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PATH_API_' is now '".@$object["path"]."/_api/"."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		define("_HIVE_PATH_BACKUP_", 			@$object["path"]."/_backup/");	
		array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PATH_BACKUP_' is now '".@$object["path"]."/_backup/"."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		define("_HIVE_PATH_DATA_", 				@$object["path"]."/_data/");
		array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PATH_DATA_' is now '".@$object["path"]."/_data/"."'"));
		hive___stackecho($object["loadup"]["stack"]);		
		define("_HIVE_PATH_STORE_", 			@$object["path"]."/_store/");
		array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PATH_STORE_' is now '".@$object["path"]."/_store/"."'"));
		hive___stackecho($object["loadup"]["stack"]);		
		define("_HIVE_PATH_CACHE_", 			@$object["path"]."/_cache/");	
		array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PATH_CACHE_' is now '".@$object["path"]."/_cache/"."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		define("_HIVE_PATH_SITE_", 				@$object["path"]."/_site/");	
		array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PATH_SITE_' is now '".@$object["path"]."/_site/"."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		define("_HIVE_PATH_SITE_OFF_", 			@$object["path"]."/_site/__disabled/");	
		array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PATH_SITE_OFF_' is now '".@$object["path"]."/_site/__disabled/"."'"));	
		hive___stackecho($object["loadup"]["stack"]);	
		define("_HIVE_PATH_IMAGE_", 			@$object["path"]."/_image/");	
		array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PATH_IMAGE_' is now '".@$object["path"]."/_image/"."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		define("_HIVE_PATH_IMAGE_OFF_", 		@$object["path"]."/_image/__disabled/");	
		array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PATH_IMAGE_OFF_' is now '".@$object["path"]."/_image/__disabled/"."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		define("_HIVE_PATH_TPL_", 				@$object["path"]."/_template/");	
		array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PATH_TPL_' is now '".@$object["path"]."/_template/"."'"));
		hive___stackecho($object["loadup"]["stack"]);	

	#################################################################################################################################################
	// Get Current Core Data [xxxx102]
	#################################################################################################################################################	
		array_push($object["loadup"]["stack"], array("text" => "------- Area for Getting Core Information Data [xxxx102]"));
		hive___stackecho($object["loadup"]["stack"]);
		array_push($object["loadup"]["stack"], array("text" => "File Include: '"."/_core/version.php"."'"));
		hive___stackecho($object["loadup"]["stack"]);
		require($object["path"]."/_core/version.php");
		$object["core_mode"] = $x;
		unset($x);		
		array_push($object["loadup"]["stack"], array("text" => "Core Information: '".@serialize(@$object["core_mode"])."'"));
		hive___stackecho($object["loadup"]["stack"]);

	#################################################################################################################################################
	// Include Internal Functions Libraries [xxxx101]
	#################################################################################################################################################	
		array_push($object["loadup"]["stack"], array("text" => "------- Area for CMS Library Includes [xxxx101]"));
		hive___stackecho($object["loadup"]["stack"]);
		array_push($object["loadup"]["stack"], array("text" => "File Include: '"."/_core/_lib/lib.init.default.php"."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		require_once($object["path"]."/_core/_lib/lib.init.default.php");		
		array_push($object["loadup"]["stack"], array("text" => "File Include: '"."/_core/_lib/lib.init.download.php"."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		require_once($object["path"]."/_core/_lib/lib.init.download.php");			
		array_push($object["loadup"]["stack"], array("text" => "File Include: '"."/_core/_lib/lib.init.error.php"."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		require_once($object["path"]."/_core/_lib/lib.init.error.php");			
		array_push($object["loadup"]["stack"], array("text" => "File Include: '"."/_core/_lib/lib.init.library.php"."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		require_once($object["path"]."/_core/_lib/lib.init.library.php");			
		array_push($object["loadup"]["stack"], array("text" => "File Include: '"."/_core/_lib/lib.init.template.php"."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		require_once($object["path"]."/_core/_lib/lib.init.template.php");				
		array_push($object["loadup"]["stack"], array("text" => "File Include: '"."/_core/_lib/lib.init.trigger.php"."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		require_once($object["path"]."/_core/_lib/lib.init.trigger.php");	
		array_push($object["loadup"]["stack"], array("text" => "File Include: '"."/_core/_lib/lib.init.user.php"."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		require_once($object["path"]."/_core/_lib/lib.init.user.php");		
		array_push($object["loadup"]["stack"], array("text" => "File Include: '"."/_core/_lib/lib.init.inject.php"."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		require_once($object["path"]."/_core/_lib/lib.init.inject.php");				
		array_push($object["loadup"]["stack"], array("text" => "File Include: '"."/_core/_lib/lib.init.worker.php"."'"));
		hive___stackecho($object["loadup"]["stack"]);	
		require_once($object["path"]."/_core/_lib/lib.init.worker.php");			

	#################################################################################################################################################
	// Fix Folder Structure [xxxx100]
	#################################################################################################################################################	
		array_push($object["loadup"]["stack"], array("text" => "------- Area for CMS Folder Creation [xxxx100]"));
		hive___stackecho($object["loadup"]["stack"]);
		hive__folder_create($object["path"]."/_template", true, true);
		hive__folder_create($object["path"]."/_store", true, false);
		hive__folder_create($object["path"]."/_store/software", true, false);
		hive__folder_create($object["path"]."/_store/module", true, false);
		hive__folder_create($object["path"]."/_store/cms", true, false);
		hive__folder_create($object["path"]."/_data", true, false);
		hive__folder_create($object["path"]."/_backup", true, true);
		hive__folder_create($object["path"]."/_cache", true, false);
		hive__folder_create($object["path"]."/_image", true, false);
		hive__folder_create($object["path"]."/_image/__disabled", true, true);
		hive__folder_create($object["path"]."/_site", true, false);
		hive__folder_create($object["path"]."/_site/__disabled", true, true);	

	#################################################################################################################################################
	// Switch preparations between Public Script with Hive Mode Initializations and Non-Initialized Mode Initialization [xxxx200]
	#################################################################################################################################################	
		array_push($object["loadup"]["stack"], array("text" => "------- Area for Setting up Prevent Init Selection [xxxx200]"));
		hive___stackecho($object["loadup"]["stack"]);
		if(!defined("_HIVE_PREVENT_INIT_")) { 
			define("_HIVE_PREVENT_INIT_", false); 
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PREVENT_INIT_' fallback to false"));
			hive___stackecho($object["loadup"]["stack"]);		
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PREVENT_INIT_' is already set to '".@serialize(@_HIVE_PREVENT_INIT_)."'"));
			hive___stackecho($object["loadup"]["stack"]);		
		}

	#################################################################################################################################################
	// Switch between Public Script with Hive Mode Initializations and Non-Initialized Mode Initialization
	#################################################################################################################################################		
		if(!_HIVE_PREVENT_INIT_) {

			#################################################################################################################################################
			// Load WITH Site Module Specific Setup [xxxx300]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "------- Area for Initializing Site Module Relative Data [xxxx300]"));
				hive___stackecho($object["loadup"]["stack"]);
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PREVENT_INIT_' is false!"));
				hive___stackecho($object["loadup"]["stack"]);	
				
			#################################################################################################################################################
			// Hive Mode Determine [xxxx301]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Area for Determine Hive Mode [xxxx301]"));
				hive___stackecho($object["loadup"]["stack"]);
				if(!defined("_HIVE_OVR_PRE_SETTING_MODE_")) { 
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_OVR_PRE_SETTING_MODE_' is undefined"));
					hive___stackecho($object["loadup"]["stack"]);
					// Get Default Hive mode if not overrided.
					if($hive_mode_override) { 
						define("_HIVE_MODE_DEFAULT_", $hive_mode_override); 
						array_push($object["loadup"]["stack"], array("text" => "'$hive_mode_override' is active for '".$hive_mode_override."'"));
						hive___stackecho($object["loadup"]["stack"]);
					} else { define("_HIVE_MODE_DEFAULT_", $hive_mode_default); } unset($hive_mode_default);
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_MODE_DEFAULT_' is now '"._HIVE_MODE_DEFAULT_."'"));
					hive___stackecho($object["loadup"]["stack"]);
					// Determine Current Hive Mode Array if override is active
					// if $hive_mode_array is set than determine HIVE MODE ARRAY
					if($hive_mode_override) { if(_HIVE_ADMIN_SITE_) {define("_HIVE_MODE_ARRAY_", array($hive_mode_override, _HIVE_ADMIN_SITE_));} else {define("_HIVE_MODE_ARRAY_", array($hive_mode_override));} } 
						elseif(@is_array(@$hive_mode_array)) { if(_HIVE_ADMIN_SITE_) { array_push($hive_mode_array, _HIVE_ADMIN_SITE_); define("_HIVE_MODE_ARRAY_", $hive_mode_array);} else {define("_HIVE_MODE_ARRAY_", $hive_mode_array);} } 
					// If no override is in place detrermine hive move array
					if(!$hive_mode_override) {	
						$directory = $object["path"]."/_site";
						$folders = array();
						if (is_dir($directory)) {
							$contents = scandir($directory);
							foreach ($contents as $item) {
								$itemPath = $directory . '/' . $item;
								if (is_dir($itemPath) && !in_array($item, array('.', '..', '__disabled'))) {
									$folders[] = $item;
								}
								unset($itemPath);
							} unset($item);
						} 
						if(_HIVE_ADMIN_SITE_) {
							define("_HIVE_MODE_ARRAY_", $folders); 
						} else {
							if (($key = array_search(_HIVE_ADMIN_SITE_, $folders)) !== false) { 
								unset($folders[$key]);
							} define("_HIVE_MODE_ARRAY_", $folders);
						} 	 
					} unset($hive_mode_array); unset($directory); unset($folders); unset($contents); unset($key);	
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_MODE_ARRAY_' is now '".@serialize(_HIVE_MODE_ARRAY_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
					// Set default Hive Mode if non Set
					if(!isset($_SESSION[_HIVE_COOKIE_."hive_mode"])) { @$_SESSION[_HIVE_COOKIE_."hive_mode"] = _HIVE_MODE_DEFAULT_; }	
					// Restore default mode if old is not active anymore.
					if(@is_string(@$_SESSION[_HIVE_COOKIE_."hive_mode"]) AND  @in_array(@$_SESSION[_HIVE_COOKIE_."hive_mode"], @_HIVE_MODE_ARRAY_)) {
					} else {  
						$_SESSION[_HIVE_COOKIE_."hive_mode"] = _HIVE_MODE_DEFAULT_;
					}		
					// Determine Site Module by URL
					if(is_array(_HIVE_MOD_FETCH_) AND !$hive_mode_override) {
						$found_new = false;
						$found_url = false;
						if(is_array(_HIVE_MOD_FETCH_)) { 
							foreach(_HIVE_MOD_FETCH_ as $key => $value) {
								if( strpos($_SERVER['HTTP_HOST'], $value["url"]) > -1)  {
									$found_new = $value["mode"];		
									$found_url = $value["url"];		
								}					
							}
						}
						if(!$found_new) { 
							array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
							hive___stackecho($object["loadup"]["stack"]);
							hive__error("Critical Error", "[040-001] Site Mode could not be determined by URL!", "Please check your dynamic site mode by domain settings in the administrator interface or at cfg_ruleset.php.", true, 503); 
							exit();
						}
						else {
							$_SESSION[_HIVE_COOKIE_."hive_mode"] = $found_new;
							define("_HIVE_URL_", $found_url."/");
							array_push($object["loadup"]["stack"], array("text" => "'_HIVE_URL_' is now '"._HIVE_URL_."'"));
							hive___stackecho($object["loadup"]["stack"]);
						}
					}		
					// Override _HIVE_MODE_ if $hive_mode_override
					if($hive_mode_override AND $_SESSION[_HIVE_COOKIE_."hive_mode"] != $hive_mode_override) {
						if(_HIVE_ADMIN_SITE_ AND $_SESSION[_HIVE_COOKIE_."hive_mode"] == _HIVE_ADMIN_SITE_) {
						} elseif(!_HIVE_ADMIN_SITE_ AND $_SESSION[_HIVE_COOKIE_."hive_mode"] == _HIVE_ADMIN_SITE_) {
							$_SESSION[_HIVE_COOKIE_."hive_mode"] = $hive_mode_override;
						} else {
							$_SESSION[_HIVE_COOKIE_."hive_mode"] = $hive_mode_override;
						}
					} unset($hive_mode_override);  
					// Check for Hive Mode per SetEnv Apache 2 Variable 
					$ovr_hive_mode_getenv = @getenv("_HIVE_MODE_ENV_OVR_"); 
					if(strlen($ovr_hive_mode_getenv) > 0 AND trim($ovr_hive_mode_getenv ?? '') != "") { 
						if(@in_array($ovr_hive_mode_getenv, _HIVE_MODE_ARRAY_)) {
							array_push($object["loadup"]["stack"], array("text" => "'_HIVE_MODE_ENV_OVR_' apache setenv is '"._HIVE_MODE_ENV_OVR_."'"));
							hive___stackecho($object["loadup"]["stack"]);
							$_SESSION[_HIVE_COOKIE_."hive_mode"] = $ovr_hive_mode_getenv;
						} else { 
							array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
							hive___stackecho($object["loadup"]["stack"]);
							hive__error("Critical Error", "[040-002] A Site Module is missing, which has been overrided by Apache2 Environment Variables!", "You have set the Apache2 Environment Variable: '_HIVE_MODE_ENV_OVR_' to '".@htmlspecialchars($ovr_hive_mode_getenv ?? '')."', but this site module does not exist. Please fix the Environment Variable Value to fit a valid site module!", true, 503);
							exit();
						}
					} unset($ovr_hive_mode_getenv);
					// Set Hive Mode Variables and Stack Trace
					define("_HIVE_MODE_", $_SESSION[_HIVE_COOKIE_."hive_mode"]);
					array_push($object["loadup"]["stack"], array("text" => "'_SESSION[_HIVE_COOKIE_.\"hive_mode\"]' is now '".@$_SESSION[_HIVE_COOKIE_."hive_mode"]."'"));
					hive___stackecho($object["loadup"]["stack"]);
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_MODE_' is now '".@$_SESSION[_HIVE_COOKIE_."hive_mode"]."'"));
					hive___stackecho($object["loadup"]["stack"]);
					define("_HIVE_OVR_PRE_SETTING_MODE_", $_SESSION[_HIVE_COOKIE_."hive_mode"]);
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_OVR_PRE_SETTING_MODE_' is now '".@$_SESSION[_HIVE_COOKIE_."hive_mode"]."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_OVR_PRE_SETTING_MODE_' is defined"));
					hive___stackecho($object["loadup"]["stack"]);
					// Directory For Site Modules
					$directory = $object["path"]."/_site";
					$folders = array();
					if (is_dir($directory)) {
						$contents = scandir($directory);
						foreach ($contents as $item) {
							$itemPath = $directory . '/' . $item;
							if (is_dir($itemPath) && !in_array($item, array('.', '..', '__disabled'))) {
								$folders[] = $item;
								array_push($object["loadup"]["stack"], array("text" => "'_HIVE_MODE_ARRAY_' filled with found site module: '".$item."'"));
								hive___stackecho($object["loadup"]["stack"]);
							}
							unset($itemPath);
						} unset($item);
					} define("_HIVE_MODE_ARRAY_", $folders);
					if(@in_array(_HIVE_OVR_PRE_SETTING_MODE_, _HIVE_MODE_ARRAY_)) {
						define("_HIVE_MODE_", _HIVE_OVR_PRE_SETTING_MODE_);
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_MODE_' filled with '_HIVE_OVR_PRE_SETTING_MODE_' is now '"._HIVE_OVR_PRE_SETTING_MODE_."'"));
						hive___stackecho($object["loadup"]["stack"]);
					} else { 
						array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
						hive___stackecho($object["loadup"]["stack"]);
						hive__error("Critical Error", "[040-003] An error ooccured while trying to view this script using an external site module '".@htmlspecialchars(_HIVE_OVR_PRE_SETTING_MODE_ ?? '')."'.", "Please check the status of the site module which causes this error in the administrator interface.", true, 503);
						exit();
					}	
				}

			#################################################################################################################################################
			// Hive Mode Path Variables [xxxx302]
			#################################################################################################################################################
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Area for Determine Hive Mode Constants [xxxx302]"));
				hive___stackecho($object["loadup"]["stack"]);					
				define('_HIVE_SITE_COOKIE_', 					_HIVE_COOKIE_."_"._HIVE_MODE_."_");	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_COOKIE_' is now '".@serialize(@_HIVE_SITE_COOKIE_)."'"));
				hive___stackecho($object["loadup"]["stack"]);		
				define('_HIVE_SITE_PREFIX_', 					_HIVE_PREFIX_."_"._HIVE_MODE_."_");	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PREFIX_' is now '".@serialize(@_HIVE_SITE_PREFIX_)."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_SITE_PATH_CACHE_', 				$object["path"]."/_cache/"._HIVE_MODE_."/");	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PATH_CACHE_' is now '".@serialize(@_HIVE_SITE_PATH_CACHE_)."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_SITE_PATH_BACKUP_', 				$object["path"]."/_backup/"._HIVE_MODE_."/");
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PATH_BACKUP_' is now '".@serialize(@_HIVE_SITE_PATH_BACKUP_)."'"));
				hive___stackecho($object["loadup"]["stack"]);		
				define('_HIVE_SITE_PATH_', 						$object["path"]."/_site/"._HIVE_MODE_."/");	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PATH_' is now '".@serialize(@_HIVE_SITE_PATH_)."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_SITE_PATH_DATA_', 				$object["path"]."/_data/"._HIVE_MODE_."/");
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PATH_DATA_' is now '".@serialize(@_HIVE_SITE_PATH_DATA_)."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_SITE_PATH_DKR_', 					$object["path"]."/_data/"._HIVE_MODE_."/_docker/");	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PATH_DKR_' is now '".@serialize(@_HIVE_SITE_PATH_DKR_)."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_SITE_PATH_DKR_TPL_', 				$object["path"]."/_data/"._HIVE_MODE_."/_docker-tpl/");	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PATH_DKR_TPL_' is now '".@serialize(@_HIVE_SITE_PATH_DKR_TPL_)."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_SITE_PATH_EXT_', 					$object["path"]."/_data/"._HIVE_MODE_."/_extension/");	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PATH_EXT_' is now '".@serialize(@_HIVE_SITE_PATH_EXT_)."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_SITE_PATH_EXT_DATA_PUBLIC_', 		$object["path"]."/_data/"._HIVE_MODE_."/_extension-public/");	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PATH_EXT_DATA_PUBLIC_' is now '".@serialize(@_HIVE_SITE_PATH_EXT_DATA_PUBLIC_)."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_SITE_PATH_EXT_DATA_PRIVATE_', 	$object["path"]."/_data/"._HIVE_MODE_."/_extension-private/");	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PATH_EXT_DATA_PRIVATE_' is now '".@serialize(@_HIVE_SITE_PATH_EXT_DATA_PRIVATE_)."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_SITE_PATH_EXT_OFF_', 				$object["path"]."/_data/"._HIVE_MODE_."/_extension-disabled/");	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PATH_EXT_OFF_' is now '".@serialize(@_HIVE_SITE_PATH_EXT_OFF_)."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_SITE_PATH_META_', 				$object["path"]."/_data/"._HIVE_MODE_."/_meta/");	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PATH_META_' is now '".@serialize(@_HIVE_SITE_PATH_META_)."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_SITE_PATH_PHP_', 					$object["path"]."/_data/"._HIVE_MODE_."/_php/");	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PATH_PHP_' is now '".@serialize(@_HIVE_SITE_PATH_PHP_)."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_SITE_PATH_PUBLIC_', 				$object["path"]."/_data/"._HIVE_MODE_."/_public/");	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PATH_PUBLIC_' is now '".@serialize(@_HIVE_SITE_PATH_PUBLIC_)."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_SITE_PATH_PRIVATE_', 				$object["path"]."/_data/"._HIVE_MODE_."/_private/");	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PATH_PRIVATE_' is now '".@serialize(@_HIVE_SITE_PATH_PRIVATE_)."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_SITE_PATH_TH_', 					$object["path"]."/_data/"._HIVE_MODE_."/_theme/");	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PATH_TH_' is now '".@serialize(@_HIVE_SITE_PATH_TH_)."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_SITE_PATH_TH_OFF_', 				$object["path"]."/_data/"._HIVE_MODE_."/_theme/__disabled/");		
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_PATH_TH_OFF_' is now '".@serialize(@_HIVE_SITE_PATH_TH_OFF_)."'"));
				hive___stackecho($object["loadup"]["stack"]);	

			#################################################################################################################################################
			// Check Current Site Mode Versioning File [xxxx303]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Area for get Hive Module Versions File [xxxx303]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(file_exists($object["path"]."/_site/"._HIVE_MODE_."/version.php") AND trim(_HIVE_MODE_ ?? '') != "") { 
					require($object["path"]."/_site/"._HIVE_MODE_."/version.php");
					$object["hive_mode"] = $x;
					if(!is_array($object["hive_mode"])) { 
						define("_HIVE_INTERNAL_INIT_ERROR_", true); 
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_INIT_ERROR_' is now '1'"));
						hive___stackecho($object["loadup"]["stack"]);	
						array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!!!!!!!! FAILED TO GET SITE MODULES VERSION.PHP INFORMATION"));
						hive___stackecho($object["loadup"]["stack"]);	
					}
					unset($x);
				} else {
					define("_HIVE_INTERNAL_INIT_ERROR_", true); 
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_INIT_ERROR_' is now '1'"));
					hive___stackecho($object["loadup"]["stack"]);	
					$object["hive_mode"] = false;
					unset($_SESSION[_HIVE_COOKIE_."hive_mode"]);
					array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!!!!!!!! FAILED TO GET SITE MODULES VERSION.PHP FILE"));
					hive___stackecho($object["loadup"]["stack"]);	
				}					
				if(trim(_HIVE_MODE_ ?? '') == "") { 
					if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) { 
						define("_HIVE_INTERNAL_INIT_ERROR_", true);  
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_INIT_ERROR_' is now '1'"));
						hive___stackecho($object["loadup"]["stack"]);							
					} 
					array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!!!!!!!! FAILED TO GET HIVE MODE IS EMPTY ''"));
					hive___stackecho($object["loadup"]["stack"]);
				}

			#################################################################################################################################################
			// Create Site Module Folder Structure (if no internal hive mode error)  [xxxx304]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Area for creating site module folders [xxxx304]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) {
					hive__folder_create(_HIVE_SITE_PATH_CACHE_, true, false);
					hive__folder_create(_HIVE_SITE_PATH_BACKUP_, true, false);
					hive__folder_create(_HIVE_SITE_PATH_DATA_, true, false);
					hive__folder_create(_HIVE_SITE_PATH_DKR_, true, true);
					hive__folder_create(_HIVE_SITE_PATH_DKR_TPL_, true, true);
					hive__folder_create(_HIVE_SITE_PATH_EXT_, true, false);
					hive__folder_create(_HIVE_SITE_PATH_EXT_DATA_PUBLIC_, true, false);
					hive__folder_create(_HIVE_SITE_PATH_EXT_DATA_PRIVATE_, true, true);
					hive__folder_create(_HIVE_SITE_PATH_EXT_OFF_, true, true);
					hive__folder_create(_HIVE_SITE_PATH_META_, true, false);
					hive__folder_create(_HIVE_SITE_PATH_PHP_, true, true);
					hive__folder_create(_HIVE_SITE_PATH_PUBLIC_, true, false);
					hive__folder_create(_HIVE_SITE_PATH_PRIVATE_, true, true);
					hive__folder_create(_HIVE_SITE_PATH_TH_, true, false);
					hive__folder_create(_HIVE_SITE_PATH_TH_OFF_, true, true);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!!!!!!!! SKIPPED ON ERROR"));
					hive___stackecho($object["loadup"]["stack"]);
				}					

			#################################################################################################################################################
			// Load Extension Pathes (if no internal hive mode error) [xxxx305]
			#################################################################################################################################################
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Area for getting current Modules extension pathes [xxxx305]"));
				hive___stackecho($object["loadup"]["stack"]);					
				if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) { 	
					$object["extensions_path"] = hive__extension_path(_HIVE_MODE_); 
				} else { 
					array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!!!!!!!! SKIPPED ON ERROR"));
					hive___stackecho($object["loadup"]["stack"]);		
					$object["extensions_path"] = array(); 
				}

			#################################################################################################################################################
			// Load Extension and Site Modules Versioning Information [xxxx306]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Fill Pre Configured Variables with Version info of all Site modules and current modules extensions [xxxx306]"));
				hive___stackecho($object["loadup"]["stack"]);		
				if(is_array(_HIVE_MODE_ARRAY_)) {
					foreach(_HIVE_MODE_ARRAY_ as $k => $v) {
						if(file_exists($object["path"]."/_site/".$v."/version.php")) { 
							$object["hive_mode_config_pre"]["site"][$v] = hive__require_x($object["path"]."/_site/".$v."/version.php");
							array_push($object["loadup"]["stack"], array("text" => "Site Module Found: '".$object["path"]."/_site/".$v."/version.php"."'"));
							hive___stackecho($object["loadup"]["stack"]);
						}
					}
				}
				if(is_array($object["extensions_path"])) {
					foreach($object["extensions_path"] as $k => $v) {
						if(file_exists($v."/version.php")) { 
							$v = basename($v);
							$object["hive_mode_config_pre"]["extension"][$v] = hive__require_x($v."/version.php");
							array_push($object["loadup"]["stack"], array("text" => "Extension Found: '".$v."/version.php"."'"));
							hive___stackecho($object["loadup"]["stack"]);		
						}
					}
				}	

			#################################################################################################################################################
			// Initialize MySQL [xxxx307]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Init MySQL Connection [xxxx307]"));
				hive___stackecho($object["loadup"]["stack"]);		
				$object["mysql"] = new x_class_mysql(@$mysql["host"], @$mysql["user"], @$mysql["pass"], @$mysql["db"], @$mysql["port"]);	
				if ($object["mysql"]->lasterror != false) { 
					array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
					hive___stackecho($object["loadup"]["stack"]);
					hive__error("Critical Error", "[000-002] A MySQL Database Connection could not be established.", "Please check your mysql database settings in settings.php.", true, 503);
					exit(); 
				}	

			#################################################################################################################################################
			// Initialize MySQL Logging [xxxx308]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Set up MySQL Logging [xxxx308]"));
				hive___stackecho($object["loadup"]["stack"]);		
				array_push($object["loadup"]["stack"], array("text" => "object[mysql] - x_class_mysql object"));
				hive___stackecho($object["loadup"]["stack"]);									
				if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) {
					$object["mysql"]->log_config(_TABLE_LOG_MYSQL_, _HIVE_MODE_);
				} else {
					$object["mysql"]->log_config(_TABLE_LOG_MYSQL_, "");
					array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!!!!!!!! ERROR - Global Related Logging for MySQL..."));
					hive___stackecho($object["loadup"]["stack"]);	
				}			
				
			#################################################################################################################################################
			// Initialize Logging Class [xxxx309]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Set up Logging Classes [xxxx309]"));
				hive___stackecho($object["loadup"]["stack"]);		
				array_push($object["loadup"]["stack"], array("text" => "object[log] - x_class_log object"));
				hive___stackecho($object["loadup"]["stack"]);				
				// One Time Load API Parameter to Create the Table
				//$object["api_log"] = new x_class_log($object["mysql"], _TABLE_LOG_API_, "");
				//array_push($object["loadup"]["stack"], array("text" => "object[api_log] - x_class_log object"));
				//hive___stackecho($object["loadup"]["stack"]);				
				// One Time Load with Cron Parameter to Create the Table
				$object["log"] = new x_class_log($object["mysql"], _TABLE_LOG_CRON_, "");
				// Initialize Logging Class
				if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) {
					$object["log"] = new x_class_log($object["mysql"], _TABLE_LOG_, _HIVE_MODE_);
				} else {
					$object["log"] = new x_class_log($object["mysql"], _TABLE_LOG_, "");
					array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!!!!!!!! ERROR - Global Related Logging object..."));
					hive___stackecho($object["loadup"]["stack"]);	
				}		
				// Temp Global Logging Class	
				$object["log_tmp"] 	= new x_class_log($object["mysql"], _TABLE_LOG_, "");					
				
			#################################################################################################################################################
			// Install Core CMS MySQL Tables [xxxx310]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Install CMS MySQL Tables [xxxx310]"));
				hive___stackecho($object["loadup"]["stack"]);		
				if(!$object["mysql"]->table_exists($object["prefix"]."cms_store")) {
					array_push($object["loadup"]["stack"], array("text" => "MYSQL INSTALL CORE: ".$object["prefix"]."cms_store".""));
					hive___stackecho($object["loadup"]["stack"]);	
					$object["log_tmp"]->warning("[CORE] [MYSQL] [INSTALL] [TABLE] ".@htmlspecialchars($object["prefix"]."cms_store" ?? '' )."", "mysql");
					require_once(_HIVE_PATH_."/_core/_mysql/mysql.cms_store.php");
					$object["mysql"]->free_all();
				}  else {
					array_push($object["loadup"]["stack"], array("text" => "MYSQL INSTALL CORE TABLE ALREADY EXISTS: ".$object["prefix"]."cms_store".""));
					hive___stackecho($object["loadup"]["stack"]);	
				}
				if(!$object["mysql"]->table_exists($object["prefix"]."cms_worker")) {
					array_push($object["loadup"]["stack"], array("text" => "MYSQL INSTALL CORE: ".$object["prefix"]."cms_worker".""));
					hive___stackecho($object["loadup"]["stack"]);	
					$object["log_tmp"]->warning("[CORE] [MYSQL] [INSTALL] [TABLE] ".@htmlspecialchars($object["prefix"]."cms_worker" ?? '' )."", "mysql");
					require_once(_HIVE_PATH_."/_core/_mysql/mysql.cms_worker.php");
					$object["mysql"]->free_all();
				}   else {
					array_push($object["loadup"]["stack"], array("text" => "MYSQL INSTALL CORE TABLE ALREADY EXISTS: ".$object["prefix"]."cms_worker".""));
					hive___stackecho($object["loadup"]["stack"]);	
				}

			#################################################################################################################################################
			// MySQL Additional [xxxx311]
			#################################################################################################################################################
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Config MySQL Benchmark [xxxx311]"));
				hive___stackecho($object["loadup"]["stack"]);		
				if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) {
					$object["mysql"]->benchmark_config(true, _HIVE_SITE_COOKIE_);
				}
				// unset($mysql);				

			#################################################################################################################################################
			// Create API Permission Tables [xxxx311.1]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Create API Permission Tables [xxxx311.1]"));
				hive___stackecho($object["loadup"]["stack"]);
				$object["api_perm"] 		= 	new x_class_perm($object["mysql"], _TABLE_API_PERM_, "");
				array_push($object["loadup"]["stack"], array("text" => "'object[api_perm] is now x_class_perm"));
				hive___stackecho($object["loadup"]["stack"]);

			#################################################################################################################################################
			// Variables Class Init [xxxx312]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Config Variables Classes [xxxx312]"));
				hive___stackecho($object["loadup"]["stack"]);			
				if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) {
					$object["var"] 	= new x_class_var($object["mysql"], _TABLE_VAR_, _HIVE_MODE_);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!!!!!!!! ERROR - Falling back to Global Variables..."));
					hive___stackecho($object["loadup"]["stack"]);	
					$object["var"] = new x_class_var($object["mysql"], _TABLE_VAR_, "");
				}
				$object["var_glob"] = new x_class_var($object["mysql"], _TABLE_VAR_, "");	

			#################################################################################################################################################
			// Init Current Site Build Number and Version/RNAME Constants [xxxx313]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Check Build Number Validations of Site Module [xxxx313]"));
				hive___stackecho($object["loadup"]["stack"]);				
				// Setup Build Number if Available
				if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) {
					define('_HIVE_BUILD_'	, $object["hive_mode"]["build"]);
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_BUILD_' is now '"._HIVE_BUILD_."'"));
					hive___stackecho($object["loadup"]["stack"]);		
					define('_HIVE_VERSION_'	, $object["hive_mode"]["version"]);
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_VERSION_' is now '"._HIVE_VERSION_."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					define('_HIVE_RNAME_'	, $object["hive_mode"]["rname"]);
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_RNAME_' is now '"._HIVE_RNAME_."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					$object["var"]->setup("_HIVE_BUILD_ACTIVE_",@htmlspecialchars( _HIVE_BUILD_ ?? ''), "Current Installed Site Modules Build Number");	
					array_push($object["loadup"]["stack"], array("text" => "Soft setup of constant '_HIVE_BUILD_ACTIVE_' is now '"._HIVE_BUILD_."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					$object["var"]->setup("_HIVE_RNAME_ACTIVE_",@htmlspecialchars( _HIVE_RNAME_ ?? ''), "Current Installed Site Modules RNAME Identificator");
					array_push($object["loadup"]["stack"], array("text" => "Soft setup of constant '_HIVE_RNAME_ACTIVE_' is now '"._HIVE_RNAME_."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					$object["var"]->setup("_HIVE_VERSION_ACTIVE_",@htmlspecialchars( _HIVE_VERSION_ ?? ''), "Current Installed Site Modules Version Number");
					array_push($object["loadup"]["stack"], array("text" => "Soft setup of constant '_HIVE_VERSION_ACTIVE_' is now '"._HIVE_VERSION_."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					$tmp_build 		= $object["var"]->get("_HIVE_BUILD_ACTIVE_");
					array_push($object["loadup"]["stack"], array("text" => "'tmp_build' is now '".$tmp_build."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					$tmp_rname 		= $object["var"]->get("_HIVE_RNAME_ACTIVE_");
					array_push($object["loadup"]["stack"], array("text" => "'tmp_rname' is now '".$tmp_rname."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					$tmp_version 	= $object["var"]->get("_HIVE_VERSION_ACTIVE_");
					array_push($object["loadup"]["stack"], array("text" => "'tmp_version' is now '".$tmp_version."'"));
					hive___stackecho($object["loadup"]["stack"]);	
				} else { 
					array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!!!!!!!! ERROR - Falling back to Error Values..."));
					hive___stackecho($object["loadup"]["stack"]);	
					$tmp_build 		= 0;
					array_push($object["loadup"]["stack"], array("text" => "'tmp_build' is now '".$tmp_build."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					$tmp_rname 		= 0;
					array_push($object["loadup"]["stack"], array("text" => "'tmp_rname' is now '".$tmp_rname."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					$tmp_version 	= 0;
					array_push($object["loadup"]["stack"], array("text" => "'tmp_version' is now '".$tmp_version."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					define('_HIVE_BUILD_'	, 0); 
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_BUILD_' is now '"._HIVE_BUILD_."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					define('_HIVE_VERSION_'	, 0); 
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_VERSION_' is now '"._HIVE_VERSION_."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					define('_HIVE_RNAME_'	, 0); 
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_RNAME_' is now '"._HIVE_RNAME_."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					define("_HIVE_INTERNAL_VERSION_ERROR_"	, 1); 
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_VERSION_ERROR_' is now '"._HIVE_INTERNAL_VERSION_ERROR_."'"));
					hive___stackecho($object["loadup"]["stack"]);	
				}				
				// Checkfor Errors on Build Number 
				if(_HIVE_BUILD_ == 0) { 
					if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
						define("_HIVE_INTERNAL_VERSION_ERROR_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "Wrong Version Numbers on Active Module - '_HIVE_INTERNAL_VERSION_ERROR_' is now '"._HIVE_INTERNAL_VERSION_ERROR_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					} 
				}
				if(_HIVE_VERSION_ == 0) { 
					if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
						define("_HIVE_INTERNAL_VERSION_ERROR_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "Wrong Version Numbers on Active Module - '_HIVE_INTERNAL_VERSION_ERROR_' is now '"._HIVE_INTERNAL_VERSION_ERROR_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					} 
				}
				if(_HIVE_RNAME_ == 0) { 
					if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
						define("_HIVE_INTERNAL_VERSION_ERROR_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "Wrong Version Numbers on Active Module - '_HIVE_INTERNAL_VERSION_ERROR_' is now '"._HIVE_INTERNAL_VERSION_ERROR_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					} 
				}
				if($tmp_build == 0) { 
					if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
						define("_HIVE_INTERNAL_VERSION_ERROR_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "Wrong Version Numbers on Initialized Module - '_HIVE_INTERNAL_VERSION_ERROR_' is now '"._HIVE_INTERNAL_VERSION_ERROR_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					} 
				}
				if($tmp_rname == 0) { 
					if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
						define("_HIVE_INTERNAL_VERSION_ERROR_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "Wrong Version Numbers on Initialized Module - '_HIVE_INTERNAL_VERSION_ERROR_' is now '"._HIVE_INTERNAL_VERSION_ERROR_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					} 
				}
				if($tmp_version == 0) { 
					if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
						define("_HIVE_INTERNAL_VERSION_ERROR_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "Wrong Version Numbers on Initialized Module - '_HIVE_INTERNAL_VERSION_ERROR_' is now '"._HIVE_INTERNAL_VERSION_ERROR_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					} 
				}
				// Check if RNAME Differs from Installed/Initialized 
				if(_HIVE_RNAME_ != $tmp_rname OR @trim($tmp_rname ?? '') == "") {
					if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
						define("_HIVE_INTERNAL_VERSION_ERROR_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "Wrong Version RNAME on Initialized Module - '_HIVE_INTERNAL_VERSION_ERROR_' is now '"._HIVE_INTERNAL_VERSION_ERROR_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}
					if(!defined("_HIVE_INTERNAL_RNAME_ERROR_")) { 
						define("_HIVE_INTERNAL_RNAME_ERROR_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "Wrong Version RNAME on Initialized Module - '_HIVE_INTERNAL_RNAME_ERROR_' is now '"._HIVE_INTERNAL_RNAME_ERROR_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}
				} 		
				// Build or Version has been downgraded
				if (version_compare(_HIVE_VERSION_, $tmp_version, '<')) {
					if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
						define("_HIVE_INTERNAL_VERSION_ERROR_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "Downgrade Error on Version - '_HIVE_INTERNAL_VERSION_ERROR_' is now '"._HIVE_INTERNAL_VERSION_ERROR_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}
					if(!defined("_HIVE_INTERNAL_DOWNGRADE_ERROR_")) { 
						define("_HIVE_INTERNAL_DOWNGRADE_ERROR_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "Downgrade Error on Version - '_HIVE_INTERNAL_DOWNGRADE_ERROR_' is now '"._HIVE_INTERNAL_DOWNGRADE_ERROR_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}
				}			
				if (version_compare(_HIVE_BUILD_, $tmp_build, '<')) {
					if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
						define("_HIVE_INTERNAL_VERSION_ERROR_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "Downgrade Error on Build - '_HIVE_INTERNAL_VERSION_ERROR_' is now '"._HIVE_INTERNAL_VERSION_ERROR_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}
					if(!defined("_HIVE_INTERNAL_DOWNGRADE_ERROR_")) { 
						define("_HIVE_INTERNAL_DOWNGRADE_ERROR_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "Downgrade Error on Build - '_HIVE_INTERNAL_DOWNGRADE_ERROR_' is now '"._HIVE_INTERNAL_DOWNGRADE_ERROR_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}
				}			
				// Build has been upgraded, database changes pending
				if (version_compare(_HIVE_VERSION_, $tmp_version, '>')) {
					if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
						define("_HIVE_INTERNAL_VERSION_ERROR_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "Upgrade awaiting on Version - '_HIVE_INTERNAL_VERSION_ERROR_' is now '"._HIVE_INTERNAL_VERSION_ERROR_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}
					if(!defined("_HIVE_INTERNAL_UPDATE_REQ_")) { 
						define("_HIVE_INTERNAL_UPDATE_REQ_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "Upgrade awaiting on Version - '_HIVE_INTERNAL_UPDATE_REQ_' is now '"._HIVE_INTERNAL_UPDATE_REQ_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}	
				}			
				if (version_compare(_HIVE_BUILD_, $tmp_build, '>')) {
					if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
						define("_HIVE_INTERNAL_VERSION_ERROR_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "Upgrade awaiting on Build - '_HIVE_INTERNAL_VERSION_ERROR_' is now '"._HIVE_INTERNAL_VERSION_ERROR_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}
					if(!defined("_HIVE_INTERNAL_UPDATE_REQ_")) { 
						define("_HIVE_INTERNAL_UPDATE_REQ_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "Upgrade awaiting on Build - '_HIVE_INTERNAL_UPDATE_REQ_' is now '"._HIVE_INTERNAL_UPDATE_REQ_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}	
				}	
				// Unset Variables to save Memory
				unset($tmp_build); unset($tmp_rname); unset($tmp_version);	
				
			#################################################################################################################################################
			// Check Maintenance Lock Status [xxxx314]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Check Maintenance Lock Status [xxxx314]"));
				hive___stackecho($object["loadup"]["stack"]);					
				if(file_exists($object["path"]."/maintenance.lock.php")) {
					array_push($object["loadup"]["stack"], array("text" => "Maintenance File in Place"));
					hive___stackecho($object["loadup"]["stack"]);		
					if(!defined("_HIVE_INTERNAL_MT_LOCK_")) { 
						define("_HIVE_INTERNAL_MT_LOCK_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_MT_LOCK_' is now '"._HIVE_INTERNAL_MT_LOCK_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}	
				} else {
					define("_HIVE_INTERNAL_MT_LOCK_", 0); 
					array_push($object["loadup"]["stack"], array("text" => "Maintenance File not in Place"));
					hive___stackecho($object["loadup"]["stack"]);	
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_MT_LOCK_' is now '"._HIVE_INTERNAL_MT_LOCK_."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}

			#################################################################################################################################################
			// Check Update Lock Status [xxxx315]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Check Update Lock Status [xxxx315]"));
				hive___stackecho($object["loadup"]["stack"]);					
				if(file_exists($object["path"]."/update.lock.php")) {
					array_push($object["loadup"]["stack"], array("text" => "Update Lock File in Place"));
					hive___stackecho($object["loadup"]["stack"]);		
					if(!defined("_HIVE_INTERNAL_UPDATE_LOCK_")) { 
						define("_HIVE_INTERNAL_UPDATE_LOCK_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_UPDATE_LOCK_' is now '"._HIVE_INTERNAL_UPDATE_LOCK_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}	
				} else {
					define("_HIVE_INTERNAL_UPDATE_LOCK_", 0); 
					array_push($object["loadup"]["stack"], array("text" => "Update Lock File not in Place"));
					hive___stackecho($object["loadup"]["stack"]);	
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_UPDATE_LOCK_' is now '"._HIVE_INTERNAL_UPDATE_LOCK_."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}				
				
			#################################################################################################################################################
			// Check Backup Lock Status [xxxx316]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Check Backup Lock Status [xxxx316]"));
				hive___stackecho($object["loadup"]["stack"]);							
				if(file_exists($object["path"]."/backup.lock.php")) {
					array_push($object["loadup"]["stack"], array("text" => "Backup Lock File in Place"));
					hive___stackecho($object["loadup"]["stack"]);		
					if(!defined("_HIVE_INTERNAL_BACKUP_LOCK_")) { 
						define("_HIVE_INTERNAL_BACKUP_LOCK_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_BACKUP_LOCK_' is now '"._HIVE_INTERNAL_BACKUP_LOCK_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}	
				} else {
					define("_HIVE_INTERNAL_BACKUP_LOCK_", 0); 
					array_push($object["loadup"]["stack"], array("text" => "Backup Lock File not in Place"));
					hive___stackecho($object["loadup"]["stack"]);	
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_BACKUP_LOCK_' is now '"._HIVE_INTERNAL_BACKUP_LOCK_."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	

			#################################################################################################################################################
			// Check Backup Lock Status [xxxx317]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Set general Lock Constant [xxxx317]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(defined("_HIVE_INTERNAL_BACKUP_LOCK_")) { if(_HIVE_INTERNAL_BACKUP_LOCK_) { if(!defined("_HIVE_INTERNAL_LOCK_")) { define("_HIVE_INTERNAL_LOCK_", 1); } } }
				if(defined("_HIVE_INTERNAL_UPDATE_LOCK_")) { if(_HIVE_INTERNAL_UPDATE_LOCK_) { if(!defined("_HIVE_INTERNAL_LOCK_")) { define("_HIVE_INTERNAL_LOCK_", 1); } } }
				if(defined("_HIVE_INTERNAL_MT_LOCK_")) { if(_HIVE_INTERNAL_MT_LOCK_) { if(!defined("_HIVE_INTERNAL_LOCK_")) { define("_HIVE_INTERNAL_LOCK_", 1); } } }
				if(!defined("_HIVE_INTERNAL_LOCK_")) { define("_HIVE_INTERNAL_LOCK_", 0); }
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_LOCK_' is now '"._HIVE_INTERNAL_LOCK_."'"));
				hive___stackecho($object["loadup"]["stack"]);	

			#################################################################################################################################################
			// Lock Window if Maintenance [xxxx318]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Lock Window if Maintenance [xxxx318]"));
				hive___stackecho($object["loadup"]["stack"]);
				if(!defined("_HIVE_INTERNAL_MT_LOCK_OVR_")) { define("_HIVE_INTERNAL_MT_LOCK_OVR_", 0); }	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_MT_LOCK_OVR_' is now '".@_HIVE_INTERNAL_MT_LOCK_OVR_."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!_HIVE_INTERNAL_MT_LOCK_OVR_) {
					if(_HIVE_INTERNAL_MT_LOCK_) {
						array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
						hive___stackecho($object["loadup"]["stack"]);
						hive__error("Maintenance", "[000-003] This website is currently in maintenance mode!<br />Please come back later...", "If you want to end maintenance mode manually, remove the maintenance.lock.php file from the website root directory.", true, 503, false, "cog");
						exit(); 
					}
				}

			#################################################################################################################################################
			// Lock Window if Backup [xxxx319]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Lock Window if Backup [xxxx319]"));
				hive___stackecho($object["loadup"]["stack"]);		
				if(!defined("_HIVE_INTERNAL_BACKUP_LOCK_OVR_")) { define("_HIVE_INTERNAL_BACKUP_LOCK_OVR_", 0); }
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_BACKUP_LOCK_OVR_' is now '".@_HIVE_INTERNAL_BACKUP_LOCK_OVR_."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!_HIVE_INTERNAL_BACKUP_LOCK_OVR_) {
					if(_HIVE_INTERNAL_BACKUP_LOCK_) {
						array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
						hive___stackecho($object["loadup"]["stack"]);
						hive__error("Maintenance", "[000-004] This website is currently doing backup work!<br />Please come back later...", "If you want to end backup mode manually, remove the backup.lock.php file from the website root directory.", true, 503, false, "cog");
						exit(); 	
					}
				}

			#################################################################################################################################################
			// Lock Window if Update [xxxx320]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Lock Window if Update [xxxx320]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!defined("_HIVE_INTERNAL_UPDATE_LOCK_OVR_")) { define("_HIVE_INTERNAL_UPDATE_LOCK_OVR_", 0); }
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_UPDATE_LOCK_OVR_' is now '".@_HIVE_INTERNAL_UPDATE_LOCK_OVR_."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!_HIVE_INTERNAL_UPDATE_LOCK_OVR_) {
					if(_HIVE_INTERNAL_UPDATE_LOCK_) {
						array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
						hive___stackecho($object["loadup"]["stack"]);
						hive__error("Maintenance", "[000-005] This website is currently updating!<br />Please come back later...", "If you want to end update mode manually, remove the backup.lock.php file from the website root directory.", true, 503, false, "cog");
						exit();
					}
				}
				
			#################################################################################################################################################
			// Stop on Error for _HIVE_INTERNAL_INIT_ERROR_ [xxxx321]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Stop on Error for _HIVE_INTERNAL_INIT_ERROR_ [xxxx321]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!defined("_HIVE_INTERNAL_INIT_ERROR_OVR_")) { define("_HIVE_INTERNAL_INIT_ERROR_OVR_", 0); }
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_INIT_ERROR_OVR_' is now '".@_HIVE_INTERNAL_INIT_ERROR_OVR_."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!_HIVE_INTERNAL_INIT_ERROR_OVR_) {
					if(defined("_HIVE_INTERNAL_INIT_ERROR_")) {
						if(_HIVE_INTERNAL_INIT_ERROR_) {
							array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
							hive___stackecho($object["loadup"]["stack"]);
							hive__error("Critical Error", "[000-006] A serious init error has occurred. The issue is related to the current active website module: '".@_HIVE_MODE_."'.", "", true, 503);
							exit();
						}
					}
				}

			#################################################################################################################################################
			// Stop on Error for _HIVE_INTERNAL_RNAME_ERROR_ [xxxx322]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Stop on Error for _HIVE_INTERNAL_RNAME_ERROR_ [xxxx322]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!defined("_HIVE_INTERNAL_RNAME_ERROR_OVR_")) { define("_HIVE_INTERNAL_RNAME_ERROR_OVR_", 0); }
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_RNAME_ERROR_OVR_' is now '".@_HIVE_INTERNAL_RNAME_ERROR_OVR_."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!_HIVE_INTERNAL_RNAME_ERROR_OVR_) {
					if(defined("_HIVE_INTERNAL_RNAME_ERROR_")) {
						if(_HIVE_INTERNAL_RNAME_ERROR_) {
							array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
							hive___stackecho($object["loadup"]["stack"]);
							hive__error("Critical Error", "[000-007] ".'The Folder installed Site Module with RNAME: \''.@hive__hsc(_HIVE_RNAME_).'\' on Site Modules Folder: \''._HIVE_MODE_.'\' does not match the database installed HIVE_RNAME_ACTIVE: \''.@hive__hsc(_HIVE_RNAME_ACTIVE_ ).'\'. Please restore the previous site modules folder which has been in place and initialized, or delete Site Module RNAME and Version/Build Information off the database (not recommended).'."", "", true, 503);
							exit();
						}
					}
				}

			#################################################################################################################################################
			// Stop on Error for _HIVE_INTERNAL_DOWNGRADE_ERROR_ [xxxx323]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Stop on Error for _HIVE_INTERNAL_DOWNGRADE_ERROR_ [xxxx323]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!defined("_HIVE_INTERNAL_DOWNGRADE_ERROR_OVR_")) { define("_HIVE_INTERNAL_DOWNGRADE_ERROR_OVR_", 0); }
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_DOWNGRADE_ERROR_OVR_' is now '".@_HIVE_INTERNAL_DOWNGRADE_ERROR_OVR_."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!_HIVE_INTERNAL_DOWNGRADE_ERROR_OVR_) {
					if(defined("_HIVE_INTERNAL_DOWNGRADE_ERROR_")) {
						if(_HIVE_INTERNAL_DOWNGRADE_ERROR_) {
							array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
							hive___stackecho($object["loadup"]["stack"]);
							hive__error("Critical Error", "[000-008] ".'The module files for \''.@hive__hsc(_HIVE_MODE_).'\' appear to have been downgraded. Please reinstall the correct version: \''.@hive__hsc(_HIVE_BUILD_ACTIVE_).'\' to avoid compatibility issues.'."", "", true, 503);
							exit();
						}
					}
				}

			#################################################################################################################################################
			// Stop on Error for _HIVE_INTERNAL_UPDATE_REQ_ [xxxx324]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Stop on Error for _HIVE_INTERNAL_UPDATE_REQ_ [xxxx324]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!defined("_HIVE_INTERNAL_UPDATE_REQ_OVR_")) { define("_HIVE_INTERNAL_UPDATE_REQ_OVR_", 0); }
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_UPDATE_REQ_OVR_' is now '".@_HIVE_INTERNAL_UPDATE_REQ_OVR_."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!_HIVE_INTERNAL_UPDATE_REQ_OVR_) {
					if(defined("_HIVE_INTERNAL_UPDATE_REQ_")) {
						if(_HIVE_INTERNAL_UPDATE_REQ_) {
							array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
							hive___stackecho($object["loadup"]["stack"]);
							hive__error("Critical Error", "[000-009] ".'The module Build Version in the Database ['.hive__hsc(_HIVE_BUILD_ACTIVE_).'] does not match the current Site Module Build ['.hive__hsc(_HIVE_BUILD_).']. Please visit the update page to update the module to the latest version here: <a href="/updater.php">/updater.php</a>'."", "", true, 503);
							exit();
						}
					}
				}

			#################################################################################################################################################
			// Stop on Error for _HIVE_INTERNAL_VERSION_ERROR_ [xxxx325]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Stop on Error for _HIVE_INTERNAL_VERSION_ERROR_ [xxxx325]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_OVR_")) { define("_HIVE_INTERNAL_VERSION_ERROR_OVR_", 0); }
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_VERSION_ERROR_OVR_' is now '".@_HIVE_INTERNAL_VERSION_ERROR_OVR_."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!_HIVE_INTERNAL_VERSION_ERROR_OVR_) {
					if(defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
						if(_HIVE_INTERNAL_VERSION_ERROR_) {
							array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
							hive___stackecho($object["loadup"]["stack"]);
							hive__error("Critical Error", "[000-010] A serious versioning error has occurred. The issue is related to the current active website module: '".@_HIVE_MODE_."'.", "", true, 503);
							exit();
						}
					}
				}

			#################################################################################################################################################
			// Load Site Module Library Files [xxxx326]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Load Site Mode Library Files [xxxx326]"));
				hive___stackecho($object["loadup"]["stack"]);	
				// Get Site Mode Library Files
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
					// Get Current Site Module Data
					$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_);
					// Current Site Module Libraries
					foreach (glob($object["path"]."/_site/"._HIVE_MODE_."/_lib/lib.*.php") as $filename) { 
						if(@basename($filename) == "index.php") { continue; } 
						array_push($object["loadup"]["stack"], array("text" => "File include: '".$filename."'"));
						hive___stackecho($object["loadup"]["stack"]);	
						require_once $filename; 
					}	 
					// Extension Libraries
					foreach ($object["extensions_path"] as $hive_extension_loader_current_init) {
						if (is_dir($hive_extension_loader_current_init."/_lib")) {
							$object["extension"] = hive__init_extension_header($object, basename($hive_extension_loader_current_init)); 
							foreach (glob($hive_extension_loader_current_init."/_lib/lib.*.php") as $filenamex){ 
								array_push($object["loadup"]["stack"], array("text" => "File include: '".$filenamex."'"));
								hive___stackecho($object["loadup"]["stack"]);	
								require_once $filenamex; 
							}
						}		
					}	
				} unset($object["hive_mode_config"]); unset($object["extension"]);					
				
			#################################################################################################################################################
			// Include Global_Pre Configurations [xxxx327]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Include Global_Pre Configurations [xxxx327]"));
				hive___stackecho($object["loadup"]["stack"]);				
				// Load Global Configurations from Site Modules (Preconfiguration)
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_"))  {
					if(is_array(_HIVE_MODE_ARRAY_))  {
						foreach(_HIVE_MODE_ARRAY_ as $key => $value) {
							$object["hive_mode_config"] = hive__init_site_header($object, $value);
							$realpath = _HIVE_SITE_PATH_."/".$value."/"; 
							if (file_exists($realpath."/_config/global_pre.php")) {
								array_push($object["loadup"]["stack"], array("text" => "File include: '".$value."/_config/global_pre.php"."'"));
								hive___stackecho($object["loadup"]["stack"]);	
								require_once($value."/_config/global_pre.php");
							}
						}
					}
				} unset($object["hive_mode_config"]);
				
			#################################################################################################################################################
			// Include Config_Pre Configurations [xxxx328]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Include Config_Pre Configurations [xxxx328]"));
				hive___stackecho($object["loadup"]["stack"]);						
				// Load Site Specific Pre Configuration (and of extension modules)
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_"))  {				
					// Current Site Module Configuration Pre
					$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_); 
					if(file_exists($object["path"]."/_site/"._HIVE_MODE_."/_config/config_pre.php")) {
						array_push($object["loadup"]["stack"], array("text" => "File include: '".$object["path"]."/_site/"._HIVE_MODE_."/_config/config_pre.php"."'"));
						hive___stackecho($object["loadup"]["stack"]);	
						require_once($object["path"]."/_site/"._HIVE_MODE_."/_config/config_pre.php"); 
					}	
					// Extension Libraries
					foreach ($object["extensions_path"] as $hive_extension_loader_current_init) {
						if (file_exists($hive_extension_loader_current_init."/_config/config_pre.php")) {
							$object["extension"] = hive__init_extension_header($object, basename($hive_extension_loader_current_init)); 
							array_push($object["loadup"]["stack"], array("text" => "File include: '".$hive_extension_loader_current_init."/_config/config_pre.php"."'"));
							hive___stackecho($object["loadup"]["stack"]);	
							require_once $hive_extension_loader_current_init."/_config/config_pre.php";
						}
					}	
				} unset($object["extension"]); unset($object["hive_mode_config"]); 	

			#################################################################################################################################################
			/*  Setting PHP Debug State [xxxx328.1] */
			#################################################################################################################################################
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Setting PHP Debug State [xxxx328.1]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_"))  {	
					if(defined("_HIVE_PHP_DEBUG_")) { 
						if(_HIVE_PHP_DEBUG_ == true) { 
							array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PHP_DEBUG_' is already true"));
							hive___stackecho($object["loadup"]["stack"]);
							@ini_set('display_errors', 1); 
							array_push($object["loadup"]["stack"], array("text" => "php config: 'display_errors' is now 1"));
							hive___stackecho($object["loadup"]["stack"]);
							@ini_set('display_startup_errors', 1); 
							array_push($object["loadup"]["stack"], array("text" => "php config: 'display_startup_errors' is now 1"));
							hive___stackecho($object["loadup"]["stack"]);
							@error_reporting(E_ALL);	
						} else { 
							array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PHP_DEBUG_' is already false"));
							hive___stackecho($object["loadup"]["stack"]);
							@ini_set('display_errors', 0); 
							array_push($object["loadup"]["stack"], array("text" => "php config: 'display_errors' is now 0"));
							hive___stackecho($object["loadup"]["stack"]);
							@ini_set('display_startup_errors', 0); 
							array_push($object["loadup"]["stack"], array("text" => "php config: 'display_startup_errors' is now 0"));
							hive___stackecho($object["loadup"]["stack"]);
						} 
					} else { 
						@ini_set('display_errors', 0); 
						array_push($object["loadup"]["stack"], array("text" => "php config: 'display_errors' is now 0"));
						hive___stackecho($object["loadup"]["stack"]);
						@ini_set('display_startup_errors', 0); 
						array_push($object["loadup"]["stack"], array("text" => "php config: 'display_startup_errors' is now 0"));
						hive___stackecho($object["loadup"]["stack"]);
						define("_HIVE_PHP_DEBUG_", false); 
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PHP_DEBUG_' is now false"));
						hive___stackecho($object["loadup"]["stack"]);
					} 
					if(defined("_HIVE_PHP_MODS_")) {
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PHP_MODS_' is already: '".@serialize(@_HIVE_PHP_MODS_)."'"));
						hive___stackecho($object["loadup"]["stack"]);
						if(is_array(@_HIVE_PHP_MODS_)) { 
							foreach(_HIVE_PHP_MODS_ as $key => $value) { 
								if(!$object["debug"]->required_php_module($value, false)) {
									array_push($object["loadup"]["stack"], array("text" => "PHP Module Not Found for Site Module: '".$value."' (debug)"));
									hive___stackecho($object["loadup"]["stack"]);	
									array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
									hive___stackecho($object["loadup"]["stack"]);
									hive__error("Critical Error", "[000-011] A PHP Module is missing for current Site Module: '".$value."'. Please install the required PHP Module.", "", true, 503);
									exit();
								} else {
									array_push($object["loadup"]["stack"], array("text" => "PHP Module for Site Module Found: '".$value."' (debug)"));
									hive___stackecho($object["loadup"]["stack"]);					
								}								
							} 
						} 						
					} else { 
						define("_HIVE_PHP_MODS_", array()); 
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PHP_MODS_' is now empty array"));
						hive___stackecho($object["loadup"]["stack"]);
					}	
				}		
				
			#################################################################################################################################################
			// Determine Hive URL Variables [xxxx329]
			#################################################################################################################################################
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Determine Hive URL Variables [xxxx329]"));
				hive___stackecho($object["loadup"]["stack"]);		
				/* Set Up The Real URL as Configured in Settings.php */	
				if(!defined("_HIVE_URL_")) { 
					define("_HIVE_URL_", $object["url"]); 
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_URL_' is now '".@_HIVE_URL_."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} $object["url"] = _HIVE_URL_;		
				array_push($object["loadup"]["stack"], array("text" => "'object[url]' is now '".@_HIVE_URL_."' set by '_HIVE_URL_'"));
				hive___stackecho($object["loadup"]["stack"]);		
				/* Give constant to work with determinated URLs with no need to set them anywhere. */	
				$tmprel = parse_url(_HIVE_URL_, PHP_URL_PATH);
				if(!$tmprel OR $tmprel == "") { $tmprel = "/"; }
				if (isset($_SERVER['HTTPS']) && @$_SERVER['HTTPS'] === 'on') {
					$link = "https://";
				} else { $link = "http://"; }
				$tmprelx = $link.@$_SERVER["HTTP_HOST"].$tmprel;
				if(substr($tmprelx, -1, 1) != "/") { $tmprelx = $tmprelx."/"; }
				if(substr($tmprel, -1, 1) != "/") { $tmprel = $tmprel."/"; }
				define('_HIVE_URL_REL_', $tmprelx);	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_URL_REL_' is now '".@_HIVE_URL_REL_."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_URLC_REL_', $tmprel);	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_URLC_REL_' is now '".@_HIVE_URLC_REL_."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				unset($tmprelx);
				unset($tmprel);
				unset($link);							

			#################################################################################################################################################
			// Classes Init [xxxx330]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Classes Init [xxxx330]"));
				hive___stackecho($object["loadup"]["stack"]);		
				$object["2fa"] 	= 	false;		
				array_push($object["loadup"]["stack"], array("text" => "'object[2fa]' is now reserved for x_class_2fa"));
				hive___stackecho($object["loadup"]["stack"]);	
				$object["crypt"] 		= 	new x_class_crypt();		
				array_push($object["loadup"]["stack"], array("text" => "'object[crypt]' is now x_class_crypt"));
				hive___stackecho($object["loadup"]["stack"]);
				$object["zip"] 			= 	new x_class_zip();
				array_push($object["loadup"]["stack"], array("text" => "'object[zip]' is now x_class_zip"));
				hive___stackecho($object["loadup"]["stack"]);
				$object["curl"] 		= 	new x_class_curl();		
				array_push($object["loadup"]["stack"], array("text" => "'object[curl]' is now x_class_curl"));
				hive___stackecho($object["loadup"]["stack"]);
				// Set Temp Hive Mode
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_"))  { $tmp_mode = _HIVE_MODE_; } else { $tmp_mode = ""; }						
				// Init Site Modules Classes
				$object["benchmark"] 	= 	new x_class_benchmark($object["mysql"], _TABLE_LOG_BENCHMARK_, $tmp_mode);
				array_push($object["loadup"]["stack"], array("text" => "'object[benchmark]' is now x_class_benchmark"));
				hive___stackecho($object["loadup"]["stack"]);
				$object["comment"] 		= 	new x_class_comment($object["mysql"], _TABLE_COMMENT_, _HIVE_SITE_COOKIE_, 0, 0, $tmp_mode);
				array_push($object["loadup"]["stack"], array("text" => "'object[comment]' is now x_class_comment"));
				hive___stackecho($object["loadup"]["stack"]);					
				$object["api"] 			= 	new x_class_api($object["mysql"], _TABLE_API_, _HIVE_MODE_);
				$object["hitcounter"] 	= 	new x_class_hitcounter($object["mysql"], _TABLE_LOG_VISIT_, _HIVE_SITE_COOKIE_, $tmp_mode);
					$object["hitcounter"]->clearget(false);	
				array_push($object["loadup"]["stack"], array("text" => "'object[hitcounter]' is now x_class_hitcounter"));
				hive___stackecho($object["loadup"]["stack"]);
				array_push($object["loadup"]["stack"], array("text" => "'object[hitcounter]->clearget(false)' is executed"));
				hive___stackecho($object["loadup"]["stack"]);						
				$object["eventbox"] 	= 	new x_class_eventbox(_HIVE_SITE_COOKIE_);
				array_push($object["loadup"]["stack"], array("text" => "'object[eventbox]' is now x_class_eventbox"));
				hive___stackecho($object["loadup"]["stack"]);
				// Unset temp Hive Mode
				unset($tmp_mode);
				// Initialize Debugging Class Javascript Error Database
				$object["debug"]->js_error_create_db($object["mysql"], _TABLE_LOG_JS_);
				array_push($object["loadup"]["stack"], array("text" => "'object[debug]->js_error_create_db' has been executed with _TABLE_LOG_JS_"));
				hive___stackecho($object["loadup"]["stack"]);

			#################################################################################################################################################
			// Load Global Configuration [xxxx331]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Load Global Configuration [xxxx331]"));
				hive___stackecho($object["loadup"]["stack"]);						
				// Load Global Configurations from Site Modules (Middleware)	
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_"))  {
					if(is_array(_HIVE_MODE_ARRAY_))  {
						foreach(_HIVE_MODE_ARRAY_ as $key => $value) {
							$realpath = _HIVE_SITE_PATH_."/".$value."/";
							$object["hive_mode_config"] = hive__init_site_header($object, $value);
							if (file_exists($realpath."/_config/global.php")) {
								array_push($object["loadup"]["stack"], array("text" => "File include: '".$value."/_config/global.php"."'"));
								hive___stackecho($object["loadup"]["stack"]);	
								require_once($value."/_config/global.php");
							}
						}
					}
				} unset($object["hive_mode_config"]);			
					
			#################################################################################################################################################
			// Load Configuration [xxxx332]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Load Configuration [xxxx332]"));
				hive___stackecho($object["loadup"]["stack"]);					
				// Instance Settings
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
					$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_); 
					if(file_exists($object["path"]."/_site/"._HIVE_MODE_."/_config/config.php")) { 
						array_push($object["loadup"]["stack"], array("text" => "File include: '".$object["path"]."/_site/"._HIVE_MODE_."/_config/config.php"."'"));
						hive___stackecho($object["loadup"]["stack"]);	
						require_once($object["path"]."/_site/"._HIVE_MODE_."/_config/config.php"); 
					} 
					// Extension Libraries
					foreach ($object["extensions_path"] as $hive_extension_loader_current_init) {
						if (file_exists($hive_extension_loader_current_init."/_config/config.php")) {
							$object["extension"] = hive__init_extension_header($object, basename($hive_extension_loader_current_init)); 
							array_push($object["loadup"]["stack"], array("text" => "File include: '".$hive_extension_loader_current_init."/_config/config.php"."'"));
							hive___stackecho($object["loadup"]["stack"]);
							require_once $hive_extension_loader_current_init."/_config/config.php";
						}
					} 	
				} unset($object["hive_mode_config"]); unset($object["extension"]);	

			#################################################################################################################################################
			// Init Variables [xxxx333]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Init Variables [xxxx333]"));
				hive___stackecho($object["loadup"]["stack"]);		
				// Init Contants out of Variable Classes
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) {  $object["var"] = new x_class_var($object["mysql"], _TABLE_VAR_, _HIVE_MODE_); $object["var"]->init_constant();	}
					else { $object["var"] =  new x_class_var($object["mysql"], _TABLE_VAR_, ""); }

			#################################################################################################################################################
			// Init some Constants [xxxx334]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Init some Constants [xxxx334]"));
				hive___stackecho($object["loadup"]["stack"]);						

				// Some Variables in Case they are not set by configurations of modules.
				if(!defined("_TINYMCE_PLUGINS_")) 				{ 
					define("_TINYMCE_PLUGINS_", "preview importcss searchreplace autolink directionality visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor advlist lists wordcount help charmap quickbars emoticons code"); 
					array_push($object["loadup"]["stack"], array("text" => "'_TINYMCE_PLUGINS_' is fallback now '".@_TINYMCE_PLUGINS_."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_TINYMCE_PLUGINS_' is already '".@_TINYMCE_PLUGINS_."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_TINYMCE_MENU_BAR_")) 				{ 
					define("_TINYMCE_MENU_BAR_", "file edit view insert format table help");
					array_push($object["loadup"]["stack"], array("text" => "'_TINYMCE_MENU_BAR_' is fallback now '".@_TINYMCE_MENU_BAR_."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_TINYMCE_MENU_BAR_' is already '".@_TINYMCE_MENU_BAR_."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_TINYMCE_TOOL_BAR_")) 				{ 
					define("_TINYMCE_TOOL_BAR_", "undo redo | bold italic underline strikethrough | blocks fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | image media link");
					array_push($object["loadup"]["stack"], array("text" => "'_TINYMCE_TOOL_BAR_' is fallback now '".@_TINYMCE_TOOL_BAR_."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_TINYMCE_TOOL_BAR_' is already '".@_TINYMCE_TOOL_BAR_."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_CRON_ONLY_CLI_")) { 
					define("_CRON_ONLY_CLI_", true); 
					array_push($object["loadup"]["stack"], array("text" => "'_CRON_ONLY_CLI_' is fallback now '".@serialize(@_CRON_ONLY_CLI_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_CRON_ONLY_CLI_' is already '".@serialize(@_CRON_ONLY_CLI_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_HIVE_CURL_LOGGING_")) { 
					define("_HIVE_CURL_LOGGING_", false); 
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_CURL_LOGGING_' is fallback now '".@serialize(@_HIVE_CURL_LOGGING_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_CURL_LOGGING_' is already '".@serialize(@_HIVE_CURL_LOGGING_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_HIVE_CSRF_TIME_")) { 
					define("_HIVE_CSRF_TIME_", 1200);
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_CSRF_TIME_' is fallback now '".@serialize(@_HIVE_CSRF_TIME_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_CSRF_TIME_' is already '".@serialize(@_HIVE_CSRF_TIME_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_HIVE_URL_GET_")) { 
					define('_HIVE_URL_GET_', array("hl1", "hl2", "hl4", "hl5", "hl6"));
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_URL_GET_' is fallback now '".@serialize(@_HIVE_URL_GET_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_URL_GET_' is already '".@serialize(@_HIVE_URL_GET_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_HIVE_URL_SEO_")) { 
					define("_HIVE_URL_SEO_", false);
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_URL_SEO_' is fallback now '".@serialize(@_HIVE_URL_SEO_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_URL_SEO_' is already '".@serialize(@_HIVE_URL_SEO_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_HIVE_URL_SEO_GETVAR_")) { 
					define("_HIVE_URL_SEO_GETVAR_", "hive__seo_tag_loc");
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_URL_SEO_GETVAR_' is fallback now '".@serialize(@_HIVE_URL_SEO_GETVAR_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_URL_SEO_GETVAR_' is already '".@serialize(@_HIVE_URL_SEO_GETVAR_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_HIVE_TITLE_SPACER_")) { 
					define("_HIVE_TITLE_SPACER_", " - ");
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_TITLE_SPACER_' is fallback now '".@serialize(@_HIVE_TITLE_SPACER_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_TITLE_SPACER_' is already '".@serialize(@_HIVE_TITLE_SPACER_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_UPDATER_CODE_")) { 
					define("_UPDATER_CODE_", false);
					array_push($object["loadup"]["stack"], array("text" => "'_UPDATER_CODE_' is fallback now '".@serialize(@_UPDATER_CODE_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_UPDATER_CODE_' is already '".@serialize(@_UPDATER_CODE_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				// Captchas		
				if(!defined("_CAPTCHA_COLORS_")) { 
					define("_CAPTCHA_COLORS_", false);
					array_push($object["loadup"]["stack"], array("text" => "'_CAPTCHA_COLORS_' is fallback now '".@serialize(@_CAPTCHA_COLORS_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_CAPTCHA_COLORS_' is already '".@serialize(@_CAPTCHA_COLORS_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_CAPTCHA_SQUARES_")) { 
					define("_CAPTCHA_SQUARES_", mt_rand(5, 12));
					array_push($object["loadup"]["stack"], array("text" => "'_CAPTCHA_SQUARES_' is fallback now '".@serialize(@_CAPTCHA_SQUARES_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_CAPTCHA_SQUARES_' is already '".@serialize(@_CAPTCHA_SQUARES_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_CAPTCHA_LINES_")) { 
					define("_CAPTCHA_LINES_", mt_rand(5, 12));
					array_push($object["loadup"]["stack"], array("text" => "'_CAPTCHA_LINES_' is fallback now '".@serialize(@_CAPTCHA_LINES_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_CAPTCHA_LINES_' is already '".@serialize(@_CAPTCHA_LINES_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_CAPTCHA_HEIGHT_")) { 
					define("_CAPTCHA_HEIGHT_", "70");
					array_push($object["loadup"]["stack"], array("text" => "'_CAPTCHA_HEIGHT_' is fallback now '".@serialize(@_CAPTCHA_HEIGHT_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_CAPTCHA_HEIGHT_' is already '".@serialize(@_CAPTCHA_HEIGHT_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_CAPTCHA_WIDTH_")) { 
					define("_CAPTCHA_WIDTH_", "200");
					array_push($object["loadup"]["stack"], array("text" => "'_CAPTCHA_WIDTH_' is fallback now '".@serialize(@_CAPTCHA_WIDTH_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_CAPTCHA_WIDTH_' is already '".@serialize(@_CAPTCHA_WIDTH_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_CAPTCHA_CODE_")) { 
					define("_CAPTCHA_CODE_", mt_rand(1000, 9999));
					array_push($object["loadup"]["stack"], array("text" => "'_CAPTCHA_CODE_' is fallback now '".@serialize(@_CAPTCHA_CODE_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_CAPTCHA_CODE_' is already '".@serialize(@_CAPTCHA_CODE_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_CAPTCHA_FONT_PATH_")) { 
					define("_CAPTCHA_FONT_PATH_", "../_font/captcha.ttf");
					array_push($object["loadup"]["stack"], array("text" => "'_CAPTCHA_FONT_PATH_' is fallback now '".@serialize(@_CAPTCHA_FONT_PATH_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_CAPTCHA_FONT_PATH_' is already '".@serialize(@_CAPTCHA_FONT_PATH_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				// User Class	
				if(!defined("_USER_MULTI_LOGIN_")) { 
					define("_USER_MULTI_LOGIN_", true);
					array_push($object["loadup"]["stack"], array("text" => "'_USER_MULTI_LOGIN_' is fallback now '".@serialize(@_USER_MULTI_LOGIN_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_USER_MULTI_LOGIN_' is already '".@serialize(@_USER_MULTI_LOGIN_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_USER_REC_DROP_")) { 
					define("_USER_REC_DROP_", true);
					array_push($object["loadup"]["stack"], array("text" => "'_USER_REC_DROP_' is fallback now '".@serialize(@_USER_REC_DROP_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_USER_REC_DROP_' is already '".@serialize(@_USER_REC_DROP_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_USER_MAX_SESSION_")) { 
					define("_USER_MAX_SESSION_", 7);
					array_push($object["loadup"]["stack"], array("text" => "'_USER_MAX_SESSION_' is fallback now '".@serialize(@_USER_MAX_SESSION_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_USER_MAX_SESSION_' is already '".@serialize(@_USER_MAX_SESSION_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_USER_TOKEN_TIME_")) { 
					define("_USER_TOKEN_TIME_", 600);
					array_push($object["loadup"]["stack"], array("text" => "'_USER_TOKEN_TIME_' is fallback now '".@serialize(@_USER_TOKEN_TIME_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_USER_TOKEN_TIME_' is already '".@serialize(@_USER_TOKEN_TIME_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_USER_PF_SIGNS_")) { 
					define("_USER_PF_SIGNS_", 7);
					array_push($object["loadup"]["stack"], array("text" => "'_USER_PF_SIGNS_' is fallback now '".@serialize(@_USER_PF_SIGNS_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_USER_PF_SIGNS_' is already '".@serialize(@_USER_PF_SIGNS_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_USER_PF_CAPSIGNS_")) { 
					define("_USER_PF_CAPSIGNS_", 1);
					array_push($object["loadup"]["stack"], array("text" => "'_USER_PF_CAPSIGNS_' is fallback now '".@serialize(@_USER_PF_CAPSIGNS_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_USER_PF_CAPSIGNS_' is already '".@serialize(@_USER_PF_CAPSIGNS_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_USER_PF_SMSIGNS_")) { 
					define("_USER_PF_SMSIGNS_", 1);
					array_push($object["loadup"]["stack"], array("text" => "'_USER_PF_SMSIGNS_' is fallback now '".@serialize(@_USER_PF_SMSIGNS_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_USER_PF_SMSIGNS_' is already '".@serialize(@_USER_PF_SMSIGNS_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_USER_PF_SPSIGNS_")) { 
					define("_USER_PF_SPSIGNS_", 0);
					array_push($object["loadup"]["stack"], array("text" => "'_USER_PF_SPSIGNS_' is fallback now '".@serialize(@_USER_PF_SPSIGNS_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_USER_PF_SPSIGNS_' is already '".@serialize(@_USER_PF_SPSIGNS_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_USER_PF_NUMSIGNS_")) { 
					define("_USER_PF_NUMSIGNS_", 1);
					array_push($object["loadup"]["stack"], array("text" => "'_USER_PF_NUMSIGNS_' is fallback now '".@serialize(@_USER_PF_NUMSIGNS_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_USER_PF_NUMSIGNS_' is already '".@serialize(@_USER_PF_NUMSIGNS_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_USER_AUTOBLOCK_")) { 
					define("_USER_AUTOBLOCK_", 12000);
					array_push($object["loadup"]["stack"], array("text" => "'_USER_AUTOBLOCK_' is fallback now '".@serialize(@_USER_AUTOBLOCK_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_USER_AUTOBLOCK_' is already '".@serialize(@_USER_AUTOBLOCK_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_USER_WAIT_COUNTER_")) { 
					define("_USER_WAIT_COUNTER_", 120);
					array_push($object["loadup"]["stack"], array("text" => "'_USER_WAIT_COUNTER_' is fallback now '".@serialize(@_USER_WAIT_COUNTER_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_USER_WAIT_COUNTER_' is already '".@serialize(@_USER_WAIT_COUNTER_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_USER_LOG_SESSIONS_")) { 
					define("_USER_LOG_SESSIONS_", true);
					array_push($object["loadup"]["stack"], array("text" => "'_USER_LOG_SESSIONS_' is fallback now '".@serialize(@_USER_LOG_SESSIONS_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_USER_LOG_SESSIONS_' is already '".@serialize(@_USER_LOG_SESSIONS_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_USER_INITIAL_USERNAME_")) { 
					define("_USER_INITIAL_USERNAME_", "admin@admin.local");
					array_push($object["loadup"]["stack"], array("text" => "'_USER_INITIAL_USERNAME_' is fallback now ***REDACTED***"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_USER_INITIAL_USERNAME_' is already ***REDACTED***"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_USER_INITIAL_USERPASS_")) { 
					define("_USER_INITIAL_USERPASS_", "changeme");
					array_push($object["loadup"]["stack"], array("text" => "'_USER_INITIAL_USERPASS_' is fallback now ***REDACTED***"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_USER_INITIAL_USERPASS_' is already ***REDACTED***"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_USER_LOG_IP_")) { 
					define("_USER_LOG_IP_", false);
					array_push($object["loadup"]["stack"], array("text" => "'_USER_LOG_IP_' is fallback now '".@serialize(@_USER_LOG_IP_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_USER_LOG_IP_' is already '".@serialize(@_USER_LOG_IP_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				// Email Default Headers
				if(!defined("_SMTP_MAILS_FOOTER_")) { 
					define("_SMTP_MAILS_FOOTER_", '</div></body></html>');
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_MAILS_FOOTER_' is fallback now"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_MAILS_FOOTER_' is already set"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_SMTP_MAILS_HEADER_")) { 
					define("_SMTP_MAILS_HEADER_", '<!doctype html><html><head><meta name="viewport" content="width=device-width, initial-scale=1.0"/><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><style>body { background-color: #121212; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; } .content { background: #FFFFFF; box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px; border-radius: 5px; margin-top: 15px;  }  .footer { clear: both; margin-top: 10px; text-align: center; width: 100%; color: #000000; font-size: 12px; text-align: center;  }  h1, h2, h3, h4 { color: #000000; font-family: sans-serif; font-weight: 400; line-height: 1.4; margin: 0; margin-bottom: 30px; }  h1 { font-size: 35px; font-weight: 300; text-align: center; text-transform: capitalize; }  a { color: blue; text-decoration: none; } hr { border: 0; border-bottom: 1px solid #242424; margin: 20px 0; }  @media only screen and (max-width: 620px) { div.content { margin-top: 2vw !important; margin-left: 2vw !important; margin-right: 2vw !important;}} a:hover { color: black; } .alert { padding: 15px; margin: 5px; border-radius: 5px; } .alert-danger { background: #FFCDD2; } .alert-success { background: #A5D6A7; } .alert-warning { background: #FFF9C4; }</style></head><body><div class="content">');
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_MAILS_HEADER_' is fallback now"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_MAILS_HEADER_' is already set"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				// Redis
				if(!defined("_REDIS_")) { 
					define("_REDIS_", false);
					array_push($object["loadup"]["stack"], array("text" => "'_REDIS_' is fallback now '".@serialize(@_REDIS_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_REDIS_' is already '".@serialize(@_REDIS_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_REDIS_HOST_")) { 
					define("_REDIS_HOST_", "localhost");
					array_push($object["loadup"]["stack"], array("text" => "'_REDIS_HOST_' is fallback now '".@serialize(@_REDIS_HOST_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_REDIS_HOST_' is already '".@serialize(@_REDIS_HOST_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_REDIS_PORT_")) { 
					define("_REDIS_PORT_", 6379);
					array_push($object["loadup"]["stack"], array("text" => "'_REDIS_PORT_' is fallback now '".@serialize(@_REDIS_PORT_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_REDIS_PORT_' is already '".@serialize(@_REDIS_PORT_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_REDIS_PREFIX_")) { 
					define("_REDIS_PREFIX_", "");
					array_push($object["loadup"]["stack"], array("text" => "'_REDIS_PREFIX_' is fallback now '".@serialize(@_REDIS_PREFIX_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_REDIS_PREFIX_' is already '".@serialize(@_REDIS_PREFIX_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				// Referer and IT Limit
				if(!defined("_HIVE_IP_LIMIT_")) { 
					define("_HIVE_IP_LIMIT_", 100000);
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_IP_LIMIT_' is fallback now '".@serialize(@_HIVE_IP_LIMIT_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_IP_LIMIT_' is already '".@serialize(@_HIVE_IP_LIMIT_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_HIVE_REFERER_")) { 
					define("_HIVE_REFERER_", false);
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_REFERER_' is fallback now '".@serialize(@_HIVE_REFERER_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_REFERER_' is already '".@serialize(@_HIVE_REFERER_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}					
				// SMTP Data
				if(!defined("_SMTP_HOST_")) { 
					define("_SMTP_HOST_", false);
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_HOST_' is fallback now '".@serialize(@_SMTP_HOST_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_HOST_' is already '".@serialize(@_SMTP_HOST_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_SMTP_PORT_")) { 
					define("_SMTP_PORT_", false);
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_PORT_' is fallback now '".@serialize(@_SMTP_PORT_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_PORT_' is already '".@serialize(@_SMTP_PORT_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_SMTP_AUTH_")) { 
					define("_SMTP_AUTH_", false);
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_AUTH_' is fallback now '".@serialize(@_SMTP_AUTH_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_AUTH_' is already '".@serialize(@_SMTP_AUTH_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_SMTP_USER_")) { 
					define("_SMTP_USER_", false);
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_USER_' is fallback now ***REDACTED***"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_USER_' is already ***REDACTED***"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_SMTP_PASS_")) { 
					define("_SMTP_PASS_", false);
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_PASS_' is fallback now ***REDACTED***"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_PASS_' is already ***REDACTED***"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_SMTP_SENDER_NAME_")) { 
					define("_SMTP_SENDER_NAME_", false);
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_SENDER_NAME_' is fallback now '".@serialize(@_SMTP_SENDER_NAME_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_SENDER_NAME_' is already '".@serialize(@_SMTP_SENDER_NAME_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_SMTP_SENDER_MAIL_")) { 
					define("_SMTP_SENDER_MAIL_", false);
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_SENDER_MAIL_' is fallback now '".@serialize(@_SMTP_SENDER_MAIL_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_SENDER_MAIL_' is already '".@serialize(@_SMTP_SENDER_MAIL_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}		
				if(!defined("_SMTP_INSECURE_")) { 
					define("_SMTP_INSECURE_", true);
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_INSECURE_' is fallback now '".@serialize(@_SMTP_INSECURE_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_INSECURE_' is already '".@serialize(@_SMTP_INSECURE_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_SMTP_DEBUG_")) { 
					define("_SMTP_DEBUG_", 0);
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_DEBUG_' is fallback now '".@serialize(@_SMTP_DEBUG_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_DEBUG_' is already '".@serialize(@_SMTP_DEBUG_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(!defined("_SMTP_MAILS_IN_HTML_")) { 
					define("_SMTP_MAILS_IN_HTML_", true);
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_MAILS_IN_HTML_' is fallback now '".@serialize(@_SMTP_MAILS_IN_HTML_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_SMTP_MAILS_IN_HTML_' is already '".@serialize(@_SMTP_MAILS_IN_HTML_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				// Various Variables
				if(!defined("_HIVE_TITLE_")) { 
					define("_HIVE_TITLE_", "CMS");
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_TITLE_' is fallback now '".@serialize(@_HIVE_TITLE_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_TITLE_' is already '".@serialize(@_HIVE_TITLE_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_UPDATER_TITLE_")) { 
					define("_UPDATER_TITLE_", _HIVE_TITLE_);
					array_push($object["loadup"]["stack"], array("text" => "'_UPDATER_TITLE_' is fallback now '".@serialize(@_UPDATER_TITLE_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_UPDATER_TITLE_' is already '".@serialize(@_UPDATER_TITLE_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_HIVE_SITE_URL_")) { 
					define("_HIVE_SITE_URL_", _HIVE_URL_REL_);
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_URL_' is fallback now '".@serialize(@_HIVE_SITE_URL_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_URL_' is already '".@serialize(@_HIVE_SITE_URL_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_HIVE_SITE_REL_")) { 
					define("_HIVE_SITE_REL_", _HIVE_URL_REL_."_site/"._HIVE_MODE_."/");
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_REL_' is fallback now '".@serialize(@_HIVE_SITE_REL_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITE_REL_' is already '".@serialize(@_HIVE_SITE_REL_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_HIVE_SITEC_REL_")) { 
					define("_HIVE_SITEC_REL_", _HIVE_URLC_REL_."_site/"._HIVE_MODE_."/");
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITEC_REL_' is fallback now '".@serialize(@_HIVE_SITEC_REL_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SITEC_REL_' is already '".@serialize(@_HIVE_SITEC_REL_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_HIVE_JS_ACTION_ACTIVE_")) { 
					define("_HIVE_JS_ACTION_ACTIVE_", false);
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_JS_ACTION_ACTIVE_' is fallback now '".@serialize(@_HIVE_JS_ACTION_ACTIVE_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_JS_ACTION_ACTIVE_' is already '".@serialize(@_HIVE_JS_ACTION_ACTIVE_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}								
				
			#################################################################################################################################################
			/* MySQL Debug Mode? [xxxx335] */
			#################################################################################################################################################
				array_push($object["loadup"]["stack"], array("text" => "-------------------- MySQL Check for Debug Mode Activation [xxxx335]"));
				hive___stackecho($object["loadup"]["stack"]);		
				if(defined("_HIVE_MYSQL_DEBUG_")) { 
					if(_HIVE_MYSQL_DEBUG_) { 
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_MYSQL_DEBUG_' is '".@serialize(@_HIVE_MYSQL_DEBUG_)."'"));
						hive___stackecho($object["loadup"]["stack"]);
						$object["mysql"]->stop_on_error(); 
						$object["mysql"]->display_on_error(); 
					} else {
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_MYSQL_DEBUG_' is '".@serialize(@_HIVE_MYSQL_DEBUG_)."'"));
						hive___stackecho($object["loadup"]["stack"]);
					}
				} else { 
					define("_HIVE_MYSQL_DEBUG_", false);
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_MYSQL_DEBUG_' is fallback '".@serialize(@_HIVE_MYSQL_DEBUG_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
					define("_HIVE_MYSQL_DEBUG_", false); 
				} 

			#################################################################################################################################################
			// User Init [xxxx336]
			#################################################################################################################################################
				array_push($object["loadup"]["stack"], array("text" => "-------------------- User init [xxxx336]"));
				hive___stackecho($object["loadup"]["stack"]);	
				$object["user"] = new x_class_user($object["mysql"], _TABLE_USER_, _TABLE_USER_SESSION_, _HIVE_COOKIE_, _USER_INITIAL_USERNAME_, _USER_INITIAL_USERPASS_, 1); 
				$object["user"]->multi_login(_USER_MULTI_LOGIN_);	
				$object["user"]->login_recover_drop(_USER_REC_DROP_);	
				$object["user"]->user_unique(false);
				$object["user"]->mail_unique(true);
				$object["user"]->login_field_mail();
				$object["user"]->log_ip(_USER_LOG_IP_);
				$object["user"]->log_activation(_USER_LOG_SESSIONS_);
				$object["user"]->log_session(_USER_LOG_SESSIONS_);
				$object["user"]->log_recover(_USER_LOG_SESSIONS_);
				$object["user"]->log_mail_edit(_USER_LOG_SESSIONS_);
				$object["user"]->wait_activation_min(_USER_WAIT_COUNTER_);
				$object["user"]->wait_recover_min(_USER_WAIT_COUNTER_);
				$object["user"]->wait_mail_edit_min(_USER_WAIT_COUNTER_);
				if(_USER_AUTOBLOCK_ > 0) { $tmp_autoblock = _USER_AUTOBLOCK_; }
					else { $tmp_autoblock = false; }
				$object["user"]->autoblock($tmp_autoblock);
				unset($tmp_autoblock);
				$object["user"]->min_activation(_USER_TOKEN_TIME_);
				$object["user"]->min_recover(_USER_TOKEN_TIME_);
				$object["user"]->min_mail_edit(_USER_TOKEN_TIME_);
				$object["user"]->sessions_days(_USER_MAX_SESSION_);
				$object["user"]->cookies_use(true);
				$object["user"]->cookies_days(_USER_MAX_SESSION_);	
				$object["user"]->passfilter(_USER_PF_SIGNS_, _USER_PF_CAPSIGNS_, _USER_PF_SMSIGNS_, _USER_PF_SPSIGNS_, _USER_PF_NUMSIGNS_);	
				$object["user"]->groups(_TABLE_USER_GROUP_, _TABLE_USER_GROUP_LINK_);		
				$object["user"]->extrafields(_TABLE_USER_EXTRAFIELDS_);		
				$object["user"]->init();	
				array_push($object["loadup"]["stack"], array("text" => "'object[user]' is now x_class_user"));
				hive___stackecho($object["loadup"]["stack"]);

			#################################################################################################################################################
			// User Permissions [xxxx337]
			#################################################################################################################################################
				array_push($object["loadup"]["stack"], array("text" => "-------------------- User permissions init [xxxx337]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) { 
					$object["perm_user"]  = new x_class_perm($object["mysql"], _TABLE_USER_PERM_, _HIVE_MODE_);
					array_push($object["loadup"]["stack"], array("text" => "'object[perm_user]' is now x_class_perm"));
					hive___stackecho($object["loadup"]["stack"]);
					$object["perm_group"] = new x_class_perm($object["mysql"], _TABLE_USER_GROUP_PERM_, _HIVE_MODE_);	
					array_push($object["loadup"]["stack"], array("text" => "'object[perm_group]' is now x_class_perm"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					$object["perm_group"] = false;
					$object["perm_user"] = false;
					array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!!!!!!!!! No relative classes for perm set as _HIVE_INTERNAL_INIT_ERROR_ is set."));
					hive___stackecho($object["loadup"]["stack"]);
				}
				$object["perm_group_glob"] 	= 	new x_class_perm($object["mysql"], _TABLE_USER_GROUP_PERM_, "");	
				array_push($object["loadup"]["stack"], array("text" => "'object[perm_group_glob]' is now x_class_perm"));
				hive___stackecho($object["loadup"]["stack"]);
				$object["perm_user_glob"] 	= 	new x_class_perm($object["mysql"], _TABLE_USER_PERM_, "");
				array_push($object["loadup"]["stack"], array("text" => "'object[perm_user_glob]' is now x_class_perm"));
				hive___stackecho($object["loadup"]["stack"]);	

			#################################################################################################################################################
			// Create Permission Item for Current User [xxxx338]
			#################################################################################################################################################
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Create Permission Item for Current User [xxxx338]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) { 
					if(@is_numeric(@$object["user"]->user_id)) {
						$object["user_perm"] = $object["perm_user"]->item($object["user"]->user_id);	
						array_push($object["loadup"]["stack"], array("text" => "'object[user_perm]' is now x_class_perm_item"));
						hive___stackecho($object["loadup"]["stack"]);
						$object["user_perm_glob"] = $object["perm_user_glob"]->item($object["user"]->user_id);	
						array_push($object["loadup"]["stack"], array("text" => "'object[user_perm_glob]' is now x_class_perm_item"));
						hive___stackecho($object["loadup"]["stack"]);
					} else {
						$object["user_perm"] = false;
						$object["user_perm_glob"] = false;
						array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!!!!!!!!! No relative classes for perm set as user is not logged in"));
						hive___stackecho($object["loadup"]["stack"]);
					}
				} else {
					$object["user_perm"] = false;
					$object["user_perm_glob"] = false;
					array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!!!!!!!!! No relative classes for user perm set as _HIVE_INTERNAL_INIT_ERROR_ is set."));
					hive___stackecho($object["loadup"]["stack"]);
				}			
				
			#################################################################################################################################################
			// Prepare Arrays for User Groups and Permissions {xxxx339]
			#################################################################################################################################################
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Prepare Arrays for User Groups and Permissions [xxxx339]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) { 
					if(@is_numeric(@$object["user"]->user_id)) {
						$object["user_group"] = array();
						$tmp = $object["mysql"]->select("SELECT * FROM "._TABLE_USER_GROUP_LINK_." WHERE fk_user = '".@$object["user"]->user_id."'", true);
						if(is_array($tmp)) {
							foreach($tmp AS $key => $value) {
								$valuex = $object["mysql"]->select("SELECT * FROM "._TABLE_USER_GROUP_." WHERE id = '".$value["fk_group"]."'", false);
								if(!is_array($valuex)) { continue; }
								array_push($object["loadup"]["stack"], array("text" => "Found group for user: '".@$valuex["id"]."'"));
								hive___stackecho($object["loadup"]["stack"]);
								$valuex["perm_obj"] = $object["perm_group"]->item($value["fk_group"]);
								$valuex["perm_obj_glob"] = $object["perm_group_glob"]->item($value["fk_group"]);
								array_push($object["user_group"], $valuex);
							}	
						} unset($tmp);	
						array_push($object["loadup"]["stack"], array("text" => "'object[user_group]' now set with: '".@serialize(@$object["user_group"])."'"));
						hive___stackecho($object["loadup"]["stack"]);
					} else {
						$object["user_group"] = false;
						array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!!!!!!!!! No user group definitions set as user is not logged in"));
						hive___stackecho($object["loadup"]["stack"]);
					}
				} else {
					$object["user_group"] = false;
					array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!!!!!!!!! No user group definitions set."));
					hive___stackecho($object["loadup"]["stack"]);
				}	

			#################################################################################################################################################
			// Init Site Modules mysql Files [xxxx340]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Init Site Modules mysql Files [xxxx340]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
					$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_); 
					// Site Modules
					foreach (glob($object["path"]."/_site/"._HIVE_MODE_."/_mysql/mysql.*.php") as $filename) { 
						if(@basename($filename) == "index.php") { continue; } 
						if(!$object["mysql"]->table_exists(_HIVE_SITE_PREFIX_.substr(basename($filename), 6, -4))) {
							$object["log_tmp"]->warning("[CORE] [MYSQL] [INSTALL] [TABLE] ".@htmlspecialchars(_HIVE_SITE_PREFIX_.substr(basename($filename), 6, -4) ?? '' )." [SITE] ".@htmlspecialchars(_HIVE_MODE_ ?? '')."", "mysql");
							require_once($filename);
							$object["mysql"]->free_all();					
							array_push($object["loadup"]["stack"], array("text" => "Table installed for site module '".@_HIVE_MODE_."': '".$filename."'"));
							hive___stackecho($object["loadup"]["stack"]);
						} else { 
							array_push($object["loadup"]["stack"], array("text" => "Table is already installed for site module '".@_HIVE_MODE_."': '".$filename."'"));
							hive___stackecho($object["loadup"]["stack"]);
						}
					}
					// Extension Libraries
					foreach ($object["extensions_path"] as $hive_extension_loader_current_init) {
						$object["extension"] = hive__init_extension_header($object, basename($hive_extension_loader_current_init)); 
						foreach (glob($hive_extension_loader_current_init."/_mysql/mysql.*.php") as $filenamemm){
							if(@basename($filenamemm) == "index.php") { continue; } 
							if(!$object["mysql"]->table_exists($object["extension"]["prefix"].substr(basename($filenamemm), 6, -4))) {
								$object["log"]->warning("[CORE] [MYSQL] [INSTALL] [TABLE] ".@htmlspecialchars($object["extension"]["prefix"].substr(basename($filenamemm), 6, -4) ?? '' )." [SITE] "._HIVE_MODE_." [EXT] ".htmlspecialchars($object["extension"]["name"] ?? '') ."", "mysql");
								require_once($filenamemm);
								$object["mysql"]->free_all();
								array_push($object["loadup"]["stack"], array("text" => "Table installed for site module '".@_HIVE_MODE_."' on extension ['".htmlspecialchars($object["extension"]["name"] ?? '')."': '".$filenamemm."'"));
								hive___stackecho($object["loadup"]["stack"]);
							} else {
								array_push($object["loadup"]["stack"], array("text" => "Table is already installed for site module '".@_HIVE_MODE_."' on extension ['".htmlspecialchars($object["extension"]["name"] ?? '')."']: '".$filenamemm."'"));
								hive___stackecho($object["loadup"]["stack"]);
							}
						}	
					}	
				} else {
					array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!!!!!!!!! No site module tables installed _HIVE_INTERNAL_INIT_ERROR_ is set."));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				// Clear Temp Log
				array_push($object["loadup"]["stack"], array("text" => "Clearing object[log_tmp]"));
				hive___stackecho($object["loadup"]["stack"]);
				unset($object["log_tmp"]); 


			#################################################################################################################################################
			// Init Referer Class [xxxx341]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Init Referer Class [xxxx341]"));
				hive___stackecho($object["loadup"]["stack"]);		
				if(defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
					$tmp_type = ""; 
					array_push($object["loadup"]["stack"], array("text" => "'object[referer]' set to x_class_referer with global scope"));
					hive___stackecho($object["loadup"]["stack"]);
				} else { 
					$tmp_type = _HIVE_MODE_; 
					array_push($object["loadup"]["stack"], array("text" => "'object[referer]' set to x_class_referer with site mode scope"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				if(@$_SERVER["HTTP_HOST"]) { 
					$tmp_host = @$_SERVER["HTTP_HOST"]; 
				} else { 
					$tmp_host = ""; 
				}
				$object["referer"] = new x_class_referer($object["mysql"], _TABLE_LOG_REFERER_, $tmp_host);	
				if(_HIVE_REFERER_) 	{ 
					$object["referer"]->execute($tmp_type); 
					array_push($object["loadup"]["stack"], array("text" => "'object[referer]->execute' has been executed"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'object[referer]->execute' has not been executed"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				unset($tmp_host);
				unset($tmp_type);					

			#################################################################################################################################################
			// Init Redis Class [xxxx342]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Init Redis Class [xxxx342]"));
				hive___stackecho($object["loadup"]["stack"]);		
				if(_REDIS_) {
					$object["redis"] = new x_class_redis(_REDIS_HOST_, _REDIS_PORT_, _REDIS_PREFIX_);
					array_push($object["loadup"]["stack"], array("text" => "'object[redis]' set to x_class_redis"));
					hive___stackecho($object["loadup"]["stack"]);
				} else { 
					$object["redis"] = false;
					array_push($object["loadup"]["stack"], array("text" => "'object[redis]' set to false because _REDIS_ is false"));
					hive___stackecho($object["loadup"]["stack"]);
				}
				
			#################################################################################################################################################
			// Init ipbl Class [xxxx343]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Init ipbl Class [xxxx343]"));
				hive___stackecho($object["loadup"]["stack"]);						
				$object["ipbl"] = new x_class_ipbl($object["mysql"], _TABLE_LOG_IP_, _HIVE_IP_LIMIT_);	
				array_push($object["loadup"]["stack"], array("text" => "'object[ipbl]' set to x_class_ipbl with global scope"));
				hive___stackecho($object["loadup"]["stack"]);
			
			#################################################################################################################################################
			// Config Curl Class [xxxx344]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Config Curl Class [xxxx344]"));
				hive___stackecho($object["loadup"]["stack"]);							
				if(defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
					$tmp_type = ""; 
					array_push($object["loadup"]["stack"], array("text" => "'object[curl]' set to x_class_referer with global scope"));
					hive___stackecho($object["loadup"]["stack"]);
				} else { 
					$tmp_type = _HIVE_MODE_; 
					array_push($object["loadup"]["stack"], array("text" => "'object[curl]' set to x_class_referer with site mode scope"));
					hive___stackecho($object["loadup"]["stack"]);
				}			
				$object["curl"]->logging($object["mysql"], _HIVE_CURL_LOGGING_, true, _TABLE_LOG_CURL_, $tmp_type);	
				unset($tmp_type);			
			
			#################################################################################################################################################
			// Config Mail Class [xxxx345]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Config Mail Class [xxxx345]"));
				hive___stackecho($object["loadup"]["stack"]);							
				if(defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
					$tmp_type = ""; 
					array_push($object["loadup"]["stack"], array("text" => "'object[mail]' set to x_class_referer with global scope logging"));
					hive___stackecho($object["loadup"]["stack"]);
				} else { 
					$tmp_type = _HIVE_MODE_; 
					array_push($object["loadup"]["stack"], array("text" => "'object[mail]' set to x_class_referer with site mode scope logging"));
					hive___stackecho($object["loadup"]["stack"]);
				}			
				$object["mail"] = new x_class_mail(_SMTP_HOST_, _SMTP_PORT_, _SMTP_AUTH_, _SMTP_USER_, _SMTP_PASS_, _SMTP_SENDER_MAIL_, _SMTP_SENDER_NAME_);
				$object["mail"]->initReplyTo(_SMTP_SENDER_MAIL_, _SMTP_SENDER_NAME_);
				$object["mail"]->change_default_template(_SMTP_MAILS_HEADER_, _SMTP_MAILS_FOOTER_);		
				$object["mail"]->all_default_html(_SMTP_MAILS_IN_HTML_);	
				$object["mail"]->smtpdebuglevel(_SMTP_DEBUG_);	
				$object["mail"]->allow_insecure_ssl_connections(_SMTP_INSECURE_);		
				$object["mail"]->logging($object["mysql"], _TABLE_LOG_MAIL_, false, $tmp_type);	
				unset($tmp_type);				

			#################################################################################################################################################
			// Config Mail Template Class [xxxx346]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Config Mail Template Class (Lang-Non Speficic) [xxxx346]"));
				hive___stackecho($object["loadup"]["stack"]);				
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
					$object["mail_template"] = new x_class_mail_template($object["mysql"], _TABLE_MAIL_TPL_, _HIVE_MODE_, "");
					$object["mail_template"]->set_header(_SMTP_MAILS_HEADER_);
					$object["mail_template"]->set_footer(_SMTP_MAILS_FOOTER_);							
					array_push($object["loadup"]["stack"], array("text" => "'object[mail]' set to x_class_referer with site module scope"));
					hive___stackecho($object["loadup"]["stack"]);
				} else { 
					$object["mail_template"] = false;
					array_push($object["loadup"]["stack"], array("text" => "'object[mail_template]' set false"));
					hive___stackecho($object["loadup"]["stack"]);
				}				
			
			#################################################################################################################################################
			/* Get Current URL Data and Setup [xxxx347] */
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Get Current URL Data and Setup [xxxx347]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!_HIVE_URL_SEO_) { 
					define('_HIVE_URL_CUR_', array(@$_GET[_HIVE_URL_GET_[0]], @$_GET[_HIVE_URL_GET_[1]], @$_GET[_HIVE_URL_GET_[2]], @$_GET[_HIVE_URL_GET_[3]], @$_GET[_HIVE_URL_GET_[4]]));  
					array_push($object["loadup"]["stack"], array("text" => "Default Get Variables used."));
					hive___stackecho($object["loadup"]["stack"]);
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_URL_CUR_' is now '".@serialize(@_HIVE_URL_CUR_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {   
					array_push($object["loadup"]["stack"], array("text" => "Rewrite SEO Friendly Location Variables used."));
					hive___stackecho($object["loadup"]["stack"]);
					if(isset($_GET[_HIVE_URL_SEO_GETVAR_])) { 
						$tmp = explode("/", @$_GET[_HIVE_URL_SEO_GETVAR_]); 
						define('_HIVE_URL_CUR_', array(@$tmp[0], @$tmp[1], @$tmp[2], @$tmp[3], @$tmp[4]));
					} else {
						define('_HIVE_URL_CUR_', array(false, false, false, false, false));
					}
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_URL_CUR_' is now '".@serialize(@_HIVE_URL_CUR_)."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_URL_SEO_GETVAR_' is already '".@serialize(@_HIVE_URL_SEO_GETVAR_)."'"));
					hive___stackecho($object["loadup"]["stack"]);						
				}				

			#################################################################################################################################################
			/* Language Init [xxxx361] */
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Language Init [xxxx361]"));
				hive___stackecho($object["loadup"]["stack"]);	
				// Just Create the Language Table
				$object["lang"] = new x_class_lang($object["mysql"], _TABLE_LANG_, false, false, false);	
				// If not init error proceed
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) {		
					// Check for Var init
					if(!defined("_HIVE_LANG_ARRAY_")) 	{ 
						define("_HIVE_LANG_ARRAY_", 	array()); 
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_LANG_ARRAY_' is fallback now '".@serialize(@_HIVE_LANG_ARRAY_)."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					} else {
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_LANG_ARRAY_' is already '".@serialize(@_HIVE_LANG_ARRAY_)."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}			
					if(!defined("_HIVE_LANG_DEFAULT_")) 	{ 
						define("_HIVE_LANG_DEFAULT_", 	"en"); 
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_LANG_DEFAULT_' is fallback now '".@serialize(@_HIVE_LANG_DEFAULT_)."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					} else {
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_LANG_DEFAULT_' is already '".@serialize(@_HIVE_LANG_DEFAULT_)."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}			
					unset($object["lang"]);
					// Set Default if not set or wrong
					if(isset($_SESSION[_HIVE_SITE_COOKIE_."hive_language"])) {
						if(in_array($_SESSION[_HIVE_SITE_COOKIE_."hive_language"], _HIVE_LANG_ARRAY_)) {
						} else { 
							$_SESSION[_HIVE_SITE_COOKIE_."hive_language"] = _HIVE_LANG_DEFAULT_; 
							array_push($object["loadup"]["stack"], array("text" => "'_SESSION[_HIVE_SITE_COOKIE_.hive_language]' is fallen back to '".@serialize(@_HIVE_LANG_DEFAULT_)."'"));
							hive___stackecho($object["loadup"]["stack"]);
						}
					} else { 
						$_SESSION[_HIVE_SITE_COOKIE_."hive_language"] = _HIVE_LANG_DEFAULT_;
						array_push($object["loadup"]["stack"], array("text" => "'_SESSION[_HIVE_SITE_COOKIE_.hive_language]' is fallen back to '".@serialize(@_HIVE_LANG_DEFAULT_)."'"));
						hive___stackecho($object["loadup"]["stack"]);
					}		
					// Load Users Prefered Language if none set.
					if($object["user"]->user_loggedIn AND is_array($object["hive_mode"])) {
						$tmp = $object["user"]->user["hive_extradata"];
						$tmp = @unserialize($tmp);
						if(is_array(@$tmp[_HIVE_MODE_])) {
							if(isset($tmp[_HIVE_MODE_]["lang"]) AND @$tmp[_HIVE_MODE_]["lang"] AND @trim(@$tmp[_HIVE_MODE_]["lang"] ?? '') != "") {
								if(@in_array(@$tmp[_HIVE_MODE_]["lang"], _HIVE_LANG_ARRAY_)) {
									$_SESSION[_HIVE_SITE_COOKIE_."hive_language"] = @$tmp[_HIVE_MODE_]["lang"];	
									array_push($object["loadup"]["stack"], array("text" => "'_SESSION[_HIVE_SITE_COOKIE_.hive_language]' is set by hive-data in user login table: '".@serialize(@$tmp[_HIVE_MODE_]["lang"])."'"));
									hive___stackecho($object["loadup"]["stack"]);					
								}
							}
						}
					} unset($tmp); 			
					// Save in Variable
					define("_HIVE_LANG_", $_SESSION[_HIVE_SITE_COOKIE_."hive_language"]);	
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_LANG_' is now '".@serialize(@_HIVE_LANG_)."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					array_push($object["loadup"]["stack"], array("text" => "'_SESSION[_HIVE_SITE_COOKIE_.hive_language]' is now '".@serialize(@_HIVE_LANG_)."'"));
					hive___stackecho($object["loadup"]["stack"]);					
					// Load Current Core Language
					$object["lang_tmp_def"] = new x_class_lang(false, false, false, false, $object["path"]."/_core/_lang/"._HIVE_LANG_.".php"); 
					// Load Current Site Module Language
					$object["lang"] = new x_class_lang(false, false, false, false, _HIVE_SITE_PATH_."/_lang/"._HIVE_LANG_.".php"); 						
					// Merge Core and Site Modules Languages, Site Module Language has higher Priority
					if(is_array($object["lang_tmp_def"]->array)) { 
					foreach($object["lang_tmp_def"]->array as $key => $value) {	
						if(@!$object["lang"]->array[$key]) { $object["lang"]->array[$key] = $value; }
					} } unset($object["lang_tmp_def"]); 
					// Load Database Table Language
					$object["lang_tmp"] = new x_class_lang($object["mysql"], _TABLE_LANG_, _HIVE_LANG_, _HIVE_MODE_, false);
					// Merge Core and Database Languages, Database Language has higher Priority
					foreach($object["lang_tmp"]->array as $key => $value) { 
						$object["lang"]->array[$key] = $value; 
					}
					// Unset unnecessary
					unset($object["lang_tmp_def"]); 
					unset($object["lang_tmp"]);
				} else { 
					$object["lang"] = new x_class_lang(false, false, false, false, $object["path"]."/_core/_lang/en.php");
					array_push($object["loadup"]["stack"], array("text" => "'object[lang]' is now false"));
					hive___stackecho($object["loadup"]["stack"]);	
					array_push($object["loadup"]["stack"], array("text" => "'!!!!!!!!!!!!!!!!! Error - Skipped because of _HIVE_INTERNAL_VERSION_ERROR_"));
					hive___stackecho($object["loadup"]["stack"]);
				}	

			#################################################################################################################################################
			/* Theme Init [xxxx362] */
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Theme Init [xxxx362]"));
				hive___stackecho($object["loadup"]["stack"]);		
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) {			
					// Check for Var init
					if(!defined("_HIVE_THEME_ARRAY_")) 	{ 
						define("_HIVE_THEME_ARRAY_", 	array()); 
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_THEME_ARRAY_' is fallback now '".@serialize(@_HIVE_THEME_ARRAY_)."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					} else {
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_THEME_ARRAY_' is already '".@serialize(@_HIVE_THEME_ARRAY_)."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}					
					if(!defined("_HIVE_THEME_DEFAULT_")) 	{ 
						define("_HIVE_THEME_DEFAULT_", 	false); 
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_THEME_DEFAULT_' is fallback now '".@serialize(@_HIVE_THEME_DEFAULT_)."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					} else {
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_THEME_DEFAULT_' is already '".@serialize(@_HIVE_THEME_DEFAULT_)."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}								
					// Check for Validity
					if(isset($_SESSION[_HIVE_SITE_COOKIE_."hive_theme"])) {
						if(@in_array(@$_SESSION[_HIVE_SITE_COOKIE_."hive_theme"], _HIVE_THEME_ARRAY_)) {
						} else { 
							$_SESSION[_HIVE_SITE_COOKIE_."hive_theme"] = _HIVE_THEME_DEFAULT_; 
							array_push($object["loadup"]["stack"], array("text" => "'_SESSION[_HIVE_SITE_COOKIE_.hive_theme]' is fallen back to '".@serialize(@_HIVE_THEME_DEFAULT_)."'"));
							hive___stackecho($object["loadup"]["stack"]);	
						}
					} else { 
						$_SESSION[_HIVE_SITE_COOKIE_."hive_theme"] = _HIVE_THEME_DEFAULT_; 
						array_push($object["loadup"]["stack"], array("text" => "'_SESSION[_HIVE_SITE_COOKIE_.hive_theme]' is fallen back to '".@serialize(@_HIVE_THEME_DEFAULT_)."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}		
					// If logged in restore Failsafed Theme on Site Module
					if($object["user"]->user_loggedIn AND is_array($object["hive_mode"])) {
						$tmp = $object["user"]->user["hive_extradata"];
						$tmp = @unserialize($tmp);
						if(is_array(@$tmp[_HIVE_MODE_])) {
							if(isset($tmp[_HIVE_MODE_]["theme"]) AND @$tmp[_HIVE_MODE_]["theme"] AND @trim(@$tmp[_HIVE_MODE_]["theme"] ?? '') != "") {
								if(@in_array(@$tmp[_HIVE_MODE_]["theme"], _HIVE_THEME_ARRAY_)) {
									$_SESSION[_HIVE_SITE_COOKIE_."hive_theme"] = @$tmp[_HIVE_MODE_]["theme"];	
									array_push($object["loadup"]["stack"], array("text" => "'_SESSION[_HIVE_SITE_COOKIE_.hive_theme]' is set by hive-data in user login table: '".@serialize(@$tmp[_HIVE_MODE_]["theme"])."'"));
									hive___stackecho($object["loadup"]["stack"]);				
								}
							}
						}
					} 			
					// Init some Variables
					define("_HIVE_THEME_", $_SESSION[_HIVE_SITE_COOKIE_."hive_theme"]); unset($tmp);
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_THEME_' is now '".@serialize(@_HIVE_THEME_)."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					array_push($object["loadup"]["stack"], array("text" => "'_SESSION[_HIVE_SITE_COOKIE_.hive_theme]' is now '".@serialize(@_HIVE_THEME_)."'"));
					hive___stackecho($object["loadup"]["stack"]);	
				} else { 
					array_push($object["loadup"]["stack"], array("text" => "'!!!!!!!!!!!!!!!!! Error - Skipped because of _HIVE_INTERNAL_VERSION_ERROR_"));
					hive___stackecho($object["loadup"]["stack"]);
				}	

			#################################################################################################################################################
			/* Color Init [xxxx363] */
			#################################################################################################################################################
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Color Init [xxxx363]"));
				hive___stackecho($object["loadup"]["stack"]);		
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) {		
					// Check for Var init
					if(!defined("_HIVE_THEME_COLOR_DEFAULT_")) 	{ 
						define("_HIVE_THEME_COLOR_DEFAULT_", 	"#FFFF00"); 
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_THEME_COLOR_DEFAULT_' is fallback now '".@serialize(@_HIVE_THEME_COLOR_DEFAULT_)."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					} else {
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_THEME_COLOR_DEFAULT_' is already '".@serialize(@_HIVE_THEME_COLOR_DEFAULT_)."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}
					// Reset Session Color
					if(isset($_SESSION[_HIVE_SITE_COOKIE_."hive_color"])) {
					} else { 
						$_SESSION[_HIVE_SITE_COOKIE_."hive_color"] = _HIVE_THEME_COLOR_DEFAULT_; 
						array_push($object["loadup"]["stack"], array("text" => "'_SESSION[_HIVE_SITE_COOKIE_.hive_color]' is fallen back to '".@serialize(@_HIVE_THEME_COLOR_DEFAULT_)."'"));
						hive___stackecho($object["loadup"]["stack"]);		
					}
					// Get Userdata Hive for Multi Site Saves
					if($object["user"]->user_loggedIn AND is_array($object["hive_mode"])) {
						$tmp = $object["user"]->user["hive_extradata"];
						$tmp = @unserialize($tmp);
						if(is_array(@$tmp[_HIVE_MODE_])) {
							if(isset($tmp[_HIVE_MODE_]["color"]) AND @$tmp[_HIVE_MODE_]["color"] AND @trim(@$tmp[_HIVE_MODE_]["color"] ?? '') != "") {
								$_SESSION[_HIVE_SITE_COOKIE_."hive_color"] = @$tmp[_HIVE_MODE_]["color"];	
								array_push($object["loadup"]["stack"], array("text" => "'_SESSION[_HIVE_SITE_COOKIE_.hive_color]' is set by hive-data in user login table: '".@serialize(@$tmp[_HIVE_MODE_]["color"])."'"));
								hive___stackecho($object["loadup"]["stack"]);				
							}
						}
					}							
					// Init some Variables
					define("_HIVE_COLOR_", $_SESSION[_HIVE_SITE_COOKIE_."hive_color"]); unset($tmp);
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_COLOR_' is now '".@serialize(@_HIVE_COLOR_)."'"));
					hive___stackecho($object["loadup"]["stack"]);	
					array_push($object["loadup"]["stack"], array("text" => "'_SESSION[_HIVE_SITE_COOKIE_.hive_color]' is now '".@serialize(@_HIVE_COLOR_)."'"));
					hive___stackecho($object["loadup"]["stack"]);		
				} else { 
					array_push($object["loadup"]["stack"], array("text" => "'!!!!!!!!!!!!!!!!! Error - Skipped because of _HIVE_INTERNAL_VERSION_ERROR_"));
					hive___stackecho($object["loadup"]["stack"]);
				}				
												
			#################################################################################################################################################
			/* Preload Init [xxxx364] */
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Preload Init [xxxx364]"));
				hive___stackecho($object["loadup"]["stack"]);		
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) {	
					// First init of Variables
					$object["hive_mode_config_pre"]["extension_lang"] = array();
					$object["hive_mode_config_pre"]["site_lang"] = array();			
					array_push($object["loadup"]["stack"], array("text" => "'object[hive_mode_config_pre][extension_lang]' is now empty array"));
					hive___stackecho($object["loadup"]["stack"]);	
					array_push($object["loadup"]["stack"], array("text" => "'object[hive_mode_config_pre][site_lang]' is now empty array"));
					hive___stackecho($object["loadup"]["stack"]);	
					// Get Hive Modules Preloaders
					if(is_array(_HIVE_MODE_ARRAY_)) { 
						foreach(_HIVE_MODE_ARRAY_ as $k => $v) {
							if(file_exists($object["path"]."/_site/".$v."/version.php")) { 
								$object["hive_mode_config_pre"]["site_lang"][$v] = false;
								$tmp_path = $object["path"]."/_site/".$v."/";
								array_push($object["loadup"]["stack"], array("text" => "'object[hive_mode_config_pre][extension_lang][".$v."]' is now site module language array"));
								hive___stackecho($object["loadup"]["stack"]);	
								// Language Array Information
								if(defined("_HIVE_LANG_")) { 
									if(file_exists($tmp_path."/_admin/_lang/"._HIVE_LANG_.".php")) {  
										// Looad if current language available in site module
										array_push($object["loadup"]["stack"], array("text" => "site mode preinit language: ".$tmp_path."/_admin/_lang/"._HIVE_LANG_.".php".""));
										hive___stackecho($object["loadup"]["stack"]);	
										$object["hive_mode_config_pre"]["site_lang"][$v] = new x_class_lang(false, false, false, false, $tmp_path."/_admin/_lang/"._HIVE_LANG_.".php");  
									} elseif(file_exists($tmp_path."/_admin/_lang/en.php")) { 
										// Use english language as fallback language
										array_push($object["loadup"]["stack"], array("text" => "site mode preinit fallback language: ".$tmp_path."/_admin/_lang/en.php".""));
										hive___stackecho($object["loadup"]["stack"]);	
										$object["hive_mode_config_pre"]["site_lang"][$v] = new x_class_lang(false, false, false, false, $tmp_path."/_admin/_lang/en.php");  
									} else { 
										// Set false if no language for this module found
										array_push($object["loadup"]["stack"], array("text" => "site mode preinit no language file found"));
										hive___stackecho($object["loadup"]["stack"]);	
										$object["hive_mode_config_pre"]["site_lang"][$v] = false; 
									}
									// Set Database overrides for Site Module or Extensions Language
									if(@is_object($object["hive_mode_config_pre"]["site_lang"][$v])) { 
										$tmp = new x_class_lang($object["mysql"], _TABLE_LANG_, @$_SESSION[_HIVE_SITE_COOKIE_."hive_language"], _HIVE_MODE_, false);	
										foreach($tmp->array as $key => $value) { 
											$nametoget = "___smd_".$v."_";
											$nametogetcounter = strlen($nametoget);
											if(substr($key, 0, $nametogetcounter) == $nametoget) { $object["hive_mode_config_pre"]["site_lang"][$v]->array[substr($key, $nametogetcounter)] = $value; } 
										}
									}
								}							
								// Unset some Variables
								unset($nametoget);
								unset($nametogetcounter);
								unset($tmp_path);
								unset($tmp);
							}					
						}
					}
					// Extensions Preinit
					if(is_array($object["extensions_path"])) {
						foreach($object["extensions_path"] as $k => $v) {
							if(file_exists($v."/version.php")) {
								$vpath = $v;
								$v = basename($v);
								$object["hive_mode_config_pre"]["extension_lang"][$v] = false;
								// Include Relative Extension Language Files
								if(defined("_HIVE_LANG_")) {
									if(file_exists($vpath."/_lang/"._HIVE_LANG_.".php")) { 
										// Take current language file
										array_push($object["loadup"]["stack"], array("text" => "site mode extension preinit  language: ".$vpath."/_lang/"._HIVE_LANG_.".php".""));
										hive___stackecho($object["loadup"]["stack"]);	
										$object["hive_mode_config_pre"]["extension_lang"][$v] = new x_class_lang(false, false, false, false, $vpath."/_lang/"._HIVE_LANG_.".php");  
									} elseif(file_exists($vpath."/_lang/en.php")) { 
										// Take fallback english language file
										array_push($object["loadup"]["stack"], array("text" => "site mode extension preinit  fallback language: ".$vpath."/_lang/en.php".""));
										hive___stackecho($object["loadup"]["stack"]);	
										$object["hive_mode_config_pre"]["extension_lang"][$v] = new x_class_lang(false, false, false, false, $vpath."/_lang/en.php");  
									} else { 
										// Take no language file
										array_push($object["loadup"]["stack"], array("text" => "site mode extension preinit no language found"));
										hive___stackecho($object["loadup"]["stack"]);
										$object["hive_mode_config_pre"]["extension_lang"][$v] 		= false; 
									}
								}
								// Override language from database
								$tmp = false;
								if(@is_object($object["hive_mode_config_pre"]["extension_lang"][$v])) { 
									$tmp = new x_class_lang($object["mysql"], _TABLE_LANG_, @$_SESSION[_HIVE_SITE_COOKIE_."hive_language"], _HIVE_MODE_, false);		
									foreach($tmp->array as $key => $value) { 
										$nametoget = "___ext_".$v."_";
										$nametogetcounter = strlen($nametoget);
										if(substr($key, 0, $nametogetcounter) == $nametoget) { $object["hive_mode_config_pre"]["extension_lang"][$v]->array[substr($key, $nametogetcounter)] = $value; } 
									}
								}	
								// Unset some Variables
								unset($nametoget);
								unset($nametogetcounter);	
								unset($tmp);
							}		
						}
					}		
				} else { 
					array_push($object["loadup"]["stack"], array("text" => "'!!!!!!!!!!!!!!!!! Error - Skipped because of _HIVE_INTERNAL_VERSION_ERROR_"));
					hive___stackecho($object["loadup"]["stack"]);
				}			
		

			#################################################################################################################################################
			// Config Mail Template Class [xxxx370]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Config Mail Template Class change Language to Choosen [xxxx370]"));
				hive___stackecho($object["loadup"]["stack"]);				
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
					$object["mail_template"] = new x_class_mail_template($object["mysql"], _TABLE_MAIL_TPL_, _HIVE_MODE_, _HIVE_LANG_);
					$object["mail_template"]->set_header(_SMTP_MAILS_HEADER_);
					$object["mail_template"]->set_footer(_SMTP_MAILS_FOOTER_);							
					array_push($object["loadup"]["stack"], array("text" => "'object[mail]' set to x_class_referer with site module scope"));
					hive___stackecho($object["loadup"]["stack"]);
				}			
				
			#################################################################################################################################################
			// Load Global_POST Configuration [xxxx390]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Load Global_POST Configuration [xxxx390]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_"))  {
					if(is_array(_HIVE_MODE_ARRAY_))  {
						foreach(_HIVE_MODE_ARRAY_ as $key => $value) {
							$object["hive_mode_config"] = hive__init_site_header($object, $value); 
							$realpath = _HIVE_SITE_PATH_."/".$value."/";
							if (file_exists($realpath."/_config/global_post.php")) {
								array_push($object["loadup"]["stack"], array("text" => "File include: '".$realpath."/_config/global_post.php"."'"));
								hive___stackecho($object["loadup"]["stack"]);	
								require_once($value."/_config/global_post.php");
							}
							
						}
					}
				} unset($object["hive_mode_config"]);

			#################################################################################################################################################
			// Load Configuration Post [xxxx391]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Load Post Configuration [xxxx391]"));
				hive___stackecho($object["loadup"]["stack"]);
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
					$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_); 
					// Sitemod
					if(file_exists($object["path"]."/_site/"._HIVE_MODE_."/_config/config_post.php")) { 
						array_push($object["loadup"]["stack"], array("text" => "File include: '".$object["path"]."/_site/"._HIVE_MODE_."/_config/config_post.php"."'"));
						hive___stackecho($object["loadup"]["stack"]);	
						require_once($object["path"]."/_site/"._HIVE_MODE_."/_config/config_post.php"); 
					} 
					// Extension Libraries
					foreach ($object["extensions_path"] as $hive_extension_loader_current_init) {
						if (file_exists($hive_extension_loader_current_init."/_config/config_post.php")) {
							$object["extension"] = hive__init_extension_header($object, basename($hive_extension_loader_current_init)); 
							array_push($object["loadup"]["stack"], array("text" => "File include: '".$hive_extension_loader_current_init."/_config/config_post.php"."'"));
							hive___stackecho($object["loadup"]["stack"]);
							require_once $hive_extension_loader_current_init."/_config/config_post.php";
						}
					} unset($object["extension"]);				
				} unset($object["hive_mode_config"]); unset($object["extension"]);	

			#################################################################################################################################################
			// Load Configuration Post [xxxx392]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Load Post Setting First Run Variable on Module if Success [xxxx392]"));
				hive___stackecho($object["loadup"]["stack"]);
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
					array_push($object["loadup"]["stack"], array("text" => "Setting up First Run Flags _HIVE_BUILD_FIRSTRUN_ONUPDATE_ & _HIVE_BUILD_FIRSTRUN_"));
					hive___stackecho($object["loadup"]["stack"]);
					$object["var"]->setup("_HIVE_BUILD_FIRSTRUN_",@htmlspecialchars( _HIVE_RNAME_ ?? ''), "Has this Module run for the first time without errors in Initializing?");					
					$object["var"]->setup("_HIVE_BUILD_FIRSTRUN_ONUPDATE_",@htmlspecialchars( _HIVE_RNAME_ ?? ''), "Has this Module run for the first time without errors in Initializing? (resets after update)");					
				} else {
					array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!! Error on run no flags for first run initialized"));
					hive___stackecho($object["loadup"]["stack"]);
				}		

			#################################################################################################################################################
			// Set Hive Mode config for current Module [xxxx392.1]
			#################################################################################################################################################
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Set Hive Mode config for current Module [xxxx392.1]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 			
					$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_); 
					array_push($object["loadup"]["stack"], array("text" => "'object[hive_mode_config]' now current site modulen info'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "!!!!!!!!!!!! Error on run no flags for first run initialized"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				
			#################################################################################################################################################
			// Robots.TXT Creation [xxxx393]
			#################################################################################################################################################
				array_push($object["loadup"]["stack"], array("text" => "------- Robots.TXT Creation [xxxx393]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!file_exists($object["path"]."/robots.txt")) {
					file_put_contents($object["path"]."/robots.txt", 
"###############################################################
## Suitefish Robots File
## Generated at: ".date("Y-m-d H:i:s")."
## Changes will be persistent!
###############################################################

###############################################################
## Sitemap Configuration
###############################################################
Sitemap: "._HIVE_URL_REL_."sitemap.xml

###############################################################
## Allow all user Agents
###############################################################
User-Agent: *

###############################################################
## Disallow specific directories
###############################################################
Disallow: "._HIVE_URLC_REL_."_api/*
Disallow: "._HIVE_URLC_REL_."_backup/*
Disallow: "._HIVE_URLC_REL_."_cache/*
Disallow: "._HIVE_URLC_REL_."_core/*
Disallow: "._HIVE_URLC_REL_."_cronjob/*
Disallow: "._HIVE_URLC_REL_."_data/*
Disallow: "._HIVE_URLC_REL_."_image/*
Disallow: "._HIVE_URLC_REL_."_sample/*
Disallow: "._HIVE_URLC_REL_."_site/*
Disallow: "._HIVE_URLC_REL_."_store/*
Disallow: "._HIVE_URLC_REL_."_template/*
Disallow: "._HIVE_URLC_REL_."cfg_ruleset.php
Disallow: "._HIVE_URLC_REL_."pkg.php
Disallow: "._HIVE_URLC_REL_."README.md
Disallow: "._HIVE_URLC_REL_."settings.php
Disallow: "._HIVE_URLC_REL_."updater.php");}		

			#################################################################################################################################################
			// Create HTAccess File [xxxx394]
			#################################################################################################################################################
				array_push($object["loadup"]["stack"], array("text" => "------- Create HTAccess File [xxxx394]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!file_exists($object["path"]."/.htaccess")) {	
					file_put_contents($object["path"]."/.htaccess", 
"###############################################################
## Htaccess File of Suitefish CMS
## This file has been auto generated at: ".date("Y-m-d H:i")."
## Changes will be persistent.
###############################################################

###############################################################
## Enable Rewriting - Do not comment this out!
###############################################################
RewriteEngine On

###############################################################
## HTTP -> HTTPS Rewrite
## Remove comment below to activate automatic HTTPS Rewriting if non HTTPS
###############################################################
#	RewriteCond %{HTTPS} !=on
#	RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

###############################################################
## Non-WWW -> WWW Rewrite
## Remove comment below to activate automatic non www to www forward
## Do not use together with WWW -> Non-WWW Rewrite
###############################################################
#	RewriteCond %{HTTP_HOST} ^[^.]+\.[^.]+$
#	RewriteRule ^(.*)$ http://www.%{HTTP_HOST}/$1 [L,R=301]	

###############################################################
## WWW -> Non WWW Rewrite
## Remove comment below to activate automatic non www to www forward
## Do not use together with Non-WWW -> WWW Rewrite
###############################################################
#	RewriteCond %{HTTP_HOST} ^www\.(.*)$ [NC]
#	RewriteRule ^(.*)$ https://%1/$1 [R=301,L]
	
###############################################################
## SEO Url Rewrite
###############################################################
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?hive__seo_tag_loc=$1 [L,QSA]

###############################################################
## Use mod_expires ?
## Comment out to use mod_expires if activated on your
## Apache Server instance.
###############################################################
#	<IfModule mod_expires.c>
#	  ExpiresActive On
#	   ExpiresByType image/jpeg \"access plus 1 year\"
#	   ExpiresByType image/gif \"access plus 1 year\"
#	   ExpiresByType image/png \"access plus 1 year\"
#	   ExpiresByType image/webp \"access plus 1 year\"
#	   ExpiresByType image/svg+xml \"access plus 1 year\"
#	   ExpiresByType image/x-icon \"access plus 1 year\" 
#	 
#	   ExpiresByType video/webm \"access plus 1 year\"
#	   ExpiresByType video/mp4 \"access plus 1 year\"
#	   ExpiresByType video/mpeg \"access plus 1 year\"
#
#	   ExpiresByType font/ttf \"access plus 1 year\"
#	   ExpiresByType font/otf \"access plus 1 year\"
#	   ExpiresByType font/woff \"access plus 1 year\"
#	   ExpiresByType font/woff2 \"access plus 1 year\"
#	   ExpiresByType application/font-woff \"access plus 1 year\"
#
#	   ExpiresByType text/css \"access plus 1 month\"
#	   ExpiresByType text/javascript \"access plus 1 month\"
#	   ExpiresByType application/javascript \"access plus 1 month\"
#
#	   ExpiresByType application/pdf \"access plus 1 month\"
#	   ExpiresByType image/vnd.microsoft.icon \"access plus 1 year\"
#	</IfModule>	

###############################################################
## Disable Directory Browsing for Security Purposes
###############################################################
Options -Indexes

###############################################################
## Lock Configuration Files
###############################################################
<Files \".htaccess\">  
  Order Allow,Deny
  Deny from all
</Files>
<Files \"cfg_ruleset.php\">  
  Order Allow,Deny
  Deny from all
</Files>
<Files \"pkg.php\">  
  Order Allow,Deny
  Deny from all
</Files>
<Files \"settings.php\">  
  Order Allow,Deny
  Deny from all
</Files>

###############################################################
## Custom Error Pages
## Comment this out if you dont want custom error pages to be used
###############################################################
ErrorDocument 400 "._HIVE_URLC_REL_."_core/_error/400.html
ErrorDocument 401 "._HIVE_URLC_REL_."_core/_error/401.html
ErrorDocument 403 "._HIVE_URLC_REL_."_core/_error/403.html
ErrorDocument 404 "._HIVE_URLC_REL_."_core/_error/404.html
ErrorDocument 500 "._HIVE_URLC_REL_."_core/_error/500.html
ErrorDocument 503 "._HIVE_URLC_REL_."_core/_error/503.html

###############################################################
## Lock Folders which should not be public accessible
## Do not comment this out (Seperate with |)
###############################################################
RewriteRule ^(_template|_cache|_backup|_sample) - [F,L]"); }	

			#################################################################################################################################################
			// End of Init Initialization
			#################################################################################################################################################	
			
		} else {
			
			#################################################################################################################################################
			// Load WITHOUT Site Module Specific Setup [xxxx400]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "------- Area for Initializing Global Data (Site Module Data is Prevented) [xxxx400]"));
				hive___stackecho($object["loadup"]["stack"]);
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_PREVENT_INIT_' is true!"));
				hive___stackecho($object["loadup"]["stack"]);	

			#################################################################################################################################################
			// Set Init Variables to False
			#################################################################################################################################################					
				$object["extensions_path"] 		= array();
				$object["hive_mode"] 			= false;
				unset($_SESSION[_HIVE_COOKIE_."hive_mode"]);

			#################################################################################################################################################
			// MySQL Initialization [xxxx407]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Init MySQL Connection [xxxx407]"));
				hive___stackecho($object["loadup"]["stack"]);		
				array_push($object["loadup"]["stack"], array("text" => "object[mysql] - x_class_mysql object"));
				hive___stackecho($object["loadup"]["stack"]);			
				$object["mysql"] = new x_class_mysql(@$mysql["host"], @$mysql["user"], @$mysql["pass"], @$mysql["db"], @$mysql["port"]);	
				if ($object["mysql"]->lasterror != false) { 
					array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
					hive___stackecho($object["loadup"]["stack"]);
					hive__error("Critical Error", "[000-002] A MySQL Database Connection could not be established.", "Please check your mysql database settings in settings.php.", true, 503);
					exit(); 
				}					

			#################################################################################################################################################
			// Initialize MySQL Logging [xxxx408]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Set up Global MySQL Logging [xxxx408]"));
				hive___stackecho($object["loadup"]["stack"]);					
				$object["mysql"]->log_config(_TABLE_LOG_MYSQL_, "");

			#################################################################################################################################################
			// Logging Class [xxxx409]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Set up Global Logging Classes [xxxx409]"));
				hive___stackecho($object["loadup"]["stack"]);		
				array_push($object["loadup"]["stack"], array("text" => "object[log] - x_class_log object"));
				hive___stackecho($object["loadup"]["stack"]);		
				// Default Glob Logging Class
				$object["log"] = new x_class_log($object["mysql"], _TABLE_LOG_, "");		
				// One Time Load API Parameter to Create the Table
				//$object["api_log"] = new x_class_log($object["mysql"], _TABLE_LOG_API_, "");
				//array_push($object["loadup"]["stack"], array("text" => "object[api_log] - x_class_log object"));
				//hive___stackecho($object["loadup"]["stack"]);	
				// Temp Global Logging Class	
				$object["log_tmp"] 	= new x_class_log($object["mysql"], _TABLE_LOG_, "");	

			#################################################################################################################################################
			// Install Core CMS MySQL Tables [xxxx410]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Install CMS MySQL Tables [xxxx410]"));
				hive___stackecho($object["loadup"]["stack"]);		
				if(!$object["mysql"]->table_exists($object["prefix"]."cms_store")) {
					array_push($object["loadup"]["stack"], array("text" => "MYSQL INSTALL CORE: ".$object["prefix"]."cms_store".""));
					hive___stackecho($object["loadup"]["stack"]);	
					$object["log_tmp"]->warning("[CORE] [MYSQL] [INSTALL] [TABLE] ".@htmlspecialchars($object["prefix"]."cms_store" ?? '' )."", "mysql");
					require_once(_HIVE_PATH_."/_core/_mysql/mysql.cms_store.php");
					$object["mysql"]->free_all();
				}  else {
					array_push($object["loadup"]["stack"], array("text" => "MYSQL INSTALL CORE TABLE ALREADY EXISTS: ".$object["prefix"]."cms_store".""));
					hive___stackecho($object["loadup"]["stack"]);	
				}	
				if(!$object["mysql"]->table_exists($object["prefix"]."cms_worker")) {
					array_push($object["loadup"]["stack"], array("text" => "MYSQL INSTALL CORE: ".$object["prefix"]."cms_worker".""));
					hive___stackecho($object["loadup"]["stack"]);	
					$object["log_tmp"]->warning("[CORE] [MYSQL] [INSTALL] [TABLE] ".@htmlspecialchars($object["prefix"]."cms_worker" ?? '' )."", "mysql");
					require_once(_HIVE_PATH_."/_core/_mysql/mysql.cms_worker.php");
					$object["mysql"]->free_all();
				} else {
					array_push($object["loadup"]["stack"], array("text" => "MYSQL INSTALL CORE TABLE ALREADY EXISTS: ".$object["prefix"]."cms_worker".""));
					hive___stackecho($object["loadup"]["stack"]);	
				}				

			#################################################################################################################################################
			// Create API Permission Tables [xxxx411.1]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Create API Permission Tables [xxxx411.1]"));
				hive___stackecho($object["loadup"]["stack"]);
				$object["api"] 			= 	new x_class_api($object["mysql"], _TABLE_API_, "");
				array_push($object["loadup"]["stack"], array("text" => "'object[api] is now x_class_api"));
				hive___stackecho($object["loadup"]["stack"]);
				$object["api_perm"] 		= 	new x_class_perm($object["mysql"], _TABLE_API_PERM_, "");
				array_push($object["loadup"]["stack"], array("text" => "'object[api_perm] is now x_class_perm"));
				hive___stackecho($object["loadup"]["stack"]);

			#################################################################################################################################################
			// Variables Class Init [xxxx412]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Config Variables Classes [xxxx412]"));
				hive___stackecho($object["loadup"]["stack"]);	
				$object["var"] = new x_class_var($object["mysql"], _TABLE_VAR_, "");

			#################################################################################################################################################
			// Check Maintenance Lock Status [xxxx414]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Check Maintenance Lock Status [xxxx414]"));
				hive___stackecho($object["loadup"]["stack"]);					
				if(file_exists($object["path"]."/maintenance.lock.php")) {
					array_push($object["loadup"]["stack"], array("text" => "Maintenance File in Place"));
					hive___stackecho($object["loadup"]["stack"]);		
					if(!defined("_HIVE_INTERNAL_MT_LOCK_")) { 
						define("_HIVE_INTERNAL_MT_LOCK_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_MT_LOCK_' is now '"._HIVE_INTERNAL_MT_LOCK_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}	
				} else {
					define("_HIVE_INTERNAL_MT_LOCK_", 0); 
					array_push($object["loadup"]["stack"], array("text" => "Maintenance File not in Place"));
					hive___stackecho($object["loadup"]["stack"]);	
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_MT_LOCK_' is now '"._HIVE_INTERNAL_MT_LOCK_."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}

			#################################################################################################################################################
			// Check Update Lock Status [xxxx415]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Check Update Lock Status [xxxx415]"));
				hive___stackecho($object["loadup"]["stack"]);					
				if(file_exists($object["path"]."/update.lock.php")) {
					array_push($object["loadup"]["stack"], array("text" => "Update Lock File in Place"));
					hive___stackecho($object["loadup"]["stack"]);		
					if(!defined("_HIVE_INTERNAL_UPDATE_LOCK_")) { 
						define("_HIVE_INTERNAL_UPDATE_LOCK_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_UPDATE_LOCK_' is now '"._HIVE_INTERNAL_UPDATE_LOCK_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}	
				} else {
					define("_HIVE_INTERNAL_UPDATE_LOCK_", 0); 
					array_push($object["loadup"]["stack"], array("text" => "Update Lock File not in Place"));
					hive___stackecho($object["loadup"]["stack"]);	
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_UPDATE_LOCK_' is now '"._HIVE_INTERNAL_UPDATE_LOCK_."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}				
				
			#################################################################################################################################################
			// Check Backup Lock Status [xxxx416]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Check Backup Lock Status [xxxx416]"));
				hive___stackecho($object["loadup"]["stack"]);							
				if(file_exists($object["path"]."/backup.lock.php")) {
					array_push($object["loadup"]["stack"], array("text" => "Backup Lock File in Place"));
					hive___stackecho($object["loadup"]["stack"]);		
					if(!defined("_HIVE_INTERNAL_BACKUP_LOCK_")) { 
						define("_HIVE_INTERNAL_BACKUP_LOCK_", 1); 
						array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_BACKUP_LOCK_' is now '"._HIVE_INTERNAL_BACKUP_LOCK_."'"));
						hive___stackecho($object["loadup"]["stack"]);	
					}	
				} else {
					define("_HIVE_INTERNAL_BACKUP_LOCK_", 0); 
					array_push($object["loadup"]["stack"], array("text" => "Backup Lock File not in Place"));
					hive___stackecho($object["loadup"]["stack"]);	
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_BACKUP_LOCK_' is now '"._HIVE_INTERNAL_BACKUP_LOCK_."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}		
			
			#################################################################################################################################################
			// Check Backup Lock Status [xxxx417]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Set general Lock Constant [xxxx417]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(defined("_HIVE_INTERNAL_BACKUP_LOCK_")) { if(_HIVE_INTERNAL_BACKUP_LOCK_) { if(!defined("_HIVE_INTERNAL_LOCK_")) { define("_HIVE_INTERNAL_LOCK_", 1); } } }
				if(defined("_HIVE_INTERNAL_UPDATE_LOCK_")) { if(_HIVE_INTERNAL_UPDATE_LOCK_) { if(!defined("_HIVE_INTERNAL_LOCK_")) { define("_HIVE_INTERNAL_LOCK_", 1); } } }
				if(defined("_HIVE_INTERNAL_MT_LOCK_")) { if(_HIVE_INTERNAL_MT_LOCK_) { if(!defined("_HIVE_INTERNAL_LOCK_")) { define("_HIVE_INTERNAL_LOCK_", 1); } } }
				if(!defined("_HIVE_INTERNAL_LOCK_")) { define("_HIVE_INTERNAL_LOCK_", 0); }
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_LOCK_' is now '"._HIVE_INTERNAL_LOCK_."'"));
				hive___stackecho($object["loadup"]["stack"]);	
			
			#################################################################################################################################################
			// Lock Window if Maintenance [xxxx418]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Lock Window if Maintenance [xxxx418]"));
				hive___stackecho($object["loadup"]["stack"]);
				if(!defined("_HIVE_INTERNAL_MT_LOCK_OVR_")) { define("_HIVE_INTERNAL_MT_LOCK_OVR_", 0); }	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_MT_LOCK_OVR_' is now '".@_HIVE_INTERNAL_MT_LOCK_OVR_."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!_HIVE_INTERNAL_MT_LOCK_OVR_) {
					if(_HIVE_INTERNAL_MT_LOCK_) {
						array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
						hive___stackecho($object["loadup"]["stack"]);
						hive__error("Maintenance", "[000-003] This website is currently in maintenance mode!<br />Please come back later...", "If you want to end maintenance mode manually, remove the maintenance.lock.php file from the website root directory.", true, 503, false, "cog");
						exit(); 
					}
				}

			#################################################################################################################################################
			// Lock Window if Backup [xxxx419]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Lock Window if Backup [xxxx419]"));
				hive___stackecho($object["loadup"]["stack"]);		
				if(!defined("_HIVE_INTERNAL_BACKUP_LOCK_OVR_")) { define("_HIVE_INTERNAL_BACKUP_LOCK_OVR_", 0); }
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_BACKUP_LOCK_OVR_' is now '".@_HIVE_INTERNAL_BACKUP_LOCK_OVR_."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!_HIVE_INTERNAL_BACKUP_LOCK_OVR_) {
					if(_HIVE_INTERNAL_BACKUP_LOCK_) {
						array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
						hive___stackecho($object["loadup"]["stack"]);
						hive__error("Maintenance", "[000-004] This website is currently doing backup work!<br />Please come back later...", "If you want to end backup mode manually, remove the backup.lock.php file from the website root directory.", true, 503, false, "cog");
						exit(); 	
					}
				}

			#################################################################################################################################################
			// Lock Window if Update [xxxx420]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Lock Window if Update [xxxx420]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!defined("_HIVE_INTERNAL_UPDATE_LOCK_OVR_")) { define("_HIVE_INTERNAL_UPDATE_LOCK_OVR_", 0); }
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_UPDATE_LOCK_OVR_' is now '".@_HIVE_INTERNAL_UPDATE_LOCK_OVR_."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!_HIVE_INTERNAL_UPDATE_LOCK_OVR_) {
					if(_HIVE_INTERNAL_UPDATE_LOCK_) {
						array_push($object["loadup"]["stack"], array("text" => "ERROR - Check graphical onscreen error."));
						hive___stackecho($object["loadup"]["stack"]);
						hive__error("Maintenance", "[000-005] This website is currently updating!<br />Please come back later...", "If you want to end update mode manually, remove the backup.lock.php file from the website root directory." , true, 503, false, "cog");
						exit();
					}
				}			
			
			#################################################################################################################################################
			// Determine Hive URL Variables [xxxx429]
			#################################################################################################################################################
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Determine Hive URL Variables [xxxx429]"));
				hive___stackecho($object["loadup"]["stack"]);		
				/* Set Up The Real URL as Configured in Settings.php */	
				if(!defined("_HIVE_URL_")) { 
					define("_HIVE_URL_", $object["url"]); 
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_URL_' is now '".@_HIVE_URL_."'"));
					hive___stackecho($object["loadup"]["stack"]);	
				} $object["url"] = _HIVE_URL_;		
				array_push($object["loadup"]["stack"], array("text" => "'object[url]' is now '".@_HIVE_URL_."' set by '_HIVE_URL_'"));
				hive___stackecho($object["loadup"]["stack"]);	
				/* Give constant to work with determinated URLs with no need to set them anywhere. */	
				$tmprel = parse_url(_HIVE_URL_, PHP_URL_PATH);
				if(!$tmprel OR $tmprel == "") { $tmprel = "/"; }
				if (isset($_SERVER['HTTPS']) && @$_SERVER['HTTPS'] === 'on') {
					$link = "https://";
				} else { $link = "http://"; }
				$tmprelx = $link.@$_SERVER["HTTP_HOST"].$tmprel;
				if(substr($tmprelx, -1, 1) != "/") { $tmprelx = $tmprelx."/"; }
				if(substr($tmprel, -1, 1) != "/") { $tmprel = $tmprel."/"; }
				define('_HIVE_URL_REL_', $tmprelx);	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_URL_REL_' is now '".@_HIVE_URL_REL_."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				define('_HIVE_URLC_REL_', $tmprel);	
				array_push($object["loadup"]["stack"], array("text" => "'_HIVE_URLC_REL_' is now '".@_HIVE_URLC_REL_."'"));
				hive___stackecho($object["loadup"]["stack"]);	
				unset($tmprelx);
				unset($tmprel);
				unset($link);							
			
			#################################################################################################################################################
			// Classes Init [xxxx430]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Classes Init [xxxx430]"));
				hive___stackecho($object["loadup"]["stack"]);		
				$object["2fa"] 	= 	false;		
				array_push($object["loadup"]["stack"], array("text" => "'object[2fa]' is now reserved for x_class_2fa"));
				hive___stackecho($object["loadup"]["stack"]);	
				$object["crypt"] 		= 	new x_class_crypt();		
				array_push($object["loadup"]["stack"], array("text" => "'object[crypt]' is now x_class_crypt"));
				hive___stackecho($object["loadup"]["stack"]);
				$object["zip"] 			= 	new x_class_zip();
				array_push($object["loadup"]["stack"], array("text" => "'object[zip]' is now x_class_zip"));
				hive___stackecho($object["loadup"]["stack"]);
				$object["curl"] 		= 	new x_class_curl();		
				array_push($object["loadup"]["stack"], array("text" => "'object[curl]' is now x_class_curl"));
				hive___stackecho($object["loadup"]["stack"]);				
				// Initialize Debugging Class Javascript Error Database
				$object["debug"]->js_error_create_db($object["mysql"], _TABLE_LOG_JS_);
				array_push($object["loadup"]["stack"], array("text" => "'object[debug]->js_error_create_db' has been executed with _TABLE_LOG_JS_"));
				hive___stackecho($object["loadup"]["stack"]);			
			
			#################################################################################################################################################
			// Init some Constants [xxxx434]
			#################################################################################################################################################	
				array_push($object["loadup"]["stack"], array("text" => "-------------------- Init some Constants [xxxx434]"));
				hive___stackecho($object["loadup"]["stack"]);	
				if(!defined("_CRON_ONLY_CLI_")) { 
					define("_CRON_ONLY_CLI_", true); 
					array_push($object["loadup"]["stack"], array("text" => "'_CRON_ONLY_CLI_' is fallback now '".@serialize(@_CRON_ONLY_CLI_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_CRON_ONLY_CLI_' is already '".@serialize(@_CRON_ONLY_CLI_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}	
				if(!defined("_HIVE_CURL_LOGGING_")) { 
					define("_HIVE_CURL_LOGGING_", false); 
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_CURL_LOGGING_' is fallback now '".@serialize(@_HIVE_CURL_LOGGING_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				} else {
					array_push($object["loadup"]["stack"], array("text" => "'_HIVE_CURL_LOGGING_' is already '".@serialize(@_HIVE_CURL_LOGGING_)."'"));
					hive___stackecho($object["loadup"]["stack"]);
				}		
				
			#################################################################################################################################################
			// Permissions [xxxx437]
			#################################################################################################################################################
				array_push($object["loadup"]["stack"], array("text" => "-------------------- User permissions init [xxxx437]"));
				hive___stackecho($object["loadup"]["stack"]);	
				$object["perm_group_glob"] 	= 	new x_class_perm($object["mysql"], _TABLE_USER_GROUP_PERM_, "");	
				array_push($object["loadup"]["stack"], array("text" => "'object[perm_group_glob]' is now x_class_perm"));
				hive___stackecho($object["loadup"]["stack"]);
				$object["perm_user_glob"] 	= 	new x_class_perm($object["mysql"], _TABLE_USER_PERM_, "");
				array_push($object["loadup"]["stack"], array("text" => "'object[perm_user_glob]' is now x_class_perm"));
				hive___stackecho($object["loadup"]["stack"]);	
			
			#################################################################################################################################################
			// End of NoInit Initialization
			#################################################################################################################################################
	
		}

	#################################################################################################################################################
	// For Both Initializations add this following Content [xxxx500]
	#################################################################################################################################################
		array_push($object["loadup"]["stack"], array("text" => "------- Global Post Configuration [xxxx500]"));
		hive___stackecho($object["loadup"]["stack"]);	

	#################################################################################################################################################
	// Catcha Variables define if not defined
	#################################################################################################################################################
		if(!defined("_HIVE_SCRIPT_CACHE_T_")) { 
			define("_HIVE_SCRIPT_CACHE_T_", "no-store, no-cache, must-revalidate, max-age=0");
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SCRIPT_CACHE_T_' is fallback now '".@serialize(@_HIVE_SCRIPT_CACHE_T_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SCRIPT_CACHE_T_' is already '".@serialize(@_HIVE_SCRIPT_CACHE_T_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}
		if(!defined("_HIVE_SCRIPT_CACHE_F_")) { 
			define("_HIVE_SCRIPT_CACHE_F_", "post-check=0, pre-check=0");
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SCRIPT_CACHE_F_' is fallback now '".@serialize(@_HIVE_SCRIPT_CACHE_F_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SCRIPT_CACHE_F_' is already '".@serialize(@_HIVE_SCRIPT_CACHE_F_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		}
		if(!defined("_HIVE_SCRIPT_CACHE_P_")) { 
			define("_HIVE_SCRIPT_CACHE_P_", "no-cache");
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SCRIPT_CACHE_P_' is fallback now '".@serialize(@_HIVE_SCRIPT_CACHE_P_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_SCRIPT_CACHE_P_' is already '".@serialize(@_HIVE_SCRIPT_CACHE_P_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}

	#################################################################################################################################################
	// Define maybe undefined Variables
	#################################################################################################################################################	
		// Set Error Variables to 0 if not defined
		if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) { 
			define("_HIVE_INTERNAL_INIT_ERROR_", 0);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_INIT_ERROR_' is fallback now '".@serialize(@_HIVE_INTERNAL_INIT_ERROR_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_INIT_ERROR_' is already '".@serialize(@_HIVE_INTERNAL_INIT_ERROR_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}		
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
			define("_HIVE_INTERNAL_VERSION_ERROR_", 0);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_VERSION_ERROR_' is fallback now '".@serialize(@_HIVE_INTERNAL_VERSION_ERROR_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_VERSION_ERROR_' is already '".@serialize(@_HIVE_INTERNAL_VERSION_ERROR_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}		
		if(!defined("_HIVE_INTERNAL_RNAME_ERROR_")) { 
			define("_HIVE_INTERNAL_RNAME_ERROR_", 0);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_RNAME_ERROR_' is fallback now '".@serialize(@_HIVE_INTERNAL_RNAME_ERROR_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_RNAME_ERROR_' is already '".@serialize(@_HIVE_INTERNAL_RNAME_ERROR_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}		
		if(!defined("_HIVE_INTERNAL_DOWNGRADE_ERROR_")) { 
			define("_HIVE_INTERNAL_DOWNGRADE_ERROR_", 0);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_DOWNGRADE_ERROR_' is fallback now '".@serialize(@_HIVE_INTERNAL_DOWNGRADE_ERROR_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_DOWNGRADE_ERROR_' is already '".@serialize(@_HIVE_INTERNAL_DOWNGRADE_ERROR_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}				
		if(!defined("_HIVE_INTERNAL_UPDATE_REQ_")) { 
			define("_HIVE_INTERNAL_UPDATE_REQ_", 0);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_UPDATE_REQ_' is fallback now '".@serialize(@_HIVE_INTERNAL_UPDATE_REQ_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_INTERNAL_UPDATE_REQ_' is already '".@serialize(@_HIVE_INTERNAL_UPDATE_REQ_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}			
		// Default Scripts in /_user Enable
		if(!defined("_HIVE_ENABLESITE_MAILCHANGE_")) { 
			define("_HIVE_ENABLESITE_MAILCHANGE_", false);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_MAILCHANGE_' is fallback now '".@serialize(@_HIVE_ENABLESITE_MAILCHANGE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_MAILCHANGE_' is already '".@serialize(@_HIVE_ENABLESITE_MAILCHANGE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}			
		if(!defined("_HIVE_ENABLESITE_RECOVER_")) { 
			define("_HIVE_ENABLESITE_RECOVER_", false);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_RECOVER_' is fallback now '".@serialize(@_HIVE_ENABLESITE_RECOVER_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_RECOVER_' is already '".@serialize(@_HIVE_ENABLESITE_RECOVER_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}		
		if(!defined("_HIVE_ENABLESITE_REGISTER_")) { 
			define("_HIVE_ENABLESITE_REGISTER_", false);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_REGISTER_' is fallback now '".@serialize(@_HIVE_ENABLESITE_REGISTER_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_REGISTER_' is already '".@serialize(@_HIVE_ENABLESITE_REGISTER_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}		
		if(!defined("_HIVE_ENABLESITE_2FA_")) { 
			define("_HIVE_ENABLESITE_2FA_", true);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_2FA_' is fallback now '".@serialize(@_HIVE_ENABLESITE_2FA_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_2FA_' is already '".@serialize(@_HIVE_ENABLESITE_2FA_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}		
		if(!defined("_HIVE_ENABLESITE_ACTIVATE_")) { 
			define("_HIVE_ENABLESITE_ACTIVATE_", false);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_ACTIVATE_' is fallback now '".@serialize(@_HIVE_ENABLESITE_ACTIVATE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_ACTIVATE_' is already '".@serialize(@_HIVE_ENABLESITE_ACTIVATE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}		
		if(!defined("_HIVE_ENABLESITE_PASSCHANGE_")) { 
			define("_HIVE_ENABLESITE_PASSCHANGE_", true);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_PASSCHANGE_' is fallback now '".@serialize(@_HIVE_ENABLESITE_PASSCHANGE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_PASSCHANGE_' is already '".@serialize(@_HIVE_ENABLESITE_PASSCHANGE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}		
		if(!defined("_HIVE_ENABLESITE_LOGIN_")) { 
			define("_HIVE_ENABLESITE_LOGIN_", true);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_LOGIN_' is fallback now '".@serialize(@_HIVE_ENABLESITE_LOGIN_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_LOGIN_' is already '".@serialize(@_HIVE_ENABLESITE_LOGIN_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}		
		if(!defined("_HIVE_ENABLESITE_LOGOUT_")) { 
			define("_HIVE_ENABLESITE_LOGOUT_", true);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_LOGOUT_' is fallback now '".@serialize(@_HIVE_ENABLESITE_LOGOUT_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_LOGOUT_' is already '".@serialize(@_HIVE_ENABLESITE_LOGOUT_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}			
		if(!defined("_HIVE_ENABLESITE_LANGCHANGE_")) { 
			define("_HIVE_ENABLESITE_LANGCHANGE_", true);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_LANGCHANGE_' is fallback now '".@serialize(@_HIVE_ENABLESITE_LANGCHANGE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_LANGCHANGE_' is already '".@serialize(@_HIVE_ENABLESITE_LANGCHANGE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}			
		if(!defined("_HIVE_ENABLESITE_MODESWITCH_")) { 
			define("_HIVE_ENABLESITE_MODESWITCH_", true);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_MODESWITCH_' is fallback now '".@serialize(@_HIVE_ENABLESITE_MODESWITCH_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_ENABLESITE_MODESWITCH_' is already '".@serialize(@_HIVE_ENABLESITE_MODESWITCH_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}		
		// Default Scripts in /_user DEFER
		if(!defined("_HIVE_DEFERSITE_MAILCHANGE_")) { 
			define("_HIVE_DEFERSITE_MAILCHANGE_", false);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_MAILCHANGE_' is fallback now '".@serialize(@_HIVE_DEFERSITE_MAILCHANGE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_MAILCHANGE_' is already '".@serialize(@_HIVE_DEFERSITE_MAILCHANGE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		if(!defined("_HIVE_DEFERSITE_PASSCHANGE_")) { 
			define("_HIVE_DEFERSITE_PASSCHANGE_", false);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_PASSCHANGE_' is fallback now '".@serialize(@_HIVE_DEFERSITE_PASSCHANGE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_PASSCHANGE_' is already '".@serialize(@_HIVE_DEFERSITE_PASSCHANGE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		if(!defined("_HIVE_DEFERSITE_RECOVER_")) { 
			define("_HIVE_DEFERSITE_RECOVER_", false);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_RECOVER_' is fallback now '".@serialize(@_HIVE_DEFERSITE_RECOVER_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_RECOVER_' is already '".@serialize(@_HIVE_DEFERSITE_RECOVER_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		if(!defined("_HIVE_DEFERSITE_LOGIN_")) { 
			define("_HIVE_DEFERSITE_LOGIN_", false);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_LOGIN_' is fallback now '".@serialize(@_HIVE_DEFERSITE_LOGIN_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_LOGIN_' is already '".@serialize(@_HIVE_DEFERSITE_LOGIN_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		if(!defined("_HIVE_DEFERSITE_LOGOUT_")) { 
			define("_HIVE_DEFERSITE_LOGOUT_", false);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_LOGOUT_' is fallback now '".@serialize(@_HIVE_DEFERSITE_LOGOUT_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_LOGOUT_' is already '".@serialize(@_HIVE_DEFERSITE_LOGOUT_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		if(!defined("_HIVE_DEFERSITE_REGISTER_")) { 
			define("_HIVE_DEFERSITE_REGISTER_", false);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_REGISTER_' is fallback now '".@serialize(@_HIVE_DEFERSITE_REGISTER_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_REGISTER_' is already '".@serialize(@_HIVE_DEFERSITE_REGISTER_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		if(!defined("_HIVE_DEFERSITE_LANGCHANGE_")) { 
			define("_HIVE_DEFERSITE_LANGCHANGE_", false);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_LANGCHANGE_' is fallback now '".@serialize(@_HIVE_DEFERSITE_LANGCHANGE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_LANGCHANGE_' is already '".@serialize(@_HIVE_DEFERSITE_LANGCHANGE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		if(!defined("_HIVE_DEFERSITE_MODESWITCH_")) { 
			define("_HIVE_DEFERSITE_MODESWITCH_", false);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_MODESWITCH_' is fallback now '".@serialize(@_HIVE_DEFERSITE_MODESWITCH_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_MODESWITCH_' is already '".@serialize(@_HIVE_DEFERSITE_MODESWITCH_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		if(!defined("_HIVE_DEFERSITE_2FA_")) { 
			define("_HIVE_DEFERSITE_2FA_", false);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_2FA_' is fallback now '".@serialize(@_HIVE_DEFERSITE_2FA_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_2FA_' is already '".@serialize(@_HIVE_DEFERSITE_2FA_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}	
		if(!defined("_HIVE_DEFERSITE_ACTIVATE_")) { 
			define("_HIVE_DEFERSITE_ACTIVATE_", false);
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_ACTIVATE_' is fallback now '".@serialize(@_HIVE_DEFERSITE_ACTIVATE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);	
		} else {
			array_push($object["loadup"]["stack"], array("text" => "'_HIVE_DEFERSITE_ACTIVATE_' is already '".@serialize(@_HIVE_DEFERSITE_ACTIVATE_)."'"));
			hive___stackecho($object["loadup"]["stack"]);
		}

	#################################################################################################################################################
	// Output Stacktrace and exit if activated. [xxxx600]
	#################################################################################################################################################
		array_push($object["loadup"]["stack"], array("text" => "------- Initialize.php successfully executed. [xxxx600]"));
		hive___stackecho($object["loadup"]["stack"]);	
		if(defined("_HIVE_DEBUG_STACKTRACE_")) { if(_HIVE_DEBUG_STACKTRACE_) { exit(); } }