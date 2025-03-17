# 📁 Core

✅ Folder included in Backups  
⚠️ Modified files in this folder will be overwritten by updates/upgrades.  
❌ Do not manually modify or add/edit files in this folder.  

The _core folder contains core code and will be overwritten during core updates. This folder houses Core System files and libraries to be used. Changes in this folder are not persistent between core updates. 

**Sub-Folders:**  

- ./_action: Actions and Sites for various purposes...
	- ./_action/admin_switch.php: Page to Switch between Backend and Frontend. Can be accessed diretly through browser.
	- ./_action/js_debug_action.php: External Action for the Debugging of Javascript Code, if Activated in Config will Log Errors in Javascript Commands in the Logging Table.
	- ./_action/token_switch.php: Page to switch between Site Modules with Tokens if activated in cfg-ruleset.php Can be accessed diretly through browser.
	- ./_action/user_activate.php: General Action Script to Activate Accounts via Mail. Can be accessed diretly through browser if activated in Site Modules Config.
	- ./_action/user_login.php: General Login page. Can be accessed diretly through browser if activated in Site Modules Config.
	- ./_action/user_logout.php: General Logout Page.
	- ./_action/user_mail_change.php: Change Mail of current Account Page. Can be accessed diretly through browser if activated in Site Modules Config.
	- ./_action/user_recover.php: Recover Account Password per Mail if not Logged in. Can be accessed diretly through browser if activated in Site Modules Config.
	- ./_action/user_register.php: Register New Account. Can be accessed diretly through browser if activated in Site Modules Config.
- ./_captcha: Contains captcha images for inclusion in your project. Refer to the documentation for session variable details to store captcha tokens.Capchta Image with Code Generation at $SESSION[HIVE_SITE_COOKIE."captcha.filename"].
- ./_template: Site Module examples and explanations.
- ./_documentation: Folders with included documentation to view offline.
- ./_error: Default error templates used in .htaccess and for project integration. Use as full-page templates to include HTTP error codes.
- ./_font: Stores included font files. Check the license for each font in the documentation or the _licenses folder.
- ./_framework: Contains Bugfish Framework files included automatically in javascript.php and stylesheet.php during initialization.
- ./_image: Default JPG/PNG/ICO images used in various CMS sections.
- ./_lang: Default language translation files. Automatically loaded based on the _HIVE_LANG_ constant, which controls the displayed language.
- ./_lib: Core function library of the CMS, included automatically during site initialization.
- ./_licenses: Library of included vendor library licenses.
- ./_mysql: Contains MySQL core system tables installed during site initialization, as specified in initialize.php.
- ./_vendor: 3rd party scripts, functions, and templates. Include these in your module to add new functionalities or UX features. Licenses can be found in the documentation or _licenses folder.
- ./initialize.php: Initializes site functionalities and includes variables, referenced by settings.php.
- ./javascript.php: JavaScript loader for framework, module, and extension-related scripts. Include this file in your project's header as a standard JS script file.
- ./stylesheet.php: CSS loader for framework, module, and extension-related stylesheets. Include this file in your project's header as a standard CSS file.
- ./version.php: Contains versioning information for the core system.
- ./worker.php: Background Worker Script.

🐟 Bugfish