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
define('DB_NAME', 'cthulhu_levelex');

/** MySQL database username */
define('DB_USER', 'cthulhu_levelex');

/** MySQL database password */
define('DB_PASSWORD', '595escape');

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
define('AUTH_KEY',         'B{Vc<_o]fL42M1MyQqX9p]A}KMXE_I|6VIXrw6Ml/?hns^jXDd)cEY6 %`BH,n[4');
define('SECURE_AUTH_KEY',  ';8#GV-Y@lFLz(SActSYdg.pG;Rf&b&|U_lH=xG&J70G+5,[?8y6z@l,_l(=JSq+A');
define('LOGGED_IN_KEY',    '0c4(pw!+yI8$:skpPZRq9WtWh3N+753B<`]dUxywyl`s@r*rQ1jY7P`|ob`] ~Bl');
define('NONCE_KEY',        '!Nl]ghakz%9L#$s9+dp0GC-a V!]m0!y}wfv,P6iYU?Df<M}8c#&F,W])+KF539S');
define('AUTH_SALT',        '^=c0}ijDDzG^Lr-mK/zCi/}Q@T7$q6ig0TA72fdj0QjS}@pmQ.j&$4}4KNTn?!H}');
define('SECURE_AUTH_SALT', 'bbuu=pXr6qs~>xO@xrnldm)Q`,?j{V^3!Z8ZZ<VPt64etyS3(C!O0CY19ChEV<R3');
define('LOGGED_IN_SALT',   '+;z#_w64U^LPzo?F|oRpFHI2Rb|pIF7=]v227oM(<cSa8-rB(Wo?@/}ZS[7%-e]*');
define('NONCE_SALT',       'TSh *YW>rEIYSz*9+s8vxp]ac4%HVS7qLGDEr)~1psjegJg mm%iY(_uHCK}<5bz');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
