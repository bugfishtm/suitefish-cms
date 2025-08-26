<?php
	#	 ░▒▓███████▓▒░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░▒▓████████▓▒░▒▓████████▓▒░▒▓████████▓▒░▒▓█▓▒░░▒▓███████▓▒░▒▓█▓▒░░▒▓█▓▒░ 
	#	░▒▓█▓▒░      ░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░▒▓█▓▒░      ░▒▓█▓▒░░▒▓█▓▒░ 
	#	░▒▓█▓▒░      ░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░▒▓█▓▒░      ░▒▓█▓▒░░▒▓█▓▒░ 
	#	 ░▒▓██████▓▒░░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓██████▓▒░ ░▒▓██████▓▒░ ░▒▓█▓▒░░▒▓██████▓▒░░▒▓████████▓▒░ 
	#		   ░▒▓█▓▒░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░▒▓█▓▒░░▒▓█▓▒░ 
	#		   ░▒▓█▓▒░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░▒▓█▓▒░░▒▓█▓▒░ 
	#	░▒▓███████▓▒░ ░▒▓██████▓▒░░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓████████▓▒░▒▓█▓▒░      ░▒▓█▓▒░▒▓███████▓▒░░▒▓█▓▒░░▒▓█▓▒░ 
		
	#	Copyright (C) 2025 Jan Maurice Dahlmanns [Bugfish]

	#	This program is free software: you can redistribute it and/or modify
	#	it under the terms of the GNU General Public License as published by
	#	the Free Software Foundation, either version 3 of the License, or
	#	(at your option) any later version.

	#	This program is distributed in the hope that it will be useful,
	#	but WITHOUT ANY WARRANTY; without even the implied warranty of
	#	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	#	GNU General Public License for more details.

	#	You should have received a copy of the GNU General Public License
	#	along with this program.  If not, see <https://www.gnu.org/licenses/>.
	
	/***********************************************************************************************************
		Disable Hardlinking
	***********************************************************************************************************/
	if(!is_array(@$object)) { @http_response_code(@404); @Header("Location: ../"); exit(); }

	/***********************************************************************************************************
		Get user Related Values
	***********************************************************************************************************/
		function hive__user_get($object, $user_id) {
			if(is_numeric($user_id)) {
				return $object["mysql"]->query("SELECT * FROM "._TABLE_USER_." WHERE id = '".$user_id."'", false);
			} return false;
		}			
		
	/***********************************************************************************************************
		Get user backend Related Values
	***********************************************************************************************************/
		function hive__user_lang_get($object, $user_id, $mode) {
			if(is_numeric($user_id)) {
				$x = $object["user"]->get($user_id);
				$tmp = @unserialize($x["hive_extradata"]);
				if(!is_array($tmp)) { return false; }
				return @$tmp[$mode]["lang"];
				return true;
			} return false;
		}
		function hive__user_theme_get($object, $user_id, $mode) {
			if(is_numeric($user_id)) {
				$x = $object["user"]->get($user_id);
				$tmp = @unserialize($x["hive_extradata"]);
				if(!is_array($tmp)) { return false; }
				return @$tmp[$mode]["theme"];
				return true;
			} return false;
		}	
		function hive__user_theme_sub_get($object, $user_id, $mode) {
			if(is_numeric($user_id)) {
				$x = $object["user"]->get($user_id);
				$tmp = @unserialize($x["hive_extradata"]);
				if(!is_array($tmp)) { return false; }
				return @$tmp[$mode]["theme_sub"];
				return true;
			} return false;
		}	
		function hive__user_color_get($object, $user_id, $mode) {
			if(is_numeric($user_id)) {
				$x = $object["user"]->get($user_id);
				$tmp = @unserialize($x["hive_extradata"]);
				if(!is_array($tmp)) { return false; }
				return @$tmp[$mode]["color"];
			} return false;
		}	
		function hive__user_key_get($object, $user_id, $mode, $key) {
			if(is_numeric($user_id)) {
				$x = $object["user"]->get($user_id);
				$tmp = @unserialize($x["hive_extradata"]);
				if(!is_array($tmp)) { return false; }
				return @$tmp[$mode][$key];
			} return false;
		}			
		
	/***********************************************************************************************************
		Set user backend Related Values
	***********************************************************************************************************/
		function hive__user_lang_set($object, $user_id, $mode, $theme_name) {
			if(is_numeric($user_id) AND @in_array(@$theme_name, _HIVE_LANG_ARRAY_)) {
				$x = $object["user"]->get($user_id);
				$tmp = @unserialize($x["hive_extradata"]);
				if(!is_array($tmp)) { $tmp = array(); }
				$tmp[$mode]["lang"] = $theme_name;
				$tmp = serialize($tmp);
				$bind[0]["value"] = $tmp;
				$bind[0]["type"] = "s";
				$object["mysql"]->query("UPDATE "._TABLE_USER_." SET hive_extradata = ? WHERE id = '".$user_id."'", $bind);
				return true;
			} return false;
		}
		function hive__user_theme_set($object, $user_id, $mode, $theme_name) {
			if(is_numeric($user_id) AND @in_array(@$theme_name, _HIVE_THEME_ARRAY_)) {
				$x = $object["user"]->get($user_id);
				$tmp = @unserialize($x["hive_extradata"]);
				if(!is_array($tmp)) { $tmp = array(); }
				$tmp[$mode]["theme"] = $theme_name;
				$tmp = serialize($tmp);
				$bind[0]["value"] = $tmp;
				$bind[0]["type"] = "s";
				$object["mysql"]->query("UPDATE "._TABLE_USER_." SET hive_extradata = ? WHERE id = '".$user_id."'", $bind);
				return true;
			} return false;
		}	
		function hive__user_theme_sub_set($object, $user_id, $mode, $theme_name) {
			if(is_numeric($user_id)) {
				$x = $object["user"]->get($user_id);
				$tmp = @unserialize($x["hive_extradata"]);
				if(!is_array($tmp)) { $tmp = array(); }
				$tmp[$mode]["theme_sub"] = $theme_name;
				$tmp = serialize($tmp);
				$bind[0]["value"] = $tmp;
				$bind[0]["type"] = "s";
				$object["mysql"]->query("UPDATE "._TABLE_USER_." SET hive_extradata = ? WHERE id = '".$user_id."'", $bind);
				return true;
			} return false;
		}	
		function hive__user_color_set($object, $user_id, $mode, $theme_name) {
			if(is_numeric($user_id)) {
				$x = $object["user"]->get($user_id);
				$tmp = @unserialize($x["hive_extradata"]);
				if(!is_array($tmp)) { $tmp = array(); }
				$tmp[$mode]["color"] = $theme_name;
				$tmp = serialize($tmp);
				$bind[0]["value"] = $tmp;
				$bind[0]["type"] = "s";
				$object["mysql"]->query("UPDATE "._TABLE_USER_." SET hive_extradata = ? WHERE id = '".$user_id."'", $bind);
				return true;
			} return false;
		}	
		function hive__user_key_set($object, $user_id, $mode, $key, $value) {
			if(is_numeric($user_id)) {
				$x = $object["user"]->get($user_id);
				$tmp = @unserialize($x["hive_extradata"]);
				if(!is_array($tmp)) { $tmp = array(); }
				$tmp[$mode][$key] = $value;
				$tmp = serialize($tmp);
				$bind[0]["value"] = $tmp;
				$bind[0]["type"] = "s";
				$object["mysql"]->query("UPDATE "._TABLE_USER_." SET hive_extradata = ? WHERE id = '".$user_id."'", $bind);
				return true;
			} return false;
		}		