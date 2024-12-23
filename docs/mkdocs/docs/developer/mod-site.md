# Site Modules

## General Information

Website modules can be run as standalone websites or alongside other installed website modules. They can be distributed across various domains and virtual hosts, using integrated functionalities to display many websites with just one instance. This allows for full control over our administration or another administration module, according to your needs!

## Developer Information
- Max 16 characters for module name (`RNAME`).
- Start name with "sm" (e.g., `smwordpress`).
- No special chars in module folder name or rname, starting underscore is dedicated to official modules.

## Installation

### Method 1: Store

1. Login to the Administrator Module.
2. Go to the "Modules" area.
3. Download the desired image module through the Official or Custom Store.
4. Install the uploaded image template in the "Manage" Tab.

### Method 2: Upload

1. Open the Administrator Module in your web browser.
2. Login as Administrator or privileged user.
3. Go to the "Modules" are and upload the modules .zip file there.
4. Install the uploaded module in the tab displaying templates.

### Method 3: Manually

1. Login to your web server with FTP/SFTP.
2. Unpack the required Modules .zip folder.
3. Move the extracted folder containing the files like `version.php` to the `_site` directory of the Suitefish-CMS installation.


## Available Variables

If an extension script is loaded, mostly you will have dynamic variables for you to get your extension modules information.

|Variable Name| Description |
|----|----|
|$object\["hive_mode_config"\]\["info"\] | Version File Loadup in this Variable |
|$object\["hive_mode_config"\]\["path"\] | Full Path to extension |
|$object\["hive_mode_config"\]\["name"\] | Name of the extension |
|$object\["hive_mode_config"\]\["prefix"\] | Prefix for MySQL or Redis |
|$object\["hive_mode_config"\]\["cookie"\] | Cookie/Session Prefix |
|$object\["hive_mode_config"\]\["prefix_variables"\] | Prefix for Variables of all kind |
|$object\["hive_mode_config"\]\["lang"\] | Language Object for this Extension |


## Folder Structure

Organize your site module extensions ZIP file as follows. Replace `RNAME` with your module name. See inside folders readme.md for some more information.

### _admin
Scripts to be injected into the _administrator module.

```
./RNAME/_admin/
├── mod_setting.php (Module Settings for Admin Module)
├── mod_nav.php (Module Navigation for Admin Module)
├── mod_site.php (Module Site for Admin Module)
├── mod_permission.php (Module Permissions for Admin Module)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
./RNAME/_admin/_lang/
├── de.php (Language to be injected for Admin Injection Scripts)
├── en.php (Language to be injected for Admin Injection Scripts)
├── es.php (Language to be injected for Admin Injection Scripts)
├── fr.php (Language to be injected for Admin Injection Scripts)
├── it.php (Language to be injected for Admin Injection Scripts)
├── ja.php (Language to be injected for Admin Injection Scripts)
├── zh.php (Language to be injected for Admin Injection Scripts)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _config
The `_config` folder contains configuration files that are crucial for initializing different sections of Suitefish-CMS. These files are loaded at various stages of initialization to define settings, parameters, and behaviors.

```
./RNAME/_config/
├── config_pre.php (Pre-startup configuration)
├── config_post.php (Post-startup configuration)
└── config.php (Main configuration file)
├── global_pre.php (Pre-startup Global configuration)
├── global_post.php (Post-startup Global configuration)
└── global.php (Main Global configuration file)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _cron
Store your code for cronjobs in this folder!

