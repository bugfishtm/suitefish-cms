#!/bin/sh

########################################################################################################################################################
# Startup Procedure
########################################################################################################################################################

############################################################################
# Define Color Codes
############################################################################
GREEN=$(tput setaf 2)
YELLOW=$(tput setaf 3)
RED=$(tput setaf 1)
RESET=$(tput sgr0)

############################################################################
# Check Interpreter
############################################################################
if [ "$BASH_VERSION" ] ; then
    echo 
	echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "   Suitefish Installation Script"
	echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
    echo 
    echo " Use the following command to start the script."
    echo " Command: sh $0"
    echo 
    echo " [${RED}E${RESET}] Error: Please do not use bash interpreter to run this script ($0)"
    echo " [${RED}E${RESET}] Error: Execution aborted."
    echo 
    echo 
    exit 1
fi

############################################################################
# Check for Root Script Access
############################################################################
if [ "$(id -u)" -ne 0 ]; then
    echo 
	echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "   Suitefish Installation Script"
	echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	echo 
	echo " [${RED}E${RESET}] Error: This script must be run as root."
	echo " [${RED}E${RESET}] Error: Execution aborted."
	echo 
	exit 1
fi

############################################################################
# Output - No Parameters Provided
############################################################################
if [ ! "$1" = "check" ] && [ ! "$1" = "install" ]; then
	echo 	
	echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "   Suitefish Installation Script"
	echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	echo 
    echo " Usage: $0 <parameter>"
	echo 
    echo " Possible parameters:"
    echo " [ install ]    Install full suitefish server."
    echo " [ check ]      Check required dependencies only."
	echo 
	exit 1
fi

############################################################################
# Sorting Variable for If-Loops depending on given parameter.
############################################################################
current_script_check_dependencies=0
current_script_install_all=0
if [ "$1" = "install" ]; then
	current_script_check_dependencies=0
	current_script_install_all=1
fi
if [ "$1" = "check" ]; then
	current_script_check_dependencies=1
	current_script_install_all=0
fi

########################################################################################################################################################
# [ check ]
########################################################################################################################################################
if [ "$1" = "check" ]; then
	echo 
	echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "   Suitefish Installation Script"
	echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	echo " [${GREEN}I${RESET}] Executing: check"
	echo 
	echo " [${GREEN}I${RESET}] Thank you for choosing Suitefish-CMS."
	echo 
	echo " [${GREEN}I${RESET}] This section will display the status of all required"
	echo " system, server, and development dependencies for Suitefish,"
	echo " including web server, database, PHP, and related libraries and tools."
	echo 
	echo " [${GREEN}I${RESET}] No changes will be made to existing configurations."
	echo " The server-check will neither install new packages"
	echo " nor modify any existing packages or settings."
	echo 
	echo " [${GREEN}I${RESET}] This script is licensed under the GNU GPLv3."
	echo " [${RED}E${RESET}] Use it at your own risk."
	echo 
fi

########################################################################################################################################################
# [ install ]
########################################################################################################################################################
if [ "$1" = "install" ]; then
	echo 
	echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "   Suitefish Installation Script"
	echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	echo " Executing: install"
	echo " [${YELLOW}W${RESET}] Warning: This script has only been tested on debian/ubuntu."
	echo 
	echo " [${GREEN}I${RESET}] Thank you for choosing Suitefish-CMS."
	echo 
	echo " [${GREEN}I${RESET}] This script will guide you through the complete"
	echo " server installation process and will automatically install all required"
	echo " system, server, and development dependencies for"
	echo " Suitefish, including web server, database, PHP, and"
	echo " related libraries and tools."
	echo
	echo " [${GREEN}I${RESET}] It checks for each package and installs it if missing,"
	echo " ensuring a consistent environment for Suitefish."
	echo
	echo " [${YELLOW}W${RESET}] Warning: It is NOT recommended to run this script on"
	echo " systems that already have running services or existing"
	echo " configurations. This process may install, upgrade,"
	echo " or reconfigure core components such as Apache, MariaDB,"
	echo " Redis, and PHP, which can disrupt existing web"
	echo " applications, databases, or custom service setups."
	echo
	echo " [${GREEN}I${RESET}] This script is licensed under the GNU GPLv3."
	echo " [${RED}E${RESET}] Use it at your own risk."
	echo 
fi

########################################################################################################################################################
# Initial Confirmation
########################################################################################################################################################
echo " [${YELLOW}W${RESET}]: User input required... (see below)"
printf " Do you want to continue? (y/n): "
read answer
if [ "$answer" != "y" ] && [ "$answer" != "Y" ]; then
	echo 
	echo " [${YELLOW}W${RESET}] Execution aborted by user."
	echo " [${RED}E${RESET}] Exiting script now."
	echo 
	exit 1
fi

########################################################################################################################################################
# Update Source-List
########################################################################################################################################################
if [ "$current_script_install_all" -eq 1 ]; then
	echo
	echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "   Linux: Update Source-List"
	echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	echo " [${GREEN}I${RESET}]: Please wait...."
	apt update > /dev/null 2>&1 
	echo " [${GREEN}I${RESET}]: Source list updated."
fi

########################################################################################################################################################
# Upgrade System
########################################################################################################################################################
if [ "$current_script_install_all" -eq 1 ]; then
	echo
	echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "   Linux: Upgrade"
	echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	echo " [${GREEN}I${RESET}]: Please wait...."
	apt upgrade -y > /dev/null 2>&1 
	echo " [${GREEN}I${RESET}]: System packages upgraded."
fi

########################################################################################################################################################
# Functions
########################################################################################################################################################
INSTALL_LOG="/var/log/suitefish-installer.log"

############################################################################
# Check if a Package is really installed (dpkg -l | grep gives false positives)
# Also accepts virtual packages (e.g. libc-dev) that are Provided by an
# installed package (e.g. libc6-dev).
############################################################################
is_pkg_installed() {
    if dpkg -s "$1" 2>/dev/null | grep -q "^Status:.*ok installed"; then
        return 0
    fi
    dpkg-query -W -f='${Provides}\n' 2>/dev/null | tr ',' '\n' | sed -e 's/^ *//' -e 's/ (.*//' | grep -qx "$1"
}

############################################################################
# Escape a String for use inside single quotes in SQL and PHP
############################################################################
escape_squote() {
    printf '%s' "$1" | sed -e 's/\\/\\\\/g' -e "s/'/\\\\'/g"
}

############################################################################
# Install Package check by Command
############################################################################
check_and_install() {
    CMD="$1"
    PKG="$2"
	if [ "$current_script_install_all" -eq 1 ]; then
		if ! command -v "$CMD" >/dev/null 2>&1; then
			echo " [${YELLOW}W${RESET}]: Package '$CMD' is going to be installed, please wait."
			echo "=== apt install -y $PKG ===" >> "$INSTALL_LOG"
			apt install -y "$PKG" >> "$INSTALL_LOG" 2>&1
			if command -v "$CMD" >/dev/null 2>&1; then
				echo " [${GREEN}I${RESET}] Package available: $CMD"
			else
				echo " [${RED}E${RESET}]: Package '$CMD' could not be installed."
				echo " [${RED}E${RESET}]: Please install '$PKG' manually using: apt install $PKG."
				echo " [${RED}E${RESET}]: See $INSTALL_LOG for the apt error output."
				echo " [${RED}E${RESET}]: Execution aborted."
				echo 
				exit 1
			fi
		else
			 echo " [${GREEN}I${RESET}] Package available: $CMD"
		fi
    fi
	if [ "$current_script_check_dependencies" -eq 1 ]; then
        if command -v "$CMD" >/dev/null 2>&1; then
            echo " [${GREEN}I${RESET}] Package available: $CMD"
        else
			echo " [${RED}E${RESET}] Package missing: $CMD"
        fi		
	fi
}

