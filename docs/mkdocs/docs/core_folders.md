# Core-System - Folder Structure

Information about the suitefish-cms folder structure.

---

## Definition

**Public Access denied (Definition):**

 ✅ The folder/file cannot be accessed via a public link/url.  
 ❌ The file can be accessed via public link/url.  
 
**Persistent Changed (Definition):**

 ✅ Changes in this file/folder are persistent.  
 ❌ Changes in this file/folder are not persistent.  
 
**Auto-(Re)generated (Definition):**

 ✅ File will be auto regenerated or generated is not existing.  
 ❌ File wont be automatically regenerated or created.  

## ./_api

| File/Folder  | Description | Public Access Denied | Persistent Changed |
|-------------|----------------|-------|-------|
| `./_api` | This folder contains API endpoints for CMS backend operations and general functionality. | ❌ | ❌ | 
| `./_api/v1.php` | API Version 1 and Routing Script. | ❌ | ❌ |

## ./_backup

| File/Folder  | Description | Public Access Denied | Persistent Changed |
|-------------|----------------|-------|-------|
| `./_backup` | Folder for onsite backups. | ✅ | ✅ | 
| `./_backup/[ModuleName]/` | Backup folder for site module: [ModuleName]. | ✅ | ✅ | 
| `./_backup/[ModuleName]/__extension/[ExtensionName]` | Backup folder for site module: [ModuleName] and extension: [ExtensionName]. | ✅ | ✅ | 

## ./_cache

| File/Folder  | Description | Public Access Denied | Persistent Changed |
|-------------|----------------|-------|-------|
| `./_cache` | Folder for site modules and extensions cache. | ❌ | ✅ | 
| `./_cache/[ModuleName]/` | Cache folder for site module: [ModuleName]. | ❌ | ✅ | 
| `./_cache/[ModuleName]/__extension/[ExtensionName]` | Cache folder for site module: [ModuleName] and extension: [ExtensionName]. | ❌ | ✅ | 

## ./_core

