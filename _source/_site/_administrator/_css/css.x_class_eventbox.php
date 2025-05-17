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
				$return = sf___override_file($object, "css.x_class_eventbox.php");
				if($return) { $show = false; }
				else { $show = true; }
			} else { $show = true; }
		} else { $show = true; }
	} else { $show = true; }
	if(@$show) { 
?>
/********************************************************************************************/
/* x_class_eventbox Eventbox Theme
/********************************************************************************************/
	.x_class_eventbox {
		position: fixed;
		top: 60px;
		right: 15px;
		z-index: 1000 !important;
	}
	.x_class_eventbox_inner {
		max-width: 600px;
	}
	.x_class_eventbox_msg {
		max-width: 500px;
		border-radius: 0px;
		padding: 15px;
		margin-top: 20px;
	}
	.x_class_eventbox_msg_ok {
		background: #2196F3;
		color: #FFFFFF;
		border: none;
	}
	.x_class_eventbox_msg_error {
		background: #F44336;
		color: #FFFFFF;
		border: none;
	}
	.x_class_eventbox_msg_warning {
		background: #2196F3;
		color: #FFFFFF;
		border: none;
	}
	.x_class_eventbox_msg_info {
		background: #2196F3;
		color: #FFFFFF;
		border: none;
	}
	.x_class_eventbox_msg_close {
		background: black;
		text-align: center;
		border-radius: 0px;
		padding: 5px;
		color: white;
		cursor: pointer;
		width: 80px;
		font-weight: bold;
		font-size: 12px;
		float: right;
		right: 15px;
		border: 1px solid black;
	}
	.x_class_eventbox_msg_close:hover {
		background: #242424;
	}
	
	.x_class_eventbox_msg_text { } 	

/********************************************************************************************/
/* x_class_eventbox Eventbox Theme
/*******************************************************************************************
	.x_class_eventbox {
		position: fixed;
		top: 60px;
		right: 20px;
		z-index: 1000 !important;
	}
	.x_class_eventbox_inner {
		max-width: 500px;
	}
	.x_class_eventbox_msg {
		max-width: 500px;
		border-radius: 5px;
		padding: 15px;
		margin-top: 20px;
	}
	.x_class_eventbox_msg_ok {
		background: #D3DFF5;
		color: #1579CA;
		border: 1px solid #BDD0F0;
	}
	.x_class_eventbox_msg_error {
		background: #F9D2DA;
		color: #87112B;
		border: 1px solid #F6BBC8;
	}
	.x_class_eventbox_msg_warning {
		background: #D3DFF5;
		color: #1579CA;
		border: 1px solid #BDD0F0;
	}
	.x_class_eventbox_msg_info {
		background: #D3DFF5;
		color: #1579CA;
		border: 1px solid #BDD0F0;
	}
	.x_class_eventbox_msg_close {
		background: red;
		border-radius: 5px;
		padding: 5px;
		color: white;
		cursor: pointer;
		width: 80px;
		font-weight: bold;
		font-size: 12px;
		position: absolute;
		float: right;
		right: 15px;
		border: 1px solid black;
	}
	.x_class_eventbox_msg_text { } 	*/
		
<?php
	}		
?>