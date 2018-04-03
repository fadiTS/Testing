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
define('DB_NAME', 'tstesting');

/** MySQL database username */
define('DB_USER', 'tstesting');

/** MySQL database password */
define('DB_PASSWORD', 'Ckq@g152');

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
define('AUTH_KEY',         'OJsga(I}<)Py4+X[x7oZfmB@-;^l~rk*_<~|re|^OvDT*Q~dXd#@}/RUwmG 6[3>');
define('SECURE_AUTH_KEY',  'UVws+7uC@k%K7G`|]U?JS4W#:=L,mIf<C5tyTFnGyp|jBIfVOq6zNF_z<E`I.@$7');
define('LOGGED_IN_KEY',    ':q9awfjeXp@c,[|N-|a}s!&nBaRUx*h=?&|ys+vf)jkf+=?#&XF2i(:G;xJP-;Z$');
define('NONCE_KEY',        '0jy{+qN+qIy3~h:Eo@}sG}, GZ&aD2i8Hxkye`tni[9,>nyEe@#1 P+NEdNafL<y');
define('AUTH_SALT',        'hZIU2Zpb0VSIN+dArc}A|GX]-_#6LKpM-6<t;?DkB~D1^vkj+)3exT?_Y$MXVDa4');
define('SECURE_AUTH_SALT', 'Od?mjJj]RB;Xu)e=U_MwL :S,?eF4@+~7Uwv>jS`V<*J`uVzLB+%v:Z&$RqQAHXK');
define('LOGGED_IN_SALT',   'bW,9ho QF8FNy^25.8Vvx4]e+`h:wSvcyXhj^GmBekZ>ked(%D_<en{FN@tUuY;d');
define('NONCE_SALT',       'QA`oh+s|-wz:s:H$rD &TgzqKN1xFp`O#jnzTEi-KnI@dG<7u1cg-L%{Zg.b375h');

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

/*
 * Restrict admin control over plugins and code editing thru WordPress CMS.
 * Stop all auto updates to WordPress core and theme updates.
 */

define('AUTOMATIC_UPDATE_DISABLED', true);
define('DISALLOW_FILE_MODS', true);