| File/Folder  | Description | Public Access Denied | Persistent Changed |
|-------------|----------------|-------|-------|
| `./_core/action` | Actions for various backend purposes.| ❌ | ❌ | 
| `./_core/action/js_debug_action.php` | Actions to log javascript errors in database.| ❌ | ❌ | 
| `./_core/_captcha` | Contains captcha images for inclusion; uses session variables for storing captcha tokens. | ❌ | ❌ | 
| `./_core/_captcha/comment.php` | Captcha image storing code in: `_SESSION[HIVE_SITE_COOKIE_."captcha.comment"]`. | ❌ | ❌ | 
| `./_core/_captcha/contact.php` | Captcha image storing code in: `_SESSION[HIVE_SITE_COOKIE_."captcha.contact"]`. | ❌ | ❌ | 
| `./_core/_captcha/download.php` | Captcha image storing code in: `_SESSION[HIVE_SITE_COOKIE_."captcha.download"]`. | ❌ | ❌ | 
| `./_core/_captcha/guestbook.php` | Captcha image storing code in: `_SESSION[HIVE_SITE_COOKIE_."captcha.guestbook"]`. | ❌ | ❌ | 
| `./_core/_captcha/login.php` | Captcha image storing code in: `_SESSION[HIVE_SITE_COOKIE_."captcha.login"]`. | ❌ | ❌ | 
| `./_core/_captcha/member.php` | Captcha image storing code in: `_SESSION[HIVE_SITE_COOKIE_."captcha.member"]`. | ❌ | ❌ | 
| `./_core/_captcha/misc.php` | Captcha image storing code in: `_SESSION[HIVE_SITE_COOKIE_."captcha.misc"]`. | ❌ | ❌ | 
| `./_core/_captcha/newsletter.php` | Captcha image storing code in: `_SESSION[HIVE_SITE_COOKIE_."captcha.newsletter"]`. | ❌ | ❌ | 
| `./_core/_captcha/register.php` | Captcha image storing code in: `_SESSION[HIVE_SITE_COOKIE_."captcha.register"]`. | ❌ | ❌ | 
| `./_core/_captcha/reset.php` | Captcha image storing code in: `_SESSION[HIVE_SITE_COOKIE_."captcha.reset"]`. | ❌ | ❌ | 
| `./_core/_error`  | Default error templates for `.htaccess` and project integration, used as full-page templates for HTTP error codes.| ❌ | ❌ | 
| `./_core/_error/400.html`  | HTML Error page template.| ❌ | ❌ | 
| `./_core/_error/401.html`  | HTML Error page template.| ❌ | ❌ | 
| `./_core/_error/403.html`  | HTML Error page template.| ❌ | ❌ | 
| `./_core/_error/404.html`  | HTML Error page template.| ❌ | ❌ | 
| `./_core/_error/500.html`  | HTML Error page template.| ❌ | ❌ | 
| `./_core/_error/501.html`  | HTML Error page template.| ❌ | ❌ | 
| `./_core/_error/502.html`  | HTML Error page template.| ❌ | ❌ | 
| `./_core/_error/503.html`  | HTML Error page template.| ❌ | ❌ | 
| `./_core/_error/504.html`  | HTML Error page template.| ❌ | ❌ | 
| `./_core/_error/520.html`  | HTML Error page template.| ❌ | ❌ | 
| `./_core/_error/521.html`  | HTML Error page template.| ❌ | ❌ | 
| `./_core/_error/533.html`  | HTML Error page template.| ❌ | ❌ | 
| `./_core/_font` | Stores included font files. | ❌ | ❌ | 
| `./_core/_font/Changa` | Included font files. | ❌ | ❌ | 
| `./_core/_font/ComicNeue` | Included font files. | ❌ | ❌ | 
| `./_core/_font/Lato` | Included font files. | ❌ | ❌ | 
| `./_core/_font/Roboto` | Included font files. | ❌ | ❌ | 
| `./_core/_font/RockSalt` | Included font files. | ❌ | ❌ | 
| `./_core/_font/captcha.ttf` | Default font for default captchas. | ❌ | ❌ | 
| `./_core/_framework` | Bugfish Framework files, included at initialization.| ❌ | ❌ | 
| `./_core/_image` | Default JPG/PNG/ICO images used across CMS sections.| ❌ | ❌ | 
| `./_core/_lang`| Default language translation files loaded based on `_HIVE_LANG_`.| ❌ | ❌ | 
| `./_core/_lang/de.php`| Backend language file. | ✅ | ❌ | 
| `./_core/_lang/en.php`| Backend language file. | ✅ | ❌ | 
| `./_core/_lang/es.php`| Backend language file. | ✅ | ❌ | 
| `./_core/_lang/fr.php`| Backend language file. | ✅ | ❌ | 
| `./_core/_lang/in.php`| Backend language file. | ✅ | ❌ | 
| `./_core/_lang/it.php`| Backend language file. | ✅ | ❌ | 
| `./_core/_lang/ja.php`| Backend language file. | ✅ | ❌ | 
| `./_core/_lang/kr.php`| Backend language file. | ✅ | ❌ | 
| `./_core/_lang/pt.php`| Backend language file. | ✅ | ❌ | 
| `./_core/_lang/ru.php`| Backend language file. | ✅ | ❌ | 
| `./_core/_lang/tr.php`| Backend language file. | ✅ | ❌ | 
| `./_core/_lang/zh.php`| Backend language file. | ✅ | ❌ | 
| `./_core/_lib` | Core function library of the CMS, including different per function-sites and templates.| ❌ | ❌ | 
| `./_core/_lib/lib.init.default.php` | Backend default theme library. | ❌ | ❌ | 
| `./_core/_lib/lib.init.download.php` | Backend default download library. | ❌ | ❌ | 
| `./_core/_lib/lib.init.error.php` | Backend default error library. | ❌ | ❌ | 
| `./_core/_lib/lib.init.inject.php` | Backend default inject library. | ❌ | ❌ | 
| `./_core/_lib/lib.init.library.php` | Backend default function library. | ❌ | ❌ | 
| `./_core/_lib/lib.init.template.php` | Backend default template library. | ❌ | ❌ | 
| `./_core/_lib/lib.init.trigger.php` | Backend default trigger library. | ❌ | ❌ | 
| `./_core/_lib/lib.init.user.php` | Backend default user library. | ❌ | ❌ | 
| `./_core/_lib/lib.init.worker.php` | Backend default worker library. | ❌ | ❌ | 
| `./_core/_licenses` | Library of included vendor license.| ❌ | ❌ | 
| `./_core/_mysql`                       | Contains MySQL core system tables installed during site initialization as specified in `initialize.php`| ❌ | ❌ | 
| `./_core/_mysql/mysql.cms_store.php`                       | Backend deployment store table. | ✅ | ❌ | 
| `./_core/_mysql/mysql.cms_worker.php`                       | Backend daemon tasking table. | ✅ | ❌ | 
| `./_core/_vendor` | Third-party scripts, functions, and templates for added functionalities or UX features; licenses are stored in `_licenses`.|  ❌ | ❌ | 
| `./_core/initialize.php`                 | Initializes site functionalities and includes variables referenced by `settings.php`.                                                                                                                           | ✅ | ❌ | 
| `./_core/javascript.php`                 | JavaScript loader for framework, module, and extension-related scripts; include this file in your project's header as a standard JS script file.                                                                | ✅ | ❌ | 
| `./_core/stylesheet.php`                 | CSS loader for framework, module, and extension-related stylesheets; include this file in your project's header as a standard CSS file.                                                                          | ✅ | ❌ | 
| `./_core/version.php`                    | Contains versioning information for the core system.                                                                                                                                                            | ✅ | ❌ | 
| `./_core/worker.php`                     | Background worker script. (See Documentation)                                                                                                                                                                                      | ✅ | ❌ | 

