#!/bin/sh

#############################################################################################################
# Startup Text
#############################################################################################################
echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "  Suitefish Docker Initialization"
echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"

#############################################################################################################
# Your startup commands here
#############################################################################################################
echo "[SFD] Initialization: Executing entry point."

#############################################################################################################
# Timezone Update
#############################################################################################################
echo "-----------------------------------------------------------------";
echo "[SFD] Timezone: Starting timezone initialization.";
echo "[SFD] Timezone: Updating Time Zone Locale to $sf_timezone."
if [ -n "$sf_timezone" ]; then
    ln -snf "/usr/share/zoneinfo/$sf_timezone" /etc/localtime
    echo "$sf_timezone" > /etc/timezone
	echo "[SFD] Timezone: Time Zone Locale updated."
fi

#############################################################################################################
# Setting Permissions
#############################################################################################################
echo "-----------------------------------------------------------------";
echo "[SFD] Permissions: Starting permission initialization.";
echo "[SFD] Permissions: Setting up permissions on /var/www to 0770 recursively.";
chmod 0770 /var/www -R > /dev/null 2>&1
echo "[SFD] Permissions: Setting up ownership to www-data on /var/www recursively.";
chown www-data:www-data /var/www -R > /dev/null 2>&1

#############################################################################################################
# Starting Service Initializations
#############################################################################################################
echo "-----------------------------------------------------------------";
echo "[SFD] Stop cron services to be started by supervisor.";
service cron stop > /dev/null 2>&1
echo "[SFD] Services: Idle time for services 5 seconds.";
sleep 5

#############################################################################################################
# Execute the main CMD Dockerfile command passed to the container
#############################################################################################################
echo "[SFD] Initialization: Finished Executing Entry Point..."
echo "[SFD] Initialization: Starting main container prompt....";
exec "$@"