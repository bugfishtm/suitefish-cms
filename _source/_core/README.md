# 📁 Core Folder

**Information:**  

✅ Included in backup functionality.  
⚠️ Modified files in this folder will be overwritten during updates.  
⚠️ Check the subfolders table to see which folders are publicly accessible.  
❌ Do not manually modify or edit files unless you are a developer.  

**Folder Description:**  

The _core folder contains core code and will be overwritten during core updates. This folder houses Core System files and libraries to be used. In the table below you can see sub-folders of this folder. If the description includes "(public)" the folder is public accessible. If the description includes (hidden) the content is NOT public accessible.

**Sub-Folders:**  

| **File/Folder**                  | **Description**                                                                                                                                                                                                 |
|----------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `./_action`                      | Actions for various backend purposes.|
| `./_captcha`                     | Contains captcha images for inclusion; uses session variables for storing captcha tokens.                                                                                                                       |
| `./_error`                       | Default error templates for `.htaccess` and project integration, used as full-page templates for HTTP error codes.                                                                                              |
| `./_font`                        | Stores included font files; check licenses in documentation or `_licenses`.                                                                                                                                     |
| `./_framework`                   | Bugfish Framework files, included automatically during initialization via `javascript.php` and `stylesheet.php`.                                                                                                |
| `./_image`                       | Default JPG/PNG/ICO images used across CMS sections.                                                                                                                                                            |
| `./_lang`                        | Default language translation files loaded based on `_HIVE_LANG_`.                                                                                                                                               |
| `./_lib`                         | Core function library of the CMS, including different per function-sites and templates.                                                                                                                             |
| `./_licenses`                    | Library of included vendor licenses.                                                                                                                                                                           |
| `./_mysql`                       | Contains MySQL core system tables installed during site initialization as specified in `initialize.php`.                                                                                                        |
| `./_vendor`                      | Third-party scripts, functions, and templates for added functionalities or UX features; licenses are stored in `_licenses`.                                                                                     |
| `initialize.php`                 | Initializes site functionalities and includes variables referenced by `settings.php`.                                                                                                                           |
| `javascript.php`                 | JavaScript loader for framework, module, and extension-related scripts; include this file in your project's header as a standard JS script file.                                                                |
| `stylesheet.php`                 | CSS loader for framework, module, and extension-related stylesheets; include this file in your project's header as a standard CSS file.                                                                          |
| `version.php`                    | Contains versioning information for the core system.                                                                                                                                                            |
| `worker.php`                     | Background worker script. (See Documentation)                                                                                                                                                                                      |

**Documentation:**  

Most documentation for front-end users is located within the Administrator Module across various sections. Developers can access documentation at https://bugfishtm.github.io/suitefish-cms.

🐟 Bugfish