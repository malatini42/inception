#Debian was used in ft_server project
FROM debian:buster

#Good practice tag
LABEL maintainer=malatini

#Updating and upgrading package manager for Debian
RUN apt-get update && apt-get upgrade -y
RUN apt-get install wget -y
RUN apt-get -y install php7.3 php-cgi php-mysql php-fpm php-pdo php-gd php-cli php-mbstring 

# A revoir
#RUN rm -rf /var/lib/apt/list*
#RUN mkdir /run/ph

RUN mkdir -p /var/www/html/

WORKDIR /var/www/html/

#Telechargement de wordpress comme sur ft_server
RUN wget https://wordpress.org/latest.tar.gz
RUN tar -xvzf latest.tar.gz && rm -rf latest.tar.gz

COPY ./wp-config.php ./wordpress

#WORKDIR /tmp/
#COPY ./init_wordpress.sh .

EXPOSE 9000

CMD ["/usr/sbin/php-fpm7.3", "-F"]