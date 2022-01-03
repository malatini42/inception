# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: malatini <dev@malatini.dev>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2021/10/18 15:05:48 by malatini            #+#    #+#              #
#    Updated: 2021/10/25 14:05:37 by malatini           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

#
#	-	[	BUILD	]
#

FROM	alpine:3.13 as build

WORKDIR	/app
ENV 	PATH /app/node_modules/.bin:$PATH

RUN		apk update
RUN		apk add --no-cache --quiet --update nodejs
RUN		apk add --no-cache --quiet --update npm

COPY	package.json ./
RUN		npm install --silent --only=production --no-optional

COPY 	src/ ./src
COPY	public/ ./public

RUN		npm run build

#	
#	-	[	SERVER	]
#

FROM 	alpine:3.13 as server

RUN		apk update
RUN		apk add --no-cache --quiet --update nginx
RUN		apk add --no-cache --quiet --update openssl

RUN		mkdir -p /var/run/nginx
COPY	--from=build /app/build /var/www/html
COPY	config/nginx.conf /etc/nginx/conf.d/default.conf

CMD		[ "nginx", "-g", "daemon off;" ]