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
		
	*/
	
	// Include Settings.php
	if(file_exists("../settings.php")) { require_once("../settings.php"); }
		else { @http_response_code(503); echo "Critical Error [c0]: <br />This CMS is not yet installed. <br />Please install this CMS by visiting the websites root folder!"; exit(); }
	
	// Special Variables
	#define("_HIVE_INTERNAL_MT_LOCK_OVR_", 			true);
	#define("_HIVE_INTERNAL_BACKUP_LOCK_OVR_", 		true);
	#define("_HIVE_INTERNAL_UPDATE_LOCK_OVR_", 		true);
	#define("_HIVE_INTERNAL_RNAME_ERROR_OVR_", 		true);
	#define("_HIVE_INTERNAL_INIT_ERROR_OVR_", 		true);
	#define("_HIVE_INTERNAL_DOWNGRADE_ERROR_OVR_", 	true);
	#define("_HIVE_INTERNAL_UPDATE_REQ_OVR_", 		true);
	#define("_HIVE_INTERNAL_VERSION_ERROR_OVR_", 	true);	
	
	// Include Initialize.php
	if(file_exists($object['path']."/_core/initialize.php")) { require_once($object['path']."/_core/initialize.php"); }
		else { @http_response_code(503); echo "Critical Error [c1]: <br />Misconfigured \$object['path'] in settings.php. <br />Please check your configuration file."; exit(); }

	// Output Empty Array if Current Website Error
	if(defined("_HIVE_DEFERSITE_REGISTER_")) {
		if(_HIVE_DEFERSITE_REGISTER_) {
			Header("Location: "._HIVE_DEFERSITE_REGISTER_."");
			exit();
		}
	}
	
	// Deactivation State
	if(defined("_HIVE_ENABLESITE_REGISTER_")) {
		if(!_HIVE_ENABLESITE_REGISTER_) {
			$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."__login_csrf");
			hive__default_volt_header($object, "Error");
			?>
			<section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
				<div class="container">
					<div class="row justify-content-center form-bg-image" > <!-- data-background-lg="../../assets/img/illustrations/signin.svg"-->
						<div class="col-12 d-flex align-items-center justify-content-center">
							<div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
								This page is currently deactivated by _HIVE_ENABLESITE_REGISTER_!
								<br /><br /><a href="../">Back to Home</a>
							</div>
						</div>
					</div>
				</div>
			</section>					
			<?php 
			hive__default_volt_footer();
			exit();
		}
	}	
	
	// No enter on no Login
	if($object["user"]->user_loggedIn) {
		$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."__login_csrf");
		hive__default_volt_header($object, "Error");
		?>
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center form-bg-image" > <!-- data-background-lg="../../assets/img/illustrations/signin.svg"-->
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
							You cannot enter this page while you are logged in!
							<br /><br /><a href="../">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>					
		<?php 
		hive__default_volt_footer();
		exit();
	}	
	
	// Check for IP Bans
	if($object["ipbl"]->blocked()) { 
		$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."__login_csrf");
		hive__default_volt_header($object, "Error", $favi_code, "dark");
		?>
		<section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
			<div class="container mb-5">
				<div class="row justify-content-center form-bg-image" > <!-- data-background-lg="../../assets/img/illustrations/signin.svg"-->
					<div class="col-12 d-flex align-items-center justify-content-center">
						<div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
							Your IP-Adress is currently blocked!<br />Please try again later or contact our support team.
							<br /><br /><a href="../../">Back to Home</a>
						</div>
					</div>
				</div>
			</div>
		</section>					
		<?php 
		hive__default_volt_footer();
		exit();
	}	


	
		$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."__login_csrf");
		// Registration Execution
		if(hive__trim(@$_POST["usermail"]) != "") { 
			if($object["csrf"]->check(@$_POST["token"])) { 
				if(hive__trim(@$_POST["password"]) != "") { 
					if(hive__trim(@$_POST["password_confirm"]) != "") { 
						if($object["user"]->passfilter_check(@$_POST["password"])) { 
							if(!$object["user"]->mailExists(@$_POST["usermail"])) { 
								if(@$_POST["password_confirm"] == @$_POST["password"]) { 
									$return = $object["user"]->addUser($_POST["usermail"], $_POST["usermail"], $_POST["password"]);
									if($return) { 
										$bind = array();
										$bind[0]["value"] = hive__trim($_POST["usermail"]);
										$bind[0]["value"] = strtolower($bind[0]["value"]);
										$newuser = $object["mysql"]->select("SELECT * FROM "._TABLE_USER_." WHERE LOWER(user_mail) = ?", false, $bind);
										if(is_array($newuser)) {
											$return = $object["user"]->activation_request($bind[0]["value"]);
											if($return) {
												$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
												$url_if_needed = $current_url."/_core/_action/user_activate.php?act_token=".$object["user"]->mail_ref_token."&act_user=".$object["user"]->mail_ref_user;
												if(hive__default_mail($object, "SF_DEFAULT_REGISTER", $bind[0]["value"], $object["user"]->mail_ref_user, $url_if_needed)) {
													$object["eventbox"]->ok($object["lang"]->translate("hive_login_msg_register_ok"));
												} else { $object["eventbox"]->error($object["lang"]->translate("hive_login_mail_serror")); }
											} else { 
												$object["eventbox"]->error($object["lang"]->translate("hive_login_msg_m_noadr"));
											}
										} else {
											$object["eventbox"]->error($object["lang"]->translate("hive_login_msg_m_noadr"));
										}
									} else {
										$object["eventbox"]->error($object["lang"]->translate("hive_login_msg_m_noadr"));
									}
								} else { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_nomatchpass")); }
							} else { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_mailexist")); }
						} else { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_passfiltererror")); }
					} else { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_empty")); }
				} else { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_empty")); }
			} else { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_csrf")); }
		} 
		
		// Registration Form
		hive__default_volt_header($object, $object["lang"]->translate("string_register"), $favi_code, "dark"); ?>
		<style>
			/*-----------------------------------------*/
			/* Eventbox Admin Template Stylesheet */
			/*-----------------------------------------*/
			/******************************************************* x_class_eventbox  *********/
			.x_class_eventbox {
				position: fixed;
				top: 0px;
				right: 20px;
				z-index: 1000 !important;
			}

			.x_class_eventbox_inner {
				max-width: 500px;
			}
			.x_class_eventbox_msg {
				max-width: 500px;
				border-radius: 5px;
				padding: 15px;
				margin-top: 20px;
			}
			.x_class_eventbox_msg_ok {
				background: #D3DFF5;
				color: #1579CA;
				border: 1px solid #BDD0F0;
			}
			.x_class_eventbox_msg_error {
				background: #F9D2DA;
				color: #87112B;
				border: 1px solid #F6BBC8;
			}
			.x_class_eventbox_msg_warning {
				background: #D3DFF5;
				color: #1579CA;
				border: 1px solid #BDD0F0;
			}
			.x_class_eventbox_msg_info {
				background: #D3DFF5;
				color: #1579CA;
				border: 1px solid #BDD0F0;
			}
			.x_class_eventbox_msg_close {
				background: #1F2937;
				border-radius: 5px;
				padding: 5px;
				color: white;
				cursor: pointer;
				width: 80px;
				font-weight: bold;
				font-size: 12px;
				position: absolute;
				float: right;
				right: 15px;
				border: 0px solid black;
				text-align: center;
			}
			.x_class_eventbox_msg_close:hover {
				background: #E5E7EB;
				color: black;
				border: 0px solid black;
			}
		</style>		
            <div class="container mb-5 mt-5">
                <div class="row justify-content-center form-bg-image" > <!-- data-background-lg="../../assets/img/illustrations/signin.svg"-->
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3"><?php echo $object["lang"]->translate("string_register"); ?></h1>
                            </div>
                            <form action="./user_register.php" class="mt-4" method="post">
                                <!-- Form -->
                                <div class="form-group mb-4">
                                    <label for="email"><?php echo $object["lang"]->translate("string_email"); ?></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                        </span>
                                        <input type="email" name="usermail" class="form-control" value="<?php echo htmlentities(@$_POST["usermail"]); ?>" placeholder="<?php echo hive__hen($object["lang"]->translate("string_email")); ?>" id="email" autofocus required>
                                    </div>  
                                </div>
                                <!-- End of Form -->
                                <div class="form-group">
									<b><?php echo $object["lang"]->translate("hive_login_password_rules"); ?></b>
									<ul>
										<?php if (_USER_PF_SIGNS_ > 0) { ?><li><?php echo $object["lang"]->translate("hive_login_password_sign"); ?> <?php echo _USER_PF_SIGNS_; ?></li><?php } ?>
										<?php if (_USER_PF_CAPSIGNS_ > 0) { ?><li><?php echo $object["lang"]->translate("hive_login_password_cap"); ?> <?php echo _USER_PF_CAPSIGNS_; ?></li><?php } ?>
										<?php if (_USER_PF_SMSIGNS_ > 0) { ?><li><?php echo $object["lang"]->translate("hive_login_password_small"); ?> <?php echo _USER_PF_SMSIGNS_; ?></li><?php } ?>
										<?php if (_USER_PF_SPSIGNS_ > 0) { ?><li><?php echo $object["lang"]->translate("hive_login_password_special"); ?> <?php echo _USER_PF_SPSIGNS_; ?></li><?php } ?>
										<?php if (_USER_PF_NUMSIGNS_ > 0) { ?><li><?php echo $object["lang"]->translate("hive_login_password_numeric"); ?> <?php echo _USER_PF_NUMSIGNS_; ?></li><?php } ?>
									</ul>
                                    <!-- Form -->
                                    <div class="form-group mb-4">
                                        <label for="password"><?php echo $object["lang"]->translate("string_password"); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                            </span>
                                            <input type="password" name="password" placeholder="<?php echo hive__hen($object["lang"]->translate("string_password")); ?>" class="form-control" id="password" required>
                                        </div>  
                                    </div>
									<input type="hidden" name="token" value="<?php echo $object["csrf"]->get(); ?>">
									<input type="hidden" name="loginbutton" value="1">
                                    <div class="form-group mb-4">
                                        <label for="password"><?php echo $object["lang"]->translate("hive_login_password_confirm"); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                            </span>
                                            <input type="password" name="password_confirm" placeholder="<?php echo hive__hen($object["lang"]->translate("hive_login_password_confirm")); ?>" class="form-control" id="password" required>
                                        </div>  
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-gray-800"><?php echo $object["lang"]->translate("string_register"); ?></button>
								<?php if(defined("_HIVE_ACTION_LOGIN_")) { if(_HIVE_ACTION_LOGIN_) { ?> <a href="./user_login.php" class="btn btn-gray-200 mt-2"><?php echo $object["lang"]->translate("hive_login_backtologin"); ?></a> <?php } } ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
	
	<?php
		$object["eventbox"]->show($object["lang"]->translate("string_close"));
		hive__default_volt_footer($object, "");
		exit();