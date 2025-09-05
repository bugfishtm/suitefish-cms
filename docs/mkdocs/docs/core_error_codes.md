# Core-System - Error Codes

Information about various error codes of the core-backend.

---

## Core Errors

| Code  | Message |
|-------|---------|
| c0    | This CMS is not yet installed. Please install this CMS by visiting the website's root folder! |
| c1    | Misconfigured `$object['path']` in settings.php. Please check your configuration file. |
| c2    | Your settings.php file is corrupted or has not been included. |
| c3    | You are not allowed to include initialize.php twice. |
| c4    | You need PHP8.4 to run this software. |
| c5    | The document root is not writeable. Please set correct permission and ownerships for the website document root or correct `$object['path']` in settings.php. |
| c6    | Cronjob can only be executed via CLI. |
| c7    | Update Lock is in Place. |
| c8    | Backup Lock is in Place. |
| c9    | Maintenance Lock is in Place. |
| c10    | API-Error [c10]: Missing value for api_action. |
| c11    | API-Error [c11]: Missing value for api_endpoint. |
| c12    | API-Error [c12]: Missing value for api_mod. |
| c13    | API-Error [c13]: Request Site Module Endpoint does not have an API Folder. |
| c14    | API-Error [c14]: Request Site Module Endpoint does not exist. |
| c15    | API-Error [c15]: Request Site Module Extension Endpoint does not have an API Folder. |
| c16    | API-Error [c16]: Request Site Module Extension Endpoint does not exist. |
| c17    | API-Error [c17]: Request Site Module Endpoint does not exist. |
| c18    | API-Error [c18]: Site Module Versioning error on request. |
| c19 | API-Error [c19]: Site Module Extension Versioning error on request. | 

---

## Initialization Errors

| Code      | Message |
|-----------|---------|
| 000-001   | A PHP Module is missing. |
| 000-002   | A MySQL Database Connection could not be established. |
| 000-003   | This website is currently in maintenance mode! (Lockfile in root directory in place) |
| 000-004   | This website is currently doing backup work! (Lockfile in root directory in place) |
| 000-005   | This website is currently updating! (Lockfile in root directory in place) |
| 000-006   | A serious init error has occurred. The issue is related to the current active website module: `'_HIVE_MODE_'`. _HIVE_INTERNAL_INIT_ERROR_ |
| 000-007   | The Folder installed Site Module with RNAME: `'_HIVE_RNAME_'` on Site Modules Folder: `'_HIVE_MODE_'` does not match the database installed HIVE_RNAME_ACTIVE: `'_HIVE_RNAME_ACTIVE_'`. Please restore the previous site modules folder which has been in place and initialized, or delete Site Module RNAME and Version/Build Information off the database (not recommended). _HIVE_INTERNAL_RNAME_ERROR_ |
| 000-008   | The module files for `'_HIVE_MODE_'` appear to have been downgraded. Please reinstall the correct version: `'_HIVE_BUILD_ACTIVE_'` to avoid compatibility issues. _HIVE_INTERNAL_DOWNGRADE_ERROR_ |
| 000-009   | The module Build Version in the Database `[_HIVE_BUILD_ACTIVE_]` does not match the current Site Module Build `[_HIVE_BUILD_]`. Please visit the update page to update the module to the latest version here: [/updater.php](_HIVE_INTERNAL_UPDATE_REQ_) |
| 000-010   | A serious versioning error has occurred. The issue is related to the current active website module: `'_HIVE_MODE_'`. _HIVE_INTERNAL_VERSION_ERROR_ |
| 000-011   | A PHP Module is missing for site module. |
| 040-001   | Site Mode could not be determined by URL! |
| 040-002   | Site Module is missing, which has been overrided by Apache2 Environment Variables! |
| 040-003   | Error _HIVE_OVR_PRE_SETTING_MODE_ Set site module not available. |

