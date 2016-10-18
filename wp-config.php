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
define('DB_NAME', 'db_knewton');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'k#Z)l{/xO4HSK4g-K6@6|T?dkr.1#lKw-pDp:r4~Pqv(zX/!Dug?5KOw/pR|r?E(');
define('SECURE_AUTH_KEY',  'G[Dj7j)1N51^Slx-hGV)YUau/kzcTTIC|&+x>k>OS=K+|I~UE-0ed}|uHk_R$t?@');
define('LOGGED_IN_KEY',    'PqtZ5aw:;6Ig?9wm9dmgXdD1;Pl=`#?mKz&ZhOIOD6H9Qn:x*3^}%sd:ibH7Hy_D');
define('NONCE_KEY',        'H%DC2c{CxrI- r-fBQDX<}i7;2EP8Xv)2S+NZ!Mw;,hN/oL{Kem;<0CFmcN[49qq');
define('AUTH_SALT',        'uB8|3/t+.<Fi`GhQc-OT+NB-;I72PI?4{kM#+TClK^a$kBv`S55<Se<;dNmShLjd');
define('SECURE_AUTH_SALT', 'qw>kiqj~{QE5bcO%ve+7D0x0[tVmWp-J45~; G]),-L>-.w^@J:=JI(C|6_3@?AD');
define('LOGGED_IN_SALT',   '7cWH(fEkn|I@5GB|G[=@BAMg8gu%V9[kUji%@-$PB-QIi+[x*OjBwy4_GsGhZ<T+');
define('NONCE_SALT',       '&jY2lj-JWXo%-IP+utr+>&3Ax5;]&(]dFzSf~+?K+G_XP3w2jSQ-;,wuOp?!Nzmp');

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
