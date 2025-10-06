<?php if(isset($this)) { if(!is_object($this)) { Header("Location: ../"); exit(); } } else { Header("Location: ../"); exit(); }
#	 ░▒▓███████▓▒░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░▒▓████████▓▒░▒▓████████▓▒░▒▓████████▓▒░▒▓█▓▒░░▒▓███████▓▒░▒▓█▓▒░░▒▓█▓▒░ 
#	░▒▓█▓▒░      ░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░▒▓█▓▒░      ░▒▓█▓▒░░▒▓█▓▒░ 
#	░▒▓█▓▒░      ░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░▒▓█▓▒░      ░▒▓█▓▒░░▒▓█▓▒░ 
#	 ░▒▓██████▓▒░░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓██████▓▒░ ░▒▓██████▓▒░ ░▒▓█▓▒░░▒▓██████▓▒░░▒▓████████▓▒░ 
#		   ░▒▓█▓▒░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░▒▓█▓▒░░▒▓█▓▒░ 
#		   ░▒▓█▓▒░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░▒▓█▓▒░░▒▓█▓▒░ 
#	░▒▓███████▓▒░ ░▒▓██████▓▒░░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓████████▓▒░▒▓█▓▒░      ░▒▓█▓▒░▒▓███████▓▒░░▒▓█▓▒░░▒▓█▓▒░ 
	
#	Copyright (C) 2025 Jan Maurice Dahlmanns [Bugfish]

#	This program is free software: you can redistribute it and/or modify
#	it under the terms of the GNU General Public License as published by
#	the Free Software Foundation, either version 3 of the License, or
#	(at your option) any later version.

#	This program is distributed in the hope that it will be useful,
#	but WITHOUT ANY WARRANTY; without even the implied warranty of
#	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#	GNU General Public License for more details.

#	You should have received a copy of the GNU General Public License
#	along with this program.  If not, see <https://www.gnu.org/licenses/>. ?>
##########################################################################################
## Backend Default Language Overrides for Login Scripts
##########################################################################################

# Page - Actions
hive_login_changelanguage=You can change the language
hive_login_changelanguage_here=here.
hive_login_lostpass=Lost Password?
hive_login_notregistered=Not Registered?
hive_login_rememberme=Use Cookies?
hive_login_recoveraccount=Recover Account
hive_login_haveaccount=Already Have an Account?
hive_login_password_confirm=Confirm Password
hive_login_mc_change_mail=Change E-Mail
hive_login_mc_backtohome=Back to Home
hive_login_title_accactivation=Account Activation
hive_cannotenterwhilenologin=You cannot enter this page if you are not logged in!
hive_cannotenterwhilelogin=You cannot enter this page if you are logged in!
hive_cannotoperatesiteerror=There is an critical error on this site module, so you are currently not able to execute any operation!
hive_login_backtologin=Back to Login
hive_login_change_Lang=Change Language
hive_login_language_changed=The Language has been changed!

# Login Events - General
hive_login_msg_l_wrong=Wrong Password/E-Mail combination.
hive_login_msg_csrf=Form expired, please try again.
hive_login_msg_empty=Please enter the required data!
hive_login_msg_ipban=Your IP is currently blocked; please try again later.
hive_login_msg_logout=You have been logged out!
hive_login_msg_nomatchpass=Password confirmation does not match the entered password.
hive_login_doremember=Do you want to remember your password?

# Login Events - Login
hive_login_msg_l_ok=Login successful.
hive_login_msg_l_blocked=You cannot login because your account is blocked.
hive_login_msg_l_inactive=Your user account is not yet activated! Recover your password to activate your account or click the URL in the activation E-Mail you received!
hive_login_msg_l_blockedpwf=You have entered the wrong password too many times, and your account has been blocked!
hive_login_msg_l_disabled=Your user account has been disabled!
hive_login_mail_serror=Error while trying to send E-Mail. This is an internal error that needs to be investigated and should be reported to our website's staff.
hive_login_msg_register_ok=Please check your E-Mail inbox to activate your new account!
hive_login_msg_passfiltererror=The entered password does not meet the password rules!
hive_login_msg_mailexist=You are trying to register an account with an E-Mail that already exists!
hive_login_password_rules=Password Rules
hive_login_password_sign=Required Characters:
hive_login_password_cap=Required Capital Letters:
hive_login_password_small=Required Small Letters:
hive_login_password_special=Required Special Characters:
hive_login_password_numeric=Required Numeric Characters:

