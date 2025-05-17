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
	*/if(!is_array(@$object)) { @http_response_code(404); Header("Location: ../"); exit(); }
	// Apply Default Code or Apply Alternative Script from Theme Module
	if(isset($object["suitefish"]["theme"]["active"])) {
		if($object["suitefish"]["theme"]["active"] != "adminbsb") {
			if(function_exists("sf___override_file")) {
				$return = sf___override_file($object, "css.xjs_popup.php");
				if($return) { $show = false; }
				else { $show = true; }
			} else { $show = true; }
		} else { $show = true; }
	} else { $show = true; }
	if(@$show) { 
?>


/********************************************************************************************/
/* XJS Popup Admin Template Stylesheet 
/********************************************************************************************/
	#xjs_popup {
		text-align: left;
		position: fixed;
		width: 100vw;
		height: 100vh;
		top: 0px;
		left: 0px;
		margin: 0 0 0 0;
		padding: 0 0 0 0;
		background: rgba(0, 0, 0, 0.8);
		z-index: 2000;
		color: black;}
	#xjs_popup_inner {
		position: fixed;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
		width: 96%;
		max-width: 600px;
		margin: 0 0 0 0;
		padding: 0 0 0 0;
		background: white;
		border-radius: 8px;
		padding-top: 15px;
		padding-bottom: 15px;
		font-size: 16px;
		text-align: center;}
	#xjs_popup_close {
		position: absolute;
		float: right;
		background: black;
		text-align: center;
		color: white;
		border-radius: 6px;
		cursor: pointer;
		padding: 5px;
		margin-top: 5px;
		margin-left: 35px;
		padding-left: 15px;
		padding-right: 15px;
		font-size: 14px;}
	#xjs_popup_close:hover {
		background: #242424;
		text-align: center;
		color: white;
		border-radius: 6px;}

<?php
	}		
?>