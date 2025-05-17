# 📦 Software Module

## 📙 Information

Here you find information about how a software module works.

This is a software module to deploy software to suitefish-windows client instances via a suitefish-cms store. You need the windows software on your computer to use this software package or a valid suitefish online instance to deploy it for software clients.

## 📄 Documentation

If you are a developer you can find examples of modules in the _developers folder at the suitefish-cms github repository if you want to create an own module!

You can find the suitefish windows software at: https://github.com/bugfishtm/suitefish-windows  
For more information about the Suitefish CMS: https://github.com/bugfishtm/suitefish-cms

## 🛠️ Installation

You have three ways installing this software module.

### Software Store

Open the suitefish windows software and browse our software store to find the module you need, than simply download and install it using the interface.

### Manual Installation

Open the suitefish windows software and browse to the area to insert software modules, select this modules zip file and wait for the suitefish software to extract and install it, it will than show up in the interface.

### Manual Alternative

You can also just unzip the modules zip file and execute the starter .exe file which is defined in version.php. The disadvantage will be that no auto-update of this software will be possible as it is not connected with the suitefish windows software.

## 📁 Structure

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

### ./_licenses

Store your external licenses in this folder!

```
./MODULE_NAME/_licenses/
├── example.lic (Example License File)
├── .. (Store your other License files here.)
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
├── executable.bat (Defined the starter file in version.php)
├── ... (Your software code and packages/folders...)
```

## 🗣️ Language Files

Language files in this kind of module are only to show the name and description in the store if the module is multi-langual.

Below you see an example of an english language file (en.php). The first lines prevent public view of the language file.

``` 
<?php if(isset($this)) { if(!is_object($this)) { Header("Location: ../"); exit(); } } else { Header("Location: ../"); exit(); } ?>

store_version_name=Template: Software Module
store_version_description=This example module demonstrates the functioning of Software Module extensions within this CMS. It includes readme files explaining the use of various folders and provides a skeleton template for creating your own software modules.
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
$x["rname"] 		= "_software";
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
$x["name"] 			= "Template: Software Module";
// Module Description 
// - Define the Description of the Module displayed in different frontpage areas.
// - Only text and simple html codes (like br, li, table)
// - Do not use style, script or other kind of complex tags
// - This variable is mandatory
$x["description"] = "This example module demonstrates the functioning of Software Module extensions within this CMS. It includes readme files explaining the use of various folders and provides a skeleton template for creating your own software modules.";
// Module Type
// - There are different Types of Modules inside Suitefish CMS
// - The set ID 4 is dedicated to software modules and will than be recognized as one.
// - Other possible values: 1 - Site | 2 - Extension | 3 - Image | 4 - Windows | 5 - Docker | 6 - Theme
// - This variable is mandatory
$x["type"] 			= 4;
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

**Dedicated Module Type Variables**

``` 
// Starter File for Windows Software
// - File should be .exe/.bat or similar
// - File will be the starter file of the software package
// - Do not use leading / or ./
// - Relative to software module package path
// - This variable is mandatory
$x["software_executable"] 		= "executable.bat";
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