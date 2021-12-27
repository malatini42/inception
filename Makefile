SRCS 			:= ./srcs
DOCKER			:= sudo docker
COMPOSE 		:= cd srcs/ && sudo docker-compose
DATA_PATH 		:= /home/malatini/data

#.PHONY	:	all build down clean fclean re
.PHONY	:	all
all		:	build
			sudo mkdir -p $(DATA_PATH)
			sudo mkdir -p $(DATA_PATH)/wordpress
			sudo mkdir -p $(DATA_PATH)/database
ifeq ("$(wildcard .setup)","")
			sudo chmod 777 /etc/hosts
			sudo echo "127.0.0.1 malatini.42.fr" >> /etc/hosts
			touch .setup
endif
			$(COMPOSE) up -d

.PHONY	:	build
build	:
			$(COMPOSE) build

.PHONY	:	down
down	:
			$(COMPOSE) down

.PHONY	:	clean
clean	:
			$(COMPOSE) down -v --rmi all --remove-orphans

.PHONY	:	fclean
fclean	:	clean
			$(DOCKER) system prune --volumes --all --force
			sudo rm -rf $(DATA_PATH)
			$(DOCKER) network prune --force
			$(DOCKER) volume prune --force
			$(DOCKER) image prune --force

.PHONY	:	re
re		:	fclean all