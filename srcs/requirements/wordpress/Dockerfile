#Debian was used in ft_server project
FROM debian:buster

#Good practice tag
LABEL maintainer=malatini

#Updating and upgrading package manager for Debian
RUN apt-get update && apt-get upgrade -y

# Installation de php
RUN apt-get install wget -y

# Installation de php
RUN apt -y install lsb-release apt-transport-https ca-certificates
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list
RUN apt-get update -y 
RUN apt -y install php7.4

#L'outils wp-admin suggere de telecharger une version plus a jour que php7.3 mais ces versions sont moins stables
#et plus difficiles a installer via un container
#RUN apt install php8.0-fpm

RUN apt install -y php7.4-mysql php7.4-cli php7.4-common php7.4-snmp php7.4-curl php7.4-mbstring php7.4-zip -y

EXPOSE 9000

#Penser a installer dumb init sur tous les container ?
WORKDIR /var/www/html/wordpress/

CMD ["/usr/sbin/php-fpm7.4 -F"]