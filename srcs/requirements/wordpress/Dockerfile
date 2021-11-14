#Debian was used in ft_server project
FROM debian:buster

#Good practice tag
LABEL maintainer=malatini

#Updating and upgrading package manager for Debian
RUN apt-get update && apt-get upgrade -y

#Installing php dependencies needed to run the Wordpress website
RUN apt-get -y install wget php php-cgi php-mysql php-fpm php-pdo php-gd php-cli php-mbstring

#Purgence the apt/lists folder (?)
RUN rm -rf /var/lib/apt/lists/*

#Copy the config file
COPY ./conf/www.conf /var/www/html/

#Create a folder to enable php start (+ sockets to be available), we'll be sure that there is a .sock file in the folder
RUN mkdir - /run/php

#Telecharger de wordpress directement sur le container
ADD https://ru.wordpress.org/wordpress-5.7.2-ru_RU.tar.gz /var/www/
#Untar the directory 
RUN cd /var/www && tar -xzvf wordpress-5.7.2-ru_RU.tar.gz
#Remove the untared directory
RUN rm -f /var/www/wordpress-5.7.2-ru_RU.tar.gz
#Remove the default config file 
RUN rm -f /var/www/wordpress/wp-config-sample.php

EXPOSE 9000

ENTRYPOINT ["check_wp.sh"]

#Penser a installer dumb init sur tous les container ?

WORKDIR /var/www/html/

#Lancement de php a au lancement du container, voir l'option -F
CMD ["/usr/sbin/php-fpm7.3", "-F"]