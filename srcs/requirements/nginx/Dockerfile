FROM debian:buster

#Best practice 
#https://docs.docker.com/develop/develop-images/dockerfile_best-practices/
#https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-ubuntu-18-04
RUN apt-get update && apt-get upgrade -y

#Installing nginx 
RUN apt-get install nginx -y

#Les fichiers de configuration sont partages dans le volumes

#La directive expose doit etre presente sur tous les dockerfile
EXPOSE 443

#Turning on the daemon that is running on 42 vm ?
CMD ["nginx", "-g", "daemon off;"]