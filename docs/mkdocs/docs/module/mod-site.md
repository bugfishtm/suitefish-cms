# 📦 Website Module

## 📙 Information 

This is a integrated website module example! This kind of website modules use the suitefish-cms as a platform to allow multi-site hosting with one instance!

For possibilities on triggers and more take a look at trigger and view files at the official administrator module.

## 📄 Documentation 

If you are a developer you can find examples of modules in the _developers folder at the suitefish-cms github repository if you want to create an own module!

For more information about the Suitefish CMS: https://github.com/bugfishtm/suitefish-cms

## 🛠️ Installation

You have two ways installing this module.

### Module Store

Login to your suitefish instance and browse our official store on your page. If you find the module you are looking for just download the package. Then navigate to the Site Package Area and enable the downloaded site module.

### Upload to CMS

Navigate to the Site Module Package Area inside the suitefish instance. Go to the upload section and upload the modules .zip file.  Then navigate to the Site Module Package Area and enable the downloaded site module.

## 📁 Structure 

### ./_action

Store your action files in this folder!

```
./MODULE_NAME/_action/
├── action.ACTIONNAME.php (Action ACTIONNAME)
├── ... (Other action Files you may add)
├── index.php (Prevent Directory Listing)
```

### ./_admin

Scripts to be injected into the _administrator module.

```
./MODULE_NAME/_admin/
├─_lang/
├──── de.php (Language to be injected for Admin Injection Scripts)
├──── en.php (Language to be injected for Admin Injection Scripts)
├──── es.php (Language to be injected for Admin Injection Scripts)
├──── fr.php (Language to be injected for Admin Injection Scripts)
├──── it.php (Language to be injected for Admin Injection Scripts)
├──── ja.php (Language to be injected for Admin Injection Scripts)
├──── ... (Other Language Files)
├──── index.php (Prevent Directory Listing)
├── mod_setting.php (Module Settings for Admin Module)
├── mod_nav.php (Module Navigation for Admin Module)
├── mod_site.php (Module Site for Admin Module)
├── mod_permission.php (Module Permissions for Admin Module)
├── mod_topbar.php (Module Topbar Injection for Admin Module)
├── index.php (Prevent Directory Listing)
```

### ./_api

Store your api files in this folder!

```
./MODULE_NAME/_api/
├── api.NAME.php (API Route File for NAME)
├── ... (Other action Files you may add)
├── index.php (Prevent Directory Listing)
```

### ./_config

Configuration to be injected at site module initialization.

```
./MODULE_NAME/_config/
├── config_pre.php (Pre-startup configuration)
├── config_post.php (Post-startup configuration)
└── config.php (Main configuration file)
├── global_pre.php (Pre-startup Global configuration)
├── global_post.php (Post-startup Global configuration)
├── global.php (Main Global configuration file)
├── index.php (Prevent Directory Listing)
```

### ./_cron

Store your code for cronjobs in this folder!

```
./MODULE_NAME/_cron/
├── cron.example.php (Example Cronjob File)
├── .. (Store your other integrated cronjobs here.)
├── index.php (Prevent Directory Listing)
```

### ./_css

Store your css code in this folder!

```
./MODULE_NAME/_css/
├── css.example.php (Example CSS File)
├── .. (Store your other css files here.)
├── index.php (Prevent Directory Listing)
```

### ./_html

Store your html template code in this folder!

```
./MODULE_NAME/_html/
├── .. (Store your files here.)
├── index.php (Prevent Directory Listing)
```

### ./_js

Store your js code in this folder!

```
./MODULE_NAME/_js/
├── js.example.php (Example JS File)
├── .. (Store your other js files here.)
├── index.php (Prevent Directory Listing)
```

### ./_lang

Store your language files in this folder!

```
./MODULE_NAME/_lang/
├── de.php (Translation File for German)
├── en.php (Translation File for English)
├── es.php (Translation File for Spanish)
├── fr.php (Translation File for French)
├── in.php (Translation File for Hindu)
├── it.php (Translation File for Italian)
├── ja.php (Translation File for Japanese)
├── kr.php (Translation File for Korean)
├── pt.php (Translation File for Portuguese)
├── ru.php (Translation File for Russian)
├── tr.php (Translation File for Turkish)
├── zh.php (Translation File for Chinese)
├── ... (Other language Files you may add)
├── index.php (Prevent Directory Listing)
```

### ./_lib

Store your php libraries in this folder!

```
./MODULE_NAME/_lib/
├── lib.example.php (Example Library File)
├── .. (Store your other library files here.)
├── index.php (Prevent Directory Listing)
```

### ./_licenses

Store your external licenses in this folder!

```
./MODULE_NAME/_licenses/
├── example.lic (Example License File)
├── .. (Store your other License files here.)
├── index.php (Prevent Directory Listing)
```

### ./_mysql

