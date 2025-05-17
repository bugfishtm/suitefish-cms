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
			Versioning File to Contain Module Information!
	*/ if(!is_array(@$object)) { @http_response_code(404); Header("Location: ../"); exit(); }
	
	########################################################################################################################
	// Initialize X Array
	########################################################################################################################
		$x = array();

	########################################################################################################################
	// Module Details
	########################################################################################################################
		// Unique Module ID
		// - This is a unique id for your module
		// - If you want your module in the public store contact the developers to get your unique module id.
		// - Request unique module id for official publication at requestid@suitefish.com
		// - If you do not have a registered unique module id start your rname with "xxx"
		// - Use maximum of 15 signs
		// - No special chars, only a-Z
		// - No numeric chars
		// - Underscore (_) prefix is dedicated to suitefish official releases
		// - This variable is mandatory
		$x["rname"] 		= "_extension";
		// Available Languages 
		// - Short Codes of available languages in PHP Array
		// - This variable is mandatory
		$x["lang"] 			= array("en", "de", "fr", "it", "es", "zh", "ja", "in", "kr", "pt", "ru", "tr");
		// Build Number:
		// - Do only use integer values here
		// - Will extend the version number
		// - Do not use special chars, not even dots
		// - This variable is mandatory
		$x["build"] 		= "100";
		// Module Version
		// - Always add the build number at the end, seperated by a dot (.)
		// - Define the main Version number if the module.
		// - This variable is mandatory
		$x["version"] 		= "1.10.".$x["build"];
		// Module Name 
		// - Define the Title of the Module displayed in different frontpage areas.
		// - Only text, no html codes
		// - This variable is mandatory
		$x["name"] 			= "Template: Extension Module";
		// Module Description 
		// - Define the Description of the Module displayed in different frontpage areas.
		// - Only text and simple html codes (like br, li, table)
		// - Do not use style, script or other kind of complex tags
		// - This variable is mandatory
		$x["description"] = "Extension Module Example for the Administrator module, especially for Developers. You can get more Information about Extension Modules inside the Suitefish Documentation and related Readme.md Files in the repository!";
		// Module Type
		// - There are different Types of Modules inside Suitefish CMS
		// - The set ID 2 is dedicated to extension modules and will than be recognized as one.
		// - Other possible values: 1 - Site | 2 - Extension | 3 - Image | 4 - Windows | 5 - Docker | 6 - Theme
		// - This variable is mandatory
		$x["type"] 			= 2;
		// Minimal CMS Version to run this module
		// - Define the minimal version of CMS required to run this module.
		// - This variable is mandatory
		$x["cms_version_min"] 		= "7.10.100";
	
	########################################################################################################################
	// Module Author
	########################################################################################################################
		// Module License (gplv3, gplv2, mit, bsd, bsd2, ...) (can be false)
		$x["license"] 		= "gplv3";
		// Module Author Name (can be false)
		$x["author"] 		= "Suitefish";
		// Module Author Mail (can be false)
		$x["mail"] 			= false;
		// Module Author Website (can be false)
		$x["website"] 		= "https://www.suitefish.com";
		// Module Documentation Website (can be false)
		$x["documentation"] = "https://bugfishtm.github.io/suitefish-cms/";	
		// Module Github Website (can be false)
		$x["github"] 		= "https://github.com/bugfishtm/suitefish-cms";	
		// Module Video URL (a video about the module if exists, can be false)
		$x["video"] 		= false;	

	########################################################################################################################
	// Dedicated Module Type Variables
	########################################################################################################################	
		// Does this Module require an active Background worker?
		// If true then the background worker is mandatory and a notice will be displayed upon module creation.
		// - This variable is mandatory
		$x["require_worker"] 		= false;
		// Parent Site Module
		// Define to which site modules "rname" value this extension belongs.
		// For default suitefish modules always use "_administrator" here.
		// - This variable is mandatory
		$x["parent_rname"] 			= "_administrator";
		
