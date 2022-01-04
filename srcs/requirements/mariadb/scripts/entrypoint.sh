
# # Installation safe de mariadb 
# usr/bin/mysqld_safe --datadir=/var/lib/mysql &

# # Apply config - modification du fichier de conf pour que la base de donnees 
# # soit accessible de l'exterieur
# sed -i "s|skip-networking|# skip-networking|g" /etc/my.cnf.d/mariadb-server.cnf
# sed -i "s|.*bind-address\s*=.*|bind-address=0.0.0.0\nport=3306|g" /etc/my.cnf.d/mariadb-server.cnf

	
# # Config MariaDB with default bases
# mysqladmin --wait=30 ping

# # Execution du script de creation de la base de donnees pipe avec la commande mariadb ? 
# eval "echo \"$(cat /tmp/create_db.sql)\"" | mariadb

# #Arret du service une fois la base de donnee creee ?
# pkill mariadb

# #Lancement du daemon mysqld_safe ?
# usr/bin/mysqld_safe --datadir=/var/lib/mysql

cat .setup 2> /dev/null
if [ $? -ne 0 ]; then
	# https://dev.mysql.com/doc/refman/8.0/en/mysqld-safe.html
	usr/bin/mysqld_safe --datadir=/var/lib/mysql &

	# Apply config
	sed -i "s|skip-networking|# skip-networking|g" /etc/my.cnf.d/mariadb-server.cnf
	sed -i "s|.*bind-address\s*=.*|bind-address=0.0.0.0\nport=3306|g" /etc/my.cnf.d/mariadb-server.cnf
	
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

#Sera utilise pour que le container wordpress puisse proceder a la configuration
usr/bin/mysqld_safe --datadir=/var/lib/mysql
