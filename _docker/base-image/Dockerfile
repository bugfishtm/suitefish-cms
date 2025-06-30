############################################################################################################
# Init Default PHP Image
############################################################################################################
FROM php:8.4-fpm

############################################################################################################
# Install Dependencies & Update
############################################################################################################
RUN apt update -y && apt upgrade -y && apt install apache2 software-properties-common git gcc make autoconf pkg-config imagemagick openssl redis curl cron tzdata zip htop unzip tmux redis-server redis-tools wget iputils-ping apache2-suexec-custom jq libc-dev libonig-dev libpng-dev zlib1g-dev libcurl4-openssl-dev libicu-dev libxml2-dev libzip-dev libsodium-dev libmemcached-dev libssl-dev libtidy-dev libkrb5-dev libssh2-1-dev libc-client-dev libbz2-dev libmagickwand-dev libldap2-dev libfreetype6-dev libjpeg-dev -y
#RUN apt install mariadb-server -y (installed later)
#RUN apt install mariadb-client -y (installed later)
#RUN apt install supervisor -y (installed later)
#RUN apt install fail2ban -y (not on docker level)

############################################################################################################
# PHP Mod Setup and Fixes
############################################################################################################
RUN docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu && git clone https://github.com/Imagick/imagick --depth 1 /tmp/imagick \
    && cd /tmp/imagick \
    && phpize \
    && ./configure CPPFLAGS='-Dphp_strtolower=zend_str_tolower' \
    && make -j$(nproc) \
    && make install \
    && cd / \
    && rm -rf /tmp/imagick

############################################################################################################
# Install PHP Extensions
# Some extensions are pre installed in php, they are commented out.
############################################################################################################
RUN docker-php-ext-install mysqli && docker-php-ext-install xml && docker-php-ext-install mbstring && docker-php-ext-install curl && docker-php-ext-install zip && docker-php-ext-install ctype && docker-php-ext-install filter && docker-php-ext-install intl && docker-php-ext-install fileinfo && docker-php-ext-configure gd --with-freetype --with-jpeg && docker-php-ext-install gd && docker-php-ext-install bcmath && docker-php-ext-install opcache && docker-php-ext-install soap && docker-php-ext-install pdo && docker-php-ext-install exif && docker-php-ext-install dom && docker-php-ext-install bz2 && docker-php-ext-install sockets && docker-php-ext-install tidy && pecl install imap && docker-php-ext-enable imap && pecl install ssh2 && docker-php-ext-enable ssh2 && pecl install memcached && docker-php-ext-enable memcached && pecl install redis && docker-php-ext-enable redis && docker-php-ext-enable imagick && docker-php-ext-enable sodium && docker-php-ext-install ldap && docker-php-ext-install simplexml
#RUN docker-php-ext-install json  (already installed)
#RUN docker-php-ext-install hash  (already installed)
#RUN docker-php-ext-install cli  (already installed)
#RUN docker-php-ext-install session  (already installed)
#RUN docker-php-ext-install openssl  (already installed)
#RUN docker-php-ext-install sqlite3  (already installed)
#RUN docker-php-ext-install fpm  (already installed)

############################################################################################################
# Set Timezone
############################################################################################################
ENV TZ=${sf_timezone}
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo "$TZ" > /etc/timezone

############################################################################################################
# Apache Module Setup
############################################################################################################
RUN a2enmod ssl && a2enmod rewrite && a2enmod headers && a2enmod cgi && a2enmod cgid && a2enmod remoteip && a2enmod deflate && a2enmod http2 && a2enmod proxy && a2enmod proxy_http && a2enmod proxy_ftp && a2enmod proxy_fcgi && a2enmod proxy_balancer && a2enmod suexec && a2dismod mpm_prefork && a2enmod mpm_event && a2dissite 000-default && a2dissite default-ssl

######################################################
# Apache Copy Configuration
######################################################
COPY _vhost/ /etc/apache2/conf-available/
RUN a2enconf docker-php

######################################################
# Apache Copy Website Content
######################################################
COPY _source/ /var/www/html/

######################################################
# Create Folder for Apache Certificate
######################################################
RUN mkdir -p /opt/sf_ssl

############################################################################################################
# Install MySQL (and supervisor)
############################################################################################################
ENV DEBIAN_FRONTEND=noninteractive
RUN apt install mariadb-client mariadb-server supervisor -y
RUN echo "[mysqld]\n\
skip-networking=0\n\
bind-address=0.0.0.0" > /etc/mysql/mariadb.conf.d/99-custom.cnf

############################################################################################################
# Setup Website Cronjob Hourly with Root Access
############################################################################################################
RUN echo "0 * * * * /usr/local/bin/php /var/www/html/_cronjob/cronjob.php 2>&1" >> /etc/cron.d/suitefish

############################################################################################################
# Install Supervisor Scripts
############################################################################################################
COPY ./_script/suitefish_cron.conf /etc/supervisor/conf.d/suitefish_cron.conf
COPY ./_script/suitefish_apache2.conf /etc/supervisor/conf.d/suitefish_apache2.conf
COPY ./_script/suitefish_mysql.conf /etc/supervisor/conf.d/suitefish_mysql.conf
COPY ./_script/suitefish_suitefish.conf /etc/supervisor/conf.d/suitefish_suitefish.conf
COPY ./_script/suitefish_php_fpm.conf /etc/supervisor/conf.d/suitefish_php_fpm.conf

############################################################################################################
# Copy Entrypoint Script
############################################################################################################
COPY ./_script/entrypoint.sh /entrypoint.sh
COPY ./_script/restart_mysql.sh /restart_mysql.sh
RUN chmod +x /entrypoint.sh && chmod +x /restart_mysql.sh

############################################################################################################
# Cleanup Image
############################################################################################################
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

############################################################################################################
# Add Entrypoint
############################################################################################################
ENTRYPOINT ["/entrypoint.sh"]

############################################################################################################
# Startup Instructions
############################################################################################################
CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf", "--silent"]
