<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
define('DB_NAME', 'wordpress');
define('DB_USER', 'wordpress');
define('DB_PASSWORD', 'wordpress123');
define('DB_HOST', 'db');

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define('AUTH_KEY',         'r.ova~ku}Ch~|QdI ;2DlU(z &k,)3WMrr$0wxt]O/?}wQk}+dvuL=6W)}d[Wjwo');
define('SECURE_AUTH_KEY',  'BWscr.C:GrH,+~S|%aRXZey# Ad@HIOVWglt&</8Vb3 T@9&J%etb%BA%^4D^+gN');
define('LOGGED_IN_KEY',    'XIZ*`|QC;_Z,seCs)U)+lD1-F0$FWJQ|aJC||]J87WqBBypX@VHW;D`IK_@7TD`9');
define('NONCE_KEY',        'B)rI:AN0lgN-8<+nmM6;kG5%pPFY:0tLR8Nl(-(p1vlQIN-Q1b4M/qXrQ$ZFu?l4');
define('AUTH_SALT',        '.KWc#+fmWP0vSrJzej=k! A$R>6[Jk%VWw|OeS9_ Ut[8i}:0*1%(+$v6$$;$W|6');
define('SECURE_AUTH_SALT', '|`CA4a.70;<Vyz7+kWYxfK+O!w)8]izMC|_NXfB[8-Ff%(GqlZ{V~+p:ECB/u}+D');
define('LOGGED_IN_SALT',   'r!rWz+M5u{*?lg~R,^xmmU%JPzrqN;]jO{p-WtSfF&(!ucCUQg6F?zb?5X4Y_CaV');
define('NONCE_SALT',       '&N{WxBWW&Y7iik#IbW mmu$YwcS2Ft$pycU*OyiT)TBS3^T6)ko;2|uwcp@GQ)x]');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_9dn8_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
  define('ABSPATH', __DIR__ . '/wp/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
