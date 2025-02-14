# Folder Structure

Here you can see the folder structure  of the CMS. For information about the modules folder structure see the different modules sections in this documentation.

## /__cache/
Temporary Hidden Folder for Core Updates and other Operations.

## /__rollback/
Temporary Folder for Core Updates and other Operations.

## /_core/
The `_core` folder contains core code and will be overwritten during core updates.

### /_core/_action/
Actions for various purposes...

| Folder Structure | Description | 
|----|----|
| admin_switch.php | Page to Switch between Backend and Frontend. Can be accessed diretly through browser. |
| js_debug_action.php | External Action for the Debugging of Javascript Code, if Activated in Config will Log Errors in Javascript Commands in the Logging Table. |
| token_switch.php | Page to switch between Site Modules with Tokens if activated in cfg-ruleset.php Can be accessed diretly through browser. |
| user_activate.php | General Action Script to Activate Accounts via Mail. Can be accessed diretly through browser if activated in Site Modules Config. |
| user_login.php | General Login page. Can be accessed diretly through browser if activated in Site Modules Config. |
| user_logout.php | General Logout Page. |
| user_mail_change.php | Change Mail of current Account Page. Can be accessed diretly through browser if activated in Site Modules Config. |
| user_recover.php | Recover Account Password per Mail if not Logged in. Can be accessed diretly through browser if activated in Site Modules Config. |
| user_register.php | Register New Account. Can be accessed diretly through browser if activated in Site Modules Config. |

### /_core/_captcha/
Contains captcha images for inclusion in your project. Refer to the documentation for session variable details to store captcha tokens.Capchta Image with Code Generation at $_SESSION[HIVE_SITE_COOKIE_."captcha.filename"].

### /_core/_documentation/
Folders with included documentation to view offline.

### /_core/_error/
Default error templates used in `.htaccess` and for project integration. Use as full-page templates to include HTTP error codes.

### /_core/_font/
Stores included font files. Check the license for each font in the documentation or the `_licenses` folder.

### /_core/_framework/
Contains Bugfish Framework files included automatically in `javascript.php` and `stylesheet.php` during initialization.

### /_core/_image/
Default JPG/PNG/ICO images used in various CMS sections.

### /_core/_lang/
Default language translation files. Automatically loaded based on the `_HIVE_LANG_` constant, which controls the displayed language.

### /_core/_lib/
Core function library of the CMS, included automatically during site initialization.

### /_core/_licenses/
Library of included vendor library licenses.

### /_core/_mysql/
Contains MySQL core system tables installed during site initialization, as specified in `initialize.php`.

### /_core/_template/
Site Module examples and explanations.

### /_core/_vendor/
3rd party scripts, functions, and templates. Include these in your module to add new functionalities or UX features. Licenses can be found in the documentation or `_licenses` folder.

### /_core/initialize.php
Initializes site functionalities and includes variables, referenced by `settings.php`.

### /_core/javascript.php
JavaScript loader for framework, module, and extension-related scripts. Include this file in your project's header as a standard JS script file.

### /_core/stylesheet.php
CSS loader for framework, module, and extension-related stylesheets. Include this file in your project's header as a standard CSS file.

### /_core/version.php
Contains versioning information for the core system.

### /_core/worker.php
Background Worker Script.

## /_data/

The `_data` folder contains all dynamic data for site modules and their extensions. Within the `_data` directory, a corresponding folder for each site module (based on the module's folder name in `_site`) is automatically created to store this data. This includes all on-site uploads and data that are not part of the module's source code, which remains in `_site`. If these folders are deleted, they will be automatically recreated by the CMS. Upgrades won't touch this folder.

### /_data/MODULE/
A folder matching the site module name in `_site` is created here to store its data. If the `_site` module folder is renamed, this `_data` folder must also be renamed to maintain the connection between the module and its data during CMS initialization.

#### /_data/MODULE/_css/
Public usable and auto-injected CSS Scripts.

#### /_data/MODULE/_docker/
Stores Docker related files for this Site Module.

#### /_data/MODULE/_extension/
Stores active extensions for the site module.

#### /_data/MODULE/_extension-disabled/
Stores inactive extensions for the site module.

#### /_data/MODULE/_extension-private/
Stores Private Data for Extensions.

#### /_data/MODULE/_extension-public/
Stores Public Data for Extensions.

#### /_data/MODULE/_meta/
Uploaded public meta images.

#### /_data/MODULE/_php/
Uploaded public executable PHP Scripts.

#### /_data/MODULE/_private/
Contains private data for the module, protected by HTACCESS. Access to this data requires PHP handlers with appropriate access controls or predefined scripts.

#### /_data/MODULE/_public/
Stores public data for site modules, accessible without PHP scripts. This folder is not HTACCESS secured, allowing hardlinking.

#### /_data/MODULE/_theme/
Stores Themes for Site Module. Deactivated Themes are in the __disabled folder inside this folder.

## /_image/
Contains installed and active image modules. It's recommended to manage these through the Administrator Interface; manual edits are not advised. Refer to the documentation for module development. Inactive Image Modules are stored in the `__disabled` folder.

## /_site/

Holds installed and active site modules. Use the Administrator Interface for management; manual edits are not advised. Refer to the documentation for more information. Inactive Site Modules are stored in the `__disabled` folder.

## /_store/
The `_store` folder manages cache files from downloaded items via the internal store, as well as files for deploying modules, core versions, or software through the CMS. Core updates do not affect this folder, except for PHP files in `_store/*.php` which may be updated during core releases.

## /_template/

This folder houses template files downloaded by the internal store pages or uploaded manually. The __cache folder serves as cache folder for backend operations

## /cfg_ruleset_sample.php
Sample configuration file for developers to modify CMS settings. Rename to `cfg_ruleset.php` to apply changes. Check the file for configuration parameters. It is reommended to set this file up via the administrator interface.

## /core_update.php
File to upgrade Administrator and Core CMS if logged in in Administrator Module. Only works together with the official administrator module..

## /cronjob.php
Cronjob of the CMS, should be set up on server to run hourly.

## /developer.php
Files for developers to control site functionalities during development. More details are available in the documentation.

## /index.php
Main index file to initialize the CMS and load the current website section. 

## /installer.php
Installation script to set up the CMS on the web server and create the `settings.php` file if it does not exist.

## /robots.txt
Automatically created file for managing search engine robots. Changes to this file will be persistent.

## /.htaccess
Automatically created file for server configuration. Changes to this file will be persistent and include explanations for usable configurations.

## /settings.php
 Created after a successful installation using `installer.php` or by manually editing and renaming `settings_sample.php`. 

## /settings_sample.php
Sample settings file used if the installer fails to create `settings.php`. Manual changes are not required if using the default installer.

## /updater.php
Script for deploying site mode build updates. Further details can be found in the documentation.























