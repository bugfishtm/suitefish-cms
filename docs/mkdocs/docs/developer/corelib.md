# Core Library
Core library functionalities are listed here.


## Extensions Init


| Function | Description | Parameters |
|----------|-------------|------------|
| `hive__init_site_header` | Get Array with current Site modules Extension in Parameter | $hive_mode |
| `hive__init_site_header` | Init Variable Set for Site Module Injections | $object, $site_name |
| `hive__init_extension_header` | Init Variable Set for Extension Module Injections | $object, $extension_name, $sitemod_name = false |


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


## User Setup

| Function | Description | Parameters |
|----------|-------------|------------|
| `hive__user_lang_set($object, $user_id, $hive_mode, $lang_name)` | Save a default language for the user in the given site mode in the users' database (will be validated with the available language array). | - `$object` - Object Array<br>- `$user_id` - User ID to change for<br>- `$hive_mode` - Site Mode to change for<br>- `$lang_name` - Change the language for this user in this site mode to this value |
| `hive__user_theme_set($object, $user_id, $hive_mode, $theme_name)` | Save a default theme for the user in the given site mode in the users' database (will be validated with the available themes array). | - `$object` - Object Array<br>- `$user_id` - User ID to change for<br>- `$hive_mode` - Site Mode to change for<br>- `$theme_name` - Change the theme for this user in this site mode to this value |
| `hive__user_theme_sub_set($object, $user_id, $hive_mode, $theme_subsettings)` | Save theme subsettings if required for the user in the given site mode in the users' database. | - `$object` - Object Array<br>- `$user_id` - User ID to change for<br>- `$hive_mode` - Site Mode to change for<br>- `$theme_subsettings` - Change Theme Subsettings to this value |
| `hive__user_color_set($object, $user_id, $hive_mode, $color_code)` | Save a default color for the user in the given site mode in the users' database. | - `$object` - Object Array<br>- `$user_id` - User ID to change for<br>- `$hive_mode` - Site Mode to change for<br>- `$color_code` - Change color for this user in this site mode to this value |

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



## Administrator Theme

Some information about functions used by administrator module. This function list may not be complete or up to date. These functions are only included in the _administrator module and not in the core cms itself.

**Heading**  

| Function Name                                    | Description                  | Parameters                                             |
|--------------------------------------------------|------------------------------|--------------------------------------------------------|
| `sf__theme_h1($message, $classes = "")`    | Generates a h1 Heading Text. | `$message` (string), `$classes` (string, optional)    |
| `sf__theme_h2($message, $classes = "")`    | Generates a h2 Heading Text. | `$message` (string), `$classes` (string, optional)    |
| `sf__theme_h3($message, $classes = "")`    | Generates a h3 Heading Text. | `$message` (string), `$classes` (string, optional)    |
| `sf__theme_h4($message, $classes = "")`    | Generates a h4 Heading Text. | `$message` (string), `$classes` (string, optional)    |
| `sf__theme_h5($message, $classes = "")`    | Generates a h5 Heading Text. | `$message` (string), `$classes` (string, optional)    |

**Error**  

| Function Name                                                                 | Description               | Parameters                        |
|-------------------------------------------------------------------------------|---------------------------|-----------------------------------|
| `sf__theme_404($object, $text = "The requested page does not exist.", $title = "ERROR 404", $mainclass = "", $headerclass = "", $bodyclass = "")` | Generates a 404 Error Box. | See Function Name                 |
| `sf__theme_401($object, $text = "You do not have permission to view this page! :(", $title = "ERROR 401", $mainclass = "", $headerclass = "", $bodyclass = "")` | Generates a 401 Error Box. | See Function Name                 |

**Buttons**  

| Function Name                                            | Description          | Parameters                                             |
|----------------------------------------------------------|----------------------|--------------------------------------------------------|
| `sf__theme_button_danger($text, $type = "button", $name = "", $js = "", $classes = "")` | Generates a Button.  | See Function Name                                     |
| `sf__theme_button_success($text, $type = "button", $name = "", $js = "", $classes = "")` | Generates a Button.  | See Function Name                                     |
| `sf__theme_button_warning($text, $type = "button", $name = "", $js = "", $classes = "")` | Generates a Button.  | See Function Name                                     |
| `sf__theme_button_info($text, $type = "button", $name = "", $js = "", $classes = "")`    | Generates a Button.  | See Function Name                                     |
| `sf__theme_button_primary($text, $type = "button", $name = "", $js = "", $classes = "")` | Generates a Button.  | See Function Name                                     |
| `sf__theme_button_secondary($text, $type = "button", $name = "", $js = "", $classes = "")` | Generates a Button.  | See Function Name                                     |
| `Button`       | Generates a Button.  | See Function Name |

