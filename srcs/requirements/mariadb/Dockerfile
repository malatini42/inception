
# Depuis l'image la plus legere
FROM	alpine:3.15

# Mise a jour du gestionnaire de paquet, bonne pratique
RUN		apk update

# Installation de mariadb et mariadb client
RUN		apk add --no-cache --quiet --update mariadb mariadb-client

# Creation du dossier mysqld qui va etre utilise par le daemon (pour faire "tourner" la base de donnee)
RUN		mkdir -p /var/lib/mysqld /run/mysqld

# Execution du script de creation de la base de donnees
COPY	./config/create_db.sql /tmp/create_db.sql

# Copie du script entrypoint sur le container
#COPY	./scripts/entrypoint.sh ./

# Installation de la base de donnee effective et authentification
RUN		mariadb-install-db --datadir=/var/lib/mysql \
			--auth-root-authentication-method=normal

# Le user mysql doit etre le owner des dossiers relatifs a mysql
RUN		chown -R mysql:mysql /var/lib/mysql /run/mysqld

ENTRYPOINT [ "sh", "entrypoint.sh" ]