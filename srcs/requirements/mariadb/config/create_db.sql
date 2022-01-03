/** Suppression des user et bases de donnees crees par defaut *
DELETE FROM	mysql.user WHERE User='';
DROP DATABASE test;
DELETE FROM mysql.db WHERE Db='test';
DELETE FROM mysql.user WHERE User='root' AND Host NOT IN ('localhost', '127.0.0.1', '::1');
*/

/** Definition d'un mot de passe pour acceder a mysql **/
SET PASSWORD FOR 'root'@'localhost' = PASSWORD('$MARIADB_ROOT_PWD');

/** Creation de la base de donnees **/
CREATE DATABASE $MARIADB_DB;

/** Creation du premier utilisateur, voir deuxieme **/
CREATE USER '$MARIADB_USER'@'%' IDENTIFIED by '$MARIADB_PWD';

/** Dont de tous les privileges a cet utilisateur **/
GRANT ALL PRIVILEGES ON $MARIADB_DB.* TO $MARIADB_USER@'%';

/** Le flush est necessaire pour que les privileges soient mis a jour **/
FLUSH PRIVILEGES;