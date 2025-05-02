# Functions: `hive__trigger` 

## Function Overview

| Function                   | Description                                                                                             | Parameters                                 |
|----------------------------|---------------------------------------------------------------------------------------------------------|--------------------------------------------|
| `hive__trigger`            | Executes both site module and extension triggers for a given trigger name.                             | `$object` (array), `$trigger_name` (string)|
| `hive__trigger_site`       | Executes only site module triggers for a given trigger name.                                           | `$object` (array), `$trigger_name` (string)|
| `hive__trigger_ext`        | Executes only extension triggers for the current site module and trigger name.                         | `$object` (array), `$trigger_name` (string)|

## Function Details

### `hive__trigger($object, $trigger_name)`
- **Purpose:** Runs trigger scripts for all site modules and their extensions, based on the provided trigger name.
- **How it works:**  
  - Loops through all site modules (`_HIVE_MODE_ARRAY_`), initializing their config and requiring the relevant trigger file if it exists.
  - Then, if `_HIVE_MODE_` is defined and not empty, loops through all extension paths, initializes config and extension header, and requires the extension trigger file if present.

### `hive__trigger_site($object, $trigger_name)`
- **Purpose:** Runs only the site module trigger scripts for the given trigger name.
- **How it works:**  
  - Loops through all site modules, initializes their config, and requires the relevant trigger file if it exists.

### `hive__trigger_ext($object, $trigger_name)`
- **Purpose:** Runs only the extension trigger scripts for the current site module and trigger name.
- **How it works:**  
  - If `_HIVE_MODE_` is defined and not empty, loops through all extension paths, initializes config and extension header, and requires the extension trigger file if present.
