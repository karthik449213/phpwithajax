
<?php
include '../db.php';

// make sure id exists to delete the recored

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $conn->prepare($sql);
        
        $execution = $stmt->execute([':id' => $id]);

        if ($execution) {
            echo "Success";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: Target ID not defined.";
}
?>
