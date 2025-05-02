# 📦 Extension Module

## 📙 Information 

Extension Module Example for the Administrator module, especially for Developers. You can get more Information about Extension Modules inside the Suitefish Documentation and related Readme.md Files in the repository!

For possibilities on triggers and more take a look at trigger and view files at the official administrator module.

## 📄 Documentation 

If you are a developer you can find examples of modules in the _developers folder at the suitefish-cms github repository if you want to create an own module!

For more information about the Suitefish CMS: https://github.com/bugfishtm/suitefish-cms

## 🛠️ Installation

You have two ways installing this module.

### Module Store

Login to your suitefish instance and browse our official store on your page. If you find the module you are looking for just download the package. Then navigate to the Extension Package Area and enable the downloaded extension.

### Upload to CMS

Navigate to the Extension Package Area inside the suitefish instance. Go to the upload section and upload the modules .zip file.  Then navigate to the Extension Package Area and enable the downloaded extension.

## 📁 Structure 

### ./_action

Store your action files in this folder!

```
./MODULE_NAME/_action/
├── action.ACTIONNAME.php (Action ACTIONNAME)
├── ... (Other action Files you may add)
├── index.php (Prevent Directory Listing)
```

### ./_admin

Scripts to be injected into the _administrator module.

```
./MODULE_NAME/_admin/
├── mod_setting.php (Module Settings for Admin Module)
├── mod_nav.php (Module Navigation for Admin Module)
├── mod_site.php (Module Site for Admin Module)
├── mod_permission.php (Module Permissions for Admin Module)
├── mod_topbar.php (Module Topbar Injection for Admin Module)
├── index.php (Prevent Directory Listing)
```

### ./_api

Store your api files in this folder!

```
./MODULE_NAME/_api/
├── api.NAME.php (API Route File for NAME)
├── ... (Other action Files you may add)
├── index.php (Prevent Directory Listing)
```

### ./_config

Configuration to be injected at site module initialization.

```
./MODULE_NAME/_config/
├── config_pre.php (Pre-startup configuration)
├── config_post.php (Post-startup configuration)
└── config.php (Main configuration file)
├── index.php (Prevent Directory Listing)
```

### ./_cron

Store your code for cronjobs in this folder!

```
./MODULE_NAME/_cron/
├── cron.example.php (Example Cronjob File)
├── .. (Store your other integrated cronjobs here.)
├── index.php (Prevent Directory Listing)
```

### ./_css

Store your css code in this folder!

```
./MODULE_NAME/_css/
├── css.example.php (Example CSS File)
├── .. (Store your other css files here.)
├── index.php (Prevent Directory Listing)
```

### ./_html

Store your html template code in this folder!

```
./MODULE_NAME/_html/
├── .. (Store your files here.)
├── index.php (Prevent Directory Listing)
```

### ./_js

Store your js code in this folder!

```
./MODULE_NAME/_js/
├── js.example.php (Example JS File)
├── .. (Store your other js files here.)
├── index.php (Prevent Directory Listing)
```

### ./_lang

Store your language files in this folder!

```
./MODULE_NAME/_lang/
├── de.php (Translation File for German)
├── en.php (Translation File for English)
├── es.php (Translation File for Spanish)
├── fr.php (Translation File for French)
├── in.php (Translation File for Hindu)
├── it.php (Translation File for Italian)
├── ja.php (Translation File for Japanese)
├── kr.php (Translation File for Korean)
├── pt.php (Translation File for Portuguese)
├── ru.php (Translation File for Russian)
├── tr.php (Translation File for Turkish)
├── zh.php (Translation File for Chinese)
├── ... (Other language Files you may add)
├── index.php (Prevent Directory Listing)
```

### ./_lib

Store your php libraries in this folder!

```
./MODULE_NAME/_lib/
├── lib.example.php (Example Library File)
├── .. (Store your other library files here.)
├── index.php (Prevent Directory Listing)
```

