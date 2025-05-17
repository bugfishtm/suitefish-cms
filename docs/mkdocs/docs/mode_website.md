# Requirements for Website-Mode

## General Information

!!! info "Notice"
	This is the requirement area to install suitefish on website-level. Please read the instructions carefully if you choose this method.

These requirements apply if you are only using the website functionalities of this CMS on a standard web hosting service or your own apache2 web server. In this setup, the background worker will not function, and modules requiring advanced access will also be unavailable without the background worker. 

You can install the CMS in two ways: Root-Level Installation gives you full server control and access to advanced features, but requires a dedicated VPS or root server. Website Mode runs the CMS as a standard website, making it easy to deploy on shared or managed hosting without root access. Choose the method that best fits your hosting environment and needs.

For website mode installation, the CMS runs as a standard website without requiring root-level access. This method is ideal for shared hosting or web hosting environments where you don’t manage the entire server. You can deploy the software on most web hosts without needing a dedicated VPS or root server, making it accessible and easy to set up. Website mode is perfect if you want a straightforward installation and management experience using default hosting features.

---------------

## Requirements Checklist

This checklist helps you verify that all requirements are met for installing suitefish-cms as a website.

- Apache2 version 2.4 or higher is required.
	- Nginx untested, NOT expected to work, but can be used as reverse proxy.
- MySQL Version 5.7 or higher required. MySQL 8.0+ recommended for optimal performance.
- PHP version 8.4 or 8.3 required.
	- Do not use versions outside this range, as they are not supported.
	- The software is primarily developed and tested for PHP 8.4, and official support is focused on this version.
	- If you are using PHP 8.3, ensure you substitute package names accordingly (e.g., use php8.3- instead of php8.4-).
- A minimum of 5 GB web space is required; at least 10 GB is recommended, depending on your use case.
- You must be able to configure cron jobs on your web server or through your hosting provider.
- Verify that the necessary Apache2 modules are installed as described in the "Apache2 Modules" section.
- Confirm that the required PHP modules are available as outlined in the "PHP Modules" section.

---------------

## Apache2 Modules

The following apache2 modules should be installed and activated.

| Module Name       | Purpose (Short Description)                                 |
|-------------------|-------------------------------------------------------------|
| ssl               | Enables HTTPS (SSL/TLS) support (optional)      |
| rewrite           | URL rewriting and redirection                               |
| headers           | Manipulate HTTP headers (optional)                      |
| cgi               | Support for running CGI scripts (optional)                  |
| cgid              | CGI support using a daemon (for threaded MPMs) (optional)              |
| deflate           | Compress content before sending to clients (gzip) (optional)           |
| http2             | HTTP/2 protocol support (optional)                                   |

---------------


## PHP Modules

You should have the following PHP Modules installed and activated.

| Package Name       | Purpose (Short Description)                    | Included in PHP 8.4 Core? |
|--------------------|------------------------------------------------|---------------------------|
| php8.4-cli         | Command-line interface for PHP scripts         | Yes                       |
| php8.4-mysql       | MySQL database driver (mysql_* functions), this package may be an alias of php8.4_mysqli.     | No                        |
| php8.4-mysqli      | Improved MySQL driver (mysqli_* functions), this package may be included in php8.4-mysql.     | No                        |
| php8.4-xml         | XML parsing support                             | Yes                       |
| php8.4-mbstring    | Multibyte string support                        | Yes                       |
| php8.4-curl        | cURL library support                            | No                        |
| php8.4-zip         | ZIP archive support                             | Yes                       |
| php8.4-intl        | Internationalization functions                  | Yes                       |
| php8.4-common      | Common PHP files                                | Yes                       |
| php8.4-soap        | SOAP protocol support (optional)           | No                        |
| php8.4-opcache     | Opcode caching for performance (optional)                 | Yes                       |
| php8.4-gd          | Image processing (GD library)                   | No                        |
| php8.4-bcmath      | Arbitrary precision math                         | Yes                       |
| php8.4-bz2         | bzip2 compression support (optional)                        | No                        |
| php8.4-imap        | IMAP email protocol support (optional)                      | No                        |
| php8.4-tidy        | HTML tidy library support (optional)                        | No                        |
| php8.4-ssh2        | SSH2 protocol support (optional)                            | No                        |
| php8.4-imagick     | ImageMagick image processing (optional)        | No                        |
| php8.4-sqlite3     | SQLite3 database support (optional)                         | Yes                       |
| php8.4-ldap        | LDAP protocol support (optional)                            | No                        |
| php8.4-memcached   | Memcached caching support (optional)                        | No                        |
| php8.4-redis       | Redis caching support (optional)                            | No                        |
| php8.4-fpm         | FastCGI Process Manager (optional)                          | Yes                       |