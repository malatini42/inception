# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: malatini <dev@malatini.dev>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2021/10/18 14:23:42 by malatini            #+#    #+#              #
#    Updated: 2021/10/26 15:14:28 by malatini           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

# https://wiki.alpinelinux.org/wiki/MariaDB
FROM	alpine:3.13

RUN		apk update
RUN		apk add --no-cache --quiet --update mariadb mariadb-client

RUN		mkdir -p /var/lib/mysqld /run/mysqld
COPY	./config/create_db.sql /tmp/create_db.sql
COPY	./scripts/entrypoint.sh ./

RUN		mariadb-install-db --datadir=/var/lib/mysql \
			--auth-root-authentication-method=normal
RUN		chown -R mysql:mysql /var/lib/mysql /run/mysqld

ENTRYPOINT [ "sh", "entrypoint.sh" ]