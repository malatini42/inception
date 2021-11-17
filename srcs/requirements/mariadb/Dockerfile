FROM debian:buster

#DOCUMENTATION OFFICIELLE MARIADB 
#https://mariadb.com/kb/en/creating-a-custom-docker-image/

# Installation des packages necessaires
#Bonnes pratiques, toujours update et upgrade le package manager avant d'installer des dependances
RUN apt-get update -y && apt-get upgrade -y
#Installation des packages mariadb
RUN apt-get install mariadb-server mariadb-client -y

RUN rm -rf /var/lib/apt/lists/*

# RUN  apt-get install systemd -y
#RUN mkdir -p /var/lib/mysql/wordpress

#WORKDIR /var/lib/mysql/wordpress

#COPY /var/lib/mysql/wordpress/ .

#RUN service start mysql
#RUN mysql -u root

EXPOSE 3306
#RUN systemctl start mariadb
#Attention la base de donnees doit etre accessible pour wordpress
#CMD ["mysqld", "--bind-address=0.0.0.0"];