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

// Load composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

// Determin if the environment is local or production
if (file_exists(__DIR__ . '../.env')) {
	// Production environment (load .env from one directory up)
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
} else {
	// Local environment (load .env from the current directory)
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
}

// Load the environment variables
$dotenv->load();

// Define WP_ENV based on the environment variable
define('WP_ENV', $_ENV['WP_ENV'] ?? 'local'); // Default to 'local' if not set

// ** Database settings ** //
if (WP_ENV === 'production') {
	// Production environment
	define('DB_NAME', $_ENV['DB_NAME']);
	define('DB_USER', $_ENV['DB_USER']);
	define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
	define('DB_HOST', $_ENV['DB_HOST']);
} else {
	// Local environment
	define('DB_NAME', 'local');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_HOST', 'localhost');
}

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',          'IW4i|4xhi)P wp-c<0WO*Y_?t@3T_9~loK3v68)T{NPw{U#zR%Mr!T9OAQ-0o.?i');
define('SECURE_AUTH_KEY',   'QOi!p=3ITAme0WB5*r9*GY Hj[<z+#BRP#mjt^AQrU(|lX2<C^JO=VUs9geIQ0bY');
define('LOGGED_IN_KEY',     'g#}%So;t:s^yuM-<{K8hVFSL0=*6=IT<2)AqK3mHf,U&)iYTIA^$AdKFr)q!vZ(X');
define('NONCE_KEY',         '%k)=mFR_HcLyx0D)!6SPlcB8>^5SNxpHe+#A|Nht`[F}a}y!M]-t{S:ZSZ*x^jfg');
define('AUTH_SALT',         'YJ*YYX+Dp+`9hUqojuV)IFeZ}4Fybww!Q?zzA <Z7!C]FbRf5Yz5pgm=I7{H/{+I');
define('SECURE_AUTH_SALT',  '.U%Ui^@L?c!jLcb-HD|@~-k< 8FUf{ezdPjV=KB&h%02y[Tr{wKo4k03+]Un+s+$');
define('LOGGED_IN_SALT',    'oWF,Cu&~]6j%@3{GSAf(Q1N=~V-OqXjkcThZ:E3y.VbY+it/S1;Jd.e7kF qOW9T');
define('NONCE_SALT',        'gJ<5u)4[{ X+1#2WN9]mwRyLTd:7{FS?n%uVoL;+Ea+bzA}olVfjkX>#g$B?TsKF');
define('WP_CACHE_KEY_SALT', 'RFRH.q*S61$&SzX-Jq{/99IMa7cCu.&bU~#cED`6QkHJ~ij@^e[V92U>3`Qvj=N&');


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
if (! defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

define('WP_ENVIRONMENT_TYPE', 'local');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
