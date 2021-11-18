#Debian was used in ft_server project
FROM debian:buster

#Good practice tag
LABEL maintainer=malatini

#Updating and upgrading package manager for Debian
RUN apt-get update && apt-get upgrade -y

RUN apt-get install wget -y

RUN php php-cgi php-mysql php-fpm php-pdo php-gd php-cli php-mbstring 

# A revoir
RUN rm -rf /var/lib/apt/list*
RUN mkdir /run/ph


RUN mkdir -p /var/www/html/wordress/

#Penser a installer dumb init sur tous les container ?
WORKDIR /var/www/html/wordpress/

COPY ./init_wordpress.sh .

EXPOSE 9000

ENTRYPOINT ["./init_wordpress.sh"]

CMD ["/usr/sbin/php-fpm7.3", "-F"]