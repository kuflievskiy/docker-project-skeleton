# Instructions

## Step 0. Install docker and docker-compose

```bash
sudo apt-get install docker docker-compose -y
```

## Step 1. In order to build the env for this project from scratch, 
# Remove the containers, images, volume from the local machine.
# You can clear all the docker stuff: containers, images and it's data using these commands:
sudo docker rm $(sudo docker stop $(sudo docker ps -a -q)) && \
sudo docker rmi $(sudo docker images -q) && \
sudo docker volume rm $(sudo docker volume ls -q)

## Step 2. Build images & run the containers
sudo docker-compose up -d --build

## Step 3. Access the site by URL
- Dev site URL: http://localhost:8080/
- PHPMyAdmin: http://localhost:8181/

## Step 4. Login into the container if need to apply some changes to the server configuration

```bash
sudo docker exec -it container_webserver bin/bash
sudo docker exec -it container_dbhost bin/bash

# get the list of active processes inside the container which listen to some port
netstat -an|grep LISTEN
```