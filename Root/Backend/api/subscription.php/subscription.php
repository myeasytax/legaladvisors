<?php
session_start();

<?php
include 'db-connect.php'; // Include the database connection
include 'helpers.php';    // Include helper functions if available

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'] ?? null;
    $attorneyId = $_POST['attorney_id'] ?? null; // Optional: Link to attorney
    $plan = $_POST['plan'] ?? '';
    $paymentMethod = $_POST['payment_method'] ?? '';
    $status = $_POST['status'] ?? 'active';
    $startDate = $_POST['start_date'] ?? date('Y-m-d');
    $endDate = $_POST['end_date'] ?? null;

    // Validate required fields
    $errors = validateFields($_POST, ['user_id', 'plan', 'payment_method']);
    if (!empty($errors)) {
        jsonResponse(['errors' => $errors], 400);
    }

    try {
        // Prepare SQL statement
        $stmt = $pdo->prepare("
            INSERT INTO subscriptions (user_id, attorney_id, plan, payment_method, status, start_date, end_date)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");

        // Execute query
        $stmt->execute([$userId, $attorneyId, $plan, $paymentMethod, $status, $startDate, $endDate]);

        jsonResponse(['message' => 'Subscription created successfully!']);
    } catch (PDOException $e) {
        jsonResponse(['error' => 'Failed to create subscription: ' . $e->getMessage()], 500);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Fetch subscriptions
    $stmt = $pdo->query("
        SELECT 
            subscriptions.id AS subscription_id,
            users.name AS user_name,
            subscriptions.plan,
            subscriptions.payment_method,
            subscriptions.status,
            subscriptions.start_date,
            subscriptions.end_date,
            attorneys.business_profile AS attorney_profile,
            attorneys.expertise AS attorney_expertise
        FROM subscriptions
        JOIN users ON subscriptions.user_id = users.id
        LEFT JOIN attorneys ON subscriptions.attorney_id = attorneys.id
    ");

    $subscriptions = $stmt->fetchAll();
    jsonResponse($subscriptions);
} else {
    jsonResponse(['error' => 'Invalid request method.'], 405);
}
