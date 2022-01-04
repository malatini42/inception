<?php
# Fichier de configuration necessaire de wordpress avec le strict minimum

define('WP_CACHE', true);

/** Database **/
define( 'DB_NAME', getenv('MARIADB_DB') );

/** Database MySQL username */
define( 'DB_USER', getenv('MARIADB_USER') );

/** MySQL database password */
define( 'DB_PASSWORD', getenv('MARIADB_PWD') );

/** MySQL hostname */
define( 'DB_HOST', getenv('MARIADB_HOST'));

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/* Salt, key, securite */
define('AUTH_KEY',         'a7D>mN+j~IF{MSWg/aF1/5+!>/tax/4V}{fnk*Z4>p!6LW+vRGOaP0&GX]i-`7nB');
define('SECURE_AUTH_KEY',  'iKEdqL0#SL/Ao618=ZD,W%Ogu0s(zpN?nLB~Q@d-Cd7fK|Sqd%!8UT,>9+ D5wgY');
define('LOGGED_IN_KEY',    'aMlu9G=Y-D,dk}?9g}2CS(O$a@F~eB^+Peq)WXYYrIGr|uXb^]rKQJT[&jS<S4;E');
define('NONCE_KEY',        '`Q{fVW_,vNEyGeaijR3a35-^@F>S^a/(R-|<O!6>lRM`@XVa@+Ig>d=r!pY&GO5|');
define('AUTH_SALT',        '1i%SIOPS[%H^o7ku3%z>%(I>T: ~N*#&KE{s($]2.|->SE1e/ICC8$`aE<F+Y;kK');
define('SECURE_AUTH_SALT', '22@6,} Y-Ul@;~z*#{8g+{1gm4aB+ wQws*ky3Gpgi/E{:5!f_yJ?PEtBcNKJX)v');
define('LOGGED_IN_SALT',   'iQ0&>`$]A9pR[lKi &55?{T@-^g},e(kkuV]{uPaTk;U2r!r6v]o-DLnfeg-TKAG');
define('NONCE_SALT',       '9QC%D_ !h~+c614K#*c-~yKtrru^=r;#k0mC]m&?[s@c;Z2rJ!Q|K%[xC,1:=&Wq');

# Prefix des tables de la base de donnees 
$table_prefix = 'wp_';

# Va permet de fonctionnalites de debug
define( 'WP_DEBUG', false);

# Vont permettre de rooter/afficher le index.php
if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';