FROM php:7.4-fpm-alpine

#We need to install the mysql extensions
#il faut ajouter le enable pour que la derniere extension puisse marcher
#installation and activation
RUN docker-php-ext-install mysqli
#pdo pdo_mysql && docker-php-ext-enable pdo-mysql
