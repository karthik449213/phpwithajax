<?php
//credentials
$host = 'mysql'; //  use the service name this project uses docker
$dbname = 'crud_db';
$user = 'root';
$pass = 'root';

// create 
$dsn = "mysql:host=$host;dbname=$dbname";

try {
    // Create a new PDO instance
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    echo "Connection failed check error id :" . $e->getMessage();
}
?>