# Login Events - Mail Change
hive_login_msg_m_ok=You have successfully activated your new E-Mail!
hive_login_msg_m_er=Error while trying to activate the new E-Mail address; please try again.
hive_login_msg_m_exp=E-Mail activation code expired! Please retry to change your E-Mail!
hive_login_msg_m_res=The E-Mail you tried to activate is now used on another account, so it cannot be associated with your account!
hive_login_msg_m_block=Your account is blocked from E-Mail changes!
hive_login_msg_m_noadr=The request has failed. Please try again later.
hive_login_mc_cmailtext=Your current E-Mail is:
hive_login_msg_rec_ok=Please check the new E-Mail inbox to activate the new E-Mail address.
hive_login_msg_rec_err=Error while trying to change E-Mail address.
hive_login_msg_rec_wait=Email changes are restricted for a period of time. Please try again later.
hive_login_msg_rec_exist=The E-Mail you are trying to change to is already used by another user account!
hive_login_msg_rec_block=Your account is blocked from E-Mail changes!
hive_login_msg_rec_disable=You cannot change the E-Mail of a disabled account!

# Login Mails
hive_login_mail_pre_change=Activate your new mail here: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_change=Activate Your New E-Mail
hive_login_mail_title_register=Activate Your New Account
hive_login_mail_pre_register=Click the following link to activate your account: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_rec=Recover Your Account
hive_login_mail_pre_rec=Click the following link to recover your account password: <a href="SF_ACTION_URL">SF_ACTION_URL</a>

# Login - Activation
hive_login_msg_a_ok=You have successfully activated your account! You can now login on our login pages on this website.
hive_login_msg_a_er=Error while trying to activate the user account. Please try to recover your account password or register a new account.
hive_login_msg_a_exp=The activation token is invalid. Please recover your account at the login page to activate your account!
hive_login_msg_a_block=Activation for your account has been disabled; please try again later!

# Login - Recover Request
hive_login_msg_rr_recnewunk=The provided E-Mail is not registered.
hive_login_msg_rr_recnope=Your account does not have permission to recover the password!
hive_login_msg_rr_recnopede=Your account has been deactivated and cannot make new requests!
hive_login_msg_rr_recwait=Recovery requests are limited to prevent misuse. Please try again later.
hive_login_msg_rr_recnok=Please check your inbox for a password reset E-Mail. This mail contains a link to recover your password.
hive_login_msg_recfr_ok=Please check your E-Mail inbox to get a password recovery link!

# Login - Recover Execute
hive_login_msg_pwtexpire=This Password Recovery Token has expired! Please retry to recover your account.
hive_login_msg_recexecerror=Error while trying to recover your password. Please try again to recover your account.
hive_login_msg_recexecok=You have successfully recovered your password and can now login with your new password.

# Login - Pass Change / 2FA
hive_login_msg_passc_loginasact=You are currently logged in as a different user. If you proceed, any changes you make will affect the account you are logged in as-not your own account
hive_login_msg_passc_enterold=Please enter your current password.
hive_login_msg_passc_enternew=Please enter a new password.
hive_login_msg_passc_enternewc=Please confirm your new password.
hive_login_msg_passc_cwrong=The current password you entered does not match our records.
hive_login_msg_passc_ok=Your password has been changed successfully!
hive_login_msg_2fa=Set up two-factor authentication (2FA) here to add extra security to your account. When enabled, you’ll see a code and QR code below to connect your authenticator app. You can enable or disable 2FA at any time from this section.
hive_login_msg_2fa_request=2FA Code (if enabled)
hive_login_msg_2fa_error=2FA is enabled on your account, your provided 2fa key is not correct, please try again.

##########################################################################################################################################
# Setup Explanations - CMS
##########################################################################################################################################

