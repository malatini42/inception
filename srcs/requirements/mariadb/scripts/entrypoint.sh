# Si la base de donnees a deja ete creee on ne rentrera pas dans le premier if
cat .setup 2> /dev/null
if [ $? -ne 0 ]; then
	# https://dev.mysql.com/doc/refman/8.0/en/mysqld-safe.html
	# Le & va etre utilise pour effectuer une "modification sur le serveur MySQL" - mysql driver avec des options
	usr/bin/mysqld_safe --datadir=/var/lib/mysql & #--datadir=/var/lib/mysql
	
	# Config MariaDB with default bases
	# if ! mysqladmin --wait=30 ping; #then
	# then
	# 	printf "Unable to reach mariadb\n"
	# 	exit 1
	# fi

	# Il est necessaire d'attendre que la base de donnee soit bien accessible, mysql lance
	while ! mysqladmin ping -h "$MARIADB_HOST" --silent; do
    	sleep 1
	done

	eval "echo \"$(cat /tmp/create_db.sql)\"" | mariadb
	# pkill mariadb
	touch .setup
fi

# Va permettre de lancer le serveur de facon securisee
usr/bin/mysqld_safe #--datadir=/var/lib/mysql