## ./_cronjob

| File/Folder  | Description | Public Access Denied | Persistent Changed |
|-------------|----------------|-------|-------|
| `./_cronjob`                      | System Cronjob Folder.                                                                                                                                                                         | ✅ | ❌ | 
| `./_cronjob/cronjob.php`                      | Cronjob PHP File to be run on your server.                                                                                                                                                                         | ✅ | ❌ | 

## ./_data

| File/Folder  | Description | Public Access Denied | Persistent Changed |
|-------------|----------------|-------|-------|
| `./_data/`                | Persistent Data Folder | ❌ | ✅ | 
| `./_data/[ModuleName]/`                | Data Folder for Site Module 'ModuleName' | ❌ | ✅ | 
| `./_data/[ModuleName]/_docker`         | Active Docker Templates  | ✅ | ✅ | 
| `./_data/[ModuleName]/_extension/[ExtensionName]`      | Active Extensions Folder | ❌ | ✅ | 
| `./_data/[ModuleName]/_extension-data/[ExtensionName]`      | Extensions Data Folder  | ❌ | ✅ | 
| `./_data/[ModuleName]/_extension-disabled/[ExtensionName]` | Disabled Extensions Folder  | ✅ | ✅ | 
| `./_data/[ModuleName]/_private`        | Restricted Admin Module Files  | ✅ | ✅ | 
| `./_data/MODNAME/_public`         | Public Admin Module Files  | ❌ | ✅ | 
| `./_data/[ModuleName]/_theme`          | Active Theme Modules  | ❌ | ✅ | 
| `./_data/[ModuleName]/_theme-data/[ExtensionName]`          | Theme Files Folder  | ❌ | ✅ | 
| `./_data/[ModuleName]/_theme/__disabled/[ExtensionName]` | Inactive Theme Modules  | ✅ | ✅ | 

## ./_image

| File/Folder  | Description | Public Access Denied | Persistent Changed |
|-------------|----------------|-------|-------|
| `./_image` | Deployed Image Modules. | ❌ | ✅ |
| `./_image/__disabled`| Folder for inactive image Modules. Modules placed here are recognized as inactive and handled accordingly. | ❌ | ✅ |
| `./_image/__disabled/[ModuleName]/`| Image Module folder for inactive image module: [ModuleName]. | ✅ | ✅ |
| `./_image/[ModuleName]/` | Image Module folder for image module: [ModuleName]. | ❌ | ✅ | 

## ./_sample

| File/Folder  | Description | Public Access Denied | Persistent Changed |
|-------------|----------------|-------|-------|
| `./_sample` | Example configuration files. | ✅| ❌ |
| `./_sample/settings.php`  | An example of a `settings.php` file in case the on-page installer does fail. |  ✅| ❌ |
| `./_sample/pkg.php` | Set up the administrator module packages and provide default configuration settings for different product instances.  |  ✅| ❌ |
| `./_sample/cfg_ruleset.php` | Use this file to modify primary CMS functionalities, such as site module determination. |  ✅| ❌ |
| `./_sample/maintenance.lock.php` | If this file is present in the websites root directory the website is in full maintenance mode. | ✅| ❌ |
| `./_sample/backup.lock.php` | If this file is present in the websites root directory the website is in full backup mode. | ✅| ❌ |
| `./_sample/update.lock.php` | If this file is present in the websites root directory the website is in full update mode. | ✅| ❌ |

