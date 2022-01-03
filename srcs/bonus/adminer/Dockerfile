FROM	alpine:3.13

RUN		apk upgrade
RUN		apk add --no-cache --quiet --update curl
RUN		apk add --no-cache --quiet --update php7 \
	php7-session php7-fpm php7-mysqli

COPY	./scripts/entrypoint.sh /usr/bin/local/entrypoint.sh
RUN		chmod +x /usr/bin/local/entrypoint.sh

WORKDIR /var/www/wordpress
ENTRYPOINT [ "sh", "/usr/bin/local/entrypoint.sh" ]