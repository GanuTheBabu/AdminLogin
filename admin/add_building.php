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
$buildingName = $conn->real_escape_string($data["buildingName"]);

// Insert the building name into the database
$sql = "INSERT INTO buildings (name) VALUES ('$buildingName')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("message" => "Building added successfully", "success" => true));
} else {
    echo json_encode(array("message" => "Error: " . $conn->error, "success" => false));
}

$conn->close();
?>
