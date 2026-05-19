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
/** The name of the database for WordPress */
define( 'DB_NAME', 'rkitott' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '~`sE0iAiE4r1Xad6YndteujVjG&Xxa4[*X.9.0j<5suv745<.Ek*7-R_s.JSHT[H' );
define( 'SECURE_AUTH_KEY',  'c`(?(jTfT_j>]:nL|,{#|RB#ZN`GS0,|g-WMJQjgEh5`1R2MT_K/an46OhK27T6r' );
define( 'LOGGED_IN_KEY',    '@##,OF@.Lfo> ;U*Yc2J)O}vs5AQ]#D#so-u_DI8#nHs:3Mr,~jazJKTza;iT/dg' );
define( 'NONCE_KEY',        'Wn5+vdqBP9xyQ2@/ROQ|sjuWh!?}{Oz83S~:>!-,]W5!/&xNj|>3nEsm>H3ok/u3' );
define( 'AUTH_SALT',        'WP??cg2D`]6rPvF4INc+[MNN>fxy.7Gn<Wi%.SQJo3#@yev+n:Gklh{`Jn{}uCgV' );
define( 'SECURE_AUTH_SALT', ')8sfhbS>e$b2U.6`kzk;ng7UVE}L EM WHN*.a6}PaM(5,@]T]my-Pbx5j]$j/1Z' );
define( 'LOGGED_IN_SALT',   'cRD)3vGkrg^fFa4SO&w>7]:ey|x&ugD]>0KZm1P@93@IXKd}9uv@W[9d;:@)3c B' );
define( 'NONCE_SALT',       'HMgT8([d1+JK7cF56`0]SJk=aW.X?RrwxGG1{i,R+t5j0]B%)@]o}=vY(JenOo.j' );

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
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
