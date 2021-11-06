<?php
/* previous ft_server wp_config.php file, a bit twisted */
define( 'DB_NAME',     'wp_mariadb' );
define( 'DB_USER',     'malatini' );
define( 'DB_PASSWORD', 'password' );
define( 'DB_HOST',     'mariadb' );
define( 'DB_CHARSET',  'utf8' );
/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE',  '' );

#Not mandatory
define( 'AUTH_KEY',         '' );
define( 'SECURE_AUTH_KEY',  '' );
define( 'LOGGED_IN_KEY',    '' );
define( 'NONCE_KEY',        '' );
define( 'AUTH_SALT',        '' );
define( 'SECURE_AUTH_SALT', '' );
define( 'LOGGED_IN_SALT',   '' );
define( 'NONCE_SALT',       '' );

$table_prefix = 'wp_';

#Set to true to be able to debug
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
?>