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
			File in this folder with mysql.**table_name**.php will be installed automatically if you use syntax below.
			Use CREATE TABLE IF NOT EXISTS - to prevent performance lowagen through handler errors.
			File name shall not create the Prefix which has been set at the installation, prefix of tables will
			automatically be included!
	*/ if(!is_array(@$object)) { @http_response_code(404); Header("Location: ../"); exit(); }	
	$object["mysql"]->multi_query("CREATE TABLE IF NOT EXISTS `"._HIVE_SITE_PREFIX_."object` (
	  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID',
	  `obj_key` varchar(128) NULL COMMENT 'Page View Key',
	  `obj_name` varchar(128) NULL COMMENT 'Object name / language string for listings and name format substitution',
	  `obj_name_format` varchar(128) NULL COMMENT 'Name Format for Titles to be shown | Meta Title | Tab Tile',
	  `obj_description` text NULL COMMENT 'Template Name or language string',
	  `fk_object` int(10) NULL COMMENT 'Parent Object (optional, for sub objects)',
	  `fk_page_create` int(10) NULL COMMENT 'Default page to Create Object',
	  `fk_page_edit` int(10) NULL COMMENT 'Default page to Edit Object',
	  `fk_page_view` int(10) NULL COMMENT 'Default page to Edit Object',
	  `fk_page_delete` int(10) NULL COMMENT 'Default page to Delete Object',
	  `is_public` int(1) NULL COMMENT 'Is this a public object?',
	  `is_private` int(1) NULL COMMENT 'Is this a private (only login) object?',
	  `is_restricted` int(1) NULL COMMENT 'Is this a restricted (only access per assignment) object?',
	  `is_undeleteable` int(1) NULL COMMENT 'Is this object undeletable?',
	  `meta_description` text NULL COMMENT 'Meta Description for this page',
	  `creation` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Creation Date auto set',
	  `modification` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Modification Date auto set',
	  PRIMARY KEY (`id`) USING BTREE,
	  UNIQUE KEY `unique_sf_object` (`obj_key`)
	);");