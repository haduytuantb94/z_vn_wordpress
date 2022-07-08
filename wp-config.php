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

define("SAVEQUERIES",true);

define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'haduytuan' );

/** Database password */
define( 'DB_PASSWORD', '20011994' );

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
define( 'AUTH_KEY',         '=1=76I[_<Mh?tgN+L9z0Q[[[I)sV*)QgCWbWE#-5bN??9I<mT,g_F$n_eQ=PTByP' );
define( 'SECURE_AUTH_KEY',  'Ee^ZtfJgGQ2es<R%m;SX!9*6O0DW/.^%v&%1CNFsvwlQ#US*C!p:b!jYJO!5rar9' );
define( 'LOGGED_IN_KEY',    '|5p,5];GlQfgV:LV-d}SudHzAA(+jf[09^rU8?^P947roSkDUD30Qg80l@}7d;ge' );
define( 'NONCE_KEY',        '#{750JVHF%cB8W2)XLdg7jd={.p[~)HK(-aCAT(mZ(0AYSA>Cw(O*.cHZPg=waGC' );
define( 'AUTH_SALT',        '-)oNM3}]oOe>E`s]LMb)bredL4LN{khZw4Im`sz*sX@VJMh->>ctSft1Ti(Th|h}' );
define( 'SECURE_AUTH_SALT', '@Uh)i+D;M$DG97I90f~!6c&F!3~BqdrT|{56DFUKiDUjGSE?r4lQJGsR)),?4h/z' );
define( 'LOGGED_IN_SALT',   '<8~5-vOF!ul0}&>@<g`J@.Rf/4x6s-,nS$UU#--VKe`4CD)ct_7;[/?^HWxXK%@|' );
define( 'NONCE_SALT',       '!]@{0Dh9M2(fH=E|n=_;T4yoOIW=mOc=b[+@9%G%y0=I]E8BN[IqnJrbF`HFirRk' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );

}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
