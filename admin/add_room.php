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

// Get POST data
$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['floorId']) && !empty($data['roomName'])) {
    $floorId = intval($data['floorId']);
    $roomName = $data['roomName'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        $response = array(
            'success' => false,
            'message' => "Connection failed: " . $conn->connect_error
        );
    } else {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO rooms (floor_id, name) VALUES (?, ?)");
        $stmt->bind_param("is", $floorId, $roomName);

        // Execute SQL statement
        if ($stmt->execute() === TRUE) {
            $response = array(
                'success' => true,
                'message' => "Room added successfully"
            );
        } else {
            $response = array(
                'success' => false,
                'message' => "Error: " . $conn->error
            );
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
} else {
    $response = array(
        'success' => false,
        'message' => "Invalid data received"
    );
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
