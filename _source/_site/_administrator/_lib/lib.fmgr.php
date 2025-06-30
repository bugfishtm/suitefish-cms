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
	## File Manager
	//////////////////////////////////////////////////////////////////////////////////////
	
		//////////////////////////////////////////////////////////////////////////////////////
		## Upload Action
		//////////////////////////////////////////////////////////////////////////////////////	
		function adm_fmgr_exec_action($object, $file_type) {
			if(_HIVE_MODE_ != "_administrator") { return false; }
			if($file_type == "css") {
				$upload_folder = $object["path"]."/_data/"._HIVE_MODE_."/_css/";
				$upload_folderC = $upload_folder."/__cache/";
				hive__folder_create($upload_folder, true, false);
				hive__folder_create($upload_folder."/__cache/", true, true);
				$preserve_file_ext = true;
				$allow_direct_edit = array("css", "php");
				$allowed_types = array("css", "php");
			} elseif($file_type == "php") {
				$upload_folder = $object["path"]."/_data/"._HIVE_MODE_."/_php/";
				$upload_folderC = $upload_folder."/__cache/";
				hive__folder_create($upload_folder, true, false);
				hive__folder_create($upload_folder."/__cache/", true, true);
				$preserve_file_ext = true;
				$allowed_types = array("php");
				$allow_direct_edit = array("php");
			} elseif($file_type == "private") {
				$upload_folder = $object["path"]."/_data/"._HIVE_MODE_."/_private/";
				$upload_folderC = $upload_folder."/__cache/";
				hive__folder_create($upload_folder, true, false);
				hive__folder_create($upload_folder."/__cache/", true, true);
				$preserve_file_ext = false;
				$allowed_types = true;
				$allow_direct_edit = array("css", "php", "txt", "xml", "csv");
			} elseif($file_type == "public") {
				$upload_folder = $object["path"]."/_data/"._HIVE_MODE_."/_public/";
				$upload_folderC = $upload_folder."/__cache/";
				hive__folder_create($upload_folder, true, false);
				hive__folder_create($upload_folder."/__cache/", true, true);
				$preserve_file_ext = true;
				$allowed_types = true;
			} else {
				return false;
			}
			// Create Temp Directories
			$chmod = 0770;
			$cache_folder = $upload_folderC.''.$object["user"]->user_id.'/';
			if(!is_dir($cache_folder)) { @mkdir($cache_folder, $chmod, true); @chmod($cache_folder, $chmod); }
			$file_folder = $upload_folder;

			// Check Permission
			if(!hive__access($object, array("admin_file"), false)) { exit(); }	
	
			// Request Operations to Fetch Chunks
			if ($_SERVER['REQUEST_METHOD'] === 'GET') {	
				if(!(isset($_GET['resumableIdentifier']) && trim($_GET['resumableIdentifier'])!='')){ $_GET['resumableIdentifier']=''; }
				$temp_dir = $cache_folder.$_GET['resumableIdentifier'];
				if(!is_dir($temp_dir)) { @mkdir($temp_dir, $chmod, true); @chmod($temp_dir, $chmod); }
				if(!(isset($_GET['resumableFilename']) && trim($_GET['resumableFilename'])!='')){ $_GET['resumableFilename']=''; }
				if(!(isset($_GET['resumableChunkNumber']) && trim($_GET['resumableChunkNumber'])!='')){ $_GET['resumableChunkNumber']=''; }
				$chunk_file = $temp_dir.'/'.$_GET['resumableFilename'].'.part'.$_GET['resumableChunkNumber'];
				if (file_exists($chunk_file)) { header("HTTP/1.0 200 Ok"); } else { header("HTTP/1.0 404 Not Found"); }}	
	
			// Processing 
			if (!empty($_FILES)) foreach ($_FILES as $file) {
				// If Error than Continue
				if ($file['error'] != 0) { continue; }
				// Get Post Identifier if Needed
				if(isset($_POST['resumableIdentifier']) && trim($_POST['resumableIdentifier'])!=''){			
					$temp_dir = $cache_folder.$_POST['resumableIdentifier']; 
				}	
				// If Temp Dir does not Exist than make Dir
				if (!is_dir($temp_dir)) { mkdir($temp_dir, $chmod, true); }	
				// Current Chunk Destination File
				$dest_file = $temp_dir.'/'.$_GET['resumableFilename'].'.part'.$_POST['resumableChunkNumber'];	
				// Move File and Go with Chunks
				if (move_uploaded_file($file['tmp_name'], $dest_file)) {	
					// Create File from Chunks
					$total_files_on_server_size = 0; $temp_total = 0;					
					foreach(scandir($temp_dir) as $file) {
						$temp_total = $total_files_on_server_size;
						$tempfilesize = filesize($temp_dir.'/'.$file);
						$total_files_on_server_size = $temp_total + $tempfilesize; }
					if ($total_files_on_server_size >= $_POST['resumableTotalSize']) {
						if (($fp = fopen($temp_dir.'/'.$_POST['resumableFilename'], 'w')) !== false) {
							for ($i=1; $i<=$_POST['resumableTotalChunks']; $i++) { fwrite($fp, file_get_contents($temp_dir.'/'.$_POST['resumableFilename'].'.part'.$i)); } fclose($fp);
						} else { return false; }
					}				
					// If file Exists proceed
					if (file_exists($temp_dir.'/'.$_POST['resumableFilename'])) {	
						// Check if Choosen Position is valid
						$parent	= hive__trim(@$_GET["position"]);		
						if(is_numeric($parent)) {
							$xx = $object["mysql"]->select("SELECT * FROM "._TABLE_FILE_FOLDER_." WHERE id = '".$parent."' AND folder_type = '".$file_type."'", false);
							if(!is_array($xx)) {
								$parent = 0; 
							}
						} else { $parent = 0; }
						$input = $_POST['resumableFilename'];
						$cleaned_input = preg_replace('/[^a-zA-Z0-9\s_\.-]/', '', $input);
						// Add this file to MySQL 
						$bind[0]["value"] = $cleaned_input;
						$bind[0]["type"] = "s";
						$bind[1]["value"] = $parent;
						$bind[1]["type"] = "s";
						$bind[2]["value"] = $object["mysql"]->escape($_POST['resumableTotalSize']);
						$bind[2]["type"] = "s";
						$object["mysql"]->query("INSERT INTO "._TABLE_FILE_." (file_title, file_descr, fk_file_folder, file_size, file_type, fk_user)
							VALUES (?, '', ?, ?, '".$file_type."', ".$object["user"]->user_id.");", $bind);	
						// Get Current File ID
						$id = $object["mysql"]->insert_id();	
						// Determine Current Extension	
						if($preserve_file_ext) {
							$extension = pathinfo($cleaned_input, PATHINFO_EXTENSION);
							$extension = $extension ? ".".$extension."" : "";
						} else {
							$extension = "";
						}
						// Rename Path Variable
						$file_folder = $file_folder.$id.$extension;
						// Move the Finished File
						rename($temp_dir.'/'.$_POST['resumableFilename'], $file_folder);
						// Chmod File
						chmod($file_folder, 0770);						
						// Remove Current Cache Dir
						x_rmdir($temp_dir);
					}
				}				
			}			
		}
	
		//////////////////////////////////////////////////////////////////////////////////////
		## Multi-Upload-Box
		//////////////////////////////////////////////////////////////////////////////////////	
		function adm_fmgr_exec_pre($object, $file_type) {
			if(_HIVE_MODE_ != "_administrator") { return false; }
			if($file_type == "css") {
				$upload_folder = $object["path"]."/_data/"._HIVE_MODE_."/_css/";
				$upload_folderC = $upload_folder."/__cache/";
				hive__folder_create($upload_folder, true, false);
				hive__folder_create($upload_folder."/__cache/", true, true);
				$preserve_file_ext = true;
				$allow_direct_edit = array("css", "php");
				$allowed_types = array("css", "php");
			} elseif($file_type == "php") {
				$upload_folder = $object["path"]."/_data/"._HIVE_MODE_."/_php/";
				$upload_folderC = $upload_folder."/__cache/";
				hive__folder_create($upload_folder, true, false);
				hive__folder_create($upload_folder."/__cache/", true, true);
				$preserve_file_ext = true;
				$allowed_types = array("php");
				$allow_direct_edit = array("php");
			} elseif($file_type == "private") {
				$upload_folder = $object["path"]."/_data/"._HIVE_MODE_."/_private/";
				$upload_folderC = $upload_folder."/__cache/";
				hive__folder_create($upload_folder, true, false);
				hive__folder_create($upload_folder."/__cache/", true, true);
				$preserve_file_ext = false;
				$allowed_types = true;
				$allow_direct_edit = array("css", "php", "txt", "xml", "csv");
			} elseif($file_type == "public") {
				$upload_folder = $object["path"]."/_data/"._HIVE_MODE_."/_public/";
				$upload_folderC = $upload_folder."/__cache/";
				hive__folder_create($upload_folder, true, false);
				hive__folder_create($upload_folder."/__cache/", true, true);
				$preserve_file_ext = true;
				$allowed_types = true;
			} else {
				return false;
			}
			$return_url_after_op = "./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1]."&position=".hive__hsc(@$_GET["position"])."";
			// Delete a File
			if(@$_GET["fmgr_file_delete"]) {
				if($object["csrf"]->check(@$_GET["token"])) {
					if(is_numeric(@$_GET["fmgr_file_delete"])) {
						$xx = $object["mysql"]->select("SELECT * FROM "._TABLE_FILE_." WHERE id = '".@$_GET["fmgr_file_delete"]."' AND file_type = '".$file_type."'", false);
						$object["mysql"]->query("DELETE FROM "._TABLE_FILE_." WHERE id = '".@$_GET["fmgr_file_delete"]."' AND file_type = '".$file_type."'");
						$extension = pathinfo($xx["file_title"], PATHINFO_EXTENSION);
						$extension = $extension ? ".".$extension."" : "";
						if($file_type == "private") { $extension = ""; }
						if(file_exists($upload_folder."/".@$_GET["fmgr_file_delete"].$extension)) { unlink($upload_folder."/".@$_GET["fmgr_file_delete"].$extension); }
						$object["eventbox"]->ok($object["lang"]->translate("event_operation_success"));
						Header("Location: ".$return_url_after_op.""); exit();
					} else { $object["eventbox"]->error($object["lang"]->translate("string_error")); Header("Location: ".$return_url_after_op.""); exit();}
				} else { $object["eventbox"]->error($object["lang"]->translate("event_csrf")); Header("Location: ".$return_url_after_op.""); exit();}
			}	
			// Rename a File
			if(@$_GET["fmgr_file_rename"]) {
				if($object["csrf"]->check(@$_GET["token"])) {
					if(hive__trim(@$_GET["fmgr_file_rename"]) != "") {
						if(is_numeric(@$_GET["fmgr_file_rename_id"])) {
							$xx = $object["mysql"]->select("SELECT * FROM "._TABLE_FILE_." WHERE id = '".@$_GET["fmgr_file_rename_id"]."' AND file_type = '".$file_type."'", false);
							$extension = pathinfo($xx["file_title"], PATHINFO_EXTENSION);
							$extension = $extension ? ".".$extension."" : "";
							$b = array();
							$input = $_GET['fmgr_file_rename'];
							$cleaned_input = preg_replace('/[^a-zA-Z0-9\s_\.-]/', '', $input);
							$b[0]["value"] = $cleaned_input.$extension;
							$object["mysql"]->query("UPDATE "._TABLE_FILE_." SET file_title = ? WHERE id = '".@$_GET["fmgr_file_rename_id"]."' AND file_type = '".$file_type."'", $b);
							$object["eventbox"]->ok($object["lang"]->translate("event_operation_success"));
							Header("Location: ".$return_url_after_op.""); exit();
						} else { $object["eventbox"]->error($object["lang"]->translate("string_error")); Header("Location: ".$return_url_after_op.""); exit();}
					} else { $object["eventbox"]->error($object["lang"]->translate("string_error")); Header("Location: ".$return_url_after_op.""); exit();}
				} else { $object["eventbox"]->error($object["lang"]->translate("event_csrf")); Header("Location: ".$return_url_after_op.""); exit();}
			}	
			// Rename a Folder
			if(@$_GET["fmgr_folder_rename"]) {
				if($object["csrf"]->check(@$_GET["token"])) {
					if(hive__trim(@$_GET["fmgr_folder_rename"]) != "") {
						if(is_numeric(@$_GET["fmgr_folder_rename_id"])) {
							$b = array();
							$input = $_GET['fmgr_folder_rename'];
							$cleaned_input = preg_replace('/[^a-zA-Z0-9\s_\.-]/', '', $input);
							$b[0]["value"] = $cleaned_input;
							$object["mysql"]->query("UPDATE "._TABLE_FILE_FOLDER_." SET folder_name = ? WHERE id = '".@$_GET["fmgr_folder_rename_id"]."' AND folder_type = '".$file_type."'", $b);
							$object["eventbox"]->ok($object["lang"]->translate("event_operation_success"));
							Header("Location: ".$return_url_after_op.""); exit();
						} else { $object["eventbox"]->error($object["lang"]->translate("string_error")); Header("Location: ".$return_url_after_op.""); exit();}
					} else { $object["eventbox"]->error($object["lang"]->translate("string_error")); Header("Location: ".$return_url_after_op.""); exit();}
				} else { $object["eventbox"]->error($object["lang"]->translate("event_csrf")); Header("Location: ".$return_url_after_op.""); exit();}
			}	
			// Delete a Folder
			if(@$_GET["fmgr_folder_delete"]) {
				if($object["csrf"]->check(@$_GET["token"])) {
					if(is_numeric(@$_GET["fmgr_folder_delete"])) {
						$has = false;
						$xx = $object["mysql"]->select("SELECT * FROM "._TABLE_FILE_." WHERE fk_file_folder = '".@$_GET["fmgr_folder_delete"]."' AND file_type = '".$file_type."'", false);
						if(is_array($xx)) {
							$has = true;
						}			
						$xx = $object["mysql"]->select("SELECT * FROM "._TABLE_FILE_FOLDER_." WHERE fk_file_folder = '".@$_GET["fmgr_folder_delete"]."' AND folder_type = '".$file_type."'", false);
						if(is_array($xx)) {
							$has = true;
						}									
						if($has) {
							$object["eventbox"]->error($object["lang"]->translate("event_still_items_inside"));
							Header("Location: ".$return_url_after_op.""); exit();
						}
						$object["mysql"]->query("DELETE FROM "._TABLE_FILE_FOLDER_." WHERE id = '".@$_GET["fmgr_folder_delete"]."' AND folder_type = '".$file_type."'");
						$object["eventbox"]->ok($object["lang"]->translate("event_operation_success"));
						Header("Location: ".$return_url_after_op.""); exit();
					} else { $object["eventbox"]->error($object["lang"]->translate("string_error")); Header("Location: ".$return_url_after_op.""); exit();}
				} else { $object["eventbox"]->error($object["lang"]->translate("event_csrf")); Header("Location: ".$return_url_after_op.""); exit();}
			}	
			// Create a Folder
			if(@$_GET["fmgr_folder_create"]) {
				if($object["csrf"]->check(@$_GET["token"])) {
					if(hive__trim(@$_GET["fmgr_folder_create"]) != "") {
						$input = $_GET['fmgr_folder_create'];
						$cleaned_input = preg_replace('/[^a-zA-Z0-9\s_\.-]/', '', $input);
						// Check if Choosen Position is valid
						$parent	= hive__trim(@$_GET["position"]);		
						if(is_numeric($parent)) {
							$xx = $object["mysql"]->select("SELECT * FROM "._TABLE_FILE_FOLDER_." WHERE id = '".$parent."' AND folder_type = '".$file_type."'", false);
							if(!is_array($xx)) {
								$parent = 0; 
							}
						} else { $parent = 0; }						
						$bind[0]["value"] = @$cleaned_input;
						$bind[0]["type"] = "s";
						$bind[1]["value"] = $parent;
						$bind[1]["type"] = "s";
						$object["mysql"]->query("INSERT INTO "._TABLE_FILE_FOLDER_." (folder_name, fk_file_folder, folder_type, fk_user)
							VALUES (?, ?, '".$file_type."', ".$object["user"]->user_id.");", $bind);		
						$object["eventbox"]->ok($object["lang"]->translate("event_operation_success"));
						Header("Location: ".$return_url_after_op.""); exit();
					} else { $object["eventbox"]->error($object["lang"]->translate("string_error")); Header("Location: ".$return_url_after_op.""); exit();}
				} else { $object["eventbox"]->error($object["lang"]->translate("event_csrf")); Header("Location: ".$return_url_after_op.""); exit();}
			}	
		}
	
		//////////////////////////////////////////////////////////////////////////////////////
		## Multi-Upload-Box
		//////////////////////////////////////////////////////////////////////////////////////	
		function adm_fmgr_ul_multi($object, $file_type) {
			if(_HIVE_MODE_ != "_administrator") { return false; }
			if($file_type == "css") {
				$upload_folder = $object["path"]."/_data/"._HIVE_MODE_."/_css/";
				$upload_folderC = $upload_folder."/__cache/";
				hive__folder_create($upload_folder, true, false);
				hive__folder_create($upload_folder."/__cache/", true, true);
				$preserve_file_ext = true;
				$allow_direct_edit = array("css", "php");
				$allowed_types = array("css", "php");
			} elseif($file_type == "php") {
				$upload_folder = $object["path"]."/_data/"._HIVE_MODE_."/_php/";
				$upload_folderC = $upload_folder."/__cache/";
				hive__folder_create($upload_folder, true, false);
				hive__folder_create($upload_folder."/__cache/", true, true);
				$preserve_file_ext = true;
				$allowed_types = array("php");
				$allow_direct_edit = array("php");
			} elseif($file_type == "private") {
				$upload_folder = $object["path"]."/_data/"._HIVE_MODE_."/_private/";
				$upload_folderC = $upload_folder."/__cache/";
				hive__folder_create($upload_folder, true, false);
				hive__folder_create($upload_folder."/__cache/", true, true);
				$preserve_file_ext = false;
				$allowed_types = true;
				$allow_direct_edit = array("css", "php", "txt", "xml", "csv");
			} elseif($file_type == "public") {
				$upload_folder = $object["path"]."/_data/"._HIVE_MODE_."/_public/";
				$upload_folderC = $upload_folder."/__cache/";
				hive__folder_create($upload_folder, true, false);
				hive__folder_create($upload_folder."/__cache/", true, true);
				$preserve_file_ext = true;
				$allowed_types = true;
			} else {
				return false;
			}	
			$return_url_after_op = "./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1]."&position=".hive__hsc(@$_GET["position"])."";
			// Show Added Files Area
			echo sf__theme_alert_info("<br />".$object["lang"]->translate("adm_nav_file_dragdrop"), "xfpe_minheight100px xfpe_textaligncenter xfpe_aligncenter admi_internal_upload_handler xfpe_cursorpointer");
			echo '<span id="admi_ulres_curfiles"></span>';
			echo '<button type="button" class="btn btn-primary xfpe_cursorpointer" onclick="admi_ul_p_start()">'.$object["lang"]->translate("string_save").'</button>';
			?><script>
				// Popup Functions
				function admi_ul_p_update(text_ovr, int_progress) {
					var ptext = "";
					var ptextv = "";
					if(text_ovr == "finish") {
						ptext = ptext + "<b>"+<?php echo json_encode($object["lang"]->translate("string_upload_completed")); ?>+"</b><br />"+<?php echo json_encode($object["lang"]->translate("string_progress")); ?>+": 100%<br />"+<?php echo json_encode($object["lang"]->translate("string_files")); ?>+": "+admi_ulres_uploaded_files+"/"+admi_ulres_added_files;
						if(admi_ulres_error_happen) { ptext = ptext + "<br /><font color='red'>"+<?php echo json_encode($object["lang"]->translate("string_error_during_operation")); ?>+"</font>"; }
						ptext = ptext + "<br /><br /><a class='btn btn-primary' href='./?l1=<?php echo _HIVE_URL_CUR_[0]; ?>&l2=<?php echo _HIVE_URL_CUR_[1]; ?>&position=<?php echo hive__hsc(@$_GET["position"]); ?>'>"+<?php echo json_encode($object["lang"]->translate("string_close")); ?>+"</a>";
					} 
					if(text_ovr == "update") {
						ptextv = Math.round( int_progress * 10000) / 100;
						ptext = ptext + "<b>"+<?php echo json_encode($object["lang"]->translate("string_upload_in_progress")); ?>+"</b><br />"+<?php echo json_encode($object["lang"]->translate("string_progress")); ?>+": "+ptextv+"%<br />"+<?php echo json_encode($object["lang"]->translate("string_files")); ?>+": "+admi_ulres_uploaded_files+"/"+admi_ulres_added_files;
						if(admi_ulres_error_happen) { ptext = ptext + "<br /><font color='red'>"+<?php echo json_encode($object["lang"]->translate("string_error_during_operation")); ?>+"</font>"; }
					}
					var y = document.getElementById("xjs_popup_inner"); 
					$("#xjs_popup_inner").html(ptext);
				}
				function admi_ul_p_start() {
					if(admi_ulres_added_files > 0) { xjs_popup(<?php echo json_encode($object["lang"]->translate("string_please_wait")); ?>, false); } 
					else { xjs_popup(<?php echo json_encode($object["lang"]->translate("string_please_choose_items")); ?>, <?php echo json_encode($object["lang"]->translate("string_close")); ?>); return false; }
					admi_upload_resumable.upload();
				}
				// File Boxes Function
				function admi_ulres_remove_item(itemIndex) { 
					admi_upload_resumable.files.splice(itemIndex,1); 
					admi_ulres_updateBoxFiles(); 
					admi_ulres_added_files = admi_ulres_added_files - 1;
				}
				function admi_ulres_updateBoxFiles() {
					var admi_upload_repl = "";
					admi_upload_resumable.files.forEach(function (item, index) { 
						admi_upload_repl = admi_upload_repl + '<div class="xfpe_floatleft xfpe_fontweightnormal xfpe_marginright10px xfpe_margintop10px" style="border-radius: 5px; font-size: 14px; background: #DDDDDD; border: none; padding: 5px;">'+item.fileName+' <a class="xfpe_cursorpointer" onclick="admi_ulres_remove_item(\''+index+'\');">'+<?php echo json_encode($object["lang"]->translate("string_delete")); ?>+'</a></div> ';
					});	
					if(admi_ulres_added_files > 0) {
						admi_upload_repl = admi_upload_repl + '<br clear="both"><br clear="both"/>';	
					}						
					$("#admi_ulres_curfiles").text("");$("#admi_ulres_curfiles").append(admi_upload_repl); 
				}		
				// Initialization of Variables
				var admi_ulres_uploaded_files = 0;
				var admi_ulres_added_files = 0;
				var admi_ulres_error_happen = false;
				// Resumable Setup
				var admi_upload_resumable = new Resumable({ target: 'xx', maxFileSize: 50000000000, maxFiles: 20 <?php if($file_type == "css") { ?> , fileType: ['php'] <?php } elseif($file_type == "php") { ?> , fileType: ['php'] <?php } ?>});
				admi_upload_resumable.opts.target  = './_site/<?php echo _HIVE_MODE_; ?>/_action/file_<?php echo $file_type; ?>_upload.php?position=<?php echo hive__hsc(@$_GET["position"]); ?>'; 
				admi_upload_resumable.on('fileSuccess', function(file){ admi_ulres_uploaded_files = admi_ulres_uploaded_files + 1;});
				admi_upload_resumable.on('pause', function(){ /* No Reaction Integrated */ });
				admi_upload_resumable.on('cancel', function(){ /* No Reaction Integrated */ });		
				admi_upload_resumable.on('fileRetry', function(file){ /* No Reaction Integrated */ });	
				admi_upload_resumable.on('fileProgress', function(file) { /* No Reaction Integrated */ } ); 	
				admi_upload_resumable.on('filesAdded', function(array) { admi_ulres_updateBoxFiles(); });	
				admi_upload_resumable.on('fileAdded', function(file, event)	{ admi_ulres_updateBoxFiles(); admi_ulres_added_files = admi_ulres_added_files + 1; });
				admi_upload_resumable.on('fileError', function(file, message){ admi_ulres_error_happen = true; });
				admi_upload_resumable.on('error', function(message, file){ admi_ulres_error_happen = true; });
				admi_upload_resumable.on('complete', function()	{ admi_ul_p_update("finish", ""); } ); 
				admi_upload_resumable.on('progress', function(){ admi_ul_p_update("update", admi_upload_resumable.progress()); }); 
				admi_upload_resumable.assignBrowse(document.getElementsByClassName('admi_internal_upload_handler')[0]);
				admi_upload_resumable.assignDrop(document.getElementsByClassName('admi_internal_upload_handler')[0]);
			</script><?php
		}

		//////////////////////////////////////////////////////////////////////////////////////
		## List
		//////////////////////////////////////////////////////////////////////////////////////	
		function adm_fmgr_list($object, $file_type) {
			if(_HIVE_MODE_ != "_administrator") { return false; }
			if($file_type == "css") {
				$upload_folder = $object["path"]."/_data/"._HIVE_MODE_."/_css/";
				$upload_folderC = $upload_folder."/__cache/";
				hive__folder_create($upload_folder, true, false);
				hive__folder_create($upload_folder."/__cache/", true, true);
				$preserve_file_ext = true;
				$allow_direct_edit = array("css", "php");
				$allowed_types = array("css", "php");
			} elseif($file_type == "php") {
				$upload_folder = $object["path"]."/_data/"._HIVE_MODE_."/_php/";
				$upload_folderC = $upload_folder."/__cache/";
				hive__folder_create($upload_folder, true, false);
				hive__folder_create($upload_folder."/__cache/", true, true);
				$preserve_file_ext = true;
				$allowed_types = array("php");
				$allow_direct_edit = array("php");
			} elseif($file_type == "private") {
				$upload_folder = $object["path"]."/_data/"._HIVE_MODE_."/_private/";
				$upload_folderC = $upload_folder."/__cache/";
				hive__folder_create($upload_folder, true, false);
				hive__folder_create($upload_folder."/__cache/", true, true);
				$preserve_file_ext = false;
				$allowed_types = true;
				$allow_direct_edit = array("css", "php", "txt", "xml", "csv");
			} elseif($file_type == "public") {
				$upload_folder = $object["path"]."/_data/"._HIVE_MODE_."/_public/";
				$upload_folderC = $upload_folder."/__cache/";
				hive__folder_create($upload_folder, true, false);
				hive__folder_create($upload_folder."/__cache/", true, true);
				$preserve_file_ext = true;
				$allowed_types = true;
			} else {
				return false;
			}	
			$return_url_after_op = "./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1]."&position=".hive__hsc(@$_GET["position"])."";
			// Scripts
			?> <script>
				function admi_p_folder_create(){
					Swal.fire({
					  title: `<?php echo $object["lang"]->translate("string_create_folder"); ?>`,
					  html: `
						<form method='get' action='<?php echo "./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1].""; ?>'>
						<br/>
							<input type='text' name='fmgr_folder_create' value='' class="form-control"><br />
							<input type='hidden' name='<?php echo _HIVE_URL_GET_[0]; ?>' value='<?php echo _HIVE_URL_CUR_[0]; ?>'>
							<input type='hidden' name='<?php echo _HIVE_URL_GET_[1]; ?>' value='<?php echo _HIVE_URL_CUR_[1]; ?>'>
							<input type='hidden' name='position' value='<?php echo hive__hsc(@$_GET["position"]); ?>'>
							<input type='hidden' name='token' value='<?php echo $object["csrf"]->get(); ?>'>
							<input type='submit' class=\"btn btn-primary\" value='<?php echo htmlentities($object["lang"]->translate("string_save") ?? ''); ?>'> <a onclick='Swal.close();' class='btn btn-danger'><?php echo htmlentities($object["lang"]->translate("string_cancel") ?? ''); ?></a>
						</form>
						`,
					  showCancelButton: false,
					  showCloseButton: true,
					  showConfirmButton: false
					});
				}
				function admi_p_folder_delete(folder_name, folder_id){
					Swal.fire({
					  title: `<?php echo $object["lang"]->translate("string_item_delete"); ?>`,
					  html: ``+folder_name+`
						<form method='get' action='<?php echo "./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1].""; ?>'>
							<input type='hidden' name='<?php echo _HIVE_URL_GET_[0]; ?>' value='<?php echo _HIVE_URL_CUR_[0]; ?>'>
							<input type='hidden' name='<?php echo _HIVE_URL_GET_[1]; ?>' value='<?php echo _HIVE_URL_CUR_[1]; ?>'>
							<input type='hidden' name='position' value='<?php echo hive__hsc(@$_GET["position"]); ?>'>
							<input type='hidden' name='fmgr_folder_delete' value='`+folder_id+`'>
							<input type='hidden' name='token' value='<?php echo $object["csrf"]->get(); ?>'>
							<br /><input type='submit' class=\"btn btn-primary\" value='<?php echo htmlentities($object["lang"]->translate("string_yes") ?? ''); ?>'> <a onclick='Swal.close();' class='btn btn-danger'><?php echo htmlentities($object["lang"]->translate("string_cancel") ?? ''); ?></a>
						</form>
						`,
					  showCancelButton: false,
					  showCloseButton: true,
					  icon: "warning",
					  showConfirmButton: false
					});
				}
				function admi_p_folder_rename(folder_name, folder_id){
					Swal.fire({
					  title: `<?php echo $object["lang"]->translate("string_rename"); ?>`,
					  html: `
						<form method='get' action='<?php echo "./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1].""; ?>'>
						<br/>
							<input type='text' name='fmgr_folder_rename' value='`+folder_name+`' class="form-control"><br />
							<input type='hidden' name='<?php echo _HIVE_URL_GET_[0]; ?>' value='<?php echo _HIVE_URL_CUR_[0]; ?>'>
							<input type='hidden' name='<?php echo _HIVE_URL_GET_[1]; ?>' value='<?php echo _HIVE_URL_CUR_[1]; ?>'>
							<input type='hidden' name='position' value='<?php echo hive__hsc(@$_GET["position"]); ?>'>
							<input type='hidden' name='fmgr_folder_rename_id' value='`+folder_id+`'>
							<input type='hidden' name='token' value='<?php echo $object["csrf"]->get(); ?>'>
							<input type='submit' class=\"btn btn-primary\" value='<?php echo htmlentities($object["lang"]->translate("string_save") ?? ''); ?>'> <a onclick='Swal.close();' class='btn btn-danger'><?php echo htmlentities($object["lang"]->translate("string_cancel") ?? ''); ?></a>
						</form>
						`,
					  showCancelButton: false,
					  showCloseButton: true,
					  showConfirmButton: false
					});
				}
				function admi_p_file_delete(file_name, file_id){
					Swal.fire({
					  title: `<?php echo $object["lang"]->translate("string_item_delete"); ?>`,
					  html: ``+file_name+`
						<form method='get' action='<?php echo "./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1].""; ?>'>
							<input type='hidden' name='<?php echo _HIVE_URL_GET_[0]; ?>' value='<?php echo _HIVE_URL_CUR_[0]; ?>'>
							<input type='hidden' name='<?php echo _HIVE_URL_GET_[1]; ?>' value='<?php echo _HIVE_URL_CUR_[1]; ?>'>
							<input type='hidden' name='position' value='<?php echo hive__hsc(@$_GET["position"]); ?>'>
							<input type='hidden' name='fmgr_file_delete' value='`+file_id+`'>
							<input type='hidden' name='token' value='<?php echo $object["csrf"]->get(); ?>'>
							<br /><input type='submit' class=\"btn btn-primary\" value='<?php echo htmlentities($object["lang"]->translate("string_yes") ?? ''); ?>'> <a onclick='Swal.close();' class='btn btn-danger'><?php echo htmlentities($object["lang"]->translate("string_cancel") ?? ''); ?></a>
						</form>
						`,
					  showCancelButton: false,
					  showCloseButton: true,
					  showConfirmButton: false
					});
				}
				function admi_p_file_rename(file_name, file_id){
					Swal.fire({
					  title: `<?php echo $object["lang"]->translate("string_rename"); ?>`,
					  html: `
						<form method='get' action='<?php echo "./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1].""; ?>'>
						<br/>
							<input type='text' name='fmgr_file_rename' value='`+file_name+`' class="form-control"><br />
							<input type='hidden' name='<?php echo _HIVE_URL_GET_[0]; ?>' value='<?php echo _HIVE_URL_CUR_[0]; ?>'>
							<input type='hidden' name='<?php echo _HIVE_URL_GET_[1]; ?>' value='<?php echo _HIVE_URL_CUR_[1]; ?>'>
							<input type='hidden' name='position' value='<?php echo hive__hsc(@$_GET["position"]); ?>'>
							<input type='hidden' name='fmgr_file_rename_id' value='`+file_id+`'>
							<input type='hidden' name='token' value='<?php echo $object["csrf"]->get(); ?>'>
							<input type='submit' class=\"btn btn-primary\" value='<?php echo htmlentities($object["lang"]->translate("string_save") ?? ''); ?>'> <a onclick='Swal.close();' class='btn btn-danger'><?php echo htmlentities($object["lang"]->translate("string_cancel") ?? ''); ?></a>
						</form>
						`,
					  showCancelButton: false,
					  showCloseButton: true,
					  showConfirmButton: false
					});
				}
			</script> <?php
			// Show Current Root Folders and Create new Folder
			if(is_numeric(@$_GET["position"])) {
				echo " <a href='./?l1="._HIVE_URL_CUR_[0]."&l2="._HIVE_URL_CUR_[1]."&position=0'>".'...</a> /';
				$tmpco = @$_GET["position"];
				$tmpcota = array();
				if(is_numeric($tmpco)) {
					while($tmpco != "0") {
						$xx1 = $object["mysql"]->select("SELECT * FROM "._TABLE_FILE_FOLDER_." WHERE id = '".$tmpco."' AND folder_type = '".$file_type."'", false);
						if($xx1) {
							array_push($tmpcota, array(hive__hsc($xx1["folder_name"]), $xx1["id"]));
						}
						$tmpco = $xx1["fk_file_folder"];
					}
					$tmpcota = array_reverse($tmpcota, true);
					foreach($tmpcota as $kvv => $kvvv) {
						echo " <a href='./?l1="._HIVE_URL_CUR_[0]."&l2="._HIVE_URL_CUR_[1]."&position=".$kvvv[1]."'>".$kvvv[0]."</a> /";
					}
				}
			} else {
				echo '/';
			}
			echo ' <a onclick="admi_p_folder_create()" class="xfpe_cursorpointer">+ '.$object["lang"]->translate("string_create").'</a> ';					
			echo '<hr>';
			// Check if Choosen Position is valid
			$parent	= hive__trim(@$_GET["position"]);		
			if(is_numeric($parent)) {
				$xx = $object["mysql"]->select("SELECT * FROM "._TABLE_FILE_FOLDER_." WHERE id = '".$parent."' AND folder_type = '".$file_type."'", false);
				if(!is_array($xx)) {
					$parent = " AND fk_file_folder = 0 "; 
				} else {
					$parent = " AND fk_file_folder = ".$parent." "; 
				}
			} else { $parent = " AND fk_file_folder = 0 ";  }		
			$hasone = false;
			$var = $object["mysql"]->select("SELECT id, folder_name, fk_file_folder, creation, fk_user  FROM "._TABLE_FILE_FOLDER_." WHERE folder_type = '".$file_type."' ".$parent." ORDER BY folder_name ASC",true);
			if(is_array($var)) {
				foreach($var as $kv => $vv) {
					$hasone = true;
					echo '<div>';		
						echo '<div class="xfpe_floatleft" style="max-width: 20%">';	
							echo '<img src="./_site/'._HIVE_MODE_.'/_theme/folder.png" style="width: 40px; margin-right: 5px;">';
						echo '</div>';		
						echo '<div class="xfpe_floatleft" style="max-width: 80%">';					
							echo '<div style="margin-top: 0px;padding-bottom: 5px;">'.hive__hsc($vv["folder_name"]).' '.sf__theme_label_info(adm_user_link($vv["fk_user"])).'</div> ';	
							echo '<a href="'."./?"._HIVE_URL_GET_[0]."="._HIVE_URL_CUR_[0]."&"._HIVE_URL_GET_[1]."="._HIVE_URL_CUR_[1]."".'&position='.$vv["id"].'" class="btn btn-primary">'.$object["lang"]->translate("string_view").'</a> ';			
							echo '<a onclick=\'admi_p_folder_rename('.json_encode($vv["folder_name"]).', '.json_encode($vv["id"]).')\' class="btn btn-primary">'.$object["lang"]->translate("string_rename").'</a> ';			
							echo '<a onclick=\'admi_p_folder_delete('.json_encode($vv["folder_name"]).', '.json_encode($vv["id"]).')\' class="btn btn-danger">'.$object["lang"]->translate("string_delete").'</a> ';	
						echo '</div>';					
					echo '</div>';					
					echo '<br clear="both">';				
					echo '<hr>';				
				} 
			} unset($var);
			$var = $object["mysql"]->select("SELECT id, file_title, file_size, file_type, fk_file_folder, creation, fk_user  FROM "._TABLE_FILE_." WHERE file_type = '".$file_type."' ".$parent." ORDER BY file_title ASC",true);
			if(is_array($var)) {
				foreach($var as $kv => $vv) {
					$hasone = true;
					echo '<div>';		
						echo '<div class="xfpe_floatleft" style="max-width: 20%">';	
							$extension = pathinfo($vv['file_title'], PATHINFO_EXTENSION);
							$extension = $extension ? "".$extension."" : "";
							if(file_exists("./_core/_vendor/free-file-icons/png/".$extension.".png")) {
								echo '<img src="./_core/_vendor/free-file-icons/png/'.$extension.'.png">';
								
							} else {
								echo '<img src="./_core/_vendor/free-file-icons/png/_blank.png">';
							}
						echo '</div>';	
						echo '<div class="xfpe_floatleft" style="max-width: 80%">';	
							$extension = pathinfo($vv['file_title'], PATHINFO_EXTENSION);
							$extension = $extension ? ".".$extension."" : "";		
							if(is_numeric($vv["file_size"])) { $vv["file_size"] = $vv["file_size"] / 1000000; $vv["file_size"] = round($vv["file_size"], 2);  }
							echo '<div style="margin-top: 0px;padding-bottom: 5px;">'.hive__hsc($vv["file_title"]).' '.sf__theme_label_info($vv["id"]).' '.sf__theme_label_info(adm_user_link($vv["fk_user"])).' '.sf__theme_label_info(hive__hsc($vv["file_size"])." MB").' </div> ';	
							if($file_type == "css") { echo '<a href="./_data/'._HIVE_MODE_.'/_css/'.$vv["id"].$extension.'" class="btn btn-primary">'.$object["lang"]->translate("string_hardlink").'</a> ';	}
							if($file_type == "php") { echo '<a href="./_data/'._HIVE_MODE_.'/_php/'.$vv["id"].$extension.'" class="btn btn-primary">'.$object["lang"]->translate("string_hardlink").'</a> ';	}
							if($file_type == "public") { echo '<a href="./_data/'._HIVE_MODE_.'/_public/'.$vv["id"].$extension.'" class="btn btn-primary">'.$object["lang"]->translate("string_hardlink").'</a> ';	}
							echo '<a href="./_site/'._HIVE_MODE_.'/_external/file_download.php?id='.$vv["id"].'&mode=view" class="btn btn-primary">'.$object["lang"]->translate("string_view").'</a> ';		
							echo '<a href="./_site/'._HIVE_MODE_.'/_external/file_download.php?id='.$vv["id"].'&mode=dl" class="btn btn-primary">'.$object["lang"]->translate("string_download").'</a> ';			
							echo '<a onclick=\'admi_p_file_rename('.json_encode(pathinfo($vv["file_title"], PATHINFO_EXTENSION) ? pathinfo($vv["file_title"], PATHINFO_FILENAME) : "").', '.json_encode($vv["id"]).')\' class="btn btn-primary">'.$object["lang"]->translate("string_rename").'</a> ';			
							echo '<a onclick=\'admi_p_file_delete('.json_encode($vv["file_title"]).', '.json_encode($vv["id"]).')\' class="btn btn-danger">'.$object["lang"]->translate("string_delete").'</a> ';
						echo '</div>';					
					echo '</div>';	
					echo '<br clear="both">';							
					echo '<hr>';					
				} 
			} unset($var);
			
			if(!$hasone) {
				echo sf__theme_alert_info($object["lang"]->translate("string_no_items"));
			}
			
		}