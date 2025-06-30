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

	//////////////////////////////////////////////////////////////////////////////////////
	## Sanitize Folder Names
	//////////////////////////////////////////////////////////////////////////////////////
	function adm_check_folder_name($folder) {
		$folder = trim($folder);
		if (strpos($folder, '/') !== false || strpos($folder, '\\') !== false || strpos($folder, '..') !== false) {
			return false;
		}
		if (!preg_match('/^[a-zA-Z0-9_-]+$/', $folder)) {
			return false;
		}
		return $folder;
	}
	
	//////////////////////////////////////////////////////////////////////////////////////
	## UGet User Link showing User ID
	//////////////////////////////////////////////////////////////////////////////////////
	function adm_user_link($id) {
		if(is_numeric($id)) {
			return "<a href='./?l1=profile&id=".$id."'>UID#".$id."</a>";
		} 
	}

	//////////////////////////////////////////////////////////////////////////////////////
	## Convert Date to Current Language Date Format
	//////////////////////////////////////////////////////////////////////////////////////	
	function adm_date_format($datetime) {
		if (empty($datetime) || $datetime == "0000-00-00 00:00:00") {
			return $datetime; // Handle invalid date input
		}
		// Convert MySQL datetime to PHP DateTime object
		$date = new DateTime($datetime);
		switch (_HIVE_LANG_) {
			case "de": // German
				return $date->format("d.m.Y H:i"); // e.g., 31.12.2025 23:59

			case "en": // English
				return $date->format("m/d/Y h:i A"); // e.g., 12/31/2025 11:59 PM

			case "pt": // Portuguese
				return $date->format("d/m/Y H:i"); // e.g., 31/12/2025 23:59

			case "ru": // Russian
				return $date->format("d.m.Y H:i"); // e.g., 31.12.2025 23:59

			case "tr": // Turkish
				return $date->format("d.m.Y H:i"); // e.g., 31.12.2025 23:59

			case "zh": // Chinese
				return $date->format("Y年m月d日 H:i"); // e.g., 2025年12月31日 23:59

			case "es": // Spanish
				return $date->format("d/m/Y H:i"); // e.g., 31/12/2025 23:59

			case "fr": // French
				return $date->format("d/m/Y H:i"); // e.g., 31/12/2025 23:59

			case "in": // Indonesian
				return $date->format("d-m-Y H:i"); // e.g., 31-12-2025 23:59

			case "it": // Italian
				return $date->format("d/m/Y H:i"); // e.g., 31/12/2025 23:59

			case "ja": // Japanese
				return $date->format("Y年m月d日 H:i"); // e.g., 2025年12月31日 23:59

			case "kr": // Korean
				return $date->format("Y년 m월 d일 H:i"); // e.g., 2025년 12월 31일 23:59

			default:
				return $date->format("Y-m-d H:i:s"); // Default format if language is unsupported
		}
	}

	//////////////////////////////////////////////////////////////////////////////////////
	## Default Popup
	//////////////////////////////////////////////////////////////////////////////////////
	function adm_popup_sa($object, $title, $text, $closeurl, $icon = "info") {
		?>
			Swal.fire({
			  title: `<?php echo $title; ?>`,
			  html: `<?php echo $text; ?>`,
			  showCancelButton: false,
			  showCloseButton: true,
			  showConfirmButton: false,
			  allowOutsideClick: false,
			  icon: "<?php echo $icon; ?>",
			  willClose: () => {
				window.location.href = '<?php echo $closeurl; ?>';
			  }
			});	
		<?php
	}