# Utilisation de l image la plus legere
FROM	alpine:3.13

# Mise a jour du gestionnaire de paquet + telechargements des outils
RUN		apk update
RUN		apk add --no-cache --quiet --update bash curl
RUN		apk add --no-cache --quiet --update mariadb-client
RUN		apk add --no-cache --quiet --update php7 php7-phar \
			php7-json php7-curl php7-fpm php7-mysqli php7-iconv

RUN		mkdir -p /var/www/wordpress /usr/local/bin/wp

# Telecharger de la wordpress cli + ajout des droits d execution puisque c est une commande
RUN		curl https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
			--output /usr/bin/wp --silent
RUN		chmod +x ./usr/bin/wp

# Telechargement de wordpress via la wp cli
RUN		wp core download --version=5.8.1 --path=/var/www/wordpress

# Modification du workdir
WORKDIR /var/www/wordpress

#COPY	./config/wp-config.php ./config/wp-config.php
COPY	./config/wp-config.php ./wp-config.php

#On copie le script entrypoint 
COPY	./scripts/entrypoint.sh /usr/local/bin/entrypoint.sh

# Ajout des droits d execution sur le script entrypoint
RUN		chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT [ "sh", "/usr/local/bin/entrypoint.sh" ]