Store your mysql tables in this folder!

```
./MODULE_NAME/_mysql/
├── mysql.example.php (Example MySQL File for example table)
├── .. (Store your other mysql files here.)
├── index.php (Prevent Directory Listing)
```

### ./_runtime

Store your runtime files in this folder! (For the Background Linux Worker)

```
./MODULE_NAME/_runtime/
├── run.example.php (Example runtime File)
├── .. (Store your other runtime files here.)
├── index.php (Prevent Directory Listing)
```

### ./_theme

Theme files for your module.

```
./MODULE_NAME/_theme/
├── ... (Content you may add)
├── index.php (Prevent Directory Listing)
```

### ./_trigger

Folder for Trigger files.

```
./MODULE_NAME/_trigger/
├── trigger.TRIGGERNAME.php (Example Trigger File for Trigger: TRIGGERNAME)
├── ... (Other Trigger Files)
├── index.php (Prevent Directory Listing)
```

### ./_update

Theme files for your module.

```
./MODULE_NAME/_update/
├── 100.php (Example Update File to update to Build 100 from previous versions)
├── ... (Other Update Files)
├── index.php (Prevent Directory Listing)
```

### ./_vendor

Vendor Libraries files for your module.

```
./MODULE_NAME/_vendor/
├── ... (Vendor Libraries Files)
├── index.php (Prevent Directory Listing)
```

### ./_view

View Injections in this folder.

```
./MODULE_NAME/_view/
├── view.example.php (Example View Library File)
├── .. (Store your other WFC library files here.)
├── index.php (Prevent Directory Listing)
```

### ./_wfc

Wfc php classes code in this folder!

```
./MODULE_NAME/_wfc/
├── wfc.example.php (Example WFC Library File)
├── .. (Store your other WFC library files here.)
├── index.php (Prevent Directory Listing)
```

### ./_worker

Store your runtime worker files in this folder! (For the Background Linux Worker)

```
./MODULE_NAME/_worker/
├── worker.example.php (Example runtime worker File)
├── .. (Store your other worker files here.)
├── index.php (Prevent Directory Listing)
```

### ./

Files in the extensions root directory.

```
./MODULE_NAME/
├── changelog.php (Changelog info)
├── index.php (Prevent Directory Listing)
├── LICENSE.md (Extensions License)
├── preview.jpg (Preview image)
├── README.md (Extensions Readme)
├── load.php (Initial Loader file (index))
├── version.php (Versioning info)
```


## 📊 Initialization

### Settings: Variables


| Variable               | Default Value         | Description                                                                 |
|------------------------|------------------------|-----------------------------------------------------------------------------|
| `$mysql['host']`       | `'localhost'`          | MySQL Hostname, usually 'localhost' if your DB is on the same server       |
| `$mysql['port']`       | `'3306'`               | MySQL Port, default is 3306                                                 |
| `$mysql['user']`       | `'MYSQL_USER'`         | Replace with your MySQL username                                            |
| `$mysql['pass']`       | `'MYSQL_PASSWORD'`     | Replace with your MySQL password                                            |
| `$mysql['db']`         | `'MYSQL_DATABASE'`     | Replace with your database name                                             |
| `$mysql['prefix']`     | `'sf_'`                | Table prefix, useful for shared databases                                   |
| `$object['cookie']`    | `'sf_'`                | Cookie prefix for this application                                          |
| `$object['path']`      | `'/var/www/html/'`     | Full path to app root on the server                                         |
| `$object['url']`       | `'https://example'`    | Full URL to your site                                                       |
| `_HIVE_IS_IN_DOCKER_`       | `'false'`    | True if this is a docker instance, string with extension name if specialized docker instance.                                                  |

### Init: Preset

| Constant                        | Description                                                                 | Default |
|---------------------------------|-----------------------------------------------------------------------------|-----|
| `_HIVE_OVR_PRE_SETTING_MODE_`   | Define to override Site Mode to a specific one                             | false |
| `_HIVE_INIT_INCLUDED_`          | `true` if `initialize.php` has been included already                       | true |
| `_HIVE_IS_IN_DOCKER_`           | `true` if running in a Docker container, `false` if not                    | false |
| `_HIVE_PREVENT_INIT_`     	  | If true than prevent init from hive mode specific settings in initialize.php | false |

### Init: Ruleset

