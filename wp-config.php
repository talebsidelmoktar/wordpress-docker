<?php
/**
 * WordPress Configuration for Render with SQLite
 */

// ** Database settings - SQLite Configuration ** //
define('DB_NAME', 'wordpress');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_HOST', '');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// SQLite specific settings
define('DB_FILE', 'wp-content/database/.ht.sqlite');
define('DB_DIR', ABSPATH . 'wp-content/database/');

// ** Authentication Unique Keys and Salts ** //
// Generate these at: https://api.wordpress.org/secret-key/1.1/salt/
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

// ** WordPress Database Table prefix ** //
$table_prefix = 'wp_';

// ** WordPress debugging ** //
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);

// ** SSL and URL Configuration ** //
define('FORCE_SSL_ADMIN', true);

// Handle SSL behind proxy (Render's setup)
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
    $_SERVER['SERVER_PORT'] = 443;
}

// Set WordPress URLs dynamically
$render_url = isset($_SERVER['RENDER_EXTERNAL_URL']) ? $_SERVER['RENDER_EXTERNAL_URL'] : 'https://' . $_SERVER['HTTP_HOST'];
define('WP_HOME', $render_url);
define('WP_SITEURL', $render_url);

// ** File System Configuration ** //
define('FS_METHOD', 'direct');
define('WP_MEMORY_LIMIT', '256M');

// ** Upload Configuration ** //
define('UPLOADS', 'wp-content/uploads');

// ** Create directories if they don't exist (runtime) ** //
$wp_dirs = [
    ABSPATH . 'wp-content/uploads',
    ABSPATH . 'wp-content/database', 
    ABSPATH . 'wp-content/cache'
];

foreach ($wp_dirs as $dir) {
    if (!file_exists($dir)) {
        wp_mkdir_p($dir);
    }
}

// ** Auto-updates ** //
define('WP_AUTO_UPDATE_CORE', true);

// ** Absolute path to the WordPress directory ** //
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

// ** Sets up WordPress vars and included files ** //
require_once ABSPATH . 'wp-settings.php';
