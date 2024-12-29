<?php
// Start the session for user authentication and data storage
session_start();

// Set error reporting based on the environment
if ($_ENV['APP_ENV'] === 'production') {
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', '../storage/logs/error.log');
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
} else {
    ini_set('display_errors', 1);
    ini_set('log_errors', 1);
    ini_set('error_log', '../storage/logs/error.log');
    error_reporting(E_ALL);
}

// Load environment variables
require_once '../vendor/autoload.php';
if (file_exists('../.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable('../');
    $dotenv->load();
}

// Set default timezone
date_default_timezone_set($_ENV['APP_TIMEZONE'] ?? 'UTC');

// Load database connection
require_once '../Backend/includes/db-connect.php';

// Load helper functions
require_once '../Backend/helpers/utilities.php';

// Load routes
require_once '../src/Config/routes.php';

// Set global constants
define('BASE_URL', $_ENV['APP_URL'] ?? 'http://localhost');

// Initialize application-specific logic (if needed)
