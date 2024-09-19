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
define( 'AUTH_KEY',          'l)Dx$ZpXRVl^1wdgo#b_w5=?$rE//mM@NjzM=4Z?~xt3PD{o3dflcEAfj+fV|CB0' );
define( 'SECURE_AUTH_KEY',   'O9NaW/{]NiS#+Y[k#`cas;0(BWh7ySA_]AcCD|i|1RFkY2g d<=B(lsw4uN@+:p9' );
define( 'LOGGED_IN_KEY',     'LW&nq((M*f&c;pM!~Q0,|BOJ3K-UuTc$wr5-r+cN|0:h+g4ATNd~|Pxblx/0~`?T' );
define( 'NONCE_KEY',         '7}D+0,4~D*jlCF+qAt|UkB`_O3SQ8mzY3R}JmE+z&Gj$51(k1{P{g7W)20/~~/Z?' );
define( 'AUTH_SALT',         'a<[Ve=S>Ai[()8&q50CR-cMF0[%THwjzBDTjFx+kw.B%b7ll5/%:T4(P/1M${Zje' );
define( 'SECURE_AUTH_SALT',  '-cZUy_XO|ci*{Jb^;q6,dV1wi9wG ]&Kz)Q6sOA`?n*qD7y<LCGC=LB+@a7q4>-X' );
define( 'LOGGED_IN_SALT',    '45W1,*uCE{T{]-ZGkyJ[mBJ9I)fTxPZ~>He79 ,N|G#0os2,/sjM>>nBx4)K.~}C' );
define( 'NONCE_SALT',        'Bt#3d57ZT)o!2/]a/nrPbvM!=;&6s0m;&NeJ}QaLy@P%(?{rhm,v[3~jIUs_;Xe>' );
define( 'WP_CACHE_KEY_SALT', 'q/I$,|=::u40#p:F@x/u^kpwfgx7S>:d}8`a[Ttk_19&6#.dmZ2=.~|`ZFdkbw~E' );


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
