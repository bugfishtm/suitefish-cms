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
	clear
    echo 
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Suitefish Script"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
    echo 
    echo "  ${RED}Error${RESET}: Please do not use bash interpreter to run this script ($0)"
    echo 
    echo "  Info: Use the following command to start the script."
    echo "  Command: sh $0"
    echo 
    echo "  ${YELLOW}Warning${RESET}: Execution aborted."
    echo 
    exit 1
fi

############################################################################
# Check for Root Script Access
############################################################################
if [ "$(id -u)" -ne 0 ]; then
	clear
    echo 
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Suitefish Script"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	echo 
	echo "  ${RED}Error${RESET}: This script must be run as root."
	echo "  ${YELLOW}Warning${RESET}: Execution aborted."
	echo 
	exit 1
fi

########################################################################################################################################################
# Functions
########################################################################################################################################################

############################################################################
# Loading Spinner Function
############################################################################
spinner() {
    local pid=$!
    local i=1
    while kill -0 $pid 2>/dev/null; do
        dots=$(printf "%-${i}s" "" | tr ' ' '.')
        printf "\rLoading${dots} "
        i=$((i + 1))
        if [ $i -gt 5 ]; then
            i=1 
        fi
        sleep 0.5 
    done
    printf "\r"
}

############################################################################
# Install Package check by Command
############################################################################
check_and_install() {
    CMD="$1"
    PKG="$2"

    if ! command -v "$CMD" >/dev/null 2>&1; then
        apt install -y "$PKG" >/dev/null 2>&1 &
        SPIN_PID=$!
        spinner $SPIN_PID
        wait $SPIN_PID
        if command -v "$CMD" >/dev/null 2>&1; then
            echo "  ${GREEN}Ok${RESET}: Package '$CMD' has been installed."
        else
            echo "  ${RED}Error${RESET}: Package '$CMD' could not be installed, please install '$PKG' manually."
			echo "  ${YELLOW}Warning${RESET}: Execution aborted."
			echo 
            exit 1
        fi
    else
        echo "  ${GREEN}Ok${RESET}: Package '$CMD' is available."
    fi
}

############################################################################
# Install Package with Check
############################################################################
check_and_install_pkg() {
    PKG="$1"
    if ! dpkg -l | grep -qw "$PKG"; then
        apt install -y "$PKG" >/dev/null 2>&1 &
        SPIN_PID=$!
        spinner $SPIN_PID
        wait $SPIN_PID
        if dpkg -l | grep -qw "$PKG"; then
            echo "  ${GREEN}Ok${RESET}: Package '$PKG' has been installed successfully."
        else
            echo "  ${RED}Error${RESET}: Package '$PKG' could not be installed. Please install it manually using: apt install -y $PKG."
			echo "  ${YELLOW}Warning${RESET}: Execution aborted."
			echo 
            exit 1
        fi
    else
        echo "  ${GREEN}Ok${RESET}: Package '$PKG' is already installed."
    fi
}
check_and_install_pkg2() {
    PKG="$1"
    PKG2="$2"
    if ! dpkg -l | grep -qw "$PKG2"; then
        apt install -y "$PKG" >/dev/null 2>&1 &
        SPIN_PID=$!
        spinner $SPIN_PID
        wait $SPIN_PID
        if dpkg -l | grep -qw "$PKG"; then
            echo "  ${GREEN}Ok${RESET}: Package '$PKG' has been installed successfully."
        else
            echo "  ${RED}Error${RESET}: Package '$PKG' could not be installed. Please install it manually using: apt install -y $PKG."
			echo "  ${YELLOW}Warning${RESET}: Execution aborted."
			echo 
            exit 1
        fi
    else
        echo "  ${GREEN}Ok${RESET}: Package '$PKG' is already installed."
    fi
}

############################################################################
# Enable Apache2 Module
############################################################################
enable_apache_module() {
    MODULE="$1"
    a2enmod "$MODULE" > /dev/null 2>&1 &
    SPIN_PID=$!
    spinner $SPIN_PID
    wait $SPIN_PID
    if [ $? -eq 0 ]; then
        echo "  ${GREEN}Ok${RESET}: Apache module '$MODULE' has been enabled successfully."
    else
        echo "  ${RED}Error${RESET}: Apache module '$MODULE' could not be enabled. Please enable it manually using: a2enmod $MODULE."
		echo "  ${YELLOW}Warning${RESET}: Execution aborted."
		echo 
        exit 1
    fi
}

############################################################################
# Disable Apache2 Module
############################################################################
disable_apache_module() {
    MODULE="$1"
    a2dismod "$MODULE" > /dev/null 2>&1 &
    SPIN_PID=$!
    spinner $SPIN_PID
    wait $SPIN_PID
    if [ $? -eq 0 ]; then
        echo "  ${GREEN}Ok${RESET}: Apache module '$MODULE' has been disabled successfully."
    else
        echo "  ${RED}Error${RESET}: Apache module '$MODULE' could not be disabled. Please disable it manually using: a2dismod $MODULE."
		echo "  ${YELLOW}Warning${RESET}: Execution aborted."
		echo 
        exit 1
    fi
}

############################################################################
# Create Missing Folders
############################################################################
create_folder_if_missing() {
    DIR="$1"
    if [ ! -d "$DIR" ]; then
        mkdir -p "$DIR" > /dev/null 2>&1 &
        SPIN_PID=$!
        spinner $SPIN_PID
        wait $SPIN_PID
        if [ $? -eq 0 ]; then
            echo "  ${GREEN}Ok${RESET}: Folder '$DIR' has been created successfully."
        else
            echo "  ${RED}Error${RESET}: Failed to create folder '$DIR'."
            echo "  ${YELLOW}Warning${RESET}: Execution aborted."
			echo 
            exit 1
        fi
    else
        echo "  ${GREEN}Ok${RESET}: Folder '$DIR' already exists."
    fi
}

########################################################################################################################################################
# Output - No Parameters Provided
########################################################################################################################################################
if [ "$#" -eq 0 ]; then
	clear
	echo 	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Suitefish Script"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	echo 
    echo "  Usage: $0 <parameter>"
	echo 
    echo "  Possible parameters:"
    echo "    [ install ]              Install the full Suitefish package"
    echo "    [ install-dependencies ] Install dependencies only"
    echo "    [ server-check ]         Show some server information"
	echo 
	exit 1
