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
			- Files with name run.*.php in this folder will be 
				loaded on background worker script runtime.
			- See Documentation for Available Variables and Functionalities of this file!
			- Mind that this file is completely loaded without context, so you have to init all
			 variables yourself (look at the documentation to find out more)
			- You can find the Documentation at: https://bugfishtm.github.io/suitefish-cms/		
	*/ 

# This is a file to be executed by the worker query functionality.
# It creates an file on the unix system to confirm that its working.	
mkdir("/suitefish-test", 0770, true);
file_put_contents("/suitefish-test/site.extension.runtime.example.php", " ");