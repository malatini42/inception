SRCS 			= ./srcs
DOCKER			= sudo docker
COMPOSE 		= cd srcs/ && sudo docker-compose
DATA_PATH 		= /home/malatini/data

.PHONY : all
# Handling DNS issues, build services and start containers
all		:	build
			sudo mkdir -p $(DATA_PATH)
# Seront utilises pour les volumes (les donnees seront ici sur l'hote)
			sudo mkdir -p $(DATA_PATH)/wordpress
			sudo mkdir -p $(DATA_PATH)/database
# Va permettre d'acceder a https://malatini.42.fr en local
			sudo chmod 777 /etc/hosts
			sudo echo "127.0.0.1 malatini.42.fr" >> /etc/hosts
			$(COMPOSE) up -d

.PHONY : build
#build or rebuild services
build	:
			$(COMPOSE) build

.PHONY : up
# Creates and start containers
up:
			${COMPOSE} up -d 

.PHONY : down
# Stops containers and removes containers, networks, volumes, and images created by up
down	:
			$(COMPOSE) down

.PHONY : pause
# Pause containers
pause:
			$(COMPOSE) pause

.PHONY : unpause
# Unpause containers 
unpause:
			$(COMPOSE) unpause

.PHONY : clean
# down and make sure every containers are deleted
clean	:
			$(COMPOSE) down -v --rmi all --remove-orphans

.PHONY : fclean
# cleans and makes sure every volumes, networks and image are deleted
fclean	:	clean
			$(DOCKER) system prune --volumes --all --force
			sudo rm -rf $(DATA_PATH)
			$(DOCKER) network prune --force
			echo docker volume rm $(docker volume ls -q)
			$(DOCKER) image prune --force

.PHONY : re
# $(DOCKER) volume prune --force
re		:	fclean all
