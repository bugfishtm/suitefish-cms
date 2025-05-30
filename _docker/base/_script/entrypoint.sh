#!/bin/sh

#############################################################################################################
# Startup Text
#############################################################################################################
echo "┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓"
echo "  Bugfish/Suitefish Docker Initialization"
echo "  May we accomplish great things."
echo "  I wish you the best."
echo "┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛"

#############################################################################################################
# Your startup commands here
#############################################################################################################
echo "[OK] Executing entry point..."

#############################################################################################################
# Timezone Update
#############################################################################################################
echo "[OK] Updating Time Zone Locale to $sf_timezone..."
if [ -n "$sf_timezone" ]; then
    ln -snf "/usr/share/zoneinfo/$sf_timezone" /etc/localtime
    echo "$sf_timezone" > /etc/timezone
fi

#############################################################################################################
# Check for created SSL Certificate
#############################################################################################################
if [ ! -f "/opt/sf_ssl/privkey.pem" ] && [ ! -f "/opt/sf_ssl/cert.pem" ]; then
	echo "[OK] Creating custom ssl certificate.."
	openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
	 -keyout /opt/sf_ssl/privkey.pem \
	 -out /opt/sf_ssl/cert.pem \
	 -subj "/C=US/ST=State/L=City/O=Organization/OU=OrgUnit/CN=example.com" > /dev/null 2>&1
	echo "[OK] Custom SSL certificate generated...";
else
	echo "[OK] SSL Certificate found...";
fi

#############################################################################################################
# Setting Permissions
#############################################################################################################
echo "[OK] Setting up permissions on /var/www to 0770 recursively...";
chmod 0770 /var/www -R > /dev/null 2>&1
echo "[OK] Setting up ownership to www-data on /var/www recursively...";
chown www-data:www-data /var/www -R > /dev/null 2>&1
echo "[OK] Setting up permissions on /etc/cron.d/suitefish to 0644...";
chmod 0644 /etc/cron.d/suitefish > /dev/null 2>&1
echo "[OK] Setting up ownership to www-data on suitefish logfiles...";
chown www-data:www-data /var/log/suitefish_log.log > /dev/null 2>&1
chown www-data:www-data /var/log/suitefish_error.log > /dev/null 2>&1

#############################################################################################################
# Wait for Supervisor to start cron
#############################################################################################################
echo "[OK] Start database service...";
service mariadb start > /dev/null 2>&1
echo "[OK] Start cron service...";
service cron start > /dev/null 2>&1

#############################################################################################################
# Idle Time for Cronjob Startup
#############################################################################################################
echo "[OK] Idle time for services 5 seconds...";
sleep 5

#############################################################################################################
# Activate Cronjob File
#############################################################################################################
echo "[OK] Activate Cronjob File /etc/cron.d/suitefish...";
crontab /etc/cron.d/suitefish

#############################################################################################################
# Default MySQL Initializations
#############################################################################################################
echo "[OK] Updating mysql root users password..."
mysql -u root -e "ALTER USER 'root'@'localhost' IDENTIFIED BY '$sf_db_pass';" > /dev/null 2>&1
echo "[OK] Creating initial database if not exists..."
mysql -u root -p"$sf_db_pass" -e "CREATE DATABASE IF NOT EXISTS suitefish;" > /dev/null 2>&1

#############################################################################################################
# Wait for Supervisor to start cron
#############################################################################################################
echo "[OK] Stop cron services to be started by supervisor...";
service cron stop > /dev/null 2>&1

#############################################################################################################
# Wait for Cron Service to Stop
#############################################################################################################
echo "[OK] Idle time to cron service to stop...";
sleep 5

#############################################################################################################
# Execute the main CMD Dockerfile command passed to the container
#############################################################################################################
echo "[OK] Finished Executing Entry Point..."
echo "[OK] Starting main container prompt....";
exec "$@"