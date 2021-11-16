FROM debian:buster

#DOCUMENTATION OFFICIELLE MARIADB 
#https://mariadb.com/kb/en/creating-a-custom-docker-image/

LABEL version="1.0"
LABEL description="MariaDB Server"

# Installation des packages necessaires
#Bonnes pratiques, toujours update et upgrade le package manager avant d'installer des dependances
RUN apt-get update -y && apt-get upgrade -y
#Installation des packages mariadb
RUN apt-get install mariadb-server mariadb-client

#Starting, Enabling
#RUN systemctl start mariadb.service
#RUN systemctl enable mariadb.service

#Voir si on peut l'ajouter
#RUN sudo mysql_secure_installation -n

#Mysqld handles MySQL installation
#https://dev.mysql.com/doc/refman/8.0/en/mysqld.html
RUN mkdir -p /var/run/mysqld \
    chown mariadb /var/run/mysqld \
#ensure /var/run/mysqld is readable, writable and executable
    chmod 777 /var/run/mysqld

EXPOSE 3306

#Dans ce script il faudra pouvoir creer les deux utilisateurs
#COPY ./conf/create_db.sh /usr/local/bin/

ENTRYPOINT ["create_db.sh"]

#Allows mysql to listen externaly, being a remote database
CMD ["mysqld", "--bind-address=0.0.0.0"]