#!/bin/bash
APPLICATION_NAME=stewartmarsh

helm del $APPLICATION_NAME
docker rm -f "${APPLICATION_NAME}_local_mount"