## ./_site

| File/Folder  | Description | Public Access Denied | Persistent Changed |
|-------------|----------------|-------|-------|
| `./_site` | Deployed Site Modules. | ❌ | ✅ |
| `./_site/__disabled`| Folder for inactive Site Modules. Modules placed here are recognized as inactive and handled accordingly. | ❌ | ✅ |
| `./_site/__disabled/[ModuleName]/`| Site Module folder for inactive site module: [ModuleName]. | ✅ | ✅ |
| `./_site/[ModuleName]/` | Site Module folder for site module: [ModuleName]. | ❌ | ✅ | 
| `./_site/_administrator`| Default Suitefish Administrator Site Module. | ❌ | ❌ |

## ./_store

| File/Folder  | Description | Public Access Denied | Persistent Changed |
|-------------|----------------|-------|-------|
| `./_store` | Stores deployed files, including core, module, and software releases for other instances. | ❌ | ✅ |
| `./_store/software` | Published software releases. | ❌ | ✅ |
| `./_store/cms` | Published cms releases. | ❌ | ✅ |
| `./_store/module` | Published module releases. | ❌ | ✅ |

## ./_template

| File/Folder  | Description | Public Access Denied | Persistent Changed |
|-------------|----------------|-------|-------|
| `./_template` | This folder stores template files downloaded from internal store pages or uploaded manually. | ✅ | ✅ |


## ./_testing

| File/Folder  | Description | Public Access Denied | Persistent Changed |
|-------------|----------------|-------|-------|
| `./_testing` | Folder for internal testing procedures. | ❌ | ❌ |


## ./_user

| File/Folder  | Description | Public Access Denied | Persistent Changed |
|-------------|----------------|-------|-------|
| `./_user` | Folder for different user actions. | ❌ | ❌ |
| `./_user/user_2fa.php`                           | Set up and manage 2FA Auth for a user | ❌ | ❌ |
| `./_user/user_activate.php`                      | User activation with token execution | ❌ | ❌ |
| `./_user/user_language.php`                      | Change language of website available in _HIVE_LANG_ | ❌ | ❌ |
| `./_user/user_login.php`                         | General Login script of the CMS. | ❌ | ❌ |
| `./_user/user_logout.php`                        | General Logout script of the CMS. | ❌ | ❌ |
| `./_user/user_mail_change.php`                   | General Mail Change Script of CMS. | ❌ | ❌ |
| `./_user/user_pass_change.php`                   | General User Password Change of CMS | ❌ | ❌ |
| `./_user/user_register.php`                      | General User Register Form of CMS | ❌ | ❌ |
| `./_user/user_recover.php`                       | General User Recover Form of CMS | ❌ | ❌ |
| `./_user/user_switch.php`                        | Switch between back and frontend of activated in cfgruleset.php | ❌ | ❌ |

## ./

| File/Folder  | Description | Public Access Denied | Persistent Changed | Auto-(Re)generated |
|-------------|----------------|-------|-------|-------|
| `./LICENSE.md` | Suitefish license file. | ❌ | ❌ | ❌ |
| `./README.md` | Folder readme file. | ❌ | ❌ | ❌ |
| `./index.php` | Main website and loader. | ❌ | ❌ | ❌ |
| `./update.php` | Update manager website. | ❌ | ❌ | ❌ |
| `./backup.php` | Backup manager website.  | ❌ | ❌ | ❌ |
| `./settings.php` | Backup manager website.  | ✅ | ✅ | ❌ |
| `./.htaccess` | HTAccess settings file. | ✅ | ✅ | ✅ |
| `./robots.txt` | Search engine robots file. | ✅ | ✅ | ✅ |
| `./cfg_ruleset.php` | May existing deployed ruleset file by developers or hosters. | ✅ | ❌ | ❌ |
| `./pkg.php` | May existing deployed ruleset file by product developers. | ✅ | ❌ | ❌ |
| `./backup.lock.php` | If backup is running this lockfile is in place. | ✅ | ❌ | ❌ |
| `./update.lock.php` | If update is running this lockfile is in place. | ✅ | ❌ | ❌ |
| `./maintenance.lock.php` | If server is in maintenance mode this lockfile is in place. | ✅ | ❌ | ❌ |
