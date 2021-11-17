#Debian was used in ft_server project
FROM debian:buster

#Good practice tag
LABEL maintainer=malatini

#Updating and upgrading package manager for Debian
RUN apt-get update && apt-get upgrade -y

RUN apt list php

RUN apt install -y lsb-release apt-transport-https ca-certificates wget -y
#Installing php dependencies needed to run the Wordpress website
#RUN apt install ca-certificates -y \
 #           apt-transport-https -y \
  #          software-properties-common -y

#RUN add-apt-repository ppa:ondrej/php -y 
#RUN add-apt-repository ppa:ondrej/nginx -y 
#RUN apt install php-fpm -y
#RUN apt install php-common php-mysql php-cgi php-mbstring php-curl php-gd php-xml php-xmlrpc php-pear -y

#Exposing the port
#listens on the stated network ports during runtime
EXPOSE 9000

#Penser a installer dumb init sur tous les container ?
WORKDIR /var/www/html/wordpress/

CMD ["/usr/sbin/php-fpm8.0 -F"]