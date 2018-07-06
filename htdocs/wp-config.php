<?php

/** Absolute path to the WordPress directory. */
if(!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

$scheme = $_SERVER['HTTP_X_FORWARDED_PROTO'] ?? $_SERVER['REQUEST_SCHEME'];
if($scheme === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

define('WP_HOME', $scheme.'://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', $scheme.'://' . $_SERVER['HTTP_HOST']);

define('WP_CONTENT_DIR', ABSPATH.'wp-content');
define('WP_CONTENT_URL', WP_HOME.'/wp-content');

define('WP_PLUGIN_DIR', ABSPATH . 'wp-content/plugins');
define('WP_PLUGIN_URL', WP_HOME . '/wp-content/plugins');

# Disable the Plugin and Theme Editor
define('DISALLOW_FILE_EDIT', getenv('WORDPRESS_FILE_EDIT_ENABLE') !== 'true');

# Disable Plugin and Theme Update and Installation
define('DISALLOW_FILE_MODS', getenv('WORDPRESS_FILE_MODS_ENABLE') !== 'true');

# Disable WordPress Auto Updates
define('AUTOMATIC_UPDATER_DISABLED', TRUE);

# Disable WordPress Core Updates
define('WP_AUTO_UPDATE_CORE', FALSE);

# Disable Cron and Cron Timeout
define('DISABLE_WP_CRON', getenv('WORDPRESS_CRON_ENABLE') !== 'true');

define('WP_CACHE', getenv('WORDPRESS_CACHE') === 'true');

define('CONCATENATE_SCRIPTS', FALSE);
define('COMPRESS_SCRIPTS', FALSE);
define('COMPRESS_CSS', FALSE);

define('FS_METHOD', 'direct');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('MYSQL_DATABASE'));

/** MySQL database username */
define('DB_USER', getenv('MYSQL_USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('MYSQL_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', 'mysql');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 * Change these to different unique phrases!
 * You can generate these using the
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service} You can change these at any
 * point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
include ABSPATH.'wp-keys.php';

/**#@-*/

/**
 * WordPress Database Table prefix.
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv('WORDPRESS_DATABASE_PREFIX') ?: 'wp_';

/**
 * For developers: WordPress debugging mode.
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', getenv('WORDPRESS_DEBUG') === 'true');
define('WP_DEBUG_DISPLAY', getenv('WORDPRESS_DEBUG_DISPLAY') === 'true');

/**
 * @link https://codex.wordpress.org/Multisite_Network_Administration
 */
if(getenv('WORDPRESS_MULTISITE_ALLOW') === 'true') {
    define('WP_ALLOW_MULTISITE', getenv('WORDPRESS_MULTISITE_ALLOW') === 'true');
    define('MULTISITE', getenv('WORDPRESS_MULTISITE_ENABLE') === 'true');
    define('SUBDOMAIN_INSTALL', getenv('WORDPRESS_MULTISITE_SUBDOMAIN_INSTALL') === 'true');
    define('DOMAIN_CURRENT_SITE', getenv('WORDPRESS_MULTISITE_CURRENT_SITE_DOMAIN'));
    define('PATH_CURRENT_SITE', getenv('WORDPRESS_MULTISITE_CURRENT_SITE_PATH'));
    define('SITE_ID_CURRENT_SITE', getenv('WORDPRESS_MULTISITE_CURRENT_SITE_ID'));
    define('BLOG_ID_CURRENT_SITE', getenv('WORDPRESS_MULTISITE_CURRENT_SITE_BLOG_ID'));
}

/* That's all, stop editing! Happy blogging. */

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
