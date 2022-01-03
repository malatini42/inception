# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: malatini <dev@malatini.dev>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2021/10/18 14:23:42 by malatini            #+#    #+#              #
#    Updated: 2021/10/25 02:20:20 by malatini           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM	alpine:3.13

RUN		apk update
RUN		apk add --no-cache --quiet --update bash vsftpd

COPY	./config/vsftpd.conf /etc/vsftpd/vsftpd.conf
RUN		chmod +x /etc/vsftpd/vsftpd.conf

COPY	./scripts/entrypoint.sh ./

EXPOSE	21

ENTRYPOINT [ "sh", "entrypoint.sh" ]