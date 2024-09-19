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
define( 'AUTH_KEY',          '2K?OIY$W ^ZL~#@2ZS3Av BAid%y36Z89!<S5m`(d5mev5 K^G!#QV2nMRPi#1*`' );
define( 'SECURE_AUTH_KEY',   '#/Kw.qtH9 =5S9mHa2A~ss!;nNKu*Wpk@O]-lqk5t~ z2H/t{KC#U|O:j88<(Us_' );
define( 'LOGGED_IN_KEY',     '^N_=mVF{0v(]%MY&4WY8YemBDoB2`}(5kovIYfPsIBjmJ()T:76_IXV-rc&lu]|@' );
define( 'NONCE_KEY',         'h1c# m:ZoDzgb4 YyL$)BjpCV/A;C/2]boqVMOlj1M<&urm.6G%(EkA_Z7Smk$x=' );
define( 'AUTH_SALT',         '45D*sN<9si:cGN^jlb(Z-,3DEo>7r*pi8b(wZwtv#j,J1;sB$70n9D;CeV24jjUa' );
define( 'SECURE_AUTH_SALT',  'z#1)Fk(-C8F8hdGT8wbqC3g}F]:IzU`tQrzqa7DB67f%|<M2?KIb-P]a! eGao4Q' );
define( 'LOGGED_IN_SALT',    'V&b-]^@ Z,%=z[}}ct#ZGsw9d|J`K?|k;95bhXr|xr49g3vg,PGg!#zf`NFpf_0]' );
define( 'NONCE_SALT',        '}@1lp~qOm=C`$ LKp1>3*>MaTxGvWRfV1&GfY|AL3MZ<SU*K^AjA#Rm?{9pET}e2' );
define( 'WP_CACHE_KEY_SALT', 'O|cFby8!2AWAzG2*G70yiE(PP5s%M&wDFIrS}u@(h,Lt2A1BKNpFA{T6+(9|krgx' );


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
