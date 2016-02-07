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
define('DB_NAME', 'quea6736_queenmodeldb');

/** MySQL database username */
define('DB_USER', 'quea6736_queendb');

/** MySQL database password */
define('DB_PASSWORD', '@Fuck&You1');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '+q@l K;,>66P|c8]uBL:j2@-[bsEgr+]KL)6d J^3|=Q=C 7_mzL~!-4Y`?|*D|^');
define('SECURE_AUTH_KEY',  '|Ns@W9WM3UZLm(eZTI}E}4?]5u_Pg-2^$|$n%e)I$z71T_h@zgllO{-!o+x0B[eA');
define('LOGGED_IN_KEY',    '+Qe5sNmO$?.p?_J(5X:Q5AV-oG:qmh#hb_Lr*[EnC-&TK]d!ZS{04F@:M?Otq`K=');
define('NONCE_KEY',        '{9$9t|:>J](9j6PD6uV6[Gsr^wD/=W;-`91|Rxic52}+ox^UhYKq(^r#!.q?YAM+');
define('AUTH_SALT',        'cFkg|+9FY Ju8I0P8~Xq<dgD@G?lb/mZ0h!l#+:g)7|`d2r)LWJ$1k(vUlWi/%1e');
define('SECURE_AUTH_SALT', '1u-G4LpXZ&E,SE+YG3>_N;<$dgu,-v N( 1t-C-3KDM+,V[zM;0Zgm-9).i`LQjA');
define('LOGGED_IN_SALT',   '=zATG4^gh_YGF*]3&Bf%Ym/WW]G{v+UtJ^xVu4`O/uLBqN[_`K/k40%?#Z!1E.BY');
define('NONCE_SALT',       'dSlZ|b]-I=:g o0,,L1y@0(;NC=KcZYfJ!+z<d0AGd*g-IP_|OdGq>IK!E&XC#1X');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_qm161_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
