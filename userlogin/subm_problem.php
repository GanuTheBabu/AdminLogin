<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpdesk-core-php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$staff = $_POST['staff'];
$name = $_POST['name'];
$date = $_POST['date'];
$issue = $_POST['issue'];
$status = 'open';
$time = $_POST['time'];

if (isset($_SESSION['randomNumber3'])) {
    $randomNumber3 = $_SESSION['randomNumber3'];
    echo $randomNumber3;
} else {
    die("No random number received.");
}
// Update the ticket table
$sql_ticket = "UPDATE ticket SET name = '$name', issue = '$issue', staff_id = '$staff', created_at = '$date $time', status = '$status', updated_at = NOW() WHERE id = '$randomNumber3'";
if ($conn->query($sql_ticket) === FALSE) {
    die("Error: " . $sql_ticket . "<br>" . $conn->error);
}
echo '<script>alert("New ticket created successfully");</script>';
$conn->close();
?>
