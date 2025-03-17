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
			API to get All Current Available Deployed Suitefish Releases
			if deployed via Administrator Panel or similar Site Module.
	*/
		
	/////////////////////////////////////////////////////////////////////////////////
	// Software Releases List
	/////////////////////////////////////////////////////////////////////////////////
		if(@$_GET["action"] == "software_list") { 
			
			// Folder containing the files
			$folder = '../_store/_software/_release/';

			// Get all files in the folder
			$files = glob($folder . '*.zip');

			// Array to store version numbers
			$versions = [];

			// Extract version numbers from filenames
			foreach ($files as $file) {
				$versions[] = basename($file);
			}

			// Sort the version numbers in descending order
			@rsort($versions);

			// Output the sorted version numbers
			echo @serialize($versions);
		
		}

	/////////////////////////////////////////////////////////////////////////////////
	// Software Releases Latest
	/////////////////////////////////////////////////////////////////////////////////
		if(@$_GET["action"] == "software_latest") { 	
		
			// Folder containing the files
			$folder = '../_store/_software/_release/';

			// Get all files in the folder
			$files = glob($folder . '*.zip');

			// Array to store version numbers
			$versions = [];

			// Extract version numbers from filenames
			foreach ($files as $file) {
				$versions[] = basename($file);
			}

			// Sort the version numbers in descending order
			@rsort($versions);

			// Output the sorted version numbers
			if(@$versions[0]) { echo @$versions[0]; }
			
		}

	/////////////////////////////////////////////////////////////////////////////////
	// CMS Releases List
	/////////////////////////////////////////////////////////////////////////////////
		if(@$_GET["action"] == "cms_list") { 
		
			// Folder containing the files
			$folder = '../_store/_core/_release/';

			// Get all files in the folder
			$files = glob($folder . '*.zip');

			// Array to store version numbers
			$versions = [];

			// Extract version numbers from filenames
			foreach ($files as $file) {
				$versions[] = basename($file);
			}

			// Sort the version numbers in descending order
			@rsort($versions);

			// Output the sorted version numbers
			echo @serialize($versions);
			
		}		
		
	/////////////////////////////////////////////////////////////////////////////////
	// CMS Releases Latest
	/////////////////////////////////////////////////////////////////////////////////
		if(@$_GET["action"] == "cms_latest") { 		
				
			// Folder containing the files
			$folder = '../_store/_core/_release/';

			// Get all files in the folder
			$files = glob($folder . '*.zip');

			// Array to store version numbers
			$versions = [];

			// Extract version numbers from filenames
			foreach ($files as $file) {
				$versions[] = basename($file);
			}

			// Sort the version numbers in descending order
			@rsort($versions);

			// Output the sorted version numbers
			if(@$versions[0]) { echo @$versions[0]; }
			
		}
		
	/////////////////////////////////////////////////////////////////////////////////
	// CMS Module Releases List
	/////////////////////////////////////////////////////////////////////////////////
		if(@$_GET["action"] == "module_list") { 

			// Require Settings File,  otherwhise stop execution
			if(file_exists("../settings.php")) { require_once("../settings.php"); }
				else { echo "This CMS is not yet installed. Please install this CMS by visiting the websites root folder!"; }

			// Output Empty Array if Current Website Error
			if(defined("_HIVE_CRIT_ER_")) { echo serialize(array()); exit(); }
			
			// Output current deployed modules for external instances as serialized array!
			$x_array = $object["mysql"]->select("SELECT * FROM "._TABLE_STORE_." ORDER BY mod_rname, mod_version DESC", true);
			if(is_array($x_array)) { 
				echo serialize($x_array);
			} else {
				echo serialize(array());
			}
			
		}
		
	/////////////////////////////////////////////////////////////////////////////////
	// CMS Module Releases Latest with RNAME
	/////////////////////////////////////////////////////////////////////////////////
		if(@$_GET["action"] == "module_latest") { 
			// Require Settings File,  otherwhise stop execution
			if(file_exists("../settings.php")) { require_once("../settings.php"); }
				else { echo "This CMS is not yet installed. Please install this CMS by visiting the websites root folder!"; }
			
			// Output Empty Array if Current Website Error
			if(defined("_HIVE_CRIT_ER_")) { echo serialize(array()); exit(); }
			
			// Checking for Operator for Site Module
			$sitemod_requested = @$_GET["rname"];
					
			// Output current deployed modules for external instances as serialized array!
			$b = array();
			$b[0]["value"] = $sitemod_requested;
			$x_array = $object["mysql"]->select("SELECT * FROM "._TABLE_STORE_." WHERE mod_rname = ? ORDER BY mod_rname, mod_version DESC", false, $b);
			if(is_array($x_array)) { 
				echo serialize($x_array);
			} else {
				echo serialize(array());
			}
			
		}