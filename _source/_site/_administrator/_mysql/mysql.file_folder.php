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
		$object["mysql"]->multi_query("
			CREATE TABLE IF NOT EXISTS `"._HIVE_SITE_PREFIX_."file_folder` (
			  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID',
			  `folder_name` varchar(256) NULL COMMENT 'Folder Name or Translate String',
			  `folder_description` text NULL COMMENT 'Folder Descr or Translate String',
			  `folder_type` text NULL COMMENT 'Folder Type',
			  `folder_sort` int(10) DEFAULT '1' COMMENT 'Sortnumber for Listing',
			  `fk_file_folder` int(10) DEFAULT NULL COMMENT 'Parent Folder',
			  `fk_user` int(11) DEFAULT NULL COMMENT 'Related User',
			  `fk_page` int(11) DEFAULT NULL COMMENT 'Related Page',
			  `fk_object` int(11) DEFAULT NULL COMMENT 'Related Object',
			  `fk_object_item` int(11) DEFAULT NULL COMMENT 'Related Object Item',
			  `fk_field` int(11) NULL COMMENT 'Special Field Identifier for this Item',
			  `folder_identifier` text NULL COMMENT 'Special Identifier for this Item',
			  `folder_extension` varchar(128) NULL COMMENT 'Name of the extension this item belongs to.',
			  `creation` datetime DEFAULT current_timestamp() COMMENT 'Creation Date',
			  `modification` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Modification Date',
			  PRIMARY KEY (`id`));
		");