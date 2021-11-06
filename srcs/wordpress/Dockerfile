#Debian was used in ft_server project
FROM debian:buster

#Good practice tag
LABEL maintainer=malatini

#Updating and upgrading package manager for Debian
RUN apt-get update && apt-get upgrade -y

#Installing php dependencies needed to run the Wordpress website
#PHP fpm is needed by nginx to be able to interpret php
RUN apt-get -y install php7.3 php-mysqli php-fpm 

#We need a mariadb client to let the frontend and backend "communicate"
RUN mariadb-client

#Copying our configuration file into the container
#May be unnecessary
#COPY ./www.conf /etc/php/7.3/fpm/pool.d

#Telecharger de wordpress directement sur le container
ADD https://ru.wordpress.org/wordpress-5.7.2-ru_RU.tar.gz /var/www/
#Untar the directory 
RUN cd /var/www && tar -xzvf wordpress-5.7.2-ru_RU.tar.gz
#Remove the untared directory
RUN rm -f /var/www/wordpress-5.7.2-ru_RU.tar.gz
#Remove the default config file 
RUN rm -f /var/www/wordpress/wp-config-sample.php
#Copies our config file
COPY ./wp-config.php ./var/www/wordpress/

#PHP FPM must be started in order to make the sockets available
#To make sure we have a socket we can look for a .sock file in the/ /var/run/php7-fpm
#RUN mkdir ./run/php/
#check the -F option
CMD ./usr/sbin/php-fpm7.3 -F