<?php

$host = 'localhost';
$dbname = 'elite_event_managment';
$username = 'root'; // Update this with your database username
$password = ''; // Update this with your database pas

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage() . "<br><br><b>Note:</b> Make sure you have imported setup.sql into your MySQL server and updated db.php with the correct MySQL credentials.");
}
echo "Hello"
?>