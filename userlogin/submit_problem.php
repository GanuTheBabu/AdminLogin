<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpdesk-core-php";

$servername1 = "localhost";
$username1 = "root";
$password1 = "";
$dbname1 = "building_db";

$randomNumber3 = rand(1000, 9999);  // Generate random number

// Store the random number in a session variable
$_SESSION['randomNumber3'] = $randomNumber3;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn1 = new mysqli($servername1, $username1, $password1, $dbname1);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buildingId = $_POST['building'];
    $floorId = $_POST['floor'];
    $roomId = $_POST['room'];
    
    $randomid = $randomNumber3;

    // Retrieve actual names from the database
    $buildingResult = $conn1->query("SELECT name FROM buildings WHERE id = '$buildingId'");
    $floorResult = $conn1->query("SELECT name FROM floors WHERE id = '$floorId'");
    $roomResult = $conn1->query("SELECT name FROM rooms WHERE id = '$roomId'");
    
    if ($buildingResult && $floorResult && $roomResult) {
        $buildingName = $buildingResult->fetch_assoc()['name'];
        $floorName = $floorResult->fetch_assoc()['name'];
        $roomName = $roomResult->fetch_assoc()['name'];
        
        // Insert the ticket with actual names
        $sql = "INSERT INTO ticket (id, location, floor, room) VALUES ('$randomid', '$buildingName', '$floorName', '$roomName')";

        if ($conn->query($sql) === TRUE) {
            header("Location: submit_problem.html");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error fetching building, floor, or room information.";
    }
}

$conn->close();
$conn1->close();
?>
