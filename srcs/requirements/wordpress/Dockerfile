# Utilisation de l image la plus legere
FROM	alpine:3.15

# Mise a jour du gestionnaire de paquet + telechargements des outils
RUN		apk update
RUN		apk add --no-cache --quiet --update curl
RUN		apk add --no-cache --quiet --update mariadb-client
RUN		apk add --no-cache --quiet --update php7 php7-phar \
			php7-json php7-curl php7-fpm php7-mysqli

# Telecharger de la wordpress cli + ajout des droits d execution puisque c est une commande
RUN		curl https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
			--output /usr/bin/wp 

# On ajoute les droits d execution sur la command wp cli
RUN		chmod +x ./usr/bin/wp

# On cree le dossier "standard"
RUN		mkdir -p /var/www/wordpress

# Telechargement de wordpress via la wp cli
RUN		wp core download --path=/var/www/wordpress

# Modification du workdir
WORKDIR /var/www/wordpress

# On copie le fichier de config pour que ca puisse marcher sur le container
COPY	./config/wp-config.php ./config/wp-config.php
COPY	./config/wp-config.php ./wp-config.php

# On copie le script entrypoint 
COPY	./scripts/entrypoint.sh .

# Ajout des droits d execution sur le script entrypoint
RUN		chmod +x entrypoint.sh

#On passe par un entrypoint pour eviter les hacky path, sera execute au build uniquement
ENTRYPOINT [ "sh", "./entrypoint.sh" ]