### ./_licenses

Store your external licenses in this folder!

```
./MODULE_NAME/_licenses/
├── example.lic (Example License File)
├── .. (Store your other License files here.)
├── index.php (Prevent Directory Listing)
```

### ./_mysql

Store your mysql tables in this folder!

```
./MODULE_NAME/_mysql/
├── mysql.example.php (Example MySQL File for example table)
├── .. (Store your other mysql files here.)
├── index.php (Prevent Directory Listing)
```

### ./_runtime

Store your runtime files in this folder! (For the Background Linux Worker)

```
./MODULE_NAME/_runtime/
├── run.example.php (Example runtime File)
├── .. (Store your other runtime files here.)
├── index.php (Prevent Directory Listing)
```

### ./_theme

Theme files for your module.

```
./MODULE_NAME/_theme/
├── ... (Content you may add)
├── index.php (Prevent Directory Listing)
```

### ./_trigger

Folder for Trigger files.

```
./MODULE_NAME/_trigger/
├── trigger.TRIGGERNAME.php (Example Trigger File for Trigger: TRIGGERNAME)
├── ... (Other Trigger Files)
├── index.php (Prevent Directory Listing)
```

### ./_update

Theme files for your module.

```
./MODULE_NAME/_update/
├── 100.php (Example Update File to update to Build 100 from previous versions)
├── ... (Other Update Files)
├── index.php (Prevent Directory Listing)
```

### ./_vendor

Vendor Libraries files for your module.

```
./MODULE_NAME/_vendor/
├── ... (Vendor Libraries Files)
├── index.php (Prevent Directory Listing)
```

### ./_view

View Injections in this folder.

```
./MODULE_NAME/_view/
├── view.example.php (Example View Library File)
├── .. (Store your other WFC library files here.)
├── index.php (Prevent Directory Listing)
```

### ./_wfc

Wfc php classes code in this folder!

```
./MODULE_NAME/_wfc/
├── wfc.example.php (Example WFC Library File)
├── .. (Store your other WFC library files here.)
├── index.php (Prevent Directory Listing)
```

### ./_worker

Store your runtime worker files in this folder! (For the Background Linux Worker)

```
./MODULE_NAME/_worker/
├── worker.example.php (Example runtime worker File)
├── .. (Store your other worker files here.)
├── index.php (Prevent Directory Listing)
```

### ./

Files in the extensions root directory.

```
./MODULE_NAME/
├── changelog.php (Changelog info)
├── index.php (Prevent Directory Listing)
├── LICENSE.md (Extensions License)
└── preview.jpg (Preview image)
├── README.md (Extensions Readme)
├── version.php (Versioning info)
```

## 📊 Initialization

Inside included extension files you have access to special variables in the object array containing language and extension information.

You can access this array keys at: `$object["extension"]["info"]` for example. 

| **Key**               | **Description**                                                                                         |
|-----------------------|---------------------------------------------------------------------------------------------------------|
| `info`                | Full version.php x array of current extension. |
| `path`                | Full Path to the extensions directory. |
| `name`                | Name of the Extension.|
| `prefix`              | Prefix for MySQL and Redis. |
| `cookie`              | Prefix for cookies and sessions. |
| `prefix_variables`    | Prefix for variables and permissions.        |
| `lang`                | Language object with loaded extension language file. |

## 🗣️ Language Files 

Below you see an example of an english language file (en.php). The first lines prevent public view of the language file. The variables for translations are for the store to make name and description multi-langual.

``` 
<?php if(isset($this)) { if(!is_object($this)) { Header("Location: ../"); exit(); } } else { Header("Location: ../"); exit(); } ?>

store_version_name=Template: Theme Module
store_version_description=This example Theme demonstrates the functioning of Theme Module extensions within this CMS. It includes readme files explaining the use of various folders and provides a skeleton template for creating your own Theme modules.
``` 

## ⚙️ Default Files