| Constant                          | Description | Default |
|-----------------------------------|-------------|-------------|
| `_HIVE_ADMIN_SITE_`               | Admin Site Module Folder Name | _administrator |
| `_HIVE_SERVER_`                   | Update Server URL | https://suitefish.com |
| `_HIVE_COOKIE_DOMAIN_`            | Cookie Domain to override | false |
| `_HIVE_PHP_LOG_PATH_`             | Override PHP Logfile Path | false |
| `_HIVE_PHP_DISPLAY_ERROR_ON_START_` | Display PHP Errors before Website Constant Error Definition | 0 |
| `_INSTALLER_TITLE_`               | Installer Title | Suitefish |
| `_INSTALLER_COOKIE_`              | Installer Default Cookie Prefix | sf_ |
| `_INSTALLER_PREFIX_`              | Installer Default Table Prefix | sf_ |
| `_INSTALLER_CODE_`                | Code required for installation | false |
| `_HIVE_MOD_OVR_`                  | Override that only a specific site module can be used. | false |
| `_UPDATER_CODE_OVR_`              | Override updater access code. | false |
| `_HIVE_BLOCK_FP_`                 | Block Frontpage Access | false |
| `_HIVE_MOD_FETCH_`                | Variable to fetch Site Mode from URL | false |
| `$hive_mode_array`                | Only allow specific Site Module Names | false |
| `_HIVE_DEBUG_STACKTRACE_`         | True to enable stack trace output | false |

### Init: Debug

| Constant                  | Name                  |
|---------------------------|-----------------------|
| `$object["debug"]`              | x_class_debug init |

### Init: Tables
						
| Constant                  | Name                  |
|---------------------------|-----------------------|
| `$object["prefix"]`              | `$mysql["prefix"]`              |
| `_TABLE_LOG_`              | prefix_`cms_log`              |
| `_TABLE_LOG_IP_`           | prefix_`cms_log_ip`           |
| `_TABLE_LOG_BENCHMARK_`    | prefix_`cms_log_benchmark`    |
| `_TABLE_LOG_CURL_`         | prefix_`cms_log_curl`         |
| `_TABLE_LOG_MAIL_`         | prefix_`cms_log_mail`         |
| `_TABLE_LOG_MYSQL_`        | prefix_`cms_log_mysql`        |
| `_TABLE_LOG_REFERER_`      | prefix_`cms_log_referer`      |
| `_TABLE_LOG_CRON_`         | prefix_`cms_log_cron`         |
| `_TABLE_LOG_JS_`           | prefix_`cms_log_js`           |
| `_TABLE_LOG_VISIT_`        | prefix_`cms_log_hitcounter`   |
| `_TABLE_LOG_API_`        | prefix_`cms_log_hitcounter`   |
| `_TABLE_USER_`            | prefix_`cms_user`            |
| `_TABLE_USER_EXTRAFIELDS_` | prefix_`cms_user_extrafield` |
| `_TABLE_USER_SESSION_`    | prefix_`cms_user_session`    |
| `_TABLE_USER_PERM_`       | prefix_`cms_user_perm`       |
| `_TABLE_USER_GROUP_`      | prefix_`cms_group`          |
| `_TABLE_USER_GROUP_PERM_` | prefix_`cms_group_perm`     |
| `_TABLE_USER_GROUP_LINK_` | prefix_`cms_group_link`     |
| `_TABLE_VAR_`            | prefix_`cms_var`            |
| `_TABLE_LANG_`           | prefix_`cms_lang`           |
| `_TABLE_MAIL_TPL_`       | prefix_`cms_mail_tpl`       |
| `_TABLE_COMMENT_`        | prefix_`cms_comment`        |
| `_TABLE_STORE_`          | prefix_`cms_store`          |
| `_TABLE_WORKER_`         | prefix_`cms_worker`         |
| `_TABLE_API_`           | prefix_`cms_api`           |
| `_TABLE_API_PERM_`      | prefix_`cms_api_perm`      |
| `_TABLE_API_PERM_USER_` | prefix_`cms_api_perm_user` |


### Init: Variables

| Constant                       | Description                                                        |
|---------------------------------|--------------------------------------------------------------------|
| `_HIVE_CREATOR_`               | String about the Creator (Powered by Suitefish-CMS)                |
| `_HIVE_PREFIX_`                | Prefix for Databases and Redis from `@$mysql["prefix"]`            |
| `_HIVE_COOKIE_`                | Prefix for Cookies and Sessions from `@$object["cookie"]`          |
| `_HIVE_PATH_`                  | Absolute Folder Path to website root folder                        |
| `_HIVE_PATH_API_`              | Absolute Folder Path for API Folder                                |
| `_HIVE_PATH_BACKUP_`           | Absolute Folder Path for Backup Folder                             |
| `_HIVE_PATH_DATA_`             | Absolute Folder Path for Data Folder                               |
| `_HIVE_PATH_STORE_`            | Absolute Folder Path for Store Folder                              |
| `_HIVE_PATH_CACHE_`            | Absolute Folder Path for Cache Folder                              |
| `_HIVE_PATH_SITE_`             | Absolute Folder Path for Site Modules Folder                       |
| `_HIVE_PATH_SITE_OFF_`         | Absolute Folder Path for Disabled Site Modules Folder              |
| `_HIVE_PATH_IMAGE_`            | Absolute Folder Path for Image Modules Folder                      |
| `_HIVE_PATH_IMAGE_OFF_`        | Absolute Folder Path for Disabled Image Modules Folder             |
| `_HIVE_PATH_TPL_`              | Absolute Folder Path for Templates Folder                          |
| `$object["core_mode"]`              | X Array with version codename from version.php core                          |