hive_var-_HIVE_ENABLESITE_MAILCHANGE_=Enable the default CMS user email change page?
hive_var-_HIVE_ENABLESITE_PASSCHANGE_=Enable the default CMS user password change page?
hive_var-_HIVE_ENABLESITE_RECOVER_=Enable the default CMS user account recovery page?
hive_var-_HIVE_ENABLESITE_LOGIN_=Enable the default CMS user login page?
hive_var-_HIVE_ENABLESITE_LOGOUT_=Enable the default CMS user logout page?
hive_var-_HIVE_ENABLESITE_REGISTER_=Enable the default CMS user registration page?
hive_var-_HIVE_ENABLESITE_LANGCHANGE_=Enable the default CMS language switch page?
hive_var-_HIVE_ENABLESITE_MODESWITCH_=Enable the default CMS frontend/backend switch page?
hive_var-_HIVE_ENABLESITE_2FA_=Enable the default CMS user two-factor authentication (2FA) page?
hive_var-_HIVE_ENABLESITE_ACTIVATE_=Enable the default CMS user account activation page?
hive_var-_HIVE_LANG_DEFAULT_=Default language.
hive_var-_REDIS_=Enable Redis integration?
hive_var-_REDIS_HOST_=Redis server hostname.
hive_var-_REDIS_PORT_=Redis server port.
hive_var-_SMTP_MAILS_HEADER_=Default email header content.
hive_var-_SMTP_MAILS_FOOTER_=Default email footer content.
hive_var-_SMTP_SENDER_MAIL_=Default sender email address.
hive_var-_SMTP_SENDER_NAME_=Default sender display name.
hive_var-_SMTP_MAILS_IN_HTML_=Send emails in HTML format?
hive_var-_SMTP_INSECURE_=Allow insecure SMTP server connections?
hive_var-_SMTP_DEBUG_=SMTP debug level (0–3).
hive_var-_SMTP_HOST_=SMTP server hostname.
hive_var-_SMTP_PORT_=SMTP server port.
hive_var-_SMTP_AUTH_=SMTP authentication method.
hive_var-_SMTP_USER_=SMTP username.
hive_var-_SMTP_PASS_=SMTP password.
hive_var-_USER_MAX_SESSION_=Session expiration time (in days).
hive_var-_USER_TOKEN_TIME_=User token expiration time (in minutes).
hive_var-_USER_AUTOBLOCK_=Automatically block users after a defined number of failed login attempts.
hive_var-_USER_WAIT_COUNTER_=Wait time between account recovery and activation/registration requests (in minutes).
hive_var-_USER_LOG_SESSIONS_=Log expired sessions to the database?
hive_var-_USER_LOG_IP_=Log user IP addresses to the database?
hive_var-_USER_PF_SIGNS_=Password policy: Require at least one symbol.
hive_var-_USER_PF_CAPSIGNS_=Password policy: Require at least one uppercase letter.
hive_var-_USER_PF_SMSIGNS_=Password policy: Require at least one lowercase letter.
hive_var-_USER_PF_SPSIGNS_=Password policy: Require at least one special character.
hive_var-_USER_PF_NUMSIGNS_=Password policy: Require at least one number.
hive_var-_UPDATER_CODE_=Code required to execute the update manager (can be overridden by ruleset.cfg).
hive_var-_HIVE_CURL_LOGGING_=Enable cURL request logging?
hive_var-_HIVE_IP_LIMIT_=IP blacklist threshold after repeated failed attempts.
hive_var-_HIVE_REFERER_=Enable referer logging?
hive_var-_HIVE_CSRF_TIME_=Form CSRF token validity duration (in seconds).
hive_var-_HIVE_JS_ACTION_ACTIVE_=Enable JavaScript error logging action script?
hive_var-_HIVE_TITLE_=Default website title.
hive_var-_HIVE_TITLE_SPACER_=Default tab title separator.
hive_var-_HIVE_PHP_DEBUG_=Enable PHP debug mode?
hive_var-_HIVE_MYSQL_DEBUG_=Enable MySQL debug mode?
hive_var-_HIVE_URL_SEO_=Use SEO friendly URLs?
hive_var-_HIVE_ROBOTS_CREATE_=Create intial robots.txt file?
hive_var-_CRON_ENABLE_LOG_=Enable cron execution protocol?
hive_var-_USER_REC_DROP_=Remove deprecated recovery keys on login or account recovery
hive_var-_USER_MULTI_LOGIN_=Allow multiple simultaneous logins per user
hive_var-_HIVE_BENCHMARK_EXECUTE_=Enable benchmark logging on index.php
hive_var-_HIVE_HITCOUNTER_EXECUTE_=Enable hit counter logging on index.php

##########################################################################################################################################
# Strings
##########################################################################################################################################

