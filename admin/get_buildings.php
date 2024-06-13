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

$sql = "SELECT id, name FROM buildings";
$result = $conn->query($sql);

$buildings = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $buildings[] = $row;
    }
}

echo json_encode($buildings);

$conn->close();
?>
