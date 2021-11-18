#!/bin/bash
service mysql start

echo "CREATE DATABASE IF NOT EXISTS $MYSQL_DATABASE DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;" | mysql -u root
echo "CREATE USER IF NOT EXISTS '$MYSQL_ADMIN'@'localhost' IDENTIFIED BY '$MYSQL_PASSWORD';" | mysql -u root
#Creation du deuxieme user
echo "CREATE USER IF NOT EXISTS '$MYSQL_USER'@'localhost' IDENTIFIED BY '$MYSQL_PASSWORD';" | mysql -u root
#Granting all privileges make it an admin
echo "GRANT ALL PRIVILEGES ON $MYSQL_DATABASE .* TO '$MYSQL_ADMIN'@'%' WITH GRANT OPTION;" | mysql -u root
echo "GRANT INSERT, UPDATE DELETE ON $MYSQL_DATABASE.* TO '$MYSQL_USER'"
echo "FLUSH PRIVILEGES;" | mysql -u root