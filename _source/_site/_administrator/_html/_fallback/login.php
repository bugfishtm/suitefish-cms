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
	*/ if(!is_array(@$object)) { http_response_code(404); Header("Location: ../"); exit(); }
	
	if($object["user"]->user_loggedIn) {
		
		////////////////////////////////////////////////////////////////////////////////////////////////
		// Header
		////////////////////////////////////////////////////////////////////////////////////////////////
		adminbsb_header($object, $object["lang"]->translate("string_login")); 
		echo sf__theme_title($object["lang"]->translate("string_login"), false); 

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Space Fix
		////////////////////////////////////////////////////////////////////////////////////////////////		
		echo sf__theme_space_m();
	
		////////////////////////////////////////////////////////////////////////////////////////////////
		// Text
		////////////////////////////////////////////////////////////////////////////////////////////////
		echo sf__theme_box_start();
		echo $object["lang"]->translate("adm_login_loggedin"); 
		echo sf__theme_box_end(); 
		
	} else {
		
		////////////////////////////////////////////////////////////////////////////////////////////////
		// HTTP Code
		////////////////////////////////////////////////////////////////////////////////////////////////
		@http_response_code(401);
		

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Login Operation
		////////////////////////////////////////////////////////////////////////////////////////////////		
		if( @$_POST["usermail"]) {
			$bind = array();
			$bind[0]["value"] = @$_POST["usermail"];
			$r = $object["mysql"]->select("SELECT * FROM `"._TABLE_USER_."` WHERE LOWER(user_mail) = ?", false, $bind);
			if(is_array($r)) {
				$user_valid = true;
				$xtmp = $r;
			} else {
				$user_valid = false;
			}
			if(hive__trim($xtmp["user_2fa"]) != "") {
				$use_2fa = true;
				$twofa = new x_class_2fa($xtmp["user_2fa"]);
				$isCodeValid = $twofa->verifyCode(@$_POST["password2fa"]);
				if ($isCodeValid) {
					$use_2fa_valid = true;
				} else {
					$use_2fa_valid = false;
				}		
			} else {
				$use_2fa = false;
			}
			if(!$use_2fa) { 
				$xx = hive__template_login($object, true);
				if($xx === 1) { Header("Location: ".$_SERVER['PHP_SELF'] . '?' . http_build_query($_GET)); exit(); } 
			} else {
				if(!$use_2fa_valid) { 
					$object["ipbl"]->raise();
					$object["eventbox"]->error($object["lang"]->translate("hive_login_msg_2fa_error"));
				} else {
					$xx = hive__template_login($object, true);
					if($xx === 1) { Header("Location: ".$_SERVER['PHP_SELF'] . '?' . http_build_query($_GET)); exit(); } 
				}
			}	
		}		
			
		////////////////////////////////////////////////////////////////////////////////////////////////
		// Header
		////////////////////////////////////////////////////////////////////////////////////////////////
		adminbsb_header($object, $object["lang"]->translate("string_login"));
		echo sf__theme_title($object["lang"]->translate("string_login"), false);

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Space Fix
		////////////////////////////////////////////////////////////////////////////////////////////////		
		echo sf__theme_space_m();

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Text
		////////////////////////////////////////////////////////////////////////////////////////////////
		echo sf__theme_box_start();
	?>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?' . http_build_query($_GET)); ?>" method="post">
			<input type="hidden" name="token" value="<?php echo $object["csrf"]->get(); ?>">
			<input type="hidden" name="loginbutton" value="1">	
			<?php 
				echo sf__theme_form_text("usermail", hive__hen($object["lang"]->translate("string_email")), htmlentities(@$_POST["usermail"] ?? ''), "email", true, false, " autocomplete='off' autofocus");
				echo sf__theme_form_password("password", hive__hen($object["lang"]->translate("string_password")), false, "password", true, false, ' autocomplete="off" ');
				echo sf__theme_form_password("password2fa", hive__hen($object["lang"]->translate("hive_login_msg_2fa_request")), false, "password2fa", false, false, ' autocomplete="off" ');
				echo sf__theme_form_checkbox("rememberme", $object["lang"]->translate("hive_login_rememberme"), false, "remember", false, "", "");
				echo "<br />";
				echo sf__theme_button_primary($object["lang"]->translate("string_login"), "submit", false, false, false);	
				echo " ";
				if(defined("_HIVE_ENABLESITE_RECOVER_")) { if(_HIVE_ENABLESITE_RECOVER_) { echo sf__theme_button_warning($object["lang"]->translate("string_recover"), "a", _HIVE_URL_REL_."_user/user_recover.php", false, false); } }
				echo " ";
				if(defined("_HIVE_ENABLESITE_REGISTER_")) { if(_HIVE_ENABLESITE_REGISTER_) { echo sf__theme_button_warning($object["lang"]->translate("string_register"), "a", _HIVE_URL_REL_."_user/user_register.php", false, false);	} }
			?>
        </form>
	<?php echo sf__theme_box_end(); 
	} 
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Space Fix
	////////////////////////////////////////////////////////////////////////////////////////////////		
	echo sf__theme_space_fix();