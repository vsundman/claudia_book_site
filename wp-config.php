<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'claudia_wp');

/** MySQL database username */
define('DB_USER', 'claudia_user');

/** MySQL database password */
define('DB_PASSWORD', 'AtfSERQmsV8QQZbP');

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
define('AUTH_KEY',         'Du(kpF-xn+$(64uj^8+Q@);At||M1-<2s5y/my]]o7&+|2)yc#VE#-&hz<z+zte?');
define('SECURE_AUTH_KEY',  '~ZU40CI^_j-R+oqdJ$-f1`M]mmU_<4j6d-Y/P;=yBKWdY=f:[%B+ctAK+~c_;nin');
define('LOGGED_IN_KEY',    'Yrne0pbKk{.b60r%l:v}b*@(?j#M%rg7U0w8u_uQ;{4O`6z|v~sf48MR6GbZo<d5');
define('NONCE_KEY',        'hR~6mzsM}sFOU]YPHb)MDzg&x`sFj?0w:|Exr[-6+21*UmqHl)qQQ-RQu>V,q2<[');
define('AUTH_SALT',        'Znre5U{W01[S4ttxDQFQ]IviJnO/V[.w2$9m*wg01{3k]Pgs|$!-<anT5LoV x 8');
define('SECURE_AUTH_SALT', '/sW$Fj0o+2Xm`v@>1@m=VJPe@H/$)@slL=oaJ]j0r_@Sg}G[V;l (%~RV 9W$K[6');
define('LOGGED_IN_SALT',   '<A*|1F|o1^#-bd:!CzF`.9 1zF%4)=v,sw4S,iE9eN66RTv_*c2<YA+#S7Cty%lu');
define('NONCE_SALT',       'WOn5${VtOeLPxF{s^cMwb!IrPn?)xv,Dw$hHc?*y)<@29[gIzkU!9a2[9H5%Zkq#');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'claudia_';

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
