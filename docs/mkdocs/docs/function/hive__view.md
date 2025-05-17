# Functions: `hive__view` 


## Function Overview

| Function             | Description                                                                                 | Parameters                                 |
|----------------------|---------------------------------------------------------------------------------------------|--------------------------------------------|
| `hive__view`         | Injects (includes) all site module and extension view files for a given view name.          | `$object` (array), `$view_name` (string)   |
| `hive__view_site`    | Injects (includes) only the site module view files for a given view name.                   | `$object` (array), `$view_name` (string)   |
| `hive__view_ext`     | Injects (includes) only the extension view files for a given view name.                     | `$object` (array), `$view_name` (string)   |


## Function Details

### `hive__view($object, $view_name)`
- **Purpose:**  
  Loads (requires) all view files for both site modules and their extensions, for the given view name.
- **How it works:**  
  - Loops through all site modules (`_HIVE_MODE_ARRAY_`), initializes their config, and requires the view file if it exists.
  - Then loops through all extension paths, initializes config and extension header, and requires the extension view file if present.

### `hive__view_site($object, $view_name)`
- **Purpose:**  
  Loads (requires) only the site module view files for the given view name.
- **How it works:**  
  - Loops through all site modules, initializes their config, and requires the view file if it exists.

### `hive__view_ext($object, $view_name)`
- **Purpose:**  
  Loads (requires) only the extension view files for the given view name.
- **How it works:**  
  - Loops through all extension paths, initializes config and extension header, and requires the extension view file if present.
