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

# General - Errors
#####################################################################
adm_error_404=Page Not Found  
adm_error_404_text=This page does not exist.  
adm_error_401=Access Denied  
adm_error_401_text=You do not have permission to view this page.  

# General - Cookiebanner
#####################################################################
adm_cb_text=This site uses session cookies for essential functionality!

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
# Pages 
##########################################################################################################################################

# Page - Deployment Area
#####################################################################
adm_nav_deploy_cms_descr=This section allows you to manage and deploy core updates essential for your CMS. If your instance is designated as a Store Server, other Suitefish-CMS store instances connected to it can check here for available updates. This ensures all connected instances are synchronized and up-to-date with the latest features and security patches.
adm_nav_deploy_software_descr=Here you can deploy software to be visible on the available software deployment site module page or via 3rd party software.
adm_nav_deploy_mod_descr=In this section of the CMS, users can deploy modules to their own store instances. These modules can then be distributed to other instances, provided those instances have the remote store URL specified in their ruleset.cfg file set to the current instance being viewed. This allows for seamless sharing and integration of modules across different store instances.

# Page - Developer / Debugging Area
#####################################################################
adm_nav_developer_const_exp=Here you can see all available constants to be configured for the currently activate website.
adm_nav_developer_db_warn=Caution! Be very careful while using this area, only developers should act here. If you flush or delete the wrong table you WILL experience data loss and break of functionalities.
adm_nav_developer_db_descr=Control the current connected Database for this CMS System. You can flush, delete and get information about different initialized tables.
adm_nav_developer_init_exp=Here you can see information about the system loadup and included files.
adm_nav_developer_mysql_exp=Access and analyze MySQL logging data in this dedicated section to gain detailed insights into database activities, ensuring efficient monitoring and management of your website's MySQL operations.
adm_nav_developer_curl_exp=Gain detailed insights into Curl logging activities on your website with comprehensive logs and data available in this dedicated section, enabling efficient monitoring and analysis.
adm_nav_developer_benchmark_exp=Access the benchmark page to gauge and analyze performance metrics, empowering informed decision-making for your website's optimization.
adm_nav_developer_referer_exp=Analyze and track referral sources with detailed referer log entries in this dedicated section, enhancing your website's insights into visitor origins and interactions.
adm_nav_developer_visits_exp=Track and analyze website visits with comprehensive data and insights in this dedicated section, empowering you to understand user behavior and optimize site performance.
adm_nav_developer_js_exp=Monitor and troubleshoot JavaScript errors effectively with detailed logging available in this dedicated section, empowering you to maintain a smooth and error-free website experience for users.
adm_nav_developer_mail_exp=Review and manage mail log entries for your website's communication activities in this dedicated section.
adm_nav_developer_php_exp=Get last PHP Error Log entries in a table and flush the file for better overview if necessary.
adm_nav_developer_worker_exp=Get Logfile information of the system background worker on root level.
adm_nav_developer_cron_exp=Get informations about the last cronjob executions and the detailed output of what has been done.
adm_nav_developer_logging_exp=Explore the comprehensive logging area to review and monitor detailed activity and performance logs for your website.

# Page - System Area
#####################################################################
adm_nav_system_setup_exp=Here you can change setings of this website.
adm_nav_system_translation_exp=This pages serves to overwrite and setup translations for this website.
adm_nav_system_mailtpl_exp=Manage Mail Templates for different Languages.
adm_nav_system_backlist_exp=Effectively manage and monitor IP blacklists to ensure enhanced security and control over unauthorized access in this dedicated section.
adm_nav_system_api_exp=Manage API keys for accessing system and module-level services securely.
adm_nav_system_info_exp=Here you can see information about the current visible site module and the CMS Core Code and Framework.

# Page - Notification Area
#####################################################################
adm_nav_alert_descr=Here you can see notifications which contain information for you.

# Page - Login Area
#####################################################################
adm_login_loggedin=You cannot access this site while logged in!  

# Page - Welcome
#####################################################################
adm_error_nochoose_title=Welcome!  
adm_error_nochoose_text=Welcome to your new Suitefish instance!  

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
admin_top_t_ident=Identity Verification  
admin_top_t_theme_changed=Website Theme updated!  
admin_top_t_themesub_changed=Color Scheme updated!  
admin_top_t_lang_changed=Language updated!

##########################################################################################################################################
# Permissions 
##########################################################################################################################################

# Permissions - API
#####################################################################
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

##########################################################################################################################################
# Setup Explanations - Adiministrator Module
##########################################################################################################################################
adm_var-_ADM_WORKER_LOG_LOG_=Absolute system path of the background daemon logfile.	
adm_var-_ADM_WORKER_LOG_ERROR_=Absolute system path of the background daemon error logfile.	
adm_var-_ADM_S_IMPRESSUM_=Show legal notice area?
adm_var-_ADM_S_PRIVACY_=Show privacy notice area?
adm_var-_ADM_S_DEVELOPER_=Show developer administration area?
adm_var-_ADM_S_DEPLOY_=Show deployment administration area?
adm_var-_ADM_S_PACKAGE_=Show package administration area?
adm_var-_ADM_S_DOCKER_=Show docker administration area?
adm_var-_ADM_S_PAGE_=Show page administration area?
adm_var-_ADM_S_OBJECT_=Show object administration area?
adm_var-_ADM_S_FILE_=Show file administration area?
adm_var-_ADM_S_USER_=Show user administration area?
adm_var-_ADM_IMPRESSUM_=Legal notice of your website.
adm_var-_ADM_PRIVACY_=Privacy notice of your website.		
adm_var-_ADM_FOOTER_=Footer text of your website.
adm_var-_ADM_TH_DEFAULT_=Default Theme.	
adm_var-_ADM_TH_FORCE_=Force Default Theme?
adm_var-_ADM_TH_CHOOSE_=Allow users to change the theme?		
adm_var-_ADM_TH_TB_=Show theme change button in top bar?
adm_var-_ADM_TH_TOPARROW_=Show Back to Top button in top bar?	
adm_var-_ADM_TH_TOPLOGIN_=Show login button in top bar?		
adm_var-_ADM_LANG_CHOOSE_=Allow users to select a language?
adm_var-_ADM_LANG_TB_=Show language selection in top bar?
adm_var-_ADM_COLOR_CHOOSE_=Allow users to customize theme colors?
adm_var-_ADM_COLOR_TB_=Show theme color change button in top bar?
adm_var-_ADM_COLOR_DEFAULT_=Default theme color for AdminBSB theme.	
adm_var-_ADM_FIRST_SETUP_=Has the frontend setup process been completed?
adm_var-_ADM_ALLOW_UPGRADE_=Allow system upgrades of the cms or site modules?

