# 📁 Site Modules Folder

**Information:**  

✅ Included in backup functionality.  
✅ Files are not overwritten or deleted by updates.  
✅ Files in this folder are accessible via public links.   
❌ Do not manually modify or edit files unless you are a developer.  
❌ Files in the '__disabled' folder are not accessible via public links.  

**Folder Description:**  

This folder stores deployed site modules that are currently active, while the __disabled folder contains inactive modules. The version.php 'rname' value in the file inside a modules folder serves as a unique identifier for the store and backend to manage the module. The folder name where the module is deployed corresponds to the current \_HIVE_MODE\_.

**Sub Folders:**  

| Folder Path                        | Description                          |
|------------------------------------|--------------------------------------|
| `./__disabled`| Folder for inactive Site Modules. Modules placed here are recognized as inactive and handled accordingly. |
| `./_administrator`| Default Suitefish Administrator Site Module. |

**Documentation:**  

Most documentation for front-end users is located within the Administrator Module across various sections. Developers can access documentation at https://bugfishtm.github.io/suitefish-cms.

🐟 Bugfish
