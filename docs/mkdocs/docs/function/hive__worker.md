# Functions: `hive__worker` 

## Function Overview

| Function                | Description                                                                                   | Parameters                                                                                                                                                                                                                                                                         | Key Behaviors / Notes                                                                                                   |
|-------------------------|-----------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------|
| `hive__worker_php`      | Registers a PHP worker task in the database for asynchronous/background execution.            | `$object` (array/object): Context with DB`$hive_mode` (string): Site module`$script_name` (string): Script to run`$extension_mod` (string/bool): Extension module (optional)`$parameters` (array/string/bool): JSON params`$custom_data` (array/string/bool): Extra data | - Validates/cleans all inputs- Converts arrays to JSON/serialized- Inserts task with type `php` into DB- Returns new task ID |
| `hive__worker_sh`       | Registers a Shell (`.sh`) worker task in the database for asynchronous/background execution.  | Same as above, but task type is `sh`                                                                                                                                                                                                                                               | - Same as above, but sets `script_type` to `sh`                                                                         |
| `hive__worker_bash`     | Registers a Bash worker task in the database for asynchronous/background execution.           | Same as above, but task type is `bash`                                                                                                                                                                                                                                             | - Same as above, but sets `script_type` to `bash`                                                                       |

## Function Details

### Common Logic (All Functions)
- **Purpose:**  
  Queue a script (PHP, SH, or Bash) for execution by inserting a row into a worker table.
- **Parameters:**  
  - **$object:** Must contain a `mysql` object for DB access.
  - **$hive_mode:** The site module context for the task.
  - **$script_name:** The script to execute.
  - **$extension_mod:** (Optional) Extension module name.
  - **$parameters:** (Optional) Parameters for the script (array or JSON string).
  - **$custom_data:** (Optional) Additional data (array or serialized string).
- **Behavior:**  
  - Validates and sanitizes all inputs using `hive__trim` and `basename`.
  - Converts arrays to JSON (for parameters) or serialized string (for custom data).
  - Validates JSON if parameters are provided.
  - Inserts a new row into the worker table with the correct script type (`php`, `sh`, or `bash`).
  - Returns the insert ID of the new task.

### Differences
- **`hive__worker_php`:**  
  Sets `script_type` to `'php'` in the database.
- **`hive__worker_sh`:**  
  Sets `script_type` to `'sh'` in the database.
- **`hive__worker_bash`:**  
  Sets `script_type` to `'bash'` in the database.
