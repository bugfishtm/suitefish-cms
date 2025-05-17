# Manual Installation

## Introduction 

!!! info "Information"
	When installing manually, you can choose prefered website or root level access mode if the suitefish installation.

Here, you'll find step-by-step instructions to help you set up the software manually. Follow the provided resources to ensure a smooth installation process and get up and running in no time. Installing the CMS is straightforward, whether you choose root-level access mode or the default website mode. 

---------------

## Install Suitefish

!!! info "Information"
	Please read the following text carefully before installation.

You can install the CMS in two ways: Root-Level Installation gives you full server control and access to advanced features, but requires a dedicated VPS or root server. Website Mode runs the CMS as a standard website, making it easy to deploy on shared or managed hosting without root access. Choose the method that best fits your hosting environment and needs.

### Website-Mode

!!! info "Notice"
	This is the installation area to install suitefish on website-level. Please read the instructions carefully if you choose this method.
	
For website mode installation, the CMS runs as a standard website without requiring root-level access. This method is ideal for shared hosting or web hosting environments where you don’t manage the entire server. You can deploy the software on most web hosts without needing a dedicated VPS or root server, making it accessible and easy to set up. Website mode is perfect if you want a straightforward installation and management experience using default hosting features.

1. **Requirements:** Before getting started, make sure your system meets the requirements to run suitefish-cms, which you can find at: [./mode_website.html](./mode_website.html).

2. **Download the Repository:** Visit the download section of the website, where you’ll find the download links for the latest release or choose to clone the repository directly from there: [https://github.com/bugfishtm/suitefish-cms](https://github.com/bugfishtm/suitefish-cms)
```bash
git clone https://github.com/bugfishtm/suitefish-cms
```

3. **Copy the Files:** Navigate to the `/source` directory in the repository or extract the chosen release file. Copy all files from the `/source` folder (or the extracted release file) to your web server's public HTML directory.

4. Set the file permissions for all uploaded files to `chmod 770` and ensure the owner and group are set to the correct web-server user (if not already).

5. **Configure the Website:** Open the website in your browser and follow the installation wizard. The wizard will guide you through the initial setup, where you’ll configure the database, administrative user, and other required settings.

6. **Set Up Cronjob:** See the "Setup Cronjob" section inside this documentation for information on how to setup the suitefish cronjob!

### Server-Mode

!!! info "Notice"
	This is the installation area to install suitefish on root-level. Please read the instructions carefully if you choose this method.

For root-level installation, you’ll set up the CMS as a server backend with full administrative control. This approach is ideal for managing the entire server, running background services, or using advanced features like Docker management. It requires a dedicated VPS or root server and unlocks system-level modules not available in standard installs. Choose this method if you need maximum flexibility and control over your server and CMS deployment.

1. **Requirements:** Before getting started, make sure your system meets the requirements to run suitefish-cms, which you can find at: [./mode_server.html](./mode_server.html).

2. **Download the Repository:** Visit the download section of the website, where you’ll find the download links for the latest release or choose to clone the repository directly from there: [https://github.com/bugfishtm/suitefish-cms](https://github.com/bugfishtm/suitefish-cms)
```bash
git clone https://github.com/bugfishtm/suitefish-cms
```

3. **Copy the Files:** Navigate to the `/source` directory in the repository or extract the chosen release file. Copy all files from the `/source` folder (or the extracted release file) to your web server's public HTML directory.

4. Set the file permissions for all uploaded files to `chmod 770` and ensure the owner and group are set to the correct web-server user (if not already).

5. **Configure the Website:** Open the website in your browser and follow the installation wizard. The wizard will guide you through the initial setup, where you’ll configure the database, administrative user, and other required settings.

6. **Set Up Cronjob:** See the "Setup Cronjob" section inside this documentation for information on how to setup the suitefish cronjob!

7. **Setup Daemon:** See the "Setup Daemon" section inside this documentation for information on how to setup the suitefish daemon (background-worker)!

---------------

## Setup Cronjob

!!! info "Information"
	This step is required for both, website and root level instances.

!!! warning "Warning"
	Before setting up the cronjob, ensure you are using a compatible PHP version and specify the correct path to the PHP executable and the suitefish cronjob php script. The cronjob must be configured to run as your web server user (typically www-data), and both the PHP binary path and the script path should be adjusted to match your server setup for proper operation.
	
Choose one installation method below and use only that method.

### Method 1

If you use hosting software (like cPanel, Plesk) or a managed provider, use their interface to schedule the cronjob. You should setup `PATHTOSUITEFISH/_cronjob/cronjob.php` to run every full hour. Be sure the scripts is executed with the php version stated in the documentation "Requirements" section.

### Method 2

If you have shell access to the web/server, add this line to the website apache2 users crontab:

```bash
0 * * * * /usr/bin/php8.4 /PATHTOSUITEFISH/_cronjob/cronjob.php >/dev/null 2>&1
```

### Method 3

If you have root access to the server you can add this cronjob to /etc/crontab:

```bash
0 * * * * www-data /usr/bin/php8.4 /PATHTOSUITEFISH/_cronjob/cronjob.php >/dev/null 2>&1
```

---------------

## Setup Daemon

!!! info "Information"
	This step is only required for root level instances.

!!! warning "Warning"
	Before setting up the script, ensure you are using a compatible PHP version and specify the correct path to the PHP executable and the suitefish worker.php script. The daemon must be configured to run as the root user, and both the PHP binary path and the script path should be adjusted to match your server setup for proper operation. Replace PATHTOSUITEFISH with the absolute path to the suitefish worker.php script.

1. Login to your server using SSH
2. Execute the following command: 
```bash
apt install supervisor
```

3. Create the file `/etc/supervisor/conf.d/suitefish.conf` with following content: 
```bash
[program:suitefish]
command=/usr/bin/php8.4 /PATHTOSUITEFISH/_core/worker.php
user=root
autostart=true
autorestart=true
stderr_logfile=/var/log/suitefish_error.log
stdout_logfile=/var/log/suitefish_log.log
startsecs=0
environment=SUITEFISH_SUPERVISOR_LOG_FILE="/var/log/suitefish_log.log"	
```

4. Ensure that the path specified in the `suitefish.conf` file (`/var/www/html/_core/worker.php`) correctly points to the location where your SuiteFish CMS is installed. The `worker.php` file is located in the `_core` folder within the SuiteFish CMS directory on your web server. Also check that the PHP Execution Path `/usr/bin/php8.4` leads to a valid php8.4 installation executable.

5. Execute following commands to run the suitefish background worker daemon:
```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start suitefish
```

6. Set the file permissions for `/etc/supervisor/conf.d/suitefish.conf` to `chmod 770` and ensure the owner and group are set to `root` (if not already).

---------------

## Initial Login

!!! danger "For your security, change the default password immediately after your first login."
	**Important:** To ensure the security of your account and system, it is strongly recommended to change the password right after your first login. Failing to do so may expose your system to potential security risks.

Once the installation is complete, you can log in using the default credentials provided below.

**Username:** admin@admin.local  
**Password:** changeme

---------------

## Troubleshooting

If the `installer.php` script fails to generate the `settings.php` file for any reason, you can manually create the `settings.php` file by using the `settings_sample.php` file located in the `_source` folder of this project. Simply rename the file from `_samples/settings_sample.php` to `settings.php` and make the necessary configuration changes. Get sure permissions are set to the correct apache user, because the settings.php file should been written without problems. Wrong permissions may lead to problems in later use of suitefish-cms.