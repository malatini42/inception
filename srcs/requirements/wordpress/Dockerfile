# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: malatini <malatini@student.42.fr>          +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2021/11/19 16:50:28 by malatini          #+#    #+#              #
#    Updated: 2021/11/19 16:51:24 by malatini         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM	alpine:3.14

RUN		apk update
RUN		apk add bash curl less
RUN		apk add mariadb-client
RUN		apk add php7 php7-phar \
			php7-json php7-curl php7-fpm php7-mysqli php7-iconv

RUN		mkdir -p /var/www/wordpress /usr/local/bin/wp

# https://wp-cli.org/
RUN		curl https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
			--output /usr/bin/wp --silent
RUN		chmod +x ./usr/bin/wp

# https://wordpress.org/download/releases/
RUN		wp core download --version=5.8.1 --path=/var/www/wordpress
WORKDIR /var/www/wordpress


COPY	config/wp-config /config/wp-config
COPY	./scripts/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN		chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT [ "sh", "/usr/local/bin/entrypoint.sh" ]