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
		Initialize X Array
	***********************************************************************************************************/
		$x = array();

	/***********************************************************************************************************
		Module Details
	***********************************************************************************************************/
		$x["rname"] 			= "_administrator";
		$x["lang"] 				= array("en", "de", "fr", "it", "es", "zh", "ja", "in", "kr", "pt", "ru", "tr");
		$x["build"] 			= "100";
		$x["version"] 			= "7.10.".$x["build"];
		$x["name"] 				= "Suitefish";
		$x["description"] 		= "The _administrator module serves as the default backend module for Suitefish CMS, featuring enhanced functionalities and styling based on the AdminBSB dashboard template. It demonstrates advanced functions and serves as a standalone CMS with dynamic features.";
		$x["type"] 				= 1;
		$x["cms_version_min"] 	= "7.10.100";
	
	/***********************************************************************************************************
		Module Author
	***********************************************************************************************************/
		$x["license"] 			= "gplv3";
		$x["author"] 			= "Suitefish";
		$x["mail"] 				= false;
		$x["website"] 			= "https://www.suitefish.com";
		$x["documentation"] 	= "https://bugfishtm.github.io/suitefish-cms/";	
		$x["github"] 			= "https://github.com/bugfishtm/suitefish-cms";	
		$x["video"] 			= "https://www.youtube.com/playlist?list=PL6npOHuBGrpAfrpUzQPTOWdqoCnhq1oP0";	

	/***********************************************************************************************************
		Dedicated Module Type Variables
	***********************************************************************************************************/	
		$x["require_worker"] 		= false;
		$x["single_instance"] 		= true;	