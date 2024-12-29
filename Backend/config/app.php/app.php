<?php
session_start();

// Define routes and functionality
$routes = [
    'subscription' => 'subscription.php',
    'booking' => 'booking.php',
    'services' => 'services.php',
    'auth' => 'auth.php',
];

// Get the route from the request
$route = $_GET['route'] ?? '';

// Handle requests
if (isset($routes[$route])) {
    include $routes[$route];
    exit;
}

// Default response for invalid routes
http_response_code(404);
echo json_encode(['error' => 'Route not found.']);
