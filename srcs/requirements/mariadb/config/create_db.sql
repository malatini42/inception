-- https://stackoverflow.com/questions/10299148/mysql-error-1045-28000-access-denied-for-user-billlocalhost-using-passw
-- Suppression de la base des users et base de donnees de tests installe par defaut 
DELETE FROM	mysql.user WHERE User='';
DROP DATABASE test;
DELETE FROM mysql.db WHERE Db='test';
DELETE FROM mysql.user WHERE User='root' AND Host NOT IN ('localhost', '127.0.0.1', '::1');

--  ajout du mot de passe pour root@localhost
SET PASSWORD FOR 'root'@'localhost' = PASSWORD('$MARIADB_ROOT_PWD');

--  Creation de la base de donnees wordpress et de l'utilisateur wordpress
CREATE DATABASE $MARIADB_DB;
CREATE USER '$MARIADB_USER'@'%' IDENTIFIED by '$MARIADB_PWD';
GRANT ALL PRIVILEGES ON $MARIADB_DB.* TO $MARIADB_USER@'%';

-- when we grant some privileges for a user, running the command flush privileges will reloads the grant tables in 
-- the mysql database enabling the changes to take effect without reloading or restarting mysql service
FLUSH PRIVILEGES;