<?php
$host = "localhost";
$dbname = "rsoa_rsoa17_3";
$user = "rsoa_rsoa17_3";
$pass = "123456";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>
