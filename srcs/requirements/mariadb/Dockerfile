#Il nous est demande de build nos container soit sur Alpine Linux "avant derniere version stable", soit debian buster

FROM debian:buster

#DOCUMENTATION OFFICIELLE MARIADB 
#https://mariadb.com/kb/en/creating-a-custom-docker-image/
#La documentation montrait comme exemple d'utiliser ubuntu mais le sujet nous l'interdit

LABEL version="1.0"
LABEL description="MariaDB Server"

# Installation des packages necessaires
#Bonnes pratiques, toujours update et upgrade le package manager avant d'installer des dependances
RUN apt-get update -y && apt-get upgrade -y

#Installation des packages mariadb
RUN apt-get install mariadb-server mariadb-client

#Purge and recreate /var/lib/mysql users and ownership
RUN rm -rf /var/lib/apt/lists *

#Mysqld handles MySQL installation
#https://dev.mysql.com/doc/refman/8.0/en/mysqld.html
RUN mkdir -p /var/run/mysqld \
    chown mysql /var/run/mysqld \
#ensure /var/run/mysqld is readable, writable and executable
    chmod 777 /var/run/mysqld

#Install de dumb-init -> A minimal init system for Linux containers
#Will be useful to handle signals (PID1 - Signal handling in Docker)
#Les containers docker generent des process ayant pour pid 1.
#https://petermalmgren.com/signal-handling-docker/

#Si on run un container "wrapped in a shell script", le scrip shell aura le pid 1 et 
#il sera plus possible de passer des signaux au process enfant (aka le container).
#Dans ce cas SIGTERM serait ignoré.

#On peut utiliser un "init like process" comme dumb-init, qui possede des capacites de 
#signal "proxying".

RUN wget -O /usr/bin/dumb-init https://github.com/Yelp/dumb-init/releases/download/v1.2.5/dumb-init_1.2.5_x86_64 && \
#Modification des droits pour qu on puisse l executer
    chmod 777 /usr/bin/dumb-init && \
#Creaion des dossiers et sous dossiers pour accueillir les fichiers de configuration
    mkdir -p /run/mysql/ /var/lib/mysql && \
#Modification de l'ownership pour que ce soit l'user mysql qui soit owner du dossier
    chown mysql /var/lib/mysql 
#Suppression du fichier de configuration par defaut qui va etre remplace
#    rm /etc/my.cnf.d/mariadb-server.cnf

EXPOSE 3306

#WORKDIR /usr/local/bin/

#Dans ce script il faudra pouvoir creer les deux utilisateurs
COPY ./conf/create_db.sh /usr/local/bin/

#A revoir s'il y a vraiment besoin de dumb init a parcours du moment ou on n'utilise
#pas de "hacky path"
ENTRYPOINT ["/usr/bin/dumb-init", "&&", "create_db.sh"]

#Allows mysql to listen externaly, being a remote database
CMD ["mysqld", "--bind-address=0.0.0.0"]