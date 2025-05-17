# Docker Installation

## Introduction


!!! info "Information"
	Our docker instances will always run in website-mode. You can find information about the different modes in the manual installation and requirement section.
	
Visit the download section of this website and find the link to the Docker image page. There, you'll find detailed instructions and the image needed to set up the Docker instance. Installation is straightforward as our Docker setup uses a single container and can be deployed with just one console command—no need for Docker Compose.

---------------

## Suitefish at DockerHub

Here you can find the official Docker image related to this project. By clicking the link below, you'll be directed to the Docker Hub page where you can access and pull the image for use.

[Visit Docker-Suitefish](https://hub.docker.com/r/bugfishtm/suitefish){.md-button}

---------------

## Installation

This method installs the standard version of Suitefish-CMS, providing full website functionality. Please note that the Docker setup runs in a containerized environment, so it does not grant deep system or root-level access required for advanced system authority operations. This ensures a secure and isolated installation suitable for most web use cases.

!!! danger "For your security, change the default password immediately after your first login."
	**Important:** To ensure the security of your account and system, it is strongly recommended to change the password right after your first login. Failing to do so may expose your system to potential security risks.

!!! info "Initial Username/Password for Suitefish"
	username: admin@admin.local  
	password: changeme  

### Deployment

To deploy the Docker image `bugfishtm/suitefish:latest` using a single command, you can use the following:

```bash
docker run -d --restart always -p 80:80 -p 443:443 -e sf_db_pass=your_password -e sf_url=your_url -e sf_timezone=Europe/Berlin -v sys-ssl:/opt/sf_ssl -v sys-mysql:/var/lib/mysql -v cms-backup:/var/www/html/_backup -v cms-cache:/var/www/html/_cache -v cms-data:/var/www/html/_data -v cms-image:/var/www/html/_image -v cms-store:/var/www/html/_store -v cms-template:/var/www/html/_template  bugfishtm/suitefish:latest
```

This command does the following:

- Runs the container in detached mode (`-d`)
- Set the startup policy to start always (restart on reboot).
- Maps ports 80 and 443 from the container to the host.
- Sets required environment variables (`-e`)
	+ Caution: Replace the Variable Values with the values required for your instance. 
	+ You can find a table with all valid variables inside this readme.
- Creates and mounts volumes for persistent data (`-v`)
- Uses the `bugfishtm/suitefish:latest` image from Docker Hub

### Variables

These variables are passable during the container creation.

|Variable|Description|
|-------|-------|
| sf_db_pass | MySQL root password for database to be created and used. |
| sf_url | Domain this service is running on. E.g http://localhost or https://localhost |
| sf_timezone | Timezone you want the service to run at. E.g Europe/Berlin. Use tz identifiers from [https://en.wikipedia.org/wiki/List_of_tz_database_time_zones](https://en.wikipedia.org/wiki/List_of_tz_database_time_zones) |

### Volumes

Suitefish uses the following volume structure.

|Volume|Description| Path on Container |
|-------|-------|-------|
| sys-ssl | Stores persistent ssl data. | /opt/sf_ssl |
| sys-mysql | Stores persistent mysql database data. | /var/lib/mysql |
| cms-backup | Stores persistent backup data. | /var/www/html/_backup |
| cms-cache | Stores persistent cache data. | /var/www/html/_cache |
| cms-data | Stores persistent website data. | /var/www/html/_data |
| cms-image | Stores persistent image module data. | /var/www/html/_image |
| cms-store | Stores persistent store data. | /var/www/html/_store |
| cms-template | Stores persistent template data. | /var/www/html/_template |
