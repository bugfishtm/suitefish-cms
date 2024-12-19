# Example Software Module

Deploy software projects (for Windows) using software modules in Suitefish. These modules don't auto-load features like MySQL table setups. These scripts/pages are not altered by Suitefish in any way.

- `_lang`: Language Translations for Multilangual Store Deployment (Only if you want to deploy multi langual descriptions and names for the store on deployment.)
- `_images`: Preview images for the readme.md file.
- `./executable.bat`: Software Test File. Put your software package inside this module folder and delete executable.bat. Speficy in version.php the starter file for your software.
- `preview.jpg`: Preview image for the Administrator Module and Store.
- `changelog.php`: Document the module's changelog.
- `version.php`: Contains versioning information.
- `index.php`: Refer back to ../ to prevent stuck in browser.
- `README.md`: The readme of your module.
- `LICENSE.md`: The license of your module.

🐟 Bugfish <3