# Example Image Module

Deploy full website projects (like WordPress) using image modules in Suitefish. These modules don't auto-load features like MySQL table setups. These scripts/pages are not altered by Suitefish in any way.

- `_lang`: Language Translations for Multilangual Store Deployment (Only if you want to deploy multi langual descriptions and names for the store on deployment.)
- `_images`: Preview images for the readme.md file.
- `./htdocs`: Put the Website to be deployed in here, this can be any website (unziped source) which you can imagine. (wordpress for example or more) 
- `preview.jpg`: Preview image for the Administrator Module and Store.
- `changelog.php`: Document the module's changelog.
- `version.php`: Contains versioning information.
- `index.php`: Refer back to ../ to prevent stuck in browser.
- `README.md`: The readme of your module.
- `LICENSE.md`: The license of your module.

🐟 Bugfish <3