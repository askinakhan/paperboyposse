<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'pbp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'jVK.-+h1q?3G+ogeR.-f)&m<J1__8dFU[ &{MjZPQqL4:f=+G$xiD-no6P`y1 e*');
define('SECURE_AUTH_KEY',  ']gL/=,S|_<ZgO@&XG4s)L~hf.H+HnjCuT~`%+Fd9-6{aU~sDzj)+BTp)2FN#!0gA');
define('LOGGED_IN_KEY',    '1 (dF|BB4w6Mk*>whv0v`I.b+FkP{RK?vi--Y{X0S|0+5B3;mCnv,y[>TgPYUC[[');
define('NONCE_KEY',        'bR#yv2a2I3-Yn|~UL= 7MzeCjPh60R`@[qN`fl-([a[?/96vlP-_!^wLOhQLfPcY');
define('AUTH_SALT',        ':vxgfgZh7Hve X|-SfK~Y#R+MLYR*t|7wr2f@6A+d5,*;`ft|9hL}{>AP wBL2W|');
define('SECURE_AUTH_SALT', '+>+|:5KY}:JL@`Skn-Ix(cs>-+O8DwA3_uxOs@B$0a4iB9,&d!2o# 2Yo6-d:1|R');
define('LOGGED_IN_SALT',   'P?R{k.H:-2c%t!+%2V>s?pO~|I5Rr3;%NR2u@+m[U,aihR/([%lL7:qxV@-Vz<r4');
define('NONCE_SALT',       'f]:aiVb`[Y-,eF-qVm<+3b4bH#Ix^_~,j+1:]ZDMf#kQK^o+?@[{Y-Er<Y5CW/uY');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
