# Folder Structure

Here you can see the folder structure  of the CMS. For information about the modules folder structure see the different modules sections in this documentation.

## _core

The `_core` folder contains core code and will be overwritten during core updates.

| Folder Structure | Description | 
|----|----|
| **_core/_action** | Stores external actions requested by CMS PHP scripts. |
| _core/_action/admin_switch.php | Page to Switch between Backend and Frontend. Can be accessed diretly through browser. |
| _core/_action/js_debug_action.php | External Action for the Debugging of Javascript Code, if Activated in Config will Log Errors in Javascript Commands in the Logging Table. |
| _core/_action/token_switch.php | Page to switch between Site Modules with Tokens if activated in cfg-ruleset.php Can be accessed diretly through browser. |
| _core/_action/user_activate.php | General Action Script to Activate Accounts via Mail. Can be accessed diretly through browser if activated in Site Modules Config. |
| _core/_action/user_login.php | General Login page. Can be accessed diretly through browser if activated in Site Modules Config. |
| _core/_action/user_logout.php | General Logout Page. |
| _core/_action/user_mail_change.php | Change Mail of current Account Page. Can be accessed diretly through browser if activated in Site Modules Config. |
| _core/_action/user_recover.php | Recover Account Password per Mail if not Logged in. Can be accessed diretly through browser if activated in Site Modules Config. |
| _core/_action/user_register.php | Register New Account. Can be accessed diretly through browser if activated in Site Modules Config. |
| **_core/_captcha** | Contains captcha images for inclusion in your project. Refer to the documentation for session variable details to store captcha tokens. |
| _core/_captcha/captcha.comment.php | Capchta Image with Code Generation at $_SESSION[HIVE_SITE_COOKIE_."captcha.comment"] |
| _core/_captcha/captcha.contact.php | Capchta Image with Code Generation at $_SESSION[HIVE_SITE_COOKIE_."captcha.contact"] |
| _core/_captcha/captcha.download.php | Capchta Image with Code Generation at $_SESSION[HIVE_SITE_COOKIE_."captcha.download"] |
| _core/_captcha/captcha.guestbook.php | Capchta Image with Code Generation at $_SESSION[HIVE_SITE_COOKIE_."captcha.guestbook"] |
| _core/_captcha/captcha.login.php | Capchta Image with Code Generation at $_SESSION[HIVE_SITE_COOKIE_."captcha.login"] |
| _core/_captcha/captcha.member.php | Capchta Image with Code Generation at $_SESSION[HIVE_SITE_COOKIE_."captcha.member"] |
| _core/_captcha/captcha.misc.php | Capchta Image with Code Generation at $_SESSION[HIVE_SITE_COOKIE_."captcha.misc"] |
| _core/_captcha/captcha.newsletter.php | Capchta Image with Code Generation at $_SESSION[HIVE_SITE_COOKIE_."captcha.newsletter"] |
| _core/_captcha/captcha.register.php | Capchta Image with Code Generation at $_SESSION[HIVE_SITE_COOKIE_."captcha.register"] |
| _core/_captcha/captcha.reset.php | Capchta Image with Code Generation at $_SESSION[HIVE_SITE_COOKIE_."captcha.reset"] |
| **_core/_error** | Default error templates used in `.htaccess` and for project integration. Use as full-page templates to include HTTP error codes. |
| _core/_error/error.400.php | Error File |
| _core/_error/error.401.php | Error File  |
| _core/_error/error.403.php | Error File  |
| _core/_error/error.404.php | Error File  |
| _core/_error/error.500.php | Error File  |
| _core/_error/error.501.php | Error File  |
| _core/_error/error.502.php | Error File  |
| _core/_error/error.503.php |  Error File |
| _core/_error/error.504.php |  Error File |
| _core/_error/error.520.php |  Error File |
| _core/_error/error.521.php |  Error File |
| _core/_error/error.533.php | Error File  |
| **_core/_font** | Stores included font files. Check the license for each font in the documentation or the `_licenses` folder. |
| _core/_font/font.captcha_fallback.ttf       | Font File|
| _core/_font/font.Changa-Bold.ttf            | Font File|
| _core/_font/font.Changa-ExtraBold.ttf       | Font File|
| _core/_font/font.Changa-ExtraLight.ttf      |Font File |
| _core/_font/font.Changa-Light.ttf           |Font File |
| _core/_font/font.Changa-Medium.ttf          |Font File |
| _core/_font/font.Changa-Regular.ttf         |Font File |
| _core/_font/font.Changa-SemiBold.ttf        | Font File|
| _core/_font/font.Changa-VariableFont_wght.ttf|Font File |
| _core/_font/font.ComicNeue-Bold.ttf         | Font File|
| _core/_font/font.ComicNeue-BoldItalic.ttf   | Font File|
| _core/_font/font.ComicNeue-Italic.ttf       |Font File |
| _core/_font/font.ComicNeue-Light.ttf        |Font File |
| _core/_font/font.ComicNeue-LightItalic.ttf  |Font File |
| _core/_font/font.ComicNeue-Regular.ttf      |Font File |
| _core/_font/font.Lato-Black.ttf             | Font File|
| _core/_font/font.Lato-BlackItalic.ttf       |Font File |
| _core/_font/font.Lato-Bold.ttf              | Font File|
| _core/_font/font.Lato-BoldItalic.ttf        |Font File |
| _core/_font/font.Lato-Italic.ttf            |Font File |
| _core/_font/font.Lato-Light.ttf             | Font File|
| _core/_font/font.Lato-LightItalic.ttf       | Font File|
| _core/_font/font.Lato-Regular.ttf           | Font File|
| _core/_font/font.Lato-Thin.ttf              |Font File |
| _core/_font/font.Lato-ThinItalic.ttf        |Font File |
| _core/_font/font.Roboto-Black.ttf           |Font File |
| _core/_font/font.Roboto-BlackItalic.ttf     |Font File |
| _core/_font/font.Roboto-Bold.ttf            |Font File |
| _core/_font/font.Roboto-BoldItalic.ttf      |Font File |
| _core/_font/font.Roboto-Italic.ttf          | Font File|
| _core/_font/font.Roboto-Light.ttf           |Font File |
| _core/_font/font.Roboto-LightItalic.ttf     |Font File|
| _core/_font/font.Roboto-Medium.ttf          |Font File |
| _core/_font/font.Roboto-MediumItalic.ttf    |Font File|
| _core/_font/font.Roboto-Regular.ttf         |Font File|
| _core/_font/font.Roboto-Thin.ttf            |Font File|
| _core/_font/font.Roboto-ThinItalic.ttf      |Font File|
| _core/_font/font.RockSalt-Regular.ttf       | Font File |
| **_core/_framework** | Contains Bugfish Framework files included automatically in `javascript.php` and `stylesheet.php` during initialization. |
| **_core/_image** | Default JPG/PNG/ICO images used in various CMS sections. |
| _core/_image/image.cms_banner.jpg | Image File |
| _core/_image/image.cms_logo.jpg |  Image File |
| _core/_image/image.cms_logo_alpha.png | Image File  |
| _core/_image/image.cms_logo_alpha_dark.png |  Image File |
| _core/_image/image.favicon.ico |  Image File |
| _core/_image/image.flat_background.jpg | Image File |
| _core/_image/image.framework_banner.jpg |  Image File |
| _core/_image/image.framework_logo.jpg |  Image File |
| _core/_image/image.framework_logo_small.jpg | Image File |
| _core/_image/image.user_profile.png |  Image File|
| **_core/_lang** | Default language translation files. Automatically loaded based on the `_HIVE_LANG_` constant, which controls the displayed language. |
| _core/_lang/en.php | Default English Translations if not overwritten by Site Module Language Files, mostly for Files in _action in the Core Folder. |
| _core/_lang/de.php | Default German Translations if not overwritten by Site Module Language Files, mostly for Files in _action in the Core Folder. |
| _core/_lang/es.php | Default Spanish Translations if not overwritten by Site Module Language Files, mostly for Files in _action in the Core Folder. |
| _core/_lang/fr.php | Default French Translations if not overwritten by Site Module Language Files, mostly for Files in _action in the Core Folder. |
| _core/_lang/it.php | Default Italian Translations if not overwritten by Site Module Language Files, mostly for Files in _action in the Core Folder. |
| _core/_lang/ja.php | Default Japanese Translations if not overwritten by Site Module Language Files, mostly for Files in _action in the Core Folder. |
| _core/_lang/zh.php | Default Chinese Translations if not overwritten by Site Module Language Files, mostly for Files in _action in the Core Folder. |
| **_core/_lib** | Core function library of the CMS, included automatically during site initialization. |
| _core/_lib/lib.hive.php | Suitefish-CMS Core Function Library for various purposes. |
| **_core/_licenses** | Library of included vendor library licenses. |
| **_core/_mysql** | Contains MySQL core system tables installed during site initialization, as specified in `initialize.php`. |
| _core/_mysql/mysql.cms_worker.php | Stores data for the background worker. |
| _core/_mysql/mysql.cms_store.php | Stores Data for distributed Store Modules controlled via the administrator Interface. |
| _core/_mysql/mysql.cms_token.php | Stores Data for the Token Switch _action Script controlled via the administrator Interface. |
| **_core/_vendor** | 3rd party scripts, functions, and templates. Include these in your module to add new functionalities or UX features. Licenses can be found in the documentation or `_licenses` folder. |
| **_core/initialize.php** | Initializes site functionalities and includes variables, referenced by `settings.php`. |
| **_core/javascript.php** | JavaScript loader for framework, module, and extension-related scripts. Include this file in your project's header as a standard JS script file. |
| **_core/stylesheet.php** | CSS loader for framework, module, and extension-related stylesheets. Include this file in your project's header as a standard CSS file. |
| **_core/version.php** | Contains versioning information for the core system. |
| **_core/worker.php** | Background Worker Script. |

