<?php
require_once 'DatabaseConnector.php';

// Allow CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

$connector = DatabaseConnector::getInstance();
$customers = $connector->getCustomers();

header('Content-Type: application/json');

echo json_encode($customers);