############################################################################
# Install Package with Check
############################################################################
check_and_install_pkg() {
    PKG="$1"
	if [ "$current_script_install_all" -eq 1 ]; then
		if ! is_pkg_installed "$PKG"; then
			echo " [${YELLOW}W${RESET}]: Package '$PKG' is going to be installed, please wait."
			echo "=== apt install -y $PKG ===" >> "$INSTALL_LOG"
			apt install -y "$PKG" >> "$INSTALL_LOG" 2>&1
			if is_pkg_installed "$PKG"; then
			 	echo " [${GREEN}I${RESET}] Package available: $PKG"
			else
				echo " [${RED}E${RESET}]: Package '$PKG' could not be installed."
				echo " [${RED}E${RESET}]: Please install '$PKG' manually using: apt install $PKG."
				echo " [${RED}E${RESET}]: See $INSTALL_LOG for the apt error output."
				echo " [${RED}E${RESET}]: Execution aborted."
				echo 
				exit 1
			fi
		else
			 echo " [${GREEN}I${RESET}] Package available: $PKG"
		fi
    fi
	if [ "$current_script_check_dependencies" -eq 1 ]; then
        if is_pkg_installed "$PKG"; then
            echo " [${GREEN}I${RESET}] Package available: $PKG"
        else
			echo " [${RED}E${RESET}] Package missing: $PKG"
        fi
	fi
}

############################################################################
# Install Package with Custom Check Command
############################################################################
check_and_install_pkg_cname() {
    PKG="$1"
    PKG2="$2"
	if [ "$current_script_install_all" -eq 1 ] ; then
		if ! is_pkg_installed "$PKG2"; then
			echo " [${YELLOW}W${RESET}]: Package '$PKG' is going to be installed, please wait."
			echo "=== apt install -y $PKG ===" >> "$INSTALL_LOG"
			apt install -y "$PKG" >> "$INSTALL_LOG" 2>&1
			if is_pkg_installed "$PKG"; then
			 	echo " [${GREEN}I${RESET}] Package available: $PKG"
			else
				echo " [${RED}E${RESET}]: Package '$PKG' could not be installed."
				echo " [${RED}E${RESET}]: Please install '$PKG' manually using: apt install $PKG."
				echo " [${RED}E${RESET}]: See $INSTALL_LOG for the apt error output."
				echo " [${RED}E${RESET}]: Execution aborted."
				echo 
				exit 1
			fi
		else
			 echo " [${GREEN}I${RESET}] Package available: $PKG"
		fi
    fi
	if [ "$current_script_check_dependencies" -eq 1 ]; then
        if is_pkg_installed "$PKG"; then
            echo " [${GREEN}I${RESET}] Package available: $PKG"
        else
			echo " [${RED}E${RESET}] Package missing: $PKG"
        fi
	fi
}

############################################################################
# Enable Apache2 Module
############################################################################
enable_apache_module() {
    MODULE="$1"
	if [ "$current_script_install_all" -eq 1 ]; then
		a2enmod "$MODULE" > /dev/null 2>&1 
		if [ $? -eq 0 ]; then
			echo " [${GREEN}I${RESET}] Apache2-Module enabled: $MODULE"
		else
			echo " [${RED}E${RESET}]: Apache module '$MODULE' could not be enabled."
			echo " [${RED}E${RESET}]: Please enable it manually using: a2enmod $MODULE."
			echo " [${RED}E${RESET}]: Execution aborted."
			echo 
			exit 1
		fi
	else
        if apache2ctl -M 2>/dev/null | grep -q "^ $MODULE"; then
            echo " [${GREEN}I${RESET}] Apache2-Module enabled: $MODULE"
        else
			echo " [${RED}E${RESET}] Apache2-Module seems to be disabled: $MODULE"
        fi		
	fi
}

############################################################################
# Disable Apache2 Module
############################################################################
disable_apache_module() {
    MODULE="$1"
	if [ "$current_script_install_all" -eq 1 ]; then
		a2dismod "$MODULE" > /dev/null 2>&1 
		if [ $? -eq 0 ]; then
            echo " [${GREEN}I${RESET}] Apache2-Module disabled: $MODULE"
		else
			echo " [${RED}E${RESET}]: Apache module '$MODULE' could not be disabled."
			echo " [${RED}E${RESET}]: Please disable it manually using: a2dismod $MODULE."
			echo " [${RED}E${RESET}]: Execution aborted."
			echo 
			exit 1
		fi
	else
        if apache2ctl -M 2>/dev/null | grep -q "^ $MODULE"; then
			echo " [${RED}E${RESET}] Apache2-Module seems to be enabled: $MODULE"
        else
            echo " [${GREEN}I${RESET}] Apache2-Module disabled: $MODULE"
        fi		
	fi
}

############################################################################
# Create Missing Folders
############################################################################
create_folder_if_missing() {
    DIR="$1"
	if [ "$current_script_install_all" -eq 1 ]; then
		if [ ! -d "$DIR" ]; then
			mkdir -p "$DIR" > /dev/null 2>&1 
			if [ $? -eq 0 ]; then
				echo " [${GREEN}I${RESET}] Folder created: $DIR"
			else
				echo " [${RED}E${RESET}]: Failed to create folder '$DIR'."
				echo " [${RED}E${RESET}]: Execution aborted."
				echo 
				exit 1
			fi
		else
			echo " [${GREEN}I${RESET}] Folder exists: $DIR"
		fi
	else
        if [ -d "$DIR" ]; then
            echo " [${GREEN}I${RESET}] Folder exists: $DIR"
        else
			echo " [${RED}E${RESET}] Folder missing: $DIR"
        fi		
	fi
}

########################################################################################################################################################
# Package Installation
########################################################################################################################################################
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Linux: Default Packages"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
check_and_install_pkg apache2
check_and_install_pkg software-properties-common
check_and_install_pkg nano
check_and_install_pkg git
check_and_install_pkg gcc
check_and_install_pkg make
check_and_install_pkg autoconf
check_and_install_pkg pkg-config
check_and_install_pkg imagemagick
check_and_install_pkg openssl
check_and_install_pkg redis
check_and_install_pkg curl
check_and_install_pkg cron
check_and_install_pkg tzdata
check_and_install_pkg zip
check_and_install_pkg htop
check_and_install_pkg unzip
check_and_install_pkg tmux
check_and_install_pkg redis-server
check_and_install_pkg redis-tools
check_and_install_pkg wget
check_and_install_pkg iputils-ping
check_and_install_pkg apache2-suexec-custom
check_and_install_pkg jq
check_and_install_pkg sshpass
check_and_install_pkg gzip
check_and_install_pkg tar
check_and_install_pkg python3
check_and_install_pkg perl	
check_and_install_pkg mariadb-server
check_and_install_pkg mariadb-client
check_and_install_pkg supervisor
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Linux: Development Packages"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
check_and_install_pkg libc-dev
check_and_install_pkg libonig-dev
check_and_install_pkg libpng-dev
check_and_install_pkg zlib1g-dev
check_and_install_pkg libcurl4-openssl-dev
check_and_install_pkg libicu-dev
check_and_install_pkg libxml2-dev
check_and_install_pkg libzip-dev
check_and_install_pkg libsodium-dev
check_and_install_pkg libmemcached-dev
check_and_install_pkg libssl-dev
check_and_install_pkg libtidy-dev
check_and_install_pkg libkrb5-dev
check_and_install_pkg libssh2-1-dev
#check_and_install_pkg libc-client-dev (mask by libc-client2007e-dev)
check_and_install_pkg libc-client2007e-dev
check_and_install_pkg libbz2-dev
check_and_install_pkg libmagickwand-dev
check_and_install_pkg libldap2-dev
check_and_install_pkg_cname libfreetype-dev libfreetype6-dev
check_and_install_pkg libjpeg-dev
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Linux: Server Packages"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
check_and_install_pkg jailkit
check_and_install_pkg fail2ban
check_and_install_pkg ufw
check_and_install_pkg apt-transport-https
check_and_install_pkg ca-certificates
check_and_install_pkg certbot

