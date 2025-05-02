# 📦 Docker Module

## 📙 Information 

Here you find information about how a docker module works. Docker Module Example for the Docker Server Manager Extension for our administrator module, especially for Developers.

## 📄 Documentation 

If you are a developer you can find examples of modules in the _developers folder at the suitefish-cms github repository if you want to create an own module!

For more information about the Suitefish CMS: https://github.com/bugfishtm/suitefish-cms

## 🛠️ Installation

You have two ways installing this module.

### Module Store

Login to your suitefish instance and browse our official store on your page. If you find the module you are looking for just download the package. Then navigate to the Docker Server Manager Area and Deploy the downloaded package.

### Upload to CMS

Navigate to the Docker Package Area inside the suitefish instance. Go to the upload section and upload the modules .zip file. Then navigate to the Docker Server Manager Area and Deploy the downloaded package.

## 🐳 Container

Here are information about the docker container which will be created after deployment.

**Container**

| Name | Description |
|---|----|
|dummy | Container with MySQL Instance | 

**Variables**

| Name | Description |
|---|----|
|var_user | MySQL User | 
|var_password | MySQL Password |

**Volumes**

| Name | Description | Container Path|
|---|----|----|
|dummy | Dummy Volume with MySQL library files | /var/lib/mysql |

**Ports**

| Port | Set by Variable | Description|
|---|----|----|
|dummy | ${var_port} | Port for MySQL Connections |

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
├── .env.php (Environment Variables - With Substitutions - Optional)
├── changelog.php (Changelog info)
├── docker-compose.yml (Docker Compose File - With Substitutions)
├── Dockerfile (Docker File - No Substitutions - Optional)
├── index.php (Prevent Directory Listing)
├── LICENSE.md (Extensions License)
├── preview.jpg (Preview image)
├── README.md (Extensions Readme)
└── version.php (Versioning info)
```

## 🔄 Substitutions

The .env and docker-compose.yml files are substituted. If a docker module gets deployed in the administration interface a form will be generated depending on substitutionable variables. If such variables are found a form will ask for values and explain the form fields and set the type depending on the translation and the type set in the substitution variable.

This is how a substitution variable looks like:

```
{SFCMS_$[var_user/string]}
```

This is a substitution variable with key var_cbnum, using the translation key var_user and the type "string".

There are different types available, these are string, num, port, cbnum and cbtf, below you can see examples of those substitutions.

```
# Simple String explained by the translation in the Installation Auto-Form
var_user={SFCMS_$[var_user/string]}

# Simple Integer explained by the translation in the Installation Auto-Form
var_password={SFCMS_$[var_password/num]}

# Simple Port Value explained by the translation in the Installation Auto-Form
var_port={SFCMS_$[var_port/port]}

# Simple Checkbox (0, 1) Value explained by the translation in the Installation Auto-Form
var_cbnum={SFCMS_$[var_cbnum/cbnum]}

# Simple Checkbox (true, false) Value explained by the translation in the Installation Auto-Form
var_cbtf={SFCMS_$[var_cbtf/cbtf]}
```

Before the docker container gets initialized, these variables will be replaced with the values entered in the form in .env and the docker compose file.

## 🗣️ Language Files 

Language files in this kind of module are only to show the name and description in the store if the module is multi-langual, besides that they control the output shown in automatic generated forms to deploy containers based on substitution variables.

Below you see an example of an english language file (en.php). The first lines prevent public view of the language file. The variables for translations are for the store to make name and description multi-langual.

``` 
<?php if(isset($this)) { if(!is_object($this)) { Header("Location: ../"); exit(); } } else { Header("Location: ../"); exit(); } ?>

store_version_name=Template: Docker Module
store_version_description=Docker Module Example for the Docker Server Manager Extension for our administrator module, especially for Developers. You can get more Information about Docker Modules inside the Suitefish Documentation and related Readme.md Files in the repository!
``` 

Below we extend the language file with explanations for the automatic generated form when deploying the module.

``` 
var_password=Define a Password to be created on the Container Setup for the MySQL Database Access.
var_user=Define a Username to be created on the Container Setup for the MySQL Database Access.
var_port=Define a port for the MySQL Instance on the Host System
``` 

## ⚙️ Default Files

Suitefish-CMS Modules expect some default files to be in place in modules. Here you can see which files are mandatory.

### .env

The env file is optional, but you can add it and set variables in it like in the example below:

```
# Simple String explained by the translation in the Installation Auto-Form
var_user={SFCMS_$[var_user/string]}

# Simple Integer explained by the translation in the Installation Auto-Form
var_password={SFCMS_$[var_password/num]}

# Simple Port Value explained by the translation in the Installation Auto-Form
var_port={SFCMS_$[var_port/port]}

# Simple Checkbox (0, 1) Value explained by the translation in the Installation Auto-Form
var_cbnum={SFCMS_$[var_cbnum/cbnum]}

# Simple Checkbox (true, false) Value explained by the translation in the Installation Auto-Form
var_cbtf={SFCMS_$[var_cbtf/cbtf]}

```

### docker-compose.yml

This file is mandatory and should contain the init for the docker containers. You can see an example below:

```
services:
  dummy:
    image: bugfishtm/dummy:latest
    environment:
      MYSQL_DATABASE: 'db'
      MYSQL_USER: "${var_user}"
      MYSQL_PASSWORD: "${var_password}"
      MYSQL_ROOT_PASSWORD: "${var_password}"
    ports:
      - '${var_port}:3306'
    volumes:
      - dummy:/var/lib/mysql
# Names our volume
volumes:
  dummy:
```

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
$x["rname"] 		= "_docker";
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
$x["name"] 			= "Template: Docker Module";
// Module Description 
// - Define the Description of the Module displayed in different frontpage areas.
// - Only text and simple html codes (like br, li, table)
// - Do not use style, script or other kind of complex tags
// - This variable is mandatory
$x["description"] = "Docker Module Example for the Docker Server Manager Extension for our administrator module, especially for Developers. You can get more Information about Docker Modules inside the Suitefish Documentation and related Readme.md Files in the repository!";
// Module Type
// - There are different Types of Modules inside Suitefish CMS
// - The set ID 5 is dedicated to docker modules and will than be recognized as one.
// - Other possible values: 1 - Site | 2 - Extension | 3 - Image | 4 - Windows | 5 - Docker | 6 - Theme
// - This variable is mandatory
$x["type"] 			= 5;
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