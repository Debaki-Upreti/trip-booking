<?php
$host = 'localhost';
$dbname = 'book_db';
$user = 'root'; // Change this to your MySQL username
$pass = ''; // Change this to your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>