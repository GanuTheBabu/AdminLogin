<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve and sanitize POST data/*
  //$id = $conn->real_escape_string($_POST['id']);//
  
  $comment = $conn->real_escape_string($_POST['name']);
  // Prepare the SQL query
  echo $comment;
  //$sql = "INSERT INTO names (name) VALUES('$comment')";
  // Execute the query
  //if ($conn->query($sql) === TRUE) {
    //echo "Record updated successfully";
  /*} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }*/
}

$conn->close();
?>
