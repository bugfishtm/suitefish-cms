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
		Check for Valid Object Array
	***********************************************************************************************************/
	if(!is_array(@$object)) { http_response_code(404); exit(); }

	/***********************************************************************************************************
		Backend Settings File:
		Rulset for specific CMS Settings. With this file you can change 
		some primary CMS functionalities like site module determination.
		Rename the file to cfg_ruleset.php after making changes to activate it and move it
		to the root directory of your suitefish-cms instance.
		Only developers or advanced users should edit this file directly.
	***********************************************************************************************************/

	/***********************************************************************************************************
		Default Site Module:
		- The default site module to load if no other is specified.
		- Default value: `_administrator` (can be changed).
	***********************************************************************************************************/
	// define('_HIVE_MODE_PRIMARY_', "_administrator");
	
	/***********************************************************************************************************
		Default Administrative (Shadow) Module:
		- Allows admin to switch between site modules (e.g., from frontend to admin panel).
		- Recommended to set to `false` for standalone site modules.
		- Default admin module: `_administrator`.
	***********************************************************************************************************/	
	// define('_HIVE_ADMIN_SITE_', "_administrator");

	/***********************************************************************************************************
		Site Module Configuration over Environment Variable:
		- Allows overriding the default site mode by setting an environment variable in the Apache vhost.
		- Useful for deploying different sites using the same codebase but with different configurations.
		- Example in Apache config: `SetEnv _HIVE_MODE_ENV_OVR_ "MODULENAME"`
		- The specified module name in the environment variable will take precedence over other settings.
		- This feature is optional and only used if defined in the server environment.	
	***********************************************************************************************************/

	/***********************************************************************************************************
		Installer Settings
	***********************************************************************************************************/

		/*******************************************************************************************************
			Installer Window Title:
			- Title displayed during CMS installation.
			- Default value: "Suitefish".
		*******************************************************************************************************/
		// define("_INSTALLER_TITLE_", "Suitefish");
		
		/*******************************************************************************************************
			Cookie and Session Prefix:
			- Default prefix for cookies and sessions during installation.
			- Default value: `sf_` (max 5 characters, no special chars).
		*******************************************************************************************************/
		// define("_INSTALLER_COOKIE_", "sf_");
		
		/*******************************************************************************************************
			Database Table Prefix:
			- Default prefix for database tables during installation.
			- Default value: `sf_` (max 5 characters, no special chars).
		*******************************************************************************************************/
		// define("_INSTALLER_PREFIX_", "sf_");
	
		/*******************************************************************************************************
			Installation Password:
			- Option to require a password during installation.
			- Default value: `false` (no password required).
		*******************************************************************************************************/
		// define("_INSTALLER_CODE_", false);	
		
	/***********************************************************************************************************
		Block Frontpage Access:
		This will block the default front page.
		This will leave api endpoints and scripts in background intact.
		Default is 'false'. Note that your page is not public visible anymore if you change this to true.
	***********************************************************************************************************/		
	// define("_HIVE_BLOCK_FP_", false);
	
	/***********************************************************************************************************
		Session Cookie Domain Settings
		- Set the domain for PHP session cookies.
		- Leave undefined to use the default domain.
	***********************************************************************************************************/	
	// define("_HIVE_COOKIE_DOMAIN_", ".example.domain");	
	
	/***********************************************************************************************************
		PHP Log Path Settings
		- Set a custom PHP logfile location. Default is to use the web server's default.
		- Default value: `false`.
	***********************************************************************************************************/	
	// define('_HIVE_PHP_LOG_PATH_', false);	
	
	/***********************************************************************************************************
		PHP Log Display Settings
		- Enable PHP error reporting during initialization for debugging purposes.
		- Default value: `0` (errors are hidden).
	***********************************************************************************************************/		
	// define('_HIVE_PHP_DISPLAY_ERROR_ON_START_', 0);

	/***********************************************************************************************************
		Debugging Stacktrace
		- Only for developers, enable stack trace output on page.
		- May be a security risk on public machines, can expose data.
		- Use with caution.
		- Set to true to activate Stack Trace
		- Default value: `false`.
	***********************************************************************************************************/
	// define('_HIVE_DEBUG_STACKTRACE_', false);

	/***********************************************************************************************************
		Enable Cronjob Logging
		- (For developers only)
		- When enabled (true), all cronjob executions are logged and can be viewed 
		  in the administrator module under the "Cronjob" section.
		- Note: Since the cronjob runs every 5 minutes, enabling this will quickly 
		  generate a large volume of log entries. 
		- Default: false
	***********************************************************************************************************/
	// define('_CRON_ENABLE_LOG_', false);

	/***********************************************************************************************************
		Experimental Feature
			DO NOT USE ON PRODUCTIVE SERVERS!
			Currently not implemented, maybe in the future.
		Set fetch Site modules by URL Array	- Automatic Site Mode by URL:
		- Enables automatic selection of a site module based on the requested URL.
		- Default value: `false` (disables this feature).
		- Example configuration: 
			`array(array("url" => "x.domain", "mode" => "xdomainmod"), ...)`
			Uncomment and adjust the following line to use:
	***********************************************************************************************************/
	// define("_HIVE_MOD_FETCH_", false);
	
	/***********************************************************************************************************
		Experimental Feature
			DO NOT USE ON PRODUCTIVE SERVERS!
			Currently not implemented, maybe in the future.
		Array of Site Modes to Switch to and Force use only of them - Allowed Site Modules
		 - Restrict the CMS to only allow certain site modules.
		 - Default value: `false`.
	***********************************************************************************************************/
	// define("_HIVE_MOD_FORCE_", array("modname1", "modname2", "modname3");

	/***********************************************************************************************************
		Experimental Feature
			DO NOT USE ON PRODUCTIVE SERVERS!
			Currently not implemented, maybe in the future.
		Force Site Module:
		- Force the CMS to run in a specific site mode, disabling module switching.
		- Default value: `false`.
	***********************************************************************************************************/
	// define("_HIVE_MOD_OVR_", false);