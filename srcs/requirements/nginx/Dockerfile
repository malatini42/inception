FROM debian:buster

#Best practice 
#https://docs.docker.com/develop/develop-images/dockerfile_best-practices/
#https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-ubuntu-18-04
RUN apt-get update && apt-get updrade -y

#Installing nginx 
RUN apt-get install nginx -y

#Installing openssl to generate SSL certificates
#We need them to encrypt datas as we are supposed to do using the port 443.
RUN apt-get install openssl -y

#Creation du dossier ssl qui contiendra les certificats
RUN mkidr -p /etc/nginx/ssl

#Basic command used on many tutorials to generale the certificate
#TO DO: check if we need extra options
RUN openssl req -x509 -newkey rsa:4096 -nodes -keyout /etc/nginx/ssl/localhost.key -out /etc/nginx/ssl/localhost.crt -days 365 -subj '/C=FR/ST=Paris/L=Paris/O=42School/OU=malatini/CN=malatini.42.fr'

#copying our default config file
#COPY ./default.conf etc/nginx/sites-enabled/default
COPY ./conf/nginx.conf /etc/nginx/conf.d

#La directive expose doit etre presente sur tous les dockerfile
EXPOSE 443

#Turning on the daemon that is running on 42 vm ?
CMD ["nginx", "-g", "daemon off;"]