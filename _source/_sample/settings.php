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
		Suitefish Settings File:
		This is an example of a settings.php file. You do not need to enter your credentials here.
		You can use the on-page installer to create this settings.php, which is highly recommended.
		This file serves as a fallback in case the installer fails to create a settings.php file.
	***********************************************************************************************************/	

	/***********************************************************************************************************
		MySQL Settings
	***********************************************************************************************************/	
		$mysql['host'] 		= 'localhost'; 			// MySQL Hostname, usually 'localhost' if your database is on the same server (mandatory)
		$mysql['port'] 		= '3306'; 				// MySQL Port, the default port for MySQL is 3306 (can be left unchanged)
		$mysql['user'] 		= 'MYSQL_USER'; 		// MySQL User, replace 'MYSQL_USER' with your actual MySQL username (mandatory)
		$mysql['pass'] 		= 'MYSQL_PASSWORD'; 	// MySQL Password, replace 'MYSQL_PASSWORD' with your actual MySQL password (mandatory)
		$mysql['db'] 		= 'MYSQL_DATABASE';		// MySQL Database, replace 'MYSQL_DATABASE' with the name of your database (mandatory)
		$mysql['prefix'] 	= 'sf_'; 				// Prefix for MySQL tables, this is useful if you're sharing the database with other applications (can be left unchanged)

	/***********************************************************************************************************
		Site Settings
	***********************************************************************************************************/	
		$object['cookie'] 	= 'sf_'; 				// Cookie Prefix, used to uniquely identify the cookies for this application (can be left unchanged)
		$object['path'] 	= '/var/www/html/';		// Full Path to the application's root directory on the server (mandatory)
		$object['url'] 		= 'https://example';	// Full URL to the site, change 'https://example' to your site's URL (optional, but recommended)

	/***********************************************************************************************************
		All Docker Instances should have this Constant set to true.
		Can have name of module as value which its specialized for in docker
	***********************************************************************************************************/	
		if(!defined("_HIVE_IS_IN_DOCKER_")) { define("_HIVE_IS_IN_DOCKER_", false); } 		
		
	/***********************************************************************************************************
		Secret Key
	***********************************************************************************************************/
		$object['secret_key']	= "your_secret_key"; // Use a random number or String