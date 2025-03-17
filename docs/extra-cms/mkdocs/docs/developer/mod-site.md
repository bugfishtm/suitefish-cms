# Website Modules

## General Information

This is a integrated website module example! This kind of website modules use the suitefish-cms as a platform to allow multi-site hosting with one instance!

## Folder Structure

Scripts to be injected into the _administrator module.

```
./_site/_admin/
├── mod_setting.php (Module Settings for Admin Module)
├── mod_nav.php (Module Navigation for Admin Module)
├── mod_site.php (Module Site for Admin Module)
├── mod_permission.php (Module Permissions for Admin Module)
├── mod_topbar.php (Topbar Injections for Admin Module)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
./_site/_admin/_lang/
├── de.php (Language to be injected for Admin Injection Scripts)
├── en.php (Language to be injected for Admin Injection Scripts)
├── es.php (Language to be injected for Admin Injection Scripts)
├── fr.php (Language to be injected for Admin Injection Scripts)
├── it.php (Language to be injected for Admin Injection Scripts)
├── ja.php (Language to be injected for Admin Injection Scripts)
├── zh.php (Language to be injected for Admin Injection Scripts)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
./_site/_admin/_view/
├── view.NAME.php (View Injection)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
./_site/_admin/_trigger/
├── trigger.NAME.php (View Injection)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
./_site/_admin/_wfc/
├── wfc.NAME.php (View Injection)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

API Includes for general CMS Api Interface.

```
./_site/_api/
├── api.XXXXX.php (API Script to be fetched by Action Name)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```


Configuration to be injected at site module initialization.

```
./_site/_config/
├── config_pre.php (Pre-startup configuration)
├── config_post.php (Post-startup configuration)
└── config.php (Main configuration file)
├── global_pre.php (Pre-startup Global configuration)
├── global_post.php (Post-startup Global configuration)
└── global.php (Main Global configuration file)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

Store your code for cronjobs in this folder!

```
./_site/_cron/
├── cron.example.php (Example Cronjob File)
├── .. (Store your other integrated cronjobs here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

Store your css code in this folder!

```
./_site/_css/
├── css.example.php (Example CSS File)
├── .. (Store your other css files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

Preview images for the readme.md file.

```
./_site/_images/
├── ... (Content you may add)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

Store your js code in this folder!

```
./_site/_js/
├── js.example.php (Example JS File)
├── .. (Store your other js files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

Language Translations for sites in this extensions _admin folder and multi-langual store.

```
./_site/_lang/
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

Store your php code in this folder!

```
./_site/_lib/
├── lib.example.php (Example Library File)
├── .. (Store your other library files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

Store your external licenses in this folder!

```
./_site/_licenses/
├── example.lic (Example License File)
├── .. (Store your other License files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

Store your mysql tables in this folder!

```
./_site/_mysql/
├── mysql.example.php (Example MySQL File for example table)
├── .. (Store your other mysql files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

Theme files for your module.

```
./_site/_theme/
├── ... (Content you may add)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

Theme files for your module.

```
./_site/_update/
├── 200.php (Example Update File to update to Build 200 from previous versions)
├── ... (Other Update Files)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

Store your runtime worker files in this folder! (For the Background Linux Worker)

```
./_site/_worker/
├── worker.example.php (Example runtime worker File [other types possible])
├── .. (Store your other worker files here.)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

Files in the extensions root directory.

```
./_site/
├── changelog.php (Changelog info)
├── index.php (Prevent Directory Listing)
├── LICENSE.md (Extensions License)
└── preview.jpg (Preview image)
├── README.md (Extensions Readme)
├── load.php (Initial Loader file (index))
├── version.php (Versioning info)
```