### Init: Hive Mode 

- Not defined if `_HIVE_PREVENT_INIT_` = true

| Constant                                   | Description                   |
|--------------------------------------------|-------------------------------|
| `_HIVE_MODE_ARRAY_`                        | Valid Hive Mode Array         |
| `_HIVE_MODE_DEFAULT_`                      | Default Hive Mode             |
| `$_SESSION[_HIVE_COOKIE_."hive_mode"]`     | Session Current Hive Mode     |
| `_HIVE_MODE_`                              | Constant with Current Hive Mode |
| `_HIVE_MODE_DEFAULT_`                      | Default Hive Mode             |

### Init: Variables

- Not defined if `_HIVE_PREVENT_INIT_` = true

| Constant                          | Description                                                        |
|------------------------------------|--------------------------------------------------------------------|
| `_HIVE_SITE_COOKIE_`              | Site Modules Cookie Prefix and Sessions Prefix                     |
| `_HIVE_SITE_PREFIX_`              | Site Modules Redis and Database Table prefix                       |
| `_HIVE_SITE_PATH_CACHE_`          | Site Module folder for cache                                       |
| `_HIVE_SITE_PATH_BACKUP_`         | Site Module folder for backups                                     |
| `_HIVE_SITE_PATH_`                | Site Module folder                                                  |
| `_HIVE_SITE_PATH_DATA_`           | Site Module folder for data                                        |
| `_HIVE_SITE_PATH_DKR_`            | Site Module folder for docker active                               |
| `_HIVE_SITE_PATH_DKR_TPL_`        | Site Module folder for docker template                             |
| `_HIVE_SITE_PATH_EXT_`            | Site Module folder for extensions                                  |
| `_HIVE_SITE_PATH_EXT_DATA_PUBLIC_`| Site Module folder for extension public data                        |
| `_HIVE_SITE_PATH_EXT_DATA_PRIVATE_`| Site Module folder for extension private data                      |
| `_HIVE_SITE_PATH_EXT_OFF_`        | Site Module folder for disabled extensions                         |
| `_HIVE_SITE_PATH_META_`           | Site Module folder for meta files                                  |
| `_HIVE_SITE_PATH_PHP_`            | Site Module folder for php files                                   |
| `_HIVE_SITE_PATH_PUBLIC_`         | Site Module folder for public files                                |
| `_HIVE_SITE_PATH_PRIVATE_`        | Site Module folder for private files                               |
| `_HIVE_SITE_PATH_TH_`             | Site Module folder for theme extensions                            |
| `_HIVE_SITE_PATH_TH_OFF_`         | Site Module folder for disabled theme extensions                   |

### Init: Relative

- Only if Hive_Prevent_Init is false.

#### Init

| Variable/Constant | Description |
| --- | --- |
| `$object["extensions_path"]` | Pathes of current Site Module Extensions |
| `$object["hive_mode"]` | Current Site Module X Array from version.php |
| `$object["hive_mode_config_pre"]` | Array with Pre Configured Information for Extensions and Modules |
| `$object["hive_mode_config_pre"]["extension"]` | Information of Extension Modules for current Site Module |
| `$object["hive_mode_config_pre"]["site"]` | Information of Site Modules |
| `$object["var_glob"]` | Class Initialization |
| `_HIVE_BUILD_` | Current Mod Build Installed |
| `_HIVE_VERSION_` | Current Mod Version Installed |
| `_HIVE_RNAME_` | Current Mod RNAME Installed |
| `_HIVE_BUILD_ACTIVE_` | Current running new Module Build Number (if not exists setup) |
| `_HIVE_RNAME_ACTIVE_` | Current running new Module RNAME (if not exists setup) |
| `_HIVE_VERSION_ACTIVE_` | Current running new Module RNAME (if not exists setup) |
| `_HIVE_INTERNAL_MT_LOCK_OVR_` | Do not show maintenance Lock Page |
| `_HIVE_INTERNAL_BACKUP_LOCK_OVR_` | Do not show backup Lock Page |
| `_HIVE_INTERNAL_UPDATE_LOCK_OVR_` | Do not show update Lock Page |
| `_HIVE_INTERNAL_INIT_ERROR_OVR_` | Do not show error page for: `_HIVE_INTERNAL_INIT_ERROR_` |
| `_HIVE_INTERNAL_RNAME_ERROR_OVR_` | Do not show error page for: `_HIVE_INTERNAL_RNAME_ERROR_` |
| `_HIVE_INTERNAL_DOWNGRADE_ERROR_OVR_` | Do not show error page for: `_HIVE_INTERNAL_DOWNGRADE_ERROR_` |
| `_HIVE_INTERNAL_UPDATE_REQ_OVR_` | Do not show error page for: `_HIVE_INTERNAL_UPDATE_REQ_` |
| `_HIVE_INTERNAL_VERSION_ERROR_OVR_` | Do not show error page for: `_HIVE_INTERNAL_VERSION_ERROR_` |
| `$object["mysql"]` | MySQL Class Initialization |
| `$object["log"]` | Class Initialization |
| `$object["api_log"]` | API Log |
| `$object["api_perm"]` | API Perm Class |
| `$object["api_perm_user"]` | API Perm User Class |
| `$object["var"]` | Class Initialization |
| `_HIVE_INTERNAL_BACKUP_LOCK_` | Lock Variable |
| `_HIVE_INTERNAL_MT_LOCK_` | Lock Variable |
| `_HIVE_INTERNAL_LOCK_` | Lock Variable (is another one true?) |
| `_HIVE_INTERNAL_UPDATE_LOCK_` | Lock Variable |
| `_HIVE_INTERNAL_INIT_ERROR_` | No valid site module found |
| `_HIVE_INTERNAL_RNAME_ERROR_` | Suddenly different Module RNAME active |
| `_HIVE_INTERNAL_DOWNGRADE_ERROR_` | Current module suddenly downgraded |
| `_HIVE_INTERNAL_UPDATE_REQ_` | Database changes are pending |
| `_HIVE_INTERNAL_VERSION_ERROR_` | Error with version numbers, consistency |

