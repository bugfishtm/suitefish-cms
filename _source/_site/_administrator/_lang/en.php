<?php if(isset($this)) { if(!is_object($this)) { Header("Location: ../"); exit(); } } else { Header("Location: ../"); exit(); }
#		 ____  __  __  ___  ____  ____  ___  _   _ 
#		(  _ \(  )(  )/ __)( ___)(_  _)/ __)( )_( )
#		 ) _ < )(__)(( (_-. )__)  _)(_ \__ \ ) _ ( 
#		(____/(______)\___/(__)  (____)(___/(_) (_) www.bugfish.eu
#				 ___ _   _ ___ _____ ___ ___ ___ ___ _  _ 
#				/ __| | | |_ _|_   _| __| __|_ _/ __| || |
#				\__ \ |_| || |  | | | _|| _| | |\__ \ __ |
#				|___/\___/|___| |_| |___|_| |___|___/_||_|
#		Copyright (C) 2024 Jan Maurice Dahlmanns [Bugfish]
#
#		This program is free software: you can redistribute it and/or modify
#		it under the terms of the GNU General Public License as published by
#		the Free Software Foundation, either version 3 of the License, or
#		(at your option) any later version.
#
#		This program is distributed in the hope that it will be useful,
#		but WITHOUT ANY WARRANTY; without even the implied warranty of
#		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#		GNU General Public License for more details.
#
#		You should have received a copy of the GNU General Public License
#		along with this program.  If not, see <https://www.gnu.org/licenses/>. ?>

##########################################################################################################################################
# General 
##########################################################################################################################################


# Page - Deployment Area
#####################################################################
adm_nav_deploy_cms_descr=This section allows you to manage and deploy core updates essential for your CMS. If your instance is designated as a Store Server, other Suitefish-CMS store instances connected to it can check here for available updates. This ensures all connected instances are synchronized and up-to-date with the latest features and security patches.
adm_nav_deploy_software_descr=Here you can deploy software to be visible on the available software deployment site module page or via 3rd party software.
adm_nav_deploy_mod_descr=In this section of the CMS, users can deploy modules to their own store instances. These modules can then be distributed to other instances, provided those instances have the remote store URL specified in their ruleset.cfg file set to the current instance being viewed. This allows for seamless sharing and integration of modules across different store instances.

##########################################################################################################################################
# String Additions (may later be imported to the core language file)
##########################################################################################################################################
string_connect=Connect
string_operations=Operations
string_security=Security
string_inject=Inject

# General - Events
#####################################################################
event_operation_success=Operation completed successfully.  
event_uploaded=Created successfully.  
event_disabled=Disabled successfully.  
event_enable=Enabled successfully.  
event_installed=Installation successfull.  
event_deleted=Deletion successfull.  
event_csrf=The operation could not complete, because the form is expired. Please try again.  
event_tableflush=Table flushed.  
event_tabledelete=Table deleted. 
event_error=An error occurred while executing the operation.  
event_error_exists=A similar item already exists.  
event_error_filetype=Invalid file type provided.  

# General - PopUps
#####################################################################
adm_msg_item_delete_really=Do you realy want to delete this item?
adm_msg_item_flush_really=Do you realy want to flush this item?


##########################################################################################################################################
# Permissions 
##########################################################################################################################################


adm_perm-admin_upgrade=
adm_permd-admin_upgrade=

adm_perm-admin_admin=
adm_permd-admin_admin=

adm_perm-admin_package=
adm_permd-admin_package=

adm_perm-admin_docker=
adm_permd-admin_docker=

adm_perm-admin_object=
adm_permd-admin_object=

adm_perm-admin_page=
adm_permd-admin_page=



adm_perm-admin_deploy_cms=
adm_permd-admin_deploy_cms=

adm_perm-admin_deploy_software=
adm_permd-admin_deploy_software=

adm_perm-admin_deploy_module=
adm_permd-admin_deploy_module=



adm_perm-admin_file_list=
adm_permd-admin_file_list=

adm_perm-admin_file_public=
adm_permd-admin_file_public=

adm_perm-admin_file_private=
adm_permd-admin_file_private=

adm_perm-admin_file_php=
adm_permd-admin_file_php=

adm_perm-admin_file_css=
adm_permd-admin_file_css=

adm_perm-admin_file_js=
adm_permd-admin_file_js=



adm_perm-admin_user_user=
adm_permd-admin_user_user=

adm_perm-admin_user_field=
adm_permd-admin_user_field=

