<?php
header('Content-Type: application/json');

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "building_db";

// Set up the database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    echo json_encode(['error' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

// Retrieve parameters
$building = isset($_GET['building']) ? $_GET['building'] : null;
$floor = isset($_GET['floor']) ? $_GET['floor'] : null;

try {
    if ($building && $floor) {
        $stmt = $conn->prepare("SELECT id AS value, name AS text FROM rooms WHERE floor_id = ?");
        if (!$stmt) {
            throw new Exception('Prepare failed: ' . $conn->error);
        }
        $stmt->bind_param("i", $floor);
        if (!$stmt->execute()) {
            throw new Exception('Execute failed: ' . $stmt->error);
        }
        $result = $stmt->get_result();
        $rooms = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode(['rooms' => $rooms]);
        $stmt->close();
    } elseif ($building) {
        $stmt = $conn->prepare("SELECT id AS value, name AS text FROM floors WHERE building_id = ?");
        if (!$stmt) {
            throw new Exception('Prepare failed: ' . $conn->error);
        }
        $stmt->bind_param("i", $building);
        if (!$stmt->execute()) {
            throw new Exception('Execute failed: ' . $stmt->error);
        }
        $result = $stmt->get_result();
        $floors = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode(['floors' => $floors]);
        $stmt->close();
    } else {
        $result = $conn->query("SELECT id AS value, name AS text FROM buildings");
        if (!$result) {
            throw new Exception('Query failed: ' . $conn->error);
        }
        $buildings = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode(['buildings' => $buildings]);
    }
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

// Close the database connection
$conn->close();
?>
