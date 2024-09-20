FROM	alpine:3.13

RUN		apk update
RUN		apk add --no-cache --quiet --update curl bash vim
RUN		apk add --no-cache --quiet --update mariadb-client
RUN		apk add --no-cache --quiet --update php7 php-phar \
			php-json php-curl php-fpm php-mysqli php-iconv

RUN		adduser -S nginx &&	addgroup -S nginx
COPY	conf/www.conf /etc/php7/php-fpm.d/www.conf

RUN		wget https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
RUN		chmod +x wp-cli.phar

RUN		cp wp-cli.phar /usr/bin/wp

COPY	script/configure.sh /tmp/configure.sh

WORKDIR	/var/www/html/wordpress

ENTRYPOINT [ "sh", "/tmp/configure.sh" ]


