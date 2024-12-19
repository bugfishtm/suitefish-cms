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
site_title=Page d’Administration Exemple
site_title_ext=Page d’Administration Exemple pour le Module _tplsite Extension
site_title_ext1=Ceci est juste un site de test pour le Module Exemple !
site_title_ext2=Vous n’avez pas les permissions nécessaires pour voir cette page !
example_permission=Voir la Page d’Administration
example_permission_descr=Permission pour Voir la Page du Module du Site Administratif.
nav_item=Module Exemple
site_settings=Aucun paramètre n’est disponible pour ce module ! Le fichier mod_setting inclus dans ce module est juste un exemple de création de contenu sur une page administrative.

##########################################################################################
## Store Translations
##########################################################################################
store_version_name=Modèle : Module de Site
store_version_description=Le module _tplsite fournit un modèle de base pour démontrer la structure des modules de site complets dans Suitefish CMS. Il présente des principes minimaux de conception réactive.