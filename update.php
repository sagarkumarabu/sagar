<?php
include 'config.php';

// Check if the required POST variables are set
if (isset($_POST['id'], $_POST['name'], $_POST['price'], $_POST['category'], $_POST['description'])) {
    // Sanitize and assign POST variables to local variables
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    // Prepare the SQL UPDATE statement
    $stmt = $conn->prepare("UPDATE products SET name = ?, price = ?, category = ?, description = ? WHERE id = ?");
    $stmt->bind_param("sdssi", $name, $price, $category, $description, $id);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Product updated successfully.";
    } else {
        echo "Error updating product: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "Required fields are missing.";
}

// Close the database connection
$conn->close();
?>
