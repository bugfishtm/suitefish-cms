# 📁 Data Folder

**Information:**  

✅ Included in backup functionality.  
✅ Files are not overwritten or deleted by updates.  
⚠️ Check the subfolders table to see which folders are publicly accessible.  
❌ Do not manually modify or edit files unless you are a developer.  

**Folder Description:**  

The _data folder stores dynamic data for site modules, including uploads and non-source code data. Subfolders are created based on module names in _site and are automatically recreated if deleted. This folder remains unaffected during upgrades. Publicly accessible files are marked as (public), while (hidden) files can only be accessed via endpoint scripts.

**Sub Folders:**  

| Folder Path                        | Description                          |
|------------------------------------|--------------------------------------|
| `./MODNAME/`                | Data Folder for Site Module 'MODNAME' (public)         |
| `./MODNAME/_css`            | CSS Files for Auto-Loadup (hidden)          |
| `./MODNAME/_docker`         | Active Docker Templates (hidden)            |
| `./MODNAME/_docker-tpl`     | Docker Template Storage (hidden)            |
| `./MODNAME/_extension`      | Active Extensions Folder (public)           |
| `./MODNAME/_extension-disabled` | Disabled Extensions Folder (hidden)         |
| `./MODNAME/_extension-private`  | Restricted Extensions Data (hidden)         |
| `./MODNAME/_extension-public`   | Public Extensions Data  (public)            |
| `./MODNAME/_meta`           | Public Meta Images  (public)                |
| `./MODNAME/_php`            | Public Executable PHP Scripts (hidden)      |
| `./MODNAME/_private`        | Restricted Files (hidden)                   |
| `./MODNAME/_public`         | Public Files (public)                       |
| `./MODNAME/_theme`          | Active Theme Modules (public)               |
| `./MODNAME/_theme/__disabled` | Inactive Theme Modules (hidden)             |

**Documentation:**  

Most documentation for front-end users is located within the Administrator Module across various sections. Developers can access documentation at https://bugfishtm.github.io/suitefish-cms.

🐟 Bugfish
