SRCS 			= ./srcs
DOCKER			= docker
COMPOSE 		= cd srcs/ && docker-compose
DATA_PATH 		= /home/malatini/data

all		:	build
			sudo mkdir -p $(DATA_PATH)
			sudo mkdir -p $(DATA_PATH)/wordpress
			sudo mkdir -p $(DATA_PATH)/database
			sudo chmod 777 /etc/hosts
			sudo echo "127.0.0.1 malatini.42.fr" >> /etc/hosts
			$(COMPOSE) up -d

build	:
			$(COMPOSE) build

down	:
			$(COMPOSE) down

clean	:
			$(COMPOSE) down -v --rmi all --remove-orphans

fclean	:	clean
			$(DOCKER) system prune --volumes --all --force
			sudo rm -rf $(DATA_PATH)
			$(DOCKER) network prune --force
			$(DOCKER) volume prune --force
			$(DOCKER) image prune --force

re		:	fclean all
