<?php
session_start();

// Mock database (replace with a real database in production)
$bookings = isset($_SESSION['bookings']) ? $_SESSION['bookings'] : [];

// Handle booking submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $service = $_POST['service'] ?? '';
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';

    // Validate input
    if (empty($name) || empty($email) || empty($service) || empty($date) || empty($time)) {
        echo json_encode(['error' => 'All fields are required.']);
        exit;
    }

    // Create a new booking
    $newBooking = [
        'id' => count($bookings) + 1,
        'name' => $name,
        'email' => $email,
        'service' => $service,
        'date' => $date,
        'time' => $time,
    ];

    // Save the booking in the session (or database)
    $bookings[] = $newBooking;
    $_SESSION['bookings'] = $bookings;

    echo json_encode(['message' => 'Booking successful', 'booking' => $newBooking]);
    exit;
}

// Get all bookings (for testing or admin use)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($bookings);
    exit;
}

// Invalid request
http_response_code(400);
echo json_encode(['error' => 'Invalid request method.']);