**Boxes**  

| Function Name                                      | Description                   | Additional Info |
|----------------------------------------------------|-------------------------------|-----------------|
| `sf__theme_box($text, $header = false, $mainclass = "", $headerclass = "", $bodyclass = "")` | Create a full box with content. | See Function Name |
| `sf__theme_box_start($header = false, $mainclass = "", $headerclass = "", $bodyclass = "")` | Start a Box.                  | See Function Name |
| `sf__theme_box_end()`                        | End a Box.                    | See Function Name |

**Badges**  

| Function Name                                      | Description          | Additional Info |
|----------------------------------------------------|----------------------|-----------------|
| `sf__theme_badge_danger($message, $classes = "")`   | Generates a Badge.  | See Function Name |
| `sf__theme_badge_success($message, $classes = "")`  | Generates a Badge.  | See Function Name |
| `sf__theme_badge_info($message, $classes = "")`     | Generates a Badge.  | See Function Name |
| `sf__theme_badge_warning($message, $classes = "")`  | Generates a Badge.  | See Function Name |
| `sf__theme_badge_primary($message, $classes = "")`   | Generates a Badge.  | See Function Name |
| `sf__theme_badge_secondary($message, $classes = "")` | Generates a Badge.  | See Function Name |

**Alerts**  

| Function Name                                      | Description          | Additional Info |
|----------------------------------------------------|----------------------|-----------------|
| `sf__theme_alert_danger($message, $classes = "")`   | Generates an Alert. | See Function Name |
| `sf__theme_alert_success($message, $classes = "")`  | Generates an Alert. | See Function Name |
| `sf__theme_alert_info($message, $classes = "")`     | Generates an Alert. | See Function Name |
| `sf__theme_alert_warning($message, $classes = "")`  | Generates an Alert. | See Function Name |
| `sf__theme_alert_primary($message, $classes = "")`   | Generates an Alert. | See Function Name |
| `sf__theme_alert_secondary($message, $classes = "")` | Generates an Alert. | See Function Name |

**Label**  

| Function Name                                      | Description          | Additional Info |
|----------------------------------------------------|----------------------|-----------------|
| `sf__theme_label_danger($message, $classes = "")`   | Generates a Label. | See Function Name |
| `sf__theme_label_success($message, $classes = "")`  | Generates a Label. | See Function Name |
| `sf__theme_label_info($message, $classes = "")`     | Generates a Label. | See Function Name |
| `sf__theme_label_warning($message, $classes = "")`  | Generates a Label. | See Function Name |
| `sf__theme_label_primary($message, $classes = "")`   | Generates a Label. | See Function Name |
| `sf__theme_label_secondary($message, $classes = "")` | Generates a Label. | See Function Name |

**Modals**  

| Function Name                                      | Description             | Additional Info |
|----------------------------------------------------|-------------------------|-----------------|
| `sf__theme_modal($text, $title = false, $icon = "info", $closebutton = "true")` | Spawn a Popup Window.  | See Function Name |

**Buildup**  

| Function Name                                      | Description              |
|----------------------------------------------------|--------------------------|
| `sf__theme_end($object)`                     | End AdminBSB Content     |                
| `sf__theme_start($object)`                   | Start AdminBSB Content   |                
| `sf__theme_footer($object)`                  | Spawn Footer             |                
| `sf__theme_header($object, $tabtitle = "", $metaextensions = "")` | Spawn Header.           |  
| `sf__theme_nav($object, $pfm = false, $footertext = false, $hideuserarea = false, $userimg = "/_core/_image/user_image.png")` | Spawn Nav.              |                
| `sf__theme_topbar($object, $title = "", $theme_changer = false, $lang_ar = false, $notify_ar = false, $modulechooser = false, $cal_ar = false, $search = false)` | Spawn Topbar.           |      