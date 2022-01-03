# Deuxieme fichier essentiel de configuration de wordpress
target="/etc/php7/php-fpm.d/www.conf"

# Equivalent a ecrire en ligne de commande, connexion a la base de donnees
grep -E "listen = 127.0.0.1" $target > /dev/null 2>&1
if [ $? -eq 0 ]; then
	sed -i "s|.*listen = 127.0.0.1.*|listen = 9000|g" $target
	echo "env[MARIADB_HOST] = \$MARIADB_HOST" >> $target
	echo "env[MARIADB_USER] = \$MARIADB_USER" >> $target
	echo "env[MARIADB_PWD] = \$MARIADB_PWD" >> $target
	echo "env[MARIADB_DB] = \$MARIADB_DB" >> $target
	sleep 5
fi

# Configuration du site wordpress
wp core install --url="$WP_URL" --title="$WP_TITLE" --admin_user="$WP_ADMIN_USER" \
	--admin_password="$WP_ADMIN_PWD" --admin_email="$WP_ADMIN_EMAIL" --skip-email

# Installation de notre theme et "activation"
wp theme install twentysixteen --activate

# Creation du user principal (voir deuxieme user)
wp user create $WP_USER $WP_USER_EMAIL --role=author --user_pass=$WP_USER_PWD

#force to stay in foreground and ingore daemonize option from configuration file
#Si on ne le met pas on aura une 502 et on tournera en boucle sans arriver sur la page
php-fpm7 --nodaemonize
