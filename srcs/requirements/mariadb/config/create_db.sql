/** Suppression des user et bases de donnees crees par defau, necessaire pour une correction avec succes */
-- DELETE FROM	mysql.user WHERE User='';
-- DROP DATABASE test;
-- DELETE FROM mysql.db WHERE Db='test';
-- DELETE FROM mysql.user WHERE User='root' AND Host NOT IN ('localhost', '127.0.0.1', '::1');

-- /** Definition d'un mot de passe pour acceder a mysql **/
-- /** SET PASSWORD FOR 'root'@'localhost' = PASSWORD('$MARIADB_ROOT_PWD'); **/

-- /** A l air de generer une erreur, a revoir **/
-- SET PASSWORD FOR 'root'@'localhost' = PASSWORD('$MARIADB_ROOT_PWD');

-- /** Creation de la base de donnees **/
-- CREATE DATABASE $MARIADB_DB;

-- /** Creation des users **/
-- /** CREATE USER 'root'@'localhost' IDENTIFIED by '$MARIADB_ROOT_PWD'; */
-- CREATE USER '$MARIADB_USER'@'%' IDENTIFIED by '$MARIADB_PWD';

-- /** Dont de tous les privileges a cet utilisateur **/
-- GRANT ALL PRIVILEGES ON $MARIADB_DB.* TO $MARIADB_USER@'%';
-- /** GRANT ALL PRIVILEGES ON $MARIADB_DB.* TO 'root'@'localhost'; */

-- /** Le flush est necessaire pour que les privileges soient a jour **/
-- FLUSH PRIVILEGES;

DELETE FROM	mysql.user WHERE User='';
DROP DATABASE test;
DELETE FROM mysql.db WHERE Db='test';
DELETE FROM mysql.user WHERE User='root' AND Host NOT IN ('localhost', '127.0.0.1', '::1');


--  set root pwd
SET PASSWORD FOR 'root'@'localhost' = PASSWORD('$MARIADB_ROOT_PWD');

--  create wordpress assets
CREATE DATABASE $MARIADB_DB;
CREATE USER '$MARIADB_USER'@'%' IDENTIFIED by '$MARIADB_PWD';
GRANT ALL PRIVILEGES ON $MARIADB_DB.* TO $MARIADB_USER@'%';

--  take effects
FLUSH PRIVILEGES;