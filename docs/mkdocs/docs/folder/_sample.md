# 📁 Sample Folder

**Information:**  

✅ Included in backup functionality.  
⚠️ Modified files in this folder will be overwritten during updates.  
❌ Do not manually modify or edit files unless you are a developer.  
❌ Files in this folder are not accessible via public links.  

**Folder Description:**  

This folder contains configuration files for developers and users to set up and move into the website's root directory. After setup, move all files to the root directory and remove the _sample extension to make them recognizable by the CMS. For security, delete unused sample files after configuration.

**Sub Folders:**  

| **File Name** | **Description**| **Target Audience**|
|----------------|------------------------|------------------------|
| **settings_sample.php**  | An example of a `settings.php` file in case the on-page installer does fail. | Everyone |
| **pkg_sample.php** | Set up the administrator module packages and provide default configuration settings for different product instances.  | Developers |
| **cfg_ruleset_sample.php** | Use this file to modify primary CMS functionalities, such as site module determination. | Developers |
| **maintenance.lock.php** | If this file is present in the websites root directory the website is in full maintenance mode. | Developers |
| **backup.lock.php** | If this file is present in the websites root directory the website is in full backup mode. | Developers |
| **update.lock.php** | If this file is present in the websites root directory the website is in full update mode. | Developers |

**Documentation:**  

Most documentation for front-end users is located within the Administrator Module across various sections. Developers can access internal documentation at /_core/_documentation/extra-cms/index.html. Open this file in a web browser to view the developer-specific resources.

🐟 Bugfish
