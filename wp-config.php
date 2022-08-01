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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_promodise' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         ',|I`3[?O$+p]%txGEiv#lSMVo)s&X+&6JicE^sA]q7!)lQLjhEs/^/<!)}..Uymf' );
define( 'SECURE_AUTH_KEY',  '/Ysp?I+-%K7z$!/1P}G9$ D}zmt{gO*G;0@Ah=O%dKU?n~Dq_ukt9#*5m^GS8j||' );
define( 'LOGGED_IN_KEY',    'vfvwc]D klnD2op<D<^oUOlhsk~^<tVph&s8nuea}]3cun-;QCLRHJ}t6QJCG$nN' );
define( 'NONCE_KEY',        'fD#HZ>sj99qhdSt}U8s.wc/dNrmAcE{_~yCK cBuhLYhTh{zRp^w+MHFrH0Or#(?' );
define( 'AUTH_SALT',        '3xPX4zJ-4G1zYm3Q73&aWtMxddjN@Pl>psLR.zNZ8D5O{^%U0u3(S$1DT>>,sh4r' );
define( 'SECURE_AUTH_SALT', 'J2<.1>zdm-h5Z(Bi+8!qiF{>eD%XZ{hG?h_fM>D+YQJ.DN}!QIlu=4Mt!<W|6%6H' );
define( 'LOGGED_IN_SALT',   'x,Yl|9i,wJ1C.yUz1VqpO]%<?%DS];e0Ed^(l?kvb/B9@&R^&nI`Koh;j}vA_f46' );
define( 'NONCE_SALT',       'nXGIL9+DFrwJxP01kVq%F^!v%/BvJ$,njObBXP5JfN8NV.sMu fE_Mha]%LCtH$1' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
