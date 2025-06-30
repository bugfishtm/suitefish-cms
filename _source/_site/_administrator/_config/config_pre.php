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
			- This File Configuration will be executed BEFORE the Initialization. 
			- See Documentation for Available Variables and Functionalities of this file!
			- You can find the Documentation at: https://bugfishtm.github.io/suitefish-cms/
	*/ if(!is_array(@$object)) { http_response_code(404); Header("Location: ../"); exit(); }


	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Administrator Module Related
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	/////////////////////////////////////////////////////////////////////////////
	## Include Package Configuration if exists
	/////////////////////////////////////////////////////////////////////////////
	if(file_exists($object["path"]."/pkg.php")) {
		require_once($object["path"]."/pkg.php");
		define("_HIVE_ADM_PKG_LOADUP_", true);
	} else {
		define("_HIVE_ADM_PKG_LOADUP_", false);
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Config_Pre.php Related
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	/////////////////////////////////////////////////////////////////////////////
	## External Script Cache Control
	/////////////////////////////////////////////////////////////////////////////
		# Header Cache-Control:
		if(!defined("_HIVE_SCRIPT_CACHE_T_")) { define("_HIVE_SCRIPT_CACHE_T_", 	"no-store, no-cache, must-revalidate, max-age=0"); }
		# Header Cache-Control: (with false 2nd argument)
		if(!defined("_HIVE_SCRIPT_CACHE_F_")) { define("_HIVE_SCRIPT_CACHE_F_", 	"post-check=0, pre-check=0"); }
		# Header Pragma:
		if(!defined("_HIVE_SCRIPT_CACHE_P_")) { define("_HIVE_SCRIPT_CACHE_P_", 	"no-cache"); }

	/////////////////////////////////////////////////////////////////////////////
	## Defer User Sites
	/////////////////////////////////////////////////////////////////////////////
		# Defer Mail Change Page
		if(!defined("_HIVE_DEFERSITE_MAILCHANGE_")) { define("_HIVE_DEFERSITE_MAILCHANGE_", 		false); }
		# Defer Password Change Page
		if(!defined("_HIVE_DEFERSITE_PASSCHANGE_")) { define("_HIVE_DEFERSITE_PASSCHANGE_", 		false); }
		# Defer Recover Password Page
		if(!defined("_HIVE_DEFERSITE_RECOVER_")) { define("_HIVE_DEFERSITE_RECOVER_", 				false); }
		# Defer Login Page	
		if(!defined("_HIVE_DEFERSITE_LOGIN_")) { define("_HIVE_DEFERSITE_LOGIN_", 					false); }
		# Defer Logout Page
		if(!defined("_HIVE_DEFERSITE_LOGOUT_")) { define("_HIVE_DEFERSITE_LOGOUT_", 				false); }
		# Defer Register Page
		if(!defined("_HIVE_DEFERSITE_REGISTER_")) { define("_HIVE_DEFERSITE_REGISTER_", 			false); }
		# Defer Language Change Page
		if(!defined("_HIVE_DEFERSITE_LANGCHANGE_")) { define("_HIVE_DEFERSITE_LANGCHANGE_", 		false); }
		# Defer Modeswitch Page
		if(!defined("_HIVE_DEFERSITE_MODESWITCH_")) { define("_HIVE_DEFERSITE_MODESWITCH_", 		false); }
		# Defer 2FA Page
		if(!defined("_HIVE_DEFERSITE_2FA_")) { define("_HIVE_DEFERSITE_2FA_", 						false); }
		# Defer Activation Page	
		if(!defined("_HIVE_DEFERSITE_ACTIVATE_")) { define("_HIVE_DEFERSITE_ACTIVATE_", 			false); }

	/////////////////////////////////////////////////////////////////////////////
	## URL Settings
	/////////////////////////////////////////////////////////////////////////////
		# URL of this Page // Setting can be Overwritten as from settings.php
		# This is only needed for multi site purposes and if automatically fetching per browser url
		# is deactivated.
		// define('_HIVE_URL_',  					$object["url"]); 

	/////////////////////////////////////////////////////////////////////////////
	## Language Settings
	/////////////////////////////////////////////////////////////////////////////
		# Array with valid Languages
		// define("_HIVE_LANG_ARRAY_", 				array("en", "de", "ja", "es", "zh", "it", "fr", "ru", "kr", "pt", "in", "tr")); 
		if(!defined("_HIVE_LANG_ARRAY_")) { define("_HIVE_LANG_ARRAY_", array("en", "de", "ja", "es", "zh", "it", "fr", "ru", "kr", "pt", "in", "tr")); }

	/////////////////////////////////////////////////////////////////////////////
	## Theme Settings
	/////////////////////////////////////////////////////////////////////////////
		# Default Used Theme
		//define("_HIVE_THEME_DEFAULT_", 			"orange"); 
		# Array with valid Themes
		//define("_HIVE_THEME_ARRAY_", 				array("green", "purple", "orange", "dynamic")); 

	/////////////////////////////////////////////////////////////////////////////
	## Color Settings
	/////////////////////////////////////////////////////////////////////////////
		# Default Color for Dynamic Theme Colors
		//define("_HIVE_THEME_COLOR_DEFAULT_", 		"#FFFF00");

	/////////////////////////////////////////////////////////////////////////////
	## Additional Settings
	/////////////////////////////////////////////////////////////////////////////	
		# Array with needed PHP Modules, if not existant error is shown (example: array("mysqli", "mbstring", "gd")) 
		//define('_HIVE_PHP_MODS_',  				array()); 
		
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Imported from config.php because they are static
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
	/////////////////////////////////////////////////////////////////////////////
	## TinyMCE Settings
	/////////////////////////////////////////////////////////////////////////////
		# TinyMCE Plugins
		//define("_TINYMCE_PLUGINS_", 		"preview importcss searchreplace autolink directionality visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor advlist lists wordcount help charmap quickbars emoticons code");
		if(!defined("_TINYMCE_PLUGINS_")) {  define("_TINYMCE_PLUGINS_", "preview importcss searchreplace autolink directionality visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor advlist lists wordcount help charmap quickbars emoticons code"); }
		# TinyMCE Menu Bar
		//define("_TINYMCE_MENU_BAR_", 		"file edit view insert format table help");
		if(!defined("_TINYMCE_MENU_BAR_")) {  define("_TINYMCE_MENU_BAR_", "file edit view insert format table help"); }
		# TinyMCE Tool Bar
		//define("_TINYMCE_TOOL_BAR_", 		"undo redo | bold italic underline strikethrough | blocks fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | image media link");	
		if(!defined("_TINYMCE_TOOL_BAR_")) {  define("_TINYMCE_TOOL_BAR_", "undo redo | bold italic underline strikethrough | blocks fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | image media link"); }
		
	/////////////////////////////////////////////////////////////////////////////
	## Captcha Settings
	/////////////////////////////////////////////////////////////////////////////
		# Random Code for Captcha
		//define("_CAPTCHA_CODE_", 			mt_rand(1000, 9999)); 
		if(!defined("_CAPTCHA_CODE_")) { define("_CAPTCHA_CODE_", 			mt_rand(1000, 9999));  }
		# Count of Lines in Captcha
		//define("_CAPTCHA_LINES_", 		mt_rand(5, 12)); 
		if(!defined("_CAPTCHA_LINES_")) { define("_CAPTCHA_LINES_", 		mt_rand(5, 12));  }
		# Count of Squares in Captcha
		//define("_CAPTCHA_SQUARES_", 		mt_rand(5, 12)); 
		if(!defined("_CAPTCHA_SQUARES_")) { define("_CAPTCHA_SQUARES_",		mt_rand(5, 12));  }
		# Captcha Height Image
		//define("_CAPTCHA_HEIGHT_", 		"70"); 
		if(!defined("_CAPTCHA_HEIGHT_")) { define("_CAPTCHA_HEIGHT_", 		"70");  }
		# Captcha Width Image
		//define("_CAPTCHA_WIDTH_", 		"200"); 
		if(!defined("_CAPTCHA_WIDTH_")) { define("_CAPTCHA_WIDTH_", 		"200");  }
		# Colors for Captcha (Optional, can be false)
		//define("_CAPTCHA_COLORS_", 		false); 
		if(!defined("_CAPTCHA_COLORS_")) { define("_CAPTCHA_COLORS_", 		false);  }	
		# If false Default Font will be used.
		//define("_CAPTCHA_FONT_PATH_", 	"../_font/captcha.ttf"); 	
		if(!defined("_CAPTCHA_FONT_PATH_")) { define("_CAPTCHA_FONT_PATH_", "../_font/captcha.ttf");  }	
		
	/////////////////////////////////////////////////////////////////////////////
	## URL Navigation Settings
	/////////////////////////////////////////////////////////////////////////////
		// STRING - GET VARIABLE SEO IN HTACCESS  | 0 - No SEO URLs Using
		//define('_HIVE_URL_SEO_',  		false);  
		if(!defined("_HIVE_URL_SEO_")) { define('_HIVE_URL_SEO_',  			false);    }	
		# Only neeed if _HIVE_URL_SEO_ == false [Name for Get Location Variables]
		//define('_HIVE_URL_GET_', 			array("hl1", "hl2", "hl3", "hl4", "hl5")); 
		if(!defined("_HIVE_URL_GET_")) { define('_HIVE_URL_GET_', 			array("l1", "l2", "l3", "l4", "l5"));  }	
		
	/////////////////////////////////////////////////////////////////////////////
	## Redis Settings
	/////////////////////////////////////////////////////////////////////////////
		# Redis Prefix
		//define("_REDIS_PREFIX_", 			_HIVE_SITE_PREFIX_); 
		if(!defined("_REDIS_PREFIX_")) { define('_REDIS_PREFIX_',  	_HIVE_SITE_PREFIX_);    }	
		
	/////////////////////////////////////////////////////////////////////////////
	## User Settings (If using Users Class Module)
	/////////////////////////////////////////////////////////////////////////////	
		# True - Remove Recovery Keys after user Succesfully Logged In | false - Preserve Keys
		//define("_USER_REC_DROP_", 		true); 
		if(!defined("_USER_REC_DROP_")) { define("_USER_REC_DROP_", true); }		
		# True - Allow Multi Login  | false - Disable Multi Login (old session logout)
		//define("_USER_MULTI_LOGIN_", 		false); 
		if(!defined("_USER_MULTI_LOGIN_")) { define("_USER_MULTI_LOGIN_", true); }	
		# Initial Created Username
		if(!defined("_USER_INITIAL_USERNAME_")) { define("_USER_INITIAL_USERNAME_", "admin@admin.local"); }
		# Initial Created User Password
		if(!defined("_USER_INITIAL_USERPASS_")) { define("_USER_INITIAL_USERPASS_", "changeme"); }	
		
	/////////////////////////////////////////////////////////////////////////////
	## Updater Script Settings
	/////////////////////////////////////////////////////////////////////////////
		// Title for the Updater on this Site
		//define("_UPDATER_TITLE_", 		false); 
		if(!defined("_UPDATER_TITLE_")) { define("_UPDATER_TITLE_", 		"Suitefish-CMS");  }	
		
	/////////////////////////////////////////////////////////////////////////////
	## Additional Functionalities Setup
	/////////////////////////////////////////////////////////////////////////////
		# True - Only Cronjob Execution from Command Line | False - Allow Cronjob Execution in Browser
		//define('_CRON_ONLY_CLI_',  		true);  
		if(!defined("_CRON_ONLY_CLI_")) { define("_CRON_ONLY_CLI_", 		true);  }	