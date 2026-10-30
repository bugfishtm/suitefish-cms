############################################################################################################
# Build Instructions
############################################################################################################
FROM bugfishtm/sf-base:1.6
ENV DEBIAN_FRONTEND=noninteractive

##
## Install Updates
##
RUN apt update -y && apt upgrade -y && apt-get clean 

##
## Set Timezone
##
ENV TZ=${sf_timezone}
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo "$TZ" > /etc/timezone

##
## Install MySQL Configuration
##
RUN echo "[mysqld]\n\
skip-networking=0\n\
bind-address=0.0.0.0" > /etc/mysql/mariadb.conf.d/99-custom.cnf

##
## Cronjob File Creation
##
RUN echo "*/5 * * * * www-data /usr/bin/flock -n /var/run/cronjob.lock /usr/local/bin/php /var/www/html/_cronjob/cronjob.php 2>&1" > /etc/cron.d/suitefish \
 && chmod 0644 /etc/cron.d/suitefish

##
## Supervisor Configuration
##
RUN mkdir -p /var/log/supervisor /var/run /etc/supervisor/conf.d \
    && echo "[unix_http_server]\n\
file=/var/run/supervisor.sock\n\
chmod=0700\n\
chown=root:root\n\
\n\
[supervisord]\n\
logfile=/var/log/supervisor/supervisord.log\n\
logfile_maxbytes=50MB\n\
logfile_backups=10\n\
loglevel=info\n\
pidfile=/var/run/supervisord.pid\n\
nodaemon=true\n\
minfds=1024\n\
minprocs=200\n\
user=root\n\
childlogdir=/var/log/supervisor\n\
strip_ansi_escapes=true\n\
environment=ENV=\"production\"\n\
\n\
[supervisorctl]\n\
serverurl=unix:///var/run/supervisor.sock\n\
\n\
[include]\n\
files = /etc/supervisor/conf.d/*.conf" > /etc/supervisor/supervisord.conf

##
## Install Supervisor Scripts
##
COPY ./_supervisor/supervisor_cron.conf /etc/supervisor/conf.d/supervisor_cron.conf
COPY ./_supervisor/supervisor_apache2.conf /etc/supervisor/conf.d/supervisor_apache2.conf
COPY ./_supervisor/supervisor_mysql.conf /etc/supervisor/conf.d/supervisor_mysql.conf
COPY ./_supervisor/supervisor_php_fpm.conf /etc/supervisor/conf.d/supervisor_php_fpm.conf
COPY ./_supervisor/supervisor_redis.conf /etc/supervisor/conf.d/supervisor_redis.conf
COPY ./_supervisor/supervisor_suitefish.conf /etc/supervisor/conf.d/supervisor_suitefish.conf

##
## Apache Copy Sites
##
COPY _vsites/ /etc/apache2/sites-available/

##
## Apache Copy Configuration
##
COPY _vhost/ /etc/apache2/conf-available/

##
## Apache Copy Website Content
##
RUN rm -rf /var/www/html/*
COPY _public/ /var/www/html/

##
## Create Folder for Apache Certificate
##
RUN mkdir -p /opt/sf_ssl

##
## Apache Enable Websites
##
RUN a2ensite 000-default && a2ensite default-ssl

##
## Copy Scripts and Cleanup Image
##
COPY ./_script/entrypoint.sh /entrypoint.sh
COPY ./_script/restart_mysql.sh /restart_mysql.sh
RUN chmod u+x /entrypoint.sh && chmod u+x /restart_mysql.sh && apt-get clean && rm -rf /var/lib/apt/lists/*

##
## Add Entrypoint
##
ENTRYPOINT ["/entrypoint.sh"]

##
## Startup Instructions
##
CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf", "--silent"]