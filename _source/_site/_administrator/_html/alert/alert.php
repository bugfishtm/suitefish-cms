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
		////////////////////////////////////////////////////////////////////////////////////////////////
		// Variables
		////////////////////////////////////////////////////////////////////////////////////////////////
		$title_general 	= $object["lang"]->translate("string_notifications");
		$item_general 	= $title_general;
		$table_title   	= array(array("name" => $object["lang"]->translate("#")),
								array("name" => $object["lang"]->translate("string_date")),
								array("name" => $object["lang"]->translate("string_details")),
								array("name" => $object["lang"]->translate("string_operation")));
		$table_general 	= _TABLE_ALERT_;
		$trts_general 	= "id as newid, creation, alert_text, alert_url, id";
		$text_general 	= $object["lang"]->translate("adm_nav_alert_descr");	
		
		////////////////////////////////////////////////////////////////////////////////////////////////
		// Create Table Object
		////////////////////////////////////////////////////////////////////////////////////////////////
		$tbl = new x_class_table($object["mysql"], $table_general, "table");
		
		////////////////////////////////////////////////////////////////////////////////////////////////
		// Table Flush Operation
		////////////////////////////////////////////////////////////////////////////////////////////////
		$show_del_confirm_popup = false;
		if(is_numeric(@$_GET["delete_id"]) AND @$_GET["op"] == "delete") {
			if(@$_GET["confirm"] != "confirmed") {
				$show_del_confirm_popup = true;
			} else { 
				if($object["csrf"]->check(@$_GET["delete_token"])) { 
					$object["mysql"]->query("DELETE FROM ".$table_general." WHERE id = ".@$_GET["delete_id"]." AND fk_user = ".$object["user"]->user_id."");
					$object["eventbox"]->ok($object["lang"]->translate("event_deleted")); 
					Header("Location: ./?l1=alert");
					exit();
				} else { 
					$object["eventbox"]->error($object["lang"]->translate("event_csrf"));
					Header("Location: ./?l1=alert");
					exit();
				}		 
			}
		}			
		
		////////////////////////////////////////////////////////////////////////////////////////////////
		// Header		
		////////////////////////////////////////////////////////////////////////////////////////////////
		adminbsb_header($object, $title_general);

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Show Deletion Confirm Popup if Necessary
		////////////////////////////////////////////////////////////////////////////////////////////////
		if($show_del_confirm_popup) { ?>
			<script>
				Swal.fire({
				  title: "<?php echo $object["lang"]->translate("string_delete_item"); ?>",
				  html: "<?php echo $object["lang"]->translate("adm_msg_item_delete_really"); ?><br /><br /><a class=\"btn btn-primary\" href='<?php echo "./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&op=delete&delete_token=".$object["csrf"]->get()."&delete_id=".@$_GET["delete_id"]."&confirm=confirmed"; ?>'><?php echo htmlentities($object["lang"]->translate("string_yes") ?? ''); ?></a> <a href='<?php echo "./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1].""; ?>' class='btn btn-danger'><?php echo htmlentities($object["lang"]->translate("string_cancel") ?? ''); ?></a>",
				  showCancelButton: false,
				  showCloseButton: true,
				  showConfirmButton: false,
				  icon: "warning",
				  allowOutsideClick: false,
				  willClose: () => {
					window.location.href = '<?php echo hive__url(array("alert")); ?>';
				  }
				});
			</script>
		<?php }

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Get Table Values
		////////////////////////////////////////////////////////////////////////////////////////////////
		$value_array = $object["mysql"]->select("SELECT ".$trts_general." FROM ".$table_general." WHERE fk_user = '".$object["user"]->user_id."' ORDER BY id DESC", true); 
		if(is_array($value_array)) {
			foreach($value_array as $key => $value) {
				$value_array[$key]["creation"] = adm_date_format($value_array[$key]["creation"]);
				if(trim($value_array[$key]["alert_url"] ?? '') == "") { $value_array[$key]["alert_text"] = "".$object["lang"]->translate($value["alert_text"]).""; }
				else { $value_array[$key]["alert_text"] = "<a href='".$value_array[$key]["alert_url"]."'>".$object["lang"]->translate($value["alert_text"])."</a>"; }
				$value_array[$key]["alert_action"] = "<a href='./?l1="._HIVE_URL_CUR_[0]."&op=delete&delete_id=".$value["id"]."' class='btn btn-danger'>".$object["lang"]->translate("string_delete")."</a> ";
				unset($value_array[$key]["alert_url"]);
			}
		}

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Display the Information Box!
		////////////////////////////////////////////////////////////////////////////////////////////////
		echo sf__theme_title($title_general, $text_general);

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Space Fix
		////////////////////////////////////////////////////////////////////////////////////////////////		
		echo sf__theme_space_m();
		
		////////////////////////////////////////////////////////////////////////////////////////////////
		// Display the Table!
		////////////////////////////////////////////////////////////////////////////////////////////////
		echo sf__theme_box_start();
		$tbl->spawn_table($table_title, $value_array, false, false, false, false, "table table-bordered table-striped table-hover dataTable js-exportable");
		echo sf__theme_box_end();
		
		////////////////////////////////////////////////////////////////////////////////////////////////
		// Replace Buttons
		////////////////////////////////////////////////////////////////////////////////////////////////
		?>
			<script>
				// Get all buttons that start with "x_class_table_exec_del_submit"
				var buttons = document.querySelectorAll('button[name^="x_class_table_exec_del_submit"]');

				// Loop through the NodeList and add the class to each button
				buttons.forEach(button => {
					button.classList.add('btn');
					button.classList.add('btn-danger');
				});			
			</script>
		<?php

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Space Fix
		////////////////////////////////////////////////////////////////////////////////////////////////		
		echo sf__theme_space_fix();