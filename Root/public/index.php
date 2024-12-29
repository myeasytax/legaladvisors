<?php
// Start session management
session_start();

// Autoload dependencies (Composer autoloader, if used)
require_once __DIR__ . '/vendor/autoload.php';

// Load configuration
require_once __DIR__ . '/config/config.php';

// Router logic or entry point for handling requests
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Basic router
switch ($requestUri) {
    case '/':
        require_once __DIR__ . '/views/home.php';
        break;

    case '/users':
        if ($requestMethod === 'GET') {
            require_once __DIR__ . '/controllers/UserController.php';
            $controller = new UserController();
            $controller->index();
        } elseif ($requestMethod === 'POST') {
            require_once __DIR__ . '/controllers/UserController.php';
            $controller = new UserController();
            $controller->store();
        }
        break;

    case '/lawyers':
        require_once __DIR__ . '/controllers/LawyerController.php';
        $controller = new LawyerController();
        $controller->index();
        break;

    default:
        http_response_code(404);
        echo "Page not found";
        break;
}
