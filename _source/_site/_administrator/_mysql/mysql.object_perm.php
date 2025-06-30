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
	$object["mysql"]->multi_query("CREATE TABLE IF NOT EXISTS `"._HIVE_SITE_PREFIX_."object_perm` (
	  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID',
	  `fk_user` int(11) NULL COMMENT 'Related User',
	  `fk_group` int(11) NULL COMMENT 'Related Group',
	  `fk_object` int(11) NULL COMMENT 'Related Object (set this or fk_object_item grant perms for whole objects or single items)',
	  `fk_object_item` int(11) NULL COMMENT 'Related Object Item (set this or fk_object to grant perms for whole objects or single items)',
	  `fk_page` int(11) NULL COMMENT 'Override user default view with this page',
	  `can_see` int(1) NULL COMMENT 'Permission to see Object (default see view page)',
	  `can_edit` int(1) NULL COMMENT 'Permission to edit Object',
	  `can_delete` int(1) NULL COMMENT 'Permission to delete Object',
	  `can_create` int(1) NULL COMMENT 'Permission to create Object',
	  `creation` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Creation Date auto set',
	  `modification` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Modification Date auto set',
	  PRIMARY KEY (`id`) USING BTREE,
	  UNIQUE KEY `unique_sf_object_perm` (`fk_user`, `fk_group`, `fk_object`, `fk_object_item`)
	);");