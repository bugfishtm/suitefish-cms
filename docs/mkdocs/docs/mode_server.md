# Requirements for Server-Mode

## General Information

!!! info "Notice"
	This is the requirement area to install suitefish on server-level. Please read the instructions carefully if you choose this method.

You can install the CMS in two ways: Root-Level Installation gives you full server control and access to advanced features, but requires a dedicated VPS or root server. Website Mode runs the CMS as a standard website, making it easy to deploy on shared or managed hosting without root access. Choose the method that best fits your hosting environment and needs.

For root-level installation, you’ll set up the CMS as a server backend with full administrative control. This approach is ideal for managing the entire server, running background services, or using advanced features like Docker management. It requires a dedicated VPS or root server and unlocks system-level modules not available in standard installs. Choose this method if you need maximum flexibility and control over your server and CMS deployment.

---------------

## Requirements Checklist

This checklist helps you verify that all requirements are met for installing suitefish-cms as a root-level instance.

- The root-level version of this software is only supported on Ubuntu 22 or later.
- Apache2 version 2.4 or higher is required.
	- Nginx untested, NOT expected to work, but can be used as reverse proxy.
- MySQL Version 5.7 or higher required. MySQL 8.0+ recommended for optimal performance.
- PHP version 8.4 required.
	- Do not use versions outside this range, as they are not supported.
	- The software is primarily developed and tested for PHP 8.4, and official support is focused on this version.
- A minimum of 5 GB web space is required; at least 10 GB is recommended.
- You must be able to configure cron jobs on your web server or through your hosting provider.
- Confirm that the required Linux Packages are available as outlined in the "Linux Packages" section.
- Verify that the necessary Apache2 modules are installed as described in the "Apache2 Modules" section.
- Confirm that the required PHP modules are available as outlined in the "PHP Modules" section.
- Root access to the server is required to install suitefish-cms.

---------------

## Linux Packages

You should have the following packages installed to your system.

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
| jailkit                  | Jailkit Package.                              |
| php8.4                   | PHP8.4 Package.                              |


---------------

## Apache2 Modules

The following Apache2 modules should be installed and enabled to ensure full compatibility with suitefish-cms. These modules are recommended for optimal operation at the server level, especially if you plan to use features such as Docker integration or reverse proxy extensions. If you do not require these advanced features, some modules may not be strictly necessary, but having as many as possible available will help ensure all suitefish-cms functionalities work as intended.

| Module Name       | Purpose (Short Description)                                 | Action   |
|-------------------|-------------------------------------------------------------|----------|
| ssl               | Enables HTTPS (SSL/TLS) support (optional)                             | Enable   |
| rewrite           | URL rewriting and redirection                               | Enable   |
| headers           | Manipulate HTTP headers (optional)                                                                 | Enable   |
| cgi               | Support for running CGI scripts (optional)                                                         | Enable   |
| cgid              | CGI support using a daemon (for threaded MPMs) (optional)                                          | Enable   |
| remoteip          | Replace client IP with value from proxy/load balancer (optional)                                   | Enable   |
| deflate           | Compress content before sending to clients (gzip) (optional)                                       | Enable   |
| http2             | HTTP/2 protocol support (optional)                                                                 | Enable   |
| proxy             | Core proxy module (enables basic proxy functionality) (optional)                                   | Enable   |
| proxy_http        | Support for proxying HTTP requests (optional)                                                      | Enable   |
| proxy_ftp         | Support for proxying FTP requests (optional)                                                       | Enable   |
| proxy_fcgi        | Support for proxying FastCGI requests (e.g., PHP-FPM) (optional)                                   | Enable   |
| proxy_balancer    | Load balancing for proxied connections (optional)                                                  | Enable   |
| suexec            | Run CGI scripts as different users (optional)                                                      | Enable   |
| php8.4            | PHP 8.4 module for Apache (mod_php) (optional)                                                     | Disable  |
| mpm_prefork       | Non-threaded, pre-forking web server mode (optional)                                               | Disable  |
| mpm_event         | Event-driven, threaded web server mode (optional)                                                  | Enable   |

---------------

## PHP Modules

You should have the following PHP Modules installed and activated.

| Package Name       | Purpose (Short Description)                    | Included in PHP 8.4 Core? |
|--------------------|------------------------------------------------|---------------------------|
| php8.4-cli         | Command-line interface for PHP scripts         | Yes                       |
| php8.4-mysql       | MySQL database driver (mysql_* functions), this package may be an alias of php8.4_mysqli.      | No                        |
| php8.4-mysqli      | Improved MySQL driver (mysqli_* functions), this package may be included in php8.4-mysql.    | No                        |
| php8.4-xml         | XML parsing support                             | Yes                       |
| php8.4-mbstring    | Multibyte string support                        | Yes                       |
| php8.4-curl        | cURL library support                            | No                        |
| php8.4-zip         | ZIP archive support                             | Yes                       |
| php8.4-intl        | Internationalization functions                  | Yes                       |
| php8.4-common      | Common PHP files                                | Yes                       |
| php8.4-soap        | SOAP protocol support (optional)                           | No                        |
| php8.4-opcache     | Opcode caching for performance (optional)                  | Yes                       |
| php8.4-gd          | Image processing (GD library)                   | No                        |
| php8.4-bcmath      | Arbitrary precision math                         | Yes                       |
| php8.4-bz2         | bzip2 compression support (optional)                        | No                        |
| php8.4-imap        | IMAP email protocol support (optional)                      | No                        |
| php8.4-tidy        | HTML tidy library support (optional)                        | No                        |
| php8.4-ssh2        | SSH2 protocol support (optional)                            | No                        |
| php8.4-imagick     | ImageMagick image processing (optional)                     | No                        |
| php8.4-sqlite3     | SQLite3 database support (optional)                         | Yes                       |
| php8.4-ldap        | LDAP protocol support (optional)                            | No                        |
| php8.4-memcached   | Memcached caching support (optional)                        | No                        |
| php8.4-redis       | Redis caching support (optional)                            | No                        |
| php8.4-fpm         | FastCGI Process Manager (optional)                          | Yes                       |