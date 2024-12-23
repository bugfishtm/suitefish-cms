# Image Module

## 🧩 **General Information**

Deploy full website projects (like WordPress) using image modules in Suitefish. These modules don't auto-load features like MySQL table setups. These scripts/pages are not altered by Suitefish in any way.

## 🗂️ **Folder Structure**

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

### htdocs
Put the Website to be deployed in here, this can be any website (unziped source) which you can imagine. (wordpress for example or more)
```
./RNAME/htdocs/
├── ... (Your website source code files)
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
```


## 📚 **Documentation**
Welcome to the Suitefish CMS documentation! Explore guides, examples, and best practices to get the most out of Suitefish CMS. Whether you're a developer or an admin, you'll find everything you need to get started here: [https://bugfishtm.github.io/suitefish-cms](https://bugfishtm.github.io/suitefish-cms).

🐟 Bugfish <3