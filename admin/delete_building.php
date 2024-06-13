<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "building_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);
$buildingId = $data["buildingId"];

$sql = "DELETE FROM buildings WHERE id = '$buildingId'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("message" => "Building deleted successfully", "success" => true));
} else {
    echo json_encode(array("message" => "Error: " . $conn->error, "success" => false));
}

$conn->close();
?>
