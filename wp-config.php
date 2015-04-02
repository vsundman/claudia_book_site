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
if( $_SERVER['HTTP_HOST'] == 'localhost' ):
/** The name of the database for WordPress */
define('DB_NAME', 'claudia_wp');

/** MySQL database username */
define('DB_USER', 'claudia_user');

/** MySQL database password */
define('DB_PASSWORD', 'AtfSERQmsV8QQZbP');

else:
define('DB_NAME', 'claudiamulcahy');
define('DB_USER', 'revmulcahy');
define('DB_PASSWORD', 'I2amrich');
endif;

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
define('AUTH_KEY',         '4B JD#tKg:s:Mz+zGQY+xJ[anKx`;M8UL(k7}.7ZwSW?F |;MnrlY!-:w]W64gU<');
define('SECURE_AUTH_KEY',  '{Ak.+FZG3^@Mx<Vxly2FfkHhb0SCQ?qSaeYA|?CUtm52 ]|<:p|fJVay^z15b([(');
define('LOGGED_IN_KEY',    '#dg}BZbr)b4(k3C$DRt?y&CukzvjDo#ITH>&k$$k0& +ZA)1YT0|-0+2#C$dm#-T');
define('NONCE_KEY',        '-ac9LeN^sKn8nc7.kO_{.K[JxoK8u}*b-[#t(U+/G|BWK*>+nwDhw2tw9UKKY<+T');
define('AUTH_SALT',        'Yo3;jb_$tc6oZ#4^{IhPx$hUl7*+tZ4Sz!|@JgVk_Y9)OS`tWn>=d_BIFI;<cx_i');
define('SECURE_AUTH_SALT', 'h2r-ZV?]rC W`fjxnaEe*0:IK4 (W8[LM>PSqK>Ge+fW&%#I(fUaH-acLqqR&!K^');
define('LOGGED_IN_SALT',   '[-IEYGp5t0DN+7gf;BLe}A@l)o_Dw:liUZj&$ht8xO:m#dMkN6{)Cb^Oe}VxJjWJ');
define('NONCE_SALT',       '>vt80f]/}J914?V0pXXZ+V-gKZfsG7 xil|Ah@9N3w9cBE@-|ttub+r.Gr[%g!?o');

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
