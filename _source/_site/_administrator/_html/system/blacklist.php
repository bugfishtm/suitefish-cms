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
		adminbsb_header($object, $object["lang"]->translate("adm_nav_system_blacklist")._HIVE_TITLE_SPACER_. $object["lang"]->translate("adm_nav_system"));
		////////////////////////////////////////////////////////////////
		// Variables
		////////////////////////////////////////////////////////////////
		$title_general 	= $object["lang"]->translate("adm_nav_system_blacklist");
		$item_general 	= $title_general;
		$trts_general 	= "id as newid, creation, ip_adr, fail, id";
		$text_general 	= $object["lang"]->translate("adm_nav_system_backlist_exp");
		$table_general 	= _TABLE_LOG_IP_;
		$table_title   	= array(array("name" => $object["lang"]->translate("#")),
								array("name" => $object["lang"]->translate("string_date")),
							    array("name" => $object["lang"]->translate("string_ip_address")),
							    array("name" => $object["lang"]->translate("string_failures")));   
		
		////////////////////////////////////////////////////////////////////////////////////////////////		
		// Create Table Object
		////////////////////////////////////////////////////////////////////////////////////////////////		
		$tbl = new x_class_table($object["mysql"], $table_general, "table");
		
		////////////////////////////////////////////////////////////////////////////////////////////////		
		// Table Flush Operation
		////////////////////////////////////////////////////////////////////////////////////////////////		
		if(@$_POST["hive_submit_flush_table"] OR @$_GET["op"] == "flush") {
			if(@$_GET["confirm"] != "confirmed") { 
				?>
				<script>
					Swal.fire({
					  title: "<?php echo $object["lang"]->translate("string_flush_table"); ?>",
					  html: "<?php echo $object["lang"]->translate("adm_msg_item_flush_really"); ?><form method='post' action='<?php echo "./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1]."&confirm=confirmed"; ?>'><input type='hidden' name='hive_submit_flush_table_token' value='<?php echo $object["csrf"]->get(); ?>'><input type='hidden' name='hive_submit_flush_table' value='1'><br /><input type='submit' class=\"btn btn-primary\" value='<?php echo htmlentities($object["lang"]->translate("string_yes") ?? ''); ?>'> <a href='<?php echo "./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1].""; ?>' class='btn btn-danger'><?php echo htmlentities($object["lang"]->translate("string_cancel") ?? ''); ?></a></form>",
					  showCancelButton: false,
					  showCloseButton: true,
					  showConfirmButton: false,
					  icon: "warning",
					  allowOutsideClick: false,
					  willClose: () => {
						window.location.href = '<?php echo hive__url(array("system", "blacklist")); ?>';
					  }
					});
				</script>
				<?php 
			} else { 
				if($object["csrf"]->check(@$_POST["hive_submit_flush_table_token"])) { 
					$object["mysql"]->query("DELETE FROM ".$table_general." ");
					$object["eventbox"]->ok($object["lang"]->translate("event_tableflush"));
				} else { $object["eventbox"]->error($object["lang"]->translate("event_csrf")); }		 
			}
		}			
		 
		 
		////////////////////////////////////////////////////////////////////////////////////////////////		
		// Delete Item Operations
		////////////////////////////////////////////////////////////////////////////////////////////////		
		$output1 =  $tbl->exec_delete();
		if($output1 == "deleted") {  $object["eventbox"]->ok($object["lang"]->translate("event_deleted")); }
		if($output1 == "csrf") { $object["eventbox"]->error($object["lang"]->translate("event_csrf"));}

		////////////////////////////////////////////////////////////////////////////////////////////////		
		// Get Table Values
		////////////////////////////////////////////////////////////////////////////////////////////////		
		if(@$_GET["op"] == "more") { $limit = ""; $limit_desc = " ".$object["lang"]->translate("string_limit").": *"; } else { $limit = 1500; $limit_desc = " ".$object["lang"]->translate("string_limit").": ".$limit.""; }
		if(is_numeric($limit)) { $limitx = "LIMIT ".$limit; } else { $limitx = ""; }
		$value_array = $object["mysql"]->select("SELECT ".$trts_general." FROM ".$table_general." ORDER BY id DESC ".$limitx."", true);
		if(is_array($value_array)) {
			foreach($value_array as $key => $value) {
				$value_array[$key]["creation"] = @htmlspecialchars($value_array[$key]["creation"] ?? '');
				$value_array[$key]["fail"] = @htmlspecialchars($value_array[$key]["fail"] ?? '');
				$value_array[$key]["ip_adr"] = @htmlspecialchars($value_array[$key]["ip_adr"] ?? '');
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
		// Display the Operations Bar!
		////////////////////////////////////////////////////////////////////////////////////////////////		
		echo sf__theme_box_start();
			echo "<form method='post' action='./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1]."'>";
					echo '<button name="hive_submit_flush_table" type="submit" class="btn btn-danger">'.$object["lang"]->translate("string_flush_table").'</button> ';
					echo "<input type='hidden' name='hive_submit_flush_table_token' value='".$object["csrf"]->get()."'>";
					echo "<input type='hidden' name='hive_submit_flush_table' value='1'>";
					if(@$_GET["op"] == "more") { 
						echo '<button onclick="window.location.href = \''._HIVE_URL_REL_.'/?'._HIVE_URL_GET_[0].'='._HIVE_URL_CUR_[0].'&'._HIVE_URL_GET_[1].'='._HIVE_URL_CUR_[1].'&op=less\';" type="button" class="btn btn-primary">'.$object["lang"]->translate("string_show_less").'</button> ';
					} else {
						echo '<button onclick="window.location.href = \''._HIVE_URL_REL_.'/?'._HIVE_URL_GET_[0].'='._HIVE_URL_CUR_[0].'&'._HIVE_URL_GET_[1].'='._HIVE_URL_CUR_[1].'&op=more\';" type="button" class="btn btn-primary">'.$object["lang"]->translate("string_show_more").'</button> ';
					}	
			echo "</form>";
		echo sf__theme_box_end();

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Space Fix
		////////////////////////////////////////////////////////////////////////////////////////////////		
		echo sf__theme_space_fix();
		
		////////////////////////////////////////////////////////////////////////////////////////////////		
		// Display the Table!
		////////////////////////////////////////////////////////////////////////////////////////////////		
		echo sf__theme_box_start("<h2>".$title_general."</h2> <small>".sf__theme_badge_primary($limit_desc)."</small>");
		$tbl->spawn_table($table_title, $value_array, false, $object["lang"]->translate("string_delete"), false, $object["lang"]->translate("string_delete"), "table table-bordered table-striped table-hover dataTable js-exportable");
		echo sf__theme_box_end();

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Space Fix
		////////////////////////////////////////////////////////////////////////////////////////////////		
		echo sf__theme_space_fix();
		
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