## _data

The `_data` folder contains all dynamic data for site modules and their extensions. Within the `_data` directory, a corresponding folder for each site module (based on the module's folder name in `_site`) is automatically created to store this data. This includes all on-site uploads and data that are not part of the module's source code, which remains in `_site`. If these folders are deleted, they will be automatically recreated by the CMS. Upgrades won't touch this folder.

| Folder Structure | Description | 
|----|----|
| **_data/MODULE** | A folder matching the site module name in `_site` is created here to store its data. If the `_site` module folder is renamed, this `_data` folder must also be renamed to maintain the connection between the module and its data during CMS initialization. |
| _data/MODULE/_public | Stores public data for site modules, accessible without PHP scripts. This folder is not HTACCESS secured, allowing hardlinking. |
| _data/MODULE/_private | Contains private data for the module, protected by HTACCESS. Access to this data requires PHP handlers with appropriate access controls or predefined scripts. |
| _data/MODULE/_extension | Stores active extensions for the site module. |
| _data/MODULE/_extension-disabled | Stores inactive extensions for the site module. |
| _data/MODULE/_extension-data | Stores Data for Extensions. |
| _data/MODULE/_extension-data/_public | Stores Public Data for Extensions. |
| _data/MODULE/_extension-data/_private | Stores Private Data for Extensions. |

## _image
Contains installed and active image modules. It's recommended to manage these through the Administrator Interface; manual edits are not advised. Refer to the documentation for module development. Inactive Image Modules are stored in the `__disabled` folder.

## _site

Holds installed and active site modules. Use the Administrator Interface for management; manual edits are not advised. Refer to the documentation for more information. Inactive Site Modules are stored in the `__disabled` folder.

## _store
The `_store` folder manages cache files from downloaded items via the internal store, as well as files for deploying modules, core versions, or software through the CMS. Core updates do not affect this folder, except for PHP files in `_store/*.php` which may be updated during core releases.

| Folder Structure | Description | 
|----|----|
| **_store** | Manages store-related data for deployments and downloads. |
| **_store/_core** | Manages data for Suitefish-CMS core deployment. |
| _store/_core/_release | Holds releases for Suitefish CMS. |
| _store/_core/_changelog | Contains changelogs for Suitefish CMS releases. |
| _store/_core/_cache | Stores cache files for the Store. |
| **_store/_software** | Contains data for Suitefish software deployment. |
| _store/_software/_release | Holds software releases for Suitefish Software. |
| _store/_software/_changelog | Contains changelogs for Software releases. |
| _store/_software/_cache | Stores cache files for the Suitefish Store. |
| **_store/_module** | Manages data for Suitefish-CMS module deployment. |
| _store/_module/_release | Contains release files for Suitefish-CMS modules. |
| _store/_module/_image | Stores images for Suitefish-CMS module releases. |
| _store/_module/_changelog | Holds changelogs for Suitefish-CMS releases. |
| _store/_module/__cache | Cache for Suitefish-CMS releases. |
| **_store/core_fetch_all.php** | Fetch all current CMS Core Versions. |
| **_store/core_fetch_latest.php** | Fetch latest current CMS Core Versions. |
| **_store/module_fetch_all.php** | Fetch all current CMS Module Versions. |
| **_store/module_fetch_latest.php** | Fetch latest current CMS Core Versions for an rname. |
| **_store/software_fetch_all.php** | Fetch all current Software Core Versions. |
| **_store/software_fetch_latest.php** | Fetch latest current Software Core Versions. |

## _template

This folder houses template files downloaded by the internal store pages or uploaded manually. The __cache folder serves as cache folder for backend operations.

## .htaccess
Automatically created file for server configuration. Changes to this file will be persistent and include explanations for usable configurations.

## cfg_ruleset_sample.php
Sample configuration file for developers to modify CMS settings. Rename to `cfg_ruleset.php` to apply changes. Check the file for configuration parameters. It is reommended to set this file up via the administrator interface.

## cronjob.php
Cronjob of the CMS, should be set up on server to run hourly.

## developer.php
Files for developers to control site functionalities during development. More details are available in the documentation.

## index.php
Main index file to initialize the CMS and load the current website section. 

## installer.php
Installation script to set up the CMS on the web server and create the `settings.php` file if it does not exist.

## robots.txt
Automatically created file for managing search engine robots. Changes to this file will be persistent.

## settings.php
 Created after a successful installation using `installer.php` or by manually editing and renaming `settings_sample.php`. 

## settings_sample.php
Sample settings file used if the installer fails to create `settings.php`. Manual changes are not required if using the default installer.

## updater.php
Script for deploying site mode build updates. Further details can be found in the documentation.























