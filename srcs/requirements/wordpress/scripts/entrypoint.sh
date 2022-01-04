# Necessaire de temporiser un peu sinon il y a un probleme d acces a la page
sleep 5 

#On va modifier le fichier www.conf pour que ca fonctionne en local comme demande
target="/etc/php7/php-fpm.d/www.conf"

# On aurait aussi pu reprendre le fichier dans notre dossier config plutot que de fonctionner comme ca
sed -i "s|.*listen = 127.0.0.1.*|listen = 9000|g" $target
echo "env[MARIADB_HOST] = \$MARIADB_HOST" >> $target
echo "env[MARIADB_USER] = \$MARIADB_USER" >> $target
echo "env[MARIADB_PWD] = \$MARIADB_PWD" >> $target
echo "env[MARIADB_DB] = \$MARIADB_DB" >> $target

# Configuration du site wordpress
wp core install --url="$WP_URL" --title="$WP_TITLE" --admin_user="$WP_ADMIN_USER" \
    --admin_password="$WP_ADMIN_PWD" --admin_email="$WP_ADMIN_EMAIL" --skip-email

# Installation de notre theme et "activation"
wp theme install twentysixteen --activate

# Creation du user principal (voir deuxieme user)
# Dans le sujet on parle de la base de la "base de donnees wordpress" donc va aussi les creer dans le service mariadb au cas ou
wp user create $WP_ADMIN_USER --role=author --user_pass=$WP_ADMIN_PWD
wp user create $WP_USER --user_pass=$WP_USER_EMAIL

# Creation d'un article pour l'example
wp post generate --count=5 --post_title="malatini"

# On a besoin de ca pour faire tourner wordpress mais aussi pour que le container keep running
php-fpm7 --nodaemonize