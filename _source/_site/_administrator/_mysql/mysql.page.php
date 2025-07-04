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
	$object["mysql"]->multi_query("CREATE TABLE IF NOT EXISTS `"._HIVE_SITE_PREFIX_."page` (
	  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID',
	  `page_key` varchar(128) NULL COMMENT 'Page View Key (Public and Private only)',
	  `page_name` varchar(128) NULL COMMENT 'Template Name or language string | Meta Title | Tab Tile',
	  `page_description` text NULL COMMENT 'Template Name or language string',
	  `page_image` varchar(64) NULL COMMENT 'Image Name',
	  `page_sort` int(6) NULL COMMENT 'Page Sort Number',
	  `page_hide` int(1) NULL COMMENT '1 - Make Page Invisible in Navigation (Public and Private only)',
	  `page_public` int(1) NULL COMMENT '1 - If private Page than this page is also public if not assigned',
	  `page_denyview` int(1) NULL COMMENT '1 - Only Admins can view this page (Public and Private only)',
	  `page_cat` int(1) NULL COMMENT '1 - This is just a pages category  (Public and Private only)',
	  `page_extension` varchar(128) NULL COMMENT 'Name of the extension this item belongs to.',
	  `fk_page` int(10) NULL COMMENT 'Parent Page (optional, for sub menue pages on public and private)',
	  `fk_object` int(10) NULL COMMENT 'Does this page belong to an object? (if is_object)',
	  `is_object` int(1) NULL COMMENT 'Is this a object related page?',
	  `is_public` int(1) NULL COMMENT 'Is this a public page?',
	  `is_private` int(1) NULL COMMENT 'Is this a private page?',
	  `is_listing` int(1) NULL COMMENT 'Is this a listing page?',
	  `is_part` int(1) NULL COMMENT 'Is this a part page?',
	  `is_undeleteable` int(1) NULL COMMENT 'Is this object undeletable?',
	  `meta_description` text NULL COMMENT 'Meta Description for this page',
	  `creation` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Creation Date auto set',
	  `modification` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Modification Date auto set',
	  PRIMARY KEY (`id`) USING BTREE
	);");