#! /bin/bash
APPLICATION_NAME=stewartmarsh

echo "DOCKER_BUILDKIT=1 docker build -t $APPLICATION_NAME ."
DOCKER_BUILDKIT=1 docker build -t "$APPLICATION_NAME" . --progress=plain