########################################################################################################################################################
# Docker Installation
########################################################################################################################################################
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Docker: Installation"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
if [ "$current_script_install_all" -eq 1 ]; then
	. /etc/os-release
	install -m 0755 -d /etc/apt/keyrings
	curl -fsSL "https://download.docker.com/linux/$ID/gpg" -o /etc/apt/keyrings/docker.asc 2>/dev/null
	if [ $? -ne 0 ]; then
		echo " [${RED}E${RESET}]: Failed to download the Docker repository key."
		echo " [${RED}E${RESET}]: Execution aborted."
		echo
		exit 1
	fi
	chmod a+r /etc/apt/keyrings/docker.asc
	echo " [${GREEN}I${RESET}]: Docker repository key fetched and installed."
	echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] https://download.docker.com/linux/$ID $VERSION_CODENAME stable" > /etc/apt/sources.list.d/docker.list
	echo " [${GREEN}I${RESET}]: Docker repository added to source lists."
	echo " [${YELLOW}W${RESET}]: Updating source list, please wait...."
	apt update > /dev/null 2>&1
	echo " [${GREEN}I${RESET}]: Source list updated."
fi
check_and_install_pkg docker-ce
check_and_install_pkg docker-ce-cli
check_and_install_pkg containerd.io
check_and_install_pkg docker-compose-plugin
if [ "$current_script_install_all" -eq 1 ]; then
	systemctl start docker > /dev/null 2>&1
	echo " [${GREEN}I${RESET}]: Starting docker daemon."
	systemctl enable  docker > /dev/null 2>&1
	echo " [${GREEN}I${RESET}]: Enable docker daemon system service."
fi

########################################################################################################################################################
# PHP Installation
########################################################################################################################################################	
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   PHP-8.4: Installation"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
if [ "$current_script_install_all" -eq 1 ]; then
	if ! command -v php8.4 > /dev/null 2>&1 || ! php -v | grep -q "8.4"; then
		. /etc/os-release
		if [ "$ID" = "ubuntu" ]; then
			if ! grep -rq "ondrej/php" /etc/apt/sources.list.d/ 2>/dev/null; then
				add-apt-repository -y ppa:ondrej/php > /dev/null 2>&1
				echo " [${GREEN}I${RESET}]: PHP Ondrej PPA added to sources lists."
			fi
		else
			if ! grep -rq "packages.sury.org" /etc/apt/sources.list.d/ 2>/dev/null; then
				install -m 0755 -d /etc/apt/keyrings
				curl -fsSL https://packages.sury.org/php/apt.gpg -o /etc/apt/keyrings/sury-php.gpg 2>/dev/null
				if [ $? -ne 0 ]; then
					echo " [${RED}E${RESET}]: Failed to download the PHP Sury repository key."
					echo " [${RED}E${RESET}]: Execution aborted."
					echo
					exit 1
				fi
				echo "deb [signed-by=/etc/apt/keyrings/sury-php.gpg] https://packages.sury.org/php/ $VERSION_CODENAME main" > /etc/apt/sources.list.d/sury-php.list
				echo " [${GREEN}I${RESET}]: PHP Sury Repository added to sources lists."
			fi
		fi
		echo " [${YELLOW}W${RESET}]: Updating source list, please wait...."
		apt update > /dev/null 2>&1
		echo "=== apt install -y php8.4 ===" >> "$INSTALL_LOG"
		apt install -y php8.4 >> "$INSTALL_LOG" 2>&1
		if command -v php8.4 > /dev/null 2>&1; then
			echo " [${GREEN}I${RESET}]: PHP 8.4"
		else
			echo " [${RED}E${RESET}]: Package 'PHP 8.4' could not be installed."
			echo " [${RED}E${RESET}]: Please install it manually using: apt install -y php8.4."
			echo " [${RED}E${RESET}]: See $INSTALL_LOG for the apt error output."
			echo " [${RED}E${RESET}]: Execution aborted."
			echo
			exit 1
		fi
	else
		echo " [${GREEN}I${RESET}] Package available: PHP8.4"
	fi
else
	check_and_install_pkg php8.4
fi

########################################################################################################################################################
# PHP8.4 Module Configuration
########################################################################################################################################################
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   PHP-8.4 Modules"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
#check_and_install_pkg php8.4-session
check_and_install_pkg php8.4-cli
check_and_install_pkg_cname php8.4-mysql php8.4-mysqli
check_and_install_pkg php8.4-xml
check_and_install_pkg php8.4-mbstring
check_and_install_pkg php8.4-curl
check_and_install_pkg php8.4-zip
#check_and_install_pkg php8.4-filter
#check_and_install_pkg php8.4-ctype
#check_and_install_pkg php8.4-fileinfo
check_and_install_pkg php8.4-intl
check_and_install_pkg php8.4-common
check_and_install_pkg php8.4-soap
check_and_install_pkg php8.4-opcache
check_and_install_pkg php8.4-gd
check_and_install_pkg php8.4-bcmath
#check_and_install_pkg php8.4-json
#check_and_install_pkg php8.4-hash
#check_and_install_pkg php8.4-dom
#check_and_install_pkg php8.4-exif
check_and_install_pkg php8.4-bz2
check_and_install_pkg php8.4-imap
#check_and_install_pkg php8.4-sockets
check_and_install_pkg php8.4-tidy
check_and_install_pkg php8.4-ssh2
check_and_install_pkg php8.4-imagick
#check_and_install_pkg php8.4-sodium
check_and_install_pkg php8.4-sqlite3
check_and_install_pkg php8.4-ldap
#check_and_install_pkg php8.4-openssl
check_and_install_pkg php8.4-memcached
check_and_install_pkg php8.4-redis
#check_and_install_pkg php8.4-simplexml
check_and_install_pkg php8.4-fpm

########################################################################################################################################################
# Apache2 Module Configuration
########################################################################################################################################################	
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Apache2: Default Modules"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
enable_apache_module ssl
enable_apache_module rewrite
enable_apache_module headers
enable_apache_module cgi
enable_apache_module cgid
enable_apache_module remoteip
enable_apache_module deflate
enable_apache_module http2
enable_apache_module proxy
enable_apache_module proxy_http
enable_apache_module proxy_ftp
enable_apache_module proxy_fcgi
enable_apache_module proxy_balancer
enable_apache_module suexec	
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Apache2: HTTP2 Setup"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
disable_apache_module php8.4
disable_apache_module mpm_prefork
enable_apache_module mpm_event	

########################################################################################################################################################
# End of Dependencies
########################################################################################################################################################
if [ "$current_script_check_dependencies" -eq 1 ]; then
	echo	
	echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "   End of 'check' script."
	echo "   Thank you for using suitefish-cms."
	echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	echo
	exit 0
fi

########################################################################################################################################################
# Folders Initialization
########################################################################################################################################################
echo	
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Initialization: Folders"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
create_folder_if_missing /suitefish
create_folder_if_missing /suitefish/log
create_folder_if_missing /suitefish/web
create_folder_if_missing /suitefish/cache
create_folder_if_missing /suitefish/backup
create_folder_if_missing /suitefish/ssl	

########################################################################################################################################################
# Backup old Settings
########################################################################################################################################################
echo	
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Initialization: Backup"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
TIMESTAMP=$(date +"%Y%m%d%H%M%S")
BACKUPFOLDER="/suitefish/backup/$TIMESTAMP"
BACKUPFOLDER_SUPERVISOR="/suitefish/backup/$TIMESTAMP/supervisor"
BACKUPFOLDER_APACHE="/suitefish/backup/$TIMESTAMP/apache2"
BACKUPFOLDER_SF="/suitefish/backup/$TIMESTAMP/web"
BACKUPFOLDER_SSL="/suitefish/backup/$TIMESTAMP/ssl"

