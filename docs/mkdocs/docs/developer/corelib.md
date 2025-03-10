# Core Library
Core library functionalities are listed here.


## Extensions Init


| Function | Description | Parameters |
|----------|-------------|------------|
| `hive__init_site_header` | Get Array with current Site modules Extension in Parameter | $hive_mode |
| `hive__init_extension_header` | Init Variable Set for Extension Module Injections | $object, $extension_name, $sitemod_name = false |
| `hive__extension_path($hive_mode)` | Get Path of all active extensions for a site Module | $hive_mode = false |


## Default Mail Function

| Function | Description | Parameters |
|----------|-------------|------------|
|hive__default_mail| Default Backend Function to send Mails| $object, $template, $mail, $user_id, $url_if_needed |

## File Include and Read

| Function | Description | Parameters |
|----------|-------------|------------|
| `hive__require_once` | Require Once Alias | $object, $filepath |
| `hive__require` | Require Alias | $object, $filepath |
| `hive__require_x` | Include $FILEPATH./version.php and return $x array | $filepath |

## Status Check

| Function | Description | Parameters |
|----------|-------------|------------|
| `hive__is_main` | Checks if the current Viewed Site Module mode is the Administrator Page (Main Site) - True if yes, False if no. | $object |

## Access Status

| Function | Description | Parameters |
|----------|-------------|------------|
| `hive__access($object, $rights, $displayerror = false)` | Checks access rights for a user with optional groups and can display an error page. | - `$object` - An object that contains information about permissions.<br>- `$rights` - An array of access rights to check.<br>- `$displayerror` - A boolean indicating whether to display an error page on access denial. |


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

## Filtering

| Function | Description | Parameters |
|----------|-------------|------------|
| `hive__hsc` | Alias for htmlspecialchars | $value |
| `hive__trim` | Alias for trim |$value |
| `hive__hen` | Alias for htmlentities |$value |


## Folders

| Function | Description | Parameters |
|----------|-------------|------------|
| `hive__folder_create` | Create a folder with htaccess or forwarding file if necessary. | `$folderpath`, `$forwardfile = false`, `$denie_access = false` |



## URL Builder

| Function | Description | Parameters |
|----------|-------------|------------|
| `hive__url($array)` | Generates a relative URL based on an array of values. | `$array` - An array of values used to construct the URL. |

## Error Page

| Function | Description | Parameters |
|----------|-------------|------------|
| `hive__error($title, $subtitle, $description, $exit, $code)` | Generates an HTML error page with custom information. | - `$title` - The title of the error page.<br>- `$subtitle` - A subtitle for the error.<br>- `$description` - A description of the error.<br>- `$exit` - A boolean indicating whether to exit after displaying the error.<br>- `$code` - An optional HTTP response code (numeric). |

## Templates

| Function | Description | Parameters |
|----------|-------------|------------|
| **Login and Account Execution Functions** | | |
| `hive__template_mail_activate` | Execution to activate new mail. | `$object`, `$get_token = "mai_token"`, `$get_user = "mai_user"`, `$message = true`, `$redirect = _HIVE_URL_REL_` |
| `hive__template_user_activate` | Execution to activate a user. | `$object`, `$get_token = "act_token"`, `$get_user = "act_user"`, `$message = true`, `$redirect = _HIVE_URL_REL_` |
| `hive__template_recover_request` | Request a new Recover of Account and Send Mail to Account. | `$object`, `$rec_url = false`, `$get_token = "rec_token"`, `$get_user = "rec_user"`, `$message = true`, `$redirect = _HIVE_URL_REL_` |
| `hive__template_login` | Login Executions. | `$object`, `$cookies_allow = false` |

## Backend Theme

| Function | Description | Parameters |
|----------|-------------|------------|
|hive__default_volt_footer($object, $footer, $classes, $end_div) | Footer for Default Style |
|hive__default_volt_header($object, $title, $metaext, $theme, $mainclass, $defaultclasses)  | Header for Default Style |

## Downloads

| Function | Description | Parameters |
|----------|-------------|------------|
| `hive__download_mimeTypes()` | Ger array with Valid Mime Types ||
| `hive__download($filePath)` | Download all files even if restricted with required filepath (absolute) | $filePath |