adm_perm-admin_user_group=
adm_permd-admin_user_group=

adm_perm-admin_user_session=
adm_permd-admin_user_session=

adm_perm-admin_user_superuser=
adm_permd-admin_user_superuser=



adm_perm-admin_system_setup=
adm_permd-admin_system_setup=

adm_perm-admin_system_translation=
adm_permd-admin_system_translation=

adm_perm-admin_system_mailtpl=
adm_permd-admin_system_mailtpl=

adm_perm-admin_system_blacklist=
adm_permd-admin_system_blacklist=

adm_perm-admin_system_api=
adm_permd-admin_system_api=

adm_perm-admin_system_info=
adm_permd-admin_system_info=




adm_perm-admin_developer_const=
adm_permd-admin_developer_const=

adm_perm-admin_developer_db=
adm_permd-admin_developer_db=

adm_perm-admin_developer_init=
adm_permd-admin_developer_init=

adm_perm-admin_developer_mysql=
adm_permd-admin_developer_mysql=

adm_perm-admin_developer_curl=
adm_permd-admin_developer_curl=

adm_perm-admin_developer_benchmark=
adm_permd-admin_developer_benchmark=

adm_perm-admin_developer_referer=
adm_permd-admin_developer_referer=

adm_perm-admin_developer_visits=
adm_permd-admin_developer_visits=

adm_perm-admin_developer_js=
adm_permd-admin_developer_js=

adm_perm-admin_developer_mail=
adm_permd-admin_developer_mail=

adm_perm-admin_developer_php=
adm_permd-admin_developer_php=

adm_perm-admin_developer_worker=
adm_permd-admin_developer_worker=

adm_perm-admin_developer_cron=
adm_permd-admin_developer_cron=

adm_perm-admin_developer_logging=
adm_permd-admin_developer_logging=



##########################################################################################################################################
# Permissions - API Related
##########################################################################################################################################
adm_perm-api_user=Full User Access
adm_permd-api_user=Grants access to all API functionalities related to user accounts.
adm_perm-api_page=Full Page Access
adm_permd-api_page=Grants access to all API functionalities related to custom pages.
adm_perm-api_object=Full Object Access
adm_permd-api_object=Grants access to all API functionalities related to custom objects and items.

##########################################################################################################################################
# Permissions - API User Related
##########################################################################################################################################
adm_perm-apiu_user_get=Full User Data Access
adm_permd-apiu_user_get=Grants full access to user data and all API functionalities specific to this user account.





adm_perm-api_user_list=User List
adm_permd-api_user_list=Get a list with information about all users in this system. The action related to this permission is: 'api_user_list'.
adm_perm-api_user_get=User Details
adm_permd-api_user_get=Get detailed information about a user. The action related to this permission is: 'api_user_get'.
adm_perm-api_page_list=Custom Page List
adm_permd-api_page_list=Get a list with information about all Custom Pages in this system. The action related to this permission is: 'api_page_list'.
adm_perm-api_page_get=Custom Page Details
adm_permd-api_page_get=Get detailed information about a Custom Page. The action related to this permission is: 'api_page_get'.
adm_perm-api_object_list=Custom Object List
adm_permd-api_object_list=Get a list with information about all Custom Objects in this system. The action related to this permission is: 'api_object_list'.
adm_perm-api_object_get=Custom Object Details
adm_permd-api_object_get=Get detailed information about a Custom Object. The action related to this permission is: 'api_object_get'.
adm_perm-api_object_item_list=Custom Object Item List
adm_permd-api_object_item_list=Get a list with information about all Custom Object Items in this system. The action related to this permission is: 'api_object_item_list'.
adm_perm-api_object_item_get=Custom Object Item Details
adm_permd-api_object_item_get=Get detailed information about a Custom Object Item. The action related to this permission is: 'api_object_item_get'.



adm_nav_system_api_exp=Securely manage API keys that grant access to both system-wide and module-specific services. This section enables you to generate, revoke, and monitor API keys, ensuring that only authorized applications and users can interact with your website’s backend and integrated modules.
adm_nav_system_mailtpl_exp=Manage Mail Templates for different Languages.
















##########################################################################################################################################
# Pages 
##########################################################################################################################################











