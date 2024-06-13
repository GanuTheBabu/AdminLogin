<?php
$host = 'localhost';  // your database host
$db = 'test';  // your database name
$user = 'root';  // your database username
$pass = '';  // your database password

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

$data = json_decode(file_get_contents('php://input'), true);

if ($data && isset($data['label'])) {
    $stmt = $pdo->prepare('DELETE FROM buttons WHERE label = ?');
    if ($stmt->execute([$data['label']])) {
        echo 'success';
    } else {
        echo 'failure';
    }
} else {
    echo 'invalid';
}
