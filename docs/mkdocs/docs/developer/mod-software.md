# Software Module

## General Information

Software modules can be deployed in an own store instance to be delivered to the suitefish-cms windows software.

## Folder Structure

Organize your site module extensions ZIP file as follows. Replace `RNAME` with your module name. See inside folders readme.md for some more information.

### _images
Preview images for the readme.md file.

```
./RNAME/_images/
├── ... (Content you may add)
├── index.php (Prevent Directory Listing)
├── README.md (Readme file with Folder Informations)
```

### _lang
Language Translations for Multilangual Store Deployment (Only if you want to deploy multi langual descriptions and names for the store on deployment.)

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

### Files
Files in the extensions root directory.
```
./RNAME/
├── changelog.php (Changelog info)
├── index.php (Prevent Directory Listing)
├── LICENSE.md (Extensions License)
└── preview.jpg (Preview image)
├── README.md (Extensions Readme)
├── version.php (Versioning info)
├── ... (Your software code and packages...)
```
Each substitution key must be followed by a description explaining its purpose.

## Example Module

We have an example template image module for developers in our github repository in the `/_developers/_software` folder.