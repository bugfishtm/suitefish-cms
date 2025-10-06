<?php
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
	#	along with this program.  If not, see <https://www.gnu.org/licenses/>.
	
	/***********************************************************************************************************
		Disable Hardlinking
	***********************************************************************************************************/
	if(!is_array(@$object)) { @http_response_code(@404); @Header("Location: ../"); exit(); }
	
	/***********************************************************************************************************
		Default Mail Sending Functionality for Templates and Default Sites
	***********************************************************************************************************/	
		function hive__template_mail($object, $template, $mail, $user_id, $url_if_needed) { 
			// If Admin Module is active, override functionality for additional purposes.
			if(function_exists("adm_mail_ovr_hive_template_mail")) {
				return hive__template_mail($object, $template, $mail, $user_id, $url_if_needed);
			}
			// URL SUBST
			if(is_string($url_if_needed)) { 
				$object["mail_template"]->add_substitution("SF_ACTION_URL", $url_if_needed); 
			}		
			// Sender Array name_exists($name)
			$tpmuser = "";
			if($object["user"]->exists($user_id)) {
				$tmp = $object["user"]->get($user_id);
				$object["mail_template"]->add_substitution("SF_RECEIVER_FIRSTNAME", 	@htmlspecialchars($tmp["user_firstname"]));
				$object["mail_template"]->add_substitution("SF_RECEIVER_LASTNAME", 		@htmlspecialchars($tmp["user_lastname"]));
				$object["mail_template"]->add_substitution("SF_RECEIVER_ID", 			@htmlspecialchars($user_id));
				$tpmuser = @htmlspecialchars($tmp["user_firstname"])." ".@htmlspecialchars($tmp["user_lastname"]);
			}			
			// Prepare Mail Templates for Sending Operation
			if(!$object["mail_template"]->name_exists($template)) {
				if($template == "SF_DEFAULT_REGISTER") { 
					$title = $object["lang"]->translate("hive_login_mail_title_register");
					$content = $object["lang"]->translate("hive_login_mail_pre_register");
					$title = $object["mail_template"]->do_substitute($title);
					$content = $object["mail_template"]->do_substitute($content);
				} elseif($template == "SF_DEFAULT_RECOVER") { 
					$title = $object["lang"]->translate("hive_login_mail_title_rec");
					$content = $object["lang"]->translate("hive_login_mail_pre_rec");
					$title = $object["mail_template"]->do_substitute($title);
					$content = $object["mail_template"]->do_substitute($content);
				} elseif($template == "SF_DEFAULT_MAILC") { 
					$title = $object["lang"]->translate("hive_login_mail_title_change");
					$content = $object["lang"]->translate("hive_login_mail_pre_change");
					$title = $object["mail_template"]->do_substitute($title);
					$content = $object["mail_template"]->do_substitute($content);
				} else { return false; }
			} else {
				$object["mail_template"]->set_template($template);
				$title = $object["mail_template"]->get_subject(true);
				$content = $object["mail_template"]->get_content(true);
			}
			// Get User Name for Sending
				if(@trim($tpmuser) != "") { $tpmuser = $tpmuser; } else { $tpmuser = @htmlspecialchars($mail); }
			// Send the Mail and Log everything
			if($object["mail"]->send($mail, $tpmuser, $title, $content)) { 
				return true; 
			} else { 
				return false; 
			} 
		}		
		
	/***********************************************************************************************************
		Mail Activation Change Activate
	***********************************************************************************************************/
		function hive__template_mail_activate($object, $get_token = "ref_token", $get_user = "ref_user", $message = true, $redirect = false) {
			$code = false;
			if(is_numeric(@$_GET[$get_user]) AND is_numeric(@$_GET[$get_token])) {
				if(!$object["ipbl"]->banned()) { 
					$code = $object["user"]->mail_edit_confirm(@$_GET[$get_user], @$_GET[$get_token]);
					if($code == 1) { if($message) { $object["eventbox"]->ok($object["lang"]->translate("hive_login_msg_m_ok"));  }}
					if($code == 2) { if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_m_er")); }}
					if($code == 3) { if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_m_exp")); }}
					if($code == 4) { if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_m_res")); }}
					if($code == 5) { if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_m_block")); }}
					if($code == 6) { if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_m_res")); }}
			} else { if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_ipban")); } $code = "banned";} } 
			if($redirect) { Header("Location: ".$redirect.""); exit(); } return $code; }

	/***********************************************************************************************************
		Default Mail Activation
	***********************************************************************************************************/			
		function hive__template_user_activate($object, $get_token = "ref_token", $get_user = "ref_user", $message = true, $redirect = false) {
			$code = false;
			if(is_numeric(@$_GET[$get_user]) AND is_numeric(@$_GET[$get_token])) {
				if(!$object["ipbl"]->banned()) { 
					$code = $object["user"]->activation_confirm(@$_GET[$get_user], @$_GET[$get_token]);
					if($code == 1) { if($message) { $object["eventbox"]->ok($object["lang"]->translate("hive_login_msg_a_ok"));  } }
					if($code == 2) { if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_a_er")); } }
					if($code == 3) { if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_a_exp")); } }
					if($code == 4) { if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_a_block")); } }
				} else { if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_ipban")); } $code = "banned";}
				} if($redirect) { Header("Location: ".$redirect.""); exit(); } return $code; }

	/***********************************************************************************************************
		Default Login Execution
	***********************************************************************************************************/		
		function hive__template_login($object, $cookies_allow = false, $message = true) {
			// Return OK if user is Logged In
			if($object["user"]->user_loggedIn) { return true; }
			// Get the current protocol (http or https)
			$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
			$domain = $_SERVER['HTTP_HOST'];
			$uri = $_SERVER['REQUEST_URI'];
			$current_url = $protocol . $domain . $uri;
			if ($_SERVER['QUERY_STRING']) {
				$current_url .= '?' . $_SERVER['QUERY_STRING'];
			}
			// Login Operation
			if (isset($_POST["loginbutton"])) {
				// Check for IP Ban on Current Login Try
				if(!$object["ipbl"]->banned()) { 
					// Check for Empty Missing Inputs
					if (!empty($_POST["usermail"]) and !empty($_POST["password"])) {
						// Prepare Cookie Allowed Bool Variable
						if(isset($_POST["rememberme"]) AND $cookies_allow) { $stay = true; } else { $stay = false; }
						// Check for CSRF Class Validation of $_post Token is set or Object is not created (csrf)
						if (!is_object($object["csrf"])) { 
						} else {
							if ($object["csrf"]->check($_POST["token"])) {
							} else { if($message) {  $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_csrf")); } return "csrf"; }	
						}
						// Login Request
						$object["user"]->login_request($_POST["usermail"], $_POST["password"], $stay);	
						// Fetch and Result Operation
						if ($object["user"]->login_request_code == 1) {			
							if($message) { $object["eventbox"]->ok($object["lang"]->translate("hive_login_msg_l_ok")); }
							return $object["user"]->login_request_code;				
						} elseif ($object["user"]->login_request_code == 2) {	
							if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_l_wrong")); }
							$object["ipbl"]->increase();	
							return $object["user"]->login_request_code;				
						} elseif ($object["user"]->login_request_code == 3) {
							if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_l_wrong")); }		
							$object["ipbl"]->increase();			
							return $object["user"]->login_request_code;		
						} elseif ($object["user"]->login_request_code == 4) {
							if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_l_blocked")); }	
							return $object["user"]->login_request_code;				
						} elseif ($object["user"]->login_request_code == 5) {
							if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_l_inactive")); }	
							return $object["user"]->login_request_code;				
						} elseif ($object["user"]->login_request_code == 6) {
							if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_l_blockedpwf")); }
							return $object["user"]->login_request_code;						
						} elseif ($object["user"]->login_request_code == 7) {
							if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_l_disabled")); }
							return $object["user"]->login_request_code;								
						} return 8;
					} else { if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_empty")); } return "empty"; }
				} else { if($message) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_ipban")); } return "banned"; }
			} return false; }	

	/***********************************************************************************************************
		Default Recover Request
	***********************************************************************************************************/
		function hive__template_recover_request($object, $rec_url = false, $get_token = "rec_token", $get_user = "rec_user") {
			if (isset($_POST["resetbutton"])) {
				if (@trim(@$_POST["mail"]) != "") {	
					if (!is_object($object["csrf"])) { 
					} else {
						if ($object["csrf"]->check($_POST["token"])) {
						} else { if($message) {  $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_csrf")); } return "csrf"; }	
					}													
					$object["user"]->recover_request($_POST["mail"]);
					if ($object["user"]->rec_request_code == 1) {
						$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
						$url_if_needed = $current_url."/_user/user_recover.php?rec_token=".$object["user"]->mail_ref_token."&rec_user=".$object["user"]->mail_ref_user;
						if(hive__template_mail($object, "SF_DEFAULT_RECOVER", $_POST["mail"], $object["user"]->mail_ref_user, $url_if_needed)) { 
							return 1; 
						} else { return "errmail"; }
					}
					return @$object["user"]->rec_request_code;
				} else { }
			} return false;  					
		}				