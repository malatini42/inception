FROM debian:buster

#DOCUMENTATION OFFICIELLE MARIADB 
#https://mariadb.com/kb/en/creating-a-custom-docker-image/

# Installation des packages necessaires
# Bonnes pratiques, toujours update et upgrade le package manager avant d'installer des dependances
RUN apt-get update -y && apt-get upgrade -y

#Installation des packages mariadb
RUN apt-get install mariadb-server mariadb-client -y

COPY init_db.sh /tmp/.

WORKDIR /tmp/

#Making the database a remote database
RUN rm /etc/mysql/my.cnf && echo "[mysqld]\nport=3306\nbind=0.0.0.0\n" > /etc/mysql/my.cnf

EXPOSE 3306

ENTRYPOINT ["./init_db.sh"]

#Si on n'ajoute pas cette commande le container va se restart en permanence
CMD ["mysqld"]