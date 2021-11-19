# Si la base de donnees et le wordpress n ont pas ete encore cree, on generera un fichier .setup
# Si le fichier existe c'est que le setup a deja ete fait
# Sinon, il faut le faire
cat .setup 2> /dev/null
# On recupere le retour de la derniere commande ce qui va nous permettre en l'occurence 
# de savoir si le fichier existe ou pas
if [ $? != 0 ]; then
	usr/bin/mysqld_safe --datadir=/var/lib/mysql &

	# Apply config
	sed -i "s|skip-networking|# skip-networking|g" /etc/my.cnf.d/mariadb-server.cnf
	sed -i "s|.*bind-address\s*=.*|bind-address=0.0.0.0\nport=3306|g" /etc/my.cnf.d/mariadb-server.cnf
	
	# Config MariaDB with default bases
	if ! mysqladmin --wait=30 ping; then
		printf "Unable to reach mariadb\n"
		exit 1
	fi

	eval "echo \"$(cat /tmp/create_db.sql)\"" | mariadb
	pkill mariadb
	touch .setup
fi

usr/bin/mysqld_safe --datadir=/var/lib/mysql