# Page - System/*
#####################################################################
adm_nav_system_info_exp=View comprehensive information about the currently active site module as well as the underlying CMS core code and framework. This section provides detailed insights into version numbers, system status, and other technical details, helping administrators monitor the health and configuration of the website. 
adm_nav_system_setup_exp=Manage and customize the core configuration settings of your website in this section. Here, you can adjust general preferences, update essential site parameters, and tailor the system’s behavior to fit your specific needs. Take control of your website’s foundational setup to ensure optimal performance and user experience.
adm_nav_system_backlist_exp=Utilize this dedicated area to efficiently monitor, manage, and update the list of blacklisted IP addresses. By maintaining an up-to-date blacklist, you enhance your website’s security and gain greater control over unauthorized or suspicious access attempts. Blacklisting may occur automatically when users attempt to access the system with invalid API keys, repeatedly enter incorrect login credentials, or provide incorrect recovery keys during password recovery requests. Once an IP address is blacklisted, it is blocked from performing API operations and is prevented from using critical functions such as account recovery or login. This proactive approach helps to prevent unauthorized access and protects your website from potential security threats.
adm_nav_system_translation_exp=This page serves to overwrite and set up translations for this website. If a translation key starts with ___ext_[EXTENSIONNAME]_[TRANSLATEKEY], it will overwrite the translation of an extension. If a translation key starts with ___smd_[SITEMODFOLDERNAME]_[TRANSLATEKEY], it will overwrite the translation of site module content injected into the admin module. All other translations affect the currently viewed administrator module. Use this page to manage and customize language overrides effectively across different parts of the system.


# Page - Debugging/*
#####################################################################
adm_nav_developer_db_warn=Caution! This area is intended strictly for developers and should be used with great care. Making changes here-such as flushing or deleting tables-can result in irreversible data loss and cause critical system functionalities to break. Only proceed if you fully understand the implications of your actions. Unauthorized or careless use is strongly discouraged.
adm_nav_developer_db_descr=This page allows you to control and manage the currently connected database for the CMS system. Here, you can view information about different initialized tables, as well as perform actions such as flushing or deleting table data. This functionality is intended strictly for developers and should be used with extreme caution, as improper use can result in data loss or system instability. Access to this section should be restricted to administrative members with sufficient technical knowledge.
adm_nav_developer_const_exp=This page displays all configurable constants for the currently active website. It is intended primarily for developers, as it allows you to add, delete, or modify system setting and information keys directly. Use this section with caution-making incorrect changes here can disrupt or break the website’s functionality. This tool provides deep insights and adjustment capabilities, but should only be used by those with a thorough understanding of the system’s configuration.
adm_nav_developer_mysql_exp=This page provides access to MySQL error logs generated by the x_class_mysql class, which is the default database handler used throughout the entire CMS system. Here, you can review detailed records of any database errors or issues that have occurred during operation. This information is essential for monitoring, troubleshooting, and efficiently managing your website’s MySQL activities, helping you ensure stable and reliable database performance.
adm_nav_developer_init_exp=This page provides information about the system’s load process and lists the files that have been included specifically for the current administrator site module. It displays details about valid injection files and other relevant data related to the module’s operation. Please note that while there may be additional files present elsewhere in the system, only those files that are actively loaded by the administrator module will be shown here. Files not listed have not been loaded for this particular module session.
adm_nav_developer_referer_exp=This page displays a simple list of HTTP referers recorded for your website, showing where visitors are coming from when they access your pages. Because most modern browsers and privacy settings often block or hide referer information, the data available here may be limited. However, when referer details are provided and are not from local or known sources, they will appear in this section. This feature is primarily intended to give developers a quick overview of external sources linking to the site, though its usefulness depends on browser and user privacy settings.
adm_nav_developer_visits_exp=This section provides a straightforward overview of website activity by displaying the number of arrivals-meaning first-time visits-and page switches across your site. It offers developers a simple way to see how often different pages are accessed and used. This tracking feature is intended primarily for development and troubleshooting purposes, and can be deactivated in the code if necessary.
adm_nav_developer_curl_exp=This section provides access to detailed logs of Curl requests made by your website, allowing you to monitor and analyze Curl activity for debugging and performance purposes. Logging is only available for Curl operations performed using the x_class_curl PHP class, and will only be active if Curl logging is enabled in the website settings. If these conditions are met, you can review comprehensive records of outgoing Curl requests and their results here, helping you troubleshoot integration issues and track external communications initiated by your site.
adm_nav_developer_benchmark_exp=This section provides detailed information on website load times and the usage of different URLs, allowing you to identify potential performance issues and bottlenecks. By analyzing this data, you can better understand how your site is being accessed and pinpoint areas that may need optimization. The focus here is on technical insights rather than general visitor analytics, helping you ensure your website runs efficiently and reliably.
adm_nav_developer_js_exp=This section provides detailed logs of JavaScript errors to help you monitor and troubleshoot issues affecting your website’s frontend functionality. By reviewing these logs, you can quickly identify problems and maintain a smooth, error-free experience for your users. Please note that this functionality must be activated in the website settings for JavaScript error logging to be available.
adm_nav_developer_mail_exp=This section allows you to review and manage mail log entries related to your website’s communication activities. Here, you can view emails that were not sent successfully, along with any associated reports or debugging information. This helps you identify and resolve issues with outgoing messages, ensuring reliable email delivery and providing valuable insights for troubleshooting mail-related problems.
adm_nav_developer_php_exp=This page displays the most recent entries from the PHP error log in a table, allowing you to review and monitor system errors and issues as they occur. If needed, you can flush the log file to clear old entries and maintain a clearer overview of current problems. The PHP error log will be shown here if its path is properly configured in your cfg_ruleset.php settings; otherwise, the system will attempt to automatically determine the correct log file location. This ensures that you always have access to up-to-date error information, provided PHP logging is enabled and the file path is correctly set.
adm_nav_developer_worker_exp=This page displays logfile information for the system background worker when the software is running in server root level mode and the background worker is installed. Here, you can review logs and task protocols generated by the background daemon, providing insight into its ongoing operations and activities. If logfiles are not visible or the path differs from the default, you can configure the correct logfile path in the website settings. The path should correspond to the location specified in the suitefish.conf file used by Supervisor on your Unix system.
adm_nav_developer_cron_exp=This page provides detailed information about recent cronjob executions, including log files and the specific actions performed during each run. Every time the cronjob is executed, a new entry is created, allowing you to review the history and output of all automated tasks and file executions managed by the cronjob system. This helps you track scheduled operations and diagnose any issues related to automated processes on your website.
adm_nav_developer_logging_exp=This section provides access to a detailed logging area where you can review and monitor backend protocol data and activity logs for your website. Here, important events and performance information are recorded, offering valuable insights into the system’s operation. Some modules or extensions may write their own data to these logs, but the information presented is primarily intended for developers and technical users who need to troubleshoot, analyze, or optimize the site’s backend processes.

