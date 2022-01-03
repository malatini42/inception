
FROM	alpine:3.13

RUN		apk update
RUN		apk add --no-cache --quiet --update bash vsftpd

COPY	./config/vsftpd.conf /etc/vsftpd/vsftpd.conf
RUN		chmod +x /etc/vsftpd/vsftpd.conf

COPY	./scripts/entrypoint.sh ./

EXPOSE	21

ENTRYPOINT [ "sh", "entrypoint.sh" ]