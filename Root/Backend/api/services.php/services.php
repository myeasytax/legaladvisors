<?php
// List of services (mock data, replace with database in production)
$services = [
    [
        "id" => 1,
        "name" => "Legal Advice",
        "description" => "Connect with experienced attorneys for personalized legal guidance."
    ],
    [
        "id" => 2,
        "name" => "Document Review",
        "description" => "Ensure your legal documents are accurate, compliant, and complete."
    ],
    [
        "id" => 3,
        "name" => "Representation",
        "description" => "Find skilled lawyers to represent you in court or legal matters."
    ],
    [
        "id" => 4,
        "name" => "Business Law",
        "description" => "Expert assistance for contracts, compliance, and corporate legal needs."
    ],
    [
        "id" => 5,
        "name" => "Family Law",
        "description" => "Get support for family legal matters, including custody and divorce."
    ],
    [
        "id" => 6,
        "name" => "Immigration Services",
        "description" => "Navigate the complexities of immigration law with experienced attorneys."
    ]
];

// Handle GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Content-Type: application/json');
    echo json_encode($services);
    exit;
}

// Invalid request
http_response_code(400);
echo json_encode(["error" => "Invalid request method."]);
