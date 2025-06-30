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
	*/
	if(!is_array(@$object)) { @http_response_code(404); Header("Location: ../"); exit(); } 

		adminbsb_header($object, $object["lang"]->translate("adm_nav_system_info")._HIVE_TITLE_SPACER_. $object["lang"]->translate("adm_nav_system"));
		echo sf__theme_title($object["lang"]->translate("adm_nav_system_info"), $object["lang"]->translate("adm_nav_system_info_exp"));	

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Space Fix
		////////////////////////////////////////////////////////////////////////////////////////////////		
		echo sf__theme_space_m();
	
		// Core Version Informations
		echo sf__theme_box_start("<h2>".$object["lang"]->translate("string_cms")."</h2>");
			echo '<b>'.$object["lang"]->translate("string_version").'</b>: ';
			echo htmlspecialchars($object["core_mode"]["version"]);
			echo '<br />';
			echo '<b>'.$object["lang"]->translate("string_codename").'</b>: ';
			echo htmlspecialchars($object["core_mode"]["codename"]);
			echo '<br />';
		echo sf__theme_box_end();

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Space Fix
		////////////////////////////////////////////////////////////////////////////////////////////////		
		echo sf__theme_space_fix();
		
		// Framework Version Informations
		echo sf__theme_box_start("<h2>".$object["lang"]->translate("string_framework")."</h2>");
			$temp = new x_class_version();
			echo '<b>'.$object["lang"]->translate("string_author").'</b>: ';
			echo $temp->autor;
			echo '<br />';
			echo '<b>'.$object["lang"]->translate("string_version").'</b>: ';
			if($temp->beta) { $v = $temp->version."-beta"; } else { $v = $temp->version; }
			echo $temp->version;
			echo '<br />';
		echo sf__theme_box_end();

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Space Fix
		////////////////////////////////////////////////////////////////////////////////////////////////		
		echo sf__theme_space_fix();
		
		// Administration Interface Information
		echo sf__theme_box_start("<h2>".$object["lang"]->translate("string_module")."</h2>");
			echo '<b>'.$object["lang"]->translate("string_reference").'</b>: ';
			echo htmlspecialchars($object["hive_mode"]["rname"]);
			echo '<br />';
			echo '<b>'.$object["lang"]->translate("string_version").'</b>: ';
			echo htmlspecialchars($object["hive_mode"]["version"]);
			echo '<br />';
			echo '<b>'.$object["lang"]->translate("string_folder").'</b>: ';
			echo htmlspecialchars(_HIVE_MODE_);
			echo '<br />';
			echo '<b>'.$object["lang"]->translate("string_license").'</b>: ';
			echo htmlspecialchars($object["hive_mode"]["license"]);
			echo '<br />';
			echo '<b>'.$object["lang"]->translate("string_author").'</b>: ';
			echo htmlspecialchars($object["hive_mode"]["author"]);
			echo '<br />';
			echo '<b>'.$object["lang"]->translate("string_website").'</b>: ';
			echo '<a href="'.htmlspecialchars($object["hive_mode"]["website"]).'" target="_blank">';
			echo htmlspecialchars($object["hive_mode"]["website"]);
			echo '</a>';
			echo '<br />';
			echo '<b>'.$object["lang"]->translate("string_documentation").'</b>: ';
			echo '<a href="'.htmlspecialchars($object["hive_mode"]["documentation"]).'" target="_blank">';
			echo htmlspecialchars($object["hive_mode"]["documentation"]);
			echo '</a>';
			echo '<br />';
			echo '<b>'.$object["lang"]->translate("string_github").'</b>: ';
			echo '<a href="'.htmlspecialchars($object["hive_mode"]["github"]).'" target="_blank">';
			echo htmlspecialchars($object["hive_mode"]["github"]);
			echo '</a>';
			echo '<br />';
			echo '<b>'.$object["lang"]->translate("string_videos").'</b>: ';
			echo '<a href="'.htmlspecialchars($object["hive_mode"]["video"]).'" target="_blank">';
			echo htmlspecialchars($object["hive_mode"]["video"]);
			echo '</a>';
			echo '<br />';
		echo sf__theme_box_end();

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Space Fix
		////////////////////////////////////////////////////////////////////////////////////////////////		
		echo sf__theme_space_fix();	
		
		// Administration Interface Information
		echo sf__theme_box_start("<h2>".$object["lang"]->translate("string_included_libraries")."</h2>");
		$exclude = ['.', '..', 'index.php', 'README.md'];
		$files = scandir("./_core/_licenses/");

		foreach ($files as $file) {
			if (!in_array($file, $exclude) && is_file("./_core/_licenses/" . '/' . $file)) {
				echo '<a target="_blank" href="./_core/_licenses/'. htmlspecialchars($file) . '">' . htmlspecialchars($file) . '</a><br>';
			}
		}

		echo sf__theme_box_end();

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Space Fix
		////////////////////////////////////////////////////////////////////////////////////////////////		
		echo sf__theme_space_fix();	