#!/bin/sh

while ! mariadb -h$MYSQL_HOST -u$WP_DATABASE_USR -p$WP_DATABASE_PWD $WP_DATABASE_NAME &>/dev/null; do
    sleep 3
done

if [ ! -f "/var/www/html/index.html" ]; then
    wp core download --locale=fr_FR
    wp config create --dbname=$WP_DATABASE_NAME --dbuser=$WP_DATABASE_USR --dbpass=$WP_DATABASE_PWD --dbhost=$MYSQL_HOST --dbcharset="utf8" --dbcollate="utf8_general_ci"
    wp core install --url=$DOMAIN_NAME --title=$WP_TITLE --admin_user=$WP_ADMIN_USR --admin_password=$WP_ADMIN_PWD --admin_email=$WP_ADMIN_EMAIL
    wp user create $WP_USR $WP_EMAIL --role=author --user_pass=$WP_PWD
    wp theme install inspiro --activate
fi
php-fpm7 --nodaemonize