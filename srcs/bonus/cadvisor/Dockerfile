# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: malatini <dev@malatini.dev>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2021/10/25 12:04:58 by malatini            #+#    #+#              #
#    Updated: 2021/10/25 12:33:33 by malatini           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM	debian:buster

RUN		apt-get update
RUN		apt-get -y upgrade
RUN		apt-get -y install curl

RUN 	curl -L	https://github.com/google/cadvisor/releases/download/v0.37.5/cadvisor \
				-o /usr/bin/cadvisor --silent
RUN		chmod +x /usr/bin/cadvisor

ENTRYPOINT	[ "/usr/bin/cadvisor", "-logtostderr" ]