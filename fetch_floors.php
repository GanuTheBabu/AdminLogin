<?php
$servername = "localhost";
$username = "root";
$password = "";
$building_dbname = "building_db";
$conn = new mysqli($servername, $username, $password, $building_dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$building_id = intval($_GET['building_id']);
$floors = [];

$sql = "SELECT id, name FROM floors WHERE building_id = $building_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $floors[] = $row;
    }
}

echo json_encode($floors);
$conn->close();
?>
