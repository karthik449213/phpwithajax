<?php
include '../db.php';
// first check if id exists for update in the database
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    try {
        $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $stmt = $conn->prepare($sql);
        
        $execution = $stmt->execute([
            ':name'  => $name,
            ':email' => $email,
            ':id'    => $id
        ]);

        if ($execution) {
            echo "Success";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: Missing required patch parameters.";
}
?>
