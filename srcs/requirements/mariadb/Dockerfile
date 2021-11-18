# FROM debian:buster

# #DOCUMENTATION OFFICIELLE MARIADB 
# #https://mariadb.com/kb/en/creating-a-custom-docker-image/

# # Installation des packages necessaires
# # Bonnes pratiques, toujours update et upgrade le package manager avant d'installer des dependances
# RUN apt-get update -y && apt-get upgrade -y

# #Installation des packages mariadb
# RUN apt-get install mariadb-server mariadb-client -y

# COPY init_db.sh /tmp/.

# WORKDIR /tmp/

# #Making the database a remote database
# RUN rm /etc/mysql/my.cnf && echo "[mysqld]\nport=3306\nbind=0.0.0.0\n" > /etc/mysql/my.cnf

# EXPOSE 3306

# ENTRYPOINT ["./init_db.sh"]

# #Si on n'ajoute pas cette commande le container va se restart en permanence
# CMD ["mysqld"]

FROM alpine:3.14

# Mise a jour des paquets
RUN apk update && apk upgrade

# Installation de mariadb 
RUN apk add mariadb mariadb-client

#Creation des dossiers pour le daemon / server 
RUN mkdir -p /var/lib/mysqld /run/mysqld

# Copie des scripts sur le container 
COPY ./create_db.sql /tmp/create_db.sql
COPY ./entrypoint.sh ./

# https://runebook.dev/fr/docs/mariadb/mysql_install_db/index
#Va creer l'user root@localhost avec un msql_native_password (sans mot de passe initial defini)
RUN		mariadb-install-db --datadir=/var/lib/mysql \
			--auth-root-authentication-method=normal
# L'user mysql du groupe mysql obtient l'ownership des dossiers
RUN		chown -R mysql:mysql /var/lib/mysql /run/mysqld

ENTRYPOINT [ "sh", "entrypoint.sh" ]