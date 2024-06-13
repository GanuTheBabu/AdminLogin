<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $id = $_POST['id'];

  // Corrected SQL statement with a comma between columns
  $sql = "UPDATE ticket SET comment = '$name', status = 'solved' WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    header("Location: openformaintainence.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
