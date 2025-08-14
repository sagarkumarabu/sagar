<?php
include 'config.php';

$sql = "SELECT * FROM products WHERE category = 'Beauty'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<img src='" . $row['image'] . "' alt='" . $row['name'] . "'>";
        echo "<h3>" . $row['name'] . "</h3>";
        echo "<p>₹" . $row['price'] . "</p>";
           echo "<form action='buy.php' method='POST'>";
        echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
        echo "<button type='submit'>Buy Now</button>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "No products found.";
}

$conn->close();
?>

