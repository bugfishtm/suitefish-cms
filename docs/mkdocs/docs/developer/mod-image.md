# Image Modules


## General Information

Deploy full website projects (like WordPress) using image modules in Suitefish. These modules don't auto-load features like MySQL table setups. These scripts/pages are not altered by Suitefish in any way.

- Image modules do not have auto-load functionalities like installing MySQL tables or similar.
- There are no controlling features for deployed website images inside the administrator module. These images are fully independent.
- Stick as close as possible to the example files found in our repository; they will show you how things work. Mind the comments.

## Developer Information
- Max 20 characters for module name (`RNAME`).
- Start name with "img" (e.g., `imgwordpress`).
- No special chars in module folder name or rname, starting underscore is dedicated to official modules.

## Installation

### Method 1: Store

1. Login to the Administrator Module.
2. Go to the "Modules" area.
3. Download the desired image module through the Official or Custom Store.
4. Install the uploaded image template in the "Manage" Tab.
5. Navigate to your uploaded folder `example.domain/_image/FOLDERNAME/` with your web 

### Method 2: Upload

1. Open the Administrator Module in your web browser.
2. Login as Administrator or privileged user.
3. Go to the "Modules" are and upload the modules .zip file there.
4. Install the uploaded module in the tab displaying templates.

### Method 3: Manually

1. Login to your web server with FTP/SFTP.
2. Unpack the required Modules .zip folder.
3. Move the extracted folder containing the files like `version.php` to the `_image` directory of the Suitefish-CMS installation.


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

## Example Module

We have an example template image module for developers in our github repository in the `_developers/_image` folder.