fi

########################################################################################################################################################
# [ server-check ]
########################################################################################################################################################
if [ "$1" = "server-check" ]; then
	clear
	echo 
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Simple Server Informations"
	echo "  Just a simple script to show a few server and package"
	echo "  information..."
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"	
	echo
	echo "${YELLOW}Docker${RESET}"
	if command -v docker >/dev/null 2>&1; then
		docker --version
	else
		echo "Docker is NOT installed."
	fi
	echo
	echo "${YELLOW}Docker Compose${RESET}"
	if command -v docker-compose >/dev/null 2>&1; then
		docker-compose --version
	elif docker compose version >/dev/null 2>&1; then
		docker compose version
	else
		echo "Docker Compose is NOT installed."
	fi
	echo
	echo "${YELLOW}Firewall${RESET}"
	if command -v ufw >/dev/null 2>&1; then
		ufw status | head -n 1
	elif command -v iptables >/dev/null 2>&1; then
		if iptables -L | grep -q Chain; then
			echo "iptables is active."
		else
			echo "iptables is installed but no active rules."
		fi
	else
		echo "No firewall (ufw or iptables) detected."
	fi
	echo
	echo "${YELLOW}Apache${RESET}"
	if command -v apache2 >/dev/null 2>&1; then
		apache2 -v | grep "Server version"
	else
		echo "Apache is NOT installed."
	fi
	echo
	echo "${YELLOW}PHP (default)${RESET}"
	if command -v php >/dev/null 2>&1; then
		php -v | head -n 1
	else
		echo "PHP is NOT installed."
	fi
	echo
	echo "${YELLOW}Other installed PHP versions${RESET}"
	for v in 7.4 8.0 8.1 8.2 8.3 8.4; do
		if command -v php$v >/dev/null 2>&1; then
			php$v -v | head -n 1
		fi
	done
	echo
	echo "${YELLOW}Disk free space${RESET}"
	df -h --output=source,size,used,avail,pcent,target | grep -v tmpfs
	echo
	echo "${YELLOW}Uptime${RESET}"
	uptime
	echo
	echo "${YELLOW}Hostname${RESET}"
	hostname
	echo
	echo "${YELLOW}Mailname (from /etc/mailname)${RESET}"
	if [ -f /etc/mailname ]; then
		cat /etc/mailname
	else
		echo "/etc/mailname does not exist."
	fi
	echo
	echo "${YELLOW}Aliases (from /etc/aliases)${RESET}"
	if [ -f /etc/aliases ]; then
		cat /etc/aliases
	else
		echo "/etc/aliases does not exist."
	fi
	echo
	echo "${YELLOW}DNS servers (/etc/resolv.conf)${RESET}"
	grep -E '^nameserver' /etc/resolv.conf | awk '{print $2}'
	echo
	echo "${YELLOW}Current Server IP Addresses${RESET}"
	ip -4 addr show | grep inet | awk '{print $2}' | cut -d/ -f1
	echo
	echo "${YELLOW}Current Date and Time${RESET}"
	date
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  ${GREEN}Finished successfully${RESET}"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	echo
fi

