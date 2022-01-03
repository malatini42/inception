
	usr/bin/mysqld_safe --datadir=/var/lib/mysql &

	# Apply config
	sed -i "s|skip-networking|# skip-networking|g" /etc/my.cnf.d/mariadb-server.cnf
	sed -i "s|.*bind-address\s*=.*|bind-address=0.0.0.0\nport=3306|g" /etc/my.cnf.d/mariadb-server.cnf
	
	# Config MariaDB with default bases
	mysqladmin --wait=30 ping
	 #then
	 #	printf "Unable to reach mariadb\n"
	 #	exit 1
	 #fi

	eval "echo \"$(cat /tmp/create_db.sql)\"" | mariadb
	pkill mariadb

usr/bin/mysqld_safe --datadir=/var/lib/mysql