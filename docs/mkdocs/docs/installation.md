# Installation

Here, you'll find step-by-step instructions to help you set up the software. Follow the provided resources to ensure a smooth installation process and get up and running in no time.

---------------

## Docker Installation

Visit the download section of this website and find the link to the Docker image page. There, you'll find detailed instructions and the image needed to set up the Docker instance. Installation is straightforward as our Docker setup uses a single container and can be deployed with just one console command—no need for Docker Compose. If no Docker image is available, Docker installation is not possible.


Here you can find the official Docker image related to this project. By clicking the link below, you'll be directed to the Docker Hub page where you can access and pull the image for use.

[Docker](https://hub.docker.com/r/bugfishtm/suitefish){.md-button}

---------------

## Script Installation

In the github repository's `_scripts` folder, you'll find an installation script designed to install the full version with all features on a root server. This script is intended for users who wish to utilize our advanced hosting functionality on a fresh system. It is recommended only for advanced users with their own servers and infrastructure.

[Script](https://raw.githubusercontent.com/bugfishtm/suitefish-cms/refs/heads/main/_scripts/suitefish.sh){.md-button}

**Install Suitefish (Dependencies)**

- Just the dependencies if you want to install manual on a server.

Upload the suitefish.sh script to your server and use:

```
chmod u+x ./suitefish.sh  
sh ./suitefish.sh install-dependencies
```

**Install Suitefish (Full)**

- Install the full package
- Setup Cronjob & Background worker
- Setup PHP8.4 & PHP-FPM
- Setup Apache/Suexec
- Download and install suitefish
- Requires root permission

Upload the suitefish.sh script to your server and use:

```
chmod u+x ./suitefish.sh  
sh ./suitefish.sh install
```


---------------

## Manual Installation (Server)

For root-level installation, you’ll be setting up the CMS as a server backend, giving you full administrative control over your environment. This method is ideal if you want to manage the entire server, run background services, or access advanced features like Docker container management. Root-level installation requires a dedicated VPS or root server and grants access to system-level modules and configurations that aren’t available with standard website-level installs. Some features and modules will require root privileges, and these will be clearly indicated in the CMS interface. Choose this method if you need maximum flexibility, customization, and control over your server and CMS deployment.

### Requirements

You can use the install dependencies [script](https://raw.githubusercontent.com/bugfishtm/suitefish-cms/refs/heads/main/_scripts/suitefish.sh) in the repositories _scripts folder!

#### Linux

| Package Name                  | Purpose                                  |
|-------------------------------|--------------------------------------------------------------|
| Ubuntu | Recommended.       |
| Debian | Untested, but expected to work.       |


#### Packages

| Package Name                  | Purpose (Short Description)                                  |
|-------------------------------|--------------------------------------------------------------|
| apache2                       | Web server for serving websites and web content.       |
| software-properties-common    | Manage software sources and repositories.                    |
| git                           | Distributed version control system for code management.      |
| gcc                           | GNU Compiler Collection for compiling source code.           |
| make                          | Build automation tool for compiling and managing projects.   |
| autoconf                      | Tool for generating configuration scripts for building code. |
| pkg-config                    | Manage and query installed libraries for compiling software.|
| imagemagick                   | Toolset for image manipulation and conversion.               |
| openssl                       | Toolkit for SSL/TLS encryption and cryptography.             |
| redis                         | In-memory data structure store, often used as a cache.       |
| curl                          | Command-line tool for transferring data via URLs.            |
| cron                          | Time-based job scheduler for running tasks automatically.    |
| tzdata                        | Time zone and daylight-saving time data.                     |
| supervisor                    | Process control system for managing processes.               |
| zip                           | Compression and archiving utility.                           |
| htop                          | Interactive process viewer and system monitor.            |
| unzip                         | Tool for extracting compressed zip archives.                 |
| tmux                          | Terminal multiplexer for managing multiple terminal sessions.|
| redis-server                  | Redis server daemon.                                         |
| redis-tools                   | Command-line tools for interacting with Redis.               |
| mariadb-server                | Open-source relational database server (MySQL-compatible).   |
| mariadb-client                | Client utilities for MariaDB database.                       |
| wget                          | Command-line tool for downloading files from the web.        |
| iputils-ping                  | Utility for testing network connectivity (ping command).      |
| apache2-suexec-custom         | Apache module for executing CGI scripts as different users.  |
| jq                            | Command-line JSON processor for parsing and filtering JSON.  |
| fail2ban                            | Recommended for security purposes.  |
| libc-dev                      | Standard C library development files (headers, etc.).              |
| libonig-dev                   | Oniguruma regular expressions library development files.            |
| libpng-dev                    | Development files for PNG image support.                           |
| zlib1g-dev                    | Compression library development files (zlib).                      |
| libcurl4-openssl-dev          | cURL library development files with OpenSSL support.               |
| libicu-dev                    | International Components for Unicode (i18n support) development.   |
| libxml2-dev                   | XML parsing library development files.                             |
| libzip-dev                    | Library for reading, creating, and modifying zip archives (dev).   |
| libsodium-dev                 | Modern, easy-to-use crypto library development files.              |
| libmemcached-dev              | Development files for Memcached client library.                    |
| libssl-dev                    | SSL/TLS cryptography library development files.                    |
| libtidy-dev                   | HTML syntax checker and reformatter library (dev files).           |
| libkrb5-dev                   | Kerberos authentication protocol development files.                |
| libssh2-1-dev                 | SSH2 protocol library development files.                           |
| libc-client2007e-dev          | IMAP client library development files.                             |
| libbz2-dev                    | bzip2 compression library development files.                       |
| libmagickwand-dev             | MagickWand API for ImageMagick (image processing, dev files).      |
| libldap2-dev                  | LDAP directory access library development files.                   |
| libfreetype-dev               | FreeType font rendering library development files.                 |
| libfreetype6-dev              | (Same as above; alternate package name/version).                   |
| libjpeg-dev                   | JPEG image library development files.                              |
| php8.4                   | PHP8.4 Package.                              |


#### PHP Modules

| Package Name       | Purpose (Short Description)                    | Included in PHP 8.4 Core? |
|--------------------|------------------------------------------------|---------------------------|
| php8.4-cli         | Command-line interface for PHP scripts         | Yes                       |
| php8.4-mysql       | MySQL database driver (mysql_* functions)      | No                        |
| php8.4-mysqli      | Improved MySQL driver (mysqli_* functions)     | No                        |
| php8.4-xml         | XML parsing support                             | Yes                       |
| php8.4-mbstring    | Multibyte string support                        | Yes                       |
| php8.4-curl        | cURL library support                            | No                        |
| php8.4-zip         | ZIP archive support                             | Yes                       |
| php8.4-intl        | Internationalization functions                  | Yes                       |
| php8.4-common      | Common PHP files                                | Yes                       |
| php8.4-soap        | SOAP protocol support                           | No                        |
| php8.4-opcache     | Opcode caching for performance                  | Yes                       |
| php8.4-gd          | Image processing (GD library)                   | No                        |
| php8.4-bcmath      | Arbitrary precision math                         | Yes                       |
| php8.4-bz2         | bzip2 compression support                        | No                        |
| php8.4-imap        | IMAP email protocol support                      | No                        |
| php8.4-tidy        | HTML tidy library support                        | No                        |
| php8.4-ssh2        | SSH2 protocol support                            | No                        |
| php8.4-imagick     | ImageMagick image processing                     | No                        |
| php8.4-sqlite3     | SQLite3 database support                         | Yes                       |
| php8.4-ldap        | LDAP protocol support                            | No                        |
| php8.4-memcached   | Memcached caching support                        | No                        |
| php8.4-redis       | Redis caching support                            | No                        |
| php8.4-fpm         | FastCGI Process Manager                          | Yes                       |

#### Apache Modules

| Module Name       | Purpose (Short Description)                                 | Action   |
|-------------------|-------------------------------------------------------------|----------|
| ssl               | Enables HTTPS (SSL/TLS) support                             | Enable   |
| rewrite           | URL rewriting and redirection                               | Enable   |
| headers           | Manipulate HTTP headers                                     | Enable   |
| cgi               | Support for running CGI scripts                             | Enable   |
| cgid              | CGI support using a daemon (for threaded MPMs)              | Enable   |
| remoteip          | Replace client IP with value from proxy/load balancer       | Enable   |
| deflate           | Compress content before sending to clients (gzip)           | Enable   |
| http2             | HTTP/2 protocol support                                     | Enable   |
| proxy             | Core proxy module (enables basic proxy functionality)       | Enable   |
| proxy_http        | Support for proxying HTTP requests                          | Enable   |
| proxy_ftp         | Support for proxying FTP requests                           | Enable   |
| proxy_fcgi        | Support for proxying FastCGI requests (e.g., PHP-FPM)       | Enable   |
| proxy_balancer    | Load balancing for proxied connections                      | Enable   |
| suexec            | Run CGI scripts as different users                          | Enable   |
| php8.4            | PHP 8.4 module for Apache (mod_php)                         | Disable  |
| mpm_prefork       | Non-threaded, pre-forking web server mode                   | Disable  |
| mpm_event         | Event-driven, threaded web server mode                      | Enable   |

### Installation

By following these steps, your installation will be ready to go!


#### Prepare Webserver

1. **Download or Clone the Repository:**
	- Visit the download section of the website, where you’ll find the download links for the latest release or choose to clone the repository directly from there. [Download@Github](https://github.com/bugfishtm/suitefish-cms)

2. **Copy the Files:**
	- Navigate to the `/source` directory in the repository or extract the chosen release file.
	- Copy all files from the `/source` folder to your web server's public HTML directory, ensuring all the necessary project files are accessible by the server.

3. **Configure the Website:**
	- Open the website in your browser and follow the installation wizard.
	- The wizard will guide you through the initial setup, where you’ll configure the database, administrative user, and other required settings.
	- The database tables will be created automatically during the installation process, so there is no need to import anything manually.

4. **Set Up Cronjob:**
	- For the CMS to function properly, you’ll need to set up a cronjob to run `_cronjob/cronjob.php` every hour as the web server user (usually `www-data` or the user running your web server). This ensures scheduled tasks run correctly. You can find more details in the "Setup Cronjob" section.

5. **Setup Daemon:**
	- For enhanced features and root-level functionalities, you may set up a background worker. Detailed instructions for setting it up can be found below. This step is optional but recommended for projects requiring more robust background operations. Modules that require this functionality will include a note in the store and during installation in the CMS. You can find more details in the "Setup Daemon" section.

#### Setup Cronjob

To enable scheduled tasks, set up an hourly cronjob to run `_cronjob/cronjob.php` as your web server user (often `www-data`).  

Add this line to your crontab (adjust the PHP and path as needed):

```bash
0 * * * * /usr/bin/php8.4 /path/to/_cronjob/cronjob.php >/dev/null 2>&1
```

If you use hosting software (like cPanel, Plesk) or a managed provider, use their interface to schedule this script instead. PHP8.4 should be used for the cronjob.


#### Setup Daemon

1. Login to your server using SSH
2. Execute the following command: 
```bash
apt install supervisor
```

3. Create the file `/etc/supervisor/conf.d/suitefish.conf` with following content: 
```bash
	[program:suitefish]
	command=/usr/bin/php8.4 /var/www/html/_core/worker.php
	user=root
	autostart=true
	autorestart=true
	stderr_logfile=/var/log/suitefish_error.log
	stdout_logfile=/var/log/suitefish_log.log
	startsecs=0
	environment=SUITEFISH_SUPERVISOR_LOG_FILE="/var/log/suitefish_log.log"	
```

4. Ensure that the path specified in the `suitefish.conf` file (`/var/www/html/_core/worker.php`) correctly points to the location where your SuiteFish CMS is installed. The `worker.php` file is located in the `_core` folder within the SuiteFish CMS directory on your web server. Also check that the PHP Execution Path `/usr/bin/php8.4` leads to a valid php8.4 installation executable.

5. Execute following commands to run the suitefish background worker:
```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start suitefish
```


---------------

## Manual Installation (Website)





#### Website

These requirements apply if you are only using the website functionalities of this CMS on a standard web hosting service or your own web server. In this setup, the background worker will not function, and modules requiring advanced access will also be unavailable without the background worker. However, other modules that do not depend on the background worker will still operate as expected.

- Apache2 webserver with modules: `rewrite` (mandatory), `ssl` (optional), `deflate` (optional).
- MySQL: Version 5.7 or higher required. MySQL 8.0+ recommended for optimal performance.
- Ensure you are using PHP version 8.4.x or higher. Avoid using any lower versions. Compatibility with PHP 9 is untested.
- The following PHP modules are required: `curl`, `mysqli`, and `mbstring`. The website will prompt you to install any additional required modules if they are not already installed.
- A minimum of 5GB of available web space is recommended.






### Requirements


#### Webserver

| Package Name                  | Purpose                                  |
|-------------------------------|--------------------------------------------------------------|
| Apache2 | Recommended.       |
| Nginx | Untested, NOT expected to work.       |

#### PHP Modules

| Package Name       | Purpose (Short Description)                    | Included in PHP 8.4 Core? |
|--------------------|------------------------------------------------|---------------------------|
| php8.4-cli         | Command-line interface for PHP scripts         | Yes                       |
| php8.4-mysql       | MySQL database driver (mysql_* functions)      | No                        |
| php8.4-mysqli      | Improved MySQL driver (mysqli_* functions)     | No                        |
| php8.4-xml         | XML parsing support                             | Yes                       |
| php8.4-mbstring    | Multibyte string support                        | Yes                       |
| php8.4-curl        | cURL library support                            | No                        |
| php8.4-zip         | ZIP archive support                             | Yes                       |
| php8.4-intl        | Internationalization functions                  | Yes                       |
| php8.4-common      | Common PHP files                                | Yes                       |
| php8.4-soap        | SOAP protocol support                           | No                        |
| php8.4-opcache     | Opcode caching for performance                  | Yes                       |
| php8.4-gd          | Image processing (GD library)                   | No                        |
| php8.4-bcmath      | Arbitrary precision math                         | Yes                       |
| php8.4-bz2         | bzip2 compression support                        | No                        |
| php8.4-imap        | IMAP email protocol support                      | No                        |
| php8.4-tidy        | HTML tidy library support                        | No                        |
| php8.4-ssh2        | SSH2 protocol support                            | No                        |
| php8.4-imagick     | ImageMagick image processing                     | No                        |
| php8.4-sqlite3     | SQLite3 database support                         | Yes                       |
| php8.4-ldap        | LDAP protocol support                            | No                        |
| php8.4-memcached   | Memcached caching support                        | No                        |
| php8.4-redis       | Redis caching support                            | No                        |
| php8.4-fpm         | FastCGI Process Manager                          | Yes                       |

#### Apache Modules

| Module Name       | Purpose (Short Description)                                 | Action   |
|-------------------|-------------------------------------------------------------|----------|
| ssl               | Enables HTTPS (SSL/TLS) support                             | Enable   |
| rewrite           | URL rewriting and redirection                               | Enable   |
| headers           | Manipulate HTTP headers                                     | Enable   |
| cgi               | Support for running CGI scripts                             | Enable   |
| cgid              | CGI support using a daemon (for threaded MPMs)              | Enable   |
| deflate           | Compress content before sending to clients (gzip)           | Enable   |
| http2             | HTTP/2 protocol support                                     | Enable   |

### Installation

By following these steps, your installation will be ready to go!


#### Prepare Webserver

1. **Download or Clone the Repository:**
	- Visit the download section of the website, where you’ll find the download links for the latest release or choose to clone the repository directly from there. [Download@Github](https://github.com/bugfishtm/suitefish-cms)

2. **Copy the Files:**
	- Navigate to the `/source` directory in the repository or extract the chosen release file.
	- Copy all files from the `/source` folder to your web server's public HTML directory, ensuring all the necessary project files are accessible by the server.

3. **Configure the Website:**
	- Open the website in your browser and follow the installation wizard.
	- The wizard will guide you through the initial setup, where you’ll configure the database, administrative user, and other required settings.
	- The database tables will be created automatically during the installation process, so there is no need to import anything manually.

4. **Set Up Cronjob:**
	- For the CMS to function properly, you’ll need to set up a cronjob to run `_cronjob/cronjob.php` every hour as the web server user (usually `www-data` or the user running your web server). This ensures scheduled tasks run correctly. You can find more details in the "Setup Cronjob" section.

#### Setup Cronjob

To enable scheduled tasks, set up an hourly cronjob to run `_cronjob/cronjob.php` as your web server user (often `www-data`).  

Add this line to your crontab (adjust the PHP and path as needed):

```bash
0 * * * * /usr/bin/php8.4 /path/to/_cronjob/cronjob.php >/dev/null 2>&1
```

If you use hosting software (like cPanel, Plesk) or a managed provider, use their interface to schedule this script instead. PHP8.4 should be used for the cronjob.

---------------

## Initial Login

!!! danger "For your security, change the default password immediately after your first login."
	**Important:** To ensure the security of your account and system, it is strongly recommended to change the password right after your first login. Failing to do so may expose your system to potential security risks.

Once the installation is complete, you can log in using the default credentials provided below.

**Username:** admin@admin.local  
**Password:** changeme



---------------

## Troubleshooting

!!! note "This troubleshooting advise is only for non-docker installations."

If the `installer.php` script fails to generate the `settings.php` file for any reason, you can manually create the `settings.php` file by using the `settings_sample.php` file located in the `_source` folder of this project. Simply rename the file from `_samples/settings_sample.php` to `settings.php` and make the necessary configuration changes.