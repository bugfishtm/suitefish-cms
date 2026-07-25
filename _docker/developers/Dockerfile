############################################################################################################
# Build Instructions
############################################################################################################
FROM bugfishtm/sf-base:latest
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
## Apache Copy Website Content
##
RUN rm -rf /var/www/html/*
COPY _public/ /var/www/html/

##
## Copy Scripts and Cleanup Image
##
RUN chmod u+x /entrypoint.sh && chmod u+x /restart_mysql.sh && apt-get clean && rm -rf /var/lib/apt/lists/*

##
## Add Entrypoint
##
ENTRYPOINT ["/entrypoint.sh"]

##
## Startup Instructions
##
CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf", "--silent"]