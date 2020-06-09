# Instructions.

## Install docker and docker-compose.

```bash
sudo apt-get install docker docker-compose -y
```

## In order to build the env for this project from scratch, 
# Remove the containers, images, volume from the local machine.
# You can clear all the docker stuff: containers, images and it's data using these commands:

```bash
sudo docker rm $(sudo docker stop $(sudo docker ps -a -q)) && \
sudo docker rmi $(sudo docker images -q) && \
sudo docker volume rm $(sudo docker volume ls -q)
```

# Add your user to docker group:

```
sudo usermod -aG docker $USER
```

Then just use:

```bash
docker rm $(docker stop $(docker ps -a -q)) && \
docker rmi $(docker images -q) && \
docker volume rm $(docker volume ls -q)
```

## Configure sSMTP connection via Google SMTP (Optional).

```bash
cp docker/webserver/etc/ssmtp/ssmtp.conf.sample docker/webserver/etc/ssmtp/ssmtp.conf
vim docker/webserver/etc/ssmtp/ssmtp.conf
```

## Build images & run the containers.

```bash
sudo docker-compose up -d --build
```

## Access the site by URL.

- Dev site URL: http://localhost:8080/
- PHPMyAdmin: http://localhost:8181/

## Login into the container if need to apply some changes to the server configuration.

```bash
sudo docker exec -it container_webserver bin/bash
sudo docker exec -it container_dbhost bin/bash
```

# Get the list of active processes inside the container which listen to some port.

```bash
apt-get update
apt-get install -y net-tools
netstat -an|grep LISTEN
```

# Install the site (Drupal/Wordpress)
```
docker exec container_webserver wordpress.sh
http://localhost:8080/
http://localhost:8080/wp-login.php
admin
admin

docker exec container_webserver drupal.sh
http://localhost:8080/
```