Suitefish-CMS Modules expect some default files to be in place in modules. Here you can see which files are mandatory.

### version.php

This file contains detailed information about the module, all variables are mandatory and should be set on a module.

**Initialize Variable Array**

``` 
$x = array();
``` 

**Module Details**

``` 
// Unique Module ID
// - This is a unique id for your module
// - If you want your module in the public store contact the developers to get your unique module id.
// - Request unique module id for official publication at requestid@suitefish.com
// - If you do not have a registered unique module id start your rname with "xxx"
// - Use maximum of 15 signs
// - No special chars, only a-Z
// - No numeric chars
// - Underscore (_) prefix is dedicated to suitefish official releases
// - This variable is mandatory
$x["rname"] 		= "_extension";
// Available Languages 
// - Short Codes of available languages in PHP Array
// - This variable is mandatory
$x["lang"] 			= array("en", "de", "fr", "it", "es", "zh", "ja", "in", "kr", "pt", "ru", "tr");
// Build Number:
// - Do only use integer values here
// - Will extend the version number
// - Do not use special chars, not even dots
// - This variable is mandatory
$x["build"] 		= "100";
// Module Version
// - Always add the build number at the end, seperated by a dot (.)
// - Define the main Version number if the module.
// - This variable is mandatory
$x["version"] 		= "1.10.".$x["build"];
// Module Name 
// - Define the Title of the Module displayed in different frontpage areas.
// - Only text, no html codes
// - This variable is mandatory
$x["name"] 			= "Template: Extension Module";
// Module Description 
// - Define the Description of the Module displayed in different frontpage areas.
// - Only text and simple html codes (like br, li, table)
// - Do not use style, script or other kind of complex tags
// - This variable is mandatory
$x["description"] = "Extension Module Example for the Administrator module, especially for Developers. You can get more Information about Extension Modules inside the Suitefish Documentation and related Readme.md Files in the repository!";
// Module Type
// - There are different Types of Modules inside Suitefish CMS
// - The set ID 2 is dedicated to extension modules and will than be recognized as one.
// - Other possible values: 1 - Site | 2 - Extension | 3 - Image | 4 - Windows | 5 - Docker | 6 - Theme
// - This variable is mandatory
$x["type"] 			= 2;
// Minimal CMS Version to run this module
// - Define the minimal version of CMS required to run this module.
// - This variable is mandatory
$x["cms_version_min"] 		= "7.10.100";
``` 

**Module Author**

``` 
// Module License (gplv3, gplv2, mit, bsd, bsd2, ...) (can be false)
$x["license"] 		= "gplv3";
// Module Author Name (can be false)
$x["author"] 		= "Suitefish";
// Module Author Mail (can be false)
$x["mail"] 			= false;
// Module Author Website (can be false)
$x["website"] 		= "https://www.suitefish.com";
// Module Documentation Website (can be false)
$x["documentation"] = "https://bugfishtm.github.io/suitefish-cms/";	
// Module Github Website (can be false)
$x["github"] 		= "https://github.com/bugfishtm/suitefish-cms";	
// Module Video URL (a video about the module if exists, can be false)
$x["video"] 		= false;		
``` 

**Extension Specific**

``` 
// Does this Module require an active Background worker?
// If true then the background worker is mandatory and a notice will be displayed upon module creation.
// - This variable is mandatory
$x["require_worker"] 		= false;
// Parent Site Module
// Define to which site modules "rname" value this extension belongs.
// For default suitefish modules always use "_administrator" here.
// - This variable is mandatory
$x["parent_rname"] 			= "_administrator";
``` 

### changelog.php

Changelog of changes between this and last version of this module. Store the changelog in simple html format in the $x variable.

``` 
$x = "<b>Release 1.10.100</b><br /> - Initial Release";
```

### preview.jpg

Preview image for the store and other areas the module is visble at.

### LICENSE.md

License information about the module.

### README.md

Readme file with general information about the module.

🐟 Bugfish