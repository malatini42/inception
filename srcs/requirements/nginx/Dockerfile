FROM debian:buster

#Best practice 
#https://docs.docker.com/develop/develop-images/dockerfile_best-practices/
#https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-ubuntu-18-04
RUN apt-get update && apt-get upgrade -y

#Installing nginx 
RUN apt-get install nginx -y

# Installation d'open SSL
RUN apt-get install openssl -y

RUN rm -rf /var/lib/apt/lists/*

#Creation des certificats pour SSL (HTTPS)
RUN openssl req -x509 -newkey rsa:4096 -nodes -keyout /etc/ssl/malatini.42.fr.key -out /etc/ssl/malatini.42.fr.crt -days 365 -sha256 -subj '/C=FR/ST=Paris/L=Paris/O=42Paris/OU=malatini/CN=malatini.42.fr'

#Copie du fichier de configuration nginx
WORKDIR /etc/nginx/sites-available
COPY ./wordpress.conf .
RUN ln -s /etc/nginx/sites-available/wordpress.conf /etc/nginx/sites-enabled 

#COPY wordpress.conf /etc/nginx/conf.d
#COPY wordpress.conf /etc/nginx/http.d/wordpress.conf

#La directive expose doit etre presente sur tous les dockerfile
EXPOSE 443

#Turning on the daemon that is running on 42 vm ?
CMD ["nginx", "-g", "daemon off;"]