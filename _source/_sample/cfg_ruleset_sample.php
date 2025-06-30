<?php if(!is_array(@$object)) { http_response_code(404); exit(); }
	/* 
		-------------------------------------------------------------------------------
		Backend Settings File
		-------------------------------------------------------------------------------		
		Rulset for specific CMS Settings. With this file you can change 
		some primary CMS functionalities like site module determination.
		Rename the file to cfg_ruleset.php after making changes to activate it.
	*/

	##############################################################################################
	// File Purpose and Usage
	##############################################################################################

		// This file defines specific rules and settings for the CMS.
		// These settings can also be managed via the CMS administrator interface.
		// Only developers or advanced users should edit this file directly.
		// To activate this file, rename it to `cfg_ruleset.php`.	
		
	##############################################################################################
	// Site Module Configuration
	##############################################################################################
	
		// **Parallel Site Module Switching**:
		// - Allows admin to switch between site modules (e.g., from frontend to admin panel).
		// - Recommended to set to `false` for standalone site modules.
		// - Default admin module: `_administrator`.
		// Uncomment and adjust the following line to use:
		// $administrative_page = "_administrator";	
	
		// **Default Site Module**:
		// - The default site module to load if no other is specified.
		// - Default value: `_administrator` (can be changed).
		// Uncomment and adjust the following line to use:
		// $hive_mode_default = "_administrator";

		// **Force Site Mode**:
		// - Force the CMS to run in a specific site mode, disabling module switching.
		// - Default value: `false`.
		// Uncomment and adjust the following line to use:
		// $hive_mode_override = false;
		
		// **Site Mode Override via Environment Variable**:
		// - Allows overriding the default site mode by setting an environment variable in the Apache vhost.
		// - Useful for deploying different sites using the same codebase but with different configurations.
		// - Example in Apache config: `SetEnv _HIVE_MODE_ENV_OVR_ "MODULENAME"`
		// - The specified module name in the environment variable will take precedence over other settings.
		// - This feature is optional and only used if defined in the server environment.	

	##############################################################################################
	// Installer Settings
	##############################################################################################

		// **Installer Window Title**:
		// - Title displayed during CMS installation.
		// - Default value: "Suitefish".
		// Uncomment and adjust the following line to use:
		// define("_INSTALLER_TITLE_", "Suitefish");
		
		// **Cookie and Session Prefix**:
		// - Default prefix for cookies and sessions during installation.
		// - Default value: `sf_` (max 5 characters, no special chars).
		// Uncomment and adjust the following line to use:
		// define("_INSTALLER_COOKIE_", "sf_");
		
		// **Database Table Prefix**:
		// - Default prefix for database tables during installation.
		// - Default value: `sf_` (max 5 characters, no special chars).
		// Uncomment and adjust the following line to use:
		// define("_INSTALLER_PREFIX_", "sf_");
	
		// **Installation Password**:
		// - Option to require a password during installation.
		// - Default value: `false` (no password required).
		// Uncomment and adjust the following line to use:
		// define("_INSTALLER_CODE_", false);	
		
	##############################################################################################
	// Store Functionality
	##############################################################################################

		// **Custom Update Server**:
		// - Option to define a custom server for updates and store functions.
		// - Multiple Values are possible.
		// - URL for automatic core updates. It is recommended to leave the default.
		// - Default store URL: `https://suitefish.com`.
		// - Advanced users can specify their own server.
		// Uncomment and adjust the following line to use:
		// define("_HIVE_SERVER_", "https://suitefish.com");
		
	##############################################################################################
	// Block Frontpage Access
	##############################################################################################

		// **Block Front Page**:
		// This will block the default front page.
		// This will leave api endpoints and scripts in background intact.
		// Default is 'false'. Note that your page is not public visible anymore 
		// if you change this to true.
		// define("_HIVE_BLOCK_FP_", false);
	
	##############################################################################################
	// Override Updater Access Code
	##############################################################################################	
	
		// **Override the Updater Access Code**:
		// - If this is set to a password, the updater will force users to enter this password to acces.
		// - If set to false, the password specified in site modules will be taken.
		// - Default value: `false`.
		// Uncomment and adjust the following line to use:
		// define('_UPDATER_CODE_OVR_', false); 
	
	
	##############################################################################################
	// Session Cookie Domain Settings
	##############################################################################################

		// **Session Cookie Domain**:
		// - Set the domain for PHP session cookies.
		// - Leave undefined to use the default domain.
		// Uncomment and adjust the following line to use:
		// define("_HIVE_COOKIE_DOMAIN_", ".example.domain");	
		
	##############################################################################################
	// PHP Log Settings
	##############################################################################################	

		// **PHP Logfile Location**:
		// - Set a custom PHP logfile location. Default is to use the web server's default.
		// - Default value: `false`.
		// Uncomment and adjust the following line to use:
		// define('_HIVE_PHP_LOG_PATH_', false);

		// **PHP Errors on Initialization**:
		// - Enable PHP error reporting during initialization for debugging purposes.
		// - Default value: `0` (errors are hidden).
		// Uncomment and adjust the following line to use:
		// define('_HIVE_PHP_DISPLAY_ERROR_ON_START_', 0);
		
	##############################################################################################
	// Debugging Stacktrace
	##############################################################################################	
	
		// **Activate Debugging Stacktrace**:
		// - Only for developers, enable stack trace output on page.
		// - May be a security risk on public machines, can expose data.
		// - Use with caution.
		// - Set to true to activate Stack Trace
		// - Default value: `false`.
		// Uncomment and adjust the following line to use:
		// define('_HIVE_DEBUG_STACKTRACE_', false);