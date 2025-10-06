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
	
	/***************************************************************************************************	
		Disable Hardlinking
	***************************************************************************************************/	
	if(!is_array(@$object)) { @http_response_code(@404); @Header("Location: ../"); exit(); }
	
	/***************************************************************************************************		
		Site Module/Extension Module Meta Data Information Retrieval
	***************************************************************************************************/	
		function hive__init_site_header($object, $sitemod_name = false) {
			// Prepare Array
			$array = array();
			// Precheck Sitemod Name
			if(!$sitemod_name) { $sitemod_name = _HIVE_MODE_; }
			// Data
			if(defined("_HIVE_PRE_SITE_")) { 
				if(@_HIVE_PRE_SITE_[$sitemod_name]) {
					$array["info"] = @_HIVE_PRE_SITE_[$sitemod_name];
				} else { return false; }
			} else { return false; }
			$array["path"]  	 			= $object["path"]."/_site/".$sitemod_name."/";
			$array["name"]   				= $sitemod_name;
			$array["prefix"] 				= _HIVE_PREFIX_."_".$sitemod_name."_";
			$array["cookie"] 				= _HIVE_COOKIE_."_".$sitemod_name."_";
			$array["prefix_variables"] 		= "___smd_".$sitemod_name."_";
			if(defined("_HIVE_PRE_LANG_SITE_")) { 
				$array["lang"]				= @_HIVE_PRE_LANG_SITE_[$sitemod_name];
			}
			if(!is_object(@$array["lang"])) { $array["lang"] = new x_class_lang(false, false, false, false, false); }
			// Return
			return $array;
		}
		
		function hive__init_extension_header($object, $extension_name, $sitemod_name = false) {
			// Prepare Array
			$array = array();
			// Precheck Sitemod Name
			if(!$sitemod_name) { $sitemod_name = _HIVE_MODE_; }
			// Data
			if(defined("_HIVE_PRE_EXTENSION_")) { 
				if(@_HIVE_PRE_EXTENSION_[$extension_name]) {
					$array["info"] = @_HIVE_PRE_EXTENSION_[$extension_name];
				} else { return false; }
			} else { return false; }
			$array["path"]   				= $object["path"]."/_data/".$sitemod_name."/_extension/".$extension_name."/";
			$array["name"]   				= $extension_name;
			$array["prefix"] 				= _HIVE_PREFIX_."_".$sitemod_name."__".$extension_name."_";
			$array["cookie"] 				= _HIVE_COOKIE_."_".$sitemod_name."__".$extension_name."_";
			$array["prefix_variables"] 		= "___ext_".$extension_name."_";		
			if(defined("_HIVE_PRE_LANG_EXTENSION_")) { 
				$array["lang"] 				= @_HIVE_PRE_LANG_EXTENSION_[$extension_name];
			}
			if(!is_object(@$array["lang"])) { $array["lang"] = new x_class_lang(false, false, false, false, false); }
			// Return
			return $array;
		}
		
		function hive__init_theme_header($object, $theme_name, $sitemod_name = false) {
			// Prepare Array
			$array = array();
			// Precheck Sitemod Name
			if(!$sitemod_name) { $sitemod_name = _HIVE_MODE_; }
			// Data
			if(defined("_HIVE_PRE_THEME_")) { 
				if(@_HIVE_PRE_THEME_[$theme_name]) {
					$array["info"] = @_HIVE_PRE_THEME_[$theme_name];
				} else { return false; }
			} else { return false; }
			$array["path"]   				= $object["path"]."/_data/".$sitemod_name."/_extension/".$theme_name."/";
			$array["name"]   				= $theme_name;
			$array["prefix"] 				= _HIVE_PREFIX_."_".$sitemod_name."__".$theme_name."_";
			$array["cookie"] 				= _HIVE_COOKIE_."_".$sitemod_name."__".$theme_name."_";
			$array["prefix_variables"] 		= "___the_".$theme_name."_";
			if(defined("_HIVE_PRE_LANG_THEME_")) { 
				$array["lang"] 				= @_HIVE_PRE_LANG_THEME_[$theme_name];
			}
			if(!is_object(@$array["lang"])) { $array["lang"] = new x_class_lang(false, false, false, false, false); }
			// Return
			return $array;
		}

	/***************************************************************************************************		
		Extension Functionalities
	***************************************************************************************************/		
		function hive__extension_path($hive_mode) {
			$hive_mode = basename($hive_mode);
			$array = array();
			if(is_dir(_HIVE_PATH_."/_data/".$hive_mode."/_extension")) { 
				foreach (glob(_HIVE_PATH_."/_data/".$hive_mode."/_extension/*") as $filename) {
					if(is_dir($filename)) { 
						array_push($array, $filename);
					}
				}		
			} return $array;	
		}
		function hive__theme_path($hive_mode) {
			$hive_mode = basename($hive_mode);
			$array = array();
			if(is_dir(_HIVE_PATH_."/_data/".$hive_mode."/_theme")) { 
				foreach (glob(_HIVE_PATH_."/_data/".$hive_mode."/_theme/*") as $filename) {
					if(is_dir($filename)) { 
						array_push($array, $filename);
					}
				}		
			} return $array;	
		}
		
	/***************************************************************************************************		
		File Include Functionalities
	***************************************************************************************************/	
		function hive__require_once($object, $filepath) { require_once($filepath); return true; }
		function hive__require($object, $filepath) { require($filepath); return true; }
		function hive__require_x($filepath) { $object = array(); require($filepath); return $x; }

	/***************************************************************************************************		
		Quick and Easy Functions
	***************************************************************************************************/	
		function hive__trim($string) {
			return trim($string ?? '');
		}
		function hive__hsc($string) {
			return htmlspecialchars($string ?? '', ENT_QUOTES);
		}
		function hive__hen($string) {
			return htmlentities($string ?? '', ENT_QUOTES);
		}
		
	/***************************************************************************************************		
		Check for Local or Remote Global Permissions (OR PERMISSION CHECK)
	***************************************************************************************************/	
		function hive__access($object, $rights_local, $global_search = false, $inital_override = true) {
			if(!$object["user"]->user_loggedIn) { return false; }
			// Initial CMS User is always Superadmin
			if($inital_override) { if(@$object["user"]->user["user_initial"] == 1) { return true; } }
			// Permission Checks
			if($global_search) { 
				// Check for Global Permissions
				if(!is_array($rights_local)) { $rights_local = array($rights_local); }
				// Check for Permission and Return
				if(is_array($rights_local)) {
					foreach($rights_local AS $key => $value) {
						// Does user have perm himself?
						if($object["user_perm_glob"]->has_perm($value)) { return true; }
						// Obtain Group Permission
						foreach($object["user_group"] as $groupkey => $groupvalue) { 
							if($groupvalue["perm_group_glob"]->has_perm($value)) { return true; }
						}
					}
				} return false;
			} else {
				// Check for Local Permissions
				if(!is_array($rights_local)) { $rights_local = array($rights_local); }
				// Check for Permission and Return
				if(is_array($rights_local)) {
					foreach($rights_local AS $key => $value) {
						// Does user have perm himself?
						if($object["user_perm"]->has_perm($value)) { return true; }
						// Obtain Group Permission
						foreach($object["user_group"] as $groupkey => $groupvalue) { 
							if($groupvalue["perm_obj"]->has_perm($value)) { return true; }
						}
					}
				} return false;
			}
		}

	/***************************************************************************************************		
		URL Functionalities
	***************************************************************************************************/	
		function  hive__url($array, $following_paramters = false) {
			if(!$following_paramters) {
				$extension_parameters = "";
			} else {
				if(_HIVE_URL_SEO_) {
					$extension_parameters = "/?";
				} else {
					$extension_parameters = "&";
				}
			}
			$url_rel = _HIVE_URL_REL_."";
			if(_HIVE_URL_SEO_) {
				foreach($array as $key => $value) {
					if($value == false) { break;}
					if($key == 0) {  } else {$url_rel .= "/";  }
					if(@is_string(@_HIVE_URL_GET_[$key]) AND @is_string($value)) { $url_rel .= $value; }}
			} else {
				foreach($array as $key => $value) {
					if($value == false) { break;}
					if($key == 0) { $url_rel .= "?"; } else {$url_rel .= "&";  }
					if(@is_string(@_HIVE_URL_GET_[$key]) AND @is_string($value)) { $url_rel .= _HIVE_URL_GET_[$key]."=".$value; }
				}}
				if(substr($url_rel, 0, 1) == "?") { return "/".$url_rel;}
			return $url_rel.$extension_parameters; }

	/***************************************************************************************************		
		Check for another Active Main Instance
	***************************************************************************************************/	
		function hive__is_main($object) {
			// Check is Mode is Set
			if(!defined("_HIVE_MODE_")) { return false; }
			// Check for Apache Set Site Mod
			if(@getenv("_HIVE_MODE_ENV_OVR_")) {
				if(@getenv("_HIVE_MODE_ENV_OVR_") == _HIVE_MODE_) {
					return true;
				}
			} 
			// If Admin Page Site is Set than Check if current Site is Admin Site
			if(_HIVE_ADMIN_SITE_) {
				if(_HIVE_ADMIN_SITE_ == _HIVE_MODE_) {
					return true;
				} else {
					return false;
				}
			}
			// Return True if Nothing Found in out simple logic
			return true;
		}		
	
	/***************************************************************************************************		
		Folder Functions
	***************************************************************************************************/	
		function hive__folder_create($folderpath, $forwardfile = false, $denie_access = false, $chmode = 0770) {
			if(!is_dir($folderpath)) {  @mkdir($folderpath, $chmode, true); }
			if(is_dir($folderpath)) {
				if($forwardfile) {
					if(!file_exists($folderpath."/index.php")) { 
						file_put_contents($folderpath."/index.php", "<?php
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
		HTTP 404 - Page not Found Response Code
	***********************************************************************************************************/
	http_response_code(404);

	/***********************************************************************************************************
		Forward to parent Directory
	***********************************************************************************************************/	
	Header(\"Location: ../\");");
					}
				}
				if($denie_access) { x_htaccess_secure($folderpath); }
			}
		}
	
	/***************************************************************************************************		
		Tail a File
	***************************************************************************************************/					
		function hive__file_tail($filename, $lines = 1000) {
			$buffer = 4096; // Adjust buffer size as necessary
			// Open the file in binary read mode
			$handle = @fopen($filename, "rb");
			if ($handle === false) {
				return false; // Failed to open file
			}
			// Move pointer to end of file
			fseek($handle, 0, SEEK_END);
			$file_size = ftell($handle);
			$output = '';
			$line_count = 0;
			// Read file in reverse order
			for ($pos = $file_size - 1; $pos >= 0; $pos -= $buffer) {
				fseek($handle, max(0, $pos - $buffer + 1), SEEK_SET);
				$chunk = fread($handle, min($buffer, $pos + 1));

				// Split chunk into lines
				$lines_in_chunk = explode(PHP_EOL, $chunk);

				// Process lines from chunk
				for ($i = count($lines_in_chunk) - 1; $i >= 0; $i--) {
					$line = $lines_in_chunk[$i];
					if ($line !== "") {
						$output = $line . PHP_EOL . $output;
						$line_count++;

						if ($line_count >= $lines) {
							fclose($handle);
							return $output;
						}
					}
				}
			}
			fclose($handle);
			return $output;
		}			

	/***************************************************************************************************		
		Hive Array Recursive Search
	***************************************************************************************************/	
		function hive__in_array($needle, $haystack) {
			foreach ($haystack as $item) {
				if (is_array($item)) {
					if (hive__in_array($needle, $item)) {
						return true;
					}
				} elseif ($item == $needle) {
					return true;
				}
			}
			return false;
		}	