string_email=E-Mail
string_password=Password
string_close=Close
string_delete=Delete
string_url=URL
string_name=Name
string_date=Date
string_details=Details
string_operation=Operation
string_add=Add
string_execute=Execute
string_executed=Executed
string_coming_soon=Coming Soon
string_value=Value
string_edit=Edit
string_not_available=Not Available
string_identifier=Identifier
string_latest_version=Latest Version
string_description=Description
string_install=Install
string_framework=Framework
String_internal=Internal
string_library=Library
string_extension=Extension
string_css=CSS
string_php=PHP
string_mysql=MySQL
string_process_id=Process-ID
string_status=Status
string_parameter=Parameter
string_type=Type
string_waiting=Waiting
string_done=Done
string_settings=Settings
string_deprecated=Deprecated
string_theme=Theme
string_valid=Valid
string_invalid=Invalid
string_general=General
string_update=Update
string_cleanup=Cleanup
string_object=Object
string_restricted=Restricted
string_confirm=Confirm
string_reset=Reset
string_logout=Logout
string_website=Website
string_login=Login
string_favicon=Favicon
string_visibility=Visibility
string_developer=Developer
string_user=User
string_redis=Redis
string_cancel=Cancel
string_local=Local
string_online=Online
string_save=Save
string_meta=Meta
string_administration=Administration
string_block=Block
string_unblock=Unblock
string_confirmed=Confirmed
string_data=Data
string_inheritance=Inheritance
string_relations=Relations
string_docker=Docker
string_background_worker=Background-Worker
string_refresh=Refresh
string_token=Token
string_activate=Activate
string_session=Session
string_license=License
string_github=Github
string_documentation=Documentation
string_author=Author
string_switch=Switch
string_readme=Readme
string_disabled=Disabled
string_enabled=Enabled
string_rename=Rename
string_hardlink=Hardlink
string_create_folder=Create Folder
string_location=Location 
string_truncate=Truncate
string_delete_data=Delete Data
string_not_found=Not Found
string_objects=Objects
string_pages=Pages
string_please_wait=Please Wait
string_default=Default
string_register=Register
string_recover=Recover
string_notifications=Notifications
string_calender=Calender
string_profile=Profile
string_manage=Manage
string_view=View
string_key=Key
string_enable=Enable
string_disable=Disable
string_folder=Folder
string_version=Version
string_visit=Visit
string_module=Module
string_style=Style
string_low=Low
string_medium=Medium
string_high=High
string_active=Active
string_inactive=Inactive
string_upload=Upload
string_receiver=Receiver
string_error=Error
string_subject=Subject
string_delay=Delay
string_memory=Memory
string_cpu=CPU
string_groups=Groups
string_mail=E-Mail
string_identification=Identification
string_permissions=Permissions
string_websites=Websites
string_dashboards=Dashboards
string_language=Language
string_translation=Translation
string_empty=Empty
string_page=Page
string_include=Include
string_public=Public
string_private=Private
string_image=Image
string_sort=Sort
string_sql_queries=SQL-Queries
string_referer=Referer
string_hits=Hits
string_flush=Flush
string_information=Information
string_tables=Tables
string_back=Back
string_field_list=Field List
string_value_list=Value List
string_failures=Failures
string_content=Content
string_line=Line
string_users=Users
string_create=Create
string_privisioned=Provisioned
string_not_privisioned=Not Provisioned
string_not_blocked=Not Blocked
string_blocked=Blocked
string_no_login=No Login
string_can_login=Can Login
string_page_builder=Page-Builder
string_object_builder=Object-Builder
string_permitted=Permitted
string_yes=Yes
string_no=No
string_download=Download
string_flush_table=Flush Table
string_logging=Logging
string_request=Request
string_visits=Visits
string_limit=Limit
string_activities=Activities
string_list=List
string_show_more=Show More
string_show_less=Show Less
string_delete_item=Delete Item
string_flush_table=Flush Table
string_delete_table=Delete Table
string_allow_insecure=Allow Insecure
string_strict_security=Strict Security
string_templates=Templates
string_script_path=Script-Path
string_cms=CMS
string_token_switch=Token-Switch
string_debugging=Debugging
string_progress=Progress
string_files=Files
string_short_description=Short Description
string_long_description=Long Description
string_creation_operation=Creation Operation
string_update_operation=Update Operation
string_tasks=Tasks
string_javascript=Javascript
string_endpoint=Endpoint
string_triggers=Triggers
string_builder=Builder
string_trace=Trace
string_ip_address=IP-Address
string_reference=Reference
string_videos=Videos
string_codename=Codename
string_included_libraries=Included Libraries
string_initialized=Initialized
string_last_use=Last Use
string_creation=Creation
string_disable_item=Disable Item
string_enable_item=Enable Item
string_view_item=View Item
string_core_version=Core Version
string_framework_version=Framework Version
string_module_version=Module Version
string_php_date=PHP Date
string_mysql_date=MySQL Date
string_php_version=PHP Version
string_no_items=No Items
string_back_to_website=Back to Website
string_install_item=Install Item
string_frontend_switch=Frontend Switch
string_please_choose_items=Please choose Items
string_upload_in_progress=Upload in Progress
string_upload_completed=Upload completed
string_new_password=New Password
string_current_password=Current Password
string_confirm_new_password=Confirm New Password
string_change_password=Change Password
string_2fa=2FA