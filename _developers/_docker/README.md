# Template: Docker Module

🧩 General Information

Docker Module Example for the Docker Server Manager Extension for our administrator module, especially for Developers. You can get more Information about Docker Modules inside the Suitefish Documentation and related Readme.md Files in the repository!

🗂️ Folder Structure

Preview images for the readme.md file.

```
./_docker/_images/
├── ... (Content you may add)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

Language Translations for substitution keys and multi-langual store.

```
./_docker/_lang/
├── de.php (Translation File for German)
├── en.php (Translation File for English)
├── es.php (Translation File for Spanish)
├── fr.php (Translation File for French)
├── it.php (Translation File for Italian)
├── ja.php (Translation File for Japanese)
├── zh.php (Translation File for Chinese)
├── ... (Other language Files you may add)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

Store your external licenses in this folder!

```
./_docker/_licenses/
├── example.lic (Example License File)
├── .. (Store your other License files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

Files in the extensions root directory.

```
./_docker/
├── [FOLDERS] (You can add various folders and refer to them in your dockerfile or compose file.)
├── .env.php (Environment Variables with Substitutions)
├── changelog.php (Changelog info)
├── docker-compose.yml (Docker Compose File with Substitutions)
├── Dockerfile (Docker File if Required)
├── index.php (Prevent Directory Listing)
├── LICENSE.md (Extensions License)
└── preview.jpg (Preview image)
├── README.md (Extensions Readme)
├── version.php (Versioning info)
```

📜 License Information

See the included License.md file for information about this projects license.

🐟 Bugfish