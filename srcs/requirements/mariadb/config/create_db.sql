/** On met tout au propre pour eviter les valeurs par defaut **/
DELETE FROM	mysql.user WHERE User='';
DROP DATABASE test;
DELETE FROM mysql.db WHERE Db='test';
DELETE FROM mysql.user WHERE User='root' AND Host NOT IN ('localhost', '127.0.0.1', '::1');

/** On a choisi de l installer avec la methode d authentification normale donc il faut set le password **/
SET PASSWORD FOR 'root'@'localhost' = PASSWORD('$MARIADB_ROOT_PWD');

/** Creation du premier user, l'autre sera cree via le container wordpress */
CREATE DATABASE $MARIADB_DB;
CREATE USER '$MARIADB_USER'@'%' IDENTIFIED by '$MARIADB_PWD';
GRANT ALL PRIVILEGES ON $MARIADB_DB.* TO $MARIADB_USER@'%';

/** Il faut flush pour que le grant soit active */
FLUSH PRIVILEGES;