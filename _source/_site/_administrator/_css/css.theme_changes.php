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
				$return = sf___override_file($object, "css.theme_changes.php");
				if($return) { $show = false; }
				else { $show = true; }
			} else { $show = true; }
		} else { $show = true; }
	} else { $show = true; }
	if(@$show) { 
?>


/********************************************************************************************/
/* Just some Theme Changes for the Admin Module on AdminBSB 
/********************************************************************************************/
	#leftsidebar .user-info {
		background: #121212 !important;
	}

	.adm_accent_box {
		background: #121212;
		color: white;
	}

	.x_class_table_box_table  {
		max-width: 100% !important;
		overflow-x: auto !important;
	}

	.dataTables_filter {
		float: left !important;
	}
	.x_class_table_box_table table .btn  {
		margin-top: 5px;
		margin-bottom: 5px;
	}

	.adm_swal2_inside, .swal2-html-container {
		font-size: 18px !important;
	}


<?php
	}		
?>