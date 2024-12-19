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
site_title=例の管理ページ
site_title_ext=_tplsite 拡張モジュール用の例の管理ページ
site_title_ext1=これは例のモジュールのテストサイトです！
site_title_ext2=このページを表示するための必要な権限がありません！
example_permission=管理ページを表示
example_permission_descr=管理サイトモジュールページを表示する権限。
nav_item=例のモジュール
site_settings=このモジュールには設定がありません！このモジュールに含まれている mod_setting ファイルは、管理ページにコンテンツを生成する方法の例です。

##########################################################################################
## Store Translations
##########################################################################################
store_version_name=テンプレート: サイトモジュール
store_version_description=_tplsite モジュールは、Suitefish CMS におけるフルサイトモジュールの構造を示すための基本的なテンプレートを提供します。最小限のレスポンシブデザイン原則を紹介します。