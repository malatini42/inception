FROM    alpine:3.13

RUN     apk update && apk upgrade && apk add --no-cache \
        nginx openssl

RUN     mkdir /etc/nginx/ssl

RUN     openssl req -newkey rsa:4096 -x509 -sha256 -days 365 -nodes \
                -out /etc/nginx/ssl/malatini.pem \
                -keyout /etc/nginx/ssl/malatini.key \
                -subj "/C=IT/ST=Paris/L=Paris/O=42 School/OU=rmalatini/CN=matini/"

RUN     mkdir -p /run/nginx

COPY    conf/nginx.conf /etc/nginx/conf.d/default.conf

ENTRYPOINT ["nginx", "-g", "daemon off;"]