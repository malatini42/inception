# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: malatini <malatini@student.42.fr>          +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2021/11/19 16:50:19 by malatini          #+#    #+#              #
#    Updated: 2021/11/19 16:51:35 by malatini         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM	alpine:3.14

RUN		apk update
RUN		apk add nginx
RUN		apk add openssl

RUN		mkdir -p /etc/nginx/ssl
# SUBJ opts: https://www.ibm.com/docs/en/ibm-mq/7.5?topic=certificates-distinguished-names
RUN 	openssl req -x509 -nodes \
	-out /etc/nginx/ssl/malatini.42.fr.crt \	
	-keyout /etc/nginx/ssl/malatini.42.fr.key \
	-subj "/C=FR/ST=IDF/L=Paris/O=42/OU=42/CN=malatini.42.fr/UID=malatini"

RUN 	mkdir -p /var/run/nginx
COPY	config/nginx.conf /etc/nginx/conf.d/default.conf

RUN		ln -sf /dev/stdout /var/log/nginx/access.log \
			&& ln -sf /dev/stderr /var/log/nginx/error.log

EXPOSE	443

CMD	[ "nginx", "-g", "daemon off;" ]