# Page - Notification Area
#####################################################################
adm_nav_alert_descr=Here you can view all notifications that contain important information and updates relevant to you. This section is designed to help ensure you do not overlook critical messages or alerts. You have the ability to delete notifications once you have reviewed them, allowing you to keep your notification area organized and focused only on the most current or relevant information.

# Page - Login Area
#####################################################################
adm_login_loggedin=You cannot access this site while logged in!  

# Page - Welcome
#####################################################################
adm_error_nochoose_title=Welcome!  
adm_error_nochoose_text=Welcome to your new Suitefish instance!  

# Page - Errors
#####################################################################
adm_error_404=Page Not Found  
adm_error_404_text=This page does not exist.  
adm_error_401=Access Denied  
adm_error_401_text=You do not have permission to view this page.  

##########################################################################################################################################
# Navigation 
##########################################################################################################################################

# Navigation - Headers
#####################################################################
adm_nav_h_owner=Owner Info
adm_nav_h_administrator=Administration
adm_nav_h_smods=Module
adm_nav_h_emods=Extension

# Navigation - Listing
#####################################################################
adm_nav_admin=Administration 
adm_nav_user=User Management 
adm_nav_user_user=Users
adm_nav_user_group=Groups
adm_nav_user_field=Fields  
adm_nav_user_session=Sessions  
adm_nav_file=File Management
adm_nav_file_list=List
adm_nav_file_public=Public Files
adm_nav_file_private=Private Files
adm_nav_file_php=PHP Endpoint  
adm_nav_file_css=Stylesheets  
adm_nav_file_js=Javascript  
adm_nav_page=Page Builder
adm_nav_object=Object Builder
adm_nav_docker=Docker Management
adm_nav_package=Package Management
adm_nav_package_store=Store   
adm_nav_package_upload=Upload  
adm_nav_package_site=Modules
adm_nav_package_image=Websites
adm_nav_package_extension=Extensions 
adm_nav_package_theme=Themes
adm_nav_package_docker=Docker
adm_nav_deploy=Deployment
adm_nav_deploy_cms=Core  
adm_nav_deploy_software=Software  
adm_nav_deploy_module=Modules  
adm_nav_developer=Debugging  
adm_nav_developer_const=Constants  
adm_nav_developer_db=Database  
adm_nav_developer_init=Initialization  
adm_nav_developer_mysql=MySQL  
adm_nav_developer_curl=CURL  
adm_nav_developer_benchmark=Benchmark  
adm_nav_developer_referer=Referer  
adm_nav_developer_visits=Visitors  
adm_nav_developer_js=JavaScript  
adm_nav_developer_mail=E-Mail  
adm_nav_developer_php=PHP
adm_nav_developer_worker=Daemon
adm_nav_developer_cron=Cronjob 
adm_nav_developer_logging=Logging
adm_nav_system=System 
adm_nav_system_setup=Settings  
adm_nav_system_translation=Translations  
adm_nav_system_mailtpl=E-Mail Templates  
adm_nav_system_blacklist=Blacklist  
adm_nav_system_api=API Access
adm_nav_system_info=Information  
adm_nav_impressum=Legal Notice  
adm_nav_privacy=Privacy 

