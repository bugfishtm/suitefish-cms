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
		$title_general 	= $object["lang"]->translate("adm_nav_system_translation");
		$trts_general 	= "id as newid, identificator, lang, translation, section, id";
		$table_general 	= _TABLE_LANG_;
		$table_title   	= array(array("name" => $object["lang"]->translate("#")),
								array("name" => $object["lang"]->translate("string_key")),
							    array("name" => $object["lang"]->translate("string_language")),
							    array("name" => $object["lang"]->translate("string_translation")),
							    array("name" => $object["lang"]->translate("string_operation")));

		////////////////////////////////////////////////////////////////////////////////////////////////	
		// Create Table Object
		////////////////////////////////////////////////////////////////////////////////////////////////	
		$tbl = new x_class_table($object["mysql"], $table_general, "table");

		////////////////////////////////////////////////////////////////////////////////////////////////	
		// Operations
		////////////////////////////////////////////////////////////////////////////////////////////////		
		if(is_numeric(@$_POST["edit_id"])) { 
			if($object["csrf"]->check(@$_POST["token"])) {
				$b = array();
				$b[0]["value"] = @$_POST["form_edit_trans"];
				$b[1]["value"] = _HIVE_MODE_;
				$object["mysql"]->query("UPDATE "._TABLE_LANG_." SET `translation` = ? WHERE section = ? AND id = ".@$_GET["edit_id"]."", $b);
				$object["eventbox"]->ok($object["lang"]->translate("event_operation_success"));
				Header("Location: ./?l1="._HIVE_URL_CUR_[0]."&l2="._HIVE_URL_CUR_[1]."");
				exit();
			} else {
				$object["eventbox"]->error($object["lang"]->translate("event_csrf"));
				Header("Location: ./?l1="._HIVE_URL_CUR_[0]."&l2="._HIVE_URL_CUR_[1]."");
				exit();
			}
		}
		if(is_numeric(@$_POST["add_form_exec"])) { 
			if($object["csrf"]->check(@$_POST["token"])) {
				$b = array();
				$b[0]["value"] = @$_POST["form_edit_key"];
				$b[1]["value"] = _HIVE_MODE_;
				$xm = $object["mysql"]->select("SELECT * FROM "._TABLE_LANG_." WHERE `identificator` = ? AND section = ?", false, $b);
				if(!$xm) { 
					$b = array();
					$b[0]["value"] = @$_POST["form_edit_key"];
					$b[1]["value"] = @$_POST["form_edit_lang"];
					$b[2]["value"] = @$_POST["form_edit_trans"];
					$b[3]["value"] = _HIVE_MODE_;
					$object["mysql"]->query("INSERT INTO "._TABLE_LANG_."(identificator, lang, translation, section) VALUES(?, ?, ?, ?);", $b);
					$object["eventbox"]->ok($object["lang"]->translate("event_operation_success"));
					Header("Location: ./?l1="._HIVE_URL_CUR_[0]."&l2="._HIVE_URL_CUR_[1]."");
					exit();
				} else {
					$object["eventbox"]->error($object["lang"]->translate("event_error_exists"));
					Header("Location: ./?l1="._HIVE_URL_CUR_[0]."&l2="._HIVE_URL_CUR_[1]."");
					exit();
				}
			} else {
				$object["eventbox"]->error($object["lang"]->translate("event_csrf"));
				Header("Location: ./?l1="._HIVE_URL_CUR_[0]."&l2="._HIVE_URL_CUR_[1]."");
				exit();
			}
		}	
		$delete_confirm = false;
		if(is_numeric(@$_GET["delete_id"])) {
			if(@$_GET["confirmation"] == "true") { 
				if($object["csrf"]->check(@$_POST["token"])) {
					$b = array();
					$b[0]["value"] = _HIVE_MODE_;
					$xm = $object["mysql"]->select("SELECT * FROM "._TABLE_LANG_." WHERE section = ? AND id = ".@$_GET["delete_id"]."", false, $b);
					if(!is_array($xm)) { $xm = array(); }
					$object["log"]->info("[DELETION] [TABLE] ".$table_general." [ID] ".@$_GET["delete_id"]." [NAME] ".htmlspecialchars($xm["identificator"] ?? '')." [UID] ".$object["user"]->user_id."", "system_translation");
					$object["mysql"]->query("DELETE FROM "._TABLE_LANG_." WHERE section = ? AND id = ".@$_GET["delete_id"]."", $b);
					$object["eventbox"]->ok($object["lang"]->translate("event_deleted"));
					Header("Location: ./?l1="._HIVE_URL_CUR_[0]."&l2="._HIVE_URL_CUR_[1]."");
					exit();
				} else {
					$object["eventbox"]->error($object["lang"]->translate("event_csrf"));
					Header("Location: ./?l1="._HIVE_URL_CUR_[0]."&l2="._HIVE_URL_CUR_[1]."");
					exit();
				}
			} else {
				$b = array();
				$b[0]["value"] = _HIVE_MODE_;
				$xm = $object["mysql"]->select("SELECT * FROM "._TABLE_LANG_." WHERE section = ? AND id = ".@$_GET["delete_id"]."", false, $b);
				if(is_array($xm)) { $delete_confirm = true; }
			}
		}
		
		////////////////////////////////////////////////////////////////////////////////////////////////	
		// Header
		////////////////////////////////////////////////////////////////////////////////////////////////
		adminbsb_header($object, $object["lang"]->translate("adm_nav_system_translation")._HIVE_TITLE_SPACER_. $object["lang"]->translate("adm_nav_system"));
		echo sf__theme_title($object["lang"]->translate("adm_nav_system_translation"), $object["lang"]->translate("adm_nav_system_translation_exp"));

		////////////////////////////////////////////////////////////////////////////////////////////////
		// Space Fix
		////////////////////////////////////////////////////////////////////////////////////////////////		
		echo sf__theme_space_m();

		////////////////////////////////////////////////////////////////////////////////////////////////	
		// Delete Confirmation
		////////////////////////////////////////////////////////////////////////////////////////////////		
		if($delete_confirm) {
			?>
			<script>
				Swal.fire({
				  title: "<?php echo $object["lang"]->translate("string_delete_item"); ?>",
				  html: "<?php echo $object["lang"]->translate("adm_msg_item_delete_really"); ?><br /><b><?php echo htmlspecialchars($xm["identificator"] ?? ''); ?></b><form method='post' action='<?php echo "./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1]."&confirmation=true&delete_id=".@$_GET["delete_id"].""; ?>'><input type='hidden' name='token' value='<?php echo $object["csrf"]->get(); ?>'><br /><input type='submit' class=\"btn btn-primary\" value='<?php echo htmlentities($object["lang"]->translate("string_yes") ?? ''); ?>'> <a href='<?php echo "./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1].""; ?>' class='btn btn-danger'><?php echo htmlentities($object["lang"]->translate("string_cancel") ?? ''); ?></a></form>",
				  showCancelButton: false,
				  showCloseButton: true,
				  icon: "warning",
				  showConfirmButton: false,
				  allowOutsideClick: false,
				  willClose: () => {
					window.location.href = '<?php echo hive__url(array("system", "translation")); ?>';
				  }
				});
			</script>
			<?php 	
		}
		
		////////////////////////////////////////////////////////////////////////////////////////////////	
		// Edit an Item
		////////////////////////////////////////////////////////////////////////////////////////////////	
		if(is_numeric(@$_GET["edit_id"])) { 
			$b = array();
			$b[0]["value"] = _HIVE_MODE_;
			echo sf__theme_box_start("<h2>".$title_general._HIVE_TITLE_SPACER_.$object["lang"]->translate("string_edit"). "</h2>");
			$xm = $object["mysql"]->select("SELECT * FROM "._TABLE_LANG_." WHERE section = ? AND id = ".@$_GET["edit_id"]."", false, $b);
			if(is_array($xm)) { 
				?>
				<form action="" method="post">
					<p>
						<b><?php echo $object["lang"]->translate("string_key"); ?></b>: <?php echo htmlentities($xm["identificator"] ?? ''); ?><br />
						<b><?php echo $object["lang"]->translate("string_lang"); ?></b>: <?php echo $xm["lang"]; ?><br />
					</p> 
					<label for="constant_value"><?php echo $object["lang"]->translate("string_translation"); ?></label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" id="constant_value"  autocomplete="off" value="<?php echo htmlentities($xm["translation"] ?? ''); ?>" class="form-control" name="form_edit_trans">
						 </div>
					</div>					
					<input type="hidden" name="token" value="<?php echo $object["csrf"]->get(); ?>">
					<input type="hidden" name="edit_id" value="<?php echo $xm["id"]; ?>">
					<button class="btn btn-info" type="submit"><?php echo $object["lang"]->translate("string_save"); ?></button> 
					<a href="<?php echo hive__url(array("system", "translation")); ?>" class="btn btn-danger"><?php echo $object["lang"]->translate("string_cancel"); ?></a>
				</form>
				<?php
			} else {
				echo sf__theme_alert_danger($object["lang"]->translate("string_not_available"));
			}
			echo sf__theme_box_end();

			////////////////////////////////////////////////////////////////////////////////////////////////
			// Space Fix
			////////////////////////////////////////////////////////////////////////////////////////////////		
			echo sf__theme_space_fix();
			
		} else { 
			////////////////////////////////////////////////////////////////////////////////////////////////	
			// Add an Item
			////////////////////////////////////////////////////////////////////////////////////////////////	
			echo sf__theme_box_start("<h2>".$title_general." - ".$object["lang"]->translate("string_create"). "</h2>", "hive__card_collapse");
			?>
			<form action="" method="post">
				<label for="constant_name"><?php echo $object["lang"]->translate("string_key"); ?></label>
				<div class="form-group">
					<div class="form-line">
						<input type="text" id="constant_name" value="" autocomplete="off" class="form-control" name="form_edit_key" required>
					 </div>
				</div>					
				<label for="constant_descr"><?php echo $object["lang"]->translate("string_language"); ?></label>
				<div class="form-group">
					<div class="form-line">
						<select class="form-control show-tick" id="constant_descr" name="form_edit_lang">
							<?php
								foreach(_HIVE_LANG_ARRAY_ as $key => $value) {
									echo '<option value="'.$value.'">'.$value.'</option>';
								}
							?>
						</select>
					 </div>
				</div>					
				<label for="constant_value"><?php echo $object["lang"]->translate("string_translation"); ?></label>
				<div class="form-group">
					<div class="form-line">
						<input type="text" id="constant_value" value=""  autocomplete="off" class="form-control" name="form_edit_trans" required>
					 </div>
				</div>					
				<input type="hidden" name="token" value="<?php echo $object["csrf"]->get(); ?>">
				<input type="hidden" name="add_form_exec" value="1">
				<button class="btn btn-info" type="submit"><?php echo $object["lang"]->translate("string_save"); ?></button> 
			</form>
			<?php
			echo sf__theme_box_end();

			////////////////////////////////////////////////////////////////////////////////////////////////
			// Space Fix
			////////////////////////////////////////////////////////////////////////////////////////////////		
			echo sf__theme_space_fix();
		}
		
	////////////////////////////////////////////////////////////////////////////////////////////////	
	// Database Translations
	////////////////////////////////////////////////////////////////////////////////////////////////	
	$b = array();
	$b[0]["value"] = _HIVE_MODE_;
	$value_array = $object["mysql"]->select("SELECT ".$trts_general." FROM ".$table_general." WHERE section = ?", true, $b);
	if(is_array($value_array)) {
		foreach($value_array as $key => $value) {
			$value_array[$key]["identificator"] = @htmlspecialchars($value_array[$key]["identificator"]);
			$value_array[$key]["lang"] = @htmlspecialchars($value_array[$key]["lang"]);
			$value_array[$key]["translation"] = @htmlspecialchars($value_array[$key]["translation"]);
			$value_array[$key]["action"] = "<a href='".hive__url(array("system", "translation"))."&edit_id=".$value_array[$key]["id"]."' class='btn btn-info'>".$object["lang"]->translate("string_edit")."</a> <a href='".hive__url(array("system", "translation"))."&delete_id=".$value_array[$key]["id"]."' class='btn btn-danger'>".$object["lang"]->translate("string_delete")."</a>";
			unset($value_array[$key]["section"]);
		}
	}
	echo sf__theme_box_start("<h2>".$title_general." - ".$object["lang"]->translate("string_list"). "</h2>");
	$tbl->spawn_table($table_title, $value_array, false, false, false, false, "display");
	echo sf__theme_box_end();

	////////////////////////////////////////////////////////////////////////////////////////////////
	// Space Fix
	////////////////////////////////////////////////////////////////////////////////////////////////		
	echo sf__theme_space_fix();
		
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Load Default Language File		
	////////////////////////////////////////////////////////////////////////////////////////////////	
	// Load and merge Language
	$tmpl = new x_class_lang(false, false, false, false, _HIVE_SITE_PATH_."/_lang/en.php"); 	 
	$list_array = array();
	if(is_array($tmpl->array)) {
		foreach($tmpl->array as $key => $value) {
			array_push($list_array, array("key" => $key, "lang" => _HIVE_LANG_, "value" => $value));
		}
	}
	$table_title   	= array(array("name" => $object["lang"]->translate("string_key")),
							array("name" => $object["lang"]->translate("string_language")),
							array("name" => $object["lang"]->translate("string_translation")));
	echo sf__theme_box_start("<h2>".$title_general." - ".$object["lang"]->translate("string_module"). "</h2>", "hive__card_collapse");
	$tbl->spawn_table($table_title, $list_array, false, false, false, false, "display");
	echo sf__theme_box_end();

	////////////////////////////////////////////////////////////////////////////////////////////////
	// Space Fix
	////////////////////////////////////////////////////////////////////////////////////////////////		
	echo sf__theme_space_fix();
	
		
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Load Default Language File		
	////////////////////////////////////////////////////////////////////////////////////////////////	
	$tmpl = new x_class_lang(false, false, false, false, $object["path"]."/_core/_lang/en.php");  
	$list_array = array();
	if(is_array($tmpl->array)) {
		foreach($tmpl->array as $key => $value) {
			array_push($list_array, array("key" => $key, "lang" => _HIVE_LANG_, "value" => $value));
		}
	}
	$table_title   	= array(array("name" => $object["lang"]->translate("string_key")),
							array("name" => $object["lang"]->translate("string_language")),
							array("name" => $object["lang"]->translate("string_translation")));
	echo sf__theme_box_start("<h2>".$title_general." - ".$object["lang"]->translate("string_default"). "</h2>", "hive__card_collapse");
	$tbl->spawn_table($table_title, $list_array, false, false, false, false, "display");
	echo sf__theme_box_end();

	////////////////////////////////////////////////////////////////////////////////////////////////
	// Space Fix
	////////////////////////////////////////////////////////////////////////////////////////////////		
	echo sf__theme_space_fix();
	