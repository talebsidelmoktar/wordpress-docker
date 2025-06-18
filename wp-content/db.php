<?php
/**
 * Custom database drop-in for SQLite integration
 * This file is automatically loaded by WordPress
 */

// Ensure database directory exists
$db_dir = ABSPATH . 'wp-content/database/';
if (!file_exists($db_dir)) {
    wp_mkdir_p($db_dir);
    
    // Create security files
    file_put_contents($db_dir . '.htaccess', "deny from all\n");
    file_put_contents($db_dir . 'index.php', "<?php // Silence is golden");
}

// Load SQLite integration plugin
$sqlite_plugin_path = ABSPATH . 'wp-content/plugins/sqlite-database-integration/load.php';

if (file_exists($sqlite_plugin_path)) {
    require_once $sqlite_plugin_path;
} else {
    // Fallback error handling
    wp_die('SQLite Database Integration plugin is required but not found. Please ensure the build process completed successfully.');
}
