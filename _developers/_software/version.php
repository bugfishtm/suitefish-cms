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
	if(!is_array(@$object)) { @http_response_code(404); Header("Location: ../"); exit(); }
	
	/***********************************************************************************************************
		Initialize the versioning array (mandatory)
	***********************************************************************************************************/	
		$x = array();

	/***********************************************************************************************************
		Module Setup
	***********************************************************************************************************/	

		/*******************************************************************************************************
			Unique Module Identifier
			 - This is a unique id for your module
			 - If you want your module in the public store contact the developers to get your unique module id.
			 - Request unique module id for official publication at the suitefish staff.
			 - If you do not have a registered unique module id start your rname with "xxx"
			 - Use maximum of 15 signs
			 - No special chars, only a-Z
			 - No numeric chars
			 - Underscore (_) prefix is dedicated to suitefish official releases
			 - This variable is mandatory
		*******************************************************************************************************/	
		$x["rname"] 			= "_software";

		/*******************************************************************************************************
			Available Languages 
			 - Short Codes of available languages in PHP Array
			 - This variable is mandatory
		*******************************************************************************************************/	
		$x["lang"]				= array("en", "de", "fr", "it", "es", "zh", "ja", "in", "kr", "pt", "ru", "tr");		

		/*******************************************************************************************************
			Build Number
			 - Do only use integer values here
			 - Will extend the version number
			 - Relevant for database updates/changes
			 - Do not use special chars, not even dots
			 - This variable is mandatory
		*******************************************************************************************************/	
		$x["build"] 			= "100";

		/*******************************************************************************************************
			Module Version
			 - Always add the build number at the end, seperated by a dot (.)
			 - Define the main Version number if the module.
			 - This variable is mandatory
		*******************************************************************************************************/
		$x["version"] 			= "1.11.".$x["build"];	

		/*******************************************************************************************************
			Module Name 
			 - Define the Title of the Module displayed in different frontpage areas.
			 - Only text, no html codes
			 - This variable is mandatory
		*******************************************************************************************************/
		$x["name"] 				= "Template: Software Module";
		
		/*******************************************************************************************************
			Module Description 
			 - Define the Description of the Module displayed in different frontpage areas.
			 - Only text and simple html codes (like br, li, table)
			 - Do not use style, script or other kind of complex tags
			 - This variable is mandatory
		*******************************************************************************************************/
		$x["description"] 		= "This example module demonstrates the functioning of Software Module extensions within this CMS. It includes readme files explaining the use of various folders and provides a skeleton template for creating your own software modules.";
		
		/*******************************************************************************************************
			Module Type
			 - There are different Types of Modules inside Suitefish CMS
			 - The set ID 3 is dedicated to image modules and will than be recognized as one.
			 - Other possible values: 1 - Site | 2 - Extension | 3 - Image | 4 - Windows | 5 - Docker | 6 - Theme
			 - This variable is mandatory
		*******************************************************************************************************/
		$x["type"] 				= 4;
		
		/*******************************************************************************************************
			Minimal Suietfish Version to run this module
			 - Define the minimal version of CMS required to run this module.
			 - This variable is mandatory
		*******************************************************************************************************/
		$x["cms_version_min"] 	= "7.10.100";

	/***********************************************************************************************************
		Additional Data
	***********************************************************************************************************/		

		/*******************************************************************************************************
			Module License
			 - gplv3, gplv2, mit, bsd, bsd2, ...
			 - can be false
		*******************************************************************************************************/
		$x["license"] 			= "gplv3";
		
		/*******************************************************************************************************
			Module Author Name
			 - can be false
		*******************************************************************************************************/
		$x["author"] 			= "Suitefish";
		
		/*******************************************************************************************************
			Module Author Mail
			 - can be false
		*******************************************************************************************************/
		$x["mail"] 				= false;
		
		/*******************************************************************************************************
			Module Author Website
			 - can be false
		*******************************************************************************************************/
		$x["website"] 			= false;
		
		/*******************************************************************************************************
			Module Documentation Website
			 - can be false
		*******************************************************************************************************/
		$x["documentation"] 	= "https://bugfishtm.github.io/suitefish-cms/";	
		
		/*******************************************************************************************************
			Module Github Website
			 - can be false
		*******************************************************************************************************/
		$x["github"] 			= "https://github.com/bugfishtm/suitefish-cms";	
		
		/*******************************************************************************************************
			Module Video URL
			 - a video url about the module if exists
			 - can be false
		*******************************************************************************************************/
		$x["video"] 		= false;	
		
	/***********************************************************************************************************
		Dedicated Software Module Settings
	***********************************************************************************************************/
	
		/*******************************************************************************************************
			Starter File for Windows Software
			 - File should be .exe/.bat or similar
			 - File will be the starter file of the software package
			 - Do not use leading / or ./
			 - Relative to software module package path
			 - This variable is mandatory
		*******************************************************************************************************/
		$x["software_executable"] 		= "executable.bat";