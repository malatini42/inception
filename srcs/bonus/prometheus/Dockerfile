
FROM	debian:buster

RUN		apt-get update
RUN		apt-get -y upgrade
RUN		apt-get -y install prometheus

COPY	./config/prometheus.yml /etc/prometheus/prometheus.yml
RUN		chmod +x /etc/prometheus/prometheus.yml

COPY	./scripts/entrypoint.sh ./entrypoint.sh
RUN 	chmod +x ./entrypoint.sh

ENTRYPOINT [ "sh", "entrypoint.sh" ]