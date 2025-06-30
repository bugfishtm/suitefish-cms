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
		
		File Description:
			AdminBSB and External Theme Functionalities.
			
	*/ if(!is_array(@$object)) { Header("Location: ../"); exit(); }		
	
	#############################################################################################################################################
	#############################################################################################################################################
	// Injection Element: Javascript Libraries
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_inject_libjs($object, $includejquery = true) { 
		?>
			<?php if($includejquery) { ?>
				<!-- Jquery Core Js -->
				<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/jquery/jquery.min.js"></script>
			<?php } ?>
			<!-- Raphael Plugin Js -->
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/raphael/raphael.min.js"></script>
			<!-- Morris Plugin Js -->
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/morrisjs/morris.js"></script>
			<!-- ChartJs -->
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/chartjs/Chart.bundle.js"></script>
			<!-- Resumable JS -->
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/resumable/resumable.js"></script>	
			<!-- Datatables JS -->
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/datatables/jq.datatables.js"></script>	
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/datatables/skin/bootstrap/js/dataTables.bootstrap.js"></script>	
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/datatables/extensions/export/dataTables.buttons.min.js"></script>	
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/datatables/extensions/export/buttons.flash.min.js"></script>	
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/datatables/extensions/export/jszip.min.js"></script>	
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/datatables/extensions/export/pdfmake.min.js"></script>	
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/datatables/extensions/export/vfs_fonts.js"></script>	
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/datatables/extensions/export/buttons.html5.min.js"></script>	
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/datatables/extensions/export/buttons.print.min.js"></script>	
			<!-- TinyMCE JS -->
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/tinymce/tinymce.min.js"></script>	
			<!-- Select2 JS -->
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/select2/select2.min.js"></script>	
			<!-- Sweetalert JS -->
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/sweetalert2/sweetalert2.all.min.js"></script>	
			<!-- Sortable JS -->
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/sortablejs/Sortable.min.js"></script>			
			<!-- Framework Javascript Loader -->
			<script src="<?php echo _HIVE_URL_REL_; ?>_core/javascript.php"></script>
	
		<?php
	}
	
	#############################################################################################################################################
	#############################################################################################################################################
	// Injection Element: CSS Libraries
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_inject_libcss($object, $inludematerialicons = true) { 
		?>
			<?php if($inludematerialicons) { ?>
				<!-- Materialize Font Loader Css -->
				<link href="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/mdi/css_materialize.css" rel="stylesheet">
				<!-- Materialize Core Css -->
				<link href="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/mdi/css_materialize_main.css" rel="stylesheet">			
			<?php } ?>
			<!-- Morris Css-->
			<link href="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/morrisjs/morris.css" rel="stylesheet" />
			<!-- Select2 Css-->
			<link href="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/select2/select2.min.css" rel="stylesheet" />
			<!-- Datatables Css-->
			<link rel="stylesheet" href="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/datatables/jq.datatables.css">
			<!-- SweetAlert Css-->
			<link rel="stylesheet" href="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/sweetalert2/sweetalert2.min.css">	
			<!-- Framework Stylesheet Loader -->
			<link href="<?php echo _HIVE_URL_REL_; ?>_core/stylesheet.php"  rel="stylesheet">
		<?php
	}
	
	#############################################################################################################################################
	#############################################################################################################################################
	// Injection Element: Meta
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_inject_meta($object) { 
	
		// Website Title Tag with $object["ctheme"]["title"]
		if(!defined("_HIVE_TITLE_SPACER_")) { define("_HIVE_TITLE_SPACER_", "-"); }
		if(!defined("_HIVE_TITLE_")) { define("_HIVE_TITLE_", "CMS"); }
		$object["ctheme"]["title"] = hive__trim($object["ctheme"]["title"]);
		if(is_string(@$object["ctheme"]["title"]) AND hive__trim(@$object["ctheme"]["title"]) != "") {
			?>
				<title><?php if(isset($object["ctheme"]["title"])) { if($object["ctheme"]["title"]) { echo hive__hsc($object["ctheme"]["title"]); ?><?php if(_HIVE_TITLE_SPACER_ != false) { echo _HIVE_TITLE_SPACER_; } } } ?><?php if(is_string(_HIVE_TITLE_)) { echo _HIVE_TITLE_; } ?></title>	
			<?php
		}
		$tmp_title = _HIVE_TITLE_SPACER_._HIVE_TITLE_;
		// Website Title in meta tags and cards with $object["ctheme"]["add_head_meta"]["title"] (fallback is $object["ctheme"]["title"] )
		$object["ctheme"]["add_head_meta"]["title"] = hive__trim($object["ctheme"]["add_head_meta"]["title"]);
		if(is_string(@$object["ctheme"]["add_head_meta"]["title"]) AND hive__trim(@$object["ctheme"]["add_head_meta"]["title"]) != "") {
			echo  '<meta property="og:title" content="'.hive__hen($object["ctheme"]["add_head_meta"]["title"]).$tmp_title.'">'; 
			echo  '<meta property="twitter:title" content="'.hive__hen($object["ctheme"]["add_head_meta"]["title"]).$tmp_title.'">'; 
		} elseif(is_string(@$object["ctheme"]["title"]) AND hive__trim(@$object["ctheme"]["title"]) != "") { 
			echo  '<meta property="og:title" content="'.hive__hen($object["ctheme"]["title"]).$tmp_title.'">'; 
			echo  '<meta property="twitter:title" content="'.hive__hen($object["ctheme"]["title"]).$tmp_title.'">'; 
		}		

		// Description
		$object["ctheme"]["add_head_meta"]["description"] = hive__trim($object["ctheme"]["add_head_meta"]["description"]);
		if(is_string(@$object["ctheme"]["add_head_meta"]["description"]) AND hive__trim(@$object["ctheme"]["add_head_meta"]["description"]) != "") {
			echo  '<meta name="description" content="'.hive__hen($object["ctheme"]["add_head_meta"]["description"]).'">'; 
			echo  '<meta property="og:description" content="'.hive__hen($object["ctheme"]["add_head_meta"]["description"]).'">'; 
			echo  '<meta property="twitter:description" content="'.hive__hen($object["ctheme"]["add_head_meta"]["description"]).'">'; 
		}
		
		// Image for Sites
		$object["ctheme"]["add_head_meta"]["image"] = hive__trim($object["ctheme"]["add_head_meta"]["image"]);
		if(is_string(@$object["ctheme"]["add_head_meta"]["image"]) AND hive__trim(@$object["ctheme"]["add_head_meta"]["image"]) != "") {
			echo  '<meta property="og:image" content="'.hive__hen($object["ctheme"]["add_head_meta"]["image"]).'">';
			echo  '<meta property="twitter:image" content="'.hive__hen($object["ctheme"]["add_head_meta"]["image"]).'">';
		} else { 
			if(file_exists($object["path"]."/_data/"._HIVE_MODE_."/meta.jpg")) { 
				$imageurl = _HIVE_URL_REL_."/_data/"._HIVE_MODE_."/meta.jpg"; 
				echo  '<meta property="og:image" content="'.hive__hen($imageurl).'">'; 
				echo  '<meta property="twitter:image" content="'.hive__hen($imageurl).'">';
			}
		}		
		
		// Author Meta
		if(is_string(_ADM_VMETA_AUTHOR_) AND hive__trim(_ADM_VMETA_AUTHOR_) != "") {
			echo '<meta name="author" content="'.hive__hen(_ADM_VMETA_AUTHOR_).'">';
		}
		
		// Robot Meta
		if(is_string(_ADM_VMETA_ROBOT_) AND hive__trim(_ADM_VMETA_ROBOT_) != "") {
			echo '<meta name="robots" content="'.hive__hen(_ADM_VMETA_ROBOT_).'">';
		}
		
		// Copyright Meta
		if(is_string(_ADM_VMETA_COPYRIGHT_) AND hive__trim(_ADM_VMETA_COPYRIGHT_) != "") {
			echo '<meta name="copyright" content="'.hive__hen(_ADM_VMETA_COPYRIGHT_).'">';
		}
		
		// Language Meta
		if(is_string(_ADM_VMETA_LANGUAGE_) AND hive__trim(_ADM_VMETA_LANGUAGE_) != "") {
			echo '<meta http-equiv="content-language" content="'.hive__hen(_ADM_VMETA_LANGUAGE_).'">';
		}
		
		// Keyword Meta
		$object["ctheme"]["add_head_meta"]["keywords"] = hive__trim($object["ctheme"]["add_head_meta"]["keywords"]);
		if(is_string(@$object["ctheme"]["add_head_meta"]["keywords"]) AND hive__trim(@$object["ctheme"]["add_head_meta"]["keywords"]) != "") {
				echo '<meta name="keywords" content="'.hive__hen(@$object["ctheme"]["add_head_meta"]["keywords"]).'">';
		} else {
			if(is_string(_ADM_VMETA_KEYWORD_) AND hive__trim(_ADM_VMETA_KEYWORD_) != "") {
				echo '<meta name="keywords" content="'.hive__hen(_ADM_VMETA_KEYWORD_).'">';
			}				
		}
		
		// Add Additional Meta and HTML Content
		if(is_string(@$object["ctheme"]["add_head_meta"]["additional"])) { echo $object["ctheme"]["add_head_meta"]["additional"]; }
		
	}	
	
	#############################################################################################################################################
	#############################################################################################################################################
	// Injection Element: Favicon
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_inject_favicon($object) { 
		$object["ctheme"]["favicon"] = hive__trim($object["ctheme"]["favicon"]);
		if(is_string(@$object["ctheme"]["favicon"]) AND hive__trim(@$object["ctheme"]["favicon"]) != "") {
			echo '<link rel="icon" type="image/x-icon" href="'.@$object["ctheme"]["favicon"].'">';
		} else {
			if(file_exists(''.$object["path"].'/_data/'._HIVE_MODE_.'/favicon.ico')) {
				echo '<link rel="icon" type="image/x-icon" href="'._HIVE_URL_REL_.'/_data/'._HIVE_MODE_.'/favicon.ico">';
			} else {
				echo '<link rel="icon" type="image/x-icon" href="'._HIVE_URL_REL_.'/_site/'._HIVE_MODE_.'/_theme/image.favfallback.ico">';
			}		
		}	
	}

	#############################################################################################################################################
	#############################################################################################################################################
	// Injection Element: Logo
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_get_logo_url($object) { 
		$object["ctheme"]["logo"] = hive__trim($object["ctheme"]["logo"]);
		if(is_string(@$object["ctheme"]["logo"]) AND hive__trim(@$object["ctheme"]["logo"]) != "") {
			return $object["ctheme"]["logo"];
		} else {
			if(file_exists(''.$object["path"].'/_data/'._HIVE_MODE_.'/logo.png')) {
				return ''._HIVE_URL_REL_.'/_data/'._HIVE_MODE_.'/logo.png';
			} else {
				return ''._HIVE_URL_REL_.'/_site/'._HIVE_MODE_.'/_theme/image.noimage.jpg';
			}		
		}		
	}

	#############################################################################################################################################
	#############################################################################################################################################
	// Start Theme Buildup
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_start($object) { 
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_start")) {
					$x = sf___theme_start($object);
					if($x) { return $x; }
				}
			}		
		} 	
	?><!DOCTYPE html>
	<html>
		<head>
			<!--------------------------------------------------------------------------------------------------------------------->
			<!---- Custmom Theme Initials -->
			<!--------------------------------------------------------------------------------------------------------------------->
			<!-- Charset -->
			<meta charset="UTF-8">
			<!-- XUA Meta -->
			<meta http-equiv="X-UA-Compatible" content="IE=Edge">
			<!-- Initial Scale -->
			<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			
			<!--------------------------------------------------------------------------------------------------------------------->
			<!---- CSS Loadup -->
			<!--------------------------------------------------------------------------------------------------------------------->
				<!--------------------------------------------------------------------------------------------------------------------->
				<!---- Custom Theme CSS Loadup -->
				<!--------------------------------------------------------------------------------------------------------------------->	
				<!-- Bootstrap Core Css -->
				<link href="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/bootstrap3/css/bootstrap.css" rel="stylesheet">
				<!-- Waves Effect Css -->
				<link href="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/node-waves/waves.css" rel="stylesheet" />
				<!-- Animation Css -->
				<link href="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/animate-css/animate.css" rel="stylesheet" />
				<!-- AdminBSB Css-->
				<link href="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/adminbsb/css_adminbsb.css" rel="stylesheet">
				<!-- AdminBSB Css-->
				<link href="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/adminbsb/css_mainstyle.css" rel="stylesheet">
				
				<!--------------------------------------------------------------------------------------------------------------------->
				<!---- Default CSS Loadup -->
				<!--------------------------------------------------------------------------------------------------------------------->					
				<?php sf__theme_inject_libcss($object, true); ?>
				
				<!--------------------------------------------------------------------------------------------------------------------->
				<!---- Custom Theme CSS Loadup -->
				<!--------------------------------------------------------------------------------------------------------------------->	
				<!-- Datatables Bootstrap 3 Theme -->
				<link rel="stylesheet" href="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/datatables/skin/bootstrap/css/dataTables.bootstrap.css">
				
			<!--------------------------------------------------------------------------------------------------------------------->
			<!---- JS Loadup -->
			<!--------------------------------------------------------------------------------------------------------------------->		
			
				<!--------------------------------------------------------------------------------------------------------------------->
				<!---- Custom Theme JS Loadup -->
				<!--------------------------------------------------------------------------------------------------------------------->		
				<!-- Jquery Core Js -->
				<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/jquery/jquery.min.js"></script>
				<!-- Bootstrap Core Js -->
				<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/bootstrap3/js/bootstrap.js"></script>
				<!-- Slimscroll Plugin Js -->
				<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/jquery-slimscroll/jquery.slimscroll.js"></script>
				<!-- Waves Effect Plugin Js -->
				<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/node-waves/waves.js"></script>
				<!-- Jquery CountTo Plugin Js -->
				<script src="<?php echo _HIVE_URL_REL_; ?>_core/_vendor/jquery-countto/jquery.countTo.js"></script>
				
				<!--------------------------------------------------------------------------------------------------------------------->
				<!---- Default JS Loadup -->
				<!--------------------------------------------------------------------------------------------------------------------->	
				<?php sf__theme_inject_libjs($object, false); ?>
			
			<!--------------------------------------------------------------------------------------------------------------------->
			<!---- Default Meta Loadup -->
			<!--------------------------------------------------------------------------------------------------------------------->	
			<?php sf__theme_inject_meta($object); ?>
			
			<!--------------------------------------------------------------------------------------------------------------------->
			<!---- Default Favicon Loadup -->
			<!--------------------------------------------------------------------------------------------------------------------->	
			<?php sf__theme_inject_favicon($object); ?>	
		</head>
		<body class="theme-<?php echo $object["suitefish"]["theme"]["sub_active"]; ?>">
		
			<!--------------------------------------------------------------------------------------------------------------------->
			<!---- Page Loader -->
			<!--------------------------------------------------------------------------------------------------------------------->	
			<!-- <div class="page-loader-wrapper">
				<div class="loader">
					<div class="preloader">
						<div class="spinner-layer pl-red">
							<div class="circle-clipper left">
								<div class="circle"></div>
							</div>
							<div class="circle-clipper right">
								<div class="circle"></div>
							</div>
						</div>
					</div>
					<p><?php echo $object["lang"]->translate("string_please_wait"); ?></p>
				</div>
			</div>	-->		
			
			<!--------------------------------------------------------------------------------------------------------------------->
			<!---- Sidebar Overlay -->
			<!--------------------------------------------------------------------------------------------------------------------->	
			<div class="overlay"></div>		
		
			<!--------------------------------------------------------------------------------------------------------------------->
			<!---- NAVBAR -->
			<!--------------------------------------------------------------------------------------------------------------------->	
			<?php
				$userimg = "/_site/"._HIVE_MODE_."/_theme/image.header.default.jpg";
				$userimg_profile = "/_site/"._HIVE_MODE_."/_theme/image.profile.png";
				if(isset($object["ctheme"]["pfm_image_profile"])) { if(@$object["ctheme"]["pfm_image_profile"]) { $userimg_profile = $object["ctheme"]["pfm_image_profile"]; } }
			?>		
			<section>
				<aside id="leftsidebar" class="sidebar">		
		
					<!--------------------------------------------------------------------------------------------------------------------->
					<!---- Profile Menue -->
					<!--------------------------------------------------------------------------------------------------------------------->		
					<?php if($object["ctheme"]["pfm"]) { ?>
						<div class="user-info" style="background: url(.<?php echo $userimg; ?>) !important; background-size: 100% !important; ">
							<div class="image">
								<img src="<?php echo _HIVE_URL_REL_.$userimg_profile; ?>" width="48" height="48" alt="User" />
							</div>
							<div class="info-container">
								<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $object["lang"]->translate("admin_top_t_ident"); ?>: #<?php echo htmlspecialchars($object["user"]->user["id"]); ?></div>
								<div class="email"><?php echo htmlspecialchars($object["user"]->user["user_mail"]); ?></div>
								<?php if(is_array($object["ctheme"]["pfm"])) { ?>	
								<div class="btn-group user-helper-dropdown">
									<i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
									<ul class="dropdown-menu pull-right">
										<?php foreach($object["ctheme"]["pfm"] as $key => $value) { ?>	
											<li><a href="<?php echo $value["nav_loc"]; ?>"><i class="material-icons"><?php echo $value["nav_img"]; ?></i><?php echo $value["nav_title"]; ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>		

					<!--------------------------------------------------------------------------------------------------------------------->
					<!---- Navigation Menue -->
					<!--------------------------------------------------------------------------------------------------------------------->
					<div class="menu">
						<ul class="list">	
							<?php foreach($object["nav"] as $key => $value) { ?>
		
		
		
		
		
		
		
		
		
		





								<?php if(is_array(@$value["nav_sub"])) {  ?>
									<li class="<?php if(_HIVE_URL_CUR_[0] == $value["nav_act"]) { echo "active"; } ?>">	
										<a href="javascript:void(0);" class="menu-toggle">
											<i class="material-icons"><?php echo $value["nav_img"]; ?></i>
											<span><?php echo $value["nav_title"]; ?></span>
										</a>
										<ul class="ml-menu" <?php if(_HIVE_URL_CUR_[0] == $value["nav_act"]) { echo " style=\"display: block;\"	"; } ?>>				
											<?php foreach($value["nav_sub"] as $key => $valuex) { ?>	
												<li class="<?php if(_HIVE_URL_CUR_[1] == $valuex["nav_act"] AND _HIVE_URL_CUR_[0] == $value["nav_act"]) { echo "active";} ?>">
													<a href="<?php echo $valuex["nav_loc"]; ?>"><?php echo $valuex["nav_title"]; ?></a>
												</li>
											<?php } ?>
										</ul>
									</li>	
								<?php } elseif(@$value["nav_header"]) { ?>
									<li class="header">
										<?php echo $value["nav_title"]; ?>
									</li>	
								<?php } else {  ?>
									<li class="<?php if(_HIVE_URL_CUR_[0] == $value["nav_act"]) { echo "active";} ?>">
										<a href="<?php echo $value["nav_loc"]; ?>">
											<i class="material-icons"><?php echo $value["nav_img"]; ?></i>
											<span><?php echo $value["nav_title"]; ?></span>
										</a>
									</li>	
								<?php }  ?>
					
					
					
					
					
					
					
					
					
					
					
					

							<?php }  ?>	
						</ul>
					</div>					
					
					<!--------------------------------------------------------------------------------------------------------------------->
					<!---- Footer -->
					<!--------------------------------------------------------------------------------------------------------------------->	
					<?php if(trim(_ADM_FOOTER_ ?? '') != "") { ?>
					<div class="legal">
						<?php
							echo _ADM_FOOTER_; 
						?>
					</div>	
					<?php } ?>
				</aside>
			</section>	
			
			<!--------------------------------------------------------------------------------------------------------------------->
			<!---- Suite Starter Section (May should be after Topbar? Dont think so.-->
			<!--------------------------------------------------------------------------------------------------------------------->
			<?php
				$title = "";
				if(isset($object["ctheme"]["title"])) { if($object["ctheme"]["title"]) { $title = hive__hsc($object["ctheme"]["title"]); ?><?php if(_HIVE_TITLE_SPACER_ != false) { $title .= _HIVE_TITLE_SPACER_; } } } ?><?php if(is_string(_HIVE_TITLE_)) { $title .= _HIVE_TITLE_; }
			?>
			<section class="content" id="adminbsb_content_start">
				<div class="container-fluid">	
					<nav class="navbar">
						<div class="container-fluid">
							<div class="navbar-header">
								<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
								<a href="javascript:void(0);" class="bars" style="display: none;"></a>			
								<a class="navbar-brand" href="#"><?php echo $title; ?></a>
							</div>
							<div class="collapse navbar-collapse" id="navbar-collapse">
								<ul class="nav navbar-nav navbar-right">	
								
									<!--------------------------------------------------------------------------------------------------------------------->
									<!---- Go To Top of Page Arrow -->
									<!--------------------------------------------------------------------------------------------------------------------->
									<?php if(_ADM_TH_TOPARROW_ == 1) {  ?>
										<li class="dropdown">
											<a href="#" onclick="window.scrollTo({top: 0,behavior: 'smooth'});" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
												<!--<i class="material-icons">keyboard_arrow_up</i>-->
												<i class="material-icons">keyboard_arrow_up</i>
											</a>
										</li> 
									<?php }  ?>		
									
									<!--------------------------------------------------------------------------------------------------------------------->
									<!---- Show Topbar Login Icon if not Logged In -->
									<!--------------------------------------------------------------------------------------------------------------------->
									<?php if(_ADM_TH_TOPLOGIN_ == 1) {  ?>
										<?php if(!$object["user"]->loggedIn) {  ?>
											<li class="">
												<a href="./_user/user_login.php">
													<i class="material-icons">lock</i>
												</a>
											</li> 
										<?php }  ?>
									<?php }  ?>		
									
									<!--------------------------------------------------------------------------------------------------------------------->
									<!---- Extension Navigation Injection Items -->
									<!--------------------------------------------------------------------------------------------------------------------->			
									<?php	  
										foreach (_HIVE_MODE_ARRAY_ as $filename) {
											$object["hive_mode_config"] = hive__init_site_header($object, $filename);
											if (file_exists($object["path"]."/_site/".$filename."/_admin/mod_topbar.php")) { 
												require($object["path"]."/_site/".$filename."/_admin/mod_topbar.php");
											}
										}		
										$object["hive_mode_config"] = hive__init_site_header($object, _HIVE_MODE_);	
										foreach ($object["extensions_path"] as $filename) {
											if (file_exists($filename."/_admin/mod_topbar.php")) { 
												$object["extension"] 		= hive__init_extension_header($object, basename($filename));		
												require($filename."/_admin/mod_topbar.php");
											}
										}			
									?>	
									
									<!--------------------------------------------------------------------------------------------------------------------->
									<!---- Topbar Notifications Alerts -->
									<!--------------------------------------------------------------------------------------------------------------------->
									<?php if(is_array(@$object["ctheme"]["notifications"]) && $object["user"]->user_loggedIn) {  ?>
										<li class="dropdown">
											<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
												<i class="material-icons">notifications</i>
												<span class="label-count"><?php echo count($object["ctheme"]["notifications"]); ?></span>
											</a>
											<ul class="dropdown-menu">
												<li class="header"><?php echo $object["lang"]->translate("admin_top_t_notify"); ?></li>
												<li class="body">
													<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;"><ul class="menu" style="overflow: hidden; width: auto; height: 254px;">
														<?php foreach($object["ctheme"]["notifications"] as $key => $value) { ?>
														<li>
															<?php if(trim(@$value["alert_url"] ?? '') == "") { @$value["alert_url"] = '#'; } ?> <a href="<?php echo @$value["alert_url"]; ?>" class=" waves-effect waves-block">
																<div class="menu-info">
																	<h4><?php echo @$value["alert_text"]; ?></h4>
																	<p>
																		<i class="material-icons">access_time</i> <?php echo adm_date_format(@$value["creation"]); ?>
																	</p>
																</div>
															</a>
														</li>
														<?php } ?>
														<?php if(count($object["ctheme"]["notifications"]) == 0) { ?>
														<li>
															<a href="#" class=" waves-effect waves-block">
																<div class="menu-info">
																	<h4><?php echo $object["lang"]->translate("admin_top_t_nolist"); ?></h4>
																</div>
															</a>
														</li>
														<?php } ?>
													</ul><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 180.212px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
												</li>
												<li class="footer">
													<a href="./?l1=alert" class=" waves-effect waves-block"><?php echo $object["lang"]->translate("admin_top_t_notify_a"); ?></a>
												</li>
											</ul>
										</li> 
									<?php }  ?>	

									<!--------------------------------------------------------------------------------------------------------------------->
									<!---- Topbar Theme Change -->
									<!--------------------------------------------------------------------------------------------------------------------->
									<?php if(@$object["ctheme"]["topbar_theme"] AND count($object["suitefish"]["theme"]["valid"]) > 0 AND _ADM_TH_TB_ == 1) { ?>
										<li class="dropdown">
											<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
												<i class="material-icons">style</i>
											</a>
											<ul class="dropdown-menu"> 
												<li class="header"><?php echo $object["lang"]->translate("admin_top_t_theme"); ?></li>
												<li class="body">
													<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;"><ul class="menu tasks " style="overflow-y: scroll; width: auto; height: 254px;">
													   <?php echo ' <li data-theme="adminbsb" style="cursor:pointer;padding-top: 5px; padding-bottom: 5px;" class=" waves-effect waves-block" onclick="window.location.href=\'./?'._HIVE_URL_GET_[0].'='._HIVE_URL_CUR_[0].'&'._HIVE_URL_GET_[1].'='._HIVE_URL_CUR_[1].'&sf____change_theme=adminbsb\';">'; ?>
															<div class="menu-info">
																<span><?php echo $object["lang"]->translate("string_default");; ?></span>
																<?php if("adminbsb" == $object["suitefish"]["theme"]["active"]) { ?><p class="bg-white" style="padding: 2px; border-radius: 2px;"><?php echo $object["lang"]->translate("admin_top_t_cur"); ?></p><?php } ?>
															</div>
														</li>
													<?php foreach($object["suitefish"]["theme"]["valid"] as $key => $value) {   
													   echo ' <li data-theme="'.$value.'" style="cursor:pointer;padding-top: 5px; padding-bottom: 5px;" class=" waves-effect waves-block" onclick="window.location.href=\'./?'._HIVE_URL_GET_[0].'='._HIVE_URL_CUR_[0].'&'._HIVE_URL_GET_[1].'='._HIVE_URL_CUR_[1].'&sf____change_theme='.$value.'\';">'; ?>
															<div class="menu-info">
																<span><?php echo $value; ?></span>
																<?php if($value == $object["suitefish"]["theme"]["active"]) { ?><p class="bg-white" style="padding: 2px; border-radius: 2px;"><?php echo $object["lang"]->translate("admin_top_t_cur"); ?></p><?php } ?>
															</div>
														</li>
													<?php }  ?>
													</ul><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 252.016px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
												</li>
											</ul>
										</li>
									<?php } ?>											

									<!--------------------------------------------------------------------------------------------------------------------->
									<!---- Topbar Color Change -->
									<!--------------------------------------------------------------------------------------------------------------------->									
									<?php if(@$object["ctheme"]["topbar_themechange"] AND _ADM_COLOR_TB_ == 1) { ?>
										<li class="dropdown">
											<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
												<i class="material-icons">draw</i>
											</a>
											<ul class="dropdown-menu"> 
												<li class="header"><?php echo $object["lang"]->translate("admin_top_t_themechange"); ?></li>
												<li class="body">
													<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;"><ul class="menu tasks " style="overflow-y: scroll; width: auto; height: 254px;">
													<?php foreach(_ADM_ADMINBSB_VALIDSUB_ as $key => $value) {   
													   echo ' <li data-theme="'.$value.'" style="cursor:pointer;padding-top: 5px; padding-bottom: 5px;" class="bg-'.$value.' waves-effect waves-block" onclick="window.location.href=\'./?'._HIVE_URL_GET_[0].'='._HIVE_URL_CUR_[0].'&'._HIVE_URL_GET_[1].'='._HIVE_URL_CUR_[1].'&sf____change_themesub='.$value.'\';">'; ?>
																<div class="menu-info">
																	<span><?php echo $value; ?></span>
																	<?php if($value == $object["suitefish"]["theme"]["sub_active"]) { ?><p class="bg-white" style="padding: 2px; border-radius: 2px;"><?php echo $object["lang"]->translate("admin_top_t_cur"); ?></p><?php } ?>
																</div>
														</li>
													<?php }  ?>
													</ul><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 252.016px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
												</li>
											</ul>
										</li>
									<?php } ?>									

									<!--------------------------------------------------------------------------------------------------------------------->
									<!---- Topbar Language Change -->
									<!--------------------------------------------------------------------------------------------------------------------->	
									<?php if(@$object["ctheme"]["languages_array"] AND _ADM_LANG_TB_ == 1) {  ?>
										<li class="dropdown">
											<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
												<i class="material-icons">flag</i>
												<span class="label-count"><?php echo _HIVE_LANG_; ?></span>
											</a>
											<ul class="dropdown-menu">
												<li class="header"><?php echo $object["lang"]->translate("admin_top_t_lang"); ?></li>
												<li class="body">
													<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;"><ul class="menu tasks" style="overflow-y: scroll; width: auto; height: 254px;">
													<?php foreach($object["ctheme"]["languages_array"] as $key => $value) {  ?>
														<li>
															<a onclick="window.location.href= '<?php echo './?'._HIVE_URL_GET_[0].'='._HIVE_URL_CUR_[0].'&'._HIVE_URL_GET_[1].'='._HIVE_URL_CUR_[1].'&sf____change_lang='.$value["ident"]; ?>'" class=" waves-effect waves-block xfpe_cursorpointer">
																<div class="icon-circle">
																	<img src="<?php echo $value["img"]; ?>">
																</div>
																<div class="menu-info">
																	<?php echo $value["name"]; ?>
																	<?php if($value["ident"] == _HIVE_LANG_) { ?><p><?php echo $object["lang"]->translate("admin_top_t_cur"); ?></p><?php } ?>
																</div>
															</a>
														</li>
													<?php }  ?>
													</ul><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 252.016px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
												</li>
											</ul>
										</li>
									<?php }  ?>
									
								</ul>
							</div>
						</div>
					</nav>
				<?php }        

	#############################################################################################################################################
	#############################################################################################################################################
	// Primary Style: Theme Ending
	#############################################################################################################################################	
	#############################################################################################################################################	
	function sf__theme_end($object) { 
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_end")) {
					$x = sf___theme_end($object);
					if($x) { return $x; }
				}
			}		
		} return '</div></section></body></html>'; 
	}		

	#############################################################################################################################################
	#############################################################################################################################################
	// Primary Style: Title 
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_title($title, $text) {
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_title")) {
					$x = sf___theme_title($title, $text);
					if($x) { return $x; }
				}
			}		
		} return '<div class="m-t--20"><h1>'.$title.'</h1><small>'.$text.'</small></div>'; 			
	}
	
	#############################################################################################################################################
	#############################################################################################################################################
	// Primary Style: Topbar Item
	#############################################################################################################################################
	#############################################################################################################################################	
	function sf__theme_topbar_item($object, $icon, $url, $count = false) {
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_topbar_item")) {
					$x = sf___theme_topbar_item($object, $icon, $url, $count);
					if($x) { return $x; }
				}
			}		
		} 
		$countx = "";
		if(is_numeric($count) OR is_string($count)) { $countx = '<span class="label-count">'.$count.'</span>'; }
		return '<li class="dropdown"><a href="'.$url.'"><i class="material-icons">'.$icon.'</i>'.$countx.'</a></li>'; 			
	}
	
	#############################################################################################################################################
	#############################################################################################################################################
	// Modal Elements
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_modal($text, $title = false, $icon = "info", $closebutton = true, $closeurl = false) { 		
		if(!$closebutton) { $closebutton = "false"; }
		if($closebutton) { $closebutton = "true"; }
		if(!is_string($closeurl)) { $closeurl = false; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_modal")) {
					$x = sf___theme_modal($text, $title, $icon, $closebutton, $closeurl);
					if($x) { return $x; }
				}
			}		
		} 
		$output = "<script>";
			$output .= "$( document ).ready(function() {";
				$output .= "Swal.fire({";
					if($title) {
						$output .= " title: " . json_encode($title) . ",";
					}
					if($icon) {
						$output .= " icon: " . json_encode($icon) . ",";
					}
					$output .= " html: " . json_encode($text) . ",";
					$output .= "showCloseButton: ".$closebutton.",";
					$output .= "allowOutsideClick: "."false".",";
					$output .= "showCancelButton: "."false".",";
					$output .= "showConfirmButton: "."false"."";
					if($closeurl) { $output .= ", willClose: () => { window.location.href = '".$closeurl."'; }"; }
				$output .= "});";
			$output .= "});";
		$output .= "</script>";
		return $output;
	}			
	
	#############################################################################################################################################
	#############################################################################################################################################
	// Form Buildup
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_form_text($name, $placeholder = false, $value = false, $id = false, $required = false, $classes = false, $incode = false) {
		if($required == false) { $required = ""; } else { $required = "required"; }
		if($classes == false) { $classes = ""; } 
		if($incode == false) { $incode = ""; } 
		if($id == false) { $id = ""; } 
		if($value == false) { $value = ""; } 
		if($placeholder == false) { $placeholder = ""; } 
		if($name == false) { $name = ""; } 
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_form_text")) {
					$x = sf___theme_form_text($name, $placeholder, $value, $id, $required, $classes, $incode);
					if($x) { return $x; }
				}
			}		
		} 
		$output = '<div class="form-group">';
			$output .= '<div class="form-line">';
				$output .= '<input type="text" name="'.$name.'" placeholder="'.$placeholder.'" class="form-control '.$classes.'"  value="'.$value.'" id="'.$id.'" '.$incode.' '.$required.'>';
			$output .= '</div>';
		$output .= '</div>';
		return $output;  			
	}	
	function sf__theme_form_password($name, $placeholder = false, $value = false, $id = false, $required = false, $classes = false, $incode = false) {
		if($required == false) { $required = ""; } else { $required = "required"; }
		if($classes == false) { $classes = ""; } 
		if($incode == false) { $incode = ""; } 
		if($id == false) { $id = ""; } 
		if($value == false) { $value = ""; } 
		if($placeholder == false) { $placeholder = ""; } 
		if($name == false) { $name = ""; } 
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_form_password")) {
					$x = sf___theme_form_password($name, $placeholder, $value, $id, $required, $classes, $incode);
					if($x) { return $x; }
				}
			}		
		} 
		$output = '<div class="form-group">';
			$output .= '<div class="form-line">';
				$output .= '<input type="password" name="'.$name.'" placeholder="'.$placeholder.'" class="form-control '.$classes.'"  value="'.$value.'" id="'.$id.'" '.$incode.' '.$required.'>';
			$output .= '</div>';
		$output .= '</div>';
		return $output;  			
	}	
	function sf__theme_form_textarea($name, $placeholder = false, $value = false, $id = false, $required = false, $classes = false, $incode = false, $resize = "vertical") {
		if($required == false) { $required = ""; } else { $required = "required"; }
		if($classes == false) { $classes = ""; } 
		if($incode == false) { $incode = ""; } 
		if($id == false) { $id = ""; } 
		if($value == false) { $value = ""; } 
		if($placeholder == false) { $placeholder = ""; } 
		if($name == false) { $name = ""; } 
		if($resize == false) { $resize = "none"; } 
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_form_textarea")) {
					$x = sf___theme_form_textarea($name, $placeholder, $value, $id, $required, $classes, $incode, $resize);
					if($x) { return $x; }
				}
			}		
		} 
		$output = '<div class="form-group">';
			$output .= '<div class="form-line">';
				$output .= '<textarea id="'.$id.'" class="form-control '.$classes.'" name="'.$name.'" style="resize: '.$resize.';" placeholder="'.$placeholder.'" '.$incode.' '.$required.'>';
					$output .= $value;
				$output .= '</textarea>';
			$output .= '</div>';
		$output .= '</div>';
		return $output;  			
	}	
	function sf__theme_form_checkbox($name, $label = false, $value = false, $id = false, $checked = false, $classes = false, $incode = false) {
		if($checked == false) { $checked = ""; } else { $checked = "checked"; }
		if($classes == false) { $classes = ""; } 
		if($incode == false) { $incode = ""; } 
		if($id == false) { $id = ""; } 
		if($value == false) { $value = "on"; } 
		if($label == false) { $label = ""; } 
		if($name == false) { $name = ""; } 
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_form_checkbox")) {
					$x = sf___theme_form_checkbox($name, $label, $value, $id, $checked, $classes, $incode);
					if($x) { return $x; }
				}
			}		
		} 

		$output = '<input type="checkbox" name="'.$name.'" class="filled-in chk-col-black '.$classes.'"  value="'.$value.'" id="'.$id.'" '.$incode.' '.$checked.'>';
		$output .= '<label>'.$label.'</label>';
		return $output;  			
	}	
	function sf__theme_form_radio($name, $label = false, $value = false, $id = false, $checked = false, $classes = false, $incode = false) {
		if($checked == false) { $checked = ""; } else { $checked = "checked"; }
		if($classes == false) { $classes = ""; } 
		if($incode == false) { $incode = ""; } 
		if($id == false) { $id = ""; } 
		if($value == false) { $value = ""; } 
		if($label == false) { $label = ""; } 
		if($name == false) { $name = ""; } 
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_form_radio")) {
					$x = sf___theme_form_radio($name, $label, $value, $id, $checked, $classes, $incode);
					if($x) { return $x; }
				}
			}		
		} 
		$output = '<input type="radio" name="'.$name.'" class="with-gap radio-col-black '.$classes.'" value="'.$value.'" id="'.$id.'" '.$incode.' '.$checked.'>';
		$output .= '<label>'.$label.'</label>';
		return $output;  			
	}	
	
	#############################################################################################################################################
	#############################################################################################################################################
	// Row Buildup
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_row_start($classes = "") {
		if($classes == false) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_row_start")) {
					$x = sf___theme_row_start($classes);
					if($x) { return $x; }
				}
			}		
		} 		
		return '<div class="row '.$classes.'">';  			
	}		
	function sf__theme_row_end() {
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_row_end")) {
					$x = sf___theme_row_end();
					if($x) { return $x; }
				}
			}		
		} 
		return '</div>';  			
	}	
	
	#############################################################################################################################################
	#############################################################################################################################################
	// Column Buildup
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_col_start($size, $classes = "") {
		if($classes == false) { $classes = ""; }
		if($size == false) { $size = ""; }
		if(is_numeric($size) AND $size > 12) { $size = 12; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_col_start")) {
					$x = sf___theme_col_start($size, $classes);
					if($x) { return $x; }
				}
			}		
		} 		
		if(is_numeric($size)) { $size = "col-md-".$size; }
		return '<div class="'.$size.' '.$classes.'">';  			
	}		
	function sf__theme_col_end() {
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_col_end")) {
					$x = sf___theme_col_end();
					if($x) { return $x; }
				}
			}		
		} 
		return '</div>';  			
	}		
	
	#############################################################################################################################################
	#############################################################################################################################################
	// Button Elements
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_button_danger($text , $type = "button", $name = false, $js = false, $classes = false) { 
		if($type == false) { $type = "button"; }
		if($classes == false) { $classes = ""; }
		if($js == false) { $js = ""; } else { $js = ' onClick="'.$js.'" '; }
		if($name == false) { $name = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_button_danger")) {
					$x = sf___theme_button_danger($text , $type, $name, $js, $classes);
					if($x) { return $x; }
				}
			}		
		} 			
		if($type == "button") { return '<button class="btn btn-danger '.$classes.'" '.$js.' name="'.$name.'" type="'.$type.'">'.$text.'</button>';	 }
		if($type == "submit") { return '<button class="btn btn-danger '.$classes.'" '.$js.' name="'.$name.'" type="'.$type.'">'.$text.'</button>';	 }
		if($type == "a") { return '<a class="btn btn-danger '.$classes.'" '.$js.' href="'.$name.'">'.$text.'</a>';	 }
	}
	function sf__theme_button_success($text , $type = "button", $name = false, $js = false, $classes = false) { 
		if($type == false) { $type = "button"; }
		if($classes == false) { $classes = ""; }
		if($js == false) { $js = ""; } else { $js = ' onClick="'.$js.'" '; }
		if($name == false) { $name = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_button_success")) {
					$x = sf___theme_button_success($text , $type, $name, $js, $classes);
					if($x) { return $x; }
				}
			}		
		} 			
		if($type == "button") { return '<button class="btn btn-success '.$classes.'" '.$js.' name="'.$name.'" type="'.$type.'">'.$text.'</button>';	 }
		if($type == "submit") { return '<button class="btn btn-success '.$classes.'" '.$js.' name="'.$name.'" type="'.$type.'">'.$text.'</button>';	 }
		if($type == "a") { return '<a class="btn btn-success '.$classes.'" '.$js.' href="'.$name.'">'.$text.'</a>';	 }
	}	
	function sf__theme_button_warning($text , $type = "button", $name = false, $js = false, $classes = false) { 
		if($type == false) { $type = "button"; }
		if($classes == false) { $classes = ""; }
		if($js == false) { $js = ""; } else { $js = ' onClick="'.$js.'" '; }
		if($name == false) { $name = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_button_warning")) {
					$x = sf___theme_button_warning($text , $type, $name, $js, $classes);
					if($x) { return $x; }
				}
			}		
		} 			
		if($type == "button") { return '<button class="btn btn-warning '.$classes.'" '.$js.' name="'.$name.'" type="'.$type.'">'.$text.'</button>';	 }
		if($type == "submit") { return '<button class="btn btn-warning '.$classes.'" '.$js.' name="'.$name.'" type="'.$type.'">'.$text.'</button>';	 }
		if($type == "a") { return '<a class="btn btn-warning '.$classes.'" '.$js.' href="'.$name.'">'.$text.'</a>';	 }
	}	
	function sf__theme_button_info($text , $type = "button", $name = false, $js = false, $classes = false) { 
		if($type == false) { $type = "button"; }
		if($classes == false) { $classes = ""; }
		if($js == false) { $js = ""; } else { $js = ' onClick="'.$js.'" '; }
		if($name == false) { $name = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_button_info")) {
					$x = sf___theme_button_info($text , $type, $name, $js, $classes);
					if($x) { return $x; }
				}
			}		
		} 			
		if($type == "button") { return '<button class="btn btn-info '.$classes.'" '.$js.' name="'.$name.'" type="'.$type.'">'.$text.'</button>';	 }
		if($type == "submit") { return '<button class="btn btn-info '.$classes.'" '.$js.' name="'.$name.'" type="'.$type.'">'.$text.'</button>';	 }
		if($type == "a") { return '<a class="btn btn-info '.$classes.'" '.$js.' href="'.$name.'">'.$text.'</a>';	 }
	}	
	function sf__theme_button_primary($text , $type = "button", $name = false, $js = false, $classes = false) { 
		if($type == false) { $type = "button"; }
		if($classes == false) { $classes = ""; }
		if($js == false) { $js = ""; } else { $js = ' onClick="'.$js.'" '; }
		if($name == false) { $name = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_button_primary")) {
					$x = sf___theme_button_primary($text , $type, $name, $js, $classes);
					if($x) { return $x; }
				}
			}		
		} 			
		if($type == "button") { return '<button class="btn btn-primary '.$classes.'" '.$js.' name="'.$name.'" type="'.$type.'">'.$text.'</button>';	 }
		if($type == "submit") { return '<button class="btn btn-primary '.$classes.'" '.$js.' name="'.$name.'" type="'.$type.'">'.$text.'</button>';	 }
		if($type == "a") { return '<a class="btn btn-primary '.$classes.'" '.$js.' href="'.$name.'">'.$text.'</a>';	 }
	}	
	function sf__theme_button_secondary($text , $type = "button", $name = false, $js = false, $classes = false) { 
		if($type == false) { $type = "button"; }
		if($classes == false) { $classes = ""; }
		if($js == false) { $js = ""; } else { $js = ' onClick="'.$js.'" '; }
		if($name == false) { $name = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_button_secondary")) {
					$x = sf___theme_button_secondary($text , $type, $name, $js, $classes);
					if($x) { return $x; }
				}
			}		
		} 			
		if($type == "button") { return '<button class="btn btn-secondary '.$classes.'" '.$js.' name="'.$name.'" type="'.$type.'">'.$text.'</button>';	 }
		if($type == "submit") { return '<button class="btn btn-secondary '.$classes.'" '.$js.' name="'.$name.'" type="'.$type.'">'.$text.'</button>';	 }
		if($type == "a") { return '<a class="btn btn-secondary '.$classes.'" '.$js.' href="'.$name.'">'.$text.'</a>';	 }
	}	
	
	#############################################################################################################################################
	#############################################################################################################################################
	// Box Elements
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_box_start($header = false, $mainclass = "", $headerclass = "", $bodyclass = "") { 
		if($headerclass == false) { $headerclass = ""; }
		if($bodyclass == false) { $bodyclass = ""; }
		if($mainclass == false) { $mainclass = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_box_start")) {
					$x = sf___theme_box_start($header, $mainclass, $headerclass, $bodyclass);
					if($x) { return $x; }
				}
			}		
		} 	
       $output =  '<div class="card '.$mainclass.'">';
		if($header) { 
			$output .=  '<div class="header '.$headerclass.'">'.$header.'</div>';
		} 
		$output .=  '<div class="body '.$bodyclass.'">';	
		return $output; 
	}
	function sf__theme_box_end() { 
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_box_end")) {
					$x = sf___theme_box_end();
					if($x) { return $x; }
				}
			}		
		} 	
		return '</div></div>'; 
	}	
	function sf__theme_box($text, $header = false, $mainclass = "", $headerclass = "", $bodyclass = "") { 
		if($headerclass == false) { $headerclass = ""; }
		if($bodyclass == false) { $bodyclass = ""; }
		if($mainclass == false) { $mainclass = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_box")) {
					$x = sf___theme_box($text, $header, $mainclass, $headerclass, $bodyclass);
					if($x) { return $x; }
				}
			}		
		} 	
		$output =  '<div class="card '.$mainclass.'">';
		    if($header) { 
				$output .=  '<div class="header '.$headerclass.'">'.$header.'</div>';
			} 
			$output .=  '<div class="body '.$bodyclass.'">';	
			$output .=  $text;	
			$output .=  '</div>';	
		$output .=  '</div>';	
		return $output; }	
	
	#############################################################################################################################################
	#############################################################################################################################################
	// Space  Buildup Elements
	#############################################################################################################################################	
	#############################################################################################################################################	
	function sf__theme_space_fix() {
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_space_fix")) {
					$x = sf___theme_space_fix();
					if($x) { return $x; }
				}
			}		
		} return ''; 
	}	
	function sf__theme_space_s() { 
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_space_s")) {
					$x = sf___theme_space_s();
					if($x) { return $x; }
				}
			}		
		} return '<div class="m-b-10"></div>'; 
	}	
	function sf__theme_space_m() { 
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_space_m")) {
					$x = sf___theme_space_m();
					if($x) { return $x; }
				}
			}		
		} return '<div class="m-b-20"></div>'; 
	}	
	function sf__theme_space_l() { 
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_space_l")) {
					$x = sf___theme_space_l();
					if($x) { return $x; }
				}
			}		
		} return '<div class="m-b-40"></div>'; 
	}	
	
	#############################################################################################################################################
	#############################################################################################################################################
	// Heading Elements
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_h1($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_h1")) {
					$x = sf___theme_h1($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<h1 class="'.$classes.'">'.$message.'</h1>'; 
	}
	function sf__theme_h2($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_h2")) {
					$x = sf___theme_h2($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<h2 class="'.$classes.'">'.$message.'</h2>'; 
	}
	function sf__theme_h3($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_h3")) {
					$x = sf___theme_h3($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<h3 class="'.$classes.'">'.$message.'</h3>'; 
	}
	function sf__theme_h4($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_h4")) {
					$x = sf___theme_h4($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<h4 class="'.$classes.'">'.$message.'</h4>'; 
	}
	function sf__theme_h5($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_h5")) {
					$x = sf___theme_h5($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<h5 class="'.$classes.'">'.$message.'</h1>'; 
	}	
	
	#############################################################################################################################################
	#############################################################################################################################################
	// Alert Boxes
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_alert_danger($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_alert_danger")) {
					$x = sf___theme_alert_danger($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<div class="alert alert-danger '.$classes.'">'.$message.'</div>';	
	}
	function sf__theme_alert_success($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_alert_success")) {
					$x = sf___theme_alert_success($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<div class="alert alert-success '.$classes.'">'.$message.'</div>';	
	}	
	function sf__theme_alert_warning($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_alert_warning")) {
					$x = sf___theme_alert_warning($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<div class="alert alert-warning '.$classes.'">'.$message.'</div>';	
	}	
	function sf__theme_alert_info($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_alert_info")) {
					$x = sf___theme_alert_info($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<div class="alert alert-info '.$classes.'">'.$message.'</div>';	
	}	
	function sf__theme_alert_primary($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_alert_primary")) {
					$x = sf___theme_alert_primary($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<div class="alert alert-primary '.$classes.'">'.$message.'</div>';	
	}	
	function sf__theme_alert_secondary($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_alert_secondary")) {
					$x = sf___theme_alert_secondary($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<div class="alert alert-secondary '.$classes.'">'.$message.'</div>';	
	}
	
	#############################################################################################################################################
	#############################################################################################################################################
	// Badge Boxes
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_badge_danger($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_badge_danger")) {
					$x = sf___theme_badge_danger($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<span class="badge badge-danger '.$classes.'">'.$message.'</span>';	
	}
	function sf__theme_badge_success($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_badge_success")) {
					$x = sf___theme_badge_success($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<span class="badge badge-success '.$classes.'">'.$message.'</span>';	
	}
	function sf__theme_badge_warning($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_badge_warning")) {
					$x = sf___theme_badge_warning($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<span class="badge badge-warning '.$classes.'">'.$message.'</span>';	
	}
	function sf__theme_badge_info($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_badge_info")) {
					$x = sf___theme_badge_info($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<span class="badge badge-info '.$classes.'">'.$message.'</span>';	
	}
	function sf__theme_badge_primary($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_badge_primary")) {
					$x = sf___theme_badge_primary($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<span class="badge badge-primary '.$classes.'">'.$message.'</span>';	
	}
	function sf__theme_badge_secondary($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_badge_secondary")) {
					$x = sf___theme_badge_secondary($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<span class="badge badge-secondary '.$classes.'">'.$message.'</span>';	
	}	
	
	#############################################################################################################################################
	#############################################################################################################################################
	// Label Boxes
	#############################################################################################################################################
	#############################################################################################################################################
	function sf__theme_label_danger($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_label_danger")) {
					$x = sf___theme_label_danger($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<span class="label label-danger '.$classes.'">'.$message.'</span>';	
	}
	function sf__theme_label_success($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_label_success")) {
					$x = sf___theme_label_success($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<span class="label label-success '.$classes.'">'.$message.'</span>';	
	}
	function sf__theme_label_warning($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_label_warning")) {
					$x = sf___theme_label_warning($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<span class="label label-warning '.$classes.'">'.$message.'</span>';	
	}
	function sf__theme_label_info($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_label_info")) {
					$x = sf___theme_label_info($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<span class="label label-info '.$classes.'">'.$message.'</span>';	
	}	
	function sf__theme_label_primary($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_label_primary")) {
					$x = sf___theme_label_primary($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<span class="label label-primary '.$classes.'">'.$message.'</span>';	
	}	
	function sf__theme_label_secondary($message, $classes = "") { 
		if(!$classes) { $classes = ""; }
		if(defined("_ADM_TH_")) {
			if(_ADM_TH_ != "adminbsb") {
				if(function_exists("sf___theme_label_secondary")) {
					$x = sf___theme_label_secondary($message, $classes);
					if($x) { return $x; }
				}
			}		
		} return '<span class="label label-secondary '.$classes.'">'.$message.'</span>';	
	}