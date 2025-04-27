<?php
$DB_HOST = 'localhost';
$DB_NAME = 'photo_gallery';
$DB_USER = 'root';
$DB_PASS = '';

try {
    // Create PDO connection
    $pdo = new PDO(
        "mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME,
        $DB_USER,
        $DB_PASS,
       );
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Set default timezone
date_default_timezone_set('UTC');
?> 