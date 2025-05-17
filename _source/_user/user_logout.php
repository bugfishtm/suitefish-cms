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
	define("_HIVE_INTERNAL_MT_LOCK_OVR_", 			true);
	define("_HIVE_INTERNAL_BACKUP_LOCK_OVR_", 		true);
	define("_HIVE_INTERNAL_UPDATE_LOCK_OVR_", 		true);
	define("_HIVE_INTERNAL_RNAME_ERROR_OVR_", 		true);
	define("_HIVE_INTERNAL_INIT_ERROR_OVR_", 		true);
	define("_HIVE_INTERNAL_DOWNGRADE_ERROR_OVR_", 	true);
	define("_HIVE_INTERNAL_UPDATE_REQ_OVR_", 		true);
	define("_HIVE_INTERNAL_VERSION_ERROR_OVR_", 	true);
		
	// Include Initialize.php
	if(file_exists($object['path']."/_core/initialize.php")) { require_once($object['path']."/_core/initialize.php"); }
		else { @http_response_code(503); echo "Critical Error [c1]: <br />Misconfigured \$object['path'] in settings.php. <br />Please check your configuration file."; exit(); }

	// Output Empty Array if Current Website Error
	if(defined("_HIVE_DEFERSITE_LOGOUT_")) {
		if(_HIVE_DEFERSITE_LOGOUT_) {
			Header("Location: "._HIVE_DEFERSITE_LOGOUT_."");
			exit();
		}
	}

	// Deactivation State
	if(defined("_HIVE_ENABLESITE_LOGOUT_")) {
		if(!_HIVE_ENABLESITE_LOGOUT_) {
			$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."__login_csrf");
			hive__default_volt_header($object, "Error");
			?>
			<section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
				<div class="container">
					<div class="row justify-content-center form-bg-image" > <!-- data-background-lg="../../assets/img/illustrations/signin.svg"-->
						<div class="col-12 d-flex align-items-center justify-content-center">
							<div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
								This page is currently deactivated by _HIVE_ENABLESITE_LOGOUT_!
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
	if(!$object["user"]->user_loggedIn) {
		$object["csrf"] = new x_class_csrf(_HIVE_SITE_COOKIE_."__login_csrf");
		hive__default_volt_header($object, "Error");
		?>
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center form-bg-image" > <!-- data-background-lg="../../assets/img/illustrations/signin.svg"-->
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
							You cannot enter this page while you are not logged in!
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
	
	// Logout Session
	session_destroy();
	$object["user"]->logout();
	
	// Logout Cookies
	function removeAllCookies() {
		if (isset($_SERVER['HTTP_COOKIE'])) {
			$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
			$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
			
			foreach($cookies as $cookie) {
				$parts = explode('=', $cookie);
				$name = trim($parts[0]);
				setcookie($name, '', time() - 3600, $path);
				setcookie($name, '', time() - 3600, '/');
			}
		}
	}	
	removeAllCookies();
	
	// Restart Session
	session_start();
	
	// Redirect
	Header("Location: ../../");