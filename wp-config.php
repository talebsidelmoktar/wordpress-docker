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
define('AUTH_KEY',         'QJ,3t-0(+08O@=yKUZub.VU;$|x*%E-blB/{62[,sw[C~mb>{.v}vNJIBo!jSJ+N');
define('SECURE_AUTH_KEY',  't|-sK-:(V:ssb2&+C>Cc1  ll6ymb,t;p[~n;Pc=T+P/=Z<Uj0d(8!@TxXDZ`6=4');
define('LOGGED_IN_KEY',    '*Dm#8cOODkb[}c#o- p|26=^=jtcm<<qaPp_e<y7#i&G-xHMXGj!7yJ+p]E6wKq|');
define('NONCE_KEY',        '8,-8idlb BB_AD[xPp[d!OO}U=Do_IV3-sHxh?JyocA+%i++T]X|PEU&3TU7q#s5');
define('AUTH_SALT',        '~E6Xt*: 64ptLIka<w`DH=j1o<]?Q/#)Jb3!:OUe2e t`k1K|feP#A|{olCXOK$_');
define('SECURE_AUTH_SALT', 'u3qBqk;)(bQ|9-C-yRrB`b[A{07174$dZ<:R`5KaIpztc4NS)bZ>%2Kzd7[Jen W');
define('LOGGED_IN_SALT',   '|NgxV&?]e,3vcw`V%+jLQ]R1770_l1a3%0!W]+Zym.`rOcn:0%q+PO/x}*jD=C9w');
define('NONCE_SALT',       '`V!CtLUD*6CX*]wN`$>imm8@bz:`?)WCF*NrM$0|UEMUrX|wn -lI<(B<_!?5C=R');

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