if [ ! -d "$BACKUPFOLDER_SUPERVISOR" ]; then
	mkdir -p "$BACKUPFOLDER_SUPERVISOR" > /dev/null 2>&1
	if [ ! $? -eq 0 ]; then
		echo " [${RED}E${RESET}]: Failed to create folder '$BACKUPFOLDER_SUPERVISOR'."
		echo " [${RED}E${RESET}]: Execution aborted."
		echo 
		exit 1
	fi
else
	echo " [${GREEN}I${RESET}]: Folder '$BACKUPFOLDER_SUPERVISOR' already exists."
fi
cp -r /etc/supervisor/* "$BACKUPFOLDER_SUPERVISOR/" > /dev/null 2>&1
if [ $? -eq 0 ]; then
	echo " [${GREEN}I${RESET}]: Supervisor configuration backup to '$BACKUPFOLDER_SUPERVISOR'."
else
	echo " [${RED}E${RESET}]: Failed to backup Supervisor configuration."
	echo " [${RED}E${RESET}]: Execution aborted."
	echo 
	exit 1
fi	
if [ ! -d "$BACKUPFOLDER_APACHE" ]; then
	mkdir -p "$BACKUPFOLDER_APACHE" > /dev/null 2>&1
	if [ ! $? -eq 0 ]; then
		echo " [${RED}E${RESET}]: Failed to create folder '$BACKUPFOLDER_APACHE'."
		echo " [${RED}E${RESET}]: Execution aborted."
		echo 
		exit 1
	fi
else
	echo " [${GREEN}I${RESET}]: Folder '$BACKUPFOLDER_APACHE' already exists."
fi
cp -r /etc/apache2/* "$BACKUPFOLDER_APACHE/" > /dev/null 2>&1
if [ $? -eq 0 ]; then
	echo " [${GREEN}I${RESET}]: Apache2 configuration backup to '$BACKUPFOLDER_APACHE'."
else
	echo " [${RED}E${RESET}]: Failed to backup Apache2 configuration."
	echo " [${RED}E${RESET}]: Execution aborted."
	echo 
	exit 1
fi	
if [ ! -d "$BACKUPFOLDER_SF" ]; then
	mkdir -p "$BACKUPFOLDER_SF" > /dev/null 2>&1
	if [ ! $? -eq 0 ]; then
		echo " [${RED}E${RESET}]: Failed to create folder '$BACKUPFOLDER_SF'."
		echo " [${RED}E${RESET}]: Execution aborted."
		echo
		exit 1
	fi
else
	echo " [${GREEN}I${RESET}]: Folder '$BACKUPFOLDER_SF' already exists."
fi
mv /suitefish/web "$BACKUPFOLDER_SF/" > /dev/null 2>&1
if [ $? -eq 0 ]; then
	echo " [${GREEN}I${RESET}]: Source Code backup to '$BACKUPFOLDER_SF'."
else
	echo " [${RED}E${RESET}]: Failed to backup Suitefish Source."
	echo " [${RED}E${RESET}]: Execution aborted."
	echo
	exit 1
fi	
if [ ! -d "$BACKUPFOLDER_SSL" ]; then
	mkdir -p "$BACKUPFOLDER_SSL" > /dev/null 2>&1 
	if [ ! $? -eq 0 ]; then
		echo " [${RED}E${RESET}]: Failed to create folder '$BACKUPFOLDER_SSL'."
		echo " [${RED}E${RESET}]: Execution aborted."
		echo 
		exit 1
	fi
else
	echo " [${GREEN}I${RESET}]: Folder '$BACKUPFOLDER_SF' already exists."
fi
mv /suitefish/ssl "$BACKUPFOLDER_SSL/" > /dev/null 2>&1 
if [ $? -eq 0 ]; then
	echo " [${GREEN}I${RESET}]: Current SSL Certificate backup to '$BACKUPFOLDER_SSL'."
else
	echo " [${RED}E${RESET}]: Failed to backup Current SSL Certificate."
	echo " [${RED}E${RESET}]: Execution aborted."
	echo 
	exit 1
fi	
if [ ! -d "/suitefish/web" ]; then
	mkdir -p "/suitefish/web" > /dev/null 2>&1 
	if [ ! $? -eq 0 ]; then
		echo " [${RED}E${RESET}]: Failed to create folder '/suitefish/web'."
		echo " [${RED}E${RESET}]: Execution aborted."
		echo 
		exit 1
	fi
	echo " [${GREEN}I${RESET}]: Folder '/suitefish/web' created."
else
	echo " [${GREEN}I${RESET}]: Folder '/suitefish/web' already exists."
fi	

########################################################################################################################################################
# Download current repository Package
########################################################################################################################################################
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Download: Suitefish-CMS"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
if [ -f "/suitefish/cache/release.zip" ]; then
	unlink /suitefish/cache/release.zip
	echo "[${YELLOW}W${RESET}]: Existing release file removed: /suitefish/cache/release.zip"
fi
wget -q "https://github.com/bugfishtm/suitefish-cms/archive/refs/heads/main.zip" -O "/suitefish/cache/release.zip"
if [ $? -eq 0 ]; then
	echo " [${GREEN}I${RESET}]: Download of suitefish-cms successfull."
else
	echo " [${RED}E${RESET}]: Failed to download the cms release file by url:"
	echo " [${RED}E${RESET}]: https://github.com/bugfishtm/suitefish-cms/archive/refs/heads/main.zip."
	echo " [${RED}E${RESET}]: Execution aborted."
	echo 
	exit 1
fi
if [ -d "/suitefish/cache/suitefish-cms-main" ]; then
	rm -rf "/suitefish/cache/suitefish-cms-main"
	echo "[${YELLOW}W${RESET}]: Existing extracted folder removed: /suitefish/cache/suitefish-cms-main"
fi
if [ -f "/suitefish/cache/release.zip" ]; then
	unzip -q "/suitefish/cache/release.zip" -d "/suitefish/cache/"
	if [ $? -eq 0 ]; then
		echo " [${GREEN}I${RESET}]: Extraction of suitefish release successfull."
	else
		echo " [${RED}E${RESET}]: Failed to extract the CMS release file."
		echo " [${RED}E${RESET}]: Execution aborted."
		echo 
		exit 1
	fi
else
	echo " [${RED}E${RESET}]: Suitefish release file '/suitefish/cache/release.zip' not found."
	echo " [${RED}E${RESET}]: Execution aborted."
	echo 
	exit 1
fi		

########################################################################################################################################################
# Certificate Setup (Letsencrypt)
########################################################################################################################################################
SF_SSL_PATH_CERT=""
SF_SSL_PATH_KEY=""
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Setup: SSL Certificate"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
echo "[${YELLOW}W${RESET}]: User input required... (see below)"
SF_LE_ENABLE=""
while true; do
  printf " Do you want to use LetsEncrypt to issue a certificate? (y/n): "
  read SF_LE_ENABLE
  case "$SF_LE_ENABLE" in
    [yY]|[nN]) break ;;
    *) echo " Do you want to use LetsEncrypt to issue a certificate? (y/n): " ;;
  esac
done
if [ "$SF_LE_ENABLE" = "y" ] || [ "$SF_LE_ENABLE" = "Y" ]; then
	printf " Enter your public website domain (example.domain): "
	read SF_LE_DOMAIN
	printf " Enter the LetsEncrypt account mail (example@localhost): "
	read SF_LE_MAIL
	systemctl stop apache2 > /dev/null 2>&1
	echo " [${GREEN}I${RESET}]: Terminating apache2 process."
	echo " [${GREEN}I${RESET}]: Starting LetsEncrypt SSl-Certificate Generation."
	certbot certonly --standalone \
		--non-interactive \
		--agree-tos \
		--email "$SF_LE_MAIL" \
		-d "$SF_LE_DOMAIN" > /dev/null 2>&1
	SF_SSL_PATH_CERT="/etc/letsencrypt/live/$SF_LE_DOMAIN/cert.pem"
	SF_SSL_PATH_KEY="/etc/letsencrypt/live/$SF_LE_DOMAIN/privkey.pem"
	if [ -f "$SF_SSL_PATH_CERT" ] && [ -f "$SF_SSL_PATH_KEY" ]; then
		echo " [${GREEN}I${RESET}]: Using Let's Encrypt certificate and key."
	else
		echo " [${RED}E${RESET}]: Error while creating Let's Encrypt certificate and key."
		echo "[${YELLOW}W${RESET}]: Fallback to Custom Certificate creation."
		SF_LE_ENABLE="n"
		echo " [${GREEN}I${RESET}]: Starting Custom Certificate creation."
		if [ ! -d "/suitefish/ssl" ]; then
			mkdir -p "/suitefish/ssl" > /dev/null 2>&1
			if [ ! $? -eq 0 ]; then
				echo " [${RED}E${RESET}]: Failed to create folder '/suitefish/ssl'."
				echo " [${RED}E${RESET}]: Execution aborted."
				echo
				exit 1
			fi
			echo " [${GREEN}I${RESET}]: Folder '/suitefish/ssl' created."
		else
			echo " [${GREEN}I${RESET}]: Folder '/suitefish/ssl' already exists."
		fi
		openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
		 -keyout /suitefish/ssl/privkey.pem \
		 -out /suitefish/ssl/cert.pem \
		 -subj "/C=US/ST=State/L=City/O=Organization/OU=OrgUnit/CN=example.com" > /dev/null 2>&1
		if [ ! $? -eq 0 ]; then
			echo " [${RED}E${RESET}]: Failed to create ssl certificate."
			echo " [${RED}E${RESET}]: Execution aborted."
			echo 
			exit 1
		fi
		echo " [${GREEN}I${RESET}]: Self-signed ssl certificate created."
		SF_SSL_PATH_CERT="/suitefish/ssl/cert.pem"
		SF_SSL_PATH_KEY="/suitefish/ssl/privkey.pem"	  
	fi
fi

########################################################################################################################################################
# Certificate Setup (Custom)
########################################################################################################################################################
if [ "$SF_LE_ENABLE" = "n" ] || [ "$SF_LE_ENABLE" = "N" ]; then
	echo " [${GREEN}I${RESET}]: Starting Custom Certificate creation."
	if [ ! -d "/suitefish/ssl" ]; then
		mkdir -p "/suitefish/ssl" > /dev/null 2>&1
		if [ ! $? -eq 0 ]; then
			echo " [${RED}E${RESET}]: Failed to create folder '/suitefish/ssl'."
			echo " [${RED}E${RESET}]: Execution aborted."
			echo
			exit 1
		fi
		echo " [${GREEN}I${RESET}]: Folder '/suitefish/ssl' created."
	else
		echo " [${GREEN}I${RESET}]: Folder '/suitefish/ssl' already exists."
	fi
	openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
	 -keyout /suitefish/ssl/privkey.pem \
	 -out /suitefish/ssl/cert.pem \
	 -subj "/C=US/ST=State/L=City/O=Organization/OU=OrgUnit/CN=example.com" > /dev/null 2>&1
	if [ ! $? -eq 0 ]; then
		echo " [${RED}E${RESET}]: Failed to create ssl certificate."
		echo " [${RED}E${RESET}]: Execution aborted."
		echo 
		exit 1
	fi
	echo " [${GREEN}I${RESET}]: Self-signed ssl certificate created."
	SF_SSL_PATH_CERT="/suitefish/ssl/cert.pem"
	SF_SSL_PATH_KEY="/suitefish/ssl/privkey.pem"
fi

########################################################################################################################################################
# MySQL Setup
########################################################################################################################################################
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Setup: MySQL"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
echo " [${YELLOW}W${RESET}]: User input required... (see below)"
# Initial Data
printf " Enter MySQL database name to be created: "
read DB_NAME
case "$DB_NAME" in
	*[!A-Za-z0-9_]*|"")
		echo " [${RED}E${RESET}]: Invalid database name. Only letters, numbers and underscores are allowed."
		echo " [${RED}E${RESET}]: Execution aborted."
		echo
		exit 1
		;;
esac
printf " Enter MySQL username to be created: "
read DB_USER
case "$DB_USER" in
	*[!A-Za-z0-9_]*|"")
		echo " [${RED}E${RESET}]: Invalid username. Only letters, numbers and underscores are allowed."
		echo " [${RED}E${RESET}]: Execution aborted."
		echo
		exit 1
		;;
esac
printf " Enter new password for MySQL user '$DB_USER': "
stty -echo 2>/dev/null
read DB_PASS
stty echo 2>/dev/null
echo
DB_PASS_SQL=$(escape_squote "$DB_PASS")
# Check for Root Password
mysql -u root -e "SELECT 1;" > /dev/null 2>&1
if [ $? -eq 0 ]; then
	echo " [${YELLOW}W${RESET}]: MySQL root account has NO password set."
	echo " [${YELLOW}W${RESET}]: User input required... (see below)"
	printf " Enter new MySQL root password: "
	stty -echo 2>/dev/null
	read ROOT_PASS
	stty echo 2>/dev/null
	echo
	ROOT_PASS_SQL=$(escape_squote "$ROOT_PASS")
	mysql -u root -e "ALTER USER 'root'@'localhost' IDENTIFIED BY '$ROOT_PASS_SQL';" > /dev/null 2>&1
	echo " [${GREEN}I${RESET}]: MySQL Root Account Password changed."
else
	echo " [${YELLOW}W${RESET}]: MySQL root account has a password set."
	echo " [${YELLOW}W${RESET}]: User input required... (see below)"
	printf " Enter the current MySQL root password: "
	stty -echo 2>/dev/null
	read ROOT_PASS
	stty echo 2>/dev/null
	echo
	MYSQL_PWD="$ROOT_PASS" mysql -u root -e "SELECT 1;" > /dev/null 2>&1
	if [ $? -eq 0 ]; then
		echo " [${GREEN}I${RESET}]: Correct MySQL root password provided."
	else
		echo " [${RED}E${RESET}]: Incorrect MySQL root password or authentication failed."
		echo " [${RED}E${RESET}]: Execution aborted."
		echo
		exit 1
	fi
fi
# Check if database already exists
DB_EXISTS=$(MYSQL_PWD="$ROOT_PASS" mysql -u root -e "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$DB_NAME';" -N -B 2>/dev/null)
if [ "$DB_EXISTS" = "$DB_NAME" ]; then
	echo " [${YELLOW}W${RESET}]: Database '$DB_NAME' already exists."
	echo " [${YELLOW}W${RESET}]: User input required... (see below)"
	printf " Do you want to delete the current database '$DB_NAME' and create a new one? (y/N): "
	read CONFIRM
	case "$CONFIRM" in
		y|Y)
			MYSQL_PWD="$ROOT_PASS" mysql -u root -e "DROP DATABASE \`$DB_NAME\`;" > /dev/null 2>&1
			if [ $? -eq 0 ]; then
				echo " [${GREEN}I${RESET}]: Database '$DB_NAME' has been deleted."
			else
				echo " [${RED}E${RESET}]: Failed to delete database '$DB_NAME'."
				echo " [${RED}E${RESET}]: Execution aborted."
				echo
				exit 1
			fi
			;;
		*)
			echo " [${RED}E${RESET}]: Execution aborted."
			echo
			exit 1
			;;
	esac
fi
# Create Database
MYSQL_PWD="$ROOT_PASS" mysql -u root -e "CREATE DATABASE IF NOT EXISTS \`$DB_NAME\`;" > /dev/null 2>&1
if [ $? -eq 0 ]; then
	echo " [${GREEN}I${RESET}]: Database '$DB_NAME' created successfully."
else
	echo " [${RED}E${RESET}]: Failed to create database '$DB_NAME'."
	echo " [${RED}E${RESET}]: Execution aborted."
	echo
	exit 1
fi
# Create the user and grant privileges
MYSQL_PWD="$ROOT_PASS" mysql -u root -e "CREATE USER IF NOT EXISTS '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASS_SQL';" > /dev/null 2>&1
MYSQL_PWD="$ROOT_PASS" mysql -u root -e "GRANT ALL PRIVILEGES ON \`$DB_NAME\`.* TO '$DB_USER'@'localhost';" > /dev/null 2>&1
MYSQL_PWD="$ROOT_PASS" mysql -u root -e "FLUSH PRIVILEGES;" > /dev/null 2>&1
if [ $? -eq 0 ]; then
	echo " [${GREEN}I${RESET}]: User '$DB_USER' created and granted full privileges on '$DB_NAME'."
else
	echo " [${RED}E${RESET}]: Failed to create user or grant privileges."
	echo " [${RED}E${RESET}]: Execution aborted."
	echo
	exit 1
fi

########################################################################################################################################################
# Cronjob Setup
########################################################################################################################################################
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Setup: Cronjobs"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
# Files in /etc/cron.d are picked up by cron directly. They must be owned by
# root and not be group/other-writable, otherwise cron silently ignores them.
# Do NOT load them with 'crontab' - that would install them as a user crontab
# where the extra user field is invalid syntax.
CRON_FILE="/etc/cron.d/suitefish"
cat > "$CRON_FILE" <<EOL
*/5 * * * * suitefish /usr/bin/php8.4 /suitefish/web/_cronjob/cronjob.php > /dev/null 2>&1
EOL
chown root:root "$CRON_FILE"
chmod 0644 "$CRON_FILE"
echo " [${GREEN}I${RESET}]: Cron job installed for user 'suitefish': $CRON_FILE"
CRON_FILE="/etc/cron.d/suitefish-certbot"
cat > "$CRON_FILE" <<EOL
0 0 */14 * * root certbot renew --quiet --deploy-hook 'systemctl restart apache2' >> /var/log/letsencrypt/renew.log 2>&1
EOL
chown root:root "$CRON_FILE"
chmod 0644 "$CRON_FILE"
echo " [${GREEN}I${RESET}]: Cron job installed for user 'root': $CRON_FILE"

