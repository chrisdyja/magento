#!/bin/bash

docker stop $(docker ps -a -q)
docker rm $(docker ps -a -q)
docker-compose up -d

#connect to docker
docker exec -it $(docker ps | grep "web" | awk '{print $1}') bash