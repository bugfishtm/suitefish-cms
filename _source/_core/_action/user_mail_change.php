<?php
	/* 	 _           ___ _     _   _____ _____ _____ 
		| |_ _ _ ___|  _|_|___| |_|     |     |   __|
		| . | | | . |  _| |_ -|   |   --| | | |__   |
		|___|___|_  |_| |_|___|_|_|_____|_|_|_|_____|
				|___|                                
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
		
	*/ if(file_exists("../../settings.php")) { require_once("../../settings.php"); } else { @http_response_code(404); Header("Location: ../"); exit(); } 
	
	// Check for Activation of this Action Section and IP Bans
	if($object["ipbl"]->blocked()) { 
			$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."__login_csrf");
			hive__volt_header($object, "Error", '<link rel="icon" type="image/x-icon" href="'._HIVE_URL_REL_.'/_core/_image/image.favicon.ico">', "dark");
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
			hive__volt_footer($object, "");
			exit();
	}	
	if(defined("_HIVE_ACTION_MAILCHANGE_")) { 
		if(!_HIVE_ACTION_MAILCHANGE_) { 
			$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."__login_csrf");
			hive__volt_header($object, "Error", '<link rel="icon" type="image/x-icon" href="'._HIVE_URL_REL_.'/_core/_image/image.favicon.ico">', "dark");
			?>
			<section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
				<div class="container mb-5">
					<div class="row justify-content-center form-bg-image" > <!-- data-background-lg="../../assets/img/illustrations/signin.svg"-->
						<div class="col-12 d-flex align-items-center justify-content-center">
							<div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
								Functionality disabled by cms site module! [_HIVE_ACTION_MAILCHANGE_]
								<br /><br /><a href="../../">Back to Home</a>
							</div>
						</div>
					</div>
				</div>
			</section>					
			<?php 
			hive__volt_footer($object, "");
			exit();
		}
	} else {
		$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."__login_csrf");
		hive__volt_header($object, "Error", '<link rel="icon" type="image/x-icon" href="'._HIVE_URL_REL_.'/_core/_image/image.favicon.ico">', "dark");
		?>
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container mb-5">
                <div class="row justify-content-center form-bg-image" > <!-- data-background-lg="../../assets/img/illustrations/signin.svg"-->
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
							Functionality disabled by cms site module! [_HIVE_ACTION_MAILCHANGE_]
							<br /><br /><a href="../../">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>					
		<?php 
		hive__volt_footer($object, "");
		exit();
	}
	
	if(!$object["user"]->user_loggedIn) {
		$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."__login_csrf");
		hive__volt_header($object, "Error", '<link rel="icon" type="image/x-icon" href="'._HIVE_URL_REL_.'/_core/_image/image.favicon.ico">', "dark");
		?>
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container mb-5">
                <div class="row justify-content-center form-bg-image" > <!-- data-background-lg="../../assets/img/illustrations/signin.svg"-->
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
							You cannot enter this site without a valid active login!
							<br /><br /><a href="../../">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>					
		<?php 
		hive__volt_footer($object, "");
		exit();
	}
		// CSRF for Page
		$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."__login_csrf"); 
		$mail_change_with_token = false;
		
		// Check for Request to Change Mail
		if(hive__trim(@$_POST["usermail"]) != "") {
			if($object["csrf"]->check(@$_POST["token"])) {
				$return = $object["user"]->mail_edit($object["user"]->user_id, $_POST["usermail"]);
				if($return == 1) { 
					$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					if($object["mail"]->send($_POST["usermail"], $_POST["usermail"], $object["lang"]->translate("hive_login_mail_title_change"), $object["lang"]->translate("hive_login_mail_pre_change")."<br /><a href='".$current_url."?mai_token=".$object["user"]->mail_ref_token."&mai_user=".$object["user"]->mail_ref_user."'>".$current_url."?mai_token=".$object["user"]->mail_ref_token."&mai_user=".$object["user"]->mail_ref_user."</a>", true, _SMTP_MAILS_FOOTER_, _SMTP_MAILS_HEADER_, false))
					{ $object["eventbox"]->ok($object["lang"]->translate("hive_login_msg_rec_ok")); } else { $object["eventbox"]->error($object["lang"]->translate("hive_login_mail_serror")); }
				}
				elseif($return == 2) {  $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_rec_err")); }
				elseif($return == 3) { $object["eventbox"]->error( $object["lang"]->translate("hive_login_msg_rec_wait")); }
				elseif($return == 4) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_rec_exist")); }
				elseif($return == 5) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_rec_block")); }
				elseif($return == 6) { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_rec_disable")); }
				else { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_m_noadr")); }
			} else { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_csrf")); }
		}
		
		// Check for Activation of New Mail
		if($_GET["mai_token"] AND $_GET["mai_user"]) { 
			$mail_change_with_token = true;
			$return = hive__template_mail_activate($object, "mai_token", "mai_user", false, false );
			if($return == 1) { $text = $object["lang"]->translate("hive_login_msg_m_ok"); }
			elseif($return == 2) {  $object["ipbl"]->raise(); $text = $object["lang"]->translate("hive_login_msg_m_er"); }
			elseif($return == 3) { $text = $object["lang"]->translate("hive_login_msg_m_exp"); }
			elseif($return == 4) { $text = $object["lang"]->translate("hive_login_msg_m_res"); }
			elseif($return == 5) { $text = $object["lang"]->translate("hive_login_msg_m_block"); }
			elseif($return == 6) { $text = $object["lang"]->translate("hive_login_msg_m_res"); }
			else { $text = $object["lang"]->translate("hive_login_msg_m_noadr"); }
		}
		
		
		hive__volt_header($object, $object["lang"]->translate("login_mc_change_mail"), '<link rel="icon" type="image/x-icon" href="'._HIVE_URL_REL_.'/_core/_image/image.favicon.ico">', "dark");
	?>
		<style>
			/*-----------------------------------------*/
			/* Eventbox Admin Template Stylesheet */
			/*-----------------------------------------*/

			/******************************************************* x_class_eventbox  *********/
			.x_class_eventbox {
				position: fixed;
				margin: 0px 0px 0px 0px;
				top: 15px;
				right: 15px;
				z-index: 1000 !important;
			}

			.x_class_eventbox_inner {
				max-width: 500px;
			}
			.x_class_eventbox_msg {
				margin: 0px 0px 0px 0px;
				max-width: 500px;
				border-radius: 0px;
				padding: 15px;
				border: 1px solid black;
			}
			.x_class_eventbox_msg_ok {
				background: #2B982B;
				color: white;
			}
			.x_class_eventbox_msg_error {
				background: #FB483A;
				color: white;
			}
			.x_class_eventbox_msg_warning {
				background: #FF9600;
			}
			.x_class_eventbox_msg_info {
				background: #00B0E4;
				color: white;
			}
			.x_class_eventbox_msg_close {
				background: #FB483A;
				border-radius: 0px;
				padding: 5px;
				color: white;
				cursor: pointer;
				width: 80px;
				font-weight: bold;
				font-size: 12px;
				position: absolute;
				float: right;
				right: 15px;
				border: 1px solid black;
			}
			.x_class_eventbox_msg_text { }
		</style>
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container mb-5">
                <div class="row justify-content-center form-bg-image" > <!-- data-background-lg="../../assets/img/illustrations/signin.svg"-->
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3"><?php echo $object["lang"]->translate("login_mc_change_mail"); ?></h1>
								<?php if(!$mail_change_with_token) { ?>
									<p><?php echo $object["lang"]->translate("login_mc_cmailtext"); ?> <b><?php echo htmlspecialchars($object["user"]->user_mail ?? ''); ?></b></p>
								<?php } ?>
                            </div>
                            <form action="./user_mail_change.php" class="mt-4" method="post">
								<input type="hidden" name="token" value="<?php echo $object["csrf"]->get(); ?>">
								<input type="hidden" name="loginbutton" value="1">
								<?php if(!$mail_change_with_token) { ?>
                                <!-- Form -->
                                <div class="form-group mb-4">
                                    <label for="email"><?php echo $object["lang"]->translate("string_email"); ?></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                        </span>
                                        <input type="text" name="usermail" class="form-control" value="<?php echo htmlentities(@$_POST["usermail"] ?? ''); ?>" placeholder="<?php echo $object["lang"]->translate("string_email"); ?>" id="email" autofocus required>
                                    </div>  
                                </div>
								<?php } else { ?>
                                <div class="form-group mb-4">
                                    <div class="input-group">
										<?php echo $text; ?>
                                    </div>  
                                </div>
								<?php }  ?>
								<?php if(!$mail_change_with_token) { ?>
                                <div class="d-grid">
										<button type="submit" class="btn btn-gray-800"><?php echo $object["lang"]->translate("login_mc_change_mail"); ?></button>
                                </div>
								<?php } ?>
                            </form>
							<div class="d-flex justify-content-center align-items-center mt-4">
								<span class="fw-normal">
									<a href="../../" class="fw-bold"><?php echo $object["lang"]->translate("login_mc_backtohome"); ?></a>
								</span>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	
	<?php
		$object["eventbox"]->show($object["lang"]->translate("string_close"));
		hive__volt_footer($object, "");
	?>