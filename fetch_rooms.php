<?php
$servername = "localhost";
$username = "root";
$password = "";
$building_dbname = "building_db";
$conn = new mysqli($servername, $username, $password, $building_dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$floor_id = intval($_GET['floor_id']);
$rooms = [];

$sql = "SELECT id, name FROM rooms WHERE floor_id = $floor_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $rooms[] = $row;
    }
}

echo json_encode($rooms);
$conn->close();
?>
