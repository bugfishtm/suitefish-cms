# Table: `cms_worker`

The `cms_worker` table manages the scheduling, execution, and tracking of background worker scripts in the CMS. Each row represents a worker task, including its script details, execution status, and metadata.

## **Table Structure**

| Column Name         | Type         | Description                                                                                      |
|---------------------|--------------|--------------------------------------------------------------------------------------------------|
| `id`                | int(11)      | **Primary Key.** Unique auto-incremented identifier for each worker task.                        |
| `script_execution`  | TEXT         | **Script Name/Path.** The filename or path of the script to execute (e.g., `worker.example.sh`). |
| `script_type`       | varchar(12)  | **Script Type.** The language/type of the script (e.g., `sh`, `php`, `bash`).                    |
| `script_parameters` | LONGTEXT     | **Parameters.** Optional parameters to pass to the script during execution.                      |
| `script_executed`   | int(1)       | **Execution Status:**0 = Waiting1 = Executed2 = Error3 = Success                 |
| `script_pid`        | TEXT         | **Process ID.** Stores the process ID if the script runs as a separate process.                  |
| `site_extension`    | varchar(32)  | **Extension Name.** Optional. Indicates the site extension providing the worker script.          |
| `site_module`       | varchar(32)  | **Module Name.** Optional. Indicates the site module associated with the worker script.          |
| `script_data`       | LONGTEXT     | **Custom Data.** Optional field for extensions or modules to store additional data.              |
| `creation`          | datetime     | **Creation Timestamp.** Automatically set when the row is created.                               |
| `modification`      | datetime     | **Modification Timestamp.** Automatically updated on row modification.                           |

---

## **Usage Notes**

- **Purpose:**  
  This table is designed to queue and track the execution of background scripts (workers) for various CMS tasks, such as scheduled jobs, extension operations, or module processes.

- **Script Types:**  
  The `script_type` field allows the system to determine how to execute the script (e.g., via shell, PHP, or Bash interpreter).

- **Execution Status:**  
  The `script_executed` field is used to track the current state of the worker:
  - `0` = Waiting (not yet executed)
  - `1` = Executed (attempted execution)
  - `2` = Error (script failed)
  - `3` = Success (script completed successfully)

- **Parameters and Data:**  
  The `script_parameters` and `script_data` fields allow for flexible passing of arguments and custom information to the scripts and extensions.

- **Extensions and Modules:**  
  The `site_extension` and `site_module` fields provide context for scripts originating from specific CMS extensions or modules.

- **Timestamps:**  
  The `creation` and `modification` fields are automatically managed to record when each worker entry is created or updated.