#### Include

Pre-Configuration Includes.

#### Init

| Variable/Constant | Description |
| --- | --- |
| `$object["url"]` | URL of the instance |
| `_HIVE_URL_` | same as object url array key |
| `_HIVE_URL_REL_` | url for relative operations |
| `_HIVE_URLC_REL_` | url for relative operations |
| `$object["crypt"]` | Class Initialization |
| `$object["zip"]` | Class Initialization |
| `$object["benchmark"]` | Class Initialization |
| `$object["api"]` | Class Initialization |
| `$object["comment"]` | Class Initialization |
| `$object["hitcounter"]` | Class Initialization / clearget = false |
| `$object["2fa"]` | Class Initialization (only reserved) |
| `$object["curl"]` | Class Initialization |


#### Include

Configuration Includes.

#### Init

| Variable/Constant | Description |
| --- | --- |
| `$object["var"]` | NOW GETS INIT ONLY (GLOBALS NO INIT AS CONSTANT) |
| `_TINYMCE_PLUGINS_` | Default Tinymce Plugins |
| `_TINYMCE_MENU_BAR_` | Default Tinymce Menu Bar |
| `_TINYMCE_TOOL_BAR_` | Default Tinymce Toolbar |
| `_CRON_ONLY_CLI_` | Cronjobs only over CLI? |
| `_HIVE_CURL_LOGGING_` | Activate Curl Logging? |
| `_HIVE_CSRF_TIME_` | CSRF Token Valid Time |
| `_HIVE_URL_GET_` | GET Variables to use in GET Requests for Location |
| `_HIVE_URL_SEO_` | TRUE if using SEO Variables, FALSE if not |
| `_HIVE_TITLE_SPACER_` | Spacer for Title |
| `_UPDATER_CODE_` | Updater Code if Updater if Code-Secured |
| `_CAPTCHA_COLORS_` | Captcha Color Array |
| `_CAPTCHA_SQUARES_` | Captcha Square Count |
| `_CAPTCHA_LINES_` | Captcha Line Count |
| `_CAPTCHA_HEIGHT_` | Captcha Height |
| `_CAPTCHA_WIDTH_` | Captcha Width |
| `_CAPTCHA_CODE_` | Captcha Generated Code |
| `_CAPTCHA_FONT_PATH_` | Font Path for Catpcha |
| `_USER_TOKEN_TIME_` | Token are valid for how long (recover requests and stuff) |
| `_USER_MULTI_LOGIN_` | Multi login allowed |
| `_USER_REC_DROP_` | Drop tokens for reover on success login |
| `_USER_MAX_SESSION_` | May php session day validity |
| `_USER_PF_SIGNS_` | password filter signs |
| `_USER_PF_CAPSIGNS_` | password filter cap signs |
| `_USER_PF_SMSIGNS_` | password filter small signs |
| `_USER_PF_SPSIGNS_` | password filter special signs |
| `_USER_PF_NUMSIGNS_` | password filter num signs |
| `_USER_AUTOBLOCK_` | password filter setup |
| `_USER_WAIT_COUNTER_` | Wait time between requests |
| `_USER_LOG_SESSIONS_` | store logged sessions no cleanup |
| `_USER_INITIAL_USERNAME_` | initial username after setup |
| `_USER_INITIAL_USERPASS_` | initial userpass after setup |
| `_USER_LOG_IP_` | save user ips in logging table |
| `_HIVE_MYSQL_DEBUG_` | Defined by site module otherwhise is false |
| `_REDIS_` | Redis Configuration |
| `_REDIS_HOST_` | Redis Hostname/IP |
| `_REDIS_PORT_` | Redis Port Number |
| `_REDIS_PREFIX_` | Redis Key Prefix |
| `_HIVE_IP_LIMIT_` | IP Request Limit |
| `_HIVE_REFERER_` | Referer Header Validation |
| `_SMTP_HOST_` | SMTP Server Hostname |
| `_SMTP_PORT_` | SMTP Server Port Number |
| `_SMTP_AUTH_` | SMTP Authentication Method |
| `_SMTP_USER_` | SMTP Username |
| `_SMTP_PASS_` | SMTP Password |
| `_SMTP_SENDER_NAME_` | SMTP Sender Name |
| `_SMTP_SENDER_MAIL_` | SMTP Sender Email |
| `_SMTP_INSECURE_` | SMTP Insecure Connection |
| `_SMTP_DEBUG_` | SMTP Debugging Mode |
| `_SMTP_MAILS_IN_HTML_` | Send Emails in HTML Format |
| `_UPDATER_TITLE_` | Updater Title |
| `_HIVE_TITLE_` | Website Title |
| `_HIVE_SITE_URL_` | Site Module URL |
| `_HIVE_SITE_REL_` | Relative Site Module URL |
| `_HIVE_SITEC_REL_` | Relative Site Module URL (alternative) |
| `_HIVE_JS_ACTION_ACTIVE_` | Enable JavaScript Error Logging |
| `$object["user"]` | User Object (x_class_user) |
| `$object["perm_user"]` | Relative User Permission |
| `$object["perm_user_glob"]` | Global User Permission Object |
| `$object["perm_group"]` | Relative Group Permission |
| `$object["perm_group_glob"]` | Global Group Permission Object |
| `$object["user_perm"]` | Current User Permission (x_class_perm_item) |
| `$object["user_perm_glob"]` | Global Current User Permission (x_class_perm_item) |
| `$object["user_group"]` | User Group Information |
| `$valuex["perm_obj"]` | Permission Object |
| `$valuex["perm_obj_glob"]` | Global Permission Object |
| `$object["referer"]` | Referer Object |
| `$object["redis"]` | Redis Object |
| `$object["ipbl"]` | IP Blacklist Object |
| `$object["curl"]` | Curl Object |
| `$object["mail"]` | Mail Object |
| `$object["mail_template"]` | Mail Template Object |
| `_HIVE_URL_CUR_` | Current URL |
| `_HIVE_LANG_` | Current Language |
| `_HIVE_LANG_ARRAY_` | Language Array |
| `_HIVE_LANG_DEFAULT_` | Default Language |
| `$object["lang"]` | Language Object |
| `$_SESSION[_HIVE_SITE_COOKIE_."hive_language"]` | Stored Language in Session |
| `_HIVE_THEME_ARRAY_` | Theme Array |
| `_HIVE_THEME_DEFAULT_` | Default Theme |
| `$_SESSION[_HIVE_SITE_COOKIE_."hive_theme"]` | Stored Theme in Session |
| `_HIVE_THEME_COLOR_DEFAULT_` | Default Theme Color |
| `_HIVE_COLOR_` | Current Color |
| `$_SESSION[_HIVE_SITE_COOKIE_."hive_color"]` | Stored Color in Session |
| `$object["hive_mode_config_pre"]["extension_lang"][modname]` | Extension Language Configuration |
| `$object["hive_mode_config_pre"]["site_lang"][modname]` | Site Language Configuration |
| `_HIVE_BUILD_FIRSTRUN_ONUPDATE_` | First Run on Update Flag |
| `_HIVE_BUILD_FIRSTRUN_` | First Run Flag |

