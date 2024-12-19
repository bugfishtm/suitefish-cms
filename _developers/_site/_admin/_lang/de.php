<?php if(isset($this)) { if(!is_object($this)) { Header("Location: ../"); exit(); } } else { Header("Location: ../"); exit(); }
#		 ____  __  __  ___  ____  ____  ___  _   _ 
#		(  _ \(  )(  )/ __)( ___)(_  _)/ __)( )_( )
#		 ) _ < )(__)(( (_-. )__)  _)(_ \__ \ ) _ ( 
#		(____/(______)\___/(__)  (____)(___/(_) (_) www.bugfish.eu
#				 ___ _   _ ___ _____ ___ ___ ___ ___ _  _ 
#				/ __| | | |_ _|_   _| __| __|_ _/ __| || |
#				\__ \ |_| || |  | | | _|| _| | |\__ \ __ |
#				|___/\___/|___| |_| |___|_| |___|___/_||_|
#		Copyright (C) 2024 Jan Maurice Dahlmanns [Bugfish]
#
#		This program is free software: you can redistribute it and/or modify
#		it under the terms of the GNU General Public License as published by
#		the Free Software Foundation, either version 3 of the License, or
#		(at your option) any later version.
#
#		This program is distributed in the hope that it will be useful,
#		but WITHOUT ANY WARRANTY; without even the implied warranty of
#		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#		GNU General Public License for more details.
#
#		You should have received a copy of the GNU General Public License
#		along with this program.  If not, see <https://www.gnu.org/licenses/>. ?>
##########################################################################################
## Administrator Translations
##########################################################################################
site_title=Beispiel-Administrationsseite
site_title_ext=Beispiel-Administrationsseite für das Modul _tplsite Erweiterung
site_title_ext1=Dies ist nur eine Testseite für das Beispielmodul!
site_title_ext2=Sie haben nicht die erforderliche Berechtigung, um diese Seite anzuzeigen!
example_permission=Administrationsseite anzeigen
example_permission_descr=Berechtigung zum Anzeigen der Seite des Verwaltungsmoduls.
nav_item=Beispielmodul
site_settings=Für dieses Modul sind keine Einstellungen verfügbar! Die in diesem Modul enthaltene Datei mod_setting ist nur ein Beispiel dafür, wie Inhalte auf einer Administrationsseite angezeigt werden können.

##########################################################################################
## Store Translations
##########################################################################################
store_version_name=Vorlage: Standortmodul
store_version_description=Das Modul _tplsite bietet eine grundlegende Vorlage, um die Struktur von vollständigen Standortmodulen in der Suitefish CMS zu demonstrieren. Es zeigt minimalistische Prinzipien des responsiven Designs.