########################################################################################################################################################
# Supervisor Setup
########################################################################################################################################################
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Setup: Supervisor"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
# Supervisor has no restart-delay setting, so the worker is wrapped in a
# shell loop: run the script, wait 5 seconds after it finishes, run it again.
# Supervisor keeps exactly one instance alive, so it never runs in parallel.
SUPERVISOR_CONF="/etc/supervisor/conf.d/suitefish.conf"
SUPERVISOR_CONTENT="[program:suitefish]
command=/bin/sh -c 'while true; do /usr/bin/php8.4 /suitefish/web/_core/worker.php; sleep 5; done'
user=root
autostart=true
autorestart=true
startsecs=0
stopasgroup=true
killasgroup=true
stopwaitsecs=30
stderr_logfile=/suitefish/log/daemon_error.log
stdout_logfile=/suitefish/log/daemon_log.log
environment=SUITEFISH_SUPERVISOR_LOG_FILE=\"/suitefish/log/daemon_log.log\",SUITEFISH_SUPERVISOR_ERROR_FILE=\"/suitefish/log/daemon_error.log\",SUITEFISH_WEBSERVER_USER=\"suitefish\",SUITEFISH_WEBROOT=\"/suitefish/web\""
if [ -f "$SUPERVISOR_CONF" ]; then
	unlink "$SUPERVISOR_CONF"
	echo " [${YELLOW}W${RESET}]: Supervisor config overwritten: $SUPERVISOR_CONF"
