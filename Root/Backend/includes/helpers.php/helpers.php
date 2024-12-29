<?php

/**
 * Sanitize user input to prevent XSS attacks.
 *
 * @param string $input
 * @return string
 */
function sanitizeInput($input)
{
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Send a JSON response with appropriate headers.
 *
 * @param mixed $data
 * @param int $statusCode
 * @return void
 */
function jsonResponse($data, $statusCode = 200)
{
    header('Content-Type: application/json');
    http_response_code($statusCode);
    echo json_encode($data);
    exit;
}

/**
 * Validate required fields in an array.
 *
 * @param array $data
 * @param array $requiredFields
 * @return array
 */
function validateFields($data, $requiredFields)
{
    $errors = [];
    foreach ($requiredFields as $field) {
        if (empty($data[$field])) {
            $errors[] = "The $field field is required.";
        }
    }
    return $errors;
}

/**
 * Generate a random unique identifier.
 *
 * @param int $length
 * @return string
 */
function generateUniqueId($length = 16)
{
    return bin2hex(random_bytes($length / 2));
}

/**
 * Check if a user is logged in (using session).
 *
 * @return bool
 */
function isLoggedIn()
{
    return isset($_SESSION['user']);
}

/**
 * Redirect to a specific URL.
 *
 * @param string $url
 * @return void
 */
function redirect($url)
{
    header("Location: $url");
    exit;
}

