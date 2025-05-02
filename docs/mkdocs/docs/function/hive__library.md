# Functions: `hive__` 

| Function | Description |
|---------|-------------|
| **`hive__init_site_header($object, $site_name)`** | Initializes a site header configuration. Extracts metadata like path, language, cookie prefix, and naming scheme for a site. <br>**Params:**<br>- `$object`: Main hive object containing configuration arrays<br>- `$site_name`: The site key to initialize |
| **`hive__init_extension_header($object, $extension_name, $sitemod_name = false)`** | Sets up configuration for an extension under a specific site/module. Returns info like path, language, cookie prefix. <br>**Params:**<br>- `$object`: Hive object<br>- `$extension_name`: Extension identifier<br>- `$sitemod_name`: Optional module name, defaults to `_HIVE_MODE_` |
| **`hive__extension_path($hive_mode)`** | Scans for directories under `_data/{hive_mode}/_extension` and returns their paths. Useful for dynamically loading extensions. |
| **`hive__require_once($object, $filepath)`** | Includes a PHP file once via `require_once()` and always returns `true`. Helps standardize inclusion logic. |
| **`hive__require($object, $filepath)`** | Includes a PHP file using `require()` and always returns `true`. Does not check if the file was already included. |
| **`hive__require_x($filepath)`** | Requires a file only if it contains a `version.php`. Returns variable `$x` from the file if present. <br>**Use Case:** Safely bootstraps modules/extensions that define `$x` as metadata or configuration. |
| **`hive__trim($string)`** | Trims whitespace from a string, safely handling `null`. |
| **`hive__hsc($string)`** | Returns a string with HTML special characters converted, using `htmlspecialchars()`. Prevents XSS in output. |
| **`hive__hen($string)`** | Returns a string with all HTML entities converted, using `htmlentities()`. More strict than `htmlspecialchars()`. |
| **`hive__access($object, $rights_local, $global_search = false, $inital_override = true)`** | Checks user permissions based on local or global rights. <br>**Params:**<br>- `$object`: Must contain user object, group, and permissions<br>- `$rights_local`: String or array of required permission keys<br>- `$global_search`: If `true`, checks against global permissions instead of local<br>- `$inital_override`: If `true`, gives initial CMS user full access |
| **`hive__url($array)`** | Constructs a relative URL from an array of path segments or query parameters, depending on SEO mode. <br>**Params:**<br>- `$array`: Ordered values to convert to URL structure (either as path segments or GET params) |
| **`hive__is_main($object)`** | Determines whether the current site/module instance is the "main" one, based on constants like `_HIVE_MODE_` and environment variables. |
| **`hive__folder_create($folderpath, $forwardfile = false, $denie_access = false, $chmode = 0770)`** | Creates a folder (recursively) with optional security features: <br> - Adds a redirecting `index.php`<br> - Optionally blocks access using `.htaccess`<br>**Params:**<br>- `$folderpath`: Absolute path to create<br>- `$forwardfile`: If `true`, generates an `index.php` that redirects visitors<br>- `$denie_access`: If `true`, calls `x_htaccess_secure()` (presumably blocks directory access)<br>- `$chmode`: Folder permissions, default `0770` |
| **`hive__file_tail($filename, $lines = 1000)`** | Reads the last N lines of a file efficiently by scanning from the end. Works like `tail -n`. Useful for logs. <br>**Params:**<br>- `$filename`: Path to file<br>- `$lines`: Number of lines to retrieve from the end |
| **`hive__in_array($needle, $haystack)`** | Recursively checks if a value exists in a multi-dimensional array. Mimics `in_array()` for nested structures. |













