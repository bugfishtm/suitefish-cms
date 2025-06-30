<?php
	/* 
		-------------------------------------------------------------------------------
		Suitefish Settings File
		-------------------------------------------------------------------------------
		This is an example of a settings.php file. You do not need to enter your credentials here.
		You can use the on-page installer to create this settings.php, which is highly recommended.
		This file serves as a fallback in case the installer fails to create a settings.php file.
	*/

	/* MySQL Settings */
		$mysql['host'] 		= 'localhost'; 			// MySQL Hostname, usually 'localhost' if your database is on the same server (mandatory)
		$mysql['port'] 		= '3306'; 				// MySQL Port, the default port for MySQL is 3306 (can be left unchanged)
		$mysql['user'] 		= 'MYSQL_USER'; 		// MySQL User, replace 'MYSQL_USER' with your actual MySQL username (mandatory)
		$mysql['pass'] 		= 'MYSQL_PASSWORD'; 	// MySQL Password, replace 'MYSQL_PASSWORD' with your actual MySQL password (mandatory)
		$mysql['db'] 		= 'MYSQL_DATABASE';		// MySQL Database, replace 'MYSQL_DATABASE' with the name of your database (mandatory)
		$mysql['prefix'] 	= 'sf_'; 				// Prefix for MySQL tables, this is useful if you're sharing the database with other applications (can be left unchanged)

	/* Site Settings */
		$object['cookie'] 	= 'sf_'; 				// Cookie Prefix, used to uniquely identify the cookies for this application (can be left unchanged)
		$object['path'] 	= '/var/www/html/';		// Full Path to the application's root directory on the server (mandatory)
		$object['url'] 		= 'https://example';	// Full URL to the site, change 'https://example' to your site's URL (optional, but recommended)

	/* Docker Additions (only if running in docker */	
		// define("_HIVE_IS_IN_DOCKER_", true); 		// All Docker Instances should have this Constant set to true.	(Can name of module which its specialized for in docker)