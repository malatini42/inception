# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    entrypoint.sh                                      :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: malatini <dev@malatini.dev>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2021/10/24 15:17:06 by malatini            #+#    #+#              #
#    Updated: 2021/10/24 22:21:17 by malatini           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

target="/etc/php7/php-fpm.d/www.conf"
grep -E "listen = 127.0.0.1" $target > /dev/null 2>&1
if [ $? -eq 0 ]; then
	sed -i "s|.*listen = 127.0.0.1.*|listen = 9000|g" $target
	echo "env[MARIADB_HOST] = \$MARIADB_HOST" >> $target
	echo "env[MARIADB_USER] = \$MARIADB_USER" >> $target
	echo "env[MARIADB_PWD] = \$MARIADB_PWD" >> $target
	echo "env[MARIADB_DB] = \$MARIADB_DB" >> $target
fi

if [ ! -f "wp-config.php" ]; then
	cp /config/wp-config ./wp-config.php

# 	if [[ "$WP_ADMIN_USER" == *"admin"* ]]; then
# 		printf "WP_ADMIN_USER must not contain `admin`\n" "$WP_ADMIN_USER"
# 		exit 1
# 	fi

# 	if [[ "$WP_ADMIN_USER" == *"Admin"* ]]; then
# 		printf "WP_ADMIN_USER must not contain `Admin`\n" "$WP_ADMIN_USER"
# 		exit 1
# 	fi

	sleep 5;
	if ! mysqladmin -h $MARIADB_HOST -u $MARIADB_USER \
		--password=$MARIADB_PWD --wait=60 ping > /dev/null; then
		printf "MySQL is not available.\n"
		exit 1
	fi
	wp core install --url="$WP_URL" --title="$WP_TITLE" --admin_user="$WP_ADMIN_USER" \
		--admin_password="$WP_ADMIN_PWD" --admin_email="$WP_ADMIN_EMAIL" --skip-email

	wp plugin install redis-cache --activate
	wp plugin update --all

	wp user create $WP_USER $WP_USER_EMAIL --role=author --user_pass=$WP_USER_PWD

	wp redis enable
fi

php-fpm7 --nodaemonize
