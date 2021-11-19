# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Makefile                                           :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: malatini <malatini@student.42.fr>          +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2021/11/19 16:32:44 by malatini          #+#    #+#              #
#    Updated: 2021/11/19 16:37:48 by malatini         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

SRCS 			:= ./srcs
DOCKER			:= sudo docker
COMPOSE 		:= cd srcs/ && sudo docker-compose
DATA_PATH 		:= /home/malatini/data

all		:	build
			sudo mkdir -p $(DATA_PATH)
			sudo mkdir -p $(DATA_PATH)/wordpress
			sudo mkdir -p $(DATA_PATH)/database
			$(COMPOSE) up -d

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

.PHONY	:	all down clean fclean re