```
./RNAME/_cron/
├── cron.example.php (Example Cronjob File)
├── .. (Store your other integrated cronjobs here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _css
The `_css` folder is designated for storing CSS files that are automatically loaded into SuitefishCMS via the HTML include at `/core/stylesheet.php`. This folder helps manage CSS code required for various styling needs depending on the user's login status.

```
./RNAME/_css/
├── css.example.php (Example CSS File)
├── .. (Store your other css files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _images
Preview images for the readme.md file.

```
./RNAME/_images/
├── ... (Content you may add)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _js
The `_js` folder is designated for storing JavaScript files that are automatically loaded into the Suitefish-CMS via the HTML include at `/core/javascript.php`. This folder helps manage JavaScript code required for various functionalities depending on the user's login status.

```
./RNAME/_js/
├── js.example.php (Example JS File)
├── .. (Store your other js files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _lang
Language Translations for sites in this extensions _admin folder and multi-langual store. This folder _lang contains automatically loaded language files. These files belong to the current loaded Site Module. You can override Translation Keys by puttin them into the database for translations, so users can edit them onsite if you give them this possibility.

```
./RNAME/_lang/
├── de.php (Translation File for German)
├── en.php (Translation File for English)
├── es.php (Translation File for Spanish)
├── fr.php (Translation File for French)
├── it.php (Translation File for Italian)
├── ja.php (Translation File for Japanese)
├── zh.php (Translation File for Chinese)
├── ... (Other language Files you may add)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _lib
Store your php code in this folder!

```
./RNAME/_lib/
├── lib.example.php (Example Library File)
├── .. (Store your other library files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _mysql
Store your mysql tables in this folder!

```
./RNAME/_mysql/
├── mysql.example.php (Example MySQL File for example table)
├── .. (Store your other mysql files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _theme
Theme files for your module.

```
./RNAME/_theme/
├── ... (Content you may add)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _update
Theme files for your module.

```
./RNAME/_update/
├── 200.php (Example Update File to update to Build 200 from previous versions)
├── ... (Other Update Files)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _wfc
Store your wfc php classes code in this folder!

```
./RNAME/_wfc/
├── wfc.example.php (Example WFC Library File)
├── .. (Store your other WFC library files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _worker
Store your runtime worker files in this folder! (For the Background Linux Worker)

```
./RNAME/_worker/
├── worker.example.php (Example runtime worker File)
├── .. (Store your other worker files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### Files
Files in the modules root directory.
```
./RNAME/
├── changelog.php (Changelog info)
├── index.php (Prevent Directory Listing)
├── LICENSE.md (Extensions License)
└── preview.jpg (Preview image)
├── README.md (Extensions Readme)
├── load.php (Initial Loader file (index))
├── version.php (Versioning info)
```



## Initialization

Here you can find information on the initialization and how configuration files will be included.

### CMS Rule Constants

|Constant|Description|
|----|---|
|\_HIVE_COOKIE_DOMAIN_|Cookie Domain to be used, default is false to use default domain (SET IN RULESET.CFG)|
|\_HIVE_SERVER_CORE_|Default Server Core update URL is suitefish.com (SET IN RULESET.CFG)|
|\_HIVE_SERVER_|Default Server Store URLs are serialized array default is array("suitefish.com") (SET IN RULESET.CFG)|
|\_HIVE_PHP_DISPLAY_ERROR_ON_START_|Display errors on startup? Default is 0 (SET IN RULESET.CFG)|
|\_HIVE_PHP_LOG_PATH_|Logging Path for PHP, default is false will use the default servers path (SET IN RULESET.CFG)|
|\_HIVE_ALLOW_TOKEN_|Allow use of token switch site module script in _core/_action/token_switch.php? Default is true (SET IN RULESET.CFG)|
|\_HIVE_MOD_CHANGES_|Allow use of developer.php? Default is false (SET IN RULESET.CFG)|
|\_HIVE_MOD_FETCH_|Fetch Site Mode by url? Is Experimental Default is False (SET IN RULESET.CFG)|
|\_INSTALLER_CODE_|Default is false, if set password needed for installation (SET IN RULESET.CFG)|
|\_INSTALLER_PREFIX_|default Prefix is bcms_ for installer (SET IN RULESET.CFG)|
|\_INSTALLER_COOKIE_|default cookie prefix is bcms_ for installer (SET IN RULESET.CFG)|
|\_INSTALLER_TITLE_|installer title default is "Suitefish-CMS" (SET IN RULESET.CFG)|
|\_HIVE_ADMIN_SITE_|Allow Switch action _core/_action/admin_Switch.php and switch to admin site side_by_side? (SET IN RULESET.CFG)|
|\_HIVE_RESTRICT_UPDATE_|Updating only over Admin Interface? Disallow ./updater.php ?|

### Initializations

|Variable / Constant|Description|
|----|---|
|`$_SESSION[_HIVE_COOKIE_."hive_mode"]`|Current Selected Site Module|
|`$object["prefix"]`|DB Prefix like in Settings.php (Not Site Related, core related!)|
|`$object["cookie"]`|Cookie Prefix like in Settings.php (Not Site Related, core related!)|
|`$object["path"]`|Path to Document Root of Website like given in installer|
|`$object["url"]`|Default page URL Like in Settings.php|
|`$object["extensions_path"]`|array with active current hive mod extensions|
|`$object["core_mode"]`|Current core version.php array X|
|`$object["hive_mode"]`|Current hive Mode array x or False if not set! (error on loadup version.php)|
|`$object["mysql"]`|Mysql object|
|`$object["var"]`|Site Related variable Object, if no site active than Global Variable Object|
|`$object["log"]`|Default Log Object (Core Log if no sitemod)|
|`$object["var_glob"]`|Global Variables Object|
|`$object["comment"]`|Commenting Class Object|
|\_HIVE_CREATOR_|Creator Copyright String|
|\_HIVE_MODE_ARRAY_|array with available hive modes|
|\_HIVE_MODE_|Current hive Mode|
|\_HIVE_MODE_ENV_OVR_|Apache var to get site mode per env on apache|
|\_HIVE_SITE_PATH_|Path to _site/sitemod/|
|\_HIVE_PATH_SITE_|Path to _site/|
|\_HIVE_PATH_DATA_|Path to _data|
|\_HIVE_PATH_OFF_|Path to _disable|
|\_HIVE_PATH_SCRIPT_|Path to _script|
|\_HIVE_PATH_IMAGE_OFF_|Path to _disable/_image|
|\_HIVE_PATH_SCRIPT_OFF_|Path to _disable/_script|
|\_HIVE_PATH_SITE_OFF_|Path to _disable/_site|
|\_HIVE_PATH_IMAGE_|Path to _image|
|\_HIVE_SITE_COOKIE_|Site Related Cookie Prefix|
|\_HIVE_SITE_PREFIX_|Site Related Database Prefix|
|\_HIVE_SITE_PATH_DATA_|Path to _data/SITEMOD/|
|\_HIVE_SITE_PATH_EXT_|Path to _data/SITEMOD/_extension|
|\_HIVE_SITE_PATH_EXT_OFF_|Path to _data/SITEMOD/_extension_disabled|
|\_HIVE_SITE_PATH_PUBLIC_|Path to _data/SITEMOD/_public|
|\_HIVE_SITE_PATH_PRIVATE_|Path to _data/SITEMOD/_private|
|\_HIVE_SITE_PATH_DOMAIN_|Path to _data/SITEMOD/_domain|
|\_HIVE_SITE_EXT_|Array of loaded extension pathes active|
|\_HIVE_BUILD_|Current Module Build Number|
|\_HIVE_VERSION_|Current Module Version Number|
|\_HIVE_RNAME_|Current Module RNAME String|
|\_HIVE_CRIT_ER_|This variable is only set if a critical error occured on the page.|
|\_TABLE_LOG_|General Logging Table|
|\_TABLE_LOG_IP_| IP Blacklist Table|
|\_TABLE_LOG_BENCHMARK_| Benchmarking Table|
|\_TABLE_LOG_CURL_|CURL Logging Table|
|\_TABLE_LOG_MAIL_|Mail Logging Table|
|\_TABLE_LOG_MYSQL_|Mysql Logging Table|
|\_TABLE_LOG_REFERER_|Referer Logging Table|
|\_TABLE_LOG_CRON_|Cronjob Logging Table|
|\_TABLE_LOG_JS_|Javascript Logging Table|
|\_TABLE_LOG_VISIT_|Visitors Logging Table|
|\_TABLE_USER_|User Account Table|
|\_TABLE_USER_EXTRAFIELDS_|User Extrafields Table|
|\_TABLE_USER_SESSION_|User Sessions Table|
|\_TABLE_USER_PERM_|User Permission Table|
|\_TABLE_USER_GROUP_|User Group Table|
|\_TABLE_USER_GROUP_PERM_|User Group Permission Table|
|\_TABLE_USER_GROUP_LINK_|User Group Link Table|
|\_TABLE_VAR_|Variables Table|
|\_TABLE_LANG_|Language Table|
|\_TABLE_MAIL_TPL_|Mail Template Table|
|\_TABLE_API_|API Table|
|\_TABLE_COMMENT_|Commenting Table|
|\_TABLE_STORE_|Store Table|
|\_TABLE_HUB_|Hub Software Table|
|\_TABLE_TOKEN_|Token Site Modules Table|

### Pre Configuration

|Constant|Description|
|----|---|
|global_pre.php|File Inclusion of Site Modules Globals|
|config_pre.php|File Inclusion of Site Modules Config|
|config_pre.php|File Inclusion of Site Modules Extension Config|

### Initializations

|Variable / Constant|Description|
|----|---|
|\_HIVE_ACTION_MAILCHANGE_|Enable Default Mail Change Forms?|
|\_HIVE_ACTION_RECOVER_|Enable Default Recover Account Forms?|
|\_HIVE_ACTION_LOGIN_|Enable Default Login Forms?|
|\_HIVE_ACTION_REGISTER_|Enable Default Register Forms?|
|\_HIVE_LANG_|Contains current choosen Language|
|\_HIVE_LANG_ARRAY_||
|\_HIVE_LANG_DEFAULT_|	|
|`$object["lang"]`| Current Language Translation Object|
|\_HIVE_THEME_|Auto set by CMS to current Valid Theme (AUTOSET)|
|\_HIVE_THEME_ARRAY_|Current Valid Theme Array default is array() (SETUPTABLE)|
|\_HIVE_THEME_DEFAULT_|Current Default Fallback Theme is none set default is false (SETUPTABLE)	|
|\_HIVE_COLOR_|Current Auto Determined Color (AUTOSET)|
|\_HIVE_THEME_COLOR_DEFAULT_|Default Fallback Color Default is #FFFF00 (SETUPTABLE)|
|`$object["url"]`|Current Primary URL|
|\_HIVE_URL_|`$object["url"]` full url like in settings.php (SETUPABLE)|
|\_HIVE_URL_REL_|Current Determined Protocol/URL + Relative Path from Settings.php  (AUTOSET)|
|\_HIVE_URLC_REL_|only relative path like /relative  (AUTOSET)|
|`$object["debug"]`|Debug Class|
|`$object["eventbox"]`|Eventbox Class|
|`$object["curl"]`|Curl Class|
|`$object["crypt"]`|Crypt Class|
|`$object["zip"]`|Zip Class|
|`$object["benchmark"]`|Benchmark Class|
|`$object["api"]`|API Class|
|`$object["hitcounter"]`|Hitcounter Class|
|`$object["2fa"]`|False set on Demand 2FA Class.|

### Configuration

|Constant|Description|
|----|---|
|global.php|File Inclusion of Site Modules Globals|
|config.php|File Inclusion of Site Modules Config|
|config.php|File Inclusion of Site Modules Extension Config|

### Initializations

|Variable / Constant|Description|
|----|---|
|\_TINYMCE_PLUGINS_|TinyMCE Plugins|
|\_TINYMCE_MENU_BAR_|TinyMCE Menu Bar|
|\_TINYMCE_TOOL_BAR_|TinyMCE Tool Bar|
|\_USER_MAX_SESSION_|Maximum Days Sessions/Cookies are Valid|
|\_USER_TOKEN_TIME_|Time in Minutes token out of Activation Mails are Valid|
|\_USER_AUTOBLOCK_|Block Users after X Fail Logins (can be false)|
|\_USER_WAIT_COUNTER_|Time in Minutes User has to wait between Requests (anti flood)|
|\_USER_LOG_SESSIONS_|Log old sessions? (Logins, Recoverys, Activations, Mail Changes) (true/false)|
|\_USER_LOG_IP_|Log User IPs in Database (true/false)|
|\_USER_REC_DROP_|True - Remove Recovery Keys after user Succesfully Logged In | false - Preserve Keys|
|\_USER_MULTI_LOGIN_|True - Allow Multi Login  | false - Disable Multi Login (old session logout)|
|\_USER_PF_SIGNS_|Passwordfilter: Min Signs|
|\_USER_PF_CAPSIGNS_|Passwordfilter: Min Capital Signs|
|\_USER_PF_SMSIGNS_|Passwordfilter: Min Small Signs|
|\_USER_PF_SPSIGNS_|Passwordfilter: Min Special Signs|
|\_USER_PF_NUMSIGNS_|Passwordfilter: Min Numeric Signs|
|\_USER_INITIAL_USERNAME_|Initial Created Username|
|\_USER_INITIAL_USERPASS_|Initial Created User Password|
|\_CAPTCHA_CODE_|Random Code for Captcha|
|\_CAPTCHA_LINES_|Count of Lines in Captcha|
|\_CAPTCHA_SQUARES_|Count of Squares in Captcha|
|\_CAPTCHA_HEIGHT_|Captcha Height Image|
|\_CAPTCHA_WIDTH_|Captcha Width Image|
|\_CAPTCHA_COLORS_|Colors for Captcha (Optional, can be false)|
|\_CAPTCHA_FONT_PATH_|If false Default Font will be used.|
|\_SMTP_MAILS_HEADER_|Default Header for Mails|
|\_SMTP_MAILS_FOOTER_|Default Footer for Mails|
|\_SMTP_SENDER_MAIL_|Default Sender Mail Adr|
|\_SMTP_SENDER_NAME_|Default Sender Mail Name|
|\_SMTP_MAILS_IN_HTML_|All Mails sended as HTML? (false/true)|
|\_SMTP_INSECURE_|Allow insecure SSL Connections? (true/false)|
|\_SMTP_DEBUG_|Mail Debug Mode (0, 1, 2, 3) - Use 0 for Production as this will result Debug Output on site!|
|\_SMTP_HOST_|SMTP Host |
|\_SMTP_PORT_|SMTP Port |
|\_SMTP_AUTH_|SMTP Auth (ssl/tls/false) |
|\_SMTP_USER_|SMTP Username |
|\_SMTP_PASS_|SMTP Password|
|\_REDIS_|Redis Activated? False/True|
|\_REDIS_HOST_|Redis Host|
|\_REDIS_PORT_|Redis Port|
|\_REDIS_PREFIX_|Redis Prefix|
|\_UPDATER_TITLE_|Title for the Updater on this Site|
|\_UPDATER_CODE_|Code needed for Update? (can be false)	|
|\_HIVE_CURL_LOGGING_|Log CURL Class Requests? (true/false)|
|\_HIVE_IP_LIMIT_|Block IPs after X Failures|
|\_HIVE_REFERER_|Log Referers? (true/false)|
|\_HIVE_CSRF_TIME_|Default CSRF Code Valid Time in Seconds	|
|\_CRON_ONLY_CLI_|True - Only Cronjob Execution from Command Line | False - Allow Cronjob Execution in Browser|
|\_HIVE_JS_ACTION_ACTIVE_|Activate Javascript Debugging Script|
|\_HIVE_TITLE_|Website Title for Tabs and More|
|\_HIVE_TITLE_SPACER_|Title Spacer for Tabs in Browser|
|\_HIVE_PHP_DEBUG_|Show PHP Errors on website? (true/false)|
|\_HIVE_PHP_MODS_|Array with needed PHP Modules, if not existant error is shown (example: array("mysqli", "mbstring", "gd")) |
|\_HIVE_MYSQL_DEBUG_|Stop and Show MySQL Errors on Page if Happening? (Will always be logged in x_log_mysql table!) (true/false)|
|\_HIVE_URL_SEO_|STRING - GET VARIABLE SEO IN HTACCESS  | 0 - No SEO URLs Using|
|\_HIVE_URL_GET_|Only neeed if _HIVE_URL_SEO_ == false [Name for Get Location Variables]|
| \_HIVE_SITE_URL\_ | Sites Used URL FULL Default is _HIVE_URL_REL_ (SETUPTABLE) |
| \_HIVE_SITE_REL\_ | Full Url to subfolder _site/MODNAME (AUTOSET) |
| \_HIVE_SITEC_REL\_ | Relative Url to subfolder _site/MODNAME (AUTOSET) |
| \_HIVE_URL_CUR\_ | Current Values of Get or Rewrite Path Stations/Values on URL String or Exploded SEO String (Array) (AUTOSET) |
| \_HIVE_URL_REL\_ | Relative Folder Path |
| \_HIVE_URL_SEO\_ | True use SEO Pathes on Website with Rewrite / False use Get Variables like defined in _HIVE_URL_GET_  (SETUPTABLE) |
| `$object["user"]` | Initialization of full user Class |
| `$object["perm_user"]` | User Permission Object |
| `$object["perm_user_glob"]` | Global User Permission Object |
| `$object["perm_group"]` | User Group Permission Object |
| `$object["perm_group_glob"]` | Global User Group Permission Object |
| `$object["user_perm"]` | `$object["perm_user"]->item($object["user"]->user_id);` |
| `$object["user_perm_glob"]` | `$object["perm_user_glob"]->item($object["user"]->user_id);` |
| `$object["ipbl"]` | IPBL Object |
| `$object["redis"]` | Redis Class if _REDIS_ is true |
| `$object["mail"]` | Mail Object |
| `$object["mail_template"]` | Mail Template Class Object |
| `$object["referer"]` | Referer Class Object |
| `$object["user_group"]` | Array with current goups (info of groups available for user unsorted array with user group infos primary) |
| `$object["user_group"][x]["perm_obj"]` | Current Perm Item of Group |
| `$object["user_group"][x]["perm_group_glob"]` | Current Global Perm Item of Group |

### Post Configuration

|Constant|Description|
|----|---|
|global_post.php|File Inclusion of Site Modules Globals|
|config_post.php|File Inclusion of Site Modules Config|
|config_post.php|File Inclusion of Site Modules Extension Config|


## Example Module

We have an example template image module for developers in our github repository in the `/_developers/_site` folder.
