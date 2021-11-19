# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: malatini <malatini@student.42.fr>          +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2021/11/19 16:49:59 by malatini          #+#    #+#              #
#    Updated: 2021/11/19 16:51:41 by malatini         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

# https://wiki.alpinelinux.org/wiki/MariaDB
FROM	alpine:3.14

RUN		apk update
RUN		apk add --no-cache --quiet --update mariadb mariadb-client

RUN		mkdir -p /var/lib/mysqld /run/mysqld
COPY	./config/create_db.sql /tmp/create_db.sql
COPY	./scripts/entrypoint.sh ./

RUN		mariadb-install-db --datadir=/var/lib/mysql \
			--auth-root-authentication-method=normal
RUN		chown -R mysql:mysql /var/lib/mysql /run/mysqld

ENTRYPOINT [ "sh", "entrypoint.sh" ]