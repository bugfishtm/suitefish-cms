<?php
	/* 
		 ____  __  __  ___  ____  ____  ___  _   _ 
		(  _ \(  )(  )/ __)( ___)(_  _)/ __)( )_( )
		 ) _ < )(__)(( (_-. )__)  _)(_ \__ \ ) _ ( 
		(____/(______)\___/(__)  (____)(___/(_) (_) www.bugfish.eu
				 ___ _   _ ___ _____ ___ ___ ___ ___ _  _ 
				/ __| | | |_ _|_   _| __| __|_ _/ __| || |
				\__ \ |_| || |  | | | _|| _| | |\__ \ __ |
				|___/\___/|___| |_| |___|_| |___|___/_||_|
		Copyright (C) 2024 Jan Maurice Dahlmanns [Bugfish]

		This program is free software: you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation, either version 3 of the License, or
		(at your option) any later version.

		This program is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		GNU General Public License for more details.

		You should have received a copy of the GNU General Public License
		along with this program.  If not, see <https://www.gnu.org/licenses/>.
		File Description:
			- This File Configuration will be executed in the middle of configuration. 
			- See Documentation for Available Variables and Functionalities of this file!
			- You can find the Documentation at: https://bugfishtm.github.io/suitefish-cms/
			
	*/ if(!is_array(@$object)) { http_response_code(404); Header("Location: ../"); exit(); }
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Imported from config_pre.php because they are NON static
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/////////////////////////////////////////////////////////////////////////////
	## Enable User Sites
	/////////////////////////////////////////////////////////////////////////////
		# Enable Mail Change Page
		# define("_HIVE_ENABLESITE_MAILCHANGE_", 		false);
		$object["var"]->setup("_HIVE_ENABLESITE_MAILCHANGE_", 1, "hive_var-_HIVE_ENABLESITE_MAILCHANGE_");
		# Enable Password Change Page
		# define("_HIVE_ENABLESITE_PASSCHANGE_", 		true);
		$object["var"]->setup("_HIVE_ENABLESITE_PASSCHANGE_", 1, "hive_var-_HIVE_ENABLESITE_PASSCHANGE_");
		# Enable Recover Password Page
		# define("_HIVE_ENABLESITE_RECOVER_", 			false);
		$object["var"]->setup("_HIVE_ENABLESITE_RECOVER_", 1, "hive_var-_HIVE_ENABLESITE_RECOVER_");
		# Enable Login Page
		# define("_HIVE_ENABLESITE_LOGIN_", 			true);
		$object["var"]->setup("_HIVE_ENABLESITE_LOGIN_", 1, "hive_var-_HIVE_ENABLESITE_LOGIN_");
		# Enable Logout Page
		# define("_HIVE_ENABLESITE_LOGOUT_", 			true);
		$object["var"]->setup("_HIVE_ENABLESITE_LOGOUT_", 1, "hive_var-_HIVE_ENABLESITE_LOGOUT_");
		# Enable Register Page
		# define("_HIVE_ENABLESITE_REGISTER_", 			false);
		$object["var"]->setup("_HIVE_ENABLESITE_REGISTER_", 1, "hive_var-_HIVE_ENABLESITE_REGISTER_");
		# Enable Language Change Page
		# define("_HIVE_ENABLESITE_LANGCHANGE_", 		true);
		$object["var"]->setup("_HIVE_ENABLESITE_LANGCHANGE_", 1, "hive_var-_HIVE_ENABLESITE_LANGCHANGE_");
		# Enable Modeswitch Page
		# define("_HIVE_ENABLESITE_MODESWITCH_", 		true);
		$object["var"]->setup("_HIVE_ENABLESITE_MODESWITCH_", 1, "hive_var-_HIVE_ENABLESITE_MODESWITCH_");
		# Enable 2FA Page
		# define("_HIVE_ENABLESITE_2FA_", 				true);
		$object["var"]->setup("_HIVE_ENABLESITE_2FA_", 1, "hive_var-_HIVE_ENABLESITE_2FA_");
		# Enable Activation Page
		# define("_HIVE_ENABLESITE_ACTIVATE_", 			false);
		$object["var"]->setup("_HIVE_ENABLESITE_ACTIVATE_", 1, "hive_var-_HIVE_ENABLESITE_ACTIVATE_");

	/////////////////////////////////////////////////////////////////////////////
	## Language Settings
	/////////////////////////////////////////////////////////////////////////////
		# Array with Default Language
		// define("_HIVE_LANG_DEFAULT_", 			"en"); 
		$object["var"]->setup("_HIVE_LANG_DEFAULT_", "en", "hive_var-_HIVE_LANG_DEFAULT_");
		
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Default config.php setup
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		

	/////////////////////////////////////////////////////////////////////////////
	## Redis Settings
	/////////////////////////////////////////////////////////////////////////////
		# Redis Activated? False/True
		//define("_REDIS_", 				false); 
		$object["var"]->setup("_REDIS_", 0, "hive_var-_REDIS_");
		# Redis Host
		//define("_REDIS_HOST_", 			"localhost"); 
		$object["var"]->setup("_REDIS_HOST_", "localhost", "hive_var-_REDIS_HOST_");
		# Redis Port
		//define("_REDIS_PORT_", 			6379); 
		$object["var"]->setup("_REDIS_PORT_", "6379", "hive_var-_REDIS_PORT_");
		
	/////////////////////////////////////////////////////////////////////////////
	## Mail Settings
	/////////////////////////////////////////////////////////////////////////////
		# Default Header for Mails
		//define("_SMTP_MAILS_HEADER_", 	'<!doctype html><html><head><meta name="viewport" content="width=device-width, initial-scale=1.0"/><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><style>body { background-color: #121212; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; } .content { background: #FFFFFF; box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px; border-radius: 5px; margin-top: 15px;  }  .footer { clear: both; margin-top: 10px; text-align: center; width: 100%; color: #000000; font-size: 12px; text-align: center;  }  h1, h2, h3, h4 { color: #000000; font-family: sans-serif; font-weight: 400; line-height: 1.4; margin: 0; margin-bottom: 30px; }  h1 { font-size: 35px; font-weight: 300; text-align: center; text-transform: capitalize; }  a { color: blue; text-decoration: none; } hr { border: 0; border-bottom: 1px solid #242424; margin: 20px 0; }  @media only screen and (max-width: 620px) { div.content { margin-top: 2vw !important; margin-left: 2vw !important; margin-right: 2vw !important;}} a:hover { color: black; } .alert { padding: 15px; margin: 5px; border-radius: 5px; } .alert-danger { background: #FFCDD2; } .alert-success { background: #A5D6A7; } .alert-warning { background: #FFF9C4; }</style></head><body><div class="content">'); 
		$object["var"]->setup("_SMTP_MAILS_HEADER_", '<!doctype html><html><head><meta name="viewport" content="width=device-width, initial-scale=1.0"/><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><style>body { background-color: #121212; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; } .content { background: #FFFFFF; box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px; border-radius: 5px; margin-top: 15px;  }  .footer { clear: both; margin-top: 10px; text-align: center; width: 100%; color: #000000; font-size: 12px; text-align: center;  }  h1, h2, h3, h4 { color: #000000; font-family: sans-serif; font-weight: 400; line-height: 1.4; margin: 0; margin-bottom: 30px; }  h1 { font-size: 35px; font-weight: 300; text-align: center; text-transform: capitalize; }  a { color: blue; text-decoration: none; } hr { border: 0; border-bottom: 1px solid #242424; margin: 20px 0; }  @media only screen and (max-width: 620px) { div.content { margin-top: 2vw !important; margin-left: 2vw !important; margin-right: 2vw !important;}} a:hover { color: black; } .alert { padding: 15px; margin: 5px; border-radius: 5px; } .alert-danger { background: #FFCDD2; } .alert-success { background: #A5D6A7; } .alert-warning { background: #FFF9C4; }</style></head><body><div class="content">', "hive_var-_SMTP_MAILS_HEADER_");
		# Default Footer for Mails
		//define("_SMTP_MAILS_FOOTER_", 	'</div></body></html>'); 
		$object["var"]->setup("_SMTP_MAILS_FOOTER_", "</div></body></html>", "hive_var-_SMTP_MAILS_FOOTER_");
		# Default Sender Mail Adr
		//define("_SMTP_SENDER_MAIL_", 		false);
		$object["var"]->setup("_SMTP_SENDER_MAIL_", "admin@admin.local", "hive_var-_SMTP_SENDER_MAIL_");
		# Default Sender Mail Name
		//define("_SMTP_SENDER_NAME_", 		false);
		$object["var"]->setup("_SMTP_SENDER_NAME_", "admin@admin.local", "hive_var-_SMTP_SENDER_NAME_");
		# All Mails sended as HTML? (false/true)
		//define("_SMTP_MAILS_IN_HTML_", 	true); 
		$object["var"]->setup("_SMTP_MAILS_IN_HTML_", 1, "hive_var-_SMTP_MAILS_IN_HTML_");
		# Allow insecure SSL Connections? (true/false)
		//define("_SMTP_INSECURE_", 		true); 
		$object["var"]->setup("_SMTP_INSECURE_", 1, "hive_var-_SMTP_INSECURE_");
		# Mail Debug Mode (0, 1, 2, 3) - Use 0 for Production as this will result Debug Output on site!
		//define("_SMTP_DEBUG_", 			0); 
		$object["var"]->setup("_SMTP_DEBUG_", 0, "hive_var-_SMTP_DEBUG_");
		# SMTP Host 
		//define("_SMTP_HOST_", 			false); 
		$object["var"]->setup("_SMTP_HOST_", "localhost", "hive_var-_SMTP_HOST_");
		# SMTP Port 
		//define("_SMTP_PORT_", 			false); 
		$object["var"]->setup("_SMTP_PORT_", 587, "hive_var-_SMTP_PORT_");
		# SMTP Auth (ssl/tls/false) 
		//define("_SMTP_AUTH_", 			false); 
		$object["var"]->setup("_SMTP_AUTH_", "ssl", "hive_var-_SMTP_AUTH_");
		# SMTP Username 
		//define("_SMTP_USER_", 			false); 
		$object["var"]->setup("_SMTP_USER_", "username", "hive_var-_SMTP_USER_");
		# SMTP Password 
		//define("_SMTP_PASS_", 			false); 	
		$object["var"]->setup("_SMTP_PASS_", "password", "hive_var-_SMTP_PASS_");	
		
	/////////////////////////////////////////////////////////////////////////////
	## User Settings (If using Users Class Module)
	/////////////////////////////////////////////////////////////////////////////	
		# Maximum Days Sessions/Cookies are Valid
		//define("_USER_MAX_SESSION_", 		7); 
		$object["var"]->setup("_USER_MAX_SESSION_", 7, "hive_var-_USER_MAX_SESSION_");	
		# Time in Minutes token out of Activation Mails are Valid
		//define("_USER_TOKEN_TIME_", 		600); 
		$object["var"]->setup("_USER_TOKEN_TIME_", 600, "hive_var-_USER_TOKEN_TIME_");	
		# Block Users after X Fail Logins (can be false)
		//define("_USER_AUTOBLOCK_", 		1200); 
		$object["var"]->setup("_USER_AUTOBLOCK_", 0, "hive_var-_USER_AUTOBLOCK_");	
		# Time in Minutes User has to wait between Requests (anti flood)
		//define("_USER_WAIT_COUNTER_", 	120); 
		$object["var"]->setup("_USER_WAIT_COUNTER_", 120, "hive_var-_USER_WAIT_COUNTER_");	
		# Log old sessions? (Logins, Recoverys, Activations, Mail Changes) (true/false)
		//define("_USER_LOG_SESSIONS_", 	true); 
		$object["var"]->setup("_USER_LOG_SESSIONS_", 1, "hive_var-_USER_LOG_SESSIONS_");	
		# Log User IPs in Database (true/false)
		//define("_USER_LOG_IP_", 			false); 
		$object["var"]->setup("_USER_LOG_IP_", 0, "hive_var-_USER_LOG_IP_");	
		# Passwordfilter: Min Signs
		//define("_USER_PF_SIGNS_", 		7); 
		$object["var"]->setup("_USER_PF_SIGNS_", 7, "hive_var-_USER_PF_SIGNS_");	
		# Passwordfilter: Min Capital Signs
		//define("_USER_PF_CAPSIGNS_", 		1); 
		$object["var"]->setup("_USER_PF_CAPSIGNS_", 1, "hive_var-_USER_PF_CAPSIGNS_");	
		# Passwordfilter: Min Small Signs
		//define("_USER_PF_SMSIGNS_", 		1); 
		$object["var"]->setup("_USER_PF_SMSIGNS_", 1, "hive_var-_USER_PF_SMSIGNS_");	
		# Passwordfilter: Min Special Signs
		//define("_USER_PF_SPSIGNS_", 		0); 
		$object["var"]->setup("_USER_PF_SPSIGNS_", 0, "hive_var-_USER_PF_SPSIGNS_");	
		# Passwordfilter: Min Numeric Signs
		//define("_USER_PF_NUMSIGNS_", 		1); 
		$object["var"]->setup("_USER_PF_NUMSIGNS_", 1, "hive_var-_USER_PF_NUMSIGNS_");	
		
	/////////////////////////////////////////////////////////////////////////////
	## Updater Script Settings
	/////////////////////////////////////////////////////////////////////////////
		// Code needed for Update? (can be false)	
		//define("_UPDATER_CODE_", 			false); 	
		$object["var"]->setup("_UPDATER_CODE_", "", "hive_var-_UPDATER_CODE_");		

	/////////////////////////////////////////////////////////////////////////////
	## Additional Functionalities Setup
	/////////////////////////////////////////////////////////////////////////////
		# Log CURL Class Requests? (true/false)
		//define("_HIVE_CURL_LOGGING_", 	false); 
		$object["var"]->setup("_HIVE_CURL_LOGGING_", 1, "hive_var-_HIVE_CURL_LOGGING_");
		# Block IPs after X Failures
		//define("_HIVE_IP_LIMIT_", 		100000); 
		$object["var"]->setup("_HIVE_IP_LIMIT_", 100000, "hive_var-_HIVE_IP_LIMIT_");
		# Log Referers? (true/false)
		//define("_HIVE_REFERER_", 			false); 
		$object["var"]->setup("_HIVE_REFERER_", 1, "hive_var-_HIVE_REFERER_");
		# Default CSRF Code Valid Time in Seconds	
		//define('_HIVE_CSRF_TIME_',  		1200); 
		$object["var"]->setup("_HIVE_CSRF_TIME_", 1200, "hive_var-_HIVE_CSRF_TIME_");
		# Activate Javascript Debugging Script
		// define('_HIVE_JS_ACTION_ACTIVE_',true);  
		$object["var"]->setup("_HIVE_JS_ACTION_ACTIVE_", 0, "hive_var-_HIVE_JS_ACTION_ACTIVE_");		
		
	/////////////////////////////////////////////////////////////////////////////
	## Website Settings
	/////////////////////////////////////////////////////////////////////////////
		# Website Title for Tabs and More
		//define('_HIVE_TITLE_',  			"CMS"); 
		$object["var"]->setup("_HIVE_TITLE_", "CMS", "hive_var-_HIVE_TITLE_");
		# Title Spacer for Tabs in Browser
		//define('_HIVE_TITLE_SPACER_',  	" - "); 
		$object["var"]->setup("_HIVE_TITLE_SPACER_", " - ", "hive_var-_HIVE_TITLE_SPACER_");
		# Show PHP Errors on website? (true/false)
		//define('_HIVE_PHP_DEBUG_',  		false); 
		$object["var"]->setup("_HIVE_PHP_DEBUG_", 0, "hive_var-_HIVE_PHP_DEBUG_");
		# Stop and Show MySQL Errors on Page if Happening? (Will always be logged in x_log_mysql table!) (true/false)
		//define('_HIVE_MYSQL_DEBUG_',  	false); 	
		$object["var"]->setup("_HIVE_MYSQL_DEBUG_", 0, "hive_var-_HIVE_MYSQL_DEBUG_");		

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Administrator Module Related - Setupable
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	/////////////////////////////////////////////////////////////////////////////
	## Visibility Variables
	/////////////////////////////////////////////////////////////////////////////	
	$object["var"]->setup("_ADM_S_IMPRESSUM_", "1", "adm_var-_ADM_S_IMPRESSUM_");	
	$object["var"]->setup("_ADM_S_PRIVACY_", "1", "adm_var-_ADM_S_PRIVACY_");	
	$object["var"]->setup("_ADM_S_DEVELOPER_", "1", "adm_var-_ADM_S_DEVELOPER_");	
	$object["var"]->setup("_ADM_S_DEPLOY_", "1", "adm_var-_ADM_S_DEPLOY_");	
	$object["var"]->setup("_ADM_S_PACKAGE_", "1", "adm_var-_ADM_S_PACKAGE_");	
	$object["var"]->setup("_ADM_S_DOCKER_", "1", "adm_var-_ADM_S_DOCKER_");	
	$object["var"]->setup("_ADM_S_PAGE_", "1", "adm_var-_ADM_S_PAGE_");	
	$object["var"]->setup("_ADM_S_OBJECT_", "1", "adm_var-_ADM_S_OBJECT_");	
	$object["var"]->setup("_ADM_S_FILE_", "1", "adm_var-_ADM_S_FILE_");	
	$object["var"]->setup("_ADM_S_USER_", "1", "adm_var-_ADM_S_USER_");	

	/////////////////////////////////////////////////////////////////////////////
	## Content Variables
	/////////////////////////////////////////////////////////////////////////////	
	$object["var"]->setup("_ADM_IMPRESSUM_", "Please add your legal notice text here!", "adm_var-_ADM_IMPRESSUM_");		
	$object["var"]->setup("_ADM_PRIVACY_", "Please add your privacy notice text here!", "adm_var-_ADM_PRIVACY_");		
	$object["var"]->setup("_ADM_FOOTER_", "Powered by Suitefish-CMS", "adm_var-_ADM_FOOTER_");		
	
	/////////////////////////////////////////////////////////////////////////////
	## Theme Variables
	/////////////////////////////////////////////////////////////////////////////		
	$object["var"]->setup("_ADM_TH_DEFAULT_", "adminbsb", "adm_var-_ADM_TH_DEFAULT_");		
	$object["var"]->setup("_ADM_TH_FORCE_", "0", "adm_var-_ADM_TH_FORCE_");		
	$object["var"]->setup("_ADM_TH_CHOOSE_", "1", "adm_var-_ADM_TH_CHOOSE_");		
	$object["var"]->setup("_ADM_TH_TB_", "1", "adm_var-_ADM_TH_TB_");		
	$object["var"]->setup("_ADM_COLOR_DEFAULT_", "deep-orange", "adm_var-_ADM_COLOR_DEFAULT_");	
	$object["var"]->setup("_ADM_COLOR_FORCE_", "0", "adm_var-_ADM_COLOR_FORCE_");		
	$object["var"]->setup("_ADM_COLOR_CHOOSE_", "1", "adm_var-_ADM_COLOR_CHOOSE_");		
	$object["var"]->setup("_ADM_COLOR_TB_", "1", "adm_var-_ADM_COLOR_TB_");		

	/////////////////////////////////////////////////////////////////////////////
	## Developer Variables
	/////////////////////////////////////////////////////////////////////////////	
	$object["var"]->setup("_ADM_WORKER_LOG_LOG_", "/var/log/suitefish_log.log", "adm_var-_ADM_WORKER_LOG_LOG_");		
	$object["var"]->setup("_ADM_WORKER_LOG_ERROR_", "/var/log/suitefish_error.log", "adm_var-_ADM_WORKER_LOG_ERROR_");		
	
	/////////////////////////////////////////////////////////////////////////////
	## Website Variables
	/////////////////////////////////////////////////////////////////////////////	
	$object["var"]->setup("_ADM_TH_TOPARROW_", "1", "adm_var-_ADM_TH_TOPARROW_");		
	$object["var"]->setup("_ADM_TH_TOPLOGIN_", "1", "adm_var-_ADM_TH_TOPLOGIN_");	
	
	/////////////////////////////////////////////////////////////////////////////
	## Language Variables
	/////////////////////////////////////////////////////////////////////////////		
	$object["var"]->setup("_ADM_LANG_CHOOSE_", "1", "adm_var-_ADM_LANG_CHOOSE_");	
	$object["var"]->setup("_ADM_LANG_FORCE_", "0", "adm_var-_ADM_LANG_FORCE_");		
	$object["var"]->setup("_ADM_LANG_TB_", "1", "adm_var-_ADM_LANG_TB_");
	
	/////////////////////////////////////////////////////////////////////////////
	## Meta Variables
	/////////////////////////////////////////////////////////////////////////////	
	$object["var"]->setup("_ADM_VMETA_ROBOT_", "", "adm_var-_ADM_VMETA_ROBOT_");
	$object["var"]->setup("_ADM_VMETA_LANGUAGE_", "", "adm_var-_ADM_VMETA_LANGUAGE_");
	$object["var"]->setup("_ADM_VMETA_AUTHOR_", "", "adm_var-_ADM_VMETA_AUTHOR_");
	$object["var"]->setup("_ADM_VMETA_KEYWORD_", "", "adm_var-_ADM_VMETA_KEYWORD_");
	$object["var"]->setup("_ADM_VMETA_COPYRIGHT_", "", "adm_var-_ADM_VMETA_COPYRIGHT_");