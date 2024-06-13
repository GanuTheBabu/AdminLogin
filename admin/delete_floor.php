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
$floorId = intval($data["floorId"]);

// Delete the floor from the database
$sql = "DELETE FROM floors WHERE id = $floorId";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "Floor deleted successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
}

$conn->close();
?>
