# Functions: `hive__error` 

| Function | Description | Parameters |
|----------|-------------|------------|
| `hive__error($title, $subtitle = false, $description = false, $exit = true, $code = false, $backtohome = false, $icon = "danger")` | Generates an HTML error page with custom information. | - `$title` - The title of the error page.<br>- `$subtitle` - A subtitle for the error.<br>- `$description` - A description of the error.<br>- `$exit` - A boolean indicating whether to exit after displaying the error.<br>- `$code` - An optional HTTP response code (numeric).<br>- `$backtohome` - True to show back button.<br>- `$icon` - danger, cog, warning, info. |