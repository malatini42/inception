#Image
FROM php:7.3-fpm-alpine

#Working directory, where we are going to place our assets
WORKDIR  /var/www

RUN apk update && apk add \
    #installing what we need
    build-base \
    vim

#Run docker (install during the boot process?)
#voir pour maria_db
RUN docker-php-ext-install pdo_mysql

#add a group and user 
RUN add-group -g 1000 -S www && \
    adduser -u 1000 -S www -G www

#define the user
USER www

#change the owner
COPY --chown=www:www . /var/www

#en PHP le default por est 9000
EXPOSE 9000