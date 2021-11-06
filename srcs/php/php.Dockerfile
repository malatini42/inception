#On ne peut pas utiliser cette image mais on va la prendre pour faire des tests
FROM php:7.4-fpm-alpine

RUN apt-get update && \
    apt-get install -y git zip


