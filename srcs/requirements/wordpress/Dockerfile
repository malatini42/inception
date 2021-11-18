#Debian was used in ft_server project
# FROM debian:buster

# #Good practice tag
# LABEL maintainer=malatini

# #Updating and upgrading package manager for Debian
# RUN apt-get update && apt-get upgrade -y
# RUN apt-get install wget -y
# RUN apt-get -y install php7.3 php-cgi php-mysql php-fpm php-pdo php-gd php-cli php-mbstring 

# # A revoir
# #RUN rm -rf /var/lib/apt/list*
# #RUN mkdir /run/ph

# RUN mkdir -p /var/www/html/

# WORKDIR /var/www/html/

# #Telechargement de wordpress comme sur ft_server
# RUN wget https://wordpress.org/latest.tar.gz
# RUN tar -xvzf latest.tar.gz && rm -rf latest.tar.gz

# COPY ./wp-config.php ./wordpress

# #WORKDIR /tmp/
# #COPY ./init_wordpress.sh .

# EXPOSE 9000

# CMD ["/usr/sbin/php-fpm7.3", "-F"]

FROM	alpine:3.13

RUN		apk update
RUN		apk add --no-cache --quiet --update bash curl less
RUN		apk add --no-cache --quiet --update mariadb-client redis
RUN		apk add --no-cache --quiet --update php7 php7-phar \
			php7-json php7-curl php7-fpm php7-mysqli php7-iconv

RUN		mkdir -p /var/www/wordpress /usr/local/bin/wp

# https://wp-cli.org/
RUN		curl https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
			--output /usr/bin/wp --silent
RUN		chmod +x ./usr/bin/wp

# https://wordpress.org/download/releases/
RUN		wp core download --version=5.8.1 --path=/var/www/wordpress
WORKDIR /var/www/wordpress


COPY	wp-config /config/wp-config
COPY	./scripts/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN		chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT [ "sh", "/usr/local/bin/entrypoint.sh" ]