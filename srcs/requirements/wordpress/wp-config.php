<?php

define( 'DB_NAME',     'wordpress' );
define( 'DB_USER',     'root' );
define( 'DB_PASSWORD', 'pass' );
define( 'DB_HOST',     'localhost' );
define( 'DB_CHARSET',  'utf8' );
define( 'DB_COLLATE',  'utf8_general_ci' );

define( 'AUTH_KEY',         'lw&!N^bn7^_QYzb:QPts#~?=70)ykDj}AkvTiff#UvN;pw5@u4,oNWvdEx4Hq3-1' );
define( 'SECURE_AUTH_KEY',  'S| xs|u&sW%(G7:JF sb|u|1%#/BE@io -ELK%-7<ecuHYvEGU:{z~0lQ;r[&?a(' );
define( 'LOGGED_IN_KEY',    'Ce!F|eE*#VwDHfjKrn}tJleW_-Gdhl%Q=20t!3q`sHy[5e`&e9Tq[zzoB|x=vyEV' );
define( 'NONCE_KEY',        'o>xaQ+fQu<Xn@Q4+(x#;<0(DP k<QVB,?dS;ThwIJ2j1P-lT|UK~cG{[vrY}_VOb' );
define( 'AUTH_SALT',        ')l9 q-+@{,?8`SIW+5!x,.@M4:LxY-Xs-Z:Q|3!iGb&k3(8gaj!<4)mK~]k*u3kz' );
define( 'SECURE_AUTH_SALT', '8 V1JKYl+hDVZ$JP+dCdn3ynpCNh`-A0[bElLx?}zAiT.ClRcECMlg:+lcx,&|RA' );
define( 'LOGGED_IN_SALT',   'L[2+D;0!ZQu|+#*s[X>3l%:L+Rn%1!sbWh*(iD1|i6i SW+8TP+o~PskC+e#hT)C' );
define( 'NONCE_SALT',       '&I$.pfk_OJ|f54yv3-+Kt8W01+G^b7hI*$y4wf! J@i^i2pc-.-^HP.C(PM5e{w(' );

define ('WPLANG', 'fr_FR');

$table_prefix = 'wp_';

define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
