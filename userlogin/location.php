<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpdesk-core-php";
$randomNumber3 = rand(1000, 9999);  // Generate random number

// Store the random number in a session variable
$_SESSION['randomNumber3'] = $randomNumber3;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $building = $_POST['building'];
    $floor = $_POST['floor'];
    $room = $_POST['room'];
    $randomid=$randomNumber3;

    $sql = "INSERT INTO ticket (id,location, floor, room) VALUES ('$randomid','$building', '$floor', '$room')" ;

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location:submit_problem.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
header("Location: submit_problem.php?randomNumber3=$randomNumber3");
$conn->close();
?>
