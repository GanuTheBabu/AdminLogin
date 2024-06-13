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

$stmt = $pdo->query('SELECT label, link FROM buttons');
$buttons = $stmt->fetchAll();

header('Content-Type: application/json');
echo json_encode($buttons);