########################################################################################################################################################
# [ install-dependencies ]
########################################################################################################################################################
if [ "$1" = "install-dependencies" ]; then
	clear
	echo 
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Install Suitefish Dependencies"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"	
	echo
	echo "  This section will automatically install all required"
	echo "  system, server, and development dependencies for"
	echo "  Suitefish, including web server, database, PHP, and"
	echo "  related libraries and tools."
	echo
	echo "  It checks for each package and installs it if missing,"
	echo "  ensuring a consistent environment for Suitefish."
	echo
	echo "  WARNING:"
	echo "  It is NOT recommended to run this script on systems"
	echo "  that already have running services or existing"
	echo "  configurations. This process may install, upgrade,"
	echo "  or reconfigure core components such as Apache, MariaDB,"
	echo "  Redis, and PHP, which can disrupt existing web"
	echo "  applications, databases, or custom service setups."
	echo
	echo "${YELLOW}  Only run this on fresh servers or dedicated environments"
	echo "  intended for Suitefish deployment.${RESET}"
	echo
	
	read -p "  Do you want to continue? (y/n): " answer
	if [ "$answer" != "y" ] && [ "$answer" != "Y" ]; then
		echo 
		echo "  ${YELLOW}Warning${RESET}: Execution aborted."
		echo 
		exit 1
	fi
	echo
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Install Packages"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	check_and_install_pkg apache2
	check_and_install_pkg software-properties-common
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
	check_and_install_pkg supervisor
	check_and_install_pkg zip
	check_and_install_pkg htop
	check_and_install_pkg unzip
	check_and_install_pkg tmux
	check_and_install_pkg redis-server
	check_and_install_pkg redis-tools
	check_and_install_pkg mariadb-server
	check_and_install_pkg mariadb-client
	check_and_install_pkg wget
	check_and_install_pkg iputils-ping
	check_and_install_pkg apache2-suexec-custom
	check_and_install_pkg jq
	check_and_install_pkg jailkit
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Install Specialized Server Packages"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	check_and_install_pkg fail2ban
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Install Dev Packages"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
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
	check_and_install_pkg2 libfreetype-dev libfreetype6-dev
	check_and_install_pkg libjpeg-dev
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Install/Check PHP8.4"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	if ! command -v php8.4 > /dev/null 2>&1 || ! php -v | grep -q "8.4"; then
		if ! grep -q "packages.sury.org" /etc/apt/sources.list.d/*; then
			add-apt-repository -y ppa:ondrej/php > /dev/null 2>&1 & 
			spinner
			apt update > /dev/null 2>&1 &
			spinner
			echo "  ${GREEN}Ok${RESET}: PHP Sury Repository added to sources lists."
		fi
		apt install -y php8.4 > /dev/null 2>&1 &
		spinner
		if [ $? -eq 0 ]; then
			echo "  ${GREEN}Ok${RESET}: Package 'PHP 8.4' has been installed successfully."
		else
			echo "  ${RED}Error${RESET}: Package 'PHP 8.4' could not be installed. Please install it manually using: apt install -y php8.4."
			echo "  ${YELLOW}Warning${RESET}: Execution aborted."
			echo 
			exit 1
		fi
	else
		echo "  ${GREEN}Ok${RESET}: Package 'PHP 8.4' is available."
	fi
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Enable Default PHP Modules"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	#check_and_install_pkg php8.4-session
	check_and_install_pkg php8.4-cli
	check_and_install_pkg2 php8.4-mysql php8.4-mysqli
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
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  ${GREEN}Finished successfully${RESET}"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	echo
fi

########################################################################################################################################################
# [ install ]
########################################################################################################################################################
if [ "$1" = "install" ]; then
	clear
	echo 
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Suitefish Installation Script"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"	
	####################################################################################################################################################
	# Check if OS is valid
	####################################################################################################################################################
	if [ -f /etc/issue ]; then
		VERSION_INFO=$(cat /etc/issue)
		if echo "$VERSION_INFO" | grep -q "Ubuntu" && echo "$VERSION_INFO" | grep -q "24"; then
			echo 
		else
			echo "  ${RED}Error${RESET}: This script only works on Ubuntu 24, you are using a different OS."
			echo "  ${YELLOW}Warning${RESET}: Execution aborted."
			echo 
			exit 1
		fi
	else
		echo "  ${RED}Error${RESET}: /etc/issue file not found. Cannot determine OS version."
		echo "  ${YELLOW}Warning${RESET}: Execution aborted."
		echo 
		exit 1
	fi

	####################################################################################################################################################
	# Step 1
	####################################################################################################################################################
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Install Dependencies - Step 1"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"	
	echo
	echo "  ${GREEN}Ok${RESET}: Your OS is supported! (Ubuntu 24)"
	echo
	echo "  This section will automatically install all required"
	echo "  system, server, and development dependencies for"
	echo "  Suitefish, including web server, database, PHP, and"
	echo "  related libraries and tools."
	echo
	echo "  It checks for each package and installs it if missing,"
	echo "  ensuring a consistent environment for Suitefish."
	echo
	echo "  WARNING:"
	echo "  It is NOT recommended to run this script on systems"
	echo "  that already have running services or existing"
	echo "  configurations. This process may install, upgrade,"
	echo "  or reconfigure core components such as Apache, MariaDB,"
	echo "  Redis, and PHP, which can disrupt existing web"
	echo "  applications, databases, or custom service setups."
	echo
	echo "${YELLOW}  Only run this on fresh servers or dedicated environments"
	echo "  intended for Suitefish deployment.${RESET}"
	echo
	echo "${RED}  Running this script on a already operating server may break"
	echo "  running configuration, use with own risk.${RESET}"
	echo
	
	read -p "  Do you want to continue? (y/n): " answer
	if [ "$answer" != "y" ] && [ "$answer" != "Y" ]; then
		echo 
		echo "  ${YELLOW}Warning${RESET}: Execution aborted."
		echo 
		exit 1
	fi
	echo
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Update Source List"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	apt update > /dev/null 2>&1 &
	spinner	 
	echo "  ${GREEN}Ok${RESET}: Source list updated."
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Upgrade System"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	apt upgrade -y > /dev/null 2>&1 &
	spinner
	echo "  ${GREEN}Ok${RESET}: System packages upgraded."
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Install Packages"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	check_and_install_pkg apache2
	check_and_install_pkg software-properties-common
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
	check_and_install_pkg supervisor
	check_and_install_pkg zip
	check_and_install_pkg htop
	check_and_install_pkg unzip
	check_and_install_pkg tmux
	check_and_install_pkg redis-server
	check_and_install_pkg redis-tools
	check_and_install_pkg mariadb-server
	check_and_install_pkg mariadb-client
	check_and_install_pkg wget
	check_and_install_pkg iputils-ping
	check_and_install_pkg apache2-suexec-custom
	check_and_install_pkg jq
	check_and_install_pkg jailkit
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Install Specialized Server Packages"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	check_and_install_pkg fail2ban
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Install Dev Packages"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
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
	check_and_install_pkg2 libfreetype-dev libfreetype6-dev
	check_and_install_pkg libjpeg-dev
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Install/Check PHP8.4"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	if ! command -v php8.4 > /dev/null 2>&1 || ! php -v | grep -q "8.4"; then
		if ! grep -q "packages.sury.org" /etc/apt/sources.list.d/*; then
			add-apt-repository -y ppa:ondrej/php > /dev/null 2>&1 & 
			spinner
			apt update > /dev/null 2>&1 &
			spinner
			echo "  ${GREEN}Ok${RESET}: PHP Sury Repository added to sources lists."
		fi
		apt install -y php8.4 > /dev/null 2>&1 &
		spinner
		if [ $? -eq 0 ]; then
			echo "  ${GREEN}Ok${RESET}: Package 'PHP 8.4' has been installed successfully."
		else
			echo "  ${RED}Error${RESET}: Package 'PHP 8.4' could not be installed. Please install it manually using: apt install -y php8.4."
			echo "  ${YELLOW}Warning${RESET}: Execution aborted."
			echo 
			exit 1
		fi
	else
		echo "  ${GREEN}Ok${RESET}: Package 'PHP 8.4' is available."
	fi
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Enable Default PHP Modules"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	#check_and_install_pkg php8.4-session
	check_and_install_pkg php8.4-cli
	check_and_install_pkg2 php8.4-mysql php8.4-mysqli
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
	####################################################################################################################################################
	# Step 2
	####################################################################################################################################################
	echo 
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Enable Apache2 Modules - Step 2"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"	
	echo
	echo "  This section will enable the recommended Apache2 modules"
	echo "  required for Suitefish, including support for SSL, HTTP/2,"
	echo "  proxying, and enhanced performance and security features."
	echo "  It will also switch Apache to the event processing model for"
	echo "  optimal HTTP/2 support."
	echo
	
	read -p "  Do you want to continue? (y/n): " answer
	if [ "$answer" != "y" ] && [ "$answer" != "Y" ]; then
		echo 
		echo "  ${YELLOW}Warning${RESET}: Execution aborted."
		echo 
		exit 1
	fi
	echo
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Enable Default Apache2 Modules"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
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
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  HTTP2 Setup for Apache2"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	disable_apache_module php8.4
	disable_apache_module mpm_prefork
	enable_apache_module mpm_event	
	####################################################################################################################################################
	# Step 3
	####################################################################################################################################################
	echo 
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Create Folder Structure - Step 3"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"	
	echo
	echo "  This section will create the required folder structure."
	echo
	
	read -p "  Do you want to continue? (y/n): " answer
	if [ "$answer" != "y" ] && [ "$answer" != "Y" ]; then
		echo 
		echo "  ${YELLOW}Warning${RESET}: Execution aborted."
		echo 
		exit 1
	fi
	echo
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Create Folders for Local Installation"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	create_folder_if_missing /suitefish
	create_folder_if_missing /suitefish/log
	create_folder_if_missing /suitefish/web
	create_folder_if_missing /suitefish/cache
	create_folder_if_missing /suitefish/backup
	create_folder_if_missing /suitefish/ssl	
	####################################################################################################################################################
	# Step 4
	####################################################################################################################################################
	echo 
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Download - Step 4"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"	
	echo
	echo "  - Downloading the latest Release Full Package from Github to /suitefish/cache"
	echo "  - Extract the downloaded package source code for the suitefish "
	echo "    website to /suitefish/cache/suitefish-cms-main"
	echo
	
	read -p "  Do you want to continue? (y/n): " answer
	if [ "$answer" != "y" ] && [ "$answer" != "Y" ]; then
		echo 
		echo "  ${YELLOW}Warning${RESET}: Execution aborted."
		echo 
		exit 1
	fi
	echo
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Download Package"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	if [ -f "/suitefish/cache/release.zip" ]; then
		unlink /suitefish/cache/release.zip
		echo "  ${YELLOW}Warning${RESET}: Existing release file removed: /suitefish/cache/release.zip"
	fi
	wget -q "https://github.com/bugfishtm/suitefish-cms/archive/refs/heads/main.zip" -O "/suitefish/cache/release.zip" &
	spinner
	if [ $? -eq 0 ]; then
		echo "  ${GREEN}Ok${RESET}: CMS Release File downloaded successfully."
	else
		echo "  ${RED}Error${RESET}: Failed to download the cms release file from https://github.com/bugfishtm/suitefish-cms/archive/refs/heads/main.zip."
		echo "  ${YELLOW}Warning${RESET}: Installation aborted."
		exit 1
	fi
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Extract Package"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	if [ -d "/suitefish/cache/suitefish-cms-main" ]; then
		rm -rf "/suitefish/cache/suitefish-cms-main" &
		spinner
		echo "  ${YELLOW}Warning${RESET}: Existing extracted folder removed: /suitefish/cache/suitefish-cms-main"
	fi
	if [ -f "/suitefish/cache/release.zip" ]; then
		unzip -q "/suitefish/cache/release.zip" -d "/suitefish/cache/" &
		spinner
		if [ $? -eq 0 ]; then
			echo "  ${GREEN}Ok${RESET}: CMS Release File extracted successfully."
		else
			echo "  ${RED}Error${RESET}: Failed to extract the CMS release file."
			echo "  ${YELLOW}Warning${RESET}: Installation aborted."
			exit 1
		fi
	else
		echo "  ${RED}Error${RESET}: CMS release file '/suitefish/cache/release.zip' not found."
		echo "  ${YELLOW}Warning${RESET}: Installation aborted."
		exit 1
	fi		
	####################################################################################################################################################
	# Step 5
	####################################################################################################################################################
	echo 
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Backup - Step 5"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"	
	echo
	echo "  - Backup /suitefish/web to /suitefish/backup"
	echo "  - Backup various system files to /suitefish/backup"
	echo
	
	read -p "  Do you want to continue? (y/n): " answer
	if [ "$answer" != "y" ] && [ "$answer" != "Y" ]; then
		echo 
		echo "  ${YELLOW}Warning${RESET}: Execution aborted."
		echo 
		exit 1
	fi
	echo
	echo	
	TIMESTAMP=$(date +"%Y%m%d%H%M%S")
	BACKUPFOLDER="/suitefish/backup/$TIMESTAMP"
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Backup Supervisor Configuration"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"	
	BACKUPFOLDER_SUPERVISOR="/suitefish/backup/$TIMESTAMP/supervisor"
	if [ ! -d "$BACKUPFOLDER_SUPERVISOR" ]; then
		mkdir -p "$BACKUPFOLDER_SUPERVISOR" > /dev/null 2>&1
		if [ ! $? -eq 0 ]; then
			echo "  ${RED}Error${RESET}: Failed to create folder '$BACKUPFOLDER_SUPERVISOR'."
			echo "  ${YELLOW}Warning${RESET}: Installation aborted."
			exit 1
		fi
	else
		echo "  ${GREEN}Ok${RESET}: Folder '$BACKUPFOLDER_SUPERVISOR' already exists."
	fi
	cp -r /etc/supervisor/* "$BACKUPFOLDER_SUPERVISOR/" > /dev/null 2>&1 &
	spinner
	if [ $? -eq 0 ]; then
		echo "  ${GREEN}Ok${RESET}: Supervisor configuration has been backed up to '$BACKUPFOLDER_SUPERVISOR'."
	else
		echo "  ${RED}Error${RESET}: Failed to back up Supervisor configuration."
		echo "  ${YELLOW}Warning${RESET}: Installation aborted."
		exit 1
	fi	
	echo 
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Backup Apache2 Configuration"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"	
	BACKUPFOLDER_APACHE="/suitefish/backup/$TIMESTAMP/apache2"
	if [ ! -d "$BACKUPFOLDER_APACHE" ]; then
		mkdir -p "$BACKUPFOLDER_APACHE" > /dev/null 2>&1
		if [ ! $? -eq 0 ]; then
			echo "  ${RED}Error${RESET}: Failed to create folder '$BACKUPFOLDER_APACHE'."
			echo "  ${YELLOW}Warning${RESET}: Installation aborted."
			exit 1
		fi
	else
		echo "  ${GREEN}Ok${RESET}: Folder '$BACKUPFOLDER_APACHE' already exists."
	fi
	cp -r /etc/apache2/* "$BACKUPFOLDER_APACHE/" > /dev/null 2>&1 &
	spinner
	if [ $? -eq 0 ]; then
		echo "  ${GREEN}Ok${RESET}: Apache2 configuration has been backed up to '$BACKUPFOLDER_APACHE'."
	else
		echo "  ${RED}Error${RESET}: Failed to back up Apache2 configuration."
		echo "  ${YELLOW}Warning${RESET}: Installation aborted."
		exit 1
	fi	
	echo 
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Backup Old Suitefish Source Configuration"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"	
	BACKUPFOLDER_SF="/suitefish/backup/$TIMESTAMP/web"
	if [ ! -d "$BACKUPFOLDER_SF" ]; then
		mkdir -p "$BACKUPFOLDER_SF" > /dev/null 2>&1
		if [ ! $? -eq 0 ]; then
			echo "  ${RED}Error${RESET}: Failed to create folder '$BACKUPFOLDER_SF'."
			echo "  ${YELLOW}Warning${RESET}: Installation aborted."
			exit 1
		fi
	else
		echo "  ${GREEN}Ok${RESET}: Folder '$BACKUPFOLDER_SF' already exists."
	fi
	mv /suitefish/web "$BACKUPFOLDER_SF/" > /dev/null 2>&1 &
	spinner
	if [ $? -eq 0 ]; then
		echo "  ${GREEN}Ok${RESET}: Source Code has been backed up to '$BACKUPFOLDER_SF'."
	else
		echo "  ${RED}Error${RESET}: Failed to back up Source Code configuration."
		echo "  ${YELLOW}Warning${RESET}: Installation aborted."
		exit 1
	fi	
	echo 
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Backup Old Suitefish SSL Configuration"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"	
	BACKUPFOLDER_SSL="/suitefish/backup/$TIMESTAMP/ssl"
	if [ ! -d "$BACKUPFOLDER_SSL" ]; then
		mkdir -p "$BACKUPFOLDER_SSL" > /dev/null 2>&1 
		if [ ! $? -eq 0 ]; then
			echo "  ${RED}Error${RESET}: Failed to create folder '$BACKUPFOLDER_SSL'."
			echo "  ${YELLOW}Warning${RESET}: Installation aborted."
			exit 1
		fi
	else
		echo "  ${GREEN}Ok${RESET}: Folder '$BACKUPFOLDER_SF' already exists."
	fi
	mv /suitefish/ssl "$BACKUPFOLDER_SSL/" > /dev/null 2>&1 
	if [ $? -eq 0 ]; then
		echo "  ${GREEN}Ok${RESET}: Current SSL Certificate has been backed up to '$BACKUPFOLDER_SSL'."
	else
		echo "  ${RED}Error${RESET}: Failed to back up Current SSL Certificate."
		echo "  ${YELLOW}Warning${RESET}: Installation aborted."
		exit 1
	fi	
	echo 
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Recreate /suitefish/web folder"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"	
	if [ ! -d "/suitefish/web" ]; then
		mkdir -p "/suitefish/web" > /dev/null 2>&1 
		if [ ! $? -eq 0 ]; then
			echo "  ${RED}Error${RESET}: Failed to create folder '/suitefish/web'."
			echo "  ${YELLOW}Warning${RESET}: Installation aborted."
			exit 1
		fi
		echo "  ${GREEN}Ok${RESET}: Folder '/suitefish/web' created."
	else
		echo "  ${GREEN}Ok${RESET}: Folder '/suitefish/web' already exists."
	fi	
	####################################################################################################################################################
	# Step 6
	####################################################################################################################################################
	echo 
	echo
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Configure and Deploy - Step 6"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"	
	echo
	echo " - Creating initial self signed suitefish certificate"
	echo " - Setup a MySQL User."
	echo " - Setup a MySQL Database."
	echo " - Change the MySQL Root Account Password."
	echo " - Setup the suitefish cronjob."
	echo " - Setup the suitefish background worker."
	echo " - Setup the Apache Virtualhost for Suitefish."
	echo " - Setup the PHP-FPM Pool."
	echo " - Create Suitefish Settings File."
	echo " - Move extracted content to suitefish/web."
	echo " - Create unix suitefish user and group."
	echo " - Restart and initialize services."
	echo " - Finalizing the installation."
	echo
	
	read -p "  Do you want to continue? (y/n): " answer
	if [ "$answer" != "y" ] && [ "$answer" != "Y" ]; then
		echo 
		echo "  ${YELLOW}Warning${RESET}: Execution aborted."
		echo 
		exit 1
	fi
	echo
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Check if folder exists /suitefish/ssl"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"	
	if [ ! -d "/suitefish/ssl" ]; then
		mkdir -p "/suitefish/ssl" > /dev/null 2>&1
		if [ ! $? -eq 0 ]; then
			echo "  ${RED}Error${RESET}: Failed to create folder '/suitefish/ssl'."
			echo "  ${YELLOW}Warning${RESET}: Installation aborted."
			exit 1
		fi
		echo "  ${GREEN}Ok${RESET}: Folder '/suitefish/ssl' created."
	else
		echo "  ${GREEN}Ok${RESET}: Folder '/suitefish/ssl' already exists."
	fi
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Create Initial SSL Self Signed Certificate"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"	
	openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
	 -keyout /suitefish/ssl/privkey.pem \
	 -out /suitefish/ssl/cert.pem \
	 -subj "/C=US/ST=State/L=City/O=Organization/OU=OrgUnit/CN=example.com" > /dev/null 2>&1 &
	spinner 
	if [ ! $? -eq 0 ]; then
		echo "  ${RED}Error${RESET}: Failed to create ssl certificate."
		echo "  ${YELLOW}Warning${RESET}: Installation aborted."
		exit 1
	fi
	echo "  ${GREEN}Ok${RESET}: Initial self-signed ssl certificate created."	
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  MySQL Setup"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	echo
	echo "  ${YELLOW}Warning${RESET}: User input required... (see below)"
	echo
	
	printf "  Enter database name to create: "
	read DB_NAME
	
	printf "  Enter new MySQL username to create: "
	read DB_USER
	
	printf "  Enter password for user '$DB_USER': "
	read DB_PASS
	echo
	# Check for Root Password
	mysql -u root -e "SELECT 1;" > /dev/null 2>&1
	if [ $? -eq 0 ]; then
		echo "  ${YELLOW}Warning${RESET}: MariaDB root account has NO password set."
		echo
		echo "  ${YELLOW}Warning${RESET}: User input required... (see below)"
		echo	
		
		printf "  Enter new root password: "
		read ROOT_PASS
		mysql -u root -e "ALTER USER 'root'@'localhost' IDENTIFIED BY '$ROOT_PASS';" > /dev/null 2>&1
		echo "  ${GREEN}Ok${RESET}: MySQL Root Account Password changed."
	else
		echo "  ${GREEN}Ok${RESET}: MariaDB root account has a password set."
		echo
		echo "  ${YELLOW}Warning${RESET}: User input required... (see below)"
		echo	
		
		printf "  Enter the current mysql root password: "
		read ROOT_PASS
		mysql -u root -p"$ROOT_PASS" -e "SELECT 1;" > /dev/null 2>&1
		if [ $? -eq 0 ]; then
			echo "  ${GREEN}Ok${RESET}: Correct MySQL root password provided."
		else
			echo "  ${RED}Error${RESET}: Incorrect MySQL root password or authentication failed."
			echo "  ${YELLOW}Warning${RESET}: Installation aborted."
			exit 1
		fi	
	fi
	# Check if database already exists
	DB_EXISTS=$(mysql -u root -p"$ROOT_PASS" -e "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$DB_NAME';" -N -B 2>/dev/null)
	if [ "$DB_EXISTS" = "$DB_NAME" ]; then
		echo "  ${YELLOW}Warning${RESET}: Database '$DB_NAME' already exists."
		echo
		echo "  ${YELLOW}Warning${RESET}: User input required... (see below)"
		echo
		
		printf "  Do you want to delete it and create a new one? (y/N): "
		read CONFIRM
		case "$CONFIRM" in
			y|Y)
				mysql -u root -p"$ROOT_PASS" -e "DROP DATABASE $DB_NAME;" > /dev/null 2>&1
				if [ $? -eq 0 ]; then
					echo "  ${GREEN}Ok${RESET}: Database '$DB_NAME' has been deleted."
				else
					echo "  ${RED}Error${RESET}: Failed to delete database '$DB_NAME'."
					echo "  ${YELLOW}Warning${RESET}: Installation aborted."
					exit 1
				fi
				;;
			*)
				echo "  ${YELLOW}Warning${RESET}: Installation aborted."
				exit 1
				;;
		esac
	fi
	# Create Database
	mysql -u root -p"$ROOT_PASS" -e "CREATE DATABASE IF NOT EXISTS $DB_NAME;" > /dev/null 2>&1
	if [ $? -eq 0 ]; then
		echo "  ${GREEN}Ok${RESET}: Database '$DB_NAME' created successfully."
	else
		echo "  ${RED}Error${RESET}: Failed to create database '$DB_NAME'."
		echo "  ${YELLOW}Warning${RESET}: Installation aborted."
		exit 1
	fi
	# Create the user and grant privileges
	mysql -u root -p"$ROOT_PASS" -e "CREATE USER '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASS';" > /dev/null 2>&1
	mysql -u root -p"$ROOT_PASS" -e "GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'localhost';" > /dev/null 2>&1
	mysql -u root -p"$ROOT_PASS" -e "FLUSH PRIVILEGES;" > /dev/null 2>&1
	if [ $? -eq 0 ]; then
		echo "  ${GREEN}Ok${RESET}: User '$DB_USER' created and granted full privileges on '$DB_NAME'."
	else
		echo "  ${RED}Error${RESET}: Failed to create user or grant privileges."
		echo "  ${YELLOW}Warning${RESET}: Installation aborted."
		exit 1
	fi
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Cronjob Setup"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	CRON_JOB="0 * * * * suitefish /usr/bin/php8.4 /suitefish/web/_cronjob/cronjob.php 2>&1"
	CRON_FILE="/etc/cron.d/suitefish"
	if [ ! -f "$CRON_FILE" ]; then
		touch "$CRON_FILE"
	fi
	grep -Fxq "$CRON_JOB" "$CRON_FILE" 2>/dev/null
	if [ $? -ne 0 ]; then
		echo "$CRON_JOB" >> "$CRON_FILE"
		echo "  ${GREEN}Ok${RESET}: Cron job added successfully for user 'suitefish'."
	else
		echo "  ${YELLOW}Warning${RESET}: Cron job already exists. No changes made."
	fi
	echo "  ${GREEN}Ok${RESET}: Activate Cronjob File /etc/cron.d/suitefish...";
	crontab /etc/cron.d/suitefish	
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Supervisor Setup"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	SUPERVISOR_CONF="/etc/supervisor/conf.d/suitefish.conf"
	SUPERVISOR_CONTENT="[program:suitefish]
command=/usr/bin/php8.4 /suitefish/web/_core/worker.php
user=root
autostart=true
autorestart=true
stderr_logfile=/suitefish/log/daemon_error.log
stdout_logfile=/suitefish/log/daemon_log.log
startsecs=0
environment=SUITEFISH_SUPERVISOR_LOG_FILE=\"/suitefish/log/daemon_log.log\""
	if [ -f "$SUPERVISOR_CONF" ]; then
		unlink "$SUPERVISOR_CONF"
		echo "  ${YELLOW}Warning${RESET}: Supervisor config overwritten: $SUPERVISOR_CONF"
	fi
	echo "$SUPERVISOR_CONTENT" > "$SUPERVISOR_CONF"
	if [ $? -eq 0 ]; then
		echo "  ${GREEN}Ok${RESET}: Supervisor config created: $SUPERVISOR_CONF"
	else
		echo "  ${RED}Error${RESET}: Failed to create Supervisor config."
		echo "  ${YELLOW}Warning${RESET}: Installation aborted."
		exit 1
	fi
	echo "  ${GREEN}Ok${RESET}: Supervisor configuration written...";	
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Apache2 Setup"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	# Define the target directory and filename
	CONF_DIR="/etc/apache2/sites-available"
	CONF_FILE="suitefish.conf"
	# Ensure the directory exists
	if [ ! -d "$CONF_DIR" ]; then
		mkdir -p "$CONF_DIR" > /dev/null 2>&1
		if [ $? -eq 0 ]; then
			echo "  ${GREEN}Ok${RESET}: Directory '$CONF_DIR' created."
		else
			echo "  ${RED}Error${RESET}: Failed to create directory '$CONF_DIR'."
			echo "  ${YELLOW}Warning${RESET}: Installation aborted."
			exit 1
		fi
	fi
	# Define the full file path
	CONF_PATH="$CONF_DIR/$CONF_FILE"
	a2dissite 000-default > /dev/null 2>&1
	a2dissite default-ssl > /dev/null 2>&1
	echo "  ${GREEN}Ok${RESET}: Disabled Default 000-default and default-ssl apache2 website."
	unlink "$CONF_DIR/$CONF_FILE" > /dev/null 2>&1	
	# Create the VirtualHost configuration file
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
 
	## Security Headers
	Header always set Strict-Transport-Security "max-age=63072000; includeSubDomains"
	Header set X-XSS-Protection "0; mode=block" 
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
 
	## Security Headers
	Header always set Strict-Transport-Security "max-age=63072000; includeSubDomains"
	Header set X-XSS-Protection "0; mode=block" 
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
	SSLCertificateFile /suitefish/ssl/cert.pem
	SSLCertificateKeyFile /suitefish/ssl/privkey.pem
	# SSLCertificateChainFile /suitefish/ssl/chain.pem

</VirtualHost>
EOL
	# Check if the file was created successfully
	if [ -f "$CONF_PATH" ]; then
		echo "  ${GREEN}Ok${RESET}: Apache VirtualHost configuration file created at '$CONF_PATH'."
	else
		echo "  ${RED}Error${RESET}: Failed to create Apache VirtualHost configuration file."
		echo "  ${YELLOW}Warning${RESET}: Installation aborted."
		exit 1
	fi
	# Enable the site and restart Apache
	a2ensite "$CONF_FILE" > /dev/null 2>&1
	if [ $? -eq 0 ]; then
		echo "  ${GREEN}Ok${RESET}: VirtualHost '$CONF_FILE' enabled."
	else
		echo "  ${RED}Error${RESET}: Failed to entable 'suitefish' virtualhost config file on apache2, try using: a2ensite $CONF_FILE."
		echo "  ${YELLOW}Warning${RESET}: Installation aborted."
	fi
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Suitefish Settings"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	# Define the target directory and filename
	SFS_DIR="/suitefish/web"
	SFS_FILE="settings.php"

	# Define the full file path
	SFS_PATH="$SFS_DIR/$SFS_FILE"
	unlink "$SFS_DIR/$SFS_FILE" > /dev/null 2>&1
	CURRENT_DATE_FORCONF=$(date)
# Create the VirtualHost configuration file
cat > "$SFS_PATH" <<EOL
<?php
	/* 
		-------------------------------------------------------------------------------
		Suitefish Settings File (Auto-Installer Instance)
		-------------------------------------------------------------------------------
		You do not need to enter your credentials here.
		This file has been generated by the suitefish-installer.sh script.
		Generated at $CURRENT_DATE_FORCONF
	*/

	/* MySQL Settings */
		\$mysql['host'] 		= '127.0.0.1'; 			// MySQL Hostname, usually 'localhost' if your database is on the same server (mandatory)
		\$mysql['port'] 		= '3306'; 				// MySQL Port, the default port for MySQL is 3306 (can be left unchanged)
		\$mysql['user'] 		= '$DB_USER'; 			// MySQL User, replace 'MYSQL_USER' with your actual MySQL username (mandatory)
		\$mysql['pass'] 		= '$DB_PASS'; 			// MySQL Password, replace 'MYSQL_PASSWORD' with your actual MySQL password (mandatory)
		\$mysql['db'] 			= '$DB_NAME'; 			// MySQL Database, replace 'MYSQL_DATABASE' with the name of your database (mandatory)
		\$mysql['prefix'] 		= 'sf_'; 				// Prefix for MySQL tables, this is useful if you're sharing the database with other applications (can be left unchanged)

	/* Site Settings */
		\$object['cookie'] 		= 'sf_'; 				// Cookie Prefix, used to uniquely identify the cookies for this application (can be left unchanged)
		\$object['path'] 		= '/suitefish/web/'; 	// Full Path to the application's root directory on the server (mandatory)
		\$object['url'] 		= 'https://example'; 	// Full URL to the site, change 'https://example' to your site's URL (optional, but recommended)

