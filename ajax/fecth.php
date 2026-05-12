<?php
include '../db.php';

try {
    // Select all available entries ordered by newest first
    $sql = "SELECT id, name, email FROM users ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    // Grab items into an associative format string array matrix
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Set headers explicitly to warn the browser it is processing JSON stream data
    header('Content-Type: application/json');
    echo json_encode($result);

} catch (PDOException $e) {
    // If an error hits, output an array indicating the issue
    header('Content-Type: application/json');
    echo json_encode(["error" => $e->getMessage()]);
}
?>
