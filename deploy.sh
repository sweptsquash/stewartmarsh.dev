#!/bin/bash
APPLICATION_NAME=stewartmarsh
HOSTS_FILE=/etc/hosts
IS_MICROSOFT=$(uname -a | grep -i "Microsoft" | wc -l)
PROJECT_PATH=$(pwd)

if [ $IS_MICROSOFT -gt 0 ]; then
    HOSTS_FILE="/c/Windows/System32/drivers/etc/hosts"
fi

ARGS=("--install" $APPLICATION_NAME "--debug" "charts" "--set projectPath=$PROJECT_PATH")

helm upgrade ${ARGS[@]}

DOCKER_CONTAINER="${APPLICATION_NAME}_local_mount"

if [ $(docker ps | grep -c "${DOCKER_CONTAINER}") -lt 1 ]; then
    if [ $(docker ps --all | grep -c "${DOCKER_CONTAINER}") -ge 1 ]; then
        docker rm "${DOCKER_CONTAINER}"
    fi

    docker run -t -d --restart=always --name "${DOCKER_CONTAINER}" -w /var/www/stewartmarsh.test -v $(pwd):/var/www/stewartmarsh.test:delegated alpine sh
fi

# Update Host File
HOSTS=$(kubectl get ing | awk '/^'$APPLICATION_NAME'/ {print $3}')
IFS=',' read -r -a ADDRESSARRAY <<< $HOSTS

for ADDRESS in "${ADDRESSARRAY[@]}"
do
    if [ $(grep -c "${ADDRESS}" $HOSTS_FILE) -lt 1 ]; then
        echo "127.0.0.1 ${ADDRESS}" | sudo tee -a $HOSTS_FILE
    fi
done

# Install & Build Frontend
cd $PROJECT_PATH && composer install --no-interaction --optimize-autoloader
cd $PROJECT_PATH && npm install && npm run dev
