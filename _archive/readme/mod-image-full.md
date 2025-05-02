# 📦 Image Module

## 📙 Information 

Suitefish CMS extension template for developers, providing a modular framework to demonstrate website deployment capabilities without automatic feature initialization, enabling custom configuration and manual module integration.

## 📄 Documentation 

If you are a developer you can find examples of modules in the _developers folder at the suitefish-cms github repository if you want to create an own module!

For more information about the Suitefish CMS: https://github.com/bugfishtm/suitefish-cms

## 🛠️ Installation

You have two ways installing this module.

### Module Store

Login to your suitefish instance and browse our official store on your page. If you find the module you are looking for just download the package. Then navigate to the Image Package Area and enable the downloaded Image.

### Upload to CMS

Navigate to the Image Package Area inside the suitefish instance. Go to the upload section and upload the modules .zip file.  Then navigate to the Image Package Area and enable the downloaded Image.

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

### ./_htdocs

Put the Website to be deployed in here, this can be any website (unziped source) which you can imagine. (wordpress for example or more)

```
./MODULE_NAME/htdocs/
├── ... (Your website source code files)
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

## 🗣️ Language Files 

Language files in this kind of module are only to show the name and description in the store if the module is multi-langual.

Below you see an example of an english language file (en.php). The first lines prevent public view of the language file. The variables for translations are for the store to make name and description multi-langual.

``` 
<?php if(isset($this)) { if(!is_object($this)) { Header("Location: ../"); exit(); } } else { Header("Location: ../"); exit(); } ?>

store_version_name=Template: Image Module
store_version_description=Suitefish CMS extension template for developers, providing a modular framework to demonstrate website deployment capabilities without automatic feature initialization, enabling custom configuration and manual module integration.
``` 

## ⚙️ Default Files

Suitefish-CMS Modules expect some default files to be in place in modules. Here you can see which files are mandatory.

### _htdocs

Put your image module website source code in this folder. It should contain all data necessary to run your deployed website image module.

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
$x["rname"] 		= "_image";
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
$x["name"] 			= "Template: Image Module";
// Module Description 
// - Define the Description of the Module displayed in different frontpage areas.
// - Only text and simple html codes (like br, li, table)
// - Do not use style, script or other kind of complex tags
// - This variable is mandatory
$x["description"] = "Suitefish CMS extension template for developers, providing a modular framework to demonstrate website deployment capabilities without automatic feature initialization, enabling custom configuration and manual module integration.";
// Module Type
// - There are different Types of Modules inside Suitefish CMS
// - The set ID 3 is dedicated to image modules and will than be recognized as one.
// - Other possible values: 1 - Site | 2 - Extension | 3 - Image | 4 - Windows | 5 - Docker | 6 - Theme
// - This variable is mandatory
$x["type"] 			= 3;
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