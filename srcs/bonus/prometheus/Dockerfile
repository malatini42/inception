# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: malatini <dev@malatini.dev>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2021/10/18 14:23:42 by malatini            #+#    #+#              #
#    Updated: 2021/10/25 12:44:58 by malatini           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM	debian:buster

RUN		apt-get update
RUN		apt-get -y upgrade
RUN		apt-get -y install prometheus

COPY	./config/prometheus.yml /etc/prometheus/prometheus.yml
RUN		chmod +x /etc/prometheus/prometheus.yml

COPY	./scripts/entrypoint.sh ./entrypoint.sh
RUN 	chmod +x ./entrypoint.sh

ENTRYPOINT [ "sh", "entrypoint.sh" ]