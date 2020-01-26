<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress-e-wallet' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Sgurukul915' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'dgG)}za%xsjeaU R_9+kiQtUv~*O&i( =`V<<GAmHLuLB)~IGY(}Y,HhOa4buptm' );
define( 'SECURE_AUTH_KEY',   'UVUpFw=*j7JM.{oiOJQLh<e@(2c7 U.=sj `ob_{.LydoBdu@}Hx72FSE5X38uP]' );
define( 'LOGGED_IN_KEY',     ')p6!^Khqm)daI`*K3vG)r>T{6T)guC#_82*c4A<g(c}R1kOqXq0*}2:<xU8`F+CG' );
define( 'NONCE_KEY',         'su,wZA$2h2uZ>TNO<R d+wio!5+-1,%?nQFcI~RWj*E;:QC7QoOuP~ms&9=?4gTQ' );
define( 'AUTH_SALT',         't%4UyxCbYNoiAl8>eW?bJKo8UW_jrxW26.7`Ss!u*Gqp{>mX4YN6t(Ge<dm_}oH7' );
define( 'SECURE_AUTH_SALT',  '`?p2?4^<1c/*]`LcRic`,/ 5e6%F|$xwtnUEnrNwj?h[jO#J0g&o}XGq1HjjrCS,' );
define( 'LOGGED_IN_SALT',    '_Gev6~&c>cmljmB5v$EWm8(aUX@KZZ1`v`Z6Vj)XFH,MmW2@WiO,u;h<Lod,cQ!s' );
define( 'NONCE_SALT',        'VL*U0B)#?_tmc~0-O?Ua*Qi95M(M#r37 cSMtX7MlpE?yOd0`3d6{o-)%}S?O;.V' );
define( 'WP_CACHE_KEY_SALT', 'jaH>UnQ9@ eyAed:$rBR[y2{%D_y41N*GU^av#Vy@/S7NRkAUZJ+FcywajFpD:Gc' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpew_';

define('FS_METHOD', 'direct');
define('WP_DEBUG', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
