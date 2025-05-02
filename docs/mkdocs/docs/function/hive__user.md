# Functions: `hive__user` 

## User Get

| Function | Description | Parameters |
|----------|-------------|------------|
| `hive__user_get($object, $user_id)` | Get user Information from Table. | - `$object` - Object Array<br>- `$user_id` - User ID to get info for |

## User Setup Get

| Function | Description | Parameters |
|----------|-------------|------------|
| `hive__user_lang_get($object, $user_id, $mode)` | Get the current userdata lang. | - `$object` - Object Array<br>- `$user_id` - User ID to change for<br>- `$mode` - Site Mode to get value for |
| `hive__user_theme_get($object, $user_id, $mode)` | Get the current userdata theme.  | - `$object` - Object Array<br>- `$user_id` - User ID to change for<br>- `$mode` - Site Mode to get value for |
| `hive__user_theme_sub_get($object, $user_id, $mode)` | Get the current userdata theme sub.  | - `$object` - Object Array<br>- `$user_id` - User ID to change for<br>- `$mode` - Site Mode to get value for |
| `hive__user_color_get($object, $user_id, $mode)` | Get the current userdata color.  | - `$object` - Object Array<br>- `$user_id` - User ID to change for<br>- `$mode` - Site Mode to get value for |
| `hive__user_key_get($object, $user_id, $mode, $key)` | Get a key value from user data.  | - `$object` - Object Array<br>- `$user_id` - User ID to change for<br>- `$mode` - Site Mode to get value for<br>- `$key` - Key to get value for |

## User Setup Change

| Function | Description | Parameters |
|----------|-------------|------------|
| `hive__user_lang_set($object, $user_id, $hive_mode, $lang_name)` | Save a default language for the user in the given site mode in the users' database (will be validated with the available language array). | - `$object` - Object Array<br>- `$user_id` - User ID to change for<br>- `$hive_mode` - Site Mode to change for<br>- `$lang_name` - Change the language for this user in this site mode to this value |
| `hive__user_theme_set($object, $user_id, $hive_mode, $theme_name)` | Save a default theme for the user in the given site mode in the users' database (will be validated with the available themes array). | - `$object` - Object Array<br>- `$user_id` - User ID to change for<br>- `$hive_mode` - Site Mode to change for<br>- `$theme_name` - Change the theme for this user in this site mode to this value |
| `hive__user_theme_sub_set($object, $user_id, $hive_mode, $theme_subsettings)` | Save theme subsettings if required for the user in the given site mode in the users' database. | - `$object` - Object Array<br>- `$user_id` - User ID to change for<br>- `$hive_mode` - Site Mode to change for<br>- `$theme_subsettings` - Change Theme Subsettings to this value |
| `hive__user_color_set($object, $user_id, $hive_mode, $color_code)` | Save a default color for the user in the given site mode in the users' database. | - `$object` - Object Array<br>- `$user_id` - User ID to change for<br>- `$hive_mode` - Site Mode to change for<br>- `$color_code` - Change color for this user in this site mode to this value |
| `hive__user_key_set($object, $user_id, $mode, $key, $value)` | Save a default key value for the user in the given site mode in the users' database. | - `$object` - Object Array<br>- `$user_id` - User ID to change for<br>- `$hive_mode` - Site Mode to change for<br>- `$key` - Variable Key to save value under<br /> - `$value` - Value for Variable Key |
