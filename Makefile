SRCS 			= ./srcs
DOCKER			= docker
COMPOSE 		= cd srcs/ && sudo docker compose
DATA_PATH_VM 	= /home/malatini/data
DATA_PATH		= /Users/mahautlatinis/Desktop/inception_tmp
HOST_MAC		= /private/etc/hosts
HOST_LINUX 		= /etc/hosts

all		:	build
			mkdir -p $(DATA_PATH)
			sudo mkdir -p /var/www/wordpress
			sudo chmod 777 /var/www/wordpress
			mkdir -p $(DATA_PATH)/wordpress
			mkdir -p $(DATA_PATH)/database
			$(COMPOSE) up -d

# all it to all rules with HOST_OS (your os Linux / Mac) for correction
# sudo chmod 777 $(HOST_MAC)
# sudo echo "127.0.0.1 malatini.42.fr" >> $(HOST_MAC)
# sudo echo "127.0.0.1 www.malatini.42.fr" >> $(HOST_MAC)


#build or rebuild services
build	:
			$(COMPOSE) build

# Creates and start containers
up:
			${COMPOSE} up -d

# Stops containers and removes containers, networks, volumes, and images created by up
down	:
			$(COMPOSE) down

# Pause containers
pause:
			$(COMPOSE) pause

# Unpause containers
unpause:
			$(COMPOSE) unpause

# down and make sure every containers are deleted
clean	:
			$(COMPOSE) down -v --rmi all --remove-orphans

# cleans and makes sure every volumes, networks and image are deleted
fclean	:	clean
			$(DOCKER) system prune --volumes --all --force
			$(DOCKER) network prune --force
			echo docker volume rm $(docker volume ls -q)
			$(DOCKER) image prune --force

# $(DOCKER) volume prune --force
re		:	fclean all

# Demandé dans la fiche de correction
# 			@ sudo docker stop $(docker ps -qa)
# 			@ sudo docker rm $(docker ps -qa)
# 			@ sudo docker rmi -f $(docker images -qa)
# 			@ sudo docker volume rm $(docker volume ls -q)
# 			@ sudo docker network rm $(docker ls -q)

.PHONY : all build up down pause unpause clean fclean re
