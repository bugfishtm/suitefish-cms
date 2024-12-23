# Website Module

## 🧩 **General Information**

This is a integrated website module example! This kind of website modules use the suitefish-cms as a platform to allow multi-site hosting with one instance!

## 🗂️ **Folder Structure**

Organize your site module extensions ZIP file as follows. Replace `RNAME` with your module name. See inside folders readme.md for some more information.

### _admin
Scripts to be injected into the _administrator module.

```
./RNAME/_admin/
├── mod_setting.php (Module Settings for Admin Module)
├── mod_nav.php (Module Navigation for Admin Module)
├── mod_site.php (Module Site for Admin Module)
├── mod_permission.php (Module Permissions for Admin Module)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
./RNAME/_admin/_lang/
├── de.php (Language to be injected for Admin Injection Scripts)
├── en.php (Language to be injected for Admin Injection Scripts)
├── es.php (Language to be injected for Admin Injection Scripts)
├── fr.php (Language to be injected for Admin Injection Scripts)
├── it.php (Language to be injected for Admin Injection Scripts)
├── ja.php (Language to be injected for Admin Injection Scripts)
├── zh.php (Language to be injected for Admin Injection Scripts)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _config
Configuration to be injected at site module initialization.

```
./RNAME/_config/
├── config_pre.php (Pre-startup configuration)
├── config_post.php (Post-startup configuration)
└── config.php (Main configuration file)
├── global_pre.php (Pre-startup Global configuration)
├── global_post.php (Post-startup Global configuration)
└── global.php (Main Global configuration file)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _cron
Store your code for cronjobs in this folder!

```
./RNAME/_cron/
├── cron.example.php (Example Cronjob File)
├── .. (Store your other integrated cronjobs here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _css
Store your css code in this folder!

```
./RNAME/_css/
├── css.example.php (Example CSS File)
├── .. (Store your other css files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _images
Preview images for the readme.md file.

```
./RNAME/_images/
├── ... (Content you may add)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _js
Store your js code in this folder!

```
./RNAME/_js/
├── js.example.php (Example JS File)
├── .. (Store your other js files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _lang
Language Translations for sites in this extensions _admin folder and multi-langual store.

```
./RNAME/_lang/
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

### _lib
Store your php code in this folder!

```
./RNAME/_lib/
├── lib.example.php (Example Library File)
├── .. (Store your other library files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _mysql
Store your mysql tables in this folder!

```
./RNAME/_mysql/
├── mysql.example.php (Example MySQL File for example table)
├── .. (Store your other mysql files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _theme
Theme files for your module.

```
./RNAME/_theme/
├── ... (Content you may add)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _update
Theme files for your module.

```
./RNAME/_update/
├── 200.php (Example Update File to update to Build 200 from previous versions)
├── ... (Other Update Files)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _wfc
Store your wfc php classes code in this folder!

```
./RNAME/_wfc/
├── wfc.example.php (Example WFC Library File)
├── .. (Store your other WFC library files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _worker
Store your runtime worker files in this folder! (For the Background Linux Worker)

```
./RNAME/_worker/
├── worker.example.php (Example runtime worker File)
├── .. (Store your other worker files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### Files
Files in the extensions root directory.
```
./RNAME/
├── changelog.php (Changelog info)
├── index.php (Prevent Directory Listing)
├── LICENSE.md (Extensions License)
└── preview.jpg (Preview image)
├── README.md (Extensions Readme)
├── load.php (Initial Loader file (index))
├── version.php (Versioning info)
```

## 📚 **Documentation**
Welcome to the Suitefish CMS documentation! Explore guides, examples, and best practices to get the most out of Suitefish CMS. Whether you're a developer or an admin, you'll find everything you need to get started here: [https://bugfishtm.github.io/suitefish-cms](https://bugfishtm.github.io/suitefish-cms).

🐟 Bugfish <3