#### Include

Post-Configuration Includes.

### Init: Globals

 - If Init is prevented only

| Variable/Constant | Description |
| --- | --- |
| `$object["mysql"]` | MySQL Class Initialization |
| `$object["log"]` | Class Initialization |
| `$object["api_log"]` | API Log |
| `$object["api_perm"]` | API Perm Class |
| `$object["api_perm_user"]` | API Perm User Class |
| `$object["var"]` | Class Initialization |
| `_HIVE_INTERNAL_BACKUP_LOCK_` | Lock Variable |
| `_HIVE_INTERNAL_MT_LOCK_` | Lock Variable |
| `_HIVE_INTERNAL_LOCK_` | Lock Variable (is another one true?) |
| `_HIVE_INTERNAL_UPDATE_LOCK_` | Lock Variable |
| `_HIVE_INTERNAL_MT_LOCK_OVR_` | Preset Variable to Override Maintenance Stop in Initialize |
| `_HIVE_INTERNAL_BACKUP_LOCK_OVR_` | Preset Variable to Override Backup Stop in Initialize |
| `_HIVE_INTERNAL_UPDATE_LOCK_OVR_` | Preset Variable to Override Update Stop in Initialize |
| `$object["url"]` |  |
| `_HIVE_URL_` |  |
| `_HIVE_URL_REL_` |  |
| `_HIVE_URLC_REL_` |  |
| `$object["curl"]` | Class Initialization |
| `$object["2fa"]` | Class Initialization (only reserved) |
| `$object["zip"]` | Class Initialization |
| `$object["crypt"]` | Class Initialization |
| `_CRON_ONLY_CLI_` | Cronjobs only over CLI? |
| `_HIVE_CURL_LOGGING_` | Activate Curl Logging? |
| `$object["perm_user_glob"]` | global user x_class_perm object |
| `$object["perm_group_glob"]` | global group x_class_perm object |

