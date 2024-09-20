<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'malatini' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

/** Database hostname */
define( 'DB_HOST', 'mariadb' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', 'utf8_general_ci' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'S^Fl8h,= @zf^A=|6B+G&]pVJ)qws$An8L]$,j|t)([6op[Q-q~Dy>T+B)H:t`]2' );
define( 'SECURE_AUTH_KEY',   '!CE1Hz/:px&jJHPIIhAI8_b|$;Q&0TD3ClN6.wWk}bKr$(}5w2[SA}A{_v*9cPS>' );
define( 'LOGGED_IN_KEY',     'Cfe)FEGd>Nfy8axFtC<]c;K$<~H$[X5DdAG8t)3[:;M,&dbnG]sh.2:nT$Nzp++<' );
define( 'NONCE_KEY',         'VS9S.x5/Rf+9;;/UToq]$m16=jRjz9VrNmY=t~&qL:C_PlD}ziNxnTM+DAVXo,YS' );
define( 'AUTH_SALT',         ')&x^PqT-/pA,8z=v ey3)_UIi,0wMiUorIQ@Ii,o-%@&^jSLYx*xRe]sSOCO@+wm' );
define( 'SECURE_AUTH_SALT',  'pz^G3 HO~_,6H9KakHS pw]`X[(M]ewXBOH[aT2@>4fu7P|,+PYq%DkU4!)YO#ND' );
define( 'LOGGED_IN_SALT',    'H^.>C2hsxF8 h~Fo>S1ACQ>b.{:tOJ_aRRL(1.]c .sN+{,fUsm?<+DM2gicE&+y' );
define( 'NONCE_SALT',        'w0(Z2}IdbcT>AZmS!j~I]Z[_Z;OiH?jr|d1m|gOI_NLuR5;z*o&D=kQulrY=Xi&I' );
define( 'WP_CACHE_KEY_SALT', 'VM<[3%^pDADc<~ ;p;WEYH|=Uw3ce,Ccl%H:#PPm5f2dnA{%F0|:-Rldo/lA?-/m' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
