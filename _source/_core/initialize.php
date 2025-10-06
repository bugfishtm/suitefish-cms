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

	/***********************************************************************************************************
		Check for Settings Include and Object Array
	***********************************************************************************************************/	
	if(!is_array(@$object) OR !is_array($mysql)) { 
		@http_response_code(503); 
		echo "Error [c2]: Your settings.php file is corrupted or has not been included before including initialize.php."; 
		exit(); 
	}	
	
	/***********************************************************************************************************
		Check for correct Path
	***********************************************************************************************************/	
	if(!file_exists(@$object["path"]."/_core/initialize.php")) { 
		@http_response_code(503); 
		echo "Error [c2]: Your settings.php file is corrupted or has not been included before including initialize.php."; 
		exit(); 
	} 
		
	/***********************************************************************************************************
		General Functions for Initialization
	***********************************************************************************************************/
	if(!is_array(@$object["loadup"])) 					{ $object["loadup"] = array(); }
	if(!is_array(@$object["loadup"]["stack"])) 			{ $object["loadup"]["stack"] = array(); }
	if(!is_array(@$object["loadup"]["lib"])) 			{ $object["loadup"]["lib"] = array(); }
	if(!is_array(@$object["loadup"]["config_pre"])) 	{ $object["loadup"]["config_pre"] = array(); }
	if(!is_array(@$object["loadup"]["config"])) 		{ $object["loadup"]["config"] = array(); }
	if(!is_array(@$object["loadup"]["config_post"])) 	{ $object["loadup"]["config_post"] = array(); }
	if(!is_array(@$object["loadup"]["mysql"])) 			{ $object["loadup"]["mysql"] = array(); }
	function hive___stackecho($message) {
		if(defined("_HIVE_DEBUG_STACKTRACE_")) { if(_HIVE_DEBUG_STACKTRACE_) { echo htmlspecialchars($message, ENT_QUOTES)."<br />"; } }
	}
	function hive___stackforceconst(&$stackvar, $constant_to_set, $value_to_set) {
		if(is_array($value_to_set)) {
			$newvaluetoset = serialize($value_to_set);
			$message = "[CONSTANT] ".$constant_to_set." [SET] [ARR] ".$newvaluetoset."";
		} elseif(is_bool($value_to_set)) {
			if($value_to_set) {
				$newvaluetoset = "true";
			} else {
				$newvaluetoset = "false";
			}
			$message = "[CONSTANT] ".$constant_to_set." [SET] [BOOL] ".$newvaluetoset."";
		} else {
			$message = "[CONSTANT] ".$constant_to_set." [SET] [STR] ".$value_to_set."";
		}
		array_push($stackvar, $message);
		hive___stackecho($message);
		define($constant_to_set, $value_to_set);
	}
	function hive___stacksetconst(&$stackvar, $constant_to_set, $value_to_set) {
		if(!defined($constant_to_set)) { 
			hive___stackforceconst($stackvar, $constant_to_set, $value_to_set);
		} else {
			if(is_array($value_to_set)) {
				$value_to_set = serialize($value_to_set);
			} elseif(is_bool($value_to_set)) {
				if($value_to_set) {
					$value_to_set = "true";
				} else {
					$value_to_set = "false";
				}
			} 
			hive___stackinfo($stackvar, " [CONSTANT] ".$constant_to_set." is already set to: ".$value_to_set."");
		}			
	}
	function hive___stackinfo(&$stackvar, $message) {
		$messagex = "[INFO] ".$message."";
		array_push($stackvar, $messagex);
		hive___stackecho($messagex);
	}
	function hive___stackfile(&$stackvar, $message, $include = true) {
		$object = array();
		$messagex = "[FILE] ".$message."";
		array_push($stackvar, $messagex);
		hive___stackecho($messagex);
		if($include) { require($message); }
	}
	function hive___stackfileonce(&$stackvar, $message, $include = true) {
		$object = array();
		$messagex = "[FILE] ".$message."";
		array_push($stackvar, $messagex);
		hive___stackecho($messagex);
		if($include) { require_once($message); }
	}
	
	/***********************************************************************************************************
		Welcome Stack Message
	***********************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "Suitefish Stack Messaging System");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Report started at: ".date('Y-m-d H:i:s')."");
		hive___stackinfo($object["loadup"]["stack"], "You can disable the stack messaging system at /cfg_ruleset.php");
		hive___stackinfo($object["loadup"]["stack"], "It is not recommended to activate the stack messaging system on a public server");
		hive___stackinfo($object["loadup"]["stack"], "This may put your data at risk.");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
	
	/***********************************************************************************************************
		Do not allow twice include of initialization
	***********************************************************************************************************/	
	if(defined("_HIVE_INIT_INCLUDED_")) {
		@http_response_code(503); 
		echo "Error [c3]: You are not allowed to include initialize.php twice."; 
		exit();
	} else {
		hive___stackforceconst($object["loadup"]["stack"], "_HIVE_INIT_INCLUDED_", true);
	}

	/***********************************************************************************************************
		Init Docker Variables 
	***********************************************************************************************************/
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_IS_IN_DOCKER_", false);	
	
	/***********************************************************************************************************
		Check PHP Version
	***********************************************************************************************************/	
	if (PHP_VERSION_ID >= 80400 && PHP_VERSION_ID < 90000) {
	} else {
		@http_response_code(503); 
		echo "Error [c4]: You need PHP version higher or equal than 8.4 and lower than 9.0 to run this software. You are currently running: ".PHP_VERSION.""; 
		exit();
	}			
	hive___stackinfo($object["loadup"]["stack"], "Current PHP Version ID: ".PHP_VERSION_ID."");
	hive___stackinfo($object["loadup"]["stack"], "Current PHP Binary: ".PHP_BINARY."");
	
	/***********************************************************************************************************
		Check if website root folder is writeable
	***********************************************************************************************************/		
	if (!is_writable($object["path"])) {
		@http_response_code(503); 
		echo "Error [c5]: The document root is not writeable. Please set correct permission and ownerships for the website document root or corrent \$object['path'] in settings.php."; 
		exit();
	}		
	hive___stackinfo($object["loadup"]["stack"], "Document root is writable");
	
	/***********************************************************************************************************
		Init: Loading Ruleset Configuration File
	***********************************************************************************************************/	
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
	hive___stackinfo($object["loadup"]["stack"], "Init: Loading Ruleset Configuration File");
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
	
		/*	Include the File
		*******************************************************************************************************/	
		if(file_exists(@$object["path"]."/cfg_ruleset.php")) { 
			hive___stackfile($object["loadup"]["stack"], @$object["path"]."/cfg_ruleset.php", false);
			require_once($object["path"]."/cfg_ruleset.php"); 
		} else {
			hive___stackinfo($object["loadup"]["stack"], "No cfg_ruleset.php found");
		}

		/*	Set the Constants
		*******************************************************************************************************/	
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_DEBUG_STACKTRACE_", 			false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PHP_LOG_PATH_", 				false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PHP_DISPLAY_ERROR_ON_START_", 	0);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_BLOCK_FP_", 					false);
		hive___stacksetconst($object["loadup"]["stack"], "_INSTALLER_TITLE_", 					"Suitefish");
		hive___stacksetconst($object["loadup"]["stack"], "_INSTALLER_COOKIE_", 					"sf_");
		hive___stacksetconst($object["loadup"]["stack"], "_INSTALLER_PREFIX_", 					"sf_");
		hive___stacksetconst($object["loadup"]["stack"], "_INSTALLER_CODE_", 					false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SERVER_UPDATE_", 				"https://suitefish.com");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SERVER_STORE_", 				"https://suitefish.com");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MOD_OVR_", 						false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_ADMIN_SITE_", 					"_administrator");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MODE_PRIMARY_", 				"_administrator");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MOD_FETCH_", 					false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MOD_FORCE_", 					false);
		
		/*	Special Handlign for Cookie Domain
		*******************************************************************************************************/	
		if(defined("_HIVE_COOKIE_DOMAIN_")) {
			hive___stackinfo($object["loadup"]["stack"], " [CONSTANT] _HIVE_COOKIE_DOMAIN_ is already set to: ".@serialize(_HIVE_COOKIE_DOMAIN_)."");
			ini_set('session.cookie_domain', _HIVE_COOKIE_DOMAIN_);
		} else {
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_COOKIE_DOMAIN_", false);
		}

	/***********************************************************************************************************
		Init: PHP Logging Setup
	***********************************************************************************************************/	
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
	hive___stackinfo($object["loadup"]["stack"], "Init: Setup PHP Logging");
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
	error_reporting(E_ALL); 
	ini_set('log_errors', TRUE);
	if(_HIVE_PHP_LOG_PATH_) { 
		hive___stackinfo($object["loadup"]["stack"], "PHP configuration: 'error_log' is now '"._HIVE_PHP_LOG_PATH_."'");
		ini_set('error_log',_HIVE_PHP_LOG_PATH_);
	} else {
		hive___stackinfo($object["loadup"]["stack"], "PHP configuration: 'error_log' is left untouched");
	}
	if(_HIVE_PHP_DISPLAY_ERROR_ON_START_) { 
		hive___stackinfo($object["loadup"]["stack"], "PHP configuration: 'display_errors' is now '"._HIVE_PHP_DISPLAY_ERROR_ON_START_."'");
		ini_set('display_errors', 1); 
	} else { 
		hive___stackinfo($object["loadup"]["stack"], "PHP configuration: 'display_errors' is now '0' by fallback.");
		ini_set('display_errors', 0); 
	}	

	/***********************************************************************************************************
		Init: Include Core Library Files
	***********************************************************************************************************/	
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
	hive___stackinfo($object["loadup"]["stack"], "Init: Include Core Library Files");
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");		
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_lib/lib.init.default.php", false); 
	require_once(@$object["path"]."/_core/_lib/lib.init.default.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_lib/lib.init.default.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_lib/lib.init.error.php", false);
	require_once(@$object["path"]."/_core/_lib/lib.init.error.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_lib/lib.init.error.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_lib/lib.init.inject.php", false);
	require_once(@$object["path"]."/_core/_lib/lib.init.inject.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_lib/lib.init.inject.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_lib/lib.init.library.php", false);
	require_once(@$object["path"]."/_core/_lib/lib.init.library.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_lib/lib.init.library.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_lib/lib.init.template.php", false);
	require_once(@$object["path"]."/_core/_lib/lib.init.template.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_lib/lib.init.template.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_lib/lib.init.trigger.php", false);
	require_once(@$object["path"]."/_core/_lib/lib.init.trigger.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_lib/lib.init.trigger.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_lib/lib.init.user.php", false);
	require_once(@$object["path"]."/_core/_lib/lib.init.user.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_lib/lib.init.user.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_lib/lib.init.worker.php", false); 
	require_once(@$object["path"]."/_core/_lib/lib.init.worker.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_lib/lib.init.worker.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_lib/lib.init.download.php", false);
	require_once(@$object["path"]."/_core/_lib/lib.init.download.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_lib/lib.init.download.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_lib/lib.init.api.php", false);
	require_once(@$object["path"]."/_core/_lib/lib.init.api.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_lib/lib.init.api.php");
			
	/***********************************************************************************************************
		Include Bugfish Framework Library
	***********************************************************************************************************/	
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
	hive___stackinfo($object["loadup"]["stack"], "Include Bugfish Framework Library");
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/functions/x_button.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/functions/x_button.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/functions/x_captcha.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/functions/x_captcha.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/functions/x_cookiebanner.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/functions/x_cookiebanner.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/functions/x_curl.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/functions/x_curl.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/functions/x_eventbox.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/functions/x_eventbox.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/functions/x_folder.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/functions/x_folder.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/functions/x_library.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/functions/x_library.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/functions/x_rss.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/functions/x_rss.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/functions/x_table.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/functions/x_table.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/functions/x_thumbnail.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/functions/x_thumbnail.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/functions/x_search.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/functions/x_search.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_2fa.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_2fa.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_api.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_api.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_benchmark.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_benchmark.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_block.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_block.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_comment.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_comment.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_crypt.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_crypt.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_csrf.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_csrf.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_curl.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_curl.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_debug.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_debug.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_eventbox.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_eventbox.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_hitcounter.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_hitcounter.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_ipbl.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_ipbl.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_lang.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_lang.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_log.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_log.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_mail.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_mail.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_mail_item.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_mail_item.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_mail_phpmailer.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_mail_phpmailer.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_mail_template.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_mail_template.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_mysql.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_mysql.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_mysql_item.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_mysql_item.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_perm.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_perm.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_perm_item.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_perm_item.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_redis.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_redis.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_referer.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_referer.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_table.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_table.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_user.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_user.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_var.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_var.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_version.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_version.php");
	hive___stackfileonce($object["loadup"]["stack"], @$object["path"]."/_core/_framework/classes/x_class_zip.php");
	array_push($object["loadup"]["lib"], @$object["path"]."/_core/_framework/classes/x_class_zip.php");
		
	/***********************************************************************************************************
		Init: Debug Class Object
	***********************************************************************************************************/	
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
	hive___stackinfo($object["loadup"]["stack"], "Init: Debug Class Object");
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");			
	hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[debug] [SET] x_class_debug");	
	$object["debug"] = new x_class_debug();		
	$cmod = "mysqli";
	if(!$object["debug"]->required_php_module($cmod, false)) {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is missing: ".$cmod."");		
		hive__error("Critical Error", "[000-001] A PHP Module is missing: '".$cmod."'. Please install the required PHP Module.", "", true, 503);
		exit();
	} else {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is available: ".$cmod."");		
	}		
	$cmod = "xml";
	if(!$object["debug"]->required_php_module($cmod, false)) {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is missing: ".$cmod."");		
		hive__error("Critical Error", "[000-001] A PHP Module is missing: '".$cmod."'. Please install the required PHP Module.", "", true, 503);
		exit();
	} else {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is available: ".$cmod."");		
	}			
	$cmod = "mbstring";
	if(!$object["debug"]->required_php_module($cmod, false)) {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is missing: ".$cmod."");		
		hive__error("Critical Error", "[000-001] A PHP Module is missing: '".$cmod."'. Please install the required PHP Module.", "", true, 503);
		exit();
	} else {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is available: ".$cmod."");		
	}	
	$cmod = "curl";
	if(!$object["debug"]->required_php_module($cmod, false)) {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is missing: ".$cmod."");		
		hive__error("Critical Error", "[000-001] A PHP Module is missing: '".$cmod."'. Please install the required PHP Module.", "", true, 503);
		exit();
	} else {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is available: ".$cmod."");		
	}			
	$cmod = "zip";
	if(!$object["debug"]->required_php_module($cmod, false)) {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is missing: ".$cmod."");		
		hive__error("Critical Error", "[000-001] A PHP Module is missing: '".$cmod."'. Please install the required PHP Module.", "", true, 503);
		exit();
	} else {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is available: ".$cmod."");		
	}	
	$cmod = "intl";
	if(!$object["debug"]->required_php_module($cmod, false)) {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is missing: ".$cmod."");		
		hive__error("Critical Error", "[000-001] A PHP Module is missing: '".$cmod."'. Please install the required PHP Module.", "", true, 503);
		exit();
	} else {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is available: ".$cmod."");		
	}			
	$cmod = "fileinfo";
	if(!$object["debug"]->required_php_module($cmod, false)) {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is missing: ".$cmod."");		
		hive__error("Critical Error", "[000-001] A PHP Module is missing: '".$cmod."'. Please install the required PHP Module.", "", true, 503);
		exit();
	} else {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is available: ".$cmod."");		
	}	
	$cmod = "gd";
	if(!$object["debug"]->required_php_module($cmod, false)) {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is missing: ".$cmod."");		
		hive__error("Critical Error", "[000-001] A PHP Module is missing: '".$cmod."'. Please install the required PHP Module.", "", true, 503);
		exit();
	} else {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is available: ".$cmod."");		
	}			
	$cmod = "bcmath";
	if(!$object["debug"]->required_php_module($cmod, false)) {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is missing: ".$cmod."");		
		hive__error("Critical Error", "[000-001] A PHP Module is missing: '".$cmod."'. Please install the required PHP Module.", "", true, 503);
		exit();
	} else {
		hive___stackinfo($object["loadup"]["stack"], "PHP Module is available: ".$cmod."");		
	} unset($cmod);
		
	/***********************************************************************************************************
		Init: Starting the PHP Session
	***********************************************************************************************************/	
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
	hive___stackinfo($object["loadup"]["stack"], "Init: Starting the PHP Session");
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
	@session_start();	
		
	/***********************************************************************************************************
		Init: Set core table Constants
	***********************************************************************************************************/	
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
	hive___stackinfo($object["loadup"]["stack"], "Init: Set core table Constants");
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
	$object["prefix"] = @$mysql["prefix"];	
	hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[prefix] [SET] ".@$mysql["prefix"]."");	
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_LOG_", 				$object["prefix"]."cms_log");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_LOG_IP_", 				$object["prefix"]."cms_log_ip");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_LOG_BENCHMARK_", 		$object["prefix"]."cms_log_benchmark");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_LOG_CURL_", 			$object["prefix"]."cms_log_curl");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_LOG_MAIL_", 			$object["prefix"]."cms_log_mail");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_LOG_MYSQL_", 			$object["prefix"]."cms_log_mysql");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_LOG_REFERER_", 		$object["prefix"]."cms_log_referer");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_LOG_CRON_", 			$object["prefix"]."cms_log_cron");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_LOG_JS_", 				$object["prefix"]."cms_log_js");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_LOG_VISIT_", 			$object["prefix"]."cms_log_visit");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_LOG_API_", 			$object["prefix"]."cms_log_api");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_USER_", 				$object["prefix"]."cms_user");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_USER_EXTRAFIELD_", 	$object["prefix"]."cms_user_extrafield");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_USER_SESSION_", 		$object["prefix"]."cms_user_session");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_USER_PERM_", 			$object["prefix"]."cms_user_perm");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_USER_GROUP_", 			$object["prefix"]."cms_group");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_USER_GROUP_PERM_", 	$object["prefix"]."cms_group_perm");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_USER_GROUP_LINK_", 	$object["prefix"]."cms_group_link");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_VAR_", 				$object["prefix"]."cms_var");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_LANG_", 				$object["prefix"]."cms_lang");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_MAIL_TPL_", 			$object["prefix"]."cms_mail_tpl");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_COMMENT_", 			$object["prefix"]."cms_comment");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_API_", 				$object["prefix"]."cms_api");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_API_PERM_", 			$object["prefix"]."cms_api_perm");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_STORE_", 				$object["prefix"]."cms_store");
	hive___stacksetconst($object["loadup"]["stack"], "_TABLE_WORKER_", 				$object["prefix"]."cms_worker");

	/***********************************************************************************************************
		Init: Set core variables
	***********************************************************************************************************/	
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
	hive___stackinfo($object["loadup"]["stack"], "Init: Set core variables");
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_CREATOR_", 				'Powered by Suitefish-CMS');
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PREFIX_", 				@$mysql["prefix"]);
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_COOKIE_", 				@$object["cookie"]);
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PATH_", 				@$object["path"]);
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PATH_API_", 			@$object["path"]."/_api/");
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PATH_BACKUP_", 			@$object["path"]."/_backup/");
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PATH_CACHE_", 			@$object["path"]."/_cache/");
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PATH_CORE_", 			@$object["path"]."/_core/");
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PATH_CRONJOB_", 		@$object["path"]."/_cronjob/");
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PATH_DATA_", 			@$object["path"]."/_data/");
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PATH_IMAGE_", 			@$object["path"]."/_image/");
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PATH_IMAGE_OFF_", 		@$object["path"]."/_image/__disabled/");
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PATH_SITE_", 			@$object["path"]."/_site/");
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PATH_SITE_OFF_", 		@$object["path"]."/_site/__disabled/");
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PATH_STORE_", 			@$object["path"]."/_store/");
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PATH_TEMPLATE_", 		@$object["path"]."/_template/");
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PATH_TESTING_", 		@$object["path"]."/_testing/");
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PATH_UPDATE_", 			@$object["path"]."/_update/");

	/***********************************************************************************************************
		Init: Silently set Secret key
	***********************************************************************************************************/	
	if(!@$object["secret_key"]) { hive__error("Encryption Error", "Please check your secret_key in settings.php.", "", true, 503); } 
	else { if(strlen(@$object["secret_key"]) < 10) { hive__error("Encryption Error", "Please check your secret_key in settings.php to have at least 10 signs.", "", true, 503); }}
	define("_HIVE_SECRET_KEY_", $object["secret_key"]);
	
	/***********************************************************************************************************
		Init: Get Core Meta Information
	***********************************************************************************************************/	
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
	hive___stackinfo($object["loadup"]["stack"], "Init: Get Core Meta Information");
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
	require($object["path"]."/_core/version.php");
	$object["core"] = $x;
	unset($x);	
	hive___stackinfo($object["loadup"]["stack"], "Current Version: ".$object["core"]["version"]."");	
	hive___stackinfo($object["loadup"]["stack"], "Current Codename: ".$object["core"]["codename"]."");	

	/***********************************************************************************************************
		Init: Restore the core folder structure
	***********************************************************************************************************/	
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
	hive___stackinfo($object["loadup"]["stack"], "Init: Restore the core folder structure");
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
	//hive__folder_create(_HIVE_PATH_API_, 		true, false);
	hive__folder_create(_HIVE_PATH_BACKUP_, 	true, true);
	//hive__folder_create(_HIVE_PATH_CACHE_, 	true, false);
	//hive__folder_create(_HIVE_PATH_CORE_, 	true, false);
	//hive__folder_create(_HIVE_PATH_CRONJOB_, 	true, false);
	//hive__folder_create(_HIVE_PATH_DATA_, 	true, false);
	//hive__folder_create(_HIVE_PATH_IMAGE_, 	true, false);
	hive__folder_create(_HIVE_PATH_IMAGE_OFF_, 	true, true);
	//hive__folder_create(_HIVE_PATH_SITE_, 		true, false);
	hive__folder_create(_HIVE_PATH_SITE_OFF_, 	true, true);
	//hive__folder_create(_HIVE_PATH_STORE_, 				true, false);
	//hive__folder_create(_HIVE_PATH_STORE_."/software", 	true, false);
	//hive__folder_create(_HIVE_PATH_STORE_."/module", 		true, false);
	//hive__folder_create(_HIVE_PATH_STORE_."/cms", 		true, false);
	hive__folder_create(_HIVE_PATH_TEMPLATE_, 	true, true);
	hive__folder_create(_HIVE_PATH_TESTING_, 	true, true);
	hive__folder_create(_HIVE_PATH_UPDATE_, 	true, true);

	/***********************************************************************************************************
		Init: Prepare Middleware Initialization
	***********************************************************************************************************/	
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
	hive___stackinfo($object["loadup"]["stack"], "Init: Prepare Middleware Initialization");
	hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PREVENT_INIT_", false);
	hive___stacksetconst($object["loadup"]["stack"], "_HIVE_OVR_PRE_SETTING_MODE_", false);
	
	/***********************************************************************************************************
		Module/Global Initialization
	***********************************************************************************************************/	
	if(!_HIVE_PREVENT_INIT_) {

		/*******************************************************************************************************
			Module: Start of Site Module Initialzations
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Start of Site Module Initialzations");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		
		/*	Module: Hive Mode Determination
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Hive Mode Determination");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		
		if(!_HIVE_OVR_PRE_SETTING_MODE_) { 
			// Get Default Hive mode if not overrided.
			if(_HIVE_MOD_OVR_) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MODE_DEFAULT_", _HIVE_MOD_OVR_);
			} else { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MODE_DEFAULT_", _HIVE_MODE_PRIMARY_);
			} 
			// Determine Current Hive Mode Array if override is active
			// if _HIVE_MOD_FORCE_ is set than determine HIVE MODE ARRAY
			if(_HIVE_MOD_OVR_) { 
				if(_HIVE_ADMIN_SITE_) { 
					hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MODE_ARRAY_", array(_HIVE_MOD_OVR_, _HIVE_ADMIN_SITE_));
				} else {
					hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MODE_ARRAY_", array(_HIVE_MOD_OVR_));
				} 
			} elseif(@is_array(@_HIVE_MOD_FORCE_)) { 
				if(_HIVE_ADMIN_SITE_) { 
					array_push(_HIVE_MOD_FORCE_, _HIVE_ADMIN_SITE_); 
					hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MODE_ARRAY_", _HIVE_MOD_FORCE_);
				} else {
					hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MODE_ARRAY_", _HIVE_MOD_FORCE_);
				} 
			} 
			// If no override is in place detrermine hive move array
			if(!_HIVE_MOD_OVR_) {
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
					hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MODE_ARRAY_", $folders);
				} else {
					if (($key = array_search(_HIVE_ADMIN_SITE_, $folders)) !== false) { 
						unset($folders[$key]);
					} 
					hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MODE_ARRAY_", $folders);
				} 	 
			}
			unset($directory); 
			unset($folders); 
			unset($contents); 
			unset($key);	
			// Set default Hive Mode if non Set
			if(!isset($_SESSION[_HIVE_COOKIE_."hive_mode"])) { @$_SESSION[_HIVE_COOKIE_."hive_mode"] = _HIVE_MODE_DEFAULT_; }	
			// Restore default mode if old is not active anymore.
			if(@is_string(@$_SESSION[_HIVE_COOKIE_."hive_mode"]) AND  @in_array(@$_SESSION[_HIVE_COOKIE_."hive_mode"], @_HIVE_MODE_ARRAY_)) {
			} else {  
				$_SESSION[_HIVE_COOKIE_."hive_mode"] = _HIVE_MODE_DEFAULT_;
			}		
			// Determine Site Module by URL
			if(is_array(_HIVE_MOD_FETCH_) AND !_HIVE_MOD_OVR_) {
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
					hive__error("Critical Error", "[040-001] Site Mode could not be determined by URL!", "Please check your dynamic site mode by domain settings in the administrator interface or at cfg_ruleset.php.", true, 503); 
					exit();
				} else {	
					$_SESSION[_HIVE_COOKIE_."hive_mode"] = $found_new;
					hive___stacksetconst($object["loadup"]["stack"], "_HIVE_URL_", $found_url."/");
				}
			}		
			// Override _HIVE_MODE_ if _HIVE_MOD_OVR_
			if(_HIVE_MOD_OVR_ AND $_SESSION[_HIVE_COOKIE_."hive_mode"] != _HIVE_MOD_OVR_) {
				if(_HIVE_ADMIN_SITE_ AND $_SESSION[_HIVE_COOKIE_."hive_mode"] == _HIVE_ADMIN_SITE_) {
				} elseif(!_HIVE_ADMIN_SITE_ AND $_SESSION[_HIVE_COOKIE_."hive_mode"] == _HIVE_ADMIN_SITE_) {
					$_SESSION[_HIVE_COOKIE_."hive_mode"] = _HIVE_MOD_OVR_;
				} else {
					$_SESSION[_HIVE_COOKIE_."hive_mode"] = _HIVE_MOD_OVR_;
				}
			} 	
			// Check for Hive Mode per SetEnv Apache 2 Variable 
			$ovr_hive_mode_getenv = @getenv("_HIVE_MODE_ENV_OVR_"); 
			if(strlen($ovr_hive_mode_getenv) > 0 AND trim($ovr_hive_mode_getenv ?? '') != "") { 
				if(@in_array($ovr_hive_mode_getenv, _HIVE_MODE_ARRAY_)) {
					hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MODE_ENV_OVR_", $ovr_hive_mode_getenv);
					$_SESSION[_HIVE_COOKIE_."hive_mode"] = $ovr_hive_mode_getenv;
				} else { 
					hive__error("Critical Error", "[040-002] A Site Module is missing, which has been overrided by Apache2 Environment Variables!", "You have set the Apache2 Environment Variable: '_HIVE_MODE_ENV_OVR_' to '".@htmlspecialchars($ovr_hive_mode_getenv ?? '')."', but this site module does not exist. Please fix the Environment Variable Value to fit a valid site module!", true, 503);
					exit();
				}
			} unset($ovr_hive_mode_getenv);
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MODE_ENV_OVR_", false);
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MODE_", $_SESSION[_HIVE_COOKIE_."hive_mode"]);
		} else {
			// Directory For Site Modules
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
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MODE_ARRAY_", $folders);
			if(@in_array(_HIVE_OVR_PRE_SETTING_MODE_, _HIVE_MODE_ARRAY_)) {
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MODE_", _HIVE_OVR_PRE_SETTING_MODE_);
			} else { 
				hive__error("Critical Error", "[040-003] An error ooccured while trying to view this script using an external site module '".@htmlspecialchars(_HIVE_OVR_PRE_SETTING_MODE_ ?? '')."'.", "Please check the status of the site module which causes this error in the administrator interface.", true, 503);
				exit();
			}	
		}

		/*	Module: Pathes & Variables
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Pathes & Variables");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");			
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_COOKIE_", 			_HIVE_COOKIE_."_"._HIVE_MODE_."_");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_PREFIX_", 			_HIVE_PREFIX_."_"._HIVE_MODE_."_");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_PATH_BACKUP_",  	_HIVE_PATH_BACKUP_."/"._HIVE_MODE_."/");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_PATH_CACHE_", 		_HIVE_PATH_CACHE_."/"._HIVE_MODE_."/");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_PATH_",  			_HIVE_PATH_SITE_."/"._HIVE_MODE_."/");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_PATH_DATA_", 		_HIVE_PATH_DATA_."/"._HIVE_MODE_."/");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_PATH_DKR_", 		_HIVE_PATH_DATA_."/"._HIVE_MODE_."/_docker/");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_PATH_EXT_", 		_HIVE_PATH_DATA_."/"._HIVE_MODE_."/_extension/");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_PATH_EXT_DATA_",   _HIVE_PATH_DATA_."/"._HIVE_MODE_."/_extension-data/");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_PATH_EXT_OFF_",  	_HIVE_PATH_DATA_."/"._HIVE_MODE_."/_extension-disabled/");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_PATH_PRIVATE_", 	_HIVE_PATH_DATA_."/"._HIVE_MODE_."/_private/");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_PATH_PUBLIC_",  	_HIVE_PATH_DATA_."/"._HIVE_MODE_."/_public/");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_PATH_TH_",  		_HIVE_PATH_DATA_."/"._HIVE_MODE_."/_theme/");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_PATH_TH_DATA_",  	_HIVE_PATH_DATA_."/"._HIVE_MODE_."/_theme-data/");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_PATH_TH_OFF_",  	_HIVE_PATH_DATA_."/"._HIVE_MODE_."/_theme-disabled/");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_PATH_LANG_",  		_HIVE_PATH_DATA_."/"._HIVE_MODE_."/_lang/");

		/*	Module: Get current module meta information
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Get current module meta information");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");					
		if(file_exists($object["path"]."/_site/"._HIVE_MODE_."/version.php") AND trim(_HIVE_MODE_ ?? '') != "") { 
			require($object["path"]."/_site/"._HIVE_MODE_."/version.php");
			$object["hive_mode"] = $x;
			$object["module"] = $x;
			if(!is_array($object["hive_mode"])) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_INIT_ERROR_", true);
			}
			unset($x);
		} else {
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_INIT_ERROR_", true);
			$object["hive_mode"] = false;
			$object["module"] = false;
			unset($_SESSION[_HIVE_COOKIE_."hive_mode"]);
		}	
		if(trim(_HIVE_MODE_ ?? '') == "") { 
			if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_INIT_ERROR_", true);
			} 
		}
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[hive_mode] [SET] ".@serialize($object["hive_mode"])."");	
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[module] [SET] ".@serialize($object["hive_mode"])."");	

		/*	Module: Recreate Folder Structure
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Recreate Folder Structure");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");			
		if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) {
			hive__folder_create(_HIVE_SITE_PATH_CACHE_, 					true, false);
			hive__folder_create(_HIVE_SITE_PATH_CACHE_."/__extension", 		true, false);
			hive__folder_create(_HIVE_SITE_PATH_BACKUP_, 					true, true);
			hive__folder_create(_HIVE_SITE_PATH_BACKUP_."/__extension", 	true, true);
			hive__folder_create(_HIVE_SITE_PATH_DATA_, 		true, false);
			hive__folder_create(_HIVE_SITE_PATH_DKR_, 		true, true);
			hive__folder_create(_HIVE_SITE_PATH_EXT_, 		true, false);
			hive__folder_create(_HIVE_SITE_PATH_EXT_DATA_, 	true, false);
			hive__folder_create(_HIVE_SITE_PATH_EXT_OFF_, 	true, true);
			hive__folder_create(_HIVE_SITE_PATH_PUBLIC_, 	true, false);
			hive__folder_create(_HIVE_SITE_PATH_PRIVATE_, 	true, true);
			hive__folder_create(_HIVE_SITE_PATH_TH_, 		true, false);
			hive__folder_create(_HIVE_SITE_PATH_TH_DATA_, 	true, false);
			hive__folder_create(_HIVE_SITE_PATH_TH_OFF_, 	true, true);
			hive__folder_create(_HIVE_SITE_PATH_LANG_, 		true, false);
		} else {
			hive___stackinfo($object["loadup"]["stack"], " Skipped on Error at _HIVE_INTERNAL_INIT_ERROR_ = 1");	
		}				

		/*	Module: Load Extension/Theme Pathes
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Load Extension/Theme Pathes");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");		
		if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) { 
			$object["extensions_path"] = hive__extension_path(_HIVE_MODE_); 
			$object["themes_path"] = hive__theme_path(_HIVE_MODE_); 
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[extensions_path] [SET] ".@serialize($object["extensions_path"])."");
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[themes_path] [SET] ".@serialize($object["themes_path"])."");	
		} else { 
			hive___stackinfo($object["loadup"]["stack"], " Skipped on Error at _HIVE_INTERNAL_INIT_ERROR_ = 1");		
			$object["extensions_path"] = array(); 
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[extensions_path] [SET] ".@serialize(array())."");	
			$object["themes_path"] = array(); 
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[themes_path] [SET] ".@serialize(array())."");	
		}

		/*	Module: Preload Extension Data
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Preload Extension Data");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");		
		$object["hive_mode_config_pre"] = array();
		$object["hive_mode_config_pre"]["site"] = array();
		$object["hive_mode_config_pre"]["extension"] = array();
		$object["hive_mode_config_pre"]["theme"] = array();
		if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) {
			if(is_array(_HIVE_MODE_ARRAY_)) {
				foreach(_HIVE_MODE_ARRAY_ as $k => $v) {  
					if(file_exists($object["path"]."/_site/".$v."/version.php")) { 
						hive___stackinfo($object["loadup"]["stack"], " Preloading data for site: ".$v."");
						$object["hive_mode_config_pre"]["site"][$v] = hive__require_x($object["path"]."/_site/".$v."/version.php");
					} else {
						hive___stackinfo($object["loadup"]["stack"], " Skipping site: ".$v." - no version file found");
					}
				}
			}
			define("_HIVE_PRE_SITE_", $object["hive_mode_config_pre"]["site"]);
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[hive_mode_config_pre][site]");	
			hive___stackinfo($object["loadup"]["stack"], "[CONSTANT] _HIVE_PRE_SITE_ [SET] object[hive_mode_config_pre][site]");	
			if(is_array($object["extensions_path"])) {
				foreach($object["extensions_path"] as $k => $v) {
					if(file_exists($v."/version.php")) {
						hive___stackinfo($object["loadup"]["stack"], " Preloading data for extension: ".$v."");
						$tmpx = hive__require_x($v."/version.php");
						$v = basename($v);
						$object["hive_mode_config_pre"]["extension"][$v] = $tmpx;
					} else {
						$v = basename($v);
						hive___stackinfo($object["loadup"]["stack"], " Skipping extension: ".$v." - no version file found");
					}
				}
			}	
			define("_HIVE_PRE_EXTENSION_", $object["hive_mode_config_pre"]["extension"]);
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[hive_mode_config_pre][extension]");	
			hive___stackinfo($object["loadup"]["stack"], "[CONSTANT] _HIVE_PRE_EXTENSION_ [SET] object[hive_mode_config_pre][extension]");	
			if(is_array($object["themes_path"])) {
				foreach($object["themes_path"] as $k => $v) {
					if(file_exists($v."/version.php")) {
						hive___stackinfo($object["loadup"]["stack"], " Preloading data for theme: ".$v."");
						$tmpx = hive__require_x($v."/version.php");
						$v = basename($v);
						$object["hive_mode_config_pre"]["theme"][$v] = $tmpx;
					} else {
						$v = basename($v);
						hive___stackinfo($object["loadup"]["stack"], " Skipping theme: ".$v." - no version file found");
					}
				}
			}	
			define("_HIVE_PRE_THEME_", $object["hive_mode_config_pre"]["theme"]);
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[hive_mode_config_pre][theme]");	
			hive___stackinfo($object["loadup"]["stack"], "[CONSTANT] _HIVE_PRE_THEME_ [SET] object[hive_mode_config_pre][theme]");
		} else { 
			hive___stackinfo($object["loadup"]["stack"], " Skipped on Error at _HIVE_INTERNAL_INIT_ERROR_ = 1");		
		}	
		
		/*	Module: Create mysql class object
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Create mysql class object");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");		
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[mysql] [SET] x_class_mysql");		
		$object["mysql"] = new x_class_mysql(@$mysql["host"], @$mysql["user"], @$mysql["pass"], @$mysql["db"], @$mysql["port"]);	
		if ($object["mysql"]->lasterror != false) { 
			hive__error("Critical Error", "[000-002] A MySQL Database Connection could not be established.", "Please check your mysql database settings in settings.php.", true, 503);	
			exit(); 
		}	
		if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) {
			$object["mysql"]->log_config(_TABLE_LOG_MYSQL_, _HIVE_MODE_);
			$object["mysql"]->benchmark_config(true, _HIVE_SITE_COOKIE_);
		} else {
			$object["mysql"]->log_config(_TABLE_LOG_MYSQL_, "");
			hive___stackinfo($object["loadup"]["stack"], " MySQL Logging set to global scope because of _HIVE_INTERNAL_INIT_ERROR_ = 1");
			hive___stackinfo($object["loadup"]["stack"], " MySQL benchmark deactivated because of _HIVE_INTERNAL_INIT_ERROR_ = 1");
		}			

		/*	Module: Create logging classes
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Create logging classes");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[log] [SET] x_class_log");
		// One Time Load with Cron Parameter to Create the Table
		$object["log"] = new x_class_log($object["mysql"], _TABLE_LOG_CRON_, "");
		// Initialize Logging Class
		if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) {
			$object["log"] = new x_class_log($object["mysql"], _TABLE_LOG_, _HIVE_MODE_);
		} else {
			$object["log"] = new x_class_log($object["mysql"], _TABLE_LOG_, "");
			hive___stackinfo($object["loadup"]["stack"], " object[log] Logging set to global scope because of _HIVE_INTERNAL_INIT_ERROR_ = 1");	
		}	
		// Temp Global Logging Class	
		$object["log_tmp"] 	= new x_class_log($object["mysql"], _TABLE_LOG_, "");	
		// API Log Class			
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[api_log] [SET] x_class_log");
		$object["api_log"] = new x_class_log($object["mysql"], _TABLE_LOG_API_, "");

		/*	Module: Install Core MySQL Tables
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Install Core MySQL Tables");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		if(!$object["mysql"]->table_exists($object["prefix"]."cms_store")) {
			hive___stackinfo($object["loadup"]["stack"], "Table initial installation: ".$object["prefix"]."cms_store"."");
			$object["log_tmp"]->warning("[CORE] [MYSQL] [INSTALL] [TABLE] ".@htmlspecialchars($object["prefix"]."cms_store" ?? '' )."", "mysql");
			require(_HIVE_PATH_."/_core/_mysql/mysql.cms_store.php");
			$object["mysql"]->free_all();
		} else {
			hive___stackinfo($object["loadup"]["stack"], "Table already exists: ".$object["prefix"]."cms_store"."");	
		}
		if(!$object["mysql"]->table_exists($object["prefix"]."cms_worker")) {
			hive___stackinfo($object["loadup"]["stack"], "Table initial installation: ".$object["prefix"]."cms_worker"."");
			$object["log_tmp"]->warning("[CORE] [MYSQL] [INSTALL] [TABLE] ".@htmlspecialchars($object["prefix"]."cms_worker" ?? '' )."", "mysql");
			require(_HIVE_PATH_."/_core/_mysql/mysql.cms_worker.php");
			$object["mysql"]->free_all();
		} else {
			hive___stackinfo($object["loadup"]["stack"], "Table already exists: ".$object["prefix"]."cms_worker"."");		
		}
		array_push($object["loadup"]["mysql"], _HIVE_PATH_."/_core/_mysql/mysql.cms_store.php");	
		array_push($object["loadup"]["mysql"], _HIVE_PATH_."/_core/_mysql/mysql.cms_worker.php");	
		
		/*	Module: Create API Permission Object
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Create API Permission Object");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[api_perm] [SET] x_class_perm");
		$object["api_perm"] = new x_class_perm($object["mysql"], _TABLE_API_PERM_, "");

		/*	Module: Create Variables Object
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Create Variables Object");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[var] [SET] x_class_var");
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[var_glob] [SET] x_class_var");
		if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) {
			$object["var"] 	= new x_class_var($object["mysql"], _TABLE_VAR_, _HIVE_MODE_);
		} else {
			hive___stackinfo($object["loadup"]["stack"], " object[var] set to global scope because of _HIVE_INTERNAL_INIT_ERROR_ = 1");	
			$object["var"] = new x_class_var($object["mysql"], _TABLE_VAR_, "");
		}
		$object["var_glob"] = new x_class_var($object["mysql"], _TABLE_VAR_, "");			

		/*	Module: Validate site module integrity
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Validate site module integrity");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		// Fetch Data
		if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) {
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_BUILD_", $object["hive_mode"]["build"]);
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_VERSION_", $object["hive_mode"]["version"]);
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_RNAME_", $object["hive_mode"]["rname"]);
			$object["var"]->setup("_HIVE_BUILD_ACTIVE_",@htmlspecialchars( _HIVE_BUILD_ ?? ''), "Current Installed Site Modules Build Number");	
			$object["var"]->setup("_HIVE_RNAME_ACTIVE_",@htmlspecialchars( _HIVE_RNAME_ ?? ''), "Current Installed Site Modules RNAME Identificator");
			$object["var"]->setup("_HIVE_VERSION_ACTIVE_",@htmlspecialchars( _HIVE_VERSION_ ?? ''), "Current Installed Site Modules Version Number");
			$tmp_build 		= $object["var"]->get("_HIVE_BUILD_ACTIVE_");
			hive___stackinfo($object["loadup"]["stack"], "[CONSTANT] _HIVE_BUILD_ACTIVE_ [VALUE] ".$tmp_build."");
			$tmp_rname 		= $object["var"]->get("_HIVE_RNAME_ACTIVE_");
			hive___stackinfo($object["loadup"]["stack"], "[CONSTANT] _HIVE_RNAME_ACTIVE_ [VALUE] ".$tmp_rname."");
			$tmp_version 	= $object["var"]->get("_HIVE_VERSION_ACTIVE_");
			hive___stackinfo($object["loadup"]["stack"], "[CONSTANT] _HIVE_VERSION_ACTIVE_ [VALUE] ".$tmp_version."");
		} else { 
			$tmp_build 		= 0;	
			$tmp_rname 		= 0;
			$tmp_version 	= 0;
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_BUILD_", 0);
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_VERSION_", 0);
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_RNAME_", 0);
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_VERSION_ERROR_", 1);
		}	
		// Checkfor Errors on Build Number 
		if(_HIVE_BUILD_ == 0) { 
			hive___stackinfo($object["loadup"]["stack"], "Error - _HIVE_BUILD_ is 0");	
			if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_VERSION_ERROR_", 1);
			} 
		}
		if(_HIVE_VERSION_ == 0) { 
			hive___stackinfo($object["loadup"]["stack"], "Error - _HIVE_VERSION_ is 0");	
			if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_VERSION_ERROR_", 1);
			} 
		}
		if(_HIVE_RNAME_ == 0) { 
			hive___stackinfo($object["loadup"]["stack"], "Error - _HIVE_RNAME_ is 0");	
			if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_VERSION_ERROR_", 1);
			} 
		}
		if($tmp_build == 0) { 
			hive___stackinfo($object["loadup"]["stack"], "Error - tmp_build is 0");	
			if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_VERSION_ERROR_", 1);
			} 
		}
		if($tmp_rname == 0) { 
			hive___stackinfo($object["loadup"]["stack"], "Error - tmp_rname is 0");	
			if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_VERSION_ERROR_", 1);	
			} 
		}
		if($tmp_version == 0) { 
			hive___stackinfo($object["loadup"]["stack"], "Error - tmp_version is 0");	
			if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_VERSION_ERROR_", 1);
			} 
		}	
		// Check if RNAME Differs from Installed/Initialized 
		if(_HIVE_RNAME_ != $tmp_rname OR @trim($tmp_rname ?? '') == "") {
			hive___stackinfo($object["loadup"]["stack"], "Error - _HIVE_RNAME_ is not equal to tmp_rname");
			if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 	
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_VERSION_ERROR_", 1);
			}
			if(!defined("_HIVE_INTERNAL_RNAME_ERROR_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_RNAME_ERROR_", 1);	
			}
		} 		
		// Build or Version has been downgraded
		if (version_compare(_HIVE_VERSION_, $tmp_version, '<')) {
			hive___stackinfo($object["loadup"]["stack"], "Error - _HIVE_VERSION_ is lower than expected, downgrade is not supported");
			if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_VERSION_ERROR_", 1);		
			}
			if(!defined("_HIVE_INTERNAL_DOWNGRADE_ERROR_")) { 
				define("_HIVE_INTERNAL_DOWNGRADE_ERROR_", 1); 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_DOWNGRADE_ERROR_", 1);	
			}
		}			
		if (version_compare(_HIVE_BUILD_, $tmp_build, '<')) {
			hive___stackinfo($object["loadup"]["stack"], "Error - _HIVE_BUILD_ is lower than expected, downgrade is not supported");
			if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_VERSION_ERROR_", 1);	
			}
			if(!defined("_HIVE_INTERNAL_DOWNGRADE_ERROR_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_DOWNGRADE_ERROR_", 1);	
			}
		}			
		// Build has been upgraded, database changes pending
		if (version_compare(_HIVE_VERSION_, $tmp_version, '>')) {
			hive___stackinfo($object["loadup"]["stack"], "Error - _HIVE_VERSION_ is higher than expected, update of database may be necessary");
			if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_VERSION_ERROR_", 1);	
			}
			if(!defined("_HIVE_INTERNAL_UPDATE_REQ_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_UPDATE_REQ_", 1);		
			}	
		}			
		if (version_compare(_HIVE_BUILD_, $tmp_build, '>')) {
			hive___stackinfo($object["loadup"]["stack"], "Error - _HIVE_BUILD_ is higher than expected, update of database may be necessary");
			if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_VERSION_ERROR_", 1);	
			}
			if(!defined("_HIVE_INTERNAL_UPDATE_REQ_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_UPDATE_REQ_", 1);		
			}	
		}	
		// Unset Variables to save Memory
		unset($tmp_build); unset($tmp_rname); unset($tmp_version);	
		
		/*	Module: Validate core lockdown status
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Validate core lockdown status");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");		
		if(file_exists($object["path"]."/maintenance.lock.php")) {		
			if(!defined("_HIVE_INTERNAL_MT_LOCK_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_MT_LOCK_", 1);	
			}	
		} else {
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_MT_LOCK_", 0);	
		}
		if(file_exists($object["path"]."/update.lock.php")) {	
			if(!defined("_HIVE_INTERNAL_UPDATE_LOCK_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_UPDATE_LOCK_", 1);	
			}	
		} else {
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_UPDATE_LOCK_", 0);	
		}		
		if(file_exists($object["path"]."/backup.lock.php")) {	
			if(!defined("_HIVE_INTERNAL_BACKUP_LOCK_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_BACKUP_LOCK_", 1);
			}	
		} else {
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_BACKUP_LOCK_", 0);
		}	
		if(defined("_HIVE_INTERNAL_BACKUP_LOCK_")) 	{ 
			if(_HIVE_INTERNAL_BACKUP_LOCK_) 	{ 
				if(!defined("_HIVE_INTERNAL_LOCK_")) { hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_LOCK_", 1); } 
			} 
		}
		if(defined("_HIVE_INTERNAL_UPDATE_LOCK_")) 	{ 
			if(_HIVE_INTERNAL_UPDATE_LOCK_) 	{ 
				if(!defined("_HIVE_INTERNAL_LOCK_")) { hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_LOCK_", 1); } 
			} 
		}
		if(defined("_HIVE_INTERNAL_MT_LOCK_")) 		{ 
			if(_HIVE_INTERNAL_MT_LOCK_) 		{ 
				if(!defined("_HIVE_INTERNAL_LOCK_")) { hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_LOCK_", 1); } 
			} 
		}
		if(!defined("_HIVE_INTERNAL_LOCK_")) { 
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_LOCK_", 0);
		}

		/*	Show Lockdown Windows if not Overwritten
		*******************************************************************************************************/			
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_MT_LOCK_OVR_", 0);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_BACKUP_LOCK_OVR_", 0);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_UPDATE_LOCK_OVR_", 0);
		if(!_HIVE_INTERNAL_MT_LOCK_OVR_) {
			if(_HIVE_INTERNAL_MT_LOCK_) {
				hive__error("Maintenance", "[000-003] This website is currently in maintenance mode!<br />Please come back later...", "If you want to end maintenance mode manually, remove the maintenance.lock.php file from the website root directory.", true, 503, false, "cog");
				exit(); 
			}
		}
		if(!_HIVE_INTERNAL_BACKUP_LOCK_OVR_) {
			if(_HIVE_INTERNAL_BACKUP_LOCK_) {
				hive__error("Maintenance", "[000-004] This website is currently doing backup work!<br />Please come back later...", "If you want to end backup mode manually, remove the backup.lock.php file from the website root directory.", true, 503, false, "cog");
				exit(); 	
			}
		}
		if(!_HIVE_INTERNAL_UPDATE_LOCK_OVR_) {
			if(_HIVE_INTERNAL_UPDATE_LOCK_) {
				hive__error("Maintenance", "[000-005] This website is currently updating!<br />Please come back later...", "If you want to end update mode manually, remove the backup.lock.php file from the website root directory.", true, 503, false, "cog");
				exit();
			}
		}

		/*	Module: Set error constants if error
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Set error constants if error");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");			
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_INIT_ERROR_OVR_", 0);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_RNAME_ERROR_OVR_", 0);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_DOWNGRADE_ERROR_OVR_", 0);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_UPDATE_REQ_OVR_", 0);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_VERSION_ERROR_OVR_", 0);
		if(!_HIVE_INTERNAL_INIT_ERROR_OVR_) {
			if(defined("_HIVE_INTERNAL_INIT_ERROR_")) {
				if(_HIVE_INTERNAL_INIT_ERROR_) {
					hive__error("Critical Error", "[000-006] A serious init error has occurred. The issue is related to the current active website module: '".@_HIVE_MODE_."'.", "", true, 503);
					exit();
				}
			}
		}
		if(!_HIVE_INTERNAL_RNAME_ERROR_OVR_) {
			if(defined("_HIVE_INTERNAL_RNAME_ERROR_")) {
				if(_HIVE_INTERNAL_RNAME_ERROR_) {
					hive__error("Critical Error", "[000-007] ".'The Folder installed Site Module with RNAME: \''.@hive__hsc(_HIVE_RNAME_).'\' on Site Modules Folder: \''._HIVE_MODE_.'\' does not match the database installed HIVE_RNAME_ACTIVE: \''.@hive__hsc(_HIVE_RNAME_ACTIVE_ ).'\'. Please restore the previous site modules folder which has been in place and initialized, or delete Site Module RNAME and Version/Build Information off the database (not recommended).'."", "", true, 503);
					exit();
				}
			}
		}
		if(!_HIVE_INTERNAL_DOWNGRADE_ERROR_OVR_) {
			if(defined("_HIVE_INTERNAL_DOWNGRADE_ERROR_")) {
				if(_HIVE_INTERNAL_DOWNGRADE_ERROR_) {
					hive__error("Critical Error", "[000-008] ".'The module files for \''.@hive__hsc(_HIVE_MODE_).'\' appear to have been downgraded. Please reinstall the correct version: \''.@hive__hsc(_HIVE_BUILD_ACTIVE_).'\' to avoid compatibility issues.'."", "", true, 503);
					exit();
				}
			}
		}
		if(!_HIVE_INTERNAL_UPDATE_REQ_OVR_) {
			if(defined("_HIVE_INTERNAL_UPDATE_REQ_")) {
				if(_HIVE_INTERNAL_UPDATE_REQ_) {
					hive__error("Critical Error", "[000-009] ".'The module Build Version in the Database ['.hive__hsc(_HIVE_BUILD_ACTIVE_).'] does not match the current Site Module Build. Please visit the index page to update the module to the latest version.', "", true, 503);
					exit();
				}
			}
		}
		if(!_HIVE_INTERNAL_VERSION_ERROR_OVR_) {
			if(defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
				if(_HIVE_INTERNAL_VERSION_ERROR_) {
					hive__error("Critical Error", "[000-010] A serious versioning error has occurred. The issue is related to the current active website module: '".@_HIVE_MODE_."'.", "", true, 503);
					exit();
				}
			}
		}

		/*	Module: Load extension php libraries
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Load extension php libraries");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");		
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
			$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_);
			foreach (glob($object["path"]."/_site/"._HIVE_MODE_."/_lib/lib.*.php") as $filename) { 
				if(@basename($filename) == "index.php") { continue; } 
				hive___stackfileonce($object["loadup"]["stack"], $filename);
				array_push($object["loadup"]["lib"], $filename);
			}	 
			foreach ($object["extensions_path"] as $hive_extension_loader_current_init) {
				if (is_dir($hive_extension_loader_current_init."/_lib")) {
					$object["extension"] = hive__init_extension_header($object, basename($hive_extension_loader_current_init)); 
					foreach (glob($hive_extension_loader_current_init."/_lib/lib.*.php") as $filenamex){ 
						hive___stackfileonce($object["loadup"]["stack"], $filenamex);
						array_push($object["loadup"]["lib"], $filenamex);
					}
				}		
			}	
		} unset($object["hive_mode_config"]); unset($object["extension"]);		

		/*	Module: Load Pre Configurations
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Load Pre Configurations");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");		
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_"))  {
			if(is_array(_HIVE_MODE_ARRAY_))  {
				foreach(_HIVE_MODE_ARRAY_ as $key => $value) {
					$object["hive_mode_config"] = hive__init_site_header($object, $value);
					$realpath = _HIVE_SITE_PATH_."/"; 
					if (file_exists($realpath."/_config/global_pre.php")) {
						hive___stackfileonce($object["loadup"]["stack"], $realpath."/_config/global_pre.php", false);
						require_once($realpath."/_config/global_pre.php");
						array_push($object["loadup"]["config_pre"], $realpath."/_config/global_pre.php");
					}
				}
			}
		} unset($object["hive_mode_config"]);
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_"))  {	
			$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_); 
			if(file_exists($object["path"]."/_site/"._HIVE_MODE_."/_config/config_pre.php")) {
				hive___stackfileonce($object["loadup"]["stack"], $object["path"]."/_site/"._HIVE_MODE_."/_config/config_pre.php", false);
				require_once($object["path"]."/_site/"._HIVE_MODE_."/_config/config_pre.php");
				array_push($object["loadup"]["config_pre"], $object["path"]."/_site/"._HIVE_MODE_."/_config/config_pre.php");
			}	
			foreach ($object["extensions_path"] as $hive_extension_loader_current_init) {
				if (file_exists($hive_extension_loader_current_init."/_config/config_pre.php")) {
					$object["extension"] = hive__init_extension_header($object, basename($hive_extension_loader_current_init)); 
					hive___stackfileonce($object["loadup"]["stack"], $hive_extension_loader_current_init."/_config/config_pre.php", false);
					require_once $hive_extension_loader_current_init."/_config/config_pre.php";
					array_push($object["loadup"]["config_pre"], $hive_extension_loader_current_init."/_config/config_pre.php");
				}
			}	
		} unset($object["extension"]); unset($object["hive_mode_config"]); 	

		/*	Module: Setup php logging
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Setup php logging");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");		
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_"))  {	
			if(defined("_HIVE_PHP_DEBUG_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PHP_DEBUG_", false);
				if(_HIVE_PHP_DEBUG_ === true) { 
					@ini_set('display_errors', 1); 
					@ini_set('display_startup_errors', 1); 
					@error_reporting(E_ALL);	
					hive___stackinfo($object["loadup"]["stack"], "[INIT-SET] display_errors [SET] 1");
					hive___stackinfo($object["loadup"]["stack"], "[INIT-SET] display_startup_errors [SET] 1");
					hive___stackinfo($object["loadup"]["stack"], "[INIT-SET] error_reporting [SET] E_ALL");
				} else { 
					@ini_set('display_errors', 0); 
					@ini_set('display_startup_errors', 0); 
					hive___stackinfo($object["loadup"]["stack"], "[INIT-SET] display_errors [SET] 0");
					hive___stackinfo($object["loadup"]["stack"], "[INIT-SET] display_startup_errors [SET] 0");
				} 
			} else { 
				@ini_set('display_errors', 0); 
				@ini_set('display_startup_errors', 0); 
				hive___stackinfo($object["loadup"]["stack"], "[INIT-SET] display_errors [SET] 0");
				hive___stackinfo($object["loadup"]["stack"], "[INIT-SET] display_startup_errors [SET] 0");
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PHP_DEBUG_", false);
			} 
			if(defined("_HIVE_PHP_MODS_")) {
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PHP_MODS_", array());
				if(is_array(@_HIVE_PHP_MODS_)) { 
					foreach(_HIVE_PHP_MODS_ as $key => $value) { 
						if(!$object["debug"]->required_php_module($value, false)) {
							hive__error("Critical Error", "[000-011] A PHP Module is missing for current Site Module: '".$value."'. Please install the required PHP Module.", "", true, 503);
							exit();							
						} else {
							hive___stackinfo($object["loadup"]["stack"], "PHP Module for Site Module Found: '".$value."");
						}								
					} 
				} 	
			} else { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_PHP_MODS_", array());
			}	
		}	

		/*	Module: Determine Site URLs
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Determine Site URLs");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");		
		/* Set Up The Real URL as Configured in Settings.php */	
		if(!defined("_HIVE_URL_")) { 
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_URL_", $object["url"]);
		} $object["url"] = _HIVE_URL_;		
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[url] [SET] "._HIVE_URL_."");		
		/* Give constant to work with determinated URLs with no need to set them anywhere. */	
		$tmprel = parse_url(_HIVE_URL_, PHP_URL_PATH);
		if(!$tmprel OR $tmprel == "") { $tmprel = "/"; }
		if (isset($_SERVER['HTTPS']) && @$_SERVER['HTTPS'] === 'on') {
			$link = "https://";
		} else { $link = "http://"; }
		$tmprelx = $link.@$_SERVER["HTTP_HOST"].$tmprel;
		if(substr($tmprelx, -1, 1) != "/") { $tmprelx = $tmprelx."/"; }
		if(substr($tmprel, -1, 1) != "/") { $tmprel = $tmprel."/"; }		
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_URL_REL_", $tmprelx);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_URLC_REL_", $tmprel);
		unset($tmprelx);
		unset($tmprel);
		unset($link);

		/*	Module: Classes Initialization
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Classes Initialization");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");									
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[2fa] [SET] false");
		$object["2fa"] 		= 	false;	
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[crypt] [SET] x_class_crypt");
		$object["crypt"] 	= 	new x_class_crypt();	
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[zip] [SET] x_class_zip");
		$object["zip"] 		= 	new x_class_zip();
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[curl] [SET] x_class_curl");
		$object["curl"] 	= 	new x_class_curl();			
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[api] [SET] x_class_api");
		$object["api"] 		= 	new x_class_api($object["mysql"], _TABLE_API_, "");
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_"))  { $tmp_mode = _HIVE_MODE_; } else { $tmp_mode = ""; }
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_"))  { $tmp_cookie = _HIVE_SITE_COOKIE_; } else { $tmp_cookie = _HIVE_COOKIE_; }
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[benchmark] [SET] x_class_benchmark");
		$object["benchmark"] 	= 	new x_class_benchmark($object["mysql"], _TABLE_LOG_BENCHMARK_, $tmp_mode);
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[comment] [SET] x_class_comment");
		$object["comment"] 		= 	new x_class_comment($object["mysql"], _TABLE_COMMENT_, $tmp_cookie, 0, 0, $tmp_mode);	
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[hitcounter] [SET] x_class_hitcounter");	
		$object["hitcounter"] 	= 	new x_class_hitcounter($object["mysql"], _TABLE_LOG_VISIT_, $tmp_cookie, $tmp_mode);
		$object["hitcounter"]->clearget(false);	
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[eventbox] [SET] x_class_eventbox");
		$object["eventbox"] 	= 	new x_class_eventbox($tmp_cookie);
		// Unset temp Hive Mode
		unset($tmp_mode);
		unset($tmp_cookie);
		// Initialize Debugging Class Javascript Error Database
		hive___stackinfo($object["loadup"]["stack"], "[EXECUTE] object[debug]->js_error_create_db");
		$object["debug"]->js_error_create_db($object["mysql"], _TABLE_LOG_JS_);

		/*	Module: Load Center Configuration
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Load Center Configuration");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_"))  {
			if(is_array(_HIVE_MODE_ARRAY_))  {
				foreach(_HIVE_MODE_ARRAY_ as $key => $value) {
					$realpath = _HIVE_SITE_PATH_."/";
					$object["hive_mode_config"] = hive__init_site_header($object, $value);
					if (file_exists($realpath."/_config/global.php")) {
						hive___stackfileonce($object["loadup"]["stack"], $realpath."/_config/global.php", false);
						require_once($realpath."/_config/global.php");
						array_push($object["loadup"]["config"], $realpath."/_config/global.php");
					}
				}
			}
		} unset($object["hive_mode_config"]);	
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
			$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_); 
			if(file_exists($object["path"]."/_site/"._HIVE_MODE_."/_config/config.php")) { 
				hive___stackfileonce($object["loadup"]["stack"], $object["path"]."/_site/"._HIVE_MODE_."/_config/config.php", false);
				require_once($object["path"]."/_site/"._HIVE_MODE_."/_config/config.php"); 
				array_push($object["loadup"]["config"], $object["path"]."/_site/"._HIVE_MODE_."/_config/config.php");
			} 
			foreach ($object["extensions_path"] as $hive_extension_loader_current_init) {
				if (file_exists($hive_extension_loader_current_init."/_config/config.php")) {
					$object["extension"] = hive__init_extension_header($object, basename($hive_extension_loader_current_init)); 
					hive___stackfileonce($object["loadup"]["stack"], $hive_extension_loader_current_init."/_config/config.php", false);
					require_once $hive_extension_loader_current_init."/_config/config.php";
					array_push($object["loadup"]["config"], $hive_extension_loader_current_init."/_config/config.php");
				}
			} 	
		} unset($object["hive_mode_config"]); unset($object["extension"]);	

		/*	Module: Site Module Initializations
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Site Module Initializations");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");					
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) {  
			$object["var"] = new x_class_var($object["mysql"], _TABLE_VAR_, _HIVE_MODE_); 
			$object["var"]->init_constant();	
		} else { $object["var"] =  new x_class_var($object["mysql"], _TABLE_VAR_, ""); }
		hive___stacksetconst($object["loadup"]["stack"], "_TINYMCE_PLUGINS_", "preview importcss searchreplace autolink directionality visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor advlist lists wordcount help charmap quickbars emoticons code");
		hive___stacksetconst($object["loadup"]["stack"], "_TINYMCE_MENU_BAR_", "file edit view insert format table help");
		hive___stacksetconst($object["loadup"]["stack"], "_TINYMCE_TOOL_BAR_", "undo redo | bold italic underline strikethrough | blocks fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | image media link");
		hive___stacksetconst($object["loadup"]["stack"], "_CRON_ENABLE_LOG_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_CRON_ONLY_CLI_", true);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_CURL_LOGGING_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_CSRF_TIME_", 2400);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_URL_GET_", array("hl1", "hl2", "hl4", "hl5", "hl6"));
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_URL_SEO_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_URL_SEO_GETVAR_", "hive__seo_tag_loc");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_TITLE_SPACER_", " - ");
		hive___stacksetconst($object["loadup"]["stack"], "_CAPTCHA_COLORS_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_CAPTCHA_SQUARES_", mt_rand(5, 12));
		hive___stacksetconst($object["loadup"]["stack"], "_CAPTCHA_LINES_", mt_rand(5, 12));
		hive___stacksetconst($object["loadup"]["stack"], "_CAPTCHA_HEIGHT_", "70");
		hive___stacksetconst($object["loadup"]["stack"], "_CAPTCHA_WIDTH_", "200");
		hive___stacksetconst($object["loadup"]["stack"], "_CAPTCHA_CODE_", mt_rand(1000, 9999));
		hive___stacksetconst($object["loadup"]["stack"], "_CAPTCHA_FONT_PATH_", "../_font/captcha.ttf");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_TITLE_", "CMS");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_URL_", _HIVE_URL_REL_);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITE_REL_", "_site/"._HIVE_MODE_."/");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SITEC_REL_", _HIVE_URLC_REL_."_site/"._HIVE_MODE_."/");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_JS_ACTION_ACTIVE_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_USER_LOG_IP_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_USER_LOG_SESSIONS_", true);
		hive___stacksetconst($object["loadup"]["stack"], "_USER_MULTI_LOGIN_", true);
		hive___stacksetconst($object["loadup"]["stack"], "_USER_REC_DROP_", true);
		hive___stacksetconst($object["loadup"]["stack"], "_USER_MAX_SESSION_", 7);
		hive___stacksetconst($object["loadup"]["stack"], "_USER_TOKEN_TIME_", 600);
		hive___stacksetconst($object["loadup"]["stack"], "_USER_PF_SIGNS_", 7);
		hive___stacksetconst($object["loadup"]["stack"], "_USER_PF_CAPSIGNS_", 1);
		hive___stacksetconst($object["loadup"]["stack"], "_USER_PF_SMSIGNS_", 1);
		hive___stacksetconst($object["loadup"]["stack"], "_USER_PF_NUMSIGNS_", 1);
		hive___stacksetconst($object["loadup"]["stack"], "_USER_PF_SPSIGNS_", 0);
		hive___stacksetconst($object["loadup"]["stack"], "_USER_AUTOBLOCK_", 99000);
		hive___stacksetconst($object["loadup"]["stack"], "_USER_WAIT_COUNTER_", 120);
		hive___stacksetconst($object["loadup"]["stack"], "_USER_INITIAL_USERNAME_", "admin@admin.local");
		hive___stacksetconst($object["loadup"]["stack"], "_USER_INITIAL_USERPASS_", "changeme");
		hive___stacksetconst($object["loadup"]["stack"], "_REDIS_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_REDIS_HOST_", "localhost");
		hive___stacksetconst($object["loadup"]["stack"], "_REDIS_PORT_", 6379);
		hive___stacksetconst($object["loadup"]["stack"], "_REDIS_PREFIX_", _HIVE_SITE_PREFIX_);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_IP_LIMIT_", 100000);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_REFERER_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_SMTP_HOST_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_SMTP_PORT_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_SMTP_AUTH_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_SMTP_USER_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_SMTP_PASS_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_SMTP_SENDER_NAME_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_SMTP_SENDER_MAIL_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_SMTP_INSECURE_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_SMTP_DEBUG_", 0);
		hive___stacksetconst($object["loadup"]["stack"], "_SMTP_MAILS_IN_HTML_", true);
		hive___stacksetconst($object["loadup"]["stack"], "_SMTP_MAILS_FOOTER_", '</div></body></html>');
		hive___stacksetconst($object["loadup"]["stack"], "_SMTP_MAILS_HEADER_", '<!doctype html><html><head><meta name="viewport" content="width=device-width, initial-scale=1.0"/><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><style>body { background-color: #121212; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; } .content { background: #FFFFFF; box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px; border-radius: 5px; margin-top: 15px;  }  .footer { clear: both; margin-top: 10px; text-align: center; width: 100%; color: #000000; font-size: 12px; text-align: center;  }  h1, h2, h3, h4 { color: #000000; font-family: sans-serif; font-weight: 400; line-height: 1.4; margin: 0; margin-bottom: 30px; }  h1 { font-size: 35px; font-weight: 300; text-align: center; text-transform: capitalize; }  a { color: blue; text-decoration: none; } hr { border: 0; border-bottom: 1px solid #242424; margin: 20px 0; }  @media only screen and (max-width: 620px) { div.content { margin-top: 2vw !important; margin-left: 2vw !important; margin-right: 2vw !important;}} a:hover { color: black; } .alert { padding: 15px; margin: 5px; border-radius: 5px; } .alert-danger { background: #FFCDD2; } .alert-success { background: #A5D6A7; } .alert-warning { background: #FFF9C4; }</style></head><body><div class="content">');
		
		/*	Module: Checking requested mysql debug mode
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Checking requested mysql debug mode");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");		
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_MYSQL_DEBUG_", false);	
		if(_HIVE_MYSQL_DEBUG_) { 
			hive___stackinfo($object["loadup"]["stack"], "[EXECUTE] object[mysql]->stop_on_error");
			hive___stackinfo($object["loadup"]["stack"], "[EXECUTE] object[mysql]->display_on_error");
		}		

		/*	Module: User object initialization
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: User object initialization");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");								
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[user] [SET] x_class_user");
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
		$object["user"]->min_activation(_USER_TOKEN_TIME_);
		$object["user"]->min_recover(_USER_TOKEN_TIME_);
		$object["user"]->min_mail_edit(_USER_TOKEN_TIME_);
		$object["user"]->sessions_days(_USER_MAX_SESSION_);
		$object["user"]->cookies_use(true);
		$object["user"]->cookies_days(_USER_MAX_SESSION_);	
		$object["user"]->passfilter(_USER_PF_SIGNS_, _USER_PF_CAPSIGNS_, _USER_PF_SMSIGNS_, _USER_PF_SPSIGNS_, _USER_PF_NUMSIGNS_);	
		$object["user"]->groups(_TABLE_USER_GROUP_, _TABLE_USER_GROUP_LINK_);		
		$object["user"]->extrafields(_TABLE_USER_EXTRAFIELD_);	
		if(_USER_AUTOBLOCK_ > 0) { $tmp_autoblock = _USER_AUTOBLOCK_; }
			else { $tmp_autoblock = false; }
		$object["user"]->autoblock($tmp_autoblock);
		unset($tmp_autoblock);		
		$object["user"]->init();

		/*	Module: User permissions object initialization
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: User permissions object initialization");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");			
		if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) { 
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[perm_group] [SET] x_class_perm");
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[perm_user] [SET] x_class_perm");
			$object["perm_user"]  = new x_class_perm($object["mysql"], _TABLE_USER_PERM_, _HIVE_MODE_);
			$object["perm_group"] = new x_class_perm($object["mysql"], _TABLE_USER_GROUP_PERM_, _HIVE_MODE_);	
		} else {
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[perm_group] [SKIPPED] on error with _HIVE_INTERNAL_INIT_ERROR_");
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[perm_user] [SKIPPED] on error with _HIVE_INTERNAL_INIT_ERROR_");
			$object["perm_group"] = false;
			$object["perm_user"] = false;
		}
		$object["perm_group_glob"] 	= 	new x_class_perm($object["mysql"], _TABLE_USER_GROUP_PERM_, "");	
		$object["perm_user_glob"] 	= 	new x_class_perm($object["mysql"], _TABLE_USER_PERM_, "");	

		/*	Module: Current user Permission Initialization
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Current user Permission Initialization");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");		
		if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) { 
			if(@is_numeric(@$object["user"]->user_id)) {
				hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[user_perm] [SET] x_class_perm_item");
				hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[user_perm_glob] [SET] x_class_perm_item");
				$object["user_perm"] = $object["perm_user"]->item($object["user"]->user_id);	
				$object["user_perm_glob"] = $object["perm_user_glob"]->item($object["user"]->user_id);	
			} else {
				$object["user_perm"] = false;
				$object["user_perm_glob"] = false;
				hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[user_perm] [SKIPPED] not logged in");
				hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[user_perm_glob] [SKIPPED] not logged in");
			}
		} else {
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[user_perm] [SKIPPED] on error with _HIVE_INTERNAL_INIT_ERROR_");
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[user_perm_glob] [SKIPPED] on error with _HIVE_INTERNAL_INIT_ERROR_");
			$object["user_perm"] = false;
			$object["user_perm_glob"] = false;
		}			

		/*	Module: Current user groups Permission Initialization
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Current user groups Permission Initialization");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		if(!defined("_HIVE_INTERNAL_INIT_ERROR_")) { 
			if(@is_numeric(@$object["user"]->user_id)) {
				hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[user_group] [SET] Array with valid groups");
				$object["user_group"] = array();
				$tmp = $object["mysql"]->select("SELECT * FROM "._TABLE_USER_GROUP_LINK_." WHERE fk_user = '".@$object["user"]->user_id."'", true);
				if(is_array($tmp)) {
					foreach($tmp AS $key => $value) {
						$valuex = $object["mysql"]->select("SELECT * FROM "._TABLE_USER_GROUP_." WHERE id = '".$value["fk_group"]."'", false);
						if(!is_array($valuex)) { continue; }
						hive___stackinfo($object["loadup"]["stack"], "Found group for user: ".@$valuex["id"]."");
						$valuex["perm_obj"] = $object["perm_group"]->item($value["fk_group"]);
						$valuex["perm_obj_glob"] = $object["perm_group_glob"]->item($value["fk_group"]);
						array_push($object["user_group"], $valuex);
					}	
				} unset($tmp);	
			} else {
				$object["user_group"] = false;
				hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[user_group] [SKIPPED] not logged in");
			}
		} else {
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[user_group] [SKIPPED] on error with _HIVE_INTERNAL_INIT_ERROR_");
			$object["user_group"] = false;
		}	

		/*	Module: MySQL Recreation
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: MySQL Recreation");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 	
			$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_); 
			foreach (glob($object["path"]."/_site/"._HIVE_MODE_."/_mysql/mysql.*.php") as $filename) { 
				if(@basename($filename) == "index.php") { continue; } 
				if(!$object["mysql"]->table_exists(_HIVE_SITE_PREFIX_.substr(basename($filename), 6, -4))) {
					$object["log_tmp"]->warning("[CORE] [MYSQL] [INSTALL] [TABLE] ".@htmlspecialchars(_HIVE_SITE_PREFIX_.substr(basename($filename), 6, -4) ?? '' )." [SITE] ".@htmlspecialchars(_HIVE_MODE_ ?? '')."", "mysql");					
					hive___stackinfo($object["loadup"]["stack"], "Table installed for site module '".@_HIVE_MODE_."': '".$filename."'");
					require_once($filename);
					$object["mysql"]->free_all();	
				} else { 
					hive___stackinfo($object["loadup"]["stack"], "Table already installed for site module '".@_HIVE_MODE_."': '".$filename."'");
				}
				array_push($object["loadup"]["mysql"], $filename);
			}
			// Extension Libraries
			foreach ($object["extensions_path"] as $hive_extension_loader_current_init) {
				$object["extension"] = hive__init_extension_header($object, basename($hive_extension_loader_current_init)); 
				foreach (glob($hive_extension_loader_current_init."/_mysql/mysql.*.php") as $filenamemm){
					if(@basename($filenamemm) == "index.php") { continue; } 
					if(!$object["mysql"]->table_exists($object["extension"]["prefix"].substr(basename($filenamemm), 6, -4))) {
						$object["log"]->warning("[CORE] [MYSQL] [INSTALL] [TABLE] ".@htmlspecialchars($object["extension"]["prefix"].substr(basename($filenamemm), 6, -4) ?? '' )." [SITE] "._HIVE_MODE_." [EXT] ".htmlspecialchars($object["extension"]["name"] ?? '') ."", "mysql");
						hive___stackinfo($object["loadup"]["stack"], "Table installed for site module '".@_HIVE_MODE_."' on extension ['".htmlspecialchars($object["extension"]["name"] ?? '')."': '".$filenamemm."'");
						require_once($filenamemm);
						$object["mysql"]->free_all();
					} else {
						hive___stackinfo($object["loadup"]["stack"], "Table already installed for site module '".@_HIVE_MODE_."' on extension ['".htmlspecialchars($object["extension"]["name"] ?? '')."']: '".$filenamemm."'");
					}
					array_push($object["loadup"]["mysql"], $filenamemm);
				}	
			}	
		} else {
			hive___stackinfo($object["loadup"]["stack"], "No site module tables installed _HIVE_INTERNAL_INIT_ERROR_ is set.");
		}	
		// Clear Temp Log
		unset($object["log_tmp"]); 
	
		/*	Module: Referer class object creation
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Referer class object creation");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		if(defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
			$tmp_type = ""; 
		} else { 
			$tmp_type = _HIVE_MODE_; 
		}
		hive___stackinfo($object["loadup"]["stack"], "Scope will be: ".$tmp_type."");
		if(@$_SERVER["HTTP_HOST"]) { 
			$tmp_host = @$_SERVER["HTTP_HOST"]; 
		} else { 
			$tmp_host = ""; 
		}
		hive___stackinfo($object["loadup"]["stack"], "Host will be: ".$tmp_host."");
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[referer] [SET] x_class_referer");
		$object["referer"] = new x_class_referer($object["mysql"], _TABLE_LOG_REFERER_, $tmp_host);	
		if(_HIVE_REFERER_) 	{ 
			$object["referer"]->execute($tmp_type); 
		}
		unset($tmp_host);
		unset($tmp_type);		

		/*	Module: Redis class object creation
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Redis class object creation");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		if(_REDIS_) {
			$object["redis"] = new x_class_redis(_REDIS_HOST_, _REDIS_PORT_, _REDIS_PREFIX_);
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[redis] [SET] x_class_redis");
		} else { 
			$object["redis"] = false;
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[redis] [SET] false");
		}

		/*	Module: IP Blacklist class object creation
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: IP Blacklist class object creation");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[ipbl] [SET] x_class_ipbl");
		$object["ipbl"] = new x_class_ipbl($object["mysql"], _TABLE_LOG_IP_, _HIVE_IP_LIMIT_);	

		/*	Module: Curl class object creation
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Curl class object creation");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[ipbl] [SET] x_class_ipbl");
		if(defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
			$tmp_type = ""; 
		} else { 
			$tmp_type = _HIVE_MODE_; 
		}		
		hive___stackinfo($object["loadup"]["stack"], "Scope will be: ".$tmp_type."");		
		$object["curl"]->logging($object["mysql"], _HIVE_CURL_LOGGING_, true, _TABLE_LOG_CURL_, $tmp_type);	
		unset($tmp_type);			

		/*	Module: Mail class object creation
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Mail class object creation");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[mail] [SET] x_class_mail");
		if(defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
			$tmp_type = ""; 
		} else { 
			$tmp_type = _HIVE_MODE_; 
		}		
		hive___stackinfo($object["loadup"]["stack"], "Scope will be: ".$tmp_type."");	
		$object["mail"] = new x_class_mail(_SMTP_HOST_, _SMTP_PORT_, _SMTP_AUTH_, _SMTP_USER_, _SMTP_PASS_, _SMTP_SENDER_MAIL_, _SMTP_SENDER_NAME_);
		$object["mail"]->initReplyTo(_SMTP_SENDER_MAIL_, _SMTP_SENDER_NAME_);
		$object["mail"]->change_default_template(_SMTP_MAILS_HEADER_, _SMTP_MAILS_FOOTER_);		
		$object["mail"]->all_default_html(_SMTP_MAILS_IN_HTML_);	
		$object["mail"]->smtpdebuglevel(_SMTP_DEBUG_);	
		$object["mail"]->allow_insecure_ssl_connections(_SMTP_INSECURE_);		
		$object["mail"]->logging($object["mysql"], _TABLE_LOG_MAIL_, false, $tmp_type);	
		unset($tmp_type);		

		/*	Module: Mail template class object creation
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Mail template class object creation");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		if(defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
			$tmp_type = ""; 
		} else { 
			$tmp_type = _HIVE_MODE_; 
		}		
		hive___stackinfo($object["loadup"]["stack"], "Scope will be: ".$tmp_type."");
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
			$object["mail_template"] = new x_class_mail_template($object["mysql"], _TABLE_MAIL_TPL_, $tmp_type, "");
			$object["mail_template"]->set_header(_SMTP_MAILS_HEADER_);
			$object["mail_template"]->set_footer(_SMTP_MAILS_FOOTER_);	
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[mail_template] [SET] x_class_mail_template");
		} else { 
			$object["mail_template"] = false;
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[mail_template] [SET] false");
		}				
		unset($tmp_type);		

		/*	Module: Get current url location information 
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Get current url location information ");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");			
		if(!_HIVE_URL_SEO_) { 
			hive___stackinfo($object["loadup"]["stack"], "No Rewrite SEO Friendly Location Variables used.");
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_URL_CUR_", array(@$_GET[_HIVE_URL_GET_[0]], @$_GET[_HIVE_URL_GET_[1]], @$_GET[_HIVE_URL_GET_[2]], @$_GET[_HIVE_URL_GET_[3]], @$_GET[_HIVE_URL_GET_[4]]));
		} else {   
			hive___stackinfo($object["loadup"]["stack"], "Rewrite SEO Friendly Location Variables used.");
			if(isset($_GET[_HIVE_URL_SEO_GETVAR_])) { 
				$tmp = explode("/", @$_GET[_HIVE_URL_SEO_GETVAR_]); 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_URL_CUR_", array(@$tmp[0], @$tmp[1], @$tmp[2], @$tmp[3], @$tmp[4]));
			} else {
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_URL_CUR_", array(false, false, false, false, false));
			}					
		}		

		/*	Module: Initialize current langage setup
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Initialize current langage setup");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[lang] [SET] x_class_lang");	
		$object["lang"] = new x_class_lang($object["mysql"], _TABLE_LANG_, false, false, false);	
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
			// Check for Var init
			if(!defined("_HIVE_LANG_ARRAY_")) 	{ 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_LANG_ARRAY_", array());
			} else {
				// already set, just output for the stack trace
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_LANG_ARRAY_", array());
			}		
			if(!defined("_HIVE_LANG_DEFAULT_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_LANG_DEFAULT_", "en");
			} else {
				// already set, just output for the stack trace
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_LANG_DEFAULT_", array());
			}		
			unset($object["lang"]);
			// Set Default if not set or wrong			
			if(isset($_SESSION[_HIVE_SITE_COOKIE_."hive_language"])) {
				if(in_array($_SESSION[_HIVE_SITE_COOKIE_."hive_language"], _HIVE_LANG_ARRAY_)) {
				} else { 
					$_SESSION[_HIVE_SITE_COOKIE_."hive_language"] = _HIVE_LANG_DEFAULT_; 
					hive___stackinfo($object["loadup"]["stack"], " Fallback to default ");
				}
			} else { 
				$_SESSION[_HIVE_SITE_COOKIE_."hive_language"] = _HIVE_LANG_DEFAULT_;
				hive___stackinfo($object["loadup"]["stack"], " Fallback to default ");
			}		
			// Load Users Prefered Language if none set.
			if($object["user"]->user_loggedIn AND is_array($object["hive_mode"])) {
				$tmp = $object["user"]->user["hive_extradata"];
				$tmp = @unserialize($tmp);
				if(is_array(@$tmp[_HIVE_MODE_])) {
					if(isset($tmp[_HIVE_MODE_]["lang"]) AND @$tmp[_HIVE_MODE_]["lang"] AND @trim(@$tmp[_HIVE_MODE_]["lang"] ?? '') != "") {
						if(@in_array(@$tmp[_HIVE_MODE_]["lang"], _HIVE_LANG_ARRAY_)) {
							$_SESSION[_HIVE_SITE_COOKIE_."hive_language"] = @$tmp[_HIVE_MODE_]["lang"];
							hive___stackinfo($object["loadup"]["stack"], " Fallback to user db saved hive_extradata variable ");					
						}
					}
				}
			} unset($tmp); 		
			// Save in Variable
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_LANG_", $_SESSION[_HIVE_SITE_COOKIE_."hive_language"]);
			// Load Current Core Language
			$object["lang_tmp_def"] = new x_class_lang(false, false, false, false, $object["path"]."/_core/_lang/"._HIVE_LANG_.".php"); 
			// Load Current Site Module Language
			if(file_exists($object["path"]."/_data/"._HIVE_MODE_."/_lang/"._HIVE_LANG_.".php")) { 
				$object["lang"] = new x_class_lang(false, false, false, false, $object["path"]."/_data/"._HIVE_MODE_."/_lang/"._HIVE_LANG_.".php"); 		
			} elseif(file_exists(_HIVE_SITE_PATH_."/_lang/"._HIVE_LANG_.".php")) {
				$object["lang"] = new x_class_lang(false, false, false, false, _HIVE_SITE_PATH_."/_lang/"._HIVE_LANG_.".php"); 
			} else {
				$object["lang"] = new x_class_lang(false, false, false, false, $object["path"]."/_core/_lang/en.php");
			}
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
		}	

		/*	Module: Initialize current theme setup
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Initialize current theme setup");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
			// Check for Var init
			if(!defined("_HIVE_THEME_ARRAY_")) 	{ 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_THEME_ARRAY_", array());
			} else {
				// already set, just output for the stack trace
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_THEME_ARRAY_", array());
			}					
			if(!defined("_HIVE_THEME_DEFAULT_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_THEME_DEFAULT_", false);
			} else {	
				// already set, just output for the stack trace
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_THEME_DEFAULT_", array());
			}			
			// Check for Validity
			if(isset($_SESSION[_HIVE_SITE_COOKIE_."hive_theme"])) {
				if(@in_array(@$_SESSION[_HIVE_SITE_COOKIE_."hive_theme"], _HIVE_THEME_ARRAY_)) {
				} else { 
					$_SESSION[_HIVE_SITE_COOKIE_."hive_theme"] = _HIVE_THEME_DEFAULT_; 
					hive___stackinfo($object["loadup"]["stack"], " Fallback to default ");
				}
			} else { 
				$_SESSION[_HIVE_SITE_COOKIE_."hive_theme"] = _HIVE_THEME_DEFAULT_; 
				hive___stackinfo($object["loadup"]["stack"], " Fallback to default ");
			}		
			// If logged in restore Failsafed Theme on Site Module
			if($object["user"]->user_loggedIn AND is_array($object["hive_mode"])) {
				$tmp = $object["user"]->user["hive_extradata"];
				$tmp = @unserialize($tmp);
				if(is_array(@$tmp[_HIVE_MODE_])) {
					if(isset($tmp[_HIVE_MODE_]["theme"]) AND @$tmp[_HIVE_MODE_]["theme"] AND @trim(@$tmp[_HIVE_MODE_]["theme"] ?? '') != "") {
						if(@in_array(@$tmp[_HIVE_MODE_]["theme"], _HIVE_THEME_ARRAY_)) {
							$_SESSION[_HIVE_SITE_COOKIE_."hive_theme"] = @$tmp[_HIVE_MODE_]["theme"];	
							hive___stackinfo($object["loadup"]["stack"], " Fallback to user db saved hive_extradata variable ");		
						}
					}
				}
			} 			
			// Init some Variables
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_THEME_", $_SESSION[_HIVE_SITE_COOKIE_."hive_theme"]);
			unset($tmp);
		} else { 
			hive___stackinfo($object["loadup"]["stack"], "Skipped because of _HIVE_INTERNAL_VERSION_ERROR_ = 1");
		}	

		/*	Module: Initialize current color setup
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Initialize current color setup");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) {		
			// Check for Var init
			if(!defined("_HIVE_THEME_COLOR_DEFAULT_")){ 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_THEME_COLOR_DEFAULT_", "#FFFF00");				
			} else {
				// already set, just output for the stack trace
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_THEME_COLOR_DEFAULT_", array());
			}		
			// Reset Session Color
			if(isset($_SESSION[_HIVE_SITE_COOKIE_."hive_color"])) {
			} else { 
				$_SESSION[_HIVE_SITE_COOKIE_."hive_color"] = _HIVE_THEME_COLOR_DEFAULT_; 	
				hive___stackinfo($object["loadup"]["stack"], " Fallback to default ");
			}
			// Get Userdata Hive for Multi Site Saves
			if($object["user"]->user_loggedIn AND is_array($object["hive_mode"])) {
				$tmp = $object["user"]->user["hive_extradata"];
				$tmp = @unserialize($tmp);
				if(is_array(@$tmp[_HIVE_MODE_])) {
					if(isset($tmp[_HIVE_MODE_]["color"]) AND @$tmp[_HIVE_MODE_]["color"] AND @trim(@$tmp[_HIVE_MODE_]["color"] ?? '') != "") {
						$_SESSION[_HIVE_SITE_COOKIE_."hive_color"] = @$tmp[_HIVE_MODE_]["color"];	
						hive___stackinfo($object["loadup"]["stack"], " Fallback to user db saved hive_extradata variable ");		
					}
				}
			}	
			// Init some Variables
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_COLOR_", $_SESSION[_HIVE_SITE_COOKIE_."hive_color"]);
			unset($tmp);
		} else { 
			hive___stackinfo($object["loadup"]["stack"], "Skipped because of _HIVE_INTERNAL_VERSION_ERROR_ = 1");
		}			

		/*	Module: Advanced Preloading
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Advanced Preloading");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) {	
			// First init of Variables
			$object["hive_mode_config_pre"]["extension_lang"] = array();
			$object["hive_mode_config_pre"]["site_lang"] = array();		
			$object["hive_mode_config_pre"]["theme_lang"] = array();		
			// Get Hive Modules Preloaders
			if(is_array(_HIVE_MODE_ARRAY_)) { 
				foreach(_HIVE_MODE_ARRAY_ as $k => $v) {
					if(file_exists($object["path"]."/_site/".$v."/version.php")) { 
						$object["hive_mode_config_pre"]["site_lang"][$v] = false;
						$tmp_path = $object["path"]."/_site/".$v."/";
						// Language Array Information
						if(defined("_HIVE_LANG_")) { 
							if(file_exists($tmp_path."/_admin/_lang/"._HIVE_LANG_.".php")) {  
								// Looad if current language available in site module
								$object["hive_mode_config_pre"]["site_lang"][$v] = new x_class_lang(false, false, false, false, $tmp_path."/_admin/_lang/"._HIVE_LANG_.".php");  
							} elseif(file_exists($tmp_path."/_admin/_lang/en.php")) { 
								// Use english language as fallback language
								$object["hive_mode_config_pre"]["site_lang"][$v] = new x_class_lang(false, false, false, false, $tmp_path."/_admin/_lang/en.php");  
							} else { 
								// Set false if no language for this module found
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
			define("_HIVE_PRE_LANG_SITE_", $object["hive_mode_config_pre"]["site_lang"]);
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[hive_mode_config_pre][site_lang]");	
			hive___stackinfo($object["loadup"]["stack"], "[CONSTANT] _HIVE_PRE_LANG_SITE_ [SET] object[hive_mode_config_pre][site_lang]");	
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
								$object["hive_mode_config_pre"]["extension_lang"][$v] = new x_class_lang(false, false, false, false, $vpath."/_lang/"._HIVE_LANG_.".php");  
							} elseif(file_exists($vpath."/_lang/en.php")) { 
								// Take fallback english language file
								$object["hive_mode_config_pre"]["extension_lang"][$v] = new x_class_lang(false, false, false, false, $vpath."/_lang/en.php");  
							} else { 
								// Take no language file
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
			define("_HIVE_PRE_LANG_EXTENSION_", $object["hive_mode_config_pre"]["extension_lang"]);
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[hive_mode_config_pre][extension_lang]");	
			hive___stackinfo($object["loadup"]["stack"], "[CONSTANT] _HIVE_PRE_LANG_EXTENSION_ [SET] object[hive_mode_config_pre][extension_lang]");	
			// Themes Preinit
			if(is_array($object["themes_path"])) {
				foreach($object["themes_path"] as $k => $v) {
					if(file_exists($v."/version.php")) {
						$vpath = $v;
						$v = basename($v);
						$object["hive_mode_config_pre"]["theme_lang"][$v] = false;
						// Include Relative Extension Language Files
						if(defined("_HIVE_LANG_")) {
							if(file_exists($vpath."/_lang/"._HIVE_LANG_.".php")) { 
								// Take current language file
								$object["hive_mode_config_pre"]["theme_lang"][$v] = new x_class_lang(false, false, false, false, $vpath."/_lang/"._HIVE_LANG_.".php");  
							} elseif(file_exists($vpath."/_lang/en.php")) { 
								// Take fallback english language file
								$object["hive_mode_config_pre"]["theme_lang"][$v] = new x_class_lang(false, false, false, false, $vpath."/_lang/en.php");  
							} else { 
								// Take no language file
								$object["hive_mode_config_pre"]["theme_lang"][$v] 		= false; 
							}
						}	
						// Override language from database
						$tmp = false;
						if(@is_object($object["hive_mode_config_pre"]["theme_lang"][$v])) { 
							$tmp = new x_class_lang($object["mysql"], _TABLE_LANG_, @$_SESSION[_HIVE_SITE_COOKIE_."hive_language"], _HIVE_MODE_, false);		
							foreach($tmp->array as $key => $value) { 
								$nametoget = "___the_".$v."_";
								$nametogetcounter = strlen($nametoget);
								if(substr($key, 0, $nametogetcounter) == $nametoget) { $object["hive_mode_config_pre"]["theme_lang"][$v]->array[substr($key, $nametogetcounter)] = $value; } 
							}
						}	
						// Unset some Variables
						unset($nametoget);
						unset($nametogetcounter);	
						unset($tmp);
					}		
				}
			}
			define("_HIVE_PRE_LANG_THEME_", $object["hive_mode_config_pre"]["theme_lang"]);
			hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[hive_mode_config_pre][theme_lang]");	
			hive___stackinfo($object["loadup"]["stack"], "[CONSTANT] _HIVE_PRE_LANG_THEME_ [SET] object[hive_mode_config_pre][theme_lang]");					
		} else { 
			hive___stackinfo($object["loadup"]["stack"], "Skipped because of _HIVE_INTERNAL_VERSION_ERROR_ = 1");
		}			

		/*	Module: Configure mail template class
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Configure mail template class");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");			
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) {
			$object["mail_template"] = new x_class_mail_template($object["mysql"], _TABLE_MAIL_TPL_, _HIVE_MODE_, _HIVE_LANG_);
			$object["mail_template"]->set_header(_SMTP_MAILS_HEADER_);
			$object["mail_template"]->set_footer(_SMTP_MAILS_FOOTER_);		
			hive___stackinfo($object["loadup"]["stack"], "Scope set to current site module");
		} else { 
			hive___stackinfo($object["loadup"]["stack"], "Skipped because of _HIVE_INTERNAL_VERSION_ERROR_ = 1");
		}		

		/*	Module: Post Configuration Includes
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Post Configuration Includes");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");			
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_"))  {
			if(is_array(_HIVE_MODE_ARRAY_))  {
				foreach(_HIVE_MODE_ARRAY_ as $key => $value) {
					$object["hive_mode_config"] = hive__init_site_header($object, $value); 
					$realpath = _HIVE_SITE_PATH_."/";
					if (file_exists($realpath."/_config/global_post.php")) {
						hive___stackfileonce($object["loadup"]["stack"], $realpath."/_config/global_post.php", false);
						require_once($realpath."/_config/global_post.php");
						array_push($object["loadup"]["config_post"], $realpath."/_config/global_post.php");
					}
					
				}
			}
		} unset($object["hive_mode_config"]);
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
			$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_); 
			// Sitemod
			if(file_exists($object["path"]."/_site/"._HIVE_MODE_."/_config/config_post.php")) { 
				hive___stackfileonce($object["loadup"]["stack"], $object["path"]."/_site/"._HIVE_MODE_."/_config/config_post.php", false);
				require_once($object["path"]."/_site/"._HIVE_MODE_."/_config/config_post.php"); 
				array_push($object["loadup"]["config_post"], $object["path"]."/_site/"._HIVE_MODE_."/_config/config_post.php");
			} 
			// Extension Libraries
			foreach ($object["extensions_path"] as $hive_extension_loader_current_init) {
				if (file_exists($hive_extension_loader_current_init."/_config/config_post.php")) {
					hive___stackfileonce($object["loadup"]["stack"], $hive_extension_loader_current_init."/_config/config_post.php", false);
					$object["extension"] = hive__init_extension_header($object, basename($hive_extension_loader_current_init)); 
					require_once $hive_extension_loader_current_init."/_config/config_post.php";
					array_push($object["loadup"]["config_post"], $hive_extension_loader_current_init."/_config/config_post.php");
				}
			} unset($object["extension"]);				
		} unset($object["hive_mode_config"]); unset($object["extension"]);	

		/*	Module: Post Configuration Initializations
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Post Configuration Initializations");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");				
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
			hive___stackinfo($object["loadup"]["stack"], " [CONSTANT] _HIVE_BUILD_FIRSTRUN_ [SET] 1");
			$object["var"]->setup("_HIVE_BUILD_FIRSTRUN_", 1, "Has this Module run for the first time without errors in Initializing?");		
			// Just for Output
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_BUILD_ACTIVE_", 0);
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_RNAME_ACTIVE_", 0);
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_VERSION_ACTIVE_", 0);
			// Get hive mode config
			$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_); 
		} else {
			hive___stackinfo($object["loadup"]["stack"], "Skipped because of _HIVE_INTERNAL_VERSION_ERROR_ = 1");
		}					

		/*	Module: Update Table Extension Status Variables (if not existant)
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Update Table Extension Status Variables (if not existant)");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");				
		if(!defined("_HIVE_INTERNAL_VERSION_ERROR_")) { 
			foreach ($object["extensions_path"] as $hive_extension_loader_current_init) {
				if (file_exists($hive_extension_loader_current_init."/version.php")) {
					hive___stackfileonce($object["loadup"]["stack"], $hive_extension_loader_current_init."/version.php", false);
					require $hive_extension_loader_current_init."/version.php";
					$object["extension"] = hive__init_extension_header($object, basename($hive_extension_loader_current_init)); 
					$curdata = $x;
					$object["var"]->setup($object["extension"]["prefix_variables"]."_HIVE_BUILD_ACTIVE_", @htmlspecialchars( _HIVE_BUILD_ ?? ''), "Current Installed Site Modules Extension Build Number");	
				}
			} 		
		} else {
			hive___stackinfo($object["loadup"]["stack"], "Skipped because of _HIVE_INTERNAL_VERSION_ERROR_ = 1");
		} unset($object["extension"]); unset($curdata); unset($x);	
		
		/*	Module: Reinit all Constants
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Reinit all Constants");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		$object["var"]->init_constant();

		/*	Module: Recreate robots file if not exists
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Recreate robots file if not exists");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_ROBOTS_CREATE_", 0);
		if(!file_exists($object["path"]."/robots.txt") AND _HIVE_ROBOTS_CREATE_) {
			file_put_contents($object["path"]."/robots.txt", 	
"##
## Suitefish Robots.txt File
## Generated at: ".date("Y-m-d H:i:s")."
## Changes will be persistent!
##

##
## Sitemap Configuration
##
Sitemap: "._HIVE_URL_REL_."sitemap.xml

##
## Allow all user Agents
##
User-Agent: *

##
## Disallow specific directories
##
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
Disallow: "._HIVE_URLC_REL_."_testing/*
Disallow: "._HIVE_URLC_REL_."_user/*
Disallow: "._HIVE_URLC_REL_."backup.lock.php
Disallow: "._HIVE_URLC_REL_."cfg_ruleset.php
Disallow: "._HIVE_URLC_REL_."maintenance.lock.php
Disallow: "._HIVE_URLC_REL_."update.lock.php
Disallow: "._HIVE_URLC_REL_."pkg.php
Disallow: "._HIVE_URLC_REL_."LICENSE.md
Disallow: "._HIVE_URLC_REL_."README.md
Disallow: "._HIVE_URLC_REL_."settings.php
Disallow: "._HIVE_URLC_REL_."update.php");}		


		/*	Module: Recreate main htaccess file
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Module: Recreate robots file if not exists");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		if(!file_exists($object["path"]."/.htaccess")) {	
			file_put_contents($object["path"]."/.htaccess", 
"##
## Htaccess File of Suitefish CMS
## This file has been auto generated at: ".date("Y-m-d H:i")."
## Changes will be persistent.
##

##
## Enable Rewriting
## Do not comment this out!
##
RewriteEngine On

##
## HTTP -> HTTPS Rewrite
## Remove comment below to activate automatic HTTPS Rewriting if non HTTPS
##
#	RewriteCond %{HTTPS} !=on
#	RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

##
## Non-WWW -> WWW Rewrite
## Remove comment below to activate automatic non www to www forward
## Do not use together with WWW -> Non-WWW Rewrite
##
#	RewriteCond %{HTTP_HOST} ^[^.]+\.[^.]+$
#	RewriteRule ^(.*)$ http://www.%{HTTP_HOST}/$1 [L,R=301]	

##
## WWW -> Non WWW Rewrite
## Remove comment below to activate automatic non www to www forward
## Do not use together with Non-WWW -> WWW Rewrite
##
#	RewriteCond %{HTTP_HOST} ^www\.(.*)$ [NC]
#	RewriteRule ^(.*)$ https://%1/$1 [R=301,L]

##
## Use mod_expires ?
## Comment out to use mod_expires, if activated on your
## Apache Server instance.
##
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

##
## SEO Url Rewrite
##
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?hive__seo_tag_loc=$1 [L,QSA]

##
## Disable Directory Browsing for Security Purposes
##
Options -Indexes

##
## Lock Configuration Files
##
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

##
## Custom Error Pages
##
ErrorDocument 400 "._HIVE_URLC_REL_."_core/_error/400.html
ErrorDocument 401 "._HIVE_URLC_REL_."_core/_error/401.html
ErrorDocument 403 "._HIVE_URLC_REL_."_core/_error/403.html
ErrorDocument 404 "._HIVE_URLC_REL_."_core/_error/404.html
ErrorDocument 500 "._HIVE_URLC_REL_."_core/_error/500.html
ErrorDocument 503 "._HIVE_URLC_REL_."_core/_error/503.html

##
## Lock Folders which should not be public accessible
## Do not comment this out! (Seperate with |)
## Seperation with | (pipe)
##
RewriteRule ^(_backup|_sample|_testing|_template) - [F,L]"); }	

		/*	End of Site Module Initializations
		*******************************************************************************************************/
		
	} else {
		
		/*******************************************************************************************************
			Global: Start of Global Initialzations
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Global: Start of Global Initialzations");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");		
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[extensions_path] [SET] array()");			
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[themes_path] [SET] array()");			
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[hive_mode] [SET] false");			
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[module] [SET] false");			
		
		/*	Set Init Variables
		*******************************************************************************************************/	
		$object["extensions_path"] 		= array();
		$object["themes_path"] 			= array();
		$object["hive_mode"] 			= false;		
		$object["module"] 				= false;		
		
		/*	Global: Create mysql class object
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Global: Create mysql class object");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");		
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[mysql] [SET] x_class_mysql");			
		$object["mysql"] = new x_class_mysql(@$mysql["host"], @$mysql["user"], @$mysql["pass"], @$mysql["db"], @$mysql["port"]);	
		if ($object["mysql"]->lasterror != false) { 
			hive__error("Critical Error", "[000-002] A MySQL Database Connection could not be established.", "Please check your mysql database settings in settings.php.", true, 503);
			exit(); 
		}					
		$object["mysql"]->log_config(_TABLE_LOG_MYSQL_, "");
		
		/*	 Global: Create logging classes
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Global: Create logging classes");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[log] [SET] x_class_log");			
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[api_log] [SET] x_class_log");		
		$object["log"] 			= new x_class_log($object["mysql"], _TABLE_LOG_, "");
		$object["api_log"] 		= new x_class_log($object["mysql"], _TABLE_LOG_API_, "");
		$object["log_tmp"] 		= new x_class_log($object["mysql"], _TABLE_LOG_, "");

		/*	 Global: Install Core MySQL Tables
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Global: Install Core MySQL Tables");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		if(!$object["mysql"]->table_exists($object["prefix"]."cms_store")) {
			hive___stackinfo($object["loadup"]["stack"], "Table initial installation: ".$object["prefix"]."cms_store"."");
			$object["log_tmp"]->warning("[CORE] [MYSQL] [INSTALL] [TABLE] ".@htmlspecialchars($object["prefix"]."cms_store" ?? '' )."", "mysql");
			require_once(_HIVE_PATH_."/_core/_mysql/mysql.cms_store.php");
			$object["mysql"]->free_all();
		}  else {
			hive___stackinfo($object["loadup"]["stack"], "Table already exists: ".$object["prefix"]."cms_store"."");	
		}	
		if(!$object["mysql"]->table_exists($object["prefix"]."cms_worker")) {
			hive___stackinfo($object["loadup"]["stack"], "Table initial installation: ".$object["prefix"]."cms_worker"."");
			$object["log_tmp"]->warning("[CORE] [MYSQL] [INSTALL] [TABLE] ".@htmlspecialchars($object["prefix"]."cms_worker" ?? '' )."", "mysql");
			require_once(_HIVE_PATH_."/_core/_mysql/mysql.cms_worker.php");
			$object["mysql"]->free_all();
		} else {
			hive___stackinfo($object["loadup"]["stack"], "Table already exists: ".$object["prefix"]."cms_worker"."");
		} unset($object["log_tmp"]);	
		array_push($object["loadup"]["mysql"], _HIVE_PATH_."/_core/_mysql/mysql.cms_store.php");	
		array_push($object["loadup"]["mysql"], _HIVE_PATH_."/_core/_mysql/mysql.cms_worker.php");	

		/*	 Global: Create API Permission Object
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Global: Create API Permission Object");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[api_perm] [SET] x_class_perm");			
		$object["api_perm"] 		= 	new x_class_perm($object["mysql"], _TABLE_API_PERM_, "");

		/*	 Global: Create Variables Object
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Global: Create Variables Object");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[var] [SET] x_class_var");			
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[var_glob] [SET] x_class_var");			
		$object["var"] = new x_class_var($object["mysql"], _TABLE_VAR_, "");
		$object["var_glob"] = new x_class_var($object["mysql"], _TABLE_VAR_, "");

		/*	 Global: Validate core lockdown status
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Global: Validate core lockdown status");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		if(file_exists($object["path"]."/maintenance.lock.php")) {
			if(!defined("_HIVE_INTERNAL_MT_LOCK_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_MT_LOCK_", 1);
			}	
		} else {
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_MT_LOCK_", 0);
		}
		if(file_exists($object["path"]."/update.lock.php")) {
			if(!defined("_HIVE_INTERNAL_UPDATE_LOCK_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_UPDATE_LOCK_", 1);
			}	
		} else {
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_UPDATE_LOCK_", 0);
		}		
		if(file_exists($object["path"]."/backup.lock.php")) {
			if(!defined("_HIVE_INTERNAL_BACKUP_LOCK_")) { 
				hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_BACKUP_LOCK_", 1);
			}	
		} else {
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_BACKUP_LOCK_", 0);
		}				
		if(defined("_HIVE_INTERNAL_BACKUP_LOCK_")) { 
			if(_HIVE_INTERNAL_BACKUP_LOCK_) { 
				if(!defined("_HIVE_INTERNAL_LOCK_")) { 
					hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_LOCK_", 1);
				} 
			} 
		}
		if(defined("_HIVE_INTERNAL_UPDATE_LOCK_")) { 
			if(_HIVE_INTERNAL_UPDATE_LOCK_) { 
				if(!defined("_HIVE_INTERNAL_LOCK_")) { 
					hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_LOCK_", 1); 
				} 
			} 
		}
		if(defined("_HIVE_INTERNAL_MT_LOCK_")) { 
			if(_HIVE_INTERNAL_MT_LOCK_) { 
				if(!defined("_HIVE_INTERNAL_LOCK_")) { 
					hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_LOCK_", 1);  
				} 
			} 
		}
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_LOCK_", 0); 
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_MT_LOCK_OVR_", 0); 
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_BACKUP_LOCK_OVR_", 0); 
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_UPDATE_LOCK_OVR_", 0); 
		if(!_HIVE_INTERNAL_MT_LOCK_OVR_) {
			if(_HIVE_INTERNAL_MT_LOCK_) {
				hive__error("Maintenance", "[000-003] This website is currently in maintenance mode!<br />Please come back later...", "If you want to end maintenance mode manually, remove the maintenance.lock.php file from the website root directory.", true, 503, false, "cog");
				exit(); 
			}
		}
		if(!_HIVE_INTERNAL_BACKUP_LOCK_OVR_) {
			if(_HIVE_INTERNAL_BACKUP_LOCK_) {
				hive__error("Maintenance", "[000-004] This website is currently doing backup work!<br />Please come back later...", "If you want to end backup mode manually, remove the backup.lock.php file from the website root directory.", true, 503, false, "cog");
				exit(); 	
			}
		}
		if(!_HIVE_INTERNAL_UPDATE_LOCK_OVR_) {
			if(_HIVE_INTERNAL_UPDATE_LOCK_) {
				hive__error("Maintenance", "[000-005] This website is currently updating!<br />Please come back later...", "If you want to end update mode manually, remove the backup.lock.php file from the website root directory." , true, 503, false, "cog");
				exit();
			}
		}		

		/*	 Global: Determine Site URLs
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Global: Determine Site URLs");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	
		if(!defined("_HIVE_URL_")) { 
			define("_HIVE_URL_", $object["url"]); 
			hive___stacksetconst($object["loadup"]["stack"], "_HIVE_URL_", $object["url"]);
		} $object["url"] = _HIVE_URL_;	
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[url] [SET] "._HIVE_URL_."");	
		$tmprel = parse_url(_HIVE_URL_, PHP_URL_PATH);
		if(!$tmprel OR $tmprel == "") { $tmprel = "/"; }
		if (isset($_SERVER['HTTPS']) && @$_SERVER['HTTPS'] === 'on') {
			$link = "https://";
		} else { $link = "http://"; }
		$tmprelx = $link.@$_SERVER["HTTP_HOST"].$tmprel;
		if(substr($tmprelx, -1, 1) != "/") { $tmprelx = $tmprelx."/"; }
		if(substr($tmprel, -1, 1) != "/") { $tmprel = $tmprel."/"; }
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_URL_REL_", $tmprelx);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_URLC_REL_", $tmprel);
		unset($tmprelx);
		unset($tmprel);
		unset($link);			

		/*	 Global: Classes Initialization
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Global: Classes Initialization");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");		
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[2fa] [SET] false");		
		$object["2fa"] 	= 	false;		
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[crypt] [SET] x_class_crypt");	
		$object["crypt"] 		= 	new x_class_crypt();	
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[zip] [SET] x_class_zip");
		$object["zip"] 			= 	new x_class_zip();
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[api] [SET] x_class_api");
		$object["api"] 			= 	new x_class_api($object["mysql"], _TABLE_API_, "");
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[curl] [SET] x_class_curl");
		$object["curl"] 		= 	new x_class_curl();	
		hive___stackinfo($object["loadup"]["stack"], "[EXECUTE] object[debug]->js_error_create_db");
		$object["debug"]->js_error_create_db($object["mysql"], _TABLE_LOG_JS_);
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[curl] [SET] x_class_eventbox");
		$object["eventbox"] 	= 	new x_class_eventbox(_HIVE_COOKIE_);

		/*	 Global: Global Logging and Cron Setup
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Global: Global Logging and Cron Setup");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");		
		hive___stacksetconst($object["loadup"]["stack"], "_CRON_ENABLE_LOG_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_CRON_ONLY_CLI_", true);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_CURL_LOGGING_", false);	

		/*	 Global: Permission arrays
		*******************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Global: Permission arrays");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");		
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[perm_group_glob] [SET] x_class_perm");		
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[perm_user_glob] [SET] x_class_perm");	
		$object["perm_group_glob"] 	= 	new x_class_perm($object["mysql"], _TABLE_USER_GROUP_PERM_, "");	
		$object["perm_user_glob"] 	= 	new x_class_perm($object["mysql"], _TABLE_USER_PERM_, "");	

		/*	Global: User object initialization
		*******************************************************************************************************/	
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Global: User object initialization");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");								
		hive___stackinfo($object["loadup"]["stack"], "[VARIABLE] object[user] [SET] x_class_user");
		$object["user"] = new x_class_user($object["mysql"], _TABLE_USER_, _TABLE_USER_SESSION_, _HIVE_COOKIE_, "admin@admin.local", "changeme", 1); 
		$object["user"]->multi_login(true);	
		$object["user"]->login_recover_drop(true);	
		$object["user"]->user_unique(false);
		$object["user"]->mail_unique(true);
		$object["user"]->login_field_mail();
		$object["user"]->log_ip(false);
		$object["user"]->log_activation(true);
		$object["user"]->log_session(true);
		$object["user"]->log_recover(true);
		$object["user"]->log_mail_edit(true);
		$object["user"]->wait_activation_min(60);
		$object["user"]->wait_recover_min(60);
		$object["user"]->wait_mail_edit_min(60);
		$object["user"]->min_activation(600);
		$object["user"]->min_recover(600);
		$object["user"]->min_mail_edit(600);
		$object["user"]->sessions_days(7);
		$object["user"]->cookies_use(true);
		$object["user"]->cookies_days(7);	
		$object["user"]->passfilter(7, 1, 1, 0, 1);	
		$object["user"]->groups(_TABLE_USER_GROUP_, _TABLE_USER_GROUP_LINK_);		
		$object["user"]->extrafields(_TABLE_USER_EXTRAFIELD_);	
		$object["user"]->autoblock(99000);
		$object["user"]->init();

		/*	End of NoInit Initialization
		*******************************************************************************************************/

	}

	/***********************************************************************************************************
		Init: Final Initializations
	***********************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Init: Final Initializations");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");	

		/*	Various Variables
		*******************************************************************************************************/
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_BENCHMARK_EXECUTE_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_HITCOUNTER_EXECUTE_", false);

		/*	Cache Variables define if not defined
		*******************************************************************************************************/
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SCRIPT_CACHE_T_", "no-store, no-cache, must-revalidate, max-age=0");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SCRIPT_CACHE_F_", "post-check=0, pre-check=0");
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_SCRIPT_CACHE_P_", "no-cache");

		/*	Default Scripts in /_user Enable
		*******************************************************************************************************/	
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_ENABLESITE_MAILCHANGE_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_ENABLESITE_RECOVER_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_ENABLESITE_REGISTER_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_ENABLESITE_2FA_", true);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_ENABLESITE_ACTIVATE_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_ENABLESITE_PASSCHANGE_", true);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_ENABLESITE_LOGIN_", true);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_ENABLESITE_LOGOUT_", true);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_ENABLESITE_LANGCHANGE_", true);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_ENABLESITE_MODESWITCH_", true);

		/*	Default Scripts in /_user DEFER
		*******************************************************************************************************/	
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_DEFERSITE_MAILCHANGE_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_DEFERSITE_PASSCHANGE_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_DEFERSITE_RECOVER_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_DEFERSITE_LOGIN_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_DEFERSITE_LOGOUT_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_DEFERSITE_REGISTER_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_DEFERSITE_LANGCHANGE_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_DEFERSITE_MODESWITCH_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_DEFERSITE_2FA_", false);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_DEFERSITE_ACTIVATE_", false);
		
		/*	Set Error Variables to 0 if not defined
		*******************************************************************************************************/	
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_INIT_ERROR_", 0);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_VERSION_ERROR_", 0);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_RNAME_ERROR_", 0);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_DOWNGRADE_ERROR_", 0);
		hive___stacksetconst($object["loadup"]["stack"], "_HIVE_INTERNAL_UPDATE_REQ_", 0);
	
	/***********************************************************************************************************
		Output Stacktrace and exit if activated
	***********************************************************************************************************/
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		hive___stackinfo($object["loadup"]["stack"], "Suitefish Stack Messaging System");
		hive___stackinfo($object["loadup"]["stack"], "Initialization Finished");
		hive___stackinfo($object["loadup"]["stack"], "Report finished at: ".date('Y-m-d H:i:s')."");
		hive___stackinfo($object["loadup"]["stack"], "----------------------------------------------------------");
		if(defined("_HIVE_DEBUG_STACKTRACE_")) { if(_HIVE_DEBUG_STACKTRACE_) { exit(); } }