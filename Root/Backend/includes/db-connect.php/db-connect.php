<?php
// Database connection settings
$host = 'localhost';      // Database host
$dbname = 'legal_advisors'; // Database name
$username = 'root';       // Database username
$password = '';           // Database password

try {
    // Create a new PDO instance
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable exceptions on errors
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetch results as associative arrays
        ]
    );
} catch (PDOException $e) {
    // Handle connection errors
    die('Database connection failed: ' . $e->getMessage());
}
