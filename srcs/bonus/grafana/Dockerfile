
FROM	alpine:3.13

RUN		apk update
RUN		apk add --no-cache --quiet --update bash curl libc6-compat

RUN		mkdir -p /monitor/grafana

RUN		curl -L https://dl.grafana.com/enterprise/release/grafana-enterprise-8.2.2.linux-amd64.tar.gz \
	-o /tmp/grafana-enterprise-8.2.2.linux-amd64.tar.gz && \
	tar -zxvf /tmp/grafana-enterprise-8.2.2.linux-amd64.tar.gz -C /monitor/grafana && \
	rm /tmp/grafana-enterprise-8.2.2.linux-amd64.tar.gz

WORKDIR /monitor/grafana
RUN		mv grafana-8.2.2/* . && rm -rf grafana-8.2.2/

COPY	./config/provisioning/ /monitor/grafana/conf/provisioning/
COPY	./config/dashboards/ /monitor/grafana/dashboards/
COPY	./config/config.ini /monitor/grafana/conf/custom.ini

RUN		mkdir -p scripts
COPY	./scripts/entrypoint.sh scripts/entrypoint.sh
RUN		chmod +x scripts/entrypoint.sh

ENTRYPOINT [ "sh", "scripts/entrypoint.sh" ]