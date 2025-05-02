# Table: `cms_store`

The `cms_store` table is designed to store metadata and descriptive information about all modules, extensions, and software releases available to the CMS. Each row represents a single module or release, including its identity, versioning, authorship, licensing, and additional data.

## **Table Structure**

| Column Name         | Type         | Description                                                                                           |
|---------------------|--------------|-------------------------------------------------------------------------------------------------------|
| `id`                | int(11)      | **Primary Key.** Unique auto-incremented identifier for each module or release.                       |
| `mod_rname`         | varchar(128) | **Module Identifier.** Unique technical name for the module.                                          |
| `mod_lang`          | TEXT         | **Language Keys.** Serialized array of language keys for the module.                                  |
| `mod_build`         | int(9)       | **Build Number.** Numeric build identifier for the module.                                            |
| `mod_version`       | varchar(26)  | **Version.** Human-readable version string (e.g., `1.0.0`).                                           |
| `mod_name`          | varchar(128) | **Name.** Display name of the module.                                                                 |
| `mod_description`   | TEXT         | **Description.** Textual description of the module's functionality.                                   |
| `mod_parent_rname`  | varchar(20)  | **Parent Module Identifier.** If extension, the parent module’s identifier (serialized array format). |
| `mod_type`          | int(9)       | **Type.** Numeric type/category code for the module.                                                  |
| `mod_singleinstance`| int(1)       | **Single Instance?** `1` if only one instance allowed, `0` otherwise.                                 |
| `mod_license`       | varchar(16)  | **License.** License type (e.g., MIT, GPL).                                                          |
| `mod_author`        | varchar(128) | **Author.** Name of the module creator.                                                               |
| `mod_mail`          | varchar(128) | **Author Email.** Contact email for the module creator.                                               |
| `mod_website`       | varchar(128) | **Author Website.** Website of the module creator.                                                    |
| `mod_docs`          | varchar(128) | **Documentation URL.** Link to module documentation.                                                  |
| `mod_video`         | varchar(128) | **Video URL.** Link to module video documentation/tutorial.                                           |
| `mod_github`        | varchar(128) | **GitHub URL.** Link to the module’s GitHub repository.                                               |
| `mod_data`          | LONGTEXT     | **Additional Data.** Arbitrary extra data for the module.                                             |
| `mod_data_lang`     | LONGTEXT     | **Language Data.** Extra language-specific data.                                                      |
| `mod_changelog`     | LONGTEXT     | **Changelog.** HTML-formatted changelog for the module.                                               |
| `mod_is_module`     | int(1)       | **Is Module?** `1` if this entry is a CMS module, `0` otherwise.                                      |
| `mod_is_software`   | int(1)       | **Is Software?** `1` if this entry is a software release, `0` otherwise.                              |
| `mod_is_cms`        | int(1)       | **Is CMS?** `1` if this entry is a CMS release, `0` otherwise.                                        |
| `creation`          | datetime     | **Created At.** Timestamp when the row was created.                                                   |
| `modification`      | datetime     | **Modified At.** Timestamp automatically updated on modification.                                      |

**Unique Key:**  
- `mod_version`, `mod_build`, and `mod_rname` together must be unique for each entry.

---

## **Usage Notes**

- **Purpose:**  
  This table acts as a registry for all modules, extensions, and software releases that can be installed or managed by the CMS.

- **Versioning:**  
  The combination of `mod_version`, `mod_build`, and `mod_rname` ensures that each release of a module is uniquely identifiable.

- **Authorship & Licensing:**  
  Fields like `mod_author`, `mod_license`, `mod_mail`, and `mod_website` provide attribution and contact information.

- **Documentation & Source:**  
  Links to documentation, video tutorials, and source code repositories are stored for easy reference.

- **Type Flags:**  
  The boolean flags (`mod_is_module`, `mod_is_software`, `mod_is_cms`) indicate the nature of the entry.

- **Extensibility:**  
  The `mod_data` and `mod_data_lang` fields allow for storing additional, possibly serialized, data for advanced features or localization.
