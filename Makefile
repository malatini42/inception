COMPOSE_FILE	= ./srcs/docker-compose.yml

all:	run

run:
		docker-compose ${COMPOSE_FILE} up --build
#voir pourquoi il faudra le flag force ?

up:
		docker-compose ${COMPOSE_FILE} up --build -d

down:
		docker-compose ${COMPOSE_FILE} 	down

restart:
		docker-compose ${COMPOSE_FILE} restart

stop:
		docker-compose ${CONPOSE_FILE} stop

debug:
		docker-compose ${COMPOSE_FILE} --verbose up -d

list:
		docker ps -a

list_volumes:
		docker volume ls

#A checker
#clean:
#		downs
#		docker stop `docker ps -qa`
#		docker rm `docker ps -qa`
#		docker rmi -f `docker images -qa`
#		docker network rm `docker network ls -q`

#voir s il faut vraiment creer et supprimer les volumes ou si on peut les laissers

#ajouter les autres commandes qui m'interessent pour la correction
#ajouter une commande qui montre les user dans le container de la base de donnees
#ajouter une commande qui montre le domain name ?
#ajouter une commande qui montre depuis la machine hote le port ouvert 

.PHONY: run up down restart down stop list list_volumes clean