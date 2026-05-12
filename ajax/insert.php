<?php
include '../db.php';

// Check if data was sent via POST
if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    try {
        // Prepare the SQL statement to prevent SQL Injection
        $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $stmt = $conn->prepare($sql);

        // Execute with the captured data
        if ($stmt->execute([':name' => $name, ':email' => $email])) {
            echo "Success";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
