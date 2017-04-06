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
define('DB_NAME', 'wordpress_theme_developement');

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
define('AUTH_KEY',         '$O`a{_s@eTNV8m9zQyE* -Zs-gn2T~<B`OONC4w^D[p:P7`U@bX?#s1).g<iHwe-');
define('SECURE_AUTH_KEY',  'B6w;7X?R-uA!WBQSK_^RFL(a3`Ac@%S=>:FBTk*,fk69^$K)|w>@rMd#Rj=)V?64');
define('LOGGED_IN_KEY',    ':%nmzRPYm [Dv1Fqrp-3t(Mpx3A30k@@`MN^x%Aj3F5*UIj.uiv^Y~VZqpM.wiet');
define('NONCE_KEY',        'Y6$v$r,7-?vewE|ezrM2e*MU%F[Q??E0pj~^i4LV+PU 5zxSj4O&bToPQe^V,AH_');
define('AUTH_SALT',        'Olh=Uw53=ApLo/9I]lq`^l/CY4mT$&(^# u>249SE`2P, J!47=Y46A4/1SQK;SX');
define('SECURE_AUTH_SALT', '(AI9&@mOEDA]ZAr2!hkrZ!5Xg@2W1cF^rSe+?RgGeQK~kl7+S:~e$*=O(+IP,ae0');
define('LOGGED_IN_SALT',   'K2<H9~u,g[13ogmR(z#mHOiP!x=q~fIYw(~4s>L#+~$[[)lVg.{fO,/c6mGja1b-');
define('NONCE_SALT',       'Rwc&D$.gF1shus?n6j:0h67 ,|jdD2^ #;^g3%.^g>hLMHE=va }ejJt7=Cukp.]');

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
