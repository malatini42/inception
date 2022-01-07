# Utilisation de l image la plus legere
FROM	alpine:3.14

# Mise a jour du gestionnaire de paquet + telechargements des outils
# php7-iconv est necessaire pour acceder a la partie wp-admin
RUN		apk update
RUN		apk add --no-cache --quiet --update curl bash vim
RUN		apk add --no-cache --quiet --update mariadb-client
RUN		apk add --no-cache --quiet --update php7 php-phar \
			php-json php-curl php-fpm php-mysqli php-iconv

# On cree le dossier "standard"
RUN		mkdir -p /var/www/wordpress 

# Telecharger de la wordpress cli + ajout des droits d execution puisque c est une commande
RUN		curl https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
			--output /usr/bin/wp 

# On ajoute les droits d execution sur la command wp cli
RUN		chmod +x ./usr/bin/wp 

# Telechargement de wordpress via la wp cli
RUN		wp core download --path=/var/www/wordpress

# Modification du workdir
WORKDIR /var/www/wordpress

# On copie le fichier de config pour que ca puisse marcher sur le container
COPY	config/wp-config /config/wp-config

# On copie le script entrypoint 
COPY	./scripts/entrypoint.sh /tmp/entrypoint.sh

# Ajout des droits d execution sur le script entrypoint
RUN		chmod +x /tmp/entrypoint.sh

#On passe par un entrypoint pour eviter les hacky path
ENTRYPOINT ["sh", "/tmp/entrypoint.sh"]