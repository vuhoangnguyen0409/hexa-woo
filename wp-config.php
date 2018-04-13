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
define('DB_NAME', 'db-hexa-woo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         ')]G2G^LCCQCO54Mw`ZD8xql;/`tgk<sk/P<k[gv=?:uqW6Xw)F3^OceLit2aBV]o');
define('SECURE_AUTH_KEY',  '_/C:!CGLx,7nT8y,_H5EoMw_Qxi@(-eEJ3-b@v><i@$]m8M*)ML;g-GZAa=+-g)Q');
define('LOGGED_IN_KEY',    '[Cnph_4v%=2D&cd-ERFh5m#xHT?4yZH*:1`J]f7Oq`j9?j@@3Op9THAJ}2s4`I;@');
define('NONCE_KEY',        '2C=v#6e-VX^_n-v_K3TS27k?`n DLK[nsJ#O$5a$<qx0#VFW7+7W_hDd[izX)-x|');
define('AUTH_SALT',        'D{w6{EM92^(UWD:B6jo5)N>E5)35g5BY;=;|$[bG}w_LMtK4&< FY@9vco&aFlQk');
define('SECURE_AUTH_SALT', 'X?FJErC7*~8W-t7pe7yT?-u=$T$;/^rGMX&N@~19vVnrqk1L7/+;Uj#v?^ES]rQr');
define('LOGGED_IN_SALT',   '*N}sW/w`X*$F2%fjk B5F(@O:sw5G4u~.<18.>V8@A`zgk~vH*eO}djT$/gHhhA/');
define('NONCE_SALT',       'mLF,H4}N3m]Xq{WGDskuT%Maw2FY70xlj!_#GOF^;7-`<U=~qk(mu^M[RE#/9i/y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
