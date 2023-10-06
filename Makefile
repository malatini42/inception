NAME			= inception

DOCKER_COMPOSE	= docker-compose -f srcs/docker-compose.yml

DOCKER			= docker

all:			unix
				${DOCKER_COMPOSE} build
				${DOCKER_COMPOSE} up -d

unix:
				echo "127.0.0.1 malatini.42.fr" >> /etc/hosts
				echo "127.0.0.1 www.malatini.42.fr" >> /etc/hosts

ls:
				${DOCKER} ps -a

build: 
				${DOCKER_COMPOSE} build

up: 			${DOCKER_COMPOSE} up -d
	
down:
				${DOCKER_COMPOSE} down

pause:
				${DOCKER_COMPOSE} pause

unpause:
				${DOCKER_COMPOSE} unpause

clean:			down
				rm -rf ~/Desktop/inception
				${DOCKER_COMPOSE} down -v --rmi all --remove-orphans

fclean: 		clean
				${DOCKER} system prune -f

re:				fclean all

.PHONY:			linux stop clean prune all build up

# inspecter les logs 
# docker logs <containerid>

# "rentrer à l'interieur du container"
# docker exec -it <containerid> sh
