<?php

// Connecting to database
$host = "localhost";
$port = 3306;
$dbname = "contactus";
$user = "root";
$password = "";


$dsn = "mysql:host={$host};port={$port};dbname={$dbname}";

try {
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
