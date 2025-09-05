# Core-System - MySQL Tables

Information about included mysql core tables.

---

## cms_worker 

Here is the documentation for the MySQL table `"._HIVE_PREFIX_."cms_worker` presented in a markdown table format explaining each column and key:

| **Column Name**       | **Data Type**         | **Default / Extra**                   | **Description**                                                                                     |
|-----------------------|----------------------|-------------------------------------|---------------------------------------------------------------------------------------------------|
| `id`                  | `int(11)`            | `NOT NULL AUTO_INCREMENT`            | Primary key. Unique identifier for each worker job entry.                                         |
| `script_execution`     | `TEXT`               | `DEFAULT NULL`                      | Name of the script to execute, e.g., `worker.*.php`, `worker.*.sh`, `worker.*.bash`.               |
| `script_type`          | `varchar(12)`        | `DEFAULT NULL`                      | Type of the script (`sh`, `php`, `py`, `pl`, or `bash`).                                          |
| `script_parameters`    | `LONGTEXT`           | `DEFAULT NULL`                      | JSON or text parameters to send to the script at execution (optional).                            |
| `script_executed`      | `int(1)`             | `DEFAULT 0`                        | Status of script execution: `0` = Waiting, `1` = Executed, `2` = Error, `3` = Success.             |
| `script_pid`           | `TEXT`               | `DEFAULT NULL`                      | Process ID of the running script (if applicable, e.g., for long-running processes).               |
| `site_extension`       | `varchar(128)`       | `DEFAULT NULL`                      | Name of the site extension if the worker script belongs to one (optional).                        |
| `site_module`          | `varchar(128)`       | `DEFAULT NULL`                      | Name of the site module from which the script is included.                                        |
| `script_data`          | `LONGTEXT`           | `DEFAULT NULL`                      | Custom data field available for extensions to use (optional).                                     |
| `creation`             | `datetime`           | `DEFAULT current_timestamp()`       | Timestamp of when the worker job was created (automatic).                                        |
| `modification`         | `datetime`           | `DEFAULT current_timestamp() ON UPDATE current_timestamp()` | Timestamp of the last modification to the worker job entry (auto-updates).                       |

| **Keys**               | **Type**             | **Columns**                        | **Description**                                                                                     |
|-----------------------|----------------------|----------------------------------|---------------------------------------------------------------------------------------------------|
| `PRIMARY KEY`           | `BTREE`              | `id`                             | Primary key index on the `id` column for fast lookup and uniqueness enforcement.                   |

This table stores the details and status of worker jobs/scripts that are run asynchronously in the system. It tracks the script names, types, parameters, execution status, and related module/extension associations along with timestamps for creation and last modification.

----

## cms_store 

Here is a markdown table explaining the MySQL table `"._HIVE_PREFIX_."cms_store` with its columns and keys:

| Column Name           | Data Type      | Default / Extra                                   | Description                                                                                         |
|-----------------------|----------------|-------------------------------------------------|-----------------------------------------------------------------------------------------------------|
| `id`                  | int(11)        | NOT NULL AUTO_INCREMENT                          | Primary key, unique ID of the module record                                                         |
| `mod_rname`           | varchar(128)   | DEFAULT NULL                                    | Unique module identifier name                                                                       |
| `mod_lang`            | TEXT           | DEFAULT NULL                                    | Serialized array of language keys related to the module                                            |
| `mod_build`           | int(9)         | DEFAULT NULL                                    | Build number/version build of the module                                                           |
| `mod_version`         | varchar(26)    | DEFAULT NULL                                    | Version string of the module                                                                        |
| `mod_name`            | varchar(128)   | DEFAULT NULL                                    | Human-readable name of the module                                                                   |
| `mod_description`     | TEXT           | DEFAULT NULL                                    | Description of the module                                                                           |
| `mod_parent_rname`    | varchar(20)    | DEFAULT NULL                                    | If the module is an extension, serialized name of parent module                                    |
| `mod_type`            | int(9)         | DEFAULT NULL                                    | Site module type (e.g., CMS module, software, etc.)                                                |
| `mod_singleinstance`  | int(1)         | DEFAULT 0                                       | Indicates if the module is single instance (1 = yes, 0 = no)                                       |
| `mod_license`         | varchar(16)    | DEFAULT NULL                                    | License type of the module                                                                          |
| `mod_author`          | varchar(128)   | DEFAULT NULL                                    | Author or creator of the module                                                                    |
| `mod_mail`            | varchar(128)   | DEFAULT NULL                                    | Contact email for the module author                                                                |
| `mod_website`         | varchar(128)   | DEFAULT NULL                                    | Website of the module author                                                                       |
| `mod_docs`            | varchar(128)   | DEFAULT NULL                                    | URL for module documentation                                                                        |
| `mod_video`           | varchar(128)   | DEFAULT NULL                                    | URL for video documentation related to the module                                                  |
| `mod_github`          | varchar(128)   | DEFAULT NULL                                    | GitHub repository URL of the module                                                                |
| `mod_image`           | LONGTEXT       | DEFAULT NULL                                    | Stored image code or data representing the module                                                  |
| `mod_data`            | LONGTEXT       | DEFAULT NULL                                    | Additional serialized or structured module data                                                    |
| `mod_data_lang`       | LONGTEXT       | DEFAULT NULL                                    | Additional language-specific data for the module                                                   |
| `mod_changelog`       | LONGTEXT       | DEFAULT NULL                                    | Changelog of the module, stored in HTML format                                                     |
| `mod_is_module`       | int(1)         | DEFAULT 0                                       | Flag indicating if the entry is a CMS module (1 = yes)                                            |
| `mod_is_software`     | int(1)         | DEFAULT 0                                       | Flag indicating if the entry is a software release (1 = yes)                                      |
| `mod_is_cms`          | int(1)         | DEFAULT 0                                       | Flag indicating if the entry is a CMS release (1 = yes)                                           |
| `creation`            | datetime       | DEFAULT current_timestamp()                      | Timestamp for record creation                                                                      |
| `modification`        | datetime       | DEFAULT current_timestamp() ON UPDATE current_timestamp() | Timestamp for last modification, updated automatically                                              |

| Key Name                                                       | Type   | Columns                        | Description                                                           |
|----------------------------------------------------------------|--------|--------------------------------|-----------------------------------------------------------------------|
| PRIMARY KEY                                                     | BTREE  | `id`                          | Primary key on the unique ID column                                   |
| UNIQUE KEY `sf_unique_"._HIVE_PREFIX_."cms_store`              | UNIQUE | `mod_version`, `mod_build`, `mod_rname` | Unique constraint on the combination of module version, build, and name |

This table is used to store detailed metadata about software or CMS modules, including version, build, language info, author details, documentation links, and classification flags.