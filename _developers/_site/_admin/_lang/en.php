<?php if(isset($this)) { if(!is_object($this)) { Header("Location: ../"); exit(); } } else { Header("Location: ../"); exit(); }
#		 ____  __  __  ___  ____  ____  ___  _   _ 
#		(  _ \(  )(  )/ __)( ___)(_  _)/ __)( )_( )
#		 ) _ < )(__)(( (_-. )__)  _)(_ \__ \ ) _ ( 
#		(____/(______)\___/(__)  (____)(___/(_) (_) www.bugfish.eu
#				 ___ _   _ ___ _____ ___ ___ ___ ___ _  _ 
#				/ __| | | |_ _|_   _| __| __|_ _/ __| || |
#				\__ \ |_| || |  | | | _|| _| | |\__ \ __ |
#				|___/\___/|___| |_| |___|_| |___|___/_||_|
#		Copyright (C) 2024 Jan Maurice Dahlmanns [Bugfish]
#
#		This program is free software: you can redistribute it and/or modify
#		it under the terms of the GNU General Public License as published by
#		the Free Software Foundation, either version 3 of the License, or
#		(at your option) any later version.
#
#		This program is distributed in the hope that it will be useful,
#		but WITHOUT ANY WARRANTY; without even the implied warranty of
#		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#		GNU General Public License for more details.
#
#		You should have received a copy of the GNU General Public License
#		along with this program.  If not, see <https://www.gnu.org/licenses/>. ?>
##########################################################################################
## Administrator Translations
##########################################################################################
site_title=Example Admin Page
site_title_ext=Example Admin Page for Module _tplsite Extension
site_title_ext1=This is just a test site for the Example Module!
site_title_ext2=You are missing required Permission to view this page!
example_permission=View Admin Page
example_permission_descr=Permission to View Administrative Site Module page.
nav_item=Example Module
site_settings=No settings are available for this module! The mod_setting file included in this module is just an example on how to spawn content on an administrative page.

##########################################################################################
## Store Translations
##########################################################################################
store_version_name=Template: Site Module
store_version_description=The _tplsite module provides a basic template to demonstrate the structure of full site modules in Suitefish CMS. It showcases minimal responsive design principles.