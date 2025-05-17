# Functions: `hive__default` 

## Function Overview

| Function                        | Description                                                                                                       | Parameters                                                                                                                                                                                                                                      | Key Behaviors / Notes                                                                                                   |
|----------------------------------|-------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------|
| `hive__default_volt_header`      | Outputs the HTML `` and opening `` for the page, including meta tags, CSS/JS, and theme/session logic | `$object` (array/object): Context`$tabtitle` (string): Page title`$metaextensions` (string): Extra meta/CSS/JS`$theme_default` (string): Default theme`$mainclass` (string): Body class`$defaultclasses` (bool): Load defaults`$iconimage` (string): Favicon`$excludecore` (bool): Skip core CSS/JS | - Sets up session theme- Outputs meta tags, favicon, title, and includes CSS/JS- Allows extension/meta injection |
| `hive__default_volt_footer`      | Outputs the closing tags for the main content, an optional styled footer, and closes the HTML document            | `$object` (array/object): Context`$footer` (string): Footer content`$classes` (string): Footer CSS classes`$end_div` (bool): Close main ``                                                                                   | - Optionally closes a div- Outputs a styled footer if provided- Ends ``, ``, and ``         |


## Function Details

### `hive__default_volt_header`
- **Purpose:**  
  Sets up the page's HTML header, meta tags, favicon, title, and includes default CSS/JS libraries.  
  Also handles theme settings via session and allows injecting custom meta/extensions.
- **Key Features:**  
  - Handles session theme logic based on user and default.
  - Outputs all standard meta tags (charset, viewport, robots, etc.).
  - Sets favicon and title (with optional spacer and site title).
  - Optionally loads a large set of default CSS/JS libraries (Volt, jQuery, Bootstrap, etc.).
  - Allows injecting additional meta/extensions via `$metaextensions`.
  - Optionally excludes core CSS/JS if `$excludecore` is true.
  - Opens `` with custom classes.

### `hive__default_volt_footer`
- **Purpose:**  
  Outputs the closing structure of the page, including an optional styled footer and closing tags.
- **Key Features:**  
  - Optionally closes a previously opened ``.
  - Outputs a `` with custom classes and content if provided.
  - Closes the main content and ends the HTML document.

