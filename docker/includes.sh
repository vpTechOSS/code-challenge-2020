#!/bin/bash

DOCKER_COMPOSE_FILE="-f docker-compose.yml -f docker-compose.dev.yml"
DOCKER_SERVER_USER="david"
DOCKER_SERVER="docker_cc18_server"

APP_PHP="/usr/local/bin/php"
APP_COMPOSER="/usr/local/bin/composer"
APP_CONSOLE="bin/console"
APP_PHPUNIT="bin/phpunit"

if [ "$HOME" == "/home/ubuntu" ]; then
    DOCKER_COMPOSE_FILE="-f docker-compose.yml -f docker-compose.prod.yml"
    DOCKER_SERVER_USER="ubuntu"
fi;