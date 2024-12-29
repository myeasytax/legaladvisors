<?php
session_start();

// Mock database of users
$users = [
    [
        "email" => "user@example.com",
        "password" => password_hash("password123", PASSWORD_DEFAULT) // Use hashed passwords
    ],
    [
        "email" => "admin@example.com",
        "password" => password_hash("admin456", PASSWORD_DEFAULT)
    ]
];

// Handle login
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "login") {
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    // Validate input
    if (empty($email) || empty($password)) {
        echo json_encode(["error" => "Email and password are required."]);
        exit;
    }

    // Check credentials
    foreach ($users as $user) {
        if ($user["email"] === $email && password_verify($password, $user["password"])) {
            $_SESSION["user"] = ["email" => $email];
            echo json_encode(["message" => "Login successful", "user" => $_SESSION["user"]]);
            exit;
        }
    }

    echo json_encode(["error" => "Invalid email or password."]);
    exit;
}

// Handle logout
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "logout") {
    session_unset();
    session_destroy();
    echo json_encode(["message" => "Logout successful"]);
    exit;
}

// Check if the user is logged in
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["action"]) && $_GET["action"] === "check") {
    if (isset($_SESSION["user"])) {
        echo json_encode(["logged_in" => true, "user" => $_SESSION["user"]]);
    } else {
        echo json_encode(["logged_in" => false]);
    }
    exit;
}

http_response_code(400);
echo json_encode(["error" => "Invalid request."]);
