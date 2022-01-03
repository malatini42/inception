
FROM	alpine:3.13

RUN		apk update
RUN		apk add --no-cache --quiet --update redis

COPY	./scripts/entrypoint.sh ./entrypoint.sh
RUN		chmod +x ./entrypoint.sh

ENTRYPOINT [ "sh", "./entrypoint.sh" ]