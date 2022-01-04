# Si la base de donnees a deja ete creee on ne rentrera pas dans le premier if
cat .setup 2> /dev/null
if [ $? -ne 0 ]; then
	# https://dev.mysql.com/doc/refman/8.0/en/mysqld-safe.html
	usr/bin/mysqld_safe --datadir=/var/lib/mysql &

	# Apply config
	# sed -i "s|skip-networking|# skip-networking|g" /etc/my.cnf.d/mariadb-server.cnf
	# sed -i "s|.*bind-address\s*=.*|bind-address=0.0.0.0\nport=3306|g" /etc/my.cnf.d/mariadb-server.cnf
	
	# Config MariaDB with default bases
	if ! mysqladmin --wait=30 ping; #then
	then
		printf "Unable to reach mariadb\n"
		exit 1
	fi

	eval "echo \"$(cat /tmp/create_db.sql)\"" | mariadb
	pkill mariadb
	touch .setup
fi

# Va permettre de lancer le daemon
usr/bin/mysqld_safe --datadir=/var/lib/mysql
