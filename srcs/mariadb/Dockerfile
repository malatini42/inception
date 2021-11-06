#Il nous est demande de build nos container soit sur Alpine Linux "avant derniere version stable", soit debian buster
#Alpine est plus leger donc le choix d'alpine parait judicieux

#En date du 6 novembre l'avant derniere version stale est la 3.13
#https://alpinelinux.org/releases/
FROM alpine:3.13

#DOCUMENTATION OFFICIELLE MARIADB 
#https://mariadb.com/kb/en/creating-a-custom-docker-image/
#La documentation montrait comme exemple d'utiliser ubuntu mais le sujet nous l'interdit

LABEL version="1.0"
LABEL description="MariaDB Server"

#trouve dans la doc mariadb, va verifier si le server est toujours alive
HEALTHCHECK --start-period=5m \
  CMD mariadb -e 'SELECT @@datadir;' || exit 1

#APK - Alpine Linux Package Manager

#Bonnes pratiques, toujours update et upgrade le package manager avant d'installer des dependances
RUN apk update && apk upgrade

#Installation des packages mariadb
RUN apk add mariadb mariadbclient
#Installation de vim pour pouvoir modifier les fichiers depuis le container 
RUN apt add vim 

#Install de dumb-init -> A minimal init system for Linux containers
#Will be useful to handle signals (PID1 - Signal handling in Docker)
#Les containers docker generent des process ayant pour pid 1.
#https://petermalmgren.com/signal-handling-docker/

#Si on run un container "wrapped in a shell script", le scrip shell aura le pid 1 et 
#il sra plus possibe de passer des signaux au process enfant (aka le container).
#Dans ce cas SIGTERM serait ignoré.

#Pour eviter ce probleme, on peut utiliser exec dans notre script shell.
#On peut aussi utiliser un "init like process" comme dumb-init, qui possede des capacites de 
#signal "proxying".

RUN wget -O /usr/bin/dumb-init https://github.com/Yelp/dumb-init/releases/download/v1.2.5/dumb-init_1.2.5_x86_64 && \
#Modification des droits pour qu on puisse l executer
    chmod 777 /usr/bin/dumb-init && \
#Creaion des dossiers et sous dossiers pour accueillir les fichiers de configuration
    mkdir -p /run/mysql/ /var/lib/mysql && \
#Modification de l'ownership pour que ce soit l'user mysql qui soit owner du dossier
    chown mysql /var/lib/mysql && \
#Suppression du fichier de configuration par defaut qui va etre remplace
    rm /etc/my.cnf.d/mariadb-server.cnf \

#Copie de notre fichier de configuration sur le container 
COPY mariadb-server.cnf /etc/my.cnf.d/mariadb-server.cnf

#Copie de notre script sql pour creer un user ?
COPY create_user.sql /home/docker/script/create_user.sql

#Copie du script 
COPY script.sh /home/script/script.sh

RUN chmod 777 /home/script/script.sh

#Exposition du port de MySql par defaut 3306 pour permettre la communication
EXPOSE 3306
#Va nous permettre d eviter les hacky path et d'utiliser un entrypoint propre

#ARG MARIADB_CONFIG_FILE
#RUN mysqld --defaults-file=$MARIADB_CONFIG_FILE
CMD ["mysqld"]

#ENTRYPOINT ["/usr/bin/dumb-init", "--"]
#CMD ["bash", "-c", "do-some-pre-start-thing && exec my-server"]

#we are not allowed to pull a mysql image
#set up a Linux server (docker container) to host mysql
#get users configured in MySQL 
#try to connect to that server to make sure everything is working
