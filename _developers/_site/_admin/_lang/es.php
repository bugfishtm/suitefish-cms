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
site_title=Página de Administración de Ejemplo
site_title_ext=Página de Administración de Ejemplo para el Módulo _tplsite Extensión
site_title_ext1=¡Este es solo un sitio de prueba para el Módulo de Ejemplo!
site_title_ext2=¡No tienes los permisos necesarios para ver esta página!
example_permission=Ver Página de Administración
example_permission_descr=Permiso para Ver la Página del Módulo del Sitio Administrativo.
nav_item=Módulo de Ejemplo
site_settings=¡No hay configuraciones disponibles para este módulo! El archivo mod_setting incluido en este módulo es solo un ejemplo de cómo generar contenido en una página administrativa.

##########################################################################################
## Store Translations
##########################################################################################
store_version_name=Plantilla: Módulo del Sitio
store_version_description=El módulo _tplsite proporciona una plantilla básica para demostrar la estructura de módulos de sitio completos en Suitefish CMS. Muestra principios mínimos de diseño receptivo.