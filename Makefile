COMPOSE_FILE	= ./srcs/docker-compose.yml

all:	run

run:
		docker-compose -f ${COMPOSE_FILE} up --build

up:
		docker-compose -f ${COMPOSE_FILE} up --build -d

down:
		docker-compose -f ${COMPOSE_FILE} 	down

restart:
		docker-compose -f ${COMPOSE_FILE} restart

stop:
		docker-compose -f ${CONPOSE_FILE} stop

debug:
		docker-compose -f ${COMPOSE_FILE} --verbose up -d

list:
		docker ps -a

list_volumes:
		docker volume ls

.PHONY: run up down restart down stop list list_volumes clean