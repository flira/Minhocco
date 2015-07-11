<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'c9');

/** MySQL database username */
define('DB_USER', 'flira');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'flira-minhocco-1461437:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '(JDlL49)rL/cO+] O)|s83_Z~N<Pixytz4w-^-%w*8/>0HMPFqd{z+W#NG4S*nzw');
define('SECURE_AUTH_KEY',  '|x@fqU?:%YL)gZ;PaHUX-]=}qK)O3O){($-CY|xHKFHC ni)RVFszHi2b5&=0pwd');
define('LOGGED_IN_KEY',    'HXR-EK*Yb9xY$.D12 fYlwq+1_87~+B@;A-%+#OVvPLx||YK P-!GBFm<I9n#$7`');
define('NONCE_KEY',        'NjY0PGK |NW@N39>|+63xz**u>&pZfc<E:#[h:=%1i*F]aGjrlqEX5JG2XrXDb/M');
define('AUTH_SALT',        'V;TZM&>+6CpZ3&GMkkd7;M(wu>q{QXO8Yiu869+cq]LnQvnsh+~T%u2b~GH>[|<j');
define('SECURE_AUTH_SALT', 'aE@ J`sBjPdy0`$TQ|u|&e$JhQ[|wF_K0yQE6F+*%)dpoum|^sdL1+42*O#Jqu|R');
define('LOGGED_IN_SALT',   '-u+s^3E}yI_|<eT q/ArK11KqZiD`(ZouM SwXG$wT%eH2{A}Uf7Ez-]19r/FlM0');
define('NONCE_SALT',       'Kz+)il7OJ-p8!u!Vdnh8M z|.=V(LFUHa)_5E:e.mvozj+tN0U[+eyQPO$Y9W5{O');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