### Init: Variables

| Constant | Description |
| --- | --- |
| `_HIVE_SCRIPT_CACHE_T_` | Header Cache-Control: |
| `_HIVE_SCRIPT_CACHE_F_` | Header Cache-Control: (with false 2nd argument) |
| `_HIVE_SCRIPT_CACHE_P_` | Header Pragma: |
| `_HIVE_INTERNAL_INIT_ERROR_` | Set to 0 if undefined |
| `_HIVE_INTERNAL_VERSION_ERROR_` | Set to 0 if undefined |
| `_HIVE_INTERNAL_RNAME_ERROR_` | Set to 0 if undefined |
| `_HIVE_INTERNAL_DOWNGRADE_ERROR_` | Set to 0 if undefined |
| `_HIVE_INTERNAL_UPDATE_REQ_` | Set to 0 if undefined |
| `_HIVE_ENABLESITE_MAILCHANGE_` | Enable a Site in `_user` if true |
| `_HIVE_ENABLESITE_PASSCHANGE_` | Enable a Site in `_user` if true |
| `_HIVE_ENABLESITE_RECOVER_` | Enable a Site in `_user` if true |
| `_HIVE_ENABLESITE_LOGIN_` | Enable a Site in `_user` if true |
| `_HIVE_ENABLESITE_LOGOUT_` | Enable a Site in `_user` if true |
| `_HIVE_ENABLESITE_REGISTER_` | Enable a Site in `_user` if true |
| `_HIVE_ENABLESITE_LANGCHANGE_` | Enable a Site in `_user` if true |
| `_HIVE_ENABLESITE_MODESWITCH_` | Enable a Site in `_user` if true |
| `_HIVE_ENABLESITE_2FA_` | Enable a Site in `_user` if true |
| `_HIVE_ENABLESITE_ACTIVATE_` | Enable a Site in `_user` if true |
| `_HIVE_DEFERSITE_MAILCHANGE_` | Forward to another URL at Site in `_user` if true |
| `_HIVE_DEFERSITE_PASSCHANGE_` | Forward to another URL at Site in `_user` if true |
| `_HIVE_DEFERSITE_RECOVER_` | Forward to another URL at Site in `_user` if true |
| `_HIVE_DEFERSITE_LOGIN_` | Forward to another URL at Site in `_user` if true |
| `_HIVE_DEFERSITE_LOGOUT_` | Forward to another URL at Site in `_user` if true |
| `_HIVE_DEFERSITE_REGISTER_` | Forward to another URL at Site in `_user` if true |
| `_HIVE_DEFERSITE_LANGCHANGE_` | Forward to another URL at Site in `_user` if true |
| `_HIVE_DEFERSITE_MODESWITCH_` | Forward to another URL at Site in `_user` if true |
| `_HIVE_DEFERSITE_2FA_` | Forward to another URL at Site in `_user` if true |
| `_HIVE_DEFERSITE_ACTIVATE_` | Forward to another URL at Site in `_user` if true |

### Include: Variables

Inside included extension files you have access to special variables in the object array containing language and extension information.

You can access this array keys at: `$object["hive_mode_config"]["info"]` for example. 

| **Key**               | **Description**                                                                                         |
|-----------------------|---------------------------------------------------------------------------------------------------------|
| `info`                | Full version.php x array of current site module. |
| `path`                | Full Path to the Site Module directory. |
| `name`                | Name of the Site Module.|
| `prefix`              | Prefix for MySQL and Redis. |
| `cookie`              | Prefix for cookies and sessions. |
| `prefix_variables`    | Prefix for variables and permissions.        |
| `lang`                | Language object with loaded site module special admin language file. |

## 🗣️ Language Files 

