<?php
	/* 
		-------------------------------------------------------------------------------
		Suitefish Settings File (For Docker Instances)
		-------------------------------------------------------------------------------
		You do not need to enter your credentials here.
		Most data are fetched out of the running containers initialized .env variables.
		Mind that changed may be overwritten on next container restart.
	*/
	
	/* MySQL Settings */
		$mysql['host'] 		= "127.0.0.1"; 				// MySQL Hostname, usually 'localhost' if your database is on the same server (mandatory)
		$mysql['port'] 		= '3306'; 					// MySQL Port, the default port for MySQL is 3306 (can be left unchanged)
		$mysql['user'] 		= "root"; 					// MySQL User, replace 'MYSQL_USER' with your actual MySQL username (mandatory)
		$mysql['pass'] 		= getenv('sf_db_pass');		// MySQL Password, replace 'MYSQL_PASSWORD' with your actual MySQL password (mandatory)
		$mysql['db'] 		= "suitefish"; 				// MySQL Database, replace 'MYSQL_DATABASE' with the name of your database (mandatory)
		$mysql['prefix'] 	= 'sf_'; 					// Prefix for MySQL tables, this is useful if you're sharing the database with other applications (can be left unchanged)

	/* Site Settings */
		$object['cookie'] 	= 'sf_'; 					// Cookie Prefix, used to uniquely identify the cookies for this application (can be left unchanged)
		$object['path'] 	= '/var/www/html/'; 		// Full Path to the application's root directory on the server (mandatory)
		$object['url'] 		= getenv('sf_url'); 		// Full URL to the site, change 'https://example' to your site's URL (optional, but recommended)

	/* Docker Additions */	
		define("_HIVE_IS_IN_DOCKER_", true); 			// All Docker Instances should have this Constant set to true.	(Can name of module which its specialized for in docker)
