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
			- See Documentation for Available Variables and Functionalities of this file!
			- You can find the Documentation at: https://bugfishtm.github.io/suitefish-cms/
			
	*/ if(!is_array(@$object)) { http_response_code(404); Header("Location: ../"); exit(); }
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Add a Navigation Element in Administrative or Public Area!
	////////////////////////////////////////////////////////////////////////////////////////////////
	if(hive__access($object, array($object["hive_mode_config"]["prefix_variables"]."admin"), false)) { 
		array_push($object["nav"], array("nav_title" => hive__hsc($object["hive_mode_config"]["lang"]->translate("nav_title")), 
			 "nav_img" => "cruelty_free", 
			 "nav_sub" => false, 
			 "nav_act" => "smd_".$object["hive_mode_config"]["name"]."_"."overview", 
			 "nav_loc" => hive__url(array("smd_".$object["hive_mode_config"]["name"], "overview", false, false))));	
	}