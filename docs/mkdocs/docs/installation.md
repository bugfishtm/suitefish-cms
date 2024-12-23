# Installation

## Prerequisites

Before you begin the installation, ensure you have the following:

- Apache2 webserver recommended.
- Apache2 modules: `rewrite`, `ssl` (recommended).
- Access to a MySQL database (remote or local).
- PHP 8.x installed with `curl`, `mysqli`, and `mbstring` modules. Website will ask you for other required modules if necessary and not installed.
- At least 1GB of available webspace recommended.

## Installation Steps

1. **Download/Clone the Repository:**
	- You can download the repository as a ZIP file or clone it using Git.
```markdown
git clone https://github.com/bugfishtm/suitefish-cms.git`
```

2. **Copy Files:**
	- Navigate to the `/source` directory within the repository or in the choosen release.
	- Copy all files from the `/source` directory to your website's public html folder.

3. **Configure the Website:**
	- Access the website through your browser.
	- Follow the on-screen installation instructions to complete the setup.

4. (recommended) **Setup Cronjob:**  
	- Setup a cronjob on your server to run the file cronjob.php hourly as the website user (usually www-data).

4. (optional) **Setup Background Worker:**  
	- Setup the background worker as described below to use root level features of this cms.

## Background Worker

!!! note "The following step is optional, but required if you want to use advanced CMS Functionalities which depend on root level access. You need full control to a VM or Root Server - otherwise you can ignore this option."

1. Login to your server using SSH
2. Execute the command `apt install supervisor` 
3. Create the file `/etc/supervisor/conf.d/suitefish.conf` with following content: 
```bash
	[program:suitefish]
	command=/usr/bin/php /var/www/html/_core/worker.php
	user=root
	autostart=true
	autorestart=true
	stderr_logfile=/var/log/suitefish_error.log
	stdout_logfile=/var/log/suitefish_log.log
	startsecs=0
	environment=SUITEFISH_SUPERVISOR_LOG_FILE="/var/log/suitefish_log.log"	
```
4. Check if the path provided in suitefish.conf `/var/www/html/_core/worker.php` is correctly pointing to the directory where your suitefish-cms instance is installed. The worker.php file is found in the _core folder of the cms files which have been uploaded to the webserver.
5. Execute command to reread the supervisor configuration: `sudo supervisorctl reread`
6. Execute command to update the supervisor configuration: `sudo supervisorctl update`
7. Execute command to start the suitefish daemon: `sudo supervisorctl start suitefish`

## Initial Login

!!! danger "Change the default password immediately after your first login."

After installation, log in with the default credentials:

- **Username:** admin
- **Password:** changeme

## Troubleshoot

If the installer.php script failes to write the settings.php file for any reason you can create the settings.php file manually by using settings_sample.php in the _source folder of this project.