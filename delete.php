<?php
include 'config.php';

if (isset($_GET['id'])) { // <-- FIXED
    $product_id = $_GET['id'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        echo "success"; // Return only "success" for JS check
    } else {
        echo "Error deleting product: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
header("Location: admin.php");
exit;
?>
