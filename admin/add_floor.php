<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "building_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize the input data
$data = json_decode(file_get_contents("php://input"), true);
$buildingId = intval($data["buildingId"]);
$floorName = $conn->real_escape_string($data["floorName"]);

// Insert the floor name into the database
$sql = "INSERT INTO floors (building_id, name) VALUES ($buildingId, '$floorName')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "Floor added successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
}

$conn->close();
?>
