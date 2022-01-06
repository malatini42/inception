# La version 3.15 bug avec ces commandes
FROM	alpine:3.14

# Mise a jour du gestionnaire de paquet
RUN		apk update

# Installation de nginx et openssl
RUN		apk add --no-cache --quiet --update nginx
RUN		apk add --no-cache --quiet --update openssl

# Creation du dossier qui va recueillir le certificat et la cle (pour HTTPS)
RUN		mkdir -p /etc/nginx/ssl

# Generation des certificats et cles au nom du student
RUN 	openssl req -x509 -nodes \
	-out /etc/nginx/ssl/malatini.42.fr.crt \	
	-keyout /etc/nginx/ssl/malatini.42.fr.key \
	-subj "/C=FR/ST=IDF/L=Paris/O=42/OU=42/CN=malatini.42.fr/UID=malatini"

# Creation du dossier qui va contenir les fichiers de configurations de nginx pour le serveur
RUN 	mkdir -p /var/run/nginx

# Copie sur le container du fichier de configuration pour servir la page qu'on souhaite
COPY	config/nginx.conf /etc/nginx/http.d/default.conf

# Exposition du seul port autorise par le sujet
EXPOSE	443

# Lancement de nginx en premier plan et non en background (les logs seront dans /var/log/nginx) 
# pour que le container ne se stop pas
CMD	[ "nginx", "-g", "daemon off;" ]
