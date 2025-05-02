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

	/////////////////////////////////////////////////////////////////////////////
	## External Script Cache Control
	/////////////////////////////////////////////////////////////////////////////
		# Header Cache-Control:
		// define("_HIVE_SCRIPT_CACHE_T_", 			"no-store, no-cache, must-revalidate, max-age=0");
		# Header Cache-Control: (with false 2nd argument)
		// define("_HIVE_SCRIPT_CACHE_F_", 			"post-check=0, pre-check=0");
		# Header Pragma:
		// define("_HIVE_SCRIPT_CACHE_P_", 			"no-cache");

	/////////////////////////////////////////////////////////////////////////////
	## Enable User Sites
	/////////////////////////////////////////////////////////////////////////////
		# Enable Mail Change Page
		// define("_HIVE_ENABLESITE_MAILCHANGE_", 	false);
		# Enable Password Change Page
		// define("_HIVE_ENABLESITE_PASSCHANGE_", 	true);
		# Enable Recover Password Page
		// define("_HIVE_ENABLESITE_RECOVER_", 		false);
		# Enable Login Page
		// define("_HIVE_ENABLESITE_LOGIN_", 		true);
		# Enable Logout Page
		// define("_HIVE_ENABLESITE_LOGOUT_", 		true);
		# Enable Register Page
		// define("_HIVE_ENABLESITE_REGISTER_", 	false);
		# Enable Language Change Page
		// define("_HIVE_ENABLESITE_LANGCHANGE_", 	true);
		# Enable Modeswitch Page
		// define("_HIVE_ENABLESITE_MODESWITCH_", 	true);
		# Enable 2FA Page
		// define("_HIVE_ENABLESITE_2FA_", 			true);
		# Enable Activation Page
		// define("_HIVE_ENABLESITE_ACTIVATE_", 	false);

	/////////////////////////////////////////////////////////////////////////////
	## Defer User Sites
	/////////////////////////////////////////////////////////////////////////////
		# Defer Mail Change Page
		// define("_HIVE_DEFERSITE_MAILCHANGE_", 	false);
		# Defer Password Change Page
		// define("_HIVE_DEFERSITE_PASSCHANGE_", 	false);
		# Defer Recover Password Page
		// define("_HIVE_DEFERSITE_RECOVER_", 		false);
		# Defer Login Page
		// define("_HIVE_DEFERSITE_LOGIN_", 		false);
		# Defer Logout Page
		// define("_HIVE_DEFERSITE_LOGOUT_", 		false);
		# Defer Register Page
		// define("_HIVE_DEFERSITE_REGISTER_", 		false);
		# Defer Language Change Page
		// define("_HIVE_DEFERSITE_LANGCHANGE_", 	false);
		# Defer Modeswitch Page
		// define("_HIVE_DEFERSITE_MODESWITCH_", 	false);
		# Defer 2FA Page
		// define("_HIVE_DEFERSITE_2FA_", 			false);
		# Defer Activation Page	
		// define("_HIVE_DEFERSITE_ACTIVATE_", 		false);

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
		# Array with Default Language
		// define("_HIVE_LANG_DEFAULT_", 			"en"); 
		# Array with valid Languages
		// define("_HIVE_LANG_ARRAY_", 				array("en", "de", "ja", "es", "zh", "it", "fr", "ru", "kr", "pt", "in", "tr")); 

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