Below you see an example of an english language file (en.php). The first lines prevent public view of the language file. The variables for translations are for the store to make name and description multi-langual. Languages for the injected sites in the administrator module will be stores in the site modules _admin/_lang folder.

``` 
<?php if(isset($this)) { if(!is_object($this)) { Header("Location: ../"); exit(); } } else { Header("Location: ../"); exit(); } ?>

store_version_name=Template: Theme Module
store_version_description=This example Theme demonstrates the functioning of Theme Module extensions within this CMS. It includes readme files explaining the use of various folders and provides a skeleton template for creating your own Theme modules.
``` 

In the _lang folder of the site module you can save language files for the frontpage if the site module is activated.

``` 
<?php if(isset($this)) { if(!is_object($this)) { Header("Location: ../"); exit(); } } else { Header("Location: ../"); exit(); } ?>

language_key=Translation
``` 

## ⚙️ Default Files

Suitefish-CMS Modules expect some default files to be in place in modules. Here you can see which files are mandatory.

### load.php

Initial loader file for the site module which will be acting as index.php as the websites root file if this site module is active.

### version.php

This file contains detailed information about the module, all variables are mandatory and should be set on a module.

**Initialize Variable Array**

``` 
$x = array();
``` 

**Module Details**

``` 
// Unique Module ID
// - This is a unique id for your module
// - If you want your module in the public store contact the developers to get your unique module id.
// - Request unique module id for official publication at requestid@suitefish.com
// - If you do not have a registered unique module id start your rname with "xxx"
// - Use maximum of 15 signs
// - No special chars, only a-Z
// - No numeric chars
// - Underscore (_) prefix is dedicated to suitefish official releases
// - This variable is mandatory
$x["rname"] 		= "_site";
// Available Languages 
// - Short Codes of available languages in PHP Array
// - This variable is mandatory
$x["lang"] 			= array("en", "de", "fr", "it", "es", "zh", "ja", "in", "kr", "pt", "ru", "tr");
// Build Number:
// - Do only use integer values here
// - Will extend the version number
// - Do not use special chars, not even dots
// - This variable is mandatory
$x["build"] 		= "100";
// Module Version
// - Always add the build number at the end, seperated by a dot (.)
// - Define the main Version number if the module.
// - This variable is mandatory
$x["version"] 		= "1.10.".$x["build"];
// Module Name 
// - Define the Title of the Module displayed in different frontpage areas.
// - Only text, no html codes
// - This variable is mandatory
$x["name"] 			= "Template: Website Module";
// Module Description 
// - Define the Description of the Module displayed in different frontpage areas.
// - Only text and simple html codes (like br, li, table)
// - Do not use style, script or other kind of complex tags
// - This variable is mandatory
$x["description"] = "This is a integrated website module example! This kind of website modules use the suitefish-cms as a platform to allow multi-site hosting with one instance!";
// Module Type
// - There are different Types of Modules inside Suitefish CMS
// - The set ID 1 is dedicated to site modules and will than be recognized as one.
// - Other possible values: 1 - Site | 2 - Extension | 3 - Image | 4 - Windows | 5 - Docker | 6 - Theme
// - This variable is mandatory
$x["type"] 			= 1;
// Minimal CMS Version to run this module
// - Define the minimal version of CMS required to run this module.
// - This variable is mandatory
$x["cms_version_min"] 		= "7.10.100";
``` 

**Module Author**

``` 
// Module License (gplv3, gplv2, mit, bsd, bsd2, ...) (can be false)
$x["license"] 		= "gplv3";
// Module Author Name (can be false)
$x["author"] 		= "Suitefish";
// Module Author Mail (can be false)
$x["mail"] 			= false;
// Module Author Website (can be false)
$x["website"] 		= "https://www.suitefish.com";
// Module Documentation Website (can be false)
$x["documentation"] = "https://bugfishtm.github.io/suitefish-cms/";	
// Module Github Website (can be false)
$x["github"] 		= "https://github.com/bugfishtm/suitefish-cms";	
// Module Video URL (a video about the module if exists, can be false)
$x["video"] 		= false;		
``` 

**Extension Specific**

``` 
// Does this Module require an active Background worker?
// If true then the background worker is mandatory and a notice will be displayed upon module creation.
$x["require_worker"] 		= false;
// Single Instance Module?
// If true, than this modules rname can only be deployed a single time on that cms instance.
// Recommended for Server Software where duplications of the module activated may lead to issues.
$x["single_instance"] 		= false;	
``` 

### changelog.php

Changelog of changes between this and last version of this module. Store the changelog in simple html format in the $x variable.

``` 
$x = "<b>Release 1.10.100</b><br /> - Initial Release";
```

### preview.jpg

Preview image for the store and other areas the module is visble at.

### LICENSE.md

License information about the module.

### README.md

Readme file with general information about the module.

🐟 Bugfish