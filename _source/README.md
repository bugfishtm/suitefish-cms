# 📁 Source Code

This folder contains the core source code for the project. It is the main directory where all the program logic, functionalities, and modules are organized and stored. All the essential components necessary to build and run the project can be found here.

The source code in this folder can be uploaded to a web server. After uploading, follow the installation instructions provided in the documentation to configure and deploy the application on the server.

**Interesting Files:**

- /pkg_sample.php: This file is intended for developers to set up the administrator module package and provide initial configuration defaults. For developer use only. 
- /cfg_ruleset_sample.php: Sample configuration file for developers to modify CMS settings. Rename to cfg_ruleset.php to apply changes. Check the file for configuration parameters. It is reommended to set this file up via the administrator interface.
- /upgrade.php: File to upgrade Administrator and Core CMS if logged in in Administrator Module. Only works together with the official administrator module.
- /developer.php: Files for developers to control site functionalities during development. More details are available in the documentation. 
- /index.php: Main index file to initialize the CMS and load the current website section.
- /installer.php: Installation script to set up the CMS on the web server and create the settings.php file if it does not exist.
- /robots.txt: Automatically created file for managing search engine robots. Changes to this file will be persistent.
- /.htaccess: Automatically created file for server configuration. Changes to this file will be persistent and include explanations for usable configurations.
- /settings.php: Created after a successful installation using installer.php or by manually editing and renaming settings_sample.php.
- /settings_sample.php: Sample settings file used if the installer fails to create settings.php. Manual changes are not required if using the default installer.
- /updater.php: Script for deploying site mode build updates. Further details can be found in the documentation.
- /cronjob.php: Folder with cronjob.php file. Run hourly. Set up during server installation.

Look inside the different Folders to find readme files with interesting information about these Folders. The frontpage code is stores in _site.

🐟 Bugfish 