fi
echo "$SUPERVISOR_CONTENT" > "$SUPERVISOR_CONF"
if [ $? -eq 0 ]; then
	echo " [${GREEN}I${RESET}]: Supervisor config created: $SUPERVISOR_CONF"
else
	echo " [${RED}E${RESET}]: Failed to create Supervisor config."
	echo " [${RED}E${RESET}]: Execution aborted."
	echo
	exit 1
fi
echo " [${GREEN}I${RESET}]: Supervisor configuration written...";	
echo	

########################################################################################################################################################
# Apache2 Setup
########################################################################################################################################################
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Setup: Apache2"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
CONF_DIR="/etc/apache2/sites-available"
CONF_FILE="suitefish.conf"
CONF_PATH="$CONF_DIR/$CONF_FILE"
if [ ! -d "$CONF_DIR" ]; then
	mkdir -p "$CONF_DIR" > /dev/null 2>&1
	if [ $? -eq 0 ]; then
		echo " [${GREEN}I${RESET}]: Directory '$CONF_DIR' created."
	else
		echo " [${RED}E${RESET}]: Failed to create directory '$CONF_DIR'."
		echo " [${RED}E${RESET}]: Execution aborted."
		echo
		exit 1
	fi
fi
a2dissite 000-default > /dev/null 2>&1
echo " [${GREEN}I${RESET}]: Disabled Default 000-default apache2 website."
a2dissite default-ssl > /dev/null 2>&1
echo " [${GREEN}I${RESET}]: Disabled Default default-ssl apache2 website."
unlink "$CONF_DIR/$CONF_FILE" > /dev/null 2>&1	
echo " [${GREEN}I${RESET}]: Deleting $CONF_PATH."
cat > "$CONF_PATH" <<EOL
<VirtualHost *:80>

	# Set Document Root
	DocumentRoot /suitefish/web

	# Logs for Apache
	ErrorLog /suitefish/log/apache2_error.log
	CustomLog /suitefish/log/apache2_access.log combined
	
	## No Indexes but index.php
	DirectoryIndex disabled
	DirectoryIndex index.php index.html

	# Run this VirtualHost as 'suitefish'
	SuexecUserGroup suitefish suitefish
	
	# Deflate Module
	<IfModule mod_deflate.c>
		AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript application/x-javascript application/json application/xml
		AddOutputFilterByType DEFLATE image/svg+xml application/x-font-ttf application/x-font-opentype
		BrowserMatch ^Mozilla/4 gzip-only-text/html
		BrowserMatch ^Mozilla/4\.0[678] no-gzip
		BrowserMatch \bMSIE !no-gzip !gzip-only-text/html
	</IfModule>
 
    # Security Headers
    Header always set Strict-Transport-Security "max-age=63072000; includeSubDomains"
    Header set X-XSS-Protection "1; mode=block" 
    Header set X-Content-Type-Options nosniff
    Header set X-Frame-Options "sameorigin"
    Header set Referrer-Policy "same-origin" 

	## HTTP2
	Protocols h2 http/1.1
	
	## PHP Handler
	<FilesMatch \.php$>
		SetHandler "proxy:unix:/var/run/php/suitefish.sock|fcgi://localhost"
	</FilesMatch>
	
	## Directory Preferences
	<Directory /suitefish/web>
		Options -Indexes
		AllowOverride All
		Require all granted
	</Directory>

