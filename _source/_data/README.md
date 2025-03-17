# 📁 Dynamic Data Folder

✅ Folder included in Backups  
✅ Modified files in this folder will not be overwritten by updates/upgrades.  
❌ Do not manually modify or add/edit files in this folder.  

The _data folder stores dynamic data for site modules, including uploads and non-source code data. Subfolders match module names in _site. It's recreated if deleted and remains untouched during upgrades. The /_developers folder in the repository shows examples of module data structures.

This folder stores data and extensions for site modules. Subfolders are created based on the deployed site module's folder name.

**Sub Folders:**  
Here you can see the default structure for the administrator interface.

- ./_administrator/_css: CSS Files for Auto-Loadup
- ./_administrator/_docker: Active Docker Templates
- ./_administrator/_docker-tpl: Docker Template Storage
- ./_administrator/_extension: Active Extensions Folder
- ./_administrator/_extension-disabled: Disabled Extensions Folder
- ./_administrator/_extension-private: Restricted Extensions Data
- ./_administrator/_extension-public: Public Extensions Data
- ./_administrator/_meta: Public Meta Images
- ./_administrator/_php: Public Executable PHP Scripts
- ./_administrator/_private: Restricted Files
- ./_administrator/_public: Public Files
- ./_administrator/_theme: Active Theme Modules
- ./_administrator/_theme/__disabled:Inactive Theme Modules

🐟 Bugfish