EOL
	# Check if the file was created successfully
	if [ -f "$SFS_PATH" ]; then
		echo "  ${GREEN}Ok${RESET}: Suitefish Settings file created at '$SFS_PATH'."
	else
		echo "  ${RED}Error${RESET}: Failed to create suitefish configuration file."
		echo "  ${YELLOW}Warning${RESET}: Installation aborted."
		exit 1
	fi
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Groups and Users"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	USER="suitefish"
	GROUP="suitefish"
	if ! getent group "$GROUP" >/dev/null 2>&1; then
		groupadd "$GROUP"
		echo "  ${GREEN}Ok${RESET}: Group '$GROUP' created."
	else
		echo "  ${YELLOW}Warning${RESET}: Group '$GROUP' already exists."
	fi
	if ! id "$USER" >/dev/null 2>&1; then
		useradd -g "$GROUP" -s /usr/sbin/nologin -M -d /suitefish "$USER" > /dev/null 2>&1
		if [ $? -eq 0 ]; then
			echo "  ${GREEN}Ok${RESET}: User '$USER' created and added to group '$GROUP'."
		else
			echo "  ${RED}Error${RESET}: Failed to create user '$USER'."
			exit 1
		fi
	else
		echo "  ${YELLOW}Warning${RESET}: User '$USER' already exists."
	fi
	passwd -l "$USER" > /dev/null 2>&1
	echo "  ${GREEN}Ok${RESET}: Disabled password login for user '$USER'."	
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Adding www-data to Suitefish Group"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	# Variables
	APACHE_USER="www-data"
	GROUP_NAME="suitefish"
	WEB_ROOT="/suitefish/web"
	echo "  ${GREEN}Ok${RESET}: Adding Apache user ($APACHE_USER) to group ($GROUP_NAME)..."
	sudo usermod -a -G "$GROUP_NAME" "$APACHE_USER"
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Move Package into Web Folder"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	SRC_DIR="/suitefish/cache/suitefish-cms-main/_source"
	DEST_DIR="/suitefish/web"
	cp -r "$SRC_DIR"/* "$DEST_DIR"/ > /dev/null 2>&1 &
	spinner
	if [ $? -eq 0 ]; then
		echo "  ${GREEN}Ok${RESET}: Files copied from '$SRC_DIR' to '$DEST_DIR' successfully."
	else
		echo "  ${RED}Error${RESET}: Failed to copy files."
		exit 1
	fi
	echo "  ${GREEN}Ok${RESET}: Downloaded package moved into /suitefish/web folder..";
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  PHP FPM Pool Setup"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	# Variables
	POOL_NAME="suitefish"
	POOL_USER="suitefish"
	POOL_GROUP="suitefish"
	POOL_CONFIG="/etc/php/8.4/fpm/pool.d/${POOL_NAME}.conf"
	SOCKET_PATH="/var/run/php/${POOL_NAME}.sock"
	# Check if pool config already exists
	if [ -f "$POOL_CONFIG" ]; then
	   unlink "$POOL_CONFIG"
	   echo "  ${YELLOW}Warning${RESET}: Pool configuration overwritten: $POOL_CONFIG."
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
	echo "  ${GREEN}Ok${RESET}: FPM pool config for $POOL_NAME created at $POOL_CONFIG"
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Add Letsencrypt certificate"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	
	read -p "  Do you want to install Certbot (Let's Encrypt client)? [y/N]: " install_certbot
	if [ "$install_certbot" = "y" ] || [ "$install_certbot" = "Y" ]; then
		echo
		echo "  ${GREEN}Ok${RESET}: Installing certbot using apt..."
		sudo apt-get install -y certbot >/dev/null 2>&1		
		echo
		read -p "  Enter the domain name for your website (e.g., example.com): " domain
		echo
		echo "  Requesting certificate for $domain using webroot /suitefish/web..."
		sudo certbot certonly --webroot -w /suitefish/web -d "$domain"
		if [ ! -d "/etc/letsencrypt/live/$domain" ]; then
			echo "  ${RED}Error${RESET}: Certificate request failed or directory not found."
		else
			echo
			echo "  Copying certificate and private key to /suitefish/ssl/ ..."
			sudo mkdir -p /suitefish/ssl/
			sudo cp "/etc/letsencrypt/live/$domain/privkey.pem" /suitefish/ssl/privkey.pem
			sudo cp "/etc/letsencrypt/live/$domain/fullchain.pem" /suitefish/ssl/cert.pem
			sudo chmod 600 /suitefish/ssl/privkey.pem /suitefish/ssl/cert.pem
			echo
			echo "  ${GREEN}Ok${RESET}: Let's Encrypt certificate created and installed at:"
			echo "      /suitefish/ssl/privkey.pem"
			echo "      /suitefish/ssl/cert.pem"
		fi		
	fi
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Restart Services"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	systemctl enable apache2 > /dev/null 2>&1
	systemctl restart apache2 > /dev/null 2>&1
	echo "  ${GREEN}Ok${RESET}: Restart and enable apache2."
	systemctl enable redis > /dev/null 2>&1
	systemctl restart redis > /dev/null 2>&1
	echo "  ${GREEN}Ok${RESET}: Restart and enable redis."
	systemctl enable mariadb > /dev/null 2>&1
	systemctl restart mariadb > /dev/null 2>&1
	echo "  ${GREEN}Ok${RESET}: Restart and enable mariadb."
	systemctl enable cron > /dev/null 2>&1
	systemctl restart cron > /dev/null 2>&1
	echo "  ${GREEN}Ok${RESET}: Restart and enable cron."
	systemctl enable supervisor > /dev/null 2>&1
	systemctl restart supervisor > /dev/null 2>&1
	echo "  ${GREEN}Ok${RESET}: Restart and enable supervisor."
	systemctl restart php8.4-fpm > /dev/null 2>&1
	echo "  ${GREEN}Ok${RESET}: Restart and enable php8.4-fpm."
	supervisorctl reread > /dev/null 2>&1
	supervisorctl update > /dev/null 2>&1
	supervisorctl stop suitefish > /dev/null 2>&1
	supervisorctl start suitefish > /dev/null 2>&1
	echo "  ${GREEN}Ok${RESET}: Starting supervisor services."
	echo
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  Fix Permissions"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	echo "  ${GREEN}Ok${RESET}: Setting up ownership to suitefish user on /suitefish recursively...";
	chown suitefish:suitefish /suitefish -R > /dev/null 2>&1
	echo "  ${GREEN}Ok${RESET}: Setting up permissions on /suitefish/web to 0770 recursively...";
	chmod 0770 /suitefish -R > /dev/null 2>&1
	echo "  ${GREEN}Ok${RESET}: Setting up permissions on /etc/cron.d/suitefish to 0644...";
	chmod 0740 /etc/cron.d/suitefish > /dev/null 2>&1
	echo	
	echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
	echo "  ${GREEN} Installation Finished successfully${RESET}"
	echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"
	echo
	echo "  The installation is finished."
	echo "  You can now login at: https://your-ip-adr/"
	echo
	echo "  username: admin@admin.local"
	echo "  password: changeme"
	echo
	echo "  ${YELLOW}Do not forget to change your password after login!${RESET}"
	echo
	echo
fi