</VirtualHost>
<VirtualHost *:443>

	# Set Document Root
	DocumentRoot /suitefish/web

	# Logs for Apache
	ErrorLog /suitefish/log/apache2_error.log
	CustomLog /suitefish/log/apache2_access.log combined
	
	## No Indexes but index.php
	DirectoryIndex disabled
	DirectoryIndex index.php index.html

	# Run this VirtualHost as 'suitefish'
	SuexecUserGroup suitefish suitefish
	
	# Deflate Module
	<IfModule mod_deflate.c>
		AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript application/x-javascript application/json application/xml
		AddOutputFilterByType DEFLATE image/svg+xml application/x-font-ttf application/x-font-opentype
		BrowserMatch ^Mozilla/4 gzip-only-text/html
		BrowserMatch ^Mozilla/4\.0[678] no-gzip
		BrowserMatch \bMSIE !no-gzip !gzip-only-text/html
	</IfModule>
 
    # Security Headers
    Header always set Strict-Transport-Security "max-age=63072000; includeSubDomains"
    Header set X-XSS-Protection "1; mode=block" 
    Header set X-Content-Type-Options nosniff
    Header set X-Frame-Options "sameorigin"
    Header set Referrer-Policy "same-origin" 

	## HTTP2
	Protocols h2 http/1.1
	
	## PHP Handler
	<FilesMatch \.php$>
		SetHandler "proxy:unix:/var/run/php/suitefish.sock|fcgi://localhost"
	</FilesMatch>

	## Directory Preferences
	<Directory /suitefish/web>
		Options -Indexes
		AllowOverride All
		Require all granted
	</Directory>
	
	# SSL Certificate Files
	SSLEngine on
	SSLCertificateFile $SF_SSL_PATH_CERT
	SSLCertificateKeyFile $SF_SSL_PATH_KEY

</VirtualHost>
EOL
# Check if the file was created successfully
if [ -f "$CONF_PATH" ]; then
	echo " [${GREEN}I${RESET}]: Apache VirtualHost configuration file created at '$CONF_PATH'."
else
	echo " [${RED}E${RESET}]: Failed to create Apache VirtualHost configuration file."
	echo " [${RED}E${RESET}]: Execution aborted."
	echo
	exit 1
fi
# Enable the site and restart Apache
a2ensite "$CONF_FILE" > /dev/null 2>&1
if [ $? -eq 0 ]; then
	echo " [${GREEN}I${RESET}]: VirtualHost '$CONF_FILE' enabled."
else
	echo " [${RED}E${RESET}]: Failed to entable 'suitefish' virtualhost "
	echo " [${RED}E${RESET}]: config file on apache2, try using: a2ensite $CONF_FILE."
	echo " [${RED}E${RESET}]: Execution aborted."
	echo
	exit 1
fi	

########################################################################################################################################################
# Suitefish Folder Setup
# (must run BEFORE settings.php generation, otherwise a settings.php
# shipped in the release would overwrite the generated one)
########################################################################################################################################################
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Setup: Suitefish Folder"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
SRC_DIR="/suitefish/cache/suitefish-cms-main/_source"
DEST_DIR="/suitefish/web"
cp -r "$SRC_DIR"/* "$DEST_DIR"/ > /dev/null 2>&1
if [ $? -eq 0 ]; then
	echo " [${GREEN}I${RESET}]: Files copied from '$SRC_DIR' to '$DEST_DIR' successfully."
else
	echo " [${RED}E${RESET}]: Failed to copy files."
	echo " [${RED}E${RESET}]: Execution aborted."
	echo
	exit 1
fi

########################################################################################################################################################
# Suitefish Settings Setup
########################################################################################################################################################
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Setup: Suitefish"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
SFS_DIR="/suitefish/web"
SFS_FILE="settings.php"
SFS_PATH="$SFS_DIR/$SFS_FILE"
unlink "$SFS_DIR/$SFS_FILE" > /dev/null 2>&1
CURRENT_DATE_FORCONF=$(date)
random20=$(tr -dc 'a-zA-Z0-9' </dev/urandom | head -c 30)
cat > "$SFS_PATH" <<EOL
<?php
	#	 ____  _   _ ___ _____ _____ _____ ___ ____  _   _ 
	#	/ ___|| | | |_ _|_   _| ____|  ___|_ _/ ___|| | | |
	#	\___ \| | | || |  | | |  _| | |_   | |\___ \| |_| |
	#	 ___) | |_| || |  | | | |___|  _|  | | ___) |  _  |
	#	|____/ \___/|___| |_| |_____|_|   |___|____/|_| |_|                       
	#									  __       _  _  _  _ __    __ 
	#									 / /(\/\/)( \( \( \( \\ \  / / 
	#									( (  )  (  ) )) )) )) )) )( (  
	#									 \_\(/\/\)(_/(_/(_/(_//_/  \_\ 
	
	#	Copyright (C) 2026 Jan Maurice Dahlmanns [Bugfish]
	#	This file is part of the core library and is NOT included
	#	in any sublicense or third-party license agreements.

	#	This program is free software: you can redistribute it and/or modify
	#	it under the terms of the GNU General Public License as published by
	#	the Free Software Foundation, either version 3 of the License, or
	#	(at your option) any later version.

	#	This program is distributed in the hope that it will be useful,
	#	but WITHOUT ANY WARRANTY; without even the implied warranty of
	#	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	#	GNU General Public License for more details.

	#	You should have received a copy of the GNU General Public License
	#	along with this program.  If not, see <https://www.gnu.org/licenses/>.
		
	#	File Description:	
	#		Suitefish Settings File (Auto-Installer Instance)
	#		This file has been generated by the suitefish-installer.sh script.
	#		Generated at $CURRENT_DATE_FORCONF

	/***********************************************************************************************************
		MySQL Settings
	***********************************************************************************************************/	
		\$mysql['host'] 		= '127.0.0.1'; 			// MySQL Hostname, usually 'localhost' if your database is on the same server (mandatory)
		\$mysql['port'] 		= '3306'; 				// MySQL Port, the default port for MySQL is 3306 (can be left unchanged)
		\$mysql['user'] 		= '$DB_USER'; 			// MySQL User, replace 'MYSQL_USER' with your actual MySQL username (mandatory)
		\$mysql['pass'] 		= '$(escape_squote "$DB_PASS")'; 			// MySQL Password, replace 'MYSQL_PASSWORD' with your actual MySQL password (mandatory)
		\$mysql['db'] 			= '$DB_NAME'; 			// MySQL Database, replace 'MYSQL_DATABASE' with the name of your database (mandatory)
		\$mysql['prefix'] 		= 'sf_'; 				// Prefix for MySQL tables, this is useful if you're sharing the database with other applications (can be left unchanged)

	/***********************************************************************************************************
		Site Settings
	***********************************************************************************************************/	
		\$object['cookie'] 		= 'sf_'; 				// Cookie Prefix, used to uniquely identify the cookies for this application (can be left unchanged)
		\$object['path'] 		= '/suitefish/web/'; 	// Full Path to the application's root directory on the server (mandatory)
		\$object['url'] 		= 'https://example'; 	// Full URL to the site, change 'https://example' to your site's URL (optional, but recommended)

	/***********************************************************************************************************
		All Docker Instances should have this Constant set to true.
		Can have name of module as value which its specialized for in docker
	***********************************************************************************************************/	
		if(!defined("_HIVE_IS_IN_DOCKER_")) { define("_HIVE_IS_IN_DOCKER_", false); } 		
		
	/***********************************************************************************************************
		Secret Key
	***********************************************************************************************************/
		\$object['secret_key']	= "$random20";  // Use a random number or String

EOL
if [ -f "$SFS_PATH" ]; then
	echo " [${GREEN}I${RESET}]: Suitefish Settings file created at '$SFS_PATH'."
else
	echo " [${RED}E${RESET}]: Failed to create suitefish configuration file."
	echo " [${RED}E${RESET}]: Execution aborted."
	echo
	exit 1
fi

########################################################################################################################################################
# Users & Groups Setup
########################################################################################################################################################
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Setup: Users & Groups"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
USER="suitefish"
GROUP="suitefish"
if ! getent group "$GROUP" >/dev/null 2>&1; then
	groupadd "$GROUP"
	echo " [${GREEN}I${RESET}]: Group '$GROUP' created."
