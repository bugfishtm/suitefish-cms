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
		$title_general 	= $object["lang"]->translate("adm_nav_system_api");
		$trts_general 	= "id as newid, api_key, created_at, id";
		$table_general 	= _TABLE_API_;
		$table_title   	= array(array("name" => $object["lang"]->translate("#")),
								array("name" => $object["lang"]->translate("string_key")),
							    array("name" => $object["lang"]->translate("string_creation")),
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
			$insert_id = @$_POST["edit_id"];
				$object["api_perm"]->remove_perms($insert_id);
				foreach($object["set"]["permission_api"] as $key => $value) {
					if(isset($_POST[$value[0].'_chbk'])) { 
						$object["api_perm"]->add_perm($insert_id, $value[0]);
					} else {
						$object["api_perm"]->remove_perm($insert_id, $value[0]);
					}
				}
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
			$object["api"]->addKey();
			$insert_id = $object["mysql"]->insert_id();
			if($object["csrf"]->check(@$_POST["token"])) {
				foreach($object["set"]["permission_api"] as $key => $value) {
					if(isset($_POST[$value[0].'_chbk'])) { 
						$object["api_perm"]->add_perm($insert_id, $value[0]);
					} else {
						$object["api_perm"]->remove_perm($insert_id, $value[0]);
					}
				}
				$object["eventbox"]->ok($object["lang"]->translate("event_operation_success"));
				Header("Location: ./?l1="._HIVE_URL_CUR_[0]."&l2="._HIVE_URL_CUR_[1]."");
				exit();
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
					$object["mysql"]->query("DELETE FROM "._TABLE_API_." WHERE section = ? AND id = ".@$_GET["delete_id"]."", $b);
					$object["mysql"]->query("DELETE FROM "._TABLE_API_PERM_." WHERE ref = ".@$_GET["delete_id"]." AND id = ".@$_GET["delete_id"]."");
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
				$xm = $object["mysql"]->select("SELECT * FROM "._TABLE_API_." WHERE section = ? AND id = ".@$_GET["delete_id"]."", false, $b);
				if(is_array($xm)) { $delete_confirm = true; }
			}
		}
		
		////////////////////////////////////////////////////////////////////////////////////////////////	
		// Header
		////////////////////////////////////////////////////////////////////////////////////////////////
		adminbsb_header($object, $object["lang"]->translate("adm_nav_system_api")._HIVE_TITLE_SPACER_. $object["lang"]->translate("adm_nav_system"));
		echo sf__theme_title($object["lang"]->translate("adm_nav_system_api"), $object["lang"]->translate("adm_nav_system_api_exp"));

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
				  html: "<?php echo $object["lang"]->translate("adm_msg_item_delete_really"); ?><br /><b><?php echo htmlspecialchars($xm["api_key"] ?? ''); ?></b><form method='post' action='<?php echo "./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1]."&confirmation=true&delete_id=".@$_GET["delete_id"].""; ?>'><input type='hidden' name='token' value='<?php echo $object["csrf"]->get(); ?>'><br /><input type='submit' class=\"btn btn-primary\" value='<?php echo htmlentities($object["lang"]->translate("string_yes") ?? ''); ?>'> <a href='<?php echo "./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1].""; ?>' class='btn btn-danger'><?php echo htmlentities($object["lang"]->translate("string_cancel") ?? ''); ?></a></form>",
				  showCancelButton: false,
				  showCloseButton: true,
				  icon: "warning",
				  showConfirmButton: false,
				  allowOutsideClick: false,
				  willClose: () => {
					window.location.href = '<?php echo hive__url(array("system", "api")); ?>';
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
			$xm = $object["mysql"]->select("SELECT * FROM "._TABLE_API_." WHERE section = ? AND id = ".@$_GET["edit_id"]."", false, $b);
			if(is_array($xm)) { 
				?>
				<form action="" method="post">
					<p>
						<b><?php echo $object["lang"]->translate("string_key"); ?></b>: <?php echo htmlentities($xm["api_key"] ?? ''); ?><br />
					</p> 
				<?php
					echo sf__theme_row_start();   $curhas = false; $curhastmp = "xxxnoset!!!__";
					foreach($object["set"]["permission_api"] as $key => $value) { 
								if(substr($value[0], 0, 6) == "___ext") { 
									$newsub = substr($value[0], 7);
									$newsub = substr($newsub, 0, strpos($newsub, "_", 2));
									$curhastmp = $object["lang"]->translate("string_extension")." - ".$newsub;
								}
								if(substr($value[0], 0, 6) == "___smd") { 
									$newsub = substr($value[0], 7);
									$newsub = substr($newsub, 0, strpos($newsub, "_", 2));
									$curhastmp = $object["lang"]->translate("string_module")." - ".$newsub;
								} 
					
					if(!$curhas) { $curhas = $curhastmp; echo sf__theme_col_start(12); echo sf__theme_box_start($object["lang"]->translate("string_website"), " xfpe_nomarginbottom xfpe_nopaddingbottom hive__card_collapse"); } else { if($curhas != $curhastmp) { $curhas = $curhastmp; echo '<br clear="both">'; echo sf__theme_box_end(); echo sf__theme_col_end(); echo sf__theme_col_start(12); echo sf__theme_box_start(hive__hsc($curhas), " xfpe_nomarginbottom xfpe_nopaddingbottom  hive__card_collapse"); } }
						
						if($object["api_perm"]->has_perm($_GET["edit_id"], $value[0])) { 
							$checked = "checked";
						} else { $checked = ""; }
						?>
							<div class="form-check">
								<input type="checkbox" class="form-check-input" name="<?php echo $value[0]; ?>_chbk" id="<?php echo $value[0]; ?>_chbk" <?php echo $checked; ?>>
								<label class="form-check-label" for="<?php echo $value[0]; ?>_chbk">
									<?php echo $value[1]; ?>
								</label> 
							</div> <?php echo $value[2]; ?>
						<?php echo '<br clear="both">';echo '<br clear="both">';
					}		
				echo '<br clear="both">';
				echo sf__theme_box_end();
				echo sf__theme_col_end();
				echo sf__theme_row_end();
				?>	
					<input type="hidden" name="token" value="<?php echo $object["csrf"]->get(); ?>">
					<input type="hidden" name="edit_id" value="<?php echo $xm["id"]; ?>">
					<button class="btn btn-info" type="submit"><?php echo $object["lang"]->translate("string_save"); ?></button> 
					<a href="<?php echo hive__url(array("system", "api")); ?>" class="btn btn-danger"><?php echo $object["lang"]->translate("string_cancel"); ?></a>
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
				<?php
					echo sf__theme_row_start();   $curhas = false; $curhastmp = "xxxnoset!!!__";
					foreach($object["set"]["permission_api"] as $key => $value) { 
								if(substr($value[0], 0, 6) == "___ext") { 
									$newsub = substr($value[0], 7);
									$newsub = substr($newsub, 0, strpos($newsub, "_", 2));
									$curhastmp = $object["lang"]->translate("string_extension")." - ".$newsub;
								}
								if(substr($value[0], 0, 6) == "___smd") { 
									$newsub = substr($value[0], 7);
									$newsub = substr($newsub, 0, strpos($newsub, "_", 2));
									$curhastmp = $object["lang"]->translate("string_module")." - ".$newsub;
								} 
					
					if(!$curhas) { $curhas = $curhastmp; echo sf__theme_col_start(12); echo sf__theme_box_start($object["lang"]->translate("string_default"), " xfpe_nomarginbottom xfpe_nopaddingbottom  hive__card_collapse"); } else { if($curhas != $curhastmp) { $curhas = $curhastmp;  echo sf__theme_box_end(); echo sf__theme_col_end(); echo sf__theme_col_start(12); echo sf__theme_box_start(hive__hsc($curhas), " xfpe_nomarginbottom xfpe_nopaddingbottom  hive__card_collapse"); } }
						
						$checked = "";
						?>
							<div class="form-check">
								<input type="checkbox" class="form-check-input" name="<?php echo $value[0]; ?>_chbk" id="<?php echo $value[0]; ?>_chbk" <?php echo $checked; ?>>
								<label class="form-check-label" for="<?php echo $value[0]; ?>_chbk">
									<?php echo $value[1]; ?>
								</label> 
							</div> <?php echo $value[2]; ?>
						<?php	echo '<br clear="both">';echo '<br clear="both">';
					}		
				echo '<br clear="both">';
				echo sf__theme_box_end();
				echo sf__theme_col_end();
				echo sf__theme_row_end();
				?>

				
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
				$value_array[$key]["api_key"] = @htmlspecialchars($value_array[$key]["api_key"]);
				$value_array[$key]["created_at"] = adm_date_format($value_array[$key]["created_at"]);
				$value_array[$key]["action"] = "<a href='".hive__url(array("system", "api"))."&edit_id=".$value_array[$key]["id"]."' class='btn btn-info'>".$object["lang"]->translate("string_edit")."</a> <a href='".hive__url(array("system", "api"))."&delete_id=".$value_array[$key]["id"]."' class='btn btn-danger'>".$object["lang"]->translate("string_delete")."</a>";
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
			