##########################################################################################################################################
# Topbar 
##########################################################################################################################################
admin_top_t_notify_a=View Notifications  
admin_top_t_notify=Notifications  
admin_top_t_nolist=No items available!  
admin_top_t_cur=Current Selection  
admin_top_t_lang=Language  
admin_top_t_theme=Website Theme  
admin_top_t_themechange=Color Scheme  
admin_top_t_ident=User-ID  
admin_top_t_theme_changed=The website theme has been successfully updated!
admin_top_t_themesub_changed=The color scheme has been successfully updated!
admin_top_t_lang_changed=The website language has been updated!

##########################################################################################################################################
# Cookiebanner 
##########################################################################################################################################
adm_cb_text=This site uses session cookies for essential functionality!

##########################################################################################################################################
# Variable Explanations
##########################################################################################################################################
adm_var-_ADM_S_DEVELOPER_=Display the developer administration section?
adm_var-_ADM_S_DEPLOY_=Display the deployment administration section?
adm_var-_ADM_S_PACKAGE_=Display the package management section?
adm_var-_ADM_S_DOCKER_=Display the Docker management section?
adm_var-_ADM_S_PAGE_=Display the page management section?
adm_var-_ADM_S_OBJECT_=Display the object management section?
adm_var-_ADM_S_FILE_=Display the file management section?
adm_var-_ADM_S_USER_=Display the user management section?
adm_var-_ADM_S_IMPRESSUM_=Display the legal notice section?
adm_var-_ADM_S_PRIVACY_=Display the privacy policy section?
adm_var-_ADM_WORKER_LOG_LOG_=Absolute system path to the background daemon log file.
adm_var-_ADM_WORKER_LOG_ERROR_=Absolute system path to the background daemon error log file.
adm_var-_ADM_IMPRESSUM_=Legal notice information for your website.
adm_var-_ADM_PRIVACY_=Privacy policy information for your website.
adm_var-_ADM_FOOTER_=Footer text displayed on your website.
adm_var-_ADM_TH_TOPARROW_=Display a "Back to Top" button in the top bar?
adm_var-_ADM_TH_TOPLOGIN_=Display a login button in the top bar?
adm_var-_ADM_LANG_TB_=Display language selection in the top bar?
adm_var-_ADM_LANG_CHOOSE_=Allow users to choose their preferred language?
adm_var-_ADM_LANG_FORCE_=Force users to use the default language?
adm_var-_ADM_VMETA_ROBOT_=Enter default value for the "robots" meta tag (e.g., index, follow).
adm_var-_ADM_VMETA_LANGUAGE_=Enter default value for the "language" meta tag (e.g., en, de).
adm_var-_ADM_VMETA_AUTHOR_=Enter default value for the "author" meta tag (e.g., Site Name or Author).
adm_var-_ADM_VMETA_KEYWORD_=Enter default keywords, separated by commas.
adm_var-_ADM_VMETA_COPYRIGHT_=Enter default copyright information (e.g., © Year, Company).
adm_var-_ADM_TH_DEFAULT_=Select the default website theme.
adm_var-_ADM_TH_FORCE_=Force all users to use the default theme?
adm_var-_ADM_TH_CHOOSE_=Allow users to select their own theme?
adm_var-_ADM_TH_TB_=Display the theme switch button in the top bar?
adm_var-_ADM_COLOR_TB_=Display the theme color switch button in the top bar?
adm_var-_ADM_COLOR_CHOOSE_=Allow users to customize theme colors?
adm_var-_ADM_COLOR_FORCE_=Force the default theme color for all users?
adm_var-_ADM_COLOR_DEFAULT_=Set the default theme color.