else
	echo " [${YELLOW}W${RESET}]: Group '$GROUP' already exists."
fi
if ! id "$USER" >/dev/null 2>&1; then
	useradd -g "$GROUP" -s /usr/sbin/nologin -M -d /suitefish "$USER" > /dev/null 2>&1
	if [ $? -eq 0 ]; then
		echo " [${GREEN}I${RESET}]: User '$USER' created and linked to group '$GROUP'."
	else
		echo " [${RED}E${RESET}]: Failed to create user '$USER'."
		echo " [${RED}E${RESET}]: Execution aborted."
		echo
		exit 1
	fi
else
	echo " [${YELLOW}W${RESET}]: User '$USER' already exists."
fi
passwd -l "$USER" > /dev/null 2>&1
echo " [${GREEN}I${RESET}]: Disabled password login for user '$USER'."	
APACHE_USER="www-data"
GROUP_NAME="suitefish"
WEB_ROOT="/suitefish/web"
sudo usermod -a -G "$GROUP_NAME" "$APACHE_USER"
echo " [${GREEN}I${RESET}]: Linked Apache user ($APACHE_USER) to group ($GROUP_NAME)..."

########################################################################################################################################################
# PHP Setup
########################################################################################################################################################
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Setup: PHP"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
# Variables
POOL_NAME="suitefish"
POOL_USER="suitefish"
POOL_GROUP="suitefish"
POOL_CONFIG="/etc/php/8.4/fpm/pool.d/${POOL_NAME}.conf"
SOCKET_PATH="/var/run/php/${POOL_NAME}.sock"
# Check if pool config already exists
if [ -f "$POOL_CONFIG" ]; then
   unlink "$POOL_CONFIG"
   echo " [${YELLOW}W${RESET}]: Pool configuration overwritten: $POOL_CONFIG."
fi
# Create FPM pool configuration
cat << EOF > "$POOL_CONFIG"
[$POOL_NAME]
user = $POOL_USER
group = $POOL_GROUP
listen = $SOCKET_PATH
listen.owner = $POOL_USER
listen.group = $POOL_GROUP
pm = dynamic
pm.max_children = 75
pm.start_servers = 10
pm.min_spare_servers = 5
pm.max_spare_servers = 20
pm.process_idle_timeout = 10s
php_admin_flag[log_errors] = on
php_admin_value[error_log] = /suitefish/log/php_error.log
php_admin_flag[display_errors] = off
EOF
echo " [${GREEN}I${RESET}]: FPM pool config for $POOL_NAME created at $POOL_CONFIG"

########################################################################################################################################################
# Letsencrypt Setup (Deprecated, Replaced with function at top)
########################################################################################################################################################
#echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
#echo "  Add Letsencrypt certificate"
#echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
#
#read -p "  Do you want to install Certbot (Let's Encrypt client)? [y/N]: " install_certbot
#if [ "$install_certbot" = "y" ] || [ "$install_certbot" = "Y" ]; then
#	echo
#	echo "  [${GREEN}I${RESET}]: Installing certbot using apt..."
#	sudo apt-get install -y certbot >/dev/null 2>&1		
#	echo
#	read -p "  Enter the domain name for your website (e.g., example.com): " domain
#	echo
#	echo "  Requesting certificate for $domain using webroot /suitefish/web..."
#	sudo certbot certonly --webroot -w /suitefish/web -d "$domain"
#	if [ ! -d "/etc/letsencrypt/live/$domain" ]; then
#		echo "  [${RED}E${RESET}]: Certificate request failed or directory not found."
#	else
#		echo
#		echo "  Copying certificate and private key to /suitefish/ssl/ ..."
#		sudo mkdir -p /suitefish/ssl/
#		sudo cp "/etc/letsencrypt/live/$domain/privkey.pem" /suitefish/ssl/privkey.pem
#		sudo cp "/etc/letsencrypt/live/$domain/fullchain.pem" /suitefish/ssl/cert.pem
#		sudo chmod 600 /suitefish/ssl/privkey.pem /suitefish/ssl/cert.pem
#		echo
#		echo "  [${GREEN}I${RESET}]: Let's Encrypt certificate created and installed at:"
#		echo "      /suitefish/ssl/privkey.pem"
#		echo "      /suitefish/ssl/cert.pem"
#	fi		
#fi

########################################################################################################################################################
# Permissions Setup
########################################################################################################################################################
echo	
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Setup: Permissions"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
echo " [${GREEN}I${RESET}]: Owner set to 'suitefish' on: /suitefish/*";
chown suitefish:suitefish /suitefish -R > /dev/null 2>&1
echo " [${GREEN}I${RESET}]: Chmod set to 0770 on: /suitefish/*";
chmod 0770 /suitefish -R > /dev/null 2>&1

########################################################################################################################################################
# Timezone Setup
########################################################################################################################################################
echo	
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Setup: Timezone"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
echo " [${YELLOW}W${RESET}]: User input required... (see below)"
TIMEZONE="Europe/Berlin"

while true; do
  printf " Please enter the timezone (e.g., Europe/Berlin): "
  read TIMEZONE
  # Check if the timezone is valid
  if timedatectl list-timezones | grep -Fxq "$TIMEZONE"; then
    echo "Setting system timezone to $TIMEZONE..."
    timedatectl set-timezone "$TIMEZONE"
    if [ $? -eq 0 ]; then
      echo " [${GREEN}I${RESET}]: Timezone successfully set to $TIMEZONE."
      break
    else
      echo " [${RED}E${RESET}]: Failed to set timezone. Please try again."
    fi
  else
    echo " [${RED}E${RESET}]: Invalid timezone. Please enter a valid timezone."
  fi
done

########################################################################################################################################################
# Restart Services
########################################################################################################################################################
echo	
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   Setup: Services"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
systemctl enable apache2 > /dev/null 2>&1
systemctl restart apache2 > /dev/null 2>&1
echo " [${GREEN}I${RESET}]: Restart and enable apache2."
systemctl enable redis > /dev/null 2>&1
systemctl restart redis > /dev/null 2>&1
echo " [${GREEN}I${RESET}]: Restart and enable redis."
systemctl enable mariadb > /dev/null 2>&1
systemctl restart mariadb > /dev/null 2>&1
echo " [${GREEN}I${RESET}]: Restart and enable mariadb."
systemctl enable cron > /dev/null 2>&1
systemctl restart cron > /dev/null 2>&1
echo " [${GREEN}I${RESET}]: Restart and enable cron."
systemctl enable supervisor > /dev/null 2>&1
systemctl restart supervisor > /dev/null 2>&1
echo " [${GREEN}I${RESET}]: Restart and enable supervisor."
systemctl restart php8.4-fpm > /dev/null 2>&1
echo " [${GREEN}I${RESET}]: Restart and enable php8.4-fpm."
supervisorctl reread > /dev/null 2>&1
supervisorctl update > /dev/null 2>&1
supervisorctl stop suitefish > /dev/null 2>&1
supervisorctl start suitefish > /dev/null 2>&1
echo " [${GREEN}I${RESET}]: Starting supervisor services."

########################################################################################################################################################
# Finish message
########################################################################################################################################################
echo
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   ${GREEN} Installation Finished!${RESET}"
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
echo
echo " The installation is finished."
echo " You can now login at: https://your-ip-adr/"
echo
echo " Username: admin@admin.local"
echo " Password: changeme"
echo
echo " ${YELLOW}Do not forget to change your password after login!${RESET}"

########################################################################################################################################################
# End of Script
########################################################################################################################################################
echo	
echo " ┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "   End of 'install' script."
echo "   Thank you for using suitefish-cms."
echo " ┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
echo
exit 0