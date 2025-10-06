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
		If a settings.php exists than we expect the software to be installed
	***********************************************************************************************************/	
	if(file_exists("./settings.php")) {

		/*******************************************************************************************************
			Define Index Loadup Constant
		*******************************************************************************************************/
		define("_HIVE_INIT_VIA_INDEXPHP_", true);
		
		/*******************************************************************************************************
			Require Settings.php
		*******************************************************************************************************/
		if(file_exists("./settings.php")) { 
			require_once("./settings.php"); 
		} else { 
			@http_response_code(503); 
			echo "Critical Error [c0]: <br />This CMS is not yet installed. <br />Please install this CMS by visiting the websites root folder!"; 
			exit(); 
		}
			
		/***********************************************************************************************************
			Special Declarations for this script to be usable even if site is broken.
		***********************************************************************************************************/
		define("_HIVE_INTERNAL_UPDATE_REQ_OVR_", 		true);
		define("_HIVE_INTERNAL_VERSION_ERROR_OVR_", 	true);			
			
		/*******************************************************************************************************
			Require initialize.php
		*******************************************************************************************************/
		if(file_exists($object['path']."/_core/initialize.php")) { 
			require_once($object['path']."/_core/initialize.php"); 
		} else { 
			@http_response_code(503); 
			echo "Critical Error [c1]: <br />Misconfigured \$object['path'] in settings.php. <br />Please check your configuration file."; 
			exit(); 
		}
		
		/***********************************************************************************************************
			Apply Updates to current Site Module if Required
		***********************************************************************************************************/
		if(_HIVE_BUILD_ > _HIVE_BUILD_ACTIVE_ ) {
			if(!file_exists($object["path"]."/update.lock.php")) { file_put_contents($object["path"]."/update.lock.php", "Update lockfile in place"); }
				else { header("Location: " . $_SERVER['REQUEST_URI']); exit();}
			$ar = array();
			foreach (glob("./_site/"._HIVE_MODE_."/_update/*.php") as $filename) {
				if(basename($filename) == "README.md") { continue; }
				if(basename($filename) == "readme.md") { continue; }
				if(basename($filename) == "index.php") { continue; }
				if(basename($filename) == ".htaccess") { continue; }
				if(!is_numeric(substr(basename($filename), 0, -4))) { continue; }
				array_push($ar, basename($filename));
			} natsort($ar); 
			$y = false;	
			foreach ($ar as $key => $filename) {
				$y = substr($filename, 0, -4); 
				if(substr($filename, 0, -4) > _HIVE_BUILD_ACTIVE_ AND substr($filename, 0, -4) <= _HIVE_BUILD_) { 
					if(file_exists("./_site/"._HIVE_MODE_."/_update/".htmlspecialchars($y ?? '').".php")) { 
						require_once("./_site/"._HIVE_MODE_."/_update/".htmlspecialchars($y ?? '').".php"); 
						$object["var"]->set("_HIVE_BUILD_ACTIVE_", htmlspecialchars($y ?? ''));	
					}		
				}			
			}				
			$object["var"]->set("_HIVE_BUILD_ACTIVE_", _HIVE_BUILD_);		
			$object["var"]->set("_HIVE_VERSION_ACTIVE_", _HIVE_VERSION_);			
			define("_HIVE_UPDATE_APPLIED_", true);	
			if(file_exists($object["path"]."/update.lock.php")) { unlink($object["path"]."/update.lock.php"); }
		} unset($ar); unset($y); 

		/***********************************************************************************************************
			Apply Updates to current Site Module Extensions if Required
		***********************************************************************************************************/
		foreach ($object["extensions_path"] as $hive_extension_loader_current_init) {
			if (file_exists($hive_extension_loader_current_init."/version.php")) {
				require $hive_extension_loader_current_init."/version.php";
				$object["extension"] = hive__init_extension_header($object, basename($hive_extension_loader_current_init)); 
				$curdata = $x;
				if($curdata["build"] > constant($object["extension"]["prefix_variables"]."_HIVE_BUILD_ACTIVE_") ) { 
					if(!file_exists($object["path"]."/update.lock.php")) { file_put_contents($object["path"]."/update.lock.php", "Update lockfile in place"); }
						else { header("Location: " . $_SERVER['REQUEST_URI']); exit();}
					$ar = array();
					foreach (glob($hive_extension_loader_current_init."/_update/*.php") as $filename) {
						if(basename($filename) == "README.md") { continue; }
						if(basename($filename) == "readme.md") { continue; }
						if(basename($filename) == "index.php") { continue; }
						if(basename($filename) == ".htaccess") { continue; }
						if(!is_numeric(substr(basename($filename), 0, -4))) { continue; }
						array_push($ar, basename($filename));
					} natsort($ar); 
					$y = false;	
					foreach ($ar as $key => $filename) {
						$y = substr($filename, 0, -4); 
						if(substr($filename, 0, -4) > constant($object["extension"]["prefix_variables"]."_HIVE_BUILD_ACTIVE_") AND substr($filename, 0, -4) <= $curdata["build"]) { 
							if(file_exists($hive_extension_loader_current_init."/_update/".htmlspecialchars($y ?? '').".php")) { 
								require_once($hive_extension_loader_current_init."/_update/".htmlspecialchars($y ?? '').".php"); 
								$object["var"]->set($object["extension"]["prefix_variables"]."_HIVE_BUILD_ACTIVE_", htmlspecialchars($y ?? ''));
							}		
						}			
					}
					$object["var"]->set($object["extension"]["prefix_variables"]."_HIVE_BUILD_ACTIVE_", $curdata["build"]);
					if(!defined("_HIVE_UPDATE_APPLIED_")) { define("_HIVE_UPDATE_APPLIED_", true);	}
					if(file_exists($object["path"]."/update.lock.php")) { unlink($object["path"]."/update.lock.php"); }
				} unset($ar); unset($y); 				
			}
		} unset($object["extension"]); unset($curdata); unset($x); unset($y);	

		/***********************************************************************************************************
			Message for Updates
		***********************************************************************************************************/		
		if(defined("_HIVE_UPDATE_APPLIED_")) {
			if(_HIVE_UPDATE_APPLIED_) {
				//hive__error("Update finished", 'Components of the website have been updated.', "", true, 200, false, "cog");
				header("Location: " . $_SERVER['REQUEST_URI']);
				exit();	
			}
		} else {
			define("_HIVE_UPDATE_APPLIED_", false);
		}
		
		/***********************************************************************************************************
			Check for Valid SEO Tag and SearchPath
		***********************************************************************************************************/
		if(@trim(@$_GET["hive__seo_tag_loc"] ?? '') != ""  AND @$_GET["hive__seo_tag_loc"] != false) {
			if(!defined("_HIVE_URL_SEO_")) {
				require_once($object["path"]."/_core/_error/404.html");
				exit();
			} else {
				if(!_HIVE_URL_SEO_) {
					@http_response_code(404);
					require_once($object["path"]."/_core/_error/404.html");
					exit();
				}
			}
		}
		
		/***********************************************************************************************************
			Check if frontpage is blocked due to blockage in cfg_ruleset.php.
		***********************************************************************************************************/		
		if(defined("_HIVE_BLOCK_FP_")) {
			if(_HIVE_BLOCK_FP_) {
				hive__error("Internal Use Only", 'This website is currently designated for non-public use only and is not intended for general access.', "To disable this behavior, set the _HIVE_BLOCK_FP_ variable to false in the cfg_ruleset.php file.", true, 200, false, "cog");
				exit();
			}		
		}	

		/***********************************************************************************************************
			Check for Existant load.php
		***********************************************************************************************************/
		if(file_exists($object["path"]."/_site/"._HIVE_MODE_."/load.php")) {
			require_once("./_site/"._HIVE_MODE_."/load.php"); 
			if(defined("_HIVE_BENCHMARK_EXECUTE_")) { 
				if(_HIVE_BENCHMARK_EXECUTE_) {
					$object["benchmark"]->execute($object["mysql"]->benchmark_get());
				}
			}
			if(defined("_HIVE_HITCOUNTER_EXECUTE_")) { 
				if(_HIVE_HITCOUNTER_EXECUTE_) {
					$object["hitcounter"]->execute();
				}
			}
		} else { 
			hive__error("Module Error", 'The required \'load.php\' file for the active site module '.@hive__hsc(_HIVE_MODE_).' is missing. Please reinstall the module or ensure that all necessary files are available.', "", true, 503);
		}				

	} else {
		
		/*******************************************************************************************************
			Object Validation Array for Included Files
		*******************************************************************************************************/
		$object = array(); 
		
		/*******************************************************************************************************
			Include Required Functionalities
		*******************************************************************************************************/
		require_once("./_core/_lib/lib.init.library.php");  
		require_once("./_core/_lib/lib.init.error.php");  
		require_once("./_core/_lib/lib.init.default.php");  
	
		/*******************************************************************************************************
			Include Ruleset if Existant
		*******************************************************************************************************/
		if(file_exists("./cfg_ruleset.php")) { require_once("./cfg_ruleset.php");  }
		
		/*******************************************************************************************************
			Default Ruleset Configuration if nothing set
		*******************************************************************************************************/
		if(!defined("_INSTALLER_TITLE_"))  { define("_INSTALLER_TITLE_", "Suitefish"); }
		if(!defined("_INSTALLER_COOKIE_")) { define("_INSTALLER_COOKIE_", "sf_"); }
		if(!defined("_INSTALLER_PREFIX_")) { define("_INSTALLER_PREFIX_", "sf_"); }
		if(!defined("_INSTALLER_CODE_"))   { define("_INSTALLER_CODE_", false); }

		/*******************************************************************************************************
			Start Session
		*******************************************************************************************************/
		session_start();
		
		/*******************************************************************************************************
			Variable Definements
		*******************************************************************************************************/
		$erroremptyr = false;
		$erroremptyu = false;
		$erroremptyd = false;
		$erroremptyrcced = false;
		$do = false;
		$con = false; 
		$coner = false;	
		
		/*******************************************************************************************************
			Block user if wrong password tries...
		*******************************************************************************************************/
		if(@$_SESSION["hive_installer_block"] > 200  AND _INSTALLER_CODE_ != false AND _INSTALLER_CODE_ != "") { 
			hive__error("Temporary Banned", "Too many wrong installation passwords! You have been temporarly blocked from this page! Try again later and check to provide the real installation code.", "", true, 401); exit();
		}

		/*******************************************************************************************************
			Initialize Blocking Counter Session
		*******************************************************************************************************/
		if(!@is_numeric(@$_SESSION["hive_installer_block"])) { $_SESSION["hive_installer_block"] = 0; }
		
		/*******************************************************************************************************
			Check the Configuration and Start Execution if no Errors
		*******************************************************************************************************/		
		$postsend = false;
		if(isset($_POST["mysql_host"])) { 
			if(@$_SESSION["csrf_hive_installer"] == @$_POST["csrf"]) { 
					if(@_INSTALLER_CODE_ == @$_POST["installer_code"] OR @_INSTALLER_CODE_ == false OR @_INSTALLER_CODE_ == "") { 
						$do = true;
						if(@trim(@$_POST["website_url"]) == "") {  $erroremptyu = true; $do = false;}
						if(@trim(@$_POST["website_cookie"]) == "") {  $erroremptyux = true; $do = false;}
						if(@trim(@$_POST["website_prefix"]) == "") {  $erroremptyuy = true; $do = false;}
						if(!file_exists(@$_POST["doc_root"]."_core/version.php")) { $erroremptyr = true; $do = false;}
						if(@trim(@$_POST["mysql_db"]) == "") {  $erroremptyd = true; $do = false;}
						if(!is_numeric(@$_POST["mysql_port"])) { $_POST["mysql_port"] = 3306; }
						if(@trim(@$_POST["mysql_host"]) == "") { $_POST["mysql_host"] = "localhost"; }
						try { $mysqli = @new mysqli(@$_POST["mysql_host"], $_POST["mysql_user"], $_POST["mysql_pass"], $_POST["mysql_db"], $_POST["mysql_port"]);  
							if ($mysqli->connect_errno) {
								$coner = "Connection Error: ".$mysqli->connect_error;
							}		
							/* check if server is alive */
							if ($mysqli->ping()) {
								$con = true;
							} else {
								$coner .= " | Ping Error: ".$mysqli->error;
							}			
						} catch (\Throwable $e) {
							$coner = $e->getMessage();
						}	
					} else { $erroremptyrcced = true; $_SESSION["hive_installer_block"] = $_SESSION["hive_installer_block"] + 1; }	
			} else { $csrf = "<div class='alert alert-danger'><b>CSRF Form Protection Error</b><br /> Please Try Again, the form you have executed is expired.</div>"; }	
			$postsend = true;
		} $_SESSION["csrf_hive_installer"] = mt_rand(1000000, 9999999); 

		/*******************************************************************************************************
			Headers for Style and Website of Installation
		*******************************************************************************************************/			
		hive__default_volt_header($object, "Installation", "", "dark", "", true, "data:image/x-icon;base64,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4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f+yrab/PDcx/z03Mf89NjH/PDcx/z03Mf89NzH/PTcx/z03Mf89NzH/npmS/+zo4f/s6OH/7ejg/+3o4f/t6OD/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3p4f/t6OH/7ejh/+zo4f/t6OH/7ejh/+3o4f/t6OH/7ejh/7Kspv89NzH/PTcx/z03Mf89NzH/PTcx/z02Mf88NzH/PTcx/z03Mf+emZL/7Ojh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3p4f/s6OH/7ejh/+3o4f/t6OD/7enh/+3o4f/t6OH/7enh/+3o4f/t6OH/7ejh/+3p4f/t6eH/sqym/z03Mf89NzH/PTcw/z03Mf88NzH/PTcx/z03Mf89NzD/PTcx/56Zkv/t6OH/7ejh/+zo4f/t6OH/7enh/+3o4f/t6eH/7Ojh/+3o4f/t6OH/7ejh/+3o4P/t6eH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f+zrKb/PTcx/zw3Mf88NzH/PTYx/z03MP89NjH/PTcx/z03Mf89NzH/npmS/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OD/7ejh/+3o4f/t6OD/7ejh/+3o4f/t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6OD/7Ojh/7Kspv88NzH/PTcx/z02Mf89NzD/PTcx/z03Mf89NzH/PTYx/z03MP+emZL/7ejh/+3o4f/t6OH/7enh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eD/7ejh/+3o4P/t6OH/sqym/z03Mf88NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PDcx/56Zkv/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f+zrKb/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/npmS/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/s6OH/7ejh/+3o4f/t6OH/7ejh/+zo4f/s6OH/7ejh/+3o4f/t6OH/7enh/+3o4f/t6OH/7ejg/7Kspv89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NjH/PTcx/zw3Mf+emZL/7ejh/+3o4f/t6OH/7Ojh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejg/+3o4f/s6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/sqym/z03Mf89NzH/PTcx/z03Mf88NzH/PTcx/z03Mf89NzH/PTcx/56Zkv/t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6eH/7ejg/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+zo4f/t6OH/7ejh/+3o4f/t6OH/7Ojh/+3o4f+yrKb/PTYx/z03Mf89NzH/PTcx/z03Mf89NjH/PTcx/z03Mf89NzH/npmS/+3o4f/t6OH/7ejh/+3o4f/s6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+zo4f/t6OH/7ejh/+3o4f/t6OH/7Ojh/+3p4f/t6OH/7ejh/7Kspv89NjH/PTcx/z03Mf89NzH/PDcx/z03Mf89NzH/PTcx/z03Mf+ee03/7bFj/+yxY//ssWP/7LFj/+yxY//ssWP/7LFj/+yxY//ssWP/7LFj/+yxYv/ssWP/7LFj/+ywY//ssWP/7LFj/+yxY//ssWP/7LFj/+yxY//ssWP/sohS/z03Mf89NzH/PTcx/z03MP88NzH/PTcx/z03Mf89NzH/PTcx/41sQf/urFX/7qxV/+6sVP/urFX/7qxV/++sVf/urFX/76xV/+6sVP/urFX/7qxV/+6sVf/urFX/7qxU/+6sVf/urFX/76xV/+6sVf/vrFX/7qxV/+6sVf+heUX/PDcx/zw2Mf89NzH/PTcx/z03Mf88NzH/PTcx/z03Mf89NzH/Rj0y/6uAR//GkU3/xpFM/8aRTP/GkEz/xpFM/8aRTP/GkU3/xpFM/8eRTP/GkUz/xpFN/8aRTP/GkUz/xpFM/8aRTP/GkUz/xpFM/8aRTP/GkUz/soRI/05CNP88NzH/PTcx/z03Mf89NzD/PTYx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTYx/z03MP89NzH/PTcx/z03Mf89NzD/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcw/z03Mf89NzH/PTcx/z03Mf89NzH/PTYx/z03Mf89NjH/PTcx/z03Mf89NzH/PDcx/z03Mf89NzH/PTcw/z03Mf89NzD/enRu/4uGgP+LhoD/i4aA/4qGgP+LhoD/i4eA/4uGgP+LhoD/i4aA/4uGgP+LhoD/i4aA/4uGgP+LhoD/i4aA/4uFf/9YU0z/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/05IQv/t6OH/7ejh/+zo4f/t6OH/7ejg/+3o4f/t6OH/7ejh/+3o4f/t6OH/wby1/4uGgf+LhoD/i4aA/4uGgP/t6OH/7ejh/6+po/89NzD/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03MP89NzH/UUpE/+zo4P/t6OH/7ejh/+3p4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f+emZL/PTcx/z03Mf89NzH/PTcx/+zn4P/t6OH/sqym/z03Mf89NjH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzD/PTYx/z03Mf88NzH/PDcx/z03Mf9QSkT/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7enh/+3p4f/t6eH/7ejh/56Zkv89NzH/PTcx/z03MP89NzH/7Ofg/+3o4f+yrKb/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTYx/1BKRP/t6OD/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6OD/7Ojh/+3o4f/t6OH/npmS/z03Mf89NzH/PTcx/z03Mf/s5+D/7ejh/7Kspv88NzD/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PDcx/z03Mf89NzH/PTcx/zw3Mf89NzH/UEpE/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4f+emZL/PTcx/z03Mf89NzD/PTcx/+3n4P/s6OH/sq2m/z03Mf89NzH/PTcx/z02Mf89NzH/PTcx/z03Mf88NjH/PTcx/z03MP89NzH/PTcx/z03MP9QSkT/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/s6OH/7ejh/56Z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4f/t6OH/7Ojh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/5uLb/3Zxav89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcwnj03Mek9NjH/PTcx/z03Mf89NzH/PTcx/1tVT//h3NX/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6OH/7ejh/83Iwf9JQz3/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx4z03Mf09NzH/PTcx/z03Mf89NjH/PTcx/2ljXf/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/9nUzf9ZU03/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PDcx/j03MP89NzH/PTcx/z03Mf89NzH/PTcx/2pkXv/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4P/t6OH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NjH/PTcx/z03Mf89NzH/PTcx/z03MP89NjH/PTcx/z03Mf89NzH/PTcx/2pkXv/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/2pkXv/t6eH/7ejh/+3o4f/t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4P/t6OH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/2pkXv/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/9nUzf9aVE7/PTcx/z03MP89NjH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NjH/PTcx/2pkXv/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PDcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/2pkXv/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7Ojh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NjH/PTcx/z03Mf89NzH/PTcx/2pkXv/t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6eH/7Ojh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/9nUzP9aVE7/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/2pkX//t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/2pkXv/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7Ojh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03MP89NzH/PTcx/z03MP89NzH/PTcx/2pkXv/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4P/t6eH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6OH/7ejh/9nUzf9aVE7/PTcx/z03MP89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03MP89NzH/PTcx/2pkXv/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7Ojh/9nUzf9aVE7/PTcx/z03Mf89NzH/PDcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NjH/PTcx/2pkXv/t6OH/7ejh/+3o4f/t6OH/7Ojh/+3o4f/t6OH/7ejh/+3o4P/t6OH/7Ojh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03MP89NzH/PTcx/z03Mf89NzH/PTcx/2pkXv/t6OH/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/9nUzP9aVE7/PTcx/z03MP89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/2pkXv/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7Ojh/+3o4f/t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NjH/PDcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/2pkXv/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NzH/PDcx/z03Mf89NjH/PTcx/z03Mf89NzH/PDcx/z03Mf89NzH/PTcx/2pkXv/t6OH/7Ojh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/2peUP/sz6n/7M+p/+zPqf/sz6n/7c+p/+zPqP/szqn/7M+p/+zPqP/sz6n/7M+p/+zPqP/sz6n/7M+p/+zPqf/sz6n/7M+p/+zPqf/sz6n/7M+p/+zPqf/sz6n/7c+p/+zPqf/sz6n/7M+p/+zPqf/sz6n/7M+p/+zPqf/sz6n/7M+p/9i+m/9aUEX/PTcx/z03Mf89NzH/PDcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/2pWPf/urlr/7a5a/+2uWv/trlr/7a5a/+2uWv/trlr/7a5a/+2uW//trlr/7a5a/+2uWv/trlr/7a5a/+2uWv/trlr/7a5a/+2uWv/trlr/7a5a/+2uW//trlr/7K5a/+2uWv/trlr/7a5a/+2uWv/trlr/7a5a/+2uW//trlr/7a5a/9qgVP9aSjj/PTcx/z03Mf89NzH/PTcx/z03MP89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/2FPOP/qqVT/7qxV/+6sVf/urFX/7qxV/+6sVf/urFX/7qxV/+6sVP/urFX/7qxV/+6sVf/urFX/76xV/+6sVf/urFX/7qxV/+6sVP/urFX/7qxV/+6sVf/urFX/7qxV/+6sVP/urFX/7qxV/+6sVf/urFX/76xV/+6sVf/urFX/7qxV/9acUP9SRTX/PTcx/z03Mf89NzH/PDcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03MP89NzH/PTcx/0tBNP++jEv/7atV/+6sVf/urFX/7qxV/+6sVf/urFX/7qxV/+6sVf/urFX/7qxV/+6sVf/urFX/7qxV/+6sVf/urFX/7qxV/+6sVf/urFX/7qxV/+6sVf/urFX/7qxV/+6sVf/urFX/7qxV/+6sVf/urFX/7qxV/+6sVP/urFX/7atV/593Rf8/ODH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z44Mf9VRzb/k29D/6uASP+rgEf/q4BH/6uAR/+rgEf/q4BH/6uAR/+rgEf/q4BH/6uAR/+rgEf/q4BH/6uAR/+rgUf/qoBH/6uAR/+rgEf/q4BH/6uAR/+rgUf/q4BH/6uAR/+rgEf/q4BH/6uAR/+rgEf/q4BH/6yAR/+nfUb/fGE9/0Y9M/89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PDcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03MP89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PDcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NjH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03MP89NzH/PTcx/z03MP89NzH/PTcx/z03Mf89NzH/PTcx/z03MP89NzH/PTcx/z03Mf89NjH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03MP89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NjH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NjH/PTcx/z03Mf89NzH/PTcx/z03Mf9jXVf/s66n/8C6tP/Au7T/wLq0/8C6tP/Au7T/wLq0/8C6tP/AurT/wLq0/8C6tP/AurT/wLq0/8C6tP/AurT/wLq0/8C6tP/AurT/wLq0/8C6tP/AurT/wLq0/8C6tP/AurT/vrmy/4aAev8+ODL/PTcx/z03Mf89NzH/PTcx/z03MP89NzH/PTcx/z03Mf89NzH/PTcx/z03MP89NzH/PTcx/z03Mf89NjH/PTcx/z03Mf89NzH/PTcx/0I8Nv+kn5j/7ejh/+3o4f/t6OH/7Ojh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6OH/y8a//8C6tP/AurT/wLq0/8C6tP/AurT/wbq0/+3o4f/t6OH/7ejh/9fSy/9VT0n/PTcx/z03Mf89NzH/PTcx/z03MP89NjH/PTcx/z03Mf89NjH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/0Q+OP+oo5z/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7Ojh/+3o4f/t6OH/amRe/z03Mf89NzH/PTcx/z03Mf89NjH/PDcx/+zn4P/t6OH/7ejh/9nUzf9aVE7/PDcx/z03Mf89NzH/PTcx/z03MP89NzH/PTcx/z03Mf89NzH/PDcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03MP89NzH/PTcx/0Q+OP+oo5z/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6OH/amRe/z03MP89NzH/PTcx/z03MP89NzH/PTcx/+zn4P/t6OH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PDcx/0Q+OP+oo5z/7Ojh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6OH/amRe/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/+zn4P/t6OH/7Ojh/9nUzf9aVE7/PTcx/z03MP89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/0Q+OP+oo5z/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/amRe/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/+zn4P/t6OH/7Ojh/9nUzf9aVE7/PTcx/z03Mf89NzH/PTcx/z03Mf89NjH/PTcx/z03Mf89NzH/PTcx/z03MP89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/0Q+OP+oo5z/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/+3o4P/t6OH/7ejh/+3o4P/t6OH/amRe/z03Mf89NjH/PTcx/z03Mf89NzH/PTcx/+zn4P/t6OH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03MP89NzH/PDcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/0Q+OP+oo5z/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/amRe/z03MP89NzH/PTcx/z03MP89NzH/PTcx/+zn4P/t6OH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03MP89NzH/PDcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/0Q+OP+oo5z/7Ojh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/a2Re/z03Mf89NzH/PTcx/z03Mf89NzH/PDcx/+zn4P/t6OH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NjH/PTcx/z03Mf89NzH/PTcx/0Q+OP+oo5z/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4P/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/amRe/z03MP89NzH/PTcx/z03Mf89NzH/PTcx/+zn4P/t6OH/7ejh/9nUzP9aVE7/PDcx/z03Mf89NzH/PDcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/0Q+OP+oopz/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6eH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/amRe/z03Mf89NzH/PDcx/z03Mf89NzH/PTcx/+zn4f/t6OH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NjH/PTcx/z03Mf89NjH/PDcx/j03Mf89NzH/PTcx/z03Mf89NzH/PTcx/z03Mf89NjH/PTcx/z03Mf89NzH/PTcx/0Q+OP+oo5z/7ejh/+3o4f/t6OH/7ejh/+3o4P/t6eH/7ejh/+3o4f/t6OH/7ejh/+3o4f/t6OH/7Ojh/+3o4P/t6OH/amRe/z03Mf89NzH/PTcx/z03Mf89NzH/PTcx/+zn4f/t6eH/7ejh/9nUzf9aVE7/PTcx/z03Mf89NzH/PTcx/z03Mf89NzH/PDYy4j03MP89NzH/PTcx/z03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", true); ?>
		
		<!--
			//////////////////////////////////////////////////////
			// Output Main Content
			//////////////////////////////////////////////////////
		-->
        <div class="container mb-5 mt-5">
        <div class="row justify-content-center form-bg-image" >
        <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
		<?php if(!$do OR $erroremptyr OR $erroremptyu OR $erroremptyd OR !$con OR $coner OR @$erroremptyrcced) { ?>
			<h1><?php echo _INSTALLER_TITLE_; ?></h1>
			   <p>You're about to install this software on your server. The next steps will guide you through the process. If all requirements are met, the installer will proceed to create the 'settings.php' file in your website's root folder, marking the successful installation of this software.</p>
				<?php if(@$_GET["install_step"] != "last") { ?>
					<b>Requirements</b><br />Please verify if your server meets the necessary requirements. A green checkmark indicates compatibility, while a red crossmark signals that dependencies need to be addressed.<br /><br />
					<?php
						// Check if the Apache server is running
						if (function_exists('apache_get_version')) {
							// Get the Apache version
							$apacheVersion = apache_get_version();
							// Check if the version starts with "Apache/2"
							if (strpos($apacheVersion, 'Apache/2') === 0) {
								echo "<font color='green'>&#9989;</font> Apache2 version is 2.4.";
							} else {
								echo "<font color='red'>&#10060;</font> - Apache version is not 2.4 like expected.";
							}
						} else {
							echo "<font color='blue'>&#8505;&#65039;</font> Unable to verify active apache2 version to be 2.4. Please ensure by yourself that the running apache version is 2.4";
						}
					?><br />
					<?php
						// Check if the Apache server is running
						if (function_exists('apache_get_modules')) {
							if (in_array('rewrite_module', apache_get_modules())) {
								echo "<font color='green'>&#9989;</font> The Apache mod_rewrite module is enabled.";
							} else {
								echo '<font color=\'red\'>&#10060;</font> - The Apache mod_rewrite module is not enabled.';
							}
						} else {
							echo "<font color='blue'>&#8505;&#65039;</font> Unable to verify active mod_rewrite for apache2. Please ensure that mod_rewrite for apache2 is enabled.";
						}
					?>	<br />
					<?php 
						// Get the PHP version
						$php_version = phpversion();
						// Extract the major and minor version parts
						list($major, $minor) = explode('.', $php_version);

						// Convert to integers for comparison
						$major = (int) $major;
						$minor = (int) $minor;

						// Check if version is >= 8.4 and < 9
						if ($major === 8 && $minor >= 4) {
							echo "<font color='green'>&#9989;</font> PHP version is 8.4 or higher but less than 9.";
						} else {
							echo "<font color='red'>&#10060;</font> Please upgrade or downgrade the PHP version to >= 8.4 and < 9.";
						}
					?>	<br />
					<?php
						// Check if the Apache server is running
						if (function_exists('extension_loaded')) {
							if (extension_loaded('mysqli')) {
								echo '<font color=\'green\'>&#9989;</font> The PHP mysqli extension is enabled.';
							} else {
								echo '<font color=\'red\'>&#10060;</font> The PHP mysqli extension is not enabled.';
							}
						} else {
							echo "<font color='blue'>&#10060;</font> Status of mysqli PHP Module cannot be verified.";
						}
					?>		<br />
					<?php
						// Check if the Apache server is running
						if (function_exists('extension_loaded')) {
							if (extension_loaded('xml')) {
								echo '<font color=\'green\'>&#9989;</font> The PHP xml extension is enabled.';
							} else {
								echo '<font color=\'red\'>&#10060;</font> The PHP xml extension is not enabled.';
							}
						} else {
							echo "<font color='blue'>&#10060;</font> Status of xml PHP Module cannot be verified.";
						}
					?>		<br />
					<?php
						// Check if the Apache server is running
						if (function_exists('extension_loaded')) {
							if (extension_loaded('mbstring')) {
								echo '<font color=\'green\'>&#9989;</font> The PHP mbstring extension is enabled.';
							} else {
								echo '<font color=\'red\'>&#10060;</font> The PHP mbstring extension is not enabled.';
							}
						} else {
							echo "<font color='blue'>&#10060;</font> Status of mbstring PHP Module cannot be verified.";
						}
					?>		<br />
					<?php
						// Check if the Apache server is running
						if (function_exists('extension_loaded')) {
							if (extension_loaded('curl')) {
								echo '<font color=\'green\'>&#9989;</font> The PHP curl extension is enabled.';
							} else {
								echo '<font color=\'red\'>&#10060;</font> The PHP curl extension is not enabled.';
							}
						} else {
							echo "<font color='blue'>&#10060;</font> Status of curl PHP Module cannot be verified.";
						}
					?>		<br />
					<?php
						// Check if the Apache server is running
						if (function_exists('extension_loaded')) {
							if (extension_loaded('zip')) {
								echo '<font color=\'green\'>&#9989;</font> The PHP zip extension is enabled.';
							} else {
								echo '<font color=\'red\'>&#10060;</font> The PHP zip extension is not enabled.';
							}
						} else {
							echo "<font color='blue'>&#10060;</font> Status of zip PHP Module cannot be verified.";
						}
					?>	<br />
					<?php
						// Check if the Apache server is running
						if (function_exists('extension_loaded')) {
							if (extension_loaded('ctype')) {
								echo '<font color=\'green\'>&#9989;</font> The PHP ctype extension is enabled.';
							} else {
								echo '<font color=\'red\'>&#10060;</font> The PHP ctype extension is not enabled.';
							}
						} else {
							echo "<font color='blue'>&#10060;</font> Status of ctype PHP Module cannot be verified.";
						}
					?>		<br />
					<?php
						// Check if the Apache server is running
						if (function_exists('extension_loaded')) {
							if (extension_loaded('filter')) {
								echo '<font color=\'green\'>&#9989;</font> The PHP filter extension is enabled.';
							} else {
								echo '<font color=\'red\'>&#10060;</font> The PHP filter extension is not enabled.';
							}
						} else {
							echo "<font color='blue'>&#10060;</font> Status of filter PHP Module cannot be verified.";
						}
					?>		<br />
					<?php
						// Check if the Apache server is running
						if (function_exists('extension_loaded')) {
							if (extension_loaded('json')) {
								echo '<font color=\'green\'>&#9989;</font> The PHP json extension is enabled.';
							} else {
								echo '<font color=\'red\'>&#10060;</font> The PHP json extension is not enabled.';
							}
						} else {
							echo "<font color='blue'>&#10060;</font> Status of json PHP Module cannot be verified.";
						}
					?>		<br />
					<?php
						// Check if the Apache server is running
						if (function_exists('extension_loaded')) {
							if (extension_loaded('intl')) {
								echo '<font color=\'green\'>&#9989;</font> The PHP intl extension is enabled.';
							} else {
								echo '<font color=\'red\'>&#10060;</font> The PHP intl extension is not enabled.';
							}
						} else {
							echo "<font color='blue'>&#10060;</font> Status of intl PHP Module cannot be verified.";
						}
					?>		<br />
					<?php
						// Check if the Apache server is running
						if (function_exists('extension_loaded')) {
							if (extension_loaded('fileinfo')) {
								echo '<font color=\'green\'>&#9989;</font> The PHP fileinfo extension is enabled.';
							} else {
								echo '<font color=\'red\'>&#10060;</font> The PHP fileinfo extension is not enabled.';
							}
						} else {
							echo "<font color='blue'>&#10060;</font> Status of fileinfo PHP Module cannot be verified.";
						}
					?>		<br />
					<?php
						// Check if the Apache server is running
						if (function_exists('extension_loaded')) {
							if (extension_loaded('gd')) {
								echo '<font color=\'green\'>&#9989;</font> The PHP gd extension is enabled.';
							} else {
								echo '<font color=\'red\'>&#10060;</font> The PHP gd extension is not enabled.';
							}
						} else {
							echo "<font color='blue'>&#10060;</font> Status of gd PHP Module cannot be verified.";
						}
					?>		<br />
					<?php
						// Check if the Apache server is running
						if (function_exists('extension_loaded')) {
							if (extension_loaded('bcmath')) {
								echo '<font color=\'green\'>&#9989;</font> The PHP bcmath extension is enabled.';
							} else {
								echo '<font color=\'red\'>&#10060;</font> The PHP bcmath extension is not enabled.';
							}
						} else {
							echo "<font color='blue'>&#10060;</font> Status of bcmath PHP Module cannot be verified.";
						}
					?>		<br />
					<?php
						// Check if the Apache server is running
						if (function_exists('extension_loaded')) {
							if (extension_loaded('pdo')) {
								echo '<font color=\'green\'>&#9989;</font> The PHP pdo extension is enabled.';
							} else {
								echo '<font color=\'red\'>&#10060;</font> The PHP pdo extension is not enabled.';
							}
						} else {
							echo "<font color='blue'>&#10060;</font> Status of pdo PHP Module cannot be verified.";
						}
					?>	<br />
					<?php 
						// Get the memory limit from php.ini
						$memoryLimit = ini_get('memory_limit');
						// Convert the memory limit to bytes for comparison
						function convertToBytes($value) {
							$value = trim($value);
							$last = strtolower($value[strlen($value) - 1]);
							$value = (int)$value;
							switch ($last) {
								case 'g':
									$value *= 1024 * 1024 * 1024;
									break;
								case 'm':
									$value *= 1024 * 1024;
									break;
								case 'k':
									$value *= 1024;
									break;
							}
							return $value;
						}
						// Convert the memory limit to bytes
						$memoryLimitBytes = convertToBytes($memoryLimit);
						// Define 128MB in bytes
						$requiredMemoryLimitBytes = 128 * 1024 * 1024;
						// Check if the memory limit is greater than or equal to 128MB
						if ($memoryLimitBytes >= $requiredMemoryLimitBytes) {
							echo "<font color='green'>&#9989;</font> Your PHP Memory Limit to 256MB.";
						} else {
							echo "<font color='red'>&#10060;</font> Please increase the PHP Memory Limit to 256MB.";
						}			
					?>		<br />
					<?php 
						if (is_writable("./")) {
							echo "<font color='green'>&#9989;</font> The website directory is writable.";
						} else {
							echo "<font color='red'>&#10060;</font> The website directory isn't writable.";
						}		
					?>	
					<!-- Button to show next Step -->
					<br clear="both"><br />
					<a href="?install_step=last" class="btn btn-primary">Next</a>
							
				<?php } else { ?>
					
					<!--
						//////////////////////////////////////////////////////
						// Configuration Area
						//////////////////////////////////////////////////////
					-->					
					<b>Configuration</b><br />Enter the required data to install the CMS software on your server. All fields are mandatory, with MySQL details being crucial. Errors will be indicated for review.
					<br />
					<br />
					<form method="post" action="?install_step=last">				
						<input type="hidden" name="csrf" value="<?php echo $_SESSION["csrf_hive_installer"]; ?>">
						<?php if(_INSTALLER_CODE_ != false AND _INSTALLER_CODE_ != "") { ?>
						<b>Installation Code</b>: <br /><small>Provide Installation Code to install this software! You can find the installer code in /cfg_ruleset.php!</small><br />
						<?php if(@$erroremptyrcced) { echo "<b><div class='alert alert-danger'>Please provide a valid installer code!</div></b>"; } ?>
						<input type="password" name="installer_code" class="form-control" placeholder="Installer Code" value="<?php if(!is_string(@$_POST["installer_code"])) { echo ""; } else { echo hive__hen(@$_POST["installer_code"]);} ?>"> <br />
						<?php }?>
						<?php echo @$csrf; if($coner) { echo "<b><div class='alert alert-danger'>MySQL Error</b>: ".$coner."</div>"; } ?>
						<b>MySQL Hostname</b>: <br /><small>The hostname of the MySQL Server you want to connect to.</small><br />
						<input type="text" name="mysql_host" class="form-control" value="<?php if(!is_string(@$_POST["mysql_host"])) { echo "localhost"; } else { echo hive__hen(@$_POST["mysql_host"]);} ?>">
						<br />
						<b>MySQL Port</b>: <br /><small>The port of the MySQL Server you want to connect to.</small><br />
						<input type="number" name="mysql_port" class="form-control" value="<?php if(!is_numeric(@$_POST["mysql_port"])) { echo "3306"; } else { echo hive__hen(@$_POST["mysql_port"]);} ?>">
						<br />
						<b>MySQL Username</b>: <br /><small>The username to connect to the MySQL Server.</small><br />
						<input type="text" name="mysql_user" class="form-control" value="<?php if(!is_string(@$_POST["mysql_user"])) { echo "root"; } else { echo hive__hen(@$_POST["mysql_user"]);} ?>"> 
						<br />
						<b>MySQL Password</b>: <br /><small>The password to connect to the MySQL Server.</small><br />
						<input type="password"  class="form-control" name="mysql_pass">
						<br />
						<b>MySQL Database</b>: <br /><small>The name of the MySQL Database you want to connect to.</small><br />
						<?php if($erroremptyd) { echo "<b><div class='alert alert-danger'>Invalid database name!</div></b>"; } ?>
						<input type="text"  class="form-control" name="mysql_db" value="<?php if(!is_string(@$_POST["mysql_db"])) { echo ""; } else { echo hive__hen(@$_POST["mysql_db"]);} ?>"> 
						<br />
						<b>Document Root</b>: <br /><small>Specify the document root folder for your website. This is auto-determined and usually correct by default. Add a trailing slash.</small><br />
						<?php if($erroremptyr) { echo "<b><div class='alert alert-danger'>Please provide a valid document root!</div></b>"; } ?>
						<input type="text"  class="form-control" name="doc_root" value="<?php if(!is_string(@$_POST["doc_root"])) { echo substr(dirname(__FILE__), 0)."/"; } else { echo hive__hen(@$_POST["doc_root"]);} ?>"> 
						<br />						
						<b>Website URL</b>: <br /><small>Enter the website URL, including http or https. Installation inside a subfolder of your website root is not recommended.</small><br />
						<?php if($erroremptyu) { echo "<b><div class='alert alert-danger'>Please enter the public URL where this page will be accessible.</div></b>"; } 	
						if (isset($_SERVER['HTTPS']) &&
							($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
							isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
							$_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
						  $protocol = 'https://';
						}
						else {
						  $protocol = 'http://';
						}
						?>
						<input type="text"   class="form-control" name="website_url" value="<?php if(!is_string(@$_POST["website_url"])) { 
							if(@strlen(@dirname(@trim(@$_SERVER["REQUEST_URI"]))) > 2) { 
								echo $protocol.$_SERVER["HTTP_HOST"]."".@dirname(@$_SERVER["REQUEST_URI"])."/"; 
							} else {
								echo $protocol. $_SERVER["HTTP_HOST"]."/"; 
							}
						} else { echo hive__hen(@$_POST["website_url"]);} ?>">
						<br />
						<b>Cookie Prefix</b>: <br /><small>Prefix for Sessions and Cookies.</small><br />
						<?php if(@$erroremptyux) { echo "<div class='alert alert-danger'>Please enter a valid Cookie Prefix!</div>"; } ?>
						<input type="text"  class="form-control" maxlength="5" name="website_cookie" value="<?php if(!is_string(@$_POST["website_cookie"])) {  echo _INSTALLER_COOKIE_;} else { echo hive__hen(@$_POST["website_cookie"]);} ?>"> 
						<br />
						<b>Table Prefix</b>: <br /><small>Prefix for MySQL Tables.</small><br />
						<?php if(@$erroremptyuy) { echo "<div class='alert alert-danger'>Please enter a valid Table Prefix!</div>"; } ?>				
						<input type="text"  class="form-control" maxlength="5" name="website_prefix" value="<?php if(!is_string(@$_POST["website_prefix"])) { echo _INSTALLER_PREFIX_; } else { echo hive__hen(@$_POST["website_prefix"]);} ?>">
						<br />
						<b>Encryption Secret</b>: <br /><small>If restoring an existing instance, you must use the same encryption key because the data in the database is encrypted with it. For new installations, this field can be left blank and a new key will be generated automatically.</small><br />			
						<input type="text" class="form-control" maxlength="25" name="secret_key" value="<?php if(is_string(@$_POST["secret_key"])) { echo hive__hen(@$_POST["secret_key"]);} ?>">
						<br /><a href="?install_step=nolast" class="btn btn-primary">Back</a> 
						 <button type="submit" class="btn btn-primary">Start Installation</button>
					</form>
				<?php } ?>
				
			<?php } else { ?>

				<!--
					//////////////////////////////////////////////////////
					// Execute Configuration
					//////////////////////////////////////////////////////
				-->	
				<h1><?php echo _INSTALLER_TITLE_; ?></h1>
					<?php
						function generateRandomString($length = 20) {
							$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
							$charactersLength = strlen($characters);
							$randomString = '';
							for ($i = 0; $i < $length; $i++) {
								$randomString .= $characters[random_int(0, $charactersLength - 1)];
							}
							return $randomString;
						}
						$_POST["website_url"] = rtrim($_POST["website_url"], '/');	
						if(trim(@$_POST["secret_key"] ?? '') == "") {
							$_POST["secret_key"] = generateRandomString(20);
						}
						$code = "<?php
	/* 
		-------------------------------------------------------------------------------
		Suitefish Settings File (Made by onpage Installation)
		-------------------------------------------------------------------------------
		Generated Settings.php File by Installer at ".date("Y-m-d H:i")."
	*/

	/***********************************************************************************************************
		MySQL Settings
	***********************************************************************************************************/	
	\$mysql['host'] = '".str_replace("'", "\\'",str_replace("\\", "\\\\", $_POST["mysql_host"]))."'; # MySQL Hostname
	\$mysql['port'] = '".str_replace("'", "\\'",str_replace("\\", "\\\\",$_POST["mysql_port"]))."'; # Mysql Port
	\$mysql['user'] = '".str_replace("'", "\\'",str_replace("\\", "\\\\",$_POST["mysql_user"]))."'; # MySQL User
	\$mysql['pass'] = '".str_replace("'", "\\'",str_replace("\\", "\\\\",$_POST["mysql_pass"]))."'; # MySQL Password
	\$mysql['db'] 	= '".str_replace("'", "\\'",str_replace("\\", "\\\\",$_POST["mysql_db"]))."'; # MySQL Database
	\$mysql['prefix'] 	= '".str_replace("'", "\\'",str_replace("\\", "\\\\",$_POST["website_prefix"]))."'; # MySQL Prefix for Tables
	
	/***********************************************************************************************************
		Site Settings
	***********************************************************************************************************/	
	\$object['cookie'] 	= '".str_replace("'", "\\'",str_replace("\\", "\\\\",$_POST["website_cookie"]))."'; # Cookie Prefix for Cookies and Sessions
	\$object['path'] 	= '".str_replace("'", "\\'",str_replace("\\", "\\\\",$_POST["doc_root"]))."'; # Full Path to Document Root
	\$object['url'] 	= '".str_replace("'", "\\'",str_replace("\\", "\\\\",$_POST["website_url"]))."'; # Full URL with www/protocol and no trailing slash

	/***********************************************************************************************************
		All Docker Instances should have this Constant set to true.
		Can have name of module as value which its specialized for in docker
	***********************************************************************************************************/
	if(!defined(\"_HIVE_IS_IN_DOCKER_\")) { define(\"_HIVE_IS_IN_DOCKER_\", false); } 	

	/***********************************************************************************************************
		Secret Key
	***********************************************************************************************************/
	\$object['secret_key']	= '".str_replace("'", "\\'",str_replace("\\", "\\\\",$_POST["secret_key"]))."';  // Use a random number or String	
";
						if(file_put_contents( "./settings.php", $code)) { ?>
							<div class="alert alert-success">
								Congratulations, the installation is completed.
							</div>
						
							<p><b>You can login to your CMS now using the credentials:</b><br />Username: admin@admin.local<br />Password: changeme</p>
							<div class="alert alert-warning">Change your password as soon as possible!</div>
							
							<a href="/" class="btn btn-primary">Finish</a> <?php
						} else { 
							?>
							<div class="alert alert-danger">
								The installation has failed, you can retry the installation or create the settings.php file yourself.
							</div>
							<small>Settings.php file content:</small>
							<textarea class="form-control">
								<?php echo $code; ?>
							</textarea>
							<ul>
								<li>Copy the code to a file named settings.php.</li>
								<li>Upload that file to your webservers websites root directory.</li>
								<li>The software should then be installed.</li>
							</ul>
							<a href="?install_step=nolast" class="btn btn-primary">Retry</a> 
							<?php
						}
				?>
			<br clear="both">
			
		<?php } ?>

		<!--
			//////////////////////////////////////////////////////
			// End Box
			//////////////////////////////////////////////////////
		-->	
		</div></div></div></div>

		<!--
			//////////////////////////////////////////////////////
			// Display the Footer
			//////////////////////////////////////////////////////
		-->		 
		<?php hive__default_volt_footer();
	}