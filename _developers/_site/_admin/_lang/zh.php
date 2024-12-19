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
site_title=示例管理页面
site_title_ext=_tplsite 扩展模块的示例管理页面
site_title_ext1=这是示例模块的测试网站！
site_title_ext2=您缺少查看此页面所需的权限！
example_permission=查看管理页面
example_permission_descr=查看管理站点模块页面的权限。
nav_item=示例模块
site_settings=此模块没有可用的设置！此模块中包含的 mod_setting 文件只是一个在管理页面生成内容的示例。

##########################################################################################
## Store Translations
##########################################################################################
store_version_name=模板：站点模块
store_version_description=_tplsite 模块提供了一个基本模板，用于演示 Suitefish CMS 中完整站点模块的结构。它展示了最小化的响应式设计原则。