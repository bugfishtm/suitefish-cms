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
	*/ if(!is_array(@$object)) { @http_response_code(404); Header("Location: ../"); exit(); } 

	////////////////////////////////////////////////////////////////////////////////////////////////
	// Favicon Functionalities
	////////////////////////////////////////////////////////////////////////////////////////////////	
	if(file_exists("./_data/"._HIVE_MODE_."/favicon.ico")) { 
		$fav = "./_data/"._HIVE_MODE_."/favicon.ico";
		$favc = true;
	} else {
		$fav = "./_site/"._HIVE_MODE_."/_theme/favicon.ico";
		$favc = false;
	}
	if(file_exists("./_data/"._HIVE_MODE_."/meta.jpg")) { 
		$meta = "./_data/"._HIVE_MODE_."/meta.jpg";
		$metac = true;
	} else {
		$meta = "./_site/"._HIVE_MODE_."/_theme/meta.jpg";
		$metac = false;
	}
	if(@$_POST["adm_item_op_ciupl"] == "true") {
		if($object["csrf"]->check(@$_POST["token"])) {
			if (isset($_FILES['file'])) { 
				$fileTmpPath = $_FILES['file']['tmp_name'];
				$fileName = $_FILES['file']['name'];
				$fileSize = $_FILES['file']['size'];
				$fileType = $_FILES['file']['type'];
				@mkdir('./_data/');
				@mkdir('./_data/'._HIVE_MODE_.'/');
				$uploadDirectory = './_data/'._HIVE_MODE_.'/';
				$safeFileName = "favicon.ico";
				$destinationPath = $uploadDirectory . $safeFileName;
				@unlink($destinationPath);
				if (!is_dir($uploadDirectory)) {
					@mkdir($uploadDirectory, 0755, true);
				}
				if (move_uploaded_file($fileTmpPath, $destinationPath)) {
					$object["eventbox"]->ok($object["lang"]->translate("event_operation_success")); 
				} else {
					$object["eventbox"]->error($object["lang"]->translate("string_error")); 
				}
			} else {
				$object["eventbox"]->error($object["lang"]->translate("string_error")); 
			}	
			Header("Location: ./?l1=system&l2=setup"); 
			exit();					
		} else { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_csrf")); Header("Location: ./?l1=system&l2=setup"); exit(); }
	}
	if(@$_POST["adm_item_op_cimupl"] == "true") {
		if($object["csrf"]->check(@$_POST["token"])) {
			if (isset($_FILES['file'])) { 
				$fileTmpPath = $_FILES['file']['tmp_name'];
				$fileName = $_FILES['file']['name'];
				$fileSize = $_FILES['file']['size'];
				$fileType = $_FILES['file']['type'];
				@mkdir('./_data/');
				@mkdir('./_data/'._HIVE_MODE_.'/');
				$uploadDirectory = './_data/'._HIVE_MODE_.'/';
				$safeFileName = "meta.jpg";
				$destinationPath = $uploadDirectory . $safeFileName;
				@unlink($destinationPath);
				if (!is_dir($uploadDirectory)) {
					@mkdir($uploadDirectory, 0755, true);
				}
				if (move_uploaded_file($fileTmpPath, $destinationPath)) {
					$object["eventbox"]->ok($object["lang"]->translate("event_operation_success")); 
				} else {
					$object["eventbox"]->error($object["lang"]->translate("string_error")); 
				}
			} else {
				$object["eventbox"]->error($object["lang"]->translate("string_error")); 
			}	
			Header("Location: ./?l1=system&l2=setup"); 
			exit();					
		} else { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_csrf")); Header("Location: ./?l1=system&l2=setup"); exit(); }
	}
	if(@$_GET["adm_item_op_ciupldel"] == "true") {
		if($object["csrf"]->check(@$_GET["token"])) {
			$object["eventbox"]->ok($object["lang"]->translate("event_operation_success")); 
			@unlink("./_data/"._HIVE_MODE_."/favicon.ico");
			Header("Location: ./?l1=system&l2=setup"); 
			exit();					
		} else { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_csrf")); Header("Location: ./?l1=system&l2=setup"); exit(); }
	}
	if(@$_GET["adm_item_op_cimupldel"] == "true") {
		if($object["csrf"]->check(@$_GET["token"])) {
			$object["eventbox"]->ok($object["lang"]->translate("event_operation_success")); 
			@unlink("./_data/"._HIVE_MODE_."/meta.jpg");
			Header("Location: ./?l1=system&l2=setup"); 
			exit();					
		} else { $object["eventbox"]->error($object["lang"]->translate("hive_login_msg_csrf")); Header("Location: ./?l1=system&l2=setup"); exit(); }
	}
	if(file_exists("./_data/"._HIVE_MODE_."/favicon.ico")) { 
		$fav = "./_data/"._HIVE_MODE_."/favicon.ico";
		$favc = true;
	} else {
		$fav = "./_site/"._HIVE_MODE_."/_theme/favicon.ico";
		$favc = false;
	}
	if(file_exists("./_data/"._HIVE_MODE_."/meta.jpg")) { 
		$meta = "./_data/"._HIVE_MODE_."/meta.jpg";
		$metac = true;
	} else {
		$meta = "./_site/"._HIVE_MODE_."/_theme/meta.jpg";
		$metac = false;
	}
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Header
	////////////////////////////////////////////////////////////////////////////////////////////////	
	adminbsb_header($object, $object["lang"]->translate("adm_nav_system_setup")._HIVE_TITLE_SPACER_. $object["lang"]->translate("adm_nav_system"));
	echo sf__theme_title($object["lang"]->translate("adm_nav_system_setup"), $object["lang"]->translate("adm_nav_system_setup_exp"));	

	////////////////////////////////////////////////////////////////////////////////////////////////
	// Favicon Script
	////////////////////////////////////////////////////////////////////////////////////////////////	
	?>
		<!-- Favicon Functions -->
		<script>
			function adms_popup_ci() {
				document.getElementById('adms_img_upload_request').click();
			}
			function adms_event_ovr(event) {
				const file = event.target.files[0]; 
				const form = document.getElementById('adms_img_upload_requestform');
				form.submit();
			}
		</script>
		<!-- Hidden Upload form for Images -->
		<form action="./?l1=system&l2=setup" method="post" id="adms_img_upload_requestform" enctype="multipart/form-data">
			<input type="file" name="file" id="adms_img_upload_request" accept=".ico" style="display: none;"  onchange="adms_event_ovr(event)" />
			<input type='hidden' name='token' value='<?php echo @$object["csrf"]->get(); ?>'>
			<input type='hidden' name='adm_item_op_ciupl' value='true'>
		</form>
		<!-- Meta Functions -->
		<script>
			function adms_popup_cim() {
				document.getElementById('adms_img_upload_requestm').click();
			}
			function adms_event_ovrm(event) {
				const file = event.target.files[0]; 
				const form = document.getElementById('adms_img_upload_requestformm');
				form.submit();
			}
		</script>
		<!-- Hidden Upload form for Images -->
		<form action="./?l1=system&l2=setup" method="post" id="adms_img_upload_requestformm" enctype="multipart/form-data">
			<input type="file" name="file" id="adms_img_upload_requestm" accept=".jpg" style="display: none;"  onchange="adms_event_ovrm(event)" />
			<input type='hidden' name='token' value='<?php echo @$object["csrf"]->get(); ?>'>
			<input type='hidden' name='adm_item_op_cimupl' value='true'>
		</form>
	
	
	<?php
	
	
	
	
	
	
	
	
	
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Space Fix
	////////////////////////////////////////////////////////////////////////////////////////////////		
	echo sf__theme_space_m();

	/////////////////////////////////////////////////////////////////////////////
	// Regenerate CSRF for Forms
	/////////////////////////////////////////////////////////////////////////////
	$object["var"]->form_start();
	$lang_active = $object["lang"]->translate("string_active");
	$lang_inactive = $object["lang"]->translate("string_inactive");

	////////////////////////////////////////////////////////////////////////////////////////////////
	// Website Settings
	////////////////////////////////////////////////////////////////////////////////////////////////
	echo sf__theme_box_start("<h2>".$object["lang"]->translate("string_general")."</h2>", "hive__card_collapse");
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_TITLE_")."</b>"; 
		$object["var"]->form("_HIVE_TITLE_", "string", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_TITLE_SPACER_")."</b>"; 
		$object["var"]->form("_HIVE_TITLE_SPACER_", "string", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_TH_TOPARROW_")."</b>"; 
		$object["var"]->form("_ADM_TH_TOPARROW_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_TH_TOPLOGIN_")."</b>"; 
		$object["var"]->form("_ADM_TH_TOPLOGIN_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_IMPRESSUM_")."</b>"; 
		$object["var"]->form("_ADM_IMPRESSUM_", "text", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_PRIVACY_")."</b>"; 
		$object["var"]->form("_ADM_PRIVACY_", "text", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_FOOTER_")."</b>"; 
		$object["var"]->form("_ADM_FOOTER_", "text", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_CSRF_TIME_")."</b>"; 
		$object["var"]->form("_HIVE_CSRF_TIME_", "int", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_IP_LIMIT_")."</b>"; 
		$object["var"]->form("_HIVE_IP_LIMIT_", "int", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("hive_var-_UPDATER_CODE_")."</b>"; 
		$object["var"]->form("_UPDATER_CODE_", "string", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
	echo sf__theme_box_end();

	////////////////////////////////////////////////////////////////////////////////////////////////
	// Space Fix
	////////////////////////////////////////////////////////////////////////////////////////////////		
	echo sf__theme_space_fix();

	////////////////////////////////////////////////////////////////////////////////////////////////
	// Fav Settings
	////////////////////////////////////////////////////////////////////////////////////////////////
	echo sf__theme_box_start("<h2>".$object["lang"]->translate("string_favicon")."</h2>", "hive__card_collapse");
		echo '<img src="'.$fav.'" style="max-width: 200px; float: left; margin-right: 15px;">';
		echo '<button type="button" onclick="adms_popup_ci()" class="btn btn-primary">'.$object["lang"]->translate("string_upload").'</button> ';
		if($favc) { echo '<a href="?l1=system&l2=setup&adm_item_op_ciupldel=true&token='.$object["csrf"]->get().'" class="btn btn-danger">'.$object["lang"]->translate("string_delete").'</a> '; }
		echo '<br clear="both">';
	echo sf__theme_box_end();
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Space Fix
	////////////////////////////////////////////////////////////////////////////////////////////////		
	echo sf__theme_space_fix();
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Meta Settings
	////////////////////////////////////////////////////////////////////////////////////////////////
	echo sf__theme_box_start("<h2>".$object["lang"]->translate("string_meta")."</h2>", "hive__card_collapse");
		echo '<img src="'.$meta.'" style="max-width: 200px; float: left; margin-right: 15px;">';
		echo '<button type="button" onclick="adms_popup_cim()" class="btn btn-primary">'.$object["lang"]->translate("string_upload").'</button> ';
		if($metac) { echo '<a href="?l1=system&l2=setup&adm_item_op_cimupldel=true&token='.$object["csrf"]->get().'" class="btn btn-danger">'.$object["lang"]->translate("string_delete").'</a> '; }
		echo '<br clear="both">';
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_VMETA_ROBOT_")."</b>"; 
		$object["var"]->form("_ADM_VMETA_ROBOT_", "string", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";		
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_VMETA_LANGUAGE_")."</b>"; 
		$object["var"]->form("_ADM_VMETA_LANGUAGE_", "string", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";		
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_VMETA_AUTHOR_")."</b>"; 
		$object["var"]->form("_ADM_VMETA_AUTHOR_", "string", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";		
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_VMETA_KEYWORD_")."</b>"; 
		$object["var"]->form("_ADM_VMETA_KEYWORD_", "string", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";		
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_VMETA_COPYRIGHT_")."</b>"; 
		$object["var"]->form("_ADM_VMETA_COPYRIGHT_", "string", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";		
	echo sf__theme_box_end();
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Space Fix
	////////////////////////////////////////////////////////////////////////////////////////////////		
	echo sf__theme_space_fix();

	////////////////////////////////////////////////////////////////////////////////////////////////
	// Theme Settings
	////////////////////////////////////////////////////////////////////////////////////////////////
	echo sf__theme_box_start("<h2>".$object["lang"]->translate("string_theme")."</h2>", "hive__card_collapse");
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_TH_DEFAULT_")."</b>"; 
		$object["var"]->form("_ADM_TH_DEFAULT_", "select", $object["suitefish"]["theme"]["valid"], "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_TH_FORCE_")."</b>"; 
		$object["var"]->form("_ADM_TH_FORCE_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";		
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_TH_CHOOSE_")."</b>"; 
		$object["var"]->form("_ADM_TH_CHOOSE_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_TH_TB_")."</b>"; 
		$object["var"]->form("_ADM_TH_TB_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_COLOR_DEFAULT_")."</b>"; 
		$object["var"]->form("_ADM_COLOR_DEFAULT_", "select", _ADM_ADMINBSB_VALIDSUB_, "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_COLOR_FORCE_")."</b>"; 
		$object["var"]->form("_ADM_COLOR_FORCE_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_COLOR_CHOOSE_")."</b>"; 
		$object["var"]->form("_ADM_COLOR_CHOOSE_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_COLOR_TB_")."</b>"; 	
		$object["var"]->form("_ADM_COLOR_TB_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
	echo sf__theme_box_end();
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Space Fix
	////////////////////////////////////////////////////////////////////////////////////////////////		
	echo sf__theme_space_fix();

	////////////////////////////////////////////////////////////////////////////////////////////////
	// Language Settings
	////////////////////////////////////////////////////////////////////////////////////////////////
	echo sf__theme_box_start("<h2>".$object["lang"]->translate("string_language")."</h2>", "hive__card_collapse");
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_LANG_DEFAULT_")."</b>"; 
		$object["var"]->form("_HIVE_LANG_DEFAULT_", "select", array(array("English", "en"), array("Deutsch", "de"), array("Espanol", "es"), array("日本語", "ja"), array("中国人", "zh"), array("Italiano", "it"), array("Français", "fr"), array("Português", "pt"), array("한국어", "kr"), array("Русский", "ru"), array("Türkçe", "tr"), array("हिन्दी", "in")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_LANG_CHOOSE_")."</b>"; 
		$object["var"]->form("_ADM_LANG_CHOOSE_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_LANG_FORCE_")."</b>"; 
		$object["var"]->form("_ADM_LANG_FORCE_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";		
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_LANG_TB_")."</b>"; 
		$object["var"]->form("_ADM_LANG_TB_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
	echo sf__theme_box_end();
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Space Fix
	////////////////////////////////////////////////////////////////////////////////////////////////		
	echo sf__theme_space_fix();

	////////////////////////////////////////////////////////////////////////////////////////////////
	// Mail Settings
	////////////////////////////////////////////////////////////////////////////////////////////////
	echo sf__theme_box_start("<h2>".$object["lang"]->translate("string_mail")."</h2>", "hive__card_collapse");
		echo "<b>".$object["lang"]->translate("hive_var-_SMTP_HOST_")."</b>"; 
		$object["var"]->form("_SMTP_HOST_", "string", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_SMTP_PORT_")."</b>"; 
		$object["var"]->form("_SMTP_PORT_", "int", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_SMTP_USER_")."</b>"; 
		$object["var"]->form("_SMTP_USER_", "string", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_SMTP_PASS_")."</b>"; 
		$object["var"]->form("_SMTP_PASS_", "string", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("hive_var-_SMTP_AUTH_")."</b>"; 
		$object["var"]->form("_SMTP_AUTH_", "select", array(array("SSL", "ssl"), array("TLS", "tls"), array($lang_inactive, "0")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_SMTP_SENDER_MAIL_")."</b>"; 
		$object["var"]->form("_SMTP_SENDER_MAIL_", "string", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_SMTP_SENDER_NAME_")."</b>"; 
		$object["var"]->form("_SMTP_SENDER_NAME_", "string", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_SMTP_MAILS_HEADER_")."</b>"; 
		$object["var"]->form("_SMTP_MAILS_HEADER_", "text", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_SMTP_MAILS_FOOTER_")."</b>"; 
		$object["var"]->form("_SMTP_MAILS_FOOTER_", "text", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_SMTP_DEBUG_")."</b>"; 	
		$object["var"]->form("_SMTP_DEBUG_", "select", array(array($lang_inactive, "0"), array($object["lang"]->translate("string_low"), "1"), array($object["lang"]->translate("string_medium"), "2"), array($object["lang"]->translate("string_high"), "3")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_SMTP_INSECURE_")."</b>"; 				
		$object["var"]->form("_SMTP_INSECURE_", "select", array(array($object["lang"]->translate("string_allow_insecure"), "1"), array($object["lang"]->translate("string_strict_security"), "0")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />"; echo "<br />";
	echo sf__theme_box_end();

	////////////////////////////////////////////////////////////////////////////////////////////////
	// Space Fix
	////////////////////////////////////////////////////////////////////////////////////////////////		
	echo sf__theme_space_fix();

	////////////////////////////////////////////////////////////////////////////////////////////////
	// Redis Settings
	////////////////////////////////////////////////////////////////////////////////////////////////
	echo sf__theme_box_start("<h2>".$object["lang"]->translate("string_redis")."</h2>", "hive__card_collapse");
		echo "<b>".$object["lang"]->translate("hive_var-_REDIS_")."</b>"; 
		$object["var"]->form("_REDIS_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_REDIS_HOST_")."</b>"; 
		$object["var"]->form("_REDIS_HOST_", "string", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_REDIS_PORT_")."</b>"; 
		$object["var"]->form("_REDIS_PORT_", "int", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
	echo sf__theme_box_end();
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Space Fix
	////////////////////////////////////////////////////////////////////////////////////////////////		
	echo sf__theme_space_fix();
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// User Settings
	////////////////////////////////////////////////////////////////////////////////////////////////
	echo sf__theme_box_start("<h2>".$object["lang"]->translate("string_users")."</h2>", "hive__card_collapse");
		echo "<b>".$object["lang"]->translate("hive_var-_USER_MAX_SESSION_")."</b>"; 
		$object["var"]->form("_USER_MAX_SESSION_", "int", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_USER_TOKEN_TIME_")."</b>"; 
		$object["var"]->form("_USER_TOKEN_TIME_", "int", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_USER_AUTOBLOCK_")."</b>"; 
		$object["var"]->form("_USER_AUTOBLOCK_", "int", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_USER_WAIT_COUNTER_")."</b>"; 
		$object["var"]->form("_USER_WAIT_COUNTER_", "int", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_USER_PF_SIGNS_")."</b>"; 
		$object["var"]->form("_USER_PF_SIGNS_", "int", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_USER_PF_CAPSIGNS_")."</b>"; 
		$object["var"]->form("_USER_PF_CAPSIGNS_", "int", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_USER_PF_SMSIGNS_")."</b>"; 
		$object["var"]->form("_USER_PF_SMSIGNS_", "int", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("hive_var-_USER_PF_SPSIGNS_")."</b>"; 
		$object["var"]->form("_USER_PF_SPSIGNS_", "int", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("hive_var-_USER_PF_NUMSIGNS_")."</b>"; 
		$object["var"]->form("_USER_PF_NUMSIGNS_", "int", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("hive_var-_USER_LOG_SESSIONS_")."</b>"; 
		$object["var"]->form("_USER_LOG_SESSIONS_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_USER_LOG_IP_")."</b>"; 
		$object["var"]->form("_USER_LOG_IP_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";		
	echo sf__theme_box_end();
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Space Fix
	////////////////////////////////////////////////////////////////////////////////////////////////		
	echo sf__theme_space_fix();

	////////////////////////////////////////////////////////////////////////////////////////////////
	// Area Settings
	////////////////////////////////////////////////////////////////////////////////////////////////
	echo sf__theme_box_start("<h2>".$object["lang"]->translate("string_operations")."</h2>", "hive__card_collapse");
		//echo "<b>".$object["lang"]->translate("hive_var-_HIVE_ENABLESITE_LOGIN_")."</b>"; 
		//$object["var"]->form("_HIVE_ENABLESITE_LOGIN_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		//echo "<b>".$object["lang"]->translate("hive_var-_HIVE_ENABLESITE_LOGOUT_")."</b>"; 
		//$object["var"]->form("_HIVE_ENABLESITE_LOGOUT_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_ENABLESITE_RECOVER_")."</b>"; 
		$object["var"]->form("_HIVE_ENABLESITE_RECOVER_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_ENABLESITE_REGISTER_")."</b>"; 
		$object["var"]->form("_HIVE_ENABLESITE_REGISTER_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_ENABLESITE_MAILCHANGE_")."</b>"; 
		$object["var"]->form("_HIVE_ENABLESITE_MAILCHANGE_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_ENABLESITE_PASSCHANGE_")."</b>"; 
		$object["var"]->form("_HIVE_ENABLESITE_PASSCHANGE_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";		
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_ENABLESITE_LANGCHANGE_")."</b>"; 
		$object["var"]->form("_HIVE_ENABLESITE_LANGCHANGE_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_ENABLESITE_MODESWITCH_")."</b>"; 
		$object["var"]->form("_HIVE_ENABLESITE_MODESWITCH_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_ENABLESITE_ACTIVATE_")."</b>"; 
		$object["var"]->form("_HIVE_ENABLESITE_ACTIVATE_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_ENABLESITE_2FA_")."</b>"; 
		$object["var"]->form("_HIVE_ENABLESITE_2FA_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
	echo sf__theme_box_end();
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Space Fix
	////////////////////////////////////////////////////////////////////////////////////////////////		
	echo sf__theme_space_fix();			
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Area Settings
	////////////////////////////////////////////////////////////////////////////////////////////////
	echo sf__theme_box_start("<h2>".$object["lang"]->translate("string_visibility")."</h2>", "hive__card_collapse");
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_S_USER_")."</b>"; 
		$object["var"]->form("_ADM_S_USER_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_S_FILE_")."</b>"; 
		$object["var"]->form("_ADM_S_FILE_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_S_OBJECT_")."</b>"; 
		$object["var"]->form("_ADM_S_OBJECT_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_S_PAGE_")."</b>"; 
		$object["var"]->form("_ADM_S_PAGE_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_S_DOCKER_")."</b>"; 
		$object["var"]->form("_ADM_S_DOCKER_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_S_PACKAGE_")."</b>"; 
		$object["var"]->form("_ADM_S_PACKAGE_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_S_DEPLOY_")."</b>"; 
		$object["var"]->form("_ADM_S_DEPLOY_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_S_DEVELOPER_")."</b>"; 
		$object["var"]->form("_ADM_S_DEVELOPER_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_S_PRIVACY_")."</b>"; 
		$object["var"]->form("_ADM_S_PRIVACY_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";	
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_S_IMPRESSUM_")."</b>"; 
		$object["var"]->form("_ADM_S_IMPRESSUM_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
	echo sf__theme_box_end();
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Space Fix
	////////////////////////////////////////////////////////////////////////////////////////////////		
	echo sf__theme_space_fix();		

	////////////////////////////////////////////////////////////////////////////////////////////////
	// Dev Settings
	////////////////////////////////////////////////////////////////////////////////////////////////
	echo sf__theme_box_start("<h2>".$object["lang"]->translate("string_debugging")."</h2>", "hive__card_collapse");
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_CURL_LOGGING_")."</b>"; 
		$object["var"]->form("_HIVE_CURL_LOGGING_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_JS_ACTION_ACTIVE_")."</b>"; 
		$object["var"]->form("_HIVE_JS_ACTION_ACTIVE_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_MYSQL_DEBUG_")."</b>"; 
		$object["var"]->form("_HIVE_MYSQL_DEBUG_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_PHP_DEBUG_")."</b>"; 
		$object["var"]->form("_HIVE_PHP_DEBUG_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("hive_var-_HIVE_REFERER_")."</b>"; 
		$object["var"]->form("_HIVE_REFERER_", "select", array(array($lang_inactive, "0"), array($lang_active, "1")), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_WORKER_LOG_LOG_")."</b>"; 
		$object["var"]->form("_ADM_WORKER_LOG_LOG_", "string", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
		echo "<b>".$object["lang"]->translate("adm_var-_ADM_WORKER_LOG_ERROR_")."</b>"; 
		$object["var"]->form("_ADM_WORKER_LOG_ERROR_", "string", array(), "", "btn btn-primary", "form-control", "Bearbeiten"); echo "<br />";
	echo sf__theme_box_end();
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// Space Fix
	////////////////////////////////////////////////////////////////////////////////////////////////		
	echo sf__theme_space_fix();
	
	
	////////////////////////////////////////////////////////////////////////////////////////////////	
	// Regenerate CSRF for Forms
	////////////////////////////////////////////////////////////////////////////////////////////////	
	$object["var"]->form_end();	
	
	////////////////////////////////////////////////////////////////////////////////////////////////	
	// Jquery/JS Additions
	////////////////////////////////////////////////////////////////////////////////////////////////		
	?>
	<script>
		// Remove Unneccessary Views
		$('.x_class_var_setup_title').remove();
		$('.x_class_var_setup_descr').remove();
		
		// Select all buttons with the specified class
		const elements  = document.querySelectorAll('.btn-primary');

		// Iterate through each button and update its text
		elements.forEach(element => {
			element.value = '<?php echo $object["lang"]->translate("string_edit"); ?>';
		});	

		// Select all buttons with the specified class
		const elementsok  = document.querySelectorAll('.x_class_var_change_ok');

		// Define the HTML content to be added
		const messageBox1 = `
			<div class="x_class_eventbox">
				<div class="x_class_eventbox_inner">
					<div class="x_class_eventbox_msg x_class_eventbox_msg_ok">
						<div class="x_class_eventbox_msg_inner">
							<div class="x_class_eventbox_msg_text">
								<?php echo $object["lang"]->translate("event_operation_success"); ?>
							</div>
							<div class="x_class_eventbox_msg_close" onclick="this.parentNode.parentNode.remove()">Close</div>
						</div>
					</div>
				</div>
			</div>`;
			
		// Iterate through each button and update its text
		elementsok.forEach(element => {
			document.body.insertAdjacentHTML("beforeend", messageBox1);
		});		
		
		// Select all buttons with the specified class
		const elementsnok = document.querySelectorAll('.x_class_var_change_fail');

		// Define the HTML content to be added
		const messageBox = `
			<div class="x_class_eventbox">
				<div class="x_class_eventbox_inner">
					<div class="x_class_eventbox_msg x_class_eventbox_msg_error">
						<div class="x_class_eventbox_msg_inner">
							<div class="x_class_eventbox_msg_text">
								<?php echo $object["lang"]->translate("hive_login_msg_csrf"); ?>
							</div>
							<div class="x_class_eventbox_msg_close" onclick="this.parentNode.parentNode.remove()">Close</div>
						</div>
					</div>
				</div>
			</div>`;

		// Iterate through each button and append the message box to the body
		elementsnok.forEach(element => {
			document.body.insertAdjacentHTML("beforeend", messageBox);
		});
		// Remove Unneccessary Views
		$('.x_class_var_change_ok').remove();
		$('.x_class_var_change_fail').remove();		
	</script>
	<?php