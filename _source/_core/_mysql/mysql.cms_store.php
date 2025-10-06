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
		Create the Database Table
	***********************************************************************************************************/	
	$object["mysql"]->multi_query("
		CREATE TABLE IF NOT EXISTS `"._HIVE_PREFIX_."cms_store` (
			`id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
			`mod_rname` varchar(128) DEFAULT NULL COMMENT 'Unique Module Identifier Name',  
			`mod_lang` TEXT DEFAULT NULL COMMENT 'Serialized Array of Language Keys for Module', 
			`mod_build` int(9) DEFAULT NULL COMMENT 'Build Number of the Module', 
			`mod_version` varchar(26) DEFAULT NULL COMMENT 'Version of the Module',  
			`mod_name` varchar(128) DEFAULT NULL COMMENT 'Name of the Module',    
			`mod_description` TEXT DEFAULT NULL COMMENT 'Module Description', 
			`mod_parent_rname` varchar(20) DEFAULT NULL COMMENT 'If extension, Parent Identifier Module Name in array Serialized Format',  
			`mod_type` int(9) DEFAULT NULL COMMENT 'Site Module Type', 
			`mod_singleinstance` int(1) DEFAULT 0 COMMENT 'Module Single Instance?', 
			`mod_license` varchar(16) DEFAULT NULL COMMENT 'License of the Module', 
			`mod_author` varchar(128) DEFAULT NULL COMMENT 'Module Creator',    
			`mod_mail` varchar(128) DEFAULT NULL COMMENT 'Module Creator Mail',  
			`mod_website` varchar(128) DEFAULT NULL COMMENT 'Module Creator Website',
			`mod_docs` varchar(128) DEFAULT NULL COMMENT 'Module Documentation Website',
			`mod_video` varchar(128) DEFAULT NULL COMMENT 'Module Documentation Website',
			`mod_github` varchar(128) DEFAULT NULL COMMENT 'Module Github Website',
			`mod_image` LONGTEXT DEFAULT NULL COMMENT 'Module Image Code', 
			`mod_data` LONGTEXT DEFAULT NULL COMMENT 'Additional Module Data', 
			`mod_data_lang` LONGTEXT DEFAULT NULL COMMENT 'Additional Module Language Data', 
			`mod_changelog` LONGTEXT DEFAULT NULL COMMENT 'Changelog Data in HTML', 
			`mod_is_module` int(1) DEFAULT 0 COMMENT '1 If this module is a Module for CMS', 			
			`mod_is_software` int(1) DEFAULT 0 COMMENT '1 If this is a software release', 			
			`mod_is_cms` int(1) DEFAULT 0 COMMENT '1 If this is a cms release', 			
			`creation` datetime DEFAULT current_timestamp() COMMENT 'Creation Date auto set',
			`modification` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Modification Date auto set',
		  PRIMARY KEY (`id`) USING BTREE,
		  UNIQUE KEY `"._HIVE_PREFIX_."cms_store_unique` (`mod_version`, `mod_build`, `mod_rname`));
	");